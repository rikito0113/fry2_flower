@include('header')

    {{-- body --}}
    <div style="text-align:center;">

        名前：{{ $player_info->name }}<br>
        称号：{{ $title->title_text }}<br>
        勉学pt:{{ $player_info->study_point }}<br>

        <br>
        <br>

        名前を変更<br>
        <div style="text-align: center; align:center;">
            <form action="/Profile/changeNameConfirm" method="POST">
                @csrf
                <input type="text" name="name" placeholder="新しい名前を入力">
                <input type="submit" value="変更">
            </form>
        </div>

        称号を変更<br>

    </div>

@include('footer')