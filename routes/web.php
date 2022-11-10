<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('home',function(){
    return 'Welcome To Home Page';
});
// Redirect Routes
Route::redirect('/','/home');
// View Routes
Route::view('user','user',['name' => "Omor Faruk"]);
// Route Parameters  
Route::get('user/{user_id}/post/{post_id}', function($userid,$postid){
    return "User Id ". $userid . " Post Id ".$postid;
});
// Optional Parameters with Regular Expression Constraints
Route::get('user-name/{name?}/{id?}',function($name='Omor Faruk',$id = 0){
    return "User Name " .$name. " User Id " .$id;
})->whereNumber('id')->whereAlpha('name');
// Named Routes with prefix and group
Route::group(['prefix' => 'user'], function(){
    Route::get('/profile', function () {
        return "User Profile";
    })->name('profile');
    // Routing to a Single Controller Method
    Route::get('list',[UserController::class,'index']);

});


Route::get('post',[PostController::class,'post']);