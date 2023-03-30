<?php

//db 연결을 위한 파일 포함
// require_once = db 연결 파일이 없다면 자동으로 실행되지 않음(?)
require_once "php/connect_db.php";

//수정가능한 일수를 management에서 불러오기 위한 sql query 문 선언
$sql = "select date_duration from management where date_duration order by date_duration limit 1";
//select * from management where date_duration limit 1;

//sql 실행
$result = $conn->query($sql);

//수정일수가 불러옴
 if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
    
        $date_duration = $row["date_duration"];
    }
}

?>

<?php
    if(empty($_SESSION["id"])) session_start();
    if (isset($_SESSION["id"])) $id = $_SESSION["id"];
    else $id = "";
?>	


<!DOCTYPE html>
<html lang="ko">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/jquery.fullpage.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="./css/reservation.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/section1.css">
    <link rel="stylesheet" href="./css/section2.css">
    <link rel="stylesheet" href="./css/section3.css">
    <link rel="stylesheet" href="./css/section4.css">
    <link rel="stylesheet" href="./css/section5.css">
    <link rel="stylesheet" href="./css/section6.css">
    <link rel="stylesheet" href="./css/section7.css">
    <link rel="stylesheet" href="./css/section8.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="shortcut icon" href="images/favicon.ico"  type="image/x-icon">
    <script src="js/jquery-1.12.3.min.js"></script>
    <script src="js/jquery.fullpage.min.js"></script>
    <script src="js/common.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

    <title>파트너센터</title>
</head>
<body>
    <header class="header">
        <div class="header-wrap">
            <a href="#sec1"><div class="header-logo"></div></a>
            <nav id="gnb">
                <a href="https://apps.apple.com/kr/app/id1522616111"><div class="gnb-apple"></div></a>
                <a href="https://play.google.com/store/apps/details?id=com.pinestay.coolstay"><div class="gnb-android"></div></a>
                <a href="#sec8"><div class="gnb-book"><span>상담예약</span>
                    </div></a>
            </nav>
        </div>
    </header>

    <div id="main">
     <!--============섹션1==============-->
        <section class="section section1">
            <div class="wrap s1-wrap">
                <div class="s1-contents-wrap">
                    <h3 class="s1-title1-pc" >착한 숙박앱 꿀스테이는 숙박업주들의 요구사항으로 만들어 졌습니다.</h3>
                    <h3 class="s1-title1-tab">착한 숙박앱 꿀스테이는<br/> 숙박업주들의 요구사항으로 만들어 졌습니다.</h3>
                    <h2 class="s1-title2-pc">앞으로 착한 숙박앱 꿀스테이는 숙박업소 사장님들과<br/>
                        함께 발전하겠습니다.</h2>
                    <h2 class="s1-title2-tab">앞으로 착한 숙박앱 꿀스테이는<br/>숙박업소 사장님들과
                        함께 발전하겠습니다.</h2>    

                        <a class="s1-btn" href="#sec8">
                            <div class="s1-btn-txt">상담예약</div>
                        </a>
                </div>
            </div>
        </section>
         <!--============섹션2==============-->
        <section class="section section2">
            <div class="wrap s2-wrap">
                <h2>꿀스테이는 플랫폼만 배불리는<br/> 광고료 싸움을 지향하지 않습니다.</h2>
                <div class="s2-contents-wrap">
                    <div class="s2-c1-img" data-aos="fade-up" data-aos-delay="200" data-aos-duration="500">
                       
                    </div>
                    <p class="s2-c1-txt" data-aos="fade-left" data-aos-delay="200" data-aos-duration="500">고객이 원하는 검색 결과가 광고순이 아닌<br/>
                        거리순, 평점순, 가격순 등으로<br/>
                    <strong>"공정하고 정직하게"</strong> 노출이 됩니다.
                    </p>
                    
                    <div class="s2-c2-img" data-aos="fade-up" data-aos-delay="500" data-aos-duration="500" >
               
                    </div>
                    <p class="s2-c2-txt" data-aos="fade-right" data-aos-delay="200" data-aos-duration="500">꿀스테이는 사장님들의 의견을 최대한 반영한<br/> 
                        <strong>"사장님 맞춤형"</strong> 숙박 어플입니다.
                    </p>
                   
                    
                </div>
                
            </div>
        </section>
         <!--============섹션3==============-->
        <section class="section section3">
            <div class="wrap s3-wrap">

                    <h2 class="section3-title-pc">꿀스테이는 꿈이 아닌 현실을 제시합니다.</h2>
                    <h2 class="section3-title-m">꿀스테이는<br/> 꿈이 아닌 현실을 제시합니다.</h2>
                    
                        <div class="s3-c-img"></div>
                    <div class="s3-c-txt-wrap">
                        <div class="s3-c-txt s3-c-txt1" data-aos="fade-up" data-aos-delay="200" data-aos-duration="500">재방문율 <span>70%</span> 이상</div>
                        <div class="s3-c-txt s3-c-txt2" data-aos="fade-up" data-aos-delay="400" data-aos-duration="500">이용자 만족도 <span>★</span><span>4.9</span></div>
                        <div class="s3-c-txt s3-c-txt3" data-aos="fade-up" data-aos-delay="600" data-aos-duration="500">어플스토어 사용자 평점 <span>1위</span></div>
                        <div class="s3-c-txt s3-c-txt4" data-aos="fade-up" data-aos-delay="800" data-aos-duration="500">누적 다운로드 <span>10만</span>이상</div>
                    </div>
                        
                       
                    
                   
            </div>
        </section>
         <!--============섹션4==============-->
        <section class="section section4">
            <div class="wrap s4-wrap">
                <h2 class="s4-title-pc">꿀스테이가 사장님들께 제공해드립니다.</h2>
                <h2 class="s4-title-m">꿀스테이가<br/>사장님들께 제공해드립니다.</h2>

                <div class="s4-contents-wrap">
                    <div class="s4-c1-wrap" data-aos="zoom-out-down" data-aos-delay="200" data-aos-duration="500">
                        <h3>쉽고 간단하게 단골 관리하세요!</h3>
                        <p>단골관리의 시작부터 끝까지!<br/>
                        꿀스테이와 함께 하는 사장님들에게 새로운 홍보, 광고 기회를 제공합니다.</p>
                    </div>
                    <div class="s4-contents-wrap2">
                        <div class="s4-c2-wrap" data-aos="zoom-in-right" data-aos-delay="400" data-aos-duration="500">
                            <div class="s4-c2-title">
                                <h3>사장님 마음대로</h3>
                                <h3>자유롭게 사용하는 쿠폰</h3>
                            </div>
                            <div class="s4-c2-img"></div>
                        </div>
                        <div class="s4-c3-wrap" data-aos="zoom-in-up" data-aos-delay="600" data-aos-duration="500">
                            <h3>재방문의 이유,<br/>
                            단골 마일리지 시스템</h3>
                            <div class="s4-c3-img"></div>
                        </div>
                        <div class="s4-c4-wrap" data-aos="zoom-in-left" data-aos-delay="800" data-aos-duration="500">
                            <h3 class="s4-c4-title-pc">타업체보다 더 많이! 풍성한 적립금</h3>
                            <h3 class="s4-c4-title-tab">타업체보다 더 많이!<br/>풍성한 적립금</h3>
                            <div class="s4-c4-img"></div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
         <!--============섹션5==============-->
        <section class="section section5">
            <div class="wrap s5-wrap">
                <h2 class="s5-title-pc">꿀스테이가 사장님들께 제공해드립니다.</h2>
                <h2 class="s5-title-m">꿀스테이가<br/>사장님들께 제공해드립니다.</h2>

                <div class="s5-contents-wrap">
                    <div class="s5-c1-wrap" data-aos="zoom-out-down" data-aos-delay="200" data-aos-duration="500">
                        <h3>꿀스테이에서만 만나보는 제휴 혜택</h3>
                        <p>오직 꿀스테이와 함께하는<br/>
                        사장님들께 제공되는 다양한 혜택을 경험해보세요!</p>
                    </div>
                    <div class="s5-contents-wrap2">
                        <div class="s5-c2-wrap" data-aos="zoom-in-right" data-aos-delay="400" data-aos-duration="500">
                            <h3 class="s5-c2-title-pc">신규 등록자 이벤트 적용! 구간별 이용료 면제 <span>(30건 이하 예약시)</span></h3>
                            <h3 class="s5-c2-title-tab">신규 등록자<br/>이벤트 적용!<br/>구간별 이용료 면제</br>
                            <span>(30건 이하 예약시)</span></h3>
                            <div class="s5-c2-img"></div>
                        </div>
                        <div class="s5-c3-wrap" data-aos="zoom-in-up" data-aos-delay="600" data-aos-duration="500">
                            <h3>고화질, 고품질<br/>
                            무료 숙소 사진 촬영</h3>
                            <div class="s5-c3-img"></div>
                        </div>
                        <div class="s5-c4-wrap" data-aos="zoom-in-left" data-aos-delay="800" data-aos-duration="500">
                            <h3 class="s5-c4-title-pc">업체를 위한, 사장님을 위한
                                다양한 프로모션 이벤트<br/>
                                <span>(쿠폰 제공, 3개월 정액제 무료)</span></h3>
                            <h3 class="s5-c4-title-tab">업체를 위한,<br/>
                                사장님을 위한<br/>
                                다양한 프로모션 이벤트<br/>
                            <span>(쿠폰 제공, 3개월 정액제 무료)</span></h3>
                            <div class="s5-c4-img"></div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
         <!--============섹션6==============-->
         <section class="section section6">
            <div class="wrap s6-wrap">
                <h2>꿀스테이는 이렇게 홍보해 드립니다.</h2>

                <div class="s6-contents-wrap">
                    
                    <div class="s6-c1-wrap">
                        <div class="s6-c1-txt-wrap">
                            <h3>· 꿀혜택 기능</h3>
                            <p>사장님들이 등록한 이벤트를 적극적으로 홍보하고<br/>
                                거리순, 혜택순으로 분류하여 고객에게 보여집니다.<br/>
                                이벤트 홍보로 많은 고객들의 유입을 기대할 수 있습니다.</p>
                        </div>
                        <div class="s6-c1-img" data-aos="fade-left" data-aos-delay="200" data-aos-duration="500"></div>
                    </div>
                    
                    <div class="s6-c2-wrap">
                        <div class="s6-c2-txt-wrap">
                            <h3>· 내 주변 기능</h3>
                            <p>고객들의 실제 위치를 기반으로 숙소를<br/>
                                리스트로 보여주는 기능으로<br/>
                                광고비, 수수료 없이 가까운 거리순으로 나타납니다.<br/>
                                가성비 높은 광고 효과를 기대할 수 있습니다.</p>
                        </div>
                        <div class="s6-c2-img" data-aos="fade-left" data-aos-delay="500" data-aos-duration="500"></div>
                    </div>
                    
                </div>
            </div>
        </section>
         <!--============섹션7==============-->
         <section class="section section7">
            <div class="wrap s7-wrap">
                <h2 class="s7-title-pc">꿀스테이는 착한 숙박앱이 되기 위해 약속합니다.</h2>
                <h2 class="s7-title-m">꿀스테이는<br/> 착한 숙박앱이 되기 위해 약속합니다.</h2>
            <div class="s7-contents-wrap">
<div class="s7-contents-wrap-top">
                <div class="card-wrap1 card-wrap"> <!--그니깐은!! 각각의 카드에 대해 래퍼가 필요함-->
                    <!-- 앞 -->
                            <div class="s7-c1-front card-front ">
                                <div class="s7-c1-front-img"></div>
                                <h3 class="s7-c1-front-title-pc">부담없는 월 정액제 앱 이용료</h3>
                                <h3 class="s7-c1-front-title-tab">부담없는<br/> 월 정액제 앱 이용료</h3>
                            </div>
                    <!--뒤-->
                        <div class="s7-c1-back card-back">
                            <div class="s7-c1-b-txt-wrap">
                                <div class="s7-c1-b-txt">
                                    <p>31~50건</p>
                                    <p>10만원 <span class="small-txt">(부가세별도)</span></p>
                                </div>
                                <div class="s7-c1-b-txt">
                                    <p>51~150건</p>
                                    <p>30만원 <span class="small-txt">(부가세별도)</span></p>
                                </div>
                                <div class="s7-c1-b-txt">
                                    <p>150~</p>
                                    <p>50만원 <span class="small-txt">(부가세별도)</span></p>
                                </div>
                                
                                
                            </div>
                            <p class="small-txt small-txt-btm">PG수수료/알림톡 수수료 별도</p>
                                
                        </div>
                    </div><!--card-wrap1-->
    
                    <div class="card-wrap2 card-wrap"><!--그니깐은!! 각각의 카드에 대해 래퍼가 필요함-->
                        <!-- 앞 -->
                        <div class="s7-c2-front card-front">
                            <div class="s7-c2-front-img"></div>
                            <h3>별도의 광고비 <span> NO!</span></h3>
                        </div>
    
                        <!--뒤-->
                        <div class="s7-c2-back card-back">
                                <p>절감되는 광고비를 고객 서비스와<br/>
                                    숙박업소 시설 재투자에 사용하세요!</p>
                        </div>
                    </div><!--card-wrap2-->
</div>

<div class="s7-contents-wrap-btm">
                    <div class="card-wrap3 card-wrap"><!--그니깐은!! 각각의 카드에 대해 래퍼가 필요함-->
                        <!-- 앞 -->
                        <div class="s7-c3-front card-front ">
                            <div class="s7-c3-front-img"></div>
                            <h3>지역 카테고리 세분화</h3>
                        </div>
                    
                        <!--뒤-->
                        <div class="s7-c3-back card-back">
                            <p>구별, 동별 숙박업소 단지별로<br/>
                                카테고리를 세분화하여 최대한 많은 업소가<br/>
                                리스트 상단에 보여질 수 있도록 구성합니다.</p>
                        </div>
                    </div><!--card-wrap3-->

    
    
    
                    <div class="card-wrap4 card-wrap"><!--그니깐은!! 각각의 카드에 대해 래퍼가 필요함-->
                        <!-- 앞 -->
                        <div class="s7-c4-front card-front ">
                            <div class="s7-c4-front-img"></div>
                            <h3>부담되는 수수료 <span> NO!</span></h3>
                        </div>
    
                        <!--뒤-->
                        <div class="s7-c4-back card-back">
                            <p>별도의 예약 수수료가 없습니다.<br/>
                                정액제를 적용하여 업소 환경에 맞는<br/>
                                합리적인 금액으로 서비스를 제공합니다.</p>
                            <p class="small-txt">(카드 수수료 제외)</p>
                        </div>
                    </div><!--card-wrap4-->
</div>
                </div>
 
        </section>
     
         <!--============섹션8==============-->
         <section class="section section8" id="section8">
            <div class="wrap s8-wrap">
                <h3>시작하기 어려우신가요?</h3>
                <div class="s8-title-wrap">
                    <strong>
                      <img src="./images/header_logo.png">
                    </strong>
                    <p>에서 도움을 드립니다.</p>
                </div>
                    <form action="./php/test.php" method="post" name="apply" id="apply_form" class="apply_form">
                    
                    <h2>무료 상담신청</h2>


                    <div class="form-wrap">

                        <div class="form-wrap1">

                            <input type="text" class="name" id="name" name="name" placeholder="이름" required>

                            <div class="form-date-wrap">
                                <input type="text" class="dateInput" id="date" name="date" placeholder="상담날짜" required readonly>
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
                                <input type="text" class="timeInput" id="time" name="time" placeholder="상담시간" required readonly>
                                <span class="time-ico"></span>
                            </div>

                            <div id="time-table"></div>


                        </div>


                        <div class="form-wrap2">
                            <input type="text" class="tel1" id="tel1" name="tel1" value="010" readonly>
                            <input type="text" class="tel2" id="tel2" name="tel2" placeholder="'-'없이 숫자만 적어주세요."  
                            onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="8" required> 
                        </div>
                        <div class="form-wrap3">
                            <textarea type="text" class="etc" id="enquiry" name="enquiry" placeholder="기타 문의사항"></textarea> <br/>
                            
                            <div class="check-box-wrap">
                                <input type="checkbox" class="checkbox" id="checkbox" value="" required>
                                <span class="checkbox-text">개인정보 처리방침에 동의합니다.</span>
                                <span class="checkbox-text info-popup">(더보기)</span><br/>
                            </div>

                            <button type="submit" id="form-btn">무료 상담신청</button>
                            <button type="button" id="info-check-btn">예약 정보 확인 및 수정</button>

                            <!--pop up-->

                            <div class="notice-info-popup">
                                <div class="notice-info-container">
    
                                    <div class="info-list-header">
                                        <ul class="info-text-header">
                                        <li>꿀스테이 파트너센터 고객님께 정보 제공에 필요한 최소한의 개인정보를 수집하고 있습니다.</li> 
                                        <li>이에 개인정보의 수집 및 이용에 관하여 아래와 같이 안내 하오니 충분히 읽어 보신 후 동의하여 주시기 바랍니다.</li> 
                                        </ul>
                                    </div>
    
                                    <div class="info-list-first">
                                        <ul class="info-text">
                                            <li>1.개인정보 취급방침에 대한 동의 (필수)</li>
                                            <li>개인정보 수집 주체 : 꿀스테이</li>
                                            <li>개인정보 수집/이용 항목 : 이름, 연락처</li>
                                            <li>개인정보 수집/이용 목적 : 예약안내</li>
                                            <li>개인정보 동의를 거부할 권리 : 귀하께서는 개인정보 수집/이용을 거절할 수 있으며,
                                                거절하실 경우 정보 안내 등의 서비스를 제공해 드릴 수 없습니다.
                                            </li>
                                        </ul>
                                    </div>
    
                                    <div class="info-list-last">
                                        <ul class="info-text">
                                            <li>2.개인정보 수집 및 이용 기간 : </li>
                                            <li>회사는 개인정보수집 및 이용목적이 달성된 후에는 예외 없이 해당정보를 지체없이 파기합니다.</li>
                                        </ul>
                                    </div>
                                    
                                    <a class="notice-info-popup-btn">확인</a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>
        <footer class="footer">
        <div class="wrap footer-wrap">
                <div class="footer-wrap-L">
                    <div class="footer-t">
                        <img src="./images/footer-logo.svg" alt="coolstay">
                        <div class="footer-t-text">
                            <p>꿀쿠폰 쏟아지 착한 숙박앱</p>
                            <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 20010904//EN"
                                "http://www.w3.org/TR/2001/REC-SVG-20010904/DTD/svg10.dtd">
                                <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
                                width="517.000000pt" height="173.000000pt" viewBox="0 0 517.000000 173.000000"
                                preserveAspectRatio="xMidYMid meet">

                                <g transform="translate(0.000000,173.000000) scale(0.100000,-0.100000)"
                                fill="#ffffff" stroke="none">
                                <path d="M3693 1546 l-28 -24 -3 -553 c-2 -405 1 -561 9 -582 25 -61 117 -73
                                159 -20 20 25 20 37 20 585 l0 560 -29 29 c-38 37 -88 39 -128 5z"/>
                                <path d="M4998 1554 c-17 -9 -31 -28 -38 -52 -8 -25 -10 -207 -8 -574 l3 -536
                                24 -26 c43 -46 121 -47 167 -1 l24 24 0 561 0 562 -29 29 c-24 23 -38 29 -73
                                29 -24 -1 -55 -7 -70 -16z"/>
                                <path d="M3393 1526 l-28 -24 -3 -181 -3 -181 -65 0 c-84 0 -104 -18 -104 -94
                                0 -71 19 -86 107 -86 l63 0 0 -276 0 -276 29 -29 c22 -21 39 -29 66 -29 27 0
                                44 8 66 29 l29 29 0 542 0 542 -29 29 c-38 37 -88 39 -128 5z"/>
                                <path d="M156 1519 c-20 -16 -26 -29 -26 -58 0 -62 23 -75 149 -81 l106 -5 5
                                -83 c5 -76 7 -86 33 -108 59 -50 138 -19 153 60 10 59 -1 197 -19 232 -28 53
                                -66 64 -230 64 -131 0 -147 -2 -171 -21z"/>
                                <path d="M635 1515 c-27 -26 -31 -49 -16 -88 13 -34 58 -47 162 -47 l89 0 0
                                -65 c0 -74 18 -128 48 -144 38 -20 82 -13 113 18 29 29 29 31 29 143 0 94 -3
                                118 -20 145 -33 55 -61 63 -230 63 -147 0 -152 -1 -175 -25z"/>
                                <path d="M1812 1505 c-38 -17 -52 -48 -52 -118 0 -66 -34 -141 -83 -184 -20
                                -18 -99 -69 -174 -113 -76 -45 -144 -89 -150 -98 -27 -34 -5 -119 36 -142 11
                                -5 32 -10 47 -10 42 0 325 174 383 235 l47 50 45 -45 c42 -44 220 -160 329
                                -215 59 -30 88 -28 126 10 30 30 34 104 7 126 -10 8 -78 51 -152 95 -74 43
                                -153 97 -176 120 -48 46 -75 113 -75 186 0 62 -13 86 -55 104 -42 17 -61 17
                                -103 -1z"/>
                                <path d="M4332 1509 c-107 -21 -225 -104 -279 -197 -79 -134 -83 -305 -11
                                -446 31 -61 117 -145 179 -177 80 -40 172 -55 246 -41 182 37 313 173 345 361
                                40 232 -115 459 -341 501 -61 11 -78 11 -139 -1z m180 -227 c143 -88 138 -322
                                -8 -408 -142 -83 -314 29 -314 206 0 60 26 129 63 168 65 70 177 84 259 34z"/>
                                <path d="M2694 1491 c-72 -33 -74 -42 -74 -418 0 -408 6 -435 108 -485 43 -21
                                62 -23 239 -26 l192 -4 26 26 c32 32 34 92 4 130 l-20 26 -155 0 c-88 0 -164
                                4 -175 10 -17 10 -19 22 -19 110 l0 100 125 0 c120 0 127 1 150 25 29 29 34
                                88 9 123 -14 21 -22 22 -150 22 l-134 0 0 94 0 94 161 4 c155 3 161 4 180 27
                                25 31 25 101 0 132 -19 24 -22 24 -223 27 -181 2 -207 0 -244 -17z"/>
                                <path d="M20 1100 c-12 -12 -20 -33 -20 -55 0 -22 8 -43 20 -55 19 -19 33 -20
                                255 -20 l235 0 0 -36 c0 -54 44 -94 105 -94 25 0 55 5 66 10 24 13 49 61 49
                                95 l0 25 228 0 c264 0 272 2 272 74 0 81 38 76 -613 76 -564 0 -577 0 -597
                                -20z"/>
                                <path d="M172 787 c-28 -30 -29 -80 -2 -107 19 -19 33 -20 359 -20 369 0 366
                                1 359 -57 l-3 -28 -341 -5 c-373 -5 -364 -4 -385 -67 -16 -49 -7 -189 15 -231
                                21 -40 77 -78 136 -91 70 -16 712 -14 734 2 25 19 33 90 12 122 l-16 25 -328
                                0 c-280 0 -331 2 -350 16 -25 18 -29 59 -6 68 9 3 155 6 325 6 340 0 343 1
                                375 61 21 41 20 231 -2 269 -36 60 -34 60 -466 60 l-395 0 -21 -23z"/>
                                <path d="M1256 599 c-22 -18 -26 -28 -26 -74 0 -46 4 -56 26 -74 26 -21 35
                                -21 615 -21 576 0 589 0 609 20 15 15 20 33 20 73 0 28 -4 57 -8 63 -21 32
                                -51 34 -630 34 -571 0 -580 0 -606 -21z"/></g></svg>
                        </div>
                    </div>
                    <div class="footer-b">
                       <div class="footer-b-text">
                        <span>
                            <p>주식회사 파인스테이</p>
                            <p>서울특별시 서초구 서초대로46길38</p>
                            <p>Copyright © 2021 PINESTAY, all rights reserved.</p>
                          </span>
                       </div>
                   </div>
                </div>   
                   <div class="footer-b-ico">
                        <span>
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 9a3 3 0 1 0 0 6 3 3 0 0 0 0-6zm0-2a5 5 0 1 1 0 10 5 5 0 0 1 0-10zm6.5-.25a1.25 1.25 0 0 1-2.5 0 1.25 1.25 0 0 1 2.5 0zM12 4c-2.474 0-2.878.007-4.029.058-.784.037-1.31.142-1.798.332-.434.168-.747.369-1.08.703a2.89 2.89 0 0 0-.704 1.08c-.19.49-.295 1.015-.331 1.798C4.006 9.075 4 9.461 4 12c0 2.474.007 2.878.058 4.029.037.783.142 1.31.331 1.797.17.435.37.748.702 1.08.337.336.65.537 1.08.703.494.191 1.02.297 1.8.333C9.075 19.994 9.461 20 12 20c2.474 0 2.878-.007 4.029-.058.782-.037 1.309-.142 1.797-.331.433-.169.748-.37 1.08-.702.337-.337.538-.65.704-1.08.19-.493.296-1.02.332-1.8.052-1.104.058-1.49.058-4.029 0-2.474-.007-2.878-.058-4.029-.037-.782-.142-1.31-.332-1.798a2.911 2.911 0 0 0-.703-1.08 2.884 2.884 0 0 0-1.08-.704c-.49-.19-1.016-.295-1.798-.331C14.925 4.006 14.539 4 12 4zm0-2c2.717 0 3.056.01 4.122.06 1.065.05 1.79.217 2.428.465.66.254 1.216.598 1.772 1.153a4.908 4.908 0 0 1 1.153 1.772c.247.637.415 1.363.465 2.428.047 1.066.06 1.405.06 4.122 0 2.717-.01 3.056-.06 4.122-.05 1.065-.218 1.79-.465 2.428a4.883 4.883 0 0 1-1.153 1.772 4.915 4.915 0 0 1-1.772 1.153c-.637.247-1.363.415-2.428.465-1.066.047-1.405.06-4.122.06-2.717 0-3.056-.01-4.122-.06-1.065-.05-1.79-.218-2.428-.465a4.89 4.89 0 0 1-1.772-1.153 4.904 4.904 0 0 1-1.153-1.772c-.248-.637-.415-1.363-.465-2.428C2.013 15.056 2 14.717 2 12c0-2.717.01-3.056.06-4.122.05-1.066.217-1.79.465-2.428a4.88 4.88 0 0 1 1.153-1.772A4.897 4.897 0 0 1 5.45 2.525c.638-.248 1.362-.415 2.428-.465C8.944 2.013 9.283 2 12 2z"/></svg>
                        </a>
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 2C6.477 2 2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.879V14.89h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.989C18.343 21.129 22 16.99 22 12c0-5.523-4.477-10-10-10z"/></svg>
                        </a>
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M19.606 6.995c-.076-.298-.292-.523-.539-.592C18.63 6.28 16.5 6 12 6s-6.628.28-7.069.403c-.244.068-.46.293-.537.592C4.285 7.419 4 9.196 4 12s.285 4.58.394 5.006c.076.297.292.522.538.59C5.372 17.72 7.5 18 12 18s6.629-.28 7.069-.403c.244-.068.46-.293.537-.592C19.715 16.581 20 14.8 20 12s-.285-4.58-.394-5.005zm1.937-.497C22 8.28 22 12 22 12s0 3.72-.457 5.502c-.254.985-.997 1.76-1.938 2.022C17.896 20 12 20 12 20s-5.893 0-7.605-.476c-.945-.266-1.687-1.04-1.938-2.022C2 15.72 2 12 2 12s0-3.72.457-5.502c.254-.985.997-1.76 1.938-2.022C6.107 4 12 4 12 4s5.896 0 7.605.476c.945.266 1.687 1.04 1.938 2.022zM10 15.5v-7l6 3.5-6 3.5z"/></svg>
                        </a>
                        </span>
                   </div>
                </div>
        </footer>

        <script>
            AOS.init({
                disable: function() {
                var desktop = 1024;
                return window.innerWidth < desktop;
                }
            });
        </script>

    <!--db에서 받은 수정가능 일수를 변수에 담음-->
    <script>
        var durationData = <?php echo json_encode($date_duration-1); ?>;
    </script>
    <script src="js/reservation.js"></script>
    <script src="js/section8.js"></script>


    <!-- 예약 조회 및 수정 버튼을 클릭하였을때 info_check.html로 이동 -->
    <script>
        document.getElementById("info-check-btn").addEventListener("click", function(){
            window.location.href = "info_check.html";
        });
        
        
        var infoPopupShow = document.querySelector('.info-popup');
        var infoPopup = document.querySelector('.notice-info-popup')
        var infoBtn = document.querySelector('.notice-info-popup-btn');


        infoPopupShow.addEventListener("click",function(){
            infoPopup.classList.add('show');
        })

        infoBtn.addEventListener("click", function(){
            infoPopup.classList.remove('show');
        })

    </script>

</body>
</html>