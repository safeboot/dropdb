@extends('layouts.app')

@section('main')
    <div class="w-full h-full divide-y lg:divide-y-0 lg:divide-x divide-[#434242] grid grid-cols-1 lg:grid-cols-2" style="min-height: inherit">

        <div class="featured-section divide-y divide-[#434242] flex flex-col overflow-hidden">

            @include('components.drop-of-the-week', ['dropOfTheWeek' => $dropOfTheWeek])

            <div class="missing-a-drop p-6 flex flex-col gap-6" v-motion-slide-bottom>

                <h1 class="text-2xl text-white font-semibold">MISSING A DROP?</h1>

                <div class="flex flex-col gap-4">

                    <h1 class="text-lg text-neutral-300">Have a drop I missed? Fill the form below, and I'll review your drop (eventually).</h1>

                    <Link href="#submit-a-drop" class="group w-max bg-indigo-600 text-white px-8 py-4 flex justify-center items-center gap-2 hover:bg-indigo-700 transition duration-300">

                        <i class="fa-solid fa-plus group-hover:rotate-90 transition duration-300"></i>

                        <p>SUBMIT A DROP</p>

                    </Link>

                </div>

            </div>

        </div>

        <div class="timeline overflow-hidden">

            <x-splade-data default="{ expanded: false }">

                <div class="timeline-header p-6 border-b border-[#434242] flex justify-between items-center">

                    <h1 class="text-2xl text-white font-semibold">ALL DROPS</h1>

                    <button @click="data.expanded = !data.expanded" class="hover:rotate-6 transition duration-300">

                        <i class="fa-solid fa-filter fa-xl text-white"></i>

                    </button>

                </div>

                <div class="filters px-6 transition-all duration-300"
                     :class="data.expanded ? 'h-max py-6 border-b border-[#434242] opacity-100' : 'h-0 py-0 border-0 border-transparent opacity-0'"
                >

                    <x-splade-form method="GET" class="flex flex-col gap-6"
                                   :default="request()->only(['search', 'channels', 'hosts', 'date'])"
                                   preserve-scroll
                    >

                        <div class="filter-header flex justify-between items-center">

                            <h1 class="text-2xl text-white font-semibold">FIND A DROP</h1>

                            <button class="hover:rotate-6 transition duration-300">

                                <i class="fa-solid fa-magnifying-glass fa-xl text-white"></i>

                            </button>

                        </div>

                        <div class="filter flex flex-col md:grid grid-cols-5 gap-2 md:gap-6">

                            <label for="search" class="my-auto text-neutral-400">Search</label>

                            <x-splade-input name="search" id="search" class="col-span-4" />

                        </div>

                        <div class="filter flex flex-col md:grid grid-cols-5 gap-2 md:gap-6">

                            <label for="channels" class="my-auto text-neutral-400">Channels</label>

                            <x-splade-select name="channels" id="channels" placeholder="Select a Channel..." class="col-span-4" choices multiple>

                                <option value="null" placeholder>Select a Channel...</option>

                                @foreach(\App\Models\Channel::all()->sortBy('name') as $channel)

                                    <option value="{{ $channel->id }}" {{ request()->get('channels') && request()->get('channels') != null && in_array($channel->id, request()->get('channels')) ? 'selected' : '' }}>{{ $channel->name }}</option>

                                @endforeach

                            </x-splade-select>

                        </div>

                        <div class="filter flex flex-col md:grid grid-cols-5 gap-2 md:gap-6">

                            <label for="hosts" class="my-auto text-neutral-400">Hosts</label>

                            <x-splade-select name="hosts" id="hosts" class="col-span-4" choices multiple>

                                @foreach(\App\Models\Person::all()->sortBy('name') as $person)

                                    <option value="{{ $person->id }}" {{ request()->get('hosts') && request()->get('hosts') != null && in_array($channel->id, request()->get('hosts')) ? 'selected' : '' }}>{{ $person->name }}</option>

                                @endforeach

                            </x-splade-select>

                        </div>

                        <div class="filter flex flex-col md:grid grid-cols-5 gap-2 md:gap-6">

                            <label for="date" class="my-auto text-neutral-400">Date Range</label>

                            <x-splade-input name="date" id="date" class="col-span-4" date range />

                        </div>

                    </x-splade-form>

                </div>

            </x-splade-data>

            @forelse($drops as $drop)

                @include('components.drop-preview', ['drop' => $drop])

            @empty

                <div class="w-full px-6 py-16 flex flex-col justify-center items-center gap-6">

                    <i class="fa-regular fa-face-sad-tear fa-4x text-indigo-500"></i>

                    <div class="flex flex-col">

                        <h1 class="text-white text-center text-lg font-semibold">NO DROPS FOUND.</h1>

                        <p class="text-neutral-300 text-center">Either we dropped the database, or we couldn't find any drops.</p>

                    </div>

                </div>

            @endforelse

        </div>

    </div>

    @include('components.modals.submit-a-drop')
@endsection
