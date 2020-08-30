{{-- えっちなメモリー --}}

<div id="wrapper_main_mem_lv" style="text-align: center">
    @if ($main_memory_Lv)
        @foreach ($main_memory_Lv as $item)
            @if ($item->player_id)
                取得済み<br>
                @if ($item->atiitude == 'dere')
                    デレ<br>
                @else
                    ツン<br>
                @endif
            @else
                未取得<br>
            @endif
            {{ $item->memory_id }}<br>
        @endforeach
    @else
        Lv達成<br>
    @endif
</div>
