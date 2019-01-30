 
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

{

if(isset($_SESSION['username'])) {
    echo "<script>alert('selamat datang admin')</script>";
}

else{
    echo"<script>alert(' Anda Belum Login '); location.href='login.php'</script>";
    }
}
// Menampilkan informasi yang disimpan pada Session
echo "anda masuk sebagai " . $_SESSION["username"] ;
?>
<html>
  <head>
    <title>Antrian Terkini</title>
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
                       <li><a href="user.php"> Tambah User</a> </li>
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
                    <td align="center"><a href="panggil.php?id=<?php echo $id ?>"><img src='ipb.png' style='width:200px; height:200px;'></a>
                    
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

