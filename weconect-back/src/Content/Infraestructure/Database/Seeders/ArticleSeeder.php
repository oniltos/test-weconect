<?php

namespace Content\Infraestructure\Database\Seeders;

use Content\Domain\Entities\Article;
use Content\Infraestructure\Database\Factories\ArticleFactory;
use Content\Infraestructure\Repository\ArticleRepository;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function __construct(public readonly ArticleRepository $articleRepository){}
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $factory = new ArticleFactory();

        for( $i = 0; $i < 10; $i++ ){
            $attributes = $factory->definition();

            $article = new Article(
                title: $attributes["title"],
                content: $attributes["content"],
                createdAt: new \DateTime()
            );

            $this->articleRepository->save($article);
        }
    }
}
