<x-layout>
    <x-slot:heading>
        Job Information
    </x-slot:heading>
    <h2 class="font-bold text-lg">{{ $job['title'] }}</h2>
    <p> {{ $job['description'] }}</p>
</x-layout>
