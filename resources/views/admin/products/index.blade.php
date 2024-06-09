<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage Your Products Here📈') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg flex justify-between items-center">
                <div class="p-4 sm:p-6 text-gray-900 dark:text-gray-100">
                    {{ __("My Products") }}
                </div>

                <a href="">
                    <x-primary-button class="p-6 mr-4 sm:mr-6">
                        {{ __('Add Product') }}
                    </x-primary-button>
                </a>
            </div>
        </div>

        <!--Container-->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 shadow-md mt-6">

            <!--Card-->
            <div id='recipients' class="py-8 px-4 mt-6 lg:mt-0 rounded shadow bg-white dark:text-white dark:bg-[#1F2937]">


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
                    <tr>
                        <td class="text-center">1.</td>
                        <td class="">
                            <div class="img-wrapper h-24">
                                <img src="https://i.pinimg.com/originals/bb/28/0a/bb280a11daadc46c30a8dd9bfc52d36d.png"
                                class="w-16 h-full object-cover md:w-32 max-w-full max-h-full rounded-md" alt="">
                            </div>
                        </td>
                        <td class="text-center">"Smartify" - Smarthome App UI Kit</td>
                        <td class="text-center">UI Kit</td>
                        <td class="text-center">Rp 199,999</td>
                        <td class="">
                            <div class="btn-group flex items-center gap-2 justify-center">
                                <a href="#" class="flex h-fit">
                                    <button type="button" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5">Edit</button>
                                </a>
                                <form action="#" method="post" class="flex h-fit">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <!-- Rest of your data (refer to https://datatables.net/examples/server_side/ for server side processing)-->
                    <tr>
                        <td class="text-center">2.</td>
                        <td class="">
                            <div class="img-wrapper h-24">
                                <img src="https://cdn.dribbble.com/userupload/2993027/file/original-4f2a6c9bfe6c2230805e568eedf0e0a0.png?resize=400x0"
                                     class="w-16 h-full object-cover md:w-32 max-w-full max-h-full rounded-md" alt="">
                            </div>
                        </td>
                        <td class="text-center">Graphic Designer Template Web Portfolio</td>
                        <td class="text-center">Template</td>
                        <td class="text-center">Rp 1,300,500</td>
                        <td class="">
                            <div class="btn-group flex items-center gap-2 justify-center">
                                <a href="#" class="flex h-fit">
                                    <button type="button" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5">Edit</button>
                                </a>
                                <form action="#" method="post" class="flex h-fit">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr><tr>
                        <td class="text-center">3.</td>
                        <td class="">
                            <div class="img-wrapper h-24">
                                <img src="https://assets-global.website-files.com/5e3ce2ec7f6e53c045fe7cfa/6050ac4f4030c27b8aef9023_Thumbnail%20(2)%20(1).png"
                                     class="w-16 h-full object-cover md:w-32 max-w-full max-h-full rounded-md" alt="">
                            </div>
                        </td>
                        <td class="text-center">Socially UI Kit</td>
                        <td class="text-center">UI Kit</td>
                        <td class="text-center">Rp 69,999</td>
                        <td class="">
                            <div class="btn-group flex items-center gap-2 justify-center">
                                <a href="#" class="flex h-fit">
                                    <button type="button" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5">Edit</button>
                                </a>
                                <form action="#" method="post" class="flex h-fit">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    </tbody>

                </table>


            </div>
            <!--/Card-->
        </div>
        <!--/container-->
    </div>

    {{-- Resource CDN & Styling untuk datatables --}}
    @push('styles')
        <!--Regular Datatables CSS-->
        <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
        <!--Responsive Extension Datatables CSS-->
        <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">

        <style>
            /*Overrides for Tailwind CSS */


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

            /*Pagination Buttons*/
            .dataTables_wrapper .dataTables_paginate .paginate_button {
                font-weight: 700;
                /*font-bold*/
                border-radius: .25rem;
                /*rounded*/
                border: 1px solid transparent;
                /*border border-transparent*/
            }

            /*Pagination Buttons - Current selected */
            .dataTables_wrapper .dataTables_paginate .paginate_button.current {
                color: #fff !important;
                /*text-white*/
                box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
                /*shadow*/
                font-weight: 700;
                /*font-bold*/
                border-radius: .25rem;
                /*rounded*/
                background: #667eea !important;
                /*bg-indigo-500*/
                border: 1px solid transparent;
                /*border border-transparent*/
            }

            /*Pagination Buttons - Hover */
            .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
                color: #fff !important;
                /*text-white*/
                box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
                /*shadow*/
                font-weight: 700;
                /*font-bold*/
                border-radius: .25rem;
                /*rounded*/
                background: #667eea !important;
                /*bg-indigo-500*/
                border: 1px solid transparent;
                /*border border-transparent*/
            }

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
