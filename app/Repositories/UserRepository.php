<?php

namespace App\Repositories;

use App\Repositories\Eloquent\Repository;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserRepository extends Repository
{
    /**
     * @return mixed
     */
    public function model()
    {
        return User::class;
    }

    /**
     * @return User|null
     */
    public function authenticated()
    {
        return Auth::user();
    }
}
