@include('header')

{{-- ガール情報 includeしてきてもいいかもしれない --}}
<div style="color: white; background-color: black; text-align:center;">女性キャラクタ:{{ $owned_char_info->char_name }}</div>
<div style="text-align:center;">
    Lv.{{$owned_char_info->level}}<br>
    <div class="girl-img" style="width: 40%">
        <img src="{{ asset('/images/character/'.$owned_char_info->background_img.'.png') }}" alt="background" width="100%"><br>
        <div class="avatar">
            <img src="{{ asset('/images/character/'.$owned_char_info->avatar_img.'.png') }}" alt="avatar" width="100%"><br>
        </div>
    </div><br>
    {{$owned_char_info->img_name}}<br>
</div>

{{-- 着替え --}}
@foreach ($owned_char_img as $index => $img)
    <span>
        <a href="/setImg/{{ $img->img_id }}">
            <div class="girl-img" style="text-align:center;">
                <div class="girl-img" style="width: 10%">
                    <img src="{{ asset('/images/character/'.$img->background_img.'.png') }}" alt="background" width="100%"><br>
                    <div class="avatar">
                        <img src="{{ asset('/images/character/'.$img->avatar_img.'.png') }}" alt="avatar" width="100%"><br>
                    </div>
                </div><br>
                {{$owned_char_info->img_name}}<br>
            </div>
        </a>
    </span>

    @if ($index % 4 == 3)
        <br>
    @endif
@endforeach

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
