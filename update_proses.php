 

 <!DOCTYPE html>
<?php
error_reporting(0);
session_start();
if (isset($_SESSION['level']))
{
 
    if ($_SESSION['level'] == "1")
   {   
   }
   // jika kondisi level user maka akan diarahkan ke halaman lain
   else if ($_SESSION['level'] == "admin")
   {
       header('location:admin.php');
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
    <title>Antrian Terkini</title>
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
                    
                        <li><a href="panggil.php">Panggil Antrian</a></li>
                       <li><a href="index.php">  Antrian Terkini </a> </li>
                        <li><a href="cari.php">Update Pelayanan</a></li>
                    
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
                    


<?php 
 
$koneksi = ($GLOBALS["___mysqli_ston"] = mysqli_connect("localhost",  "root",  "")) or die("Gagal koneksi ke server."); 
 
mysqli_select_db($GLOBALS["___mysqli_ston"], antrian) or die("Gagal membuka database."); 
 
$id= $_POST['id_proses'];

$query = " SELECT * FROM proses,mahasiswa,pengajuan where proses.nrp=mahasiswa.nrp and proses.id_pengajuan=pengajuan.id_pengajuan and  proses.id_proses='$id'";
$hasil = mysqli_query( $koneksi, $query) or die("Gagal melakukan query.");
$buff = mysqli_fetch_array($hasil);
((is_null($___mysqli_res = mysqli_close($koneksi))) ? false : $___mysqli_res);
?>
  <div class="panel-heading">
   <div class="panel-title">Tambah Pengajuan</div>
    <div class="panel-body">
     <form name="form1" method="post" action="proses_update.php">
  <table class="table table-bordered" border="4" align="center">
  <tr>
  <td>No. Reg</td>
  <td> <input class="form-control" style="width:300px;   margin-top:10px;" name="id_proses" type="text" value="<?php echo $buff['id_proses']; ?>"  readonly/></td></td>
  </tr>
  <tr>
  <td>NRP</td>
  <td> <input class="form-control" style="width:300px;   margin-top:10px;" name="nrp" type="text" value="<?php echo $buff['nrp']; ?>"  readonly/></td></td>
  </tr>
  <tr>
  <td>Nama Mahasiswa</td>
  <td> <input class="form-control" style="width:300px;   margin-top:10px;" name="nama" type="text" value="<?php echo $buff['nama']; ?>"  readonly/></td></td>
  </tr>
  <tr>
  <td>Jenis Pengajuan</td>
  <td> <input class="form-control" style="width:300px;   margin-top:10px;" name="nama" type="text" value="<?php echo $buff['nama_surat']; ?>"  required/></td></td>
  </tr>
 <tr>
      <td><label  style="margin-top:10px;" ><b> Status </label></td>
      <td><select class="form-control" style="width:auto; margin-top:10px;  margin-left:10px; " name="status" required>
        <option align="center" value="" required>---Pilih---</option> 
        <option value="Di Ambil" required>Di Ambil</option>
        <option value="Tolak" required>Tolak</option>
        <option value="Selesai" required>Selesai</option>
        <option value="Proses" required>Proses</option>
      </select>
    </td>
  </tr>
  <tr>
  <td ><input class="btn btn-primary signup" type="submit" name="submit" value="UPDATE" /></td>
   <td ><a href="cari.php" class="btn btn-primary">Batal</a></td></tr>
  </table></form>
                    
                  </div>
                  </div>
              </div>


    <script type="text/javascript">
    function cek(){
    
    window.location=history.go(-1);  
    
    }
    </script>

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


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>

