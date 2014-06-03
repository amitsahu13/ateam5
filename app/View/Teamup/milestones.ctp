<h3 class='title_h3' >  Terms and Milestones  </h3>

<script type='text/javascript'> 
	var editmode = false;  
	var editrow  = null ;  
	
	
</Script>

	<!--  Add  new  Milestone Popup   -->
	
		<div class="popup-wrapper show"  id='milestoneeditor' > 
			<div class='popup_invite_deffault popup'> 
				<h3> Add  Milestone  </h3>
				<div class="popup_fieldset top-mile">
					<label>Milestone Name*:</label>
					<div class="popup_field">
						<input type='text' class="input-text" id='name_milestone'/>
					</div>
				</div>
				<div class="popup_fieldset">
					<label>Description:</label>
					<div class="popup_field">
						<textarea class="textarea" id='description_milestone'></textarea>
					</div>
				</div>
				<div class="popup_fieldset">
					<label>Due Date*:</label>
					<div class="popup_field">
						<input type='text' id='date_milestone' class='input-text datepicker'/>
					</div>
				</div>
				<div class="popup_fieldset">
					<label>Payment:</label>
					<div class="popup_field">
						<input type='text' class="input-text" id='payment_milestone'/>
					</div>
				</div>
				<div class="popup_fieldset">
					<label>Future Revenue Share:</label>
					<div class="popup_field">
						<input type='text' class="input-text" id='share_milestone'/>
					</div>
				</div>
				<div class="popup_fieldset popup_invite_content">
					<span class="continue_team  addmilestonepop" style="margin-left: 10px; cursor: pointer;"  > Submit   </span>
					<span class="continue_team js-ClosePopup" style="margin-left: 10px; cursor: pointer;"  >Cancel  </span> 
					<div class="clear"></div>											
				</div> 
			</div>
		</div>
								
				 
	<!--  End Add New Popup   -->




  	<?php if ($required ==1 && $canedit && count($stones)==0):?>
 
 			<div class="popup-wrapper2 show"  id='required' > 
					<div class=' popup'> 
					<h3> 	<?=MILISTONE_REQ?> </h3>
						
						
								<div class="popup_fieldset popup_invite_content">
	  								<span class="continue_team js-ClosePopup" style="margin-left: 10px; cursor: pointer;"  > OK  </span> 
					<div class="clear"></div>											
				</div> 
					</div> 
					
			</div>
 
 		<Script type='text/javascript'> 
 			$(document).ready(function(){
 				// Document Ready Show Popup For required :   
 					
 			   jQuery('#required').fadeIn();
 
						$('#required .popup').css('top', '-1000px')
							.animate({'top': '0'}, 500);
						
						 
							$('#required.popup-wrapper2').bind('click', function(event){
								var container = $(this).find('.popup');
								if (container.has(event.target).length === 0){
									container.animate({'top': '-1000px'}, 300, function(){$('.popup-wrapper2').fadeOut();});
								}
							});
						 
 				
 				
 			});
 		
 		</Script>
 	
 	
 	<?endif;?> 







<div class='cont milestones_content<? if ($canedit ):?> milestones_canedit<? endif;?>'>  
	<div class="cmpnsn_prgrsDV">
		<div class="cmpnsn_prgrsnav">
			<ul>
			
				<li><a href="<?=Router::url("/teamup/general/".$job_id."/".$user_id."",true)?><? if ($toid ):?>/<?=$id?><?endif;?>"
				 > <span  >1</span>  General
				</a></li>
				
				
				<li><a href="<?=Router::url("/teamup/milestones/".$job_id."/".$user_id."",true)?><? if ($toid ):?>/<?=$id?><?endif;?>"
					class="blue"> <span class="blue">2</span> Milestones Table 
				</a></li>

				 
				
				<li><a href="<?=Router::url("/teamup/custom_terms/".$id , true)?>"     class=""> <span class="">3</span>  Custom Terms
				</a></li>
				
			</ul>
		 </div>
	 </div> 



	 <!--  Form Begin   Here  -->

	<form method='POST'> 
	
	<div class="product_dscrpBOX" style="width:100%; position: relative; padding-bottom: 50px;">
	<h3><span class="round_bgTXT">2</span>Milestones Table</h3>
	<input type='hidden' name='proceed' value='1'/> 
	
	
	<table border="0" cellspacing="0" cellpadding="0" class="tbl tablelistSe tbl_c" id="milestoneadd">
		<thead>
			<tr>
				<th width="40" align="center" valign="middle">#</th>
				<th width="157" align="left" valign="middle">Milestone</th>
				<th width="180" align="left" valign="middle">Description</th>
				<th width="160" align="left" valign="middle">Payment$</th>
				<th width="57" align="left" valign="middle">Future Earnings Sharing%</th>
				<th width="100" align="left" valign="middle"> Date</th>  
				 <? if ($canedit &&  $can_remove ):?>
					<th width="57" align="left" valign="middle"> Remove   </th> 	<?endif;?> 
			</tr>
		</thead> 
		<tbody id ='rows' >
			 
					<?
					$c = 0 ;  
					 foreach($stones as $m): 
					$c ++ ;  
					  ?>
						<tr id='row_<?=$m->id?>'  class="   <?  if ($m->closed == 1 ) echo  "  closedmilistone  "  ?>  " >    
								<td id="edit_close"> <?=$c?>  
									<input type='hidden' name='stone[<?=$c?>][closed]' value='<?=$m->closed?>' />
									<input type='hidden' name='stone[<?=$c?>][id]' value='<?=$m->id?>' /> 
									<? if ($m->closed == 0  && $canedit):?>  
									 	<a href='javascript:void(0)'  class='edit' rel='<?=$m->id?>' >  </a>
										<? endif;?> 
									
								</td>
								
								<? if ($m->closed == 0 && $canedit):?>  
								
							 <td id="edit_title"><?= trim($m->title); ?></td> 
							 <td id="edit_desc"><?= trim($m->desc); ?></td>  
							 <td id="edit_payment"><?= trim($m->payment); ?></td>  
							 <td id="edit_sharing"><?= trim($m->sharing); ?></td>   
							 <td id="edit_date"><?= trim($m->date); ?></td>  
					 		
					 			<?else:?>  
					 			
					 		 <td>    <input type='text' class='input-text' name='stone[<?=$c?>][title]' value='<?=$m->title?> '   readonly="readonly"    /> </td> 
							 <td>    <textarea class='input-text' name='stone[<?=$c?>][desc]'     readonly="readonly"   ><?=$m->desc?> </textarea></td>  
							 <td>    <input type='text' class='input-text' name='stone[<?=$c?>][payment]' value='<?=$m->payment?>'  readonly="readonly"   />  </td>  
							 <td>    <input type='text' class='input-text' name='stone[<?=$c?>][sharing]' value='<?=$m->sharing?>'    readonly="readonly"    /> </td>   
							 <td>    <input type='text' name='stone[<?=$c?>][datetime]' value='<?=$m->date?>'   readonly="readonly"     />     </td>  
					 		 
					 		
					 			<? endif;?>
					 
					 
					 
									<? if ($canedit &&  $can_remove ):?>
									<td>    
										<a href='javascript:void(0)' class='remove '  > Remove  </A>  
									 </td>  
									<?endif;?>
							</tr>
					 <? endforeach;?> 
				 
			</tbody> 
			
	</table> 

			<? if ($toid ):?> 
				<button  class='report_completed'>   Report Completed Milestone     </button>  
			 <?endif;?>  


	<? if ($canedit ):?> 
		<div class="AddSkill" style="width: auto; margin-left: 10px;"><a href="javascript:void(0);" id="addskill" class="AddSkillBtn addnew">Add Item</a></div>
	<? endif;?> 


				


	<div style="position: absolute; bottom: 10px; right: 10px;">
		<span style="float:right; margin: 0;" class="Continue4Btn">
			<input type="submit" value="Next" class="Continue4BtnRi" name="">
		</span>
		<span style="float:right; margin: 0 10px 0 0;" class="Continue4Btn">
				<button onclick="window.location='<?=Router::url("/teamup/general/".$job_id."/".$user_id."",true)?>';return false;"  class="Continue4BtnRi">Back</button>
			</span>
		</div>
		</div>
	</form> 
</div>
<div class="clear"></div>




<link href="/js/smilestone/selectbox.css" rel="stylesheet" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script src="/js/smilestone/jquery.selectbox.min.js"></script> 
	<!--  ÐžÑ‚ÐºÐ»ÑŽÑ‡Ð¸Ð»  Ñ‚Ð°Ðº ÐºÐ°Ðº   Ð¿Ñ€Ð¸ ÐµÐ³Ð¾ Ð¸Ñ�Ð¿Ð¾Ð»ÑŒÐ·Ð¾Ð²Ð°Ð½Ð¸Ð¸  Ð½Ðµ Ð¾Ñ‚Ñ€Ð¿Ð°Ð»Ñ�ÑŽÑ‚ÑŒÑ�Ñ� Ð²Ñ‹Ð±Ñ€Ð°Ð½Ð½Ñ‹Ðµ Ð·Ð½Ð°Ñ‡ÐµÐ½Ð¸Ñ�  . Ñ‚Ð¾ÐµÑ�Ñ‚ÑŒ  Ð² Ñ�Ð°Ð¼Ð¾Ð¼ Ñ�ÐµÐ»ÐµÐºÑ‚Ðµ Ð½Ð¸Ñ‡ÐµÐ³Ð¾ Ð½Ðµ Ð²Ñ‹Ð±Ð¸Ñ€Ð°ÐµÑ‚ÑŒÑ�Ñ�  
	<script src="/js/smilestone/select.js"></script>
--> 

 <!--  Completed Milsestone  only  for  user  expert   -->
	<div class="popup-wrapper report"> 
 		<div class='popup_invite_deffault popup' id='report'> 
			<h3>Report Completed Milestone:</h3>
			<div class='top-mile popup_fieldset'>
				<label>Milestone</label>
				<select class=' select subssda' id='milestones'  >  <option value="0">  select </option>
					<? foreach($stones as $m): 
						if ($m->closed==1 ||  $m->reported == 1 )
							continue; 
					?>
						<option  value='<?=$m->id?>' class='<?=$m->reported?>'>  <?=$m->title?> </option>
					<? endforeach;?>
				</select>
			</div>
			
			<div class="popup_fieldset">
				<label>Completion Details:</label>
				<div class="popup_field">
					<textarea class="textarea" id='detail'></textarea>
				</div>
			</div>
			
			<div class="popup_fieldset">
				<label>Milestone Description:</label>
				<div class="popup_field" >
					<textarea class="textarea"  id='descrim' readonly="readonly"></textarea>
				</div>
			</div>
			
			<div class="popup_fieldset">
				<span style="float:right; margin: 0 43px 0 0;" class="Continue4Btn">
					<input type="submit" value="Confirm Completed" class="Continue4BtnRi confirmcompleted" name="">
				</span>
			</div>
 		</div> 
 		<script type='text/javascript'> 
 			jQuery(document).ready(function(){
 			 	jQuery("#milestones").change(function(){
 			 		var id  =  jQuery(this).find("option:selected").val();  
 			  
 			 	 	jQuery.get("<?=SITE_URL?>/teamup/getmileDesc/"+id , function(date){
 			 	 		jQuery("#descrim").val(date); 
 			 	 		
 			 	 	});
 
 			 		
 			 	});
 			});
 		</script>
 	 
	</div>
	
	
	
	<?php  echo $this->Html->script(array( 'calender/jquery-ui.min','calender/jquery-ui-timepicker-addon'));
			echo $this->Html->css(array('calender/jquery-ui'));  ?>
	
 
	  <!--   
	    Leader   Here Will  Confirm  Closed   Tasks   
	    20134	
	   EX -->
		 
			  <? if (isset($closed)   ):?>  
			  
				<div class="popup-wrapper"> 
				
					<div class='popup_invite_deffault popup' id='report2'> 
						<h3> Approve Completed Milestone :</h3>
						<div class='top-mile popup_fieldset'>
							<label>Milestone</label>
							
							<select   id='closedlist'>  
								<option value=''> Select </option> 
								<?  foreach($closed as $m):    ?> 
									<option value='<?=$m["teamup_closed"]["milestone"]?>'>  <?=$m["title"]?>  </option>
								<? endforeach ; ?>  
							</select> 
							 
						</div>
						
						<!--  Foreach Stack  And Other  Values :  -->
					 
						<?  foreach($closed as $m):    ?>  
						
								<div id='detail_<?=$m["teamup_closed"]["milestone"]?>' class='closedetails' style='display:none;' >
						  			<div class="popup_fieldset">
										<label>Completion Details:</label>
										<div class="popup_field">
											<textarea class="textarea"><?=$m["teamup_closed"]["comments"]?> </textarea>
										</div>
									</div>
									 <div class="popup_fieldset">
										<label>Description:</label>
										<div class="popup_field">
											<textarea class="textarea" readonly="readonly" ><?=$m["desc"]?></textarea>
										</div>
									</div>
									 <div class="popup_fieldset">
										<label>Comments:  </label>
										<div class="popup_field">
											<textarea class="textarea admin_comment"  id ="admin_comment_<?=$m["teamup_closed"]["milestone"]?>"  placeholder='Comments...'></textarea>
										</div>
									</div>
									 <div class="popup_fieldset">
										<span style="float:right; margin: 0 43px 0 0;" class="Continue4Btn">
											<input type="submit" value="Confirm" rel='<?=$m["teamup_closed"]["milestone"]?>' class=" iconfirmwork" name="">
										</span>
									</div>
									
						 		</div>
						
						
							 
							
						<? endforeach;?> 
					</div>
				</div>
				
				<!--  End Admin Confirmed Stack  -->
				
				
				
				
						<script type='text/javascript'> 
						
						jQuery(document).ready(function(){
						 
						  jQuery('#report2').parent().fadeIn();
 
						$('.popup').css('top', '-1000px')
							.animate({'top': '0'}, 500);
							closePopup();
						function closePopup() {
							$('.popup-wrapper').bind('click', function(event){
								var container = $(this).find('.popup');
								if (container.has(event.target).length === 0){
									container.animate({'top': '-1000px'}, 300, function(){$('.popup-wrapper').fadeOut();});
								}
							});
						}
						
						});
						
						</script>
						
				<? endif;?>  
		<!--  Approve Completed Milestone --> 

 
	 <? if (!$canedit):?>   
	 
	 
	 
	 		<script type='text/javascript'>  
	 				jQuery(document).ready(function(){ 
	 					
	 					
	 					
	 					 
	 					jQuery("input[type='checkbox']").attr("disabled",  "disabled"); 
	 					jQuery("input[type='radio']").attr("disabled",  "disabled"); 
	 					////jQuery("textarea").attr("disabled",  "disabled");
	 					
	 				});
	 		
	 		</script>
	  <? endif;?>    
	   
	   
<!--  AutoSize Plugin  For   TextArea fields   -->  
<script type='text/javascript' src="/js/jquery.autosize.min.js"></script>
<script type='text/javascript'>   
		

		
     var  counter =  <?=$c?>;  
     if (counter ==0  )  
    	 counter = 1 ; 
     else
    	 counter = counter + 1;  
     
     
jQuery(document).ready(function(){ 
	calender_data();

	// Edit Single   Note   :
	jQuery("a.edit").click(function() {
		editmode = true;

		var rel = jQuery(this).attr("rel");
		editrow = rel;

		var name = jQuery("tr#row_" + rel + " td#edit_title").text();
		var desc  = jQuery("tr#row_" + rel + " td#edit_desc").text();
		var payment = jQuery("tr#row_" + rel + " td#edit_payment").text();
		var share = jQuery("tr#row_" + rel + " td#edit_sharing").text();
		var date = jQuery("tr#row_"+rel + " td#edit_date").text();

		jQuery("#name_milestone").val(name);
		jQuery("#description_milestone").val(desc);
		jQuery("#date_milestone").val(date);
		jQuery("#payment_milestone").val(payment);
		jQuery("#share_milestone").val(share);

		jQuery(".popup-wrapper.show").fadeIn();
		$('.popup-wrapper.show .popup').css('top', '-1000px').animate({'top': '0'}, 500);
	});
	
	$('.popup-wrapper').bind('click', function(event){
		var container = $(this).find('.popup');
		if (container.has(event.target).length === 0){
			container.animate({'top': '-1000px'}, 700, function(){$('.popup-wrapper').fadeOut();});
		}
	}); 
  				
  				
  				
  				$('.js-ClosePopup').bind('click', function(){
  					editmode  = false ; 
  					$('.popup').animate({'top': '-1000px'}, 300, function(){$('.popup-wrapper').fadeOut();});
  					$('.popup').animate({'top': '-1000px'}, 300, function(){$('.popup-wrapper2').fadeOut();});
  					
  				});
  				
  				
  			    jQuery('textarea').autosize();
  		    
 			 jQuery(".report_completed").click(function(event){ 
				event.preventDefault();
 				 jQuery("#detail").removeAttr("disabled");
 	 			$('.report.popup-wrapper').fadeIn();
				$('.report .popup').css('top', '-1000px')
							.animate({'top': '0'}, 500);
				closePopup();
 				//return false; 
 			});
			function closePopup() {
				$('.popup-wrapper').bind('click', function(event){
					var container = $(this).find('.popup');
					if (container.has(event.target).length === 0){
						container.animate({'top': '-1000px'}, 300, function(){$('.popup-wrapper').fadeOut();});
					}
				});
			}
 			
 			 
 			 
 			 jQuery(".closedmilistone input").attr("readonly","readonly"); 
 			 jQuery(".closedmilistone textarea").attr("readonly","readonly"); 
 			 
 		 
 			 
 			 jQuery(".iconfirmwork").click(function(){
 					var id  =  jQuery(this).attr("rel");   
 					var  comment  = jQuery("#admin_comment_"+id).val(); 
 					jQuery("#detail_"+id).html("<p> Sending... </p>");
					
					
 				    jQuery.post("/Teamup/adminconfirm/"+id, {'comment':comment} ,  function(data){
 					   window.location.reload(false);
					
 				   });
				   
				   setTimeout(function(){
				      window.location.reload(false);
				   },4000);
				   
				   
 				 return false ; 
 				 
 			 });
 			 
 		 	jQuery("#closedlist").change(function(){
 				var id =   jQuery("#closedlist option:selected").val();  
 				if (id){ 
 					jQuery(".closedetails").hide(); 
 					jQuery("#detail_"+id).slideDown();  
 					
 					
 					
 				}
 			});
 			
 			// Report Milestone Complete
 			jQuery(".confirmcompleted").click(function(){ 
 			 	var id  = jQuery("#milestones option:selected").val();
 			    var detail = jQuery("#detail").val();   
 			     var url   =  "/Teamup/closemilestone/" +  id  ;   
 			       if (id==0){

                        alert("Please Select Milestone First");
                       return false;
                   }
 			     //  Sended  stack  :  
 			     jQuery("#report").html("<p> Sending.... </p>  ");
 			     jQuery.post(url , {selected:id , desc :  detail} ,  function(data){
 			    	window.location.reload(false); 
 			     }); 
 			     jQuery(this).attr("disabled");
 				 return  false ; 
 			});
 			
 			 
 			
 			function calender_data(){
 				
 					jQuery(".datepicker").datetimepicker({
 						showSecond: false,
 						showHour: false,
 						showMinute: false,
 						showSecond: false,
 						showTime: false,
 						showTimepicker:false,
 						timeFormat:'YY-mm-dd',
 						/* timeFormat: 'hh:mm:ss',
 						stepHour: 1,
 						stepMinute: 5,
 						stepSecond: 10, */
 						beforeShow: function(input, inst)
 						{	//input.offsetHeight
 							inst.dpDiv.css({marginTop: -1 + 'px', marginLeft: input.offsetWidth + 'px'});
 						},changeYear: true,dateFormat: 'yy-mm-dd',changeMonth: true, minDate: '-100Y',maxDate:new Date(2099,12,00),
 						yearRange: '-100',showAnim: 'fold',showOn: 'both',buttonImageOnly: true, buttonImage: ''+SiteUrl+'/img/icons/icon_cle.png'
 					});
                jQuery(".datepicker").datepicker("setDate" , new Date());
 		
 			}	
 			
 			
 			
	jQuery(".addmilestonepop").click(function() {
		var name = jQuery("#name_milestone").val();
		var desc = jQuery("#description_milestone").val() ;  
		var date = jQuery("#date_milestone").val(); 
		var payment = jQuery("#payment_milestone").val(); 
		var share = jQuery("#share_milestone").val();  

		if (name == "") {
			jQuery("#name_milestone").css("border", "1px solid red");
			return false;
		} else {
			jQuery("#name_milestone").css("border", "0px solid red"); 
		}

		if (date == "") {
			jQuery("#date_milestone").css("border","1px solid red");
			return false;
		} else {
			jQuery("#date_milestone").css("border","0px solid red");
		}

		if (editmode) {
			var edit_counter = jQuery("tr#row_" + editrow + " td#edit_close").text().replace(/[^\d]/gi, '');

			jQuery("tr#row_" + editrow + " td#edit_title").html('<input class="input-text" type="text" name="stone[' + edit_counter + '][title]" value="' + name + '" required />');
			jQuery("tr#row_" + editrow + " td#edit_desc").html('<textarea class="input-text" name="stone[' + edit_counter + '][desc]" required>' + desc + '</textarea>');
			jQuery("tr#row_" + editrow + " td#edit_payment").html('<input class="input-text" type="text" name="stone[' + edit_counter + '][payment]" value="' + payment + '" required />');
			jQuery("tr#row_" + editrow + " td#edit_sharing").html('<input class="input-text" type="text" name="stone[' + edit_counter + '][sharing]" value="' + share + '" required />');
			jQuery("tr#row_" + editrow + " td#edit_date").html('<input class="input-text" type="text" name="stone[' + edit_counter + '][datetime]" value="' + date + '" required />');

			// Delete edit button
			$('tr#row_' + editrow + ' td#edit_close a.edit').remove();

			var container = jQuery(".popup_invite_deffault");
			container.animate({'top': '-1000px'}, 300, function() {
				$('.popup-wrapper').fadeOut();
			});
			editmode = false ; 
			
			return true; 
		}
 				  	 		
 				  	 		
 				  	 		
 				  		// add content Here   :   
 				  			
 				 	jQuery("#rows").append("<tr>  <td> "+counter+"  <input type='hidden' name='stone["+counter+"][closed]' value='0' />  </td>     <td>  <input class='input-text' type='text' name='stone["+counter+"][title]' value='"+name+"'    required   /> </td>   	<td>    <textarea  class='input-text' name='stone["+counter+"][desc]'  required> "+desc+" </textarea></td>  		<td>   <input  class='input-text' type='text' name='stone["+counter+"][payment]'   pattern='[0-9]+'  value='"+payment+"' />  </td>   <td>   <input  class='input-text' type='number' name='stone["+counter+"][sharing]' value='"+share+"'  pattern='[0-9]+' /> </td>     <td>  <input type='text' name='stone["+counter+"][datetime]'   value='"+date+"'/> </td>  <td>  	<a href='javascript:void(0)' class='delete remove' style='margin: 0;'  ></td>       </tr> "); 
 				  				counter ++ ; 	 
 						 	 	
 						 	 	jQuery(".remove").click(function(){
 						 	 			 jQuery(this).parent().parent().remove(); 
 						 	 		 	return false;   
 						 	 	});
 						 	  jQuery('textarea').autosize();   
 						 	  calender_data();
 				  	 		
 				  	 		
 						var container = jQuery(".popup_invite_deffault") ; 
 						 
 							container.animate({'top': '-1000px'}, 300, function(){$('.popup-wrapper').fadeOut();});
 						 
 							 jQuery("#name_milestone").val("");  
 							 jQuery("#description_milestone").val("") ; 
 							 jQuery("#date_milestone").val(""); 
 							jQuery("#payment_milestone").val("") ;  
 							jQuery("#share_milestone").val("") ;
 							editmode =false ; 
 							
 				  return false;  
 			  });
 			
 			
 			
 		  		jQuery(".addnew").click(function(){
 		  	 
 		  		 jQuery("#name_milestone").val("");  
					 jQuery("#description_milestone").val("") ; 
					 jQuery("#date_milestone").val(""); 
					jQuery("#payment_milestone").val("") ;  
					jQuery("#share_milestone").val("") ;
 		  					
 		  					jQuery(".popup-wrapper.show").fadeIn();
 		  					$('.popup-wrapper.show .popup').css('top', '-1000px')
 		  									.animate({'top': '0'}, 500);
 		  			 
 		  					
 		  					/*
 		  				 
 						 	 */ 
 						 	 
 						 	 	
 					return false;  
 				}); 
 		  		
 		 	 	jQuery(".remove").click(function(){
	 	 			 jQuery(this).parent().parent().remove(); 
	 	 		 	return false;   
	 	 	});
 		  		
 		 	});
 

</script>