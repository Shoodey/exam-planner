<?php

namespace App\Http\Controllers;

use App\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestsController extends Controller
{
    public function faculty_index(){
        $menu = 'faculty.requests';

        // Get unique courses
        $courses = [];
        $unique_courses = collect();
        $sections = Auth::user()->sections;
        foreach ($sections as $section){
            $unique_courses->push($section->course);
        }
        $unique_courses = $unique_courses->unique();
        foreach ($unique_courses as $u){

            array_push($courses, ['label' => $u->code . ' ' .$u->name, 'value' => $u->id, 'sections' => $u->sections->load('instructor')]);
        }
        return view('faculty.requests.index', compact('menu', 'courses'));

    }

    public function faculty_create(){
        $menu = 'faculty.requests';

        // Get unique courses
        $courses = [];
        $unique_courses = collect();
        $sections = Auth::user()->sections;
        foreach ($sections as $section){
           $unique_courses->push($section->course);
        }
        $unique_courses = $unique_courses->unique();
        foreach ($unique_courses as $u){

            array_push($courses, ['label' => $u->code . ' ' .$u->name, 'value' => $u->id, 'sections' => $u->sections->load('instructor')]);
        }
        return view('faculty.requests.create', compact('menu', 'courses'));
    }
}
