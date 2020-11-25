<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = ['feedback', 'id_user'];

    public function userFeedback()
    {
        return $this->belongsTo('App\User', 'id_user', 'id');
    }
}
