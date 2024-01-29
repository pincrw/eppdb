<div class="row">
  <div class="col-xs-12 col-md-12">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Pindai QRCode Peserta</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
          title="Collapse">
          <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Collapse">
          <i class="fa fa-refresh"></i></button>
        </div>
      </div>
      <!-- /.box-header -->
	    <div class="box-body">
      	<div class="col-xs-12 col-md-6">  	
          <div class="form-group">
            <label for="varchar">Pilih camera</label>
            <!-- ZXing -->
            <!-- <select type="text" class="select2 form-control" id="pilihKamera"></select> -->
            <select type="text" class="select2 form-control" name="options">
              <option value="1">1st Camera</option>
              <option value="2">2nd Camera</option>
            </select>
          </div> 
          <div class="form-group">
            <input type="hidden" class="form-control" name="no_pendaftaran" id="no_pendaftaran">              
          </div>                        
          <div class="form-group">
            <video class="form-control" id="previewKamera" style="width: 100%;height: 100%;"></video>
          </div>              	             
		    </div>
        <div class="col-xs-12 col-md-6">
          <div id="hasil"></div>                              
        </div>
      </div>    
		</div>
	</div>
</div>      

<!-- ZXing -->
<!-- <script type="text/javascript" src="https://unpkg.com/@zxing/library@latest"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> -->

<!-- Instascan -->
<script src="<?= base_url();?>assets/bower_components/instascan/instascan.min.js"></script>
 
<script type="text/javascript">
  // ZXing ----------------------------
  // let selectedDeviceId = null;
  // const codeReader = new ZXing.BrowserMultiFormatReader();
  // const sourceSelect = $("#pilihKamera");

  // $(document).on('change','#pilihKamera',function() {
  //   selectedDeviceId = $(this).val();
  //   if (codeReader) {
  //     codeReader.reset()
  //     initScanner()
  //   }
  // })

  // function initScanner() {
  //   codeReader
  //   .listVideoInputDevices()
  //   .then(videoInputDevices => {
  //     videoInputDevices.forEach(device =>
  //         console.log(`${device.label}, ${device.deviceId}`)
  //     );

  //     if (videoInputDevices.length > 0) {              
  //       if (selectedDeviceId == null) {
  //         if (videoInputDevices.length > 1) {
  //           selectedDeviceId = videoInputDevices[1].deviceId
  //         } else {
  //           selectedDeviceId = videoInputDevices[0].deviceId
  //         }
  //       }
            
  //       if (videoInputDevices.length >= 1) {
  //         sourceSelect.html('');
  //         videoInputDevices.forEach((element) => {
  //           const sourceOption = document.createElement('option')
  //           sourceOption.text = element.label
  //           sourceOption.value = element.deviceId
  //           if (element.deviceId == selectedDeviceId) {
  //               sourceOption.selected = 'selected';
  //           }
  //           sourceSelect.append(sourceOption)
  //         })   
  //       }

  //       codeReader
  //         .decodeOnceFromVideoDevice(selectedDeviceId, 'previewKamera')
  //         .then(result => {
  //           //hasil scan
  //           console.log(result.text)
  //           $("#no_pendaftaran").val(result.text);
  //           searchData();         
  //           if (codeReader) {
  //             codeReader.reset()
  //             initScanner()
  //           }
  //         })
  //         .catch(err => console.error(err));   
  //     } else {
  //         alert("Camera not found!")
  //     }
  //   })
  //   .catch(err => console.error(err));
  // }

  // if (navigator.mediaDevices) {
  //   initScanner()
  // } else {
  //   alert('Cannot access camera.');
  // }
  // ------------------------------

  // Instascan -----------
  let scanner = new Instascan.Scanner({video:document.getElementById('previewKamera')});
  scanner.addListener('scan', function(content){
    document.getElementById('no_pendaftaran').value=content;
    searchData();
  });

  Instascan.Camera.getCameras().then(function(cameras) {
    if (cameras.length > 0) {
      scanner.start(cameras[0]);

        //ini pakai vanilla js select
        if (document.querySelector('select[name="options"]')) {
          document.querySelector('select[name="options"]').addEventListener("change", function(event) {
            var item = event.target.value;
            //console.log(item);
            if (item == 1) {
              if (cameras[0] != "") {
                scanner.start(cameras[0]);
              } else {
                alert('No Front camera found!');
              }
            } else if (item == 2) {
              if (cameras[1] != "") {
                scanner.start(cameras[1]);
              } else {
                alert('No Back camera found!');
              }
            }
          });
        }        
    } else {
      console.error('No cameras found.');
      alert('No cameras found.');
    }
  }).catch(function(e) {
    console.error(e);
    alert(e);
  });
  // --------------------------

  function searchData() {
    var input = document.getElementById("no_pendaftaran").value;

  // Make an AJAX call to the server
    $.ajax({
      url: "<?php echo site_url('peserta/pindaiQRCode'); ?>",
      type: "post",
      data: { no_pendaftaran: input },
      // beforeSend:function(response) {
      //   $('#hasil').html("Sedang memproses data, silahkan tunggu...");
      // },
      success: function(response) {
      // Update the search results 
        if (response) { 
          $("#hasil").html(response);
          alertify.alert('Data ditemukan');
        } else {
          alertify.alert('Data tidak ditemukan');
        }  
        $(".ajs-header").html("Konfirmasi");
      }
    });  
  }  
</script>