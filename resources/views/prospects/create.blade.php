<x-app-layout xmlns="http://www.w3.org/1999/html">

    @if ($errors->any())
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
    <form enctype="multipart/form-data" method="POST" action="{{ route('prospects.store', 'uuid=' . $uuid) }}"
        id="dropzone-form" class="dropzone space-y-8  ">
        @csrf

        <div class="space-y-8  sm:space-y-5">
            <div class="space-y-6 sm:space-y-5">
                <div>
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Registra un local que invada la banqueta
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        Recuerda que esta información será pública
                    </p>
                </div>
                <div class="space-y-6 sm:space-y-5">
                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4  sm:pt-5">
                        <label for="name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Nombre
                            *</label>
                        <div class="mt-1 sm:col-span-2 sm:mt-0">
                            <div class="flex max-w-lg rounded-md shadow-sm">
                                <input type="text" name="name" id="name" autocomplete="name"
                                    value="{{ old('name') }}" required
                                    class="block w-full min-w-0 flex-1 rounded-md  border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            </div>
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:pt-5">
                        <label for="description"
                            class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Descripción de la
                            problemática</label>
                        <div class="mt-1 sm:col-span-2 sm:mt-0">
                            <textarea id="description" name="description" rows="3" maxlength="255" required
                                class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ old('description') }}</textarea>

                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:pt-5">
                        <label for="google_maps_link"
                            class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Link
                            en Google Maps</label>
                        <div class="mt-1 sm:col-span-2 sm:mt-0">
                            <div class="flex max-w-lg rounded-md shadow-sm">

                                <input type="url" name="google_maps_link" id="google_maps_link"
                                    autocomplete="google_maps_link" value="{{ old('google_maps_link') }}" required
                                    class="block w-full min-w-0 flex-1 rounded-md  border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            </div>
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:pt-5">
                        <label for="facebook_link" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Link en Facebook</label>
                        <div class="mt-1 sm:col-span-2 sm:mt-0">
                            <div class="flex max-w-lg rounded-md shadow-sm">
                                <input type="url" name="facebook_link" id="facebook_link"
                                    autocomplete="facebook_link" value="{{ old('facebook_link') }}"
                                    class="block w-full min-w-0 flex-1 rounded-md  border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            </div>
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4  sm:pt-5">
                        <label for="photos" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Fotos del local
                        </label>
                        <div class="mt-1 sm:col-span-2 sm:mt-0">

                            <div
                                class="flex max-w-lg justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                                <div id="imagesDropZone" class="accent-blue-600" />
                                <div class="dz-message needsclick">
                                    Coloca aquí las fotos del local<BR>
                                </div>

                                {{--                                <input --}}
                                {{--                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" --}}
                                {{--                                    id="file_input" --}}
                                {{--                                    type="file" --}}
                                {{--                                    name="cover-photo" --}}
                                {{--                                > --}}

                            </div>
                        </div>
                        <p id="photos-upload-error" class="text-red-500"></p>

                    </div>
                </div>
            </div>

            <div class="space-y-6 sm:space-y-5">
                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4  sm:pt-5">
                    <div class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Características</div>
                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                        <div class="relative flex items-start">
                            <div class="flex h-5 items-center">
                                <input id="has_bumps" name="has_bumps" type="checkbox" value="1"
                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                                    {{ old('has_bumps') ? 'checked' : '' }}>
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="has_bumps" class="font-medium text-gray-700">
                                    Tiene topes de goma o cemento para detener las
                                    llantas de los autos.
                                </label>
                            </div>
                        </div>
                        <div class="relative flex items-start">
                            <div class="flex h-5 items-center">
                                <input id="is_from_politician" name="is_from_politician" type="checkbox" value="1"
                                    {{ old('is_from_politician') ? 'checked' : '' }}
                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="is_from_politician" class="font-medium text-gray-700">Es propiedad de un
                                    politico o funcionario público.</label>

                            </div>
                        </div>
                        <div class="relative flex items-start">
                            <div class="flex h-5 items-center">
                                <input id="is_from_business" name="is_from_business"
                                    {{ old('is_from_business') ? 'checked' : '' }} type="checkbox" value="1"
                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="is_from_business" class="font-medium text-gray-700">El local comercial,
                                    no es casa, terreno abandonado, etc.</label>
                            </div>
                        </div>

                        <div class="relative flex items-start">
                            <div class="flex h-5 items-center">
                                <input id="is_from_media" name="is_from_media" type="checkbox" value="1"
                                    {{ old('is_from_media') ? 'checked' : '' }}
                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="is_from_media" class="font-medium text-gray-700">El local es de un
                                    medio de comunicación.</label>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="flex justify-end">
                <button type="submit"
                    class="ml-3 inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Guardar
                </button>
            </div>
        </div>

        </div>
    </form>

    <script>
        const mainForm = document.getElementById('dropzone-form')
        const uploadPhotosError = document.getElementById("photos-upload-error")

        const maxImageSizeMegaBytes = 6;
        const uploadedImagesSet = new Set();
        const createFileKey = (file) => `${file.size}-${file-name}`


        mainForm.addEventListener('submit', (event) => {
            if (uploadedImagesSet.size === 0) {
                event.preventDefault();
                uploadPhotosError.innerText = 'Por favor sube una imagen.';
                uploadPhotosError.scrollIntoView({
                    block: 'center',
                    behavior: "smooth"
                })
            }
        })


        const imagesDropZone = new Dropzone("#imagesDropZone", {
            url: "{{ route('temporary-files.store', 'uuid=' . $uuid) }}",
            maxFiles: 3,
            maxFilesize: maxImageSizeMegaBytes,
            acceptedFiles: 'image/*',
            addRemoveLinks: true,
            uploadMultiple: true,
            resizeWidth: 2100,
            resizeMimeType: 'image/jpeg',
            resizeQuality: 0.7,
        });

        imagesDropZone.on("success", file => {
            uploadedImagesSet.add(createFileKey(file))
        })

        imagesDropZone.on('error', (file, message) => {
            uploadPhotosError.innerText =
                'Tuvimos problemas al subir algunas imagenes, por favor intenta de nuevo.';
            uploadPhotosError.scrollIntoView({
                block: 'center',
                behavior: "smooth"
            })
        })

        imagesDropZone.on('removedfile', function(file) {

            axios.delete('{{ route('temporary-files.destroy', 'uuid=' . $uuid) }}/', {
                data: {
                    filename: file.name
                }
            }).then(response => {
                uploadedImagesSet.remove(createFileKey(file))
                console.log(response);
            }).catch(error => {
                console.log(error);
            });
        });
    </script>
</x-app-layout>
