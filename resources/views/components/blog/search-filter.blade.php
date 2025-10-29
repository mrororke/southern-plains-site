{{-- Start the form for search and filtering --}}
<form action="{{ route('blog.index') }}" method="GET" class="mb-10 p-4 bg-gray-50 border border-gray-200 rounded-lg">
    <div class="flex flex-col md:flex-row gap-4">
        
        {{-- Search Input --}}
        <input type="search" 
               name="search" 
               placeholder="Search blog posts..."
               {{-- CRUCIAL: Retain old search term from the request --}}
               value="{{ request('search') }}" 
               class="w-full md:w-2/3 p-3 border border-black placeholder:text-black focus:ring-[#4CBB17] focus:border-[#4CBB17]">
        
        {{-- Filter Dropdown --}}
        {{-- The 'onchange' event submits the form automatically when a category is selected --}}
        <select name="category" 
                class="w-full md:w-1/3 p-3 border border-black focus:ring-[#4CBB17] focus:border-[#4CBB17]" 
                onchange="this.form.submit()">
            
            <option value="">Filter by Category</option>
            
            {{-- Dynamically populate options from the $categories variable --}}
            @foreach ($categories as $category)
                <option value="{{ $category->slug }}"
                        {{-- CRUCIAL: Retain the selected category on page load --}}
                        {{ request('category') == $category->slug ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        
        {{-- Hidden Submit Button (Ensures the search input can be submitted by pressing Enter) --}}
        <button type="submit" class="hidden">Search</button>
    </div>
</form>