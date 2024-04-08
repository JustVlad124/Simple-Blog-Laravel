<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Latest posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="card-body">
                        <div class="row">
                            @foreach ($articles as $article)
                                <div class="col-md-4">
                                    <div>
                                        <a href="{{ route('articles.show', $article) }}">
                                            @if($article->picture_path)
                                                <img src="{{ asset('storage/' . $article->picture_path) }}" width="100"
                                                     height="100" class="img-fluid">
                                            @else
                                                <img src="{{ asset('no_image.jpg') }}" width="100" height="100"
                                                     class="img-fluid">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="text-muted">{{ $article->created_at->format('d F Y') }}</div>
                                        <div class=""><a href="#"
                                                         class="font-weight-bolder text-info">{{ $article->category->category }}</a>
                                        </div>
                                    </div>
                                    <a href="{{ route('articles.show', $article) }}" class="font-weight-bold text-success">
                                        <h3 class="">{{ $article->title }}</h3>
                                    </a>
                                    <p class="text-muted">{{ $article->text }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
