<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\Auth\LoginDTO;
use App\DataTransferObjects\Auth\RegisterDTO;
use App\Exceptions\LoginWrongException;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\Auth\LoginResource;
use App\Services\LoginService;
use App\Services\RegisterService;
use App\Services\UserService;
use Illuminate\Support\Arr;
use OpenApi\Annotations as OA;

final class AuthController extends Controller
{
    public function __construct(
        readonly private RegisterService $registerService,
        readonly private LoginService $loginService,
        readonly private UserService $userService,
    ) {
    }

    /**
     * @OA\Post(
     *     path="/auth/register",
     *     summary="register new user",
     *     tags={"auth"},
     *     description="Register new user(default user type Client)",
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/RegisterRequest")
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Successful registration",
     *          @OA\JsonContent(ref="#/components/schemas/TokenResource")
     *     ),
     *     @OA\Response(
     *          response=401,
     *          description="Wrong credential",
     *     ),
     *     @OA\Response(
     *          response=422,
     *          description="Validation errors",
     *     )
     * )
     * @throws LoginWrongException
     */
    public function register(RegisterRequest $request): LoginResource
    {
        $user = $this->registerService->register(RegisterDTO::fromRequest($request->validated()));

        $token = $this->loginService->login(
            LoginDTO::fromRequest(Arr::only($request->validated(), ['email', 'password'])),
            $user
        );

        return new LoginResource($token);
    }

    /**
     * @OA\Post(
     *     path="/auth/login",
     *     summary="login user",
     *     description="login user",
     *     tags={"auth"},
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/LoginRequest")
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Successful registration",
     *          @OA\JsonContent(ref="#/components/schemas/TokenResource")
     *     ),
     *     @OA\Response(
     *          response=401,
     *          description="Wrong credential",
     *     ),
     *     @OA\Response(
     *          response=422,
     *          description="Validation errors",
     *     )
     * )
     * @throws LoginWrongException
     */
    public function login(LoginRequest $request): LoginResource
    {
        $user = $this->userService->getUserByEmail($request->validated('email'));

        $token = $this->loginService->login(LoginDTO::fromRequest($request->validated()), $user);

        return new LoginResource($token);
    }
}
