<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    {{--        insert tailwind css --}}
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <meta property="og:image" content="{{ optional($prospect)->getFirstMediaUrl() }}">
    <meta property="og:title" content="{{ config('app.name') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.boicotpeatonal.org/">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="628">
    <meta property="og:description"
          content="BoicotPeatonal.ORG es una plataforma para coordinar a todos los usuarios a boicotear reviews de negocios que abusan del espacio público. Y TE NECESITAMOS!">
    <meta property="og:site_name" content="Boicot Peatonal">
    <meta property="og:locale" content="es_ES">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@boicotpeatonal">
    <meta name="twitter:creator" content="@boicotpeatonal">
    <meta name="twitter:title" content="{{ config('app.name') }}">

</head>
<body>
<!--
This example requires some changes to your config:

```
// tailwind.config.js
const colors = require('tailwindcss/colors')

module.exports = {
// ...
theme: {
  extend: {
    colors: {
      teal: colors.teal,
      cyan: colors.cyan,
    },
  },
},
plugins: [
  // ...
  require('@tailwindcss/forms'),
  require('@tailwindcss/aspect-ratio'),
],
}
```
-->
<div class="bg-white">
    <div class="relative overflow-hidden">
        <header class="relative">
            <div class="bg-gray-900 pt-6">
                <nav class="relative mx-auto flex max-w-7xl items-center justify-between px-6" aria-label="Global">
                    <div class="flex flex-1 items-center">
                        <div class="flex w-full items-center justify-between md:w-auto">
                            <a href="#">
                                <span class="sr-only">Your Company</span>
                                <img class="h-8 w-auto sm:h-10"
                                     src="https://tailwindui.com/img/logos/mark.svg?from-color=teal&from-shade=200&to-color=cyan&to-shade=400&toShade=400"
                                     alt="">
                            </a>
                            <div class="-mr-2 flex items-center md:hidden">
                                <button type="button"
                                        class="focus-ring-inset inline-flex items-center justify-center rounded-md bg-gray-900 p-2 text-gray-400 hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-white"
                                        aria-expanded="false">
                                    <span class="sr-only">Open main menu</span>
                                    <!-- Heroicon name: outline/bars-3 -->
                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                         aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="hidden space-x-8 md:ml-10 md:flex">
{{--                            <a href="#" class="text-base font-medium text-white hover:text-gray-300">Product</a>--}}
{{----}}
{{--                            <a href="#" class="text-base font-medium text-white hover:text-gray-300">Features</a>--}}
{{----}}
{{--                            <a href="#" class="text-base font-medium text-white hover:text-gray-300">Marketplace</a>--}}
{{----}}
{{--                            <a href="#" class="text-base font-medium text-white hover:text-gray-300">Company</a>--}}
                        </div>
                    </div>
                    <div class="hidden md:flex md:items-center md:space-x-6">
                        <a href="{{ route('login') }}" class="text-base font-medium text-white hover:text-gray-300">Log in</a>
                        <a href="{{ route('register') }}"
                           class="inline-flex items-center rounded-md border border-transparent bg-gray-600 px-4 py-2 text-base font-medium text-white hover:bg-gray-700">Regístrate</a>
                    </div>
                </nav>
            </div>

            <!--
              Mobile menu, show/hide based on menu open state.

              Entering: "duration-150 ease-out"
                From: "opacity-0 scale-95"
                To: "opacity-100 scale-100"
              Leaving: "duration-100 ease-in"
                From: "opacity-100 scale-100"
                To: "opacity-0 scale-95"
            -->
            <div class="absolute inset-x-0 top-0 origin-top transform p-2 transition md:hidden">
                <div class="overflow-hidden rounded-lg bg-white shadow-md ring-1 ring-black ring-opacity-5">
                    <div class="flex items-center justify-between px-5 pt-4">
                        <div>
                            <img class="h-8 w-auto"
                                 src="https://tailwindui.com/img/logos/mark.svg?from-color=teal&from-shade=500&to-color=cyan&to-shade=600&toShade=600"
                                 alt="">
                        </div>
                        <div class="-mr-2">
                            <button type="button"
                                    class="inline-flex items-center justify-center rounded-md bg-white p-2 text-gray-400 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-cyan-600">
                                <span class="sr-only">Close menu</span>
                                <!-- Heroicon name: outline/x-mark -->
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="pt-5 pb-6">
                        <div class="space-y-1 px-2">
{{--                            <a href="#"--}}
{{--                               class="block rounded-md px-3 py-2 text-base font-medium text-gray-900 hover:bg-gray-50">Product</a>--}}

{{--                            <a href="#"--}}
{{--                               class="block rounded-md px-3 py-2 text-base font-medium text-gray-900 hover:bg-gray-50">Features</a>--}}
{{----}}
{{--                            <a href="#"--}}
{{--                               class="block rounded-md px-3 py-2 text-base font-medium text-gray-900 hover:bg-gray-50">Marketplace</a>--}}
{{----}}
{{--                            <a href="#"--}}
{{--                               class="block rounded-md px-3 py-2 text-base font-medium text-gray-900 hover:bg-gray-50">Company</a>--}}
                        </div>
                        <div class="mt-6 px-5">
                            <a href="{{ route('register') }}"
                               class="block w-full rounded-md bg-gradient-to-r from-teal-500 to-cyan-600 py-3 px-4 text-center font-medium text-white shadow hover:from-teal-600 hover:to-cyan-700">Registrate</a>
                        </div>
                        <div class="mt-6 px-5">
                            <p class="text-center text-base font-medium text-gray-500">Usuario existente? <a href="{{ route('login') }}"
                                                                                                             class="text-gray-900 hover:underline">Login</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <main>
            <div class="bg-gray-900 pt-10 sm:pt-16 lg:overflow-hidden lg:pt-8 lg:pb-14">
                <div class="mx-auto max-w-7xl lg:px-8">
                    <div class="lg:grid lg:grid-cols-2 lg:gap-8">
                        <div
                            class="mx-auto max-w-md px-6 sm:max-w-2xl sm:text-center lg:flex lg:items-center lg:px-0 lg:text-left">
                            <div class="lg:py-24">
                                <h1 class="mt-4 text-4xl font-bold tracking-tight text-white sm:mt-5 sm:text-6xl lg:mt-6 xl:text-6xl">
                                    <span >Una forma coordinada de</span>
                                    <span
                                        class="bg-gradient-to-r from-teal-200 to-cyan-400 bg-clip-text pb-3 text-transparent sm:pb-5">activismo</span>
                                </h1>
                                <p class="text-base text-gray-300 sm:text-xl lg:text-lg xl:text-xl">Un boicot consiste
                                    en negarse a comprar, vender, o practicar alguna otra forma de relación comercial o
                                    de otro tipo con un individuo o una empresa considerados, por los participantes en
                                    el boicot, como autores de algo moralmente reprobable.</p>
                                <div class="mt-10 sm:mt-12">
                                    <form action="{{ route('subscription.store') }}"
                                          method="POST"
                                          class="sm:mx-auto sm:max-w-xl lg:mx-0">
                                        @csrf
                                        <div class="sm:flex">
                                            <div class="min-w-0 flex-1">
                                                <label for="email" class="sr-only">Email address</label>
                                                <input id="email" type="email" name="email"
                                                       placeholder="Enter your email"
                                                       class="block w-full rounded-md border-0 px-4 py-3 text-base text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:ring-offset-2 focus:ring-offset-gray-900">
                                            </div>
                                            <div class="mt-3 sm:mt-0 sm:ml-3">
                                                <button type="submit"
                                                        class="block w-full rounded-md bg-gradient-to-r from-teal-500 to-cyan-600 py-3 px-4 font-medium text-white shadow hover:from-teal-600 hover:to-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:ring-offset-2 focus:ring-offset-gray-900">
                                                    Suscríbete
                                                </button>
                                            </div>
                                        </div>
                                        <p class="mt-3 text-sm text-gray-300 sm:mt-4">Comienza a ser parte de la <a
                                            href="https://twitter.com/i/communities/1586057270831480832"
                                            class="font-medium text-white">comunidad</a>.</p>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="mt-12 -mb-16 sm:-mb-48 lg:relative lg:m-0">
                            <div class="mx-auto max-w-md px-6 sm:max-w-2xl lg:max-w-none lg:px-0">
                                <!-- Illustration taken from Lucid Illustrations: https://lucid.pixsellz.io/ -->
                                <img class="w-full lg:absolute lg:inset-y-0 lg:left-0 lg:h-full lg:w-auto lg:max-w-none"
                                     src="https://tailwindui.com/img/component-images/cloud-illustration-teal-cyan.svg"
                                     alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Feature section with grid -->
            <div class="relative bg-white py-16 sm:py-24 lg:py-32">
                <div class="mx-auto max-w-md px-6 text-center sm:max-w-3xl lg:max-w-7xl lg:px-8">
                    <h2 class="text-lg font-semibold text-cyan-600">Cómo funciona</h2>
                    <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Pasos básicos para hacer
                        la diferencia.</p>

                    <div class="mt-12">
                        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                            <div class="pt-6">
                                <div class="flow-root rounded-lg bg-gray-50 px-6 pb-8">
                                    <div class="-mt-6">
                                        <div>
                      <span
                          class="inline-flex items-center justify-center rounded-md bg-gradient-to-r from-teal-500 to-cyan-600 p-3 shadow-lg">
                        <!-- Heroicon name: outline/cloud-arrow-up -->
                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                          <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z"/>
                        </svg>
                      </span>
                                        </div>
                                        <h3 class="mt-8 text-lg font-medium tracking-tight text-gray-900">Revisa tu
                                            correo</h3>
                                        <p class="mt-5 text-base text-gray-500">El primer martes de cada mes recibirás
                                            un email con el negocio destacado del mes.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="pt-6">
                                <div class="flow-root rounded-lg bg-gray-50 px-6 pb-8">
                                    <div class="-mt-6">
                                        <div>
                      <span
                          class="inline-flex items-center justify-center rounded-md bg-gradient-to-r from-teal-500 to-cyan-600 p-3 shadow-lg">
                        <!-- Heroicon name: outline/lock-closed -->
                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                          <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"/>
                        </svg>
                      </span>
                                        </div>
                                        <h3 class="mt-8 text-lg font-medium tracking-tight text-gray-900">Lee el
                                            correo</h3>
                                        <p class="mt-5 text-base text-gray-500">El email tendrá los botones con los
                                            enlaces a los perfiles del negocio, da clic en cada uno.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="pt-6">
                                <div class="flow-root rounded-lg bg-gray-50 px-6 pb-8">
                                    <div class="-mt-6">
                                        <div>
                      <span
                          class="inline-flex items-center justify-center rounded-md bg-gradient-to-r from-teal-500 to-cyan-600 p-3 shadow-lg">
                        <!-- Heroicon name: outline/arrow-path -->
                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                          <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99"/>
                        </svg>
                      </span>
                                        </div>
                                        <h3 class="mt-8 text-lg font-medium tracking-tight text-gray-900">Califica con 1
                                            estrella</h3>
                                        <p class="mt-5 text-base text-gray-500">Califica negativo el negocio en cada
                                            plataforma y opcionalmente deja una reseña con la razón.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Destacado del mes -->
            @if($prospect)
                <div class="bg-gradient-to-r from-teal-500 to-cyan-600 pb-16 lg:relative lg:z-10 lg:pb-0">
                    <div class="relative isolate overflow-hidden py-24 px-6 sm:py-32 lg:px-8">
                        <img src="{{ $prospect->getFirstMediaUrl() }}" alt="Imagen de {{ $prospect->name }} con banqueta invadida." class="absolute inset-0 -z-10 h-full w-full object-cover">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1097 845" aria-hidden="true" class="hidden transform-gpu blur-3xl sm:absolute sm:-top-10 sm:right-1/2 sm:-z-10 sm:mr-10 sm:block sm:w-[68.5625rem]">
                            <path fill="url(#10724532-9d81-43d2-bb94-866e98dd6e42)" fill-opacity=".2" d="M301.174 646.641 193.541 844.786 0 546.172l301.174 100.469 193.845-356.855c1.241 164.891 42.802 431.935 199.124 180.978 195.402-313.696 143.295-588.18 284.729-419.266 113.148 135.13 124.068 367.989 115.378 467.527L811.753 372.553l20.102 451.119-530.681-177.031Z" />
                            <defs>
                                <linearGradient id="10724532-9d81-43d2-bb94-866e98dd6e42" x1="1097.04" x2="-141.165" y1=".22" y2="363.075" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#776FFF" />
                                    <stop offset="1" stop-color="#FF4694" />
                                </linearGradient>
                            </defs>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1097 845" aria-hidden="true" class="absolute left-1/2 -top-52 -z-10 w-[68.5625rem] -translate-x-1/2 transform-gpu blur-3xl sm:top-[-28rem] sm:ml-16 sm:translate-x-0">
                            <path fill="url(#8ddc7edb-8983-4cd7-bccb-79ad21097d70)" fill-opacity=".2" d="M301.174 646.641 193.541 844.786 0 546.172l301.174 100.469 193.845-356.855c1.241 164.891 42.802 431.935 199.124 180.978 195.402-313.696 143.295-588.18 284.729-419.266 113.148 135.13 124.068 367.989 115.378 467.527L811.753 372.553l20.102 451.119-530.681-177.031Z" />
                            <defs>
                                <linearGradient id="8ddc7edb-8983-4cd7-bccb-79ad21097d70" x1="1097.04" x2="-141.165" y1=".22" y2="363.075" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#776FFF" />
                                    <stop offset="1" stop-color="#FF4694" />
                                </linearGradient>
                            </defs>
                        </svg>
                        <div class="mx-auto max-w-2xl text-center">
                            <h2 class="text-4xl font-bold tracking-tight text-white sm:text-6xl">Destacado Del Mes</h2>
                            <p class="mt-6 text-lg leading-8 text-gray-200 font-bold">{{ $prospect->name }}</p>
                            <p class="mt-6 text-lg leading-8 text-gray-200 font-semibold">{{ $prospect->description }}</p>
                        </div>
                        <div class="mx-auto max-w-2xl text-center">
                            @if($prospect->google_maps_link)
                            <a href="{{ $prospect->facebook_link }}"><x-primary-button>Página de Facebook</x-primary-button></a>
                            @endif
                            @if($prospect->facebook_link)
                            <a href="{{ $prospect->google_maps_link }}"><x-primary-button>Google Maps</x-primary-button></a>
                            @endif
                        </div>

                    </div>
                </div>
            @else
            <div class="bg-gradient-to-r from-teal-500 to-cyan-600 pb-16 lg:relative lg:z-10 lg:pb-0">
                <div class="relative isolate overflow-hidden py-24 px-6 sm:py-32 lg:px-8">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1097 845" aria-hidden="true" class="hidden transform-gpu blur-3xl sm:absolute sm:-top-10 sm:right-1/2 sm:-z-10 sm:mr-10 sm:block sm:w-[68.5625rem]">
                        <path fill="url(#10724532-9d81-43d2-bb94-866e98dd6e42)" fill-opacity=".2" d="M301.174 646.641 193.541 844.786 0 546.172l301.174 100.469 193.845-356.855c1.241 164.891 42.802 431.935 199.124 180.978 195.402-313.696 143.295-588.18 284.729-419.266 113.148 135.13 124.068 367.989 115.378 467.527L811.753 372.553l20.102 451.119-530.681-177.031Z" />
                        <defs>
                            <linearGradient id="10724532-9d81-43d2-bb94-866e98dd6e42" x1="1097.04" x2="-141.165" y1=".22" y2="363.075" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#776FFF" />
                                <stop offset="1" stop-color="#FF4694" />
                            </linearGradient>
                        </defs>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1097 845" aria-hidden="true" class="absolute left-1/2 -top-52 -z-10 w-[68.5625rem] -translate-x-1/2 transform-gpu blur-3xl sm:top-[-28rem] sm:ml-16 sm:translate-x-0">
                        <path fill="url(#8ddc7edb-8983-4cd7-bccb-79ad21097d70)" fill-opacity=".2" d="M301.174 646.641 193.541 844.786 0 546.172l301.174 100.469 193.845-356.855c1.241 164.891 42.802 431.935 199.124 180.978 195.402-313.696 143.295-588.18 284.729-419.266 113.148 135.13 124.068 367.989 115.378 467.527L811.753 372.553l20.102 451.119-530.681-177.031Z" />
                        <defs>
                            <linearGradient id="8ddc7edb-8983-4cd7-bccb-79ad21097d70" x1="1097.04" x2="-141.165" y1=".22" y2="363.075" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#776FFF" />
                                <stop offset="1" stop-color="#FF4694" />
                            </linearGradient>
                        </defs>
                    </svg>
                    <div class="mx-auto max-w-2xl text-center">
                        <h2 class="text-4xl font-bold tracking-tight text-white sm:text-6xl">Aún no hay destacado del mes se el primero en registrar un negocio. </h2>
                    </div>
                </div>
            </div>
            @endif
        </main>
        <footer class="bg-gray-50" aria-labelledby="footer-heading">
            <h2 id="footer-heading" class="sr-only">Footer</h2>
            <div class="mx-auto max-w-md px-6 pt-12 sm:max-w-7xl lg:px-8 lg:pt-16">
                <div class="xl:grid xl:grid-cols-3 xl:gap-8">
                    <div class="space-y-8 xl:col-span-1">
                        <img class="h-10" src="https://tailwindui.com/img/logos/mark.svg?color=gray&shade=300"
                             alt="Company name">
                        <p class="text-base text-gray-500">Boicot a todos los negocios que abusan de las banquetas con fines de lucro.</p>
                        <div class="flex space-x-6">
                            <a href="https://twitter.com/i/communities/1586057270831480832" class="text-gray-400 hover:text-gray-500">
                                <span class="sr-only">Twitter</span>
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path
                                        d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="mt-12 grid grid-cols-2 gap-8 xl:col-span-2 xl:mt-0">
                    </div>
                </div>
                <div class="mt-12 border-t border-gray-200 py-8">
                    <p class="text-base text-gray-400 xl:text-center">2023</p>
                </div>
            </div>
        </footer>
    </div>
</div>

</body>
</html>
