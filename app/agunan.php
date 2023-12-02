<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class agunan extends Model
{
    public $table = 'agunan';
    protected $primaryKey = 'debitur_id';
    protected $fillable = ['no_agreement','debitur_id', 'tgl_kontrak', 
                        'tgl_berakhir', 'bunga', 'tenor', 'angsuran_bulan', 
                        'total_pinjaman', 'sisa_pinjaman', 'kolektabilitas'
                    ];

    // public function debitur(){
    //     return $this->belongsTo('App\debitur','debitur_id');
    // }
}
