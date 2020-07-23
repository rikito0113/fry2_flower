
@include('header')

{{-- ガール情報 --}}
@if (isset($scenario_info))
    <div style="color: white; background-color: gray; text-align:center;">場所:{{ $scenario_info->field }}</div>
    <div style="text-align:center;">
        <div class="girl-img" style="width: 40%">
            <img src="{{ asset('/images/character/'.$scenario_info->background_img.'.png') }}" alt="background" width="100%"><br>
            <div class="avatar">
                <img src="{{ asset('/images/character/'.$scenario_info->char_id.'.png') }}" alt="avatar" width="100%"><br>
            </div>
        </div><br>
        {{$scenario_info->place}}<br>
    </div>
@else
    <div style="text-align: center;">
        誰もいなかった.....
    </div>
@endif


@include('footer')
