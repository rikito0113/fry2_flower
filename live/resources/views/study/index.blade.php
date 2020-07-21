@include('header')

    {{-- body --}}
    <div style="text-align:center;">

        名前：{{ $player_info->name }}<br>
        勉学pt:{{ $player_info->study_point }}<br>

        <br>

        {{-- girl表示 --}}
        @foreach ($all_girl_info as $index => $char)
        {{ $char->char_name }} : {{ $char->subject_name }} : {{ $char->score }}点<br>
        @endforeach

    </div>

@include('footer')