<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        $user = User::firstOrCreate(
            ['email' => 'abdjav2002@gmail.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('abdjav2002'),
            ]
        );

        $user->assignRole('admin');
    }
}
