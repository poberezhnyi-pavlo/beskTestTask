<?php

declare(strict_types=1);

namespace App\Http\Controllers\Moderator;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;

abstract class BaseController extends Controller
{
    protected function getAuthUser(): Authenticatable|User
    {
        return auth()->user();
    }
}
