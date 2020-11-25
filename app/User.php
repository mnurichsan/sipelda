<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'id_role', 'no_telp', 'no_wa', 'negara', 'jenis_identitas', 'no_identitas', 'instansi_organisasi', 'nip', 'unit_kerja'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function data()
    {
        return $this->hasMany('App\PermintaanData', 'id_user', 'id');
    }
    public function feedback()
    {
        return $this->hasMany('App\Feedback', 'id_user', 'id');
    }
}
