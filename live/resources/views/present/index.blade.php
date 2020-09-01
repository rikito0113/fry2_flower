@include('header')
{{-- body --}}
<div class="bg-gray-flower">
    <img src="{{ asset('/images/titlebar/obi_profile4.png') }}" alt="obi_profile4" width="100%"><br>
    <div style="text-align: center">
        <span class="bt_item" style="color: red" onclick="btItemClick()">
            アイテム
        </span>
        <span class="bt_memory" style="color: blue" onclick="btMemClick()">
            思ひ出
        </span>
    </div>

    <div class="wrapper_item" style="text-align: center">
        アイテムだよ
    </div>
    <div class="wrapper_memory" style="text-align: center">
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
</div>

<script>
    // 切り替え
    var btItem = document.getElementById("bt_item");
    var btMem  = document.getElementById("bt_memory");

    var wrapperItem = document.getElementById("wrapper_item");
    var wrapperMem  = document.getElementById("wrapper_memory");

    wrapperItem.style.display = "";
    wrapperMem.style.display = "none";

    function btItemClick() {
        wrapperItem.style.display = "";
        wrapperMem.style.display = "none";
    }
    function btMemClick() {
        wrapperItem.style.display = "none";
        wrapperMem.style.display = "";
    }
</script>

@include('footer')

