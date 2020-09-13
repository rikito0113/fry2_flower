{{-- イベントTOPページ --}}

@include('header')

<div class="bg-pink-flower container-fluid" style="text-align:center; padding:0px;">
<img src="{{ asset('/images/titlebar/obi_news1.png') }}" alt="obi_news1" class="fit-img100">
    {{-- イベント情報 スライダー表示 --}}
    <div id="slider-1" class="carousel slide" data-ride="carousel" style="padding:0px;">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('/images/banner/bn_top001.jpg') }}" alt="banner" class="fit-img100">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('/images/banner/bn_top002.jpg') }}" alt="banner" class="fit-img100">
            </div>
        </div>
        <a class="carousel-control-prev" href="#slider-1" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#slider-1" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <br>

    <img src="{{ asset('/images/titlebar/obi_cap14.png') }}" alt="obi_cap14" width="100%"><br>

    <div style="text-align: center;">
        @if (isset($event_info))
            @foreach ($event_info as $row)
                <a href="/EventInfo/detail/{{ $row->event_info_id }}">
                    <img src="{{ asset('/images/banner/'. $row->banner_img .'.png') }}" alt="banner_img" width="85%">
                </a><br />
                開催期間:{{ $row->start_time }}〜{{ $row->end_time }}<br />
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