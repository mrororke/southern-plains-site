@props([
    'inquiries' => collect(),
    'archivedInquiries' => collect(),
])

<div
    x-data="{ tab: 'all' }"
    class="border-2 border-sp-warmStone bg-sp-limestone text-sp-charcoal rounded-sm my-4">

    {{-- Tabs --}}
    <div class="border-b border-sp-warmStone">
        <nav class="flex gap-6 px-6">

            {{-- All --}}
            <button
                type="button"
                @click="tab = 'all'"
                :class="tab === 'all'
                    ? 'border-b-2 border-sp-prairieGreen text-sp-charcoal'
                    : 'text-sp-slate'"
                class="py-4 uppercase text-xs tracking-wide">
                All ({{ $inquiries->count() }})
            </button>

            {{-- Contact --}}
            <button
                type="button"
                @click="tab = 'contact'"
                :class="tab === 'contact'
                    ? 'border-b-2 border-sp-prairieGreen text-sp-charcoal'
                    : 'text-sp-slate'"
                class="py-4 uppercase text-xs tracking-wide">
                Contact ({{ $inquiries->where('type', 'contact')->count() }})
            </button>

            {{-- Workshops --}}
            <button
                type="button"
                @click="tab = 'workshops'"
                :class="tab === 'workshops'
                    ? 'border-b-2 border-sp-prairieGreen text-sp-charcoal'
                    : 'text-sp-slate'"
                class="py-4 uppercase text-xs tracking-wide">
                Workshops ({{ $inquiries->where('type', 'workshop_request')->count() }})
            </button>

            {{-- Event Registrations --}}
            <button
                type="button"
                @click="tab = 'event_registrations'"
                :class="tab === 'event_registrations'
                    ? 'border-b-2 border-sp-prairieGreen text-sp-charcoal'
                    : 'text-sp-slate'"
                class="py-4 uppercase text-xs tracking-wide">
                Event Registrations ({{ $inquiries->where('type', 'workshop_registration')->count() }})
            </button>

            {{-- Judge Requests --}}
            <button
                type="button"
                @click="tab = 'judge_requests'"
                :class="tab === 'judge_requests'
                    ? 'border-b-2 border-sp-prairieGreen text-sp-charcoal'
                    : 'text-sp-slate'"
                class="py-4 uppercase text-xs tracking-wide">
                Judge Requests ({{ $inquiries->where('type', 'judge_request')->count() }})
            </button>

            {{-- Trial Requests --}}
            <button
                type="button"
                @click="tab = 'trial_requests'"
                :class="tab === 'trial_requests'
                    ? 'border-b-2 border-sp-prairieGreen text-sp-charcoal'
                    : 'text-sp-slate'"
                class="py-4 uppercase text-xs tracking-wide">
                Trial Requests ({{ $inquiries->where('type', 'trial_request')->count() }})
            </button>

            {{-- Archived --}}
            <button
                type="button"
                @click="tab = 'archived'"
                :class="tab === 'archived'
                    ? 'border-b-2 border-sp-prairieGreen text-sp-charcoal'
                    : 'text-sp-slate'"
                class="py-4 uppercase text-xs tracking-wide">
                Archived ({{ $archivedInquiries->count() }})
            </button>

        </nav>
    </div>

    {{-- All Inquiries --}}
    <div x-show="tab === 'all'">

        @if ($inquiries->isEmpty())

            <div class="p-8 text-left">
                <p class="text-sp-charcoal font-medium">
                    No inquiries yet.
                </p>

                <p class="text-sm text-sp-slate mt-2">
                    New submissions will appear here.
                </p>
            </div>

        @else

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead class="border-b border-sp-warmStone">
                        <tr class="text-xs uppercase tracking-wide text-sp-slate">
                            <th scope="col" class="py-4 pl-6 pr-2 w-8">
                                <span class="sr-only">Unread</span>
                            </th>
                            <th scope="col" class="py-4 px-3 font-medium">
                                Received
                            </th>
                            <th scope="col" class="py-4 px-3 font-medium">
                                From
                            </th>
                            <th scope="col" class="py-4 px-3 font-medium">
                                Type
                            </th>
                            <th scope="col" class="py-4 px-3 font-medium">
                                Subject
                            </th>
                            <th scope="col" class="py-4 px-3 font-medium">
                                Status
                            </th>
                            <th scope="col" class="py-4 pl-3 pr-6 font-medium">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-sp-warmStone">
                        @foreach ($inquiries as $inquiry)

                            <tr class="relative hover:bg-sp-warmStone/20 transition cursor-pointer">

                                {{-- Unread Indicator --}}
                                <td class="py-4 pl-6 pr-2 align-middle">
                                    @if (!$inquiry->read_at)
                                        <span
                                            class="block w-2 h-2 rounded-full bg-sp-prairieGreen"
                                            title="Unread inquiry">
                                        </span>
                                    @endif
                                </td>

                                {{-- Received --}}
                                <td class="py-4 px-3 text-sp-slate whitespace-nowrap">
                                    {{ $inquiry->created_at->format('M j, Y') }}
                                </td>

                                {{-- From --}}
                                <td class="py-4 px-3">
                                    <p class="font-medium text-sp-charcoal">
                                        {{ $inquiry->name }}
                                    </p>
                                    <p class="text-xs text-sp-slate mt-1">
                                        {{ $inquiry->email }}
                                    </p>
                                </td>

                                {{-- Type --}}
                                <td class="py-4 px-3 text-sp-slate whitespace-nowrap">
                                    {{ ucwords(str_replace('_', ' ', $inquiry->type)) }}
                                </td>

                                {{-- Subject --}}
                                <td class="py-4 px-3 text-sp-charcoal">
                                    {{ $inquiry->subject ?: 'Inquiry #' . $inquiry->id }}
                                </td>

                                {{-- Status --}}
                                <td class="py-4 px-3 whitespace-nowrap">
                                    @if ($inquiry->resolved_at)

                                        <span class="text-sp-slate">
                                            Resolved
                                        </span>

                                    @elseif (!$inquiry->read_at)

                                        <span class="font-medium text-sp-prairieGreen">
                                            Unread
                                        </span>

                                    @else

                                        <span class="text-sp-slate">
                                            Read
                                        </span>

                                    @endif
                                </td>

                                {{-- Action --}}
                                <td class="py-4 pl-3 pr-6 text-right whitespace-nowrap">
                                    <a
                                        href="{{ route('admin.inquiries.show', $inquiry) }}"
                                        class="after:absolute after:inset-0 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sp-prairieGreen text-sp-prairieGreen hover:underline"
                                        aria-label="View inquiry from {{ $inquiry->name }}">
                                        View &rarr;
                                    </a>
                                </td>

                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>

        @endif

    </div>

    {{-- Contact Inquiries --}}
    <div x-show="tab === 'contact'" x-cloak>

        @php
            $contactInquiries = $inquiries->where('type', 'contact');
        @endphp

        @if ($contactInquiries->isEmpty())

            <div class="p-8 text-left">
                <p class="text-sp-charcoal font-medium">
                    No contact inquiries yet.
                </p>

                <p class="text-sm text-sp-slate mt-2">
                    New contact form submissions will appear here.
                </p>
            </div>

        @else

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead class="border-b border-sp-warmStone">
                        <tr class="text-xs uppercase tracking-wide text-sp-slate">
                            <th scope="col" class="py-4 pl-6 pr-2 w-8">
                                <span class="sr-only">Unread</span>
                            </th>
                            <th scope="col" class="py-4 px-3 font-medium">
                                Received
                            </th>
                            <th scope="col" class="py-4 px-3 font-medium">
                                From
                            </th>
                            <th scope="col" class="py-4 px-3 font-medium">
                                Subject
                            </th>
                            <th scope="col" class="py-4 px-3 font-medium">
                                Status
                            </th>
                            <th scope="col" class="py-4 pl-3 pr-6 font-medium">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-sp-warmStone">
                        @foreach ($contactInquiries as $inquiry)

                            <tr class="relative hover:bg-sp-warmStone/20 transition cursor-pointer">

                                {{-- Unread Indicator --}}
                                <td class="py-4 pl-6 pr-2 align-middle">
                                    @if (!$inquiry->read_at)
                                        <span
                                            class="block w-2 h-2 rounded-full bg-sp-prairieGreen"
                                            title="Unread inquiry">
                                        </span>
                                    @endif
                                </td>

                                {{-- Received --}}
                                <td class="py-4 px-3 text-sp-slate whitespace-nowrap">
                                    {{ $inquiry->created_at->format('M j, Y') }}
                                </td>

                                {{-- From --}}
                                <td class="py-4 px-3">
                                    <p class="font-medium text-sp-charcoal">
                                        {{ $inquiry->name }}
                                    </p>
                                    <p class="text-xs text-sp-slate mt-1">
                                        {{ $inquiry->email }}
                                    </p>
                                </td>

                                {{-- Subject --}}
                                <td class="py-4 px-3 text-sp-charcoal">
                                    {{ $inquiry->subject ?: 'Inquiry #' . $inquiry->id }}
                                </td>

                                {{-- Status --}}
                                <td class="py-4 px-3 whitespace-nowrap">
                                    @if ($inquiry->resolved_at)

                                        <span class="text-sp-slate">
                                            Resolved
                                        </span>

                                    @elseif (!$inquiry->read_at)

                                        <span class="font-medium text-sp-prairieGreen">
                                            Unread
                                        </span>

                                    @else

                                        <span class="text-sp-slate">
                                            Read
                                        </span>

                                    @endif
                                </td>

                                {{-- Action --}}
                                <td class="py-4 pl-3 pr-6 text-right whitespace-nowrap">
                                    <a
                                        href="{{ route('admin.inquiries.show', $inquiry) }}"
                                        class="after:absolute after:inset-0 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sp-prairieGreen text-sp-prairieGreen hover:underline"
                                        aria-label="View inquiry from {{ $inquiry->name }}">
                                        View &rarr;
                                    </a>
                                </td>

                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>

        @endif

    </div>

    {{-- Workshop Inquiries --}}
    <div x-show="tab === 'workshops'" x-cloak>

        @php
            $workshopInquiries = $inquiries->where('type', 'workshop_request');
        @endphp

        @if ($workshopInquiries->isEmpty())

            <div class="p-8 text-left">
                <p class="text-sp-charcoal font-medium">
                    No workshop inquiries yet.
                </p>

                <p class="text-sm text-sp-slate mt-2">
                    New workshop requests will appear here.
                </p>
            </div>

        @else

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead class="border-b border-sp-warmStone">
                        <tr class="text-xs uppercase tracking-wide text-sp-slate">
                            <th scope="col" class="py-4 pl-6 pr-2 w-8">
                                <span class="sr-only">Unread</span>
                            </th>
                            <th scope="col" class="py-4 px-3 font-medium">
                                Received
                            </th>
                            <th scope="col" class="py-4 px-3 font-medium">
                                From
                            </th>
                            <th scope="col" class="py-4 px-3 font-medium">
                                Subject
                            </th>
                            <th scope="col" class="py-4 px-3 font-medium">
                                Status
                            </th>
                            <th scope="col" class="py-4 pl-3 pr-6 font-medium">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-sp-warmStone">
                        @foreach ($workshopInquiries as $inquiry)

                            <tr class="relative hover:bg-sp-warmStone/20 transition cursor-pointer">

                                {{-- Unread Indicator --}}
                                <td class="py-4 pl-6 pr-2 align-middle">
                                    @if (!$inquiry->read_at)
                                        <span
                                            class="block w-2 h-2 rounded-full bg-sp-prairieGreen"
                                            title="Unread inquiry">
                                        </span>
                                    @endif
                                </td>

                                {{-- Received --}}
                                <td class="py-4 px-3 text-sp-slate whitespace-nowrap">
                                    {{ $inquiry->created_at->format('M j, Y') }}
                                </td>

                                {{-- From --}}
                                <td class="py-4 px-3">
                                    <p class="font-medium text-sp-charcoal">
                                        {{ $inquiry->name }}
                                    </p>
                                    <p class="text-xs text-sp-slate mt-1">
                                        {{ $inquiry->email }}
                                    </p>
                                </td>

                                {{-- Subject --}}
                                <td class="py-4 px-3 text-sp-charcoal">
                                    {{ $inquiry->subject ?: 'Inquiry #' . $inquiry->id }}
                                </td>

                                {{-- Status --}}
                                <td class="py-4 px-3 whitespace-nowrap">
                                    @if ($inquiry->resolved_at)

                                        <span class="text-sp-slate">
                                            Resolved
                                        </span>

                                    @elseif (!$inquiry->read_at)

                                        <span class="font-medium text-sp-prairieGreen">
                                            Unread
                                        </span>

                                    @else

                                        <span class="text-sp-slate">
                                            Read
                                        </span>

                                    @endif
                                </td>

                                {{-- Action --}}
                                <td class="py-4 pl-3 pr-6 text-right whitespace-nowrap">
                                    <a
                                        href="{{ route('admin.inquiries.show', $inquiry) }}"
                                        class="after:absolute after:inset-0 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sp-prairieGreen text-sp-prairieGreen hover:underline"
                                        aria-label="View inquiry from {{ $inquiry->name }}">
                                        View &rarr;
                                    </a>
                                </td>

                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>

        @endif

    </div>

    {{-- Event Registrations --}}
    <div x-show="tab === 'event_registrations'" x-cloak>

        @php
            $eventRegistrations = $inquiries->where('type', 'workshop_registration');
            $eventTitles = \App\Models\EventV2::query()
                ->whereIn('id', $eventRegistrations->pluck('event_id')->filter()->unique()->all())
                ->pluck('title', 'id');
        @endphp

        @if ($eventRegistrations->isEmpty())

            <div class="p-8 text-left">
                <p class="text-sp-charcoal font-medium">
                    No event registrations yet.
                </p>
                <p class="text-sm text-sp-slate mt-2">
                    New event registrations will appear here.
                </p>
            </div>

        @else

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead class="border-b border-sp-warmStone">
                        <tr class="text-xs uppercase tracking-wide text-sp-slate">
                            <th scope="col" class="py-4 pl-6 pr-2 w-8"><span class="sr-only">Unread</span></th>
                            <th scope="col" class="py-4 px-3 font-medium">Received</th>
                            <th scope="col" class="py-4 px-3 font-medium">Participant</th>
                            <th scope="col" class="py-4 px-3 font-medium">Event</th>
                            <th scope="col" class="py-4 px-3 font-medium">Participation</th>
                            <th scope="col" class="py-4 px-3 font-medium">Slots</th>
                            <th scope="col" class="py-4 px-3 font-medium">Registration</th>
                            <th scope="col" class="py-4 px-3 font-medium">Payment</th>
                            <th scope="col" class="py-4 pl-3 pr-6 font-medium"><span class="sr-only">Actions</span></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-sp-warmStone">
                        @foreach ($eventRegistrations as $inquiry)
                            @php
                                $details = $inquiry->details ?? [];
                                $participation = $details['participation_type'] ?? null;
                                $slotCount = $participation === 'working'
                                    ? count($details['dogs'] ?? [])
                                    : ($participation === 'auditor' ? 1 : 0);
                                $registrationStatus = $details['registration_status'] ?? null;
                                $paymentStatus = $details['payment_status'] ?? null;
                            @endphp
                            <tr class="relative hover:bg-sp-warmStone/20 transition cursor-pointer">
                                <td class="py-4 pl-6 pr-2 align-middle">
                                    @if (!$inquiry->read_at)
                                        <span class="block w-2 h-2 rounded-full bg-sp-prairieGreen" title="Unread registration"></span>
                                    @endif
                                </td>
                                <td class="py-4 px-3 text-sp-slate whitespace-nowrap">
                                    {{ $inquiry->created_at->format('M j, Y') }}
                                </td>
                                <td class="py-4 px-3">
                                    <p class="font-medium text-sp-charcoal">{{ $inquiry->name }}</p>
                                    <p class="text-xs text-sp-slate mt-1">{{ $inquiry->email }}</p>
                                </td>
                                <td class="py-4 px-3 text-sp-charcoal">
                                    {{ $eventTitles->get($inquiry->event_id) ?? 'Event #' . $inquiry->event_id }}
                                </td>
                                <td class="py-4 px-3 text-sp-slate whitespace-nowrap">
                                    {{ $participation ? ucfirst($participation) : 'Not provided' }}
                                </td>
                                <td class="py-4 px-3 text-sp-slate whitespace-nowrap">
                                    {{ $slotCount }} {{ $participation === 'auditor' ? ($slotCount === 1 ? 'auditor' : 'auditors') : ($slotCount === 1 ? 'dog' : 'dogs') }}
                                </td>
                                <td class="py-4 px-3 whitespace-nowrap">
                                    <span class="{{ $registrationStatus === 'confirmed' ? 'font-medium text-sp-prairieGreen' : 'text-sp-slate' }}">
                                        {{ $registrationStatus ? ucwords(str_replace('_', ' ', $registrationStatus)) : 'Not set' }}
                                    </span>
                                </td>
                                <td class="py-4 px-3 text-sp-slate whitespace-nowrap">
                                    {{ $paymentStatus ? ucfirst($paymentStatus) : 'Not set' }}
                                </td>
                                <td class="py-4 pl-3 pr-6 text-right whitespace-nowrap">
                                    <a
                                        href="{{ route('admin.inquiries.show', $inquiry) }}"
                                        class="after:absolute after:inset-0 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sp-prairieGreen text-sp-prairieGreen hover:underline"
                                        aria-label="View registration from {{ $inquiry->name }}">
                                        View &rarr;
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        @endif

    </div>

    {{-- Judge Requests --}}
    <div x-show="tab === 'judge_requests'" x-cloak>

        @php
            $judgeRequests = $inquiries->where('type', 'judge_request');

            $classLabels = [
                'lost_item_recovery' => 'Lost Item Recovery',
                'shed_dog' => 'Shed Dog',
                'trailing_locating' => 'Trailing & Locating',
                'trailing_brace' => 'Trailing Brace',
                'urban_locating' => 'Urban Locating',
            ];
        @endphp

        @if ($judgeRequests->isEmpty())

            <div class="p-8 text-left">
                <p class="text-sp-charcoal font-medium">
                    No judge requests yet.
                </p>

                <p class="text-sm text-sp-slate mt-2">
                    New judge requests will appear here.
                </p>
            </div>

        @else

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead class="border-b border-sp-warmStone">
                        <tr class="text-xs uppercase tracking-wide text-sp-slate">
                            <th scope="col" class="py-4 pl-6 pr-2 w-8">
                                <span class="sr-only">Unread</span>
                            </th>
                            <th scope="col" class="py-4 px-3 font-medium">
                                Received
                            </th>
                            <th scope="col" class="py-4 px-3 font-medium">
                                Organization
                            </th>
                            <th scope="col" class="py-4 px-3 font-medium">
                                Trial Date
                            </th>
                            <th scope="col" class="py-4 px-3 font-medium">
                                Location
                            </th>
                            <th scope="col" class="py-4 px-3 font-medium">
                                Classes
                            </th>
                            <th scope="col" class="py-4 px-3 font-medium">
                                Status
                            </th>
                            <th scope="col" class="py-4 pl-3 pr-6 font-medium">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-sp-warmStone">
                        @foreach ($judgeRequests as $inquiry)

                            @php
                                $requestedClasses = collect($inquiry->details['classes'] ?? [])
                                    ->map(fn ($class) => $classLabels[$class] ?? ucwords(str_replace('_', ' ', $class)))
                                    ->implode(', ');
                            @endphp

                            <tr class="relative hover:bg-sp-warmStone/20 transition cursor-pointer">

                                {{-- Unread Indicator --}}
                                <td class="py-4 pl-6 pr-2 align-middle">
                                    @if (!$inquiry->read_at)
                                        <span
                                            class="block w-2 h-2 rounded-full bg-sp-prairieGreen"
                                            title="Unread judge request">
                                        </span>
                                    @endif
                                </td>

                                {{-- Received --}}
                                <td class="py-4 px-3 text-sp-slate whitespace-nowrap">
                                    {{ $inquiry->created_at->format('M j, Y') }}
                                </td>

                                {{-- Organization --}}
                                <td class="py-4 px-3">
                                    <p class="font-medium text-sp-charcoal">
                                        {{ $inquiry->details['organization'] ?? $inquiry->name }}
                                    </p>
                                    <p class="text-xs text-sp-slate mt-1">
                                        {{ $inquiry->name }}
                                    </p>
                                </td>

                                {{-- Trial Date --}}
                                <td class="py-4 px-3 text-sp-slate">
                                    {{ $inquiry->details['trial_date'] ?? 'Not provided' }}
                                </td>

                                {{-- Location --}}
                                <td class="py-4 px-3 text-sp-slate">
                                    {{ $inquiry->details['location'] ?? 'Not provided' }}
                                </td>

                                {{-- Classes --}}
                                <td class="py-4 px-3 text-sp-slate">
                                    {{ $requestedClasses ?: 'Not provided' }}
                                </td>

                                {{-- Status --}}
                                <td class="py-4 px-3 whitespace-nowrap">
                                    @if ($inquiry->resolved_at)

                                        <span class="text-sp-slate">
                                            Resolved
                                        </span>

                                    @elseif (!$inquiry->read_at)

                                        <span class="font-medium text-sp-prairieGreen">
                                            Unread
                                        </span>

                                    @else

                                        <span class="text-sp-slate">
                                            Read
                                        </span>

                                    @endif
                                </td>

                                {{-- Action --}}
                                <td class="py-4 pl-3 pr-6 text-right whitespace-nowrap">
                                    <a
                                        href="{{ route('admin.inquiries.show', $inquiry) }}"
                                        class="after:absolute after:inset-0 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sp-prairieGreen text-sp-prairieGreen hover:underline"
                                        aria-label="View judge request from {{ $inquiry->name }}">
                                        View &rarr;
                                    </a>
                                </td>

                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>

        @endif

    </div>

    {{-- Trial Requests --}}
    <div x-show="tab === 'trial_requests'" x-cloak>

        @php
            $trialRequests = $inquiries->where('type', 'trial_request');
        @endphp

        @if ($trialRequests->isEmpty())

            <div class="p-8 text-left">
                <p class="text-sp-charcoal font-medium">
                    No trial requests yet.
                </p>

                <p class="text-sm text-sp-slate mt-2">
                    New trial requests will appear here.
                </p>
            </div>

        @else

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead class="border-b border-sp-warmStone">
                        <tr class="text-xs uppercase tracking-wide text-sp-slate">
                            <th scope="col" class="py-4 pl-6 pr-2 w-8">
                                <span class="sr-only">Unread</span>
                            </th>
                            <th scope="col" class="py-4 px-3 font-medium">
                                Received
                            </th>
                            <th scope="col" class="py-4 px-3 font-medium">
                                Organization
                            </th>
                            <th scope="col" class="py-4 px-3 font-medium">
                                Trial Date
                            </th>
                            <th scope="col" class="py-4 px-3 font-medium">
                                Location
                            </th>
                            <th scope="col" class="py-4 px-3 font-medium">
                                Classes
                            </th>
                            <th scope="col" class="py-4 px-3 font-medium">
                                Status
                            </th>
                            <th scope="col" class="py-4 pl-3 pr-6 font-medium">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-sp-warmStone">
                        @foreach ($trialRequests as $inquiry)

                            @php
                                $trialClassLabels = [
                                    'lost_item_recovery' => 'Lost Item Recovery',
                                    'shed_dog' => 'Shed Dog',
                                    'trailing_locating' => 'Trailing & Locating',
                                    'trailing_brace' => 'Trailing Brace',
                                    'urban_locating' => 'Urban Locating',
                                ];

                                $requestedClasses = collect($inquiry->details['classes'] ?? [])
                                    ->map(fn ($class) => $trialClassLabels[$class] ?? ucwords(str_replace('_', ' ', $class)))
                                    ->implode(', ');
                            @endphp

                            <tr class="relative hover:bg-sp-warmStone/20 transition cursor-pointer">

                                {{-- Unread Indicator --}}
                                <td class="py-4 pl-6 pr-2 align-middle">
                                    @if (!$inquiry->read_at)
                                        <span
                                            class="block w-2 h-2 rounded-full bg-sp-prairieGreen"
                                            title="Unread trial request">
                                        </span>
                                    @endif
                                </td>

                                {{-- Received --}}
                                <td class="py-4 px-3 text-sp-slate whitespace-nowrap">
                                    {{ $inquiry->created_at->format('M j, Y') }}
                                </td>

                                {{-- Organization --}}
                                <td class="py-4 px-3">
                                    <p class="font-medium text-sp-charcoal">
                                        {{ $inquiry->details['organization'] ?? $inquiry->name }}
                                    </p>
                                    <p class="text-xs text-sp-slate mt-1">
                                        {{ $inquiry->name }}
                                    </p>
                                </td>

                                {{-- Trial Date --}}
                                <td class="py-4 px-3 text-sp-slate">
                                    {{ $inquiry->details['trial_date'] ?? 'Not provided' }}
                                </td>

                                {{-- Location --}}
                                <td class="py-4 px-3">
                                    <p class="font-medium text-sp-charcoal">
                                        {{ $inquiry->details['venue'] ?? 'Not provided' }}
                                    </p>

                                    <p class="text-xs text-sp-slate mt-1">
                                        {{ $inquiry->details['city_state'] ?? 'Not provided' }}
                                    </p>
                                </td>

                                {{-- Classes --}}
                                <td class="py-4 px-3 text-sp-slate">
                                    {{ $requestedClasses ?: 'Not provided' }}
                                </td>

                                {{-- Status --}}
                                <td class="py-4 px-3 whitespace-nowrap">
                                    @if ($inquiry->resolved_at)

                                        <span class="text-sp-slate">
                                            Resolved
                                        </span>

                                    @elseif (!$inquiry->read_at)

                                        <span class="font-medium text-sp-prairieGreen">
                                            Unread
                                        </span>

                                    @else

                                        <span class="text-sp-slate">
                                            Read
                                        </span>

                                    @endif
                                </td>

                                {{-- Action --}}
                                <td class="py-4 pl-3 pr-6 text-right whitespace-nowrap">
                                    <a
                                        href="{{ route('admin.inquiries.show', $inquiry) }}"
                                        class="after:absolute after:inset-0 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sp-prairieGreen text-sp-prairieGreen hover:underline"
                                        aria-label="View trial request from {{ $inquiry->name }}">
                                        View &rarr;
                                    </a>
                                </td>

                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>

        @endif

    </div>

    {{-- Archived Inquiries --}}
    <div x-show="tab === 'archived'" x-cloak>

        @if ($archivedInquiries->isEmpty())

            <div class="p-8 text-left">
                <p class="text-sp-charcoal font-medium">
                    No archived inquiries.
                </p>

                <p class="text-sm text-sp-slate mt-2">
                    Archived submissions will appear here.
                </p>
            </div>

        @else

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead class="border-b border-sp-warmStone">
                        <tr class="text-xs uppercase tracking-wide text-sp-slate">
                            <th scope="col" class="py-4 pl-6 pr-3 font-medium">
                                Archived
                            </th>
                            <th scope="col" class="py-4 px-3 font-medium">
                                From
                            </th>
                            <th scope="col" class="py-4 px-3 font-medium">
                                Type
                            </th>
                            <th scope="col" class="py-4 px-3 font-medium">
                                Subject
                            </th>
                            <th scope="col" class="py-4 px-3 font-medium">
                                Status
                            </th>
                            <th scope="col" class="py-4 pl-3 pr-6 font-medium">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-sp-warmStone">
                        @foreach ($archivedInquiries as $inquiry)

                            <tr class="relative hover:bg-sp-warmStone/20 transition cursor-pointer">

                                {{-- Archived Date --}}
                                <td class="py-4 pl-6 pr-3 text-sp-slate whitespace-nowrap">
                                    {{ $inquiry->archived_at->format('M j, Y') }}
                                </td>

                                {{-- From --}}
                                <td class="py-4 px-3">
                                    <p class="font-medium text-sp-charcoal">
                                        {{ $inquiry->name }}
                                    </p>
                                    <p class="text-xs text-sp-slate mt-1">
                                        {{ $inquiry->email }}
                                    </p>
                                </td>

                                {{-- Type --}}
                                <td class="py-4 px-3 text-sp-slate whitespace-nowrap">
                                    {{ ucwords(str_replace('_', ' ', $inquiry->type)) }}
                                </td>

                                {{-- Subject --}}
                                <td class="py-4 px-3 text-sp-charcoal">
                                    {{ $inquiry->subject ?: 'Inquiry #' . $inquiry->id }}
                                </td>

                                {{-- Status --}}
                                <td class="py-4 px-3 text-sp-slate">
                                    {{ $inquiry->resolved_at ? 'Resolved' : 'Unresolved' }}
                                </td>

                                {{-- Action --}}
                                <td class="py-4 pl-3 pr-6 text-right whitespace-nowrap">
                                    <a
                                        href="{{ route('admin.inquiries.show', $inquiry) }}"
                                        class="after:absolute after:inset-0 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sp-prairieGreen text-sp-prairieGreen hover:underline"
                                        aria-label="View inquiry from {{ $inquiry->name }}">
                                        View &rarr;
                                    </a>
                                </td>

                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>

        @endif

    </div>

</div>