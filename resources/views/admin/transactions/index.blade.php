<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('History For Your Transactions 🧾') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg flex justify-between items-center flex-col sm:flex-row py-6 gap-y-4">

                <form class="flex items-center ml-4 w-2/3" method="get" action="{{route('purchases.index')}}">
                    <label for="simple-search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <input type="text" name="simple-search" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search..." required />
                    </div>
                    <button type="submit" class="p-2.5 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-gray-700 focus:ring-4 focus:outline-none bg-[#1F2937] focus:ring-[#1F2937] hover:bg-gray-700 ">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                </form>


            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">

            <!--Card-->
            <div id='recipients' class="px-4 mt-6 lg:mt-0 rounded shadow bg-white dark:text-white dark:bg-[#1F2937]">


                <table id="productTable" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
                    <tr>
                        <th data-priority="1">No.</th>
                        <th data-priority="2">Product Image</th>
                        <th data-priority="3">Name</th>
                        <th data-priority="4">Category</th>
                        <th data-priority="5">Price</th>
                        <th data-priority="6">Status</th>
                        <th data-priority="7">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    {{--                    @if(isset($products))--}}

                    {{--                    @endif--}}

                    @foreach ($purchases as $purchase)
                        <tr>
                            <td class="text-center">{{ ($purchases->currentPage() - 1) * $purchases->perPage() + $loop->iteration }}</td>
                            <td class="">
                                <div class="img-wrapper h-24">
                                    <img src="{{ \App\Helper\ImageHelper::isThisImage($purchase->image_product_url) ? $purchase->image_product_url : URL::signedRoute('file.view', ['encoded' => \App\Helper\ImageHelper::encodePath($purchase->image_product_url)]) }}" class="w-16 h-full object-cover md:w-32 max-w-full max-h-full rounded-md" alt="">
                                </div>
                            </td>
                            <td class="text-center">{{ $purchase->title }}</td>
                            <td class="text-center">{{ $purchase->name }}</td>
                            <td class="text-center">Rp{{number_format($purchase->price, 0, ',', '.') }}}}</td>
                            <td class="text-center">
                                @if ($purchase->status == 'pending')
                                    <span class="bg-yellow-100 text-yellow-800 text-sm font-medium me-2 px-4 py-1.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300">Pending</span>
                                @elseif ($purchase->status == 'disapprove')
                                    <span class="bg-red-100 text-red-800 text-sm font-medium me-2 px-4 py-1.5 rounded-full dark:bg-red-900 dark:text-red-300">Disapprove</span>
                                @elseif ($purchase->status == 'paid')
                                    <span class="bg-green-100 text-green-800 text-sm font-medium me-2 px-4 py-1.5 rounded-full dark:bg-green-900 dark:text-green-300">Paid</span>
                                @endif
                            </td>
                            <td class="">
                                <div class="btn-group flex items-center gap-2 justify-center">
                                    {{-- Detail Button --}}
                                    <a href="{{ route('purchases.detail', ['id' => $purchase->product_id]) }}" class="flex h-fit">
                                        <button type="button" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-2.5 py-2.5" data-tooltip-target="tooltip-detail-{{$purchase->product_id}}" data-tooltip-placement="top" >
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Zm3.75 11.625a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                            </svg>
                                        </button>
                                    </a>

                                    {{-- Ini Tooltip nya --}}
                                    <div id="tooltip-detail-{{$purchase->product_id}}" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                        Detail
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                    {{-- END Detail Button --}}

                                    {{-- Review Button --}}
                                    <!-- Btn Review ini muncul ketika product sudah diapprove -->
                                    <!-- Modal toggle -->
                                    @if(\App\Models\UserPayment::query()->where('id',
                                        \App\Models\Transaction::query()->where('id', $purchase->transaction_id)->first()->user_payment_id
                                       )->first()->status == "paid")
                                        <button id="btn-review" data-modal-target="crud-modal-{{ $purchase->product_id }}" data-modal-toggle="crud-modal-{{ $purchase->product_id }}" data-product-id="{{ $purchase->product_id }}" class="btn-review focus:outline-none text-white bg-yellow-600 hover:bg-yellow-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-2.5 py-2.5" type="button" data-tooltip-target="tooltip-review-{{$purchase->product_id}}" data-tooltip-placement="top" >
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 0 0-2.456 2.456ZM16.894 20.567 16.5 21.75l-.394-1.183a2.25 2.25 0 0 0-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 0 0 1.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 0 0 1.423 1.423l1.183.394-1.183.394a2.25 2.25 0 0 0-1.423 1.423Z" />
                                            </svg>
                                        </button>
                                        <div id="tooltip-review-{{$purchase->product_id}}" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                            Review
                                            <div class="tooltip-arrow" data-popper-arrow></div>
                                        </div>
                                    @endif
                                    {{-- Review Button --}}

                                    {{-- Download Invoice Button --}}
                                    <a href="{{route('download.invoices')}}" class="flex h-fit">
                                        <button type="button" class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-2.5 py-2.5"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6" data-tooltip-target="tooltip-download-invoice-{{$purchase->product_id}}" data-tooltip-placement="top" >
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m.75 12 3 3m0 0 3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                            </svg>
                                        </button>
                                    </a>
                                    <div id="tooltip-download-invoice-{{$purchase->product_id}}" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                        Download Invoice
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                    {{-- Download Invoice Button --}}

                                    <!-- Main modal -->
                                    <div id="crud-modal-{{ $purchase->product_id }}" tabindex="-1" aria-hidden="true" class="crud-modal  overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full hidden">
                                        <div class="relative p-4 w-full max-w-md max-h-full">
                                            <!-- Modal content -->
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <!-- Modal header -->
                                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Give Your Feedback 🤗</h3>
                                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal-{{ $purchase->product_id }}">
                                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                </div>
                                                <!-- Modal body -->
                                                <form id="review-form-{{ $purchase->product_id }}" method="post" action="{{ route('purchases.comment.index', ['id' => $purchase->product_id]) }}" class="p-4 md:p-5">
                                                    @csrf
                                                    <div class="reviews-star">
                                                        <p class="text-center">All feedback is appreciated to help us improve our offering and remember that you can only edit once in your life time right maniezz! 😉</p>
                                                        <div class="star-group flex justify-center">
                                                            @for ($i = 1; $i <= 5; $i++)
                                                                <div class="flex items-center flex-col">
                                                                    <img src="{{ asset("assets/icons/star-$i.svg") }}" alt="">
                                                                    @if($comments["isChecked-$purchase->product_id"] !== null && $i == $comments["isChecked-$purchase->product_id"])
                                                                        {{\Illuminate\Support\Facades\Log::debug("log $i = "  . $comments["isChecked-$purchase->product_id"])}}
                                                                        <input class="default-radio-1" type="radio" value="{{$comments["isChecked-$purchase->product_id"]}}" name="default-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" checked>
                                                                    @else
                                                                        <input class="default-radio-1" type="radio" value="{{$i}}" name="default-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                                    @endif

                                                                </div>
                                                            @endfor
                                                        </div>
                                                        <div class="grid gap-4 mt-8 mb-4 grid-cols-2">
                                                            <div class="col-span-2">
                                                                <label for="comment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Reviews</label>

                                                                {{-- Check Here  --}}
                                                                <textarea name="comment" id="comment" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write Your Review Here">{{$comments[$purchase->product_id] ?? "Write Your Review Here"}}
                                                                </textarea>
                                                            </div>
                                                        </div>
                                                        <button id="submitButton" type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" disabled>
                                                            Submit
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach


                    </tbody>

                </table>
            </div>

            <div class="flex justify-center items-center gap-y-2 flex-col mt-10">

                <span class="text-sm text-gray-700 dark:text-gray-400">Showing <span class="font-semibold text-gray-900 dark:text-white">{{ $firstItem }}</span> to <span class="font-semibold text-gray-900 dark:text-white">{{ $lastItem }}</span> of <span class="font-semibold text-gray-900 dark:text-white">{{ $totalPurchases }}</span> Entries</span>

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
        @include('sweetalert::alert')



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


        <script>

            document.addEventListener('DOMContentLoaded', function () {
                    let adeComment = false;
                    let adeRadio = false;

                    let dataComment = '';

                    function check() {
                        if (dataComment.value.trim() !== "") {
                            console.log('mama');
                        }
                    }

                    const reviewsButtons  =  document.querySelectorAll('.btn-review');
                    reviewsButtons.forEach(button => {
                        button.addEventListener('click', function () {
                            console.log('click');

                            const submits = document.querySelectorAll('#submitButton');
                            submits.forEach(submit => {

                                document.querySelectorAll('#comment').forEach(comment => {
                                    comment.addEventListener('input', function () {
                                        console.log(comment.value);
                                        if (comment.value !== "") {
                                            adeComment = true;
                                        }
                                        console.log("messi " + adeComment);
                                        dataComment += comment.value;

                                    })
                                });

                                document.querySelectorAll('.default-radio-1').forEach(radio => {
                                    radio.addEventListener('input', function () {

                                        if (radio.checked) {
                                            adeRadio = true;
                                        }
                                        console.log(radio.checked);

                                    })
                                })

                                submit.removeAttribute('disabled');


                                submit.addEventListener('click', function () {
                                    submit.addAttribute('disabled');
                                })
                            });
                        })


                    });


            });
        </script>


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
