<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mycontroller;
use App\Http\Controllers\Clientcontroller;
use App\Http\Controllers\Studentcontroller;


Route::post('insertStudent',[StudentController::class,'store'])->name('insertStudent');
Route::get('dataentryform',[StudentController::class,'create']);

Route::post('insertClient',[ClientController::class,'store'])->name('insertClient');
Route::get('form2',[ClientController::class,'create']);

Route::get('test20',[Mycontroller::class,'my_data']);

Route::get('/', function () {
    return view('welcome');
});

/*Route::post('recform1',function(){
    return 'Data recieved';
})->name('recieveform1');*/

/*Route::get('shrouk/{id?}', function ($id=0) {
    return 'welcome to my website ' . $id;
})->whereNumber('id');*/
//->where(['id' => '[0-9]+']) 

// Route::get('course/{name}', function ($name) {
//     return 'My name is: ' . $name;
// })->whereAlpha('name');

// Route::get('project/{name}', function ($name) {
//     return 'My name is: ' . $name;
// })->whereIn('name',['Shrouk','Omar','Aly']);

// Route::prefix('cars')->group(function(){
//     Route::get('bmw',function(){
//         return "Category is BMW";
//     });
//     Route::get('mercedis',function(){
//         return "Category is Mercedis";
//     });

// });

/*Route::fallback(function(){
   // return 'The required is not found';
    return redirect('/');
});*/

/*Route::get('test',function(){
    return view('test');
});
*/


// this part for form1 and task
Route::post('recform1',[Mycontroller::class,'receiveForm1'])->name('recieveform1');

Route::get('page2', function () {
    return view('page2');
})->name('page2');

Route::get('form1',function(){
    return view('form1');
});
//the end of the form1 and task
