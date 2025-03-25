<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Game;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         User::factory(50)->create();

         User::factory()->create([
            'name' => 'Takara',
            'email' => 'takara@test.com',
        ]);

        $categories = [
            'Action',
            'Adventure',
            'Role-playing (RPG)',
            'Strategy',
            'Simulation',
            'Puzzle',
            'Horror',
            'Indie',
            'Fighting',
            'Racing',
            'Sports',
            'Platformer',
            'Open-world',
            'Multiplayer',
            'Sandbox',
            'First-person shooter (FPS)',
            'Third-person shooter',
            'MOBA (Multiplayer Online Battle Arena)',
            'Battle Royale',
            'Survival',
            'Educational',
            'Music',
            'Rhythm',
            'Card',
            'Board',
            'Casual',
            'Visual Novel',
            'Text-based',
            'Simulation RPG',
            'Fantasy',
            'Sci-fi',
            'Historical',
            'Strategy RPG',
            'Tactical',
            'Metroidvania',
            'Tower Defense',
            'Stealth',
            'Cooperative',
            'Dungeon Crawler',
            'Sports Management',
        ];

        foreach ($categories as $category){
            Category::create([
                'category_name' => $category
            ]);
        }

        $imageFile = File::files(public_path('storage/game_banner'));

        for($i = 0; $i < 200; $i++) {
            $price = fake()->boolean(30) ? 0 : fake()->numberBetween(10, 5000) * 1000;
            $game = Game::create([
                'title' => fake()->sentence(3),
                'short_description' => fake()->text(100),
                'long_description' => fake()->paragraphs(10, true),
                'price' => $price,
                'cover_image' => url('storage/game_banner'.$imageFile[array_rand($imageFile)]->getFilename()),
                'description_images' => json_encode(
                    array_map(
                        fn() => url('storage/game_banner'.$imageFile[array_rand($imageFile)]->getFilename()),
                        range(1, fake()->numberBetween(5, 7))
                    )
                )
            ]);

            $categoryIds = Category::inRandomOrder()->take(fake()->numberBetween(3, 5)) -> pluck('id');
            $game->categories()->sync($categoryIds);
        }


    }
}
