@include('header')

<div style="color: white; background-color: gray; text-align:center;">女性キャラクタ:{{ $owned_char_info->char_name }}</div>
<div style="text-align:center;">
    Lv.{{$owned_char_info->level}}<br>
</div>

<div style="text-align:center;">
    残りパラ：{{$owned_char_info->remain_point}}<br>
    デレ度：{{$owned_char_info->dere}}<br>
    ツン度：{{$owned_char_info->tun}} <br>
</div>

@include('footer')
