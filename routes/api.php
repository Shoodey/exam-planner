<?php

use App\Course;
use App\Section;
use App\User;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['prefix' => 'v1', 'middleware' => 'auth:api'], function () {
    //    Route::resource('task', 'TasksController');

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_api_routes
});

Route::group(['prefix' => 'users'], function () {
    Route::get('/', function () {
        return User::all()->load('role', 'author');
    });

    Route::post('/', function (Request $request) {
        $data = $request->get('user');
        $created_by = $request->get('created_by');

        $user = new User();

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->role_id = $data['role_id'];
        $user->password = bcrypt($data['password']);
        $user->created_by = $created_by;

        $user->save();

        return $user->load('role');
    });

    Route::put('{id}', function (Request $request, $id) {
        $data = $request->get('user');

        $user = User::findOrFail($id);

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->role_id = $data['role_id'];
        if (isset($data['password'])) {
            $user->password = bcrypt($data['password']);
        }
        $user->save();
    });

    Route::delete('{id}', function ($id) {
        User::find($id)->delete();
    });
});

Route::group(['prefix' => 'courses'], function () {
    Route::get('/', function () {
        return Course::all()->load('author', 'school');
    });

    Route::post('/', function (Request $request) {
        $data = $request->get('course');
        $created_by = $request->get('created_by');

        $course = new Course();

        $course->code = $data['code'];
        $course->name = $data['name'];
        $course->school_id = $data['school_id'];
        $course->created_by = $created_by;

        $course->save();

        return $course->load('author', 'school');
    });

    Route::put('{id}', function (Request $request, $id) {
        $data = $request->get('course');

        $course = Course::findOrFail($id);

        $course->name = $data['name'];
        $course->code = $data['code'];
        $course->school_id = $data['school_id'];

        $course->save();
    });

    Route::delete('{id}', function ($id) {
        Course::find($id)->delete();
    });
});

Route::group(['prefix' => 'sections'], function () {

    Route::get('/', function () {
        return Section::all()->load('author', 'instructor', 'course.school');
    });

    Route::post('/', function (Request $request) {

        $data = $request->get('section');
        $created_by = $request->get('created_by');

        $section = new Section();

        $section->course_id = $data['course_id'];
        $section->user_id = $data['user_id'];
        $section->students_number = $data['students_number'];
        $section->created_by = $created_by;
        $section->code = sprintf('%02d', Course::find($data['course_id'])->sections->count() + 1);;

        $section->save();

        return $section->load('author', 'instructor', 'course.school');
    });

    Route::put('{id}', function (Request $request, $id) {
        $data = $request->get('section');

        $section = Section::findOrFail($id);

        $section->students_number = $data['students_number'];
        $section->user_id = $data['user_id'];
        $section->course_id = $data['course_id'];
        $section->code = $data['code'];

        $section->save();
    });

    Route::delete('{id}', function ($id) {
        Section::find($id)->delete();
    });
});

Route::get('instructors', function () {
    return User::where('role_id', 4)->get();
});
