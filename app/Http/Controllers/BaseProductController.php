<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;

abstract class BaseProductController extends Controller
{
    protected function getAuthUser(): Authenticatable|User
    {
        return auth()->user();
    }
}
