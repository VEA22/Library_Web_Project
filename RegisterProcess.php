<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <title>RegisterProgress...</title>
  </head>
  <style>
    table{
      margin-left: auto;
      margin-right: auto;
    }
  </style>
  <body>
    <?php
      $phone = $_POST['phone'];
      $name = $_POST['name'];

      $connect=mysqli_connect("localhost", "root", "apmsetup", "korea_library");
      $sql = "select * from member where Phone = '$phone'";
      $resultMem = mysqli_query($connect, $sql);
      $numMem = mysqli_num_rows($resultMem);

      if($numMem > 0){
        echo "<fieldset>";
        echo "<table>";
        echo "<tr align = \"center\">";
        echo "<td colspan=\"1\">이미 등록된 전화번호입니다.</td>";
        echo "</tr>";

        echo "<tr align = \"center\">";
        echo "<td style=\"padding-top: 10px\"> <input name=\"back\" type=\"button\" value=\"처음으로\" onclick=\"document.location.href='main.php'\"/></td>";
        echo "</tr>";
        echo "</table>";
        echo "</fieldset>";
      }

      else{
        $sql = "select MAX(MemID) from member";
        $maxMem = mysqli_query($connect, $sql);
        $numMaxMem = mysqli_num_rows($maxMem);
        $rowMaxMem = mysqli_fetch_row($maxMem);

        if($numMaxMem == 0){
          $initMem = 0;
        }

        else{
          $initMem = $rowMaxMem[0] + 1;
        }

        $sql = "INSERT INTO member VALUES ('$initMem', '0', '$name', '$phone')";
        mysqli_query($connect, $sql);

        echo "<fieldset>";
        echo "<table>";
        echo "<tr align = \"center\">";
        echo "<td colspan=\"1\">회원 가입이 완료되었습니다!</td>";
        echo "</tr>";

        echo "<tr align = \"center\">";
        echo "<td colspan=\"1\">회원 번호 : $initMem</td>";
        echo "</tr>";

        echo "<tr align = \"center\">";
        echo "<td style=\"padding-top: 10px\"> <input name=\"ok\" type=\"button\" value=\"확인\" onclick=\"document.location.href='main.php'\"/></td>";
        echo "</tr>";
        echo "</table>";
        echo "</fieldset>";
      }
    ?>
  </body>
</html>
