 {{-- Newsletter Row --}}
 <div class="grid grid-cols-12 items-center bg-sp-prairieGreen">

     {{-- Newsletter Copy --}}
     <div class="col-span-12 px-8 pt-8 md:col-span-3 md:py-0 md:pl-8 md:pr-0">

         <p class="text-eyebrow-light">
             Newsletter
         </p>

         <h2 class="newsletter-signup">
             Stay In The Loop.
         </h2>

         <p class="text-sp-limestone text-sm">
             Get positive training tips, event updates, and
             early access to registration.
         </p>

     </div>


     {{-- Newsletter Form --}}
     <div class="col-span-12 px-8 py-6 md:col-span-5 md:py-0">

         <div class="newsletter-form">

             <div class="sib-form">

                 <div
                     id="sib-form-container"
                     class="sib-form-container">

                     {{-- Brevo Error Message --}}
                     <div
                         id="error-message"
                         class="sib-form-message-panel newsletter-message newsletter-message-error">

                         <div class="sib-form-message-panel__text sib-form-message-panel__text--center">

                             <svg
                                 viewBox="0 0 512 512"
                                 class="sib-icon sib-notification__icon"
                                 aria-hidden="true">

                                 <path d="M256 40c118.621 0 216 96.075 216 216 0 119.291-96.61 216-216 216-119.244 0-216-96.562-216-216 0-119.203 96.602-216 216-216m0-32C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm-11.49 120h22.979c6.823 0 12.274 5.682 11.99 12.5l-7 168c-.268 6.428-5.556 11.5-11.99 11.5h-8.979c-6.433 0-11.722-5.073-11.99-11.5l-7-168c-.283-6.818 5.167-12.5 11.99-12.5zM256 340c-15.464 0-28 12.536-28 28s12.536 28 28 28 28-12.536 28-28-12.536-28-28-28z" />

                             </svg>

                             <span class="sib-form-message-panel__inner-text">
                                 Your subscription could not be saved. Please try again.
                             </span>

                         </div>

                     </div>

                     <div></div>

                     {{-- Brevo Success Message --}}
                     <div
                         id="success-message"
                         class="sib-form-message-panel newsletter-message newsletter-message-success">

                         <div class="sib-form-message-panel__text sib-form-message-panel__text--center">

                             <svg
                                 viewBox="0 0 512 512"
                                 class="sib-icon sib-notification__icon"
                                 aria-hidden="true">

                                 <path d="M256 8C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 464c-118.664 0-216-96.055-216-216 0-118.663 96.055-216 216-216 118.664 0 216 96.055 216 216 0 118.663-96.055 216-216 216zm141.63-274.961L217.15 376.071c-4.705 4.667-12.303 4.637-16.97-.068l-85.878-86.572c-4.667-4.705-4.637-12.303.068-16.97l8.52-8.451c4.705-4.667 12.303-4.637 16.97.068l68.976 69.533 163.441-162.13c4.705-4.667 12.303-4.637 16.97.068l8.451 8.52c4.668 4.705 4.637 12.303-.068 16.97z" />

                             </svg>

                             <span class="sib-form-message-panel__inner-text">
                                 Your subscription has been successful.
                             </span>

                         </div>

                     </div>

                     <div></div>

                     {{-- Brevo Form Container --}}
                     <div
                         id="sib-container"
                         class="sib-container--large sib-container--vertical">

                         <form
                             id="sib-form"
                             method="POST"
                             action="https://a7e86912.sibforms.com/serve/MUIFAJWITnINuKdzydl8wxntokDKQVKmoUHp6mjSXu-RA6Bb88L0eC3bVYrdMY0zW1kGZqGqlwEWyA7JCHuFIo_cjP_HY-R_m_bKNOOJjPKwceUMbZ-IpDY7sf2PEMPmpuWw63T5NHlM2V_BfnrXfouKkOyXsrezGZTv7SsGbm_EXKzXWpeZrF4rJtCCHPwd2EgioW5olrsIk22X-A=="
                             data-type="subscription"
                             class="newsletter-form-inner">

                             <div class="sib-input sib-form-block newsletter-field">

                                 <div class="form__entry entry_block">

                                     <div class="form__label-row">

                                         <label
                                             class="sr-only entry__label"
                                             for="EMAIL"
                                             data-required="*">
                                             Enter your email address to subscribe
                                         </label>

                                         <div class="entry__field">

                                             <input
                                                 class="input newsletter-input"
                                                 type="email"
                                                 id="EMAIL"
                                                 name="EMAIL"
                                                 autocomplete="email"
                                                 placeholder="Email Address"
                                                 data-required="true"
                                                 required>

                                         </div>

                                     </div>

                                     <label
                                         class="entry__error entry__error--primary newsletter-field-error">
                                     </label>

                                 </div>

                             </div>


                             <div class="sib-form-block newsletter-submit">

                                 <button
                                     class="sib-form-block__button sib-form-block__button-with-loader btn-secondary"
                                     form="sib-form"
                                     type="submit">

                                     <svg
                                         class="icon clickable__icon progress-indicator__icon sib-hide-loader-icon"
                                         viewBox="0 0 512 512"
                                         aria-hidden="true">

                                         <path d="M460.116 373.846l-20.823-12.022c-5.541-3.199-7.54-10.159-4.663-15.874 30.137-59.886 28.343-131.652-5.386-189.946-33.641-58.394-94.896-95.833-161.827-99.676C261.028 55.961 256 50.751 256 44.352V20.309c0-6.904 5.808-12.337 12.703-11.982 83.556 4.306 160.163 50.864 202.11 123.677 42.063 72.696 44.079 162.316 6.031 236.832-3.14 6.148-10.75 8.461-16.728 5.01z" />

                                     </svg>

                                     Subscribe

                                 </button>

                             </div>


                             {{-- Brevo Honeypot --}}
                             <input
                                 type="text"
                                 name="email_address_check"
                                 value=""
                                 class="input--hidden">

                             {{-- Brevo Locale --}}
                             <input
                                 type="hidden"
                                 name="locale"
                                 value="en">

                         </form>

                     </div>

                 </div>

             </div>

         </div>

     </div>


     {{-- Newsletter Image --}}
     <div class="col-span-12 md:col-span-4">

         <img
             class="w-full h-48 object-cover md:h-full"
             src="{{ asset('images/headers/newsletter.png') }}"
             alt="A Sheltie and an English Bulldog running through Oklahoma wildflowers together.">


     </div>

 </div>