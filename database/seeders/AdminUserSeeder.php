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
        $email = env('ADMIN_EMAIL');
        $password = env('ADMIN_PASSWORD');

        if (! $email || ! filter_var($email, FILTER_VALIDATE_EMAIL) || ! $password || strlen($password) < 12) {
            throw new RuntimeException('Set a valid ADMIN_EMAIL and an ADMIN_PASSWORD of at least 12 characters in .env before running AdminUserSeeder.');
        }

        User::updateOrCreate(
            ['email' => $email],
            [
                'name' => 'Portfolio Admin',
                'password' => Hash::make($password),
                'is_admin' => true,
            ]
        );
    }
}
