jQuery(document).ready(function($) {
	
	$('.rt-product-icon').click(function(){
		
		var id = $(this).attr('id').substr(11);
		
		if( $(this).html() == '–' ) {	
			$(this).html('+');
			$('#rt-product-description-'+id).slideUp();
		}
		else {
			$('.rt-product-description').slideUp();
			$('.rt-product-icon').html('+');
			$(this).html('–');
			$('#rt-product-description-'+id).slideDown();
		}
	});
	
	/*
	$('.rt-product-icon').toggle(function(){
		var id = $(this).attr('id').substr(11);
		$(this).html('&#8722;');
		$('#rt-product-description-'+id).slideDown();
	}, function() {
		var id = $(this).attr('id').substr(11);
		$(this).html('+');
		$('#rt-product-description-'+id).slideUp();
	});*/
	
});