<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;

use App\Http\Requests\MemoRequest;
use App\Models\Memo;

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

        if (! Gate::allows('update', $memo)) {
            abort(403, 'ページが存在しません');
        }

        return Inertia::render('Memo/Form',
            [
                'memo' => $memo,
            ]
        );
    }

    public function update(MemoRequest $request, Memo $memo)
    {
        if (! Gate::allows('update', $memo)) {
            abort(403, 'ページが存在しません');
        }

        $memo->fill($request->validated());
        $memo->save();

        return redirect()->route('dashboard')->with('message', 'メモを更新しました');
    }
}
