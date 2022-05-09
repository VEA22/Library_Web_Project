<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <title>Korea_Library</title>
    <style>
      h1{text-align: center;}
      h3{text-align: right;}
    </style>
  </head>

  <body>
    <h1><b>도서관 웹에 오신 것을 환영합니다.</b></h1>
    <h3>2021-2 DB WEB Project</h3>
    <h3>2016270203</h3>
    <h3>최정대</h3>

    <form method="post" action='SearchBook.php'>
      <fieldset>
        <legend><b>도서 검색</b></legend>
        <table>
          <tr>

            <td style="padding-top: 15px; padding-bottom: 15px"><label for="input">검색</label></td>
            <td style="padding-left: 8px; padding-top: 15px; padding-bottom: 15px">
            <select name="SearchOption">
              <option value="title">제목</option>
              <option value="author">작가</option>
              <option value="publisher">출판사</option>
              <option value="genre">장르</option>
            </select>
            </td>
            <td style="padding-left: 4px; padding-top: 15px; padding-bottom: 15px"><input name="input" id="input" type="text"/></td>
            <td style="padding-left: 10px; padding-top: 15px; padding-bottom: 15px"> <input type="submit" name="submit" value="검색"/></td>
          </tr>
        </table>
      </fieldset>
    </form>
    <br>
    <br>
    <form method="post" action='SearchRental.php'>
      <fieldset>
        <legend><b>대여 조회/반납</b></legend>
        <table>
          <tr>
            <td style="padding-top: 15px; padding-bottom: 15px"><label for="input">대여 조회</label></td>
            <td style="padding-left: 15px; padding-top: 15px; padding-bottom: 15px"><input id="memID" name="memID" type="text" autofocus placeholder="회원번호를 입력해주세요." required/></td>
            <td style="padding-left: 10px; padding-top: 16px; padding-bottom: 15px"> <input type="submit" value="검색"/></td>
          </tr>
        </table>
      </fieldset>
      <br>
      <br>
      <fieldset>
        <legend><b>회원 가입</b></legend>
        <table align="center">
          <tr>
            <td style="padding-top: 10px; padding-bottom: 10px"> <input name="register" type="button" value="회원가입" onclick="document.location.href='Register.php'"/></td>
          </tr>
        </table>
      </fieldset>
    </form>
  </body>
</html>
