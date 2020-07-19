@include('header')

    {{-- body --}}
    <div style="text-align:center;">

        {{$change_name}}<br>
        に名前を変更しますか？<br>
        <br>

        <a href="{{ action('ProfileController@changeNameExec',['changeName' => $change_name]) }}">変更</a><br>
        <br>
        <a href="/Profile/profile">やっぱりやめる</a>

    </div>

@include('footer')