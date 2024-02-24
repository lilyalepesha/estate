<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class ArchitectsLogoutController extends Controller
{
    /**
     * @return RedirectResponse
     */
    public function logout()
    {
        Auth::guard('architects')->logout();

        return redirect()->back()->with('success', 'Вы вышли из аккаунта архитектора');
    }
}
