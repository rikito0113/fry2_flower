@include('header')

{{-- ガール情報 includeしてきてもいいかもしれない --}}
@include('girl.inc-girl-status')

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
    {{-- パラ設定 --}}
    <a href="/Girl/statusUp/{{ $owned_char_info->owned_char_id }}"><img src="{{ asset('/images/button/bt_status_para1.png') }}" class="status_remain_point_button" alt="bt_status_para1" width="25%"></a>

    {{-- ツンデレpoint --}}
    <img src="{{ asset('/images/status/status_para_frame_dere.png') }}" alt="status_para_frame_dere" style="position:absolute; bottom:5%; left: 5%;" width="44%">
    <img src="{{ asset('/images/status/status_para_frame_tsun.png') }}" alt="status_para_frame_tsun" style="position:absolute; bottom:5%; right: 5%;" width="44%">
    <p class="status_dere_point">{{$owned_char_info->dere}}</p>
    <p class="status_tsun_point">{{$owned_char_info->tsun}}</p>
</div>


{{-- 達成報酬 --}}
<div style="text-align:center; position:relative; width:100%;">
    <img src="{{ asset('/images/titlebar/obi_cap5.png') }}" alt="obi_cap11" width="100%">

    @include('girl.inc-memory-Lv')
</div>
@include('footer')
