@php
    $messages = collect([
        'success' => [
            'message' => session('success'),
            'classes' => 'border-sp-successGreen/30 bg-sp-successGreen/10',
            'iconClasses' => 'text-sp-successGreen',
            'icon' => 'circle-check-big',
        ],

        'warning' => [
            'message' => session('warning'),
            'classes' => 'border-sp-warningOchre/30 bg-sp-warningOchre/10',
            'iconClasses' => 'text-sp-warningOchre',
            'icon' => 'circle-alert',
        ],

        'error' => [
            'message' => session('error'),
            'classes' => 'border-sp-clayRed/30 bg-sp-clayRed/10',
            'iconClasses' => 'text-sp-clayRed',
            'icon' => 'circle-alert',
        ],

        'info' => [
            'message' => session('info'),
            'classes' => 'border-sp-prairieBlue/30 bg-sp-prairieBlue/10',
            'iconClasses' => 'text-sp-prairieBlue',
            'icon' => 'info',
        ],
    ])->filter(fn ($item) => filled($item['message']));
@endphp

@if($messages->isNotEmpty())
    <div class="mb-4 space-y-3">
        @foreach($messages as $type => $feedback)
            <div
                x-data="{ open: true }"
                x-show="open"
                x-cloak
                x-transition.opacity.duration.200ms
                x-init="setTimeout(() => open = false, 5000)"
                class="flex items-start justify-between gap-4 rounded-md
                       border px-4 py-3
                       {{ $feedback['classes'] }}"
                role="{{ $type === 'error' ? 'alert' : 'status' }}"
                aria-live="{{ $type === 'error' ? 'assertive' : 'polite' }}"
            >
                <div class="flex min-w-0 items-start gap-3">
                    @if($feedback['icon'] === 'circle-check-big')
                        <x-icons.circle-check-big
                            class="mt-0.5 h-4 w-4 shrink-0
                                   {{ $feedback['iconClasses'] }}"
                        />
                    @elseif($feedback['icon'] === 'circle-alert')
                        <x-icons.circle-alert
                            class="mt-0.5 h-4 w-4 shrink-0
                                   {{ $feedback['iconClasses'] }}"
                        />
                    @elseif($feedback['icon'] === 'info')
                        <x-icons.info
                            class="mt-0.5 h-4 w-4 shrink-0
                                   {{ $feedback['iconClasses'] }}"
                        />
                    @endif

                    <p class="text-sm font-medium text-sp-charcoal">
                        {{ $feedback['message'] }}
                    </p>
                </div>

                <button
                    type="button"
                    @click="open = false"
                    aria-label="Dismiss notification"
                    class="shrink-0 text-sp-slate
                           transition-colors hover:text-sp-charcoal"
                >
                    <x-icons.x class="h-4 w-4" />
                </button>
            </div>
        @endforeach
    </div>
@endif