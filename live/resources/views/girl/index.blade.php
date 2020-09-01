@include('header')

{{-- ガール情報 includeしてきてもいいかもしれない --}}
<div style="position:relative; text-align:center; width:auto; height:50px; background-image: url('../images/bg/bg_header_dere.png'); background-size: contain; vertical-align:top;">
    <img src="{{ asset('/images/bg/bg_header_clock_dere.png') }}" alt="bg_header_clock_dere" style="position:absolute; top:0px; left:0px;" width="45%" height="45px">
    <p style="position:absolute; top:-10px; left:5%; font-size: 12px; color: white; font-weight: bold;">{{ $current_date }}</p>
    <p style="position:absolute; bottom:-5px; left:44%; font-size: 15px; color: pink; font-weight: bold;">{{ $owned_char_info->char_name }}</p>
    <p style="position:absolute; bottom:-5px; left:44%; font-size: 14px; color: purple; font-weight: 300;">{{ $owned_char_info->char_name }}</p>
    {{-- ステータスへ --}}
    <a href="/Girl/status/{{ $owned_char_info->owned_char_id }}"><img src="{{ asset('/images/icon/icon_status.png') }}" alt="bg_header_clock_dere" style="position:absolute; top:0px; right:10px;" width="15%" height="45px"></a>
</div>

{{-- ガール立ち絵 --}}
<div style="text-align:center; position:relative;">
    <div class="girl-img" style="width: 100%">
        <img src="{{ asset('/images/character/'.$owned_char_info->background_img.'.png') }}" alt="background" width="100%"><br>
        <div class="avatar">
            <img src="{{ asset('/images/character/'.$owned_char_info->avatar_form_img.'.png') }}" alt="avatar" width="100%"><br>
        </div>
    </div>
    {{-- ツンデレステータス icon --}}
    <img src="{{ asset('/images/icon/icon_dere.png') }}" alt="icon_dere" width="20%" style="position:absolute; top:0%; right:2%;">
    {{-- 着替え button --}}
    <a href="/Girl/changeClothers"><img src="{{ asset('/images/button/bt_side_cos.png') }}" alt="bt_side_costume" width="15%" style="position:absolute; top:16%; right:4%;"></a>
    {{-- おもひで button --}}
    <a href="{{ route('girl.memory') }}"><img src="{{ asset('/images/button/bt_side_mem.png') }}" alt="bt_side_memory" width="15%" style="position:absolute; top:28%; right:4%;"></a>

    {{-- 花嫁修行/外へ行く button --}}
    <table style="position:absolute; bottom: 5px;">
        <tr>
            <td width="50%">
                <a href="/Girl/mainChat"><img src="{{ asset('/images/button/bt_menu1.png') }}" alt="bt_menu1" width="80%" height="40%"></a>
            </td>
            <td width="50%">
                <a href="{{ route('girl.eventField') }}"><img src="{{ asset('/images/button/bt_menu2.png') }}" alt="bt_menu2" width="80%" height="40%"></a>
            </td>
        </tr>
    </table>
</div>

{{-- 開催中のイベント --}}
<div style="text-align:center; position:relative; width:100%">
    <img src="{{ asset('/images/titlebar/obi_cap11.png') }}" alt="obi_cap11" style="width:100%; vertical-align:top;"><br>
    <img src="{{ asset('/images/bg/bg_schedule.png') }}" alt="bg_schedule" style="width:100%; vertical-align:top;"><br>
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

@include('footer')
