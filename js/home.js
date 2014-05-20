
	$(document).ready(function() {
        $('div.cssmenu').find('ul').show();
		 $('div.cssmenu').find('ul').children('li').addClass('active');
		function build_dialog(element_id){
			$('#'+element_id).dialog({
				height: 'auto',
				width: 'auto',
				position: 'top',
				zIndex: 999,
				autoOpen: false,
				modal: true,
 				buttons: {
					'Ok' : function (){
						$(this).dialog('close');
					},
				}
			});
			
		}

		/*For displaying system admin restaurant name report - JX*/
	
		$('a#billboard_audience').on('click',function(event){
			event.stopImmediatePropagation(); 
			event.preventDefault(); 
			$.isLoading({text:"Loading.. "});
			$.ajax({
				type: 'POST',
				url:'controller.php',
				data: {'function_name':'get_billboard_audience'},
				success: function (response){
				  console.log(response);

					//	console.log(response);
							$.ajax({
								type: 'POST',
								url:'billboard_audience.php',
								data: {'data':response},
								success: function (response){ 
								$("body").isLoading("hide");
									$('div#content_bottom').html("");
									$('div#content_bottom').append(response);
									
								}	
							});					
				
				
                }				
			});
		//alert('you clicked me');
		});
		
	});
