 

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
  $query = "SELECT min(id) as id FROM antrian where loket='$wait'";
                             
                            $hasil = mysqli_query($GLOBALS["___mysqli_ston"], $query) or die("Gagal melakukan query.");
                             
                            while ($buff = mysqli_fetch_array($hasil)) {
                             $a = $buff['id'];
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
           <BR><BR><BR><BR><BR><tr>
             <form method="post" action="proses_panggil.php">
                            <div class="social"></div>
                      <input class="form-control" type="hidden"  name="id" value="<?php echo $a ?>" required="required">
                      <input class="form-control" type="hidden"  name="status" value="1" required="required">
                      <div class="action">
                            <input class="btn btn-primary signup" name="Submit" type="submit" value="PANGGIL ANTRIAN">
                      </div>
                            </form>  

             