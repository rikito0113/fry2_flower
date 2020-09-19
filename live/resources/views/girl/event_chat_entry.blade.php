
@include('header')

<div class="container-fluid bg-pink-flower" style="text-align:center;">

    {{-- Fieldがある時 --}}
    @if ($field_scenario)
        @foreach ($field_scenario as $key => $scenario)
            <br>
            <div class="row">
                <div class="col-12">
                    <a href="/Girl/eventPlace/{{ $scenario->field }}">
                        <img class="img-fluid" src="{{ asset('/images/button/bt_place'. $scenario->field .'.png') }}" alt="">
                    </a>
                </div>
            </div>
        @endforeach
    @endif

    {{-- Placeがある時 --}}
    @if ($place_scenario)
        @foreach ($place_scenario as $scenario)
            <br>
            <div class="row">
                <div class="col-12">
                    <a href="/Girl/eventChat/{{ $scenario->place }}">
                        <img class="img-fluid" src="{{ asset('/images/button/place/bt_bg'. $field .'_place'. $scenario->place .'.png') }}" alt="">
                    </a>
                </div>
            </div><br>
        @endforeach
    @endif

    <br>
</div>

@include('footer')
