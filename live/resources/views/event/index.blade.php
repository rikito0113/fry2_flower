{{-- イベントTOPページ --}}

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

    <div style="text-align: center;">
        @if (isset($all_event))
            @foreach ($all_event as $event)
                    <a href="/Event/detail/{{ $event->event_id }}">
                    <img src="{{ asset('/images/banner/'. $event->banner_img .'.png') }}" alt="banner_img" width="85%"><br />
                </a>
                開催期間:{{ $event->start_time }}〜{{ $event->end_time }}<br />
            @endforeach
        @endif
        <br><br>
    </div>
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