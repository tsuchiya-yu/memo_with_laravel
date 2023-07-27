<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemoRequest;
use App\Models\Memo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class MemoController extends Controller
{
    public function create(Request $request)
    {
        return Inertia::render('Memo/Form',
            [
                'memo' => (new Memo),
                'encryptId' => '',
            ]);
    }

    public function store(MemoRequest $request)
    {
        $requestData = $request->validated();
        Auth::user()->memos()->create($requestData);

        $is_public = false;
        if (array_key_exists('is_public', $requestData)) {
            $is_public = filter_var($requestData['is_public'], FILTER_VALIDATE_BOOLEAN);
        }

        return redirect()->route('dashboard', ['is_public' => $is_public])->with('message', 'メモを作成しました');
    }

    public function edit(Memo $memo)
    {
        return Inertia::render('Memo/Form',
            [
                'memo' => $memo,
                'encryptId' => $memo->encryptId(),
            ]
        );
    }

    public function update(MemoRequest $request, Memo $memo)
    {
        $requestData = $request->validated();
        $memo->fill($requestData);
        $memo->save();

        $is_public = false;
        if (array_key_exists('is_public', $requestData)) {
            $is_public = filter_var($requestData['is_public'], FILTER_VALIDATE_BOOLEAN);
        }

        return redirect()->route('dashboard', ['is_public' => $is_public])->with('message', 'メモを更新しました');
    }

    public function destroy(Memo $memo)
    {

        $is_public = filter_var($memo->is_public, FILTER_VALIDATE_BOOLEAN);
        $memo->delete();

        return redirect()->route('dashboard', ['is_public' => $is_public])->with('message', 'メモを削除しました');
    }
}
