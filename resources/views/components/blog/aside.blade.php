{{-- Categories & Tags (Right Side: 1/4 Width) --}}
        <aside class="w-full lg:w-1/4 pt-4 lg:pt-0">
            <h4 class="uppercase text-small font-bold pb-4">Categories</h4>

            <ul class="space-y-4">
                @forelse ($categories as $category)
                <li class="flex justify-between items-center pb-2 border-b last:border-b-0">
                    {{-- Category Name (Linked to the filter route) --}}
                    <a href="{{ route('blog.category', $category->slug) }}"
                        class="text-sm font-medium text-black hover:text-club-hover block leading-snug">
                        {{ $category->name }}
                    </a>

                    {{-- Number of Posts --}}
                    <span class="text-xs font-bold text-black bg-gray-200 px-2 py-0.5 rounded-full">
                        {{ $category->posts_count }}
                    </span>
                </li>
                @empty
                <p class="text-sm text-black">No categories defined yet.</p>
                @endforelse
            </ul>

            <h4 class="uppercase text-small font-bold pt-4 pb-4">Tags</h4>

            @if ($tags->isNotEmpty())
            @php
            // 1. Define Range and Available Sizes
            // You can adjust the font sizes here (from smallest to largest)
            $fontSizes = ['text-xs', 'text-sm', 'text-base', 'text-lg'];
            $sizeCount = count($fontSizes);

            // Find the min/max counts in the collection
            $minCount = $tags->min('posts_count');
            $maxCount = $tags->max('posts_count');

            // Handle edge case where all tags have the same count
            $range = ($maxCount > $minCount) ? ($maxCount - $minCount) : 1;
            @endphp

            @foreach ($tags as $tag)
            @php
            // 2. Calculate Proportional Size
            // This formula scales the tag's count to an index within the $fontSizes array
            $sizeIndex = floor((($tag->posts_count - $minCount) / $range) * ($sizeCount - 1));
            $fontSize = $fontSizes[$sizeIndex];

            // 3. Define Visual Appearance
            // Use a more prominent color/style for the largest tags
            $colorClass = ($fontSize == 'text-lg')
            ? 'bg-club text-white hover:bg-club-hover'
            : 'bg-[#4CBB17]/50 text-black hover:bg-club-hover';
            @endphp

            <a href="{{ route('blog.tag', $tag->slug) }}"
                class="{{ $fontSize }} {{ $colorClass }} my-2 mx-2 font-sm py-1 px-3 transition duration-200 whitespace-nowrap">
                #{{ $tag->name }}
            </a>
            @endforeach
            @else
            <p class="text-sm text-black">No tags currently in use.</p>
            @endif
        </aside>