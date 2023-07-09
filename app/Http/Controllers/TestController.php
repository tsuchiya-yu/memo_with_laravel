<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

// テストや動作確認のためのクラス
class TestController extends Controller
{
    public function show($message = ''){
        return view('test/show', compact('message'));
    }
}
