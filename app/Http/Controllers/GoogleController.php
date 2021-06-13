<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class GoogleController extends Controller
{
    public function redirectToProvider() {
		$response = [
			'redirectUrl' => Socialite::driver('google')->stateless()->redirect()->getTargetUrl(),
		];
		return $this->successResponse($response, "Redirected Login Google");
	}

	public function handleProviderCallback() {
		try {
			$user = Socialite::driver('google')->stateless()->user();
		} catch (ClientException $exception) {
			return $this->errorResponse("Invalid credentials provided.", [], 422);
		}

		$userCreated = User::firstOrCreate(
			[
				'email' => $user->getEmail()
			],
			[
				'password' => bcrypt(uniqid()),
				'email_verified_at' => now(),
				'name' => $user->getName(),
				'status' => true,
			]
		);

		$userCreated->providers()->updateOrCreate(
			[
				'provider' => 'google',
				'provider_id' => $user->getId(),
			],
			[
				'avatar' => $user->getAvatar()
			]
		);
		$response = [
			'token' => $userCreated->createToken('paul_lestyo')->plainTextToken,
			'user' => $userCreated
		];
		return $this->successResponse($response, "User Successfully Login");
	}
}
