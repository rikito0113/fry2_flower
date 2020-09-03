<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- スライダー用 --}}
    <link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.min.css">

    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/background.css') }}">
    <link rel="stylesheet" href="{{ asset('css/girl.css') }}">
    <link rel="stylesheet" href="{{ asset('css/study.css') }}">
    <script type="text/javascript" src="{{ asset('js/header.js') }}"></script>

    <title>flower girls</title>
</head>
<body style="margin:0px;">
    <div class="flower-header-dere" >
        <a href="{{ action('MyController@my') }}">
            <img class="header-child" src="{{ asset('/images/header/navi_top.png') }}" alt="TOP">
        </a>
        <a href="{{ action('GirlController@index') }}">
            <img class="header-child" src="{{ asset('/images/header/navi_girl.png') }}" alt="girl">
        </a>
            <img class="header-child" src="{{ asset('/images/header/navi_gacha.png') }}" alt="gacha&shop">

        <a href="{{ action('PresentController@index') }}">
            <img class="header-child" src="{{ asset('/images/header/navi_pre.png') }}" alt="present">
        </a>

        <img class="header-child" src="{{ asset('/images/header/navi_other.png') }}" alt="+" onclick="appearTag()">

        <a href="{{ route('girl.memory') }}">
            <img class="other-header-child2" name="tag" src="{{ asset('/images/button/bt_side_mem.png') }}" alt="思い出">
        </a>
        <a href="{{ action('StudyController@index') }}">
            <img class="other-header-child3" name="tag" src="{{ asset('/images/button/bt_side_study.png') }}" alt="育成">
        </a>
        <img class="other-header-child4" name="tag" src="{{ asset('/images/button/bt_side_event.png') }}" alt="イベント">
        <a href="{{ action('ProfileController@profile') }}">
            <img class="other-header-child5" name="tag" src="{{ asset('/images/button/bt_side_profile.png') }}" alt="プロフィール">
        </a>
        <a href="{{ action('NewsController@index') }}">
            <img class="other-header-child6" name="tag" src="{{ asset('/images/button/bt_side_news.png') }}" alt="新着情報">
        </a>
    </div>
