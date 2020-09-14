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

        {{-- ツンデレステータス icon --}}
        <img src="{{ asset('/images/icon/icon_dere.png') }}" alt="icon_dere" class="icon-dere">
        {{-- 着替え button --}}
        <a href="/Girl/changeClothers"><img src="{{ asset('/images/button/bt_side_cos.png') }}" alt="bt_side_costume" class="bt-cos"></a>
        {{-- おもひで button --}}
        <a href="{{ route('girl.memory') }}"><img src="{{ asset('/images/button/bt_side_mem.png') }}" alt="bt_side_memory" class="bt-mem"></a>

        <table class="chat-bt-table">
            <tr>
                <td width="50%">
                    <a href="/Girl/mainChat"><img src="{{ asset('/images/button/bt_menu1.png') }}" alt="bt_menu1" class="bt-main-chat"></a>
                </td>
                <td width="50%">
                    @if ($owned_char_info->done_prologue && ($owned_char_info->dere != 0 || $owned_char_info->tsun != 0))
                        <a href="{{ route('girl.eventField') }}"><img src="{{ asset('/images/button/bt_menu2.png') }}" alt="bt_menu2" class="bt-main-chat"></a>
                    @endif
                </td>
            </tr>
        </table>
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
    <div style="width:100%; background-image: url('../images/bg/bg_img_pink.jpg'); background-size: contain">
        @foreach ($all_char_info as $char)
            <div class="row">
                <div class="col-10 col-sm-10 col-md-10 offset-1 offset-sm-1 offset-md-1">
                    <a href="/Girl/girlSelect/{{ $char->char_id }}"><img src="{{ asset('/images/button/bt_place_girl_'. $char->attitude .'.png') }}" alt="bt_place_girl" class="fit-img100"></a>
                    <img src="{{ asset('/images/icon/icon_chara' . $char->char_id . '.png') }}" alt="icon_chara1" class="icon-girl-select">
                    <p class="girl-select-name">{{ $char->char_name }}</p>
                    <p class="girl-select-lv">Lv.{{ $char->level }}</p>
                </div>
            </div>
        @endforeach
    </div>

</div>

@include('footer')
