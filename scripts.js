jQuery(document).ready(function($) {
	
	$('.rt-product-icon').toggle(function(){
		var id = $(this).attr('id').substr(11);
		$(this).html('&#8722;');
		$('#rt-product-description-'+id).slideDown();
	}, function() {
		var id = $(this).attr('id').substr(11);
		$(this).html('+');
		$('#rt-product-description-'+id).slideUp();
	});
	
});