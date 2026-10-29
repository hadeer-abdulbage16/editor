<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use RuntimeException;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $email = /*env('ADMIN_EMAIL')*/ "hadeerramadan415@gmail.com";
        $password = /*env('ADMIN_PASSWORD')*/ "hadeer16@";

        if (! $email || ! $password || strlen($password) < 8) {
            throw new RuntimeException('Set ADMIN_EMAIL and an ADMIN_PASSWORD of at least 8 characters in .env before running AdminUserSeeder.');
        }

        User::updateOrCreate(
            ['email' => $email],
            ['name' => 'Portfolio Admin', 'password' => Hash::make($password)]
        );
    }
}
