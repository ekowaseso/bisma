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
    <title>Ubah Data Pelanggan</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"> 
</head>  
<body>
  <nav class="navbar navbar-dark bg-primary">
    <a class="navbar-brand text-white" href="">
      Ubah Data Pelanggan
    </a>
  </nav>

  <h2 align="center" style="margin: 20px;">Ubah Data</h2>

  <div class="container">
    <div class="row">
      <div class="col-sm-4 mb-4">
        <div class="card">
          <div class="card-header bg-info text-white">
            Form Data Pelanggan
          </div>
          <div class="card-body">

            <form>

            <input type="text" name="idpel" id="idpel" class="form-control idpel" readonly hidden>

            <label>NPSN</label>
            <input type="text" name="npsn" id="npsn" class="form-control npsn" placeholder="00000000">

            <label>Nama Lembaga</label>
            <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Lembaga">

            <label>Alamat</label>
            <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat Lembaga">

            <label>Kecamatan</label>
            <input type="text" name="kec" id="kec" class="form-control" placeholder="Kecamatan">

            <label>Kabupaten</label>
            <input type="text" name="kab" id="kab" class="form-control" placeholder="Kabupaten">

            <label>Propinsi</label>
            <input type="text" name="prop" id="prop" class="form-control" placeholder="Propinsi">

            <label>Kodepos</label>
            <input type="text" name="pos" id="pos" class="form-control pos" placeholder="00000">

            <label>Nama PIC</label>
            <input type="text" name="pic" id="pic" class="form-control" placeholder="Nama User">

            <label>Jabatan</label>
            <input type="text" name="jabatan" id="jabatan" class="form-control" placeholder="Jabatan">

            <label>NIP</label>
            <input type="text" name="nip" id="nip" class="form-control nip" placeholder="NIP">

            <label>No Telp</label>
            <input type="text" name="tlp" id="tlp" class="form-control tlp" placeholder="08XXXXXXXXXX">
            
            
            <label>Nama Bendahara</label>
            <input type="text" name="bend" id="bend" class="form-control" placeholder="Nama Bendahara">
            
            <label>NIP Bendahara</label>
            <input type="text" name="nip_bend" id="nip_bend" class="form-control nip" placeholder="NIP">

            <hr>

            <button type="button" class="btn btn-primary update">Update</button>
            <button type="button" class="btn btn-secondary batal">Batal</button>

            </form>

          </div>
        </div>
      </div>
      
      <div class="col-sm-8 mb-4">
        <div class="card">
          <div class="card-header bg-info text-white">
            Data Pelanggan
          </div>
          <div class="card-body">
              <select name="pelanggan" id="pelanggan" multiple class="selectpicker" onchange="get_pilihan()" style="padding: 10px;width: 100%;height: 300px;">
                <?php
            
                  $dir = "data/pelanggan/";
            
                  chdir($dir);
            
                  array_multisort(array_map('filemtime', ($files = glob("*.{json}", GLOB_BRACE))), SORT_DESC, $files);
            
                  $i = 1;
            
                  foreach($files as $filename)
                  {
            
                    $jsonFile = file_get_contents($filename);
            
                    $array = json_decode($jsonFile, true);
                    
                    //echo("<script> console.log('" . $array["nama"] .  " = " . $array["alamat"] ." Kecamatan " .$array["kec"]. " '); </script>");
                    
            
                    ?>
            
                    
                  <option value ="<?php echo $array["idpel"] ?>"><?php echo $array["nama"] ?></option>
                  
        
                <?php
                  }  
                ?>
            </select>

            <button type="button" class="btn btn-primary edit">Ubah</button>
            <button type="button" class="btn btn-secondary hapus">Hapus</button>
            
          </div>

          </div>
          </form>
          
        </div>
      </div>

      <!-- Modal -->

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
  <script src="js/bootstrap.min.js"></script>
  <script src="./js/read-excel-file.min.js"></script>
  <script src="./js/formToJson.min.js"></script>
  
  <script type="text/javascript">
    $(document).ready(function(){
    $.ajaxSetup({ cache: false });
      var dataTable = {};

      $("#idpel").val('');
      
      $('.npsn').mask('00000000');
      $('.pos').mask('00000');
      $('.nip').mask('000000000000000000');
      $('.tlp').mask('000000000000');

      $(".update").click(function(){

          var dform = $("form").formToJson();
          var order = dataTable.data;
          var dataPost = {...dform, order};

          $.ajax({
               url: 'data/pelanggan/create.php',
               type: 'post',
               data: {data:dataPost},
               beforeSend: function(){
               console.log('ajax dimulai');
               },
               success: function(response){
                
                  console.log('ajax sukses');

               },
               complete:function(data){

                var resp = JSON.parse(data.responseText);
                                     
                  $("#idpel").val('');
                  $("#npsn").val('');
                  $("#nama").val('');
                  $("#alamat").val('');
                  $("#kec").val('');
                  $("#kab").val('');
                  $("#prop").val('');
                  $("#pos").val('');
                  $("#pic").val('');
                  $("#jabatan").val('');
                  $("#nip").val('');
                  $("#tlp").val('');
                  $("#bend").val('');
                  $("#nip_bend").val('');

                  Swal.fire(
                      'Mantap!',
                      'Data Pelanggan Berhasil Di Edit',
                      'success'
                    );
                $("#pelanggan").load(location.href + " #pelanggan>*", "");
                    
               console.log(data.responseText);
               
               },

               error:function(response) {
                    console.log('ERROR BLOCK');
                    console.log(response);
                }
          });


          console.log(JSON.stringify(dataPost));
         });
         
         $(".hapus").click(function(){
             
             Swal.fire({
                  title: 'Hapus data '+get_pilihan(),
                  text: "Yakin mau di hapus?",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                  if (result.isConfirmed) {
                      
                      var dataPost = get_pilihan();

                      $.ajax({
                           url: 'data/pelanggan/delete.php',
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
            
                            $("#pelanggan").load(location.href + " #pelanggan>*", "");
                           
                           },
            
                           error:function(response) {
                                console.log('ERROR BLOCK');
                                console.log(response);
                            }
                      });
                      
                  }
                })

          
         });
         
    });
    
    function get_pilihan() {
              var idpel = document.getElementById("pelanggan").value;
              return idpel;
            }
            
    $(".edit").click(function(){
        
                $("#idpel").val('');
                  $("#npsn").val('');
                  $("#nama").val('');
                  $("#alamat").val('');
                  $("#kec").val('');
                  $("#kab").val('');
                  $("#prop").val('');
                  $("#pos").val('');
                  $("#pic").val('');
                  $("#jabatan").val('');
                  $("#nip").val('');
                  $("#tlp").val('');
                  $("#bend").val('');
                  $("#nip_bend").val('');
        
        $.getJSON( "data/pelanggan/"+get_pilihan()+".json", function( data ) {

          var items = [];
          
          $.each( data, function( key, value ) {

            $("#"+key).val(""+value);

            console.log(  key + " : " + value );
          
          });
         

        });
    });
  </script>
</body>  
</html>  