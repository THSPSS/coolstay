<?php

// db 연결 파일이 없다면 자동으로 실행되지 않음(?)
require_once "connect_db.php";

// admin.php 에서 넘겨받은 변수 값을 새 변수 선언해서 대입
$num = $_GET['num'];


$sql = "delete from reservation where num=$num";


$result = $conn->query($sql);

mysqli_close($conn);

echo "
<script>
    location.href = 'admin.php';
</script>
";



?>