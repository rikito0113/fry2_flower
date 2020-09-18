
@if ($owned_char_info->attitude == 'dere')
<div class="row girl-status-bg-dere">
@else
<div class="row girl-status-bg-tsun">
@endif
    <div class="col-6 col-sm-6 col-md-6" style="padding:0px;">
        <img src="{{ asset('/images/bg/bg_header_clock_dere.png') }}" alt="bg_header_clock_dere" class="fit-img100">
        <p class="girl-status-date">{{ $current_date }}</p>
    </div>
    {{-- ステータスへ --}}
    
    @if ($page == 'main_chat')
    <div class="col-2 col-sm-2 col-md-2 offset-2 offset-sm-2 offset-md-2" style="padding:7px;">
        <a href="/Girl/status/{{ $owned_char_info->owned_char_id }}"><img src="{{ asset('/images/icon/icon_item.png') }}" alt="bg_header_clock_dere" class="fit-img100"></a>
        <p class="girl-status-name">{{ $owned_char_info->char_name }}</p>
        <p class="girl-status-name-purple">{{ $owned_char_info->char_name }}</p>
    </div>
    <div class="col-2 col-sm-2 col-md-2" style="padding:7px;">
        <a href="/Girl/status/{{ $owned_char_info->owned_char_id }}"><img src="{{ asset('/images/icon/icon_yome.png') }}" alt="bg_header_clock_dere" class="fit-img100"></a>
    </div>
    @else
    <div class="col-2 col-sm-2 col-md-2 offset-4 offset-sm-4 offset-md-4" style="padding:7px;">
        <a href="/Girl/status/{{ $owned_char_info->owned_char_id }}"><img src="{{ asset('/images/icon/icon_status.png') }}" alt="bg_header_clock_dere" class="fit-img100"></a>
        <p class="girl-status-name">{{ $owned_char_info->char_name }}</p>
        <p class="girl-status-name-purple">{{ $owned_char_info->char_name }}</p>
    </div>
    @endif
</div>
