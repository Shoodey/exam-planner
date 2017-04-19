<?php

namespace App\Http\Controllers;

use App\School;
use App\Section;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestsController extends Controller
{
    public function registrar_index()
    {
        $menu = 'registrar.requests';

        // Get unique courses
        $courses = collect();
        $unique_courses = collect();
        $sections = Section::all();
        foreach ($sections as $section) {
            $unique_courses->push($section->course->load('school'));
        }
        $unique_courses = $unique_courses->unique();
        foreach ($unique_courses as $u) {

            $courses->push(['label' => $u->code . ' ' . $u->name, 'value' => $u->id, 'sections' => $u->sections->load('instructor')->toArray(), 'school' => $u->school->id]);
        }
        $schools = collect();
        $courses->groupBy('school')->each(function ($item, $key) use ($schools) {
            $count = 0;
            foreach($item as $course){
                $count += count($course['sections']);
            }
            $schools->push([
                'name'    => School::find($key)->name,
                'slug'    => School::find($key)->slug,
                'courses' => $item->toArray(),
                'sections_count' => $count
            ]);
        });


        return view('registrar.requests.index', compact('menu', 'schools'));

    }

    public function faculty_index()
    {
        $menu = 'faculty.requests';

        // Get unique courses
        $courses = [];
        $unique_courses = collect();
        $sections = Auth::user()->sections;
        foreach ($sections as $section) {
            $unique_courses->push($section->course);
        }
        $unique_courses = $unique_courses->unique();
        foreach ($unique_courses as $u) {

            array_push($courses, ['label' => $u->code . ' ' . $u->name, 'value' => $u->id, 'sections' => $u->sections->load('instructor')]);
        }
        return view('faculty.requests.index', compact('menu', 'courses'));

    }

    public function faculty_create()
    {
        $menu = 'faculty.requests';

        // Get unique courses
        $courses = [];
        $unique_courses = collect();
        $sections = Auth::user()->sections;
        foreach ($sections as $section) {
            $unique_courses->push($section->course);
        }
        $unique_courses = $unique_courses->unique();
        foreach ($unique_courses as $u) {

            array_push($courses, ['label' => $u->code . ' ' . $u->name, 'value' => $u->id, 'sections' => $u->sections->load('instructor')]);
        }
        return view('faculty.requests.create', compact('menu', 'courses'));
    }
}
