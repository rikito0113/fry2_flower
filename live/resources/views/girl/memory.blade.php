{{-- 思ひ出画面 --}}

@include('header')
@include('girl.inc-girl-status')

<div width="100%">
    <img src="{{ asset('/images/titlebar/obi_cap3.png') }}" alt="日常メモリー" width="100%">
    <div style="text-align: center;">2020年7月->夏</div>
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
                        <span class="mem_frame">題名</span>
                    </a>
                </li>
            @endif
        @endfor
    </ul>
</div>

<div width="100%">
    <img src="{{ asset('/images/titlebar/obi_cap4.png') }}" alt="えっちなメモリー" width="100%">
    <div style="text-align: center">
        <span style="padding-right: 10px"><img id="bt_main_mem_lv" src="{{ asset('/images/button/bt_event_h1.png') }}" alt="Lv達成" width="30%" onclick="btLvClick()"></span>
        <span><img id="bt_main_mem_ev" src="{{ asset('/images/button/bt_event_h2.png') }}" alt="イベント" width="30%" onclick="btEvClick()"></span>
    </div>

    <div id="wrapper_main_mem_lv" style="text-align: center">
        @if ($mainMemoryLv)
            @foreach ($main_memory_Lv as $item)
                {{ $item->memory_id }}
            @endforeach
        @else
            Lv達成
        @endif
    </div>
    <div id="wrapper_main_mem_ev" style="text-align: center">
        イベント達成
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
