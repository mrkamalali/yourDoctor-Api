<?php


namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Controllers\Controller;
use App\Http\Resources\UsersResource;
use App\User;
use App\UserDetails;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class AuthController extends Controller
{

    use ApiResponseTrait;
    use AuthenticatesUsers;

    public function register(Request $request)
    {

        $validators = Validator::make($request->all(),
            [
                'firstname' => 'required',
                'lastname' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|confirmed',
                'phone1' => 'required|numeric',
            ]);
        if ($validators->fails()) {
            return response()->json(['error' => $validators->errors()], 401);
        }

        $data = $request->all();
//        Hash Password
        $data['password'] = bcrypt($data['password']);

        $user = new User();
        $user->email = $data['email'];
        $user->password = $data['password'];
        $user->save();
//        $idUser = $user->id;
//

        $details = new UserDetails();
        $details->user_id = $user->id;
        $details->firstname = $data['firstname'];
        $details->lastname = $data['lastname'];
        $details->phone1 = $data['phone1'];
        $details->save();

        $accessToken = $user->createToken('authToken')->accessToken;

        return response(['message' => 'Your Are Welcome :  ' . $details->firstname ,
            'data' => $details , 'accessToken' => $accessToken]);

//        return response(['message' => 'Your Data Added Successfully', 'access_token' => $accessToken]);
    }


    public function login(Request $request)
    {
        $validators = Validator::make($request->all(),
            [
                'email' => 'required|email',
                'password' => 'required',
            ]);
        if ($validators->fails()) {
            return response()->json(['error' => $validators->errors()], 401);
        }
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $accessToken = $user->createToken('authToken')->accessToken;
            return Response(['Message' => 'welcome Back Mr : ' . $user->userDetail->firstname,
                'accessToken' => $accessToken]);
        } else {
            return $this->noResponse();
        }
    }


    public function user(Request $request)
    {
//        Show User Details
        return response()->json(new UsersResource($request->user()));
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response(['message' => 'logged out']);

    }


}
