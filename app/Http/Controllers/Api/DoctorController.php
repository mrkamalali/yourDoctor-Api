<?php

namespace App\Http\Controllers\Api;

use App\Doctor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function searchDoctor(Request $request)
    {
        $data = $request->get('data');
//        $doctors = Doctor::when('firstname', 'LIKE', "%{$data}%")
//        $doctors = Doctor::where('firstname', 'LIKE', "%{$data}%")
//                        ->orWhere('lastname', 'LIKE', '%' . $data . '%')
//                        ->get();
//        return response(['data' => $doctors]);
//


        $doctors = Doctor::when($data, function ($q) use ($request) {
            $data = $request->get('data');
            return $q->where('firstname', 'like', "%{$data}%")
                ->orWhere('lastname', 'like', "%{$data}%");
        })->get();

        return response(['data' => $doctors]);

    }


}
