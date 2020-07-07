<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
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

            <img class="header-child" src="{{ asset('/images/kaonashi.JPG') }}" alt="+">
    </div>
