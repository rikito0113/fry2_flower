@include('header')

<div style="color: white; background-color: gray; text-align:center;">女性キャラクタ:{{ $owned_char_info->char_name }}</div>
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

@include('footer')
