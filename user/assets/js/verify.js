

$(document).on('change','#idcardFront_',function(){
	//console.log("eagle")
	$('label#lidcardFront_').text("File Selected");
})

$(document).on('change','#idcardBack_',function(){
	$('label#lidcardBack_').text("File Selected");
})
$(document).on('change','#pic_',function(){
	$('label#lpic_').text("File Selected");
})

/*
$(document).on('change','.tap',function(){
	let y=$(this).attr('data-id');
	$(`#${y}`).focus().trigger('click'); 
})
$(document).on('change','.white-tap',function(){
	let y=$(this).attr('data-id');
	$(`#${y}`).focus().trigger('click'); 
})
*/