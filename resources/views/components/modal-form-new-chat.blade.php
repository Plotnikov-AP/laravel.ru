<div id="modal_form_new_chat">
    <div class="modal_close">&times;</div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form name="new_chat" action="chats/add_chat" method="post">
        @csrf
        <label>Введите тему нового чата</label><br />
        <textarea name="content_chat" cols="80" rows=" 5"></textarea><br />
        <label>Видят все</label>
        <div class="switch-btn"></div>
        <label>Видит создатель и администратор</label><br />
        <input id="access" type="hidden" name="access" value="1" />
        <input type="hidden" name="author" value="{{ Auth::user()->name }}" />  
        <input class="button_chat" type="submit" value="Создать новый чат" />
    </form>
    <script>
        $('.switch-btn').click(function(){
        $(this).toggleClass('switch-on');
        if ($(this).hasClass('switch-on')) {
            $(this).trigger('on.switch');
        } else {
            $(this).trigger('off.switch');
        }
        });
        $('.switch-btn').on('on.switch', function(){
            var createBttn = document.getElementById('access');
            createBttn.value = "0";
        });
    </script>
    <script>
        $('.modal_close').click(function() {
            $('#modal_form_new_chat').hide(); 
        })
    </script>
</div>