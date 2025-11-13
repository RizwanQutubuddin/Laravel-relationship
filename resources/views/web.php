<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JsonController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\RelationshipController;

Route::get('/', function () {
    return view('welcome');
});
//  Relationship
Route::get('one-to-one',[RelationshipController::class, 'oneToOne']);
Route::get('belongs-to-one',[RelationshipController::class, 'belongsTo']);
Route::get('create-student-contact',[RelationshipController::class, 'create']);
Route::get('one-to-many',[RelationshipController::class, 'oneToMany']);
Route::get('belongs-to-many',[RelationshipController::class, 'belongsToMany']);
Route::get('insert-through-relationship',[RelationshipController::class, 'issueBook']);
Route::get('many-to-many',[RelationshipController::class, 'manyToMany']);
Route::get('many-to-many-reverse',[RelationshipController::class, 'manyToManyReverse']);
Route::get('many-to-many-create-update',[RelationshipController::class, 'manyToManyCreate']);
Route::get('has-one-through',[RelationshipController::class, 'hasOneThrough']);
Route::get('has-one-latest',[RelationshipController::class, 'hasOneLatest']);
Route::get('has-one-oldest',[RelationshipController::class, 'hasOneOldest']);
Route::get('has-one-largest',[RelationshipController::class, 'hasOneLargest']);
Route::get('has-one-smallest',[RelationshipController::class, 'hasOneSmallest']);
Route::get('one-to-many-latest-largest-orders',[RelationshipController::class, 'hasManyOrders']);
Route::get('has-many-through',[RelationshipController::class, 'hasManyThrough']);
Route::get('polymorphic',[RelationshipController::class, 'polymorphic']);
Route::get('polymorphic-many',[RelationshipController::class, 'polymorphicMany']);
//  json
Route::get('json',[JsonController::class, 'index']);
Route::get('json-store',[JsonController::class, 'store']);
Route::get('json-update',[JsonController::class, 'json_update']);
Route::get('json-delete',[JsonController::class, 'json_delete']);
// javascript advanced
Route::get('javascript-advanced', function () {
    return view('javascript-advanced');
});
// ======== file or image upload method ========
Route::get('file-upload', function () {
    return view('file-upload');
});

Route::post('image-upload',[ImageController::class, 'imageUpload'])->name('image.upload');
Route::get('image-list',[ImageController::class, 'imageList'])->name('image.list');
Route::delete('image-delete',[ImageController::class, 'imageDelete'])->name('image.delete');
// -----------------------------------
// ========= accessor and mutator ==========
// i have added accessor and mutator in Student model
Route::get('accessor-mutator', function () {
    $student = \App\Models\Student::find(1);

    // accessor in action
    return $student->name;

});
// ================= Component =======================
Route::get('components', function () {
    return view('components');   
});
// =================Dynamic Component =======================
Route::get('dynamic-component', function () {
    return view('dynamic-component');   
});
// ================= Slots =======================
Route::get('slots', function () {
    return view('slots');   
});

// ================= annonimous component =======================
Route::get('annonimous-component', function () {
    return view('annonimous-component');   
});

// ================= User Authentication =======================
Route::get('user-authentication', function () {
    return view('user-authentication');   
});
Route::view('user-register','user-register')->name('user.register');

Route::post('user-register',[UserController::class, 'register'])->name('user.register');
Route::post('user-login',[UserController::class, 'login'])->name('user.login');
Route::post('user-logout',[UserController::class, 'logout'])->name('user.logout');

// ================ read text file ====================
Route::get('text-read',function(){
    return file_get_contents("C:\Users\Administrator\Downloads\mongodb-key-pair.pem");
});