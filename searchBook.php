<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="charset=utf8">
    <title>Search Book</title>
    <style>
      h1{text-align: center;}
      table{
        margin-left: auto;
        margin-right: auto;
      }
    </style>
  </head>
  <body>
    <h1><b>도서 검색 결과</b></h1>
    <table width = 800 border = 1 cellpadding=10>
      <?php
      $input = $_POST['input']; //입력 텍스트 추출

      if(isset($_POST['submit'])){
        $option = $_POST['SearchOption'];
      }

      $connect=mysqli_connect("localhost", "root", "apmsetup", "korea_library");
      if($option == "title"){
        $sql = "select * from book where Title like '%$input%'";
      }

      else if($option == "author"){
        $sql = "select * from book where Author like '%$input%'";
      }

      else if($option == "publisher"){
        $sql = "select * from book where Publisher like '%$input%'";
      }

      else if($option == "genre"){
        $sql = "select * from book where Genre like '%$input%'";
      }

      $result=mysqli_query($connect, $sql);
      $fields=mysqli_num_fields($result);
      $rowN=mysqli_num_rows($result);

      if($rowN == 0){
        echo "<tr align = \"center\">";
        echo "<td colspan=\"1\">검색 결과가 없습니다.</td>";
        echo "</tr>";

        echo "<tr align = \"center\">";
        echo "<td style=\"padding-top: 10px\"> <input name=\"ok\" type=\"button\" value=\"처음으로\" onclick=\"document.location.href='main.php'\"/></td>";
        echo "</tr>";
      }

        else{
          echo "<tr align = \"center\" bgcolor = \"yellow\">";
          echo "<td>코드</td>";
          echo "<td>수량</td>";
          echo "<td>제목</td>";
          echo "<td>작가</td>";
          echo "<td>출판사</td>";
          echo "<td>장르</td>";
          echo "<td>대여</td>";
          echo "</tr>";

        while($row=mysqli_fetch_row($result)){
          echo "<tr align = \"center\"/>";
          echo "<form id = \"form_\" method = \"post\" action=\"Rental.php\"/>";

          for($i=0; $i<$fields; $i=$i+1){
            echo"<td>$row[$i]</td>";
          }

          echo "<td><input type=\"submit\" name=\"submit\" value=\"Rental\"/>";
          echo "<input name=\"code\" type=\"hidden\" value=\"$row[0]\"/></td>";
          echo "</form>";
          echo "</tr>";
        }
      }


      mysqli_close($connect);
      ?>
    </table>
  </body>
</html>
