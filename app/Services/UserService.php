<?php

namespace App\Services;

use App\Repositories\User\UserRepositoryInterface;

class UserService
{
    protected UserRepositoryInterface $user_repo;
    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->user_repo = $userRepo;
    }

    public function getUsersViaFacade()
    {
        return $this->user_repo->getUsers();
    }
}
