@include('header')
    
{{-- body --}}
<div class="bg-gray-flower">
    <img src="{{ asset('/images/titlebar/obi_profile3.png') }}" alt="現在の状況" style="width:100%; vertical-align:top;"><br>
    <img src="{{ asset('/images/banner/bt_ranking' . $term->term_id . '.png') }}" alt="テスト期間" style="width:100%; vertical-align:top;"><br>
    <div class="my-study-info">
        <img src="{{ asset('/images/bg/bg_situ1.png') }}" alt="点数" style="position:relative" width="100%">
        <img src="{{ asset('/images/bg/bg_situ_point.png') }}" alt="点数UP" style="position:absolute; top:60%; margin-left:auto; margin-right:auto; left:0; right:0;" width="80%">
        <div style="position:absolute; top:4%; left:45%; font-size:19px;" class="study-font">{{ $player_info->study_point }}</div>
        <div style="position:absolute; top:4%; left:84%; font-size:19px;" class="study-font">{{ $player_info->study_point }}位</div>
        <div style="position:absolute; top:25.5%; left:58%; font-size:61px;" class="study-font">{{ $owned_girl_info->score }}</div> 

        <div style="position:absolute; top:60%; left:0; right:0; margin-right:auto; margin-left:auto;">
            <form action="/Study/upScoreExec" method="POST">
                @csrf
                <select name="add_score">
                    @for ($i = 0; $i <= $player_info->study_point; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
                <input type="hidden" name="owned_char_id" value="{{$owned_girl_info->owned_char_id}}">
                <input type="image" src="{{ asset('/images/button/bt_profile_mini1.png') }}" value="確定" style="width:40%;">
            </form>
        </div>
    </div>

    <br>

     <div style="text-align:center;">
        <a href="{{ action('StudyController@studyRanking') }}"><img src="{{ asset('/images/button/bt_profile_study_reward.png') }}" alt="勉学pt達成報酬" width="250"></a><br>
    </div>
    <br>

</div>

@include('footer')