@include('header')

    {{-- body --}}
    <div style="text-align:center;">

        名前：{{ $player_info->name }}<br>
        勉学pt:{{ $player_info->study_point }}<br>

        <br>

        {{-- girl表示 --}}
        @foreach ($all_girl_info as $index => $char)
            {{ $char->char_name }} : {{ $char->subject_name }} : {{ $char->score }}点 : 
            <form action="/Study/girlScoreStatus" method="POST" style="display:inline">
                @csrf
                <input type="hidden" name="owned_char_id" value="{{$char->owned_char_id}}">
                <input type="submit" value="学習">
            </form>
            <br>
        @endforeach

        <br>
        <br>

        <a href="{{ action('StudyController@studyRanking') }}"><img src="{{ asset('/images/button/bt_prpfile_study_ranking.png') }}" alt="勉学ptランキング"></a><br>
        <br>
        <a href="{{ action('StudyController@studyRanking') }}"><img src="{{ asset('/images/button/bt_prpfile_study_reward.png') }}" alt="勉学pt達成報酬"></a><br>
    
    </div>

@include('footer')