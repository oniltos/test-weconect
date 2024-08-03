<?php

declare(strict_types=1);

namespace Content\Infraestructure\Repository;
use Content\Domain\Repositories\ArticleRepositoryInterface;
use Content\Domain\Entities\Article;
use DateTime;
use Illuminate\Support\Facades\Storage;
use SebastianBergmann\Type\VoidType;
use Illuminate\Support\Facades\DB;

class ArticleRepository implements ArticleRepositoryInterface
{
    public function find(): array
    {
        $articles = DB::table("articles")->orderBy("created_at", "desc")->limit(10)->get();
        return $articles->map(function ($article) {
            return $this->transformArticle($article);
        })->toArray();
    }
    public function findById(int $id): ?Article
    {
        $article = DB::table("articles")->find($id);
        if(! $article) {
            return null;
        }

        return new Article(
            id: $article->id,
            title: $article->title,
            content: $article->content,
            images: json_decode($article->images),
            createdAt: new DateTime($article->created_at)
        );
    }

    public function save(Article $article): Article
    {
        $id = DB::table("articles")->insertGetId([
            "title" => $article->title,
            "content" => $article->content,
            "images" => json_encode($article->images),
            "created_at"=> $article->createdAt->format("Y-m-d H:i:s"),
        ]);

        return new Article(
            id: $id,
            title: $article->title,
            content: $article->content,
            images: $article->images,
            createdAt: $article->createdAt
        );
    }

    public function update(Article $article): Article
    {
        DB::table("articles")->where("id", $article->id)
            ->update([
                "title"=> $article->title,
                "content"=> $article->content,
                "images" => json_encode($article->images),
                "created_at"=> $article->createdAt->format("Y-m-d H:i:s"),
            ]);

        return $article;
    }

    public function delete(int $id): void 
    {
        DB::table("articles")->where("id", $id)->delete();
    }

    private function transformArticle($article): Article
    {
        $images = json_decode($article->images, true) ?? [];
        $s3Urls = array_map(function ($imageKey) {
            return Storage::disk('s3')->url($imageKey);
        }, $images);

        return new Article(
            id: $article->id,
            title: $article->title,
            content: $article->content,
            createdAt: new DateTime($article->created_at),
            images: $s3Urls
        );
    }
}
