<?php

declare(strict_types=1);

namespace Content\Domain\Entities;

use DateTime;

/**
 * Article Entity
 *
 * Represents an article with its properties and initializations.
 */
class Article
{
     /**
     * Constructor
     *
     * Initializes a new instance of the Article entity.
     *
     * @param string $title The title of the article
     * @param DateTime|null $createdAt The creation date of the article, defaults to null
     * @param string $content The content of the article, defaults to an empty string
     * @param int $id The unique identifier of the article, defaults to 0
     * @param array|null $images The array of images associated with the article, defaults to an empty array
     */
    public function __construct(
        public readonly string $title,
        public readonly ?DateTime $createdAt = null,
        public readonly string $content = '',
        public readonly int $id = 0,
        public readonly ?array $images = []
    ) {}
}
