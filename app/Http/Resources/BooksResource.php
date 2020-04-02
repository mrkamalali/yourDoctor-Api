<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BooksResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'Book Number' => $this->id,
            'Doctor' => $this->doctor->firstname,
            'time' => $this->time,
            'day' => $this->day,
            'Waiting' => $this->waiting_time,
            'Book Status' => $this->is_canceled_by_user_doctor,
        ];
    }
}
