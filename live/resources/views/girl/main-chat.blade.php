@include('header')

チャット表示させるぞ〜〜〜〜<br>

<form action="/Girl/mainChatSend/{{ $owned_char_info->char_id }}" method="POST">
    @csrf
    text : <input type="text" name="content" size="40" placeholder="内容"> <br>
    <input type="submit" value="push">
</form>


@include('footer')
