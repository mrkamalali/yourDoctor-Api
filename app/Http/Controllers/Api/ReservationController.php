<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BooksResource;
use App\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{

    use  ApiResponseTrait;


    public function index()
    {
        $books =  BooksResource::collection(Reservation::paginate($this->paginate));
        if ($books) {

            return $this->apiResponse($books);
        }
        return $this->noResponse();
    }


    public function show($id)
    {
        $book = Reservation::find($id);
        if ($book){
            return $this->apiResponse(new BooksResource($book));
        }
        return $this->noResponse();
    }
 






}
