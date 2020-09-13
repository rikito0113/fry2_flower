{{-- イベントTOPページ --}}

@include('header')

<div class="bg-pink-flower container-fluid" style="text-align:center; padding:0px;">
<img src="{{ asset('/images/titlebar/obi_news1.png') }}" alt="obi_news1" class="fit-img100">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12" style="padding:1px;">
            {{-- イベント情報 スライダー表示 --}}
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="{{ asset('/images/banner/bn_top001.jpg') }}" alt="banner" class="fit-img100"></div>
                    <div class="swiper-slide"><img src="{{ asset('/images/banner/bn_top002.jpg') }}" alt="banner" class="fit-img100"></div>
                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
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