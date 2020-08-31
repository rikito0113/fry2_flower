@include('header')

@if (isset($all_news))
    @foreach ($all_news as $row)
        <a href="/News/detail/{{ $row->news_id }}">
            ・
            @if (!isset($row->is_read))
                [未読]
            @endif
            {{ $row->title }}
        </a><br>
    @endforeach
@endif

@include('footer')
