<Link href="{{ route('drop', ['drop' => $drop]) }}" class="drop group p-6 border-b border-[#434242] text-left flex flex-col md:flex-row gap-6 hover:bg-neutral-800 transition duration-300" v-motion-slide-top :delay="{{ $loop->iteration * 150 }}">

    <div class="image relative w-full md:w-2/5 h-max aspect-video flex-shrink-0">

        @if($drop->type == \App\Enums\DropType::CLIP_YOUTUBE)

            <img src="https://i.ytimg.com/vi/{{ $drop->source_url }}/hq720.jpg" class="w-full z-0">

        @endif

        <div class="absolute top-0 left-0 w-full h-full backdrop-blur-sm bg-black/50 opacity-0 flex justify-center items-center z-10 group-hover:opacity-100 transition-all duration-300">

            <i class="fa-solid fa-expand fa-xl text-white drop-shadow-md"></i>

        </div>

    </div>

    <div class="w-full flex flex-col justify-between gap-2">

        <h1 class="md:text-lg text-neutral-300">{{ $drop->title }}</h1>

        <div class="footer flex justify-between items-center">

            <button class="px-2 py-1 flex items-center gap-2 rounded-full" style="background-color: {{ $drop->channel->color }}">

                <img src="{{ $drop->channel->logo }}" class="h-4 md:h-5 rounded-full">

                <p class="text-sm md:text-base">{{ $drop->channel->name }}</p>

            </button>

            <p class="text-sm md:text-base text-neutral-300 text-right">{{ $drop->created_at->format('M j, Y') }}</p>

        </div>

    </div>

</Link>
