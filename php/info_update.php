<?php
    require_once("./message.php");

    include "connect_db.php";


    // 한국시간을 사용하기 위한 코드 설정
    date_default_timezone_set('Asia/Seoul');
    
    //요일 찾아내는 함수
    function getWeekday($date) {
        return date('w', strtotime($date));
    }

    //요일
    $weeks = array("일","월","화","수","목","금","토");

    //post로 고객이 쓴 내용을 받아 변수에 저장
    // $name = $_POST['name'];
    $num = $_GET['num'];
    $name = $_POST['name'];
    $tel = $_POST['tel1'].$_POST['tel2'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    //고객이 예약을 한때의 날과 시간
    $regist_day = date("Y-m-d (H:i)"); 


    // 월 화 수 목 ...  요일 값 저장
    $week_day = $weeks[getWeekday($date)];


    // 문의사항 안 적었을 경우
    if(isset($_POST['enquiry'])) {
    $enquiry = "고객님의 소중한 문의사항 감사합니다.";  
    }
    // 문의 사항 적었을 경우
    else{
    $enquiry = $_POST['enquiry'];
    }


    // 받아 온 날을 년 월 일로 나눔
    $date_modify = explode('-', $date);
    $year = $date_modify[0];
    $month = $date_modify[1];
    $day = $date_modify[2];

    // 수정(업데이트)을 위한 sql 문 선언
    $sql = "update reservation set date='$date', time='$time', message='$enquiry'";
    $sql .= "where num='$num'";


    $result = $conn->query($sql); 


    // 수정을 완료하고 닫아줌
    mysqli_close($conn); 


    // 수정이 성공적으로 완료되었을떄 알림톡을 보내낼수 있도록 success 
    if ($result == TRUE) {
    
        echo "success";

        //msg 설정
        $messages = array(
            // 템플릿 내에 변수가 없는 경우
            array(
                "to" => $tel,
                "from" => "01033528779",
                "kakaoOptions" => array(
                    "pfId" => "KA01PF22041206411o33TFWW9Sl71Ppp",
                    "templateId" => "KA01TP230131021123281rrfmvZhI5d3",
                    "variables" => array(
                        "#{name}" => $name,
                        "#{date}" => $month."월".$day."일"."(".$week_day.")",
                        "#{time}" => $time,
                        "#{enquiry}" => $enquiry,
                        "#{reserv_url}" => "jin13181.ivyro.net/coolstay/info_check.html",
                    ),
                    "disableSms" => TRUE // 문자로 대체발송되지 않도록 합니다.
                )
            ),
            // 계속해서 1만건 추가 가능.
        );


        send_messages($messages);

        echo("
            <script>
            alert('수정이 완료되었습니다.');
            location.href='../info_check.html';
            </script>
        ");

    }
    // 수정이 실패한 경우 Error: 구문으로 표시
    else{

        echo "Error:" . $sql . "<br>" . $conn->error;

    }


?>