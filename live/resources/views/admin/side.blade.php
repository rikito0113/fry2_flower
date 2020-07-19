<div id="Header">
    <ul>
        <li> <a href="{{ route('admin.sholdReply') }}" @if ($menu == 'shold_reply') class="active" @endif>未返信(未実装)</a></li>
        <li><a href="{{ route('admin.findPlayer') }}" @if ($menu == 'find_player') class="active" @endif>プレイヤー検索(未実装)</a></li>
        <li><a href="{{ route('admin.findItem') }}" @if ($menu == 'find_item') class="active" @endif>アイテム検索(未実装)</a></li>
        <li><a href="{{ route('admin.findGirl') }}" @if ($menu == 'find_girl') class="active" @endif>ガール検索(未実装)</a></li>
        <li><a href="{{ action('AdminController@registerTitle') }}" @if ($menu == 'regist_title') class="active" @endif>称号登録(未実装)</a></li>
    </ul>
</div>
