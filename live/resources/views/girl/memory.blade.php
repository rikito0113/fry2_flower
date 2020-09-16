{{-- 思ひ出画面 --}}

@include('header')
<div class="container-fluid" style="padding:0px 0px;">
<div class="row" style="background-image: url('../images/bg/bg_header_dere.png'); background-size: contain; vertical-align:top; margin:0px;">
    <div class="col-6 col-sm-6 col-md-6" style="padding:0px;">
        <img src="{{ asset('/images/titlebar/obi_memory.png') }}" alt="obi_memory" class="fit-img100">
        <p class="memory-select-girl-name">選択：{{ $owned_char_info->char_name }}</p>
    </div>
    {{-- ステータスへ --}}
    <div class="col-2 col-sm-2 col-md-2 offset-2 offset-sm-2 offset-md-2" style="padding:7px;">
        <a href="/Girl/mainChat"><img src="{{ asset('/images/icon/icon_sotohe.png') }}" alt="bg_header_clock_dere" class="fit-img100"></a>
    </div>
    <div class="col-2 col-sm-2 col-md-2" style="padding:7px;">
        <a href="{{ route('girl.eventField') }}"><img src="{{ asset('/images/icon/icon_yome.png') }}" alt="bg_header_clock_dere" class="fit-img100"></a>
    </div>
</div>

<div class="row" style="margin:0px;">
    @foreach ($all_char_info as $char)
        <div class="col-2 col-sm-2 col-md-2" style="padding:1px;">
            <a href="{{ route('girl.memory') }}">
                <img src="{{ asset('/images/icon/icon_chara' . $char->char_id . '.png') }}" alt="icon_chara1" class="fit-img100">
            </a>
            @if ($char->char_id == $owned_char_info->char_id)
                <img src="{{ asset('/images/icon/icon_chara_heart.png') }}" alt="icon_chara_heart" class="icon-girl-select-heart">
            @endif
        </div>
    @endforeach
</div>

<div class="row" style="margin:0px;">
    <div class="col-12 col-sm-12 col-md-12" style="padding:0px 0px;">
        <img src="{{ asset('/images/titlebar/obi_cap3.png') }}" alt="日常メモリー" class="fit-img100">
    </div>
</div>
<div class="row justify-content-center" style="margin:0px;">
    <>
    <div class="col">2020年7月->夏</div>
</div>
<div class="row" style="margin:0px;">
    <ul class="event_mem">
        @for ($i = 0; $i < 12; $i++)
            @if ($i + 1 > $event_memory_length)
                <li>
                    <img src="{{ asset('/images/icon/bt_mem_place_seacret.png') }}" alt="シークレット" width="100%">
                    <span class="mem_frame">?????</span>
                </li>
            @else
                <li>
                    <a href="/Girl/eventMemory/{{ $event_memory[$i]->scenario_id }}">
                        <img src="{{ asset('/images/icon/bt_mem_place'.$event_memory[$i]->scenario_id.'.png') }}" alt="開放済み" width="100%">
                        <span class="mem_frame">{{ $event_memory[$i]->title }}</span>
                    </a>
                </li>
            @endif
        @endfor
    </ul>
</div>

<div class="row" style="margin:0px;">
    <div class="col-12 col-sm-12 col-md-12" style="padding:0px 0px;">
        <img src="{{ asset('/images/titlebar/obi_cap4.png') }}" alt="えっちなメモリー" class="fit-img100">
    </div>
    <div class="col-4 col-sm-4 col-md-4 offset-2 offset-sm-2 offset-md-2" style="padding:2px 5px;">
        <img id="bt_main_mem_lv" src="{{ asset('/images/button/bt_event_h1.png') }}" alt="Lv達成" class="fit-img100" onclick="btLvClick()">
    </div>
    <div class="col-4 col-sm-4 col-md-4" style="padding:2px 5px;">
        <img id="bt_main_mem_ev" src="{{ asset('/images/button/bt_event_h2.png') }}" alt="イベント" class="fit-img100" onclick="btEvClick()">
    </div>
</div>
<div width="100%">
    @include('girl.inc-memory-Lv')

    <div id="wrapper_main_mem_ev" style="text-align: center">
        イベント達成<br>
    </div>
</div>

<script>
    // 切り替え
    var btLv = document.getElementById("bt_main_mem_lv");
    var btEv = document.getElementById("bt_main_mem_ev");

    var wrapperLv = document.getElementById("wrapper_main_mem_lv");
    var wrapperEv = document.getElementById("wrapper_main_mem_ev");

    wrapperLv.style.display = "";
    wrapperEv.style.display = "none";

    function btLvClick() {
        wrapperLv.style.display = "";
        wrapperEv.style.display = "none";
    }
    function btEvClick() {
        wrapperLv.style.display = "none";
        wrapperEv.style.display = "";
    }
</script>

@include('footer')
