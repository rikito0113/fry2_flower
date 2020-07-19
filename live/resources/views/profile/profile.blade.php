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
        <br>

        称号を変更<br>
        <div style="text-align: center; align:center;">
            <form action="/Profile/changeTitleConfirm" method="POST">
                @csrf
                <select name="title">
                    @foreach ($owned_titles as $owned_title)
                        <option value="{{ $owned_titles->title_id }}">{{ $owned_title->title_text }}</option>
                    @endforeach
                </select>
                <input type="submit" value="変更">
            </form>
        </div>

    </div>

@include('footer')