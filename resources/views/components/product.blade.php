<div class="product">
    <img src="{{ $photo }}" /><br />
    <label>Название товара: <b>{{ $name }}</b></label><br />
    <label>Цена товара: <b>{{ $price }} </b>рублей</label><br /><br />
    <button onclick="basket_add({{ $id }})">Добавить в корзину</button><br />
    <button class="show_div_detail" onclick="show_div_detail({{ $id }})">Подробнее</button>
</div>