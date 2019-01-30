<!DOCTYPE html>

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

<script type="text/javascript">
    //set timezone
    <?php date_default_timezone_set('Asia/Jakarta'); ?>
    //buat object date berdasarkan waktu di server
    var serverTime = new Date(<?php print date('Y, m, d, H, i, s, 0'); ?>);
    //buat object date berdasarkan waktu di client
    var clientTime = new Date();
    //hitung selisih
    var Diff = serverTime.getTime() - clientTime.getTime();    
    //fungsi displayTime yang dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik
    function displayServerTime(){
        //buat object date berdasarkan waktu di client
        var clientTime = new Date();
        //buat object date dengan menghitung selisih waktu client dan server
        var time = new Date(clientTime.getTime() + Diff);
        //ambil nilai jam
        var sh = time.getHours().toString();
        //ambil nilai menit
        var sm = time.getMinutes().toString();
        //ambil nilai detik
        var ss = time.getSeconds().toString();
        //tampilkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)
        document.getElementById("clock").innerHTML = (sh.length==1?"0"+sh:sh) + ":" + (sm.length==1?"0"+sm:sm) + ":" + (ss.length==1?"0"+ss:ss);
    }
</script>

</head>
<body onload="setInterval('displayServerTime()', 1000);">


  
<style type="text/css">
body{
background: url('bg.jpg') no-repeat scroll;
background-size: 100% 100%;
background-attachment: fixed;
background-repeat: no-repeat;
}
</style>
<?php
    
$a = date('H.i');

//set waktu pembukaan loket
if (($a>=7.30) && ($a<=11.30)){

    ?>


<br><br><br><br>
                            <img src='ipb.png' style='width:100px; height:100px;'></a><br>  

                            <h2><font color="white"><b>Selamat Datang</h2>

                            <span id="clock"><font><?php echo date('H.i.s'); ?></span><br>
                            
                               
                            
                            <form method="post" action="proses_antri.php">
                            <div class="social"></div>
                                         
                                          
<?php 
 include ('config.php');
//query menampilkan angka terbesar di database kemudian di tambah 1 untuk antrian selanjutnya
                            $query = "SELECT max(id) as id FROM antrian";
                             
                            $hasil = mysqli_query($GLOBALS["___mysqli_ston"], $query) or die("Gagal melakukan query.");
                             
                            while ($buff = mysqli_fetch_array($hasil)) {
                             $a = $buff['id']+1;
                             }
                            ?> 

    <input class="form-control" type='hidden' style="width:170px;  margin-left:10px; margin-top:10px;" name="id"  value="<?php echo $a ?>"/>

    <input class="form-control" type='hidden' style="width:170px;  margin-left:10px; margin-top:10px;" name="sesi"  value="Pagi"/>
  <input class="form-control" type='hidden' style="width:170px;  margin-left:10px; margin-top:10px;" name="status"  value="0"/>


                                        
                            <h4  style="width:auto; margin-top:20px;" >Nomor Antrian Pagi<br><font  style="font-size:15px ;">  Mulai pukul 08.30 hingga 11.30</font></h4>
<td style="margin-top:10px; font-size:72px;  "><font  style="font-size:100px" color="red"><b> <?php echo $a; ?> </font></td>
                           
            
<div>

  <?php 
//mahasiswa mencari nama dia untuk mendaftar antrian autocomplete
  ?>
  <div style="width:300px; margin:0 auto;><input type="text" list="mahasiswa" placeholder="Masukan NRP/Nama" size"50">
  <datalist id="mahasiswa">
<?php
$qry=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT DISTINC nrp, nama FROM mahasiswa");
while($t=mysqli_fetch_array($qry)){
echo "<option value='$t[nrp]'>";
}
?>
</datalist>
  <label for="nrp"><h4>Masukan Nama/NRP: </h4></label>
    <!--<input type="text" class="typeahead form-control" required="required" name="nrp" placeholder="Masukan NRP/Nama">!-->
	
	
  <select  name="nrp" class="myselect" class="form-control" style="width:200px;" required>
     <option value="">Masukan Nama/NRP</option>
            <?php
            include ('config.php');
                $gpu = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM mahasiswa ORDER BY nama");
                while($p=mysqli_fetch_array($gpu)){
                echo "<option value=\"$p[nrp]\">".$p['nrp']."--".$p['nama']."</option>\n";
                }
            ?>
  </select>


</div>

<!--<script>
$(document).ready(function($){
    $('#customerAutocomplte').autocomplete({
	source:'ajaxauto.php', 
	minLength:2
    });
});
</script>!-->
<script type="text/javascript">
      $(".myselect").select2();
</script>
<?php
//memilih tujuan dia 

?><br><br>
        <div class="action">
            <button type="submit" name="action" width="100px" value="pengajuan" class="btn btn-primary active ">
                    <i class="fa fa-plus-circle"></i>&nbsp;&nbsp; Pengajuan&nbsp;&nbsp;
            </button>
            <button type="submit" name="action" value="pengambilan" class="btn btn-primary active ">
                <i class="fa fa-plus-circle"></i> Pengambilan
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
<?php



}
//set waktu pembukaan loket
else if(($a>11.30) && ($a<=18.30))
{
?>
<br><br><br><br>
                            <img src='ipb.png' style='width:100px; height:100px;'></a><br>  

                            <h2><font color="white"><b>Selamat Datang</h2>

                            <span id="clock"><font><?php echo date('H:i:s'); ?></span><br>
                            
                               
                            
                            <form method="post" action="proses_antri.php">
                            <div class="social"></div>
                                         
                                          
<?php 
 include ('config.php');
                            $query = "SELECT max(id) as id FROM antrian";
                             
                            $hasil = mysqli_query($GLOBALS["___mysqli_ston"], $query) or die("Gagal melakukan query.");
                             
                            while ($buff = mysqli_fetch_array($hasil)) {
                             $a = $buff['id']+1;
                             }
                            ?> 

    <input class="form-control" type='hidden' style="width:170px;  margin-left:10px; margin-top:10px;" name="id"  value="<?php echo $a ?>"/>

    <input class="form-control" type='hidden' style="width:170px;  margin-left:10px; margin-top:10px;" name="sesi"  value="Siang"/>


  <input class="form-control" type='hidden' style="width:170px;  margin-left:10px; margin-top:10px;" name="status"  value="0"/>
                                        
                            <h4  style="width:auto; margin-top:20px;" >Nomor Antrian Siang<br><font  style="font-size:15px ;"> Mulai pukul 13:00 hingga 14:30</font></h4> 
<td style="margin-top:10px; font-size:72px;  "><font  style="font-size:100px" color="red"><b> <?php echo $a; ?> </font></td>
                           <br>
            
<div>

  <div style="width:300px; margin:0 auto;>
  <label for="nrp"><h4>Masukan Nama/NRP: </h4></label>
    <!--<input type="text" class="typeahead form-control" required="required" name="nrp" value=".$row['nrp']." placeholder="Masukan NRP/Nama">!-->
	
  <select  name="nrp" class="myselect" class="form-control" style="width:200px;" required>
     <option value="">Masukan Nama/NRP</option>
            <?php
            include ('config.php');
                $gpu = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM mahasiswa ORDER BY nama");
                while($p=mysqli_fetch_array($gpu)){
                echo "<option value=\"$p[nrp]\">".$p['nrp']."--".$p['nama']."</option>\n";
                }
            ?>
  </select>


</div>

<script>
$('input.typeahead').typeahead({
	source:  function (query, process) {
	return $.get('ajaxauto.php', { query: query }, function (data) {
			console.log(data);
			data = $.parseJSON(data);
			return process(data);
		});
	}
});
</script>


<script type="text/javascript">
      $(".myselect").select2();
</script> <br><br>
        <div class="action">
            <button type="submit" name="action" value="pengajuan" class="btn btn-primary active">
                    <i class="fa fa-plus-circle"></i>&nbsp;&nbsp; Pengajuan &nbsp;&nbsp;
            </button>
            <button type="submit" name="action" value="pengambilan" class="btn btn-primary active">
                <i class="fa fa-plus-circle"></i> Pengambilan
            </button>

            <!--            <input class="btn btn-primary signup" name="Submit" type="submit" value="Antri">-->
        </div>
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

<?php
}

//set waktu pembukaan loket

else if(($a>14.30) && ($a<=07.30))
{?>
<br><br><br><br><br><br>
   <img src='closed.png' style='width:250px; height:250px;'></a><br>  

                            <h2><font color="white"><b>Silakan kembali besok</h2>


<?php
}
?>









    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
  
</html>
<style>
body {
     margin: 0;
     padding: 0;
     text-align: center;
}
.bg {
     width: 100%;
     height: 100%;
     position: fixed;
     z-index: 1;
     float: left;
     left: 0;
}
.content {
     width: 80%;
     height: auto;
     margin: 0 auto;
     position: relative;
     z-index: 5;
     background: #fff;
     padding: 30px;
     text-align: left;
}

</style>