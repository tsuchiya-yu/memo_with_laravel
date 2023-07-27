<?php

use App\Http\Controllers\MemoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
use App\Models\Memo;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// テストや動作確認のためのルーティング
// e.g)http://localhost/test/aaa
Route::get('/test/{message?}', [TestController::class, 'show']);

// 認証周りのルーティング
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// ログイン後画面のルーティング
Route::get('/dashboard', function () {
    $user = Auth::user();

    if (filter_var(request()->query('is_public'), FILTER_VALIDATE_BOOLEAN)) {
        $memos = $user->memos()->public()->orderByUpdated('desc')->get();
        $is_public = true;
    } else {
        $memos = $user->memos()->notPublic()->orderByUpdated('desc')->get();
        $is_public = false;
    }

    return Inertia::render('Dashboard', [
        'memos' => $memos,
        'is_public' => $is_public,
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

// メモ操作のルーティング(作成主)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('memos', MemoController::class)->except(['edit', 'update', 'destroy']);
    Route::resource('memos', MemoController::class)->only(['edit', 'update', 'destroy'])->middleware('check.memo.owner');
});

// ログイン後のプロフィール編集のルーティング
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// メモの閲覧用ルーティング
Route::get('/read/memos/{id}', function (Request $request) {
    $memo = Memo::find(Memo::decryptId(urldecode($request->route('id'))));
    $user = Auth::user();
    $is_owner = $user != null && $memo->user == Auth::user();

    return Inertia::render('Memo/Read', [
        'memo' => $memo,
        'is_owner' => $is_owner,
    ]);
})->middleware('check.memo.is_public')->name('read.memos.show');

require __DIR__.'/auth.php';
