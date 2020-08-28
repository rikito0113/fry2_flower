{{-- 思ひ出画面 --}}

@include('header')
@include('girl.inc-girl-status')

<div width="100%">
    <img src="{{ asset('/images/titlebar/obi_cap_3.png') }}" alt="日常メモリー">
    <div>2020年7月->夏</div>
    @for ($i = 0; $i < 12; $i++)
        @if ($i % 4 == 0)
            <br />
        @endif

        <span>
            @if ($i + 1 > $memory_length)
                <img src="{{ asset('/images/button/bt_mem_place_seacret.png') }}" alt="シークレット">
                <p class="mem_frame">?????</p>
            @else
                <img src="{{ asset('/images/button/bt_mem_place'.{{ $event_memory[$i]->scenario_id }}.'.png') }}" alt="開放済み">
                <p class="mem_frame">題名</p>
            @endif
        </span>
    @endfor
</div>

<div width="100%">
    <img src="{{ asset('/images/titlebar/obi_cap_4.png') }}" alt="えっちなメモリー">
    <div style="text-align: center">
        <span style="padding-right: 10px"><img class="bt_main_mem_lv" src="{{ asset('/images/button/bt_event_h1.png') }}" alt="Lv達成"></span>
        <span><img class="bt_main_mem_ev" src="{{ asset('/images/button/bt_event_h2.png') }}" alt="イベント"></span>
    </div>

    <div class="wrapper_main_mem_lv">
        Lv達成
    </div>
    <dir class="wrapper_main_mem_ev">
        イベント達成
    </dir>
</div>

@include('footer')
