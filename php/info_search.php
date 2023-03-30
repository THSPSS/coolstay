<?php
        //db 연결을 위한 파일 포함
        include "connect_db.php";

        //조회 폼에서 넘어온 값을 변수에 저장
        $input_name = $_POST['name'];

        $input_phone = $_POST['tel1'].$_POST['tel2'];


        //예약 정보 조회를 위한 sql 문장 선언
        //이름과 번호 모두가 충족되는 데이터를 조회하고 싶었으나 sql문에 문제가 생김(조금 더 알아보아야 함)
        $sql = "select * from reservation where phone='$input_phone' and name='$input_name' limit 1";

        // 조회한 결과들을 result에 저장
        //connect_db.php 에 있는 db 연결 정보와 sql 문을 실행시킨 결과를 result 변수에 저장
        $result = $conn->query($sql);


        //조회된 결과가 있을 경우
        if ($result->num_rows > 0) {        

            // 결과 값에 있는 값들을 각각 다른 변수에 저장
            while ($row = $result->fetch_assoc()) {
    
                $num = $row["num"];
                $name = $row["name"];
                //연락처 값에서 앞에 010은 제외
                $phone = substr($row["phone"],3);
                //$phone = $row["연락처"];
                $date = $row["date"];
                $time = $row["time"];
                $enquiry = $row["message"];
    
            }
        }
        //조회된 결과가 없을 경우
        else {
            echo (
                "<script>
                    alert('등록된 이름,전화번호와 일치하는 정보가 없습니다.');
                    location.href='../info_check.html';
                </script>
                ");
        }



        $sql = "select date_duration from management where date_duration order by date_duration limit 1";
        //select * from management where date_duration limit 1;

        $result = $conn->query($sql);
        if (!$result) {
            trigger_error('Invalid query: ' . $conn->error);
        }else if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
            
                $date_duration = $row["date_duration"];
            }
        }


        // 데이터베이스 닫기
        mysqli_close($conn);

?>


<!DOCTYPE html>
<html lang="ko">
<head>

    <script>
        var durationData = <?php echo json_encode($date_duration-1); ?>;
    </script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">




    <!-- custon css link -->
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/reservation.css">
    <link rel="stylesheet" href="../css/section8.css">

    <!-- custom js -->
    <script src="../js/reservation.js" defer></script>

    <!--jQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>



    <title>예약 확인 및 수정</title>
</head>
<body>


    <section class="section section9" id="section9">
            <div class="wrap s9-wrap">
                <h3>예약 정보</h3>
                <div class="s9-subtext">
                    <p>예약 번호 :<?=$num?></p>
                    <p>성함 : <?=$name?></p>
                    <p>연락처 : 010<?=$phone?></p>
                    <p>상담 날짜 : <?=$date?></p>
                    <p>상담 시간 :<?=$time?></p>
                    <p>상담 내용 :<?=$enquiry?></p>
                
                    <!-- 수정 클릭시 수정 폼이 나타남  -->
                    <button type="button" id="update-btn">수정</button>

                    <!-- 확인 클릭시 뒤로 가기 실행  -->
                    <button type="button" onclick="window.history.go(-1); return false;">확인</button>
                </div>
                

            
            <!-- 수정을 진행하고자 하는 폼 -->
            <form action="info_update.php?num=<?php echo $num; ?>" method="post" id="update_form" name="update_form" style="display: none;" >
            <h2>예약 수정</h2>

            <div class="form-wrap">

                <div class="form-wrap1">

                    <input type="text" class="name" id="name" name="name" placeholder="이름" 
                            required readonly value="<?=$name?>">


                    <div class="form-date-wrap">
                        <input type="text" class="dateInput" id="date" name="date" placeholder="상담날짜" required readonly value="<?=$date?>">
                        <span class="date-ico"></span>
                        <!--<img src="./images/calendar-2-line.svg" alt="">-->
                    </div>

                    <div class="calendar">

                        <div class="calendar-header">

                            <p class="lastMonth">&lt;</p>

                            <p class="yearMonth">
                                <span class="year"></span>년
                                <span class="month"></span>월
                            </p>
                            <p class="nextMonth">&gt;</p>

                        </div>


                            
                        <div class="calendar-body">

                            <div class="days">
                                <div class="day">일</div>
                                <div class="day">월</div>
                                <div class="day">화</div>
                                <div class="day">수</div>
                                <div class="day">목</div>
                                <div class="day">금</div>
                                <div class="day">토</div>
                            </div>

                            <div class="dates">
                            </div>

                            <div class="notice-calendar">
                                <div class="notice-circle"></div>
                                <p class="notice-calendar-text">예약 가능 시간</p>
                            </div>

                            
                        </div>
                        

                    </div>

                    
                    <div name="" class="form-time-wrap">
                        <input type="text" class="timeInput" id="time" name="time" placeholder="상담시간" required readonly value="<?=$time?>">
                        <span class="time-ico"></span>
                    </div>

                    <div id="time-table"></div>


                </div>


                <div class="form-wrap2">
                    <input type="text" class="tel1" id="tel1" name="tel1" value="010" readonly>
                    <input type="text" class="tel2" id="tel2" name="tel2" placeholder="'-'없이 숫자만 적어주세요."  
                    onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="8" required readonly value="<?=$phone?>"> 
                </div>
                <div class="form-wrap3">
                    <textarea type="text" class="etc" id="enquiry" name="enquiry" placeholder="기타 문의사항"><?=$enquiry?></textarea> <br/>
                    <button type="submit">수정</button>
                </div>

                </div>
            </form>
        </div>
    </section>



        <!-- 수정 클릭시 수정 폼 나옴 -->
        <!-- 한 번 더 클릭했을때는 없어짐 -->
        <script>
            let button = document.getElementById("update-btn");
            let form = document.getElementById("update_form");

            button.addEventListener("click", function() {
                if(form.style.display === "none") {
                    form.style.display = "block";
                } else {
                    form.style.display = "none";
                }
            });
        </script>

</body>
    




</html>
