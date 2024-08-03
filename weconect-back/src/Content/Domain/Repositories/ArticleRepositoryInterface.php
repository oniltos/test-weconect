<?php

declare(strict_types=1);

namespace Content\Domain\Repositories;
use Content\Domain\Entities\Article;

interface ArticleRepositoryInterface
{
    public function findById(int $id): ?Article;
    public function find(): array;
    public function save(Article $article): Article;
    public function update(Article $article): Article;
    public function delete(int $id): void;
}
