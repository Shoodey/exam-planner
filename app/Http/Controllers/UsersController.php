<?php

namespace App\Http\Controllers;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function admin_index()
    {
        $menu = 'admin.users';
        return view('admin.users.index', compact('menu'));
    }
}
