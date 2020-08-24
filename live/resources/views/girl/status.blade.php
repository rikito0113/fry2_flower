@include('header')

{{-- ガール情報 includeしてきてもいいかもしれない --}}
<div style="position:relative; text-align:center; width:auto; height:50px; background-image: url('../../images/bg/bg_header_dere.png'); background-size: contain">
    <img src="{{ asset('/images/bg/bg_header_clock_dere.png') }}" alt="bg_header_clock_dere" style="position:absolute; top:0px; left:0px;" width="45%" height="45px">
    <p style="position:absolute; top:-10px; left:5%; font-size: 12px; color: white; font-weight: bold;">{{ $current_date }}</p>
    <p style="position:absolute; bottom:-5px; left:44%; font-size: 15px; color: pink; font-weight: bold;">{{ $owned_char_info->char_name }}</p>
    <p style="position:absolute; bottom:-5px; left:44%; font-size: 14px; color: purple; font-weight: 300;">{{ $owned_char_info->char_name }}</p>
    {{-- ガールトップへ --}}
    <a href="{{ action('GirlController@index') }}"><img src="{{ asset('/images/button/bt_back.png') }}" alt="bt_back" style="position:absolute; top:0px; right:10px;" width="15%" height="45px"></a>
</div>

{{-- 天秤情報 --}}
<div style="text-align:center; position:relative; width:100%;">
    <img src="{{ asset('/images/status/bg_status_dere.png') }}" alt="tenbin1" style="position:relative;" width="100%" height="100%">
    <img src="{{ asset('/images/status/tenbin3.png') }}" alt="tenbin1" style="position:absolute; top:20%; left: 5%;" width="23%" height="23%">
    <img src="{{ asset('/images/status/tenbin3.png') }}" alt="tenbin1" style="position:absolute; top:20%; right: 5%;" width="23%" height="23%">
    <img src="{{ asset('/images/status/tenbin2.png') }}" alt="tenbin1" style="position:absolute; top:10%; left: 10%;" width="80%">
    <img src="{{ asset('/images/status/tenbin1.png') }}" alt="tenbin1" style="position:absolute; top:10%; left: 25%;" width="50%">

    {{-- ハート --}}
    <img src="{{ asset('/images/status/para_heart_dere1.png') }}" alt="para_heart_dere1" style="position:absolute; top:22%; left: 1%;" width="30%" height="20%">
    <img src="{{ asset('/images/status/para_heart_tsun1.png') }}" alt="para_heart_tsun1" style="position:absolute; top:22%; right: 1%;" width="30%" height="20%">

    {{-- 残パラ --}}
    <img src="{{ asset('/images/status/status_heart_box1.png') }}" alt="status_heart_box1" style="position:absolute; bottom:25%; left: 5%;" width="90%">
    <p class="status_remain_point">
        {{$owned_char_info->remain_point}}
    </p>

    {{-- ツンデレpoint --}}
    <img src="{{ asset('/images/status/status_para_frame_dere.png') }}" alt="status_para_frame_dere" style="position:absolute; bottom:5%; left: 5%;" width="44%">
    <img src="{{ asset('/images/status/status_para_frame_tsun.png') }}" alt="status_para_frame_tsun" style="position:absolute; bottom:5%; right: 5%;" width="44%">
    <p class="status_dere_point">{{$owned_char_info->dere}}</p>
    <p class="status_tun_point">{{$owned_char_info->tun}}</p>
</div>

<div style="text-align:center;">
    <a href="/Girl/statusUp/{{ $owned_char_info->owned_char_id }}">
        パラ設定
    </a>
</div>

<br>
<div style="color: white; background-color: gray; text-align:center;">{{ $owned_char_info->char_name }}：達成報酬</div>
<div style="text-align:center;">
    〜画像とか〜<br>
</div>
@include('footer')
