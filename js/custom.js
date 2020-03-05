var $j = jQuery.noConflict();

$j(function(){
 
    $j('a[href*=#]').click(function() {
 
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') 
        && location.hostname == this.hostname) {
 
            var $target = $j(this.hash);
 
            $target = $target.length && $target || $j('[name=' + this.hash.slice(1) +']');
 
            if ($target.length) {
 
                var targetOffset = $target.offset().top;
 
                $j('html,body').animate({scrollTop: targetOffset}, 600);
 
                return false;
 
            }
 
        }
 
    });
 
});

////////////////////////////////////////////////////////////////////////////////////////////////////////
// PORTFOLIO ANIMATIONS --------------------------------------------------------------------------------
////////////////////////////////////////////////////////////////////////////////////////////////////////

//PORTFOLIO 1
$j(function(){
		   
	if((document.all)&&(navigator.appVersion.indexOf("MSIE 7.")!=-1)){
	
		$j(".filter_list a").click(function(){
		filteris = $j(this).attr("title");
		
		$j(".filter_list a").removeClass("current");
		$j(this).addClass("current");
		
		
		if(filteris == "all") {
			$j(".portfolio1 .portfolio_item").show();
		}
		else {
			  $j(".portfolio1 .portfolio_item").hide();
			  $j('.portfolio1 .'+filteris).show();
		}
		
	});
		
	} else {
		
	$j(".filter_list a").click(function(){
		filteris = $j(this).attr("title");
		
		$j(".filter_list a").removeClass("current");
			$j(this).addClass("current");
		
		
		if(filteris == "all") {
			$j(".portfolio1 .portfolio_item").slideDown().animate({ opacity : 1 });
		}
		else {
			$j(".portfolio1 .portfolio_item").not('.'+filteris).animate({ opacity : 0 }).slideUp();
			$j('.portfolio1 .'+filteris).animate({ opacity : 1 }).slideDown();
		}
		
	});
	
	}
});

//PORTFOLIO 2
$j(function(){
		   
	if((document.all)&&(navigator.appVersion.indexOf("MSIE 7.")!=-1)){
	
		$j(".portfolio2 .filter_list li a").click(function(){
		filteris = $j(this).attr("title");
		
		$j(".portfolio2 .filter_list li a").removeClass("current");
		$j(this).addClass("current");
		
		
		if(filteris == "all") {
			$j(".portfolio2 .portfolio_item").show();
		}
		else {
			  $j(".portfolio2 .portfolio_item").hide();
			  $j('.portfolio2 .'+filteris).show();
		}
		
	});
		
	} else {
		
	$j(".portfolio2 .filter_list li a").click(function(){
		filteris = $j(this).attr("title");
		
		$j(".portfolio2 .filter_list li a").removeClass("current");
		$j(this).addClass("current");
		
		
		if(filteris == "all") {
			$j(".portfolio2 .portfolio_item").animate({ opacity: '0' }, {
			queue:false,
			duration: 200,
			complete: function() {
			  $j(".portfolio2 .portfolio_item").animate({ opacity: '1' },{queue:false, duration:450}).show();
			}
		});
		}
		else {
		$j(".portfolio2 .portfolio_item").animate({ opacity: '0' }, {
			queue:false,
			duration: 200,
			complete: function() {
			  $j(".portfolio2 .portfolio_item").css("display","none");
			  $j('.portfolio2 .'+filteris).animate({ opacity: '1' },{queue:false, duration:450}).show();
			}
		});
		}
		
	});
	
	}
});


// ----------------------------------------------------------------------------------------------------------------------------
// Item Slider
 $j(function() {
        
        var auto_slide = 1;
        var hover_pause = 1;
        var key_slide = 1;
	
        var auto_slide_seconds = 5000;
		
        $j('.carousel_ul li:first').before($j('.carousel_ul li:last')); 
        
        if(auto_slide == 1){
            var timer = setInterval('slide("right")', auto_slide_seconds); 
        }
  
        if(hover_pause == 1){
            $j('.carousel_ul').hover(function(){
                clearInterval(timer)
            },function(){
                timer = setInterval('slide("right")', auto_slide_seconds); 
            });
  
        }
  
        if(key_slide == 1){
        	$j(document).bind('keypress', function(e) {
                if(e.keyCode==37){
                        slide('left');
                }else if(e.keyCode==39){
                        slide('right');
                }
            });

        }
        
        
  });

function slide(where){
    
	var item_width = $j('.carousel_ul li').outerWidth();
	
	if(where == 'left'){
		var left_indent = parseInt($j('.carousel_ul').css('left')) + item_width;
	}else{
		var left_indent = parseInt($j('.carousel_ul').css('left')) - item_width;
	
	}
	
	$j('.carousel_ul:not(:animated)').animate({'left' : left_indent},600, 'easeInOutExpo', function(){    
		
		if(where == 'left'){
			$j('.carousel_ul li:first').before($j('.carousel_ul li:last'));
		}else{
			$j('.carousel_ul li:last').after($j('.carousel_ul li:first')); 
		}
		
		$j('.carousel_ul').css({'left' : '-213px'});
	});
       
}


// ----------------------------------------------------------------------------------------------------------------------------
// Images fade animation
$j(function(){
	$j(".fadeload").hover(function(){
		$j(this).stop().animate({opacity: "0.5"}, 350);
	},
	function(){
		$j(this).stop().animate({opacity: "1"}, 125);
	});
});


// ----------------------------------------------------------------------------------------------------------------------------
// ALTERN COLOR COMMENTS
$j(function(){
	$j(".commentlist > .comment:odd").addClass("alt_comment");
});

// ----------------------------------------------------------------------------------------------------------------------------
// DROPDOWN MENU
$j(function() {	
	$j(".menu li").each(function(){ $j(this).find("li a:first").css("border-top","none"); });
	$j(".menu li").each(function(){ $j(this).find("li a:last").css("border-bottom","none"); });
	$j(".menu ul ").css("display","none");
	$j(".menu li").hover(function(){
		$j(this).find('ul:first').slideDown(50).parent().find("a").addClass("hover");
		$j(this).find('ul ul:first').parent().find('a').removeClass("hover").addClass("subber");
		$j(this).find('ul ul a').removeClass("subber");
		$j(this).find('ul > a').removeClass("hover");
	}, 
	function () {
		$j(this).find('ul:first').fadeToggle(50);
		$j(this).find('ul:first').parent().find("a").removeClass("hover");
	});
	$j("#navigation ul ul a").wrapInner("<span></span>");
	$j("#navigation ul ul li").hover(function(){
		$j(this).find("span:first").stop().animate({paddingLeft:'5px'},{queue:false, duration:100, easing: 'easeInSine'});
	},
	function(){
		$j(this).find("span").stop().animate({paddingLeft:'0px'},{queue:false, duration:100, easing: 'easeOutSine'});
	});
});
$j(function() {
	$j(".menu ul li").hover(function(){
		$j(this).find("a").addClass("active");
		$j(this).find("ul li a").removeClass("active");
	}, 
	function () {
		$j(this).find("a").removeClass("active");
	});
});


// ----------------------------------------------------------------------------------------------------------------------------
// Animation of tweets

$j(function()
{			
	var tweets_move = function()
	{
		setTimeout(function(){
			$j('#deadTweets li:first').animate({opacity: '0'},{ duration:200, easing: 'easeOutCubic', complete: function()
				{
					
					$j(this).detach().appendTo('#deadTweets ul').removeAttr('style');
					var li_height = $j('#deadTweets li:first').height(); 
					$j("#deadTweets ul").animate({height: li_height});	
				}
			});
			tweets_move();
		}, 5000);
	};
	tweets_move();
});

$j(function()
{
	var li_height = $j('#deadTweets li:first').height(); 
					$j("#deadTweets ul").animate({height: li_height});
					$j("#deadTweets ul").trigger(li_height);
});


// ----------------------------------------------------------------------------------------------------------------------------
// Flickr fade animation
$j(function(){
	$j(".flickr_stream img").hover(function(){
		$j(".flickr_stream img").stop().animate({opacity: "0.2"});
		$j(this).stop().animate({opacity: "1"});
	},function(){
		$j(".flickr_stream img").stop().animate({opacity: "1"});
	});
});


// ----------------------------------------------------------------------------------------------------------------------------
// FADEOVER
$j(function(){
	$j(".fadeover").hover(function(){
		$j(this).stop().animate({opacity: "0.5"},300);
	},function(){
		$j(this).stop().animate({opacity: "1"},300);
	});
});


// ----------------------------------------------------------------------------------------------------------------------------
// Fade hover image link Video, Image or Document... ?
$j(function() {
	// Others
	$j("a.hover").addClass("link_blog");
	// Image
	$j("a[href$='.png'].hover, a[href$='.jpg'].hover, a[href$='.jpeg'].hover").removeClass("link_blog").addClass("link_img");
	// Video
	$j("a[href$='.swf'].hover, .hover a[href$='.mov'].hover, a[href$='.rft'].hover").removeClass("link_blog").addClass("link_vid");
	// Docs
	$j("a[href$='.pdf'].hover").removeClass("link_blog").addClass("link_doc");;
});
$j(function() {
	// Others
	$j("a.thumby").addClass("link_blog");
	// Image
	$j("a[href$='.png'].thumby, a[href$='.jpg'].thumby, a[href$='.jpeg'].thumby").removeClass("link_blog").addClass("link_img");
	// Video
	$j("a[href$='.swf'].thumby, .hover a[href$='.mov'].thumby, a[href$='.rft'].thumby").removeClass("link_blog").addClass("link_vid");
	// Docs
	$j("a[href$='.pdf'].thumby").removeClass("link_blog").addClass("link_doc");;
});


// ----------------------------------------------------------------------------------------------------------------------------
// Captcha system
$j(function(){
$j("#errorcaptcha").css({opacity: "0"});
$j("#check").keyup(function () {
		var rep = $j(this).val();
		var n1 = document.getElementById('num1').innerHTML;
		var n2 = document.getElementById('num2').innerHTML;
		var n3 = parseInt(n1) * parseInt(n2);
      		if( n3 == rep ){
			$j("#submitter input").removeAttr("disabled").animate({opacity: "1"},{duration:150});
			$j("#errorcaptcha").text(" ").animate({opacity: "0"},{duration:150});
		}
		else {
			$j("#errorcaptcha").text("Try again...").animate({opacity: "1"},{duration:350});
			$j("#submitter input").attr('disabled', true).animate({opacity: "0.5"},{duration:150});
		}
    });
});



// ----------------------------------------------------------------------------------------------------------------------------
/* begin contact form */
$j(function(){
	$j('#list').hide();
	var form = $j("#contact-form");
	var name = $j("#namehis");
	var email = $j("#email");
	var subject = $j("#subject");
	var message = $j("#comment");
	
	name.blur(validateName);
	email.blur(validateEmail);
	subject.blur(validateSubject);
	message.blur(validateMessage);
	
	name.focus(function () {
		$j(this).css({ "backgroundPosition":"0 -28px"});
	});
	
	subject.focus(function () {
		$j(this).css({ "backgroundPosition":"0 -28px"});
	});
	
	message.focus(function () {
		$j(this).parent().css({ "backgroundPosition":"0 -224px"});
	});
	
	var inputs = form.find(":input").filter(":not(:submit)").filter(":not(:checkbox)").filter(":not([type=hidden])").filter(":not([validate=false])");

	form.submit(function(){
		if(validateName() & validateEmail() & validateSubject() & validateMessage()) {
			
			var $name = name.val();
			var $email = email.val();
			var $subject = subject.val();
			var $message = message.val();
			
			$j.ajax({
				type: 'GET',
				url: document.getElementById('url_site').innerHTML+"send_mail.php",
				data: form.serialize(),
				success: function(ajaxCevap) {
					$j('#list').hide();
					$j('#list').html(ajaxCevap);
					$j('#list').fadeIn("normal");
					$j('#list').delay(2000).fadeOut("normal");
					name.attr("value", "");
					email.attr("value", "");
					subject.attr("value", "");
					message.attr("value", "");
					check.attr("value", "");
					$j("#submitter input").attr('disabled', true).animate({opacity: "0.5"},{duration:150});
					var randomnumber=Math.floor(Math.random()*11);
					var randomnumber2=Math.floor(Math.random()*11);
					$j("#num").html(randomnumber);
					$j("#num2").html(randomnumber2);
				}
			});

			return false;
		}else{
			return false;
		}
	});
	
	function validateEmail(){
		var a = $j("#email").val();
		var filter = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;
		if(filter.test(a)){
			email.css({ "backgroundPosition":"0 0"});
			return true;
		}
		else{
			email.css({ "backgroundPosition":"0 -56px"});
			return false;
		}
	}
	function validateName(){
		if(!name.val()){
			name.css({ "backgroundPosition":"0 -56px"});
			return false;
		}
		else{
			name.css({ "backgroundPosition":"0 0"});
			return true;
		}
	}
	
	function validateSubject(){
		if(!subject.val()){
			subject.css({ "backgroundPosition":"0 -56px"});
			return false;
		}
		else{
			subject.css({ "backgroundPosition":"0 0"});
			return true;
		}
	}
	
	function validateMessage(){
		if(!message.val()){
			message.parent().css({ "backgroundPosition":"0 -448px"});
			return false;
		}else{			
			message.parent().css({ "backgroundPosition":"0 0"});
			return true;
		}
	}
	
});
/* end contact form */

// JQUERY SHORTCODES ANIMATIONS
// Tabs
$j(function() {
		$j(".tabs a:first").addClass("selected");
		
		$j(".tabs a").click(function () {
			
			if ($j(this).hasClass("selected")){ }
			else {
			// switch all tabs off
			$j(".selected").removeClass("selected");
			
			// switch this tab on
			$j(this).addClass("selected");
			
			// slide all content up
			$j(".tab-content").slideUp(50);
			
			// slide this content up
			var content_show = $j(this).attr("rel");
			$j("#"+content_show).slideDown(100);
			}
		});;
 
});

// Slider
$j(function() {

	//Set Default State of each portfolio piece
	$j(".paging").show();
	$j(".paging a:first").addClass("active");
		
	//Get size of images, how many there are, then determin the size of the image reel.
	var imageWidth = $j(".window").width();
	var imageSum = $j(".image_reel img").size();
	var imageReelWidth = imageWidth * imageSum;
	
	//Adjust the image reel to its new size
	$j(".image_reel").css({'width' : imageReelWidth});
	
	//Paging + Slider Function
	rotate = function(){	
		var triggerID = $active.attr("rel") - 1; //Get number of times to slide
		var image_reelPosition = triggerID * imageWidth; //Determines the distance the image reel needs to slide

		$j(".paging a").removeClass('active'); //Remove all active class
		$active.addClass('active'); //Add active class (the $active is declared in the rotateSwitch function)
		
		//Slider Animation
		$j(".image_reel").animate({ 
			left: -image_reelPosition
		}, 500 );
		
	}; 
	
	//Rotation + Timing Event
	rotateSwitch = function(){		
		play = setInterval(function(){ //Set timer - this will repeat itself every 3 seconds
			$active = $j('.paging a.active').next();
			if ( $active.length === 0) { //If paging reaches the end...
				$active = $j('.paging a:first'); //go back to first
			}
			rotate(); //Trigger the paging and slider function
		}, 7000); //Timer speed in milliseconds (3 seconds)
	};
	
	rotateSwitch(); //Run function on launch
	
	//On Hover
	$j(".image_reel a").hover(function() {
		clearInterval(play); //Stop the rotation
	}, function() {
		rotateSwitch(); //Resume rotation
	});	
	
	//On Click
	$j(".paging a").click(function() {	
		$active = $j(this); //Activate the clicked paging
		//Reset Timer
		clearInterval(play); //Stop the rotation
		rotate(); //Trigger rotation immediately
		rotateSwitch(); // Resume rotation
		return false; //Prevent browser jump to link anchor
	});	
	
});

//Accordion
$j(function() {
	
	$j('.accordionButton').click(function() {

		$j('.accordionButton').removeClass('on');
		  
	 	$j('.accordionContent').slideUp(200);
   
		if($j(this).next().is(':hidden') == true) {
			
			$j(this).addClass('on');
			  
			$j(this).next().slideDown(200);
		 } 
		  
	 });
	
	$j('.accordionButton').mouseover(function() {
		$j(this).addClass('over');
		
	}).mouseout(function() {
		$j(this).removeClass('over');										
	});
	$j('.accordionContent').hide();

});


//Toggle
$j(function(){
	$j('.hidden').css("display", "none");
	$j(".toggler h4").hover(function() {
		$j(this).css("cursor","pointer");
	});
	$j(".toggler h4").click(function() {
		$j(this).parent().children('.hidden').slideToggle(200);
	});
});