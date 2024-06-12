<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ini Detail Orderanmu Brody') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
<<<<<<< HEAD
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("See your order details here") }}
                </div>
=======
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg px-4 py-12 sm:px-8 flex flex-col gap-16">

                <div class="order-details flex flex-col gap-4">
                    <div class="badge-category flex items-center gap-2 text-white bg-blue-600 dark:bg-blue-600/50 dark:text-blue-300 max-w-fit py-1 px-2 sm:py-2 sm:px-4 rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4 sm:size-6">
                            <path fill-rule="evenodd" d="M3 6a3 3 0 0 1 3-3h2.25a3 3 0 0 1 3 3v2.25a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3V6Zm9.75 0a3 3 0 0 1 3-3H18a3 3 0 0 1 3 3v2.25a3 3 0 0 1-3 3h-2.25a3 3 0 0 1-3-3V6ZM3 15.75a3 3 0 0 1 3-3h2.25a3 3 0 0 1 3 3V18a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3v-2.25Zm9.75 0a3 3 0 0 1 3-3H18a3 3 0 0 1 3 3V18a3 3 0 0 1-3 3h-2.25a3 3 0 0 1-3-3v-2.25Z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-sm sm:text-lg">Icon</span>
                    </div>

                    <div class="img-wrapper md:w-3/4 lg:w-3/4 object-cover">
                        <img src="https://cdn3d.iconscout.com/3d-pack/preview/games-35-139216.jpg"
                             alt=""
                        class="w-full h-full object-cover rounded-xl">
                    </div>

                    <h1 class="dark:text-white font-bold text-2xl sm:text-5xl pt-4">3D RPG CUYY Game Icon</h1>
                    <div class="text-description text-creativehub-grey text-sm md:text-lg lg:text-lg leading-relaxed dark:text-white">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aliquid, blanditiis cupiditate ipsum nihil perferendis quod. Accusantium alias amet animi at autem beatae blanditiis commodi consequuntur culpa cupiditate dolore dolorem doloremque est et facere incidunt, ipsa laudantium magnam, maiores nostrum omnis perspiciatis placeat quaerat quibusdam reiciendis repellendus velit voluptate? Consequuntur dolorem dolores facere illo, in ipsa nostrum quaerat rerum saepe, similique temporibus veniam voluptatem voluptatibus! Ducimus, eius eveniet ex illum labore molestias nam neque, nobis, officiis perspiciatis porro rerum tempore tenetur. Ab error molestiae soluta! Aspernatur blanditiis consequatur cupiditate expedita incidunt itaque maxime, officia placeat repellendus sed. Ad, ex!</p>
                    </div>
                </div>

                <div class="proof flex flex-col gap-6">
                    <h1 class="text-2xl dark:text-white font-bold">Bukti Pembayaran</h1>
                    <div class="proof-image w-full sm:w-1/5 md:w-1/5 ">
                        <img src="https://i.pinimg.com/originals/68/ed/dc/68eddcea02ceb29abde1b1c752fa29eb.jpg" alt="">
                    </div>

                    <div class="price-and-status flex gap-4 items-center">
                        <p class="dark:text-white text-2xl">Rp 5,000,000</p>
                        <div class="status-order">
                            {{-- Pending Status --}}
                                <span class="bg-yellow-100 text-yellow-800 text-sm font-medium me-2 px-4 py-1.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300">Pending</span>

                                {{-- if u want use this state, please remove class 'hidden' --}}
                            {{-- Disapprove Status --}}
                                <span class="hidden bg-red-100 text-red-800 text-sm font-medium me-2 px-4 py-1.5 rounded-full dark:bg-red-900 dark:text-red-300">Disapprove</span>

                                {{-- Paid Status --}}
                                <span class="hidden bg-green-100 text-green-800 text-sm font-medium me-2 px-4 py-1.5 rounded-full dark:bg-green-900 dark:text-green-300">Paid</span>
                        </div>
                    </div>


                    {{-- Ketika seller sudah melakukan approval maka button dibawah ini akan hilang --}}
                    <div class="action-group flex mt-8">
                        <a href="#" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Approve</a>

                        <!-- Modal toggle -->
                        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" type="button">
                            Disapprove
                        </button>

                        <!-- Main modal -->
                        <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                            Give your reason
                                        </h3>
                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <form class="p-4 md:p-5">
                                        <div class="grid gap-4 mb-4 grid-cols-2">
                                            <div class="col-span-2">
                                                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Please provide your reasons for rejecting this order</label>
                                                <textarea id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write product description here"></textarea>
                                            </div>
                                        </div>

                                        {{-- Button Submit --}}
                                        <a href="#" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            Submit
                                        </a>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>

>>>>>>> e56b32449f277dce4e742b00d3dccc177116bb74
            </div>
        </div>
    </div>
</x-app-layout>
