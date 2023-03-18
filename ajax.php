<?php

//membuat koneksi ke database
include 'konfig.php';

//variabel nim yang dikirimkan form.php
$email = $_GET['email'];

//mengambil data
$query = mysqli_query($conn, "select * from users where email='$email'");
$input = mysqli_fetch_array($query);
$data = array(
            'level'      =>  @$input['level'],);

//tampil data
echo json_encode($data);
?>
