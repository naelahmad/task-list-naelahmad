<?php
use Illuminate\Http\Request;

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

Route::get('/', function () {
    return view('welcome');
});

Route::post('task',function(Request $request){
DB::table('tasks')->insert([
'name'=>$request->name,
'created_at'=>now(),
'updated_at'=>now()
]);
return 'Done';
});