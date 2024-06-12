@php use App\Helper\ImageHelper; @endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage Your Products Here📈') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
<<<<<<< HEAD
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg flex justify-between items-center">
                <div class="p-4 sm:p-6 text-gray-900 dark:text-gray-100">
                    {{ __("My Products") }}
                </div>

                <a href="{{route('create.product')}}">
                    <x-primary-button class="p-6 mr-4 sm:mr-6">
                        {{ __('Add Product') }}
                    </x-primary-button>
                </a>
=======
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg flex justify-between items-center flex-col sm:flex-row py-6 gap-y-4">

                <form class="flex items-center ml-4 w-2/3">
                    <label for="simple-search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search..." required />
                    </div>
                    <button type="submit" class="p-2.5 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-gray-700 focus:ring-4 focus:outline-none bg-[#1F2937] focus:ring-[#1F2937] hover:bg-gray-700 ">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                </form>


>>>>>>> e56b32449f277dce4e742b00d3dccc177116bb74
            </div>
        </div>

        <!--Container-->
<<<<<<< HEAD
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 shadow-md mt-6">

            <!--Card-->
            <div id='recipients' class="px-4 mt-6 lg:mt-0 rounded shadow bg-white dark:text-white dark:bg-[#1F2937]">

=======
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">


            <!--Card-->
            <div id='recipients' class="px-4 py-8 mt-6 lg:mt-0 rounded shadow bg-white dark:text-white dark:bg-[#1F2937] flex flex-col items-start sm:items-end">

                <a href="{{route('create.product')}}">
                    <x-primary-button @class('mr-0 sm:mr-10')>
                        {{ __('Add Product') }}
                    </x-primary-button>
                </a>
>>>>>>> e56b32449f277dce4e742b00d3dccc177116bb74

                <table id="productTable" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
                    <tr>
                        <th data-priority="1">No.</th>
                        <th data-priority="2">Product Image</th>
                        <th data-priority="3">Name</th>
                        <th data-priority="4">Category</th>
                        <th data-priority="5">Price</th>
                        <th data-priority="6">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @if(isset($products))

                    @endif

                    @foreach ($products as $product)
                        <tr>
                            <td class="text-center">{{($products->currentPage() - 1) * $products->perPage() + $loop->iteration}}</td>
                            <td class="">
                                <div class="img-wrapper h-24">
                                    <img src="
                                    {{
                                    ImageHelper::isThisImage($product->image_product_url)
                                    ? $product->image_product_url
                                    : URL::signedRoute('file.view', ['encoded' => base64_encode($product->image_product_url)])
                                                }}"
                                         class="w-16 h-full object-cover md:w-32 max-w-full max-h-full rounded-md" alt="">
                                </div>
                            </td>
                            <td class="text-center">{{ $product->title }}</td>
                            <td class="text-center">{{strtoupper($product->category->name)}}</td>
                            <td class="text-center">Rp. {{ number_format($product->price, 0, ',', '.') }}</td>
                            <td class="">
                                <div class="btn-group flex items-center gap-2 justify-center">
                                    <a href="{{route('product.edit', $product->id)}}" class="flex h-fit">
                                        <button type="button" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5">Edit</button>
                                    </a>
                                    <form action="{{ route('product.destroy', ['id' => $product->id, 'page' => request()->get('page')]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach

<<<<<<< HEAD
                    <!-- Rest of your data (refer to https://datatables.net/examples/server_side/ for server side processing)-->
{{--                    <tr>--}}
{{--                        <td class="text-center">2.</td>--}}
{{--                        <td class="">--}}
{{--                            <div class="img-wrapper h-24">--}}
{{--                                <img src="https://cdn.dribbble.com/userupload/2993027/file/original-4f2a6c9bfe6c2230805e568eedf0e0a0.png?resize=400x0"--}}
{{--                                     class="w-16 h-full object-cover md:w-32 max-w-full max-h-full rounded-md" alt="">--}}
{{--                            </div>--}}
{{--                        </td>--}}
{{--                        <td class="text-center">Graphic Designer Template Web Portfolio</td>--}}
{{--                        <td class="text-center">Template</td>--}}
{{--                        <td class="text-center">Rp 1,300,500</td>--}}
{{--                        <td class="">--}}
{{--                            <div class="btn-group flex items-center gap-2 justify-center">--}}
{{--                                <a href="#" class="flex h-fit">--}}
{{--                                    <button type="button" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5">Edit</button>--}}
{{--                                </a>--}}
{{--                                <form action="#" method="post" class="flex h-fit">--}}
{{--                                    @csrf--}}
{{--                                    @method('DELETE')--}}
{{--                                    <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5">Delete</button>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </td>--}}
{{--                    </tr><tr>--}}
{{--                        <td class="text-center">3.</td>--}}
{{--                        <td class="">--}}
{{--                            <div class="img-wrapper h-24">--}}
{{--                                <img src="https://assets-global.website-files.com/5e3ce2ec7f6e53c045fe7cfa/6050ac4f4030c27b8aef9023_Thumbnail%20(2)%20(1).png"--}}
{{--                                     class="w-16 h-full object-cover md:w-32 max-w-full max-h-full rounded-md" alt="">--}}
{{--                            </div>--}}
{{--                        </td>--}}
{{--                        <td class="text-center">Socially UI Kit</td>--}}
{{--                        <td class="text-center">UI Kit</td>--}}
{{--                        <td class="text-center">Rp 69,999</td>--}}
{{--                        <td class="">--}}
{{--                            <div class="btn-group flex items-center gap-2 justify-center">--}}
{{--                                <a href="#" class="flex h-fit">--}}
{{--                                    <button type="button" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5">Edit</button>--}}
{{--                                </a>--}}
{{--                                <form action="#" method="post" class="flex h-fit">--}}
{{--                                    @csrf--}}
{{--                                    @method('DELETE')--}}
{{--                                    <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5">Delete</button>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </td>--}}
{{--                    </tr>--}}
                    </tbody>

                </table>


            </div>

            <!-- Pagination Controls -->
            <div id="pagination-controls" class="mt-4 flex justify-center items-center gap-4">
                {{ $products->links() }}
            </div>

            <!--/Card-->
        </div>


        <!--/container-->
=======
                    </tbody>

                </table>
            </div>

            <div class="flex justify-center items-center gap-y-2 flex-col mt-10">

                <span class="text-sm text-gray-700 dark:text-gray-400">Showing <span class="font-semibold text-gray-900 dark:text-white">{{ $firstItem }}</span> to <span class="font-semibold text-gray-900 dark:text-white">{{ $lastItem }}</span> of <span class="font-semibold text-gray-900 dark:text-white">{{ $totalProducts }}</span> Entries</span>

                <nav aria-label="Page navigation example">
                    <ul class="inline-flex -space-x-px text-sm">
                        {{-- Previous Page Link --}}
                        @if ($currentPage > 1)
                        <li>
                            <a href="{{ url()->current() }}?page={{ $currentPage - 1 }}" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
                        </li>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($window as $page)
                            @if (is_string($page))
                                <li class="">
                                    <span class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">{{ $page }}</span>
                                </li>
                            @elseif ($page == $currentPage)
                                <li class="">
                                    <span class="flex items-center justify-center px-3 h-8 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">{{ $page }}</span>
                                </li>
                            @else
                                <a href="{{ url()->current() }}?page={{ $page }}" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">{{ $page }}</a>
                            @endif
                        @endforeach

                        {{-- Next Page Link --}}
                        @if ($currentPage < $totalPages)
                            <li>
                                <a href="{{ url()->current() }}?page={{ $currentPage + 1 }}" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
                            </li>
                        @endif
                    </ul>
                </nav>

            </div>
        </div>

>>>>>>> e56b32449f277dce4e742b00d3dccc177116bb74
    </div>

    {{-- Resource CDN & Styling untuk datatables --}}
    @push('styles')
        <!--Regular Datatables CSS-->
        <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
        <!--Responsive Extension Datatables CSS-->
        <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">

        <style>
            /*Overrides for Tailwind CSS */

<<<<<<< HEAD
=======
            /*Overide Pagination*/
            /*#pagination-controls nav .sm:hidden {*/

            /*}*/
>>>>>>> e56b32449f277dce4e742b00d3dccc177116bb74

            /*Form fields*/
            .dataTables_wrapper select,
            .dataTables_wrapper .dataTables_filter input {
                color: #4a5568;
                /*text-gray-700*/
                padding-left: 1rem;
                /*pl-4*/
                padding-right: 1rem;
                /*pl-4*/
                padding-top: .5rem;
                /*pl-2*/
                padding-bottom: .5rem;
                /*pl-2*/
                line-height: 1.25;
                /*leading-tight*/
                border-width: 2px;
                /*border-2*/
                border-radius: .25rem;
                border-color: #edf2f7;
                /*border-gray-200*/
                background-color: #edf2f7;
                /*bg-gray-200*/
            }

            /*Row Hover*/
            table.dataTable.hover tbody tr:hover,
            table.dataTable.display tbody tr:hover {
                background-color: #ebf4ff;
                /*bg-indigo-100*/
            }

<<<<<<< HEAD
            /*Pagination Buttons*/
            /*.dataTables_wrapper .dataTables_paginate .paginate_button {*/
            /*    font-weight: 700;*/
            /*    !*font-bold*!*/
            /*    border-radius: .25rem;*/
            /*    !*rounded*!*/
            /*    border: 1px solid transparent;*/
            /*    !*border border-transparent*!*/
            /*}*/

            /*Pagination Buttons - Current selected */
            /*.dataTables_wrapper .dataTables_paginate .paginate_button.current {*/
            /*    color: #fff !important;*/
            /*    !*text-white*!*/
            /*    box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);*/
            /*    !*shadow*!*/
            /*    font-weight: 700;*/
            /*    !*font-bold*!*/
            /*    border-radius: .25rem;*/
            /*    !*rounded*!*/
            /*    background: #667eea !important;*/
            /*    !*bg-indigo-500*!*/
            /*    border: 1px solid transparent;*/
            /*    !*border border-transparent*!*/
            /*    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {*/
            /*        color: #fff !important;*/
            /*        !*text-white*!*/
            /*        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);*/
            /*        !*shadow*!*/
            /*        font-weight: 700;*/
            /*        !*font-bold*!*/
            /*        border-radius: .25rem;*/
            /*        !*rounded*!*/
            /*        background: #667eea !important;*/
            /*        !*bg-indigo-500*!*/
            /*        border: 1px solid transparent;*/
            /*        !*border border-transparent*!*/
            /*    }*/


=======
>>>>>>> e56b32449f277dce4e742b00d3dccc177116bb74
            /*Pagination Buttons - Hover */

            /*Add padding to bottom border */
            table.dataTable.no-footer {
                border-bottom: 1px solid #e2e8f0;
                /*border-b-1 border-gray-300*/
                margin-top: 0.75em;
                margin-bottom: 0.75em;
            }

            /*Change colour of responsive icon*/
            table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before,
            table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
                background-color: #667eea !important;
                /*bg-indigo-500*/
            }

            /* Ensure horizontal scrolling */
            div.dataTables_wrapper {
                width: 100%;
                overflow-x: auto;
            }

            /*table.dataTable>tbody>tr.child ul.dtr-details {*/
            /*    width: 100%;*/
            /*}*/

            #productTable_info, #productTable_paginate, #productTable_length, #productTable_filter {
                display: none!important;
            }
            .dataTables_scrollBody{
                border-bottom: none!important;
            }

            /* Dark mode styles for .dataTables_length */
            @media (prefers-color-scheme: dark) {
                .dataTables_wrapper .dataTables_length, #productTable_filter, #productTable_info {
                    background-color: #1F2937;
                    /*bg-gray-800*/
                    color: #E5E7EB;
                    /*text-gray-200*/
                }
                #productTable_previous, #productTable_next, .dataTables_wrapper .dataTables_paginate .paginate_button{
                    color: #E5E7EB!important;
                }

                .dataTables_wrapper .dataTables_length select {
                    background-color: #374151;
                    /*bg-gray-700*/
                    color: #E5E7EB;
                    /*text-gray-200*/
                }

                .dataTables_wrapper.no-footer .dataTables_scrollBody, table.dataTable thead th, table.dataTable thead td{
                    border-bottom: 1px solid white;
                }

                .odd {
                    background-color: #293545!important;
                }
                .even{
                    background-color: #1F2937!important;
                }
                table.dataTable tbody tr {
                    background-color: #1F2937;
                }
            }

        </style>
    @endpush

    {{-- Resource CDN & Script Datatables --}}
    @push('scripts')
        <!-- jQuery -->
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

        <!--Datatables -->
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
        <script>
            $(document).ready(function() {

                let table = $('#productTable').DataTable({
                    responsive: true, scrollX: true
                }).columns.adjust().responsive.recalc();
            });


        </script>
    @endpush
</x-app-layout>
