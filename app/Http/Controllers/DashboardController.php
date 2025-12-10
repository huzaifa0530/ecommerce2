<?php

namespace App\Http\Controllers;

use App\Models\ModelProfile;
use App\Models\User;
use App\Models\Role;


class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $totalUsers = User::count();
        $totalRoles = Role::count();

        return view('dashboard', compact(
            'totalUsers',
            'totalRoles',

        ));
    }


}
