@extends('admin.dashboard-v2.desktop')

@section('content')

    @php

        $isRegistration = $inquiry->type === 'workshop_registration';

        $details = $inquiry->details ?? [];

        $registrationStatus = $details['registration_status'] ?? null;

        $paymentStatus = $details['payment_status'] ?? 'unpaid';

        $paymentDueAt = $details['payment_due_at'] ?? null;

        $unitPrice = $details['unit_price'] ?? null;
        $totalAmount = $details['total_amount'] ?? null;
        $participationType = $details['participation_type'] ?? null;
        $dogCount = is_array($details['dogs'] ?? null) ? count($details['dogs']) : 0;

        $paymentDeadlinePassed = false;

        if ($paymentDueAt) {

            $paymentDeadlinePassed = \Carbon\Carbon::parse($paymentDueAt)->lte(now());

        }

        $statusColors = [

            'pending_payment' => 'text-sp-warningOchre',

            'confirmed' => 'text-sp-successGreen',

            'waitlisted' => 'text-sp-prairieBlue',

            'cancelled' => 'text-sp-clayRed',

            'expired' => 'text-sp-clayRed',

        ];

        $statusLabels = [

            'pending_payment' => 'Pending Payment',

            'confirmed' => 'Confirmed',

            'waitlisted' => 'Waitlisted',

            'cancelled' => 'Cancelled',

            'expired' => 'Expired',

        ];

        $statusColor = $statusColors[$registrationStatus] ?? 'text-sp-slate';

        $statusLabel = $statusLabels[$registrationStatus] ?? 'Unknown';

        $canConfirmPayment = $isRegistration

            && $registrationStatus === 'pending_payment'

            && $paymentStatus === 'unpaid'

            && $paymentDueAt

            && !$paymentDeadlinePassed;

        $canOfferSpot = $isRegistration

            && $registrationStatus === 'waitlisted'

            && $paymentStatus === 'unpaid';

        $canCancelRegistration = $isRegistration

            && $registrationStatus !== 'cancelled';

    @endphp

    <div class="dashboard-content">

        {{-- Page Header --}}

        <div class="my-6">

            <div class="flex flex-wrap items-center justify-between gap-4 mt-4">

                <div>

                    <h1 class="font-sans text-sp-charcoal font-semibold text-6xl">

                        {{ $inquiry->subject ?: 'Inquiry #' . $inquiry->id }}

                    </h1>

                </div>

                <span class="text-sm text-sp-slate">

                    {{ $inquiry->created_at->format('M j, Y \a\t g:i A') }}

                </span>

            </div>

        </div>

        {{-- Feedback --}}

        @if (session('success'))

            <div class="border border-sp-successGreen rounded-md p-4 mb-6 text-sp-successGreen">

                {{ session('success') }}

            </div>

        @endif

        @if ($errors->any())

            <div class="border border-sp-clayRed rounded-md p-4 mb-6">

                <p class="font-semibold text-sp-clayRed mb-2">

                    Unable to complete the action.

                </p>

                <ul class="list-disc pl-5 text-sm text-sp-clayRed">

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        {{-- Inquiry Details --}}

        <div class="border-2 border-sp-warmStone bg-sp-limestone rounded-md p-6">

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

            @if (!empty($details))

                <div class="border-t border-sp-warmStone pt-6">

                    <h2 class="text-lg font-semibold text-sp-charcoal mb-4">

                        Additional Information

                    </h2>

                    <dl class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        @foreach ($details as $key => $value)

                            <div>

                                <dt class="text-xs uppercase tracking-wide text-sp-slate mb-2">

                                    {{ ucwords(str_replace('_', ' ', $key)) }}

                                </dt>

                                <dd class="text-sp-charcoal">

                                    @if (is_array($value))

                                        @if (empty($value))

                                            Not provided

                                        @elseif (collect($value)->every(fn ($item) => !is_array($item)))

                                            {{ implode(', ', $value) }}

                                        @else

                                            <div class="space-y-3">

                                                @foreach ($value as $index => $item)

                                                    @if (is_array($item))

                                                        <div class="border border-sp-warmStone rounded-md p-3">

                                                            <p class="font-semibold mb-2">

                                                                Dog {{ $index + 1 }}

                                                            </p>

                                                            <dl class="space-y-2">

                                                                @foreach ($item as $itemKey => $itemValue)

                                                                    <div>

                                                                        <dt class="text-xs uppercase tracking-wide text-sp-slate">

                                                                            {{ ucwords(str_replace('_', ' ', $itemKey)) }}

                                                                        </dt>

                                                                        <dd>

                                                                            {{ is_array($itemValue) ? implode(', ', $itemValue) : ($itemValue ?: 'Not provided') }}

                                                                        </dd>

                                                                    </div>

                                                                @endforeach

                                                            </dl>

                                                        </div>

                                                    @else

                                                        <p>{{ $item }}</p>

                                                    @endif

                                                @endforeach

                                            </div>

                                        @endif

                                    @elseif (is_bool($value))

                                        {{ $value ? 'Yes' : 'No' }}

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

        {{-- Event Registration Management --}}

        @if ($isRegistration)

            <div class="border-2 border-sp-warmStone bg-sp-limestone rounded-md p-6 mt-6">

                <div class="flex flex-wrap items-start justify-between gap-6 mb-6">

                    <div>

                        <h2 class="text-lg font-semibold text-sp-charcoal">

                            Registration Management

                        </h2>

                        <p class="text-sm text-sp-slate mt-2">

                            Manage payment, confirmation, and availability for this registration.

                        </p>

                    </div>

                    <div class="text-right">

                        <p class="text-xs uppercase tracking-wide text-sp-slate mb-1">

                            Registration Status

                        </p>

                        <p class="font-semibold {{ $statusColor }}">

                            {{ $statusLabel }}

                        </p>

                    </div>

                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 border-t border-sp-warmStone pt-6 mb-6">
                    <div>
                        <p class="text-xs uppercase tracking-wide text-sp-slate mb-2">Participation</p>
                        <p class="text-sp-charcoal font-medium">
                            @if ($participationType === 'working')
                                Working — {{ $dogCount }} {{ \Illuminate\Support\Str::plural('dog', $dogCount) }}
                            @elseif ($participationType === 'auditor')
                                Auditor
                            @else
                                Not recorded
                            @endif
                        </p>
                    </div>
                    <div>
                        <p class="text-xs uppercase tracking-wide text-sp-slate mb-2">
                            {{ $participationType === 'working' ? 'Price Per Dog' : ($participationType === 'auditor' ? 'Auditor Price' : 'Unit Price') }}
                        </p>
                        <p class="text-sp-charcoal font-medium">
                            {{ $unitPrice !== null ? '$' . number_format((float) $unitPrice, 2) : 'Not recorded' }}
                        </p>
                    </div>
                    <div>
                        <p class="text-xs uppercase tracking-wide text-sp-slate mb-2">Registration Total</p>
                        <p class="text-sp-charcoal font-semibold">
                            {{ $totalAmount !== null ? '$' . number_format((float) $totalAmount, 2) : 'Not recorded' }}
                        </p>
                        @if ($registrationStatus === 'waitlisted')
                            <p class="text-sm text-sp-slate mt-1">Payment is not due while this registration is waitlisted.</p>
                        @endif
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 border-t border-sp-warmStone pt-6 mb-6">

                    <div>

                        <p class="text-xs uppercase tracking-wide text-sp-slate mb-2">

                            Payment Status

                        </p>

                        <p class="font-medium {{ $paymentStatus === 'paid' ? 'text-sp-successGreen' : 'text-sp-warningOchre' }}">

                            {{ ucfirst($paymentStatus) }}

                        </p>

                    </div>

                    <div>

                        <p class="text-xs uppercase tracking-wide text-sp-slate mb-2">

                            Payment Deadline

                        </p>

                        @if ($paymentDueAt)

                            <p class="text-sp-charcoal">

                                {{ \Carbon\Carbon::parse($paymentDueAt)->format('M j, Y \a\t g:i A') }}

                            </p>

                            @if ($registrationStatus === 'pending_payment' && $paymentDeadlinePassed)

                                <p class="text-sm text-sp-clayRed mt-1">

                                    Deadline passed. This reservation can no longer be confirmed.

                                </p>

                            @endif

                        @else

                            <p class="text-sp-slate">

                                Not assigned

                            </p>

                        @endif

                    </div>

                    @if (!empty($details['payment_method']))

                        <div>

                            <p class="text-xs uppercase tracking-wide text-sp-slate mb-2">

                                Payment Method

                            </p>

                            <p class="text-sp-charcoal">

                                {{ ucwords(str_replace('_', ' ', $details['payment_method'])) }}

                            </p>

                        </div>

                    @endif

                    @if (!empty($details['paid_at']))

                        <div>

                            <p class="text-xs uppercase tracking-wide text-sp-slate mb-2">

                                Payment Received

                            </p>

                            <p class="text-sp-charcoal">

                                {{ \Carbon\Carbon::parse($details['paid_at'])->format('M j, Y \a\t g:i A') }}

                            </p>

                        </div>

                    @endif

                </div>

                {{-- Confirm Payment --}}

                @if ($canConfirmPayment)

                    <div class="border-t border-sp-warmStone pt-6 mb-6">

                        <h3 class="font-semibold text-sp-charcoal mb-2">

                            Confirm Payment

                        </h3>

                        <p class="text-sm text-sp-slate mb-4">

                            Record the payment method to confirm this registration.

                        </p>

                        <form action="{{ route('admin.inquiries.confirm-payment', $inquiry) }}"

                            method="POST"

                            class="flex flex-wrap items-end gap-3">

                            @csrf

                            @method('PATCH')

                            <div>

                                <label for="payment_method"

                                    class="block text-xs uppercase tracking-wide text-sp-slate mb-2">

                                    Payment Method

                                </label>

                                <select id="payment_method"

                                    name="payment_method"

                                    required

                                    class="rounded-md border border-sp-warmStone bg-white text-sp-charcoal px-4 py-3">

                                    <option value="">Select method</option>

                                    <option value="paypal" @selected(old('payment_method') === 'paypal')>PayPal</option>

                                    <option value="venmo" @selected(old('payment_method') === 'venmo')>Venmo</option>

                                    <option value="apple_pay" @selected(old('payment_method') === 'apple_pay')>Apple Pay</option>

                                    <option value="cash_app" @selected(old('payment_method') === 'cash_app')>Cash App</option>

                                </select>

                            </div>

                            <button type="submit"

                                class="inline-flex items-center justify-center rounded-md bg-sp-prairieGreen px-5 py-3 text-sm font-semibold text-white transition-colors hover:bg-sp-prairieGreen/90">

                                Confirm Registration

                            </button>

                        </form>

                    </div>

                @endif

                {{-- Waitlist Offer --}}

                @if ($canOfferSpot)

                    <div class="border-t border-sp-warmStone pt-6 mb-6">

                        <h3 class="font-semibold text-sp-charcoal mb-2">

                            Offer Available Spot

                        </h3>

                        <p class="text-sm text-sp-slate mb-4">

                            If capacity is available, this will reserve the requested spot or spots for 24 hours.

                            You will need to contact the participant with payment instructions.

                        </p>

                        <form action="{{ route('admin.inquiries.offer-waitlist-spot', $inquiry) }}"

                            method="POST">

                            @csrf

                            @method('PATCH')

                            <button type="submit"

                                class="inline-flex items-center justify-center rounded-md bg-sp-prairieGreen px-5 py-3 text-sm font-semibold text-white transition-colors hover:bg-sp-prairieGreen/90">

                                Offer Spot

                            </button>

                        </form>

                    </div>

                @endif

                {{-- Cancellation --}}

                @if ($canCancelRegistration)

                    <div class="border-t border-sp-warmStone pt-6">

                        <h3 class="font-semibold text-sp-charcoal mb-2">

                            Cancel Registration

                        </h3>

                        <p class="text-sm text-sp-slate mb-4">

                            Cancelling releases any reserved spots. Payment history is retained,

                            and any applicable refund must be handled separately.

                        </p>

                        <form action="{{ route('admin.inquiries.cancel-registration', $inquiry) }}"

                            method="POST"

                            onsubmit="return confirm('Are you sure you want to cancel this registration?');">

                            @csrf

                            @method('PATCH')

                            <button type="submit"

                                class="inline-flex items-center justify-center rounded-md border border-sp-clayRed px-5 py-3 text-sm font-semibold text-sp-clayRed transition-colors hover:bg-sp-clayRed hover:text-white">

                                Cancel Registration

                            </button>

                        </form>

                    </div>

                @endif

            </div>

        @endif

        {{-- Inquiry Management --}}

        <div class="border-2 border-sp-warmStone bg-sp-limestone rounded-md p-6 mt-6">

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

                <div class="flex flex-wrap items-center gap-3">

                    {{-- Resolve / Reopen --}}

                    @if ($inquiry->resolved_at)

                        <form action="{{ route('admin.inquiries.reopen', $inquiry) }}"

                            method="POST">

                            @csrf

                            @method('PATCH')

                            <button type="submit"

                                class="px-6 py-3 border border-sp-prairieGreen text-sp-prairieGreen rounded-md hover:bg-sp-prairieGreen hover:text-white transition">

                                Reopen Inquiry

                            </button>

                        </form>

                    @else

                        <form action="{{ route('admin.inquiries.resolve', $inquiry) }}"

                            method="POST">

                            @csrf

                            @method('PATCH')

                            <button type="submit"

                                class="inline-flex items-center justify-center gap-2 rounded-md bg-sp-prairieGreen px-5 py-3 text-sm font-semibold text-white transition-colors hover:bg-sp-prairieGreen/90">

                                Mark as Resolved

                            </button>

                        </form>

                    @endif

                    {{-- Archive / Restore --}}

                    @if ($inquiry->archived_at)

                        <form action="{{ route('admin.inquiries.restore', $inquiry) }}"

                            method="POST">

                            @csrf

                            @method('PATCH')

                            <button type="submit"

                                class="ml-auto inline-flex items-center justify-center gap-2 rounded-md bg-sp-prairieGreen px-4 py-2 text-sm font-semibold text-sp-warmIvory transition-colors hover:bg-sp-prairieOchre">

                                Restore Inquiry

                            </button>

                        </form>

                    @else

                        <form action="{{ route('admin.inquiries.archive', $inquiry) }}"

                            method="POST">

                            @csrf

                            @method('PATCH')

                            <button type="submit"

                                class="inline-flex items-center justify-center rounded-md border border-sp-warmStone px-4 py-2 text-sm font-semibold text-sp-charcoal hover:bg-sp-limestone/20">

                                Archive Inquiry

                            </button>

                        </form>

                    @endif

                </div>

            </div>

        </div>

    </div>

@endsection
