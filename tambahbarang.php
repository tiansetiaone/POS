<?php include('konfig.php'); 
error_reporting(0);
if (isset($_POST['Submit'])) {
    $nama_barang    = $_POST['nama_barang'];
    $jenis    = $_POST['jenis'];
    $harga          = $_POST['harga'];
    $stok        = $_POST['stok'];
    //validasi data data kosong
    if (empty($_POST['nama_barang'])||empty($_POST['jenis'])||empty($_POST['harga'])||empty($_POST['stok'])) {
        ?>
            <script language="JavaScript">
                alert('Data Harap Dilengkapi!');
                document.location='tambahbarang.php';
            </script>
        <?php
    }
    else {
    include 'konfig.php';
      //cek NIP di database
  $cek=mysqli_num_rows (mysqli_query($conn,"SELECT nama_barang FROM barang WHERE nama_barang='$_POST[nama_barang]'"));
  if ($cek > 0) {
  ?>
      <script language="JavaScript">
      alert('No Pengujian sudah dipakai!, silahkan ganti No Pengujian yang lain');
      document.location='tambahbarang.php';
      </script>
  <?php
  }
//     //Masukan data ke Table
    $input    ="INSERT INTO barang (nama_barang,jenis,harga,stok) VALUES ('$nama_barang','$jenis','$harga','$stok')";
    $query_input =mysqli_query($conn,$input);
    if ($query_input) {
    //Jika Sukses
    ?>
        <script language="JavaScript">
        alert('Input Data Berhasil');
        document.location='barang.php';
        </script>
    <?php
    }
    else {
    //Jika Gagal
    echo "Input Data Gagal!, Silahkan diulangi!";
    }
  //Tutup koneksi engine MySQL
    mysqli_close($conn);
    }
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NCI | PELANGGAN</title>
     <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="dist/css/font-awesome.min.css">
  <!-- Icon -->
  <link href='img/nuansa.png' rel='shortcut icon'>
  <script src="dist/js/jquery.min.js"></script>  
  <script src="dist/js/bootstrap.min.js"></script> 
</head>
<body>
<?php include('header.php') ?>
<center><h1><b>DATA BARANG</b></h1></center>
<center>
    <div class="col-md-7">
        <div class="card card-warning">
            <div class="card-header" style="background-color:aquamarine;">DATA BARANG
            </div>
            <div class="card-body">
                <form action="" method="POST" name="forminput">
                    <div class="label">
                        <label class="md-start">Nama Barang</label>
                        <input class="form-control" type="text" name="nama_barang" placeholder="Nama Barang" value="<?php echo $nama_barang;?>" require>
                    </div>
                    <div class="label">
                        <label class="md-start">Jenis Barang</label>
                        <input class="form-control" type="text" name="jenis" placeholder="Jenis Barang" value="<?php echo $jenis;?>" require>
                    </div>
                    <div class="label">
                        <label class="md-start">Harga Barang</label>
                        <input class="form-control" type="text" name="harga" placeholder="Harga Barang" value="<?php echo $harga;?>" require>
                    </div>
                    <div class="label">
                        <label class="md-start">Stok Barang</label>
                        <input class="form-control" type="text" name="stok" placeholder="Stok Barang" value="<?php echo $stok;?>" require>
                    </div>
                    <div class="row mt-3">
          <!-- /.col -->
          <div class="col-2">
            <button name="Submit" class="btn btn-primary btn-block">Simpan</button>
          </div>
          <!-- /.col -->
          </div>
                </form>

               
            </div>
        </div>
        </div>
    </div>
</center>
</body>
</html>