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
                    <img src="{{ asset('/images/icon/bt_mem_place'.$event_memory[$i]->scenario_id.'.png') }}" alt="開放済み" width="29%">
                    <span class="mem_frame">題名</span>
                </li>
            @endif
        @endfor
    </ul>
</div>

<div width="100%">
    <img src="{{ asset('/images/titlebar/obi_cap4.png') }}" alt="えっちなメモリー" width="100%">
    <div style="text-align: center">
        <span style="padding-right: 10px"><img class="bt_main_mem_lv" src="{{ asset('/images/button/bt_event_h1.png') }}" alt="Lv達成" width="30%"></span>
        <span><img class="bt_main_mem_ev" src="{{ asset('/images/button/bt_event_h2.png') }}" alt="イベント" width="30%"></span>
    </div>

    <div class="wrapper_main_mem_lv">
        Lv達成
    </div>
    <dir class="wrapper_main_mem_ev">
        イベント達成
    </dir>
</div>

@include('footer')
