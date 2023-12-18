@extends('layouts.app')

@section('main')
    <div class="col-span-2 w-full h-full divide-y divide-[#434242] flex flex-col" style="min-height: inherit">

        <div class="p-6 flex flex-col gap-6">

            <iframe src="https://www.youtube-nocookie.com/embed/{{ $drop->source_url . ($drop->timestamp ? '?start=' . $drop->timestamp : '') }}"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen
                    class="w-full aspect-video"
                    style="box-shadow: 0 25px 50px -12px rgba({{ implode(', ', sscanf($drop->channel->color, '#%02x%02x%02x')) }}, 0.2)"
            ></iframe>

            <div class="flex flex-col gap-2">

                <h1 class="text-lg md:text-2xl text-neutral-300">{{ $drop->title }}</h1>

                <p class="text-neutral-300">{{ $drop->created_at->format('M j, Y') }}</p>

            </div>

            <div class="flex items-center flex-wrap gap-2 md:gap-6">

                @include('components.pill', ['name' => $drop->channel->name, 'logo' => $drop->channel->logo, 'color' => $drop->channel->color])

{{--                @include('components.pill', ['name' => 'Medium Drop', 'icon' => 'fa-solid fa-tv', 'color' => '#FFFFFF', 'iconColor' => '#000000'])--}}

            </div>

        </div>

        <div class="flex flex-col">

            <h1 class="p-6 text-2xl text-white font-semibold">HOSTS</h1>

            <div class="w-full px-6 grid grid-cols-2 md:grid-cols-4 gap-x-6 gap-y-12">

                @foreach($drop->people->sortByDesc('is_dropper', true) as $host)

                    <div class="host flex flex-col justify-center items-center gap-4">

                        <img src="{{ $host->image }}" class="w-1/2 aspect-square object-cover rounded-full">

                        <div class="flex flex-col justify-center items-center gap-2">

                            <h1 class="md:text-xl text-white text-center font-semibold">{{ $host->name }}</h1>

                            <p class="text-sm md:text-base text-center @if(!$host->pivot->is_dropper) invisible @endif" style="color: {{ $drop->channel->color }}">DROPPER</p>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    </div>
@endsection
