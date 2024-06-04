<div class="product">
    <img src="{{ $photo }}" /><br />
    <label>Название товара: <b>{{ $name }}</b></label><br />
    <label>Цена товара: <b>{{ $price }} </b>рублей</label><br /><br />
    <input type="button" id="{{ $id }}" class="basket_add" value="Добавить в корзину" />
    <input type="button" id="{{ $id }}" class="show_div_detail" value="Подробнее" />
</div>