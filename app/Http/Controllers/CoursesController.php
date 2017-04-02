<?php

namespace App\Http\Controllers;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $menu = 'courses';
        return view('admin.courses.index', compact('menu'));
    }
}
