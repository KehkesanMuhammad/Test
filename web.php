<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|kfhdjkfdhk
dfkljsdkljsklsjdklsdjfkl

*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('lang/{locale}',function ($locale){
//     session()->put('locale',$locale);
//     return redirect()->back();
// });


Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => '\App\Http\Controllers\LanguageController@switchLang']);
Route::get('/languageDemo', '\App\Http\Controllers\LanguageController@languageDemo');



Route::get('/newtry', function () {



    // Read File

    $jsonString = file_get_contents(base_path('resources/lang/en.json'));
    echo $jsonString ;
    $data = json_decode($jsonString, true);
    


    // Update Key

    $data['country.title'] = "Change title";
    echo $jsonString ;


    // Write File

    $newJsonString = json_encode($data, JSON_PRETTY_PRINT);

    file_put_contents(base_path('resources/lang/en.json'), stripslashes($newJsonString));



    // Get Key Value

    dd(__('country.title'));

});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
