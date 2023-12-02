<?php

namespace App\Http\Controllers;

use App\kolektor;

use App\debitur;
use Illuminate\Http\Request;
use App\User;
use App\login;
use Auth;
use Illuminate\Support\Facades\DB;
class LoginController extends Controller
{
    public function getLogin(){
        

        return view('Admin.loginq');
        // if (Auth::attempt($request->only('emai','password'))){
        //     return redirect('main');
        // }
        // return redirect('loginq');
    }   
    public function postLogin(Request $request){
        // dd($request->all());
        if (Auth::guard('user')->attempt(['name'=> $request->name, 'password'=> $request->password])){

         
            return view('admin.home')->with('main','Login Berhasil, Selamat Datang...');
        }
        
        return redirect('loginadmin')->with('loginq','Login Admin Gagal, Periksa Kembali NAME dan PASSWORD anda');
        
    }   

    public function getRegister(){
        
        return view('Admin.register');
        
    }   


    public function postRegister(Request $request){

        $request->validate([
			'name' => 'required|min:4',
			// 'email' => 'required|email|unique:users',
			'password' => 'required|min:6|confirmed'
        ],[
            'required' => 'Kolom :attribute tidak boleh kosong.',
            'numeric' => 'Kolom :attribute harus berupa karakter angka.',
            'unique' => 'Value kolom :attribute sudah digunakan.'
        ]);
        DB::table('users')->insert([
            'name' => $request->name,

            'password'=> bcrypt($request->password)
		]);

        return redirect('loginadmin')->with('regist','Register Berhasil');

    }   
    public function logoutadmin(){

        if(Auth::guard('user')->check()){
            
            Auth::guard('user')->logout();
         };

            return redirect('loginadmin')->with('logout','Logout Berhasil, Semoga Harimu Menyenangkan...');
        
        
        // return view('loginadmin');
        
    }   

    public function getkol(){

        
        return view('kolektor.loginkol');
        
    }   

    public function postkol(Request $request){
        //  dd($request->all());
        $kolektor = DB::table('kolektor')->paginate(3);
        $debitur = debitur::all();
        if (Auth::guard('kolektor')->attempt(['name'=> $request->name, 'password'=> $request->password])){

            // return view('kolektor.debiturkol.mapsinfo', ['debitur' => $debitur], ['kolektor' => $kolektor])->with('main','Login Berhasil, Selamat Datang Kolektor...');
            // return view('kolektor')->with('main','Login Berhasil, Selamat Datang Kolektor...');
            return view('kolektor.home')->with('kolektor','Login Berhasil, Selamat Datang Kolektor...');
        }

        return redirect('loginkolektor')->with('loginkol','Login Admin Gagal, Periksa Kembali NAME dan PASSWORD anda');
    }

    public function logoutkol(){

       if(Auth::guard('kolektor')->check()){

          Auth::guard('kolektor')->logout();
       };

        return redirect('loginkolektor')->with('logout','Logout Berhasil, Semoga Harimu Menyenangkan...');

     
        
    }   

    public function index()
    {
        return view('admin.home');
    }
    public function indexs()
    {
        return view('kolektor.home');
    }

    public function edit()
    {
        return view('admin.eadmin');
    }

    public function postEdit(Request $request, $id){
// dd($request->all());
        $request->validate([
			'name' => 'required|min:4',
			// 'email' => 'required|email|unique:users',
			'password' => 'required|min:6|confirmed'
        ],[
            'required' => 'Kolom :attribute tidak boleh kosong.',
            'numeric' => 'Kolom :attribute harus berupa karakter angka.',
            'unique' => 'Value kolom :attribute sudah digunakan.'
        ]);

        DB::table('users')->where('id',$id)->update([
            'name' => $request->name,
            'password'=> bcrypt($request->password),
			
        ]);
        return redirect('admin.home')->with('updated','Data Admin berhasil diperbarui.');

    }

}
