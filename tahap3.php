
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


$wait="waiting";


 include ('config.php');
  $query = "SELECT min(id) as id FROM antrian where loket='$wait'";
                             
                            $hasil = mysqli_query($GLOBALS["___mysqli_ston"], $query) or die("Gagal melakukan query.");
                             
                            while ($buff = mysqli_fetch_array($hasil)) {
                             $a = $buff['id'];
                             }
 
$koneksi = ($GLOBALS["___mysqli_ston"] = mysqli_connect("localhost",  "root",  "")) or die("Gagal koneksi ke server."); 
 
mysqli_select_db($GLOBALS["___mysqli_ston"], antrian) or die("Gagal membuka database."); 


 
$id= $_GET['id_proses'];
$query = " SELECT * FROM proses,mahasiswa,pengajuan where proses.nrp=mahasiswa.nrp and proses.id_pengajuan=pengajuan.id_pengajuan and  proses.id_proses='$id'";
$hasil = mysqli_query( $koneksi, $query) or die("Gagal melakukan query.");
$buff = mysqli_fetch_array($hasil);
$nama= $buff['nama']; 
((is_null($___mysqli_res = mysqli_close($koneksi))) ? false : $___mysqli_res);
?>
 <html>
  <head>
    <title>Antrian Telah di Proses</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">

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
                        <li><a href="cari.php"> Antrian sedang Proses</a></li>
                    
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
            
             <form method="post" action="proses_panggil.php">
                            <div class="social"></div>
                            <font  style="font-size:32px" ><b>Nomor Registrasi:<td style="margin-top:10px; font-size:72px;  "><font  style="font-size:32px" color="red"><b> <?php echo $buff['id_proses']; ?> </font></td>
                            <br> <font  style="font-size:32px" >Nama Mahasiswa:<td style="margin-top:10px; font-size:72px;  "><font  style="font-size:32px" color="red"><b> <?php echo $buff['nama']; ?> </font></td>
                            <br> <font  style="font-size:32px" >Jenis Pengajuan&nbsp:<td style="margin-top:10px; font-size:72px;  "><font  style="font-size:32px" color="red"><b> <?php echo $buff['nama_surat']; ?> </font></td><br>
                            <font  style="font-size:12px" color="red">Note : Cetak Terlebih Dahulu Sebelum Melanjutkan Antrian atau Tambah Pengajuan
<br>

                      <input class="form-control" type="hidden"  name="id" value="<?php echo $a ?>" required="required">
                      <input class="form-control" type="hidden"  name="status" value="1" required="required">

<a class="btn btn-primary signup" href="tambah_pengajuan.php?id_proses=<?php echo  $buff['id_proses'];  ?>" > <font  style="font-size:22px" > TAMBAH PENGAJUAN</a>
&nbsp&nbsp&nbsp&nbsp
<a class="btn btn-primary signup" href="cetak.php?id_proses=<?php echo  $buff['id_proses']; ; ?>" > <font  style="font-size:22px" > CETAK</a>
&nbsp&nbsp&nbsp&nbsp
                            <input class="btn btn-lg btn-primary signup" name="Submit" type="submit" value="NEXT">
                      </div>
                            </form>   


<?php 

if ($loket == 'Loket 1') {

    if ($a == '1' ) {?>
       <audio src="audio/1_1.mp3" delayed="5"controls autoplay hidden="true"> </audio>
       <?php
    } elseif ($a == '2')
     {?>
        <audio src="audio/2_1.mp3" delayed="5" controls autoplay hidden="true"> </audio>
        <?php
    } elseif ($a == '3')
     {?>
        <audio src="audio/3_1.mp3" delayed="5" controls autoplay hidden="true"> </audio>
        <?php
} elseif ($a == '4')
     {?>
        <audio src="audio/4_1.mp3" delayed="5" controls autoplay hidden="true"> </audio>
        <?php
}}

elseif ($loket == 'Loket 2') {

    if ($a == '1' ) {?>
       <audio src="audio/1_2.mp3" delayed="5"controls autoplay hidden="true"> </audio>
       <?php
    } elseif ($a >'1' && $a < '3')
     {?>
        <audio src="audio/2_2.mp3" delayed="5" controls autoplay hidden="true"> </audio>
        <?php
    } elseif ($a >'2' && $a < '4')
     {?>
        <audio src="audio/3_2.mp3" delayed="5" controls autoplay hidden="true"> </audio>
        <?php
}
}


             