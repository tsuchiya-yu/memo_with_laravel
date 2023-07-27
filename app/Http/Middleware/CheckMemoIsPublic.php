<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckMemoIsPublic
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $memo = $request->route('memo');
        if ($memo == null || ! filter_var($memo->is_public, FILTER_VALIDATE_BOOLEAN)) {
            abort(404, 'メモが存在しません');
        }

        return $next($request);
    }
}
