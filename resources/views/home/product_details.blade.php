@php use App\Helper\ImageHelper; @endphp
    <!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('/css/output.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
          rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
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

    .swiper-slide.swiper-slide-active>.swiper-slide-active\:text-indigo-600 {
        --tw-text-opacity: 1;
        color: rgb(79 70 229 / var(--tw-text-opacity));
    }

    .swiper-slide.swiper-slide-active>.flex .grid .swiper-slide-active\:text-indigo-600 {
        --tw-text-opacity: 1;
        color: rgb(79 70 229 / var(--tw-text-opacity));
    }

    #product-description li{
        list-style: circle;
    }
</style>

<body class="bg-creativehub-black font-poppins text-white">

<!-- Navbar -->
<nav id="navbar" class="w-full fixed top-0 bg-[#00000048] backdrop-blur-lg z-50">
    <div class="flex flex-wrap items-center justify-between max-w-screen-xl mx-auto p-4">
        <a href="{{route('home')}}" class="flex items-center space-x-2 rtl:space-x-reverse">
            <img src="../assets/logos/logo-singgle.svg" class="h-6" alt="CreativeHub Logo" />
            <span class="self-center sm:text-xl md:text-2xl font-semibold whitespace-nowrap text-white">CreativeHub</span>
        </a>
        <div class="flex items-center md:order-2 space-x-3 md:space-x-2 rtl:space-x-reverse md:gap-2">
            <a href="carts.html" class="flex gap-1.5 items-center border-creativehub-grey border rounded-md px-3 py-2 bg-transparent bg-clip bg-gradient-to-tr hover:from-[#FCB16B] hover:to-[#B05CB0] shadow-lg hover:shadow-pink-400/50 transition-all duration-500">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
                    <path fill-rule="evenodd" d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 0 0 4.25 22.5h15.5a1.875 1.875 0 0 0 1.865-2.071l-1.263-12a1.875 1.875 0 0 0-1.865-1.679H16.5V6a4.5 4.5 0 1 0-9 0ZM12 3a3 3 0 0 0-3 3v.75h6V6a3 3 0 0 0-3-3Zm-3 8.25a3 3 0 1 0 6 0v-.75a.75.75 0 0 1 1.5 0v.75a4.5 4.5 0 1 1-9 0v-.75a.75.75 0 0 1 1.5 0v.75Z" clip-rule="evenodd" />
                </svg>
                <span class="text-sm">9</span>
            </a>
            <!-- State profile ini muncul ketika user sudah login -->

            @if(auth()->check())
                <a href="#" class="w-9 border border-solid border-white rounded-md">
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

            <button data-collapse-toggle="mega-menu-icons" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 border-creativehub-grey border" aria-controls="mega-menu-icons" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>
        </div>
        <div id="mega-menu-icons" class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1">
            <ul class="flex flex-col mt-4 font-medium md:flex-row md:mt-0 md:space-x-8 rtl:space-x-reverse">
                <li>
                    <a href="{{route('home')}}" class="block py-2 px-3 font-medium text-gray-50 border-b border-creativehub-dark-grey md:w-auto md:border-0 hover:from-[#B05CB0] hover:to-[#FCB16B] hover:bg-clip-text hover:text-transparent hover:bg-gradient-to-r md:p-0" aria-current="page">Home</a>
                </li>
                <li>
                    <button id="mega-menu-icons-dropdown-button" data-dropdown-toggle="mega-menu-icons-dropdown" class="flex items-center justify-between w-full py-2 px-3 font-medium text-gray-50 border-b border-creativehub-dark-grey md:w-auto md:border-0 hover:from-[#B05CB0] hover:to-[#FCB16B] hover:bg-clip-text hover:text-transparent hover:bg-gradient-to-r md:p-0">
                        Categories
                        <svg class="w-2.5 h-2.5 ms-3 hover:text-pink-400 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>
                    <div id="mega-menu-icons-dropdown" class="absolute z-10 grid hidden w-auto grid-cols-2 text-sm bg-[#1C1C1C] border border-creativehub-dark-grey rounded-lg shadow-md gap-4">
                        <div class="p-4 pb-4">
                            <ul class="space-y-4" aria-labelledby="mega-menu-icons-dropdown-button">
                                <li>
                                    <a href="#" class="flex items-center text-white hover:text-pink-400 group">
                                        <span class="sr-only">All Products</span>
                                        <img src="https://raw.githubusercontent.com/fe-husni/creativehub-main/main/assets/icons/cart.svg" alt="All Products" class="w-7 h-7 me-2">
                                        All Products
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center text-white hover:text-pink-400 group">
                                        <span class="sr-only">Icons</span>
                                        <img src="https://raw.githubusercontent.com/fe-husni/creativehub-main/main/assets/icons/hat.svg" alt="All Products" class="w-7 h-7 me-2">
                                        Icons
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center text-white hover:text-pink-400 group">
                                        <span class="sr-only">Templates</span>
                                        <img src="https://raw.githubusercontent.com/fe-husni/creativehub-main/main/assets/icons/laptop.svg" alt="All Products" class="w-7 h-7 me-2">
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
                                        <img src="https://raw.githubusercontent.com/fe-husni/creativehub-main/main/assets/icons/pen.svg" alt="All Products" class="w-7 h-7 me-2">
                                        Fonts
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center text-white hover:text-pink-400 group">
                                        <span class="sr-only">E-Books</span>
                                        <img src="https://raw.githubusercontent.com/fe-husni/creativehub-main/main/assets/icons/book.svg" alt="All Products" class="w-7 h-7 me-2">
                                        E-Books
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center text-white hover:text-pink-400 group">
                                        <span class="sr-only">UI Kits</span>
                                        <img src="https://raw.githubusercontent.com/fe-husni/creativehub-main/main/assets/icons/check-3d.svg" alt="All Products" class="w-7 h-7 me-2">
                                        UI Kits
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </li>
                <li>
                    <a href="#" class="block py-2 px-3 font-medium text-gray-50 border-b border-creativehub-dark-grey md:w-auto md:border-0 hover:from-[#B05CB0] hover:to-[#FCB16B] hover:bg-clip-text hover:text-transparent hover:bg-gradient-to-r md:p-0">About</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Header -->
<header class="w-full pt-[74px] pb-[103px] relative z-0">
    <div class="container max-w-[1200px] px-4 mx-auto flex flex-col items-center justify-center z-10 ">
        <div class="flex flex-col gap-4 mt-7 z-10 w-full">
            <p class="bg-img-transparent bg-img-purple-to-orange transition-all duration-300 font-semibold text-xs md:text-2xl lg:text-2xl text-white rounded-md p-[8px_16px] w-fit">{{$product->category->name}}</p>
            <h1 class="font-semibold text-2xl md:text-[50px] lg:text-[50px] leading-normal drop-shadow-2xl">{{$product->title}}</h1>
        </div>
    </div>
    <div class="background-image w-full h-full absolute top-0 overflow-hidden z-0">
        <img src="
            {{
                ImageHelper::isThisImage($product->image_product_url)
            ? $product->image_product_url
            : URL::signedRoute('file.view', ['encoded' => ImageHelper::encodePath($product->image_product_url)])
            }}
        " class="w-full h-full object-cover" alt="hero image">
    </div>
    <div class="w-full h-full absolute bottom-0 bg-gradient-to-b from-creativehub-black/0 to-creativehub-black z-0"></div>
    <div class="w-full h-full absolute top-0 bg-creativehub-black/95 z-0"></div>
</header>

<!-- Detail Content/Product -->
<section id="DetailsContent" class="container max-w-[1200px] mx-auto px-4 mb-8">
    <div class="flex flex-col">
        <div class=" flex shrink-0 rounded-[20px] overflow-hidden -mt-20 z-10">
            <img src="
            {{
                ImageHelper::isThisImage($product->image_product_url)
            ? $product->image_product_url
            : URL::signedRoute('file.view', ['encoded' => ImageHelper::encodePath($product->image_product_url)])

            }}
            " class="w-full max-h-[700px] object-cover" alt="hero image">
        </div>
    </div>

    <div class="flex gap-8 bg-creativehub-dark-footer py-8 px-16 mt-10 rounded-[20px]">
        <div class="flex flex-col">
            <h1 class="font-semibold text-[16px] md:text-xl lg:text-xl">Descrtiption</h1>
            <p class="text-creativehub-grey text-sm md:text-lg lg:text-lg leading-relaxed">
                <div id="product-description" class="text-creativehub-grey text-sm md:text-lg lg:text-lg leading-relaxed mt-6 mb-8">
                    {!! $product->description !!}
                </div>
            </p>
            <div class="flex flex-wrap items-center gap-[10px] mb-4">
                <a href=""
                   class="w-9 h-9 justify-center items-center rounded-full flex shrink-0 overflow-hidden border-[0.69px] border-[#414141]">
                    <img src="../assets/logos/Python.svg" class='p-[5px]' alt="logo">
                </a>
                <a href=""
                   class="w-9 h-9 justify-center items-center rounded-full flex shrink-0 overflow-hidden border-[0.69px] border-[#414141]">
                    <img src="../assets/logos/figma-logo.svg" class='p-[5px]' alt="logo">
                </a>
                <a href=""
                   class="w-9 h-9 justify-center items-center rounded-full flex shrink-0 overflow-hidden border-[0.69px] border-[#414141]">
                    <img src="../assets/logos/blender.svg" class='p-[5px]' alt="logo">
                </a>
                <a href=""
                   class="w-9 h-9 justify-center items-center rounded-full flex shrink-0 overflow-hidden border-[0.69px] border-[#414141]">
                    <img src="../assets/logos/Excel.svg" class='p-[5px]' alt="logo">
                </a>
                <a href=""
                   class="w-9 h-9 justify-center items-center rounded-full flex shrink-0 overflow-hidden border-[0.69px] border-[#414141]">
                    <img src="../assets/logos/Laravel.svg" class='p-[5px]' alt="logo">
                </a>
                <a href=""
                   class="w-9 h-9 justify-center items-center rounded-full flex shrink-0 overflow-hidden border-[0.69px] border-[#414141]">
                    <img src="../assets/logos/Kotlin.svg" class='p-[5px]' alt="logo">
                </a>
                <a href=""
                   class="w-9 h-9 justify-center items-center rounded-full flex shrink-0 overflow-hidden border-[0.69px] border-[#414141]">
                    <img src="../assets/logos/flutter.svg" class='p-[5px]' alt="logo">
                </a>
            </div>
            <div class="flex flex-row flex-wrap gap-4 items-center">
                <a href=""
                   class="tags p-[4px_8px] border border-[#414141] rounded-[4px] h-fit w-fit text-[10px] md:text-[16px] lg:text-[16px] text-creativehub-light-grey hover:bg-[#2A2A2A] transition-all duration-300">Templates</a>
                <a href=""
                   class="tags p-[4px_8px] border border-[#414141] rounded-[4px] h-fit w-fit text-[10px] md:text-[16px] lg:text-[16px] text-creativehub-light-grey hover:bg-[#2A2A2A] transition-all duration-300">Icons</a>
                <a href=""
                   class="tags p-[4px_8px] border border-[#414141] rounded-[4px] h-fit w-fit text-[10px] md:text-[16px] lg:text-[16px] text-creativehub-light-grey hover:bg-[#2A2A2A] transition-all duration-300">Fonts</a>
                <a href=""
                   class="tags p-[4px_8px] border border-[#414141] rounded-[4px] h-fit w-fit text-[10px] md:text-[16px] lg:text-[16px] text-creativehub-light-grey hover:bg-[#2A2A2A] transition-all duration-300">UI Kits</a>
                <a href=""
                   class="tags p-[4px_8px] border border-[#414141] rounded-[4px] h-fit w-fit text-[10px] md:text-[16px] lg:text-[16px] text-creativehub-light-grey hover:bg-[#2A2A2A] transition-all duration-300">E-Books</a>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8 flex-wrap mt-10">
        <div class="p-[2px] bg-img-purple-to-orange rounded-[20px] flex w-full h-fit">
            <div class="w-full p-[28px] bg-[#181818] rounded-[20px] flex flex-col gap-[26px]">
                <div class="flex flex-col gap-3">
                    <p class="font-semibold text-[26px] md:text-4xl lg:text-4xl  bg-clip-text text-transparent bg-gradient-to-r from-[#B05CB0] to-[#FCB16B]">
                        Rp {{number_format($product->price, 0, ',', '.')}}</p>
                    <div class="flex flex-col gap-[10px]">
                        <div class="flex items-center gap-[10px]">
                            <div class="w-3 h-3 flex shrink-0">
                                <img src="../assets/icons/check.svg" alt="icon">
                            </div>
                            <p class="text-creativehub-grey text-sm md:text-lg lg:text-lg">100% Original Content</p>
                        </div>
                        <div class="flex items-center gap-[10px]">
                            <div class="w-3 h-3 flex shrink-0">
                                <img src="../assets/icons/check.svg" alt="icon">
                            </div>
                            <p class="text-creativehub-grey text-sm md:text-lg lg:text-lg">Lifetime Support</p>
                        </div>
                        <div class="flex items-center gap-[10px]">
                            <div class="w-3 h-3 flex shrink-0">
                                <img src="../assets/icons/check.svg" alt="icon">
                            </div>
                            <p class="text-creativehub-grey text-sm md:text-lg lg:text-lg">High-Performance Code</p>
                        </div>
                        <div class="flex items-center gap-[10px]">
                            <div class="w-3 h-3 flex shrink-0">
                                <img src="../assets/icons/check.svg" alt="icon">
                            </div>
                            <p class="text-creativehub-grey text-sm md:text-lg lg:text-lg">Customizable Themes</p>
                        </div>
                        <div class="flex items-center gap-[10px]">
                            <div class="w-3 h-3 flex shrink-0">
                                <img src="../assets/icons/check.svg" alt="icon">
                            </div>
                            <p class="text-creativehub-grey text-sm md:text-lg lg:text-lg">Responsive Design</p>
                        </div>
                        <div class="flex items-center gap-[10px]">
                            <div class="w-3 h-3 flex shrink-0">
                                <img src="../assets/icons/check.svg" alt="icon">
                            </div>
                            <p class="text-creativehub-grey text-sm md:text-lg lg:text-lg">Comprehensive Documentation</p>
                        </div>
                    </div>
                </div>
                @if(auth()->check() && (\App\Models\Transaction::query()->where('user_id', auth()->user()->id)
            ->where('transactions.user_id', '=', auth()->user()->id)
            ->where('purchases.product_id', '=', $product->id)
            ->join('purchases', 'purchases.transaction_id', '=', 'transactions.id')
            ->select('purchases.*', 'transactions.*')
            ->get()->count() == 0)
            )
                    <a href="{{route('checkout', ["id" => $product->id])}}"
                       class="bg-[#2D68F8] text-center font-semibold p-[12px_20px] rounded-full hover:bg-[#083297] active:bg-[#062162] transition-all duration-300">Go to Products</a>
                @elseif(!auth()->check())
                    <a href="{{route('register', ['checkout' => $product->id]) }}"
                       class="bg-[#2D68F8] text-center font-semibold p-[12px_20px] rounded-full hover:bg-[#083297] active:bg-[#062162] transition-all duration-300">Checkout</a>
                @else
                    <a href="{{route('purchases.index')}}"
                       class="bg-[#2D68F8] text-center font-semibold p-[12px_20px] rounded-full hover:bg-[#083297] active:bg-[#062162] transition-all duration-300">Go to Products</a>
                @endif
            </div>
        </div>
        <div class="w-full p-[30px] bg-[#181818] rounded-[20px] flex flex-col gap-4 h-fit">
            <div class="flex justify-between items-center">
                <div class="flex gap-3 items-center">
                    <div class="w-12 h-12 rounded-full overflow-hidden flex shrink-0">
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
                        " alt="icon">
                    </div>
                    <div class="flex flex-col gap-[2px]">
                        <p class="font-semibold">{{$product->user->name}}</p>
                        <p class="text-[#595959] text-sm leading-[18px]">
                            <span class="font-semibold mr-1">103</span>
                            Product
                        </p>
                    </div>
                </div>
                <a href="">
                    <img src="../assets/icons/arrow-right.svg" alt="icon">
                </a>
            </div>
            <p class="text-sm leading-[24px] text-creativehub-grey">{{$product->user->user_detail->bio ?? ""}}</p>
        </div>
    </div>
</section>

<!-- More Product Sections -->
<section id="MoreProduct" class="container max-w-[1200px] px-4 mx-auto mb-[102px] flex flex-col gap-8 mt-16">
    <h2 class="font-semibold text-[32px]">More Product</h2>
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-[22px]">

        @foreach($products as $data)

            <div class="product-card flex flex-col rounded-[18px] bg-[#181818] overflow-hidden">
                <a href="{{route('home.product.detail', $data->id)}}" class="thumbnail w-full h-[180px] flex shrink-0 overflow-hidden relative">
                    <img src="
                                            {{
                        ImageHelper::isThisImage($data->image_product_url)
                        ? $data->image_product_url
                        : URL::signedRoute('file.view', ['encoded' => ImageHelper::encodePath($data->image_product_url)])
                        }}
                    " class="w-full h-full object-cover" alt="thumbnail">
                    <p class="backdrop-blur bg-black/30 rounded-[4px] p-[4px_8px] absolute top-3 right-[14px] z-7">Rp
                        {{number_format($data->price, 0, ',', '.')}}
                    </p>
                </a>
                <div class="p-[10px_14px_12px] h-full flex flex-col justify-between gap-[14px]">
                    <div class="flex flex-col gap-1">
                        <a href="{{route('home.product.detail', $data->id)}}" class="font-semibold text-xs md:text-lg lg:text-lg line-clamp-2 hover:line-clamp-none">{{$data->title}}</a>
                        <p class="bg-[#2A2A2A] text-[10px] md:text-xs lg:text-xs text-creativehub-grey rounded-[4px] p-[4px_6px] w-fit">{{$data->category->name}}</p>
                    </div>
                    <div class="flex items-center gap-[6px]">
                        <div class="w-6 h-6 flex shrink-0 items-center justify-center rounded-full overflow-hidden">
                            <img src="
                                                                        {{
                        ImageHelper::isThisImage($data->user->user_detail->image_url)
                        ? $data->user->user_detail->image_url
                        : URL::signedRoute('profile.file', ['encoded' => ImageHelper::encodePath($data->user->user_detail->image_url)])
                        }}
                            " class="w-full h-full object-cover" alt="logo">
                        </div>
                        <a href="" class="font-semibold text-xs text-creativehub-grey">{{$data->user->name}}</a>
                    </div>
                </div>
            </div>

        @endforeach

    </div>
</section>

<!-- Testimonial Section -->
<section class="py-24 ">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex justify-center items-center gap-y-8 lg:gap-y-0 flex-wrap md:flex-wrap lg:flex-nowrap lg:flex-row lg:justify-between lg:gap-x-8 max-w-sm sm:max-w-2xl lg:max-w-full mx-auto">
            <div class="w-full lg:w-2/5">
                <span class="text-sm text-white font-medium mb-4 block lg:text-left md:text-center">Testimonial</span>
                <h2 class="text-4xl font-bold leading-[3.25rem] mb-8 from-[#B05CB0] to-[#FCB16B] bg-clip-text text-transparent bg-gradient-to-r">Customers Are Happy <span
                        class="text-transparent bg-clip-text bg-gradient-to-tr text-white">With Our Products</span>
                </h2>
                <!-- Slider controls -->
                <div class="flex items-center justify-center lg:justify-start gap-10">
                    <button id="slider-button-left" class="swiper-button-prev group flex justify-center items-center border-2 border-solid border-white transition-all duration-500 rounded-lg hover:bg-[#B05CB0] z-10" data-carousel-prev>
                        <svg class="h-6 w-6 text-white group-hover:text-white" viewBox="0 0 24 24" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M20.9999 12L4.99992 12M9.99992 6L4.70703 11.2929C4.3737 11.6262 4.20703 11.7929 4.20703 12C4.20703 12.2071 4.3737 12.3738 4.70703 12.7071L9.99992 18"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>

                    </button>
                    <button id="slider-button-right" class="swiper-button-next group flex justify-center items-center border-2 border-solid border-white transition-all duration-500 rounded-lg hover:bg-[#B05CB0]" data-carousel-next>
                        <svg class="h-6 w-6 text-white group-hover:text-white" viewBox="0 0 24 24" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M3 12L19 12M14 18L19.2929 12.7071C19.6262 12.3738 19.7929 12.2071 19.7929 12C19.7929 11.7929 19.6262 11.6262 19.2929 11.2929L14 6"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="w-full lg:w-3/5">
                <!--Slider wrapper-->
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">

                        {{-- Loop Here --}}
                        @foreach($reviews as $review)
                            <div class="swiper-slide group bg-img-transparent hover:bg-img-purple-to-orange p-[2px] rounded-2xl max-sm:max-w-sm max-sm:mx-auto transition-all duration-500 group:">
                                <div class="p-6 bg-img-black-gradient group-active:bg-img-black transition-all duration-300 rounded-2xl">
                                    <div class="flex items-center gap-5 mb-5 sm:mb-9">
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

                                        " alt="avatar" class="w-12 h-12">
                                        <div class="grid gap-1">
                                            <h5 class="font-bold bg-clip-text text-transparent bg-gradient-to-r from-[#B05CB0] to-[#FCB16B] transition-all duration-500">
                                                {{ $review->user->name }}</h5>
                                            <span class="text-sm leading-6 text-creativehub-light-grey hover:text-white">{{ $review->user->user_detail->title ?? "" }}</span>
                                        </div>
                                    </div>
                                    <div class="flex items-center mb-5 sm:mb-9 gap-2 text-amber-500 transition-all duration-500">

                                        {{-- Ini State bintang ya maniez --}}
                                        {{-- Ini ketika filled (bintang kuning) --}}
                                        <svg class="w-5 h-5" viewBox="0 0 18 17" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M8.10326 1.31699C8.47008 0.57374 9.52992 0.57374 9.89674 1.31699L11.7063 4.98347C11.8519 5.27862 12.1335 5.48319 12.4592 5.53051L16.5054 6.11846C17.3256 6.23765 17.6531 7.24562 17.0596 7.82416L14.1318 10.6781C13.8961 10.9079 13.7885 11.2389 13.8442 11.5632L14.5353 15.5931C14.6754 16.41 13.818 17.033 13.0844 16.6473L9.46534 14.7446C9.17402 14.5915 8.82598 14.5915 8.53466 14.7446L4.91562 16.6473C4.18199 17.033 3.32456 16.41 3.46467 15.5931L4.15585 11.5632C4.21148 11.2389 4.10393 10.9079 3.86825 10.6781L0.940384 7.82416C0.346867 7.24562 0.674378 6.23765 1.4946 6.11846L5.54081 5.53051C5.86652 5.48319 6.14808 5.27862 6.29374 4.98347L8.10326 1.31699Z"
                                                fill="currentColor"></path>
                                        </svg>

                                        {{-- Ini State ketika non fill --}}
                                        <svg class="w-5 h-5" viewBox="0 0 18 17" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M8.10326 1.31699C8.47008 0.57374 9.52992 0.57374 9.89674 1.31699L11.7063 4.98347C11.8519 5.27862 12.1335 5.48319 12.4592 5.53051L16.5054 6.11846C17.3256 6.23765 17.6531 7.24562 17.0596 7.82416L14.1318 10.6781C13.8961 10.9079 13.7885 11.2389 13.8442 11.5632L14.5353 15.5931C14.6754 16.41 13.818 17.033 13.0844 16.6473L9.46534 14.7446C9.17402 14.5915 8.82598 14.5915 8.53466 14.7446L4.91562 16.6473C4.18199 17.033 3.32456 16.41 3.46467 15.5931L4.15585 11.5632C4.21148 11.2389 4.10393 10.9079 3.86825 10.6781L0.940384 7.82416C0.346867 7.24562 0.674378 6.23765 1.4946 6.11846L5.54081 5.53051C5.86652 5.48319 6.14808 5.27862 6.29374 4.98347L8.10326 1.31699Z"
                                                fill="#595959"></path>
                                        </svg>

                                    </div>
                                    <p class="text-sm text-creativehub-light-grey leading-6 transition-all duration-500 min-h-24  group-hover:text-white">
                                        {{ $review->comments }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                        {{-- End Loop Here --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-[#181818]">
    <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
        <div class="md:flex md:justify-between">
            <div class="mb-6 md:mb-0">
                <a href="{{route('home')}}" class="flex items-center">
                    <img src="../assets/logos/logo-singgle.svg" class="h-8 me-3" alt="FlowBite Logo" />
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
        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
        <div class="sm:flex sm:items-center sm:justify-between">
			<span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 <a href="" class="hover:underline">CreativeHub™</a> - Made With 💜 Husni Mubarok.
			</span>
            <div class="flex mt-4 sm:justify-center sm:mt-0">
                <a href="#" class="text-gray-500 hover:text-white">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 8 19">
                        <path fill-rule="evenodd" d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z" clip-rule="evenodd"/>
                    </svg>
                    <span class="sr-only">Facebook page</span>
                </a>
                <a href="#" class="text-gray-500 hover:text-white ms-5">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 21 16">
                        <path d="M16.942 1.556a16.3 16.3 0 0 0-4.126-1.3 12.04 12.04 0 0 0-.529 1.1 15.175 15.175 0 0 0-4.573 0 11.585 11.585 0 0 0-.535-1.1 16.274 16.274 0 0 0-4.129 1.3A17.392 17.392 0 0 0 .182 13.218a15.785 15.785 0 0 0 4.963 2.521c.41-.564.773-1.16 1.084-1.785a10.63 10.63 0 0 1-1.706-.83c.143-.106.283-.217.418-.33a11.664 11.664 0 0 0 10.118 0c.137.113.277.224.418.33-.544.328-1.116.606-1.71.832a12.52 12.52 0 0 0 1.084 1.785 16.46 16.46 0 0 0 5.064-2.595 17.286 17.286 0 0 0-2.973-11.59ZM6.678 10.813a1.941 1.941 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.919 1.919 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Zm6.644 0a1.94 1.94 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.918 1.918 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Z"/>
                    </svg>
                    <span class="sr-only">Discord community</span>
                </a>
                <a href="#" class="text-gray-500 hover:text-white ms-5">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 17">
                        <path fill-rule="evenodd" d="M20 1.892a8.178 8.178 0 0 1-2.355.635 4.074 4.074 0 0 0 1.8-2.235 8.344 8.344 0 0 1-2.605.98A4.13 4.13 0 0 0 13.85 0a4.068 4.068 0 0 0-4.1 4.038 4 4 0 0 0 .105.919A11.705 11.705 0 0 1 1.4.734a4.006 4.006 0 0 0 1.268 5.392 4.165 4.165 0 0 1-1.859-.5v.05A4.057 4.057 0 0 0 4.1 9.635a4.19 4.19 0 0 1-1.856.07 4.108 4.108 0 0 0 3.831 2.807A8.36 8.36 0 0 1 0 14.184 11.732 11.732 0 0 0 6.291 16 11.502 11.502 0 0 0 17.964 4.5c0-.177 0-.35-.012-.523A8.143 8.143 0 0 0 20 1.892Z" clip-rule="evenodd"/>
                    </svg>
                    <span class="sr-only">Twitter page</span>
                </a>
                <a href="#" class="text-gray-500 hover:text-white ms-5">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 .333A9.911 9.911 0 0 0 6.866 19.65c.5.092.678-.215.678-.477 0-.237-.01-1.017-.014-1.845-2.757.6-3.338-1.169-3.338-1.169a2.627 2.627 0 0 0-1.1-1.451c-.9-.615.07-.6.07-.6a2.084 2.084 0 0 1 1.518 1.021 2.11 2.11 0 0 0 2.884.823c.044-.503.268-.973.63-1.325-2.2-.25-4.516-1.1-4.516-4.9A3.832 3.832 0 0 1 4.7 7.068a3.56 3.56 0 0 1 .095-2.623s.832-.266 2.726 1.016a9.409 9.409 0 0 1 4.962 0c1.89-1.282 2.717-1.016 2.717-1.016.366.83.402 1.768.1 2.623a3.827 3.827 0 0 1 1.02 2.659c0 3.807-2.319 4.644-4.525 4.889a2.366 2.366 0 0 1 .673 1.834c0 1.326-.012 2.394-.012 2.72 0 .263.18.572.681.475A9.911 9.911 0 0 0 10 .333Z" clip-rule="evenodd"/>
                    </svg>
                    <span class="sr-only">GitHub account</span>
                </a>
                <a href="#" class="text-gray-500 hover:text-white ms-5">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 0a10 10 0 1 0 10 10A10.009 10.009 0 0 0 10 0Zm6.613 4.614a8.523 8.523 0 0 1 1.93 5.32 20.094 20.094 0 0 0-5.949-.274c-.059-.149-.122-.292-.184-.441a23.879 23.879 0 0 0-.566-1.239 11.41 11.41 0 0 0 4.769-3.366ZM8 1.707a8.821 8.821 0 0 1 2-.238 8.5 8.5 0 0 1 5.664 2.152 9.608 9.608 0 0 1-4.476 3.087A45.758 45.758 0 0 0 8 1.707ZM1.642 8.262a8.57 8.57 0 0 1 4.73-5.981A53.998 53.998 0 0 1 9.54 7.222a32.078 32.078 0 0 1-7.9 1.04h.002Zm2.01 7.46a8.51 8.51 0 0 1-2.2-5.707v-.262a31.64 31.64 0 0 0 8.777-1.219c.243.477.477.964.692 1.449-.114.032-.227.067-.336.1a13.569 13.569 0 0 0-6.942 5.636l.009.003ZM10 18.556a8.508 8.508 0 0 1-5.243-1.8 11.717 11.717 0 0 1 6.7-5.332.509.509 0 0 1 .055-.02 35.65 35.65 0 0 1 1.819 6.476 8.476 8.476 0 0 1-3.331.676Zm4.772-1.462A37.232 37.232 0 0 0 13.113 11a12.513 12.513 0 0 1 5.321.364 8.56 8.56 0 0 1-3.66 5.73h-.002Z" clip-rule="evenodd"/>
                    </svg>
                    <span class="sr-only">Dribbble account</span>
                </a>
            </div>
        </div>
    </div>
</footer>


<!-- Flowbite Plugins -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<!-- Flickity -->
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
<!-- Swiper.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<!-- Main.js Script -->
@vite(['resources/css/app.css', 'resources/js/app.js'])

<script>
    // Search Function
    const searchInput = document.getElementById('searchInput');
    const resetButton = document.getElementById('resetButton');

    searchInput.addEventListener('input', function () {
        if (this.value.trim() !== '') {
            resetButton.classList.remove('hidden');
        } else {
            resetButton.classList.add('hidden');
        }
    });

    resetButton.addEventListener('click', function () {
        resetButton.classList.add('hidden');
    });
</script>
</body>
</html>
