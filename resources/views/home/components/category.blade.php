<section id="Category" class="container max-w-[1200px] px-4 mx-auto mb-[102px] flex flex-col gap-8 w-full">
    <h2 class="font-semibold text-[32px]">Category</h2>
    <div class="items-center gap-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
        <a href="{{route('home')}}"
           class="group category-card w-full h-fit p-[1px] rounded-2xl bg-img-transparent hover:bg-img-purple-to-orange transition-all duration-300">
            <div
                class="flex flex-col p-4 rounded-2xl bg-img-black-gradient group-active:bg-img-black transition-all duration-300">
                <div class="w-[58px] h-[58px] flex shrink-0 items-center justify-center">
                    <img src="../assets/icons/cart.svg" alt="icon">
                </div>
                <div class="px-[6px] flex flex-col text-left">
                    <p class="font-bold text-sm">All Products</p>
                    <p class="text-xs text-creativehub-grey">Everything in One Place</p>
                </div>
            </div>
        </a>
        <a href="{{route('home', ['category' => 4])}}"
           class="group category-card w-full h-fit p-[1px] rounded-2xl bg-img-transparent hover:bg-img-purple-to-orange transition-all duration-300">
            <div
                class="flex flex-col p-4 rounded-2xl bg-img-black-gradient group-active:bg-img-black transition-all duration-300">
                <div class="w-[58px] h-[58px] flex shrink-0 items-center justify-center">
                    <img src="../assets/icons/laptop.svg" alt="icon">
                </div>
                <div class="px-[6px] flex flex-col text-left">
                    <p class="font-bold text-sm">Templates</p>
                    <p class="text-xs text-creativehub-grey">Designs Made Easy</p>
                </div>
            </div>
        </a>
        <a href="{{route('home', ['category' => 1])}}"
           class="group category-card w-full h-fit p-[1px] rounded-2xl bg-img-transparent hover:bg-img-purple-to-orange transition-all duration-300">
            <div
                class="flex flex-col p-4 rounded-2xl bg-img-black-gradient group-active:bg-img-black transition-all duration-300">
                <div class="w-[58px] h-[58px] flex shrink-0 items-center justify-center">
                    <img src="../assets/icons/book.svg" alt="icon">
                </div>
                <div class="px-[6px] flex flex-col text-left">
                    <p class="font-bold text-sm">Ebooks</p>
                    <p class="text-xs text-creativehub-grey">Read and Learn</p>
                </div>
            </div>
        </a>
        <a href="{{route('home', ['category' => 3])}}"
           class="group category-card w-full h-fit p-[1px] rounded-2xl bg-img-transparent hover:bg-img-purple-to-orange transition-all duration-300">
            <div
                class="flex flex-col p-4 rounded-2xl bg-img-black-gradient group-active:bg-img-black transition-all duration-300">
                <div class="w-[58px] h-[58px] flex shrink-0 items-center justify-center">
                    <img src="{{URL::to('/')}}/assets/icons/hat.svg" alt="icon">
                </div>
                <div class="px-[6px] flex flex-col text-left">
                    <p class="font-bold text-sm">Icons</p>
                    <p class="text-xs text-creativehub-grey">Expand Your Skills</p>
                </div>
            </div>
        </a>
        <a href="{{route('home', ['category' => 2])}}"
           class="group category-card w-full h-fit p-[1px] rounded-2xl bg-img-transparent hover:bg-img-purple-to-orange transition-all duration-300">
            <div
                class="flex flex-col p-4 rounded-2xl bg-img-black-gradient group-active:bg-img-black transition-all duration-300">
                <div class="w-[58px] h-[58px] flex shrink-0 items-center justify-center">
                    <img src="../assets/icons/pen.svg" alt="icon">
                </div>
                <div class="px-[6px] flex flex-col text-left">
                    <p class="font-bold text-sm">Fonts</p>
                    <p class="text-xs text-creativehub-grey">Typography Selection</p>
                </div>
            </div>
        </a>
        <a href="{{route('home', ['category' => 5])}}"
           class="group category-card w-full h-fit p-[1px] rounded-2xl bg-img-transparent hover:bg-img-purple-to-orange transition-all duration-300">
            <div
                class="flex flex-col p-4 rounded-2xl bg-img-black-gradient group-active:bg-img-black transition-all duration-300">
                <div class="w-[58px] h-[58px] flex shrink-0 items-center justify-center">
                    <img src="../assets/icons/check-3d.svg" alt="icon">
                </div>
                <div class="px-[6px] flex flex-col text-left">
                    <p class="font-bold text-sm">UI Kits</p>
                    <p class="text-xs text-creativehub-grey">Best of Design Resources</p>
                </div>
            </div>
        </a>
    </div>
</section>
