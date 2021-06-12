<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request) {
		$input = $request->all();

		$validator = Validator::make($input, [
			'name' => 'required',
			'email' => 'required|email|unique:users',
			'password' => 'required',
			'password2' => 'required|same:password'
		]);

		if($validator->fails()) {
			return $this->errorResponse('Validation Error', $validator->errors());
		}

		$input['password'] = bcrypt($input['password']);
		$user = User::create($input);

		$response = [
			'token' => $user->createToken('paul_lestyo')->plainTextToken,
			'name' => $user->name,
			'email' => $user->email
		];

		return $this->successResponse($response, "User Successfully Registered");

	}

	public function login(Request $request) {
		$input = $request->all();
		
		$validator = Validator::make($input, [
			'email' => 'required|email',
			'password' => 'required',
		]);

		if($validator->fails()) {
			return $this->errorResponse('Validation Error', $validator->errors());
		}

		if(Auth::attempt([
			'email' => $request->email, 
			'password' => $request->password
		])){
			$user = Auth::user();
			$response = [
				'token' => $user->createToken('paul_lestyo')->plainTextToken,
				'name' => $user->name,
				'email' => $user->email
			];

			return $this->successResponse($response, "User Successfully Login");
		} else {
			return $this->errorResponse('Your email or password is not valid');
		}
	}
}
