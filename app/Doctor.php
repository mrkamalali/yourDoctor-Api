<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{

    protected $fillable = [
        'firstname','lastname','bod','image','gender','phone1','phone2','address',
        'job_title','companyname','city_id','bio','cv_file',
        'user_id','is_deleted','is_current_update','doctor_dispaly_number',
        'doctor_enable_chat'
    ];
    protected $table = 'doctors';

}
