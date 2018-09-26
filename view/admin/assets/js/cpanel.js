$().ready(function() {
	// alert();
	$('.fancybox').on('click', function(e) {
		e.preventDefault();
		$('.cat-img').attr('src', $(this).attr('href'));
		$('#cat-img-modal').modal('show');
	});
	$('form').ajaxForm({
	    beforeSend: function() {
	    },
	    uploadProgress: function(event, position, total, percentComplete) {
	     //    var percentVal = percentComplete + '%';
	    	// $('.progress-bar').css({'width': percentVal});
	    },
	    success: function(d, statusText, xhr) {
	    },
	    error: function(xhr, statusText, err) {
	        console.log(xhr.responseText);
	    }
	}); 
});