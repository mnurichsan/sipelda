<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class file_data extends Model
{
    protected $fillable = ['id', 'id_permintaanData', 'data', 'show_at', 'end_at'];
    protected $dates = ['show_at', 'end_at'];
    public $incrementing = false;

    public function permintaanData()
    {
        return $this->belongsTo('App\PermintaanData', 'id_permintaanData', 'id');
    }
}
