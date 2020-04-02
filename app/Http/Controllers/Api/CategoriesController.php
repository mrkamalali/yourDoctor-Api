<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    use ApiResponseTrait;

    public function index()
    {
        $cats = Category::all();
        if ($cats) {

            return $this->apiResponse($cats);
        }
        return $this->noResponse();
    }


    public function show($id)
    {
        $cat = Category::find($id);
        if ($cat){
            return $this->apiResponse($cat);
        }
        return $this->noResponse();
    }


}
