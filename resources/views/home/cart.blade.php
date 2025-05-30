@php use App\Helper\ImageHelper;use Illuminate\Support\Facades\URL;
 $i = 0;
@endphp
    <!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/logos/logo-singgle.svg" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
          rel="stylesheet"/>
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet"/>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/output.css'])
</head>
<style>
    .swiper-rtl .swiper-button-next:after {
        content: '' !important;
    }

    .swiper-button-prev:after, .swiper-rtl .swiper-button-next:after {
        content: '';
    }

    .swiper-button-next:after,
    .swiper-rtl .swiper-button-prev:after {
        content: '' !important;
    }

    .swiper-button-next svg,
    .swiper-button-prev svg {
        width: 24px !important;
        height: 24px !important;
    }

    .swiper-button-next,
    .swiper-button-prev {
        position: relative !important;
        margin-top: 32px;
        width: 64px;
    }

    .swiper-slide.swiper-slide-active {
        --tw-border-opacity: 1 !important;
        border-color: rgb(79 70 229 / var(--tw-border-opacity)) !important;
    }

    .swiper-slide.swiper-slide-active > .swiper-slide-active\:text-indigo-600 {
        --tw-text-opacity: 1;
        color: rgb(79 70 229 / var(--tw-text-opacity));
    }

    .swiper-slide.swiper-slide-active > .flex .grid .swiper-slide-active\:text-indigo-600 {
        --tw-text-opacity: 1;
        color: rgb(79 70 229 / var(--tw-text-opacity));
    }

    /*  Search Override  */
    #searchInput {
        background-color: transparent;
    }
</style>

<body class="bg-creativehub-black font-poppins text-white">

{{--Comment ini TOAST yang pake flowbite bang--}}

{{--<div id="toast-success"--}}
{{--     class="flex items-center w-full max-w-xs p-4 mt-4 mx-auto rounded-lg shadow text-gray-400 bg-gray-800"--}}
{{--     role="alert">--}}
{{--    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 rounded-lg bg-green-800 text-green-200">--}}
{{--        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"--}}
{{--             viewBox="0 0 20 20">--}}
{{--            <path--}}
{{--                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>--}}
{{--        </svg>--}}
{{--        <span class="sr-only">Check icon</span>--}}
{{--    </div>--}}
{{--    <div class="ms-3 text-sm font-normal">Lorem SUCCESS</div>--}}
{{--</div>--}}
{{--<div id="toast-error"--}}
{{--     class="flex items-center w-full max-w-xs p-4 mt-4 mx-auto rounded-lg shadow text-gray-400 bg-gray-800"--}}
{{--     role="alert">--}}
{{--    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 rounded-lg bg-red-800 text-red-200">--}}
{{--        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"--}}
{{--             viewBox="0 0 20 20">--}}
{{--            <path--}}
{{--                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>--}}
{{--        </svg>--}}
{{--        <span class="sr-only">Error icon</span>--}}
{{--    </div>--}}
{{--    <div class="ms-3 text-sm font-normal">Lorem ERROR</div>--}}
{{--</div>--}}
{{--<div id="toast-info"--}}
{{--     class="flex items-center w-full max-w-xs p-4 mt-4 mx-auto rounded-lg shadow text-gray-400 bg-gray-800"--}}
{{--     role="alert">--}}
{{--    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 rounded-lg bg-orange-700 text-orange-200">--}}
{{--        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"--}}
{{--             viewBox="0 0 20 20">--}}
{{--            <path--}}
{{--                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z"/>--}}
{{--        </svg>--}}
{{--        <span class="sr-only">Warning icon</span>--}}
{{--    </div>--}}
{{--    <div class="ms-3 text-sm font-normal">Lorem Warning/Info</div>--}}
{{--</div>--}}

{{-- INI END - Comment ini TOAST yang pake flowbite bang--}}

<form action="{{route('do.cart.index')}}" method="post" enctype="multipart/form-data">

    {{--<form id="checkout-form">--}}
    @csrf

    <nav class="bg-[#181818] fixed w-full z-20 bottom-0 start-0 border-b border-gray-600 drop-shadow-2xl border-t border-[#ffffff20] drop-shadow-[0_-19px_13px_#181818]">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <div class="flex items-center">
                <input id="default-checkbox-parent" name="select-all" type="checkbox" value="true"
                       class="w-4 h-4 rounded focus:ring-blue-600 ring-offset-gray-800 focus:ring-2 bg-gray-700 border-gray-600">
                <label for="default-checkbox-parent" class="ms-2 text-sm font-medium text-gray-300">Select All</label>
            </div>
            <div class="flex items-center gap-4 sm:gap-8">
                <div>
                    <h2 class="text-xs sm:text-sm">Total (<span>0</span> Product):
                        <span
                            class="ms-1 text-sm sm:text-xl font-bold from-[#B05CB0] to-[#FCB16B] bg-clip-text text-transparent bg-gradient-to-r">Rp </span>
                        <span
                            class="ms-1 text-sm sm:text-xl font-bold from-[#B05CB0] to-[#FCB16B] bg-clip-text text-transparent bg-gradient-to-r">0</span>
                    </h2>
                </div>
                <button type="submit"
                        class="bg-clip text-transparent bg-gradient-to-tr from-[#B05CB0] to-[#FCB16B] transition-all duration-1000 text-white px-6 py-3 rounded-[12px]  text-xs md:text-md lg:text-md font-semibold hover:from-[#FCB16B] hover:to-[#B05CB0] shadow-lg shadow-pink-500/50">
                    Checkout
                </button>
            </div>
        </div>
    </nav>

    <section id="cart-group" class="container max-w-[1200px] px-4 py-16 mx-auto mb-[102px] space-y-6 flex flex-col items-center">

        <a href="/" class="inline-flex max-w-fit justify-between items-center py-1 px-1 pe-4 text-sm rounded-full bg-[#181818] hover:bg-[#2A2A2A] border border-[#ffffff10] shadow-lg ">
            <span class="text-xs bg-clip text-transparent bg-gradient-to-tr from-[#B05CB0] to-[#FCB16B] transition-all duration-1000 text-white hover:from-[#FCB16B] hover:to-[#B05CB0] rounded-full text-white px-4 py-1.5 me-3 font-bold">Cart</span> <span class="text-sm">Browse more products maniez</span>
            <svg class="w-2.5 h-2.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
        </a>

        {{-- Store Group Items (You can loop here) --}}
        @foreach($carts as $i => $product)
            <!-- Use the custom loop counter -->
            {{--            Custom Counter: {{ $i }}--}}

            <div class="w-full border rounded-lg shadow bg-[#181818] border-[#ffffff20] seller-{{$product[0]->seller_id}}">
                <div
                    class="top-tabmenu flex items-center gap-8 ps-4 border-b rounded-t-lg border-[#ffffff10] text-gray-400 bg-[#181818]">
                    <div class="store-profile flex items-center gap-4">
                        <input id="default-checkbox-{{$i}}" name="default-checkbox-parent[]" type="checkbox"
                               value="{{$product[0]->seller_id}}"
                               class="w-4 h-4 rounded focus:ring-blue-600 ring-offset-gray-800 focus:ring-2 bg-gray-700 border-gray-600">
                        <div class="flex items-center gap-[6px]">
                            <div class="w-6 h-6 flex shrink-0 items-center justify-center rounded-full overflow-hidden">
                                <img src="
                                @if(isset($product[0]->user->user_detail->image_url))
                                {{
                            ImageHelper::isThisImage($product[0]->user->user_detail->image_url)
                        ? $product[0]->user->user_detail->image_url
                        : URL::signedRoute('profile.file', ['encoded' => ImageHelper::encodePath($product[0]->user->user_detail->image_url)])
}}
                              @else
                                                                  {{\Illuminate\Support\Facades\URL::to('/assets/photos/img.png')}}
                              @endif
                                "  class="w-full h-full object-cover" alt="logo">
                            </div>
                            <a href="#" class="font-semibold text-xs text-creativehub-grey">{{\App\Models\User::query()->where('id', $product[0]->seller_id)->first()->username}}</a>
                        </div>
                    </div>

                    <ul class="flex flex-wrap text-sm font-medium text-center text-gray-400 bg-[#181818]"
                        id="defaultTab-{{$i}}" data-tabs-toggle="#defaultTabContent-{{$i}}" role="tablist">
                        <li class="me-2">
                            <button id="products-tab-{{$i}}" data-tabs-target="#products-{{$i}}" type="button"
                                    role="tab" aria-controls="products-{{$i}}" aria-selected="true"
                                    class="inline-block p-4 bg-[#181818] hover:bg-gray-700 from-[#B05CB0] to-[#FCB16B] bg-clip-text text-transparent bg-gradient-to-r">Products
                            </button>
                        </li>
                        <li class="me-2">
                            <button id="proof-tab-{{$i}}" data-tabs-target="#proof-menu-{{$i}}" type="button" role="tab"
                                    aria-controls="proof-menu-{{$i}}" aria-selected="false"
                                    class="inline-block p-4 hover:bg-gray-700 hover:text-gray-300 from-[#B05CB0] to-[#FCB16B] bg-clip-text text-transparent bg-gradient-to-r">Proof
                            </button>
                        </li>
                    </ul>
                </div>

                <div id="defaultTabContent-{{$product[0]->seller_id}}">

                    <div class="hidden rounded-lg bg-[#181818] products-card-container" id="products-{{$i}}"
                         role="tabpanel" aria-labelledby="products-tab-{{$i}}">
                    {{--start index checking out--}}
{{--                        <input name="start-from" hidden="hidden" value="{{$loop->index}}"></input>--}}

                        @foreach($product as $value)
                            <div class="border-t p-4 shadow-sm border-[#ffffff10] md:p-6 product-{{$loop->index}}">
                                <input id="default-checkbox-{{$i}}" name="default-checkbox[]" type="checkbox"
                                       value="{{$value->id}}"
                                       class="w-4 h-4 rounded focus:ring-blue-600 ring-offset-gray-800 focus:ring-2 bg-gray-700 border-gray-600">
                                <div class="space-y-4 md:flex md:items-center md:justify-around md:gap-6 md:space-y-0">
                                    <a href="#" class="shrink-0 md:order-1">
                                        <img class="h-24 w-auto rounded-md" src="
                                                                                    {{
                        ImageHelper::isThisImage($value->image_product_url)
                        ? $value->image_product_url
                        : URL::signedRoute('file.view', ['encoded' => ImageHelper::encodePath($value->image_product_url)])
                        }}
                                        "
                                             alt="imac image"/>
                                    </a>

                                    <div class="flex items-center justify-between md:order-3 md:justify-end">
                                        <div class="text-end md:order-4 md:w-32">
                                            <p class="text-base font-bold text-white price-product">Rp {{number_format($value->price, 0, ',', '.')}}</p>
                                        </div>
                                    </div>

                                    <div class="w-full min-w-0 flex-1 space-y-4 md:order-2 md:max-w-md">
                                        <a href="#"
                                           class="text-base font-medium hover:underline text-white title-product">{{$value->title}}</a>
                                        <a href="#" class="flex items-center gap-2">
                                            <div class="w-5 h-5 rounded-full overflow-hidden flex shrink-0">
                                                <img src="../assets/logos/vekotora.svg" alt="icon">
                                            </div>
                                            <p class="font-light text-sm">{{$value->user->name}}</p>
                                        </a>

                                        <div class="flex items-center gap-4">

                                            <a href="" data-product-id="{{$value->id}}"
                                                    class="inline-flex items-center text-sm font-medium hover:underline text-red-500 delete-cart-products">
                                                <svg class="me-1.5 h-5 w-5" aria-hidden="true"
                                                     xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                          stroke-linejoin="round" stroke-width="2"
                                                          d="M6 18 17.94 6M18 18 6.06 6"/>
                                                </svg>
                                                <meta name="csrf-token" content="{{ csrf_token() }}">
                                                <p class="delete-product-id" hidden="hidden">{{$value->id}}</p>
                                                Remove
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class="hidden p-4 rounded-lg md:p-8 bg-[#181818]" id="proof-menu-{{$i}}" role="tabpanel"
                         aria-labelledby="proof-tab-{{$i}}">
                        <div
                            class="flex flex-col sm:flex-row p-[30px] gap-[60px] rounded-[20px] w-full h-fit border border-[#ffffff10]">

                            {{-- payment method --}}

                            <div class="w-full flex flex-col gap-4 payment-method-of-product">
                                <p class="font-semibold text-xl">Transfer to:</p>
                                <div class="flex flex-col gap-3">
                                    <div class="flex gap-3">
                                        <div
                                            class="flex items-center gap-1 p-[12px_20px] pl-4 w-full justify-between rounded-lg bg-[#121212] hover:ring-[1px] hover:ring-[#A0A0A0] focus:ring-[1px] focus:ring-[#A0A0A0] transition-all duration-300">
                                            <div class="flex flex-col">
                                                <label for="bank" class="text-xs text-creativehub-grey pl-1">Payment
                                                    Method</label>
                                                <input type="text" hidden="hidden" name="seller_id[]" value="{{$i}}">
                                                <select name="bank[]" id="bank-{{$i}}"
                                                        class="mt-1 font-semibold bg-transparent appearance-none border-none outline-none px-1 invalid:text-[#595959] invalid:font-normal invalid:text-sm"
                                                        required>

                                                    @if(\App\Models\PaymentMethod::query()->where('user_id', $i)->get() !== null)
                                                        @foreach(\App\Models\PaymentMethod::query()->where('user_id', $i)->get() as $payment_method)
                                                            <option
                                                                class="text-creativehub-black"
                                                                value="{{$payment_method->payment_account_name}}"
                                                                data-account-name="{{$payment_method->payment_account_recipient_name}}"
                                                                data-account-number="{{$payment_method->payment_account_number}}"
                                                            >{{$payment_method->payment_account_name}}</option>

                                                        @endforeach
                                                    @endif


                                                    {{--                                                    <option class="text-creativehub-black" value="Angga Bank">Dana</option>--}}
                                                    {{--                                                    <option class="text-creativehub-black" value="Angga Bank">OVO</option>--}}
                                                    {{--                                                    <option class="text-creativehub-black" value="Angga Bank">Gopay</option>--}}
                                                    {{--                                                    <option class="text-creativehub-black" value="Angga Bank">BTN</option>--}}
                                                </select>
                                            </div>
                                            <div class="w-6 h-6 flex shrink-0">
                                                <img src="{{URL::to('/')}}/assets/icons/bank.svg" alt="icon">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex">
                                        <div
                                            class="flex items-center gap-1 p-[12px_20px] pl-4 w-full justify-between rounded-lg bg-[#121212] hover:ring-[1px] hover:ring-[#A0A0A0] focus:ring-[1px] focus:ring-[#A0A0A0] transition-all duration-300">
                                            <div class="flex flex-col w-full">
                                                <label for="name" class="text-xs text-creativehub-grey pl-1">Account
                                                    Name</label>
                                                <div class="flex mt-1 items-center max-w-[149px]">
                                                    <input readonly type="text" name="name[]" value="{{\App\Models\PaymentMethod::query()->where('user_id', $i)->first()->payment_account_recipient_name ?? ""}}"
                                                           id="name-{{$i}}"
                                                           class="font-semibold bg-transparent appearance-none autofull-no-bg outline-none border-none px-1 placeholder:text-[#595959] placeholder:font-normal placeholder:text-sm w-full"
                                                           placeholder="Type here" required></input>
                                                </div>
                                            </div>
                                            <div class="w-6 h-6 flex shrink-0">
                                                <img src="{{URL::to('/')}}/assets/icons/user-square.svg" alt="icon">
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="flex items-center gap-1 p-[12px_20px] pl-4 justify-between rounded-lg bg-[#121212] hover:ring-[1px] hover:ring-[#A0A0A0] focus:ring-[1px] focus:ring-[#A0A0A0] transition-all duration-300">
                                        <div class="flex flex-col w-full">
                                            <label for="number" class="text-xs text-creativehub-grey pl-1">Account
                                                Number</label>
                                            <div class="flex mt-1 items-center max-w-[322px]">
                                                <input type="text" name="number[]" readonly id="number-{{$i}}"
                                                       class="mt-1 font-semibold bg-transparent appearance-none autofull-no-bg border-none outline-none px-1 placeholder:text-[#595959] placeholder:font-normal placeholder:text-sm w-full"
                                                       placeholder="Type here" value="{{\App\Models\PaymentMethod::query()->where('user_id', $i)->first()->payment_account_number ?? ""}}" pattern="[0-9 -]"
                                                       required></input>
                                            </div>
                                        </div>
                                        <div class="w-6 h-6 flex shrink-0">
                                            <img src="{{URL::to('/')}}/assets/icons/card.svg" alt="icon">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full flex flex-col gap-4">
                                <p class="font-semibold text-xl">Confirm Payment</p>
                                <div class="flex flex-col gap-3">
                                    <p class="text-xs text-[#2D68F8] p-[10px_22px] rounded-lg bg-[#2D68F805]">Please
                                        upload proof of
                                        payment we will confirm it as soon as possible</p>

                                    @error('proof')
                                    <p class="text-xs text-[#ffffff] p-[10px_22px] rounded-lg bg-[#BA0F30]">{{$message}}</p>
                                    @enderror

                                    <div class="flex gap-3">
                                        <button type="button"
                                                class="flex gap-2 shrink-0 w-2/3 h-[48px] p-[12px_18px] justify-center items-center border border-dashed border-[#595959] rounded-lg hover:bg-[#2A2A2A] transition-all duration-300"
                                                onclick="document.getElementById('proof-{{$i}}').click()
                                        ">
                                            <p>Choose File</p>
                                            <img src="{{URL::to('/')}}/assets/icons/document-upload.svg" alt="icon">
                                        </button>
                                        <input type="file" name="proof[]" id="proof-{{$i}}" class="hidden"
                                               onchange="previewFile()">
                                        <div class="relative rounded-lg overflow-hidden bg-[#121212] w-full h-[48px]">
                                            <div class="relative file-preview z-10 w-full h-full hidden">
                                                <img src="{{URL::to('/')}}/assets/icons/check.svg"
                                                     class="check-icon absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                                     alt="icon">
                                                <img src="" class="thumbnail-proof w-full h-full object-cover"
                                                     alt="thumbnail">
                                            </div>
                                            <img src="{{URL::to('/')}}/assets/icons/gallery.svg"
                                                 class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                                 alt="icon">
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                </div>
            </div>

        @endforeach

    </section>
</form>
@include('sweetalert::alert')


<script type="text/javascript">

    // change float to rp format
    function formatRupiah(number) {
        // Ubah angka menjadi string dan tambahkan pemisah ribuan menggunakan regex
        console.log("number " + number);
        return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    }

    // Fungsi untuk mengekstrak angka dari ID
    function extractNumberFromId(id) {
        const regex = /^default-checkbox-(\d+)$/;
        const match = id.match(regex);
        if (match) {
            return parseInt(match[1], 10);
        } else {
            return null;
        }
    }

    // conver price
    function convertRupiahToNumber(rupiah) {
        // Hapus 'Rp' dan spasi
        let numberString = rupiah.replace(/Rp\s?|,/g, '');

        // Ganti pemisah ribuan dengan kosong dan pemisah desimal dengan titik
        numberString = numberString.replace(/\./g, '').replace(/,/g, '.');

        // Konversi menjadi angka
        const number = parseFloat(numberString);

        return number;
    }


    console.log(convertRupiahToNumber(document.querySelector('.price-product').innerText ));
    document.addEventListener('DOMContentLoaded', function () {
        const checkboxSelectAll = document.querySelector('input[name="select-all"]');
        const checkboxTokoInput = document.querySelectorAll('input[name="default-checkbox-parent[]"]');
        const checkboxesDibawahTokoInput = document.querySelectorAll('input[name="default-checkbox[]"]');
        const totalCheckboxesDibawahTokoInput = checkboxesDibawahTokoInput.length;
        const button = document.querySelector('button');
        let counterTokoPerProduct = 0;
        let counterTokoInput = 0;

        checkboxSelectAll.addEventListener('change', (e) => {
            checkboxTokoInput.forEach(checkbox => {
                if (e.target.checked) {
                    checkbox.classList.add("check-out-satu-toko");
                    checkbox.disabled = true;
                } else {
                    checkbox.classList.remove('check-out-satu-toko');
                    checkbox.disabled = false;
                }
                checkbox.checked = e.target.checked;
            });
            checkboxesDibawahTokoInput.forEach(checkbox => {
                if (e.target.checked) {
                    checkbox.classList.add("check-out-per-product");
                    counterTokoPerProduct++;
                    checkbox.disabled = true;
                } else {
                    checkbox.classList.remove('check-out-per-product');
                    checkbox.disabled = false;
                }
                checkbox.checked = e.target.checked;

            });

            if (e.target.checked) {
                checkboxSelectAll.classList.add("check-out-semua");
                document.querySelector('span').innerText = counterTokoPerProduct;
                // logic price count
                let totalPrice = 0;
                document.querySelectorAll('.price-product').forEach(price => {
                    totalPrice += convertRupiahToNumber(price.innerText);
                });
                document.querySelectorAll('span')[2].innerText = formatRupiah(totalPrice);
            } else {
                checkboxSelectAll.classList.remove('check-out-semua');
                counterTokoInput = 0;
                counterTokoPerProduct = 0;
                document.querySelector('span').innerText = counterTokoPerProduct;
                document.querySelectorAll('span')[2].innerText = 0;
            }
        });

        checkboxTokoInput.forEach(checkbox => {

            checkbox.addEventListener('change', () => {
                const id = extractNumberFromId(checkbox.getAttribute('id'));
                const productsContainer = document.querySelector(`#defaultTabContent-${id}`).querySelector(`#products-${id}`).querySelectorAll('div.border-t');
                let isAllChecked = true;
                let isUlang = true;
                productsContainer.forEach(product => {
                    if (!product.checked && isUlang) {
                        isAllChecked = false;
                        isUlang = false;
                    }
                });
                if (!checkboxSelectAll.checked) {
                    let nodeMoneies = null;
                    if (checkbox.checked) {
                        // counterTokoPerProduct  = document.querySelector(`#defaultTabContent-${id}`).querySelector(`#products-${id}`).querySelectorAll('div.border-t input').length - counterTokoPerProduct;
                        const allBoxes = document.querySelector(`#defaultTabContent-${id}`).querySelector(`#products-${id}`).querySelectorAll(`div.border-t`);
                        console.log(allBoxes);
                        const filteredBoxes = Array.from(allBoxes).filter(element => !element.querySelector('input').classList.contains('check-out-per-product'));
                        filteredBoxes.forEach(box => {
                            counterTokoPerProduct++
                            console.log("naik toko bawah " + counterTokoPerProduct);
                            console.log(filteredBoxes);

                        })

                        // logic price
                        filteredBoxes.forEach(element => {
                                    // console.log(element.querySelector('.price-product'));
                                    const checkPrice = convertRupiahToNumber(element.querySelector('.price-product').innerText);
                                    const priceNav = convertRupiahToNumber(document.querySelectorAll('span')[2].innerText);
                                    document.querySelectorAll('span')[2].innerText = formatRupiah(priceNav + checkPrice);
                        });

                        checkbox.classList.add("check-out-satu-toko");
                        productsContainer.forEach(checkboxBawah => {
                            const input = checkboxBawah.querySelector('input');
                            input.checked = true;
                            input.classList.add("check-out-per-product");
                            input.disabled = true;
                        });
                        // price logic when checked
                        counterTokoInput++;
                        console.log("bawah length " + counterTokoPerProduct);
                        console.log("length " + document.querySelector(`#defaultTabContent-${id}`).querySelector(`#products-${id}`).querySelectorAll(`div.border-t input[disabled]`).length);

                        console.log("naik counterTokoInput" + counterTokoInput);
                        // logic count total
                        console.log(document.querySelector('span').innerText);
                        console.log(productsContainer.length);
                        document.querySelector('span').innerText = counterTokoPerProduct;
                    } else {

                        // price logic when unchecked
                        checkbox.parentElement.parentElement.parentElement.querySelectorAll('.price-product')
                            .forEach(price => {
                                const checkPrice = convertRupiahToNumber(price.innerText);
                                const priceNav = convertRupiahToNumber(document.querySelectorAll('span')[2].innerText);
                                document.querySelectorAll('span')[2].innerText = formatRupiah(priceNav - checkPrice);
                            })

                        checkbox.classList.remove('check-out-satu-toko');
                        productsContainer.forEach(checkboxBawah => {
                            const input = checkboxBawah.querySelector('input');
                            input.checked = false;
                            input.classList.remove("check-out-per-product");
                            input.disabled = false;
                        });
                        console.log(productsContainer[0]);
                        if (counterTokoInput <= productsContainer.length ) {
                            counterTokoInput--;
                            counterTokoPerProduct -= productsContainer.length;
                            console.log("turun counterTokoInput" + counterTokoInput);
                            document.querySelector('span').innerText = counterTokoPerProduct;
                        }
                    }
                }


                if (counterTokoInput === checkboxTokoInput.length) {
                    checkboxSelectAll.checked = true;
                    checkboxSelectAll.classList.add("check-out-semua");
                    checkboxTokoInput.forEach(activeBox => {
                        activeBox.disabled = true;
                    })
                    counterTokoInput = 0;
                    counterTokoPerProduct = 0;
                    console.log("dua dua jadi kosong");
                }

                if (isAllChecked) {
                    counterTokoPerProduct = productsContainer.length;
                    counterTokoInput =  counterTokoInput - productsContainer.length;
                    counterTokoPerProduct = productsContainer.length - counterTokoPerProduct;

                }
            });

        });


        checkboxesDibawahTokoInput.forEach(checkbox => {
            checkbox.addEventListener('change', (e) => {

                const id = extractNumberFromId(checkbox.getAttribute('id'));
                if (!checkboxSelectAll.checked) {
                    if (counterTokoPerProduct === checkboxesDibawahTokoInput.length) {
                        counterTokoPerProduct = 0;
                        console.log("jadi kosong => " + counterTokoPerProduct);
                    }
                    if (e.target.checked) {
                        checkbox.classList.add("check-out-per-product");
                        const price = convertRupiahToNumber(document.querySelectorAll('span')[2].innerText);
                        const checkPrice = convertRupiahToNumber(checkbox.parentElement.querySelector('.price-product').innerText);
                        document.querySelectorAll('span')[2].innerText = formatRupiah(price + checkPrice);
                        counterTokoPerProduct++;
                        document.querySelector('span').innerText = counterTokoPerProduct;
                    } else {
                        const price = convertRupiahToNumber(document.querySelectorAll('span')[2].innerText);
                        const checkPrice = convertRupiahToNumber(checkbox.parentElement.querySelector('.price-product').innerText);
                        document.querySelectorAll('span')[2].innerText = formatRupiah(price - checkPrice);
                        checkbox.classList.remove('check-out-per-product');
                        counterTokoPerProduct--;
                        document.querySelector('span').innerText = counterTokoPerProduct;

                    }

                    const total = document.querySelectorAll(`#default-checkbox-${id}`).length - 1;
                    const checkboxes = document.querySelectorAll(`#default-checkbox-${id}.check-out-per-product`);

                    if (checkboxes.length === total) {
                        const parentCheckbox = document.querySelector(`#default-checkbox-${id}`);
                        console.log("parent checkbox " + parentCheckbox);
                        parentCheckbox.checked = true;
                        parentCheckbox.classList.add("check-out-satu-toko");
                        parentCheckbox.disaabled = true;
                        checkboxes.forEach(activeBox => {
                            activeBox.disabled = true;
                        });
                        counterTokoInput++;
                    }

                    // logic checkout semua
                    console.log("counterTokoPerProduct " + counterTokoPerProduct);
                    if (counterTokoPerProduct === totalCheckboxesDibawahTokoInput) {
                        checkboxSelectAll.checked = true;
                        const parentCheckBox = document.querySelectorAll('.check-out-satu-toko');

                        checkboxSelectAll.classList.add("check-out-semua");
                        parentCheckBox.forEach(activeBox => {
                            activeBox.disabled = true;
                        })
                    }
                }


            });
        });

        document.querySelector('form').addEventListener('submit', (e) => {
            document.querySelectorAll('input').forEach(input => {
                input.removeAttribute('disabled')

                // remove file that selected
                // input.disabled = true;
            });
        })

    });


    function previewFile() {
        var previews = document.querySelectorAll('.file-preview');
        var fileInputs = document.querySelectorAll('input[type=file]');

        for (let i = 0; i < fileInputs.length; i++) {
            let reader = new FileReader();

            reader.onloadend = function () {
                var preview = previews[i];
                var img = preview.querySelector('.thumbnail-proof');
                img.src = reader.result;
                preview.classList.remove('hidden');
            }

            if (fileInputs[i].files[0]) {
                reader.readAsDataURL(fileInputs[i].files[0]);
            } else {
                previews[i].classList.add('hidden');
            }
        }
    }

    document.querySelectorAll('select').forEach((payment, index) => {
        payment.addEventListener('change', function () {
            var selectedOption = this.options[this.selectedIndex];
            var accountName = selectedOption.getAttribute('data-account-name');
            var accountNumber = selectedOption.getAttribute('data-account-number');

            document.querySelectorAll('.payment-method-of-product input[name="number[]"]')[index].value = accountNumber;
            document.querySelectorAll('.payment-method-of-product input[name="name[]"]')[index].value = accountName;
        })
    });

    document.querySelectorAll('select').forEach(e => {
        e.dispatchEvent(new Event('change'));
    });

    // document.getElementById('bank').addEventListener('change', function () {
    //     var selectedOption = this.options[this.selectedIndex];
    //     var accountName = selectedOption.getAttribute('data-account-name');
    //     var accountNumber = selectedOption.getAttribute('data-account-number');
    //
    //     document.getElementById('name').value = accountName;
    //     document.getElementById('number').value = accountNumber;
    // });


    // Trigger change event on page load to populate initial values
    // document.getElementById('bank').dispatchEvent(new Event('change'));


</script>

<!-- Flowbite Plugins -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<!-- Flickity -->
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
<!-- Swiper.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<!-- Main.js Script -->
@vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/output.css'])

</body>
</html>
