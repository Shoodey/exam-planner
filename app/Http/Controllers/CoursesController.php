<?php

namespace App\Http\Controllers;

use App\Course;
use App\Section;
use Illuminate\Support\Facades\Auth;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function admin_index()
    {
        $menu = 'admin.courses';
        return view('admin.courses.index', compact('menu'));
    }

    public function faculty_index()
    {
        $menu = 'faculty.courses';
        $sections = Section::where('user_id', Auth::user()->id)->get()->load('course.school');
        return view('faculty.courses.index', compact('menu', 'sections'));
    }
}
