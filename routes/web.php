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

Route::get('/','PagesController@home');
Route::get('blog/{post}', 'PostsController@show')->name('posts.show');
Route::get('categorias/{category}', 'CategoriasController@show')->name('categorias.show');
Route::get('tags/{tag}', 'TagsController@show')->name('tags.show');




Route::group(['prefix' => 'admin', 'namespace'=> 'Admin', 'middleware'=> 'auth'],function(){
    //rutas de administracion
    Route::get('/', 'PostController@verific_admin')->name('dashboard');
    Route::get('posts', 'PostController@index')->name('admin.posts.index');
    Route::get('posts/create', 'PostController@create')->name('admin.posts.create');
    Route::post('posts', 'PostController@store')->name('admin.posts.store');
    Route::get('posts/{post}', 'PostController@edit')->name('admin.posts.edit');
    Route::put('posts/{post}', 'PostController@update')->name('admin.posts.update');
    Route::delete('posts/{post}', 'PostController@destroy')->name('admin.posts.destroy');
    // ruta para la carga de imganes
    Route::post('posts/{post}/photos', 'PhotosController@store')->name('admin.posts.photos.store');
    Route::delete('photos/{photo}','PhotosController@destroy')->name('admin.photos.destroy');

});



// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');


Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');












// Route::get('/post', function () {
//     return App\Post::all();
// });


// Route::get('admin', function () {
//     return view('admin.dashboard');
// });

// Route::get('home', function () {
//     return view('admin.dashboard');
// })->middleware('auth');
// Route::auth();








/*
**	@Aqui agregaremos todas las nueva cosas
    ==== latest('published_at')  ==== latest ordena por la fecha de creacion
*/