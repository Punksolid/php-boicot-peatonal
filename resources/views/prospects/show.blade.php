<x-app-layout title="Prospecto">
    <div class="bg-white">
        <div class="pt-6 pb-16 sm:pb-24">
            <nav aria-label="Breadcrumb" class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <ol role="list" class="flex items-center space-x-4">
                    <li>
                        <div class="flex items-center">
                            <a href="#" class="mr-4 text-sm font-medium text-gray-900"></a>
                            <svg viewBox="0 0 6 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="h-5 w-auto text-gray-300">
                                <path d="M4.878 4.34H3.551L.27 16.532h1.327l3.281-12.19z" fill="currentColor" />
                            </svg>
                        </div>
                    </li>

                    <li>
                        <div class="flex items-center">
                            <a href="#" class="mr-4 text-sm font-medium text-gray-900"></a>
                            <svg viewBox="0 0 6 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="h-5 w-auto text-gray-300">
                                <path d="M4.878 4.34H3.551L.27 16.532h1.327l3.281-12.19z" fill="currentColor" />
                            </svg>
                        </div>
                    </li>

                    <li class="text-sm">
                        <a href="#" aria-current="page" class="font-medium text-gray-500 hover:text-gray-600">Banquetacionamiento</a>
                    </li>
                </ol>
            </nav>
            <div class="mx-auto mt-8 max-w-2xl px-4 sm:px-6 lg:max-w-7xl lg:px-8">
                <div class="lg:grid lg:auto-rows-min lg:grid-cols-12 lg:gap-x-8">
                    <div class="lg:col-span-5 lg:col-start-8">
                        <div class="flex justify-between">
                            <h1 class="text-xl font-medium text-gray-900">{{ $prospect->name }}</h1>
                            <p class="text-xl font-medium text-gray-900">
                               Votos: {{ $votes }}
                            </p>
                        </div>
                        <!-- Reviews -->
                      
                    </div>

                    <!-- Image gallery -->
                    <div class="mt-8 lg:col-span-7 lg:col-start-1 lg:row-span-3 lg:row-start-1 lg:mt-0">
                        <h2 class="sr-only">Images</h2>

                        <div class="grid grid-cols-1 lg:grid-cols-2 lg:grid-rows-3 lg:gap-8">
                            <img src="{{ $prospect->getFirstMediaUrl()  }}" alt="Imagen de invasión de banqueta." class="lg:col-span-2 lg:row-span-2 rounded-lg">

                            @if(isset($prospect->getMedia()[1]))
                                <img src="{{ $prospect->getMedia()[1]->getUrl() }}" alt="Imagen de invasión de banqueta" class="hidden lg:block rounded-lg">
                            @endif
                            @if(isset($prospect->getMedia()[2]))
                                <img src="{{ $prospect->getMedia()[2]->getUrl() }}" alt="Imagen de invasión de banqueta" class="hidden lg:block rounded-lg">
                            @endif

                        </div>
                    </div>

                    <div class="lg:col-span-5">


                    <!-- Voting -->
                        <div class="mt-4 pb-8 border-b border-gray-200">
                            <h2 class="mb-2" >Votar </h3>
                            <div class='flex justify-between gap-5'>
                            @if(auth()->user()->hasVotedOn($prospect))
                                <form action="{{ route('votes.downvote', [$prospect->id]) }}" method="POST" class="flex-auto">
                                    @csrf
                                    <button type="submit" 
                                    aria-label="Quitar un voto"
                                    class="w-full rounded-md border border-indigo-400 bg-transparent py-3 px-8 text-base font-extrabold text-indigo-500 hover:bg-indigo-500 hover:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                        - 1
                                    </button>
                                </form>
                            @endif
                            <form action="{{ route('votes.store', [$prospect->id]) }}" method="POST" class="flex-auto">
                                @csrf
                                <button type="submit" 
                                aria-label="Dejar un voto"
                                class="w-full rounded-md border border-transparent bg-indigo-400 py-3 px-8 text-base font-extrabold text-white hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                    + 1
                                </button>
                            </form>

                        </div>
                        <div class="mt-2">
                            <p class="text-sm font-medium text-gray-900">Costo de créditos para el siguiente voto: {{ $cost_of_next_vote }}</p>
                            <a href="{{ route('faq.voting.system') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">¿Cómo funciona el sistema de votación?</a>
                        </div>
                    </div>
                        <!-- Product details -->
                        <div class="mt-8">
                            <h2 class="font-medium text-gray-900 mb-2">{{ __('Description') }}</h2>

                            <div class="prose prose-sm  text-gray-500">
                                {{ $prospect->description }}
                            </div>
                        </div>

                        <div class="mt-8 border-t border-gray-200 pt-8">
                            <h2 class="font-medium text-gray-900 mb-2">Características especiales</h2>

                            <div class="prose prose-sm  text-gray-500">
                                <ul role="list">
                                    @if($prospect->is_from_politician)
                                        <li>Parece que este lugar está relacionado a un político o funcionaro público.</li>
                                    @endif
                                    @if($prospect->is_from_bussiness)
                                        <li>Este lugar es de un negocio.</li>
                                    @endif
                                    @if($prospect->is_from_media)
                                        <li>Este lugar es socialmente relevante.</li>
                                    @endif
                                </ul>
                            </div>
                        </div>

                        <!-- Policies -->
                        <section aria-labelledby="policies-heading" class="mt-8">
                            <h2 id="policies-heading" class="sr-only">Our Policies</h2>
                            <dl class="">
                                @if($prospect->google_maps_link)
                                <div class="mb-2">
                                    <a href="{{ $prospect->google_maps_link }}" class="mb-2" >
                                        <div class="rounded-lg border border-gray-200 bg-gray-50 p-6 text-center">
                                            <dt>
                                                <!-- Heroicon name: outline/globe-americas -->
                                                <svg class="mx-auto h-6 w-6 flex-shrink-0 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.115 5.19l.319 1.913A6 6 0 008.11 10.36L9.75 12l-.387.775c-.217.433-.132.956.21 1.298l1.348 1.348c.21.21.329.497.329.795v1.089c0 .426.24.815.622 1.006l.153.076c.433.217.956.132 1.298-.21l.723-.723a8.7 8.7 0 002.288-4.042 1.087 1.087 0 00-.358-1.099l-1.33-1.108c-.251-.21-.582-.299-.905-.245l-1.17.195a1.125 1.125 0 01-.98-.314l-.295-.295a1.125 1.125 0 010-1.591l.13-.132a1.125 1.125 0 011.3-.21l.603.302a.809.809 0 001.086-1.086L14.25 7.5l1.256-.837a4.5 4.5 0 001.528-1.732l.146-.292M6.115 5.19A9 9 0 1017.18 4.64M6.115 5.19A8.965 8.965 0 0112 3c1.929 0 3.716.607 5.18 1.64" />
                                                </svg>
                                                <span class="mt-4 text-sm font-medium text-gray-900">Ir a Google Maps</span>
                                            </dt>
                                            <dd class="mt-1 text-sm text-gray-500">Mucha gente entra a ver la calificación general.</dd>
                                        </div>
                                    </a>
</div>
                                @endif
                                @if($prospect->facebook_link)
                                    <a href="{{ $prospect->facebook_link }}" >
                                        <div class="rounded-lg border border-gray-200 bg-gray-50 p-6 text-center">
                                            <dt>
                                                <!-- Heroicon name: outline/currency-dollar -->
                                                <svg class="mx-auto h-6 w-6 flex-shrink-0 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                <span class="mt-4 text-sm font-medium text-gray-900">Ir a Facebook</span>
                                            </dt>
                                            <dd class="mt-1 text-sm text-gray-500">Otros contactos podrán ver que votaste negativo.</dd>
                                        </div>
                                    </a>
                                @endif

                            </dl>
                        </section>

                        <!-- Share buttons section -->
                        <div class="mt-8 border-t border-gray-200 pt-8">

                            <h2 id="share-heading" class="text-sm font-medium text-gray-900">Comparte esta página</h2>
                            <section aria-labelledby="share-heading" class="mt-10">

                                <div class="flex justify-center space-x-6">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('prospects.show', ['prospect' => $prospect->id]) }}">
                                        <i class="fab fa-facebook fa-2x"></i>
                                        <span class="sr-only">Share on Facebook</span>
                                    </a>

                                    <a href="https://twitter.com/share?url={{ route('prospects.show', ['prospect' => $prospect->id]) }}&text=Revisa esta página de BoicotPeatonal.ORG! {{ $prospect->name }}" class="text-gray-400 hover:text-gray-500">
                                        <i class="fab fa-twitter fa-2x"></i>
                                        <span class="sr-only">Twitter</span>
                                    </a>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
