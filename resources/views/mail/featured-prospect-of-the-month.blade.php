<x-mail::message>
{{-- INSERT AN IMAGE --}}
<img src="{{ $prospect->image_url }}" alt="Fotografía de {{ $prospect->description }}" class="h-full w-full object-cover object-center" />



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
