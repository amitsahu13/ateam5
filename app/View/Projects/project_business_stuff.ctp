<?php echo $this->element("Front/ele_post_project_navigation");?>
<script type='text/javascript'>  
	var total_percent = 100  ;  
	var  current_row =  null ;  
	var editor =  false ; 


</script>




<div class="popup-wrapper show"  id='message' > 
			<div class='popup_invite_deffault popup'> 
				<h3> Add  Dream Owner </h3>  
				<div class=''> <p>  <?=PLEASE_CHECK_PERCENT?>   </p>   </div>
 
</div>
</div> 



	<!-- Popup Goes Here   -->  
 

<div class="popup-wrapper show"  id='netvalue_pop' > 
			<div class='popup_invite_deffault popup'> 
				<h3> Add  Dream Owner </h3> <span>  Required * </span> 

				<div class="popup_fieldset top-mile">
					<label>Username * </label>
					<div class="popup_field">
						<input type='text' class="input-text username" id='username_dream'/>
					</div> 

				</div> 


				<div class="popup_fieldset">
					<label>Full name * </label>
					<div class="popup_field">
						<input type='text' class="input-text fullname" id='username_dream'/>
					</div> 

				</div>  


				<div class="popup_fieldset">
					<label> % of ownership * </label>
					<div class="popup_field">
						<input type='text' class="input-text percent" id='username_dream'/>
					</div> 

				</div>   

				<div class="popup_fieldset">
					<label>  Job Description *  </label>
					<div class="popup_field">
					<span class="slct_rwndInPut">
						<Select  required class='job_select slct_rwndInPutRi with_sml1'>  <option> Select Value </option> 
						 <?php  foreach( $jobdirection as $key=>$value)
							echo  "<option value='{$key}'> {$value} </option> ";

							?>  

						 </Select>
					 </span>
					</div> 

				</div>   

				<div class="popup_fieldset" style='display:none;'>
					<label> Dilution ability * </label>
					<div class="popup_field">
					<span class="slct_rwndInPut">
						 <Select required class='d_select slct_rwndInPutRi with_sml1'> <option> Select Value </option> 
						 <?php  foreach(Configure::read('Project.Dilution') as $key=>$value)
							echo  "<option value='{$key}'> {$value} </option> ";

							?>  

						 </Select>
					 </span>
					</div> 

				</div>   
 

			<div class="popup_fieldset">
					<label> Roles  *</label>
					<div class="popup_field">
					<span class="slct_rwndInPut">
						 <Select required class='role_select slct_rwndInPutRi with_sml1'> <option> Select Value </option> 
						 <?php  foreach(  $categories as $key=>$value)
							echo  "<option value='{$key}'> {$value} </option> ";

							?>  

						 </Select> 
					  </span>
					</div> 

				</div>   
  


				 
				<div class="popup_fieldset popup_invite_content">
					<span class="continue_team  addmilestonepop" style="margin-left: 10px; cursor: pointer;"  > Submit   </span>
					<span class="continue_team js-ClosePopup" style="margin-left: 10px; cursor: pointer;"  >Cancel  </span> 
					<div class="clear"></div>											
				</div> 
			</div>
		</div>



	<script type='text/javascript'> 
						
						jQuery(document).ready(function(){ 

						 
								var j=jQuery("#non_validate_counter").val();
										var custom_counter = jQuery("#non_validate_index_row_counter").val();
										custom_counter++;
										
										
										
						  	jQuery(".addmilestonepop").click(function(){
						  		
						  		 	 jQuery(".percent").css("border","0px solid red"); 
						  		 	 
						  			 var  username  =  jQuery(".username").val(); 
						  			 var  full_name =  jQuery(".fullname").val(); 
								     var  percent   =  jQuery(".percent").val(); 
								     
								     var  job        =  jQuery(".job_select option:selected").val(); 
								     var  dilution   =  jQuery(".d_select option:selected").val(); 
								     var  role      =  jQuery(".role_select option:selected").val(); 
								  
									  var drop_down_direction =   "<span>  "+jQuery(".job_select option:selected").text()+" </span> "; 
						  			  var drop_down_dilution =    "<span>  "+jQuery(".d_select option:selected").text()+" </span> "; 
						  			  var roles  =  			  "<span>  "+jQuery(".role_select option:selected").text()+" </span> ";  


						  			  	// Check Percent 
							var total  = total_percent; 	 
				  	
			 			// imaplamment  Empty Values :     
				
			 				if   (username == ""){
			 					jQuery(".username").css("border","1px solid red"); 
			 					return false;  
			 				}


			 				if   (full_name == ""){
			 					jQuery(".full_name").css("border","1px solid red"); 
			 					return false;  
			 				}


			 				if   (percent == ""){
			 					jQuery(".percent").css("border","1px solid red"); 
			 					return false;  
			 				} 
			 				
			 			
						
			 				if (job == "Select Value"){
			 					alert("Select job description");
			 					return false; 
			 				}
			 				

			 				if (role=='Select Value'){
			 					alert("Select Role");
			 					return false; 
			 				}
			 				
			 				
			 				
						  			  
						  			  
						  	if (!editor){		  

	var milestone_html = '<tr  class="EditTr" id="row_'+j+'"><td align="center" valign="middle">'+custom_counter+'</td><td align="left" valign="middle"><input name="data[DreamOwner]['+j+'][name]" type="text" class="txtfld required" value="'+username+'" readonly="readonly" /></td><td align="left" valign="middle"><input name="data[DreamOwner]['+j+'][full_name]" type="text"   readonly="readonly" value="'+full_name+'"  class="txtfld required" /></td><td align="left" valign="middle"><input name="data[DreamOwner]['+j+'][ownership_percentage]" value="'+percent+'" readonly="readonly"  type="text" class="txtfld required count_percentage" /></td><td align="left" valign="middle" style="display:none;"><input type="hidden" name="data[DreamOwner]['+j+'][dilution_id]"    class= "custom_dropdown required"  value="'+dilution+'">'+drop_down_dilution+' </td>  <td align="left" valign="middle"><input type="hidden" name="data[DreamOwner]['+j+'][role]" readonly="readonly" class= "custom_dropdown " value="'+role+'" >'+roles+' </td> <td align="left" valign="middle"><input type="hidden" name="data[DreamOwner]['+j+'][job_direction_id]" class= "custom_dropdown required"  value="'+job+'" >'+drop_down_direction+' </td>       <td align="left" valign="right"><div class="edit_deletBX" style="float:left;"> <input type="button" id="edit_78" class="edit" onclick="edit_mildestone2(this)" value="" alt="Edit" title="Edit">  <input type="button" value="" class="min_icon" title="Delete" alt="Delete" onclick="removeElement3('+j+');" /></div></td></tr>';
			
	
	
	
	
	
	jQuery('#dream_owner_table #fileattache tr:last').after(milestone_html);
			 	
			j++;			
			 
			custom_counter++

							$('.popup').animate({'top': '-1000px'}, 300, function(){$('.popup-wrapper').fadeOut();});
 									editor = false ; 
 									
						  	} else{
						  		 
						  		 roles =  jQuery(".role_select option:selected").val();
						  	 
						  		 jQuery(current_row).parent().parent().parent().find(" select[name*='[dilution_id]'] option ").removeAttr("selected"); 
						  		 jQuery(current_row).parent().parent().parent().find(" select[name*='[role]'] option ").removeAttr("selected"); 
						  		 jQuery(current_row).parent().parent().parent().find(" select[name*='[job_direction_id]'] option ").removeAttr("selected"); 
							  		 
						  		 jQuery(current_row).parent().parent().parent().find("input[name*='[name]']").val(username); 
						  	 	 jQuery(current_row).parent().parent().parent().find("input[name*='[full_name]']").val(full_name); 
						  	 	 jQuery(current_row).parent().parent().parent().find("input[name*='[ownership_percentage]']").val(percent); 
						  	 	 
						  	 	 
						  	 	 
						  	 	 
						  	  	 jQuery(current_row).parent().parent().parent().find(" input[name*='[dilution_id]'] ").val(dilution); 
						  	 	 jQuery(current_row).parent().parent().parent().find(" input[name*='[role]'] ").val(roles);  
						  	 	 jQuery(current_row).parent().parent().parent().find(" input[name*='[job_direction_id]'] ").val(job);  
						  	 	 
						  	 	
						  	 	 jQuery(current_row).parent().parent().parent().find(" input[name*='[job_direction_id]'] ").parent().find("span").text(jQuery(".job_select option:selected").text()); 
						  	 	 jQuery(current_row).parent().parent().parent().find(" input[name*='[role]'] ").parent().find("span").text(jQuery(".role_select option:selected").text()); 
						  	 	 jQuery(current_row).parent().parent().parent().find(" input[name*='[dilution_id]'] ").parent().find("span").text(jQuery(".d_select option:selected").text()); 
						  	 	 
						  	 	 
						  	 	 
						  	 	 $('.popup').animate({'top': '-1000px'}, 300, function(){$('.popup-wrapper').fadeOut();});
						  	 	 editor  = false ; 
						  	}
 							 
						  	
						  		return false; 
 									
 						 	});

						  	
						  	
						  	
						  	
						  	
						  	
						  	
 
							closePopup(); 
 

						function closePopup() {

			  				$('.js-ClosePopup').bind('click', function(){
			  				 	editor =  false ; 
			  					$('.popup').animate({'top': '-1000px'}, 300, function(){$('.popup-wrapper').fadeOut();});
			  				});
			  				  
			  				
							//   flush Border validation     
			  				jQuery(".percent").css("border","0px solid white"); 
			  				jQuery(".username").css("border","0px solid white"); 
			  				jQuery(".full_name").css("border","0px solid white"); 
			  				
			  				
							$('.popup-wrapper').bind('click', function(event){
								var container = $(this).find('.popup');
								if (container.has(event.target).length === 0){
									container.animate({'top': '-1000px'}, 300, function(){$('.popup-wrapper').fadeOut();});
								}
							}); 



						}
						
						});
						
						</script>









	<!-- End Popup -->   









<div class="product_dscrpBOX" style="width:100%;">
	<h3><span class="round_bgTXT">3</span>Business Stuff</h3>
	<div class="compensation_frmDV">
   <?php
	echo $this->Form->create('Project',array('url'=>array('controller'=>'projects','action'=>'project_business_stuff'),'type'=>'file','onsubmit'=>'return check_validation()'));

	echo $this->Form->hidden('id');
	
	if(!empty($project_file)){
			
		foreach($project_file as $key=>$file)
		{	
			echo $this->Form->hidden('ProjectBusinessplanFile.'.$key.'.project_id',array('value'=>$id));	
			echo $this->Form->hidden('ProjectBusinessplanFile.'.$key.'.file_name',array('value'=>$file['FileTemp']['project_file']));	
		}
	}
 

	?>
	
		<div class="compensation_frmrow">
			<div class="compensation_frmrow_L">
				<p><label>Business Plan Level*</label></p>
			</div>
			<div class="compensation_frmrow_R">
				<p><span class="slct_rwndInPut">
					<?php echo ($this->Form->input('business_plan_level_id', array('div'=>false, 'label'=>false,'empty'=>'-- Select Level --','options'=>$businessplanlevelData,"class" => "custom_dropdown","error" => array("wrap" =>EDITWRAP, "class" => "error-message"))));?>
				</span>
				</p>
		 
			</div>
		</div>
		
		<div class="compensation_frmrow">     	                	
		   <?php echo $this->element("Front/ele_upload_business_plan");?>		 
		   
		 		
		</div>
		
			<div class="clear"></div>
		
		  <div class="compensation_frmrow">
                    	<div class="compensation_frmrow_L">
                        	<p><label>Dream Owners Statement</label></p>
                        </div>
                        <div class="compensation_frmrow_R">
                        	<p style="line-height:18px; margin: 7px 0 0;">Please State the Complete stake holder's list in the project<a href="#" title="Info" class="info"></a> <br />
                            (Inside and outside the plateform)
                            </p>
                        </div>
                    </div>
                  	<div class="compensation_frmrow" id="dream_owner_table">
					<div class="error-message" style="text-align:center;padding:0 0 0 0;"></div>
                   	<?php echo $this->element("Front/ele_dream_owner");?>                    
					</div>
		
		<div class="clear"></div>
		
		
		
		
		
		
		 
		
		
		
		
		
		
		
		
		
		
		
		
		<div  id="show_dreamowner" style="display:none;" >
		<?php
echo $this->element('Front/ele_dream_owner_popup_check');
	?>
		</div>
		
		
	  
	  
			<div class="compensation_frmrow_R margin15_btm float_left">
					<p style="display: inline-block; vertical-align: middle">
					<?php echo $this->Form->checkbox('self_investment_option', array('class'=>"chckBX check_box self_invest",'style'=>"position:relative; top:8px; margin-left:20px;","value"=>1));?>
						
						
						
						<span class="label_input_spn">Self Investment</span>
						
						
						<div class='self_inv_div' style='display:none; '>
						
						<span class="TXT_rwndInPut">
							<?php echo $this->Form->input('self_invest_money', array('div'=>false,'label'=>false, "class" => "TXT_rwndInPutRi"));?>
							<span id="self_validation"></span>
						</span>
						
						<font class="side_txt">$</font>
						<span class="self_details" style="display:none;">
						<label class="label_input_dtl">Details</label>
						<?php echo $this->Form->input('self_invest_description', array('div'=>false,'type'=>'textarea','label'=>false, "class" => "Description_stuff"));?>
						</span>
						 </div>
						
					</p>
			</div>  
			
			
			
			
			
			
			
			
			<div class="clear"></div>
			<div class="compensation_frmrow_R margin15_btm float_left">
					<p style="display: inline-block; vertical-align: middle">
					<?php echo $this->Form->checkbox('external_fund_option', array('class'=>"chckBX check_box ext_funding",'style'=>"position:relative; top:8px; margin-left:20px;" ,"value"=>1));?>
					
						<span class="label_input_spn">External Funding</span>
						
						
						<div class='foond_div' style='display:none;'>  
						
						
						
						<span class="TXT_rwndInPut">
							<?php echo $this->Form->input('external_fund_money', array('div'=>false,'label'=>false, "class" => "TXT_rwndInPutRi"));?>
						<span id="external_validation"></span>
						</span>
						<font class="side_txt">$</font>
						<span class="ext_details" style="display:none;">
						<label class="label_input_dtl">Details</label>
						<?php echo $this->Form->input('external_fund_description', array('div'=>false,'type'=>'textarea','label'=>false, "class" => "Description_stuff"));?></span>
					
					</div> 
					
					
					</p>
			</div>  
			
			
			
			<script type='text/javascript'> 
						function goback(url){
						 	window.history.go(-1); 
						 	
							return false ; 
						}
					</script>
			<div class="clear"></div>
			
			<!--Back Bottom  goes  Here for The Projects   Navigation   -->
			<div class="btm_nextbtnDV"> 
				<span style="float:left;" class="Continue4Btn"> 
				<input type="button" name="" class="Continue4BtnRi" value="Previous" onclick="goback('<?=Router::url(array( 'controller' => 'projects','action' => 'project_status_timeline' , $project_id), true);?>');">
 				</span>
				<span style="float:right; margin: 0;" class="Continue4Btn">
					<div class="submit">
					
 						 <a class="Continue4BtnRi" href='/projects/public_view/<?=$project_id?>'  class='publicview'  target="_blank"> Preview in public view </A>  
			 
					</div>
				</span>
				<span style="float:right;" class="Continue4Btn">
					<?php echo $this->Form->submit('Submit',array('class'=>'Continue4BtnRi sendform','value'=>"Submit")); ?>
				</span>
			</div>
			
			
			
	<?php
	echo $this->Form->end();
	?>
	</div>
</div>
<?php 
//echo $this->Html->css(array('popup'));
//echo $this->Html->script(array('calender/jquery-1.6.2.min','popup')); 
?>	
<!--<div  id="show_estimation" style="display:none;">
<?php
//echo $this->element('Front/ele_add_project_estimationnet_value');
?>
</div>-->				
<script type="text/javascript">
	jQuery(function(){		
		jQuery(".delete").live('click',function(){
			var id 		= 	jQuery(this).closest('li').attr('id');			
			jConfirm('Are you sure you want to delete this file?', 'Confirmation Dialog', function(r) {
				if(r == true)	{
					jQuery.ajax({
						type:"GET",
						url:"<?php echo Router::url(array('controller'=>'projects', 'action'=>'delete_project_file')); ?>/"+ id,
						success : function(data) {
							jQuery('#fileattache').find('#'+id).remove();		
						},
						error : function() {
							jAlert('File could not be deleted. Please try again', 'Alert Dialog');
						},
					})
				}
			});
		});
		jQuery(".download").live('click',function(){
			var id 		= 	jQuery(this).closest('li').attr('id');	
			window.location = SiteUrl+"/projects/download_project_file/"+ id;
		});
		
		
		jQuery(".delete_edit").live('click',function(){
			var id 		= 	jQuery(this).closest('li').attr('id');	
			var proj_id = 	jQuery(this).closest('li').attr('proj-id');			
						
			jConfirm('Are you sure you want to delete this file?', 'Confirmation Dialog', function(r) {
				if(r == true)	{
					jQuery.ajax({
						type:"GET",
						url:"<?php echo Router::url(array('controller'=>'projects', 'action'=>'delete_edit_business_file')); ?>/"+ proj_id+"/"+id,
						success : function(data) {
							jQuery('#fileattache').find('#'+id).remove();		
						},
						error : function() {
							jAlert('File could not be deleted. Please try again', 'Alert Dialog');
						},
					})
				}
			});
		});
		jQuery(".download_edit").live('click',function(){
			var id 		= 	jQuery(this).closest('li').attr('id');	
			var proj_id = 	jQuery(this).closest('li').attr('proj-id');
			window.location = SiteUrl+"/projects/download_edit_business_file/"+ proj_id+"/"+id;
		});
		
		if(jQuery('#ProjectSelfInvestmentOption').is(':checked')){				
				jQuery('.self_details').show();
		}
		
		if(jQuery('#ProjectExternalFundOption').is(':checked')){			
			jQuery('.ext_details').show();
            jQuery(".Description_stuff").hide() ;
            

		}
		
		jQuery('.self_invest').live('click',function(){	
			
			if(jQuery(this).is(':checked')){
				//jQuery("#ProjectSelfInvestDescription").attr('disabled',false);
			//	jQuery('.self_details').show();
				
				
			}
			else{
				jQuery("#ProjectSelfInvestDescription").val('');				
				jQuery('.self_details').hide();
				jQuery("#ProjectSelfInvestMoney").val('');
				
			}
		
		});
		jQuery('.ext_funding').live('click',function(){			
			if(jQuery(this).is(':checked')){
				//jQuery("#ProjectExternalFundDescription").attr('disabled',false);
				//jQuery('.ext_details').show();
				
			}
			else{
				jQuery("#ProjectExternalFundDescription").val('');
				jQuery('.ext_details').hide();
				jQuery("#ProjectExternalFundMoney").val('');
				
			}
		
		});
		
	});	
</script>
<script type="text/javascript">
 jQuery(document).ready(function() {

 
	 	jQuery(".sendform").click(function(){
	 		 
			 
		 	var total  = 0; 	 
 
			  	  jQuery("#dream_owner_table input[name*='[ownership_percentage]']").each(function(){
			 	 		 var val = parseInt(jQuery(this).val()); 
			 	 		 total_percent =  total_percent - val; 
			 	 });
		 

     // total_percent :
	 if ((total_percent==0 || total_percent == 100) &&  jQuery("#dream_owner_table input[name*='[ownership_percentage]']").length >0 ){

		 
	 }
	  else { 
		  total_percent = 100 ; 
		  jQuery("input[name*='[ownership_percentage]']").css("border","1px solid red"); 
		  jQuery('#message').fadeIn();
		  jQuery('.popup').css('top', '-1000px').animate({'top': '0'}, 500);  
		  return false;  
	 }

	  	return true;  
	 	}); 
	 
	 
 
	 
	 
	  
	 // setInterval   So we can check dynamicly added Elements  
	 setInterval(function(){
		 
		  jQuery(".username").blur(function(){
			   var val =  jQuery(this).val(); 
			   var t =  this ; 
			   
			   if (val !=""){
				  var url = '<?=Router::url(array( 'controller' => 'users','action' => 'userExists'), true);?>/'+val;  
			 		jQuery.get(url,function(d){
			 			if (d=="false"){
			 				jQuery(t).attr("placeholder","Username not found!");
							jQuery(t).css("border","1px solid red"); 
							jQuery(t).val("");
			 			 }else{
			 				jQuery(t).css("border","1px solid white");  
			 				 jQuery(".fullname").val(d); 
			 				
			 				
			 			 }
			 		});
					  
					  
			   } 
		  }); 

		   // Percent VAlidator  :   
			   jQuery(".percent").change(function(){
			  var t =  this ;  
			  	
			   var val = parseInt(jQuery(this).val()); 
			  
			   
			   	if (val <=0 || val > 100 || isNaN(val)){
			   		
			   		 jQuery(t).attr("placeholder","Wrong Value, From 0 to 100");
					jQuery(t).css("border","1px solid red"); 
					jQuery(t).val("");
			   		
			   		
			   	} else{
			   		jQuery(t).css("border","1px solid white"); 
			   	}
				   
				   
			   
			   }); 
		  
			   
		 
		 
	 },800);
	
	 
	 
	 // foreach   percent :    
		 
	 
	 
	 
	 
	<?php if(!$validation)
	{
	?>
		var j=jQuery("#non_validate_counter").val();
		var custom_counter = jQuery("#non_validate_index_row_counter").val();
		custom_counter++;
	<?php
	}
	else
	{
	?>
		var j=jQuery('#validation_row_counter').val();
		var custom_counter = jQuery("#index_row_counter").val();		
		custom_counter++;
	<?php
	}	
	?>
	var drop_down = '<option value="">-- Select Timeline --</option>';
	<?php
	foreach(Configure::read('Project.Timeline') as $key=>$value)
	{
	?>
		var key = '<?php echo $key;?>';
		var value = '<?php echo $value;?>';
		drop_down+= '<option value="'+key+'">'+value+'</option>'
	<?php
	}
	?> 

	jQuery("#project_estimation_value_table .add_new").live('click',function(){			
			 jQuery('#netvalue_pop').fadeIn();
 
						$('.popup').css('top', '-1000px')
							.animate({'top': '0'}, 500); 
 						return  ; 

			var milestone_html = '<tr  class="EditTr" id="row_'+j+'"><td align="center" valign="middle">'+custom_counter+'</td><td align="left" valign="middle"><select name="data[ProjectEstimation]['+j+'][timeline]" class= "custom_dropdown">'+drop_down+'</select></td><td align="left" valign="middle"><input name="data[ProjectEstimation]['+j+'][estimate_net_value]" type="text" class="txtfld required" /></td><td align="left" valign="middle"><textarea name="data[ProjectEstimation]['+j+'][description]" cols="" class="required" rows=""></textarea></td><td align="left" valign="middle"><div class="edit_deletBX" style="float:left;"><input type="button" value="" class="min_icon" title="Delete" alt="Delete" onclick="removeElement('+j+');" /></div></td></tr>';
			jQuery('#estimation_attache tr:last').after(milestone_html);
			$(".custom_dropdown").selectbox();		
			j++;			
			
			custom_counter++
		});
	});
	
   
 
 //  Remove Elemtn  :    
	function removeElement(id) {
		jQuery('#row_'+id).remove();
	}
 


function check_validation()
{
	patt2 = /^\s*(\+|-)?\d+\s*$/;
	flag = true;
	var valid_html = '<div style="color:red; font-family:arial; font-size:12px;" class="validation">please fill only number</div>';
	var required_selfValidation_html = '<div style="color:red; font-family:arial; font-size:12px;" class="validation">Self Investment is required.</div>';
	var required_ExternalFunding_html = '<div style="color:red; font-family:arial; font-size:12px;" class="validation">External Funding is required.</div>';
	
	if($('#ProjectSelfInvestmentOption:checked').val() == 1){
		if(jQuery('#ProjectSelfInvestMoney').val() != '')
		{
			if (!jQuery('#ProjectSelfInvestMoney').val().match(patt2))
			{
				
				jQuery("#self_validation").html(valid_html);
				flag = false;
			}
			else
			{
				jQuery("#self_validation").html('');
			}
		}
		else{
			jQuery("#self_validation").html(required_selfValidation_html);
				flag = false;
		}
	}
	else{
		jQuery("#self_validation").html('');
	}
	if($('#ProjectExternalFundOption:checked').val() == 1){
		if(jQuery('#ProjectExternalFundMoney').val() != '')
		{
			if (!jQuery('#ProjectExternalFundMoney').val().match(patt2))
			{
				
				jQuery("#external_validation").html(valid_html);
				flag = false;
			}
			else
			{
				jQuery("#external_validation").html('');
			}
		}
		else{
			jQuery("#external_validation").html(required_ExternalFunding_html);
				flag = false;
		
		}
	}
	else{
		jQuery("#external_validation").html('');
	}
	if(flag)
	{
		return true;
	}
	else
	{
		return false;
	}	
}
</script>




<script type="text/javascript">
	
		var roles =  "" ; 


 jQuery(document).ready(function() {
	 
	 
	  
	 
	  // Validator for   Investmant fields stack  : 
		  
		  setInterval(function(){
			  
			   jQuery("input[name*='estimate_net_value']:not(:disabled):not([readonly])").each(function(){
				    var val =  parseInt(jQuery(this).val());  
				    if (isNaN(val) ||  val < 0){
					   jQuery(this).css("border","1px solid red"); 
					   jQuery(this).attr("placeholder","only number"); 
					   jQuery(this).val("");
				   }else{
					   jQuery(this).css("border","1px solid white");    
				   }
				 });
			   
			   // Check Checkboxes :  
				   
				   if (jQuery(".self_invest").is(":checked")){

					   jQuery(".self_inv_div").show();

				   }else{
					   jQuery(".self_inv_div").hide();
				   }
			   
			    	if (jQuery(".ext_funding").is(":checked")){
					    jQuery(".foond_div").show(); 
					 }else{
					   jQuery(".foond_div").hide(); 
				 	  }
				   
				   
				   // Numbers   validators   
				   var inv = jQuery("input[name*='self_invest_money']");  
				   var fun = jQuery("input[name*='external_fund_money']");  
			     
				   // inv val   ;    
				   
				   if (inv.val()!=""){
					   
					   if (isNaN(parseInt(inv.val()))  ||  parseInt(inv.val()) <0  ) 
						   {
						   jQuery(inv).css("border","1px solid red"); 
						   jQuery(inv).attr("placeholder","only number"); 
						   jQuery(inv).val("");
						   }else{
							   jQuery(inv).css("border","0px solid white");    
						   }
					   
				   }
				   
				   
				   if (fun.val() != ""){ 
					   
					   if (isNaN(parseInt(fun.val()))  ||  parseInt(fun.val()) <0  ) 
					   {
					   jQuery(fun).css("border","1px solid red"); 
					   jQuery(fun).attr("placeholder","only number"); 
					   jQuery(fun).val("");
					   }else{
						   jQuery(fun).css("border","0px solid white");    
					   }
				   
				   
				   }
				   
				   
				   
			   
			  },500);
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 

	<?php if(!$validation)
	{
	?>
		var j=jQuery("#non_validate_counter").val();
		var custom_counter = jQuery("#non_validate_index_row_counter").val();
		custom_counter++;
	<?php
	}
	else
	{
	?>
		var j=jQuery('#validation_row_counter').val();
		var custom_counter = jQuery("#index_row_counter").val();		
		custom_counter++;
	<?php
	}	
	?>
	var drop_down_direction = '<option value="">-- Select description --</option>';
	<?php
	foreach($jobdirection as $key=>$value)
	{
	?>
		var key = '<?php echo $key;?>';
		var value = '<?php echo $value;?>';
		drop_down_direction+= '<option value="'+key+'">'+value+'</option>'
	<?php
	}
	?>
	var drop_down_dilution = '<option value="">-- Select dilution --</option>';
	<?php
	foreach(Configure::read('Project.Dilution') as $key=>$value)
	{
	?>
		var key = '<?php echo $key;?>';
		var value = '<?php echo $value;?>';
		drop_down_dilution+= '<option value="'+key+'">'+value+'</option>'
	<?php
	}
	?>
	
	<?php
			foreach($categories as $key=>$value)
			{
			?>
				var key = '<?php echo $key;?>';
				var value = '<?php echo $value;?>';
				roles+= '<option value="'+key+'">'+value+'</option>'
			<?php
			}
			?>
	
	
	// Dream Owner Add Button  here  
	
	jQuery("#dream_owner_table .add_new").live('click',function(){		 
				editor =false ; 
				                        jQuery(".username").val(""); 
						  			    jQuery(".fullname").val(""); 
								        jQuery(".percent").val("");  

								        

 	 					jQuery('#netvalue_pop').fadeIn();
  						$('.popup').css('top', '-1000px')
							.animate({'top': '0'}, 500); 
 						return  ;  




			var milestone_html = '<tr  class="EditTr" id="row_'+j+'"><td align="center" valign="middle">'+custom_counter+'</td><td align="left" valign="middle"><input name="data[DreamOwner]['+j+'][name]" type="text" class="txtfld required" /></td><td align="left" valign="middle"><input name="data[DreamOwner]['+j+'][full_name]" type="text" class="txtfld required" /></td><td align="left" valign="middle"><input name="data[DreamOwner]['+j+'][ownership_percentage]" type="text" class="txtfld required count_percentage" /></td><td align="left" valign="middle"><select name="data[DreamOwner]['+j+'][job_direction_id]" class= "custom_dropdown required">'+drop_down_direction+'</select></td><td align="left" valign="middle" style="display:none;"><select name="data[DreamOwner]['+j+'][dilution_id]" class= "custom_dropdown required">'+drop_down_dilution+'</select></td>  <td align="left" valign="middle"><select name="data[DreamOwner]['+j+'][role]" class= "custom_dropdown required">'+roles+'</select></td>        <td align="left" valign="right"><div class="edit_deletBX" style="float:left;"><input type="button" value="" class="min_icon" title="Delete" alt="Delete" onclick="removeElement3('+j+');" /></div></td></tr>';
			jQuery('#dream_owner_table #fileattache tr:last').after(milestone_html);
		 	
			j++;			
			 
			custom_counter++
		});
	});
	
	function removeElement3(id) {
		jQuery('#dream_owner_table #row_'+id).remove();
	}
	
	jQuery("#ProjectProjectLeaderForm").submit(function(){ 
    
		
		
		
		flag = false;
		var total = 0;
		 jQuery(".required").each(function(){
			if(jQuery(this).val() != '')
			{
				flag = true;
				return flag;
			}	
		
		});
		
		
		if(flag)
		{
			 jQuery(".count_percentage").each(function(){
			
				 if(jQuery(this).val() != '')
				{
					var percentage = parseInt(jQuery(this).val());
					total+=percentage;
				}
			});
			
			if(total>100)
			{
				openOffersDialog('dreamowner');
				return false;
			}
			else
			{
				closeOffersDialog('dreamowner');
				return true;
			}
		}
		return true;		
	 
		
	});	
</script>	


		