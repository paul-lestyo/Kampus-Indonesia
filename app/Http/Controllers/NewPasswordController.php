<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;
use Validator;

class NewPasswordController extends Controller
{
    public function forgotPassword(Request $request) {
		$input = $request->all();
		$validator = Validator::make($input, ['email' => 'required|email']);

		if($validator->fails()) {
			return $this->errorResponse('Validation Error', $validator->errors());
		}

		$status = Password::sendResetLink(
			$request->only('email')
		);

		if($status != Password::RESET_LINK_SENT) {
			return $this->errorResponse( __($status) );
		}

		return $this->successResponse([], __($status) );
	}

	public function reset(Request $request) {
		$input = $request->all();
		$validator = Validator::make($input, [
			'token' => 'required',
			'email' => 'required|email',
			'password' => 'required|confirmed',
		]);

		if($validator->fails()) {
			return $this->errorResponse('Validation Error', $validator->errors());
		}

		$status = Password::reset(
			$validator->validated(),
			function ($user) use ($request) {
				$user->forceFill([
					"password" => Hash::make($request->password),
					"remember_token" => Str::random(60),
				])->save();

				$user->tokens()->delete();
				event(new PasswordReset($user));
			}
		);

		if($status != Password::PASSWORD_RESET) {
			return $this->errorResponse([], __($status));
		}

		return $this->successResponse([], __($status));
	}
}
