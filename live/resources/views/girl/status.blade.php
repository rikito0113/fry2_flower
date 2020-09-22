@include('header')

<div class="container-fluid" style="padding:0px 0px;">
    {{-- ガール情報 includeしてきてもいいかもしれない --}}
    @include('girl.inc-girl-status' , ['page' => 'status'])

    {{-- 天秤情報 --}}
    <div class = "row" style="margin:0px;">
        <div class="col12" style="padding:0px 0px;">
            <img src="{{ asset('/images/status/bg_status_' . $owned_char_info->attitude . '.png') }}" alt="bg" class="fit-img100">
            <img src="{{ asset('/images/status/tenbin3.png') }}" alt="tenbin3" class="tenbin-left-plate">
            <img src="{{ asset('/images/status/tenbin3.png') }}" alt="tenbin3" class="tenbin-right-plate">
            <img src="{{ asset('/images/status/tenbin2.png') }}" alt="tenbin2" class="position-horizonーcenter tenbin-body" >
            <img src="{{ asset('/images/status/tenbin1.png') }}" alt="tenbin1" class="position-horizonーcenter tenbin-arm">

            {{-- ハート --}}
            @if ($owned_char_info->attitude == 'dere')
                <img src="{{ asset('/images/status/para_heart_dere2.png') }}" alt="para_heart_dere2" class="para_heart_dere">
                <img src="{{ asset('/images/status/para_heart_tsun1.png') }}" alt="para_heart_tsun1" class="para_heart_tsun">
            @else
                <img src="{{ asset('/images/status/para_heart_dere1.png') }}" alt="para_heart_dere1" class="para_heart_dere">
                <img src="{{ asset('/images/status/para_heart_tsun2.png') }}" alt="para_heart_tsun2" class="para_heart_tsun">
            @endif

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
    </div>


    {{-- 達成報酬 --}}
    <div style="text-align:center; position:relative; width:100%;">
        <img src="{{ asset('/images/titlebar/obi_cap5.png') }}" alt="obi_cap11" width="100%">

        @include('girl.inc-memory-Lv')
    </div>

</div>
@include('footer')
