<div id="Header">
    <ul>
        <li> <a @if ($menu == 'shold_reply') class="active" @endif href="{{ route('admin.sholdReply') }}">未返信(未実装)</a></li>
        <li><a @if ($menu == 'find_player') class="active" @endif href="{{ route('admin.findPlayer') }}">プレイヤー検索(未実装)</a></li>
        <li><a @if ($menu == 'find_item') class="active" @endif href="{{ route('admin.findItem') }}">アイテム検索(未実装)</a></li>
        <li><a @if ($menu == 'find_girl') class="active" @endif href="{{ route('admin.findGirl') }}">ガール検索(未実装)</a></li>
        <li><a @if ($menu == 'regist_title') class="active" @endif href="{{ action('AdminController@registerTitle') }}">称号登録(未実装)</a></li>
    </ul>
</div>
