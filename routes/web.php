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

/***************************************** web Middleware **********************************************/




Route::group(['middleware'=>['web']], function (){

    Route::get('/admin/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/admin/login','Auth\AdminLoginController@login')->name('Admin.login.submit');
    Route::get('/admin', ['uses'=>'Auth\AdminController@index'])->name('admin.dashboard');

    Route::get('/profile', ['uses'=>'PageController@getProfile','as'=>'profile.getProfile']);
    Route::get('/profile/edit',['uses'=>'BlogController@editProfile','as'=>'profile.edit']);
    Route::post('/profile/edit',['uses'=>'BlogController@updateProfile','as'=>'profile.update']);
    
    Route::resource('comment','CommentController');
    Route::get('/comment/{id}/delete',['uses'=>'CommentController@delete','as'=>'comment.delete']);
    
    Route::resource('tag',"TagController")->except('create');//creation du crud des Tag
    
    Route::resource('categories',"CategoriesController")->except('create','show','edit','update');//creation du crud des categories

    //Login authentication
    Route::get('login', 'Auth\LoginController@showLoginForm');
    Route::post('login', 'Auth\LoginController@Login');
    Route::get('logout', 'Auth\LoginController@Logout');
    //register authentication
    Route::get('register', 'Auth\RegisterController@showRegistrationForm');
    Route::post('register', 'Auth\RegisterController@Register');
    /** **/
    
    Route::get('blog/{slug}', ['as'=>'blog.single','uses'=>'BlogController@getSingle'])
    ->where('slug','[\w\d\-\_]+');

    Route::get('contact', 'PageController@getContact');
    Route::post('contact', 'PageController@postContact');

    Route::get('/', 'PageController@getIndex');
    Route::get('accueil', ['uses'=>'PageController@getAccueil', 'as'=>'accueil']);
    Route::get('about', 'PageController@getAbout');
    Route::resource('post',"postCrudController");//creation du CRUD les Noms des Routes
    Auth::routes();
    Route::get('/home', 'HomeController@index')->name('home');
        
});

/*******************************************************************************************************/
