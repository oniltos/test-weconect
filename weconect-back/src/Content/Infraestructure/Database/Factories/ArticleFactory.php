<?php

declare(strict_types=1);

namespace Content\Infraestructure\Database\Factories;
use Content\Domain\Entities\Article;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    protected $model = Article::class;
    public function definition(): array
    {
        return [
            'title' => $this->faker->text(200),
            'content' => $this->faker->text(300)
        ];
    }
}
