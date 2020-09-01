@include('header')
{{-- body --}}
<div class="bg-gray-flower">
    <img src="{{ asset('/images/titlebar/obi_profile4.png') }}" alt="obi_profile4" width="100%"><br>
    @foreach ($owned_main_memory_Lv as $item)
        <div>
            {{ $item->memory_id }}
        </div>
    @endforeach
</div>


@include('footer')

