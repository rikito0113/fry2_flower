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
        <img src="{{ asset('/images/character/'.$owned_char_info->bg_img.'.png') }}" alt="background" width="100%"><br>
        <div class="avatar">
            <img src="{{ asset('/images/character/'.$owned_char_info->avatar_img.'.png') }}" alt="avatar" width="100%"><br>
        </div>
    </div>
    {{-- ツンデレステータス icon --}}
    <img src="{{ asset('/images/icon/icon_dere.png') }}" alt="icon_dere" width="20%" style="position:absolute; top:0%; right:2%;">
    {{-- 着替え button --}}
    <a href="/Girl/changeClothers"><img src="{{ asset('/images/button/bt_side_cos.png') }}" alt="bt_side_costume" width="15%" style="position:absolute; top:16%; right:4%;"></a>
    {{-- おもひで button --}}
    <a href="{{ route('girl.memory') }}"><img src="{{ asset('/images/button/bt_side_mem.png') }}" alt="bt_side_memory" width="15%" style="position:absolute; top:28%; right:4%;"></a>

    {{--  todo タブ切替 --}}
    <div class="bg-change-clother-items">
        {{-- 着替え --}}
        <table style="width:100%;">
        @foreach ($owned_char_img as $index => $img)
            @if($index % 4 == 0)
                <tr style="width:100%;">
            @endif
                    <td style="width:25%;">
                        <a href="/Girl/setImg/{{ $img->item_id }}">
                            <img src="{{ asset('/images/icon/bt_mem_place_nomal.png') }}" alt="background" width="25%">
                        </a>
                    </td>
            @if($index % 4 == 1)
                </tr>
            @endif
        @endforeach
        </table>
    </div>
</div>

@include('footer')
