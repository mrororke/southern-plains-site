@extends('layouts.app')

@section('content')
<div class="container mx-auto p-8">
    
    <div class="flex justify-between items-center mb-6 border-b pb-4">
        <h1 class="text-4xl font-extrabold text-gray-900">{{ $post->title }}</h1>
        <div class="space-x-4">
            <a href="{{ route('admin.posts.edit', $post) }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded transition duration-150">
                Edit Post
            </a>
            <a href="{{ route('admin.posts.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded transition duration-150">
                Back to Index
            </a>
        </div>
    </div>
    
    <div class="grid grid-cols-3 gap-8">
        
        <div class="col-span-2">
            <h2 class="text-2xl font-semibold mb-3 border-b pb-2 text-gray-800">Post Content</h2>
            <div class="prose max-w-none">
                {{-- NOTE: You will need to process $post->body for HTML rendering later --}}
                <p>{!! nl2br(e($post->body)) !!}</p>
            </div>
        </div>

        <div class="col-span-1 bg-gray-50 p-6 rounded-lg shadow-inner">
            <h2 class="text-2xl font-semibold mb-4 border-b pb-2 text-gray-800">Metadata</h2>
            
            <p class="mb-3">
                <span class="font-medium text-gray-700">Category:</span> 
                <span class="text-indigo-600 font-bold">{{ $post->category->name ?? 'N/A' }}</span>
            </p>
            
            <p class="mb-3">
                <span class="font-medium text-gray-700">Status:</span> 
                @if ($post->published_at)
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Published on {{ $post->published_at->format('M j, Y') }}</span>
                @else
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Draft</span>
                @endif
            </p>
            
            <p class="mb-4">
                <span class="font-medium text-gray-700">Meta Description:</span> 
                <span class="text-gray-600 italic block mt-1">{{ $post->meta_description ?? 'None' }}</span>
            </p>
            
            <h3 class="text-xl font-medium mb-2 text-gray-700 border-t pt-4">Tags</h3>
            <div class="flex flex-wrap gap-2">
                @forelse($post->tags as $tag)
                    <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">{{ $tag->name }}</span>
                @empty
                    <span class="text-sm text-gray-500">No tags assigned.</span>
                @endforelse
            </div>
        </div>
    </div>
    
</div>
@endsection