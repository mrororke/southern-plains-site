<x-home.app-header />

            <main>

                <x-app-left-slider />

                    <!-- Scrollable Column -->
                    <div class="w-full lg:w-2/3 flex-shrink-0 overflow-y-auto">
                        <div class="lg:px-[120px] p-4">
                            <h4 class="uppercase text-xs font-bold">Southern Plains Sport Dog Club</h4>
                            <h1 class="font-heading text-7xl">Train. Play. Grow</h1>
                            <h3 class="text-2xl mb-2 mt-2">Your Home for Positive Dog Training, Sport, and Community.</h3>

                            <p class="text-base mb-2">Welcome to <span class="font-semibold">Southern Plains Sport Dog Club</span> — the region's most comprehensive resource dedicated to building better dog-handler partnerships. Our positive-reinforcement training programs, accessible competitive events, and supportive community are designed to help you and your dog thrive.</p>

                            <p class="text-base mb-2">Whether you're starting with basic manners, pursuing a Canine Good Citizen title, or aiming for titles in NASDA sport trials, we have the classes, events, and expertise you need to <span class="font-semibold">Train, Play, and Grow</span> together.</p>

                            <div class="mt-6">
                                <h3 class="font-heading text-5xl mt-2 mb-6">Choose Your Path</h3>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                                    <a href="#club">
                                        <div class="relative text-white bg-cover bg-center pt-[203.78%]"
                                            style="background-image: url('{{ asset('images/club.png') }}');">
                                            <div class="absolute inset-0 p-6 flex flex-col items-center justify-center text-center">
                                                <h4 class="font-heading font-bold text-5xl mt-8 mb-8">Club</h4>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#league">
                                        <div class="relative text-white bg-cover bg-center pt-[203.78%]"
                                            style="background-image: url('{{ asset('images/league.png') }}');">
                                            <div class="absolute inset-0 p-6 flex flex-col items-center justify-center text-center">
                                                <h4 class="font-heading font-bold text-5xl mt-8 mb-8">League</h4>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#train">
                                        <div class="relative text-white bg-cover bg-center pt-[203.78%]"
                                            style="background-image: url('{{ asset('images/train.png') }}');">
                                            <div class="absolute inset-0 p-6 flex flex-col items-center justify-center text-center">
                                                <h4 class="font-heading font-bold text-5xl mt-8 mb-8">Train</h4>
                                            </div>
                                        </div>
                                    </a>

                                </div>
                            </div>
                        </div>

                        <div id="club" class="p-6 bg-club bg-cover bg-center"
                            style="background-image: url('{{ asset('images/right_mask.png') }}');">
                            <div class="lg:px-[120px] p-4">
                                <h4 class="uppercase text-xs font-bold">Southern Plains Sport Dog Club</h4>
                                <h3 class="font-heading text-5xl mb-6">Your gateway to NASDA Competition.</h3>
                                <p class="text-base mb-2">We are licensed <span class="font-semibold">NASDA Club</span> dedicated to hosting high-quality, accessible trials in new and underserved areas. This is the perfect place to try out a sport organization before committing<br /> to full club membership.</p>

                                <x-primary-button color="club-dark" class="mt-6">
                                    {{ __('View Trial Schedule') }}
                                </x-primary-button>

                            </div>
                        </div>
                        <div id="league" class="p-6 bg-league bg-cover bg-center"
                            style="background-image: url('{{ asset('images/left_mask.png') }}');">
                            <div class="lg:px-[120px] p-4">
                                <h4 class="uppercase text-xs font-bold">Southern Plains Sport Dog League</h4>
                                <h3 class="font-heading text-5xl mb-6">Friendly Competition, Fierce Team Spirit</h3>
                                <p class="text-base mb-2">The League provides a regular, local structure for competition and progress measurement. Join our organized events throughout the year to hone your sport skills and enjoy the camaraderie of fellow handlers. <span class="italic">(Formerly Redbud Sport Dog League)</span>.</p>
                                <x-primary-button color="league-dark" class="mt-6">
                                    {{ __('Explore the League') }}
                                </x-primary-button>
                            </div>
                        </div>
                        <div id="train" class="p-6 bg-training bg-cover bg-center"
                            style="background-image: url('{{ asset('images/right_mask.png') }}');">
                            <div class="lg:px-[120px] p-4">
                                <h4 class="uppercase text-xs font-bold">Southern Plains Training</h4>
                                <h3 class="font-heading text-5xl mb-6">From Manners to Masters<br />Building a Solid Foundation</h3>
                                <p class="text-base mb-2">Our focus is positive-reinforcement training that builds confidence and reliable behavior. We offer core classes, including <span class="font-semibold">Basic Manners, Canine Good Citizen (CGC) preparation, Tricks</span>, and specialized workshops to strengthen your partnership.</p>
                                <x-primary-button color="train-dark" class="mt-6">
                                    {{ __('View Current Offerings') }}
                                </x-primary-button>
                            </div>
                        </div>


                        <div class="lg:px-[120px] p-6"><!-- END Why Us -->
                            <h3 class="font-heading text-5xl mb-6">Why Choose Southern Plains?</h3>
                            <div class="grid md:grid-cols-2 gap-4 text-center">
                                <div class="p-8 border">
                                    <svg width="36" height="36" class="mb-4 mx-auto" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M19 0H19.25C23.25 0 26.875 2.125 28.875 5.625L32 10.75L35 5.625C37 2.125 40.625 0 44.625 0H45C51 0 56 5 56 11C56 12.875 55.5 14.5 54.75 16H60C62.125 16 64 17.875 64 20V28C64 30.25 62.125 32 60 32H4C1.75 32 0 30.25 0 28V20C0 17.875 1.75 16 4 16H9.125C8.375 14.5 8 12.875 8 11C8 5 12.875 0 19 0ZM23.75 8.625C22.75 7 21.125 6 19.25 6H19C16.125 6 14 8.25 14 11C14 13.875 16.125 16 19 16H28.125L23.75 8.625ZM45 6H44.625C42.75 6 41.125 7 40.125 8.625L35.75 16H45C47.75 16 50 13.875 50 11C50 8.25 47.75 6 45 6ZM4 36H28V64H10C6.625 64 4 61.375 4 58V36ZM36 64V36H60V58C60 61.375 57.25 64 54 64H36Z" fill="#4CBB17" />
                                    </svg>

                                    <h3 class="uppercase text-small font-bold mb-4">Positive Reinforcement</h3>
                                    <p class="text-small mb-2">Our training methods are rooted in science-backed, positive techniques. We focus on building confidence, communication, and a happy, willing partnership with your dog.</p>
                                </div>
                                <div class="p-6 border">
                                    <svg width="36" height="36" class="mb-4 mx-auto" viewBox="0 0 66 57" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M43 23.625C41.625 24.875 39.625 24.875 38.125 23.75L24.625 13.625L7 27.625C5.375 29 2.875 28.75 1.5 27C0 25.375 0.375 22.875 2.125 21.375L22.125 5.5C23.5 4.25 25.5 4.25 27 5.375L40.5 15.5L58.125 1.5C59.75 0 62.25 0.375 63.625 2.125C65.125 3.75 64.75 6.25 63 7.625L43 23.625ZM20.625 28.5C20.625 26.375 22.375 24.5 24.625 24.5C26.75 24.5 28.625 26.375 28.625 28.5V52.5C28.625 54.75 26.75 56.5 24.625 56.5C22.375 56.5 20.625 54.75 20.625 52.5V28.5ZM4.625 40.5C4.625 38.375 6.375 36.5 8.625 36.5C10.75 36.5 12.625 38.375 12.625 40.5V52.5C12.625 54.75 10.75 56.5 8.625 56.5C6.375 56.5 4.625 54.75 4.625 52.5V40.5ZM44.625 36.5V52.5C44.625 54.75 42.75 56.5 40.625 56.5C38.375 56.5 36.625 54.75 36.625 52.5V36.5C36.625 34.375 38.375 32.5 40.625 32.5C42.75 32.5 44.625 34.375 44.625 36.5ZM52.625 28.5C52.625 26.375 54.375 24.5 56.625 24.5C58.75 24.5 60.625 26.375 60.625 28.5V52.5C60.625 54.75 58.75 56.5 56.625 56.5C54.375 56.5 52.625 54.75 52.625 52.5V28.5Z" fill="#4CBB17" />
                                    </svg>

                                    <h3 class="uppercase text-small font-bold mb-4">Train, Play, Compete</h3>
                                    <p class="text-small mb-2">We provide a structured pathway for every stage: from foundational skills in our Training classes, to engaging Monthly League competitions, to official NASDA Trial events.</p>
                                </div>
                                <div class="p-6 border">
                                    <svg width="36" height="36" class="mb-4 mx-auto" viewBox="0 0 65 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M44.25 16C44.25 18.25 46 20 48.25 20H64.25V58C64.25 61.375 61.5 64 58.25 64H28.125V52.625C30.375 51.75 32 49.875 32.625 47.5L32.75 47C32.875 46.625 32.875 46.375 33 46.125C33.125 46 33.375 45.75 33.625 45.5L34 45.125C35.875 43.25 36.625 40.375 35.875 37.75L35.75 37.25C35.75 36.875 35.625 36.5 35.625 36.375C35.625 36.125 35.75 35.875 35.875 35.375V35C36.625 32.375 35.875 29.5 33.875 27.5L33.625 27.25C33.375 26.875 33.125 26.75 33 26.5C32.875 26.375 32.875 26 32.75 25.625L32.625 25.125C31.875 22.5 29.875 20.375 27.25 19.75L26.75 19.625C26.375 19.5 26.125 19.375 25.875 19.375C25.75 19.125 25.5 19 25.25 18.75L24.875 18.375C23.5 16.875 21.5 16 19.5 16C18.875 16 18.125 16.125 17.5 16.375L17 16.5C16.625 16.5 16.375 16.625 16.25 16.625V6C16.25 2.75 18.875 0 22.25 0H44.25V16ZM48.25 0L64.25 16H48.25V0ZM28.75 46.5C28.625 46.875 28.5 47.125 28.375 47.375C27.875 48.25 27.125 48.875 26.125 49.125C24.375 49.625 24.75 49.5 24.125 49.75V64L16.25 60L8.25 64V49.75C7.875 49.625 7.875 49.625 7.625 49.5C7.5 49.5 7.125 49.375 6.25 49.125C5 48.75 4 47.75 3.625 46.5C3.5 45.875 3.375 45.375 3.25 45C2.875 44 2.625 43.75 1.25 42.375C1 42.125 0.875 41.875 0.625 41.625C0.25 40.75 0 39.75 0.375 38.75C1 36.125 1 36.5 0.375 34C0 33 0.25 32 0.625 31.125C0.875 30.875 1 30.625 1.25 30.375C2.375 29.125 2.75 28.875 3.125 28.125C3.25 27.75 3.375 27.125 3.625 26.125C4 24.875 5 23.875 6.25 23.5C8.75 22.875 8.375 23 10.25 21.125C10.625 20.875 11 20.625 11.375 20.375C11.5 20.375 11.5 20.375 11.625 20.25C12 20.125 12.5 20 12.875 20C13.25 20 13.5 20.125 13.75 20.125C15 20.5 15.5 20.75 16.125 20.75C16.75 20.75 17.25 20.5 18.5 20.125C18.625 20.125 18.625 20.125 18.625 20.125C18.625 20.125 18.625 20.125 18.5 20.125C18.875 20.125 19.125 20 19.5 20C19.875 20 20.375 20.125 20.75 20.25C20.875 20.375 20.875 20.375 21 20.375C21.375 20.625 21.75 20.875 22.125 21.125C22.25 21.375 22.5 21.625 22.625 21.75C23 22.125 23.25 22.375 23.5 22.5C24.125 23 24.625 23.125 26.125 23.5C27.125 23.875 27.875 24.5 28.375 25.25C28.5 25.5 28.625 25.875 28.75 26.125C28.875 26.875 29 27.25 29.125 27.625C29.5 28.75 29.75 28.875 31.125 30.375C32 31.25 32.375 32.625 32 34C31.375 36.5 31.375 36.125 32 38.75C32.375 40 32 41.375 31.125 42.375C29.75 43.75 29.5 43.875 29.125 45C29 45.375 28.875 45.875 28.75 46.5ZM16.25 44C20.625 44 24.125 40.5 24.125 36C24.125 31.625 20.625 28 16.25 28C15.625 28 15.125 28.125 14.625 28.25C13.5 28.375 12.625 28.875 11.75 29.375C10.875 30 10.125 30.75 9.5 31.625C8.75 32.875 8.25 34.375 8.25 36C8.25 37.75 8.75 39.25 9.5 40.5C10.125 41.375 10.875 42.125 11.75 42.75C12.625 43.25 13.5 43.625 14.625 43.875C15.125 44 15.625 44 16.25 44Z" fill="#4CBB17" />
                                    </svg>

                                    <h3 class="uppercase text-small font-bold mb-4">Qualified & Certified</h3>
                                    <p class="text-small mb-2">Our lead instructor is an authorized AKC Canine Good Citizen (CGC) Evaluator and a Level 3 Fit Dog Instructor, ensuring the highest standards in manners, safety, and canine conditioning.</p>

                                </div>
                                <div class="p-6 border">
                                    <svg width="36" height="36" class="mx-auto mb-4" viewBox="0 0 80 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M39.875 40C32.75 40 26.875 34.25 27 27C27 19.875 32.75 14 39.875 14C47 14 52.875 19.875 52.875 27C52.875 34.25 47.125 40 39.875 40ZM46.125 44C56 44 64 51.5 64 60.75C64 62.625 62.375 64 60.375 64H19.5C17.5 64 16 62.625 16 60.75C16 51.5 23.875 44 33.75 44H46.125ZM64 20C58.375 20 54 15.625 54 10C54 4.5 58.375 0 64 0C69.5 0 74 4.5 74 10C74 15.625 69.5 20 64 20ZM22.875 27C22.875 31.25 24.5 35.125 27.125 38H2.125C0.875 38 0 37 0 35.75C0 29.25 4.875 24 11 24H18.625C20.25 24 21.75 24.375 23.125 25.125C23 25.75 22.875 26.375 22.875 27ZM16 20C10.375 20 6 15.625 6 10C6 4.5 10.375 0 16 0C21.5 0 26 4.5 26 10C26 15.625 21.5 20 16 20ZM68.875 24C75 24 80 29.25 80 35.75C80 37 79 38 77.75 38H52.75C55.375 35.125 56.875 31.25 56.875 27C56.875 26.375 56.75 25.75 56.75 25.125C58.125 24.5 59.625 24 61.25 24H68.875Z" fill="#4CBB17" />
                                    </svg>

                                    <h3 class="uppercase text-small font-bold mb-4">Community Focused</h3>
                                    <p class="text-small mb-2">More than just training, we are a supportive network of handlers committed to learning, competing, and growing together in a welcoming environment. Join our team!</p>

                                </div>
                            </div>

                        </div> <!-- END Why Us -->

                        <div class="lg:px-[120px] p-6"> <!-- BEGIN testimonial -->
                            <h3 class="font-heading text-5xl mb-6">Hear it From Our Handlers</h3>
                            <p class="text-base mb-2">Nothing proves the strength of our system like the success stories of the dogs and handlers we work with. See what our community has to say about training, competing, and growing with Southern Plains.</p>


                            <!-- BEGIN Testimonial CAROUSEL -->
                            <div id="testimonials-carousel" class="relative w-full" data-carousel="slide">
                                <!-- Carousel wrapper -->
                                <div class="relative h-96 overflow-hidden  mt-4 mb-4 ">
                                    <!-- Item 1 -->
                                    <div class="hidden duration-700 ease-in-out bg-gray-100 lg:px-[100px] lg:p-6" data-carousel-item="active">
                                        <div class="grid lg:grid-cols-4">
                                            <div class="hidden lg:block lg:p-8 ">
                                                <img src="{{ asset('images/quote.png') }}" class="mx-auto pt-2" alt="Green opening quotation mark">
                                            </div>
                                            <div class="p-8 col-span-3">
                                                <p class="text-lg">
                                                    "I started training because my dog was reactive. The positive methods here not only fixed that but inspired me to pursue competitive dog sports! Knowing the instructor is an official CGC Evaluator gave me so much confidence in the foundational safety and manners training. We now look forward to the monthly league comps."
                                                </p>
                                                <p class="italic text-right pt-4">— Michael T., Handler of 'Gus'</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Item 2 -->
                                    <div class="hidden duration-700 ease-in-out bg-gray-100 lg:px-[100px] lg:p-6" data-carousel-item>
                                        <div class="grid lg:grid-cols-4">
                                            <div class="hidden lg:block lg:p-8">
                                                <img src="{{ asset('images/quote.png') }}" class="mx-auto pt-2" alt="Green opening quotation mark">
                                            </div>
                                            <div class="p-8 col-span-3">
                                                <p class="text-lg">
                                                    "I started training because my dog was reactive. The positive methods here not only fixed that but inspired me to pursue competitive dog sports! Knowing the instructor is an official CGC Evaluator gave me so much confidence in the foundational safety and manners training. We now look forward to the monthly league comps."
                                                </p>
                                                <p class="italic text-right pt-4">— Michael C., Handler of 'Tuff'</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Item 3 -->
                                    <div class="hidden duration-700 ease-in-out bg-gray-100 lg:px-[100px] lg:p-6"" data-carousel-item>
                                        <div class=" grid lg:grid-cols-4">
                                        <div class="hidden lg:block lg:p-8">
                                            <img src="{{ asset('images/quote.png') }}" class="mx-auto pt-2" alt="Green opening quotation mark">
                                        </div>
                                        <div class="p-8 col-span-3">
                                            <p class="text-lg">
                                                "I started training because my dog was reactive. The positive methods here not only fixed that but inspired me to pursue competitive dog sports! Knowing the instructor is an official CGC Evaluator gave me so much confidence in the foundational safety and manners training. We now look forward to the monthly league comps."
                                            </p>
                                            <p class="italic text-right pt-4">— Michael H., Handler of 'Margo'</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- Slider indicators NOTE: ONE IS NEEDED FOR EACH SLIDE -->
                            <div class="absolute z-30 flex -translate-x-1/2 space-x-3 rtl:space-x-reverse bottom-5 left-1/2">
                                <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                            </div>
                        </div>
                        <!-- END Testimonial Carousel -->
                    </div><!-- END testimonial  -->

                    <div id="footer" class="p-6 bg-club"><!-- BEGIN Footer -->
                        <div class="lg:px-[120px] p-4">
                            <div class="grid md:grid-cols-4 gap-4">
                                <div>
                                    <div class="text-black mb-4">
                                        <x-application-logo-footer class="w-20 h-20 fill-current" />
                                    </div>
                                    <ul class="list-none text-xs">
                                        <li><a href="tel:9188144446">(918) 814 - 4446</a></li>
                                        <li><a href="mail:southernplainssportsdogclub@gmail.com">southernplainssportsdogclub@gmail.com</a></li>
                                        <li>Serving Northeastern Oklahoma<br />Rogers, Mayes, and Wagoner Counties</li>
                                    </ul>
                                    <ul class="list-none text-xs mt-4">
                                        <li class="inline-block align-middle pr-4">
                                            <svg width="10" height="16" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M2.0625 9.375H0V6.3125H2.0625V5C2.0625 1.59375 3.59375 0 6.9375 0C7.5625 0 8.65625 0.125 9.09375 0.25V3.03125C8.875 3 8.46875 3 7.9375 3C6.3125 3 5.6875 3.625 5.6875 5.21875V6.3125H8.9375L8.375 9.375H5.6875V16H2.0625V9.375Z" fill="currentColor" />
                                            </svg>

                                        </li>
                                        <li class="inline-block align-middle pr-4">
                                            <svg width="16" height="16" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7.03125 3.40625C9 3.40625 10.625 5.03125 10.625 7C10.625 9 9 10.5938 7.03125 10.5938C5.03125 10.5938 3.4375 9 3.4375 7C3.4375 5.03125 5.03125 3.40625 7.03125 3.40625ZM7.03125 9.34375C8.3125 9.34375 9.34375 8.3125 9.34375 7C9.34375 5.71875 8.3125 4.6875 7.03125 4.6875C5.71875 4.6875 4.6875 5.71875 4.6875 7C4.6875 8.3125 5.75 9.34375 7.03125 9.34375ZM11.5938 3.28125C11.5938 2.8125 11.2188 2.4375 10.75 2.4375C10.2812 2.4375 9.90625 2.8125 9.90625 3.28125C9.90625 3.75 10.2812 4.125 10.75 4.125C11.2188 4.125 11.5938 3.75 11.5938 3.28125ZM13.9688 4.125C14.0312 5.28125 14.0312 8.75 13.9688 9.90625C13.9062 11.0312 13.6562 12 12.8438 12.8438C12.0312 13.6562 11.0312 13.9062 9.90625 13.9688C8.75 14.0312 5.28125 14.0312 4.125 13.9688C3 13.9062 2.03125 13.6562 1.1875 12.8438C0.375 12 0.125 11.0312 0.0625 9.90625C0 8.75 0 5.28125 0.0625 4.125C0.125 3 0.375 2 1.1875 1.1875C2.03125 0.375 3 0.125 4.125 0.0625C5.28125 0 8.75 0 9.90625 0.0625C11.0312 0.125 12.0312 0.375 12.8438 1.1875C13.6562 2 13.9062 3 13.9688 4.125ZM12.4688 11.125C12.8438 10.2188 12.75 8.03125 12.75 7C12.75 6 12.8438 3.8125 12.4688 2.875C12.2188 2.28125 11.75 1.78125 11.1562 1.5625C10.2188 1.1875 8.03125 1.28125 7.03125 1.28125C6 1.28125 3.8125 1.1875 2.90625 1.5625C2.28125 1.8125 1.8125 2.28125 1.5625 2.875C1.1875 3.8125 1.28125 6 1.28125 7C1.28125 8.03125 1.1875 10.2188 1.5625 11.125C1.8125 11.75 2.28125 12.2188 2.90625 12.4688C3.8125 12.8438 6 12.75 7.03125 12.75C8.03125 12.75 10.2188 12.8438 11.1562 12.4688C11.75 12.2188 12.25 11.75 12.4688 11.125Z" fill="currentColor" />
                                            </svg>

                                        </li>
                                        <li class="inline-block align-middle">
                                            <svg width="22" height="16" viewBox="0 0 18 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M16.7188 1.90625C17.0938 3.21875 17.0938 6.03125 17.0938 6.03125C17.0938 6.03125 17.0938 8.8125 16.7188 10.1562C16.5312 10.9062 15.9375 11.4688 15.2188 11.6562C13.875 12 8.5625 12 8.5625 12C8.5625 12 3.21875 12 1.875 11.6562C1.15625 11.4688 0.5625 10.9062 0.375 10.1562C0 8.8125 0 6.03125 0 6.03125C0 6.03125 0 3.21875 0.375 1.90625C0.5625 1.15625 1.15625 0.5625 1.875 0.375C3.21875 0 8.5625 0 8.5625 0C8.5625 0 13.875 0 15.2188 0.375C15.9375 0.5625 16.5312 1.15625 16.7188 1.90625ZM6.8125 8.5625L11.25 6.03125L6.8125 3.5V8.5625Z" fill="currentColor" />
                                            </svg>

                                        </li>

                                    </ul>

                                </div>
                                <div class="text-center">
                                    <h3 class="font-heading text-2xl mb-2">Explore</h3>
                                    <ul class="list-none text-sm">
                                        <li>Home</li>
                                        <li>About</li>
                                        <li>Blog</li>
                                        <li>Training</li>
                                        <li>League</li>
                                        <li>Events</li>
                                        <li>Contact</li>
                                    </ul>
                                </div>
                                <div class="col-span-2">
                                    <h3 class="font-heading text-2xl mb-2">Stay in the loop.</h3>
                                    <p class="text-sm mb-2">Get our best positive training tips, behavior insights, and early access to specialty class registration (like The Predictable Path!). No spam, just value.</p>
                                    <!-- Begin Brevo Form -->
                                    <!-- START - We recommend to place the below code where you want the form in your website html  -->
                                    <div class="sib-form" style="padding: 0 !important;">
                                        <div id="sib-form-container" class="sib-form-container">
                                            <div id="error-message" class="sib-form-message-panel" style="font-size: .875rem; text-align:left; font-family:Helvetica, sans-serif; color:#661d1d; background-color:#ffeded; border-radius:3px; border-color:#ff4949;max-width:350px;">
                                                <div class="sib-form-message-panel__text sib-form-message-panel__text--center">
                                                    <svg viewBox="0 0 512 512" class="sib-icon sib-notification__icon">
                                                        <path d="M256 40c118.621 0 216 96.075 216 216 0 119.291-96.61 216-216 216-119.244 0-216-96.562-216-216 0-119.203 96.602-216 216-216m0-32C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm-11.49 120h22.979c6.823 0 12.274 5.682 11.99 12.5l-7 168c-.268 6.428-5.556 11.5-11.99 11.5h-8.979c-6.433 0-11.722-5.073-11.99-11.5l-7-168c-.283-6.818 5.167-12.5 11.99-12.5zM256 340c-15.464 0-28 12.536-28 28s12.536 28 28 28 28-12.536 28-28-12.536-28-28-28z" />
                                                    </svg>
                                                    <span class="sib-form-message-panel__inner-text">
                                                        Your subscription could not be saved. Please try again.
                                                    </span>
                                                </div>
                                            </div>
                                            <div></div>
                                            <div id="success-message" class="sib-form-message-panel" style="font-size: .875rem; text-align:left; font-family:Helvetica, sans-serif; color:#085229; background-color:#e7faf0; border-radius:3px; border-color:#13ce66;max-width:350px;">
                                                <div class="sib-form-message-panel__text sib-form-message-panel__text--center">
                                                    <svg viewBox="0 0 512 512" class="sib-icon sib-notification__icon">
                                                        <path d="M256 8C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 464c-118.664 0-216-96.055-216-216 0-118.663 96.055-216 216-216 118.664 0 216 96.055 216 216 0 118.663-96.055 216-216 216zm141.63-274.961L217.15 376.071c-4.705 4.667-12.303 4.637-16.97-.068l-85.878-86.572c-4.667-4.705-4.637-12.303.068-16.97l8.52-8.451c4.705-4.667 12.303-4.637 16.97.068l68.976 69.533 163.441-162.13c4.705-4.667 12.303-4.637 16.97.068l8.451 8.52c4.668 4.705 4.637 12.303-.068 16.97z" />
                                                    </svg>
                                                    <span class="sib-form-message-panel__inner-text">
                                                        Your subscription has been successful.
                                                    </span>
                                                </div>
                                            </div>
                                            <div></div>
                                            <div class="sib-container--medium sib-container--vertical">
                                                <form id="sib-form" method="POST" action="https://a7e86912.sibforms.com/serve/MUIFALaiW_cgjZZq0ayhdtxbsif4BZea7eROckpMP551S5bkLy-2I8IjrPNDt9iO7KkberEPWYXFH79i9ipaTZMYts7_wxrpyk9LAlFe2NnAd8Hc-IR_6VJF-bykEiKkufCS8ayvk5SVTFoFZJP1Dum4HEbk_A2r13WFalmiAacIehqYNQ4cKT9i0JQt7IkMqNON1gA7GU_Pu7H2ZQ==" data-type="subscription">
                                                    <div>
                                                        <div class="sib-input sib-form-block" style="padding:0px;">
                                                            <div class="form__entry entry_block">
                                                                <div class="form__label-row ">
                                                                    

                                                                    <div class="entry__field" style="border:1px solid #000000 !important; border-radius:0px !important; background: none !important;">
                                                                        <input class="input " type="text" id="EMAIL" name="EMAIL" autocomplete="off" placeholder="Enter your email address" data-required="true" required />
                                                                    </div>
                                                                </div>

                                                                <label class="entry__error entry__error--primary" style="font-size: .875rem; text-align:left; font-family:Helvetica, sans-serif; color:#661d1d; background-color:#ffeded; border-radius:3px; border-color:#ff4949;">
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div style="padding: 8px 0;">
                                                        <div class="g-recaptcha" data-sitekey="6Lea_eYrAAAAABcNsOhAw6zRZ39JRmKK8JSSXLHg" data-callback="invisibleCaptchaCallback" data-size="invisible" onclick="executeCaptcha"></div>
                                                    </div>
                                                    <div style="padding: 8px 0;">
                                                        <div class="sib-form-block" style="text-align: left; padding: 0px !important;">
                                                            <button class="sib-form-block__button sib-form-block__button-with-loader" style="font-size: .875rem; text-align:left; font-weight:700; font-family:Helvetica, sans-serif; color:#4cbb17; background-color:#ffffff; border-width:0px;" form="sib-form" type="submit">
                                                                <svg class="icon clickable__icon progress-indicator__icon sib-hide-loader-icon" viewBox="0 0 512 512" style="">
                                                                    <path d="M460.116 373.846l-20.823-12.022c-5.541-3.199-7.54-10.159-4.663-15.874 30.137-59.886 28.343-131.652-5.386-189.946-33.641-58.394-94.896-95.833-161.827-99.676C261.028 55.961 256 50.751 256 44.352V20.309c0-6.904 5.808-12.337 12.703-11.982 83.556 4.306 160.163 50.864 202.11 123.677 42.063 72.696 44.079 162.316 6.031 236.832-3.14 6.148-10.75 8.461-16.728 5.01z" />
                                                                </svg>
                                                                JOIN THE PACK
                                                            </button>
                                                        </div>
                                                    </div>

                                                    <input type="text" name="email_address_check" value="" class="input--hidden">
                                                    <input type="hidden" name="locale" value="en">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END - We recommend to place the above code where you want the form in your website html  -->

                                    <!-- End Brevo Form -->

                                </div>
                            </div>
                            <div class="mt-8">
                                <p class="text-xs">Copyright &copy; 2025 - 2026 Southern Plains Sport Dog Club, LLC. All rights. reserved.<br />
                                    By using this site, you agree to our Terms of Service and Privacy Policy. For copyright, accessibility inquiries, or other policies, visit our Legal & Policies Hub, or contact us at <a href="mailto:southernplainssportsdogclub@gmail.com">southernplainssportsdogclub@gmail.com</a></p>
                            </div>



                        </div>
                    </div> <!-- END footer -->
                </div>


        </div> <!-- END Scrollable Column -->


        </main>
        </div>


    </body>

    </html>

    <!-- START - We recommend to place the below code in footer or bottom of your website html  -->
    <script>
        window.REQUIRED_CODE_ERROR_MESSAGE = 'Please choose a country code';
        window.LOCALE = 'en';
        window.EMAIL_INVALID_MESSAGE = window.SMS_INVALID_MESSAGE = "The information provided is invalid. Please review the field format and try again.";

        window.REQUIRED_ERROR_MESSAGE = "This field cannot be left blank. ";

        window.GENERIC_INVALID_MESSAGE = "The information provided is invalid. Please review the field format and try again.";




        window.translation = {
            common: {
                selectedList: '{quantity} list selected',
                selectedLists: '{quantity} lists selected',
                selectedOption: '{quantity} selected',
                selectedOptions: '{quantity} selected',
            }
        };

        var AUTOHIDE = Boolean(0);
    </script>

    <script defer src="https://sibforms.com/forms/end-form/build/main.js"></script>

    <script src="https://www.google.com/recaptcha/api.js?hl=en"></script>

    <!-- END - We recommend to place the above code in footer or bottom of your website html  -->