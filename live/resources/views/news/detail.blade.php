@include('header')

<div class="bg-pink-flower">
    <img src="{{ asset('/images/titlebar/obi_news1.png') }}" alt="obi_news1" width="100%"><br>
    <div class="bg-news">
        <img src="{{ asset('/images/bg/bg_news_read_upper.png') }}" alt="bg_news_read_upper" width="100%"><br>
        title:: {{ $news->title}}<br>
        content:: {!! $news->content !!}<br>
        aaaaaaaaaaaa<br>
        aaaaaaaaaaaa<br>
        aaaaaaaaaaaa<br>
        aaaaaaaaaaaa<br>
        aaaaaaaaaaaa<br>
        aaaaaaaaaaaa<br>
        <img src="{{ asset('/images/bg/bg_news_read_under.png') }}" alt="bg_news_read_under" width="100%"><br>
    </div>
</div>

@include('footer')
