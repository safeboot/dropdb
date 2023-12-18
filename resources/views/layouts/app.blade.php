<div class="app"
     :class="menu.open ? 'touch-none' : 'touch-auto'"
     id="dropdb"
>

    @include('components.header')

    <div class="main-container w-full flex justify-center items-start">

        <div class="main w-full max-w-7xl min-h-[calc(100vh_-_85px)] h-full xl:border-x border-[#434242]">

            @yield('main')

        </div>

    </div>

    @include('components.footer')

</div>

<x-splade-data store="menu" default="{ open: false }" />
