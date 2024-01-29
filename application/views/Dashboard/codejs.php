<!-- chart -->
<script src="<?= base_url();?>assets/bower_components/chart.js/Chart.js"></script>
<!-- leaflet -->
<script src="<?= base_url();?>assets/bower_components/leaflet/leaflet.js"></script>

<script type="text/javascript">
$('#myModalDev').modal('show');
$('#myModalCatatan').modal('show'); 
$('#myModalStatushasil').modal('show');     
$('#myModalDUlang').modal('show'); 

// start leaflet map ------------------------------
var map = L.map('map').setView([<?= $pengaturan->latitude ?>,<?= $pengaturan->longitude ?>], 14);
var base_url="<?=base_url()?>";

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

// menampilkan marker sekolah
L.marker([<?= $pengaturan->latitude ?>,<?= $pengaturan->longitude ?>]).addTo(map)
    .bindPopup('<?= $pengaturan->nama_sekolah ?><br> NPSN <?= $pengaturan->npsn ?>')
    .openPopup();

// menampilkan marker peserta --------------------------
var pesertaMarker;

$.getJSON(base_url+"dashboard/peserta_json", function(data){
    $.each(data, function(i, field){

    var lat=parseFloat(data[i].latitude);
    var long=parseFloat(data[i].longitude);
    var icon_peserta = L.icon({
        iconUrl: base_url+'assets/icon/person.png',
        iconSize: [30,30]
    })

/* Menghitung jarak antar 2 koordinat dengan satuan km - untuk satuan km dibagi 1000
      Untuk satuan meter tidak perlu dibagi 1000 */
    var lokasisekolah = [<?= $pengaturan->latitude ?>,<?= $pengaturan->longitude ?>];  
    var jarak = (L.latLng([lat,long]).distanceTo(lokasisekolah)).toFixed(2);

    pesertaMarker = L.marker([lat,long],{icon:icon_peserta}).addTo(map)
        .bindPopup(data[i].nama_peserta+"<br>No. "+data[i].no_pendaftaran+"<br>Jarak "+data[i].jarak+"<br>Jarak sistem "+jarak+" meter");  

    // Membuat garis antara koordinat lokasi peserta dengan sekolah
    // var line = [[lat,long],lokasisekolah];
    // var polyline = L.polyline(line, {
    //     color: 'purple',
    //     weight: 3,
    //     opacity: 0.7,
    //     });
    // polyline.addTo(map);

    }); 
});

// circle radius ---------------------------------------
var circle = L.circle([<?= $pengaturan->latitude ?>,<?= $pengaturan->longitude ?>], {
    color: 'red',
    fillColor: '#f03',
    fillOpacity: 0.5,
    radius: <?= $pengaturan->radius ?>
}).addTo(map); 

// menampilkan koordinat saat map di klik -------------
var popup = L.popup();

function onMapClick(e) {
    popup
        .setLatLng(e.latlng)
        .setContent("Koordinat " + e.latlng.toString())
        .openOn(map);
}

map.on('click', onMapClick);
// end leaflet map ------------------------------         
</script>     

<!-- iCheck -->
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-purple',
      radioClass: 'icheckbox_flat-green',
      increaseArea: '20%' /* optional */
    });
  });
</script>