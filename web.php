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
use Illuminate\Http\Request;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/lol',function(Request $req){
    header("Access-Control-Allow-Origin: *");
    $result = App\Item::all();
    return $result;
});
Route::get('/found',function(){
    header("Access-Control-Allow-Origin: *");
    $result=App\Item::where('status',1)->get();
    return $result;
});

Route::get('/lost',function(){
    header("Access-Control-Allow-Origin: *");
    $result=App\Item::where('status',0)->get();
    return $result;
});
Route::get('/search',function(Request $req){
    header("Access-Control-Allow-Origin: *");
    $result = App\Item::where('title', 'like',  '%'.$req->search.'%')->orWhere('description', 'like', '%'.$req->search.'%')->get();
    // $result =  App\Item::where('found',0)->get();
    return $result;
});
Route::get('/new',function(Request $req){
    header("Access-Control-Allow-Origin: *");
    App\Item::create([
        'title'=>$req->title, 
        'description'=>$req->desc, 
        'contact'=>$req->contc,
        'status'=>1,
        'done'=>0,
    ]);
});
