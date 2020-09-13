@include('header')

<div class="bg-pink-flower">
    <img src="{{ asset('/images/titlebar/obi_news1.png') }}" alt="obi_news1" width="100%"><br>
   
    {{-- イベント情報 スライダー表示 --}}
    <div id="slider" class="carousel slide col-xs-12 col-sm-12 col-md-12" data-ride="carousel" style="padding:0px;">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('/images/banner/bn_top001.jpg') }}" alt="banner" class="fit-img100">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('/images/banner/bn_top002.jpg') }}" alt="banner" class="fit-img100">
            </div>
            <a class="carousel-control-prev" href="#slider" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#slider" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
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
                            <img src="{{ asset('/images/icon/icon_new.png') }}" alt="icon_new" width="50%">
                        @else
                            <img src="{{ asset('/images/icon/icon_read.png') }}" alt="icon_read" width="50%">
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
