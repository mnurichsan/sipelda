<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sektoral extends Model
{
    protected $fillable = ['name'];

    public function permintaanData()
    {
        return $this->hasMany('App\PermintaanData', 'id_sektoral', 'id');
    }
}
