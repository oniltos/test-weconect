<?php

declare(strict_types= 1);

namespace Content\Infraestructure\Inputs;

/**
 * CreateArticleInput class
 *
 * This class represents the input data required to create a new article.
 */
class CreateArticleInput
{
    public function __construct(
        public readonly string $title,
        public readonly string $content,
        public readonly ?array $images = []
    ) {
        $this->validate();
    }

     /**
     * Validate the input data
     *
     * Validates the input data to ensure it meets the required constraints.
     *
     * @throws \InvalidArgumentException If the title is empty or exceeds 255 characters
     * @return void
     */
    private function validate(): void
    {
        if(empty($this->title) || strlen($this->title) > 255) {
            throw new \InvalidArgumentException("Invalid title");
        }
    }
}
