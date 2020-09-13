
<div class="row" style="background-image: url('../images/bg/bg_header_dere.png'); background-size: contain; vertical-align:top; margin:0px;">
    <div class="col-5 col-sm-5 col-md-5" style="padding:0px;">
        <img src="{{ asset('/images/bg/bg_header_clock_dere.png') }}" alt="bg_header_clock_dere" class="fit-img100">
    </div>
    <p class="girl-status-date">{{ $current_date }}</p>
    <p class="girl-status-name">{{ $owned_char_info->char_name }}</p>
    <p class="girl-status-name-purple">{{ $owned_char_info->char_name }}</p>
    {{-- ステータスへ --}}
    <a href="/Girl/status/{{ $owned_char_info->owned_char_id }}"><img src="{{ asset('/images/icon/icon_status.png') }}" alt="bg_header_clock_dere" class="col-2 offset-6"></a>
</div>
