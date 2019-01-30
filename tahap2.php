 

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
                     <h1><a href="admin.php">Antrian Pascasarjana</a></h1>
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
                        <li><a href="cari.php"> Antrian Sedang Proses</a></li>
                        
                    
                    
                    
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
 
$id= $_GET['id'];
$query = " SELECT * FROM  antrian,mahasiswa where antrian.nrp=mahasiswa.nrp  and  id='$id' ";
$hasil = mysqli_query( $koneksi, $query) or die("Gagal melakukan query.");
$buff = mysqli_fetch_array($hasil);
((is_null($___mysqli_res = mysqli_close($koneksi))) ? false : $___mysqli_res);
?>
  <div class="panel-heading">
   <div class="panel-title">Kelola Antrian</div>
    <div class="panel-body">
  <form name="form1" method="post" action="proses_tahap2.php">
  <table class="table table-bordered" border="4" align="center">
  <tr>
  <td>Nomor Antrian</td>
  <td> <input class="form-control" style="width:170px;  margin-left:10px; margin-top:10px;" name="id" type="text" value="<?php echo $buff['id']; ?>" readonly /></td></td>
  </tr>
 
  <tr>
  <td>NRP</td>
  <td><input class="form-control" style="width:300px;  margin-left:10px; margin-top:10px;   " name="nrp" type="text" value="<?php echo $buff['nrp']; ?>" readonly /></td>
  </tr> 
  <tr>
  <td>Nama Mahasiswa</td>
  <td><input class="form-control" style="width:300px;  margin-left:10px; margin-top:10px;   " name="nama" type="text" value="<?php echo $buff['nama']; ?>" /></td>
  </tr>
  <tr>
  <td>Mayor</td>
  <td><input class="form-control" style="width:300px;  margin-left:10px; margin-top:10px;   " name="mayor" type="text" value="<?php echo $buff['mayor']; ?>" /></td>
  </tr>
  <tr>
  <td>Prodi</td>
  <td><input class="form-control" style="width:300px;  margin-left:10px; margin-top:10px;   " name="prodi" type="text" value="<?php echo $buff['prodi']; ?>" /></td>
  </tr>
  <tr>
  <td>Jenis Pengajuan//Waktu Adm</td>
  <td >  
  <?php 
//mahasiswa mencari nama dia untuk mendaftar antrian autocomplete
  ?>
  <select  name="id_pengajuan" class="myselect" class="form-control" style="width:250px;" required>
     <option value="">Masukan No/Nama Surat</option>
            <?php
            include ('config.php');
                $gpu = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM pengajuan ORDER BY id_pengajuan");
                while($p=mysqli_fetch_array($gpu)){
                echo "<option value=\"$p[id_pengajuan]\">".$p['id_pengajuan']."--".$p['nama_surat']."</option>\n";
                }
            ?>
  </select>


<script type="text/javascript">
      $(".myselect").select2();
</script> </tr>
  
 
  <tr>
  <td>Tanggal Pengajuan</td>
  <td><input class="form-control" style="width:300px;  margin-left:10px; margin-top:10px;   " name="tanggal_pengajuan" type="text" value="<?php echo $buff['tanggal_pengajuan']; ?>" readonly /></td>
  </tr>
  <tr>
  <td>Estimasi Selesai</td>
  <td><input class="form-control" style="width:300px;  margin-left:10px; margin-top:10px;   " name="estimasi" type="date" value="<?php echo $buff['estimasi']; ?>" required/></td>
  </tr>
   <tr><td>Penanggung Jawab</td>
    <td align="left">   <select class="form-control" style="width:300px;  margin-left:10px; margin-top:10px; "name="id_user" required>
             <?php
              include ('config.php');
             $sql = "SELECT * FROM user where username='$username' ";
              $query = mysqli_query($GLOBALS["___mysqli_ston"], $sql);
               while($result = mysqli_fetch_array($query)){
             echo "<option value='".$result['id_user']."'>".$result['nama_user']."</option>";} ?></td> 
 
 
  <tr>
  <td ><input class="btn btn-primary signup" type="submit" name="submit" value="Simpan" /></td>
  
   <td ><a href="index.php"><button class="btn btn-primary signup">Batal</button></a></td>
  </table>
  </table>
                    
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
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>

