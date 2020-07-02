<?php
$idPenumpang = $_POST['idPenumpang'];
$username = ucwords($_POST['username']);
$stasiunAsal = $_POST['stasiunAsal'];
$stasiunTujuan = $_POST['stasiunTujuan'];
$tanggal= $_POST['tanggal'];
$nokursi = $_POST['nomorBarisKursi'].$_POST['nomorKolomKursi'];
$statusPenumpang = 'Booked'; //status penumpang kalo udh beli tiket jadi booked

//validasi form semua terisi
if (empty($idPenumpang) || empty($username) || empty($stasiunAsal) || empty($stasiunTujuan) || empty($tanggal) || empty($nokursi)){
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

        //query insert data ke tabelDataPenumpang
        $INSERT = "INSERT into tabeldatapenumpang (idPenumpang, username, stasiunAsal, stasiunTujuan, tanggal, nokursi, statusPenumpang) value(?,?,?,?,?,?,?)";

        //query insert data ke riwayatpenumpang (history)
        $INSERTHISTORY = "INSERT into riwayatpenumpang (idPenumpang, username, stasiunAsal, stasiunTujuan, tanggal, nokursi) value(?,?,?,?,?,?)";

        //query untuk cek NIK sudah daftarin UID belom
        $checkUID =  mysqli_query($conn, "SELECT * From tabeldaftarkartu Where idPenumpang='$idPenumpang'");

        //query untuk cek nama penumpang sesuai sama NIK di tabel daftarkartu (supaya NIK, UID. dan nama yang didaftarkan cocok)
        $checkUsername =  mysqli_query($conn, "SELECT * From tabeldaftarkartu Where username='$username'");

        //query tidak ada nomor NIK duplicate
        $duplicateidPenumpang = mysqli_query($conn, "SELECT * From tabeldatapenumpang Where idPenumpang='$idPenumpang'");

        //query tidak ada nomor kursi yang duplicate
        $duplicatenokursi = mysqli_query($conn, "SELECT * From tabeldatapenumpang
          Where stasiunAsal='$stasiunAsal'
          and stasiunTujuan ='$stasiunTujuan'
          and tanggal= '$tanggal'
          and nokursi='$nokursi'");

      //pernyataan NIK belom daftar kartu
      if (mysqli_num_rows($checkUID)==0) {
        echo "NIK belum mendaftarkan nomor kartu";

        //pernyataan nama penumpang tidak sesuai NIK yang terdaftar
    }  elseif (mysqli_num_rows($checkUsername)==0) {
        echo "Nama penumpang tidak sesuai dengan NIK yang terdaftar!";

      //pernyataan jika NIK telah terdaftar di belitiket
    }  elseif (mysqli_num_rows($duplicateidPenumpang)==1) {
        echo "NIK telah terdaftar";

      //pernyataan jika kursi telah ditempati
    } elseif (mysqli_num_rows($duplicatenokursi)==1) {
        echo "Kursi sudah ditempati";

        //execute query
      } else {
        $stmt = $conn->prepare($INSERT);
        $stmt->bind_param("issssss", $idPenumpang, $username, $stasiunAsal, $stasiunTujuan, $tanggal, $nokursi, $statusPenumpang);
        $stmt->execute();

        $stmt = $conn->prepare($INSERTHISTORY);
        $stmt->bind_param("isssss", $idPenumpang, $username, $stasiunAsal, $stasiunTujuan, $tanggal, $nokursi);
        $stmt->execute();
        echo "new record input sucessfull";
      }
        $conn->close();
      }
    }
 ?>
