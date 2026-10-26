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
                    @selected(old('type') === 'dog_sports')>
                    Dog Sports
                </option>

                <option
                    value="training"
                    @selected(old('type') === 'training')>
                    Training
                </option>

                <option
                    value="workshop"
                    @selected(old('type') === 'workshop')>
                    Workshop
                </option>

                <option
                    value="class"
                    @selected(old('type') === 'class')>
                    Class
                </option>

                <option
                    value="community"
                    @selected(old('type') === 'community')>
                    Community
                </option>

                <option
                    value="other"
                    @selected(old('type') === 'other')>
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
                    @selected(old('status', 'draft') === 'draft')>
                    Draft
                </option>

                <option
                    value="published"
                    @selected(old('status') === 'published')>
                    Published
                </option>

                <option
                    value="cancelled"
                    @selected(old('status') === 'cancelled')>
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
            value="{{ old('title') }}"
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
        >{{ old('short_description') }}</textarea>

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
                :value="old('description')"
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
            value="{{ old('featured_image_alt') }}"
            maxlength="255"
            class="mt-2 block w-full rounded-md border-sp-warmStone bg-sp-warmIvory text-sm text-sp-charcoal focus:border-sp-prairieGreen focus:ring-sp-prairieGreen"
        >

        <x-admin.forms.field-error name="featured_image_alt" />

    </div>

</section>
{{-- End Featured Image --}}


{{-- Date & Time --}}
<section class="mt-8 rounded-md border border-sp-warmStone bg-sp-warmIvory p-6">

    <h2 class="font-sans text-lg font-semibold text-sp-charcoal">
        Date &amp; Time
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
                value="{{ old('start_date') }}"
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
                value="{{ old('end_date') }}"
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
                value="{{ old('start_time') }}"
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
                value="{{ old('end_time') }}"
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
            value="{{ old('venue_name') }}"
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
            value="{{ old('address') }}"
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
                value="{{ old('city') }}"
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
                value="{{ old('state') }}"
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
                @checked(old('is_private_location'))
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
        >{{ old('location_details') }}</textarea>

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
                @selected(old('registration_status', 'not_required') === 'not_required')>
                Registration Not Required
            </option>

            <option
                value="coming_soon"
                @selected(old('registration_status') === 'coming_soon')>
                Coming Soon
            </option>

            <option
                value="open"
                @selected(old('registration_status') === 'open')>
                Registration Open
            </option>

            <option
                value="closed"
                @selected(old('registration_status') === 'closed')>
                Registration Closed
            </option>

        </select>

        <x-admin.forms.field-error name="registration_status" />

    </div>


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
            value="{{ old('registration_url') }}"
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
            value="{{ old('registration_deadline') }}"
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
        >{{ old('registration_notes') }}</textarea>

        <x-admin.forms.field-error name="registration_notes" />

    </div>

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

        <x-admin.forms.rich-text
            id="what-to-expect-editor"
            name="what_to_expect"
            :value="old('what_to_expect')"
        />

        <x-admin.forms.field-error name="what_to_expect" />

    </div>


    <div class="mt-6">

        <label
            for="what_to_bring"
            class="block text-sm font-medium text-sp-charcoal  mb-6">
            What to Bring
        </label>

        <x-admin.forms.rich-text
            id="what-to-bring-editor"
            name="what_to_bring"
            :value="old('what_to_bring')"
        />

        <x-admin.forms.field-error name="what_to_bring" />

    </div>


    <div class="mt-6">

        <label
            for="requirements_notes"
            class="block text-sm font-medium text-sp-charcoal  mb-6">
            Requirements &amp; Notes
        </label>

        <x-admin.forms.rich-text
            id="requirements-editor"
            name="requirements_notes"
            :value="old('requirements_notes')"
        />

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
                value="{{ old('cta_label') }}"
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
                value="{{ old('cta_url') }}"
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
        Search &amp; Social
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
            value="{{ old('seo_title') }}"
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
        >{{ old('seo_description') }}</textarea>

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
            Publish Date &amp; Time
        </label>

        <input
            type="datetime-local"
            name="published_at"
            id="published_at"
            value="{{ old('published_at') }}"
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

            Create Event

        </button>

    </div>

</section>
{{-- End Actions --}}