<x-app-layout xmlns="http://www.w3.org/1999/html">

    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">Por favor corrige los siguientes errores:</span>
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form enctype="multipart/form-data"
          method="POST"
          action="{{ route('prospects.store', 'uuid='. $uuid) }}"
          id="dropzone-form"
          class="dropzone space-y-8 divide-y divide-gray-200">
        @csrf

        <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
            <div class="space-y-6 sm:space-y-5">
                <div>
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Registra Lugar Invadido</h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        Esta información será pública, así que solo agrega
                        cosas actualmente públicas.
                    </p>
                </div>
                <div class="space-y-6 sm:space-y-5">
                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="name"
                               class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Nombre *</label>
                        <div class="mt-1 sm:col-span-2 sm:mt-0">
                            <div class="flex max-w-lg rounded-md shadow-sm">
                                <input type="text"
                                       name="name"
                                       id="name"
                                       autocomplete="name"
                                       value="{{ old('name') }}"
                                       class="block w-full min-w-0 flex-1 rounded-md  border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            </div>
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="description" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Descripcion</label>
                        <div class="mt-1 sm:col-span-2 sm:mt-0">
                            <textarea id="description"
                                      name="description"
                                      rows="3"
                                      class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
{{ old('description') }}
                            </textarea>
                            <p class="mt-2 text-sm text-gray-500">Escribe una descripción de la problematica.</p>
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="cover-photo" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Foto
                            de Portada</label>
                        <div class="mt-1 sm:col-span-2 sm:mt-0">

                            <div
                                class="flex max-w-lg justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                                <div id="dropzone" class=accent-blue-600"/>
                                <DIV class="dz-message needsclick">
                                    Drop files here or click to upload.<BR>

                                </DIV>

                                {{--                                <input--}}
                                {{--                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"--}}
                                {{--                                    id="file_input"--}}
                                {{--                                    type="file"--}}
                                {{--                                    name="cover-photo"--}}
                                {{--                                >--}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-6 pt-8 sm:space-y-5 sm:pt-10">
                <div>
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Información Adicional</h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">Agrega detalles opcionales.</p>
                </div>
                <div class="space-y-6 sm:space-y-5">
                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="email" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Caracteristicas</label>
                        <div class="mt-1 sm:col-span-2 sm:mt-0">
                            <div class="relative flex items-start">
                                <div class="flex h-5 items-center">
                                    <input id="has_bumps"
                                           name="has_bumps"
                                           type="checkbox"
                                           value="1"
                                           class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                                        {{ old('has_bumps') ? 'checked' : '' }}
                                    >
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="has_bumps" class="font-medium text-gray-700">Topes de Goma, barras de
                                        metal o cemento</label>
                                    <p class="text-gray-500">Si el local tiene topes de goma o cemento para detener las
                                        llantas de los autos.</p>
                                </div>
                            </div>
                            <div class="relative flex items-start">
                                <div class="flex h-5 items-center">
                                    <input id="is_from_politician"
                                           name="is_from_politician"
                                           type="checkbox"
                                           value="1"
                                           {{ old('is_from_politician') ? 'checked' : '' }}
                                               class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="is_from_politician" class="font-medium text-gray-700">Es propiedad de un
                                        politico o funcionario público.</label>
                                    <p class="text-gray-500">Si el local es propiedad de un funcionario público, si hay
                                        duda entonces no.</p>
                                </div>
                            </div>
                            <div class="relative flex items-start">
                                <div class="flex h-5 items-center">
                                    <input id="is_from_business"
                                           name="is_from_business"
                                           {{ old('is_from_business') ? 'checked' : '' }}
                                               type="checkbox"
                                           value="1"
                                           class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="is_from_business" class="font-medium text-gray-700">El local aparenta
                                        tener fines de lucro.</label>
                                    <p class="text-gray-500">Si no es una casa, terreno abandonado o alguna ONG.</p>
                                </div>
                            </div>
                            <div class="relative flex items-start">
                                <div class="flex h-5 items-center">
                                    <input id="is_from_media"
                                           name="is_from_media"
                                           type="checkbox"
                                           value="1"
                                           {{ old('is_from_media') ? 'checked' : '' }}
                                               class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="is_from_media" class="font-medium text-gray-700">El local está asignado
                                        a un medio de comunicación?.</label>
                                    <p class="text-gray-500">Si en el local está ubicado algún medio de
                                        comunicación.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="google_maps_link" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Link
                            en Google Maps</label>
                        <div class="mt-1 sm:col-span-2 sm:mt-0">
                            <input type="url"
                                   name="google_maps_link"
                                   id="google_maps_link"
                                   autocomplete="google_maps_link"
                                   value="{{ old('google_maps_link') }}"
                                   class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm">
                        </div>
                    </div>
                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="facebook_link" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Link
                            en Facebook</label>
                        <div class="mt-1 sm:col-span-2 sm:mt-0">
                            <input type="url"
                                   name="facebook_link"
                                   id="facebook_link"
                                   autocomplete="facebook_link"
                                   value="{{ old('facebook_link') }}"
                                   class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm">
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="pt-5">
            <div class="flex justify-end">
                <button type="button"
                        class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Regresar
                </button>
                <button type="submit"
                        class="ml-3 inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Guardar
                </button>
            </div>
        </div>

        </div>
    </form>

        <script>
            let dropzone = new Dropzone("#dropzone", {
                url: "{{ route('temporary-files.store', 'uuid='.$uuid) }}",
                maxFiles: 3,
                maxFilesize: 6,
                acceptedFiles: 'image/*',
                addRemoveLinks: true,
                uploadMultiple: true,
            });

            dropzone.on('removedfile', function (file) {
                axios.delete('{{ route('temporary-files.destroy', 'uuid='.$uuid) }}/', {
                    data: {
                        filename: file.name
                    }
                }).then(response => {
                    console.log(response);
                }).catch(error => {
                    console.log(error);
                });
            });
        </script>
</x-app-layout>
