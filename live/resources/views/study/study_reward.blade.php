@include('header')
    
{{-- body --}}
<div class="bg-gray-flower" style="text-align:center">
    <img src="{{ asset('/images/titlebar/obi_profile2.png') }}" alt="勉学の達成報酬" style="width:100%; vertical-align:top;"><br>
    <img src="{{ asset('/images/banner/bt_ranking' . $term->term_id . '.png') }}" alt="テスト期間" style="width:100%; vertical-align:top;"><br>
    <br>
    <div style="margin:0 2%">
        <ul class="reward-tab">
            @foreach ($all_owned_char_info as $index => $char)
                @if ($char->char_id == $owned_girl_info->char_id)
                    <li><img src="{{ asset('/images/tab/tab_big' . $char->subject_id . '.png') }}" alt="教科"></li>
                @else
                    <li><a href="/Study/studyReward?owned_char_id={{ $char->owned_char_id }}"><img src="{{ asset('/images/tab/tab' . $char->subject_id . '.png') }}" alt="教科"></a></li>
                @endif
            @endforeach
        </ul>

        <div style="text-align:center; position:relative; width:100%;">
            <div style="position:relative; height:auto; width:100%;">
                <img src="{{ asset('/images/bg/bg_achieve_name' . $owned_girl_info->char_id . '.png') }}" alt="name" class="fit-img100">
                <p style="position:absolute; top:-27.5%; right:8%; font-size:30px;" class="study-font">{{ $owned_girl_info->score }}</p>
            </div>
            <div>
                <ul class="achive-img">
                    <li><img src="{{ asset('/images/bg/bg_achieve_chara' . $owned_girl_info->char_id . '_' . $owned_girl_info->attitude . '.jpg') }}" alt="chara_img"></li>
                    <li><div style="position:relative; height:100%; text-align:left;"><img src="{{ asset('/images/bg/bg_achieve_base.jpg') }}" alt="base" style="position:absolute; height:100%; width:100%"></div></li>
                </ul>
                @foreach ($reward_list as $index => $reward)
                    @if ($reward->is_get)
                        <img src="{{ asset('/images/bg/bg_achieve_clear.png') }}" alt="clear">
                        <p>{{ $reward->item_info->item_name }}</p>
                    @else
                        @if ($reward->need_score <= $owned_girl_info->score)
                            <a href="/Study/getStudyRewardExec?owned_char_id={{ $owned_girl_info->owned_char_id }}&reward_id={{ $reward->reward_id }}">{{ $reward->item_info->item_name }}</a>
                        @else
                            <img src="{{ asset('/images/bg/bg_achieve_noclear.png') }}" alt="noclear">
                            <p>{{ $reward->item_info->item_name }}</p>
                        @endif
                    @endif
                @endforeach
            </div>
        </div>
        <img src="{{ asset('/images/bg/bg_achieve_under' . $owned_girl_info->char_id . '.png') }}" alt="under" class="fit-img100">
    </div>

    <br>
    <br>

</div>

@include('footer')