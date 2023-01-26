<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
{{--        insert tailwind css --}}
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>

    <!-- This example requires Tailwind CSS v3.0+ -->
    <div class="bg-white">
        <div class="mx-auto max-w-7xl py-24 sm:px-6 sm:py-32 lg:px-8">
            <div class="relative isolate overflow-hidden bg-gray-900 px-6 py-24 text-center shadow-2xl sm:rounded-3xl sm:px-16">
                <h2 class="mx-auto max-w-2xl text-4xl font-bold tracking-tight text-white">Boicot Peatonal</h2>
                <p class="mx-auto mt-6 max-w-xl text-lg leading-8 text-gray-300">Un boicot consiste en negarse a comprar, vender, o practicar alguna otra forma de relación comercial o de otro tipo con un individuo o una empresa considerados, por los participantes en el boicot, como autores de algo moralmente reprobable.</p>
                <div class="mt-10 flex items-center justify-center gap-x-6">

                    <form action="{{ route('subscription.store') }}" type="POST" enctype="multipart/form-data" method="POST">
                        @csrf
                        <input type="email" name="email" id="email-address" autocomplete="email" required="" class=" min-w-0 appearance-none rounded-md border border-gray-300 bg-white py-2 px-4 text-base text-gray-900 placeholder-gray-500 shadow-sm focus:border-indigo-500 focus:placeholder-gray-400 focus:outline-none focus:ring-indigo-500" placeholder="Agrega tu email." />

                        <input type="submit" class="rounded-md bg-white px-3.5 py-1.5 text-base font-semibold leading-7 text-gray-900 shadow-sm hover:bg-gray-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white" >
                    </form>

                </div>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024" class="absolute top-1/2 left-1/2 -z-10 h-[64rem] w-[64rem] -translate-x-1/2" aria-hidden="true">
                    <circle cx="512" cy="512" r="512" fill="url(#827591b1-ce8c-4110-b064-7cb85a0b1217)" fill-opacity="0.7" />
                    <defs>
                        <radialGradient id="827591b1-ce8c-4110-b064-7cb85a0b1217" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(512 512) rotate(90) scale(512)">
                            <stop stop-color="#7775D6" />
                            <stop offset="1" stop-color="#E935C1" stop-opacity="0" />
                        </radialGradient>
                    </defs>
                </svg>
            </div>
        </div>
    </div>

    </body>
</html>
