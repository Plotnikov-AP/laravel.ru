<div class="chats">
<x-main-layout>
    <x-slot name="title">Мой тестовый чат</x-slot>
    <x-slot name="content">
        <p style="text-align: center;">Тестовый самописный чат, прошу сильно не пинать</p>
        <p>----------------------------------</p>
        @if ($errors->any())
        <script>
            window.onload = function() {
                button_show_modal_form_new_chat();
            }
        </script>
        @endif
        @foreach ($chats as $chat)
            <p><a href="/chats/{{ $chat->id }}">{{ $chat->content_chat }}</a></p>
            <div class="chats_all_new">всего сообщений: {{ $chat->count }}</div>
            <div class="chats_all_new">новых сообщений: {{ $chat->viewed }}</div>
            <br />
        @endforeach
        <button class="button_chat" onclick="button_show_modal_form_new_chat()">Создать новую тему чата</button>
        <x-modal-form-new-chat />
    </x-slot>
</x-main-layout>
</div>