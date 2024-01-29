<!-- iCheck -->
<link rel="stylesheet" href="<?= base_url('assets/plugins/iCheck/square/purple.css'); ?>">
<!-- iCheck -->
<script src="<?= base_url();?>assets/plugins/iCheck/icheck.min.js"></script>
<!-- google map -->
<!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAGBTcfhO6SQkGjt-miMsqnC8USLT9CHCk&callback=initMap"></script>-->
<script src="https://maps.googleapis.com/maps/api/js?key=<?= $pengaturan->apikey ?>&callback=initMap"></script>
<!-- leaflet -->
<script src="<?= base_url();?>assets/bower_components/leaflet/leaflet.js"></script>

<!-- iCheck -->
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-purple',
      radioClass: 'icheckbox_square-purple',
      increaseArea: '20%' /* optional */
    });
  });
</script>

<!-- google maps -->
<!-- start map  -->
<script type="text/javascript">
// variabel global marker
var marker;
  
function taruhMarker(peta, posisiTitik){
    if( marker ){
      // pindahkan marker
      marker.setPosition(posisiTitik);
    } else {
      // buat marker baru
      marker = new google.maps.Marker({
        position: posisiTitik,
        map: peta
      });
    }  
    // isi nilai koordinat ke form
    document.getElementById("latitude").value = posisiTitik.lat();
    document.getElementById("longitude").value = posisiTitik.lng();
}

function initialize() {
  var propertiPeta = {
    center:new google.maps.LatLng(<?= $pengaturan->latitude ?>,<?= $pengaturan->longitude ?>),
    zoom:15,
    mapTypeId:google.maps.MapTypeId.<?= $pengaturan->maptype ?>
  };
  var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
  // even listner ketika peta diklik

  google.maps.event.addListener(peta, 'click', function(event) {
    taruhMarker(this, event.latLng);
  });
}

// event jendela di-load  
google.maps.event.addDomListener(window, 'load', initialize);

</script>
<!-- end google map -->

<!-- start leaflet map -->
<script type="text/javascript">
var map = L.map('map').setView([<?= $pengaturan->latitude ?>,<?= $pengaturan->longitude ?>], 14);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

// menampilkan marker + memasukkan koordinat ke form saat marker di drag
var marker = L.marker([<?= $pengaturan->latitude ?>,<?= $pengaturan->longitude ?>], {draggable: true})
    .addTo(map)
    .bindPopup("Drag marker ke lokasi sekolah untuk mengisi latitude dan longitude")
    .openPopup();

marker.on('dragend', function (e) {
    document.getElementById('latitude').value = marker.getLatLng().lat;
    document.getElementById('longitude').value = marker.getLatLng().lng;
});

// ----------------------------------------------------- 
</script>
<!-- end leaflet map -->