<?php

include "connect_db.php";


$uid = $_POST["uid"];
$upass = $_POST["upass"];


$sql = "select * from admin_member where id='$uid'";

$result = $conn->query($sql); 

//아이디가 있을경우
if ($result->num_rows > 0) {


    $row = mysqli_fetch_array($result);

    // 비밀번호 대조를 위한 과정
    $db_pass = $row["pass"];

    mysqli_close($conn);

    // 비밀번호가 틀릴 경우 알림창으로 알리고 뒤로 가기
    if($upass != $db_pass)
    {

       echo("
          <script>
            window.alert('비밀번호가 틀립니다!')
            history.go(-1)
          </script>
       ");
       exit;
    }
    // 비밀번호가 맞을 경우 admin.php 로 넘어감
    else
    {
        session_start();
        $_SESSION["id"] = $row["id"];

        echo("
          <script>
            location.href = 'admin.php';
          </script>
        ");
    }
//            location.href = 'admin.php';
}
// 아이디가 없을 경우
else {

    echo("
    <script>
      window.alert('등록되지 않은 아이디입니다!')
      history.go(-1)
    </script>
  ");

}

?>