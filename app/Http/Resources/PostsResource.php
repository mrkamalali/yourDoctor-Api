<?php

namespace App\Http\Resources;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @param $post
     * @return array
     */
    public function toArray($request)
    {
        return [
//            This Names Not Look Like The Names In Database
            'post_Link'                 => route('posts.show', $this->id),
            'post_Title'                => $this->title,
            'post_Description'          => str_limit($this->content, 100),
            'post_Photo'                => config('app.url') . $this->image,
            'post_views'                => $this->views,
            'post_date'                 => $this->created_at->format('d/m/Y H:i:s'),
            'Creator'                   => $this->user->userDetail->firstname . ' ' . $this->user->userDetail->lastname,
            'Author_job_title'           => $this->user->userDetail->job_title,
//            'Author_roles'      => $this->user->userRole->user_role
        ];
    }


}
