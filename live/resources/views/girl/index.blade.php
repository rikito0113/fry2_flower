@include('header')

{{-- ガール情報 includeしてきてもいいかもしれない --}}
<div style="position:relative; text-align:center; width:auto; height:50px; background-image: url('../images/bg/bg_header_dere.png'); background-size: contain">
    <img src="{{ asset('/images/bg/bg_header_clock_dere.png') }}" alt="bg_header_clock_dere" style="position:absolute; top:0px; left:0px;" width="45%" height="45px">
    <p style="position:absolute; top:-10px; left:5%; font-size: 12px; color: white; font-weight: bold;">{{ $current_date }}</p>
    <p style="position:absolute; bottom:-5px; left:44%; font-size: 15px; color: pink; font-weight: bold;">{{ $owned_char_info->char_name }}</p>
    <p style="position:absolute; bottom:-5px; left:44%; font-size: 14px; color: purple; font-weight: 300;">{{ $owned_char_info->char_name }}</p>
    {{-- ステータスへ --}}
    <a href="/Girl/status/{{ $owned_char_info->owned_char_id }}"><img src="{{ asset('/images/status/para_heart_dere1.png') }}" alt="bg_header_clock_dere" style="position:absolute; top:0px; right:10px;" width="15%" height="45px"></a>
</div>

{{-- ガール立ち絵 --}}
<div style="text-align:center; position:relative;">
    <div class="girl-img" style="width: 100%">
        <img src="{{ asset('/images/character/'.$owned_char_info->background_img.'.png') }}" alt="background" width="100%"><br>
        <div class="avatar">
            <img src="{{ asset('/images/character/'.$owned_char_info->avatar_img.'.png') }}" alt="avatar" width="100%"><br>
        </div>
    </div>
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
    <img src="{{ asset('/images/titlebar/obi_cap11.png') }}" alt="obi_cap11" width="100%"><br>
    <img src="{{ asset('/images/bg/bg_schedule.png') }}" alt="bg_schedule" width="100%"><br>
</div>

{{-- 女性キャラクター一覧 --}}
<div style="text-align:center; position:relative; width:100%">
    <img src="{{ asset('/images/titlebar/obi_cap2.png') }}" alt="obi_cap11" width="100%"><br>
</div>
<div style="text-align:center; position:relative; width:100%; background-image: url('../images/bg/bg_img_pink.jpg'); background-size: contain">
    @foreach ($owned_char_info as $char)
        <div style="position: absolute; height: auto;">
            <a href="/Girl/girlSelect/{{ $char->char_id }}"><img src="{{ asset('/images/button/bt_place_girl1.png') }}" alt="bt_place_girl" width="80%"></a>
        </div>
        <img src="{{ asset('/images/button/bt_place_girl1.png') }}" alt="bt_place_girl" width="10%" style="position:absolute; top:10px; left:30%;">
        <p style="position:absolute; top:0px; left:50%; font-size: 14px; color: white; font-weight: bold;">Lv.{{ $char->level }}</p>
        <br><br><br><br>
    @endforeach
</div>


{{-- 着替え --}}
{{-- @foreach ($owned_char_img as $index => $img)
    <span>
        <a href="/Girl/setImg/{{ $img->img_id }}">
            <div class="girl-img" style="width: 10%">
                <img src="{{ asset('/images/character/11.png') }}" alt="background" width="100%"><br>
                <div class="avatar">
                    <img src="{{ asset('/images/character/'.$img->img_id.'.png') }}" alt="avatar" width="100%"><br>
                </div>
            </div>
        </a>
    </span>

    @if ($index % 4 == 3)
        <br>
    @endif
@endforeach --}}

@include('footer')
