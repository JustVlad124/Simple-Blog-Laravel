<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Articles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="overflow-hidden overflow-x-auto border-b border-gray-200 bg-white p-6">
                    <div class="min-w-full align-middle">
                        @foreach($articles as $article)
                            <div class="container thumbs">
                                <div class="col-sm-6 col-md-4">
                                    <div class="thumbnail">
{{--                                        <img src="{{ $article->getImageURL() }}" alt="Blog picture" class="img-responsive">--}}
                                        <img src="{{ $article->getImageURL() }}" alt="Blog picture" class="img-responsive">
                                        <div class="caption">
                                            <h3 class="">{{ $article->title }}</h3>
                                            <div>
                                                <p>{{ $article->text }}</p>
                                            </div>
                                            <div class="btn-toolbar text-center">
                                                <a href="#" role="button" class="btn btn-primary pull-right">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
