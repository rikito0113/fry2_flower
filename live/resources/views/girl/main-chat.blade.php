@include('header')

<div style="text-align:center;">
[チャット表示]<br>

@foreach ($chat_log as $item)
    <span>
        ：{{ $item->content }}<br>
    </span>
@endforeach

<br>
<form action="/Girl/mainChatSend" method="POST">
    @csrf
    text : <input type="text" name="content" size="40" placeholder="内容"> <br>
    <input type="hidden" value="{{ $owned_char_info->char_id }}" name="char_id">
    <input type="submit" value="push">
</form>
</div>

@include('footer')
