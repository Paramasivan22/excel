<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
      public function showDashboard()
    {
        $users = User::where('usertype', 'user')->get(['name', 'email']);
        return view('admin.dashboard', ['users' => $users]);
    }
}