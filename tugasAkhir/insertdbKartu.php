<?php
// PHP SCRIPT BUAT INSERT DATA DARI DAFTAR KARTU
$UID = $_POST['UID'];
$idPenumpang = $_POST['idPenumpang'];
$username = ucwords($_POST['username']);

//validasi form semua terisi
if (empty($UID) || empty($idPenumpang) || empty($username)){
  echo "form tidak boleh kosong";
  die();

    //validasi NIK terdiri dari 16 digit dan tidak ada huruf
    } elseif (!is_numeric($idPenumpang) || strlen((string)$idPenumpang) !==16){
      echo "NIK tidak sesuai format, silahkan coba lagi";
    }else{
      //koneksi ke database
      $host = "localhost";
      $dbUsername = "root";
      $dbPassword = "";
      $dbname = "belitiketdb1";

      //create connection
      $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
      if (mysqli_connect_error()) {
        die ('Connection Error('. mysqli_connect_errno().')'.mysqli_connect_error());
        } else {

        // query INSERT data to database
        $INSERT = "INSERT into tabelDaftarKartu (UID, idPenumpang, username) value(?,?,?)";

        //query untuk cek tidak ada nomor UID dan NIK yang duplicate
        $duplicateUID = mysqli_query($conn, "SELECT * From tabelDaftarKartu Where UID='$UID'");
        $duplicateNIK = mysqli_query($conn, "SELECT * From tabelDaftarKartu Where idPenumpang='$idPenumpang'");

      //pernyataan jika UID atau NIK duplikat
      if (mysqli_num_rows($duplicateUID)==1) {
        echo "UID telah terdaftar";
      }
      elseif (mysqli_num_rows($duplicateNIK)==1) {
        echo "NIK telah terdaftar";

        //execute query
      } else {
        $stmt = $conn->prepare($INSERT);
        $stmt->bind_param("sss", $UID ,$idPenumpang, $username);
        $stmt->execute();
        echo "new record input sucessfull";
      }
        $conn->close();
      }
    }
 ?>
