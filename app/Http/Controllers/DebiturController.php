<?php

namespace App\Http\Controllers;

use App\debitur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DebiturController extends Controller
{
    public function data(){
        $debitur = DB::table('debitur')->paginate(10);
        return view('debitur.ddebitur', ['debitur' => $debitur]);
    }

    public function datas(){
        $debitur = DB::table('debitur')->paginate(10);
        return view('debitur.sasdebitur', ['debitur' => $debitur]);
    }


    public function search(Request $request){
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
		return view('debitur.ddebitur', ['debitur' => $debitur]);
    }

    public function add(){
        return view('debitur.adebitur');
    }

    public function save(Request $request){
        
        // dd($request->all());
        $request->validate([
            'no_kontrak' => 'required|unique:debitur|numeric',
            'nama_debitur'=> 'required',
            'tgl_lahir'=> 'required',   
            'kelamin'=> 'required',
            'no_ktp'=> 'required|unique:debitur|numeric',
            'no_npwp'=> 'required|unique:debitur|numeric',
            'kewarganegaraan'=> 'required',
            'status_perkawinan'=> 'required',
            'jmlh_tanggungan'=> 'required|numeric',
            'pendidikan_terakhir'=> 'required',
            'alamat_ktp'=> 'required',
            'kelurahan'=> 'required',
            'kecamatan'=> 'required',
            'kota'=> 'required',
            'provinsi'=> 'required',
            'kodepos'=> 'required|numeric',
            'alamat_tinggal'=> 'required',
            'kelurahan_at'=> 'required',
            'kecamatan_at'=> 'required', 
            'kota_at'=> 'required',
            'provinsi_at'=> 'required',
            'kodepos_at'=> 'required|numeric',
            'status_hunian'=> 'required',
            'lama_tinggal_thn'=> 'required',
            'lama_tinggal_bln'=> 'required',
            'email'=> 'required|unique:debitur',
            'no_seluler'=> 'required|unique:debitur|numeric',
            'no_telp_rumah'=> 'required|unique:debitur|numeric',
            'nama_ibu_kandung'=> 'required',
            'latitude'=> 'required|numeric',
            'longitude'=> 'required|numeric',
            'no_agreement' => 'required|unique:debitur|numeric',
            'tgl_kontrak' => 'required',
            'tgl_berakhir' => 'required',
            'bunga' => 'required|numeric',
            'tenor' => 'required|numeric',
            'angsuran_bulan' => 'required|numeric',
            'total_pinjaman' => 'required|numeric',
            'sisa_pinjaman' => 'required|numeric',
            'kolektabilitas' => 'required',
            
        ],[
            'required' => 'Kolom :attribute tidak boleh kosong.',
            'numeric' => 'Kolom :attribute harus berupa karakter angka.',
            'unique' => 'Value kolom :attribute sudah digunakan.'
        ]);
		$v = DB::table('debitur')->insert([
            'no_kontrak' => $request->no_kontrak,
            'nama_debitur'=> $request->nama_debitur, 
            'tgl_lahir'=> $request->tgl_lahir,    
            'kelamin'=> $request->kelamin, 
            'no_ktp'=> $request->no_ktp, 
            'no_npwp'=> $request->no_npwp, 
            'kewarganegaraan'=> $request->kewarganegaraan, 
            'status_perkawinan'=> $request->status_perkawinan,
            'jmlh_tanggungan'=> $request->jmlh_tanggungan, 
            'pendidikan_terakhir'=> $request->pendidikan_terakhir, 
            'alamat_ktp'=> $request->alamat_ktp,
            'kelurahan'=> $request->kelurahan, 
            'kecamatan'=> $request->kecamatan, 
            'kota'=> $request->kota, 
            'provinsi'=> $request->provinsi, 
            'kodepos'=> $request->kodepos, 
            'alamat_tinggal'=> $request->alamat_tinggal,
            'kelurahan_at'=> $request->kelurahan_at, 
            'kecamatan_at'=> $request->kecamatan_at, 
            'kota_at'=> $request->kota_at, 
            'provinsi_at'=> $request->provinsi_at, 
            'kodepos_at'=> $request->kodepos_at, 
            'status_hunian'=> $request->status_hunian,
            'lama_tinggal_thn'=> $request->lama_tinggal_thn,
            'lama_tinggal_bln'=> $request->lama_tinggal_bln,
            'email'=> $request->email,
            'no_seluler'=> $request->no_seluler,
            'no_telp_rumah'=> $request->no_telp_rumah,
            'nama_ibu_kandung'=> $request->nama_ibu_kandung,
            'latitude'=> $request->latitude,
            'longitude'=> $request->longitude,
            'no_agreement' => $request->no_agreement,
            'tgl_kontrak'=> $request->tgl_kontrak,    
            'tgl_berakhir'=> $request->tgl_berakhir, 
            'bunga'=> $request->bunga, 
            'tenor'=> $request->tenor, 
            'angsuran_bulan'=> $request->angsuran_bulan, 
            'total_pinjaman'=> $request->total_pinjaman, 
            'sisa_pinjaman'=> $request->sisa_pinjaman, 
            'kolektabilitas'=> $request->kolektabilitas 
           
		]);
        // dd($v);
        return redirect('ddebitur')->with('added','Data debitur berhasil ditambahkan.');
    }

    public function edit($id){
        $kolektor=DB::table('kolektor')->where('id',$id)->first();
        $debitur=DB::table('debitur')->where('id',$id)->first();
        return view('debitur.edebitur', ['debitur' => $debitur],['kolektor' => $kolektor]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'no_kontrak' => 'required|numeric',
            'nama_debitur'=> 'required',
            'tgl_lahir'=> 'required',   
            'kelamin'=> 'required',
            'no_ktp'=> 'required|numeric',
            'no_npwp'=> 'required|numeric',
            'kewarganegaraan'=> 'required',
            'status_perkawinan'=> 'required',
            'jmlh_tanggungan'=> 'required|numeric',
            'pendidikan_terakhir'=> 'required',
            'alamat_ktp'=> 'required',
            'kelurahan'=> 'required',
            'kecamatan'=> 'required',
            'kota'=> 'required',
            'provinsi'=> 'required',
            'kodepos'=> 'required|numeric',
            'alamat_tinggal'=> 'required',
            'kelurahan_at'=> 'required',
            'kecamatan_at'=> 'required', 
            'kota_at'=> 'required',
            'provinsi_at'=> 'required',
            'kodepos_at'=> 'required|numeric',
            'status_hunian'=> 'required',
            'lama_tinggal_thn'=> 'required',
            'lama_tinggal_bln'=> 'required',
            'email'=> 'required',
            'no_seluler'=> 'required|numeric',
            'no_telp_rumah'=> 'required|numeric',
            'nama_ibu_kandung'=> 'required',
            'latitude'=> 'required|numeric',
            'longitude'=> 'required|numeric',
            // 'no_agreement' => 'required|unique:debitur|numeric',
            // 'tgl_kontrak' => 'required',
            // 'tgl_berakhir' => 'required',
            // 'bunga' => 'required|numeric',
            // 'tenor' => 'required|numeric',
            // 'angsuran_bulan' => 'required|numeric',
            // 'total_pinjaman' => 'required|numeric',
            // 'sisa_pinjaman' => 'required|numeric',
            // 'kolektabilitas' => 'required',
        ],[
            'required' => 'Kolom :attribute tidak boleh kosong.',
            'numeric' => 'Kolom :attribute harus berupa karakter angka.',
            'unique' => 'Value kolom :attribute sudah digunakan.'
        ]);
        DB::table('debitur')->where('id',$id)->update([
            'no_kontrak' => $request->no_kontrak,
            'nama_debitur'=> $request->nama_debitur, 
            'tgl_lahir'=> $request->tgl_lahir,    
            'kelamin'=> $request->kelamin, 
            'no_ktp'=> $request->no_ktp, 
            'no_npwp'=> $request->no_npwp, 
            'kewarganegaraan'=> $request->kewarganegaraan, 
            'status_perkawinan'=> $request->status_perkawinan,
            'jmlh_tanggungan'=> $request->jmlh_tanggungan, 
            'pendidikan_terakhir'=> $request->pendidikan_terakhir, 
            'alamat_ktp'=> $request->alamat_ktp,
            'kelurahan'=> $request->kelurahan, 
            'kecamatan'=> $request->kecamatan, 
            'kota'=> $request->kota, 
            'provinsi'=> $request->provinsi, 
            'kodepos'=> $request->kodepos, 
            'alamat_tinggal'=> $request->alamat_tinggal,
            'kelurahan_at'=> $request->kelurahan_at, 
            'kecamatan_at'=> $request->kecamatan_at, 
            'kota_at'=> $request->kota_at, 
            'provinsi_at'=> $request->provinsi_at, 
            'kodepos_at'=> $request->kodepos_at, 
            'status_hunian'=> $request->status_hunian,
            'lama_tinggal_thn'=> $request->lama_tinggal_thn,
            'lama_tinggal_bln'=> $request->lama_tinggal_bln,
            'email'=> $request->email,
            'no_seluler'=> $request->no_seluler,
            'no_telp_rumah'=> $request->no_telp_rumah,
            'nama_ibu_kandung'=> $request->nama_ibu_kandung,
            'latitude'=> $request->latitude,
            'longitude'=> $request->longitude,
            // 'no_agreement' => $request->no_agreement,
            // 'tgl_kontrak'=> $request->tgl_kontrak,    
            // 'tgl_berakhir'=> $request->tgl_berakhir, 
            // 'bunga'=> $request->bunga, 
            // 'tenor'=> $request->tenor, 
            // 'angsuran_bulan'=> $request->angsuran_bulan, 
            // 'total_pinjaman'=> $request->total_pinjaman, 
            // 'sisa_pinjaman'=> $request->sisa_pinjaman, 
            // 'kolektabilitas'=> $request->kolektabilitas 
        ]);
        return redirect('ddebitur')->with('updated','Data debitur berhasil diperbarui.');
    }

    public function delete($id){
		DB::table('debitur')->where('id',$id)->delete();	
		return redirect('ddebitur')->with('deleted','Data debitur berhasil dihapus.');
	}
    public function detail($id){
        $kolektor=DB::table('kolektor')->where('id',$id)->first();
        $debitur=DB::table('debitur')->where('id',$id)->first();
        return view('kolektor.debiturkol.detdebitur', ['debitur' => $debitur],['kolektor' => $kolektor]);
    }
   
}

//serepan
// public function save(Request $request){
//     $request->validate([
//         'no_kontrak' => 'required|unique:debitur|numeric',
//         'nama_debitur' => 'required',
//         'tgl_lahir' => 'required',
//         'kelamin' => 'required',
//         'usia' => 'required',
//         'no_telepon' => 'required|numeric',
//         'pekerjaan' => 'required',
//         'pendapatan_perbulan' => 'required|numeric',
//         'no_ktp' => 'required|numeric',
//         'no_npwp' => 'required|numeric',
//         'status_perkawinan' => 'required',
//         'alamat_ktp' => 'required',
//         'alamat_domisili' => 'required',
//         'status_hunian' => 'required',
//         'lama_tinggal' => 'required',
//         'latitude' => 'required',
//         'longitude' => 'required',
//         'no_agreement' => 'required|numeric|unique:angsuran',
//         'tgl_kontrak' => 'required',
//         'tgl_berakhir' => 'required',
//         'bunga' => 'required',
//         'tenor' => 'required',
//         'angsuran_bulan' => 'required',
//         'ttl_pinjaman' => 'required',
//         'no_jaminan' => 'required|numeric',
//         'kolektabilitas' => 'required',
//     ],[
//         'required' => 'Kolom :attribute tidak boleh kosong.',
//         'numeric' => 'Kolom :attribute harus berupa karakter angka.',
//         'unique' => 'Value kolom :attribute sudah digunakan.'
//     ]);
//     DB::table('debitur')->insert([
//         'no_kontrak' => $request->no_kontrak,
//         'nama_debitur'=> $request->nama_debitur, 
//         'tgl_lahir'=> $request->tgl_lahir,    
//         'kelamin'=> $request->kelamin, 
//         'usia'=> $request->usia, 
//         'no_telepon'=> $request->no_telepon, 
//         'pekerjaan'=> $request->pekerjaan, 
//         'pendapatan_perbulan'=> $request->pendapatan_perbulan, 
//         'no_ktp'=> $request->no_ktp, 
//         'no_npwp'=> $request->no_npwp, 
//         'status_perkawinan'=> $request->status_perkawinan,
//         'alamat_ktp'=> $request->alamat_ktp,
//         'alamat_domisili'=> $request->alamat_domisili,
//         'status_hunian'=> $request->status_hunian,
//         'lama_tinggal'=> $request->lama_tinggal,
//         'latitude'=> $request->latitude,
//         'longitude'=> $request->longitude,
//         'no_agreement' => $request->no_agreement,
//         'tgl_kontrak' => $request->tgl_kontrak,
//         'tgl_berakhir' => $request->tgl_berakhir,
//         'bunga' => $request->bunga,
//         'tenor' => $request->tenor,
//         'angsuran_bulan' => $request->angsuran_bulan,
//         'ttl_pinjaman' => $request->ttl_pinjaman,
//         'no_jaminan' => $request->no_jaminan,
//         'kolektabilitas' => $request->kolektabilitas
//     ]);
//     return redirect('ddebitur')->with('added','Data debitur berhasil ditambahkan.');
// }