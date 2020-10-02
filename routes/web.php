<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

/*
 * 
 *  Route::any('products/search',        'ProductController@search')->name('products.search')->middleware('auth');*/
  //  Route::resource('products', 'HomeController')->middleware(['auth', 'check.is.admin']);
 

Route::get('/','Homecontroller@index')->name('index');


/*  JSON Routes  */
Route::get('state/all_cities','StateController@getAllCities')->name('state.all_cities');



/** ADMIN */
Route::group([
    'middleware'=> ['auth'],
    //
    'prefix' => 'admin',
    //'namespace' => 'Admin',
   // 'name' => 'admin.' /** not working */
],function(){
    Route::get('/', function () {
        return view('admin.index');
    });

    /**
     * DICAS ROTAS
     * - colocar em primeiro rotas que não possue variavel para evitar conflito
     * 
     *   ex; Route:get('usuario/novo, function(){})
     *   ex; Route:get('usuario/{user}, function(){})
     */

     /**
      *     DICAS CONTROLLER
      *///php artisan make:controller --resource    (cria o controller com todos metodos padrões ex. create, edti, show etc e tal)

    /**
     *   ABOUTS Routes
     */
    Route::group([
        'prefix' => 'about'       
    ],function(){
        Route::get('/', 'AboutController@index')->name('about.index');
        Route::get('/create', 'AboutController@create')->name('about.create');
        Route::get('/edit/{about}', 'AboutController@edit')->name('about.edit');
        Route::post('/store', 'AboutController@store')->name('about.store');
        Route::put('/update/{about}', 'AboutController@update')->name('about.update');
        Route::delete('/destroy/{about}', 'AboutController@destroy')->name('about.destroy');
    });

    Route::group([
        'prefix' => 'education'
    ],function(){
        Route::get('/','EducationController@index')->name('education.index');
        Route::get('/show/{education}','EducationController@show')->name('education.show');
        Route::get('/create','EducationController@create')->name('education.create');
        Route::post('/store', 'EducationController@store')->name('education.store');
        Route::get('/edit/{education}','EducationController@edit')->name('education.edit');
        Route::put('/update/{education}', 'EducationController@update')->name('education.update');
        Route::delete('/destroy/{education}', 'EducationController@destroy')->name('education.destroy');
    });

    Route::resource('experience', 'ExperienceController');

    Route::resource('skill', 'SkillController');
    Route::resource('social_media', 'SocialMediaController');
    Route::resource('my_social_media', 'ProfileHasSocialMediaController');
    Route::resource('my_skill', 'ProfileHasSkillController');
    Route::resource('user','UserController');

    Route::get('my_profile', 'ProfileController@index')->name('my_profile');
    Route::post('my_profile/{profile}', 'ProfileController@update')->name('my_profile.update');

    Route::get('logout-custom', function(){
        Auth::logout();
        return redirect("/admin");
    })->name('home.logout');

        
/**
 *       DICAS - Comando Artisan
 */
//  php artisan make:model -mcr 
//  -mcr cira migration, controller  eresources (funcions on conto)



    
  /*
    Route::get('about', 'AboutController@index')->name('about.index');
    Route::get('about/create', 'AboutController@create')->name('about.create');
    Route::get('about/edit/{about}', 'AboutController@edit')->name('about.edit');
    Route::post('about/store', 'AboutController@store')->name('about.store');
  */
    /** PUT/PATCH Verb: to save Edited  */
    // 

    /** DELETE Verb */
    //
});  //END ROUTE GROUP ADMIN


Auth::routes(['register' => false]); //desabilita Auth para pagina Register (padrão do scafoldin Laravel)