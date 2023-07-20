<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): Response
    {
        $must_verify_email = false;
        if ($request->user()->email_verified_at == null) {
            $must_verify_email = true;
        }

        return Inertia::render('Profile/Edit', [
            'mustVerifyEmail' => $must_verify_email,
            'status' => session('status'),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        $must_verify_email = false;
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
            $must_verify_email = true;
        }

        $request->user()->save();

        return Redirect::route('profile.edit', [
            'mustVerifyEmail' => $must_verify_email,
        ]);
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/')->with('message', '退会しました。ご利用ありがとうございました。');
    }
}
