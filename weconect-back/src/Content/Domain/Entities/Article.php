<?php

declare(strict_types=1);

namespace Content\Domain\Entities;

use DateTime;

class Article
{
    public function __construct(
        public readonly string $title,
        public readonly ?DateTime $createdAt = null,
        public readonly string $content = '',
        public readonly int $id = 0,
        public readonly ?array $images = []
    ) {}
}
