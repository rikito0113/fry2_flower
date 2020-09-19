@include('header')
<div class="container-fluid" style="padding:0px 0px;">
{{-- ガール情報 includeしてきてもいいかもしれない --}}
@include('girl.inc-girl-status' , ['page' => 'else'])

{{-- ガール立ち絵 --}}
<div style="text-align:center; position:relative;">
    <div class="girl-img" style="width: 100%">
        <img src="{{ asset('/images/'.$owned_char_info->bg_img) }}" alt="background" width="100%"><br>
        <div class="avatar">
            <img src="{{ asset('/images/'.$owned_char_info->avatar_img) }}" alt="avatar" width="100%"><br>
        </div>
    </div>
    {{-- ツンデレステータス icon --}}
    <img src="{{ asset('/images/icon/icon_dere.png') }}" alt="icon_dere" width="20%" style="position:absolute; top:0%; right:2%;">
    {{-- 着替え button --}}
    <a href="/Girl/changeClothers"><img src="{{ asset('/images/button/bt_side_cos.png') }}" alt="bt_side_costume" width="15%" style="position:absolute; top:16%; right:4%;"></a>
    {{-- おもひで button --}}
    <a href="{{ route('girl.memory') }}"><img src="{{ asset('/images/button/bt_side_mem.png') }}" alt="bt_side_memory" width="15%" style="position:absolute; top:28%; right:4%;"></a>

    {{--  todo タブ切替 --}}
    <div class="bg-change-clother-items">
        {{-- 着替え --}}
        <table style="width:100%;">
        @foreach ($owned_char_img as $index => $img)
            @if($index % 4 == 0)
                <tr style="width:100%;">
            @endif
                    <td style="width:25%;">
                        <a href="/Girl/setImg/{{ $img->item_id }}">
                            <img src="{{ asset('/images/icon/bt_mem_place_nomal.png') }}" alt="background" width="25%">
                        </a>
                    </td>
            @if($index % 4 == 1)
                </tr>
            @endif
        @endforeach
        </table>
    </div>
</div>
</div>

@include('footer')
