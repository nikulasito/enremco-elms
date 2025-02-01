<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <p class="mt-2 text-sm text-gray-600">
        {{ __('Your current status is: ') }}
        <span class="font-semibold 
            {{ auth()->user()->status === 'Active' ? 'text-green-500' : 'text-red-500' }}">
            {{ auth()->user()->status }}
        </span>
    </p>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
