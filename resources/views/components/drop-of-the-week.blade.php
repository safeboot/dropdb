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

                    @include('components.pill', ['name' => $dropOfTheWeek->channel->name, 'logo' => $dropOfTheWeek->channel->logo, 'color' => $dropOfTheWeek->channel->color])

                    @include('components.pill', ['name' => \App\Enums\DropRating::getRating($dropOfTheWeek->rating)->label(), 'icon' => 'fa-solid fa-person-falling-burst', 'color' => \App\Enums\DropRating::getRating($dropOfTheWeek->rating)->color()[0], 'iconColor' => \App\Enums\DropRating::getRating($dropOfTheWeek->rating)->color()[1]])

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
