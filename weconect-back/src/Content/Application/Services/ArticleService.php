<?php

declare(strict_types=1);

namespace Content\Application\Services;
use Content\Domain\Repositories\ArticleRepositoryInterface;
use Content\Domain\Entities\Article;

/**
 * ArticleService class
 * 
 * This service class handles all business logic related to articles.
 */
class ArticleService {
    public function __construct(private ArticleRepositoryInterface $articleRepository) { }
    
    /**
     * Get all articles
     *
     * Fetches all articles from the repository.
     *
     * @return Article[] An array of Article entities
     */
    public function getArticles(): array {
        return $this->articleRepository->find();
    }

     /**
     * Get a single article by ID
     *
     * Fetches a single article from the repository by its ID.
     *
     * @param int $id The ID of the article to retrieve
     * @return Article|null The Article entity or null if not found
     */
    public function getArticle(int $id): ?Article {
        return $this->articleRepository->findById($id);
    }

     /**
     * Create a new article
     *
     * Creates a new Article entity and saves it to the repository.
     *
     * @param Article $article The article data to create
     * @return Article The created Article entity
     */
    public function createArticle(Article $article): Article {
        $article = new Article(
            title: $article->title,
            content: $article->content,
            images: $article->images,
            createdAt: new \DateTime()
        );
        return $this->articleRepository->save($article);
    }

    
    /**
     * Update an existing article
     *
     * Updates an existing Article entity in the repository.
     *
     * @param Article $article The article data to update
     * @return Article The updated Article entity
     */
    public function updateArticle(Article $article): Article {
        return $this->articleRepository->update($article);
    }

    /**
     * Delete an article by ID
     *
     * Deletes an Article entity from the repository by its ID.
     *
     * @param int $id The ID of the article to delete
     * @return void
     */
    public function deleteArticle(int $id): void {
        $this->articleRepository->delete($id);
    }
}
