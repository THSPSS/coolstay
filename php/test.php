<?php
/*
 * 한번 요청으로 1만건의 알림톡 발송이 가능합니다.
 * 템플릿 내용에 변수가 있는 경우 반드시 변수: 값 을 입력하세요.
 */
require_once("./message.php");

require_once('connect_db.php');

$tel1=$_POST['tel1'];
$tel2=$_POST['tel2'];
$tel=$tel1.$tel2; //php문자열 연결은 .으로 연결
$name=$_POST['name'];
$date=$_POST['date'];
$time=$_POST['time'];
$enquiry= $_POST['enquiry'];
$regist_day = date("Y-m-d (H:i)"); 




// 한국시간을 사용하기 위한 코드 설정;
date_default_timezone_set('Asia/Seoul');


//요일 찾아내는 함수
//고객이 선택한 날짜에 요일을 추가하여 주기 위함
function getWeekday($date) {
    return date('w', strtotime($date));
}

//요일을 넣어주려는 리스트 
$weeks = array("일","월","화","수","목","금","토");
// 월 화 수 목 ...  요일 값 저장
$week_day = $weeks[getWeekday($date)];



// 받아 온 날을 년 월 일로 나눔
$date_modify = explode('-', $date);
$year = $date_modify[0];
$month = $date_modify[1];
$day = $date_modify[2];



//휴대폰 날짜 시간이 중복인지 확인!
$sql = "select * from reservation where phone='$tel' and date='$date' and time='$time'";

$result = $conn->query($sql);

$num_record = mysqli_num_rows($result);



// 중복이라면
if ($num_record)
{
    echo ("<script>
        alert(`입력하신 번호는 해당 날짜 해당 시간에 이미 예약되었습니다.`);
        history.back();
    </script>");
}
else
{

$sql = "insert into reservation(name, phone, date, time, message , regist_day)";
$sql .= "values('$name', '$tel', '$date', '$time', '$enquiry','$regist_day')"; 


$result = $conn->query($sql);

mysqli_close($conn); 


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
echo ("<script>
alert(`예약이 완료되었습니다.`);
history.back();
</script>");
}
// 중복 수신번호를 허용하실 경우 아래와 같이 실행하시면 됩니다.
// print_r(send_messages($messages, true));