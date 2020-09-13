
<div class="row" style="background-image: url('../images/bg/bg_header_' . $owned_char_info->attitude . 'png'); background-size: contain; vertical-align:top;">
    <img src="{{ asset('/images/bg/bg_header_clock_dere.png') }}" alt="bg_header_clock_dere" class="col-4;">
    <p class="girl-status-date">{{ $current_date }}</p>
    <p class="girl-status-name">{{ $owned_char_info->char_name }}</p>
    <p class="girl-status-name-purple">{{ $owned_char_info->char_name }}</p>
    {{-- ステータスへ --}}
    <a href="/Girl/status/{{ $owned_char_info->owned_char_id }}"><img src="{{ asset('/images/icon/icon_status.png') }}" alt="bg_header_clock_dere" class="col-2 offset-6"></a>
</div>
