@include('header')

    {{-- body --}}
    <div style="text-align:center;">

        {{-- イベント情報 スライダー表示 --}}
        <div style="text-align:center; width:100%">
            <img src="{{ asset('/images/banner/bt_ranking1.png') }}" alt="banner" width="100%"><br>
        </div>

        {{-- ガールリスト表示 --}}
        <div style="background:url('../images/bg/bg_img_pink.jpg'); background-size:contain; width:100%;">
            @foreach ($owned_char_info as $index => $char)
                <div class="girl-img" style="width:30%; position:relative;">
                    <img src="{{ asset('/images/icon/bt_girl1.png') }}" alt="girl" width="100%"><br>
                    <img src="{{ asset('/images/button/bt_top_profile_pink.png') }}" alt="profile" style="position:absolute; bottom:30px; right:3px;" width="50%">
                    <p style="position:absolute; bottom:14px; left:3px; font-size: 6px; color: purple; font-weight: bold;">Lv {{$char->level}}</p>
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
        <div style="text-align:center; width:100%">
            <img src="{{ asset('/images/titlebar/obi_campain.png') }}" alt="obi_campaign" width="100%"><br>
        </div>
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

@include('footer')

