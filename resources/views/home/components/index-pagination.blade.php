<nav aria-label="Page navigation example">
    <ul class="inline-flex -space-x-px text-sm">
        {{-- Previous Page Link --}}
        @if ($currentPage > 1)
            <li>
                <a href="{{ url()->current() }}?page={{ $currentPage - 1 }}"
                   class="flex items-center justify-center px-3 h-8 ms-0 leading-tight border border-e-0 rounded-s-lg bg-[#1B1B1B] border-gray-700 text-gray-400 hover:bg-gray-700 hover:text-white">Previous</a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($window as $page)
            @if (is_string($page))
                <li class="">
                <span
                    class="flex items-center justify-center px-3 h-8 leading-tight border bg-[#1B1B1B] border-gray-700 text-gray-400 hover:bg-gray-700 hover:text-white">{{$page}}</span>
                </li>
            @elseif ($page == $currentPage)
                <li class="">
                <span
                    class="flex items-center justify-center px-3 h-8 border border-gray-700 bg-[#1B1B1B] text-white hover:bg-gray-700 hover:text-white">{{$page}}</span>
                </li>
            @else
                <a href="{{ url()->current() }}?page={{ $page }}"
                   class="flex items-center justify-center px-3 h-8 leading-tight border bg-[#1B1B1B] border-gray-700 text-gray-400 hover:bg-gray-700 hover:text-white">{{$page}}</a>
            @endif
        @endforeach

        {{--                 Next Page Link--}}
        @if ($currentPage < $totalPages)
            <li>
                <a href="{{url()->current() }}?page={{ $currentPage + 1 }}"
                   class="flex items-center justify-center px-3 h-8 leading-tight border rounded-e-lg bg-[#1B1B1B] border-gray-700 text-gray-400 hover:bg-gray-700 hover:text-white">Next</a>
            </li>
        @endif
    </ul>
</nav>

</div>
</section>
