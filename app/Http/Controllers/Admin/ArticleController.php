<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ArticleController extends Controller
{
    /**
     * Display a homepage.
     */
    public function index(): View
    {
        $articles = Article::paginate(20);

        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.articles.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/blog', 'public');
        }

        $article = Auth::user()->articles()->create([
            'title' => $request->title,
            'text' => $request->text,
            'picture_path' =>$imagePath ?? null,
            'category_id' => $request->category,
        ]);

        $article->tags()->attach($request->tags);

        return to_route('admin.articles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
//
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article): View
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.articles.edit', compact('article', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article): RedirectResponse
    {
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/blog', 'public');
            Storage::disk('public')->delete($article->picture_path);
        }

        $article->update($request->all());

        $article->tags()->sync($request->tags);

        return to_route('admin.articles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article): RedirectResponse
    {
        if ($article->picture_path) {
            Storage::disk('public')->delete($article->picture_path);
        }

        $article->tags()->detach();
        $article->delete();

        return to_route('admin.articles.index');
    }
}
