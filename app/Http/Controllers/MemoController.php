<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Models\Memo;

class MemoController extends Controller
{
    public function edit(Memo $memo)
    {

        if (Auth::user()->id !== $memo->user_id) {
            abort(403, 'ページが存在しません');
        }

        return Inertia::render('Memo/Edit',
            [
                'memo' => $memo,
            ]
        );
    }

    public function update(Request $request, Memo $memo)
    {
        if (Auth::user()->id !== $memo->user_id) {
            abort(403, 'ページが存在しません');
        }

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => '',
            'is_public' => '',
        ]);

        $memo->fill($validatedData);
        $memo->save();

        return redirect()->route('dashboard')->with('message', 'メモを更新しました');
    }
}
