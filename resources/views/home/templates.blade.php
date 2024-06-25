@php use App\Helper\ImageHelper;use Illuminate\Support\Facades\URL; @endphp
    <!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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

    /*  Search Override  */
    #searchInput {
        background-color: transparent;
    }
</style>

<body class="bg-creativehub-black font-poppins text-white">

@include('home.components.nav_home')

<!-- Hero Section -->
@include('home.components.hero-home')

<!-- Category Section -->
@include('home.components.category')

    <!-- Pagination -->
    <section id="NewProduct" class="container max-w-[1200px] px-4 mx-auto mb-[102px] flex flex-col gap-8">
    <h2 class="font-semibold text-[32px]">Templates Category</h2>
    @include('home.components.card-products')


    {{-- Ini PAGINATION --}}
    <div class="flex justify-center items-center gap-y-2 flex-col mt-10">

    <span class="text-sm text-gray-400">Showing <span class="font-semibold text-white">"$firstItem"</span> to <span
            class="font-semibold text-white">"$lastItem"</span> of <span
            class="font-semibold text-white">$totalProducts</span> Entries</span>

        <nav aria-label="Page navigation example">
            <ul class="inline-flex -space-x-px text-sm">
                {{-- Previous Page Link --}}
                {{--                @if ($currentPage > 1)--}}
                <li>
                    <a href="#"
                       class="flex items-center justify-center px-3 h-8 ms-0 leading-tight border border-e-0 rounded-s-lg bg-[#1B1B1B] border-gray-700 text-gray-400 hover:bg-gray-700 hover:text-white">Previous</a>
                </li>
                {{--                @endif--}}

                {{-- Pagination Elements --}}
                {{--                @foreach ($window as $page)--}}
                {{--                    @if (is_string($page))--}}
                <li class="">
                <span
                    class="flex items-center justify-center px-3 h-8 leading-tight border bg-[#1B1B1B] border-gray-700 text-gray-400 hover:bg-gray-700 hover:text-white">"$page"</span>
                </li>
                {{--                    @elseif ($page == $currentPage)--}}
                <li class="">
                <span
                    class="flex items-center justify-center px-3 h-8 border border-gray-700 bg-[#1B1B1B] text-white hover:bg-gray-700 hover:text-white">"$page"</span>
                </li>
                {{--                    @else--}}
                <a href="#"
                   class="flex items-center justify-center px-3 h-8 leading-tight border bg-[#1B1B1B] border-gray-700 text-gray-400 hover:bg-gray-700 hover:text-white">"$page"</a>
                {{--                    @endif--}}
                {{--                @endforeach--}}

                {{-- Next Page Link --}}
                {{--                @if ($currentPage < $totalPages)--}}
                <li>
                    <a href="#"
                       class="flex items-center justify-center px-3 h-8 leading-tight border rounded-e-lg bg-[#1B1B1B] border-gray-700 text-gray-400 hover:bg-gray-700 hover:text-white">Next</a>
                </li>
                {{--                @endif--}}
            </ul>
        </nav>

    </div>
</section>

<!-- Testimonial Section -->
@include('home.components.comments')

<!-- Tools Section -->
@include('home.components.tools-slider')

<!-- <div class="w-[1129px] h-[368px] px-56 py-24 rounded-2xl border border-stone-900 flex-col justify-start items-start gap-2.5 inline-flex">
    <div class="flex-col justify-start items-center gap-8 flex">
        <div class="flex-col justify-start items-center flex">
            <div class="text-center text-neutral-400 text-lg font-normal font-['Poppins']">Access thousands of premium resources to elevate your designs.</div>
            <div class="text-center text-fuchsia-700 text-[46px] font-semibold font-['Poppins']">Unlock Full Creative Freedom</div>
        </div>
        <div class="h-12 px-[18px] py-2 bg-blue-600 rounded-[100px] border border-blue-600 justify-center items-center gap-2 inline-flex">
            <div class="text-center text-white text-base font-semibold font-['Poppins']">Get Started Now</div>
        </div>
    </div>
</div> -->

<!-- Footer -->
@include('home.components.footer')


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
@vite(['resources/css/app.css', 'resources/js/app.js', 'resource/css/output.css'])

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
