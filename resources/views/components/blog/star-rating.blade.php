@props(['rating'])

<div class="flex items-center space-x-0.5">
    @php
        $rating = (float) $rating; // Ensure the input is treated as a float
        $fullStars = floor($rating);
        // Logic to determine if a half star is needed (e.g., 4.5)
        $hasHalfStar = ($rating - $fullStars) >= 0.25 && ($rating - $fullStars) <= 0.75;
        $emptyStars = 5 - ceil($rating);
    @endphp

    {{-- Full Stars --}}
    @for ($i = 0; $i < $fullStars; $i++)
        <svg class="w-5 h-5 text-[#4CBB17]" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            {{-- PLACEHOLDER: Insert your star SVG <path> elements here --}}
            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.968 6.046h6.38c.969 0 1.371 1.24.588 1.81l-5.183 3.765 1.968 6.046c.3.921-.755 1.688-1.538 1.118l-5.183-3.765L4.47 18.718c-.783.57-1.838-.197-1.538-1.118l1.968-6.046-5.183-3.765c-.783-.57-.381-1.81.588-1.81h6.38L9.049 2.927z"/>
        </svg>
    @endfor

    {{-- Half Star (using a gradient to show half color) --}}
    @if ($hasHalfStar)
        <svg class="w-5 h-5" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <linearGradient id="half-gradient">
                    <stop offset="50%" stop-color="#4CBB17"/>
                    <stop offset="50%" stop-color="#D1D5DB"/>
                </linearGradient>
            </defs>
            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.968 6.046h6.38c.969 0 1.371 1.24.588 1.81l-5.183 3.765 1.968 6.046c.3.921-.755 1.688-1.538 1.118l-5.183-3.765L4.47 18.718c-.783.57-1.838-.197-1.538-1.118l1.968-6.046-5.183-3.765c-.783-.57-.381-1.81.588-1.81h6.38L9.049 2.927z" fill="url(#half-gradient)"/>
        </svg>
    @endif

    {{-- Empty Stars --}}
    @for ($i = 0; $i < $emptyStars; $i++)
        <svg class="w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            {{-- PLACEHOLDER: Insert your star SVG <path> elements here --}}
            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.968 6.046h6.38c.969 0 1.371 1.24.588 1.81l-5.183 3.765 1.968 6.046c.3.921-.755 1.688-1.538 1.118l-5.183-3.765L4.47 18.718c-.783.57-1.838-.197-1.538-1.118l1.968-6.046-5.183-3.765c-.783-.57-.381-1.81.588-1.81h6.38L9.049 2.927z"/>
        </svg>
    @endfor
</div>