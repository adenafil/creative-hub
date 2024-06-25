<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Welcome Back ') }}
            {{ Auth::user()->name }}👋
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="grid grid-cols-4 gap-4 max-w-7xl mx-auto">
            <div class="wrapper card-group bg-white rounded-lg shadow dark:bg-gray-800 text-white py-6 px-4">
                <div class="flex items-center gap-4">
                    <div class="p-4 text-blue-600 bg-blue-300 rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path fill-rule="evenodd" d="M3 6a3 3 0 0 1 3-3h2.25a3 3 0 0 1 3 3v2.25a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3V6Zm9.75 0a3 3 0 0 1 3-3H18a3 3 0 0 1 3 3v2.25a3 3 0 0 1-3 3h-2.25a3 3 0 0 1-3-3V6ZM3 15.75a3 3 0 0 1 3-3h2.25a3 3 0 0 1 3 3V18a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3v-2.25Zm9.75 0a3 3 0 0 1 3-3H18a3 3 0 0 1 3 3V18a3 3 0 0 1-3 3h-2.25a3 3 0 0 1-3-3v-2.25Z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="flex flex-col">
                        <h1>Total Products</h1>
                        <span class="text-blue-300 font-bold text-2xl">{{$total_product ?? 0}}</span>
                    </div>
                </div>
            </div><div class="wrapper card-group bg-white rounded-lg shadow dark:bg-gray-800 text-white py-6 px-4">
                <div class="flex items-center gap-4">
                    <div class="p-4 text-teal-800 bg-teal-300 rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path fill-rule="evenodd" d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 0 0 4.25 22.5h15.5a1.875 1.875 0 0 0 1.865-2.071l-1.263-12a1.875 1.875 0 0 0-1.865-1.679H16.5V6a4.5 4.5 0 1 0-9 0ZM12 3a3 3 0 0 0-3 3v.75h6V6a3 3 0 0 0-3-3Zm-3 8.25a3 3 0 1 0 6 0v-.75a.75.75 0 0 1 1.5 0v.75a4.5 4.5 0 1 1-9 0v-.75a.75.75 0 0 1 1.5 0v.75Z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="flex flex-col">
                        <h1>Total Order</h1>
                        <span class="font-bold text-2xl text-teal-300">{{$total_order ?? 0}}</span>
                    </div>
                </div>
            </div><div class="wrapper card-group bg-white rounded-lg shadow dark:bg-gray-800 text-white py-6 px-4">
                <div class="flex items-center gap-4">
                    <div class="p-4 text-yellow-800 bg-yellow-300 rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path d="M10.464 8.746c.227-.18.497-.311.786-.394v2.795a2.252 2.252 0 0 1-.786-.393c-.394-.313-.546-.681-.546-1.004 0-.323.152-.691.546-1.004ZM12.75 15.662v-2.824c.347.085.664.228.921.421.427.32.579.686.579.991 0 .305-.152.671-.579.991a2.534 2.534 0 0 1-.921.42Z" />
                            <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 6a.75.75 0 0 0-1.5 0v.816a3.836 3.836 0 0 0-1.72.756c-.712.566-1.112 1.35-1.112 2.178 0 .829.4 1.612 1.113 2.178.502.4 1.102.647 1.719.756v2.978a2.536 2.536 0 0 1-.921-.421l-.879-.66a.75.75 0 0 0-.9 1.2l.879.66c.533.4 1.169.645 1.821.75V18a.75.75 0 0 0 1.5 0v-.81a4.124 4.124 0 0 0 1.821-.749c.745-.559 1.179-1.344 1.179-2.191 0-.847-.434-1.632-1.179-2.191a4.122 4.122 0 0 0-1.821-.75V8.354c.29.082.559.213.786.393l.415.33a.75.75 0 0 0 .933-1.175l-.415-.33a3.836 3.836 0 0 0-1.719-.755V6Z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="flex flex-col">
                        <h1>Total Revenue</h1>
                        <span class="font-bold text-2xl text-yellow-300">Rp {{number_format($total_revenue, 0, ',', '.') ?? 0 }}</span>
                    </div>
                </div>
            </div><div class="wrapper card-group bg-white rounded-lg shadow dark:bg-gray-800 text-white py-6 px-4">
                <div class="flex items-center gap-4">
                    <div class="p-4 text-purple-800 bg-purple-300 rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path d="M4.5 6.375a4.125 4.125 0 1 1 8.25 0 4.125 4.125 0 0 1-8.25 0ZM14.25 8.625a3.375 3.375 0 1 1 6.75 0 3.375 3.375 0 0 1-6.75 0ZM1.5 19.125a7.125 7.125 0 0 1 14.25 0v.003l-.001.119a.75.75 0 0 1-.363.63 13.067 13.067 0 0 1-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 0 1-.364-.63l-.001-.122ZM17.25 19.128l-.001.144a2.25 2.25 0 0 1-.233.96 10.088 10.088 0 0 0 5.06-1.01.75.75 0 0 0 .42-.643 4.875 4.875 0 0 0-6.957-4.611 8.586 8.586 0 0 1 1.71 5.157v.003Z" />
                        </svg>

                    </div>
                    <div class="flex flex-col">
                        <h1>Total Cutomer</h1>
                        <span class="font-bold text-2xl text-purple-300">{{$total_customer ?? 0}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Container-->
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">

        <!--Card-->
        <div id='recipients' class="px-4 py-8 mt-6 lg:mt-0 rounded shadow bg-white dark:text-white dark:bg-[#1F2937] flex flex-col items-start">
            <div class="flex items-center mb-2 gap-4">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 0 0 6 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0 1 18 16.5h-2.25m-7.5 0h7.5m-7.5 0-1 3m8.5-3 1 3m0 0 .5 1.5m-.5-1.5h-9.5m0 0-.5 1.5m.75-9 3-3 2.148 2.148A12.061 12.061 0 0 1 16.5 7.605" />
                </svg>

                <h1 class="text-2xl font-bold">5 Best selling products</h1>
            </div>

            <table id="productTable" class="stripe" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                <thead>
                <tr>
                    <th data-priority="1" class="text-center">No.</th>
                    <th data-priority="2" class="text-center">Product Image</th>
                    <th data-priority="3" class="text-center">Name</th>
                    <th data-priority="5" class="text-center">Price</th>
                    <th data-priority="6" class="text-center">Sold</th>
                </tr>
                </thead>
                <tbody>

{{--                @if(isset($products))--}}

{{--                @endif--}}

                @foreach ($top_products as $product)
                    <tr>
                        <td class="text-center">{{$loop->index + 1}}</td>
                        <td class="text-center">
                            <div class="img-wrapper flex justify-center">
                                <img src="
                                    {{
                                    \App\Helper\ImageHelper::isThisImage($product->image_product_url)
                                    ? $product->image_product_url
                                    : URL::signedRoute('file.view', ['encoded' => \App\Helper\ImageHelper::encodePath($product->image_product_url)])
                                                }}"
                                     class="w-16 h-full object-cover md:w-32 max-w-full max-h-full rounded-md" alt="">
                            </div>
                        </td>
                        <td class="text-center">{{$product->title}}</td>
                        <td class="text-center">{{number_format($product->price, 0, ',', '.') }}</td>
                        <td class="text-center">{{$product->total_transactions}}</td>
                    </tr>
{{--                @endforeach--}}
@endforeach
                </tbody>

            </table>
        </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-center">

            {{--            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">--}}
            {{--                <div class="p-6 text-gray-900 dark:text-gray-100">--}}
            {{--                    {{ __("You're logged in!") }}--}}
            {{--                </div>--}}
            {{--            </div>--}}


{{--            <div class="max-w-sm md:max-w-3xl w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">--}}
{{--                <div class="flex justify-between mb-3">--}}
{{--                    <div class="flex items-center">--}}
{{--                        <div class="flex justify-center items-center">--}}
{{--                            <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white pe-1">Overview Your Store</h5>--}}
{{--                            <svg data-popover-target="chart-info" data-popover-placement="bottom" class="w-3.5 h-3.5 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white cursor-pointer ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">--}}
{{--                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm0 16a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3Zm1-5.034V12a1 1 0 0 1-2 0v-1.418a1 1 0 0 1 1.038-.999 1.436 1.436 0 0 0 1.488-1.441 1.501 1.501 0 1 0-3-.116.986.986 0 0 1-1.037.961 1 1 0 0 1-.96-1.037A3.5 3.5 0 1 1 11 11.466Z"/>--}}
{{--                            </svg>--}}
{{--                            <div data-popover id="chart-info" role="tooltip" class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">--}}
{{--                                <div class="p-3 space-y-2">--}}
{{--                                    <h3 class="font-semibold text-gray-900 dark:text-white">Activity growth</h3>--}}
{{--                                    <p>Report helps navigate cumulative growth of community activities. Ideally, the chart should have a growing trend, as stagnating chart signifies a significant decrease of community activity.</p>--}}
{{--                                </div>--}}
{{--                                <div data-popper-arrow></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="bg-gray-50 dark:bg-gray-700 p-3 rounded-lg mb-8">--}}
{{--                    <div class="grid sm:grid-cols-1 md:grid-cols-3 gap-3 mb-2">--}}
{{--                        <dl class="bg-orange-50 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[78px]">--}}
{{--                            <dt class="py-1 px-4 rounded-md bg-orange-100 dark:bg-gray-500 text-orange-600 dark:text-orange-300 text-2xl font-bold flex items-center justify-center mb-1">12</dt>--}}
{{--                            <dd class="text-orange-600 dark:text-orange-300 text-sm font-medium">Total Product</dd>--}}
{{--                        </dl>--}}
{{--                        <dl class="bg-teal-50 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[78px]">--}}
{{--                            <dt class="py-1 px-4 rounded-md bg-teal-100 dark:bg-gray-500 text-teal-600 dark:text-teal-300 text-2xl font-bold flex items-center justify-center mb-1">9,999</dt>--}}
{{--                            <dd class="text-teal-600 dark:text-teal-300 text-sm font-medium">Total Order</dd>--}}
{{--                        </dl>--}}
{{--                        <dl class="bg-blue-50 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[78px]">--}}
{{--                            <dt class="py-1 px-4 rounded-md bg-blue-100 dark:bg-gray-500 text-blue-600 dark:text-blue-300 text-2xl font-bold flex items-center justify-center mb-1">Rp 12,250,000</dt>--}}
{{--                            <dd class="text-blue-600 dark:text-blue-300 text-sm font-medium">Total Revenue</dd>--}}
{{--                        </dl>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">--}}
{{--                    <div class="flex justify-between items-center pt-5">--}}
{{--                        <!-- Button -->--}}
{{--                        <button--}}
{{--                            id="dropdownDefaultButton"--}}
{{--                            data-dropdown-toggle="lastDaysdropdown"--}}
{{--                            data-dropdown-placement="bottom"--}}
{{--                            class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"--}}
{{--                            type="button">--}}
{{--                            Last 7 days--}}
{{--                            <svg class="w-2.5 m-2.5 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">--}}
{{--                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>--}}
{{--                            </svg>--}}
{{--                        </button>--}}
{{--                        <div id="lastDaysdropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">--}}
{{--                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">--}}
{{--                                <li>--}}
{{--                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Yesterday</a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Today</a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 7 days</a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 30 days</a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 90 days</a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <a--}}
{{--                            href="#"--}}
{{--                            class="uppercase text-sm font-semibold inline-flex items-center rounded-lg text-blue-600 hover:text-blue-700 dark:hover:text-blue-500  hover:bg-gray-100 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 px-3 py-2">--}}
{{--                            Progress report--}}
{{--                            <svg class="w-2.5 h-2.5 ms-1.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">--}}
{{--                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>--}}
{{--                            </svg>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}


        </div>
    </div>

        {{-- Resource CDN & Styling untuk datatables --}}
        @push('styles')
            <!--Regular Datatables CSS-->
            <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
            <!--Responsive Extension Datatables CSS-->
            <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">

            <style>
                /*Overrides for Tailwind CSS */

                /*Overide Pagination*/
                /*#pagination-controls nav .sm:hidden {*/

                /*}*/

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
