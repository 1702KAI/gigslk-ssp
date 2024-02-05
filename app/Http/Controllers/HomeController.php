<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function redirectBasedOnRole()
    {
    $user = Auth::user();
    $role = $user->role ?? null;

    switch ($role) {
        case 'admin':
            return view('admin.dashboard');
        case 'freelancer':
            return view('freelancer.dashboard');
        case 'employer':
            return view('employer.dashboard');
        default:
                return view('unauthorized'); // Create an unauthorized view or redirect as needed
    }
    }

}
