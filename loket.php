 

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
    <title>Masukan Loket Anda</title>
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
  <body class="login-bg">
  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-12">
	              <!-- Logo -->
	              <div class="logo">
	                 <h1><a href="">Antrian Sekolah Pascasarjana</a></h1>
	              </div>
	           </div>
	        </div>
	     </div>
	</div>

	<div class="page-content container">
    	<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="login-wrapper">
			        <div class="box">
			            <div class="content-wrap">
			                <h6>Pilih Loket</h6>
                            <form method="post" action="proses_loket.php">
                          	<div class="social"></div>
                          	 <td align="center" ><select   class="form-control" name ="loket" style= " align:center;" required>
						        <option align="center" value="">---Pilih---</option> 
						        <option value="Loket 1">Loket 1</option>
						        <option value="Loket 2">Loket 2</option>
						        <option value="Loket 3">Loket 3</option>
						        <option value="Loket 4">Loket 4</option>
						     
						      </select>
						    </td>
			                <div class="action">
                            <input class="btn btn-primary signup" name="Submit" type="submit" value="SIMPAN">
			                </div>
                            </form>                
			            </div>
			        </div>

			    </div>
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

