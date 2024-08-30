<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\User;
use Database\Factories\Concerns\CanCreateImages;
use Illuminate\Database\Seeder;

class ProdDataSeeder extends Seeder
{
    use CanCreateImages;

    public function run(): void
    {
        $this->seedUsers();
        $this->seedPages();

    }

    private function seedPages(): void
    {
        $pages = [
            [
                'title' => 'Accueil',
                'slug' => 'accueil',
                'text' => 'Découvrez LotusNoir avec Frank Pimenta, maître tatoueur passionné, spécialisé dans la géométrie sacrée, les arts spirituels et les styles tribaux. Avec plus de 10 ans d\'expérience, Frank crée des tatouages uniques qui racontent votre histoire.',
            ],
        ];

        foreach ($pages as $page) {
            Page::create([
                'title' => $page['title'],
                'slug' => $page['slug'],
                'text' => $page['text'],
            ]);
        }
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
