<div>
<x-main-layout>
    <x-slot name="title">Мои тестовый магазин</x-slot>
    <x-slot name="content">
    @foreach ($products as $product)
    <x-product>
        <x-slot name="id">{{ $product->id }}</x-slot>
        <x-slot name="name">{{ $product->name }}</x-slot>
        <x-slot name="photo">{{ $product->photo }}</x-slot>
        <x-slot name="price">{{ $product->price }}</x-slot>
    </x-product>    
    @endforeach
    <!-- Здесь моя пагинация -->
    {{ $products->links('pagination') }}
    </x-slot>
</x-main-layout>
</div>
