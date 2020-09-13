<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- スライダー用 --}}
    <link rel="stylesheet" href="//unpkg.com/swiper/swiper-bundle.min.css">
    <script src="//unpkg.com/swiper/swiper-bundle.min.js"></script>

    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/background.css') }}">
    <link rel="stylesheet" href="{{ asset('css/girl.css') }}">
    <link rel="stylesheet" href="{{ asset('css/study.css') }}">
    <link rel="stylesheet" href="{{ asset('css/news.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script type="text/javascript" src="{{ asset('js/header.js') }}"></script>

    <script type="text/javascript" src="https://spgm.nijiyome.jp/js/touch.js"></script>

    <title>flower girls</title>
</head>

<body style="margin:0px;">
    <div class="flower-header-dere container-fluid" >
        <div class="row">
            
            {{-- マイページ --}}
            <div class="col-xs-1-5 col-sm-1-5 col-md-1-5">
                <a href="{{ action('MyController@my') }}">
                    <img class="fit-img100"" src="{{ asset('/images/header/navi_top.png') }}" alt="TOP">
                </a>
            </div>

            {{-- ガールページ --}}
            <div class="col-xs-1-5 col-sm-1-5 col-md-1-5">
                <a href="{{ action('GirlController@index') }}">
                    <img class="fit-img100"" src="{{ asset('/images/header/navi_girl.png') }}" alt="girl">
                </a>
            </div>

            {{-- ガチャ・ショップページ --}}
            <div class="col-xs-1-5 col-sm-1-5 col-md-1-5">
                <a href="{{ action('ShopController@index') }}">
                    <img class="fit-img100"" src="{{ asset('/images/header/navi_gacha.png') }}" alt="gacha&shop">
                </a>
            </div>

            {{-- プレゼントページ --}}
            <div class="col-xs-1-5 col-sm-1-5 col-md-1-5">
                <a href="{{ action('PresentController@index') }}">
                    <img class="fit-img100"" src="{{ asset('/images/header/navi_pre.png') }}" alt="present">
                </a>
            </div>
            <div class="col-xs-1-5 col-sm-1-5 col-md-1-5">
                {{-- サイドバー --}}
                <div class="col-xs-12 col-sm-12 col-md-12" style="padding:1px;">
                    <img class="fit-img100" src="{{ asset('/images/header/navi_other.png') }}" alt="+" onclick="appearTag()">
                </div>
                
                <div class="col-xs-12 col-sm-12 col-md-12" style="padding:0px;">
                    <a href="{{ route('girl.memory') }}">
                        <img class="fit-img100" name="tag" src="{{ asset('/images/button/bt_side_mem.png') }}" alt="思い出">
                    </a>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12" style="padding:0px;">
                    <a href="{{ action('StudyController@index') }}">
                        <img class="fit-img100" name="tag" src="{{ asset('/images/button/bt_side_study.png') }}" alt="育成">
                    </a>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12" style="padding:0px;">
                    <a href="{{ action('EventInfoController@index') }}">
                        <img class="fit-img100" name="tag" src="{{ asset('/images/button/bt_side_event.png') }}" alt="イベント">
                    </a>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12" style="padding:0px;">
                    <a href="{{ action('ProfileController@profile') }}">
                        <img class="fit-img100" name="tag" src="{{ asset('/images/button/bt_side_profile.png') }}" alt="プロフィール">
                    </a>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12" style="padding:0px;">
                    <a href="{{ action('NewsController@index') }}">
                        <img class="fit-img100" name="tag" src="{{ asset('/images/button/bt_side_news.png') }}" alt="新着情報">
                    </a>
                </div>                    
            </div>
        </div>
    </div>
