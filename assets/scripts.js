$(document).ready(function(){
	
	function set_tab(target){
		var id = $(target).attr('id');
		
		$('.tab_content').each(function(){
			add_loader($(this).find('.content'));
		});
		$(target).find('.content')
		var content = $(target).find('.content');
		content.load('/tab/'+id, function(e){
			
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
	
	var activetab = $('.tabs .tab .active').attr('href');

	
	set_tab($(activetab));
	
	
	function activateUI(){
		$('select').formSelect();
	}
	activateUI();
	
	
}); 