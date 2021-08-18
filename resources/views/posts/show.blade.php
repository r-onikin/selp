@extends('layouts.app')

@section('content')

<!--前のトップページへ戻る-->
<div class="d-flex flex-row">
    <a href="javascript:history.back();">
       <i class="fas fa-arrow-left mr-2" style="color:blue; font-size:25px;"></i> 
    </a>

        
    <div class="justify-content-center mb-3">
        <h2>投稿位置情報</h2>
    </div>
</div>

<div id="map" style="width: 480px; height: 450px; border: solid 2px #6091d3; border-radius: 5px; class="mt-4"></div>

<script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDqsqITQBn8W4RsSv3irNZ04saBDOjN87A&callback=initMap"></script>
<script>
    function initMap() {
        // 地図の描画
        const myLatLng = { lat: {{ $post['lat'] }}, lng: {{ $post['lng'] }} };
        const map = new google.maps.Map(document.getElementById('map'), {
            center: myLatLng,
            zoom: 16
        });
        // マーカーの追加
        new google.maps.Marker({
            position: myLatLng,
            map,
            title: "Hello World!",
        });
    };
    
</script>
@endsection
