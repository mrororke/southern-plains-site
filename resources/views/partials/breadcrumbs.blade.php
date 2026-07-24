@if (count($breadcrumbs))
    <nav aria-label="Breadcrumb">
        <ol class="flex flex-wrap items-center gap-2 text-sm text-gray-500">
            @foreach ($breadcrumbs as $breadcrumb)
                <li class="flex items-center">
                    @if ($breadcrumb->url && ! $loop->last)
                        <a
                            href="{{ $breadcrumb->url }}"
                            class="hover:text-gray-900 transition-colors"
                        >
                            {{ $breadcrumb->title }}
                        </a>
                    @else
                        <span class="font-medium text-gray-900">
                            {{ $breadcrumb->title }}
                        </span>
                    @endif
                </li>

                @if (! $loop->last)
                    <li aria-hidden="true" class="text-gray-400">
                        /
                    </li>
                @endif
            @endforeach
        </ol>
    </nav>
@endif
