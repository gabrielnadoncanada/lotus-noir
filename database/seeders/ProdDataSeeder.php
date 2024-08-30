<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\Concerns\CanCreateImages;
use Illuminate\Database\Seeder;

class ProdDataSeeder extends Seeder
{
    use CanCreateImages;

    public function run(): void
    {
        $this->seedUsers();

    }

    private function seedUsers(): void
    {

        User::create([
            'name' => 'Admin',
            'email' => 'admin@lotusnoir.ca',
            'password' => bcrypt('password'),
        ]);
    }
}
