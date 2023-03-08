<x-mail::message>
<img src="{{ $prospect->getFirstMediaUrl()  }}" alt="Fotografía de {{ $prospect->description }}" class="lg:col-span-2 lg:row-span-2 rounded-lg" />
@if(isset($prospect->getMedia()[1]))
    <img src="{{ $prospect->getMedia()[1]->getUrl() }}" alt="Imagen de invasión de banqueta" class="hidden lg:block rounded-lg">
@endif
@if(isset($prospect->getMedia()[2]))
    <img src="{{ $prospect->getMedia()[2]->getUrl() }}" alt="Imagen de invasión de banqueta" class="hidden lg:block rounded-lg">
@endif

    Hola,

Espero que este correo electrónico le encuentre bien. Soy una organización sin fines de lucro dedicada a promover la movilidad sustentable y el orden cívico en nuestra comunidad.

Como sabes, la movilidad sostenible y el orden cívico son temas cruciales para un futuro más saludable y sostenible para nuestro planeta. En BoicotPeatonal.ORG, estamos trabajando duro para mejorar la calidad de vida en nuestra comunidad a través de iniciativas que fomenten la movilidad sostenible y el respeto por las leyes y normas civiles.

Sin embargo, para lograr nuestros objetivos, necesitamos el apoyo de personas como usted. Por eso, estamos buscando personas como usted que estén dispuestas a donar su tiempo y esfuerzo para ayudarnos a lograr nuestros objetivos.

Gracias por su apoyo y consideración. Esperamos trabajar juntos para hacer una diferencia positiva en nuestra comunidad.

Cómo participar?

    Da clic en los botones de abajo para ir a las respectivas plataformas.

    Califica al comercio en google maps de forma negativa

    Opcionalmente puedes poner la razón de tu calificación negativa.

    Listo! Ya has hecho tu parte.

@if($google_maps_link)
        <x-mail::button :url="$google_maps_link">
            Ir Google Maps
        </x-mail::button>
@endif
@if($facebook_link)

    <x-mail::button :url="$facebook_link">
        Ir a Facebook
    </x-mail::button>
@endif


    Atentamente,
    {{ config('app.name') }}
</x-mail::message>
