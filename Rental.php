<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="charset=utf8">
    <title>Rental Book</title>
    <style>
      h1{text-align: center;}
      table{
        margin-left: auto;
        margin-right: auto;
      }
    </style>
  </head>
  <body>
    <h1><b>도서 대여</b></h1>
      <?php
      $bookID = $_POST["code"];

      $connect = mysqli_connect("localhost", "root", "apmsetup", "korea_library");
      $sql = "select * from book where BookCode = '$bookID'";
      $resultBook = mysqli_query($connect, $sql);
      $rowBook = mysqli_fetch_row($resultBook);

      if($rowBook[1] == 0){
        echo "<fieldset>";
        echo "<table>";
        echo "<tr align = \"center\">";
        echo "<td colspan=\"1\">선택한 책의 잔여 권수가 없습니다.</td>";
        echo "</tr>";

        echo "<tr align = \"center\">";
        echo "<td style=\"padding-top: 10px\"> <input name=\"back\" type=\"button\" value=\"이전으로\" onclick=\"document.location.href='main.php'\"/></td>";
        echo "</tr>";
        echo "</table>";
        echo "</fieldset>";
      }

      else{
        echo "<fieldset>";
          echo "<legend><b>대여할 책 정보</b></legend>";
            echo "<table>";
              echo "<tr>";
                echo "<td style=\"padding-top: 5px; padding-bottom: 5px\"><label for=\"input\">제목: </label></td>";
                echo "<td style=\"padding-top: 5px; padding-bottom: 5px\"><label for=\"input\">$rowBook[2]</label></td>";
              echo "</tr>";
              echo "<tr>";
                echo "<td style=\"padding-top: 5px; padding-bottom: 5px\"><label for=\"input\">작가: </label></td>";
                echo "<td style=\"padding-top: 5px; padding-bottom: 5px\"><label for=\"input\">$rowBook[3]</label></td>";
              echo "</tr>";
              echo "<tr>";
                echo "<td style=\"padding-top: 5px; padding-bottom: 5px\"><label for=\"input\">장르: </label></td>";
                echo "<td style=\"padding-top: 5px; padding-bottom: 5px\"><label for=\"input\">$rowBook[5]</label></td>";
              echo "</tr>";
              echo "<tr>";
                echo "<td style=\"padding-top: 5px; padding-bottom: 5px\"><label for=\"input\">출판사: </label></td>";
                echo "<td style=\"padding-top: 5px; padding-bottom: 5px\"><label for=\"input\">$rowBook[4]</label></td>";
              echo "</tr>";
            echo "</table>";
        echo "</fieldset>";


        echo "<br>";
        echo "<br>";

        echo "<form method=\"post\" action=\"RentalProcess.php\">";
          echo "<fieldset>";
            echo "<legend><b>대여정보 입력</b></legend>";
            echo "<table>";
              echo "<tr>";
                echo "<td style=\"padding-top: 15px; padding-bottom: 15px\"><label for=\"input\">회원번호 입력</label></td>";
                echo "<td style=\"padding-left: 15px; padding-top: 15px; padding-bottom: 15px\"><input id=\"memID\" name=\"memID\" type=\"text\" autofocus placeholder=\"회원번호를 입력해주세요.\" required/></td>";
                echo "<td style=\"padding-left: 10px; padding-top: 16px; padding-bottom: 15px\"> <input type=\"submit\" value=\"대여\"/></td>";
                echo "<td><input name=\"code\" type=\"hidden\" value=\"$rowBook[0]\"/></td>";
              echo "</tr>";
            echo "</table>";
          echo "</fieldset>";
        echo "</form>";
      }
  ?>

  </body>
</html>
