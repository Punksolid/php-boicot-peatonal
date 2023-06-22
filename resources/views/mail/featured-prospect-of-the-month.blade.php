<x-mail::message>
{{--<img src="{{ $prospect->getFirstMediaUrl()  }}" alt="Fotografía de {{ $prospect->description }}" class="lg:col-span-2 lg:row-span-2 rounded-lg" />--}}
@if(isset($prospect->getMedia()[1]))
    <img src="{{ $prospect->getMedia()[1]->getUrl() }}" alt="Imagen de invasión de banqueta" class="hidden lg:block rounded-lg">
@endif
@if(isset($prospect->getMedia()[2]))
    <img src="{{ $prospect->getMedia()[2]->getUrl() }}" alt="Imagen de invasión de banqueta" class="hidden lg:block rounded-lg">
@endif

{{ $chatGptLetter }}

@if($prospect->google_maps_link)
<x-mail::button :url="$prospect->google_maps_link">
    Ir Google Maps
</x-mail::button>
@endif
@if($prospect->facebook_link)
<x-mail::button :url="$prospect->facebook_link">
    Ir a Facebook
</x-mail::button>
@endif



    Atentamente,
    {{ config('app.name') }}
</x-mail::message>
