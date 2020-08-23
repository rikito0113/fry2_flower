@include('header')

<div style="color: white; background-color: gray; text-align:center;">女性キャラクタ:{{ $owned_char_info->char_name }}</div>
<div style="text-align:center;">
    Lv.{{$owned_char_info->level}}<br>
</div>

<div style="text-align:center;">
    @if ($type == 1)
        ツン<br>
        + {{$point}} 割り振りますか？<br>
        <a href="/Girl/statusUpTunExec/{{ $point }}">
            はい
        </a>
        <a href="/Girl/status/{{ $owned_char_info->owned_char_id }}">
            いいえ
        </a>
    @else
        デレ<br>
        + {{$point}} 割り振りますか？<br>
        <a href="/Girl/statusUpDereExec/{{ $point }}">
            はい
        </a>
        <a href="/Girl/status/{{ $owned_char_info->owned_char_id }}">
            いいえ
        </a>
    @endif

</div>

@include('footer')
