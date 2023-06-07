<?php

namespace App\Policies;

use App\Enums\UserType;
use App\Models\Product;
use App\Models\User;

final class ProductPolicy
{
    public function create(User $user): bool
    {
        return $user->type === UserType::MODERATOR;
    }

    public function update(User $user, Product $product): bool
    {
        return $user->type === UserType::MODERATOR && $user->id === $product->owner_id;
    }

    public function delete(User $user, Product $product): bool
    {
        return $user->type === UserType::MODERATOR && $user->id === $product->owner_id;
    }
}
