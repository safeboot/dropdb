@if($dropOfTheWeek)

    <div class="drop-of-the-week p-6 flex flex-col gap-6" v-motion-slide-top>

        <h1 class="text-2xl text-white font-semibold">DROP OF THE WEEK</h1>

        <div class="flex flex-col gap-4">

            <iframe src="https://www.youtube-nocookie.com/embed/{{ $dropOfTheWeek->source_url . ($dropOfTheWeek->timestamp ? '?start=' . $dropOfTheWeek->timestamp : '') }}"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen
                    class="w-full aspect-video"
                    style="box-shadow: 0 25px 50px -12px rgba({{ implode(', ', sscanf($dropOfTheWeek->channel->color, '#%02x%02x%02x')) }}, 0.2)"
            ></iframe>

            <div class="flex flex-col gap-2">

                <h1 class="text-lg text-neutral-300">{{ $dropOfTheWeek->title }}</h1>

                <div class="flex items-center flex-wrap gap-4">

                    <button class="px-2 py-1 flex items-center gap-2 rounded-full" style="background-color: {{ $dropOfTheWeek->channel->color }}">

                        <img src="{{ $dropOfTheWeek->channel->logo }}" class="h-5 rounded-full">

                        <p>{{ $dropOfTheWeek->channel->name }}</p>

                    </button>

                </div>

            </div>

            <div class="footer flex justify-between items-center">

                <div class="dropper flex items-center gap-3">

                    <img src="{{ $dropOfTheWeek->dropper->image }}" class="w-6 h-6 object-cover rounded-full">

                    <p class="text-neutral-300">{{ $dropOfTheWeek->dropper->name }}</p>

                </div>

                <p class="text-neutral-300 text-right">{{ $dropOfTheWeek->created_at->format('M j, Y') }}</p>

            </div>

        </div>

    </div>

@endif
