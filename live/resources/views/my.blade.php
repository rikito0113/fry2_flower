@include('header')

    {{-- body --}}
    <div class="bg-pink-flower container-fluid" style="text-align:center; padding:0px;">

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

        {{-- ガールリスト表示 --}}
        <div class="row" style="margin:0px;">
            @foreach ($owned_char_info as $index => $char)
                <div class="col-4 col-sm-4 col-md-4" style="padding:2px;">
                    <img src="{{ asset('/images/icon/bt_girl_' . $char->attitude . $char->char_id . '.png') }}" alt="girl" class="fit-img100"><br>
                    <img src="{{ asset('/images/button/bt_top_profile_purple.png') }}" alt="profile" class="girl-list-pf-button">
                    <p class="girl-list-lv">Lv.{{$char->level}}</p>
                </div>
            @endforeach
        </div>

        <br>

        <div style="text-align:center; width:100%">
            <img src="{{ asset('/images/button/bt_sotohe.png') }}" alt="sotohe" width="50%"><br>
        </div>
        <br>

        {{-- キャンペーン関連 --}}
        <img src="{{ asset('/images/titlebar/obi_campain.png') }}" alt="obi_campaign" width="100%" style="width:100%; vertical-align:top;"><br>
        <div style="text-align:center; width:100%">
            <img src="{{ asset('/images/banner/bt_cam1.png') }}" alt="banner" width="95%"><br>
        </div>
        <div style="text-align:center; width:100%">
            <img src="{{ asset('/images/banner/bt_cam2.png') }}" alt="banner" width="95%"><br>
        </div>
    </div>

    <p>
    playerId :: {{$test_1}}
    </p>

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

