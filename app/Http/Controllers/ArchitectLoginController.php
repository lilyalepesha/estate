<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArchitectLoginController extends Controller
{
    /**
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function login(LoginRequest $request)
    {
        if (Auth::guard('architects')->attempt($request->only(['email', 'password']))) {
            $request->session()->regenerate();

            return redirect()->back()->with('success', 'Вы успешно вошли в аккаунт!');
        }

        return redirect()->back()->with('danger', 'Вы не зарегистрированы');
    }
}
