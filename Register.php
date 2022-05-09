<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <title>Register</title>
    <style>
      h1{text-align: center;}
    </style>
  </head>

  <body>
    <h1><b>회원 가입</b></h1>

    <form method="post" action='RegisterProcess.php'>
      <fieldset>
        <legend><b>회원 정보 입력</b></legend>
        <table align="center">
          <tr>
            <td style="padding-top: 15px; padding-bottom: 10px"><label for="input">이름</label></td>
            <td style="padding-left: 5px; padding-top: 15px; padding-bottom: 10px"><input id="name" name="name" type="text" autofocus placeholder="이름을 입력해주세요." required/></td>
          </tr>

          <tr>
            <td style="padding-top: 15px; padding-bottom: 15px"><label for="input">핸드폰</label></td>
            <td style="padding-left: 5px; padding-top: 15px; padding-bottom: 15px"><input id="phone" name="phone" type="text" autofocus placeholder="핸드폰 번호를 입력해주세요." required/></td>
          </tr>
          <tr>
            <td style="padding-top: 16px; padding-bottom: 15px"> <input type="submit" value="회원 등록"/></td>
          </tr>
        </table>
      </fieldset>
    </form>
  </body>
</html>
