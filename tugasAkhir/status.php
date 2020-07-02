<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Status</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/Article-Clean.css">
    <link rel="stylesheet" href="assets/css/sidebar.css">
    <link rel="stylesheet" href="assets/css/tablestatus.css">
</head>

<body style="background-color: #f5f5f5;">


    <ul class="nav flex-column shadow d-flex sidebar mobile-hid">
          <li class="nav-item logo-holder">
          <a class="text-white float-right" id="sidebarToggleHolder" href="#"><i class="fas fa-bars" id="sidebarToggle"></i></a>
            <div class="text-center text-white logo py-4 mx-4">
              <a class="text-white text-decoration-none" id="title" href="#"><img src="assets/img/LOGO.png" alt="logo pnj" height="110" width="145"></a>
              <a class="text-white text-decoration-none" id="title" href="#">Politeknik Negeri Jakarta</a>
            </div>
        </li>
        <li class="nav-item"><a class="nav-link text-left text-white py-1 px-0" href="index.html"><i class="fas fa-tachometer-alt mx-3"></i><span class="text-nowrap mx-2">Beranda</span></a></li>
        <li class="nav-item"><a class="nav-link text-left text-white py-1 px-0" href="beliTiket.html"><i class="fas fa-user mx-3"></i><span class="text-nowrap mx-2"> Beli Tiket</span></a></li>
        <li class="nav-item"><a class="nav-link text-left text-white py-1 px-0" href="dataPenumpang.php"><i class="far fa-life-ring mx-3"></i><span class="text-nowrap mx-2">Data Penumpang</span></a></li>
        <li class="nav-item"><a class="nav-link active text-left text-white py-1 px-0" href="status.php"><i class="fas fa-archive mx-3"></i><span class="text-nowrap mx-2">Status</span></a></li>
        <li class="nav-item"><a class="nav-link text-left text-white py-1 px-0" href="riwayat.php"><i class="fas fa-chart-bar mx-3"></i><span class="text-nowrap mx-2">Riwayat</span></a></li>
        <li class="nav-item"><a class="nav-link text-left text-white py-1 px-0" href="daftarkartu.html"><i class="fas fa-sign-out-alt mx-3"></i><i class="fa fa-caret-right d-none position-absolute"></i><span class="text-nowrap mx-2">Daftar Kartu</span></a></li>
    </ul>
    <div class="container article-clean">
        <div class="row" style="background-color: #f5f5f5;">
            <div class="col-lg-10 col-xl-8 offset-lg-1 offset-xl-2">
                <div class="text-center intro">
                    <h1 class="text-center"><strong>Rancang Bangun Sistem Pemantau Kursi Otomatis pada Kereta Api Berbasis IoT</strong><br></h1>
                    <p class="text-center"> </p>
                </div>

<!--                                     editttttt -->
                <form action="status.php" method="POST">
                <table>
                  <tr>
                    <select name="stasiunAsal" style="margin-top: 9px; width: 200px; height: 25px;">
                      <option selected hidden value="">Pilih Kota Asal</option>
                      <option value="JKT">JKT</option>
                      <option value="BDG">BDG</option>
                      <option value="JGJ">JGJ</option>
                      <option value="SBY">SBY</option>
                      <option value="MLG">MLG</option>
                      <option value="SOLO">SOLO</option>
                    </select>
                  </tr>
                  <tr>
                    <select name="stasiunTujuan" style="margin-top: 9px; width: 200px; height: 25px;">
                      <option selected hidden value="">Pilih Kota Tujuan</option>
                      <option value="JKT">JKT</option>
                      <option value="BDG">BDG</option>
                      <option value="JGJ">JGJ</option>
                      <option value="SBY">SBY</option>
                      <option value="MLG">MLG</option>
                      <option value="SOLO">SOLO</option>
                    </select>
                  </tr>
                  <tr>
                    <input type="date" id="tanggal" name="tanggal" style="margin-top: 9px; width: 200px; height: 25px;"></div>
                  </tr>
                  <tr>
                    <button type="Submit" name="Submit" value="Submit" style="width: auto; height: 25px;">Submit</button>
                  </tr>
                </table>
                <br>


                <div class="table-responsive">
                  <table class="viewkereta">
                    <tr>
                      <td style="background-color:#a0e8bd"></td>
                      <td style="background-color:#e8e8a0"></td>
                      <td style="background-color:#a0bae8"></td>
                      <td style="background-color:#e8a0a0"></td>
                      <td style="background-color:#bcbcbc"></td>
                    </tr>
                    <tr>
                      <td style="width:90px">Kosong</td> <!--belum dibeli*/-->
                      <td style="width:90px">Booked</td> <!--sudah dibeli/-->
                      <td style="width:90px">CheckedIn</td> <!--sudah beli dan tap/-->
                      <td style="width:90px">Seated</td> <!--sudah beli, tapping dan duduk/-->
                      <td style="width:90px">undefined</td> <!--belum beli namun ditempati/-->
                    </tr>
                  </table>
                  <br>
                </div>

            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="viewkereta">
            <thead>
                <tr>
                    <th>A</th>
                    <th>B</th>
                    <th></th>
                    <th>C</th>
                    <th>D</th>
                </tr>
            </thead>
            <tbody>

              <!-- QUERY UNTUK LOOPING STATUS KURSI PENUMPANG BIAR WARNA WARNI HEHE -->
              <?php //connect to Database programme

              //if (isset($_POST)) {
                // code...
            //  }
            $stasiunAsal="";
            $stasiunTujuan="";
            $tanggal="";

            if (isset($_POST['stasiunAsal'])) {
              // code...
              $stasiunAsal = $_POST['stasiunAsal'];
              $stasiunTujuan = $_POST['stasiunTujuan'];
              $tanggal = $_POST['tanggal'];
              echo "<p align='center'>Showing result for $stasiunAsal $stasiunTujuan $tanggal</p>";

            }

                $conn = mysqli_connect("localhost", "root", "", "belitiketdb1");
                if ($conn-> connect_error) {
                    die("Connection failed:". $conn-> connect_error);
                } else {

                  $collumn=1;
                  while ($collumn <=20){
                    $checkkursiA = mysqli_query($conn, "SELECT * From tabeldatapenumpang
                      where stasiunAsal='$stasiunAsal'
                      and stasiunTujuan ='$stasiunTujuan'
                      and tanggal= '$tanggal'
                      and nokursi=concat($collumn, 'A')");
                    $checkkursiB = mysqli_query($conn, "SELECT * From tabeldatapenumpang
                      where stasiunAsal='$stasiunAsal'
                      and stasiunTujuan ='$stasiunTujuan'
                      and tanggal= '$tanggal'
                      and nokursi=concat($collumn, 'B')");
                    $checkkursiC = mysqli_query($conn, "SELECT * From tabeldatapenumpang
                      where stasiunAsal='$stasiunAsal'
                      and stasiunTujuan ='$stasiunTujuan'
                      and tanggal= '$tanggal'
                      and nokursi=concat($collumn, 'C')");
                    $checkkursiD = mysqli_query($conn, "SELECT * From tabeldatapenumpang
                      where stasiunAsal='$stasiunAsal'
                      and stasiunTujuan ='$stasiunTujuan'
                      and tanggal= '$tanggal'
                      and nokursi=concat($collumn, 'D')");

                echo "<tr>";

                if (mysqli_num_rows($checkkursiA)==1) {
                  echo "<td style=\"background-color:#e8e8a0\"></td>";
                }else {
                  echo "<td style=\"background-color:#a0e8bd\"></td>";
                }

                if (mysqli_num_rows($checkkursiB)==1) {
                  echo "<td style=\"background-color:#e8e8a0\"></td>";
                }else {
                  echo "<td style=\"background-color:#a0e8bd\"></td>";
                }

                echo "<td><b><align center>$collumn</align center></b></td>";

                if (mysqli_num_rows($checkkursiC)==1) {
                  echo "<td style=\"background-color:#e8e8a0\"></td>";
                }else {
                  echo "<td style=\"background-color:#a0e8bd\"></td>";
                }

                if (mysqli_num_rows($checkkursiD)==1) {
                  echo "<td style=\"background-color:#e8e8a0\"></td>";
                }else {
                  echo "<td style=\"background-color:#a0e8bd\"></td>";
                }
                  $collumn++;
                  }
                }
                echo "</table>";
                $conn-> close();
               ?>

            </tbody>
        </table>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/sidebar.js"></script>
</body>

</html>
