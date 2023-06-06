<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use OpenApi\Annotations as OA;

/**
 * @OA\Info(
 *     version="1.0.0",
 *     title="Test Task",
 *     description="Test task Api Documentation",
 *     @OA\Contact(
 *         name="Pavlo Pobrezhnyi",
 *         email="poberezhnyi@hotmail.com"
 *     ),
 * ),
 * @OA\Server(
 *     url="/api",
 * ),
 * @OA\SecurityScheme(
 *     securityScheme="apiAuth",
 *     type="http",
 *     scheme="bearer",
 *     bearerFormat="JWT",
 *     in="header",
 *     description="Authentication Bearer Token",
 *     name="Authentication Bearer Token"
 *
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
