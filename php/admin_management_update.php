<?php
// db 연결 파일이 없다면 자동으로 실행되지 않음(?)
require_once "connect_db.php";

$num = $_GET['num'];
$date_duration = $_POST['date_duration'];

// 수정(업데이트)을 위한 sql 문 선언
$sql = "update management set date_duration='$date_duration'";
$sql .= "where num='$num'";

$result = $conn->query($sql); 


// 수정을 완료하고 닫아줌
mysqli_close($conn); 



echo "
<script>
    location.href = 'admin.php';
</script>
";


?>