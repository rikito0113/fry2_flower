@include('header')

    {{-- body --}}
    <div style="text-align:center;">

        {{ $term->term_name }}<br>

        <br>

        {{ $owned_girl_info->char_name }} : {{ $owned_girl_info->subject_name }} : {{ $owned_girl_info->score }}点 

    </div>

@include('footer')