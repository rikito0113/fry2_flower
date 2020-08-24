@include('header')

{{-- ガール情報 includeしてきてもいいかもしれない --}}
<div style="position:relative; text-align:center; width:auto; height:50px; background-image: url('../images/bg/bg_header_tsun.png'); background-size: contain">
    <img src="{{ asset('/images/bg/bg_header_clock_tsun.png') }}" alt="bg_header_clock_tsun" style="position:absolute; top:0px; left:0px;" width="45%" height="45px">
    <p style="position:absolute; bottom:-5px; left:44%; font-size: 15px; color: purple; font-weight: bold;">{{ $owned_char_info->char_name }}</p>
</div>

<div style="text-align:center;">
    Lv.{{$owned_char_info->level}}<br>
    {{-- ステータス --}}
    <a href="/Girl/status/{{ $owned_char_info->owned_char_id }}">
        ステータス
    </a>
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
        <a href="/Girl/setImg/{{ $img->img_id }}">
            <div class="girl-img" style="width: 10%">
                <img src="{{ asset('/images/character/11.png') }}" alt="background" width="100%"><br>
                <div class="avatar">
                    <img src="{{ asset('/images/character/'.$img->img_id.'.png') }}" alt="avatar" width="100%"><br>
                </div>
            </div>
        </a>
    </span>

    @if ($index % 4 == 3)
        <br>
    @endif
@endforeach

<br><br>

<span style="width: 49% text-align: center;">
    <a href="/Girl/mainChat">
        花嫁修行リンクどーーーーん！！！！
    </a>
</span>
<span style="width: 49% text-align: center;">
    <a href="{{ route('girl.eventField') }}">
        外へ行くリンクどーーーーん！！！！
    </a>
</span>

<br><br>

<div style="text-align:center;">
    ガール🆔：{{ $player_info->owned_char_id }}
    @foreach ($char_info as $char)
        <div>
            <a href="/Girl/girlSelect/{{ $char->char_id }}">{{ $char->char_name }}</a>
        </div><br>
    @endforeach
</div>


@include('footer')
