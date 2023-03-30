<?php
    session_start();

    if ( !isset($_SESSION["id"]) ) 
    {
        echo("
            <script>
            alert('관리자가 아닙니다! 관리자 권한으로 로그인해주세요');
            location.href='../index.php';
            </script>
        ");
                exit;
    }
?>




<!DOCTYPE html>

<html lang="ko">
<head> 
<meta charset="utf-8">
<title>파트너센터</title>

<!-- custon css link -->
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../css/reservation.css">
<link rel="stylesheet" href="../css/admin.css">



<!--jQuery-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>



</head>
<body> 
<section>
   	<div id="admin_box">

		<div class="admin-title">

			<h3 id="info_title">
				관리자 모드 > 예약 관리
			</h3>
			<a href="logout.php">로그아웃</a>
		</div>
	    <ul id="member_list">
				<li>
					<span class="col1">num</span>
					<span class="col2">name</span>
					<span class="col3">phone</span>
					<span class="col4">date</span>
					<span class="col5">time</span>
					<span class="col6">message</span>
					<span class="col7">regist_day</span>
					<span class="col8">delete</span>
				</li>


		<?php
			if (isset($_GET["page"]))
				$page = $_GET["page"];
			else
				$page = 1;

			//db 연결을 위한 파일 포함
			include "connect_db.php";



			$sql = "select * from reservation order by num desc";
			$result = $conn->query($sql);
			$total_record = mysqli_num_rows($result); // 전체 회원 수

			$scale = 2;

			// 전체 페이지 수($total_page) 계산 
			if ($total_record % $scale == 0)     
				$total_page = floor($total_record/$scale);      
			else
				$total_page = floor($total_record/$scale) + 1; 
			// 표시할 페이지($page)에 따라 $start 계산  
			$start = ($page - 1) * $scale;  
			$number = $total_record - $start;

			for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)
			{
				mysqli_data_seek($result, $i);
				// 가져올 레코드로 위치(포인터) 이동
				$row = mysqli_fetch_array($result);

      			// 하나의 레코드 가져오기
				$num = $row["num"];
				$name = $row["name"];
				//연락처 값에서 앞에 010은 제외
				$phone = $row["phone"];
				$date = $row["date"];
				$time = $row["time"];
				$question = $row["message"];
				$regist_day = $row["regist_day"];			
		?>


			
		<li>
			<form>
				<span class="col1"><?=$num?></span>
				<span class="col2"><?=$name?></a></span>
				<span class="col3"><?=$phone?></span>
				<span class="col4"><?=$date?></span>
				<span class="col5"><?=$time?></span>
				<span class="col5"><?=$question?></span>
				<span class="col6"><?=$regist_day?></span>
				<span class="col8"><p onclick="location.href='admin_reservation_delete.php?num=<?=$num?>'">삭제</p></span>
			</form>
		</li>	
			
<?php
   	   $number--;
   }
		
?>
	</ul>

	<ul id="page_num">

	<?php
	if ($total_page>=2 && $page >= 2)	
	{
		$new_page = $page-1;
		echo "<li><a href='admin.php?page=$new_page'>◀ 이전</a> </li>";
	}		
	else 
		echo "<li>&nbsp;</li>";

   	// 게시판 목록 하단에 페이지 링크 번호 출력
   	for ($i=1; $i<=$total_page; $i++)
   	{
		if ($page == $i)     // 현재 페이지 번호 링크 안함
		{
			echo "<li><b> $i </b></li>";
		}
		else
		{
			echo "<li><a href='admin.php?page=$i'> $i </a><li>";
		}
   	}
   	if ($total_page>=2 && $page != $total_page)		
   	{
		$new_page = $page+1;	
		echo "<li> <a href='admin.php?page=$new_page'>다음 ▶</a> </li>";
	}
	else 
		echo "<li>&nbsp;</li>";
?>
			</ul> <!-- page -->	
			<li><button onclick="location.href='admin.php'">목록</button></li>    	 	


	<!--예약가능 일자 수정 -->
	<div class="admin-management">
		<h3 class="management-title">관리자 모드 > 정보 관리</h3>

		<ul class="management-list">

			<li>
				<span class="col1">num</span>
				<span class="col2">date_duration</span>
				<span class="col2">edit</span>
			</li>


	<?php
			//db 연결을 위한 파일 포함
			$sql = "select * from management order by num desc";
			$result = $conn->query($sql);

			$total_record = mysqli_num_rows($result); // 전체 회원 수

			$number = $total_record;
			// 전체 예약 정보 모두를 불러오는 while 문 실행
			while ($row = $result->fetch_assoc()) {

				$num = $row["num"];
				$date_duration = $row["date_duration"];
			
	?>

			<li>
				<form method="post" action="admin_management_update.php?num=<?=$num?>">
					<span class="col1"><?=$num?></span>
					<span class="col2"><input type="text" name="date_duration" value="<?=$date_duration?>" required></span>
					<span class="col3"><button type="submit">edit</button></span>
				</form>
			</li>
	<?php
		$number--;

		mysqli_close($conn);   
		}
	?>	

		</ul>

	</div>



	</div> <!-- admin_box -->
</section> 



</body>
</html>
