var postId = 0;
var postQueElement = null;
var postOptaElement = null;
var postOptbElement = null;
var postOptcElement = null;
var postOptdElement = null;
var postAnsElement = null;

$('.que').find('.article').find('.edit').find('.edit_que').on('click', function(event){
	event.preventDefault();

	postId = event.target.parentNode.parentNode.parentNode.dataset['postid'];

	postQueElement  = event.target.parentNode.parentNode.childNodes[3];
	postOptaElement = event.target.parentNode.parentNode.childNodes[8];
	postOptbElement = event.target.parentNode.parentNode.childNodes[11];
	postOptcElement = event.target.parentNode.parentNode.childNodes[14];
	postOptdElement = event.target.parentNode.parentNode.childNodes[17];
	postAnsElement  = event.target.parentNode.parentNode.childNodes[20];

	var que      = postQueElement.textContent;
	var option_a = postOptaElement.textContent;
	var option_b = postOptbElement.textContent;
	var option_c = postOptcElement.textContent;
	var option_d = postOptdElement.textContent;
	var ans      = postAnsElement.textContent;

	$('#que').val(que);
	$('#option_a').val(option_a);
	$('#option_b').val(option_b);
	$('#option_c').val(option_c);
	$('#option_d').val(option_d);
	$('#ans').val(ans);
	
	$('#edit-modal').modal('toggle');
});


$('#modal-save').on('click', function(){

	$.ajax({
		method:'POST',
		url:url,
		data: { 
				que: $('#que').val(), 
				option_a: $('#option_a').val(), 
				option_b: $('#option_b').val(), 
				option_c: $('#option_c').val(), 
				option_d: $('#option_d').val(), 
				ans: $('#ans').val(),
				postId: postId,
				_token:token  
			  }
	})

		.done(function (msg){
			$(postQueElement).text(msg['new_que']);
			$(postOptaElement).text(msg['new_opta']);
			$(postOptbElement).text(msg['new_optb']);
			$(postOptcElement).text(msg['new_optc']);
			$(postOptdElement).text(msg['new_optd']);
			$(postAnsElement).text(msg['new_ans']);
			$('#edit-modal').modal('hide');

		});


});

