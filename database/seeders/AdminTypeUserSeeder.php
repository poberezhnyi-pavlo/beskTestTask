<?php

namespace Database\Seeders;

use App\Enums\UserType;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

final class AdminTypeUserSeeder extends Seeder
{
    public function run(): void
    {
        $user = new User();

        $user->name = 'admin';
        $user->email = 'admin@admin.ua';
        $user->password = Hash::make('password');
        $user->type = UserType::ADMIN;

        $user->save();
    }
}
