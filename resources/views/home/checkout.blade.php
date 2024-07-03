@php use App\Helper\ImageHelper;use Illuminate\Support\Facades\URL; @endphp
    <!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
</style>

<body class="bg-creativehub-black font-poppins text-white">

<!-- Navbar -->
@include('home.components.nav_home')

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
@include('home.components.footer')

@include('sweetalert::alert')

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
@vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/output.css'])

</body>
</html>
