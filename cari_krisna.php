<?php 
require "protected.php";
?>

<?php 
header("Content-Type: text/html");
?>

<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />    
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <link rel="icon" href="dk.png">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Laporan CV. KRISNA WIBAYA INDONESIA</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        /* visited link */
        a:visited {
          color: green;
        }
        
        /* mouse over link */
        a:hover {
          color: blue;
        }
        a {
          color: red;
        }
        
</style>
</head>  
<body>
  <nav class="navbar navbar-dark bg-primary">
    <a class="navbar-brand text-white" href="">
      CV. KRISNA WIBAYA INDONESIA
    </a>
  </nav>

   <hr>

  <div class="container">
    <div class="row">
      <div class="col-sm-4 mb-4">
        <div class="card">
          <div class="card-header bg-info text-white">
            Form Pencarian Laporan
          </div>
          <div class="card-body" style="padding: 10px;">

            <div class="card-body">
            <label>Pencarian Laporan</label>

            <form id="f1" name="f1" action="javascript:void()" onSubmit="if(this.t1.value!=null && this.t1.value!='')
            parent.findString(this.t1.value);return false;"
            >
            <input type="text" id="t1" name="t1" size=20 class="form-control cari" placeholder="Cari Laporan">
            <hr>

            <input type="submit" name=b1 value="Cari" class="btn btn-primary simpan">
            <button type="button" class="btn btn-secondary batal" onclick="history.back()">Batal</button>
            </form>

          </div>

          </div>
        </div>
      </div>
      
      <div class="col-sm-8 mb-4">
        <div class="card">
          <div class="card-header bg-info text-white">
            Data Transaksi
          </div>
          <div class="card-body">
            <div class="table-responsive table-wrapper-scroll-y my-custom-scrollbar">          
  <table class="table" id="data_table">
    <thead>
      <tr>
        <th style="font-size: small;">Id Laporan</th>
        <th style="font-size: small;">Nama Sekolah</th>
        <th style="font-size: small;">Tanggal</th>
        <th style="font-size: small;">Total</th>
        <th style="font-size: small;">Hapus</th>
      </tr>
    </thead>
    <tbody>

    <?php

      $dir = "data/krisnareport/";

      chdir($dir);

      array_multisort(array_map('filemtime', ($files = glob("*.{json}", GLOB_BRACE))), SORT_DESC, $files);

      $i = 1;

      foreach($files as $filename)
      {

        $jsonFile = file_get_contents($filename);

        $array = json_decode($jsonFile, true);

        $datatable = $array['order'];
        
         $jumlah = 0;
        
        for ($i=0; $i < count($datatable); $i++) {
            
            $jumlah = $jumlah+$datatable[$i]["JUMLAH"];
        }

        ?>

      <tr>
        <td style="font-size: small;"><?php echo "<a target=_blank href=data/krisnareport/cetak.php?id=".substr($filename, 0,-5).">".substr($filename, 0,-5)."</a>"?></td>
        <td style="word-wrap: break-word; white-space: normal; min-width: 200px;max-width: 200px; font-size: small;"><?php echo $array["nama"] ?></td>
        <td style="font-size: small;"><?php echo date("d F Y", filemtime($filename)) ?></td> 
        <td style="font-size: small;">Rp. <?php echo number_format($jumlah,0,',','.'); ?></td>
        <td style="font-size: small;"><button type="button" class="btn btn-outline-secondary hapus" id=<?php echo substr($filename, 0,-5)?>>
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"></path>
  <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"></path>
</svg> <span class="visually-hidden"></span></button></td>
      </tr>
        <?php
      }  
    ?>
<tfoot>
      <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
      </tr>
    </tfoot>
      
    </tbody>
  </table>
  </div>

          </div>

          </div>
          
        </div>
      </div>


  </div>
<br>
  <div class="text-center">© <?php echo date('Y'); ?> Copyright:
      <a id="url" href><b id="url" style="color: blue !important"> </b></a>
  </div>

  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.mask.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  
  <script type="text/javascript">
    $(document).ready(function(){
    $.ajaxSetup({ cache: false });

    });

    var TRange=null;

    function findString (str) {
     if (parseInt(navigator.appVersion)<4) return;
     var strFound;
     if (window.find) {

      // CODE FOR BROWSERS THAT SUPPORT window.find

      strFound=self.find(str);
      if (!strFound) {
       strFound=self.find(str,0,1);
       while (self.find(str,0,1)) continue;
      }
     }
     else if (navigator.appName.indexOf("Microsoft")!=-1) {

      // EXPLORER-SPECIFIC CODE

      if (TRange!=null) {
       TRange.collapse(false);
       strFound=TRange.findText(str);
       if (strFound) TRange.select();
      }
      if (TRange==null || strFound==0) {
       TRange=self.document.body.createTextRange();
       strFound=TRange.findText(str);
       if (strFound) TRange.select();
      }
     }
     else if (navigator.appName=="Opera") {
      alert ("Opera browsers not supported, sorry...")
      return;
     }
     if (!strFound) alert ("Data '"+str+"' Tidak di temukan!")
     return;
    }
    
    function hapusLaporan(){
        $(".hapus").click(function(){
             
             Swal.fire({
                  title: 'Hapus data',
                  text: "Yakin mau di hapus data : "+this.id,
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Ya, Hapus data!'
                }).then((result) => {
                  if (result.isConfirmed) {
                      
                      var dataPost = this.id;

                      $.ajax({
                           url: 'data/krisnareport/delete.php',
                           type: 'post',
                           data: {data:dataPost},
                           beforeSend: function(){
                           
                           console.log('ajax dimulai');
                           
                           },
                           success: function(response){
                            
                              console.log('ajax sukses');
                              
                              Swal.fire(
                                  'Dihapus!',
                                   response,
                                  'success'
                                )
            
                           },
                           complete:function(data){
            
                            $("#data_table").load(location.href + " #data_table>*", function(){
                                hapusLaporan();
                            });
                            
                            
                           
                           },
            
                           error:function(response) {
                                console.log('ERROR BLOCK');
                                console.log(response);
                            }
                      });
                  };
                });
            });
        }
        
        $(document).ready(function() {
                hapusLaporan();
            });
    
  </script>
  <script>
        window.onload = function() {
            viewUrl();
            function viewUrl() {
              document.getElementById("url").innerHTML = window.location.hostname;
              document.getElementById("url").href = "https://"+window.location.hostname;
            }
        }
</script>
</body>  
</html>  