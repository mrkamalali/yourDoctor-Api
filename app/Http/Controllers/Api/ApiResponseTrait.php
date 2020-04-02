<?php

namespace App\Http\Controllers\Api;

//use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

trait ApiResponseTrait
{

//    Make Paginate With Only 10
    public $paginate = 10;

    public function apiResponse($data = null, $error = null, $code = 200)
    {
        $array = [
            'data' => $data,
            'status' => in_array($code, $this->successCode()) ? true : false,
            'error' => $error,
        ];
        return response($array, $code);

    }

    public function createdResponse($data)
    {
        return $this->apiResponse($data, null, 201);
    }


    public function deletedResponse()
    {
        return $this->apiResponse(true, null, 200);
    }


    public function apiValidate($request, $data)
    {
//        This function will return apiResponse Or Nothing
        $validate = Validator::make($request->all(), $data);
        if ($validate->fails()) {
            return $this->apiResponse(null, $validate->errors(), 422);
        }

    }


    public function successCode()
    {
        return [
            200, 201, 202
        ];
    }

    public function noResponse()
    {
        return $this->apiResponse(null, 'There Is No Record With This Info', 404);
    }

}
