@include('header')

    {{-- body --}}
    <div style="text-align:center;">

        {{-- イベント情報 スライダー表示 --}}
        <div style="text-align:center; width:100%">
            <img src="{{ asset('/images/banner/bt_ranking1.png') }}" alt="banner" width="100%"><br>
        </div>

        {{-- ガールリスト表示 --}}
        <div style="background:url('../images/bg/bg_img_pink.png'); width:100%;">
            @foreach ($owned_char_info as $index => $char)
                <span width="30%">
                    <div class="girl-img" style="width:30%;">
                        <img src="{{ asset('/images/icon/bt_girl1.png') }}" alt="girl" width="100%"><br>
                    </div>
                </span>
                @if ($index % 3 == 0)
                    <br>
                @endif
            @endforeach
            <div style="text-align:center; width:100%">
                <img src="{{ asset('/images/button/bt_sotohe.png') }}" alt="sotohe" width="40%"><br>
            </div>
        </div>

        {{-- キャンペーン関連 --}}
        <div style="text-align:center; width:100%">
            <img src="{{ asset('/images/titlebar/obi_campain.png') }}" alt="obi_campaign" width="100%"><br>
        </div>
        <div style="text-align:center; width:100%">
            <img src="{{ asset('/images/banner/bt_cam1.png') }}" alt="banner" width="100%"><br>
        </div>
        <div style="text-align:center; width:100%">
            <img src="{{ asset('/images/banner/bt_cam2.png') }}" alt="banner" width="100%"><br>
        </div>
    </div>

    <p>
    playerId :: {{$test_1}}
    </p>

@include('footer')

