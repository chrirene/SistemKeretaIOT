<?php //connect to Database programme





  $conn = mysqli_connect("localhost", "root", "", "belitiketdb1");
  if ($conn-> connect_error) {
      die("Connection failed:". $conn-> connect_error);
  } else {

    $collumn=1;
    while ($collumn <=20){
      $checkkursiA = mysqli_query($conn, "SELECT * From tabeldatapenumpang where nokursi=concat($collumn, 'A')");
      $checkkursiB = mysqli_query($conn, "SELECT * From tabeldatapenumpang where nokursi=concat($collumn, 'B')");
      $checkkursiC = mysqli_query($conn, "SELECT * From tabeldatapenumpang where nokursi=concat($collumn, 'C')");
      $checkkursiD = mysqli_query($conn, "SELECT * From tabeldatapenumpang where nokursi=concat($collumn, 'D')");

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
