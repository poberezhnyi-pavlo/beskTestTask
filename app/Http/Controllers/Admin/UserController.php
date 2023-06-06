<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use OpenApi\Annotations as OA;
use Symfony\Component\HttpFoundation\Response;

final class UserController extends Controller
{
    public function __construct(readonly private UserService $userService)
    {
    }

    /**
     * @OA\Post(
     *     path="/admin/grant-moderator/{id}",
     *     summary="Grant user to moderator",
     *     description="Grant user to moderator. Allowed only admin.",
     *     tags={"admin"},
     *     security={{"apiAuth":{}}},
     *     @OA\Parameter(
     *          name="id",
     *          description="user id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="No content",
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *     ),
     *     @OA\Response(
     *          response=403,
     *          description="You is not admin",
     *     ),
     *     @OA\Response(
     *          response=404,
     *          description="Not found",
     *     )
     * )
     */
    public function grantModerator(User $user): JsonResponse
    {
        $this->userService->grantModerator($user);

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
