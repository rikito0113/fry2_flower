@include('header')

<div class="bg-pink-flower">
    <img src="{{ asset('/images/titlebar/obi_news1.png') }}" alt="obi_news1" width="100%"><br>
    <div class="bg-news">
        title:: {{ $news->title}}<br>
        content:: {!! $news->content !!}<br>
        aaaaaaaaaaaa<br>
        aaaaaaaaaaaa<br>
        aaaaaaaaaaaa<br>
        aaaaaaaaaaaa<br>
        aaaaaaaaaaaa<br>
        aaaaaaaaaaaa<br>
    </div>
</div>

@include('footer')
