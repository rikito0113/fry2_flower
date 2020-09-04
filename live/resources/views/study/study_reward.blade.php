@include('header')
    
{{-- body --}}
<div class="bg-gray-flower">
    <img src="{{ asset('/images/titlebar/obi_profile2.png') }}" alt="勉学の達成報酬" style="width:100%; vertical-align:top;"><br>
    <img src="{{ asset('/images/banner/bt_ranking' . $term->term_id . '.png') }}" alt="テスト期間" style="width:100%; vertical-align:top;"><br>
    <br>
    <ul class="reward-tab">
        @foreach ($all_owned_char_info as $index => $char)
            @if ($char->char_id == $owned_girl_info->char_id)
                <li><img src="{{ asset('/images/tab/tab_big' . $char->subject_id . '.png') }}" alt="教科" width="13.333%"></li>
            @else
                <li><a href="/Study/studyReward?owned_char_id={{ $char->char_id }}"><img src="{{ asset('/images/tab/tab' . $char->subject_id . '.png') }}" alt="教科" width="13.333%"></a></li>
            @endif
        @endforeach
    </div>

    <div style="text-align:center; position:relative; width:100%;">
        <div style="position:absolute; height:auto">
            <img src="{{ asset('/images/bg/bg_achieve_name' . $owned_girl_info->char_id . '.png') }}" alt="name">
            <p style="position:absolute; top:25.5%; left:58%; font-size:30px;" class="study-font">{{ $owned_girl_info->score }}</p>
        </div>
        <div>
            <img src="{{ asset('/images/bg/bg_achieve_chara' . $owned_girl_info->char_id . $owned_girl_info->attitude . '.png') }}" alt="chara_img">
            <img src="{{ asset('/images/bg/bg_achieve_base.png') }}" alt="base">
            @foreach ($reward_list as $index => $reward)
                @if ($reward->is_get)
                    <img src="{{ asset('/images/bg/bg_achieve_clear.png') }}" alt="clear">
                    <p>{{ $reward->item_info->item_name }}</p>
                @else
                    @if ($reward->need_score <= $owned_girl_info->score)
                        <a href="/Study/getStudyRewardExec?owned_char_id={{ $char->owned_char_id }}&reward_id={{ $reward->reward_id }}">{{ $reward->item_info->item_name }}</a>
                    @else
                        <img src="{{ asset('/images/bg/bg_achieve_noclear.png') }}" alt="noclear">
                        <p>{{ $reward->item_info->item_name }}</p>
                    @endif
                @endif
            @endforeach
        </div>
        <img src="{{ asset('/images/bg/bg_achieve_under' . $owned_girl_info->char_id . '.png') }}" alt="under">
    <br>
    <br>

</div>

@include('footer')