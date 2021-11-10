jQuery(document).ready(function ($) {
	$(window).scroll(function () {
		if ($(window).scrollTop() > 40) {
			$('.header').addClass('scroll');
		} else {
			$('.header').removeClass('scroll');
		}
	});

	// Team Slider

	function login() {
		var fields = $('#form1').serializeArray();

		var obj = {}; //声明一个对象
		$.each(fields, function (form1, field) {
			obj[field.name] = field.value; //通过变量，将属性值，属性一起放到对象中
		});

		$.ajax({
			//几个参数需要注意一下
			type: 'POST', //方法类型
			url: 'http://wp.jaidenshannon.com/lucidum/send2srv',
			//url: "http://54.215.174.16:9080/integration/request-demo?apiKey=1234567" ,//url
			//data: JSON.stringify(obj),
			data: obj,
			contentType: 'application/x-www-form-urlencoded',
			//contentType: "application/json",
			success: function (result) {
				alert('success');
				console.log(result);
			},
			error: function (result) {
				alert(result.responseText);
				console.log(result);
			},
		});
	}

	jQuery(document).ready(function () {
		jQuery('.filter_by_type').change(function () {
			var filter_class = jQuery(this).val();
			if (filter_class == '') {
				jQuery('.fys-box').show();
			} else {
				jQuery('.fys-box').hide();
				jQuery('.' + filter_class).show('slow');
			}
		});
	});
	// 	$('.cat-blog ul li a').click(function(){
	// 		$('.cat-blog ul li a').removeClass('active');
	// 		$(this).addClass('active');
	// 	});
	// 		var url = $(location).attr('href');
	// 		var parts = url.split("/");
	// 		var last_part = parts[parts.length-2];
	// 		var asd = $('.cat-blog li:last-child a').text().toLowerCase();
	// 		var asd1 = $('.cat-blog li:nth-child(2) a').text().toLowerCase();

	// 		if(last_part === asd) {
	// 			$('.cat-blog li:last-child a').addClass('active')
	// 		} else if ( last_part === asd1) {
	// 			$('.cat-blog li:nth-child(2) a').addClass('active')
	// 		} else {
	// 			console.log('asd')
	// 		}
	$(function ($) {
		let url = window.location.href;
		$('.cat-blog ul li a').each(function () {
			if (this.href === url) {
				$(this).closest('li').addClass('activatedli');
			}
		});
	});

	// 	$('#').play();
	//	$('#qwe').get(0).play();
	$('.wal-btn ul a').click(function () {
		var xdlist = jQuery(this).attr('href').replace('#', '');
		var xdbox = jQuery('.wki-box').attr('id');
		$('.wki-box').removeClass('active-box');
		$('.wki-box#' + xdlist).addClass('active-box');
	});
});
