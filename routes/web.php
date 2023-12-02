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
use App\Http\Livewire\MapLocation;
// use Illuminate\Support\Facades\Route;
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

// Route::get('login', 'UserController@index');
// Route::post('login/auth', 'UserController@authProcess');
// Route::post('/loginpost', 'UserController@authProcess')->name('loginpost');
// Route::post('/loginpost', 'LoginController@authProcess')->name('loginpost');
Route::get('/home', function(){
    return view('home');
});

Route::get('dKolektor','KolektorController@data');
// Route::get('dKolektor','KolektorController@search');
Route::get('dKolektor/add','KolektorController@add');
Route::post('dKolektors','KolektorController@simpan');
Route::get('dKolektor/edit/{id}','KolektorController@edit');
Route::patch('dKolektor/{id}','KolektorController@update');
Route::get('dKolektor/del/{id}','KolektorController@delete');
//update coordinat kolektor
Route::get('coordkol','KolektorController@datakol');
Route::get('debiturkol/{id}','KolektorController@datadeb');
Route::get('updatecoord/{id}','KolektorController@editcoord');
Route::patch('coordkol/{id}','KolektorController@updatecoordkol');
Route::get('dagunankol','KolektorController@dataagunan');
//Angsuran
Route::get('sasDebitur','DebiturController@datas');
Route::get('sdebiturkol','KolektorController@searchdeb');
Route::get('dagunankolsearch', 'KolektorController@searchag');
Route::get('dagunan','AgunanController@data');
Route::get('dagunan/edit/{id}','AgunanController@edit');
// Route::get('dagunan/add','AngsuranController@add');
Route::patch('dagunan/{id}','AgunanController@update');
// Route::get('dagunan/del/{id}','AngsuranController@delete');

//Debitur
Route::get('ddebitur','DebiturController@data');
Route::get('ddebitur/add','DebiturController@add');
Route::post('ddebitur','DebiturController@save');
Route::get('ddebitur/edit/{id}','DebiturController@edit');
Route::patch('ddebitur/{id}','DebiturController@update');
Route::get('ddebitur/del/{id}','DebiturController@delete');
Route::get('ddebiturdet/{id}','DebiturController@detail');
Route::get('sdebitur','DebiturController@search');

//maps
Route::get('mapkolektor', 'MapController@index');
Route::get('detmaps/pilih/{id}', 'MapController@indez');
Route::get('detmaps', 'MapController@indez');
// Route::get('gmaps', 'MapController@mapMaker');
Route::get('gmaps', 'MapController@indep');
Route::get('gmap', 'MapController@indek');
Route::get('detmap/pilih/{id}', 'MapController@detmap');
// Route::get('/api/gmaps', 'Api\ApiSistemController@mapMaker');
// Route::get('gmaps', 'DebiturController@datas');
// Route::get('maps', 'MapController@indem');
// Route::get('maps', 'MapController@distance');
Route::get('route', 'MapController@route');
Route::get('coord/update/{id}', 'KolektorController@editcoord');

Route::get('/tes', function(){
    return view('tes');
});
// Route::get('/loginn', function(){
//     return view('Auth.loginn');
// });

//login super admin
Route::get('/loginadmin', 'LoginController@getLogin');
Route::post('/loginpostadmin', 'LoginController@postLogin')->name('loginpostadmin');
Route::get('/logoutadmin', 'LoginController@logoutadmin');
Route::get('homeadmin', 'LoginController@index');
Route::get('editadmin', 'LoginController@edit');
Route::patch('eadmin/{id}','LoginController@postEdit');

//login kolektor
Route::get('/loginkolektor', 'LoginController@getkol');
Route::post('/loginpostkolektor', 'LoginController@postkol')->name('loginpostkolektor');
Route::get('/logoutkol', 'LoginController@logoutkol');
Route::get('homekolektor', 'LoginController@indexs');

//register super admin
Route::get('/registeradmin', 'LoginController@getRegister');
Route::post('/registerpostadmin', 'LoginController@postRegister')->name('registerpostadmin');

// Route::get('/regist', function(){
//     return view('Admin.register');
// });

Route::get('/tes', 'MapController@tes');
Route::get('/ntes', 'KolektorController@tes');
Route::get('/main', 'HomeController@index')->name('main');
Route::get('/mains', 'HomeController@indexs')->name('mains');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('ddebiturkol','KolektorController@datates');
Route::get('ddebiturkol/{id}','KolektorController@rute');