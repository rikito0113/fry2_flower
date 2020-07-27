@include('header')

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

<br>

<div style="text-align:center;">
    残りパラ：{{$owned_char_info->remain_point}}<br>
    <a href="/Girl/statusUp/{{ $owned_char_info->owned_char_id }}">
        パラ設定
    </a>
    デレ度：{{$owned_char_info->dere}}<br>
    ツン度：{{$owned_char_info->tun}} <br>
</div>

<br>
<div style="color: white; background-color: gray; text-align:center;">{{ $owned_char_info->char_name }}：達成報酬</div>
<div style="text-align:center;">
    〜画像とか〜<br>
</div>
@include('footer')
