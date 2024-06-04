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
    <!-- js нажатия на кнопки Подробнее -->
    <script>
        $(".show_div_detail").click(function(){
            //делаем запрос к БД
            $.ajax({                         
	        url: 'http://testplotnikovap.ru/api/shop/product/'+this.id,                        
	        method: 'GET',
	        async: false,
	        }).done(function(data) {
		        if (!!data) {
                    $("#photo").attr('src', data.photo);
                    $("#name").text('Название товара: '+data.name);
                    $("#price").text('Цена товара: '+data.price+' рублей');
                    $("#description").text('Описание товара: '+data.description);
                    $("#on_sklad").text('Осталось на складе: '+data.on_sklad);
                    $('#modal_product_detail').show();
			        console.log(data);
		        } else {
			        result=false;
		        }
	        });
        });
        $(".basket_add").click(function() {
            //делаем запрос к БД
            $.ajax({                         
	        url: 'http://testplotnikovap.ru/api/basket/add/'+this.id,                        
	        method: 'GET',
            async: false
            }).done(function(data) {
		        if (!!data) {
                    alert('Товар в корзину добавлен');
                } else {
                    alert('Товар в корзину не добавлен');
                }
            });
        });
    </script>
    <!-- Здесь моя пагинация -->
    {{ $products->links('pagination') }}
    </x-slot>
</x-main-layout>
</div>
