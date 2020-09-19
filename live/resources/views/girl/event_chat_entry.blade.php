
@include('header')

<div class="container-fluid bg-pink-flower" style="text-align:center;">

    {{-- Fieldがある時 --}}
    @if ($field_list)
        @foreach ($field_list as $key => $field)
            <div class="row">
                @if ($field == '華姫寮')
                    <div class="col-12">
                        <a href="/Girl/eventPlace/華姫寮">
                            <img class="img-fluid" src="{{ asset('/images/button/bt_place1.png') }}" alt="">
                        </a>
                    </div>
                @elseif ($field == '繁華街')
                    <div class="col-12">
                        <a href="/Girl/eventPlace/繁華街">
                            <img class="img-fluid" src="{{ asset('/images/button/bt_place2.png') }}" alt="">
                        </a>
                    </div>
                @elseif ($field == '学校')
                    <div class="col-12">
                        <a href="/Girl/eventPlace/学校">
                            <img class="img-fluid" src="{{ asset('/images/button/bt_place3.png') }}" alt="">
                        </a>
                    </div>
                @elseif ($field == '出身地')
                    <div class="col-12">
                        <a href="/Girl/eventPlace/出身地">
                            <img class="img-fluid" src="{{ asset('/images/button/bt_place4.png') }}" alt="">
                        </a>
                    </div>
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
