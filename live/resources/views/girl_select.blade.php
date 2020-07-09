
{{--
    現在はパラメータでplayer_idを渡しているがJSで実装する方が良さそう
    https://qiita.com/horikeso/items/cceb42be04e2b6d1d5a6
--}}
@include('header')

<div style="text-align:center;">
    <h1>好きな女の子を選ぶ</h1>
    @foreach ($char_info as $index => $char)
        <span width="20%">
            <a href="/girl_select/{{ $char->char_id }}"><img src="{{ asset('/images/character/'.$char->char_id.'.jpg') }}" alt="girl" width="19%"></a>
        </span>
        @if ($index == 2)
            <br>
        @endif
    @endforeach
</div>

@include('footer')
