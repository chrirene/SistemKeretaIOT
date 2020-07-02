<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Riwayat</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/Article-Clean.css">
    <link rel="stylesheet" href="assets/css/sidebar.css">

    <style>
      thead:hover{
        cursor:pointer;
        }
    </style>

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
        <li class="nav-item"><a class="nav-link text-left text-white py-1 px-0" href="status.php"><i class="fas fa-archive mx-3"></i><span class="text-nowrap mx-2">Status</span></a></li>
        <li class="nav-item"><a class="nav-link active text-left text-white py-1 px-0" href="riwayat.php"><i class="fas fa-chart-bar mx-3"></i><span class="text-nowrap mx-2">Riwayat</span></a></li>
        <li class="nav-item"><a class="nav-link text-left text-white py-1 px-0" href="daftarkartu.html"><i class="fas fa-sign-out-alt mx-3"></i><i class="fa fa-caret-right d-none position-absolute"></i><span class="text-nowrap mx-2">Daftar Kartu</span></a></li>
    </ul>
    <div class="container article-clean">
        <div class="row" style="background-color: #f5f5f5;">
            <div class="col-lg-10 col-xl-8 offset-lg-1 offset-xl-2">
                <div class="text-center intro">
                    <h1 class="text-center"><strong>Rancang Bangun Sistem Pemantau Kursi Otomatis pada Kereta Api Berbasis IoT</strong><br></h1>
                    <p class="text-center"> </p>
                </div>
                <div class="text"></div>
            </div>
        </div>
    </div>
    <div class="table-responsive table-bordered">
        <table id="tabelDataPenumpang" class="table table-bordered table-sm" bordercolor="#ff0000">
            <thead>
                <tr>
                    <th onclick="sortTable(0)">No</th>
                    <th onclick="sortTable(1)">NIK</th>
                    <th onclick="sortTable(2)"><br>Nama Penumpang<br></th>
                    <th onclick="sortTable(3)"><br>Nomor Kursi<br></th>
                    <th onclick="sortTable(4)"><br>Stasiun Asal<br></th>
                    <th onclick="sortTable(5)"><br>Stasiun Tujuan<br></th>
                    <th onclick="sortTable(6)"><br>Tanggal Keberangkatan<br></th>
                </tr>
            </thead>

            <tbody>

              <?php //connect to Database programme
                $conn = mysqli_connect("localhost", "root", "", "belitiketdb1");
                if ($conn-> connect_error) {
                    die("Connection failed:". $conn-> connect_error);
                      }

                $sql = "SELECT lognumber, idPenumpang, username, nokursi, stasiunAsal, stasiunTujuan, tanggal from riwayatpenumpang";
                $result = $conn-> query($sql);

                if ($result-> num_rows >0) {
                    while ($row = $result-> fetch_assoc()) {
                      echo "<tr>
                            <td>". $row["lognumber"]."</td>
                            <td>". $row["idPenumpang"]."</td>
                            <td>". $row["username"]."</td>
                            <td>". $row["nokursi"]."</td>
                            <td>". $row["stasiunAsal"]."</td>
                            <td>". $row["stasiunTujuan"]."</td>
                            <td>". $row["tanggal"]."</td>
                            </tr>";
                    }
                    echo "</table>";
                }
                else {
                  echo "0 result";
                }

                $conn-> close();
               ?>
            </tbody>
        </table>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/sidebar.js"></script>

    <!-------------------------------->
    <script>
       function sortTable(n) {
         var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
         table = document.getElementById("tabelDataPenumpang");
         switching = true;
         // Set the sorting direction to ascending:
         dir = "asc";
         /* Make a loop that will continue until
         no switching has been done: */
         while (switching) {
           // Start by saying: no switching is done:
           switching = false;
           rows = table.rows;
           /* Loop through all table rows (except the
           first, which contains table headers): */
           for (i = 1; i < (rows.length - 1); i++) {
             // Start by saying there should be no switching:
             shouldSwitch = false;
             /* Get the two elements you want to compare,
             one from current row and one from the next: */
             x = rows[i].getElementsByTagName("TD")[n];
             y = rows[i + 1].getElementsByTagName("TD")[n];
             /* Check if the two rows should switch place,
             based on the direction, asc or desc: */
             if (dir == "asc") {
               if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                 // If so, mark as a switch and break the loop:
                 shouldSwitch = true;
                 break;
               }
             } else if (dir == "desc") {
               if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                 // If so, mark as a switch and break the loop:
                 shouldSwitch = true;
                 break;
               }
             }
           }
           if (shouldSwitch) {
             /* If a switch has been marked, make the switch
             and mark that a switch has been done: */
             rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
             switching = true;
             // Each time a switch is done, increase this count by 1:
             switchcount ++;
           } else {
             /* If no switching has been done AND the direction is "asc",
             set the direction to "desc" and run the while loop again. */
             if (switchcount == 0 && dir == "asc") {
               dir = "desc";
               switching = true;
             }
           }
         }
       }
     </script>
     <!-------------------------------->

</body>

</html>
