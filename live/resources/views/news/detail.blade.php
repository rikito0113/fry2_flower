@include('header')

<div class="bg-pink-flower">
    <img src="{{ asset('/images/titlebar/obi_news1.png') }}" alt="obi_news1" width="100%"><br>
    <div class="bg-news">
        <img src="{{ asset('/images/bg/bg_news_read_upper.png') }}" alt="bg_news_read_upper" width="100%">
        <div style="text-align: right; font-size:small;">{{ $news->created_at}}</div>
        <div class="news-title">
            {{ $news->title}}<br>
        </div>
        <div class="news-content">
            content:: {!! nl2br(e($news->content)) !!}<br>
            aaaaaaaaaaaa<br>
            aaaaaaaaaaaa<br>
            aaaaaaaaaaaa<br>
            aaaaaaaaaaaa<br>
            aaaaaaaaaaaa<br>
            aaaaaaaaaaaa<br>
        </div>
        <br>
        <a href="{{ action('NewsController@index') }}"><img src="{{ asset('/images/button/bt_news_back.png') }}" alt="bt_news_back" width="33%"></a>
        <br>
        <img src="{{ asset('/images/bg/bg_news_read_under.png') }}" alt="bg_news_read_under" width="100%">
    </div>
</div>

@include('footer')
