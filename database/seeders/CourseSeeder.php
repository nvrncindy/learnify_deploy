<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;
use Faker\Factory as Faker; // Fixed capitalization
use Illuminate\Support\Str; // Added for Slugs

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Fixed: Removed the invalid '=' signs from the IDs
        $embedLinks = [
            'https://www.youtube.com/embed/3-jPo2wzvdw',
            'https://www.youtube.com/embed/KxwzXy12345',
            'https://www.youtube.com/embed/AbCdEf67890',
            'https://www.youtube.com/embed/p_C028gN2kU',
            'https://www.youtube.com/embed/y4J8nEpXtTE',
            'https://www.youtube.com/embed/BpoWFzn8Dmw',
            'https://www.youtube.com/embed/b_nJ9Y-bcS4', // Removed query params for clean embed
            'https://www.youtube.com/embed/Bj9-PCAlOHo',
            'https://www.youtube.com/embed/_GI9-J-sE5k',
            'https://www.youtube.com/embed/XDsYPXRCXAs',
            'https://www.youtube.com/embed/nXrEX6j-Mws',
            'https://www.youtube.com/embed/w5QSVhgrqVE',
            'https://www.youtube.com/embed/UFtge5ZlGck',
            'https://www.youtube.com/embed/DydIhwLrbMk',
            'https://www.youtube.com/embed/I7i6fToaNho',
            'https://www.youtube.com/embed/7fGB-hjc2Gc',
            'https://www.youtube.com/embed/VC9E2hyyEIw',
            'https://www.youtube.com/embed/PZ_ebxkNZmo',
            'https://www.youtube.com/embed/N3o5yHYLviQ',
            'https://www.youtube.com/embed/hwyRnHA54lI',
            'https://www.youtube.com/embed/Qn0yFkgNXqQ',
            'https://www.youtube.com/embed/Ysled8GvKuk',
            'https://www.youtube.com/embed/PkmX4iMQ5lo',
            'https://www.youtube.com/embed/XJC5WB2Bwrc',
            'https://www.youtube.com/embed/RnBOOF502p0',
            'https://www.youtube.com/embed/9UIIMBqq1D4',
            'https://www.youtube.com/embed/KwBuV7YZido',
            'https://www.youtube.com/embed/y11XNXi9dgs',
            'https://www.youtube.com/embed/vpSkBV5vydg',
            'https://www.youtube.com/embed/Y95a-8oNqps',
            'https://www.youtube.com/embed/p8u_k2LIZyo',
            'https://www.youtube.com/embed/KzT9I1d-LlQ',
            'https://www.youtube.com/embed/02rh1NjJLI4',
            'https://www.youtube.com/embed/cFtymODJEjs',
        ];

        for ($i=0; $i < 30 ; $i++) {
            $title = $faker->sentence(2);

            // Fixed: Switched to Course::create() to automatically handle timestamps (created_at/updated_at)
            // If you use DB::table()->insert(), you MUST manually add 'created_at' => now(), or your app will crash again.
            Course::create([
                'title'       => $title,
                'slug'        => Str::slug($title), // Fixed: Use Str::slug to make it URL-friendly
                'image'       => 'img',
                'description' => $faker->sentence(4),
                'price'       => $faker->randomNumber(6),
                'links'       => $embedLinks[array_rand($embedLinks)],
                'rating'      => $faker->randomFloat(2, 0, 5),
            ]);
        }
    }
}