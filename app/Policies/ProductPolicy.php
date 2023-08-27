<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProductPolicy
{

    public function create(User $user): bool
    {
        return true;
//        return $user->hasRole('admin')??true;
    }

    public function update(User $user, Product $product): bool
    {
        return true;
//        return $user->hasRole('admin')??true;
    }

    public function delete(User $user, Product $product): bool
    {
        return $user->hasRole('admin')??true;
    }
}
