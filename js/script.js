'use scrtict';

// add event on multiple elements 

const addEventOnElements = function (elements, eventType , callback) {
    for (let i = 0 ; i < elements.length; i++) {
        elements[i].addEventListener(eventType, callback);
    }
}


//header active

const header = document.querySelector("[data-header]");

const activeElemOnScroll = function () {
    if(window.scrollY >= 50) {
        header.classList.add("active");
    } else {
        header.classList.remove("active");
    }
}

window.addEventListener("scroll", activeElemOnScroll);


//scroll reveal effect

const revealElements = document.querySelectorAll("[data-reveal");

const revealOnScroll = function () {
    for (let i = 0 ; i < revealElements.length; i++) {


        // add revealed class on element, when visible in window

        if(revealElements[i].getBoundingClientRect().top <window.innerHeight/1.1) {
            revealElements[i].classList.add("revealed");
        
        //remove long gtransition from button, after 1 second

        if(revealElements[i].classList.contains("btn")) {


            setTimeout(function() {
                revealElements[i].style.transition = "0.25s ease";
            },1000);
    
        }

        }
        

    }
}

window.addEventListener("scroll", revealOnScroll);

revealOnScroll();



//select all
function selectAll(selectAll)  {
    const checkboxes = document.getElementsByName('check');
    
    checkboxes.forEach((checkbox) => {
      checkbox.checked = selectAll.checked;
    })
  }

  


//validate input

let validate = function(e) {
    let fields = document.querySelectorAll('.reservation_form select,.reservation_form input[type="text"],.reservation_form input[type="checkbox"]');
    let regEX;
    let removeSpan;
    let par;
    let check = false;
    let val;
    let errArr = [];
    let info_check = document.getElementById("info_check");  



    for (let i = 0; i < fields.length; i++ ) {
        console.log(fields[i]);
        //인풋폼이 비어있는 경우
        if(fields[i].value === ""){

            if (fields[i].nextElementSibling.classList.contains('error')) {
                removeSpan = fields[i].nextElementSibling;
                par = fields[i].parentNode;
                par.removeChild(removeSpan);
                fields[i].nextElementSibling.innerHTML = fields[i].placeholder + "은(는) 필수항목입니다.";
                fields[i].style.boxShadow = "0 0 2px 1px #cc0001";
                check = false;
                errArr.push(fields[i]);
              }
            fields[i].nextElementSibling.innerHTML = fields[i].placeholder + "은(는) 필수항목입니다.";
            fields[i].style.boxShadow = "0 0 2px 1px #cc0001";
            check = false;
            errArr.push(fields[i]);
        }
        else {

            if(fields[i].id === 'phone') {
                val = isValidPhone(fields[i]);
                console.log(fields[i]);
                console.log(val);
                if(val === false) {
                  fields[i].nextElementSibling.innerHTML = "전화번호는 010으로 시작하는 올바른 형식이여야 합니다";
                  fields[i].style.boxShadow = "0 0 2px 1px #cc0001";
                  check = false;
                  errArr.push(fields[i]);
                } else {
                  fields[i].nextElementSibling.innerHTML = "";
                  fields[i].style.boxShadow = "none";
                  check = true;  
                }
              };
            
            if(fields[i].id === 'info_check'&& !info_check.checked) {
                check = false
                fields[i].nextElementSibling.innerHTML = "개인처리방침 동의에 체크해주세요.";
            }else{
                fields[i].nextElementSibling.innerHTML = "";
                check =true;
            };

        }
    }
    return check;
};

// Helper functions
function isValidPhone(e) {
    regEx = /^[+]?[(]?[+]?\d{2,4}[)]?[-\s]?\d{2,8}[-\s]?\d{2,8}$/;
    var value = e.value;
    if(!regEx.test(value) || value.slice(0,2)!="010" || value.length < 12) {
      return false;
    };
  }

