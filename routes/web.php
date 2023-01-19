<?php

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

use App\Http\Controllers\IndexController;
use App\Http\Middleware\CheckAuth;
use Illuminate\Support\Facades\Route;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
        Route::get('/',[IndexController::class,'index']);
        Route::post('store',[IndexController::class,'store'])->name('store');
        Route::post('delete/{id}',[IndexController::class,'delete'])->name('delete');
        Route::post('/update/{id}',[IndexController::class,'update'])->name('update');
        Route::get('/update/{id}',[IndexController::class,'updateForm']);
        Route::get('register',[IndexController::class,'registerForm']);
        Route::post('/register',[IndexController::class,'createloginForm'])->name('registerLogin');
        Route::get('signup',[IndexController::class,'signUpForm']);
        Route::post('/signup',[IndexController::class,'loginForm'])->name('login');
        // middleware
        Route::group(['middleware' => 'checkAuth'], function() {
            Route::get('/index',[IndexController::class,'indexPage']);
            Route::get('/service',[IndexController::class,'service']);
            Route::get('/service/1',[IndexController::class,'sendMail']);
        });
    });





 
//----------------------------------------------- 1  ------  Section 4 ------
//Route::get('/','IndexController@index');
//Route::get('/',[IndexController::class,'index']);
//Route::get('/index',[IndexController::class,'indexPage']);
//Route::get('/{id}',[IndexController::class,'index']);
//Route::get('/service',[IndexController::class,'service']);
Route::get('/article/{id}',[IndexController::class,'display']);
//----------------------------------------------- End  ------  Section 4 ------

//----------------------------------------------- 1  ------  Section 3 ------
/*
Route::get('/services', function () {
    return view('services');
});
//----------------------------------------------- 2 
Route::get('/articles', function () {
    return view('articles');
});
//Route::get('/article/{id}', function (Request $request,$id) {
//    return view('articles');
//});
Route::get('/article/{id}', function (Request $request,$id) {
    return "Article ID : ". $id;
});
//----------------------------------------------- 3
Route::get('/signup', function () {
    return view('signup');)
});
Route::post('/edit', function () {
    return "Inserted ";
})->name('insert');

Route::get('/edit', function () {
    return "Deleted";
})->name('delete');
//----------------------------------------------- 4
Route::group(['prefix' => 'en' , 'name' => 'management'], function(){
    Route::get('/signup', function () {
        return "Sign Up";
    });
    Route::get('/login', function () {
        return "Login From  ";
    });
});
*/
//----------------------------------------------- End ------  Section 3 ------

//----------------------------------------------- 1  ------  Section 2 ------
/*
Route::get('/', function () {
    return view('welcome');
});
*/
//----------------------------------------------- End  ------  Section 2 ------