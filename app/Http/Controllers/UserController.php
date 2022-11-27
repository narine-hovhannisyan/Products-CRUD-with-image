<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
//        var_dump("users");
//        exit();
  $users = User::get()->toArray();
//        return view('user.index', compact('users'));
        return view('user.index', ['name' => 'James'], compact('users'));

    }
}
