jQuery(function($){
	function navi(){
		if (document.URL == 'http://localhost/') {
			$('#global_navi a[href="/"]').css('background', '#09f')
			.css('color', '#fff');
		} else {
			var path_arr = document.URL.split('/');
			path_arr.shift();
			path_arr.shift();
			path_arr.shift();
			var link;
			while(path_arr.length){
				link = $('#global_navi').find('a[href^=/'+path_arr.join('/')+']');
				if (link.length) {
					link.css('background', '#09f')
					.css('color', '#fff');
					break;
				}
			  path_arr.pop();
			}
		}
	}

	navi();
	
	$('#global_navi li:even').hover(function(){
		$(this).css('background-color', '#09f');
		$(this).find('a').css('color','#fff');
	}, function(){
		$(this).css('background-color', '#eee');
		$(this).find('a').css('color', '#999');
		navi();
	});
	
	$('#global_navi li:odd').hover(function(){
		$(this).css('background-color', '#09f');
		$(this).find('a').css('color','#fff');
	}, function(){
		$(this).css('background-color', '#f0f0f0');
		$(this).find('a').css('color', '#999');
		navi();
	});
	
	$('#login input[type=submit]').hover(function(){
		$(this).css('background', '#09f')
		.css('color', '#fff');
	},function(){
		$(this).css('background', 'url(img/bg_btn.gif)')
		.css('color', '#333'); 
	});
	
	$('#login input[type=submit]').unbind().bind('click', function() {
		$.ajax({
			type:'POST',
			url:'login/index',
			data:'id=' + $('input[name=id]').val() + '&password=' + $('input[name=password]').val(),
			success:function() {
				$('#msg').html('<p>ID：' + $('input[name=id]').val() + '<br>\rログインしました！</p>')
				.show();
				var slow = setTimeout(function() {
					$('#msg').fadeOut(1000);
					clearTimeout(slow);
				}, 1000);
				$("#sub").load("/ #sub");
				$("#utility").load("/ #utility");
			}
		});
		
	});
});