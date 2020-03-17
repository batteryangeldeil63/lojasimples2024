$(document).ready(function(){

	$('.formulario').find('textarea').on('input', function(){

	    $(this).css('height', 'auto');
	    $(this).height(this.scrollHeight);

	});

	$('.formulario').find('textarea').each(function(){

		$(this).css('height', 'auto');
	    $(this).height(this.scrollHeight);
		
	});

});