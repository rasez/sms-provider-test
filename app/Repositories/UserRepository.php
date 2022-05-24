<?php

/**
 * Created by PhpStorm.
 * User: rasez
 * Date: 8/7/20
 * Time: 4:18 PM
 */

namespace App\Repositories;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserRepository implements UserRepositoryInterface
{
    /**
     * create new user
     * @param $request
     * @return User
     */
    public function register($request): User
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->verify_token = Str::random(40);
        $user->save();
        return $user;
    }

    /**
     * Create or get a user based on provider id.
     * @param $providerUser
     * @param $provider
     * @return User
     */


    /**
     * check verify token is valid
     * @param $request
     * @return User
     */
    public function checkToken($token)
    {
        return User::where(['verify_token' => $token])->first();
    }

    public function verifyEmail($token)
    {
        return User::where(['verify_token' => $token])->update([
            'email_verified_at' => Carbon::now()
        ]);
    }
}
