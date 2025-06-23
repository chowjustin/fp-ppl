<?php

namespace App\Repositories\User;

use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function addUser(array $req)
    {
        return User::create($req);
    }

    public function getUsers()
    {
        return User::all();
    }
}
