<?php

namespace App\Http\Resources;

use App\User;
use App\UserRole;
use Illuminate\Http\Resources\Json\JsonResource;

class UsersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */



    public function toArray($request)
    {
        return [
            'key' => $this->id,
            'User Email' => $this->email,
            'If User Acive' => $this->is_active,
            'If User Deleted' => $this->is_deleted,
            'If User Blocked' => $this->is_block,

            'First Name' => $this->userDetail->firstname,
            'last Name' => $this->userDetail->lastname,
            'User Phone' => $this->userDetail->phone1,
//            'User Role' => User::getUserRole($this->user_role), This Works Too. But I prefer To Work From Helper
            'User Role' => getUserRole($this->user_role),
        ];
    }
}
