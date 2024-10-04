<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        for ($i = 0; $i < 5; $i++) {
            Category::create([
                'name' => $faker->word(),
                'slug' => $faker->slug(),
            ]);
        }

        $tags = [];
        for ($i = 0; $i < 5; $i++) {
            $tags[] = Tag::create([
                'name' => $faker->word(),
                'slug' => $faker->slug(),
            ])->id;
        }

        for ($i = 0; $i < 24; $i++) {
            $product = Product::create([
                'name' => $faker->word(),
                'slug' => $faker->slug(),
                'price' => $faker->randomFloat(2, 1, 1000),
                'image' => $faker->imageUrl(600, 400),
                'category_id' => $faker->numberBetween(1, 5),
            ]);
            $product->tags()->attach($faker->randomElements($tags, rand(1, 3)));
        }
    }
}
