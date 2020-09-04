
@include('header')

{{-- ガール情報 --}}
@if (isset($scenario_info))
    <div style="color: white; background-color: gray; text-align:center;">場所:{{ $scenario_info->field }}</div>
    <div style="text-align:center;">
        <div class="girl-img" style="width: 40%">
            <img src="{{ asset('/images/character/'.$scenario_info->default_background.'.png') }}" alt="background" width="100%"><br>
            <div class="avatar">
                <img src="{{ asset('/images/character/'.$scenario_info->char_id.'.png') }}" alt="avatar" width="100%"><br>
            </div>
        </div><br>
        {{$scenario_info->place}}<br>
    </div>

    @if (isset($event_chat_log))
        @foreach ($event_chat_log as $char_name => $row)
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

    <br>
    <form action="/Girl/eventChatSend" method="POST" style="text-align: center;">
        @csrf
        <textarea name="content" cols="50" rows="4" placeholder="メッセージを入力"></textarea>
        <input type="hidden" value="{{ $scenario_info->scenario_id }}" name="scenario_id">
        <button type="submit" onclick="submit();">送信</button>
    </form>
@else
    <div style="text-align: center;">
        誰もいなかった.....
    </div>
@endif


@include('footer')
