@include('header')
<img src="{{ asset('/images/titlebar/obi_profile2.png') }}" alt="勉学達成報酬" style="width:100%; vertical-align:top;"><br>


{{-- body --}}
<div style="text-align:center;">

    <div class="bg-gray-flower" style="text-align: center;">
        <img src="{{ asset('/images/banner/bt_ranking1.png') }}" alt="2020年春全国学問考査" width="90%">
        <br>
        <a href="{{ action('StudyController@studyRanking') }}">
            <img src="{{ asset('/images/button/bt_profile4.png') }}" alt="総合ランキング" width="70%">
        </a>
    </div>

    <div>
        @foreach ($char_info as $index => $char)
            @if ($char->char_id == $ranking_char_id)
                <span style="position: relative;">
                    <img src="{{ asset('/images/icon/icon_chara'. $char->char_id .'.png') }}" alt="icon" width="15%">
                    <span style="position: absolute; top: 70%; left: 15%; font-size: 5px;">選択中</span>
                </span>
            @else
                <span>
                    <a href="/Study/studyRanking?char_id={{ $char->char_id }}">
                        <img src="{{ asset('/images/icon/icon_chara'. $char->char_id .'.png') }}" alt="icon" width="15%">
                    </a>
                </span>
            @endif
        @endforeach

        @if ($char_name)
            <div class="obi_charaname" style="text-align: center">
                {{ $char_name }}
            </div>
        @endif
    </div>

    <img src="{{ asset('/images/titlebar/obi_cap_ranking1.png') }}" alt="総合ランキング情報" width="100%">

    <div class="bg-gray">
        {{-- 1位 --}}
        @if (isset($ranking_data[0]))
            <div style="position: relative;">
                <img src="{{ asset('/images/bg/bg_ranking1.png') }}" alt="1位" width="90%">
                <span class="high-rank-title">称号:{{ $ranking_data[0]->player_data->title }}</span>
                <span class="high-rank-name">{{ $ranking_data[0]->player_data->name }}</span>
                <span class="high-rank-point">
                    @if ($ranking_char_id)
                        {{ $ranking_data[0]->score }}点
                    @else
                        {{ $ranking_data[0]->sum_score}}点
                    @endif
                </span>
            </div>
        @endif

        {{-- 2位 --}}
        @if (isset($ranking_data[1]))
            <div style="position: relative;">
                <img src="{{ asset('/images/bg/bg_ranking2.png') }}" alt="1位" width="90%">
                <span class="high-rank-title">称号:{{ $ranking_data[1]->player_data->title }}</span>
                <span class="high-rank-name">{{ $ranking_data[1]->player_data->name }}</span>
                <span class="high-rank-point">
                    @if ($ranking_char_id)
                        {{ $ranking_data[1]->score }}
                    @else
                        {{ $ranking_data[1]->sum_score}}
                    @endif
                </span>
            </div>
        @endif

        {{-- 3位 --}}
        @if (isset($ranking_data[2]))
            <div style="position: relative;">
                <img src="{{ asset('/images/bg/bg_ranking3.png') }}" alt="1位" width="90%">
                <span class="high-rank-title">称号:{{ $ranking_data[2]->player_data->title }}</span>
                <span class="high-rank-name">{{ $ranking_data[2]->player_data->name }}</span>
                <span class="high-rank-point">
                    @if ($ranking_char_id)
                        {{ $ranking_data[2]->score }}
                    @else
                        {{ $ranking_data[2]->sum_score}}
                    @endif
                </span>
            </div>
        @endif
    </div>

    {{-- @foreach ($ranking_data as $index => $ranking_player)
        {{ $index + 1 }} : {{ $ranking_player->player_data->name }} : {{ $ranking_player->player_data->title }} :
        @if ($ranking_char_id)
            {{ $ranking_player->score}}
        @else
            {{ $ranking_player->sum_score}}
        @endif
        <br>
        <br>
    @endforeach --}}
</div>

@include('footer')