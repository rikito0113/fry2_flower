@include('header')
<img src="{{ asset('/images/titlebar/obi_profile1.png') }}" alt="現在のあなたのランキング" style="width:100%; vertical-align:top;"><br>

<div class="bg-gray-flower">
    <br>
    <div class="my-study-info">
        <img src="{{ asset('/images/bg/bg_profile.png') }}" alt="プロフィール" style="position:relative" width="100%">
        <div style="position:absolute; top:17%; left:17%;font-size:12px;">マサチューセッツ世界大学</div>
        <div style="position:absolute; top:43.5%; left:39%;">理系</div>
        <div style="position:absolute; top:56.5%; left:41%;">{{$player_info->study_point}}</div>
        <div style="position:absolute; top:70%; left:41%;">{{$my_rank_info->rank}}位</div>
    </div>
</div>

<div class="bg-gray">
    <img src="{{ asset('/images/titlebar/obi_cap_ranking4.png') }}" alt="プロフィール更新" style="width:100%; vertical-align:top;"><br>

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
