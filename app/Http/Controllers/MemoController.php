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
            ]);
    }

    public function store(MemoRequest $request)
    {
        Auth::user()->memos()->create($request->validated());

        return redirect()->route('dashboard')->with('message', 'メモを作成しました');
    }

    public function edit(Memo $memo)
    {
        return Inertia::render('Memo/Form',
            [
                'memo' => $memo,
            ]
        );
    }

    public function update(MemoRequest $request, Memo $memo)
    {
        $memo->fill($request->validated());
        $memo->save();

        return redirect()->route('dashboard')->with('message', 'メモを更新しました');
    }
}
