@extends('public-v2.layouts.app')

@section('meta_title', 'Register for ' . $event->title . ' | Southern Plains Sport Dog Club')
@section('meta_description', 'Register for ' . $event->title . ' with Southern Plains Sport Dog Club.')

@section('hero')
<div id="hero" class="px-8 pt-10 pb-12 bg-sp-limestone">
    <div class="max-w-6xl mx-auto">
        <p class="text-eyebrow">Let's play!</p>
        <h1 class="text-hero mt-3">Event Registration</h1>
        <div class="hl-break"><hr></div>
        <h2 class="font-sans text-2xl font-semibold text-sp-charcoal mt-6">{{ $event->title }}</h2>
        <p class="body-large text-sp-slate mt-3">Choose how you'd like to participate, then tell us a little about yourself and your dog.</p>
    </div>
</div>
@endsection

@section('content')
<div class="grid grid-cols-12 gap-x-8 gap-y-10 py-[64px] px-8 max-w-7xl mx-auto">
    <div class="col-span-12 lg:col-span-5">
        <p class="font-display text-2xl text-sp-burntClay">Before You Register</p>
        <h2 class="font-sans text-3xl font-semibold text-sp-charcoal mt-1">A Little About the Day</h2>
        <p class="body text-sp-slate mt-4">Working spots are for participants bringing dogs to practice. Auditors attend without a working dog and can watch and learn.</p>
        <p class="body text-sp-slate mt-4">Each dog requires its own working spot. If there isn't enough room for all the dogs in your registration, we'll place the entire registration on the waitlist.</p>
        <p class="body text-sp-slate mt-4">Submitting this form reserves available spots pending payment. Your registration is confirmed once payment is recorded. If you're waitlisted, please don't send payment until you're offered a spot.</p>

        @if ($event->registration_notes)
            <div class="border-l-4 border-sp-prairieBlue bg-sp-prairieBlue/10 rounded-r-md p-5 mt-8">
                <h3 class="font-sans font-semibold text-sp-charcoal">Registration Information</h3>
                <p class="body text-sp-slate whitespace-pre-line mt-2">{{ $event->registration_notes }}</p>
            </div>
        @endif

        <div class="mt-8">
            <h3 class="font-sans text-xl font-semibold text-sp-charcoal">Workshop Policies</h3>
            <ul class="list-disc pl-5 mt-3 space-y-2 body text-sp-slate">
                <li>Workshops take place in all weather conditions unless the organizer announces otherwise.</li>
                <li>Refunds are not available within 48 hours of the workshop.</li>
                <li>Registrations are not transferable.</li>
                <li>Waitlisted participants should not pay until offered a spot.</li>
                <li>Dogs must be safely managed between activities, including when crated in vehicles.</li>
            </ul>
        </div>
    </div>

    <div class="col-span-12 lg:col-span-7 bg-sp-limestone p-6 sm:p-8 rounded-md">
        <p class="font-display text-2xl text-sp-burntClay">Join Us</p>
        <h2 class="font-sans text-3xl font-semibold text-sp-charcoal">Register for This Event</h2>

        @if (session('success'))
            <div role="status" class="border-l-4 border-sp-successGreen bg-sp-successGreen/10 rounded-r-md p-6 mt-6">
                <p class="font-sans font-semibold text-lg text-sp-successGreen mb-3">{{ session('success.title') }}</p>
                <p class="body text-sp-slate whitespace-pre-line">{{ session('success.message') }}</p>
            </div>
        @else
            @error('rate_limit')
                <div role="alert" class="border-l-4 border-sp-clayRed bg-sp-clayRed/10 rounded-r-md p-6 mt-6">
                    <p class="font-sans font-semibold text-lg text-sp-clayRed mb-2">Too Many Registrations</p>
                    <p class="body text-sp-charcoal">{{ $message }}</p>
                </div>
            @enderror

            @error('registration')
                <div role="alert" class="border-l-4 border-sp-clayRed bg-sp-clayRed/10 rounded-r-md p-6 mt-6">
                    <p class="body text-sp-clayRed">{{ $message }}</p>
                </div>
            @enderror

            <form method="POST" action="{{ route('public-v2.events.register.store', $event) }}" class="space-y-6 mt-6" x-data="{
                participation: @js(old('participation_type', 'working')),
                dogs: @js(old('dogs', [['name' => '', 'age' => '', 'breed' => '']])),
                addDog() { if (this.dogs.length < 20) this.dogs.push({ name: '', age: '', breed: '' }); },
                removeDog(index) { if (this.dogs.length > 1) this.dogs.splice(index, 1); }
            }">
                @csrf
                <div aria-hidden="true" class="hidden">
                    <label for="website_url">Website URL</label>
                    <input type="text" id="website_url" name="website_url" tabindex="-1" autocomplete="off">
                </div>

                <div>
                    <label for="name" class="block text-sp-slate text-sm mb-2">Your Name*</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required autocomplete="name" class="w-full rounded-md">
                    @error('name') <p class="text-sp-clayRed mt-2">{{ $message }}</p> @enderror
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="email" class="block text-sp-slate text-sm mb-2">Email Address*</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" class="w-full rounded-md">
                        @error('email') <p class="text-sp-clayRed mt-2">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="phone" class="block text-sp-slate text-sm mb-2">Phone Number*</label>
                        <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" required autocomplete="tel" class="w-full rounded-md">
                        @error('phone') <p class="text-sp-clayRed mt-2">{{ $message }}</p> @enderror
                    </div>
                </div>

                <fieldset>
                    <legend class="block text-sp-slate text-sm mb-3">How Would You Like to Participate?*</legend>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <label class="flex items-center gap-3 border border-sp-slate/20 rounded-md p-4 cursor-pointer bg-white">
                            <input type="radio" name="participation_type" value="working" x-model="participation" required>
                            <span class="text-sp-charcoal font-semibold">Working Team</span>
                        </label>
                        <label class="flex items-center gap-3 border border-sp-slate/20 rounded-md p-4 cursor-pointer bg-white">
                            <input type="radio" name="participation_type" value="auditor" x-model="participation" required>
                            <span class="text-sp-charcoal font-semibold">Auditor</span>
                        </label>
                    </div>
                    @error('participation_type') <p class="text-sp-clayRed mt-2">{{ $message }}</p> @enderror
                </fieldset>

                <section x-show="participation === 'working'" x-cloak>
                    <h3 class="font-sans text-xl font-semibold text-sp-charcoal">Your Working Dogs</h3>
                    <p class="body-small text-sp-slate mt-1 mb-4">Each dog uses one working spot.</p>
                    <template x-for="(dog, index) in dogs" :key="index">
                        <div class="border border-sp-slate/20 bg-white rounded-md p-4 mb-4">
                            <div class="flex justify-between items-center mb-4 gap-3">
                                <h4 class="font-sans font-semibold text-sp-charcoal" x-text="'Dog ' + (index + 1)"></h4>
                                <button type="button" x-show="dogs.length > 1" @click="removeDog(index)" class="text-sm text-sp-clayRed underline">Remove Dog</button>
                            </div>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sp-slate text-sm mb-2" :for="'dog-name-' + index">Dog's Name*</label>
                                    <input type="text" :id="'dog-name-' + index" :name="'dogs[' + index + '][name]'" x-model="dog.name" :required="participation === 'working'" :disabled="participation !== 'working'" maxlength="255" class="w-full rounded-md">
                                </div>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sp-slate text-sm mb-2" :for="'dog-age-' + index">Age*</label>
                                        <input type="text" :id="'dog-age-' + index" :name="'dogs[' + index + '][age]'" x-model="dog.age" :required="participation === 'working'" :disabled="participation !== 'working'" maxlength="100" class="w-full rounded-md">
                                    </div>
                                    <div>
                                        <label class="block text-sp-slate text-sm mb-2" :for="'dog-breed-' + index">Breed*</label>
                                        <input type="text" :id="'dog-breed-' + index" :name="'dogs[' + index + '][breed]'" x-model="dog.breed" :required="participation === 'working'" :disabled="participation !== 'working'" maxlength="255" class="w-full rounded-md">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                    <button type="button" @click="addDog()" :disabled="dogs.length >= 20" class="font-sans font-semibold text-sp-prairieBlue underline disabled:opacity-50">+ Add Another Dog</button>
                    @error('dogs') <p class="text-sp-clayRed mt-2">{{ $message }}</p> @enderror
                    @foreach ($errors->getMessages() as $field => $messages)
                        @if (str_starts_with($field, 'dogs.'))
                            @foreach ($messages as $message)
                                <p class="text-sp-clayRed mt-2">{{ $message }}</p>
                            @endforeach
                        @endif
                    @endforeach
                </section>

                <div>
                    <label for="nasda_experience" class="block text-sp-slate text-sm mb-2">Tell Us About Your NASDA Experience</label>
                    <textarea id="nasda_experience" name="nasda_experience" rows="3" class="w-full rounded-md">{{ old('nasda_experience') }}</textarea>
                    @error('nasda_experience') <p class="text-sp-clayRed mt-2">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="other_sports" class="block text-sp-slate text-sm mb-2">Do You Participate in Other Dog Sports?</label>
                    <textarea id="other_sports" name="other_sports" rows="2" class="w-full rounded-md">{{ old('other_sports') }}</textarea>
                    @error('other_sports') <p class="text-sp-clayRed mt-2">{{ $message }}</p> @enderror
                </div>
                <div x-show="participation === 'working'" x-cloak>
                    <label for="reinforcers" class="block text-sp-slate text-sm mb-2">What Does Your Dog Find Rewarding?</label>
                    <textarea id="reinforcers" name="reinforcers" rows="2" class="w-full rounded-md" :disabled="participation !== 'working'">{{ old('reinforcers') }}</textarea>
                    @error('reinforcers') <p class="text-sp-clayRed mt-2">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="notes" class="block text-sp-slate text-sm mb-2">Anything Else We Should Know?</label>
                    <textarea id="notes" name="notes" rows="4" class="w-full rounded-md">{{ old('notes') }}</textarea>
                    @error('notes') <p class="text-sp-clayRed mt-2">{{ $message }}</p> @enderror
                </div>

                <fieldset>
                    <legend class="block text-sp-slate text-sm mb-3">May Southern Plains Sport Dog Club use photos of you or your dog from this event?*</legend>
                    <div class="flex flex-wrap gap-6">
                        <label class="flex items-center gap-2 text-sp-charcoal"><input type="radio" name="photo_permission" value="1" @checked(old('photo_permission') === '1') required> Yes</label>
                        <label class="flex items-center gap-2 text-sp-charcoal"><input type="radio" name="photo_permission" value="0" @checked(old('photo_permission') === '0') required> No</label>
                    </div>
                    @error('photo_permission') <p class="text-sp-clayRed mt-2">{{ $message }}</p> @enderror
                </fieldset>

                <div class="border-t border-sp-slate/20 pt-5">
                    <label class="flex gap-3 items-start text-sp-charcoal">
                        <input type="checkbox" name="policy_acknowledged" value="1" @checked(old('policy_acknowledged')) required class="mt-1">
                        <span class="body-small">I have read and understand the workshop policies, including the refund, transfer, weather, and payment requirements.*</span>
                    </label>
                    @error('policy_acknowledged') <p class="text-sp-clayRed mt-2">{{ $message }}</p> @enderror
                </div>

                <button type="submit" class="btn-primary w-full">
                    Submit Registration
                    <i data-lucide="arrow-right" class="w-5 h-5"></i>
                </button>
                <p class="body-small text-sp-slate">Available spots are reserved pending payment. If the event is full, you'll be added to the waitlist instead. Your registration is not confirmed until payment is recorded.</p>
            </form>
        @endif
    </div>
</div>
@endsection
