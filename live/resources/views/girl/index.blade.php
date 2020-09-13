@include('header')

<div class="container-fluid" style="padding:0px 0px;">
    {{-- ガール情報 includeしてきてもいいかもしれない --}}
    @include('girl.inc-girl-status')

{{-- ガール立ち絵 --}}
<div style="text-align:center; position:relative;">
    <div class="girl-img" style="width: 100%">
        <img src="{{ asset('/images/character/11.png') }}" alt="background" width="100%"><br>
        <div class="avatar">
            <img src="{{ asset('/images/character/1.png') }}" alt="avatar" width="100%"><br>
        </div>
        {{-- <img src="{{ asset('/images/character/'.$owned_char_info->bg_img.'.png') }}" alt="background" width="100%"><br>
        <div class="avatar">
            <img src="{{ asset('/images/character/'.$owned_char_info->avatar_img.'.png') }}" alt="avatar" width="100%"><br>
        </div> --}}
    </div>

    {{-- 開催中のイベント --}}
    <div style="text-align:center; position:relative; width:100%">
        <img src="{{ asset('/images/titlebar/obi_cap11.png') }}" alt="obi_cap11" style="width:100%; vertical-align:top;"><br>
        <img src="{{ asset('/images/bg/bg_schedule.png') }}" alt="bg_schedule" style="width:100%; vertical-align:top;"><br>
        <span class="index_morning">{{ $scenario_info['morning'] }}</span>
        <span class="index_noon">{{ $scenario_info['noon'] }}</span>
        <span class="index_night">{{ $scenario_info['night'] }}</span>
    </div>

    {{-- 女性キャラクター一覧 --}}
    <div style="text-align:center; position:relative; width:100%">
        <img src="{{ asset('/images/titlebar/obi_cap2.png') }}" alt="obi_cap11" style="width:100%; vertical-align:top;"><br>
    </div>
    <div style="text-align:center; position:relative; width:100%; background-image: url('../images/bg/bg_img_pink.jpg'); background-size: contain">
        @foreach ($all_char_info as $char)
            <div style="position: absolute; height: auto;">
                <a href="/Girl/girlSelect/{{ $char->char_id }}"><img src="{{ asset('/images/button/bt_place_girl_'. $char->attitude .'.png') }}" alt="bt_place_girl" width="80%"></a>
                <img src="{{ asset('/images/icon/icon_chara' . $char->char_id . '.png') }}" alt="icon_chara1" width="18%" style="position:absolute; top:6px; left:15%;">
                <p style="position:absolute; bottom:5px; left:40%; font-size: 13px; color: black; font-weight: bold;">{{ $char->char_name }}</p>
                <p style="position:absolute; top:0px; left:38%; font-size: 14px; color: white; font-weight: bold;">Lv.{{ $char->level }}</p>
            </div>
            <br><br><br><br>
        @endforeach
    </div>

</div>

@include('footer')
