/*=====AOS이부분 추가했어용=======*/
// $('[data-aos]').each(function(){ $(this).addClass("aos-init"); });
// if($(window).width()<=768) {
//     $('.section.active [data-aos]').each(function() {
//         $(this).removeClass("aos-init")
//     });
// }

/*=====AOS이부분 추가했어용=======*/

$(function(){
    $('#main').fullpage({
		//이동
		//menu: '#pf_gnb',
		//lockAnchors: false,
		anchors:['sec1', 'sec2', 'sec3', 'sec4','sec5', 'sec6', 'sec7', 'sec8'],
		navigation: true, //스크롤되는 구간별로 이동되는 버튼
		navigationPosition: 'right', //이동버튼 어디에 둘지
		showActiveTooltip: true, //
        //sectionsColor: ['#fff', '#0cf', '#6c0', '#90c','#fff', '#0cf', '#6c0', '#90c','#0cf'],
		keyboardScrolling: true, //키보드 방향키로 풀페이지 컨트롤 작동 여부
        responsiveWidth: 1024,
//        afterLoad: function(anchorLink, index) {
//            $("#pf_gnb a").eq(index - 1).addClass("active");
//        }


/*=====AOS이부분 추가했어용=======*/
onLeave: function(){ //풀페이지 전환되기 직전에 실행되는 콜백
    $('.section [data-aos]').each(function(){
        $(this).removeClass("aos-animate")
    });
},

afterLoad: function(){ //풀페이지 화면이 전환되고 나서 실행
    $('.section.active [data-aos]').each(function(){
        $(this).addClass("aos-animate")
    });
},
// afterResize: function(width, height) {
//     if(width<=768) {
//         $('[data-aos]').removeClass('aos-init'); 
//         $('[data-aos]').removeClass('aos-animate');
//     } else {
//         $('[data-aos]').addClass('aos-init');
//     }
// },
// afterResponsive: function(isResponsive){
//     if (isResponsive == true) {

//     }

// }
	});
});


// }
/*=====이부분 추가했어용=======*/

$(document).keydown(function(event){
    if ( event.keyCode == 116 || event.which == 116 ) {
        location.href = '../index.html#sec1';
    }
});

