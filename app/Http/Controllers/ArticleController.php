<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function index(): View
    {
        $articles = Article::with('category', 'tags')->latest()->paginate(10);

        return view('articles.index', compact('articles'));
    }

    public function show(Article $article): View
    {
        return \view('articles.show', compact('article'));
    }
}
