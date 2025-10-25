<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        return view('pages.dashboard.user.edit', [
            'page' => 'Profil',
            'title' => 'Halaman Profil',
            'desc' => 'Halaman Profil',
            'data' => Auth::user(),
        ]);
    }
}
