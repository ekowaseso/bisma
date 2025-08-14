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
    <title>Laporan SPJ CV. Bisma Indonesia</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"> 
</head>  
<body style="background-color: #5fadf98f;">
  <nav class="navbar navbar-dark bg-primary">
    <a class="navbar-brand text-white" href="">
      CV. Bisma Indonesia
    </a>
  </nav>

  <h2 align="center" style="margin: 20px;">Menu Aplikasi</h2>

  <div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="card">
          <div class="card-header bg-info text-white">
            Klik Bisma Menu
          </div>
          <div class="card-body">
            <hr>

            <a href="input.php"><button style="margin-bottom: 5px;" type="button" class="btn btn-primary btn-lg btn-block pelanggan">Input Data Pelanggan Baru</button></a>
            <a href="edit.php"><button style="margin-bottom: 5px;" type="button" class="btn btn-primary btn-lg btn-block pelanggan">Edit Data Pelanggan</button></a>
            <a href="spj.php"><button style="margin-bottom: 5px;" type="button" class="btn btn-success btn-lg btn-block spj">Buat Laporan</button></a>
            <a href="pbast.php"><button style="margin-bottom: 5px;" type="button" class="btn btn-success btn-lg btn-block spj">Buat Laporan (Pecah BAST)</button></a>
            <a href="cari.php"><button style="margin-bottom: 5px;" type="button" class="btn btn-warning btn-lg btn-block cari">View Laporan</button></a>
            <a href="/"><button style="margin-bottom: 5px;" type="button" class="btn btn-info btn-lg btn-block cari">Ganti CV</button></a>
            <a href="logout.php"><button style="margin-bottom: 5px;" type="button" class="btn btn-danger btn-lg btn-block cari">Logout</button></a>

          </div>
        </div>
      </div>

          </div>
        </div>
      </div>
    </div>
  </div>
<br>
  <div class="text-center">© <?php echo date('Y'); ?> Copyright:
       Powered by <a href=""><b id="url" style="color: blue !important"> </b></a>
  </div>

  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.mask.min.js"></script>
  
  <script>
        window.onload = function() {
            viewUrl();
            function viewUrl() {
              document.getElementById("url").innerHTML = window.location.hostname;
            }
        }
</script>
</body>  
</html>  