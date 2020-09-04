@include('header')

<div class="bg-pink-flower">
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

    @if (isset($all_news))
        @foreach ($all_news as $row)
            <div style="position: relative; text-align:center; width:100%">
                <a href="/News/detail/{{ $row->news_id }}">
                    <img src="{{ asset('/images/bg/bg_news_box.png') }}" alt="bg_news_box" width="90%">
                    <div style="position: absolute; top:0%; left:10%;">
                        {{ $row->created_at }}
                    </div>
                    <div style="position: absolute; top:35%; left:0%;">
                        @if (!isset($row->is_read))
                            <img src="{{ asset('/images/icon/icon_new.png') }}" alt="icon_new" width="10%">
                        @else
                            <img src="{{ asset('/images/icon/icon_read.png') }}" alt="icon_read" width="10%">
                        @endif
                    </div>
                    <div style="position: absolute; top:40%; left:25%;">
                        {{ $row->title }}
                    </div>
                </a><br>
            </div>
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
