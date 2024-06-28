@php use App\Helper\ImageHelper;use Illuminate\Support\Facades\URL; @endphp
    <!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('/css/output.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
          rel="stylesheet"/>
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet"/>
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
</style>

<body class="bg-creativehub-black font-poppins text-white">

<!-- Navbar -->
<nav id="navbar" class="w-full fixed top-0 bg-[#00000048] backdrop-blur-lg z-50">
    <div class="flex flex-wrap items-center justify-between max-w-screen-xl mx-auto p-4">
        <a href="{{route('home')}}" class="flex items-center space-x-2 rtl:space-x-reverse">
            <img src="{{URL::to('/')}}/assets/logos/logo-singgle.svg" class="h-6" alt="CreativeHub Logo">
            <span
                class="self-center sm:text-xl md:text-2xl font-semibold whitespace-nowrap text-white">CreativeHub</span>
        </a>
        <div class="flex items-center md:order-2 space-x-3 md:space-x-2 rtl:space-x-reverse md:gap-2">
            <a href="{{route('cart.index')}}"
               class="flex gap-1.5 items-center border-creativehub-grey border rounded-md px-3 py-2 bg-transparent bg-clip bg-gradient-to-tr hover:from-[#FCB16B] hover:to-[#B05CB0] shadow-lg hover:shadow-pink-400/50 transition-all duration-500">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
                    <path fill-rule="evenodd"
                          d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 0 0 4.25 22.5h15.5a1.875 1.875 0 0 0 1.865-2.071l-1.263-12a1.875 1.875 0 0 0-1.865-1.679H16.5V6a4.5 4.5 0 1 0-9 0ZM12 3a3 3 0 0 0-3 3v.75h6V6a3 3 0 0 0-3-3Zm-3 8.25a3 3 0 1 0 6 0v-.75a.75.75 0 0 1 1.5 0v.75a4.5 4.5 0 1 1-9 0v-.75a.75.75 0 0 1 1.5 0v.75Z"
                          clip-rule="evenodd"/>
                </svg>
                <span class="text-sm">9</span>
            </a>
            <!-- State profile ini muncul ketika user sudah login -->

            @if(auth()->check())
                <a href="{{route('dashboard')}}" class="w-9 border border-solid border-white rounded-md">
                    <img src="
                                                @if(isset(auth()->user()->user_detail->image_url))
                                    {{
                                        ImageHelper::isThisImage(auth()->user()->user_detail->image_url)
                                        ? auth()->user()->user_detail->image_url
                                        : URL::signedRoute('profile.file', ['encoded' => ImageHelper::encodePath(auth()->user()->user_detail->image_url)])
                                    }}
                                @else
                                    {{\Illuminate\Support\Facades\URL::to('/assets/photos/img.png')}}
                                @endif

                " alt="dashboard" class="object-cover rounded-md w-full">
                </a>
            @endif

            <button data-collapse-toggle="mega-menu-icons" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 border-creativehub-grey border"
                    aria-controls="mega-menu-icons" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>
        </div>
        <div id="mega-menu-icons" class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1">
            <ul class="flex flex-col mt-4 font-medium md:flex-row md:mt-0 md:space-x-8 rtl:space-x-reverse">
                <li>
                    <a href="{{route('home')}}"
                       class="block py-2 px-3 font-bold from-[#B05CB0] to-[#FCB16B] bg-clip-text text-transparent bg-gradient-to-r border-b border-creativehub-dark-grey  md:border-0 md:p-0"
                       aria-current="page">Home</a>
                </li>
                <li>
                    <button id="mega-menu-icons-dropdown-button" data-dropdown-toggle="mega-menu-icons-dropdown"
                            class="flex items-center justify-between w-full py-2 px-3 font-medium text-gray-50 border-b border-creativehub-dark-grey md:w-auto md:border-0 hover:from-[#B05CB0] hover:to-[#FCB16B] hover:bg-clip-text hover:text-transparent hover:bg-gradient-to-r md:p-0">
                        Categories
                        <svg class="w-2.5 h-2.5 ms-3 hover:text-pink-400 text-white" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>
                    <div id="mega-menu-icons-dropdown"
                         class="absolute z-10 grid hidden w-auto grid-cols-2 text-sm bg-[#1C1C1C] border border-creativehub-dark-grey rounded-lg shadow-md gap-4">
                        <div class="p-4 pb-4">
                            <ul class="space-y-4" aria-labelledby="mega-menu-icons-dropdown-button">
                                <li>
                                    <a href="#" class="flex items-center text-white hover:text-pink-400 group">
                                        <span class="sr-only">All Products</span>
                                        <img
                                            src="https://raw.githubusercontent.com/fe-husni/creativehub-main/main/assets/icons/cart.svg"
                                            alt="All Products" class="w-7 h-7 me-2">
                                        All Products
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center text-white hover:text-pink-400 group">
                                        <span class="sr-only">Icons</span>
                                        <img
                                            src="https://raw.githubusercontent.com/fe-husni/creativehub-main/main/assets/icons/hat.svg"
                                            alt="All Products" class="w-7 h-7 me-2">
                                        Icons
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center text-white hover:text-pink-400 group">
                                        <span class="sr-only">Templates</span>
                                        <img
                                            src="https://raw.githubusercontent.com/fe-husni/creativehub-main/main/assets/icons/laptop.svg"
                                            alt="All Products" class="w-7 h-7 me-2">
                                        Templates
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="p-4 pb-4 text-gray-900 md:pb-4 dark:text-white">
                            <ul class="space-y-4">
                                <li>
                                    <a href="#" class="flex items-center text-white hover:text-pink-400 group">
                                        <span class="sr-only">Fonts</span>
                                        <img
                                            src="https://raw.githubusercontent.com/fe-husni/creativehub-main/main/assets/icons/pen.svg"
                                            alt="All Products" class="w-7 h-7 me-2">
                                        Fonts
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center text-white hover:text-pink-400 group">
                                        <span class="sr-only">E-Books</span>
                                        <img
                                            src="https://raw.githubusercontent.com/fe-husni/creativehub-main/main/assets/icons/book.svg"
                                            alt="All Products" class="w-7 h-7 me-2">
                                        E-Books
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center text-white hover:text-pink-400 group">
                                        <span class="sr-only">UI Kits</span>
                                        <img
                                            src="https://raw.githubusercontent.com/fe-husni/creativehub-main/main/assets/icons/check-3d.svg"
                                            alt="All Products" class="w-7 h-7 me-2">
                                        UI Kits
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </li>
                <li>
                    <a href="#"
                       class="block py-2 px-3 font-medium text-gray-50 border-b border-creativehub-dark-grey md:w-auto md:border-0 hover:from-[#B05CB0] hover:to-[#FCB16B] hover:bg-clip-text hover:text-transparent hover:bg-gradient-to-r md:p-0">About</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Checkout Section -->
<section id="checkout" class="container max-w-[1200px] px-4 mx-auto my-32 flex flex-col gap-8 w-full">
    <div class="items-center gap-4 grid grid-cols-1 md:grid-cols-2">
        <div
            class="product-info flex flex-col gap-4 w-full h-fit bg-creativehub-dark-footer p-[40px_24px] sm:p-[36px_64px] rounded-[20px] ">
            <h1 class="font-semibold text-2xl sm:text-[32px] ">Checkout Product</h1>
            <div class="product-detail flex flex-col gap-3">
                <div class="thumbnail w-fit h-auto flex shrink-0 rounded-[20px] overflow-hidden">
                    <img src="
                                    {{
                                        ImageHelper::isThisImage($product->image_product_url)
                                        ? $product->image_product_url
                                        : URL::signedRoute('file.view', ['encoded' => ImageHelper::encodePath($product->image_product_url)])
                                    }}

                    " class="w-full h-full object-cover"
                         alt="thumbnail">
                </div>
                <div class="product-title flex flex-col gap-[30px]">
                    <div class="flex flex-col gap-3">
                        <p class="font-semibold">{{$product->title ?? ""}}
                        </p>
                        <p
                            class="bg-[#2A2A2A] font-semibold text-xs text-creativehub-grey rounded-[4px] p-[4px_6px] w-fit">
                            {{$product->category->name ?? ""}}</p>
                    </div>
                    <div class="flex justify-between items-center flex-wrap gap-y-3">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-full flex shrink-0 overflow-hidden">
                                <img src="
                                @if(isset($product->user->user_detail->image_url))
                                    {{
                                        ImageHelper::isThisImage($product->user->user_detail->image_url)
                                        ? $product->user->user_detail->image_url
                                        : URL::signedRoute('profile.file', ['encoded' => ImageHelper::encodePath($product->user->user_detail->image_url)])
                                    }}
                                @else
                                    {{\Illuminate\Support\Facades\URL::to('/assets/photos/img.png')}}
                                @endif
                                " alt="logo">
                            </div>
                            <p class="font-semibold text-creativehub-grey">{{$product->user->name ?? ""}}</p>
                        </div>
                        <p
                            class="font-semibold text-2xl sm:text-4xl bg-clip-text text-transparent bg-gradient-to-r from-[#B05CB0] to-[#FCB16B]">
                            Rp {{number_format($product->price ?? 0, 0, ',', '.')}}</p>
                    </div>
                </div>
            </div>
        </div>

        <form
            class="flex flex-col p-[30px] gap-[60px] rounded-[20px] w-full h-fit border-2 border-creativehub-darker-grey" method="post" action="{{route('do.checkout', ['id' => $product->id])}}" enctype="multipart/form-data">
            @csrf
            <div class="w-full flex flex-col gap-4">
                <p class="font-semibold text-xl">Transfer to:</p>
                <div class="flex flex-col gap-3">
                    <div class="flex gap-3">
                        <div
                            class="flex items-center gap-1 p-[12px_20px] pl-4 w-full justify-between rounded-lg bg-[#181818] hover:ring-[1px] hover:ring-[#A0A0A0] focus:ring-[1px] focus:ring-[#A0A0A0] transition-all duration-300">
                            <div class="flex flex-col">
                                <label for="bank" class="text-xs text-creativehub-grey pl-1">Payment Method</label>
                                <select name="bank" id="bank"
                                        class="mt-1 font-semibold bg-transparent appearance-none border-none outline-none px-1 invalid:text-[#595959] invalid:font-normal invalid:text-sm"
                                        required>

                                    @if(isset($product->user->payment_methods))
                                        @foreach($product->user->payment_methods as $payment_method)
                                            <option
                                                class="text-creativehub-black" value="{{$payment_method->payment_account_name}}"
                                                data-account-name ="{{$payment_method->payment_account_recipient_name}}"
                                                data-account-number ="{{$payment_method->payment_account_number}}"
                                            >{{$payment_method->payment_account_name}}</option>

                                        @endforeach
                                    @endif

{{--                                    <option class="text-creativehub-black" value="Angga Bank">Dana</option>--}}
{{--                                    <option class="text-creativehub-black" value="Angga Bank">OVO</option>--}}
{{--                                    <option class="text-creativehub-black" value="Angga Bank">Gopay</option>--}}
{{--                                    <option class="text-creativehub-black" value="Angga Bank">BTN</option>--}}
                                </select>
                            </div>
                            <div class="w-6 h-6 flex shrink-0">
                                <img src="{{URL::to('/')}}/assets/icons/bank.svg" alt="icon">
                            </div>
                        </div>
                    </div>
                    <div class="flex">
                        <div
                            class="flex items-center gap-1 p-[12px_20px] pl-4 w-full justify-between rounded-lg bg-[#181818] hover:ring-[1px] hover:ring-[#A0A0A0] focus:ring-[1px] focus:ring-[#A0A0A0] transition-all duration-300">
                            <div class="flex flex-col w-full">
                                <label for="name" class="text-xs text-creativehub-grey pl-1">Account Name</label>
                                <div class="flex mt-1 items-center max-w-[149px]">
                                    <input readonly type="text" name="name" value="{{$product->user->payment_methods[0]->payment_account_recipient_name ?? ""}}" id="name"
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
                        class="flex items-center gap-1 p-[12px_20px] pl-4 justify-between rounded-lg bg-[#181818] hover:ring-[1px] hover:ring-[#A0A0A0] focus:ring-[1px] focus:ring-[#A0A0A0] transition-all duration-300">
                        <div class="flex flex-col w-full">
                            <label for="number" class="text-xs text-creativehub-grey pl-1">Account Number</label>
                            <div class="flex mt-1 items-center max-w-[322px]">
                                <input type="tel" name="number" readonly id="number"
                                       class="mt-1 font-semibold bg-transparent appearance-none autofull-no-bg border-none outline-none px-1 placeholder:text-[#595959] placeholder:font-normal placeholder:text-sm w-full"
                                       placeholder="Type here" value="{{$product->user->payment_methods[0]->payment_account_number ?? ""}}" pattern="[0-9 -]" required></input>
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
                    <p class="text-xs text-[#2D68F8] p-[10px_22px] rounded-lg bg-[#2D68F805]">Please upload proof of
                        payment we will confirm it as soon as possible</p>

                    @error('proof')
                    <p class="text-xs text-[#ffffff] p-[10px_22px] rounded-lg bg-[#BA0F30]">{{$message}}</p>
                    @enderror

                    <div class="flex gap-3">
                        <button type="button"

                                class="flex gap-2 shrink-0 w-2/3 h-[48px] p-[12px_18px] justify-center items-center border border-dashed border-[#595959] rounded-lg hover:bg-[#2A2A2A] transition-all duration-300"
                                onclick="document.getElementById('proof').click()">
                            <p>Choose File</p>
                            <img src="{{URL::to('/')}}/assets/icons/document-upload.svg" alt="icon">
                        </button>

                        <input type="file" name="proof" id="proof" class="hidden" onchange="previewFile()">
                        <div class="relative rounded-lg overflow-hidden bg-[#181818] w-full h-[48px]">
                            <div class="relative file-preview z-10 w-full h-full hidden">
                                <img src="{{URL::to('/')}}/assets/icons/check.svg"
                                     class="check-icon absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                     alt="icon">
                                <img src="" class="thumbnail-proof w-full h-full object-cover" alt="thumbnail">
                            </div>
                            <img src="{{URL::to('/')}}/assets/icons/gallery.svg"
                                 class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                 alt="icon">
                        </div>
                    </div>
                </div>




            @if(isset($product->id))
                    <button type="submit"
                       class="rounded-full text-center bg-[#2D68F8] p-[8px_18px] font-semibold hover:bg-[#083297] active:bg-[#062162] transition-all duration-300">Checkout
                        Now</button>
                @else
                    <a href="#"
                       class="rounded-full text-center bg-[#2D68F8] p-[8px_18px] font-semibold hover:bg-[#083297] active:bg-[#062162] transition-all duration-300">Checkout
                        Now</a>
                @endif
            </div>
        </form>
    </div>
</section>



<!-- Footer -->
<footer class="bg-[#181818]">
    <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
        <div class="md:flex md:justify-between">
            <div class="mb-6 md:mb-0">
                <a href="{{route('home')}}" class="flex items-center">
                    <img src="{{URL::to('/')}}/assets/logos/logo-singgle.svg" class="h-8 me-3" alt="FlowBite Logo"/>
                    <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">CreativeHub</span>
                </a>
            </div>
            <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-4 md:grid-cols-3 lg:grid-cols-4">
                <div class="w-fit px-3">
                    <h2 class="mb-6 text-sm font-semibold uppercase text-white">Browse</h2>
                    <ul class="text-gray-500 dark:text-gray-400 font-normal">
                        <li class="mb-2">
                            <a href="" class="hover:underline">All Products</a>
                        </li>
                        <li class="mb-2">
                            <a href="" class="hover:underline">Templates</a>
                        </li>
                        <li class="mb-2">
                            <a href="" class="hover:underline">E-Books</a>
                        </li>
                        <li class="mb-2">
                            <a href="" class="hover:underline">Icons</a>
                        </li>
                        <li class="mb-2">
                            <a href="" class="hover:underline">Fonts</a>
                        </li>
                        <li class="mb-2">
                            <a href="" class="hover:underline">UI Kits</a>
                        </li>
                    </ul>
                </div>
                <div class="w-fit px-3">
                    <h2 class="mb-6 text-sm font-semibold uppercase text-white">Platform</h2>
                    <ul class="text-gray-500 dark:text-gray-400 font-normal">
                        <li class="mb-2">
                            <a href="" class="hover:underline ">All-access pass</a>
                        </li>
                        <li class="mb-2">
                            <a href="" class="hover:underline">Become an author</a>
                        </li>
                        <li class="mb-2">
                            <a href="" class="hover:underline">Affiliate program</a>
                        </li>
                        <li class="mb-2">
                            <a href="" class="hover:underline">Terms & Licensing</a>
                        </li>
                    </ul>
                </div>
                <div class="w-fit px-3">
                    <h2 class="mb-6 text-sm font-semibold uppercase text-white">Customer Service</h2>
                    <ul class="text-gray-500 dark:text-gray-400 font-normal">
                        <li class="mb-2">
                            <a href="#" class="hover:underline">FAQ</a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="hover:underline">Orders</a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="hover:underline">Payments</a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="hover:underline">Refunds</a>
                        </li>
                    </ul>
                </div>
                <div class="w-fit px-3">
                    <h2 class="mb-6 text-sm font-semibold uppercase text-white">Contact Us</h2>
                    <ul class="text-gray-500 dark:text-gray-400 font-normal">
                        <li class="mb-2">
                            <a href="#" class="hover:underline">About us</a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="hover:underline">Company</a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="hover:underline">Careers</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8"/>
        <div class="sm:flex sm:items-center sm:justify-between">
			<span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 <a href=""
                                                                                            class="hover:underline">CreativeHub™</a> - Made With 💜 Husni Mubarok.
			</span>
            <div class="flex mt-4 sm:justify-center sm:mt-0">
                <a href="#" class="text-gray-500 hover:text-white">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                         viewBox="0 0 8 19">
                        <path fill-rule="evenodd"
                              d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z"
                              clip-rule="evenodd"/>
                    </svg>
                    <span class="sr-only">Facebook page</span>
                </a>
                <a href="#" class="text-gray-500 hover:text-white ms-5">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                         viewBox="0 0 21 16">
                        <path
                            d="M16.942 1.556a16.3 16.3 0 0 0-4.126-1.3 12.04 12.04 0 0 0-.529 1.1 15.175 15.175 0 0 0-4.573 0 11.585 11.585 0 0 0-.535-1.1 16.274 16.274 0 0 0-4.129 1.3A17.392 17.392 0 0 0 .182 13.218a15.785 15.785 0 0 0 4.963 2.521c.41-.564.773-1.16 1.084-1.785a10.63 10.63 0 0 1-1.706-.83c.143-.106.283-.217.418-.33a11.664 11.664 0 0 0 10.118 0c.137.113.277.224.418.33-.544.328-1.116.606-1.71.832a12.52 12.52 0 0 0 1.084 1.785 16.46 16.46 0 0 0 5.064-2.595 17.286 17.286 0 0 0-2.973-11.59ZM6.678 10.813a1.941 1.941 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.919 1.919 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Zm6.644 0a1.94 1.94 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.918 1.918 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Z"/>
                    </svg>
                    <span class="sr-only">Discord community</span>
                </a>
                <a href="#" class="text-gray-500 hover:text-white ms-5">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                         viewBox="0 0 20 17">
                        <path fill-rule="evenodd"
                              d="M20 1.892a8.178 8.178 0 0 1-2.355.635 4.074 4.074 0 0 0 1.8-2.235 8.344 8.344 0 0 1-2.605.98A4.13 4.13 0 0 0 13.85 0a4.068 4.068 0 0 0-4.1 4.038 4 4 0 0 0 .105.919A11.705 11.705 0 0 1 1.4.734a4.006 4.006 0 0 0 1.268 5.392 4.165 4.165 0 0 1-1.859-.5v.05A4.057 4.057 0 0 0 4.1 9.635a4.19 4.19 0 0 1-1.856.07 4.108 4.108 0 0 0 3.831 2.807A8.36 8.36 0 0 1 0 14.184 11.732 11.732 0 0 0 6.291 16 11.502 11.502 0 0 0 17.964 4.5c0-.177 0-.35-.012-.523A8.143 8.143 0 0 0 20 1.892Z"
                              clip-rule="evenodd"/>
                    </svg>
                    <span class="sr-only">Twitter page</span>
                </a>
                <a href="#" class="text-gray-500 hover:text-white ms-5">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                         viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                              d="M10 .333A9.911 9.911 0 0 0 6.866 19.65c.5.092.678-.215.678-.477 0-.237-.01-1.017-.014-1.845-2.757.6-3.338-1.169-3.338-1.169a2.627 2.627 0 0 0-1.1-1.451c-.9-.615.07-.6.07-.6a2.084 2.084 0 0 1 1.518 1.021 2.11 2.11 0 0 0 2.884.823c.044-.503.268-.973.63-1.325-2.2-.25-4.516-1.1-4.516-4.9A3.832 3.832 0 0 1 4.7 7.068a3.56 3.56 0 0 1 .095-2.623s.832-.266 2.726 1.016a9.409 9.409 0 0 1 4.962 0c1.89-1.282 2.717-1.016 2.717-1.016.366.83.402 1.768.1 2.623a3.827 3.827 0 0 1 1.02 2.659c0 3.807-2.319 4.644-4.525 4.889a2.366 2.366 0 0 1 .673 1.834c0 1.326-.012 2.394-.012 2.72 0 .263.18.572.681.475A9.911 9.911 0 0 0 10 .333Z"
                              clip-rule="evenodd"/>
                    </svg>
                    <span class="sr-only">GitHub account</span>
                </a>
                <a href="#" class="text-gray-500 hover:text-white ms-5">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                         viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                              d="M10 0a10 10 0 1 0 10 10A10.009 10.009 0 0 0 10 0Zm6.613 4.614a8.523 8.523 0 0 1 1.93 5.32 20.094 20.094 0 0 0-5.949-.274c-.059-.149-.122-.292-.184-.441a23.879 23.879 0 0 0-.566-1.239 11.41 11.41 0 0 0 4.769-3.366ZM8 1.707a8.821 8.821 0 0 1 2-.238 8.5 8.5 0 0 1 5.664 2.152 9.608 9.608 0 0 1-4.476 3.087A45.758 45.758 0 0 0 8 1.707ZM1.642 8.262a8.57 8.57 0 0 1 4.73-5.981A53.998 53.998 0 0 1 9.54 7.222a32.078 32.078 0 0 1-7.9 1.04h.002Zm2.01 7.46a8.51 8.51 0 0 1-2.2-5.707v-.262a31.64 31.64 0 0 0 8.777-1.219c.243.477.477.964.692 1.449-.114.032-.227.067-.336.1a13.569 13.569 0 0 0-6.942 5.636l.009.003ZM10 18.556a8.508 8.508 0 0 1-5.243-1.8 11.717 11.717 0 0 1 6.7-5.332.509.509 0 0 1 .055-.02 35.65 35.65 0 0 1 1.819 6.476 8.476 8.476 0 0 1-3.331.676Zm4.772-1.462A37.232 37.232 0 0 0 13.113 11a12.513 12.513 0 0 1 5.321.364 8.56 8.56 0 0 1-3.66 5.73h-.002Z"
                              clip-rule="evenodd"/>
                    </svg>
                    <span class="sr-only">Dribbble account</span>
                </a>
            </div>
        </div>
    </div>
</footer>

<script>
    function previewFile() {
        var preview = document.querySelector('.file-preview');
        var fileInput = document.querySelector('input[type=file]').files[0];
        var reader = new FileReader();

        console.log("asas")
        reader.onloadend = function () {
            var img = preview.querySelector('.thumbnail-proof'); // Get the thumbnail image element
            img.src = reader.result; // Update src attribute with the uploaded file
            preview.classList.remove('hidden'); // Remove the 'hidden' class to display the preview
        }

        if (fileInput) {
            reader.readAsDataURL(fileInput);
        } else {
            preview.classList.add('hidden'); // Hide preview if no file selected
        }
    }

    document.getElementById('bank').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];
        var accountName = selectedOption.getAttribute('data-account-name');
        var accountNumber = selectedOption.getAttribute('data-account-number');

        document.getElementById('name').value = accountName;
        document.getElementById('number').value = accountNumber;
    });

    // Trigger change event on page load to populate initial values
    document.getElementById('bank').dispatchEvent(new Event('change'));

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
@vite(['resources/css/app.css', 'resources/js/app.js'])

</body>
</html>
