@include('header')

    {{-- body --}}
    <div style="text-align:center;">

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
            <input type="hidden" name="owned_char_id" value="{{$char->owned_char_id}}">
            <input type="submit" value="確定">
        </form>

        

    </div>

@include('footer')