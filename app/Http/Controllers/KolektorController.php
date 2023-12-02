<?php

namespace App\Http\Controllers;

use App\kolektor;
use App\debitur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KolektorController extends Controller
{
    public function data(){
        $kolektor = DB::table('kolektor')->paginate(10);
        return view('kolektor.dkolektor', ['kolektor' => $kolektor]);
    }

    public function datadeb($id){
        $kolektor=DB::table('kolektor')->where('id',$id)->first();
        $debitur = DB::table('debitur')->paginate(10);
        return view('kolektor.debiturkol.ddebiturs', ['debitur' => $debitur],['kolektor' => $kolektor]);
    }

    public function datakol(){
        // $kolektor = DB::table('kolektor')->paginate(10);
        return view('kolektor.updatecoordkol');
    }

    public function search(Request $request){
        // kalo misah search mengandung *nama*objekcari, maka hanya mencari dari kolom dalam tanda bintang
		$search = $request->search;
		$kolektor = DB::table('kolektor')
        ->where('kolektor_nama','LIKE',"%".$search."%")
        ->orWhere('kolektor_nomor', 'LIKE', '%' . $search . '%')
        ->orWhere('kolektor_email', 'LIKE', '%' . $search . '%')
        ->orWhere('kolektor_status', 'LIKE', '%' . $search . '%')
        ->paginate(10);
		return view('kolektor.dkolektor', ['kolektor' => $kolektor]);
    }

    public function add(){
        return view('kolektor.akolektor');
    }

    public function simpan(Request $request){
        // dd($request->all());
        // $request->validate([
        //     'name' => 'required',
		// 	'nomor' => 'required|numeric',
		// 	'email' => 'required|unique:kolektor,kolektor_email',
		// 	'status' => 'required'
        // ],[
        //     'required' => 'Kolom :attribute tidak boleh kosong.',
        //     'numeric' => 'Kolom :attribute harus berupa karakter angka.',
        //     'unique' => 'Value kolom :attribute sudah digunakan.'
        // ]);
		DB::table('kolektor')->insert([
			'name' => $request->name,
			'kolektor_nomor' => $request->kolektor_nomor,
            // 'password'=> $request->password,
            'password'=> bcrypt($request->password),
			'kolektor_email' => $request->kolektor_email,
			'kolektor_status' => $request->kolektor_status,
            'latitude' => $request->latitude,
			'longitude' => $request->longitude
		]);
        return redirect('dKolektor')->with('added','Data Kolektor berhasil ditambahkan.');
    }

    public function edit($id){
        // $debitur = DB::table('debitur')->paginate(10);
        $kolektor=DB::table('kolektor')->where('id',$id)->first();
        return view('kolektor.ekolektor', ['kolektor' => $kolektor]);
    }

    public function editcoord($id){
        // $debitur = DB::table('debitur')->paginate(10);
        $kolektor=DB::table('kolektor')->where('id',$id)->first();
        return view('kolektor.updatecoordkol', ['kolektor' => $kolektor]);
    }

    public function update(Request $request, $id){
        // $request->validate([
        //     'name' => 'required',
		// 	'nomor' => 'required|numeric',
		// 	'email' => "required",
		// 	'status' => 'required'
        // ],[
        //     'required' => 'Kolom :attribute tidak boleh kosong.',
        //     'numeric' => 'Kolom :attribute harus berupa karakter angka.',
        //     'unique' => 'Value kolom :attribute sudah digunakan.'
        // ]);
        DB::table('kolektor')->where('id',$id)->update([
            'name' => $request->name,
			'kolektor_nomor' => $request->kolektor_nomor,
            'password'=> bcrypt($request->password),
			'kolektor_email' => $request->kolektor_email,
			'kolektor_status' => $request->kolektor_status,
            'latitude' => $request->latitude,
			'longitude' => $request->longitude
        ]);
        return redirect('dKolektor')->with('updated','Data Kolektor berhasil diperbarui.');
    }

    public function delete($id){
		DB::table('kolektor')->where('id',$id)->delete();	
		return redirect('dKolektor')->with('deleted','Data Kolektor berhasil dihapus.');
	}

    public function updatecoordkol(Request $request, $id){

        // $request->validate([
        //     'name' => 'required',
		// 	'nomor' => 'required|numeric',
		// 	'email' => "required|unique:kolektor,kolektor_email,$id",
		// 	'status' => 'required'
        // ],[
        //     'required' => 'Kolom :attribute tidak boleh kosong.',
        //     'numeric' => 'Kolom :attribute harus berupa karakter angka.',
        //     'unique' => 'Value kolom :attribute sudah digunakan.'
        // ]);
        DB::table('kolektor')->where('id',$id)->update([
            // 'name' => $request->name,
			// 'kolektor_nomor' => $request->Kolektor_nomor,
            'password'=> bcrypt($request->password),
			// 'kolektor_email' => $request->Kolektor_email,
			'kolektor_status' => $request->kolektor_status,
            'latitude' => $request->latitude,
			'longitude' => $request->longitude
        ]);
        return redirect('coordkol')->with('updated','Data Kolektor berhasil diperbarui.');
        
    }
   
    public function datates(){
        $debitur = DB::table('debitur')->paginate(10);
        $kolektor = DB::table('kolektor')->paginate(10);
        return view('kolektor.coordkol',['debitur' => $debitur],['kolektor' => $kolektor]);
    }
    public function rute($id){
        // $debitur = DB::table('debitur')->paginate(10);
        $kolektor = DB::table('kolektor')->paginate(10);
        $debitur = DB::table('debitur')->where('id',$id)->first();
        return view('kolektor.maps', ['debitur' => $debitur],['kolektor' => $kolektor]);
    }
    public function tes(){
        $kolektor = DB::table('kolektor')->paginate(10);
        $debitur = DB::table('debitur')->paginate(10);
        return view('kolektor.maps', ['kolektor' => $kolektor],['debitur' => $debitur]);
    }
    public function dataagunan(){
        $agunan = DB::table('debitur')->paginate(10);
        return view('kolektor.agunankol.dagunankol', ['agunan' => $agunan]);
    }

    public function searchag(Request $request){
        // kalo misah search mengandung *nama*objekcari, maka hanya mencari dari kolom dalam tanda bintang
		$search = $request->search;
		$agunan = DB::table('debitur')
        ->where('no_kontrak','like',"%".$search."%")
        ->orWhere('nama_debitur', 'LIKE', '%' . $search . '%')
        ->orWhere('no_agreement' , 'LIKE', '%' . $search . '%')
        ->orWhere('tgl_kontrak' , 'LIKE', '%' . $search . '%')
        ->orWhere('tgl_berakhir' , 'LIKE', '%' . $search . '%')
        ->orWhere('angsuran_bulan' , 'LIKE', '%' . $search . '%')
        ->orWhere('bunga' , 'LIKE', '%' . $search . '%')
        ->orWhere('tenor' , 'LIKE', '%' . $search . '%')
        ->orWhere('total_pinjaman' , 'LIKE', '%' . $search . '%')
        ->orWhere('sisa_pinjaman' , 'LIKE', '%' . $search . '%')
        ->paginate(10);
		return view('kolektor.agunankol.dagunankol', ['agunan' => $agunan]);
    }
    public function searchdeb(Request $request){
        // kalo misah search mengandung *nama*objekcari, maka hanya mencari dari kolom dalam tanda bintang
		$search = $request->search;
		$debitur = DB::table('debitur')
        ->where('no_kontrak','like',"%".$search."%")
        ->orWhere('nama_debitur', 'LIKE', '%' . $search . '%')
        ->orWhere('no_seluler' , 'LIKE', '%' . $search . '%')
        ->orWhere('no_ktp' , 'LIKE', '%' . $search . '%')
        ->orWhere('alamat_ktp' , 'LIKE', '%' . $search . '%')
        ->orWhere('alamat_tinggal' , 'LIKE', '%' . $search . '%')
        ->orWhere('kelurahan_at' , 'LIKE', '%' . $search . '%')
        ->orWhere('kecamatan_at' , 'LIKE', '%' . $search . '%')
        ->orWhere('provinsi_at' , 'LIKE', '%' . $search . '%')
        ->orWhere('kota_at' , 'LIKE', '%' . $search . '%')
        ->orWhere('no_npwp' , 'LIKE', '%' . $search . '%')
        ->paginate(10);
		return view('kolektor.debiturkol.ddebiturs', ['debitur' => $debitur]);
    }
}

