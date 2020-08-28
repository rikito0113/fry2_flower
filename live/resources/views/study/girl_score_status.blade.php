@include('header')
    {{-- body --}}
    <!-- <div style="text-align:center;">

        {{ $term->term_name }}<br>

        <br>

        {{ $owned_girl_info->char_name }} : {{ $owned_girl_info->subject_name }} : {{ $owned_girl_info->score }}点<br>

        <br>

        <form action="/Study/upScoreExec" method="POST">
            @csrf
            <select name="add_score">
                @for ($i = 0; $i <= $player_info->study_point; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
            <input type="hidden" name="owned_char_id" value="{{$owned_girl_info->owned_char_id}}">
            <input type="submit" value="確定">
        </form>
    </div> -->
    {{-- body --}}
<div class="bg-gray-flower">
<img src="{{ asset('/images/titlebar/obi_profile3.png') }}" alt="現在の状況" style="width:100%; vertical-align:top;"><br>
<img src="{{ asset('/images/banner/obi_cap_ranking' . $term->term_id . '.png') }}" alt="テスト期間" style="width:100%; vertical-align:top;"><br>
    <div class="my-study-info">
        <img src="{{ asset('/images/bg/bg_situ1.png') }}" alt="点数" style="position:relative" width="100%">
        <img src="{{ asset('/images/bg/bg_situ_point.png') }}" alt="点数UP" style="position:absolute; top:50%; margin-left:auto; margin-right:auto;" width="100%">
        <div style="position:absolute; top:17%; left:17%;font-size:12px;">マサチューセッツ世界大学</div>
        <div style="position:absolute; top:43.5%; left:39%;">理系</div> 

        <form action="/Study/upScoreExec" method="POST">
            @csrf
            <select name="add_score">
                @for ($i = 0; $i <= $player_info->study_point; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
            <input type="hidden" name="owned_char_id" value="{{$owned_girl_info->owned_char_id}}">
            <input type="image" src="{{ asset('/images/button/bt_study.png') }}" value="確定" style="position:absolute; width:40%; top:60%; margin-left:auto; margin-left:auto;">
        </form>


    </div>

    <br>

    <br>

     <div style="text-align:center;">

        <a href="{{ action('StudyController@studyRanking') }}"><img src="{{ asset('/images/button/bt_profile_study_reward.png') }}" alt="勉学pt達成報酬" width="250"></a><br>

    </div>
    <br>

</div>

@include('footer')