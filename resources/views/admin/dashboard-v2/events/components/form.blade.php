@php

    $value = function (string $field, mixed $default = '') use ($event) {

        return old(

            $field,

            $event?->{$field} ?? $default

        );

    };

    $startDate = old(

        'start_date',

        $event?->start_date?->format('Y-m-d')

    );

    $endDate = old(

        'end_date',

        $event?->end_date?->format('Y-m-d')

    );

    $startTime = old(

        'start_time',

        $event?->start_time?->format('H:i')

    );

    $endTime = old(

        'end_time',

        $event?->end_time?->format('H:i')

    );

    $registrationDeadline = old(

        'registration_deadline',

        $event?->registration_deadline?->format('Y-m-d')

    );

    $publishedAt = old(

        'published_at',

        $event?->published_at?->format('Y-m-d\TH:i')

    );

    $isPrivateLocation = old(

        'is_private_location',

        $event?->is_private_location ?? false

    );

@endphp

{{-- Event Basics --}}

<section class="rounded-md border border-sp-warmStone bg-sp-warmIvory p-6">

    <h2 class="font-sans text-lg font-semibold text-sp-charcoal">

        Event Basics

    </h2>

    <p class="mt-1 text-sm text-sp-slate">

        The core information for this event.

    </p>

    <div class="mt-6 grid grid-cols-1 gap-6 md:grid-cols-2">

        {{-- Event Type --}}

        <div>

            <label

                for="type"

                class="block text-sm font-medium text-sp-charcoal">

                Event Type

            </label>

            <select

                name="type"

                id="type"

                required

                class="mt-2 block w-full rounded-md border-sp-warmStone bg-sp-warmIvory text-sm text-sp-charcoal focus:border-sp-prairieGreen focus:ring-sp-prairieGreen">

                <option value="">

                    Select an event type

                </option>

                <option

                    value="dog_sports"

                    @selected($value('type') === 'dog_sports')>

                    Dog Sports

                </option>

                <option

                    value="training"

                    @selected($value('type') === 'training')>

                    Training

                </option>

                <option

                    value="workshop"

                    @selected($value('type') === 'workshop')>

                    Workshop

                </option>

                <option

                    value="class"

                    @selected($value('type') === 'class')>

                    Class

                </option>

                <option

                    value="community"

                    @selected($value('type') === 'community')>

                    Community

                </option>

                <option

                    value="other"

                    @selected($value('type') === 'other')>

                    Other

                </option>

            </select>

            <x-admin.forms.field-error name="type" />

        </div>

        {{-- End Event Type --}}

        {{-- Status --}}

        <div>

            <label

                for="status"

                class="block text-sm font-medium text-sp-charcoal">

                Status

            </label>

            <select

                name="status"

                id="status"

                required

                class="mt-2 block w-full rounded-md border-sp-warmStone bg-sp-warmIvory text-sm text-sp-charcoal focus:border-sp-prairieGreen focus:ring-sp-prairieGreen">

                <option

                    value="draft"

                    @selected($value('status', 'draft') === 'draft')>

                    Draft

                </option>

                <option

                    value="published"

                    @selected($value('status') === 'published')>

                    Published

                </option>

                <option

                    value="cancelled"

                    @selected($value('status') === 'cancelled')>

                    Cancelled

                </option>

            </select>

            <x-admin.forms.field-error name="status" />

        </div>

        {{-- End Status --}}

    </div>

    {{-- Title --}}

    <div class="mt-6">

        <label

            for="title"

            class="block text-sm font-medium text-sp-charcoal">

            Event Title

        </label>

        <input

            type="text"

            name="title"

            id="title"

            value="{{ $value('title') }}"

            required

            maxlength="255"

            class="mt-2 block w-full rounded-md border-sp-warmStone bg-sp-warmIvory text-sm text-sp-charcoal focus:border-sp-prairieGreen focus:ring-sp-prairieGreen"

        >

        <x-admin.forms.field-error name="title" />

    </div>

    {{-- End Title --}}

    {{-- Short Description --}}

    <div class="mt-6">

        <label

            for="short_description"

            class="block text-sm font-medium text-sp-charcoal">

            Short Description

        </label>

        <p class="mt-1 text-sm text-sp-slate">

            A brief description used on event cards and archive listings.

        </p>

        <textarea

            name="short_description"

            id="short_description"

            rows="3"

            maxlength="1000"

            class="mt-2 block w-full rounded-md border-sp-warmStone bg-sp-warmIvory text-sm text-sp-charcoal focus:border-sp-prairieGreen focus:ring-sp-prairieGreen"

        >{{ $value('short_description') }}</textarea>

        <x-admin.forms.field-error name="short_description" />

    </div>

    {{-- End Short Description --}}

    {{-- Description --}}

    <div class="mt-6">

        <label

            for="description"

            class="block text-sm font-medium text-sp-charcoal">

            Event Description

        </label>

        <p class="mt-1 text-sm text-sp-slate">

            The full event description shown on the event detail page.

        </p>

        <div class="mt-6">

            <x-admin.forms.rich-text

                id="description-editor"

                name="description"

                :value="$value('description')"

            />

            <x-admin.forms.field-error name="description" />

        </div>

    </div>

    {{-- End Description --}}

</section>

{{-- End Event Basics --}}

{{-- Featured Image --}}

<section class="mt-8 rounded-md border border-sp-warmStone bg-sp-warmIvory p-6">

    <h2 class="font-sans text-lg font-semibold text-sp-charcoal">

        Featured Image

    </h2>

    <p class="mt-1 text-sm text-sp-slate">

        This image will appear with the event and will also be used as the default Open Graph image.

    </p>

    <div

        x-data="{ fileName: '' }"

        class="mt-6">

        <div class="flex flex-wrap items-center gap-3">

            <label

                for="featured_image"

                class="inline-flex shrink-0 cursor-pointer items-center justify-center rounded-md bg-sp-prairieGreen px-4 py-2 text-sm font-semibold text-white transition-colors hover:bg-sp-prairieOchre">

                Choose File

            </label>

            <span

                class="min-w-0 break-all text-sm text-sp-charcoal"

                x-text="fileName || 'No file chosen'">

            </span>

        </div>

        <input

            type="file"

            name="featured_image"

            id="featured_image"

            accept="image/jpeg,image/png,image/webp"

            class="sr-only"

            @change="fileName = $event.target.files[0]?.name || ''"

        >

        <p class="mt-2 text-xs text-sp-slate">

            JPEG, PNG, or WebP. Maximum file size: 10 MB.

        </p>

        <x-admin.forms.field-error name="featured_image" />

    </div>

    @if ($event?->featured_image_path)

        <div class="mt-6">

            <p class="text-sm font-medium text-sp-charcoal">

                Current Featured Image

            </p>

            <img

                src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($event->featured_image_path) }}"

                alt="{{ $event->featured_image_alt ?: $event->title }}"

                class="mt-3 max-h-64 rounded-md"

            >

        </div>

    @endif

    <div class="mt-6">

        <label

            for="featured_image_alt"

            class="block text-sm font-medium text-sp-charcoal">

            Image Alt Text

        </label>

        <input

            type="text"

            name="featured_image_alt"

            id="featured_image_alt"

            value="{{ $value('featured_image_alt') }}"

            maxlength="255"

            class="mt-2 block w-full rounded-md border-sp-warmStone bg-sp-warmIvory text-sm text-sp-charcoal focus:border-sp-prairieGreen focus:ring-sp-prairieGreen"

        >

        <x-admin.forms.field-error name="featured_image_alt" />

        {{-- Image Credit --}}

<div class="mt-6">

    <label

        for="featured_image_credit"

        class="block text-sm font-medium text-sp-charcoal">

        Image Credit

    </label>

    <input

        type="text"

        name="featured_image_credit"

        id="featured_image_credit"

        value="{{ $value('featured_image_credit') }}"

        maxlength="255"

        placeholder="e.g. Photo by Blue Ridge Creative"

        class="mt-2 block w-full rounded-md border-sp-warmStone bg-sp-warmIvory text-sm text-sp-charcoal focus:border-sp-prairieGreen focus:ring-sp-prairieGreen"

    >

    <x-admin.forms.field-error name="featured_image_credit" />

</div>

{{-- End Image Credit --}}

{{-- Image Credit URL --}}

<div class="mt-6">

    <label

        for="featured_image_credit_url"

        class="block text-sm font-medium text-sp-charcoal">

        Image Credit URL

    </label>

    <input

        type="url"

        name="featured_image_credit_url"

        id="featured_image_credit_url"

        value="{{ $value('featured_image_credit_url') }}"

        maxlength="255"

        placeholder="https://example.com"

        class="mt-2 block w-full rounded-md border-sp-warmStone bg-sp-warmIvory text-sm text-sp-charcoal focus:border-sp-prairieGreen focus:ring-sp-prairieGreen"

    >

    <x-admin.forms.field-error name="featured_image_credit_url" />

</div>

{{-- End Image Credit URL --}}

    </div>

</section>

{{-- End Featured Image --}}

{{-- Date & Time --}}

<section class="mt-8 rounded-md border border-sp-warmStone bg-sp-warmIvory p-6">

    <h2 class="font-sans text-lg font-semibold text-sp-charcoal">

        Date & Time

    </h2>

    <p class="mt-1 text-sm text-sp-slate">

        Event times use the site's configured timezone.

    </p>

    <div class="mt-6 grid grid-cols-1 gap-6 md:grid-cols-2">

        {{-- Start Date --}}

        <div>

            <label

                for="start_date"

                class="block text-sm font-medium text-sp-charcoal">

                Start Date

            </label>

            <input

                type="date"

                name="start_date"

                id="start_date"

                value="{{ $startDate }}"

                required

                class="mt-2 block w-full rounded-md border-sp-warmStone bg-sp-warmIvory text-sm text-sp-charcoal focus:border-sp-prairieGreen focus:ring-sp-prairieGreen"

            >

            <x-admin.forms.field-error name="start_date" />

        </div>

        {{-- End Date --}}

        <div>

            <label

                for="end_date"

                class="block text-sm font-medium text-sp-charcoal">

                End Date

            </label>

            <input

                type="date"

                name="end_date"

                id="end_date"

                value="{{ $endDate }}"

                class="mt-2 block w-full rounded-md border-sp-warmStone bg-sp-warmIvory text-sm text-sp-charcoal focus:border-sp-prairieGreen focus:ring-sp-prairieGreen"

            >

            <p class="mt-1 text-xs text-sp-slate">

                Leave blank for a single-day event.

            </p>

            <x-admin.forms.field-error name="end_date" />

        </div>

        {{-- Start Time --}}

        <div>

            <label

                for="start_time"

                class="block text-sm font-medium text-sp-charcoal">

                Start Time

            </label>

            <input

                type="time"

                name="start_time"

                id="start_time"

                value="{{ $startTime }}"

                class="mt-2 block w-full rounded-md border-sp-warmStone bg-sp-warmIvory text-sm text-sp-charcoal focus:border-sp-prairieGreen focus:ring-sp-prairieGreen"

            >

            <x-admin.forms.field-error name="start_time" />

        </div>

        {{-- End Time --}}

        <div>

            <label

                for="end_time"

                class="block text-sm font-medium text-sp-charcoal">

                End Time

            </label>

            <input

                type="time"

                name="end_time"

                id="end_time"

                value="{{ $endTime }}"

                class="mt-2 block w-full rounded-md border-sp-warmStone bg-sp-warmIvory text-sm text-sp-charcoal focus:border-sp-prairieGreen focus:ring-sp-prairieGreen"

            >

            <x-admin.forms.field-error name="end_time" />

        </div>

    </div>

</section>

{{-- End Date & Time --}}

{{-- Location --}}

<section class="mt-8 rounded-md border border-sp-warmStone bg-sp-warmIvory p-6">

    <h2 class="font-sans text-lg font-semibold text-sp-charcoal">

        Location

    </h2>

    <p class="mt-1 text-sm text-sp-slate">

        Keep the full location internally even when an event uses a private venue.

    </p>

    <div class="mt-6">

        <label

            for="venue_name"

            class="block text-sm font-medium text-sp-charcoal">

            Venue Name

        </label>

        <input

            type="text"

            name="venue_name"

            id="venue_name"

            value="{{ $value('venue_name') }}"

            maxlength="255"

            class="mt-2 block w-full rounded-md border-sp-warmStone bg-sp-warmIvory text-sm text-sp-charcoal focus:border-sp-prairieGreen focus:ring-sp-prairieGreen"

        >

        <x-admin.forms.field-error name="venue_name" />

    </div>

    <div class="mt-6">

        <label

            for="address"

            class="block text-sm font-medium text-sp-charcoal">

            Address

        </label>

        <input

            type="text"

            name="address"

            id="address"

            value="{{ $value('address') }}"

            maxlength="255"

            class="mt-2 block w-full rounded-md border-sp-warmStone bg-sp-warmIvory text-sm text-sp-charcoal focus:border-sp-prairieGreen focus:ring-sp-prairieGreen"

        >

        <x-admin.forms.field-error name="address" />

    </div>

    <div class="mt-6 grid grid-cols-1 gap-6 md:grid-cols-2">

        <div>

            <label

                for="city"

                class="block text-sm font-medium text-sp-charcoal">

                City

            </label>

            <input

                type="text"

                name="city"

                id="city"

                value="{{ $value('city') }}"

                maxlength="255"

                required

                class="mt-2 block w-full rounded-md border-sp-warmStone bg-sp-warmIvory text-sm text-sp-charcoal focus:border-sp-prairieGreen focus:ring-sp-prairieGreen"

            >

            <x-admin.forms.field-error name="city" />

        </div>

        <div>

            <label

                for="state"

                class="block text-sm font-medium text-sp-charcoal">

                State

            </label>

            <input

                type="text"

                name="state"

                id="state"

                value="{{ $value('state') }}"

                maxlength="255"

                required

                class="mt-2 block w-full rounded-md border-sp-warmStone bg-sp-warmIvory text-sm text-sp-charcoal focus:border-sp-prairieGreen focus:ring-sp-prairieGreen"

            >

            <x-admin.forms.field-error name="state" />

        </div>

    </div>

    {{-- Private Location --}}

    <div class="mt-6 border-t border-sp-warmStone pt-6">

        <label

            for="is_private_location"

            class="flex cursor-pointer items-start gap-3">

            <input

                type="hidden"

                name="is_private_location"

                value="0"

            >

            <input

                type="checkbox"

                name="is_private_location"

                id="is_private_location"

                value="1"

                @checked($isPrivateLocation)

                class="mt-1 rounded border-sp-warmStone text-sp-prairieGreen focus:ring-sp-prairieGreen"

            >

            <span>

                <span class="block text-sm font-medium text-sp-charcoal">

                    This is a private location

                </span>

                <span class="mt-1 block text-xs text-sp-slate">

                    The address will be retained in the admin system but will not be displayed publicly.

                </span>

            </span>

        </label>

        <x-admin.forms.field-error name="is_private_location" />

    </div>

    {{-- End Private Location --}}

    <div class="mt-6">

        <label

            for="location_details"

            class="block text-sm font-medium text-sp-charcoal">

            Location Details

        </label>

        <p class="mt-1 text-xs text-sp-slate">

            Add arrival instructions, parking information, directions, or other useful location notes.

        </p>

        <textarea

            name="location_details"

            id="location_details"

            rows="5"

            class="mt-2 block w-full rounded-md border-sp-warmStone bg-sp-warmIvory text-sm text-sp-charcoal focus:border-sp-prairieGreen focus:ring-sp-prairieGreen"

        >{{ $value('location_details') }}</textarea>

        <x-admin.forms.field-error name="location_details" />

    </div>

</section>

{{-- End Location --}}

{{-- Registration --}}

<section class="mt-8 rounded-md border border-sp-warmStone bg-sp-warmIvory p-6">

    <h2 class="font-sans text-lg font-semibold text-sp-charcoal">

        Registration

    </h2>

    <p class="mt-1 text-sm text-sp-slate">

        Tell visitors how they can participate in this event.

    </p>

    <div class="mt-6">

        <label

            for="registration_status"

            class="block text-sm font-medium text-sp-charcoal">

            Registration Status

        </label>

        <select

            name="registration_status"

            id="registration_status"

            required

            class="mt-2 block w-full rounded-md border-sp-warmStone bg-sp-warmIvory text-sm text-sp-charcoal focus:border-sp-prairieGreen focus:ring-sp-prairieGreen">

            <option

                value="not_required"

                @selected($value('registration_status', 'not_required') === 'not_required')>

                Registration Not Required

            </option>

            <option

                value="coming_soon"

                @selected($value('registration_status') === 'coming_soon')>

                Coming Soon

            </option>

            <option

                value="open"

                @selected($value('registration_status') === 'open')>

                Registration Open

            </option>

            <option

                value="closed"

                @selected($value('registration_status') === 'closed')>

                Registration Closed

            </option>

        </select>

        <x-admin.forms.field-error name="registration_status" />

    </div>

    {{-- Registration Method --}}
    <div class="mt-6">
        <label for="registration_method" class="block text-sm font-medium text-sp-charcoal">
            Registration Method
        </label>
        <p class="mt-1 text-xs text-sp-slate">
            Choose on-site registration for club-hosted registrations or external for a separate registration website.
        </p>
        <select
            name="registration_method"
            id="registration_method"
            class="mt-2 block w-full rounded-md border-sp-warmStone bg-sp-warmIvory text-sm text-sp-charcoal focus:border-sp-prairieGreen focus:ring-sp-prairieGreen">
            <option value="" @selected($value('registration_method') === '')>Select a registration method</option>
            <option value="on-site" @selected($value('registration_method') === 'on-site')>On-site</option>
            <option value="external" @selected($value('registration_method') === 'external')>External</option>
        </select>
        <x-admin.forms.field-error name="registration_method" />
    </div>
    {{-- End Registration Method --}}

    <div class="mt-6">

        <label

            for="registration_url"

            class="block text-sm font-medium text-sp-charcoal">

            Registration URL

        </label>

        <input

            type="url"

            name="registration_url"

            id="registration_url"

            value="{{ $value('registration_url') }}"

            maxlength="2048"

            placeholder="https://"

            class="mt-2 block w-full rounded-md border-sp-warmStone bg-sp-warmIvory text-sm text-sp-charcoal focus:border-sp-prairieGreen focus:ring-sp-prairieGreen"

        >

        <x-admin.forms.field-error name="registration_url" />

    </div>

    <div class="mt-6">

        <label

            for="registration_deadline"

            class="block text-sm font-medium text-sp-charcoal">

            Registration Deadline

        </label>

        <input

            type="date"

            name="registration_deadline"

            id="registration_deadline"

            value="{{ $registrationDeadline }}"

            class="mt-2 block w-full rounded-md border-sp-warmStone bg-sp-warmIvory text-sm text-sp-charcoal focus:border-sp-prairieGreen focus:ring-sp-prairieGreen"

        >

        <x-admin.forms.field-error name="registration_deadline" />

    </div>

    <div class="mt-6">

        <label

            for="registration_notes"

            class="block text-sm font-medium text-sp-charcoal">

            Registration Notes

        </label>

        <textarea

            name="registration_notes"

            id="registration_notes"

            rows="4"

            class="mt-2 block w-full rounded-md border-sp-warmStone bg-sp-warmIvory text-sm text-sp-charcoal focus:border-sp-prairieGreen focus:ring-sp-prairieGreen"

        >{{ $value('registration_notes') }}</textarea>

        <x-admin.forms.field-error name="registration_notes" />

    </div>

    {{-- Registration Capacities --}}
    <div class="mt-6 grid grid-cols-1 gap-6 md:grid-cols-2">
        <div>
            <label for="working_capacity" class="block text-sm font-medium text-sp-charcoal">
                Working Team Capacity
            </label>
            <p class="mt-1 text-xs text-sp-slate">Each working dog uses one working slot. Leave blank if not applicable.</p>
            <input
                type="number"
                name="working_capacity"
                id="working_capacity"
                min="0"
                step="1"
                value="{{ $value('working_capacity') }}"
                class="mt-2 block w-full rounded-md border-sp-warmStone bg-sp-warmIvory text-sm text-sp-charcoal focus:border-sp-prairieGreen focus:ring-sp-prairieGreen"
            >
            <x-admin.forms.field-error name="working_capacity" />
        </div>
        <div>
            <label for="auditor_capacity" class="block text-sm font-medium text-sp-charcoal">
                Auditor Capacity
            </label>
            <p class="mt-1 text-xs text-sp-slate">Maximum number of auditors. Leave blank if not applicable.</p>
            <input
                type="number"
                name="auditor_capacity"
                id="auditor_capacity"
                min="0"
                step="1"
                value="{{ $value('auditor_capacity') }}"
                class="mt-2 block w-full rounded-md border-sp-warmStone bg-sp-warmIvory text-sm text-sp-charcoal focus:border-sp-prairieGreen focus:ring-sp-prairieGreen"
            >
            <x-admin.forms.field-error name="auditor_capacity" />
        </div>
    </div>
    {{-- End Registration Capacities --}}

    {{-- Registration Pricing --}}
<div class="mt-6 grid grid-cols-1 gap-6 md:grid-cols-2">
    <div>
        <label for="working_price" class="block text-sm font-medium text-sp-charcoal">
            Working Spot Price
        </label>
        <p class="mt-1 text-xs text-sp-slate">
            Price per working dog. Enter 0 for free or leave blank if not applicable.
        </p>
        <input
            type="number"
            name="working_price"
            id="working_price"
            min="0"
            max="99999999.99"
            step="0.01"
            value="{{ $value('working_price') }}"
            class="mt-2 block w-full rounded-md border-sp-warmStone bg-sp-warmIvory text-sm text-sp-charcoal focus:border-sp-prairieGreen focus:ring-sp-prairieGreen"
        >
        <x-admin.forms.field-error name="working_price" />
    </div>

    <div>
        <label for="auditor_price" class="block text-sm font-medium text-sp-charcoal">
            Auditor Price
        </label>
        <p class="mt-1 text-xs text-sp-slate">
            Price per auditor. Enter 0 for free or leave blank if not applicable.
        </p>
        <input
            type="number"
            name="auditor_price"
            id="auditor_price"
            min="0"
            max="99999999.99"
            step="0.01"
            value="{{ $value('auditor_price') }}"
            class="mt-2 block w-full rounded-md border-sp-warmStone bg-sp-warmIvory text-sm text-sp-charcoal focus:border-sp-prairieGreen focus:ring-sp-prairieGreen"
        >
        <x-admin.forms.field-error name="auditor_price" />
    </div>
</div>
{{-- End Registration Pricing --}}

</section>

{{-- End Registration --}}

{{-- Event Details --}}

<section class="mt-8 rounded-md border border-sp-warmStone bg-sp-warmIvory p-6">

    <h2 class="font-sans text-lg font-semibold text-sp-charcoal">

        Event Details

    </h2>

    <p class="mt-1 text-sm text-sp-slate">

        Give visitors the information they need to decide whether this event is for them.

    </p>

    <div class="mt-6">

        <label

            for="what_to_expect"

            class="block text-sm font-medium text-sp-charcoal mt-3">

            What to Expect

        </label>

        <div class="mt-3">

            <x-admin.forms.rich-text

                id="what-to-expect-editor"

                name="what_to_expect"

                :value="$value('what_to_expect')"

            />

        </div>

        <x-admin.forms.field-error name="what_to_expect" />

    </div>

    <div class="mt-6">

        <label

            for="what_to_bring"

            class="block text-sm font-medium text-sp-charcoal">

            What to Bring

        </label>

        <div class="mt-3">

            <x-admin.forms.rich-text

                id="what-to-bring-editor"

                name="what_to_bring"

                :value="$value('what_to_bring')"

            />

        </div>

        <x-admin.forms.field-error name="what_to_bring" />

    </div>

    <div class="mt-6">

        <label

            for="requirements_notes"

            class="block text-sm font-medium text-sp-charcoal">

            Requirements & Notes

        </label>

        <div class="mt-3">

            <x-admin.forms.rich-text

                id="requirements-editor"

                name="requirements_notes"

                :value="$value('requirements_notes')"

            />

        </div>

        <x-admin.forms.field-error name="requirements_notes" />

    </div>

</section>

{{-- End Event Details --}}

{{-- Primary CTA --}}

<section class="mt-8 rounded-md border border-sp-warmStone bg-sp-warmIvory p-6">

    <h2 class="font-sans text-lg font-semibold text-sp-charcoal">

        Primary CTA

    </h2>

    <p class="mt-1 text-sm text-sp-slate">

        Add an optional action visitors can take from the event page.

    </p>

    <div class="mt-6 grid grid-cols-1 gap-6 md:grid-cols-2">

        <div>

            <label

                for="cta_label"

                class="block text-sm font-medium text-sp-charcoal">

                Button Label

            </label>

            <input

                type="text"

                name="cta_label"

                id="cta_label"

                value="{{ $value('cta_label') }}"

                maxlength="255"

                placeholder="Learn More"

                class="mt-2 block w-full rounded-md border-sp-warmStone bg-sp-warmIvory text-sm text-sp-charcoal focus:border-sp-prairieGreen focus:ring-sp-prairieGreen"

            >

            <x-admin.forms.field-error name="cta_label" />

        </div>

        <div>

            <label

                for="cta_url"

                class="block text-sm font-medium text-sp-charcoal">

                Button URL

            </label>

            <input

                type="url"

                name="cta_url"

                id="cta_url"

                value="{{ $value('cta_url') }}"

                maxlength="2048"

                placeholder="https://"

                class="mt-2 block w-full rounded-md border-sp-warmStone bg-sp-warmIvory text-sm text-sp-charcoal focus:border-sp-prairieGreen focus:ring-sp-prairieGreen"

            >

            <x-admin.forms.field-error name="cta_url" />

        </div>

    </div>

</section>

{{-- End Primary CTA --}}

{{-- SEO --}}

<section class="mt-8 rounded-md border border-sp-warmStone bg-sp-warmIvory p-6">

    <h2 class="font-sans text-lg font-semibold text-sp-charcoal">

        Search & Social

    </h2>

    <p class="mt-1 text-sm text-sp-slate">

        Optional metadata for search engines and social sharing.

    </p>

    <div class="mt-6">

        <label

            for="seo_title"

            class="block text-sm font-medium text-sp-charcoal">

            SEO Title

        </label>

        <input

            type="text"

            name="seo_title"

            id="seo_title"

            value="{{ $value('seo_title') }}"

            maxlength="255"

            class="mt-2 block w-full rounded-md border-sp-warmStone bg-sp-warmIvory text-sm text-sp-charcoal focus:border-sp-prairieGreen focus:ring-sp-prairieGreen"

        >

        <x-admin.forms.field-error name="seo_title" />

    </div>

    <div class="mt-6">

        <label

            for="seo_description"

            class="block text-sm font-medium text-sp-charcoal">

            SEO Description

        </label>

        <textarea

            name="seo_description"

            id="seo_description"

            rows="4"

            maxlength="1000"

            class="mt-2 block w-full rounded-md border-sp-warmStone bg-sp-warmIvory text-sm text-sp-charcoal focus:border-sp-prairieGreen focus:ring-sp-prairieGreen"

        >{{ $value('seo_description') }}</textarea>

        <x-admin.forms.field-error name="seo_description" />

    </div>

</section>

{{-- End SEO --}}

{{-- Publishing --}}

<section class="mt-8 rounded-md border border-sp-warmStone bg-sp-warmIvory p-6">

    <h2 class="font-sans text-lg font-semibold text-sp-charcoal">

        Publishing

    </h2>

    <p class="mt-1 text-sm text-sp-slate">

        Control when this event becomes publicly available.

    </p>

    <div class="mt-6">

        <label

            for="published_at"

            class="block text-sm font-medium text-sp-charcoal">

            Publish Date & Time

        </label>

        <input

            type="datetime-local"

            name="published_at"

            id="published_at"

            value="{{ $publishedAt }}"

            class="mt-2 block w-full rounded-md border-sp-warmStone bg-sp-warmIvory text-sm text-sp-charcoal focus:border-sp-prairieGreen focus:ring-sp-prairieGreen md:max-w-xs"

        >

        <p class="mt-1 text-xs text-sp-slate">

            Times are in Central Time. Set a future date and select Published to schedule this event. Leave blank to publish immediately when selecting Published.

        </p>

        <x-admin.forms.field-error name="published_at" />

    </div>

</section>

{{-- End Publishing --}}

{{-- Actions --}}

<section class="mt-8 rounded-md border border-sp-warmStone bg-sp-warmIvory p-6">

    <div class="flex flex-col gap-3 sm:flex-row sm:justify-end">

        <a

            href="{{ route('admin.events-v2.index') }}"

            class="inline-flex items-center justify-center rounded-md border border-sp-warmStone px-4 py-2 text-sm font-semibold text-sp-charcoal transition-colors hover:bg-sp-warmIvory">

            Cancel

        </a>

        <button

            type="submit"

            class="inline-flex items-center justify-center rounded-md bg-sp-prairieGreen px-4 py-2 text-sm font-semibold text-sp-warmIvory hover:bg-sp-prairieOchre">

            {{ isset($event) ? 'Update Event' : 'Create Event' }}

        </button>

    </div>

</section>

{{-- End Actions --}}