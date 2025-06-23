<?php

namespace App\Repositories\User;

use Illuminate\Support\Facades\Cache;
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
        $key = 'users_all';
        $exp = now()->addMinutes(10);

        if (Cache::has($key)) {
            Log::info("[proxy] Get Users via Facade from cache");
            return Cache::get($key);
        };

        $users = $this->user_repo->getUsers();
        Cache::put($key, $users, $exp);

        Log::info("[proxy] Get Users via Facade from repository");
        return $users;
    }
}
