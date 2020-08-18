@include('header')

    {{-- body --}}
    <div style="text-align:center;">

        {{ $term->term_name }}<br>

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