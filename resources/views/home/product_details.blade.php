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
@include('home.components.nav_home')

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

{{--                {{dd(auth()->user()->purchases)}}--}}

                @if(auth()->check() && \App\Models\Transaction::query()->where('user_id', auth()->user()->id)
                    ->where('transactions.user_id', '=', auth()->user()->id)
                    ->where('purchases.product_id', '=', $product->id)
                    ->join('purchases', 'purchases.transaction_id', '=', 'transactions.id')
                    ->select('purchases.*', 'transactions.*')
                    ->get()->count() == 0 &&  $product->seller_id != auth()->user()->id)

                             @if(auth()->user()->addProductIntoCart->where('id', $product->id)->first() == null)
                                 <a href="{{route('checkout', ["id" => $product->id])}}"
                                 class="bg-[#2D68F8] text-center font-semibold p-[12px_20px] rounded-full hover:bg-[#083297] active:bg-[#062162] transition-all duration-300">Checkout</a>
                                  <form action="{{route('add.cart', ["id" => $product->id])}}" method="POST">
                                      @csrf
                                      <button class="border border-[#2D68F8] text-center font-semibold p-[12px_20px] rounded-full hover:bg-[#083297] active:bg-[#062162] transition-all duration-300 cart w-full">Add to Cart</button>
                                 </form>
                            @else
                                 <a href="{{route('cart.index')}}" class="bg-[#2D68F8] text-center font-semibold p-[12px_20px] rounded-full hover:bg-[#083297] active:bg-[#062162] transition-all duration-300">Go to Cart</a>
                                @endif


                @elseif(!auth()->check())
                    <a href="{{route('register', ['checkout' => $product->id]) }}"
                       class="bg-[#2D68F8] text-center font-semibold p-[12px_20px] rounded-full hover:bg-[#083297] active:bg-[#062162] transition-all duration-300">Checkout</a>
                    <button href="{{route('checkout', ["id" => $product->id])}}"
                       class="border border-[#2D68F8] text-center font-semibold p-[12px_20px] rounded-full hover:bg-[#083297] active:bg-[#062162] transition-all duration-300 cart">Add to Cart</button>
                @elseif(auth()->user()->id == $product->seller_id)
                    <a href="{{route('purchases.index')}}"
                       class="bg-[#2D68F8] text-center font-semibold p-[12px_20px] rounded-full hover:bg-[#083297] active:bg-[#062162] transition-all duration-300">Go to Products</a>
                @elseif(
            auth()->check() && \App\Models\Transaction::query()->where('user_id', auth()->user()->id)
            ->where('transactions.user_id', '=', auth()->user()->id)
            ->where('purchases.product_id', '=', $product->id)
            ->join('purchases', 'purchases.transaction_id', '=', 'transactions.id')
            ->select('purchases.*', 'transactions.*')
            ->get()->count() != 0
            )
                    <a href="{{route('register', ['checkout' => $product->id]) }}"
                       class="bg-[#2D68F8] text-center font-semibold p-[12px_20px] rounded-full hover:bg-[#083297] active:bg-[#062162] transition-all duration-300">Go to Products</a>
                @endif
            </div>
        </div>

        <div class="w-full p-[30px] bg-[#181818] rounded-[20px] flex flex-col gap-4 h-fit">
            <div class="flex justify-between items-center">
                <div class="flex gap-3 items-center">
                    <div class="w-12 h-12 rounded-full overflow-hidden flex shrink-0">
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
                        " alt="icon">
                    </div>
                    <div class="flex flex-col gap-[2px]">
                        <p class="font-semibold">{{$product->user->name}}</p>
                        <p class="text-[#595959] text-sm leading-[18px]">
                            <span class="font-semibold mr-1">{{$totalProduct}}</span>
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

                                                                        @if(isset($review->user->user_detail->image_url))
                                    {{
                                        ImageHelper::isThisImage($review->user->user_detail->image_url)
                                        ? $review->user->user_detail->image_url
                                        : URL::signedRoute('profile.file', ['encoded' => ImageHelper::encodePath($review->user->user_detail->image_url)])
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

                                        @for($i = 1; $i <= 5; $i++)
                                            {{-- Ini State bintang ya maniez --}}
                                            {{-- Ini ketika filled (bintang kuning) --}}
                                            @if($review->star >= $i)
                                                <svg class="w-5 h-5" viewBox="0 0 18 17" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M8.10326 1.31699C8.47008 0.57374 9.52992 0.57374 9.89674 1.31699L11.7063 4.98347C11.8519 5.27862 12.1335 5.48319 12.4592 5.53051L16.5054 6.11846C17.3256 6.23765 17.6531 7.24562 17.0596 7.82416L14.1318 10.6781C13.8961 10.9079 13.7885 11.2389 13.8442 11.5632L14.5353 15.5931C14.6754 16.41 13.818 17.033 13.0844 16.6473L9.46534 14.7446C9.17402 14.5915 8.82598 14.5915 8.53466 14.7446L4.91562 16.6473C4.18199 17.033 3.32456 16.41 3.46467 15.5931L4.15585 11.5632C4.21148 11.2389 4.10393 10.9079 3.86825 10.6781L0.940384 7.82416C0.346867 7.24562 0.674378 6.23765 1.4946 6.11846L5.54081 5.53051C5.86652 5.48319 6.14808 5.27862 6.29374 4.98347L8.10326 1.31699Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                            @else
                                                {{-- Ini State ketika non fill --}}
                                                <svg class="w-5 h-5" viewBox="0 0 18 17" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M8.10326 1.31699C8.47008 0.57374 9.52992 0.57374 9.89674 1.31699L11.7063 4.98347C11.8519 5.27862 12.1335 5.48319 12.4592 5.53051L16.5054 6.11846C17.3256 6.23765 17.6531 7.24562 17.0596 7.82416L14.1318 10.6781C13.8961 10.9079 13.7885 11.2389 13.8442 11.5632L14.5353 15.5931C14.6754 16.41 13.818 17.033 13.0844 16.6473L9.46534 14.7446C9.17402 14.5915 8.82598 14.5915 8.53466 14.7446L4.91562 16.6473C4.18199 17.033 3.32456 16.41 3.46467 15.5931L4.15585 11.5632C4.21148 11.2389 4.10393 10.9079 3.86825 10.6781L0.940384 7.82416C0.346867 7.24562 0.674378 6.23765 1.4946 6.11846L5.54081 5.53051C5.86652 5.48319 6.14808 5.27862 6.29374 4.98347L8.10326 1.31699Z"
                                                        fill="#595959"></path>
                                                </svg>
                                            @endif
                                        @endfor
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
@include('home.components.footer')


@include('sweetalert::alert')

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
