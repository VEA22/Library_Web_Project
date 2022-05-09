<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <title>RentalProgress...</title>
  </head>
  <style>
    table{
      margin-left: auto;
      margin-right: auto;
    }
  </style>
</head>
  <body>
    <?php
      $memID = $_POST['memID'];
      $bookID = $_POST['code'];
      $today = date("Ymd");
      $timestamp = strtotime("+1 week");
      $dueDay = date("Ymd", $timestamp);

      $connect=mysqli_connect("localhost", "root", "apmsetup", "korea_library");

      $sql = "select * from member where MemID = '$memID'";
      $resultMem = mysqli_query($connect, $sql);
      $rowMem = mysqli_fetch_row($resultMem);
      $numMem = mysqli_num_rows($resultMem);

      if($numMem == 0){
        echo "<fieldset>";
        echo "<table>";
        echo "<tr align = \"center\">";
        echo "<td colspan=\"1\">잘못된 회원번호 입니다.</td>";
        echo "</tr>";

        echo "<tr align = \"center\">";
        echo "<td style=\"padding-top: 10px\"> <input name=\"ok\" type=\"button\" value=\"처음으로\" onclick=\"document.location.href='main.php'\"/></td>";
        echo "</tr>";
        echo "</table>";
        echo "</fieldset>";
      }


      else{
        if($rowMem[1]!=0){
          echo "<fieldset>";
          echo "<table>";
          echo "<tr align = \"center\">";
          echo "<td colspan=\"1\">연체 페널티가 부여되어있습니다.</td>";
          echo "</tr>";

          echo "<tr align = \"center\">";
          echo "<td style=\"padding-top: 10px\"> <input name=\"ok\" type=\"button\" value=\"처음으로\" onclick=\"document.location.href='main.php'\"/></td>";
          echo "</tr>";
          echo "</table>";
          echo "</fieldset>";
        }

        else{
          $sql = "select MAX(RentID) from rental";
          $resultRental = mysqli_query($connect, $sql);
          $numRental = mysqli_num_rows($resultRental);
          $rowRental = mysqli_fetch_row($resultRental);

          if($numRental == 0){
            $initRent = 0;
          }

          else{
            $initRent = $rowRental[0]+1;
          }

          $sql = "select * from book where BookCode = '$bookID'";
          $resultBook = mysqli_query($connect, $sql);
          $rowBook = mysqli_fetch_row($resultBook);

          $sql = "INSERT INTO rental VALUES ('$initRent', '$dueDay', '$today', '$bookID', '$memID')";
          mysqli_query($connect, $sql);


          $updateNum = $rowBook[1]-1;
          $sql = "update book set NumofBook = $updateNum where BookCode = '$bookID'";
          mysqli_query($connect, $sql);

          echo "<fieldset>";
          echo "<table>";
          echo "<tr align = \"center\">";
          echo "<td colspan=\"1\">도서 대출 처리가 완료되었습니다. 반납일은 대출일로부터 7일 후입니다.</td>";
          echo "</tr>";

          echo "<tr align = \"center\">";
          echo "<td style=\"padding-top: 10px\"> <input name=\"ok\" type=\"button\" value=\"확인\" onclick=\"document.location.href='main.php'\"/></td>";
          echo "</tr>";
          echo "</table>";
          echo "</fieldset>";
        }
      }

      //$sql = "select * from book where BookCode = '$bookID'";
      //$resultBook = mysqli_query($connect, $sql);

    ?>
  </body>
</html>
