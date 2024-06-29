@php
    $isHomePage = Route::currentRouteName() === 'home';
@endphp

<!-- Navbar -->
<nav id="navbar" class="w-full fixed top-0 bg-[#00000048] backdrop-blur-lg z-50">
    <div class="flex flex-wrap items-center justify-between max-w-screen-xl mx-auto p-4">
        <a href="/" class="flex items-center space-x-2 rtl:space-x-reverse">
            <img src="{{URL::to('/')}}/assets/logos/logo-singgle.svg" class="h-6" alt="CreativeHub Logo"/>
            <span
                class="self-center sm:text-xl md:text-2xl font-semibold whitespace-nowrap text-white">CreativeHub</span>
        </a>
        <div class="flex items-center md:order-2 space-x-3 md:space-x-2 rtl:space-x-reverse md:gap-2">
            @if(auth()->check())
                <a href="{{route('cart.index')}}"
                   class="flex gap-1.5 items-center border-creativehub-grey border rounded-md px-3 py-2 bg-transparent bg-clip bg-gradient-to-tr hover:from-[#FCB16B] hover:to-[#B05CB0] shadow-lg hover:shadow-pink-400/50 transition-all duration-500">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
                        <path fill-rule="evenodd"
                              d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 0 0 4.25 22.5h15.5a1.875 1.875 0 0 0 1.865-2.071l-1.263-12a1.875 1.875 0 0 0-1.865-1.679H16.5V6a4.5 4.5 0 1 0-9 0ZM12 3a3 3 0 0 0-3 3v.75h6V6a3 3 0 0 0-3-3Zm-3 8.25a3 3 0 1 0 6 0v-.75a.75.75 0 0 1 1.5 0v.75a4.5 4.5 0 1 1-9 0v-.75a.75.75 0 0 1 1.5 0v.75Z"
                              clip-rule="evenodd"/>
                    </svg>
                    <span class="text-sm">{{auth()->user()->addProductIntoCart->count() ?? 0}}</span>
                </a>
                <!-- State profile ini muncul ketika user sudah login -->



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
                    <a href="/"
                       class="block py-2 px-3 font-bold {{ $isHomePage ? 'from-[#B05CB0] to-[#FCB16B] bg-clip-text text-transparent bg-gradient-to-r border-b border-creativehub-dark-grey' : 'block py-2 px-3 font-medium text-gray-50 border-b border-creativehub-dark-grey md:w-auto md:border-0 hover:from-[#B05CB0] hover:to-[#FCB16B] hover:bg-clip-text hover:text-transparent hover:bg-gradient-to-r md:p-0' }} md:border-0 md:p-0"
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
                                    <a href="{{route('home')}}" class="flex items-center text-white hover:text-pink-400 group">
                                        <span class="sr-only">All Products</span>
                                        <img
                                            src="https://raw.githubusercontent.com/fe-husni/creativehub-main/main/assets/icons/cart.svg"
                                            alt="All Products" class="w-7 h-7 me-2">
                                        All Products
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('home', ['category' => 3])}}" class="flex items-center text-white hover:text-pink-400 group">
                                        <span class="sr-only">Icons</span>
                                        <img
                                            src="https://raw.githubusercontent.com/fe-husni/creativehub-main/main/assets/icons/hat.svg"
                                            alt="All Products" class="w-7 h-7 me-2">
                                        Icons
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('home', ['category' => 4])}}" class="flex items-center text-white hover:text-pink-400 group">
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
                                    <a href="{{route('home', ['category' => 2])}}" class="flex items-center text-white hover:text-pink-400 group">
                                        <span class="sr-only">Fonts</span>
                                        <img
                                            src="https://raw.githubusercontent.com/fe-husni/creativehub-main/main/assets/icons/pen.svg"
                                            alt="All Products" class="w-7 h-7 me-2">
                                        Fonts
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('home', ['category' => 1])}}" class="flex items-center text-white hover:text-pink-400 group">
                                        <span class="sr-only">E-Books</span>
                                        <img
                                            src="https://raw.githubusercontent.com/fe-husni/creativehub-main/main/assets/icons/book.svg"
                                            alt="All Products" class="w-7 h-7 me-2">
                                        E-Books
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('home', ['category' => 5])}}" class="flex items-center text-white hover:text-pink-400 group">
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
