<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{

    protected $table = 'user_detials';
    protected $fillable = [
        'firstname', 'lastname', 'phone'
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }


}
