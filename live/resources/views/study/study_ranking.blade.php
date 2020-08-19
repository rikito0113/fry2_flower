@include('header')
<div class="headline-dere">
    現在のあなたのランキング
</div>

    {{-- body --}}
    <div style="text-align:center;">

        {{ $term->term_name }}<br>
        @if ($ranking_char_id)
            <a href="{{ action('StudyController@studyRanking') }}">総合ランキング</a>
        @else
            総合ランキング
        @endif
        <br>
        <br>

        <table>
            <tr>
                @foreach ($char_info as $index => $char)
                    <td>
                        @if ($char->char_id == $ranking_char_id)
                            ↓
                        @endif
                    </td>
                @endforeach
            <tr>
            <tr>
                @foreach ($char_info as $index => $char)
                    <td>
                        @if ($char->char_id == $ranking_char_id)
                            {{ $char->char_name }}
                        @else
                            <a href="/Study/studyRanking?char_id={{ $char->char_id }}">{{ $char->char_name }}</a>
                        @endif
                    </td>
                @endforeach
            <tr>
        </table>

        <br>

        @foreach ($ranking_data as $index => $ranking_player)
            {{ $index + 1 }} : {{ $ranking_player->player_data->name }} : {{ $ranking_player->player_data->title }} : 
            @if ($ranking_char_id)
                {{ $ranking_player->score}}
            @else
                {{ $ranking_player->sum_score}}
            @endif
            <br>
            <br>
        @endforeach
    </div>

@include('footer')