<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Log;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role_id', 2)->where('status', 1)->get();
        return view('users.list', compact('users'));
    }
}
