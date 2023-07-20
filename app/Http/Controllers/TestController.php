<?php

namespace App\Http\Controllers;

// テストや動作確認のためのクラス
class TestController extends Controller
{
    public function show($message = '')
    {
        return view('test/show', compact('message'));
    }
}
