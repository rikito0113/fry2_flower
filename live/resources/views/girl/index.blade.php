@include('header')

{{-- ガール情報 includeしてきてもいいかもしれない --}}
<div style="color: white; background-color: black; text-align:center;">女性キャラクタ:{{ $owned_char_info->char_name }}</div>
<div style="text-align:center;">
    Lv.{{$owned_char_info->level}}<br>
    <img src="{{ asset('/images/character/'.$owned_char_info->background_img.'.jpg') }}" alt="girl" width="60%"><br>
    {{$owned_char_info->img_name}}<br>
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
