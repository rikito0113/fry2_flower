@include('header')

    {{-- body --}}
    <div class="container-fluid" style="text-align:center; padding:0px;">

        {{-- イベント情報 スライダー表示 --}}
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12" style="padding:1px;">
                <div class="swiper-container">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        <div class="swiper-slide"><img src="{{ asset('/images/banner/bn_top001.jpg') }}" alt="banner" class="fit-img100"></div>
                        <div class="swiper-slide"><img src="{{ asset('/images/banner/bn_top002.jpg') }}" alt="banner" class="fit-img100"></div>
                    </div>
                    <!-- If we need pagination -->
                    <div class="swiper-pagination"></div>

                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        </div>

        {{-- ガールリスト表示 --}}
        <div style="background:url('../images/bg/bg_img_pink.jpg'); background-size:contain; width:100%;">
            @foreach ($owned_char_info as $index => $char)
                <div class="girl-img" style="width:30%; position:relative;">
                    <img src="{{ asset('/images/icon/bt_girl_' . $char->attitude . $char->char_id . '.png') }}" alt="girl" width="100%"><br>
                    <img src="{{ asset('/images/button/bt_top_profile_purple.png') }}" alt="profile" style="position:absolute; bottom:30px; right:3px;" width="50%">
                    <p style="position:absolute; bottom:14px; left:4px; font-size: 6px; color: purple; font-weight: bold;">Lv.{{$char->level}}</p>
                </div>
                @if ($index % 3 == 0)
                    <br>
                @endif
            @endforeach
            <br>
            <div style="text-align:center; width:100%">
                <img src="{{ asset('/images/button/bt_sotohe.png') }}" alt="sotohe" width="50%"><br>
            </div>
            <br>
        </div>

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

