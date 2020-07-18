@include('header')

    {{-- body --}}
    <div style="text-align:center;">

        名前：{{ $player_info->name }}
        称号：{{ $title }}

        名前を変更

        称号を変更

    </div>

@include('footer')