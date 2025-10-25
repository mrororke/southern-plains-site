@extends('layouts.admin')

@section('title', 'Post Management')
@section('page_title', 'Post Management Dashboard')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    
    <div class="container mx-auto p-4">

    {{-- Display Success Message --}}
    @if (session('success'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
        <p>{{ session('success') }}</p>
    </div>
    @endif

    <div class="flex justify-between items-center mb-6">

        <a href="{{ route('admin.posts.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition duration-150">
            + New Post
        </a>
    </div>

    @if ($posts->isEmpty())
    <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4" role="alert">
        <p>You have not created any posts yet. Click the button above to start writing!</p>
    </div>
    @else
    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                    <th class="px-6 py-3"></th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($posts as $post)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        {{ Str::limit($post->title, 50) }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $post->category->name ?? 'N/A' }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if ($post->published_at)
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Published</span>
                        @else
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Draft</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $post->published_at ? $post->published_at->format('M j, Y') : $post->created_at->format('M j, Y') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">

                        <a href="{{ route('admin.posts.edit', $post) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition duration-150">Edit</a>

                        <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this post?');">
                            @csrf
                            @method('DELETE') <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition duration-150">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $posts->links() }}
    </div>
    @endif
</div>
</div>
@endsection