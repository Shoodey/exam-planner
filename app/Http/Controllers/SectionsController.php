<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function admin_index()
    {
        $menu = 'admin.sections';
        return view('admin.sections.index', compact('menu'));
    }
}
