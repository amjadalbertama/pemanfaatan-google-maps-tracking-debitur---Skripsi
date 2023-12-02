<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Livewire\MapLocation;
use Validator;
use Auth;
use App\debitur;
use App\kolektor;
use App\Api\mapMaker;

class MapController extends Controller
{
    public function index(){
        $kolektor = kolektor::all();
        $debitur = debitur::all();
        // $debitur = DB::table('debitur')->paginate(10);
        return view('kolektor.debiturkol.mapsinfo', ['debitur' => $debitur], ['kolektor' => $kolektor]);
    }

    public function indez($id){
        // $kolektor = DB::table('kolektor')->paginate(3);
        $kolektor=DB::table('kolektor')->where('id',$id)->first();
        // $kolektor = kolektor::all();
        $debiturs = debitur::all();
        $debitur = DB::table('debitur')->paginate(3);
        return view('kolektor.detmaps', ['kolektor' => $kolektor], ['debitur' => $debitur]);
    }

    public function indem(){
        // $kolektors = kolektor::all();
        $kolektor = DB::table('kolektor')->paginate(3);
        $debitur = debitur::all();
        // $debitur = DB::table('debitur')->paginate(10);
        return view('kolektor.maps', ['debitur' => $debitur], ['kolektor' => $kolektor]);
    }

    public function route(){
        return view('routing');
    }
    public function tes(){
        return view('kolektor.routingn');
    }

    public function indep(){
        $kolektor = DB::table('kolektor')->paginate(3);
        $debitur = debitur::all();
        
        return view('kolektor.gmaps', ['debitur' => $debitur], ['kolektor' => $kolektor]);
    }

    public function indek(){
        $kolektor = DB::table('kolektor')->paginate(3);
        $debitur = debitur::all();
        
        return view('kolektor.debiturkol.mapsinfo', ['debitur' => $debitur], ['kolektor' => $kolektor]);
    }

    // public function detmaps($id){
    //     $kolektor= DB::table('kolektor')->where('id',$id)->first();
    //     $debitur= debitur::all();
    //     return view('kolektor.detmaps', ['debitur' => $debitur], ['kolektor' => $kolektor]);
    // }

    public function detmap($id){
        $kolektor= DB::table('kolektor')->where('id',$id)->first();
        $debitur= debitur::all();
        return view('kolektor.debiturkol.detmapskol', ['debitur' => $debitur], ['kolektor' => $kolektor]);
    }

   

    public function addcoods(){
        $debitur = debitur::all();
        return view('kolektor.gmaps', ['debitur' => $debitur]);
    }

    public function mapMaker(){
        // $debitur = DB::table('debitur')->paginate(10);
        // return view('kolektor.gmaps', ['debitur' => $debitur]);

        $loc = Location::all();
        $map_markes = array();
        foreach ($loc as $key => $location){
            $map_markes[] = (object)array(
                'no_kontrak' => $location->no_kontrak,
                'nama_debitur'=> $location->nama_debitur, 
                'tgl_lahir'=> $location->tgl_lahir, 
                'kelamin'=> $location->kelamin, 
                'usia'=> $location->usia,       
                'no_telepon'=> $location->no_telepon, 
                'pekerjaan'=> $location->pekerjaan,
                'pendapatan_perbulan'=> $location->pendapatan_perbulan,
                'no_ktp'=> $location->no_ktp, 
                'no_npwp'=> $location->no_npwp,
                'status_perkawinan'=> $location->status_perkawinan,
                'alamat_ktp'=> $location->alamat_ktp,
                'alamat_domisili'=> $location->alamat_domisili,
                'status_hunian'=> $location->status_hunian,
                'lama_tinggal'=> $location->lama_tinggal,
                'latitude'=> $location->latitude,
                'longitude'=> $location->longitude,
            );
        }
        return response()->json($map_markes);
    }
}
