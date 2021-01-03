<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    protected $table = "pekerjaans";
    protected $guarded = [];

    public function teknisi(){
        return $this -> belongsToMany('App\Teknisi', 'pekerjaan_teknisi', 'pekerjaan_id', 'teknisi_id');
    }

    public function jenis(){
        return $this -> belongsToMany('App\Jenis', 'pekerjaan_jenis', 'pekerjaan_id', 'jenis_id');
    }
}
