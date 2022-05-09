<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Search Rental</title>
    <style>
      h1{text-align: center;}
      table{
        margin-left: auto;
        margin-right: auto;
      }
    </style>
  </head>
  <body>
    <h1><b>대여 조회 결과</b></h1>
    <table width = 800 border = 1 cellpadding=10>
      <?php
        $memID = $_POST['memID'];
        $connect=mysqli_connect("localhost", "root", "apmsetup", "korea_library");

        $sql = "select * from member where MemID = '$memID'";
        $resultMem = mysqli_query($connect, $sql);
        $rowMem = mysqli_fetch_row($resultMem);
        $numMem = mysqli_num_rows($resultMem);

        if($numMem == 0){
          echo "<tr align = \"center\">";
          echo "<td colspan=\"1\">잘못된 회원번호 입니다.</td>";
          echo "</tr>";

          echo "<tr align = \"center\">";
          echo "<td style=\"padding-top: 10px\"> <input name=\"ok\" type=\"button\" value=\"처음으로\" onclick=\"document.location.href='main.php'\"/></td>";
          echo "</tr>";
        }

        else{
          $sql = "select * from rental where MemID = '$memID'";
          $resultRent = mysqli_query($connect, $sql);
          $numRental = mysqli_num_rows($resultRent);

          if($numRental == 0){
              echo "<tr align = \"center\">";
              echo "<td colspan=\"1\">대여 중인 도서가 없습니다.</td>";
              echo "</tr>";

              echo "<tr align = \"center\">";
              echo "<td style=\"padding-top: 10px\"> <input name=\"ok\" type=\"button\" value=\"처음으로\" onclick=\"document.location.href='main.php'\"/></td>";
              echo "</tr>";
            }

            else{
              echo "<tr align = \"center\" bgcolor = \"skyblue\">";
              echo "<td>대여번호</td>";
              echo "<td>반납일</td>";
              echo "<td>대여일</td>";
              echo "<td>책제목</td>";
              echo "<td>반납</td>";
              echo "</tr>";

              while($rowRental=mysqli_fetch_row($resultRent)){
                echo "<tr align = \"center\"/>";
                echo "<form id = \"form_\" method = \"post\" action=\"Return.php\"/>";

                $sql = "select * from book where BookCode = '$rowRental[3]'";
                $resultBook = mysqli_query($connect, $sql);
                $rowBook = mysqli_fetch_row($resultBook);
                $bookName = $rowBook[2];

                for($i=0; $i<3; $i=$i+1){
                  echo"<td>$rowRental[$i]</td>";
                }

                echo"<td>$bookName</td>";

                echo "<td><input type=\"submit\" name=\"submit\" value=\"반납\"/>";
                echo "<input name=\"bookID\" type=\"hidden\" value=\"$rowRental[3]\"/>";
                echo "<input name=\"rentID\" type=\"hidden\" value=\"$rowRental[0]\"/></td>";
                echo "</form>";
                echo "</tr>";
              }
            }
          }
       ?>
    </table>
  </body>
</html>
