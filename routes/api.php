<?php

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


Route::group(['prefix' => 'v1','middleware' => 'auth:api'], function () {
    //    Route::resource('task', 'TasksController');

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_api_routes
});

Route::get('/users', function(){
    return User::all()->load('role');
});

Route::delete('/users/{id}', function($id){
    User::find($id)->delete();
});

Route::post('/users/{id}', function(Request $request, $id){
    $data = $request->get('user');

    $user = User::findOrFail($id);

    $user->name = $data['name'];
    $user->email = $data['email'];
    $user->role_id = $data['role_id'];
    if(isset($data['password'])){
        $user->password = bcrypt($data['password']);
    }
    $user->save();
});