<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Game;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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
            'RPG',
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
            'FPS',
            'TPS',
            'MOBA',
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

        $gameNames = [
            "Adventure Quest",
            "Battle Arena",
            "Dragon's Den",
            "Space Odyssey",
            "Hero's Journey",
            "Ghosts of the Past",
            "Kingdoms Rise",
            "Eternal War",
            "Lost Treasure",
            "Final Strike",
            "The Last Frontier",
            "Super Speed Racer",
            "Magic Lands",
            "Cybernetic Revolution",
            "Dungeon Raiders",
            "Dark Horizon",
            "Underworld Battle",
            "Phoenix Ascendant",
            "Castle Conqueror",
            "Stormwatchers",
            "Legends of the Fallen",
            "Ninja Strike",
            "The Sorcerer's Spell",
            "Alien Invasion",
            "The Forbidden City",
            "Enchanted Forest",
            "City of Shadows",
            "Quantum Leap",
            "Secret Gardens",
            "The Awakening",
            "Zombie Apocalypse",
            "Shadow Wars",
            "Dragon's Blood",
            "Techno Raiders",
            "Savage Worlds",
            "Legendary Knights",
            "Battle of the Elements",
            "Dark Vengeance",
            "Fortress of Fury",
            "Sky Pirates",
            "Winter's Wrath",
            "Titan's Might",
            "Reign of Terror",
            "Warlord's Return",
            "Darkest Night",
            "Mystic Kingdom",
            "Blood Moon Rising",
            "Vampire's Lair",
            "Warrior's Path"
        ];

        foreach ($categories as $category) {
            Category::create([
                'category_name' => $category
            ]);
        }

        $bannerFile = Storage::disk('public')->files('game_banner');
        $descriptionFile = Storage::disk('public')->files('game_screenshot');

        for ($i = 0; $i < 200; $i++) {
            $banner = $bannerFile[array_rand($bannerFile)];

            $copy = $descriptionFile;
            shuffle($copy);
            $description = array_slice($copy, 0, random_int(5, 7));
            $description = array_map(
                fn($image) => url('storage/' . $image), $description
            );

            $price = fake()->boolean(30) ? 0 : fake()->numberBetween(10, 5000) * 1000;
            $game = Game::create([
                'title' => $gameNames[array_rand($gameNames)],
                'short_description' => fake()->text(100),
                'long_description' => fake()->paragraphs(10, true),
                'price' => $price,
                'view' => fake()->numberBetween(100, 5000),
                'cover_image' => url('storage/' . $banner),
                'created_at' => fake()->dateTimeBetween('-10 years'),
                'description_images' => json_encode(
                    $description
                ),
            ]);

            $categoryIds = Category::inRandomOrder()->take(fake()->numberBetween(3, 5))->pluck('id');
            $game->categories()->sync($categoryIds);
        }

        $users = User::all();

        foreach ($users as $user) {
            $gameIds = Game::inRandomOrder()->take(fake()->numberBetween(10, 50))->pluck('id');
            $user->games()->sync($gameIds);
        }
    }
}
