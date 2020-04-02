<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostsResource;
use App\Post;

class PostsController extends Controller
{
//    200 Created Successfully
//    404 Not Found

    use  ApiResponseTrait;

    public function index()
    {
        $posts = PostsResource::collection(Post::paginate($this->paginate));
        if ($posts) {
            return $this->apiResponse($posts);
        }
        return $this->noResponse();
    }

//    public function show(Post $post)
//    {
////        return response($post);  This Will Return The Data In Usual Response..
//
//        if ($post) {
//            return new PostsResource($post); // THis Will Return Data Like We Did In  ( PostResource.php in Resources )
//        }
//        return $this->noResponse();
//    }

    public function show($id)
    {
        $post = Post::find($id);
        if ($post){
            return $this->apiResponse( new PostsResource($post));
        }
        return $this->noResponse();
    }


}
