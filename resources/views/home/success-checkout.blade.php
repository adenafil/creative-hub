@php use Illuminate\Support\Facades\URL; @endphp
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
</head>

<body class="bg-creativehub-black font-poppins text-white">


<section id="Success" class="container max-w-[1130px] mx-auto">
    <div class="w-full flex items-center justify-center h-svh">
        <div class="flex flex-col items-center gap-[60px]">
            <div class="flex flex-col items-center">
                <div class="flex shrink-0 w-[174px] h-[174px] relative -z-10">
                    <img src="{{URL::to('/')}}/assets/icons/check-3d.svg" alt="icon">
                    <div
                        class="flex shrink-0 min-w-[264px] sm:w-[644px] absolute -translate-x-1/2 left-1/2 bottom-[35px] z-0">
                        <img src="{{URL::to('/')}}/assets/backgrounds/glitter.svg" alt="background">
                    </div>
                </div>
                <div class="flex flex-col text-center gap-1">
                    <p
                        class="font-semibold text-[36px] bg-clip-text text-transparent bg-gradient-to-r from-[#B05CB0] to-[#FCB16B]">
                        Success Checkout</p>
                    <p class="text-xs text-belibang-grey">Thank you for supporting our great creators</p>
                </div>
            </div>
            <a href="index.html"
               class="w-[290px] h-12 flex items-center justify-center rounded-full text-center bg-[#2D68F8] p-[8px_18px] font-semibold hover:bg-[#083297] active:bg-[#062162] transition-all duration-300">Check
                My Transactions</a>
        </div>
    </div>
</section>

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
