<div class="flex flex-col md:flex-row gap-4">
    
    {{-- Search Input --}}
    <input type="search" placeholder="Search blog posts..."
           class="w-full md:w-2/3 p-3 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500">
    
    {{-- Filter Dropdown --}}
    <select class="w-full md:w-1/3 p-3 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500">
        <option value="">Filter by Category</option>
        <option value="training">Training</option>
        <option value="nasda">NASDA Sports</option>
        <option value="stories">Success Stories</option>
    </select>
</div>