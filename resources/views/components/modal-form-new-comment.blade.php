<div id="modal_form_new_comment">
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
    <form name="new_comment" action="add_comment" method="post">
        @csrf
        <label>Введите текст нового комментария</label><br />
        <input type="hidden" name="id_chat" value="{{ $id_chat }}" />
        <input type="hidden" name="author" value="{{ Auth::user()->name }}" />
        <textarea name="content_comment" cols="80" rows=" 5"></textarea><br />
        <input class="button_chat" type="submit" value="Сохранить новый комментарий" />
    </form>
    <script>
        $('.modal_close').click(function() {
            $('#modal_form_new_comment').hide(); 
        })
    </script>
</div>