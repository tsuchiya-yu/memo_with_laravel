<?php

use App\Http\Controllers\MemoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
use Illuminate\Foundation\Application;
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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    $user = Auth::user();

    if (request()->query('is_public') == 'true') {
        $memos = $user->memos()->public()->get();
        $is_public = true;
    } else {
        $memos = $user->memos()->notPublic()->get();
        $is_public = false;
    }

    return Inertia::render('Dashboard', [
        'memos' => $memos,
        'is_public' => $is_public,
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

// メモ操作のルーティング
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('memos', MemoController::class)->except(['edit', 'update']);
    Route::resource('memos', MemoController::class)->only(['edit', 'update'])->middleware('check.memo.owner');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
