<x-guest-layout title="Prospectos">
    <div class="bg-white">
        <div class="mx-auto max-w-2xl py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
            <h2 class="text-xl font-bold text-gray-900">Prospectos</h2>
            {{-- add button link Send Prospect to top right corner--}}

            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-auto">
                <a href="{{ route('prospects.create') }}">Enviar Prospecto</a>
            </button>

            <div class="mt-8 grid grid-cols-1 gap-y-12 sm:grid-cols-2 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">
                @foreach($prospects as $prospect)
                    <div>
                        <div class="relative">
                            <div class="relative h-72 w-full overflow-hidden rounded-lg">
                                <img src="{{ $prospect->image_url }}" alt="Front of zip tote bag with white canvas, black canvas straps and handle, and black zipper pulls." class="h-full w-full object-cover object-center">
                            </div>
                            <div class="relative mt-4">
                                <h3 class="text-sm font-medium text-gray-900">{{ $prospect->city }}, {{ $prospect->country }}</h3>
                                <p class="mt-1 text-sm text-gray-500">{{ $prospect->description }}</p>
                            </div>
                            <div class="absolute inset-x-0 top-0 flex h-72 items-end justify-end overflow-hidden rounded-lg p-4">
                                <div aria-hidden="true" class="absolute inset-x-0 bottom-0 h-36 bg-gradient-to-t from-black opacity-50"></div>
                                <p class="relative text-lg font-semibold text-white">$140</p>
                            </div>
                        </div>
                        <div class="mt-6">

                            <a href="{{ route('prospects.show', ['prospect' => $prospect]) }}" class="relative flex items-center justify-center rounded-md border border-transparent bg-gray-100 py-2 px-8 text-sm font-medium text-gray-900 hover:bg-gray-200">Ver Información Detallada<span class="sr-only">{{ $prospect->city }}, {{ $prospect->country }}</span></a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>


</x-guest-layout>
