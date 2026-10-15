@props(['inquiries' => collect()])

<div
                x-data="{ tab: 'all' }"
                class="border-2 border-sp-warmStone bg-sp-limestone text-sp-charcoal rounded-sm my-4">

                <!-- Card Header / Tabs -->
                <div class="border-b border-sp-warmStone">
                    <nav class="flex gap-6 px-6">

                        <button
                            @click="tab = 'all'"
                            :class="tab === 'all' 
                    ? 'border-b-2 border-sp-prairieGreen text-sp-charcoal uppercase text-xs tracking-wide' 
                    : 'text-sp-charcoal uppercase text-xs tracking-wide'"
                            class="py-4">
                            All (Count)
                        </button>

                        <button
                            @click="tab = 'contact'"
                            :class="tab === 'contact' 
                    ? 'border-b-2 border-sp-prairieGreen text-sp-charcoal uppercase text-xs tracking-wide' 
                    : 'text-sp-charcoal uppercase text-xs tracking-wide'"
                            class="py-4">
                            Contact
                        </button>

                        <button
                            @click="tab = 'Training'"
                            :class="tab === 'Training' 
                    ? 'border-b-2 border-sp-prairieGreen text-sp-charcoal uppercase text-xs tracking-wide' 
                    : 'text-sp-charcoal uppercase text-xs tracking-wide'"
                            class="py-4">
                            Training Messages
                        </button>
                        <button
                            @click="tab = 'Workshops'"
                            :class="tab === 'Workshops' 
                    ? 'border-b-2 border-sp-prairieGreen text-sp-charcoal uppercase text-xs tracking-wide' 
                    : 'text-sp-charcoal uppercase text-xs tracking-wide'"
                            class="py-4">
                            Workshops
                        </button>
                        <button
                            @click="tab = 'Evaluations'"
                            :class="tab === 'Evaluations' 
                    ? 'border-b-2 border-sp-prairieGreen text-sp-charcoal uppercase text-xs tracking-wide' 
                    : 'text-sp-charcoal uppercase text-xs tracking-wide'"
                            class="py-4">
                            Evaluations
                        </button>
                        <button
                            @click="tab = 'Judging'"
                            :class="tab === 'Judging' 
                    ? 'border-b-2 border-sp-prairieGreen text-sp-charcoal uppercase text-xs tracking-wide' 
                    : 'text-sp-charcoal uppercase text-xs tracking-wide'"
                            class="py-4">
                            Judging Requests
                        </button>
                        <button
                            @click="tab = 'Other'"
                            :class="tab === 'Other' 
                    ? 'border-b-2 border-sp-prairieGreen text-sp-charcoal uppercase text-xs tracking-wide' 
                    : 'text-sp-charcoal uppercase text-xs tracking-wide'"
                            class="py-4">
                            other
                        </button>
                        <button
                            @click="tab = 'Archived'"
                            :class="tab === 'Archived' 
                    ? 'border-b-2 border-sp-prairieGreen text-sp-charcoal uppercase text-xs tracking-wide' 
                    : 'text-sp-charcoal uppercase text-xs tracking-wide'"
                            class="py-4">
                            archive
                        </button>

                    </nav>
                </div>


                <!-- Card Content -->
                <div class="p-6 text-sp-slate">

                    <div x-show="tab === 'all'">
                        All content
                    </div>

                    <div x-show="tab === 'trickEvals'">
                        Trick Evaluations
                    </div>

                    <div x-show="tab === 'contactMessages'">
                        Contact Messages
                    </div>

                    <div x-show="tab === 'formSubmissions'">
                        Form Submissions
                    </div>
                    <div x-show="tab === 'onlineEvaluations'">
                        Online Evaluations
                    </div>
                    <div x-show="tab === 'resourceRequests'">
                        Resource Requests
                    </div>
                    <div x-show="tab === 'trackingSport'">
                        Tracking Sport Feedback
                    </div>
                </div>

            </div>