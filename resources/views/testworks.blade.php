<x-main-layout>
    <x-slot name="title">Мои работы</x-slot>
    <x-slot name="content">
    @foreach ($testworks as $testwork)
    <x-test-work>
        <x-slot name="url">{{ $testwork->url }}</x-slot>
        <x-slot name="title">{{ $testwork->title }}</x-slot>
        <x-slot name="description">{{ $testwork->description }}</x-slot>
    </x-test-work>
    @endforeach
    </x-slot>
</x-main-layout>