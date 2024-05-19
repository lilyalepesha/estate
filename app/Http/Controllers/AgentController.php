<?php

namespace App\Http\Controllers;

use App\Enums\RoleEnum;
use App\Models\User;

final class AgentController extends Controller
{
    public function index()
    {
        return view('agent', ['agents' => User::query()
            ->where('role', '=', RoleEnum::AGENT->value)
            ->paginate(30)
        ]);
    }
}
