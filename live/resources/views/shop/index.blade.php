@include('header')

<div class="bg-gray-flower">
    <img src="{{ asset('/images/titlebar/obi_profile5.png') }}" alt="obi_profile5" width="100%"><br>
    <img src="{{ asset('/images/bg/bg_point_top.jpg') }}" alt="bg_point_top" width="100%"><br>
    <img src="{{ asset('/images/titlebar/obi_cap12.png') }}" alt="obi_cap12" width="100%"><br>
    <img src="{{ asset('/images/banner/bn_gacha001.png') }}" alt="bn_gacha001" width="100%"><br>
    <img src="{{ asset('/images/titlebar/obi_cap13.png') }}" alt="obi_cap13" width="100%"><br>
    <form action="/Shop/buyItem" method="POST" style="text-align: center;">
        @csrf
        <input type="hidden" name="item_id" value="1">
        <button type="submit" onclick="submit();">メッセージポイント購入ボタン</button>
    </form>
</div>





@include('footer')
