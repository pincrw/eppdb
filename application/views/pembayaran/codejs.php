<script src="<?= base_url('assets/bower_components/select2/dist/js/select2.full.min.js'); ?>"></script>
<script src="<?= base_url('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'); ?>"></script>
<script src="<?= base_url('assets/bower_components/bootstrap-daterangepicker/daterangepicker.js'); ?>"></script>

<!-- iCheck -->
<link rel="stylesheet" href="<?= base_url('assets/plugins/iCheck/square/purple.css'); ?>">
<!-- iCheck -->
<script src="<?= base_url();?>assets/plugins/iCheck/icheck.min.js"></script>

<script type="text/javascript">
// iCheck    
    $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-purple',
          radioClass: 'icheckbox_square-purple',
          increaseArea: '20%' /* optional */
        });
    });
//select2
    $('.select2').select2();
//Date picker
    $('#tanggal_bayar').datepicker({
        autoclose: true,
        dateFormat: "dd-mm-yy",
        changeYear: true,
        defaultViewDate: new Date(<?php echo date('Y'); ?>, <?php echo date('m'); ?>, 1)
    })
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
        {
            return {
                    "iStart": oSettings._iDisplayStart,
                    "iEnd": oSettings.fnDisplayEnd(),
                    "iLength": oSettings._iDisplayLength,
                    "iTotal": oSettings.fnRecordsTotal(),
                    "iFilteredTotal": oSettings.fnRecordsDisplay(),
                    "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                    "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                    };
        };

    var t = $("#mytable").DataTable({
                    initComplete: function() {
                        var api = this.api();
                        $('#mytable_filter input')
                                .off('.DT')
                                .on('keyup.DT', function(e) {
                                    if (e.keyCode != 13) {
                                        api.search(this.value).draw();
                            }
                        });
                    },
                    oLanguage: {
                        sProcessing: "loading..."
                    },
                    scrollCollapse : true,
                    processing: true,
                    serverSide: true,
                    ajax: {"url": "pembayaran/json", "type": "POST"},
                    columns: [
                         {
                            "data": "id_pembayaran",
                            "orderable": false,
                            "className" : "text-center"
                        },
                        {
                            "data": "id_pembayaran",
                            "orderable": false
                        },{"data": "no_transaksi"},
                            {"data": "full_name"},
                            {"data": "pembayaran"},
                            {"data": "jumlah_bayar",render: $.fn.dataTable.render.number('.', ',', '2','Rp. ')},
                            {"data": "tanggal_bayar"},
                            {"data": "petugas"},
                            {"data": "jenis_bayar"},
                            {"data": "status_bayar"},
                        {
                            "data" : "action",
                            "orderable": false,
                            "className" : "text-center"
                        }
                    ],
                    columnDefs: [
                        {
                            className: "text-center",
                            targets: 0,
                            checkboxes: {
                                selectRow: true,
                            }
                        }

                    ],
                    select:{
                        style: 'multi'
                    },
                    order: [[1, 'desc']],
                    rowCallback: function(row, data, iDisplayIndex) {
                        var info = this.fnPagingInfo();
                        var page = info.iPage;
                        var length = info.iLength;
                        var index = page * length + (iDisplayIndex + 1);
                        $('td:eq(1)', row).html(index);

                        var stt = data.status_bayar;
                        if (stt=="Sudah bayar"){
                            $('td:eq(9)', row).html('<span class="label label-success">Sudah bayar</span>');
                        } else if (stt=="Pending"){
                            $('td:eq(9)', row).html('<span class="label label-warning">Pending</span>');
                        }                         
                    }
                });
                $('#myform').keypress(function(e){
                    if ( e.which == 13 ) return false;

                });
                 $("#myform").on('submit', function(e){
                    var form = this
                    var rowsel = t.column(0).checkboxes.selected();
                    $.each(rowsel, function(index, rowId){
                        $(form).append(
                            $('<input>').attr('type','hidden').attr('name','id[]').val(rowId)
                        )
                    });

                    if(rowsel.join(",") == ""){
                        alertify.alert('', 'Tidak ada data terpilih!', function(){ });

                    }else{
                        var prompt =  alertify.confirm('Apakah anda yakin akan menghapus data tersebut?', 'Apakah anda yakin akan menghapus data tersebut?').set('labels', {ok:'Yakin', cancel:'Batal'}).set('onok',function(closeEvent){
                            $.ajax({
                                url: "pembayaran/deletebulk",
                                type: "post",
                                data: "msg = "+rowsel.join(",") ,
                                success: function (response) {
                                    if(response == true){
                                        location.reload();
                                    }
                                },
                                error: function(jqXHR, textStatus, errorThrown) {
                                   console.log(textStatus, errorThrown);
                                }
                            });

                        });
                    }
                    $(".ajs-header").html("Konfirmasi");
                });
            });
            function confirmdelete(linkdelete) {
              alertify.confirm("Apakah anda yakin akan  menghapus data tersebut?", function() {
                location.href = linkdelete;
              }, function() {
                alertify.error("Penghapusan data dibatalkan.");
              });
              $(".ajs-header").html("Konfirmasi");
              return false;
            }
</script>