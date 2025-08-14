<?php 
require "protected.php";
?>

<html>  
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />    
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <link rel="icon" href="dk.png">
    <title>Laporan SPJ CV. Danan Jaya Cipta Persada</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css" >
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css'>
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
</head>  
<body>
  <nav class="navbar navbar-dark bg-primary">
    <a class="navbar-brand text-white" href="">
      CV. Danan Jaya Cipta Persada
    </a>
  </nav>

  <h2 align="center" style="margin: 20px;">Buat Laporan</h2>

  <div class="container">
    <div class="row">
      <div class="col-sm-4 mb-4">
        <div class="card">
          <div class="card-header bg-info text-white">
            Data Pelanggan
          </div>
          <form>
          <div class="card-body">
            <input type="text" name="idlap" id="idlap" class="form-control npsn" placeholder="00000000" readonly>
            <label></label>
            <input type="text" name="npsn" id="npsn" class="form-control npsn" placeholder="00000000" readonly>
            <label></label>
            <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Lembaga" readonly>
            <label></label>
            <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat Lembaga" readonly>
            <label></label>
            <input type="text" name="kec" id="kec" class="form-control" placeholder="Kecamatan" readonly>
            <label></label>
            <input type="text" name="kab" id="kab" class="form-control" placeholder="Kabupaten" readonly>
            <label></label>
            <input type="text" name="prop" id="prop" class="form-control" placeholder="Propinsi" readonly>
            <label></label>
            <input type="text" name="pos" id="pos" class="form-control pos" placeholder="00000" readonly>
            <label></label>
            <input type="text" name="pic" id="pic" class="form-control" placeholder="Nama User" readonly>
            <label></label>
            <input type="text" name="jabatan" id="jabatan" class="form-control" placeholder="Jabatan" readonly>
            <label></label>
            <input type="text" name="nip" id="nip" class="form-control nip" placeholder="NIP" readonly>
            <label></label>
            <input type="text" name="tlp" id="tlp" class="form-control tlp" placeholder="08XXXXXXXXXX" readonly>
            <label></label>
            <input type="text" name="bend" id="bend" class="form-control" placeholder="Nama Bendahara" readonly>
            <label></label>
            <input type="text" name="nip_bend" id="nip_bend" class="form-control nip" placeholder="NIP" readonly>

            <hr>
            <button type="button" class="btn btn-primary datapelanggan" data-href="datapelanggan.php" data-toggle="modal" data-target="#exampleModalCenter">
              Pilih Data Pelanggan
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog" role="document" style="max-width: fit-content;">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">OK!</button>
                  </div>
                </div>
              </div>
            </div>



          </div>

        </div>
      </div>
      <div class="col-sm-8 mb-4">
        <div class="card">
          <div class="card-header bg-info text-white">
            Form Pesanan
          </div>
          <div class="card-body">
            
            <label>Tanggal PO</label>
            <input type="text" name="tgl_po" id="tgl_po" class="form-control date" placeholder="00/00/0000">
            <label>Tanggal SPK</label>
            <input type="text" name="tgl_spk" id="tgl_spk" class="form-control date" placeholder="00/00/0000">
            <label>Tanggal BAST</label>
            <input type="text" name="tgl_bast" id="tgl_bast" class="form-control date" placeholder="00/00/0000">
            <label>Tanggal Lunas DiBayar</label>
            <input type="text" name="tgl_kwi" id="tgl_kwi" class="form-control date" placeholder="00/00/0000">
            <label>Untuk Transaksi</label>
            <input type="text" name="tran" id="tran" class="form-control" placeholder="Transaksi Jual Beli">
            
            <label>Penanggung Jawab</label>
            <select class="form-select form-control" id="pj" name="pj" onchange="pilihpj()">
              <option selected value="">Pilih Penanggung Jawab LPJ</option>
              <option value="Direktur">Direktur</option>
              <option value="Komisaris">Komisaris</option>
            </select>
            <label>Nama Penanggung Jawab</label>
            <input type="text" name="nama_pj" id="nama_pj" class="form-control date" readonly>
            
            <div class="row">
              <div class="col-lg-6">
                  <label>PPN</label>
                <div class="input-group">
                  <span class="input-group-addon">
                    <input type="checkbox" id="c_ppn" name="c_ppn">
                  </span>
                  <input type="text" class="form-control money" id="ppn" name="ppn" placeholder="0" disabled>
                </div><!-- /input-group -->
              </div><!-- /.col-lg-6 -->
              
              <div class="col-lg-6">
                <label>PPh</label>
                <div class="input-group">
                  <span class="input-group-addon">
                    <input type="checkbox" id="c_pph" nama="c_pph">
                  </span>
                  <input type="text" class="form-control money" id="pph" name="pph" placeholder="0" disabled>
                </div><!-- /input-group -->
              </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->

            <hr>

              <label>Download template table pesanan <a href="contoh.xlsx">contoh.xlsx</a></label>

            <div class="input-group mb-3">
            <div class="custom-file" style="width: 100%;">
              <input type="file" id="input" name="file" placeholder="Pilih File" />
            </div>
          </div>

          <div id="rs-table"></div>

          <script>
                  var input = document.getElementById('input')

                  input.addEventListener('change', function() {
                    readXlsxFile(input.files[0]).then(function(data) {

                      var jumlah = 0;
                      for(i=1;i<data.length;i++){
                        jumlah = jumlah + data[i][5];
                      }

                    document.getElementById('rs-table').innerHTML =
                      '<table id="result-table">' +
                      '<tbody>' +
                      data.map(function (row) {
                        return '<tr>' + row.map(function (dcell) {
                            return '<td>' + ( dcell === null ? '' : (isNaN(dcell) ? dcell : (Math.round(dcell * 100) / 100).toLocaleString() ) ) + '</td>'
                          }).join('') + '</tr>' }).join('') + '</tbody>' + '</table>' +
                      
                      '<label style="color: black; text-align: right; width: 100%; margin-top:10px;">Total : Rp. '+ Math.round((jumlah * 100) / 100).toLocaleString() +'</label>'

                      function arrayToJSONObject (arr){
                        //header
                        var keys = arr[0];

                        //vacate keys from main array
                        var newArr = arr.slice(1, arr.length);

                        var formatted = [],
                        data = newArr,
                        cols = keys,
                        l = cols.length;
                        for (var i=0; i<data.length; i++) {
                            var d = data[i],
                                o = {};
                            for (var j=0; j<l; j++)
                                o[cols[j]] = d[j];
                            formatted.push(o);
                        }
                        return formatted;
                      }
                      
                      dataTable.data = arrayToJSONObject (data);

                    }, function (error) {
                    console.log(error);
                    })
                  })
                </script>

            <button type="button" class="btn btn-primary buat" data-loading-text="<i class='fa fa-circle-o-notch fa-spin '></i> Processing ...">Buat Laporan</button>
            <button type="button" class="btn btn-secondary batal">Batal</button>

          </div>
          </form>
          
        </div>
      </div>
    

          </div>
        </div>
      </div>
    </div>
  </div>
<br>
  <div class="text-center">© <?php echo date('Y'); ?> Copyright:
      <a href="https://bismaindonesia.com/"> Bisma Indonesai</a>
  </div>

  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.mask.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="./js/read-excel-file.min.js"></script>
  <script src="./js/formToJson.min.js"></script>
  
  <script type="text/javascript">
    var dataTable = {};
    $(document).ready(function(){
    $.ajaxSetup({ cache: false });
      $("#idlap").val(Math.round((new Date()).getTime() / 100));
      $('.date').mask('00/00/0000');
      $('.money').mask('000.000.000', {reverse: true});
      
      $('#c_ppn').change(function() {
          if ($(this).is(':checked')) {
              $( "#ppn" ).prop( "disabled", false );
          } else {
              $('#ppn').val('');
              $( "#ppn" ).prop( "disabled", true );
          }
        });
        
        $('#c_pph').change(function() {
          if ($(this).is(':checked')) {
              console.log("ppn check");
              $( "#pph" ).prop( "disabled", false );
          } else {
              console.log("ppn check");
              $('#pph').val('');
              $( "#pph" ).prop( "disabled", true );
          }
        });

      $('.datapelanggan').on('click',function(){
                  var dataURL = $(this).attr('data-href');
                  $('.modal-body').load(dataURL,function(){
                      $('#myModal').modal({show:true});
                  });
              }); 

      $("#exampleModalCenter").on('hide.bs.modal', function(){
        $.getJSON( "data/pelanggan/"+pilihan()+".json", function( data ) {

          var items = [];
          
          $.each( data, function( key, value ) {

            $("#"+key).val(""+value);

          
          });
         

        });
      });

      $(".buat").click(function(){
         if(validasi()){
            var $this = $(this);
            $this.button('loading');
    
            var dform = $("form").formToJson();
            var order = dataTable.data;
            var dataPost = {...dform, order};
    
            $.ajax({
                   url: 'data/dananreport/create.php',
                   type: 'post',
                   data: {data:dataPost},
                   complete:function(data){
                       
                      setTimeout(function() {
                        var resp = JSON.parse(data.responseText);
                       $("#idlap").val(Math.round((new Date()).getTime() / 100));
                       $('#rs-table').empty();
                       $('#input').val('');
                       $('#tgl_po').val('');
                       $('#tgl_spk').val('');
                       $('#tgl_bast').val('');
                       $('#tgl_kwi').val('');
                       $('#tran').val('');
                       $('#ppn').val('');
                       $('#pph').val('');
                       $('#ppn').prop( "disabled", true );
                       $('#pph').prop( "disabled", true );
                       $('#c_ppn').prop("checked", false);
                       $('#c_pph').prop("checked", false);
                       dataTable.data = [];
                      $this.button('reset');
                      OpenWindow(resp["idlap"]);
                      console.log(resp);
                      }, 500);
    
                   },
    
                   error:function(response) {
                       alert(response);
                       $this.button('reset');
                    }
              });
              
         }

      });

    });

    function pilihan() {
      var idpel = document.getElementById("pelanggan").value;
      return idpel;
    }
    
    function pilihpj(){
      var pilipj = document.getElementById("pj").value;
      if (pilipj==='Direktur') {
        $("#nama_pj").val("YUSRIZAL MAULANA AKBAR");
      } else if (pilipj==='Komisaris') {
        $("#nama_pj").val("FACETORIS SOFIA AYU");
      } else {
        $("#nama_pj").val("");
      }

    }

    function OpenWindow(id) { 
      //window.open('data/laporan/cetak.php?id='+id,'_blank').focus();
      let timerInterval
    Swal.fire({
      title: 'Loading ...!',
      html: '',
      timer: 2000,
      timerProgressBar: true,
      showCloseButton: false,
      showConfirmButton: false,
      showCancelButton: false,
      focusConfirm: false,
      allowOutsideClick: false,
      allowEscapeKey:false,
      allowEnterKey:false,
      didOpen: () => {
        Swal.showLoading()
        const b = Swal.getHtmlContainer().querySelector('b')
        timerInterval = setInterval(() => {
        }, 100)
      },
      willClose: () => {
        clearInterval(timerInterval)
      }
    }).then((result) => {
      /* Read more about handling dismissals below */
      if (result.dismiss === Swal.DismissReason.timer) {
        Swal.fire({
          title: 'Cetak Laporan',
          html:'<a href="data/dananreport/print.php?spj=kwi&id=' + id + '"  target="_blank"><button style="margin: 2px; width: 70%;"><b style="font-size: 17px;">Kwitansi</b></button></a><br>' +
                  '<a href="data/dananreport/print.php?spj=po&id=' + id + '"  target="_blank"><button style="margin: 2px; width: 70%;"><b style="font-size: 17px;">Purchase Order</b></button></a><br> ' +
                  '<a href="data/dananreport/print.php?spj=inv&id=' + id + '"  target="_blank"><button style="margin: 2px; width: 70%;"><b style="font-size: 17px;"> Invoice</button></b></a><br>' +
                  '<a href="data/dananreport/print.php?spj=spk&id=' + id + '"  target="_blank"><button style="margin: 2px; width: 70%;"><b style="font-size: 17px;"> SPK</button></b></a><br>' +
                  '<a href="data/dananreport/print.php?spj=bast&id=' + id + '"  target="_blank"><button style="margin: 2px; width: 70%;"><b style="font-size: 17px;"> BAST</button></b></a><br>'+
                  '',
          showCloseButton: true,
          showConfirmButton: false,
          showCancelButton: false,
          focusConfirm: false,
          allowOutsideClick: false,
          allowEscapeKey:false,
          allowEnterKey:false
        })
      }
    })
 };
 
  function validasi() {
		var npsn = document.getElementById("npsn").value;
		var nama_pj = document.getElementById("nama_pj").value;
		var input = document.getElementById('input').value;
		
		if (npsn != "") {
		    if (nama_pj != "") {
		        if (input != "") {
		            
			        return true;
			        
            		}else{
            			alert('File pesanan belum di isi !');
            		}
        		}else{
        			alert('Penanggung Jawab Belum di pilih !');
        		}
		}else{
			alert('Pilih data pelanggan dulu besti !');
		}
	}

</script>

</body>  
</html>  