<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <title>Return...</title>
  </head>
  <style>
    table{
      margin-left: auto;
      margin-right: auto;
    }
  </style>
  <body>
    <?php
      $bookID = $_POST['bookID'];
      $rentID = $_POST['rentID'];
      $today = date("Ymd");

      $connect=mysqli_connect("localhost", "root", "apmsetup", "korea_library");

      $sql = "select * from book where BookCode = '$bookID'";
      $resultBook = mysqli_query($connect, $sql);
      $rowBook = mysqli_fetch_row($resultBook);

      $updateNum = $rowBook[1]+1;
      $sql = "update book set NumofBook = $updateNum where BookCode = '$bookID'";
      mysqli_query($connect, $sql);


      $sql = "select * from rental where RentID = '$rentID'";
      $resultRent = mysqli_query($connect, $sql);
      $rowRent = mysqli_fetch_row($resultRent);



      $time_now = strtotime($today);
      $time_target = strtotime($rowRent[1]);

      if($time_now > $time_target){
        $sql = "update member set Penalty = Penalty + 7 where MemID = '$rowRent[4]'";
        mysqli_query($connect, $sql);

        $sql = "delete from rental where RentID = '$rentID'";
        mysqli_query($connect, $sql);

        echo "<fieldset>";
        echo "<table>";
        echo "<tr align = \"center\">";
        echo "<td colspan=\"1\">반납이 완료되었습니다.</td>";
        echo "</tr>";

        echo "<tr align = \"center\">";
        echo "<td colspan=\"1\">연체되어 페널티가 7일 부과되었습니다.</td>";
        echo "</tr>";

        echo "<tr align = \"center\">";
        echo "<td style=\"padding-top: 10px\"> <input name=\"ok\" type=\"button\" value=\"처음으로\" onclick=\"document.location.href='main.php'\"/></td>";
        echo "</tr>";
        echo "</table>";
        echo "</fieldset>";
      }

      else{
        $sql = "delete from rental where RentID = '$rentID'";
        mysqli_query($connect, $sql);

        echo "<fieldset>";
        echo "<table>";
        echo "<tr align = \"center\">";
        echo "<td colspan=\"1\">반납이 완료되었습니다.</td>";
        echo "</tr>";

        echo "<tr align = \"center\">";
        echo "<td style=\"padding-top: 10px\"> <input name=\"ok\" type=\"button\" value=\"처음으로\" onclick=\"document.location.href='main.php'\"/></td>";
        echo "</tr>";
        echo "</table>";
        echo "</fieldset>";
      }
    ?>
  </body>
</html>
