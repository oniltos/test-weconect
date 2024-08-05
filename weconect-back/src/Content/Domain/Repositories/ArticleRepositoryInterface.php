<?php

declare(strict_types=1);

namespace Content\Domain\Repositories;
use Content\Domain\Entities\Article;

/**
 * ArticleRepositoryInterface
 *
 * This interface defines the methods for interacting with the article repository.
 */
interface ArticleRepositoryInterface
{
    public function findById(int $id): ?Article;
    public function find(): array;
    public function save(Article $article): Article;
    public function update(Article $article): Article;
    public function delete(int $id): void;
}
