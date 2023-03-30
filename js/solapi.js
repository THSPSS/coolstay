
//API 키
const api_key = 'NCSJTUHVWWQ0EWKT'
//api secret
const api_secret = 'AU16IKRS7CVUPXXWOWP3ECGMEFBB7VCQ'

//header
function getAuthorization(){
    let salt = getSalt(); //랜덤값 30자
    let date = getDate(); //오늘 날짜
    let value = date + salt; //오늘날짜 + 랜덤값 30자
    let signature = getSignature(value, api_secret);
    let authoriztion = 'HMAC-SHA256 apiKey='+api_key+', date='+date+', salt='+salt+', signature='+signature; //솔라피 서버에서 확인함
    return authoriztion;
}

//salt 랜덤 값 30자 생성
function getSalt(){
    var result = '';
    var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for ( var i = 0; i < 30; i++ ) {
        //랜덤한 값을 생성한다.
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
   }
   return result;
}

// 오늘 날짜 가져오기
function getDate(){
    let today = new Date();
    return today.toISOString();
}

// 시그니처 헤더 검증
// 이렇게 만들어달라고 솔라피 측에서 요청한거임. 이렇게 안하면 솔라피에서 검증이 안됨
// 내가 암호화해서 넘기면 솔라피에서 암호가 맞나 확인 머 글케 흘러가는듯
function getSignature(value, key){
    let signature = CryptoJS.HmacSHA256(value, key); //암호화하는거래
    return signature;
}

var request;

/*==============================================*/ 

    //알림톡 보내기
    function btn_sendMessage(){
        //가져와서 변수에 담아
        //알림톡 정보 가져오기

        let name = document.querySelector(".name").value;
        let tel = document.querySelector(".tel1").value + document.querySelector(".tel2").value;
        let date = document.querySelector('.dateInput').value;
        let time = document.querySelector('.timeInput').value;
        let enquiry = document.querySelector('.etc').value;
        let templateId = "KA01TP230119022642923Eu92xiYuiJ5";
        let pfid = "KA01PF22041206411o33TFWW9Sl71Ppp";

        // 가져온 알림톡 정보 콘솔로 확인
        console.log(name);
        console.log(tel);
       

        //solapi.js-> sendMessage호출
        sendMessage(name, tel, date, time, enquiry, pfid, templateId); //파라미터로 넘겨
    }
/*============================================*/ 

//알림톡 보낸다
function sendMessage(name, tel, date, time, enquiry, pfid, templateId){ //파라미터로 받아
    let url = 'https://api.solapi.com/messages/v4/send'; //메세지를 보낸다.

    request = new XMLHttpRequest();

    if(!request){
        alert('request create fail');
        return;
    }

    let authoriztion = getAuthorization();

    request.onreadystatechange = requestResult;
    request.open('POST', url);
    request.setRequestHeader("Content-Type", "application/json");
    request.setRequestHeader("Authorization", authoriztion);

    //JSON 형태로 형식 지켜서
    //템플릿 내용복사 누르면 복사할 수 있음
    //필요한 변수랑 값을 커스텀해서 수정해야해
    var message = '{"message": {"to": "'+tel+'","from": "01033528779","text": "[꿀스테이]\\n' + name +'님 안녕하세요.\\n\\n 광고비와 예약 수수료가 없는 착한 숙박앱, 꿀스테이입니다.\\n\\n고객님과의 소중한 상담 예약이 접수되었습니다.\\n\\n *예약날짜\\n'+date+' '+time+' \\n\\n기타문의사항\\n '+enquiry+' \\n\\n꿀스테이를 이용해 주셔서 감사합니다.","type": "ATA","kakaoOptions": {"pfId": "'+pfid+'","templateId": "'+templateId+'"}}}';

    request.send(message);
    return;
}

/*=========================================*/
    //플러스 친구 정보 가져오기
    /*
    function getPfInfo(){
        // input id pfid->value
        let pfid = "KA01PF22041206411o33TFWW9Sl71Ppp";
        // solapi.js -> getPlusfriend 호출
        getPlusfriend(pfid); //api키를 사용하는 사용자의 플러스 친구id
    }
    */
/*========================================*/

// 플러스친구 GET 
/*
function getPlusfriend(pfid){
    let url = 'https://api.solapi.com/kakao/v1/plus-friends/' + pfid; //특정pfid

    request = new XMLHttpRequest();

    if(!request){
        alert('request create fail');
        return;
    }

    let authoriztion = getAuthorization();

    request.onreadystatechange = requestResult;
    request.open('GET', url);
    request.setRequestHeader("Content-Type", "application/json");
    request.setRequestHeader("Authorization", authoriztion); //인증값 서버에서 인증해달라 그래야 api반환해줌
    request.send();
}
*/

// 플러스친구 정보 모두 가져오기
//채널변경때 사용한다?? 지금 당장 우리가 쓰는건 아닌듯
/*
function getPlusfriends(){
    let url = 'https://api.solapi.com/kakao/v1/plus-friends';

    request = new XMLHttpRequest();

    if(!request){
        alert('request create fail');
        return;
    }

    let authoriztion = getAuthorization();

    request.onreadystatechange = requestResult;
    request.open('GET', url);
    request.setRequestHeader("Content-Type", "application/json");
    request.setRequestHeader("Authorization", authoriztion);
    request.send();
}
*/

/*=======================================*/
    //알림톡 템플릿 정보 가져오기
    /*
    function getTemplateInfo(){
        //input id template-id -> value
        let templateId = "KA01TP230119022642923Eu92xiYuiJ5";
        //solapi.js -> getTemplate 호출
        getTemplate(templateId);
    }
*/
/*=======================================*/


// 알림톡 템플릿
/*
function getTemplate(templateId){
    let url = 'https://api.solapi.com/kakao/v1/templates/' + templateId; //특정한 템플릿정보를 가져오겠다

    request = new XMLHttpRequest();

    if(!request){
        alert('request create fail');
        return;
    }

    let authoriztion = getAuthorization();

    request.onreadystatechange = requestResult;
    request.open('GET', url);
    request.setRequestHeader("Content-Type", "application/json");
    request.setRequestHeader("Authorization", authoriztion);
    request.send();
}
*/

//모든 템플릿 정보 가져온다
/*
function getTemplates(){
    let url = 'https://api.solapi.com/kakao/v1/templates'; 

    request = new XMLHttpRequest();

    if(!request){
        alert('request create fail');
        return;
    }

    let authoriztion = getAuthorization();

    request.onreadystatechange = requestResult;
    request.open('GET', url);
    request.setRequestHeader("Content-Type", "application/json");
    request.setRequestHeader("Authorization", authoriztion);
    request.send();
}
*/





//알림톡 잘보냈다 못보냈다 결과 팝업
function requestResult(){
    if(request.readyState == XMLHttpRequest.DONE){
        alert(request.responseText);
    }
}
