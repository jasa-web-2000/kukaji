<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Http\Requests\Landing\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


class LoginController extends Controller
{
    public function index()
    {
        return view('pages.landing.login', [
            'page' => 'Login',
            'title' => 'Halaman Login',
            'desc' => 'Halaman Login',
        ]);
    }

    public function submit(LoginRequest $request)
    {
        $validated = $request->validated();

        $validated = $request->safe()->only(['password', 'email']);

        if (Auth::attempt($validated)) {
            $request->session()->regenerate();

            return redirect()->intended(route('dashboard.index'))->withErrors([$validated['email'] . ' Berhasil Login']);
        }

        return back()->withErrors('Email/Password salah!')->withInput();
    }
}
