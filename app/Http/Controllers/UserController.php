<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    protected UserRepositoryInterface $user_repo;
    public function __construct(UserRepositoryInterface $user_repo)
    {
        $this->user_repo = $user_repo;
    }

    public function store(CreateUserRequest $request): JsonResponse
    {
        $payload = $request->validated();
        $test = $this->user_repo->addUser($payload);
        Log::info($test);
        return $this->BuildResponseSuccess(
            Response::HTTP_CREATED,
            "Berhasil membuat user"
        );
    }
}
