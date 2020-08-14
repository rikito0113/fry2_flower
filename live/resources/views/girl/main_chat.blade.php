@include('header')

<div style="text-align:center;">
[チャット表示]<br>

{{-- @foreach ($chat_log as $item)
    <span>
        ：{{ $item->content }}<br>
    </span>
@endforeach --}}

@if (isset($owned_char_info))

    {{-- ガール情報 includeしてきてもいいかもしれない --}}
    <div style="color: white; background-color: gray; text-align:center;">女性キャラクタ:{{ $owned_char_info->char_name }}</div>
    <div style="text-align:center;">
        Lv.{{$owned_char_info->level}}<br>
        <div class="girl-img" style="width: 40%">
            <img src="{{ asset('/images/character/'.$owned_char_info->background_img.'.png') }}" alt="background" width="100%"><br>
            <div class="avatar">
                <img src="{{ asset('/images/character/'.$owned_char_info->avatar_img.'.png') }}" alt="avatar" width="100%"><br>
            </div>
        </div><br>
        {{$owned_char_info->img_name}}<br>
    </div>

    <br><br>

    @if (isset($chat_log))
        @foreach ($chat_log as $char_name => $row)
            <div class="chat">
                <span style="font-size: small; float: {{$row->side}};">
                    @if ($row->is_read)
                    既読　　
                    @endif
                    {{$row->created_at}}
                </span>
                <br>
                <span class="chat-text-{{$row->side}}">
                    <p class="chat-text">
                        {!! $row->content !!}
                    </p>
                </span>
            </div>
        @endforeach
    @endif
@endif

<br>
<form action="/Girl/mainChatSend" method="POST">
    @csrf
    <textarea name="content" cols="50" rows="4" placeholder="メッセージを入力"></textarea>
    <input type="hidden" value="{{ $owned_char_info->char_id }}" name="char_id">
    <button type="submit" onclick="submit();">送信</button>
</form>
</div>

@include('footer')
