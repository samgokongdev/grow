<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xs text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <livewire:dashboard />
</x-app-layout>
