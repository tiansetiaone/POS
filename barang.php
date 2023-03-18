<?php include('konfig.php'); 
error_reporting(0);?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NCI | BARANG</title>
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
                <div class="btn-group w-100 mb-3">
                  <a href="tambahbarang.php"><span class="btn btn-success col fileinput-button">
                    <i class="fas fa-plus"></i>
                    <span>Tambah Data Barang</span>
                  </span></a>
                </div>
                <form class="row">
                    <table class="table table-bordered border-primary">
                       <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Jenis</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Stok</th>
                        </tr>
                       </thead>
                       <tbody class="table-group-divider">
                        <?php
                        include 'konfig.php';
                        $query = "SELECT * FROM barang";
                        $exe = mysqli_query($conn,$query);
                        $no = 1;
                        while($row = mysqli_fetch_array($exe)){
                            $a = $row['nama_barang'];
                            $b = $row['jenis'];
                            $c = $row['harga'];
                            $d = $row['stok'];
                            echo "<tr><td>$no</td><td>$a</td><td>$b</td><td>$c</td><td>$d</td>";
                            $no++;
                        }
                        ?>
                       </tbody> 
                    </table>
                </form> 

            </div>
        </div>
        </div>
    </div>
</center>
</body>
</html>