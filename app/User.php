<?php

namespace App;

use App\Enums\RoleUser;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    protected $fillable = [
        'name', 'email', 'password',
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_active' => 'boolean',
        'is_deleted' => 'boolean',
        'is_block' => 'boolean',
//        'user_role' => 'attributes',
    ];


//    Realations

    public function posts()
    {
        return $this->hasMany(Post::class, 'addby', 'id');
    }

    public function userDetail()
    {
        return $this->hasOne(UserDetails::class, 'user_id', 'id');
    }


//    static function getUserRole($user_role)
//    {
//        switch ($user_role) {
//            case RoleUser::User:
//                return "User";
//            case RoleUser::Admin:
//                return "Admin";
//            case RoleUser::Doctor;
//                return "Doctor";
//            case RoleUser::Hospital:
//                return "Hospital";
//            case RoleUser::Receptionist:
//                return "Resceptionist";
//            case RoleUser::Tecnical_Support:
//                return "Tecincal Support";
//            default:
//                return "User";
//        }
//    }











}
