<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/girl.css') }}">
    <script type="text/javascript" src="{{ asset('js/header.js') }}"></script>
    <title>flower girls</title>
</head>
<body>
    <div class="flower-header" >
        <a href="{{ action('MyController@my') }}">
            <img class="header-child" src="{{ asset('/images/kaonashi.JPG') }}" alt="TOP">
        </a>
        <a href="{{ action('GirlController@index') }}">
            <img class="header-child" src="{{ asset('/images/kaonashi.JPG') }}" alt="girl">
        </a>
            <img class="header-child" src="{{ asset('/images/kaonashi.JPG') }}" alt="gacha&shop">

        <a href="{{ action('PresentController@index') }}">
            <img class="header-child" src="{{ asset('/images/kaonashi.JPG') }}" alt="present">
        </a>

        <img class="header-child" src="{{ asset('/images/kaonashi.JPG') }}" alt="+" onclick="appearTag()">

        <img class="other-header-child1" name="tag" src="{{ asset('/images/kaonashi.JPG') }}" alt="戻る" onclick="appearTag()">
        <img class="other-header-child2" name="tag" src="{{ asset('/images/kaonashi.JPG') }}" alt="思い出">
        <img class="other-header-child3" name="tag" src="{{ asset('/images/kaonashi.JPG') }}" alt="育成">
        <img class="other-header-child4" name="tag" src="{{ asset('/images/kaonashi.JPG') }}" alt="イベント">
        <img class="other-header-child5" name="tag" src="{{ asset('/images/kaonashi.JPG') }}" alt="プロフィール">
        <img class="other-header-child6" name="tag" src="{{ asset('/images/kaonashi.JPG') }}" alt="新着情報">
    </div>
