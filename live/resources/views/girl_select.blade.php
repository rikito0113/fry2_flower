
{{--
    現在はパラメータでplayer_idを渡しているがJSで実装する方が良さそう
    https://qiita.com/horikeso/items/cceb42be04e2b6d1d5a6
--}}
@include('header')

<div style="text-align:center;">
    @foreach ($char_info as $char)
        <div>
            <a href="/girl_select/{{ $char->char_id }}">{{ $char->char_name }}</a>
        </div><br>
    @endforeach
</div>

@include('footer')
