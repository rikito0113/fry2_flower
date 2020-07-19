@include('header')

    {{-- body --}}
    <div style="text-align:center;">

        名前：{{ $player_info->name }}<br>
        称号：{{ $title->title_text }}<br>
        勉学pt:{{ $player_info->study_point }}<br>

        <br>
        <br>

        @if(isset($is_name_change))
            名前変更済<br>
        @else
        名前を変更<br>
        <div style="text-align: center; align:center;">
            <form action="/Profile/changeNameConfirm" method="POST">
                @csrf
                <input type="text" name="name" placeholder="新しい名前を入力">
                <input type="submit" value="変更">
            </form>
        </div>
        @endif

        <br>

        @if(isset($is_title_change))
            称号変更済<br>
        @else
        称号を変更<br>
        <div style="text-align: center; align:center;">
            <form action="/Profile/changeTitleConfirm" method="POST">
                @csrf
                <select name="title_id">
                    @foreach ($owned_titles as $owned_title)
                        <option value="{{ $owned_title->title_id }}">{{ $owned_title->title_text }}</option>
                    @endforeach
                </select>
                <input type="submit" value="変更">
            </form>
        </div>
        @endif

    </div>

@include('footer')