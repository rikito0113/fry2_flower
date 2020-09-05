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
                    <a href="/Study/studyRanking?char_id={{ $char->char_id }}"><img src="{{ asset('/images/icon/icon_chara'. $char->char_id .'.png') }}" alt="icon" width="15%"></a>
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
        {{-- 1位から3位 --}}
        @for ($i = 1; $i <= 3; $i++)
            @if (isset($ranking_data[$i-1]))
                <div style="position: relative;">
                    <img src="{{ asset('/images/bg/bg_ranking'. $i .'.png') }}" alt="" width="90%">
                    <span class="high-rank-title">称号:{{ $ranking_data[$i-1]->player_data->title }}</span>
                    <span class="high-rank-name">{{ $ranking_data[$i-1]->player_data->name }}</span>
                    <span class="high-rank-point">
                        @if ($ranking_char_id)
                            {{ $ranking_data[$i-1]->score }}点
                        @else
                            {{ $ranking_data[$i-1]->sum_score}}点
                        @endif
                    </span>
                </div>
            @else
                <div style="position: relative;">
                    <img src="{{ asset('/images/bg/bg_ranking'. $i .'.png') }}" alt="" width="90%">
                    <span class="high-rank-title">称号:</span>
                    <span class="high-rank-name">{{ $i }}位はいません。</span>
                    <span class="high-rank-point">
                        0点
                    </span>
                </div>
            @endif
        @endfor

        <img src="{{ asset('/images/titlebar/obi_cap_ranking2.png') }}" alt="総合4~10位ランキング" width="100%">

        <table width="100%">
            <tr>
                {{-- 4位から7位 --}}
                <td width="50%" valign="top">
                    @for ($i = 4; $i <= 7; $i++)
                        @if (isset($ranking_data[$i-1]))
                            <div style="position: relative;">
                                <img src="{{ asset('/images/bg/bg_ranking'. $i .'.png') }}" alt="" width="90%">
                                <span class="low-rank-name">{{ $ranking_data[$i-1]->player_data->name }}</span>
                                <span class="low-rank-point">
                                    @if ($ranking_char_id)
                                        {{ $ranking_data[$i-1]->score }}点
                                    @else
                                        {{ $ranking_data[$i-1]->sum_score}}点
                                    @endif
                                </span>
                            </div>
                        @else
                            <div style="position: relative;">
                                <img src="{{ asset('/images/bg/bg_ranking'. $i .'.png') }}" alt="" width="90%">
                                <span class="low-rank-name">{{ $i }}位はいません。</span>
                                <span class="low-rank-point">
                                    0点
                                </span>
                            </div>
                        @endif
                    @endfor
                </td>

                {{-- 8位から10位 --}}
                <td width="50%" valign="top">
                    @for ($i = 8; $i <= 10; $i++)
                        @if (isset($ranking_data[$i-1]))
                            <div style="position: relative;">
                                <img src="{{ asset('/images/bg/bg_ranking'. $i .'.png') }}" alt="" width="90%">
                                <span class="low-rank-name">{{ $ranking_data[$i-1]->player_data->name }}</span>
                                <span class="low-rank-point">
                                    @if ($ranking_char_id)
                                        {{ $ranking_data[$i-1]->score }}点
                                    @else
                                        {{ $ranking_data[$i-1]->sum_score}}点
                                    @endif
                                </span>
                            </div>
                        @else
                            <div style="position: relative;">
                                <img src="{{ asset('/images/bg/bg_ranking'. $i .'.png') }}" alt="" width="90%">
                                <span class="low-rank-name">{{ $i }}位はいません。</span>
                                <span class="low-rank-point">
                                    0点
                                </span>
                            </div>
                        @endif
                    @endfor
                </td>
            </tr>
        </table>
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