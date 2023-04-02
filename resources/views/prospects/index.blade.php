<x-app-layout title="Prospectos">
    <div class="bg-white">

        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-xl font-semibold text-gray-900">Prospectos</h1>
                <p class="mt-2 text-sm text-gray-700">Una lista de todos los prospectos denunciados de los cuales
                    tomaremos uno destacado cada mes.</p>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                    <a class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto"
                    href="{{ route('prospects.create') }}">Enviar Prospecto</a>
            </div>
        </div>

        <div class="mt-8 flex gap-8 justify-start flex-wrap">
            @foreach($prospects as $prospect)
            <div class='w-64'>

                <div class="relative h-72 w-full overflow-hidden rounded-lg">
                    <img src="{{ $prospect->getFirstMediaUrl() }}"
                        alt="Imagen de {{ $prospect->name }} con banqueta invadida."
                        class="h-full  object-cover object-center text-gray-500">

                    <div class="absolute inset-x-0 bottom-0 h-36 bg-gradient-to-t from-black opacity-50"></div>
                    <p class="absolute bottom-1 right-2 text-lg font-semibold @if($mostVotedProspectId == $prospect->id) text-red-300 @else text-white @endif">Votos:
                        {{ $prospect->getCountVotes() }}
                    </p>
                </div>

                <div class=" mt-4">
                    <p class="text-sm font-medium text-gray-900">{{ $prospect->name }}</p>
                    <p class="mt-1 text-sm text-gray-500">{{ substr($prospect->description, 0, 100) }}...</p>
                </div>

                <div class="mt-2">

                    @if($prospect->isCreatedByUserLogged())
                    <div class=" flex justify-between">
                        <a href="{{ route('prospects.show', ['prospect' => $prospect]) }}"
                            class="flex align-baseline items-center rounded-md border border-transparent bg-gray-100 py-2 px-8 text-sm font-medium text-gray-900 hover:bg-gray-200">
                            Ver
                        </a>

                        <form action="{{ route('prospects.destroy', ['prospect' => $prospect]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-300 flex items-center justify-center rounded-md border border-transparent  py-2 px-8 text-sm font-medium text-gray-900 hover:bg-red-400">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path
                                        d="M18.5 15c-2.484 0-4.5 2.015-4.5 4.5s2.016 4.5 4.5 4.5c2.482 0 4.5-2.015 4.5-4.5s-2.018-4.5-4.5-4.5zm2.5 5h-5v-1h5v1zm-5-11v4.501c-.748.313-1.424.765-2 1.319v-5.82c0-.552.447-1 1-1s1 .448 1 1zm-4 0v10c0 .552-.447 1-1 1s-1-.448-1-1v-10c0-.552.447-1 1-1s1 .448 1 1zm1.82 15h-11.82v-18h2v16h8.502c.312.749.765 1.424 1.318 2zm-6.82-16c.553 0 1 .448 1 1v10c0 .552-.447 1-1 1s-1-.448-1-1v-10c0-.552.447-1 1-1zm14-4h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.316c0 .901.73 2 1.631 2h5.711v2zm-1 2v7.182c-.482-.115-.983-.182-1.5-.182l-.5.025v-7.025h2z" />
                                </svg>
                            </button>
                        </form>
                    </div>

                    @else
                    <a href="{{ route('prospects.show', ['prospect' => $prospect]) }}"
                        class="flex align-baseline items-center rounded-md border border-transparent bg-gray-100 py-2 px-8 text-sm font-medium text-gray-900 hover:bg-gray-200">
                        Ver información detallada
                    </a>

                    @endif
                </div>
            </div>
            @endforeach
        </div>

    </div>
</x-app-layout>
