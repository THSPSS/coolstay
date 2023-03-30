
// 달력 보여주기 위한 코드
function renderCalendar(month, year) { 

    // 해당 달 첫날의 요일 추출
    let firstDayOfTheMonth = (new Date(year, month)).getDay();
    // 해당 달의 일수를 구함 / 윤년 계산 가능
    let daysInMonth = 32 - new Date(year, month,32).getDate();


    //날짜를 집어넣을 공간을 가져옴 : <div class="dates">
    let calendarDates = document.querySelector('.dates');
    //날짜를 집어넣을 공간에 innerHTML을 ''로 초기화해줌
    calendarDates.innerHTML = '';

    // 날짜를 1로 초기화
    let date = 1;

    //35번 반복하며 dates 밑에 달력 숫자를 넣을 프로세스
    for (let i = 0 ; i < 6 ; i++){
        for(let j = 0 ; j < 7 ; j++){

            let dateDiv = document.createElement("div");

            // 칸을 만들고 달의 첫 주이면서  1일이 시작되기 전이라면 "" 으로 div에 더한다
            if( i === 0 && j < firstDayOfTheMonth) {
                let dateNum = document.createTextNode("");

                dateDiv.appendChild(dateNum);

                calendarDates.appendChild(dateDiv);

            } 

            // 그 달의 총 날짜보다 date가 크다면 for 문을 빠져나감
            else if( date > daysInMonth) {

                break;
            }


            // 첫일부터 달의 총 일 수 안에 있다면 아래를 진행
            else {
                // date를 입력할 수 있게 진행
                let dateNum = document.createTextNode(date);

                // 만약 날짜가 오늘이라면
                if ( year === currentYear  && month === currentMonth  &&  date === currentDate) {
                    dateDiv.title = "today";
                }
                // dateDiv 에 dateNum 을 집어넣고
                dateDiv.appendChild(dateNum);
                // calendarDates 밑에 넣음
                calendarDates.appendChild(dateDiv);

                //달이 12월인 경우
                if(month == -1){
                    month = 11;
                }

                // date 에 해당하는 날짜를 id로 지정 
                dateDiv.id = `${year}-${String(month+1).padStart(2,'0')}-${String(date).padStart(2,'0')}`


                date++;


                // date 에 클래스는 date로 지정
                dateDiv.className = 'date';

                
            }
        }
    };
};





//다음 달 클릭 함수 선언
function nextMonth() {

    //유저가 html 문서내에서 클릭을 하였을때 아래의 함수 실행
    document.addEventListener('click', function(e){
        // 클래스 이름이 다음달을 가리키는 클래스 이름일 경우
        if(e.target.className === 'nextMonth') {
        
            // 밑에 코드가 순서대로 실행 
            // 기존에 있던 html 안에 있던 월과 연도를 가져와 숫자형으로 데이터를 바꾸어줌
            // 월에서 -1을 하여 변수에 넣어줌
            let nextMonth = Number(month.innerHTML)-1;
            let yearOfNextMonth = Number(year.innerHTML);           
            // 현재 달에서 1을 더하여 줌
            nextMonth += 1;

            //현재 달에 더한 달 숫자가 12인 경우에는 월은 0 즉 1월로로 만들어줌
            //연도에 1을 더해줌
            if (nextMonth === 12) {
                nextMonth = 0;
                yearOfNextMonth += 1;
            }

            
            month.innerHTML = `${nextMonth+1}`;// 렌더링 되는 숫자는 +1 이 되어 있어야 함
            year.innerHTML = `${yearOfNextMonth}`;//  연도 렌더링
            renderCalendar(nextMonth,yearOfNextMonth); // 캘린더 렌더링해주는 함수 실행

            availableDate(durationData); // 선택가능한 날짜 인지 확인해주는 함수 실행

            checkedDate(); // 고객이 선택한 날짜에 picked 클래스 더해주는 함수 실행

        }
    })
};




//이전 달을 클릭하였을때
function lastMonth() {

    //유저가 html 문서내에서 클릭을 하였을때 아래의 함수 실행
    document.addEventListener('click', function(e){

        // 클래스 이름이 이전달을 가리키는 클래스 이름일 경우
        if(e.target.className === 'lastMonth') {


            // 기존에 있던 html 안에 있던 월과 연도를 가져와 숫자형으로 데이터를 바꾸어줌
            // 월에서 -1을 하여 변수에 넣어줌
            let yearOfLastMonth = Number(year.innerHTML);
            let lastMonth = Number(month.innerHTML)-1;




            //현재 달에 더한 달 숫자가 1월인 경우에는 월은 11 즉 12월로로 만들어줌
            //연도에 1을 빼줌
            if (lastMonth == 0){
                let september = 12;

                lastMonth-=1;
                yearOfLastMonth -=1;

                year.innerHTML = `${yearOfLastMonth}`;
                month.innerHTML = `${september}`;
                
            }else{
                //1월이 아닌경우에 아래의 코드 실행
                //lastMonth 에서 -1을 해줌
                lastMonth-=1;
                year.innerHTML = `${yearOfLastMonth}`;
                month.innerHTML = `${lastMonth+1}`;
            }

            

            renderCalendar(lastMonth,yearOfLastMonth); // 캘린더 렌더링해주는 함수 실행
            checkedDate(); // 고객이 선택한 날짜에 picked 클래스 더해주는 함수 실행
            availableDate(durationData); // 선택가능한 날짜 인지 확인해주는 함수 실행

        }

    })

}



/** 클래스명과 아이디 명이 바뀔경우  변경 필요  */

//클릭시 날짜 배경색 스타일 변경과 시간 input 에 옮겨닮기
function checkedDate() {

    //사용자가 html 문서내에서 클릭을 하였을때 아래의 함수 실행
    document.addEventListener('click', function(e){

        
        let dateInput = document.getElementById('date'); // ****** 날짜를 집어넣는 input 태그를 id를 사용하여 선택함  : 변경 가능

        let wholeTime = document.querySelectorAll('.time'); // time 클래스명이 붙어있는 태그 모두를 선택
        let selectedDate = e.target.id; //사용자가 선택한 날짜(target)의 아이디를 가져옴


        //사용자이 클릭한 날짜가 선택이 가능하다면
        if(e.target.className === 'date available') { 
        
            //선택한 날짜(target)의 값 selectedDate를 가져와 날짜 칸에 넣어줌
            dateInput.value = selectedDate;

            console.log(dateInput.value);
            

            //오늘 날짜 데이터를 가져와 toISOString()를 이용하여 문자열로 변환시킨 값을 formattedDate에 넣어준다.
            let date = new Date();
            let formattedDate = date.toISOString().slice(0,10);
            let calendar = document.querySelector('.calendar');


            //사용자가 오늘 날짜를 클릭한 경우
            if(dateInput.value == formattedDate){
                checkTime();//checktime으로 현재 선택가능한 시간을 클릭가능하게 하는 함수 실행
            }else{
                //오늘 날짜가 아닌 경우 
                for ( let p = 0; p < wholeTime.length ; p++ ){
                    //혹시 time태그에 남아있을지도 모르는   unclickable 클래스를 지워주는 코드 실행
                    wholeTime[p].classList.remove("unclickable");
                }

            }

            // 기존에 선택되어져 있던 picked 클래스를 선택
            const selectedDates = document.getElementsByClassName("picked");


            for (let i = 0; i < selectedDates.length; i++) {

                //선택되어 있던 날짜들에 picked 클래스를 지워주는 과정 필요
                // 중복으로 picked 클래스가 들어가는 것을 막아줌. picked는 날짜 선택 창에서 하나만 선택되어 있어야 함
                selectedDates[i].classList.remove("picked");
                

            }
            // picked 클래스를 넣어줌
            e.target.classList.add("picked");
            calendar.classList.remove("opened");
        }
    })

}






// 날짜가 선택가능한지 아닌지 확인하는 함수
function availableDate(set_duration){


    //오늘 날짜를 가져와 'YYYY-MM-DD'의 형식으로 만들어 today_date 변수에 저장
    let today_console = new Date();
    let today_date = today_console.getFullYear()+'-'+(String(today_console.getMonth()+1).padStart(2,'0'))+'-'+today_console.getDate();


    // date 클래스들을 모두 선택해줌 
    let wholeDate = document.querySelectorAll('.date');


    // ****** 날짜를 집어넣는 input 태그를 id를 사용하여 선택함  : 변경 가능
    let dateInput = document.getElementById('date');


    //오늘 날짜 시간 계산하는 코드 실행
    let today_time = new Date().getTime();
    let duration = set_duration; // In Days 날짜로 환산 (변경가능)
    let availableDate = new Date().setTime(today_time + (duration * 24 * 60 * 60 * 1000));


    
    for ( let l = 0; l < wholeDate.length ; l++ ){
        let time = new Date(wholeDate[l].id).getTime(); // 날짜들에 해당하는 값을 시간으로 변환시킨 time 변수와 
        //let day_to_check = new Date(wholeDate[l].id).getDay(); //오늘 날짜에 해당하는 요일을 가져와 day_to_check 변수에 저장

        if(wholeDate[l].id != today_date && (time < today_time || time > availableDate) || (wholeDate[l].id == today_date && today_console.getHours()>= "21")){
            wholeDate[l].classList.add("unavailable")
            //선택이 불가능하게 만듬
        }
        // 위가 아닌경우에는
        else{
            wholeDate[l].classList.add("available")
            //선택이 가능함
        }

        
        //input date에 들어있는 데이터가 있다면 다시 달력에 렌더링하기
        if(dateInput.value == wholeDate[l].id){
            wholeDate[l].classList.add("picked");
        }

    }
}



//시간 렌더링
function renderTime(){
    // 상담 시작 시간은 10시 (변경 가능)
    let start_time = 10;
    // 상담이 마치는 시각은 오후 10시 ( 변경 가능)
    let end_time = 21;
    
    //시간을 렌더링할 수 있는 div 태그를 아이디를 사용하여 가져옴
    let timeTable = document.getElementById('time-table');
    // 가져온 부분은 초기화 시킴
    timeTable.innerHTML = "";

    // 10 부터 18까지 t를 1씩 증가시킴
    for (let t = start_time; t <= end_time ; t++){

        //만약 t가 12가 아닌 경우에는 
        if(t !== 12) {
            
            //div 를 만들고
            let timeDiv = document.createElement("div");

            let timeNum = document.createTextNode(`${t}:00`);
            timeDiv.appendChild(timeNum);

            // 만들어진 div에 아이디를 설정
            timeDiv.id = `${t}:00`;
            // 아이디 넣고 time이라는 클래스명을 넣어줌
            timeDiv.className = 'time';

            //시간을 렌더링할 수 있는 div 태그를 아이디를 사용하여 가져온 곳 밑에 만들어진 시간이 적혀진 div를 더해줌
            timeTable.appendChild(timeDiv);
        }
    }
}


const timeTable = document.getElementById("time-table");



timeTable.addEventListener("click", function(event) {
    const selectedCell = event.target;

    // 선택되어진 클래스명이 time 인 경우
    if (selectedCell.className === "time") {
        var section_9 = document.querySelector('.section9');

        //선택되어진 셀의 문자를 가져와 seletedTime에 넣음 , ex) 10:00 AM
        const selectedTime = selectedCell.textContent;
        
        let timepicker = document.getElementById("time");// ****** 시간을 집어넣는 input 태그를 id를 사용하여 선택함  : 변경 가능

        //시간을 집어넣는 input 태그에 값을 넣어줌 : AM, PM 과 같은 부분은 빼고 넣을 수 있도록 slice 함수 실행
        timepicker.value = selectedTime;

        console.log(timepicker.value)

        //seleted 클래스 이름이 붙은 셀을 모두 가져옴
        const selectedCells = document.getElementsByClassName("selected");
        // seleted는 한 번에 한곳에만 선택되어야 함
        // for 문을 사용하여 selected 클래스를 없애줌
        for (let i = 0; i < selectedCells.length; i++) {
            selectedCells[i].classList.remove("selected");
        }

        //selected를 넣어줌 , 즉 선택이 되어짐
        selectedCell.classList.add("selected");
        timeTable.classList.remove("opened");
        section_9.classList.add('active');

    }


});



//만약 선택한 날짜가 오늘 날짜라면 지나간 시간은 체크를 할수 없게 해야 함.
function checkTime(){
    // 시간들을 전부 선택한뒤
    let wholeTime = document.querySelectorAll('.time');

    // 오늘 날짜를 가져옴
    let checkDate = new Date();

    // 선택된 시간들을 for문을 사용하여 돌면서 시간 체크 실행
    for ( let p = 0; p < wholeTime.length ; p++ ){

        //시간 값을 가져옴
        var checkTime = wholeTime[p].id;
        
        //시간, 분으로 나누어줌
        checkDate.setHours(checkTime.split(":")[0]);
        checkDate.setMinutes(checkTime.split(":")[1]);
        checkDate.setSeconds(0);
        checkDate.setMilliseconds(0);



        //지금 시간 보다 태그에 있는 시간이 적다면
        //즉 시간이 지났으면
        if (checkDate.getTime() < Date.now()) {
            //선택이 안되게끔 클래스를 지정해줌
            wholeTime[p].classList.add("unclickable");
        }
        // if 문이 거짓으로 나온다면 시간이 아직 지나지 않았다는 것임

    }

}





/*
* 화면이 띄워지면 아래 줄들이 실행됨
*/

// 달력을 보여주기 위한 오늘 날짜 변수 설정 
let today = new Date();//오늘 날짜
let currentYear = today.getFullYear();//오늘 날짜에서 연도 추출
let currentMonth = today.getMonth();//오늘 날짜에서 달 추출: 자바스크립트에서 달은 0부터 시작하므로 +1을 해줌
let currentDate = today.getDate();//오늘 날짜에서 일 추출

let year = document.querySelector(".year"); // year tag 선택
let month = document.querySelector(".month"); // month tag 선택

year.innerHTML = `${currentYear}`; //year class tag 에 현재 연도 
month.innerHTML = `${currentMonth+1}`;//month class tag 에 현재 달





renderCalendar( currentMonth, currentYear);//최근 달과 최근 연도를 파라미터로 넘기면서 renderCalendar 라는 함수를 실행
nextMonth(); // 다음달 선택 함수도 실행
lastMonth(); // 이전달 선택 함수 실행

availableDate(durationData); // 날짜가 선택 가능한지 아닌지 알아내는 함수 실행
checkedDate(); // 날짜가 클릭되었을때 input time 에 반영하는 함수



renderTime(); // 시간을 렌더링하는 함수


//날짜 입력 칸이 클릭되었을때 
//달력 아이콘이 클릭되었을때로 변경가능
//변수 설정
var calendar_wrap = document.querySelector('.form-date-wrap');
var time_wrap = document.querySelector('.form-time-wrap');



calendar_wrap.addEventListener("click", function(){
    var time_table = document.getElementById('time-table');
    var calendar = document.querySelector('.calendar');



    if(time_table.classList.contains("opened")){
        time_table.classList.remove("opened");    
    } 

    calendar.classList.toggle("opened");
    

});



time_wrap.addEventListener("click", function(){

    var time_table = document.getElementById('time-table');
    var calendar = document.querySelector('.calendar');
    var arrow = document.querySelector('.time-ico');
    var section_9 = document.querySelector('.section9');

    if(calendar.classList.contains("opened")){
        calendar.classList.remove("opened");
    } 

    time_table.classList.toggle("opened");
    arrow.classList.toggle("up");
    section_9.classList.remove('active');


});


var timeInput = document.querySelector('.timeInput');

timeInput.addEventListener("focusout", function(){
    var section_9 = document.querySelector('.section9');
    section_9.classList.add('active');
});

// function(){
//     window.onclick = function(event) {
//         console.log("타임 클릭")
//         section_9.classList.add('fp-section', 'fp-table', 'active', 'fp-completely');
//     };
// }










