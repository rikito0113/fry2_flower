@include('header')
<img src="{{ asset('/images/titlebar/obi_profile1.png') }}" alt="現在のあなたのランキング" style="width:100%;"><br>

    {{-- body --}}

    <div class="my-study-info">
        <img src="{{ asset('/images/bg/bg_profile.png') }}" alt="プロフィール" style="position:absolute" width="350">
    </div>

    <br>

    {{-- girl表示 --}}
    <table style="width:100%; height:auto;">
        @foreach ($all_girl_info as $index => $char)
            @if($index % 3 == 1)
            <tr style="width:100%; height:auto;">
            @endif
                <td style="width:33.333%; height:auto;">
                <div class="char-score">
                    <img src="{{ asset('/images/bg/bg_subject1.png') }}" alt="点数" style="position:absolute" width="100">
                    <!-- {{ $char->char_name }} : {{ $char->subject_name }} : {{ $char->score }}点 :  -->
                    <form action="/Study/girlScoreStatus" method="POST">
                        @csrf
                        <input type="hidden" name="owned_char_id" value="{{$char->owned_char_id}}">
                        <input type="image" src="{{ asset('/images/button/bt_study.png') }}" value="学習" alt="学習" style="position:absolute">
                    </form>
                </div>
                </td>
            @if($index % 3 == 0)
            </tr>
            @endif
        @endforeach
    </table>

    <br>
    <br>

     <div style="text-align:center;">

        <a href="{{ action('StudyController@studyRanking') }}"><img src="{{ asset('/images/button/bt_profile_study_ranking.png') }}" alt="勉学ptランキング" width="250"></a><br>
        <br>
        <a href="{{ action('StudyController@studyRanking') }}"><img src="{{ asset('/images/button/bt_profile_study_reward.png') }}" alt="勉学pt達成報酬" width="250"></a><br>

    </div>

@include('footer')