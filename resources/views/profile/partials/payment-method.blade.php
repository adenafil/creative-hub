<section>
    <header>
        <div class="flex items-center">
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 mr-2">
                {{ __('Payment Method') }}
            </h2>
            <svg data-popover-target="chart-info" data-popover-placement="bottom" class="w-3.5 h-3.5 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white cursor-pointer ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm0 16a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3Zm1-5.034V12a1 1 0 0 1-2 0v-1.418a1 1 0 0 1 1.038-.999 1.436 1.436 0 0 0 1.488-1.441 1.501 1.501 0 1 0-3-.116.986.986 0 0 1-1.037.961 1 1 0 0 1-.96-1.037A3.5 3.5 0 1 1 11 11.466Z"/>
            </svg>
            <div data-popover id="chart-info" role="tooltip" class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                <div class="p-3 space-y-2">
                    <h3 class="font-semibold text-gray-900 dark:text-white">Must Read!</h3>
                    <p>You can only add payment methods such as bank accounts and e-wallets, other than these 2 types of payment methods then it will not be able to be added. <br><br> Be sure to always check the details of each of your payment accounts to avoid errors, be it errors during transactions or user errors.</p>
                </div>
                <div data-popper-arrow></div>
            </div>
        </div>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400 max-w-xl">
            {{ __("Manage your payment method here, be sure to check the details of your payment information to avoid any errors during the transaction.") }}
        </p>
    </header>

    <form method="post" action="{{route('profile.payment.method.update')}}" class="mt-6 space-y-6">
        @csrf
        @method('patch')
        {{-- Available Payment Field --}}
        <div>
            <x-input-label for="payment-method" :value="__('Available Payment Method')" />
            <div id="payment-wrapper" class="payment-wrapper mt-4 flex gap-4 overflow-x-scroll no-scrollbar">

                <!-- Card Component 1 -->
                @foreach(auth()->user()->payment_methods as $payment_method)
                    <div class="payment-card w-64 py-6 bg-gradient-to-tl from-indigo-700 via-purple-600 to-purple-900 rounded-lg shadow-lg cursor-pointer">
                        <div class="flex justify-between items-center mx-4 py-">
                            <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <rect x="3" y="5" width="18" height="14" rx="3" />
                                <line x1="3" y1="10" x2="21" y2="10" />
                                <line x1="7" y1="15" x2="7.01" y2="15" />
                                <line x1="11" y1="15" x2="13" y2="15" />
                            </svg>
                            <p class="text-white text-sm font-bold">
                                {{$payment_method->payment_account_name}}
                            </p>
                        </div>
                        <div class="flex justify-center mt-4">
                            <h1 class="text-white font-thins">
                                {{$payment_method->payment_account_number}}
                            </h1>
                        </div>
                        <div class="flex flex-col justfiy-end mt-4 px-4 text-white">
                            <p class="text-gray-300 text-xs">On Behalf</p>
                            <h4 class="uppercase tracking-wider font-semibold text-xs">
                                {{$payment_method->payment_account_recipient_name}}
                            </h4>
                        </div>
                    </div>
                @endforeach


                <!-- Card Component 2 -->
{{--                <div class="payment-card w-64 py-6 bg-gradient-to-tl from-indigo-700 via-purple-600 to-purple-900 rounded-lg shadow-lg cursor-pointer">--}}
{{--                    <div class="flex justify-between items-center mx-4 py-">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">--}}
{{--                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />--}}
{{--                            <rect x="3" y="5" width="18" height="14" rx="3" />--}}
{{--                            <line x1="3" y1="10" x2="21" y2="10" />--}}
{{--                            <line x1="7" y1="15" x2="7.01" y2="15" />--}}
{{--                            <line x1="11" y1="15" x2="13" y2="15" />--}}
{{--                        </svg>--}}
{{--                        <p class="text-white text-sm font-bold">CIMB NIAGA</p>--}}
{{--                    </div>--}}
{{--                    <div class="flex justify-center mt-4">--}}
{{--                        <h1 class="text-white font-thins">--}}
{{--                            9669081284568929--}}
{{--                        </h1>--}}
{{--                    </div>--}}
{{--                    <div class="flex flex-col justfiy-end mt-4 px-4 text-white">--}}
{{--                        <p class="text-gray-300 text-xs">On Behalf</p>--}}
{{--                        <h4 class="uppercase tracking-wider font-semibold text-xs">--}}
{{--                            Admin Cuy--}}
{{--                        </h4>--}}
{{--                    </div>--}}
{{--                </div>--}}

            </div>
        </div>

        {{-- Payment Account Recipient Name --}}
        <div class="max-w-xl">
            <x-input-label for="recipient-name" :value="__('Payment Account Recipient Name')" />
            <x-text-input class="mt-1 block w-full"
                          placeholder="Jhon Doexxx"
                          id="recipient-name"
                          name="recipient-name"
                          type="text"  required autofocus autocomplete="recipient-name" />
            <x-input-error class="mt-2" :messages="$errors->get('recipient-name')" />
        </div>

        {{-- Payment Account Name --}}
        <div class="max-w-xl">
            <x-input-label for="payment-account-name" :value="__('Payment Account Name')" />
            <x-text-input class="mt-1 block w-full"
                          placeholder="Example: BRI, BTN, Dana, etc"
                          id="payment-account-name"
                          name="payment-account-name"
                          type="text"  required autofocus autocomplete="payment-account-name" />
            <x-input-error class="mt-2" :messages="$errors->get('payment-account-name')" />
        </div>

        {{-- Payment Account Number --}}
        <div class="max-w-xl">
            <x-input-label for="payment-account-number" :value="__('Payment Account Number')" />
            <x-text-input class="mt-1 block w-full"
                          placeholder="Example: 0166010208xxxxx"
                          id="payment-account-number"
                          name="payment-account-number"
                          type="text"  required autofocus autocomplete="payment-account-number" />
            <x-input-error class="mt-2" :messages="$errors->get('payment-account-number')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Add Payment Method') }}</x-primary-button>

            @if (session('status') === 'payment-added')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
