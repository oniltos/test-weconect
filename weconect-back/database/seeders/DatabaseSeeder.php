<?php

namespace Database\Seeders;

use Content\Infraestructure\Database\Seeders\ArticleSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(ArticleSeeder::class);
    }
}
