 

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



$koneksi = ($GLOBALS["___mysqli_ston"] = mysqli_connect("localhost",  "root",  "")) or die("Gagal koneksi ke server."); 
 
mysqli_select_db($GLOBALS["___mysqli_ston"], antrian) or die("Gagal membuka database."); 


$username= $_SESSION['username'];
$query = "select * from user where username='$username'";
 
$hasil = mysqli_query( $koneksi, $query) or die("Gagal melakukan query.");
 
while ($buff = mysqli_fetch_array($hasil)) {
$loket=$buff['loket'];
$wait="waiting";
}

 include ('config.php');
  $query = "SELECT * FROM antrian,mahasiswa where antrian.nrp=mahasiswa.nrp and loket='$loket'";
                             
                            $hasil = mysqli_query($GLOBALS["___mysqli_ston"], $query) or die("Gagal melakukan query.");
                             
                            while ($buff = mysqli_fetch_array($hasil)) {
                             $a = $buff['id'];
                             $nama = $buff['nama'];
                             $jenis = $buff['jenis'];
                             }
                            ?> 
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
            
             <form name="action"method="post" action="proses_panggil.php">
                            <div class="social"></div>
                            <font  style="font-size:32px" ><b>Nomor Antrian &nbsp&nbsp&nbsp :<td style="margin-top:10px; font-size:72px;  "><font  style="font-size:32px" color="red"><b> <?php echo $a; ?> </font></td>
                            <br> <font  style="font-size:32px" >Nama Mahasiswa:<td style="margin-top:10px; font-size:72px;  "><font  style="font-size:32px" color="red"><b> <?php echo $nama; ?> </font></td>
                            <br> <font  style="font-size:32px" >Jenis &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp :<td style="margin-top:10px; font-size:72px;  "><font  style="font-size:32px" color="red"><b> <?php echo $jenis; ?> </font></td>
<br>

                      <input class="form-control" type="hidden"  name="id" value="<?php echo $a+1 ?>" required="required">
                      <input class="form-control" type="hidden"  name="status" value="1" required="required">
<td>
<input class="btn btn-primary signup" type="hidden"  href="tahap2.php?id=<?php echo $a ; ?>" > <font  style="font-size:14px" ></a>
&nbsp&nbsp&nbsp&nbsp<td><a class="btn btn-primary signup" href="tahap2.php?id=<?php echo $a ; ?>" > <font  style="font-size:14px" > PROSES</a>
&nbsp&nbsp&nbsp&nbsp</td><td><a class="btn btn-primary signup" href="panggil1.php" > <font  style="font-size:14px" > ULANGI</a>
&nbsp&nbsp&nbsp&nbsp</td>
                            <input class="btn btn-primary signup" onclick="cek()" name="Submit" type="submit" value="PANGGIL ANTRIAN">
                     
                     
                            </form>   

    <script type="text/javascript">
    function cek(){
    var msg = confirm("Apakah Anda yakin Memanggil Panggilan Selanjutnya ?");
    if(msg==true){
    window.location="proses_panggil.php?id=<?php echo  $a;  ?>";  
    }
    else{
    window.location="panggil1.php";
    }
    }
    </script>


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
}elseif ($a == '5')
     {?>
        <audio src="audio/5_1.mp3" delayed="5" controls autoplay hidden="true"> </audio>
        <?php
}elseif ($a == '6')
     {?>
        <audio src="audio/6_1.mp3" delayed="5" controls autoplay hidden="true"> </audio>
        <?php
}elseif ($a == '7')
     {?>
        <audio src="audio/7_1.mp3" delayed="5" controls autoplay hidden="true"> </audio>
        <?php
}elseif ($a == '8')
     {?>
        <audio src="audio/8_1.mp3" delayed="5" controls autoplay hidden="true"> </audio>
        <?php
}elseif ($a == '9')
     {?>
        <audio src="audio/9_1.mp3" delayed="5" controls autoplay hidden="true"> </audio>
        <?php
}
}

elseif ($loket == 'Loket 2') {

    if ($a == '1' ) {?>
       <audio src="audio/1_2.mp3" delayed="5"controls autoplay hidden="true"> </audio>
       <?php
    } elseif ($a == '2')
     {?>
        <audio src="audio/2_2.mp3" delayed="5" controls autoplay hidden="true"> </audio>
        <?php
    }  elseif ($a == '3')
     {?>
        <audio src="audio/3_2.mp3" delayed="5" controls autoplay hidden="true"> </audio>
        <?php
} elseif ($a == '4')
     {?>
        <audio src="audio/4_2.mp3" delayed="5" controls autoplay hidden="true"> </audio>
        <?php
}elseif ($a == '5')
     {?>
        <audio src="audio/5_2.mp3" delayed="5" controls autoplay hidden="true"> </audio>
        <?php
}elseif ($a == '6')
     {?>
        <audio src="audio/6_2.mp3" delayed="5" controls autoplay hidden="true"> </audio>
        <?php
}elseif ($a == '7')
     {?>
        <audio src="audio/7_2.mp3" delayed="5" controls autoplay hidden="true"> </audio>
        <?php
}elseif ($a == '8')
     {?>
        <audio src="audio/8_2.mp3" delayed="5" controls autoplay hidden="true"> </audio>
        <?php
}elseif ($a == '9')
     {?>
        <audio src="audio/9_2.mp3" delayed="5" controls autoplay hidden="true"> </audio>
        <?php
}
}

elseif ($loket == 'Loket 3') {

    if ($a == '1' ) {?>
       <audio src="audio/1_3.mp3" delayed="5"controls autoplay hidden="true"> </audio>
       <?php
    } elseif ($a == '2')
     {?>
        <audio src="audio/2_3.mp3" delayed="5" controls autoplay hidden="true"> </audio>
        <?php
    } elseif ($a == '3')
     {?>
        <audio src="audio/3_3.mp3" delayed="5" controls autoplay hidden="true"> </audio>
        <?php
} elseif ($a == '4')
     {?>
        <audio src="audio/4_3.mp3" delayed="5" controls autoplay hidden="true"> </audio>
        <?php
}elseif ($a == '5')
     {?>
        <audio src="audio/5_3.mp3" delayed="5" controls autoplay hidden="true"> </audio>
        <?php
}elseif ($a == '6')
     {?>
        <audio src="audio/6_3.mp3" delayed="5" controls autoplay hidden="true"> </audio>
        <?php
}elseif ($a == '7')
     {?>
        <audio src="audio/7_3.mp3" delayed="5" controls autoplay hidden="true"> </audio>
        <?php
}elseif ($a == '8')
     {?>
        <audio src="audio/8_3.mp3" delayed="5" controls autoplay hidden="true"> </audio>
        <?php
}elseif ($a == '9')
     {?>
        <audio src="audio/9_3.mp3" delayed="5" controls autoplay hidden="true"> </audio>
        <?php
}
}

elseif ($loket == 'Loket 4') {

    if ($a == '1' ) {?>
       <audio src="audio/1_4.mp3" delayed="5"controls autoplay hidden="true"> </audio>
       <?php
    } elseif ($a == '2')
     {?>
        <audio src="audio/2_4.mp3" delayed="5" controls autoplay hidden="true"> </audio>
        <?php
    }  elseif ($a == '3')
     {?>
        <audio src="audio/3_4.mp3" delayed="5" controls autoplay hidden="true"> </audio>
        <?php
} elseif ($a == '4')
     {?>
        <audio src="audio/4_4.mp3" delayed="5" controls autoplay hidden="true"> </audio>
        <?php
}elseif ($a == '5')
     {?>
        <audio src="audio/5_4.mp3" delayed="5" controls autoplay hidden="true"> </audio>
        <?php
}elseif ($a == '6')
     {?>
        <audio src="audio/6_4.mp3" delayed="5" controls autoplay hidden="true"> </audio>
        <?php
}elseif ($a == '7')
     {?>
        <audio src="audio/7_4.mp3" delayed="5" controls autoplay hidden="true"> </audio>
        <?php
}elseif ($a == '8')
     {?>
        <audio src="audio/8_4.mp3" delayed="5" controls autoplay hidden="true"> </audio>
        <?php
}elseif ($a == '9')
     {?>
        <audio src="audio/9_4.mp3" delayed="5" controls autoplay hidden="true"> </audio>
        <?php
}
}


             