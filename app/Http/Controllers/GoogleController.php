<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class GoogleController extends Controller
{
    public function redirectToProvider() {
		return Socialite::driver('google')->stateless()->redirect();
	}

	public function handleProviderCallback() {
		try {
			$user = Socialite::driver('google')->stateless()->user();
		} catch (ClientException $exception) {
			return $this->errorResponse("Invalid credentials provided.", [], 422);
		}

		$userCreated = User::firstOrCreate(
			[
				'email' => $user->getEmail(),
				'password' => bcrypt(uniqid())
			],
			[
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
			$userCreated
		];
		return $this->successResponse($response, "User Successfully Login");
	}
}
