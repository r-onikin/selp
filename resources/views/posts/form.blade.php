
{!! Form::open(['route' => 'posts.store', 'files' => true]) !!}
    <input type="hidden" name="lat">
    <input type="hidden" name="lng">
    <div class="form-group">
        {!! Form::textarea('content', null, ['placeholder' => 'What are you doing?', 'class' => 'form-control', 'rows' => '2']) !!}

        <!-- アップロードフォームの作成 -->
        <input type="file" name="image">
        
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-link" data-toggle="modal" data-target="#exampleModalCenter">
          追加<i class="fas fa-map-marker-alt"></i>
        </button>
        
        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">位置情報</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
               <!-- ...-->
               <!--  ここは実際のビューの表示部分 -->
               <!--地図の表示部分 -->
              <div id="map" style="width:auto;height:250px;"></div>
              

              <script>
                  let map;
                  function initMap() {
                      // ブラウザがgeolocationに対応しているか
                      if (!navigator.geolocation) {
                          // していなかったら終了
                          return;
                      }
                      // 現在地の取得（許可するかダイアログが出ます）
                      navigator.geolocation.getCurrentPosition(function(position) {
                          // 現在地が取得出来たら、GoogleMap形式に変換
                          const mapLatLng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                          // 現在地を中心に地図の描画
                          map = new google.maps.Map(document.getElementById('map'), {
                              center: mapLatLng,
                              zoom: 16
                          });
                          // マーカー
                          const marker = new google.maps.Marker({
                              position: mapLatLng,
                              map
                          });
              
                          // 中心地点が移動したときに実行される
                          google.maps.event.addListener(map, 'center_changed', function(){
                              // 中心地点の取得
                              var location = map.getCenter();
                              // マーカーの移動
                              marker.setPosition(location);
                              // 中心地点をinputにセット
                              console.log(location.lat());
                              document.querySelector('[name="lat"]').value = location.lat();
                              document.querySelector('[name="lng"]').value = location.lng();
                          });
                      });
                  };
                function closeLocation(){
                <!--console.log('a');-->
                    document.querySelector('[name="lat"]').value = null;
                    document.querySelector('[name="lng"]').value = null;
                }
              </script>
              
              <!--ここをビューの最後の方に入れる（YOUR_API_KEYをご自身のAPIキーと置き換える） -->
              <script async
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDqsqITQBn8W4RsSv3irNZ04saBDOjN87A&callback=initMap">
              </script>

              
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeLocation()">Close</button>
                <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#exampleModalCenter">Save</button>
              </div>
            </div>
          </div>
        </div>
        
        <div style="float: right;">
        {!! Form::submit('Post', ['class' => 'btn btn-primary']) !!}
        </div>
        
        
    </div>
{!! Form::close() !!}


<!-- ここは実際のビューの表示部分 -->
<!-- 地図の表示部分 -->
<!--<div id="map" style="width:500px;height:250px;"></div>-->

 <!-- ここをビューの最後の方に入れる（YOUR_API_KEYをご自身のAPIキーと置き換える） -->
<!--<script async-->
<!--    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDqsqITQBn8W4RsSv3irNZ04saBDOjN87A&callback=initMap">-->
<!--</script>-->
<!--<script>-->
<!--    let map;-->
<!--    function initMap() {-->
<!--        // ブラウザがgeolocationに対応しているか-->
<!--        if (!navigator.geolocation) {-->
<!--            // していなかったら終了-->
<!--            return;-->
<!--        }-->
<!--        // 現在地の取得（許可するかダイアログが出ます）-->
<!--        navigator.geolocation.getCurrentPosition(function(position) {-->
<!--            // 現在地が取得出来たら、GoogleMap形式に変換-->
<!--            const mapLatLng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);-->
<!--            // 現在地を中心に地図の描画-->
<!--            map = new google.maps.Map(document.getElementById('map'), {-->
<!--                center: mapLatLng,-->
<!--                zoom: 16-->
<!--            });-->
<!--            // マーカー-->
<!--            const marker = new google.maps.Marker({-->
<!--                position: mapLatLng,-->
<!--                map-->
<!--            });-->

<!--            // 中心地点が移動したときに実行される-->
<!--            google.maps.event.addListener(map, 'center_changed', function(){-->
<!--                // 中心地点の取得-->
<!--                var location = map.getCenter();-->
<!--                // マーカーの移動-->
<!--                marker.setPosition(location);-->
<!--                // 中心地点をinputにセット-->
<!--                document.querySelector('[name="lat"]').value = location.lat();-->
<!--                document.querySelector('[name="lng"]').value = location.lng();-->
<!--            });-->
<!--        });-->
<!--    };-->
<!--</script>-->

    