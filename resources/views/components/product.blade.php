<div class="product">
    <img src="{{ $photo }}" />
    <label><b>{{ $name }}</b></label><br />
    <label>Цена: <b>{{ $price }} </b>рублей</label><br />
    <button onclick="basket_add({{ $id }})">Добавить в корзину</button><br />
    <button class="show_div_detail" onclick="show_div_detail({{ $id }})">Подробнее</button>
</div>