<?php

namespace App\Http\Controllers;
use App\debitur;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AgunanController extends Controller
{
    public function data(){
        $agunan = DB::table('debitur')->paginate(10);
        return view('agunan.dagunan', ['agunan' => $agunan]);
    }

    public function search(Request $request){
        // kalo misah search mengandung *nama*objekcari, maka hanya mencari dari kolom dalam tanda bintang
		$search = $request->search;
		$debitur = DB::table('debitur')
        ->where('no_kontrak','like',"%".$search."%")
        ->orWhere('nama_debitur', 'LIKE', '%' . $search . '%')
        ->orWhere('no_telepon' , 'LIKE', '%' . $search . '%')
        ->orWhere('no_ktp' , 'LIKE', '%' . $search . '%')
        ->orWhere('pendapatan_perbulan' , 'LIKE', '%' . $search . '%')
        ->orWhere('alamat_ktp' , 'LIKE', '%' . $search . '%')
        ->orWhere('alamat_domisili' , 'LIKE', '%' . $search . '%')
        ->orWhere('no_npwp' , 'LIKE', '%' . $search . '%')
        ->paginate(10);
		return view('agunan.agunan', ['agunan' => $agunan]);
    }

    public function add(){
        return view('agunan.aagunan');
    }

    public function save(Request $request){
        $request->validate([
            // 'no_kontrak' => 'required|unique:debitur|numeric',
            // 'nama_debitur'=> 'required',
            // 'tgl_lahir'=> 'required',   
            // 'kelamin'=> 'required',
            // 'no_ktp'=> 'required',
            // 'no_npwp'=> 'required',
            // 'kewarganegaraan'=> 'required',
            // 'status_perkawinan'=> 'required',
            // 'jmlh_tanggungan'=> 'required|numeric',
            // 'pendidikan_terakhir'=> 'required',
            // 'alamat_ktp'=> 'required',
            // 'kelurahan'=> 'required',
            // 'kecamatan'=> 'required',
            // 'kota'=> 'required',
            // 'provinsi'=> 'required',
            // 'kodepos'=> 'required|numeric',
            // 'alamat_tinggal'=> 'required',
            // 'kelurahan_at'=> 'required',
            // 'kecamatan_at'=> 'required', 
            // 'kota_at'=> 'required',
            // 'provinsi_at'=> 'required',
            // 'kodepos_at'=> 'required|numeric',
            // 'status_hunian'=> 'required',
            // 'lama_tinggal_thn'=> 'required',
            // 'lama_tinggal_bln'=> 'required',
            // 'email'=> 'required',
            // 'no_seluler'=> 'required|numeric',
            // 'no_telp_rumah'=> 'required|numeric',
            // 'anak_gadis_ibu_kandung'=> 'required',
            // 'latitude'=> 'required|numeric',
            // 'longitude'=> 'required|numeric',
            'no_agreement' => 'required|unique:debitur|numeric',
			// 'debitur_id' => 'required',
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
		DB::table('debitur')->insert([
            // 'no_kontrak' => $request->no_kontrak,
            // 'nama_debitur'=> $request->nama_debitur, 
            // 'tgl_lahir'=> $request->tgl_lahir,    
            // 'kelamin'=> $request->kelamin, 
            // 'no_ktp'=> $request->no_ktp, 
            // 'no_npwp'=> $request->no_npwp, 
            // 'kewarganegaraan'=> $request->kewarganegaraan, 
            // 'status_perkawinan'=> $request->status_perkawinan,
            // 'jmlh_tanggungan'=> $request->jumlh_tanggungan, 
            // 'pendidikan_terakhir'=> $request->pendidikan_terakhir, 
            // 'alamat_ktp'=> $request->alamat_ktp,
            // 'kelurahan'=> $request->kelurahan, 
            // 'kecamatan'=> $request->kecamatan, 
            // 'kota'=> $request->kota, 
            // 'provinsi'=> $request->provinsi, 
            // 'kodepos'=> $request->kodepos, 
            // 'alamat_tinggal'=> $request->alamat_tinggal,
            // 'kelurahan_at'=> $request->kelurahan_at, 
            // 'kecamatan_at'=> $request->kecamatan_at, 
            // 'kota_at'=> $request->kota_at, 
            // 'provinsi_at'=> $request->provinsi_at, 
            // 'kodepos_at'=> $request->kodepos_at, 
            // 'status_hunian'=> $request->status_hunian,
            // 'lama_tinggal_thn'=> $request->lama_tinggal_thn,
            // 'lama_tinggal_bln'=> $request->lama_tinggal_bln,
            // 'email'=> $request->email,
            // 'no_seluler'=> $request->no_seluler,
            // 'no_telp_rumah'=> $request->no_telp_rumah,
            // 'anak_gadis_ibu_kandung'=> $request->anak_gadis_ibu_kandung,
            // 'latitude'=> $request->latitude,
            // 'longitude'=> $request->longitude,
            'no_agreement' => $request->no_agreement,
            // 'debitur_id'=> $request->debitur_id, 
            'tgl_kontrak'=> $request->tgl_kontrak,    
            'tgl_berakhir'=> $request->tgl_berakhir, 
            'bunga'=> $request->bunga, 
            'tenor'=> $request->tenor, 
            'angsuran_bulan'=> $request->angsuran_bulan, 
            'total_pinjaman'=> $request->total_pinjaman, 
            'sisa_pinjaman'=> $request->sisa_pinjaman, 
            'kolektabilitas'=> $request->kolektabilitas 
		]);
        return redirect('dagunan')->with('added','Data agunan berhasil ditambahkan.');
    }

    public function edit($id){
        $agunan=DB::table('debitur')->where('id',$id)->first();
        // $debitur=DB::table('debitur')->where('id',$id)->first();
        return view('agunan.eagunan', ['agunan' => $agunan]);
    }

    public function update(Request $request, $id){
        $request->validate([
            // 'no_kontrak' => 'required|unique:debitur|numeric',
            // 'nama_debitur'=> 'required',
            // 'tgl_lahir'=> 'required',   
            // 'kelamin'=> 'required',
            // 'no_ktp'=> 'required',
            // 'no_npwp'=> 'required',
            // 'kewarganegaraan'=> 'required',
            // 'status_perkawinan'=> 'required',
            // 'jmlh_tanggungan'=> 'required|numeric',
            // 'pendidikan_terakhir'=> 'required',
            // 'alamat_ktp'=> 'required',
            // 'kelurahan'=> 'required',
            // 'kecamatan'=> 'required',
            // 'kota'=> 'required',
            // 'provinsi'=> 'required',
            // 'kodepos'=> 'required|numeric',
            // 'alamat_tinggal'=> 'required',
            // 'kelurahan_at'=> 'required',
            // 'kecamatan_at'=> 'required', 
            // 'kota_at'=> 'required',
            // 'provinsi_at'=> 'required',
            // 'kodepos_at'=> 'required|numeric',
            // 'status_hunian'=> 'required',
            // 'lama_tinggal_thn'=> 'required',
            // 'lama_tinggal_bln'=> 'required',
            // 'email'=> 'required',
            // 'no_seluler'=> 'required|numeric',
            // 'no_telp_rumah'=> 'required|numeric',
            // 'anak_gadis_ibu_kandung'=> 'required',
            // 'latitude'=> 'required|numeric',
            // 'longitude'=> 'required|numeric',
            'no_agreement' => 'required|numeric',
			// 'debitur_id' => 'required',
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
        DB::table('debitur')->where('id',$id)->update([
            // 'no_kontrak' => $request->no_kontrak,
            // 'nama_debitur'=> $request->nama_debitur, 
            // 'tgl_lahir'=> $request->tgl_lahir,    
            // 'kelamin'=> $request->kelamin, 
            // 'no_ktp'=> $request->no_ktp, 
            // 'no_npwp'=> $request->no_npwp, 
            // 'kewarganegaraan'=> $request->kewarganegaraan, 
            // 'status_perkawinan'=> $request->status_perkawinan,
            // 'jmlh_tanggungan'=> $request->jumlh_tanggungan, 
            // 'pendidikan_terakhir'=> $request->pendidikan_terakhir, 
            // 'alamat_ktp'=> $request->alamat_ktp,
            // 'kelurahan'=> $request->kelurahan, 
            // 'kecamatan'=> $request->kecamatan, 
            // 'kota'=> $request->kota, 
            // 'provinsi'=> $request->provinsi, 
            // 'kodepos'=> $request->kodepos, 
            // 'alamat_tinggal'=> $request->alamat_tinggal,
            // 'kelurahan_at'=> $request->kelurahan_at, 
            // 'kecamatan_at'=> $request->kecamatan_at, 
            // 'kota_at'=> $request->kota_at, 
            // 'provinsi_at'=> $request->provinsi_at, 
            // 'kodepos_at'=> $request->kodepos_at, 
            // 'status_hunian'=> $request->status_hunian,
            // 'lama_tinggal_thn'=> $request->lama_tinggal_thn,
            // 'lama_tinggal_bln'=> $request->lama_tinggal_bln,
            // 'email'=> $request->email,
            // 'no_seluler'=> $request->no_seluler,
            // 'no_telp_rumah'=> $request->no_telp_rumah,
            // 'anak_gadis_ibu_kandung'=> $request->anak_gadis_ibu_kandung,
            // 'latitude'=> $request->latitude,
            // 'longitude'=> $request->longitude,
            'no_agreement' => $request->no_agreement,
            // 'debitur_id'=> $request->debitur_id, 
            'tgl_kontrak'=> $request->tgl_kontrak,    
            'tgl_berakhir'=> $request->tgl_berakhir, 
            'bunga'=> $request->bunga, 
            'tenor'=> $request->tenor, 
            'angsuran_bulan'=> $request->angsuran_bulan, 
            'total_pinjaman'=> $request->total_pinjaman, 
            'sisa_pinjaman'=> $request->sisa_pinjaman, 
            'kolektabilitas'=> $request->kolektabilitas 
        ]);
        return redirect('dagunan')->with('updated','Data agunan berhasil diperbarui.');
    }
    public function delete($id){
		DB::table('debitur')->where('id',$id)->delete();	
		return redirect('agunan.dagunan')->with('deleted','Data agunan berhasil dihapus.');
	}
    
    // public function data(){
    //     $debitur = DB::table('agunan')->paginate(10);
    //     return view('agunan.dagunan', ['agunan' => $agunan]);
    // }

    // public function search(Request $request){
    //     kalo misah search mengandung *nama*objekcari, maka hanya mencari dari kolom dalam tanda bintang
	// 	$search = $request->search;
	// 	$debitur = DB::table('agunan')
    //     ->where('no_kontrak','like',"%".$search."%")
    //     ->orWhere('nama_debitur', 'LIKE', '%' . $search . '%')
    //     ->orWhere('no_telepon' , 'LIKE', '%' . $search . '%')
    //     ->orWhere('no_ktp' , 'LIKE', '%' . $search . '%')
    //     ->orWhere('pendapatan_perbulan' , 'LIKE', '%' . $search . '%')
    //     ->orWhere('alamat_ktp' , 'LIKE', '%' . $search . '%')
    //     ->orWhere('alamat_domisili' , 'LIKE', '%' . $search . '%')
    //     ->orWhere('no_npwp' , 'LIKE', '%' . $search . '%')
    //     ->paginate(10);
	// 	return view('agunan.agunan', ['agunan' => $agunan]);
    // }

    // public function add(){
    //     return view('agunan.aagunan');
    // }

    // public function save(Request $request){
    //     $request->validate([
    //         'no_agreement' => 'required|unique:debitur|numeric',
	// 		'debitur_id' => 'required',
    //         'tgl_kontrak' => 'required',
    //         'tgl_berakhir' => 'required',
    //         'bunga' => 'required|numeric',
    //         'tenor' => 'required|numeric',
    //         'angsuran_bulan' => 'required|numeric',
    //         'total_pinjaman' => 'required|numeric',
    //         'sisa_pinjaman' => 'required|numeric',
    //         'kolektabilitas' => 'required',
    //     ],[
    //         'required' => 'Kolom :attribute tidak boleh kosong.',
    //         'numeric' => 'Kolom :attribute harus berupa karakter angka.',
    //         'unique' => 'Value kolom :attribute sudah digunakan.'
    //     ]);
	// 	DB::table('agunan')->insert([
    //         'no_agreement' => $request->no_agreement,
    //         'debitur_id'=> $request->debitur_id, 
    //         'tgl_kontrak'=> $request->tgl_kontrak,    
    //         'tgl_berakhir'=> $request->tgl_berakhir, 
    //         'bunga'=> $request->bunga, 
    //         'tenor'=> $request->tenor, 
    //         'angsuran_bulan'=> $request->angsuran_bulan, 
    //         'total_pinjaman'=> $request->total_pinjaman, 
    //         'sisa_pinjaman'=> $request->sisa_pinjaman, 
    //         'kolektabilitas'=> $request->kolektabilitas 
	// 	]);
    //     return redirect('dagunan')->with('added','Data agunan berhasil ditambahkan.');
    // }

    // public function edit($id){
    //     $agunan=DB::table('agunan')->where('id',$id)->first();
        
    //     return view('agunan.eagunan', ['agunan' => $agunan]);
    // }

    // public function update(Request $request, $id){
    //     $request->validate([
    //         'no_agreement' => 'required|unique:debitur|numeric',
	// 		'debitur_id' => 'required',
    //         'tgl_kontrak' => 'required',
    //         'tgl_berakhir' => 'required',
    //         'bunga' => 'required|numeric',
    //         'tenor' => 'required|numeric',
    //         'angsuran_bulan' => 'required|numeric',
    //         'total_pinjaman' => 'required|numeric',
    //         'sisa_pinjaman' => 'required|numeric',
    //         'kolektabilitas' => 'required',
    //     ],[
    //         'required' => 'Kolom :attribute tidak boleh kosong.',
    //         'numeric' => 'Kolom :attribute harus berupa karakter angka.',
    //         'unique' => 'Value kolom :attribute sudah digunakan.'
    //     ]);
    //     DB::table('agunan')->where('id',$id)->update([
    //         'no_agreement' => $request->no_agreement,
    //         'debitur_id'=> $request->debitur_id, 
    //         'tgl_kontrak'=> $request->tgl_kontrak,    
    //         'tgl_berakhir'=> $request->tgl_berakhir, 
    //         'bunga'=> $request->bunga, 
    //         'tenor'=> $request->tenor, 
    //         'angsuran_bulan'=> $request->angsuran_bulan, 
    //         'total_pinjaman'=> $request->total_pinjaman, 
    //         'sisa_pinjaman'=> $request->sisa_pinjaman, 
    //         'kolektabilitas'=> $request->kolektabilitas 
    //     ]);
    //     return redirect('agunan.dagunan')->with('updated','Data agunan berhasil diperbarui.');
    // }
    // public function delete($id){
	// 	DB::table('agunan')->where('id',$id)->delete();	
	// 	return redirect('agunan.dagunan')->with('deleted','Data agunan berhasil dihapus.');
	// }
    // public function detail($id){
    //     $kolektor=DB::table('kolektor')->where('id',$id)->first();
    //     $debitur=DB::table('debitur')->where('id',$id)->first();
    //     return view('kolektor.debiturkol.detdebitur', ['debitur' => $debitur],['kolektor' => $kolektor]);
    // }

}
