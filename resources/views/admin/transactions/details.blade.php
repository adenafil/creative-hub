<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('History For Your Transactions 🧾') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-12">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg px-4 py-12 sm:px-8 flex flex-col gap-16">

                <div class="order-details flex flex-col gap-4">
                    <div class="badge-category flex items-center gap-2 text-white bg-blue-600 dark:bg-blue-600/50 dark:text-blue-300 max-w-fit py-1 px-2 sm:py-2 sm:px-4 rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4 sm:size-6">
                            <path fill-rule="evenodd" d="M3 6a3 3 0 0 1 3-3h2.25a3 3 0 0 1 3 3v2.25a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3V6Zm9.75 0a3 3 0 0 1 3-3H18a3 3 0 0 1 3 3v2.25a3 3 0 0 1-3 3h-2.25a3 3 0 0 1-3-3V6ZM3 15.75a3 3 0 0 1 3-3h2.25a3 3 0 0 1 3 3V18a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3v-2.25Zm9.75 0a3 3 0 0 1 3-3H18a3 3 0 0 1 3 3V18a3 3 0 0 1-3 3h-2.25a3 3 0 0 1-3-3v-2.25Z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-sm sm:text-lg">{{$purchase_detail->name}}</span>
                    </div>

                    <div class="img-wrapper md:w-3/4 lg:w-3/4 object-cover">
                        <img src="
                        {{
                    \App\Helper\ImageHelper::isThisImage($purchase_detail->image_product_url)
            ? $purchase_detail->image_product_url
            : URL::signedRoute('file.view', ['encoded' => \App\Helper\ImageHelper::encodePath($purchase_detail->image_product_url)])
                        }}
                        "
                             alt=""
                             class="w-full h-full object-cover rounded-xl">
                    </div>

                    <h1 class="dark:text-white font-bold text-2xl sm:text-5xl pt-4">{{$purchase_detail->title}}</h1>
                    <div class="text-description text-creativehub-grey text-sm md:text-lg lg:text-lg leading-relaxed dark:text-white">
                        {!! $purchase_detail->description !!}
                    </div>
                </div>



                <div class="proof flex flex-col gap-6">
                    <h1 class="text-2xl dark:text-white font-bold">Bukti Pembayaran</h1>
                    <div class="proof-image w-full sm:w-1/5 md:w-1/5 ">
                        <img src="
                                                {{
                    \App\Helper\ImageHelper::isThisImage($purchase_detail->payment_proof_url)
            ? $purchase_detail->payment_proof_url
            : URL::signedRoute('proof.file', ['encoded' => \App\Helper\ImageHelper::encodePath($purchase_detail->payment_proof_url)])
                        }}
                        " alt="">
                    </div>


                    <div class="price-and-status flex gap-4 items-center">
                        <p class="dark:text-white text-2xl">Rp. {{$purchase_detail->price}}</p>
                        <div class="status-order">

                            @if($purchase_detail->status == 'pending')
                                {{-- Pending Status --}}
                                <span class="bg-yellow-100 text-yellow-800 text-sm font-medium me-2 px-4 py-1.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300">Pending</span>
                            @elseif($purchase_detail->status == 'disapprove')
                                {{-- if u want use this state, please remove class 'hidden' --}}
                                {{-- Disapprove Status --}}
                                <span class="bg-red-100 text-red-800 text-sm font-medium me-2 px-4 py-1.5 rounded-full dark:bg-red-900 dark:text-red-300">Disapprove</span>
                            @elseif($purchase_detail->status == 'paid')
                                {{-- Paid Status --}}
                                <span class="bg-green-100 text-green-800 text-sm font-medium me-2 px-4 py-1.5 rounded-full dark:bg-green-900 dark:text-green-300">Paid</span>
                            @endif
                        </div>
                    </div>
                    @if($purchase_detail->status == 'paid')
                        <div class="action-group flex">
                            <a href="{{route('download.asset', ['id' =>$purchase_detail->id])}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Download</a>
                        </div>
                    @endif



                    {{-- Ketika status pesanan sudah PAID baru muncul button download --}}

                </div>
            </div>


            @if($review != null)
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg px-4 py-12 sm:px-8">
                    <h1 class="text-2xl dark:text-white font-bold">Your Feedback</h1>
                    <p class="text-creativehub-grey text-sm md:text-lg lg:text-lg leading-relaxed dark:text-white">The stars you gave</p>

                    <div class="flex items-center mb-5 sm:mb-9 gap-2 text-amber-500 transition-all duration-500">


                        @for($i = 1; $i <= 5; $i++)
                            @if($i <= $review->star)
                                {{-- Ini State bintang ya maniez --}}
                                {{-- Ini ketika filled (bintang kuning) --}}
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

                    <div class="comments flex flex-col">
                        <div class="comments-title flex gap-2 dark:text-gray-400 ">
                            <p>Comments</p>&#9737;<span>{{$review->updated_at}}</span>
                        </div>
                        <div class="text-creativehub-grey text-sm md:text-lg lg:text-lg leading-relaxed dark:text-white">
                            {{$review->comments}}
                        </div>

                    </div>
                </div>
            @endif

        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-12">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg px-4 py-12 sm:px-8 flex flex-col gap-8">
                    <div>
                        <h1 class="dark:text-white font-bold text-2xl sm:text-5xl pt-4">Rejected Form</h1>
                        <p id="seller_reason" class="text-description text-creativehub-grey text-sm md:text-lg lg:text-lg leading-relaxed dark:text-white mt-2">Bukti pembayaranmu keliruu suuu!!!</p>
                    </div>
                    <div class="w-full flex flex-col gap-4">
                        <p class="text-description text-creativehub-grey text-sm md:text-lg lg:text-lg leading-relaxed dark:text-white mt-2">Confirm Payment</p>
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
                                    <p class="text-gray-900 dark:text-white">Choose File</p>
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
                                    class="rounded-full text-center bg-[#2D68F8] p-[8px_18px] font-semibold hover:bg-[#083297] active:bg-[#062162] transition-all duration-300">Update Proof</button>
                        @else
                            <a href="#"
                               class="rounded-full text-center bg-[#2D68F8] p-[8px_18px] font-semibold hover:bg-[#083297] active:bg-[#062162] transition-all duration-300">Update Proof</a>
                        @endif
                    </div>

                </div>

            </div>
        </div>
    </div>


</x-app-layout>
