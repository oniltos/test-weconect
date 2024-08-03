<?php

declare(strict_types= 1);

namespace Content\Infraestructure\Inputs;

class CreateArticleInput
{
    public function __construct(
        public readonly string $title,
        public readonly string $content,
        public readonly ?array $images = []
    ) {
        $this->validate();
    }

    private function validate(): void
    {
        if(empty($this->title) || strlen($this->title) > 255) {
            throw new \InvalidArgumentException("Invalid title");
        }
    }
}
