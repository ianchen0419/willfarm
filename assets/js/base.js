window.onload = function() {
  const spinner = document.getElementById('loading');
  spinner.classList.add('loaded');
}

$(function(){
//header固定
 var header = $('#header')
 var header_offset = header.offset();
 var header_height = header.height();
  $(window).scroll(function () {
   if($(window).scrollTop() > header_offset.top + header_height) {
   header.addClass('show');
   }else {
    header.removeClass('show');
   }
  });
//SP メニューボタン
	$("#jq-open-btn").click(function(){
		$(".gnav").toggleClass('open');
		$(".open-btn-icon").toggleClass('close-btn');
   return false;
	});
	//同ページにてアンカーリンクメニュー閉じる
	$(".gnav a").on('click', function(){
		if (window.innerWidth <= 768) {
			$('#jq-open-btn').click();
		}
	});
//SP スムーズ
var headerHeight = $('#header').outerHeight();
var urlHash = location.hash;
if(urlHash) {
    $('body,html').stop().scrollTop(0);
    setTimeout(function(){
        var target = $(urlHash);
        var position = target.offset().top - headerHeight;
        $('body,html').stop().animate({scrollTop:position}, 500);
    }, 100);
}
$('a[href^="#"]').click(function() {
    var href= $(this).attr("href");
    var target = $(href);
    var position = target.offset().top - headerHeight;
    $('body,html').stop().animate({scrollTop:position}, 500);   
});

//accordion
	$(".accordion-box dd").hide();
	$(".accordion-box dt").click(function(){
		$(this).next(".accordion-box dd").slideToggle();
		//$(".accordion-box dt").not($(this)).next(".accordion-box dd").slideUp();
		$(this).toggleClass('open');
	});
//TOPへ
var topBtn = $('#page-top');
    topBtn.hide();
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
          topBtn.stop();
          topBtn.css('display', 'none').delay(250).fadeIn();
        } else {
            topBtn.fadeOut();
        }
    });
    //スクロールしてトップ
    topBtn.click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 500);
        return false;
    });
		
});//END

// activeCSS追加
$(document).ready(function() {
    var activeUrl = location.pathname.split("/")[2];
    navList = $(".material-warp ul li").find("a");
 
    navList.each(function(){
        if( $(this).attr("href").split("/")[2] == activeUrl ) {
         $(this).addClass('active');
       };
  });
});