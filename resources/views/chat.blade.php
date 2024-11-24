<div style="text-align:center" class="chats">
<x-main-layout>
    <x-slot name="title">Мой тестовый чат</x-slot>
    <x-slot name="content">
        <table class="">
            <tr>
                <th>автор темы: {{ $chat->author }}</th>
                <?php
                    if ($chat->access==1) {
                        echo '<th>доступ: общедоступный</th>';
                    } else {
                        echo "<th>доступ: $chat->author + admin</th>";
                    }
                ?>
                <th>дата создания: {{ $chat->created_at }}</th><th>понравилось</th><th>не понравилось</th>
            </tr>
        </table>
        <h3 style="text-align:center">{{ $chat->content_chat }}</h3>
        @foreach ($comments as $comment)
        <table class="">
            <tr>
                <th>автор комментария: {{ $chat->author }}</th><th>дата создания: {{ $chat->created_at }}</th><th>понравилось</th><th>не понравилось</th>
            </tr>
        </table>
            <p>{{ $comment->content_comment }}</p>
            <form name="del_comment" action="del_comment/{{ $comment->id }}" method="post">
                @csrf
                <input type="hidden" name="id_chat" value="{{ $chat->id }}" />
                <?php 
                    if (Auth::user()->name==$chat->author||Auth::user()->email==Config::get('myconfig.admin_mail')) {
                        echo '<input class="button_chat" type="submit" value="Удалить комментарий" />';
                    }
                ?>
            </form>
            <p>-------------------------------</p>
        @endforeach
        @if ($errors->any())
        <script>
            window.onload = function() {
                button_show_modal_form_new_comment();
            }
        </script>
        @endif
        <button class="button_chat" onclick="button_show_modal_form_new_comment()">Добавиь свой комментарий</button>
        <x-modal-form-new-comment>
            <x-slot name="id_chat">{{ $chat->id }}</x-slot>
        </x-modal-form-new-comment>
    </x-slot>
</x-main-layout>
</div>