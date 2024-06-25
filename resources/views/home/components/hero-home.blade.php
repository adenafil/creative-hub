<!-- Hero Section -->
<header
    class="w-full pt-[74px] pb-[34px] bg-[url('https://raw.githubusercontent.com/fe-husni/creativehub-main/main/assets/backgrounds/hero-image.png')] bg-cover bg-no-repeat bg-center relative z-0">
    <div class="container max-w-[1130px] mx-auto flex flex-col items-center justify-center gap-[34px] z-10">
        <div class="flex flex-col gap-2 text-center w-fit mt-20 z-10 items-center">
            <h1 class="font-semibold text-3xl leading-[130%] md:text-[60px] xl:text-[60px]">Explore High Quality<br>Digital
                Products</h1>
            <p class="text-xs md:text-lg lg:text-lg text-creativehub-grey">Change the way you work to achieve better
                results.</p>
            <div class="flex gap-6 items-center mt-4">
                @if(auth()->check())
                    <a href="{{ route('login') }}"
                       class="p-[16px_40px] w-fit h-fit rounded-[12px] text-creativehub-grey border border-creativehub-dark-grey hover:bg-[#2A2A2A] hover:text-white transition-all duration-300 text-xs md:text-xl lg:text-xl font-semibold">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="bg-clip text-transparent bg-gradient-to-tr from-[#B05CB0] to-[#FCB16B] transition-all duration-1000 text-white p-[16px_40px] w-fit h-fit rounded-[12px]  text-xs md:text-xl lg:text-xl font-semibold hover:from-[#FCB16B] hover:to-[#B05CB0] shadow-lg shadow-pink-500/50">
                        Log in
                    </a>
                    <a href="{{ route('register') }}"
                       class="p-[16px_40px] w-fit h-fit rounded-[12px] text-creativehub-grey border border-creativehub-dark-grey hover:bg-[#2A2A2A] hover:text-white transition-all duration-300 text-xs md:text-xl lg:text-xl font-semibold">
                        Sign Up
                    </a>
                @endif
            </div>
        </div>

        <div class="flex w-full justify-center mb-[34px] z-10">
            <form
                class="group/search-bar p-[8px_18px] bg-creativehub-darker-grey ring-1 ring-[#414141] hover:ring-[#888888] md:max-w-[500px] lg:max-w-[560px] max-w-fit w-full rounded-full transition-all duration-300">
                <div class="relative text-left">
                    <button class="absolute inset-y-0 left-0 flex items-center">
                        <img src="{{URL::to('/')}}/assets/icons/search-normal.svg" alt="icon">
                    </button>
                    <input type="text" id="searchInput"
                           name="search" class="bg-creativehub-darker-grey w-full pl-[36px] focus:outline-none border-none placeholder:text-[#595959] pr-9"
                           placeholder="Type anything to search..."/>
                    <input type="reset" id="resetButton"
                           class="close-button hidden w-[38px] h-[38px] flex shrink-0 bg-[url('https://raw.githubusercontent.com/fe-husni/creativehub-main/main/assets/icons/close.svg')] hover:bg-[url('https://raw.githubusercontent.com/fe-husni/creativehub-main/main/assets/icons/close-white.svg')] transition-all duration-300 appearance-none transform -translate-x-1/2 -translate-y-1/2 absolute top-1/2 -right-5"
                           value="">
                </div>
            </form>
        </div>
    </div>
    <div class="w-full h-full absolute top-0 bg-gradient-to-b from-creativehub-black/70 to-creativehub-black z-0"></div>
</header>
