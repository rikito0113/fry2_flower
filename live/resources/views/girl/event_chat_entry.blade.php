
@include('header')

{{-- Fieldがある時 --}}
@if ($field_list)
    @foreach ($field_list as $field)
        <div>
            <a href="/Gril/eventPlace/{{ $field }}">{{$field}}</a>
        </div><br>
    @endforeach
@endif

{{-- Placeがある時 --}}
@if ($place_list)
    @foreach ($place_list as $place)
        <div>
            <a href="/Gril/eventChat/{{ $place }}">{{ $place }}</a>
        </div><br>
    @endforeach
@endif


@include('footer')
