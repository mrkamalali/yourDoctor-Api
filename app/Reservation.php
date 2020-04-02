<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'reservations';
    protected $casts = ['is_canceled_by_user_doctor' => 'boolean'];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }


}
