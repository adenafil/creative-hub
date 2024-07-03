@php use App\Helper\ImageHelper; @endphp
<section class="py-24 ">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div
            class="flex justify-center items-center gap-y-8 lg:gap-y-0 flex-wrap md:flex-wrap lg:flex-nowrap lg:flex-row lg:justify-between lg:gap-x-8 max-w-sm sm:max-w-2xl lg:max-w-full mx-auto">
            <div class="w-full lg:w-2/5">
                <span class="text-sm text-white font-medium mb-4 block lg:text-left md:text-center">Testimonial</span>
                <h2 class="text-4xl font-bold leading-[3.25rem] mb-8 from-[#B05CB0] to-[#FCB16B] bg-clip-text text-transparent bg-gradient-to-r">
                    Customers Are Happy <span
                        class="text-transparent bg-clip-text bg-gradient-to-tr text-white">With Our Products</span>
                </h2>
                <!-- Slider controls -->
                <div class="flex items-center justify-center lg:justify-start gap-10">
                    <button id="slider-button-left"
                            class="swiper-button-prev group flex justify-center items-center border-2 border-solid border-white transition-all duration-500 rounded-lg hover:bg-[#B05CB0] z-10"
                            data-carousel-prev>
                        <svg class="h-6 w-6 text-white group-hover:text-white" viewBox="0 0 24 24" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M20.9999 12L4.99992 12M9.99992 6L4.70703 11.2929C4.3737 11.6262 4.20703 11.7929 4.20703 12C4.20703 12.2071 4.3737 12.3738 4.70703 12.7071L9.99992 18"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"/>
                        </svg>

                    </button>
                    <button id="slider-button-right"
                            class="swiper-button-next group flex justify-center items-center border-2 border-solid border-white transition-all duration-500 rounded-lg hover:bg-[#B05CB0]"
                            data-carousel-next>
                        <svg class="h-6 w-6 text-white group-hover:text-white" viewBox="0 0 24 24" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M3 12L19 12M14 18L19.2929 12.7071C19.6262 12.3738 19.7929 12.2071 19.7929 12C19.7929 11.7929 19.6262 11.6262 19.2929 11.2929L14 6"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"/>
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
                            <div
                                class="swiper-slide group bg-img-transparent hover:bg-img-purple-to-orange p-[2px] rounded-2xl max-sm:max-w-sm max-sm:mx-auto transition-all duration-500 group:">
                                <div
                                    class="p-6 bg-img-black-gradient group-active:bg-img-black transition-all duration-300 rounded-2xl">
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

                                        " alt="avatar"
                                             class="w-12 h-12">
                                        <div class="grid gap-1">
                                            <h5 class="font-bold bg-clip-text text-transparent bg-gradient-to-r from-[#B05CB0] to-[#FCB16B] transition-all duration-500">{{ $review->user->name }}</h5>
                                            <span
                                                class="text-sm leading-6 text-creativehub-light-grey hover:text-white">{{ $review->user->user_detail->title ?? "" }}</span>
                                        </div>
                                    </div>
                                    <div
                                        class="flex items-center mb-5 sm:mb-9 gap-2 text-amber-500 transition-all duration-500">

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
