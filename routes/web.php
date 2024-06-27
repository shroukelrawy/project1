<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Http\Controllers\Clientcontroller;
use App\Http\Controllers\Studentcontroller;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ContactUSController;
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
Route::get("form1",[MyController::class,'info']);

Route::post('insertclient', [Clientcontroller::class,'store'])->name('insertclient');
Route::get('clientForm', [Clientcontroller::class, 'create'])->name('clientForm');
Route::get('clients', [Clientcontroller::class, 'index'])->middleware('verified')->name('clients');
Route::get('editClient/{id?}', [Clientcontroller::class, 'edit'])->name('editClient');
Route::put('updateClient/{id?}', [Clientcontroller::class, 'update'])->name('updateClient');
Route::get('showClient/{id?}', [Clientcontroller::class, 'show'])->name('showClient');
Route::delete('deleteClient', [Clientcontroller::class, 'destroy'])->name('deleteClient');
Route::delete('forceDeleteClient', [Clientcontroller::class, 'force'])->name('forceDeleteClient');
Route::get('trashClient', [Clientcontroller::class, 'trash'])->name('trashClient');
Route::get('restoreClient/{id?}', [Clientcontroller::class, 'restore'])->name('restoreClient');
/*
Route::post('insertstudent', [Studentcontroller::class, 'store'])->name('insertstudent');
Route::get('studentForm', [Studentcontroller::class, 'create'])->name('studentForm');
Route::get('students', [Studentcontroller::class, 'index'])->name('students');
Route::get('showStudent/{id}', [Studentcontroller::class, 'show'])->name('showStudent');
Route::get('editStudent/{id}', [Studentcontroller::class, 'edit'])->name('editStudent');
Route::put('updateStudent/{id}', [Studentcontroller::class, 'update'])->name('updateStudent');
Route::delete('deleteStudent/{id}', [Studentcontroller::class, 'destroy'])->name('deleteStudent');
Route::get('trashStudent', [Studentcontroller::class, 'trash'])->name('trashStudent');
Route::get('restoreStudent/{id?}', [Studentcontroller::class, 'restore'])->name('restoreStudent');
Route::delete('forceDeleteStudent', [Studentcontroller::class, 'force'])->name('forceDeleteStudent');

Route::get('teachers', [TeacherController::class, 'index'])->name('teachers');
Route::get('showTeacher/{id}', [TeacherController::class, 'show'])->name('showTeacher');
Route::get('editTeacher/{id}', [TeacherController::class, 'edit'])->name('editTeacher');
Route::delete('deleteTeacher/{id}', [TeacherController::class, 'destroy'])->name('deleteTeacher');

Route::get('mysession', [MyController::class, 'myVal']);
Route::get('oncesession', [MyController::class, 'onceVal']);
Route::get('restoresession', [MyController::class, 'restoreVal']);
Route::get('deletesession', [MyController::class, 'deleteVal']);
Route::get('sendclientmail', [MyController::class, 'sendClientMail']);*/

/*Route::get('contact-us', 'ContactUSController@contactUS');
Route::post('contact-us', ['as'=>'contactus.store','uses'=>'ContactUSController@contactUSPost']);
*/

Route::get('contact-us', [ContactUSController::class, 'contactUS'])->name('contactus.get');
Route::post('contact-us', [ContactUSController::class, 'contactUSPost'])->name('contactus.store');
Route::get('/', function () {
    return view('welcome');
});
/*Route::get('May/{id?}', function ($id =0) {
    return ('welcome to the fist page'. $id);
})->whereNumber('id');
#->where(['id' => '[0-9]+']);*/
/*Route::get('course/{name}', function ($name) {
    return ('My name is '. $name);
})->whereAlpha('name');*/
/*Route::get('course/{name}', function ($name) {
    return ('My name is '. $name);
})->whereIn('name',['may','mohamed','doaa','safaa']);*/

Route::prefix('cars')->group(function() {
    Route::get('bmw', function () {
        return 'category is BMW';
    });
    Route::get('mercedes', function () {
        return 'category is Mercedes';
    });
});
/*
Route::fallback(function() {
   // return "the page not found";
   return redirect('/');
});*/
/*Route::get('test',function(){
    return view("test");

});*/
/*
Route::get('form1', function () {
    return view("form1");
});
*/
Route::post('recform1', function () {
    $fname = request('fname'); 
    $lname = request('lname'); 
    return $fname . ' ' . $lname; 
})->name('receiveform1');

Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    });