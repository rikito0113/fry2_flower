@include('header')
{{-- body --}}
<div class="bg-gray-flower">
    <img src="{{ asset('/images/titlebar/obi_profile4.png') }}" alt="obi_profile4" width="100%"><br>
    @foreach ($owned_main_memory_Lv as $item)
        <table width="100%">
            <tr>
                <td width="70%" style="text-align: center">
                    {{ $item->memory_name }}
                </td>
                <td width="30%" style="text-align: center">
                    <a href="/Present/recieveMemory/{{ $item->memory_id }}">
                        <img src="{{ asset('/images/button/bt_get.png') }}" alt="受け取る" width="60%">
                    </a>
                </td>
            </tr>
        </table>
        <div>
            {{ $item->memory_name }}
        </div>
    @endforeach
</div>


@include('footer')

