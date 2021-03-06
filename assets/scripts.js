	var position;
$(document).ready(function(){

	var activetab = $('.tabs .tab .active').attr('href');

	
	
	function getLocation() {
			if (navigator.geolocation) {
					navigator.geolocation.getCurrentPosition(showPosition);
			} else {
					console.log("Geolocation is not supported by this browser.");
			}
	}
	function showPosition(newposition) {
			position = {
				latitude: newposition.coords.latitude,
				longitude: newposition.coords.longitude
			};
			activateUI();
			set_tab($(activetab));
	}
	//getLocation();
	position = {
		latitude: '48.4268869',
		longitude: '-71.0639155'
	};
			activateUI();
			set_tab($(activetab));
	function set_tab(target){
		var id = $(target).attr('id');
		
		$('.tab_content').each(function(){
			add_loader($(this).find('.content'));
		});
		$(target).find('.content')
			var content = $(target).find('.content');
			content.load('/tab/'+id,'lat='+position.latitude+'&long='+position.longitude, function(e){
			
			$(this).find('img').each(function(){
				$(this).closest('.card').fadeIn();
			});				 
			activateUI();
		});
		
	}
	
	function add_loader(target){
		target.html('<div class="preloader-wrapper big active"> \
						<div class="spinner-layer spinner-red-only"> \
							<div class="circle-clipper left"> \
								<div class="circle"></div> \
							</div><div class="gap-patch"> \
								<div class="circle"></div> \
							</div><div class="circle-clipper right"> \
								<div class="circle"></div> \
							</div> \
						</div> \
					</div>');
	}
	
	
	$('.tabs').tabs({
		onShow: function(e){
			var content = $(e).find('.container');
			add_loader(content);
			set_tab(e);
		}
	});
	
	
	
	
	function activateUI(){
		$('select').formSelect();
		if($("#tab2").length){
			get_filtered_events();
		}
	}
	
	$('body').on('click', '#tab4 input', function(){
		var value = 0;
		if($(this).is(':checked')){
			value = 1;
		}
		$.get('/set_config/'+$(this).attr('name')+'/'+value);
	});
	
	$('body').on('change', '#tab4 select', function(){
		$.get('/set_config/'+$(this).attr('name')+'/'+$(this).val());
	});
	
	
	
	function get_filtered_events(){
		var data = $( "form" ).serialize();
		
		$("#tab2 .ajax_content>.row").load('/events',data + '&lat='+position.latitude+'&long='+position.longitude,function(content){
			$(this).find('img').each(function(){
				$(this).closest('.card').fadeIn();
			});				 
		});
	}
		
	
	$('body').on('change', '#tab2 select', function(){
		get_filtered_events();
	});
	
	$('body').on('click', '.btn_favorite', function(){
		var btn = $(this);
		var id = btn.closest('.card').data('id');
		if($(this).hasClass('added')){
			$.get('/favorite/remove/'+id, function(){
				btn.removeClass('added');
			});
		} else {
			$.get('/favorite/add/'+id, function(){
				btn.addClass('added');
			});
		}
		

	});
}); 