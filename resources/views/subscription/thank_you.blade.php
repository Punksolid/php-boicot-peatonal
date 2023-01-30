<x-guest-layout title="thank you">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gracias por suscribirte') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ $message }}
                    {{ __("Gracias por suscribirte a la causa.") }}
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
