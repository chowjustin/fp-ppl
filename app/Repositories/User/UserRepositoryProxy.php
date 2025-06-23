<?php

namespace App\Repositories\User;

use Illuminate\Support\Facades\Log;

class UserRepositoryProxy implements UserRepositoryInterface
{
    protected UserRepositoryInterface $user_repo;
    public function __construct(UserRepositoryInterface $user_repo)
    {
        $this->user_repo = $user_repo;
    }

    public function addUser(array $request)
    {
        Log::info("[proxy] AddUserRequest");
        return $this->user_repo->addUser($request);
    }

    public function getUsers()
    {
        Log::info("[proxy] Get Users via Facade");
        return $this->user_repo->getUsers();
    }
}
