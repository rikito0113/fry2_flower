{{-- えっちなメモリー --}}

<div id="wrapper_main_mem_lv" style="text-align: center">
    @if ($main_memory_Lv)
        @foreach ($main_memory_Lv as $item)
            @if ($item->player_id)
                取得済み<br>
                <div class="main_mem_lv">
                    @if ($item->atiitude == 'dere')
                        <img class="dere_lv" src="{{ asset('/images/button/bt_event_dere1.png') }}" alt="デレ">
                        <img class="tun_lv" src="{{ asset('/images/button/bt_event_tsun2.png') }}" alt="????">
                    @else
                        <img class="dere_lv" src="{{ asset('/images/button/bt_event_dere2.png') }}" alt="????">
                        <img class="tun_lv" src="{{ asset('/images/button/bt_event_tsun1.png') }}" alt="ツン">
                    @endif
                </div>
            @else
                未取得<br>
                <div class="main_mem_lv">
                    <img class="dere_lv" src="{{ asset('/images/button/bt_event_dere2.png') }}" alt="????">
                    <img class="tun_lv" src="{{ asset('/images/button/bt_event_tsun2.png') }}" alt="????">
                </div>
            @endif
            {{ $item->memory_id }}<br>
        @endforeach
    @else
        Lv達成<br>
    @endif
</div>
