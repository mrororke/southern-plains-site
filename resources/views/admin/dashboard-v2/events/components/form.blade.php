{{-- Event Basics --}}
<div class="rounded-lg border border-sp-slate/10 bg-white p-6">

    <div class="mb-6">
        <h2 class="font-sans text-xl font-semibold text-sp-charcoal">
            Event Basics
        </h2>

        <p class="mt-1 text-sm text-sp-slate">
            The core information for this event.
        </p>
    </div>


    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

        {{-- Event Type --}}
        <div>
            <label
                for="type"
                class="block text-sm font-semibold text-sp-charcoal">
                Event Type
            </label>

            <select
                id="type"
                name="type"
                required
                class="mt-2 block w-full rounded-md border-sp-slate/20 bg-white text-sm text-sp-charcoal focus:border-sp-prairieGreen focus:ring-sp-prairieGreen">

                <option value="">Select an event type</option>

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


        {{-- Publication Status --}}
        <div>
            <label
                for="status"
                class="block text-sm font-semibold text-sp-charcoal">
                Status
            </label>

            <select
                id="status"
                name="status"
                required
                class="mt-2 block w-full rounded-md border-sp-slate/20 bg-white text-sm text-sp-charcoal focus:border-sp-prairieGreen focus:ring-sp-prairieGreen">

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
        {{-- End Publication Status --}}

    </div>


    {{-- Title --}}
    <div class="mt-6">

        <label
            for="title"
            class="block text-sm font-semibold text-sp-charcoal">
            Event Title
        </label>

        <input
            type="text"
            id="title"
            name="title"
            value="{{ old('title') }}"
            required
            maxlength="255"
            class="mt-2 block w-full rounded-md border-sp-slate/20 bg-white text-sm text-sp-charcoal focus:border-sp-prairieGreen focus:ring-sp-prairieGreen"
        >

        <x-admin.forms.field-error name="title" />

    </div>
    {{-- End Title --}}


    {{-- Short Description --}}
    <div class="mt-6">

        <label
            for="short_description"
            class="block text-sm font-semibold text-sp-charcoal">
            Short Description
        </label>

        <p class="mt-1 text-sm text-sp-slate">
            A brief description used on event cards and archive listings.
        </p>

        <textarea
            id="short_description"
            name="short_description"
            rows="3"
            maxlength="1000"
            class="mt-2 block w-full rounded-md border-sp-slate/20 bg-white text-sm text-sp-charcoal focus:border-sp-prairieGreen focus:ring-sp-prairieGreen"
        >{{ old('short_description') }}</textarea>

        <x-admin.forms.field-error name="short_description" />

    </div>
    {{-- End Short Description --}}


    {{-- Description --}}
    <div class="mt-6">

        <label
            for="description"
            class="block text-sm font-semibold text-sp-charcoal">
            Event Description
        </label>

        <p class="mt-1 text-sm text-sp-slate">
            The full event description shown on the event detail page.
        </p>

        <textarea
            id="description"
            name="description"
            rows="10"
            required
            class="mt-2 block w-full rounded-md border-sp-slate/20 bg-white text-sm text-sp-charcoal focus:border-sp-prairieGreen focus:ring-sp-prairieGreen"
        >{{ old('description') }}</textarea>

        <x-admin.forms.field-error name="description" />

    </div>
    {{-- End Description --}}

</div>
{{-- End Event Basics --}}


{{-- Featured Image --}}
<div class="rounded-lg border border-sp-slate/10 bg-white p-6">

    <div class="mb-6">

        <h2 class="font-sans text-xl font-semibold text-sp-charcoal">
            Featured Image
        </h2>

        <p class="mt-1 text-sm text-sp-slate">
            This image will appear with the event and will also be used as the default Open Graph image.
        </p>

    </div>


    <div>

        <label
            for="featured_image"
            class="block text-sm font-semibold text-sp-charcoal">
            Image
        </label>

        <input
            type="file"
            id="featured_image"
            name="featured_image"
            accept="image/*"
            class="mt-2 block w-full text-sm text-sp-slate file:mr-4 file:rounded-md file:border-0 file:bg-sp-prairieGreen file:px-4 file:py-2 file:font-semibold file:text-sp-warmIvory hover:file:bg-sp-prairieOchre"
        >

        <p class="mt-2 text-xs text-sp-slate">
            Maximum file size: 10 MB.
        </p>

        <x-admin.forms.field-error name="featured_image" />

    </div>


    <div class="mt-6">

        <label
            for="featured_image_alt"
            class="block text-sm font-semibold text-sp-charcoal">
            Image Alt Text
        </label>

        <input
            type="text"
            id="featured_image_alt"
            name="featured_image_alt"
            value="{{ old('featured_image_alt') }}"
            maxlength="255"
            class="mt-2 block w-full rounded-md border-sp-slate/20 bg-white text-sm text-sp-charcoal focus:border-sp-prairieGreen focus:ring-sp-prairieGreen"
        >

        <x-admin.forms.field-error name="featured_image_alt" />

    </div>

</div>
{{-- End Featured Image --}}


{{-- Date & Time --}}
<div class="rounded-lg border border-sp-slate/10 bg-white p-6">

    <div class="mb-6">

        <h2 class="font-sans text-xl font-semibold text-sp-charcoal">
            Date &amp; Time
        </h2>

        <p class="mt-1 text-sm text-sp-slate">
            Event times use the site's configured timezone.
        </p>

    </div>


    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

        {{-- Start Date --}}
        <div>

            <label
                for="start_date"
                class="block text-sm font-semibold text-sp-charcoal">
                Start Date
            </label>

            <input
                type="date"
                id="start_date"
                name="start_date"
                value="{{ old('start_date') }}"
                required
                class="mt-2 block w-full rounded-md border-sp-slate/20 bg-white text-sm text-sp-charcoal focus:border-sp-prairieGreen focus:ring-sp-prairieGreen"
            >

            <x-admin.forms.field-error name="start_date" />

        </div>


        {{-- End Date --}}
        <div>

            <label
                for="end_date"
                class="block text-sm font-semibold text-sp-charcoal">
                End Date
            </label>

            <input
                type="date"
                id="end_date"
                name="end_date"
                value="{{ old('end_date') }}"
                class="mt-2 block w-full rounded-md border-sp-slate/20 bg-white text-sm text-sp-charcoal focus:border-sp-prairieGreen focus:ring-sp-prairieGreen"
            >

            <p class="mt-2 text-xs text-sp-slate">
                Leave blank for a single-day event.
            </p>

            <x-admin.forms.field-error name="end_date" />

        </div>


        {{-- Start Time --}}
        <div>

            <label
                for="start_time"
                class="block text-sm font-semibold text-sp-charcoal">
                Start Time
            </label>

            <input
                type="time"
                id="start_time"
                name="start_time"
                value="{{ old('start_time') }}"
                class="mt-2 block w-full rounded-md border-sp-slate/20 bg-white text-sm text-sp-charcoal focus:border-sp-prairieGreen focus:ring-sp-prairieGreen"
            >

            <x-admin.forms.field-error name="start_time" />

        </div>


        {{-- End Time --}}
        <div>

            <label
                for="end_time"
                class="block text-sm font-semibold text-sp-charcoal">
                End Time
            </label>

            <input
                type="time"
                id="end_time"
                name="end_time"
                value="{{ old('end_time') }}"
                class="mt-2 block w-full rounded-md border-sp-slate/20 bg-white text-sm text-sp-charcoal focus:border-sp-prairieGreen focus:ring-sp-prairieGreen"
            >

            <x-admin.forms.field-error name="end_time" />

        </div>

    </div>

</div>
{{-- End Date & Time --}}


{{-- Location --}}
<div class="rounded-lg border border-sp-slate/10 bg-white p-6">

    <div class="mb-6">

        <h2 class="font-sans text-xl font-semibold text-sp-charcoal">
            Location
        </h2>

        <p class="mt-1 text-sm text-sp-slate">
            Keep the full location internally even when an event uses a private venue.
        </p>

    </div>


    <div>

        <label
            for="venue_name"
            class="block text-sm font-semibold text-sp-charcoal">
            Venue Name
        </label>

        <input
            type="text"
            id="venue_name"
            name="venue_name"
            value="{{ old('venue_name') }}"
            maxlength="255"
            class="mt-2 block w-full rounded-md border-sp-slate/20 bg-white text-sm text-sp-charcoal focus:border-sp-prairieGreen focus:ring-sp-prairieGreen"
        >

        <x-admin.forms.field-error name="venue_name" />

    </div>


    <div class="mt-6">

        <label
            for="address"
            class="block text-sm font-semibold text-sp-charcoal">
            Address
        </label>

        <input
            type="text"
            id="address"
            name="address"
            value="{{ old('address') }}"
            maxlength="255"
            class="mt-2 block w-full rounded-md border-sp-slate/20 bg-white text-sm text-sp-charcoal focus:border-sp-prairieGreen focus:ring-sp-prairieGreen"
        >

        <x-admin.forms.field-error name="address" />

    </div>


    <div class="mt-6 grid grid-cols-1 gap-6 md:grid-cols-2">

        <div>

            <label
                for="city"
                class="block text-sm font-semibold text-sp-charcoal">
                City
            </label>

            <input
                type="text"
                id="city"
                name="city"
                value="{{ old('city') }}"
                maxlength="255"
                required
                class="mt-2 block w-full rounded-md border-sp-slate/20 bg-white text-sm text-sp-charcoal focus:border-sp-prairieGreen focus:ring-sp-prairieGreen"
            >

            <x-admin.forms.field-error name="city" />

        </div>


        <div>

            <label
                for="state"
                class="block text-sm font-semibold text-sp-charcoal">
                State
            </label>

            <input
                type="text"
                id="state"
                name="state"
                value="{{ old('state') }}"
                maxlength="255"
                required
                class="mt-2 block w-full rounded-md border-sp-slate/20 bg-white text-sm text-sp-charcoal focus:border-sp-prairieGreen focus:ring-sp-prairieGreen"
            >

            <x-admin.forms.field-error name="state" />

        </div>

    </div>


    {{-- Private Location --}}
    <div class="mt-6 rounded-md border border-sp-slate/10 bg-sp-warmIvory/40 p-4">

        <label class="flex items-start gap-3">

            <input
                type="hidden"
                name="is_private_location"
                value="0"
            >

            <input
                type="checkbox"
                name="is_private_location"
                value="1"
                @checked(old('is_private_location'))
                class="mt-1 h-4 w-4 rounded border-sp-slate/30 text-sp-prairieGreen focus:ring-sp-prairieGreen"
            >

            <span>

                <span class="block text-sm font-semibold text-sp-charcoal">
                    This is a private location
                </span>

                <span class="mt-1 block text-sm text-sp-slate">
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
            class="block text-sm font-semibold text-sp-charcoal">
            Location Details
        </label>

        <p class="mt-1 text-sm text-sp-slate">
            Add arrival instructions, parking information, directions, or other useful location notes.
        </p>

        <textarea
            id="location_details"
            name="location_details"
            rows="5"
            class="mt-2 block w-full rounded-md border-sp-slate/20 bg-white text-sm text-sp-charcoal focus:border-sp-prairieGreen focus:ring-sp-prairieGreen"
        >{{ old('location_details') }}</textarea>

        <x-admin.forms.field-error name="location_details" />

    </div>

</div>
{{-- End Location --}}


{{-- Registration --}}
<div class="rounded-lg border border-sp-slate/10 bg-white p-6">

    <div class="mb-6">

        <h2 class="font-sans text-xl font-semibold text-sp-charcoal">
            Registration
        </h2>

        <p class="mt-1 text-sm text-sp-slate">
            Tell visitors how they can participate in this event.
        </p>

    </div>


    <div>

        <label
            for="registration_status"
            class="block text-sm font-semibold text-sp-charcoal">
            Registration Status
        </label>

        <select
            id="registration_status"
            name="registration_status"
            required
            class="mt-2 block w-full rounded-md border-sp-slate/20 bg-white text-sm text-sp-charcoal focus:border-sp-prairieGreen focus:ring-sp-prairieGreen">

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
            class="block text-sm font-semibold text-sp-charcoal">
            Registration URL
        </label>

        <input
            type="url"
            id="registration_url"
            name="registration_url"
            value="{{ old('registration_url') }}"
            maxlength="2048"
            placeholder="https://"
            class="mt-2 block w-full rounded-md border-sp-slate/20 bg-white text-sm text-sp-charcoal focus:border-sp-prairieGreen focus:ring-sp-prairieGreen"
        >

        <x-admin.forms.field-error name="registration_url" />

    </div>


    <div class="mt-6">

        <label
            for="registration_deadline"
            class="block text-sm font-semibold text-sp-charcoal">
            Registration Deadline
        </label>

        <input
            type="date"
            id="registration_deadline"
            name="registration_deadline"
            value="{{ old('registration_deadline') }}"
            class="mt-2 block w-full rounded-md border-sp-slate/20 bg-white text-sm text-sp-charcoal focus:border-sp-prairieGreen focus:ring-sp-prairieGreen"
        >

        <x-admin.forms.field-error name="registration_deadline" />

    </div>


    <div class="mt-6">

        <label
            for="registration_notes"
            class="block text-sm font-semibold text-sp-charcoal">
            Registration Notes
        </label>

        <textarea
            id="registration_notes"
            name="registration_notes"
            rows="4"
            class="mt-2 block w-full rounded-md border-sp-slate/20 bg-white text-sm text-sp-charcoal focus:border-sp-prairieGreen focus:ring-sp-prairieGreen"
        >{{ old('registration_notes') }}</textarea>

        <x-admin.forms.field-error name="registration_notes" />

    </div>

</div>
{{-- End Registration --}}


{{-- Event Details --}}
<div class="rounded-lg border border-sp-slate/10 bg-white p-6">

    <div class="mb-6">

        <h2 class="font-sans text-xl font-semibold text-sp-charcoal">
            Event Details
        </h2>

        <p class="mt-1 text-sm text-sp-slate">
            Give visitors the information they need to decide whether this event is for them.
        </p>

    </div>


    <div>

        <label
            for="what_to_expect"
            class="block text-sm font-semibold text-sp-charcoal">
            What to Expect
        </label>

        <textarea
            id="what_to_expect"
            name="what_to_expect"
            rows="8"
            class="mt-2 block w-full rounded-md border-sp-slate/20 bg-white text-sm text-sp-charcoal focus:border-sp-prairieGreen focus:ring-sp-prairieGreen"
        >{{ old('what_to_expect') }}</textarea>

        <x-admin.forms.field-error name="what_to_expect" />

    </div>


    <div class="mt-6">

        <label
            for="what_to_bring"
            class="block text-sm font-semibold text-sp-charcoal">
            What to Bring
        </label>

        <textarea
            id="what_to_bring"
            name="what_to_bring"
            rows="8"
            class="mt-2 block w-full rounded-md border-sp-slate/20 bg-white text-sm text-sp-charcoal focus:border-sp-prairieGreen focus:ring-sp-prairieGreen"
        >{{ old('what_to_bring') }}</textarea>

        <x-admin.forms.field-error name="what_to_bring" />

    </div>


    <div class="mt-6">

        <label
            for="requirements_notes"
            class="block text-sm font-semibold text-sp-charcoal">
            Requirements &amp; Notes
        </label>

        <textarea
            id="requirements_notes"
            name="requirements_notes"
            rows="8"
            class="mt-2 block w-full rounded-md border-sp-slate/20 bg-white text-sm text-sp-charcoal focus:border-sp-prairieGreen focus:ring-sp-prairieGreen"
        >{{ old('requirements_notes') }}</textarea>

        <x-admin.forms.field-error name="requirements_notes" />

    </div>

</div>
{{-- End Event Details --}}


{{-- Primary CTA --}}
<div class="rounded-lg border border-sp-slate/10 bg-white p-6">

    <div class="mb-6">

        <h2 class="font-sans text-xl font-semibold text-sp-charcoal">
            Primary CTA
        </h2>

        <p class="mt-1 text-sm text-sp-slate">
            Add an optional action visitors can take from the event page.
        </p>

    </div>


    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

        <div>

            <label
                for="cta_label"
                class="block text-sm font-semibold text-sp-charcoal">
                Button Label
            </label>

            <input
                type="text"
                id="cta_label"
                name="cta_label"
                value="{{ old('cta_label') }}"
                maxlength="255"
                placeholder="Learn More"
                class="mt-2 block w-full rounded-md border-sp-slate/20 bg-white text-sm text-sp-charcoal focus:border-sp-prairieGreen focus:ring-sp-prairieGreen"
            >

            <x-admin.forms.field-error name="cta_label" />

        </div>


        <div>

            <label
                for="cta_url"
                class="block text-sm font-semibold text-sp-charcoal">
                Button URL
            </label>

            <input
                type="url"
                id="cta_url"
                name="cta_url"
                value="{{ old('cta_url') }}"
                maxlength="2048"
                placeholder="https://"
                class="mt-2 block w-full rounded-md border-sp-slate/20 bg-white text-sm text-sp-charcoal focus:border-sp-prairieGreen focus:ring-sp-prairieGreen"
            >

            <x-admin.forms.field-error name="cta_url" />

        </div>

    </div>

</div>
{{-- End Primary CTA --}}


{{-- SEO --}}
<div class="rounded-lg border border-sp-slate/10 bg-white p-6">

    <div class="mb-6">

        <h2 class="font-sans text-xl font-semibold text-sp-charcoal">
            Search &amp; Social
        </h2>

        <p class="mt-1 text-sm text-sp-slate">
            Optional metadata for search engines and social sharing.
        </p>

    </div>


    <div>

        <label
            for="seo_title"
            class="block text-sm font-semibold text-sp-charcoal">
            SEO Title
        </label>

        <input
            type="text"
            id="seo_title"
            name="seo_title"
            value="{{ old('seo_title') }}"
            maxlength="255"
            class="mt-2 block w-full rounded-md border-sp-slate/20 bg-white text-sm text-sp-charcoal focus:border-sp-prairieGreen focus:ring-sp-prairieGreen"
        >

        <x-admin.forms.field-error name="seo_title" />

    </div>


    <div class="mt-6">

        <label
            for="seo_description"
            class="block text-sm font-semibold text-sp-charcoal">
            SEO Description
        </label>

        <textarea
            id="seo_description"
            name="seo_description"
            rows="4"
            maxlength="1000"
            class="mt-2 block w-full rounded-md border-sp-slate/20 bg-white text-sm text-sp-charcoal focus:border-sp-prairieGreen focus:ring-sp-prairieGreen"
        >{{ old('seo_description') }}</textarea>

        <x-admin.forms.field-error name="seo_description" />

    </div>

</div>
{{-- End SEO --}}


{{-- Publishing --}}
<div class="rounded-lg border border-sp-slate/10 bg-white p-6">

    <div class="mb-6">

        <h2 class="font-sans text-xl font-semibold text-sp-charcoal">
            Publishing
        </h2>

        <p class="mt-1 text-sm text-sp-slate">
            Control when this event becomes publicly available.
        </p>

    </div>


    <div>

        <label
            for="published_at"
            class="block text-sm font-semibold text-sp-charcoal">
            Publish Date &amp; Time
        </label>

        <input
            type="datetime-local"
            id="published_at"
            name="published_at"
            value="{{ old('published_at') }}"
            class="mt-2 block w-full rounded-md border-sp-slate/20 bg-white text-sm text-sp-charcoal focus:border-sp-prairieGreen focus:ring-sp-prairieGreen"
        >

        <p class="mt-2 text-xs text-sp-slate">
            Leave blank until you are ready to publish. A future date schedules the event.
        </p>

        <x-admin.forms.field-error name="published_at" />

    </div>

</div>
{{-- End Publishing --}}


{{-- Form Actions --}}
<div class="flex flex-wrap items-center justify-end gap-3">

    <a
        href="{{ route('admin.events-v2.index') }}"
        class="inline-flex items-center justify-center rounded-md border border-sp-slate/20 px-4 py-2 text-sm font-semibold text-sp-charcoal transition-colors hover:bg-sp-warmIvory">
        Cancel
    </a>

    <button
        type="submit"
        class="inline-flex items-center justify-center rounded-md bg-sp-prairieGreen px-5 py-2 text-sm font-semibold text-sp-warmIvory transition-colors hover:bg-sp-prairieOchre">

        Create Event

    </button>

</div>
{{-- End Form Actions --}}