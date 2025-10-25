<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Http\Requests\Landing\SignupRequest;
use App\Models\User;
use Illuminate\Http\Request;

class SignupController extends Controller
{
    public function index()
    {
        return view('pages.landing.signup', [
            'page' => 'Signup',
            'title' => 'Halaman Signup',
            'desc' => 'Halaman Signup',
        ]);
    }

    public function submit(SignupRequest $request)
    {
        $validated = $request->validated();

        $validated = $request->safe()->only(['username', 'fullname', 'password', 'email', 'role']);

        $user = User::create($validated);

        // auth()->login($user);

        return redirect()->route('landing.login')->withErrors('Signup berhasil!');
    }
}
