<?php

declare(strict_types=1);

namespace Content\Infraestructure\Http\Controllers;

use Content\Application\Services\ArticleService;
use Content\Domain\Entities\Article;
use Content\Infraestructure\Inputs\CreateArticleInput;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ArticleController extends Controller {

    public function __construct(public readonly ArticleService $articleService) {}
    
    public function index() {
        $articles = $this->articleService->getArticles();
        return response()->json($articles);
    }

    public function show(int $id): JsonResponse {
        $article = $this->articleService->getArticle($id);
        if($article === null) {
            return response()->json(['message' => 'Article not found'], 404);
        }

        return response()->json($article);
    }

    public function store(Request $request): JsonResponse {
        $input = new CreateArticleInput(
            title: $request->input('title'),
            content: $request->input('content'),
            images: $request->input('images')
        );

        $article = $this->articleService->createArticle(new Article(
            title: $input->title,
            content: $input->content,
            images: $input->images
        ));

        return response()->json($article, 201);
    }

    public function update(int $id, Request $request): JsonResponse {
        $article = $this->articleService->getArticle($id);
        if($article === null) {
            return response()->json(['message'=> 'Article not found'],404);
        }

        $updatedArticle = new Article(
            id: $article->id,
            title: $request->input('title', $article->title),
            images: $request->input('images'),
            content: $request->input('content', $article->content),
            createdAt: $article->createdAt,
        );

        $article = $this->articleService->updateArticle($updatedArticle);

        return response()->json($article);
    }

    public function destroy(int $id): JsonResponse {
        $article = $this->articleService->getArticle($id);

        if($article === null) {
            return response()->json(['message'=> 'Article not found'],404);
        }

        $this->articleService->deleteArticle($id);

        return response()->json(['message'=> 'Article deleted'],200);
    }
}
