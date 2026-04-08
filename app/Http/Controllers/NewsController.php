<?php

namespace App\Http\Controllers;

use App\Models\NewsArticle;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request): View
    {
        $articles = NewsArticle::query()
            ->published()
            ->when($request->string('q')->isNotEmpty(), function ($query) use ($request): void {
                $term = (string) $request->string('q');
                $query->where(function ($inner) use ($term): void {
                    $inner->where('title', 'like', "%{$term}%")
                        ->orWhere('summary', 'like', "%{$term}%")
                        ->orWhereJsonContains('tags_json', $term);
                });
            })
            ->latest('publish_at')
            ->paginate(10)
            ->withQueryString();

        return view('news.index', compact('articles'));
    }

    public function show(NewsArticle $article): View
    {
        abort_unless($article->status === 'published', 404);

        return view('news.show', compact('article'));
    }
}
