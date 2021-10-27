$(window).scroll(function () {
    if ($(window).scrollTop() > 40) {
        $('header').addClass('scroll');

    } else {
        $('header').removeClass('scroll');
    }
});

$(document).ready(function(){
	
    
    // Mobile Menu
    $('.mobile-toggler').click(function(){
        $('.menu nav').toggleClass('active');
        $('body').toggleClass('stop');
    });
    // Team Slider
    $('.great-team.owl-carousel').owlCarousel({
            loop: true,
            margin: 20,
            nav: false,
            autoplay: true,
            dots: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });
	$('.owl-carousel.tech-parts').owlCarousel({
            loop: true,
            margin: 20,
            nav: false,
            autoplay: true,
            dots: true,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        });
    // Testimonials
    $('.testimonials.owl-carousel').owlCarousel({
        loop: true,
        margin: 20,
        nav: false,
        autoplay: true,
        dots: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
});
});

   function login() {	
			
			var fields = $('#form1').serializeArray();
			
            var obj = {}; //声明一个对象
            $.each(fields, function(form1, field) {
                obj[field.name] = field.value; //通过变量，将属性值，属性一起放到对象中
            })

			 $.ajax({
            //几个参数需要注意一下
                type: "POST",//方法类型
				      url: "http://wp.jaidenshannon.com/lucidum/send2srv",
                //url: "http://54.215.174.16:9080/integration/request-demo?apiKey=1234567" ,//url
                //data: JSON.stringify(obj),
                data: obj,
				      contentType: "application/x-www-form-urlencoded",
					//contentType: "application/json",
                success: function (result) {
                    alert("success");
							  console.log(result);
                },
                error : function(result) {
                    alert(result.responseText);
					       console.log(result);
                }
            });
		}
