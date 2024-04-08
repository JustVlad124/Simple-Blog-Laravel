<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Create Article') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="overflow-hidden overflow-x-auto border-b border-gray-200 bg-white p-6">
                    <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div>
                            <x-input-label for="title" value="Title" />
                            <x-text-input id="title" name="title" value="{{ old('title') }}" type="text" class="block mt-1 w-full" /><br />
                            <x-input-label for="text" value="Blog text" />
                            <textarea id="text" name="text" type="text" class="block mt-1 w-full" style="border-radius: 0.3rem; border-color: rgb(209 213 219);">{{ old('text') }}</textarea><br/>
                            <x-input-label for="categories" value="Category" />
                            <select id="categories" name="category" class="w-full" >
                                <option selected disabled>Please select a category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category }}</option>
                                @endforeach
                            </select>
                            <x-input-label for="tags" value="Tags" class="mt-4" />
                            <select class="w-full" id="tags" name="tags[]" multiple>
                                <option disabled selected>Please select one or more tags to this article</option>
                                @foreach($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->tag_name }}</option>
                                @endforeach
                            </select>
                            <x-input-label for="image" value="Blog image" class="mt-4" />
                            <input type="file" name="image" id="image" class="block mt-1 w-full"><br/>
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-primary-button>
                                Save
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
