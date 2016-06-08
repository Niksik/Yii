$(function(){
	 $('#modalButton').click(function(){
		 $('#modal').modal('show')
		           .find('#modalContent')
				   .load($(this).attr('value'));
	 })
});

$(function(){
	 $('#categoryModalButton').click(function(){
		 $('#modal').modal('show')
		           .find('#modalContent')
				   .load($(this).attr('value'));
	 })
});