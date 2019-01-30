 
 <!DOCTYPE html>
<?php
// memulai session
session_start();
error_reporting(0);
if (isset($_SESSION['level']))
{
    // jika level admin
    if ($_SESSION['level'] == "admin")
   {   
   }
   // jika kondisi level user maka akan diarahkan ke halaman lain
   else if ($_SESSION['level'] == "1")
   {
       header('location:index.php');
   }
}
if (!isset($_SESSION['level']))
{
    header('location:login.php');
}
$username= $_SESSION['username'];
 ?>
<html>
  <head>
   <title>Antrian</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">
<link rel="stylesheet" href="assets/demo.css">
  <link rel="stylesheet" href="assets/header-fixed.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">  
        <link rel="stylesheet" href="css/dataTables.bootstrap.css">
    <link href="scripts/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link rel="stylesheet" href="select2-master/dist/css/select2.min.css"/>
     <script src="js/jquery1.js"></script>
  <link href="css/select2.min.css" rel="stylesheet" />
  <script src="js/select2.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="header">
         <div class="container">
            <div class="row">
               <div class="col-md-5">
                  <!-- Logo -->
                  <div class="logo">
                     <h1><a href="antrian.php">Antrian Sekolah Pascasarjana</a></h1>
                  </div>
               </div>
               <div class="col-md-5">
                  <div class="row">
                    <div class="col-lg-12">
                      
                    </div>
                  </div>
               </div>
               <div class="col-md-2">
                  <div class="navbar navbar-inverse" role="banner">
                      <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                        <ul class="nav navbar-nav">
                          <li class="dropdown">
                             <a href="logout.php" >LogOut</a>
                            
                          </li>
                        </ul>
                      </nav>
                  </div>
               </div>
            </div>
         </div>
    </div>

    <div class="page-content">
        <div class="row">
          <div class="col-md-2">
            <div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                     <li><a href="user.php"> Kelola User</a> </li>
                        <li><a href="mahasiswa.php"> Kelola Mahasiswa</a> </li>
                        <li><a href="kelola_pengajuan.php"> Kelola Pengajuan</a></li>
                        <li><a href="cari2.php"> Antrian sedang Proses</a></li>
                        <li><a href="histori.php">Antrian</a></li>
                        <li><a href="info.php">Informasi</a></li>
                    
                </ul>
            </div>
          </div>
          <div class="col-md-10">
            <div class="row"></div>

            <div class="row">
                <div class="col-md-12 panel-warning">
                    <div class="content-box-header panel-heading">
                      <div class="panel-options">
                        </div>
                  </div>
                    <div class="content-box-large box-with-header">
                       
            
<div>

                            <form method="post" action="update_proses2.php">

  <?php 
//mahasiswa mencari nama dia untuk mendaftar antrian autocomplete
  ?>
  <select  name="id_proses" class="myselect" class="form-control" style="width:500px;" required>
     <option value="">Masukan No. Registrasi Pelayanan</option>
            <?php
            include ('config.php');
                $gpu = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM proses,mahasiswa,pengajuan where proses.nrp=mahasiswa.nrp and proses.id_pengajuan=pengajuan.id_pengajuan ORDER BY id_proses");
                while($p=mysqli_fetch_array($gpu)){
                echo "<option value=\"$p[id_proses]\">".$p['id_proses']."--".$p['nama']."--".$p['nama_surat']."--".$p['status']."</option>\n";
                }
            ?>
  </select>


</div>


<script type="text/javascript">
      $(".myselect").select2();
</script>
<?php
//memilih tujuan dia 

?><br>
        <div class="action">
            <button type="submit" name="action" width="100px" value="pengajuan" class="btn btn-primary ">
            Update
            </button>
           
                            </form>                
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.dataTables.min.js"></script>
        <script src="js/dataTables.bootstrap.js"></script>
       <script src="select2-master/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function () {
                $('.select2').select2();
            });
        </script>
         <script>
        $('#reset').click(function() {
    $(".select2").val(null).trigger("change"); 
});
        </script>
                    
                  </div>
              </div>
  </div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>

