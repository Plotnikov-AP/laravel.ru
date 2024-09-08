<x-main-layout>
    <x-slot name="title">Об авторе</x-slot>
    <x-slot name="content">
    
    <div id="content">                                                                                                                                                                                 
	    <div id="slider">                                                                                                                                                                          
        @foreach ($sliders as $slider)                                                                                                                                                                  
            <div class="slider_item">                                                                                                                                                                  
                <img src="/images/slider/{{ $slider->alias }}.png" alt="{{ $slider->title }}" />                                                                                                      
                <div class="slider_content">                                                                                                                                                           
                    <h3>{{ $slider->title }}</h3>                                                                                                                                                      
                    <p>{!! $slider->slider_description !!}</p>                                                                                                                                           
                </div>                                                                                                                                                                                 
            </div>                                                                                                                                                                                     
        @endforeach
        <div class="clear"></div>                   
            <div id="bullets">                          
                <div class="active"></div>              
                @for ($i = 1; $i < count($sliders); $i++)
                <div></div>                         
                @endfor                                 
            </div>                                      
        </div>                                         
        </div>                                      
        <div class="author_head">О себе:<br /></div>
        <div class="author">
        1.  Два высших образования (НГПУ: учитель математики и информатики и НГУ: ВМК, прикладная информатика).<br />
        2.  Обучаем: студентом занимал второе личное место в региональной межвузовской олимпиаде по высшей математике.<br />
        3.  С детства увлекаюсь шахматами и всевозможными головоломками.<br />
        4.  Исполнителен, педантичен, коммуникабелен.<br />
        5.  Ищу удаленную работу бэкенд-разработчика.<br />
<!-- mail: plotnikov-ap@yandex.ru <a style="color:Blue;" href="plotnikov-ap@yandex.ru">Написать письмо</a> -->
        </div>
        <div class="contact">
            Mail: plotnikov-ap@yandex.ru<br />
            Telegram: <a href="https://t.me/Plotnikov_AP">Plotnikov_AP</a>
        </div>
    </div> 
    </x-slot>
</x-main-layout>