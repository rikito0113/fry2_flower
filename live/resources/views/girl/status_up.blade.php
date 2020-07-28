@include('header')

<div style="color: white; background-color: gray; text-align:center;">女性キャラクタ:{{ $owned_char_info->char_name }}</div>
<div style="text-align:center;">
    Lv.{{$owned_char_info->level}}<br>
</div>

<div style="text-align:center;">
    残りパラ：{{$owned_char_info->remain_point}}<br>
    デレ度：{{$owned_char_info->dere}}<br>
    ツン度：{{$owned_char_info->tun}} <br>
    デレアップ<br>
    <form action="/Girl/statusUpConfirm" method="POST">
        @csrf
        <select name="add_dere">
            @for ($i = 0; $i <= $owned_char_info->remain_point; $i++)
                <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>
        <input type="hidden" name="owned_char_id" value="{{$owned_char_info->owned_char_id}}">
        <input type="submit" value="確定">
    </form>
    <br>
    ツンアップ<br>
    <form action="/Girl/statusUpConfirm" method="POST">
        @csrf
        <select name="add_tun">
            @for ($i = 0; $i <= $owned_char_info->remain_point; $i++)
                <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>
        <input type="hidden" name="owned_char_id" value="{{$owned_char_info->owned_char_id}}">
        <input type="submit" value="確定">
    </form>
</div>

@include('footer')
