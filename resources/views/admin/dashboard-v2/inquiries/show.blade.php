@extends('admin.dashboard-v2.desktop')

@section('content')
    <div class="dashboard-content">

        {{-- Page Header --}}
        <div class="my-6">
            <a href="{{ route('admin.dashboard') }}"
                class="text-sm text-sp-prairieGreen hover:underline">
                &larr; Back to Dashboard
            </a>

            <div class="flex flex-wrap items-center justify-between gap-4 mt-4">
                <div>
                    <p class="text-xs uppercase tracking-wide text-sp-heritage">
                        {{ ucwords(str_replace('_', ' ', $inquiry->type)) }}
                    </p>

                    <h1 class="font-sans text-sp-charcoal font-semibold text-4xl mt-2">
                        {{ $inquiry->subject ?: 'Inquiry #' . $inquiry->id }}
                    </h1>
                </div>

                <span class="text-sm text-sp-slate">
                    {{ $inquiry->created_at->format('M j, Y \a\t g:i A') }}
                </span>
            </div>
        </div>

        {{-- Inquiry Details --}}
        <div class="border-2 border-sp-warmStone bg-sp-limestone rounded-sm p-6">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">

                <div>
                    <p class="text-xs uppercase tracking-wide text-sp-slate mb-2">
                        Contact Name
                    </p>
                    <p class="text-sp-charcoal font-medium">
                        {{ $inquiry->name }}
                    </p>
                </div>

                <div>
                    <p class="text-xs uppercase tracking-wide text-sp-slate mb-2">
                        Email Address
                    </p>
                    <a href="mailto:{{ $inquiry->email }}"
                        class="text-sp-prairieGreen hover:underline">
                        {{ $inquiry->email }}
                    </a>
                </div>

            </div>

            {{-- Message --}}
            @if ($inquiry->message)
                <div class="border-t border-sp-warmStone pt-6 mb-8">
                    <h2 class="text-lg font-semibold text-sp-charcoal mb-4">
                        Message
                    </h2>

                    <p class="text-sp-slate whitespace-pre-line">
                        {{ $inquiry->message }}
                    </p>
                </div>
            @endif

            {{-- Form-Specific Details --}}
            @if (!empty($inquiry->details))
                <div class="border-t border-sp-warmStone pt-6">
                    <h2 class="text-lg font-semibold text-sp-charcoal mb-4">
                        Additional Information
                    </h2>

                    <dl class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach ($inquiry->details as $key => $value)
                            <div>
                                <dt class="text-xs uppercase tracking-wide text-sp-slate mb-2">
                                    {{ ucwords(str_replace('_', ' ', $key)) }}
                                </dt>

                                <dd class="text-sp-charcoal">
                                    @if (is_array($value))
                                        {{ implode(', ', $value) }}
                                    @else
                                        {{ $value ?: 'Not provided' }}
                                    @endif
                                </dd>
                            </div>
                        @endforeach
                    </dl>
                </div>
            @endif

        </div>

        {{-- Inquiry Management --}}
        <div class="border-2 border-sp-warmStone bg-sp-limestone rounded-sm p-6 mt-6">

            <div class="flex flex-wrap items-center justify-between gap-4">

                <div>
                    <h2 class="text-lg font-semibold text-sp-charcoal">
                        Inquiry Status
                    </h2>

                    <p class="text-sm text-sp-slate mt-2">
                        @if ($inquiry->resolved_at)
                            Resolved on {{ $inquiry->resolved_at->format('M j, Y') }}
                        @else
                            This inquiry has not been resolved.
                        @endif
                    </p>
                </div>

                <div>
                    @if ($inquiry->resolved_at)
                        <form action="{{ route('admin.inquiries.reopen', $inquiry) }}"
                            method="POST">
                            @csrf
                            @method('PATCH')

                            <button type="submit"
                                class="px-6 py-3 border border-sp-prairieGreen text-sp-prairieGreen rounded-sm hover:bg-sp-prairieGreen hover:text-white transition">
                                Reopen Inquiry
                            </button>
                        </form>
                    @else
                        <form action="{{ route('admin.inquiries.resolve', $inquiry) }}"
                            method="POST">
                            @csrf
                            @method('PATCH')

                            <button type="submit"
                                class="px-6 py-3 bg-sp-prairieGreen text-white rounded-sm hover:opacity-90 transition">
                                Mark as Resolved
                            </button>
                        </form>
                    @endif
                </div>

            </div>
        </div>

    </div>
@endsection