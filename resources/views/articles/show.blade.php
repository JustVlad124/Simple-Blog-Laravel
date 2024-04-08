<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $article->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="article-card">
                        <img src="{{ asset('storage/' . $article->picture_path) }}" alt="Blog Image" width="100px">
                        <p class="mt-4">{{ $article->text }}</p>
                        <p class="mt-6">{{ $article->category->category }}</p>

                        @foreach ($article->tags as $tag)
                            <a href="#" class="btn btn-outline-secondary">#{{ $tag->tag_name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
