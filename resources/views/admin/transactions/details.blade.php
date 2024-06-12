<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
<<<<<<< HEAD
            {{ __('Ini Details My Transactions') }}
=======
            {{ __('Ini Index My Transactions') }}
>>>>>>> e56b32449f277dce4e742b00d3dccc177116bb74
        </h2>
    </x-slot>

    <div class="py-12">
<<<<<<< HEAD
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("DETAILLL") }}
                </div>
            </div>
        </div>
    </div>
=======
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-12">
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
                            <span class="hidden bg-yellow-100 text-yellow-800 text-sm font-medium me-2 px-4 py-1.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300">Pending</span>

                            {{-- if u want use this state, please remove class 'hidden' --}}
                            {{-- Disapprove Status --}}
                            <span class="hidden bg-red-100 text-red-800 text-sm font-medium me-2 px-4 py-1.5 rounded-full dark:bg-red-900 dark:text-red-300">Disapprove</span>

                            {{-- Paid Status --}}
                            <span class="bg-green-100 text-green-800 text-sm font-medium me-2 px-4 py-1.5 rounded-full dark:bg-green-900 dark:text-green-300">Paid</span>
                        </div>
                    </div>


                    {{-- Ketika status pesanan sudah PAID baru muncul button download --}}
                    <div class="action-group flex mt-8">
                        <a href="#" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Download</a>

                    </div>

                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg px-4 py-12 sm:px-8">
                <h1 class="text-2xl dark:text-white font-bold">Your Feedback</h1>
                <p class="text-creativehub-grey text-sm md:text-lg lg:text-lg leading-relaxed dark:text-white">The stars you gave</p>

                <div class="flex items-center mb-5 sm:mb-9 gap-2 text-amber-500 transition-all duration-500">

                    {{-- Ini State bintang ya maniez --}}
                    {{-- Ini ketika filled (bintang kuning) --}}
                    <svg class="w-5 h-5" viewBox="0 0 18 17" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M8.10326 1.31699C8.47008 0.57374 9.52992 0.57374 9.89674 1.31699L11.7063 4.98347C11.8519 5.27862 12.1335 5.48319 12.4592 5.53051L16.5054 6.11846C17.3256 6.23765 17.6531 7.24562 17.0596 7.82416L14.1318 10.6781C13.8961 10.9079 13.7885 11.2389 13.8442 11.5632L14.5353 15.5931C14.6754 16.41 13.818 17.033 13.0844 16.6473L9.46534 14.7446C9.17402 14.5915 8.82598 14.5915 8.53466 14.7446L4.91562 16.6473C4.18199 17.033 3.32456 16.41 3.46467 15.5931L4.15585 11.5632C4.21148 11.2389 4.10393 10.9079 3.86825 10.6781L0.940384 7.82416C0.346867 7.24562 0.674378 6.23765 1.4946 6.11846L5.54081 5.53051C5.86652 5.48319 6.14808 5.27862 6.29374 4.98347L8.10326 1.31699Z"
                            fill="currentColor"></path>
                    </svg>
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

                <div class="comments flex flex-col">
                    <div class="comments-title flex gap-2 dark:text-gray-400 ">
                        <p>Comments</p>&#9737;<span> 12-06-2024</span>
                    </div>
                    <div class="text-creativehub-grey text-sm md:text-lg lg:text-lg leading-relaxed dark:text-white">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aperiam earum est et ipsam magni, maiores mollitia neque odit praesentium quos repellat sequi sunt temporibus, voluptatem! Accusamus aliquam, aliquid animi atque consequatur cum dignissimos dolor doloremque dolores dolorum eligendi exercitationem facilis fuga ipsam minima nam, nesciunt nihil odio officia placeat praesentium quidem quos ullam, unde vero? Aperiam debitis dicta labore officia placeat praesentium! Ab cum doloribus ea iure. At quasi, quis? Aperiam architecto aspernatur id. A blanditiis eligendi enim eveniet magni pariatur repudiandae, vitae voluptates. Accusamus aperiam aspernatur beatae corporis dicta esse, eum facilis in molestias, numquam perspiciatis placeat qui reiciendis sed unde! Ab blanditiis consectetur consequuntur cum dolorem fugiat in ipsa iste, maiores modi nulla, quidem rerum sapiente sed veniam voluptatum?
                    </div>

                </div>
            </div>

        </div>
    </div>


>>>>>>> e56b32449f277dce4e742b00d3dccc177116bb74
</x-app-layout>
