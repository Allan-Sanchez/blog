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
// ruta para diseñar la vista de los mensajes
//  Route::get('email', function () {
//     return  new App\Mail\LoginCredentials(App\User::first(),'asd554');
//  });

Route::get('/','PagesController@home')->name('pages.home');
Route::get('nosotros', 'PagesController@about')->name('pages.about');
Route::get('archivo', 'PagesController@archive')->name('pages.archive');
Route::get('contacto', 'PagesController@contact')->name('pages.contact');



Route::get('blog/{post}', 'PostsController@show')->name('posts.show');
Route::get('categorias/{category}', 'CategoriasController@show')->name('categorias.show');
Route::get('tags/{tag}', 'TagsController@show')->name('tags.show');




Route::group(['prefix' => 'admin', 'namespace'=> 'Admin', 'middleware'=> 'auth'],function(){
    //rutas de administracion
    Route::get('/', 'PostController@verific_admin')->name('dashboard');

    Route::resource('posts','PostController',['except'=>'show','as'=>'admin']);
    Route::resource('users','UserController',['as'=>'admin']);    
    Route::resource('roles','RoleController',['except'=>'show','as'=>'admin']);    
    Route::resource('permissions','PermissionController',['only'=>['index','edit','update'],'as'=>'admin']);    

    Route::middleware('role:Admin')->put('users/{user}/roles', 'UsersRoleController@update')->name('admin.users.roles.update');
    Route::middleware('role:Admin')->put('users/{user}/permissions', 'UsersPermissionController@update')->name('admin.users.permissions.update');


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