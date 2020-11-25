<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermintaanData extends Model
{
    protected $fillable = ['id', 'title', 'id_sektoral', 'tujuan', 'keterangan', 'status', 'id_user', 'tanggal_pengajuan'];
    public $incrementing = false;
    protected $dates = ['tanggal_pengajuan'];

    public function sektoral()
    {
        return $this->belongsTo('App\Sektoral', 'id_sektoral', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'id_user', 'id');
    }

    public function data()
    {
        return $this->hasOne('App\file_data', 'id_permintaanData', 'id');
    }
}
