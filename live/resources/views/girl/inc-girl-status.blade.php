
<div class="row" style="background-image: url('../images/bg/bg_header_dere.png'); background-size: contain; vertical-align:top; margin:0px;">
    <div class="col-6 col-sm-6 col-md-6" style="padding:0px;">
        <img src="{{ asset('/images/bg/bg_header_clock_dere.png') }}" alt="bg_header_clock_dere" class="fit-img100">
        <p class="girl-status-date">{{ $current_date }}</p>
    </div>
    {{-- ステータスへ --}}
    <div class="col-2 col-sm-2 col-md-2 offset-4 offset-sm-4 offset-md-4" style="padding:7px;">
        <a href="/Girl/status/{{ $owned_char_info->owned_char_id }}"><img src="{{ asset('/images/icon/icon_status.png') }}" alt="bg_header_clock_dere" class="fit-img100"></a>
        <p class="girl-status-name">{{ $owned_char_info->char_name }}</p>
        <p class="girl-status-name-purple">{{ $owned_char_info->char_name }}</p>
    </div>
</div>
