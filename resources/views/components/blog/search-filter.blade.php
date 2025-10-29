{{-- Start the form for search and filtering --}}
<form action="{{ route('blog.index') }}" method="GET">
    <div class="flex flex-col md:flex-col gap-4">
        
        {{-- Search Input --}}
        <input type="search" 
               name="search" 
               placeholder="Search blog posts..."
               {{-- CRUCIAL: Retain old search term --}}
               value="{{ request('search') }}" 
               class="w-full p-3 border border-black placeholder:text-black focus:ring-[#4CBB17] focus:border-[#4CBB17]">
        
        {{-- Filter Dropdown --}}
        <select name="category" 
                class="w-full p-3 border border-black focus:ring-[#4CBB17] focus:border-[#4CBB17]"
                onchange="this.form.submit()">
            
            <option value="">Filter by Category</option>
            
            {{-- Dynamically populate options from the $categories variable --}}
            @foreach ($categories as $category)
                <option value="{{ $category->slug }}"
                        {{-- CRUCIAL: Retain the selected category --}}
                        {{ request('category') == $category->slug ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        
        {{-- Hidden Submit Button (Allows pressing Enter in the search box) --}}
        <button type="submit" class="hidden">Search</button>
    </div>
</form>