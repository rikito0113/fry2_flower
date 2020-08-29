<div id="Header">
    <div style="font-size:2em;color:red">フラワーガールズ管理</div>
    <ul>
        <li @if($menu == 'should_reply')class="active"@endif><a href="{{ route('admin.shouldReply') }}">未返信(未実装)</a></li>
        <li @if($menu == 'find_player')class="active"@endif><a href="{{ route('admin.findPlayer') }}">プレイヤー検索(花嫁修行はこちら)</a></li>
        <li @if($menu == 'find_event')class="active"@endif><a href="{{ route('admin.findEvent') }}">イベント検索(外へ行くはこちら)</a></li>
        <li @if($menu == 'find_item')class="active"@endif><a href="{{ route('admin.findItem') }}">アイテム検索(未実装)</a></li>
        <li @if($menu == 'find_girl')class="active"@endif><a href="{{ route('admin.findGirl') }}">ガール検索(未実装)</a></li>
        <li @if($menu == 'regist_title')class="active"@endif><a href="{{ action('AdminController@registerTitle') }}">称号登録(未実装)</a></li>
        <li @if($menu == 'news')class="active"@endif><a href="{{ action('AdminController@news') }}">お知らせ(新着情報)</a></li>
    </ul>
</div>
