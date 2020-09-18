@include('header')

<div class="container-fluid" style="padding:0px 0px; text-align:center;">

    {{-- ガール情報 includeしてきてもいいかもしれない --}}
    @include('girl.inc-girl-status' , ['page' => 'main_chat'])

    <div class="girl-img" style="width: 100%">
        <img src="{{ asset('/images/character/11.png') }}" alt="background" width="100%"><br>
        <div class="avatar">
            <img src="{{ asset('/images/character/1.png') }}" alt="avatar" width="100%"><br>
        </div>
        {{-- <img src="{{ asset('/images/character/'.$owned_char_info->bg_img.'.png') }}" alt="background" width="100%"><br>
        <div class="avatar">
            <img src="{{ asset('/images/character/'.$owned_char_info->avatar_img.'.png') }}" alt="avatar" width="100%"><br>
        </div> --}}


        <div class="bg-chat">
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
                                {!! nl2br(e($row->content)) !!}
                            </p>
                        </span>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <form action="/Girl/mainChatSend" method="POST" class="row bg-chat-send">
        @csrf
        <div class="col-9 col-sm-9 col-md-9" class="chat-send-textbox">
            <div class="col-12 col-sm-12 col-md-12">
                <textarea name="content" cols="80" rows="1" placeholder="文字を入力してください(80文字以内)"></textarea>
            </div>
            <div class="col-12 col-sm-12 col-md-12">
                <p>残り文字数</p>
            </div>
        </div>
        <input type="hidden" value="{{ $owned_char_info->char_id }}" name="char_id">
        <div class="col-3 col-sm-3 col-md-3" class="chat-send-button">
            <button type="submit" onclick="submit();"><img src="{{ asset('/images/talk/bt_talk_send.png') }}" alt="送信" class="fit-img100"></button>
        </div>
    </form>
</div>

@include('footer')
