@props(['rating'])

<div class="flex items-center space-x-0.5">
    @php
        $rating = (float) $rating;
        $fullStars = floor($rating);
        // Corrected logic: Check if the fractional part is at least 0.5 (e.g., 4.5)
        $hasHalfStar = ($rating - $fullStars) >= 0.5;
        $emptyStars = 5 - ceil($rating); 
        
        // If the rating is exactly X.0, we still want to show 5 stars total (4 full, 1 empty)
        if ($rating == round($rating)) {
            $emptyStars = 5 - $rating;
        }
    @endphp

    @php
        // The shared path data for your star
        $starPath = 'M31.125 16.5H46.0312C46.9688 16.5 47.8125 17.1562 48.0938 18.0938C48.4688 18.9375 48.0938 19.9688 47.3438 20.5312L35.0625 30.0938L39.8438 45.0938C40.2188 46.0312 39.8438 47.0625 39 47.625C38.25 48.1875 37.125 48.1875 36.375 47.5312L24.2812 38.1562L12.0938 47.5312C11.3438 48.1875 10.2188 48.1875 9.46875 47.625C8.625 47.0625 8.25 46.0312 8.625 45.0938L13.4062 30.0938L1.125 20.5312C0.375 19.9688 0 18.9375 0.375 18.0938C0.65625 17.1562 1.5 16.5 2.53125 16.5H17.3438L22.125 1.59375C22.4062 0.65625 23.25 0 24.2812 0C25.2188 0 26.0625 0.65625 26.3438 1.59375L31.125 16.5Z';
        // Your custom green color
        $greenColor = '#4CBB17';
        // Tailwind's gray-300 color for empty stars
        $grayColor = '#D1D5DB';
    @endphp

    {{-- 1. Full Stars --}}
    @for ($i = 0; $i < $fullStars; $i++)
        <svg class="w-5 h-5 text-[{{ $greenColor }}]" fill="currentColor" viewBox="0 0 49 49" xmlns="http://www.w3.org/2000/svg">
            {{-- REMOVED hardcoded fill="black" --}}
            <path d="{{ $starPath }}" />
        </svg>
    @endfor

    {{-- 2. Half Star --}}
    @if ($hasHalfStar)
        <svg class="w-5 h-5" viewBox="0 0 49 49" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <linearGradient id="half-gradient-{{ $rating }}" x1="0%" y1="0%" x2="100%" y2="0%">
                    <stop offset="50%" style="stop-color:{{ $greenColor }}; stop-opacity:1" />
                    <stop offset="50%" style="stop-color:{{ $grayColor }}; stop-opacity:1" />
                </linearGradient>
            </defs>
            {{-- REMOVED hardcoded fill="black" --}}
            <path d="{{ $starPath }}" fill="url(#half-gradient-{{ $rating }})" />
        </svg>
    @endif

    {{-- 3. Empty Stars --}}
    @for ($i = 0; $i < $emptyStars; $i++)
        <svg class="w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 49 49" xmlns="http://www.w3.org/2000/svg">
            {{-- REMOVED hardcoded fill="black" --}}
            <path d="{{ $starPath }}" />
        </svg>
    @endfor
</div>