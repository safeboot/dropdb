<div class="header-container w-full border-b border-[#434242] p-6 flex justify-center items-center">

    <div class="header w-full max-w-7xl flex justify-between items-center">

        <Link href="{{ route('home') }}" class="left-side flex items-center gap-6">

            <h1 class="text-3xl text-white z-50">DropDB</h1>

            <p class="hidden md:block w-full text-xs text-neutral-400 @if(date('m d') == '4 1') rotate-180 @endif">The unofficial "Linus <br> drop database".</p>

        </Link>

        <div class="right-side flex justify-end items-center gap-6">

            <Link href="{{ route('home') }}" class="relative group hidden md:block text-xl text-white">

                Home

                <div class="absolute -bottom-7 w-full h-0.5 bg-white @if(Route::is('home')) opacity-100 @else opacity-0 group-hover:opacity-50 @endif transition duration-300"></div>

            </Link>

            <Link href="{{ route('home') }}" class="relative group hidden md:block text-xl text-white">

                Leaderboard

                <div class="absolute -bottom-7 w-full h-0.5 bg-white @if(Route::is('leaderboard')) opacity-100 @else opacity-0 group-hover:opacity-50 @endif transition duration-300"></div>

            </Link>

            <Link href="{{ route('home') }}" class="relative group hidden md:block text-xl text-white">

                Credits

                <div class="absolute -bottom-7 w-full h-0.5 bg-white @if(Route::is('credits')) opacity-100 @else opacity-0 group-hover:opacity-50 @endif transition duration-300"></div>

            </Link>

            <a href="https://github.com/safeboot/dropdb" target="_blank" class="hidden md:block hover:rotate-6 transition duration-300">

                <i class="fa-brands fa-github fa-xl text-white"></i>

            </a>

            <button @click="menu.open = !menu.open;" onclick="window.scrollTo({ top: 0, behavior: 'smooth' })" class="md:hidden z-50">

                <i class="fa-solid fa-bars-staggered fa-xl text-white transition-all duration-300"
                   :class="menu.open ? '-rotate-180' : 'rotate-0'"
                ></i>

            </button>

        </div>

    </div>

</div>

<p class="quote md:hidden w-full px-1 py-2 border-b border-[#434242] text-center text-sm text-neutral-400 @if(date('m d') == '4 1') rotate-180 @endif">The unofficial "Linus drop database".</p>

<div class="mobile-menu fixed md:hidden top-0 left-0 w-full h-screen backdrop-blur-lg bg-black/60 z-40 transition-all duration-300"
     :class="menu.open ? 'opacity-100' : 'opacity-0 pointer-events-none'"
>

    <div class="border-t border-[#434242] mt-[85px] pt-8 px-5 flex flex-col gap-12">

        <Link href="{{ route('home') }}" @click="menu.open = false" class="@if(Route::is('home')) border-l-4 border-white pl-4 @endif text-white text-4xl font-semibold">Home</Link>

        <Link href="{{ route('home') }}" @click="menu.open = false" class="@if(Route::is('leaderboard')) border-l-4 border-white pl-4 @endif text-white text-4xl font-semibold">Leaderboard</Link>

        <Link href="{{ route('home') }}" @click="menu.open = false" class="@if(Route::is('credits')) border-l-4 border-white pl-4 @endif text-white text-4xl font-semibold">Credits</Link>

    </div>

</div>
