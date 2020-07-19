@include('header')

    {{-- body --}}
    <div style="text-align:center;">

        {{$change_title->title_text}}<br>
        に称号を変更しますか？<br>
        <br>

        <form action="/Profile/changeTitleExec" method="POST">
                @csrf
                <input type="hidden" name="title_id" value="{{$change_title->title_id}}">
                <input type="submit" value="変更">
        </form>
        <br>
        <a href="/Profile/profile">やっぱりやめる</a>

    </div>

@include('footer')