<button class="px-2.5 py-1 flex items-center gap-2 rounded-full" style="background-color: {{ $color }}">

    @if(isset($logo))

        <img src="{{ $logo }}" class="h-5 rounded-full">

    @else

        <i class="{{ $icon }}" style="color: {{ $iconColor }}"></i>

    @endif

    <p class="text-sm md:text-base" @isset($iconColor) style="color: {{ $iconColor }}" @endisset>{{ $name }}</p>

</button>
