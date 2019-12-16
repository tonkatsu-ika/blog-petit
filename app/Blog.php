<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    // Userとのリレーション
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
