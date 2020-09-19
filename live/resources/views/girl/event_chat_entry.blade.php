
@include('header')

<div class="container-fluid" style="padding:0px 0px; text-align:center;">

    {{-- Fieldがある時 --}}
    @if ($field_list)
        @foreach ($field_list as $key => $field)
            <div class="row">
                @if ($field == '華姫寮')
                    <a href="/Girl/eventPlace/華姫寮">
                        <img src="{{ asset('/images/button/bt_place1.png') }}" alt="">
                    </a>
                @elseif ($field == '繁華街')
                    <a href="/Girl/eventPlace/繁華街">
                        <img src="{{ asset('/images/button/bt_place2.png') }}" alt="">
                    </a>
                @elseif ($field == '学校')
                    <a href="/Girl/eventPlace/学校">
                        <img src="{{ asset('/images/button/bt_place3.png') }}" alt="">
                    </a>
                @elseif ($field == '出身地')
                    <a href="/Girl/eventPlace/出身地">
                        <img src="{{ asset('/images/button/bt_place4.png') }}" alt="">
                    </a>
                @endif
            </div><br>
        @endforeach
    @endif

    {{-- Placeがある時 --}}
    @if ($place_list)
        @foreach ($place_list as $place)
            <div class="row">
                <a href="/Girl/eventChat/{{ $place }}">{{ $place }}</a>
            </div><br>
        @endforeach
    @endif

</div>

@include('footer')
