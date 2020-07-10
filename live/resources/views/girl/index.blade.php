@include('header')

{{-- ガール情報 includeしてきてもいいかもしれない --}}
<div style="color: white; background-color: black; text-align:center;">{{ $owned_char_info->char_name }}</div>
<div style="text-align:center;">
    Lv.{{$owned_char_info->level}}
    <img src="{{ asset('/images/character/'.$owned_char_info->background_img.'.jpg') }}" alt="girl" width="19%">
    {{$owned_char_info->img_name}}
</div>

<br><br>

<div style="text-align:center;">
    ガール🆔：{{ $player_info->owned_char_id }}
    @foreach ($char_info as $char)
        <div>
            <a href="/girl_select/{{ $char->char_id }}">{{ $char->char_name }}</a>
        </div><br>
    @endforeach
</div>


@include('footer')
