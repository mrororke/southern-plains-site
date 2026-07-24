@if (count($breadcrumbs))
    <nav aria-label="Breadcrumb">
        <ol class="flex flex-wrap items-center gap-2 text-sm text-sp-deepGranite">
            @foreach ($breadcrumbs as $breadcrumb)
                <li class="flex items-center">
                    @if ($breadcrumb->url && ! $loop->last)
                        <a
                            href="{{ $breadcrumb->url }}"
                            class="hover:text-sp-controlledLime hover:underline transition-colors"
                        >
                            {{ $breadcrumb->title }}
                        </a>
                    @else
                        <span class="font-medium text-sp-deepTeal">
                            {{ $breadcrumb->title }}
                        </span>
                    @endif
                </li>

                @if (! $loop->last)
                    <li aria-hidden="true" class="text-sp-deepGranite">
                        /
                    </li>
                @endif
            @endforeach
        </ol>
    </nav>
@endif
