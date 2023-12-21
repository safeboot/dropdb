@extends('layouts.app')

@section('main')
    <div class="header p-6 border-b border-[#434242] flex flex-col md:flex-row justify-between md:items-center gap-6 md:gap-0">

        <h1 class="text-2xl text-white font-semibold">LEADERBOARD</h1>

        <div class="md:text-right flex flex-col md:items-end">

            <p class="text-neutral-300">Filter By:</p>

            <div class="flex items-center gap-6">

                <Link href="{{ route('leaderboard', ['sorting' => 'channel']) }}" preserve-scroll class="text-lg @if(!request()->has('sorting') || request()->get('sorting') == 'channel') text-indigo-400 @else text-white hover:text-indigo-300 @endif transition duration-300">Channel</Link>

                <Link href="{{ route('leaderboard', ['sorting' => 'host']) }}" preserve-scroll class="text-lg @if(request()->get('sorting') == 'host') text-indigo-400 @else text-white hover:text-indigo-300 @endif transition duration-300">Host</Link>

            </div>

        </div>

    </div>

    <div class="scores divide-y divide-[#434242] flex flex-col">

        @foreach($scores as $score)

            <div class="score p-6 flex flex-col md:flex-row justify-between items-center gap-6 md:gap-0">

                <div class="w-full md:w-max px-4 md:px-0 flex justify-start items-center gap-6">

                    <img src="{{ request()->get('sorting') == 'host' ? $score->image : $score->logo }}" class="w-24 h-24 object-cover rounded-full">

                    <div class="flex flex-col gap-2">

                        <p class="text-lg text-neutral-300">#{{ $loop->iteration }}</p>

                        <h1 class="text-xl text-white font-semibold">{{ $score->name }}</h1>

                    </div>

                </div>

                <div class="flex items-center gap-12">

                    <div class="flex flex-col justify-center items-center">

                        <p class="text-lg text-neutral-300">Drop Count</p>

                        <h1 class="text-xl text-white font-semibold">{{ number_format(request()->get('sorting') == 'host' ? $score->drops->where('pivot.is_dropper', true)->count() : $score->drops->count()) }}</h1>

                    </div>

                    <div class="flex flex-col justify-center items-center">

                        <p class="text-lg text-neutral-300">Avg. Drop Score</p>

                        <h1 class="text-xl text-white font-semibold">{{ number_format(request()->get('sorting') == 'host' ? $score->drops->where('pivot.is_dropper', true)->avg('rating') : $score->drops->avg('rating'), 1) }}</h1>

                    </div>

                </div>

            </div>

        @endforeach

    </div>
@endsection
