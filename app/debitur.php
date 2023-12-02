<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class debitur extends Model
{
    public $table = 'debitur';
    protected $fillable = ['no_kontrak','no_agreement','nama_debitur', 'tgl_lahir', 
                        'kelamin','no_ktp', 'no_npwp','no_telepon', 'kewarganegaraan', 
                        'status_perkawinan', 'jmlh_tanggungan','pendidikan_terakhir','alamat_ktp','kelurahan',
                        'kecamatan','kota','provinsi','kodepos','alamat_tinggal','kelurahan_at',
                        'kecamatan_at','kota_at','provinsi_at','kodepos_at','status_hunian','lama_tinggal_thn','lama_tinggal_bln',
                        'email','no_seluler','no_telp_rumah','nama_gadis_ibu_kandung'
                        ,'latitude','longitude','tgl_kontrak','tgl_berakhir','bunga','tenor','angsuran_bulan','total_pinjaman',
                        'sisa_pinjaman','kolektabilitas'
                    ];
    // public function agunan(){
    //     return $this->hasOne('App\agunan');
    // }
    // public function getNamaPenghuniAttribute($nama_penghuni){
    // 	return ucwords($nama_penghuni);
    // }

    // public function setNamaPenghuniAttribute($nama_penghuni){

    // 	$this->attributes['nama_penghuni'] = strtolower($nama_penghuni);

	// }          
    // debitur::query()->whereRaw('6371 * acos(cos(radians(40.6591158)) * cos( radians(latitude))*cos(radians(lng)radians(-73.7841042,14) ) + sin( radians(40.6591158) ) * sin( radians( lat ) ) ) )  < 1')->get();
}
