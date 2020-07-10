@include('header')



<div style="text-align:center;">
    ガール🆔：{{ $player_info->owned_char_id }}
    @foreach ($char_info as $char)
        <div>
            <a href="/girl_select/{{ $char->char_id }}">{{ $char->char_name }}</a>
        </div><br>
    @endforeach
</div>


@include('footer')
