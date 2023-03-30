<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>admin-login</title>

    <!--IconScout-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">



    <!-- custon css link -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/reservation.css">
    <link rel="stylesheet" href="../css/admin_login_form.css">

    <!--input check-->
    <script>
        function check_input(){

            if(!document.login_form.uid.value){
                alert("아이디를 입력하세요");
                document.login_form.uid.focus();
                return;
            }
            if(!document.login_form.upass.value){
                alert("비밀번호를 입력하세요");
                document.login_form.upass.focus();
                return;
            }

            document.login_form.submit();
        }
    </script>
</head>
<body>


    <section class="login">

        <div class="container">

            <div class="login-wrapper">

                <h2 class="login-title">로그인</h2>

                <form action="admin_login.php" class="login_form" name="login_form" method="post">

                    <div class="input-wrapper">
                        <label for="uid">아이디</label>
                        <input type="test" name="uid" id="uid">
                        <i class="uil uil-user"></i>
                    </div>

                    <div class="input-wrapper">
                        <label for="upass">패스워드</label>
                        <input type="password" name="upass" id="upass">
                        <i class="uil uil-lock"></i>
                    </div>

                    <div class="input-wrapper">
                        <button type="button" class="form-btn btn-primary" onclick="check_input()">로그인</button>
                    </div>

                </form>

            </div>

        </div>

    </section>


</body>
</html>