<body onLoad="javascript:window.print()">

<?php 
session_start();
 
$koneksi = ($GLOBALS["___mysqli_ston"] = mysqli_connect("localhost",  "root",  "")) or die("Gagal koneksi ke server."); 
 
mysqli_select_db($GLOBALS["___mysqli_ston"], antrian) or die("Gagal membuka database."); 
 
$a= $_GET['id_proses']; 

include ('config.php');
              $query = "SELECT * FROM proses,mahasiswa,pengajuan,user where proses.nrp=mahasiswa.nrp and proses.id_pengajuan=pengajuan.id_pengajuan and proses.id_user=user.id_user and proses.id_proses='$a' ";
               
              $hasil = mysqli_query($GLOBALS["___mysqli_ston"], $query) or die("Gagal melakukan query.");
               
              while ($buff = mysqli_fetch_array($hasil)) {
               

?>

 <tr>
<table width="350" border="1" cellpadding="2" cellspacing="0" align="center">
<tr align="center">
<td  width="1000" colspan="2"><font  style="font-size:10px ;"> KEMENTRIAN RISET TEKNOLOGI DAN PENDIDIKAN TINGGI <br><font  style="font-size:11px ;"> INSTITUT PERTANIAN BOGOR  <br><font  style="font-size:14px ;"> <B>SEKOLAH PASCASARJANA</B> <BR><font  style="font-size:8px ;">
  Gedung Sekolah Pascasarjana Lt.1 Telp.0251-8622961/8622640/8425411 <br> Fax. 0251-8622986 Email: sps@ipb.ac.id <br>
  Kampus IPB Dramaga Bogor 16680</td></tr>
<td  align="center" width="200"colspan="2"> <font  style="font-size:10px ;"><b>LEMBAR PELAYANAN ADMINISTRASI AKADEMIK<br>
No.Reg :  <?php echo $buff['id_proses']; ?> </td>
<tr>
<td width="0"colspan="2"> <font  style="font-size:11px ;"><b> Nama   &nbsp&nbsp&nbsp: <?php echo $buff['nama']; ?> <br><font  style="font-size:10px ;">NRP  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <?php echo $buff['nrp']; ?> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Mayor &nbsp&nbsp&nbsp : <?php echo $buff['prodi']; ?>
  <br><font  style="font-size:10px ;">Program : <?php echo $buff['mayor']; ?> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Status SPP&nbsp :</td></tr>
<tr>
<td width="30"colspan="2"><font  style="font-size:11px ;"><b>Jenis Pengajuan : <?php echo $buff['nama_surat']; ?> </td></tr>
<tr>
<td width="30"colspan="2"><font  style="font-size:11px ;"><b>Ket:</B> <font  style="font-size:10px ;"> Dokumen yang tidak diambil dalam jangkan waktu 3 bulan terhitung pada &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsptanggal pengajuan, dokumen akan di musnahkan (kecuali ijazah dan transkrip) 
<br><font  style="font-size:11px ;"><b>Catatan :</B><?php echo $buff['keterangan']; ?> </td></tr>
<tr>
<td width="30" colspan="2" align="center"><font  style="font-size:12px ;"><b>Mahasiswa</td></tr>

<tr>
<td width="30"colspan="2"><font  style="font-size:11px ;"><b>Kritik/Saran :</B> <font  style="font-size:10px ;"><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><font  style="font-size:11px ;"><b><i><u>Tanda terima berkas ini harap dibawa saat pengambilan</td></tr>
<tr>
<td width="30"colspan="2"><font  style="font-size:11px ;"><b>Standart Waktu Adm :  <?php echo $buff['waktu']; ?> Hari Kerja </td>
<tr>
<tr>
<td width="30" colspan="2"><font  style="font-size:11px ;"><b>Tgl Pengajuan &nbsp&nbsp&nbsp&nbsp:  <?php $db_date = $buff['tanggal_pengajuan'];
$view_date = date("d-F-Y", strtotime($db_date));
 
echo $view_date; 
 ?> <br><font  style="font-size:11px ;"><b> Tgl Penyelesaian :  <?php $db_date = $buff['estimasi'];
$view_date1 = date("d-F-Y", strtotime($db_date));
 
echo $view_date1; 
 ?> </td>

<tr>
<td width="30" colspan="2"><font  style="font-size:11px ;"><b>Standar Waktu Adm :  <?php echo $buff['username']; ?> </td>

<?php }?>

