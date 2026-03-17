/*$('div.myTable').children("div.dtype span.txt").sort(function(a, b) {
    var A = $(a).text().toUpperCase();
    var B = $(b).text().toUpperCase();
    return (A < B) ? -1 : (A > B) ? 1 : 0;
}).appendTo('div.myTable');*/


$(document).on('keyup','#myInput',function(){

  //$("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    //console.log({value});

    $(".myTable div.dtype").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });

});

/*
$(document).on('change','#ChooseFile',function(){
	$('.chum').text("file selected");
});*/

$('#exampleModal').on('show.bs.modal', function (event) {

	/*if ($('#amount').val().length === 0 ) {
		setTimeout(()=>{
			$('#exampleModal').modal('hide');
			noticePop("enter amount","error");
		},1000);
	}*/
  var button = $(event.relatedTarget); // Button that triggered the modal
  var recipient = button.data('whatever');//ng library or other methods instead.
  var modal = $(this)
  //console.log({recipient,modal});
  try{

    var currency=$('#currency_z').html();
    var fees=$('#fees_z').html();
  		if(recipient=="Bank Transfer"){

        modal.find('#method-name').text(recipient);
  			modal.find(`form#withdrawal-form`).html(`

 <input type="hidden" name="withdrawalmethod" id="withdrawalmethod" value="${recipient}">

<div class="form-group" id="field7" >
          <label for="input" class="label">Bank Name:</label>
          <input type="text" name="bank_name" class="form-control" placeholder="Bank Name" />
          </div>
          <div class="form-group" id="field8" >
            <label for="input" class="label">Account Number:</label>
          <input type="text" name="account_number" class="form-control" placeholder="Account Number" />
          </div>
          <div class="form-group" id="field9" >
          <label for="input" class="label">Country:</label>
          <input type="text" name="country" placeholder="Country" class="form-control"  />
          </div>
          <div class="form-group" id="field10" >
          <label for="input" class="label">Swift Code:</label>
          <input type="text"name="swift_code" placeholder="Swift Code" class="form-control" />
          </div>


          <div class="form-group"><label for="input" class="label">Amount:<?= $userRow['currency']; ?></label> 
          <input type="text" class="form-control" name="amount" placeholder="Amount without (${currency})"   /></div>

          <div class="form-group"><label for="input" class="label">Fee:</label> 
          <input class="form-control" name="fees" type="text" value="${fees}%" readonly/></div>

          <div class="form-group"><label for="input" class="label">Description</label> 
          <textarea cols="30" rows="3" class="form-control" name="narration" placeholder="Narration"></textarea></div>


          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
            <label class="form-check-label" for="flexCheckDefault"> Agree to Terms & Conditions? </label>
          </div><br/>
          <button name="withdraw" type="submit" class="submit btn-main">Withdraw</button>
          
          `);
  		}else if (ze2[recipient]===undefined) {
  			modal.find('#method-name').text("");
  		}else{
        modal.find('#method-name').text(recipient);
  			modal.find(`form#withdrawal-form`).html(`

 <input type="hidden" name="withdrawalmethod" id="withdrawalmethod" value="${recipient}">


          <div class="form-group"  >
          <label for="input" class="label">${recipient} Wallet:</label>
          <input type="text" name="${recipient}_address" class="form-control" placeholder="${recipient} wallet Address" />
          </div>


          <div class="form-group"><label for="input" class="label">Amount:<?= $userRow['currency']; ?></label> 
          <input type="text" class="form-control" name="amount" placeholder="Amount without (${currency})"   /></div>

          <div class="form-group"><label for="input" class="label">Fee:</label> 
          <input class="form-control" name="fees" type="text" value="${fees}%" readonly/></div>

          <div class="form-group"><label for="input" class="label">Description</label> 
          <textarea cols="30" rows="3" class="form-control" name="narration" placeholder="Narration"></textarea></div>

          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
            <label class="form-check-label" for="flexCheckDefault"> Agree to Terms & Conditions? </label>
          </div>

          <br/><button name="withdraw" type="submit" class="submit btn-main">Withdraw</button>
          


          `);

  		}
	  

	}catch(e){
		//console.log(e);
	}
  modal.find('.amount').val($('#amount').val()); 
  modal.find('#depositmethod').val(recipient);
  //modal.find('#method-name').val(recipient)
});


//copy
$(document).on('click','.copy',function(){

	var id=$(this).find('.instr').attr('data-id');


	// Get the text field
  var copyText = document.getElementById(id);// $(`#${id}`).text();
  //console.log({copyText});

  try{
  // Select the text field
  copyText.select();}catch(e){}

  try{
  copyText.setSelectionRange(0, 99999); // For mobile devices
  }catch(e){}

   // Copy the text inside the text field
  navigator.clipboard.writeText(copyText.textContent);

	$('#addr-notification span#msg').text(`   Address Copied   `);
	//console.log("copied");
	$('#addr-notification').removeClass("gone");
	setTimeout(function(){
		$('#addr-notification').addClass("gone");
	},2000);

});

$(document).on('blur','input',function(){
  $(this).css("color","white");
});
$(document).on('blur','select',function(){
  $(this).css("color","white");
});
$(document).on('blur','textarea',function(){
  $(this).css("color","white");
});

const noticePop=(m,t)=>{
	if (t=="error") {
		$('#tryagain-notification span#msg').text(`   ${m}   `);

		$('#tryagain-notification').removeClass("gone");
		setTimeout(function(){
			$('#tryagain-notification').addClass("gone");
		},4000);
	}else{
		$('#addr-notification span#msg').text(`   ${m}   `);
		$('#addr-notification').removeClass("gone");
		setTimeout(function(){
			$('#addr-notification').addClass("gone");
		},2000);
	}
}
window.noticePop=noticePop;

//

$(document).on('click','#close-btn',function(){
	$('#exampleModal').modal('hide');
});

