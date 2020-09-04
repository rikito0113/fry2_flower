@include('header')

<div class="bg-gray-flower">
    <img src="{{ asset('/images/titlebar/obi_news1.png') }}" alt="obi_news1" width="100%"><br>
    {{-- イベント情報 スライダー表示 --}}
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="{{ asset('/images/banner/bn_top001.jpg') }}" alt="banner" style="width:100%;"></div>
            <div class="swiper-slide"><img src="{{ asset('/images/banner/bn_top002.jpg') }}" alt="banner" style="width:100%;"></div>
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>

    <br>

    <img src="{{ asset('/images/titlebar/obi_cap14.png') }}" alt="obi_cap14" width="100%"><br>

    <div style="position: relative; text-align:center; width:90%">
    @if (isset($all_news))
        @foreach ($all_news as $row)
            <a href="/News/detail/{{ $row->news_id }}">
                <img src="{{ asset('/images/bg/bg_news_box.png') }}" alt="bg_news_box" width="80%">
                <p style="position: absolute; ">
                    @if (!isset($row->is_read))
                        [未読]
                    @endif
                    {{ $row->title }}
                </p>
            </a><br>
        @endforeach
    @endif

</div>

<script>
    var Swiper = new Swiper('.swiper-container', {
    loop: true,
    pagination: {
        el: '.swiper-pagination',
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    scrollbar: {
        el: '.swiper-scrollbar',
    },
    })
</script>

@include('footer')
