@include('header')

@if ($type == 2)
    未読あり<br>
@else
    既読一覧<br>
@endif

@if (isset($all_news))
    @foreach ($all_news as $row)
        <a href="/News/detail/{{ $row->news_id }}">・{{ $row->title }}</a><br>
    @endforeach
@endif

@include('footer')
