<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mycontroller;
use App\Http\Controllers\Clientcontroller;
use App\Http\Controllers\Studentcontroller;


Route::post('insertStudent',[StudentController::class,'store'])->name('insertStudent');
Route::get('addstudent',[StudentController::class,'create'])->name('addStudent');
Route::get('students',[StudentController::class,'index'])->name('students');
Route::get('editstudent/{id}',[StudentController::class,'edit'])->name('editstudent');
Route::put('updatestudent/{id}',[StudentController::class,'update'])->name('updatestudent');
Route::get('showstudent/{id}',[StudentController::class,'show'])->name('showstudent');
Route::delete('deletestudent',[StudentController::class,'destroy'])->name('deletestudent');
Route::delete('forcedeletestudent',[StudentController::class,'force'])->name('forcedeletestudent');
Route::get('trashstudent',[StudentController::class,'trash'])->name('trashstudent');
Route::get('restorestudent/{id}',[StudentController::class,'restore'])->name('restorestudent');


Route::post('insertClient',[ClientController::class,'store'])->name('insertClient');
Route::get('addclient',[ClientController::class,'create'])->name('addClient');
Route::get('clients',[ClientController::class,'index'])->name('clients');
Route::get('editclient/{id}',[ClientController::class,'edit'])->name('editclients');
Route::put('updateclient/{id}',[ClientController::class,'update'])->name('updateclients');
Route::get('showclient/{id}',[ClientController::class,'show'])->name('showclient');
Route::delete('delclient',[ClientController::class,'destroy'])->name('delclient');
Route::delete('forcedelete',[ClientController::class,'force'])->name('forcedelete');
Route::get('trashclient',[ClientController::class,'trash'])->name('trashclient');
Route::get('restoreclient/{id}',[ClientController::class,'restore'])->name('restoreclient');


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
