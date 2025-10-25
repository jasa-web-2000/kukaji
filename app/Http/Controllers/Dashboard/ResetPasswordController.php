<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ResetPasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResetPasswordController extends Controller
{
    public function index()
    {
        return view('pages.dashboard.reset-password', [
            'page' => 'Reset Password',
            'title' => 'Halaman Reset Password',
            'desc' => 'Halaman Reset Password',
            'data' => Auth::user(),
        ]);
    }

    public function submit(ResetPasswordRequest $request)
    {
        $validated = $request->validated();

        $validated = $request->safe()->only(['password']);

        /** @var \App\Models\User $user */
        $user = Auth::user();
        $user->update($validated);

        return back()->withErrors('Reset password berhasil!');
    }
}
