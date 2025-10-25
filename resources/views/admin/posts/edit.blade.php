@extends('layouts.admin')

@section('title', 'Dashboard Overview')
@section('page_title', 'Admin Dashboard')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Whoops!</strong>
            <span class="block sm:inline">There were some problems with your input.</span>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded shadow-xl">
        @csrf
        @method('PATCH')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <div class="mb-4">
                    <label for="title" class="block text-gray-700 font-semibold mb-2">Title</label>
                    <input type="text" name="title" id="title" 
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" 
                        required 
                        value="{{ old('title', $post->title) }}">
                </div>

                <div class="mb-4">
                    <label for="body" class="block text-gray-700 font-semibold mb-2">Post Body</label>
                    <textarea name="body" id="body" rows="15" 
                        class="shadow border rounded w-full py-2 px-3 text-gray-700" 
                        required>{{ old('body', $post->body) }}</textarea>
                </div>
            </div>

            <div>
                <div class="mb-4">
                    <label for="meta_description" class="block text-gray-700 font-semibold mb-2">Meta Description (SEO)</label>
                    <textarea name="meta_description" id="meta_description" rows="3" 
                        class="shadow border rounded w-full py-2 px-3 text-gray-700">{{ old('meta_description', $post->meta_description) }}</textarea>
                </div>
                
                <div class="mb-4">
                    <label for="category_id" class="block text-gray-700 font-semibold mb-2">Category</label>
                    <select name="category_id" id="category_id" class="shadow border rounded w-full py-2 px-3 text-gray-700" required>
                        <option value="">Select a Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" 
                                {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">Tags (Select all that apply)</label>
                    <div class="max-h-60 overflow-y-auto border rounded p-3 bg-gray-50">
                        @foreach($tags as $tag)
                            @php
                                $oldTags = collect(old('tags')); 
                                $isAttached = $post->tags->contains($tag->id);
                                $checked = $oldTags->contains($tag->id) || (empty($oldTags) && $isAttached);
                            @endphp
                            <label class="block items-center mb-1 cursor-pointer hover:bg-gray-100 p-1 rounded">
                                <input type="checkbox" name="tags[]" value="{{ $tag->id }}" class="form-checkbox" 
                                    {{ $checked ? 'checked' : '' }}>
                                <span class="ml-2 text-gray-700 text-sm">{{ $tag->name }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <div class="mb-4 flex items-center space-x-4">
                    <label for="published_at" class="block text-gray-700 font-semibold">Publish Date</label>
                    <input type="date" name="published_at" id="published_at" 
                        class="shadow border rounded py-2 px-3 text-gray-700" 
                        value="{{ old('published_at', $post->published_at ? $post->published_at->format('Y-m-d') : '') }}">
                    <span class="text-sm text-gray-500"> (Leave blank for Draft)</span>
                </div>
            </div>
        </div>

        <div class="mt-6 border-t pt-6">
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition duration-150 focus:outline-none focus:shadow-outline">
                Update Post
            </button>
            <a href="{{ route('admin.posts.index') }}" class="ml-4 bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded transition duration-150">
                Cancel
            </a>
            
        </div>
    </form>
</div>
@endsection