{{-- イベント情報 詳細 --}}

@include('header')

<div class="bg-pink-flower">
    <img src="{{ asset('/images/titlebar/obi_news1.png') }}" alt="obi_news1" width="100%"><br>
    <div class="bg-news">
        <img src="{{ asset('/images/bg/bg_news_read_upper.png') }}" alt="bg_news_read_upper" width="100%">
        <div style="text-align: right; font-size:small;">{{ $event->created_at}}</div>
        <div class="news-title">
            title:: {{ $event->title}}<br>
        </div>
        <div class="news-content">
            content:: {!! nl2br(e($event->content)) !!}<br>
            aaaaaaaaaaaa<br>
            aaaaaaaaaaaa<br>
            <img src="{{ asset('/images/news/'. $event->content_img .'.png') }}" alt="event_info_img" width="100%">
        </div>
        <br>
        <a href="{{ action('EventController@index') }}"><img src="{{ asset('/images/button/bt_news_back.png') }}" alt="bt_news_back" width="33%"></a>
        <br>
        <img src="{{ asset('/images/bg/bg_news_read_under.png') }}" alt="bg_news_read_under" width="100%">
    </div>
</div>

@include('footer')

