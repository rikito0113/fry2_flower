@include('header')

    {{-- body --}}
    <div style="text-align:center;">

        {{$change_name}}<br>
        に名前を変更しますか？<br>
        <br>

        <form action="/Profile/changeNameExec" method="POST">
                @csrf
                <input type="hidden" name="name" value="{{$change_name}}">
                <input type="submit" value="変更">
        </form>
        <br>
        <a href="/Profile/profile">やっぱりやめる</a>

    </div>

@include('footer')