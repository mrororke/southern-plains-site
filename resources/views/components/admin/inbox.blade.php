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
                            @click="tab = 'trickEvals'"
                            :class="tab === 'trickEvals' 
                    ? 'border-b-2 border-sp-prairieGreen text-sp-charcoal uppercase text-xs tracking-wide' 
                    : 'text-sp-charcoal uppercase text-xs tracking-wide'"
                            class="py-4">
                            Trick Evaluations
                        </button>

                        <button
                            @click="tab = 'contactMessages'"
                            :class="tab === 'contactMessages' 
                    ? 'border-b-2 border-sp-prairieGreen text-sp-charcoal uppercase text-xs tracking-wide' 
                    : 'text-sp-charcoal uppercase text-xs tracking-wide'"
                            class="py-4">
                            Contact Messages
                        </button>
                        <button
                            @click="tab = 'formSubmissions'"
                            :class="tab === 'formSubmissions' 
                    ? 'border-b-2 border-sp-prairieGreen text-sp-charcoal uppercase text-xs tracking-wide' 
                    : 'text-sp-charcoal uppercase text-xs tracking-wide'"
                            class="py-4">
                            Form Submissions
                        </button>
                        <button
                            @click="tab = 'onlineEvaluations'"
                            :class="tab === 'onlineEvaluations' 
                    ? 'border-b-2 border-sp-prairieGreen text-sp-charcoal uppercase text-xs tracking-wide' 
                    : 'text-sp-charcoal uppercase text-xs tracking-wide'"
                            class="py-4">
                            Online Evaluations
                        </button>
                        <button
                            @click="tab = 'resourceRequests'"
                            :class="tab === 'resourceRequests' 
                    ? 'border-b-2 border-sp-prairieGreen text-sp-charcoal uppercase text-xs tracking-wide' 
                    : 'text-sp-charcoal uppercase text-xs tracking-wide'"
                            class="py-4">
                            Resource Requests
                        </button>
                        <button
                            @click="tab = 'trackingSport'"
                            :class="tab === 'trackingSport' 
                    ? 'border-b-2 border-sp-prairieGreen text-sp-charcoal uppercase text-xs tracking-wide' 
                    : 'text-sp-charcoal uppercase text-xs tracking-wide'"
                            class="py-4">
                            Tracking Sport Feedback
                        </button>

                    </nav>
                </div>


                <!-- Card Content -->
                <div class="p-6">

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