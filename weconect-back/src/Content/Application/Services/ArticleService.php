<?php

declare(strict_types=1);

namespace Content\Application\Services;
use Content\Domain\Repositories\ArticleRepositoryInterface;
use Content\Domain\Entities\Article;

class ArticleService {
    public function __construct(private ArticleRepositoryInterface $articleRepository) { }

    public function getArticles(): array {
        return $this->articleRepository->find();
    }

    public function getArticle(int $id): ?Article {
        return $this->articleRepository->findById($id);
    }

    public function createArticle(Article $article): Article {
        $article = new Article(
            title: $article->title,
            content: $article->content,
            images: $article->images,
            createdAt: new \DateTime()
        );
        return $this->articleRepository->save($article);
    }

    public function updateArticle(Article $article): Article {
        return $this->articleRepository->update($article);
    }

    public function deleteArticle(int $id): void {
        $this->articleRepository->delete($id);
    }
}
