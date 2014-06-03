<script type="text/javascript">

</script>
<table border="0" cellspacing="0" cellpadding="0" class="tbl tablelistSe business_stuff-tbl"  id="fileattache">
	<tr>
	  <th align="center" valign="middle">#</th>
	  <th align="left" valign="middle">Username</th>
	   <th align="left" valign="middle" width="135">Full Name</th>
	  <th align="left" valign="middle">% of ownership</th>
	  <th align="left" valign="middle" width="190">Job Description</th>
	  
	  
	  <th align="left" valign="middle" style='display:none; '>Dilution Ability</th> 
	  
	  <th align="left" valign="middle">Roles</th> 
	  
	  
	  <th align="left" valign="middle"> Remove</th>
	</tr>
	<?php 
	if(!$validation)
	{
		if(!empty($dream_owner))
		{ 	$i=0;
			foreach($dream_owner as $owner)
			{	
	?>			
			  <tr id="<?php echo $owner['DreamOwner']['id'];?>" class="EditTrRemove">
				<td align="center" valign="middle"><?php echo $i+1;?></td>
			
				<td align="left" valign="middle"><input readonly="readonly" type="text" name="data[DreamOwner][<?php echo $i;?>][name]" class="txtfld required <?php echo "common_enable".$owner['DreamOwner']['id']?>"  value="<?php echo $owner['DreamOwner']['name']?>"/></td>
				 <td align="left" valign="middle"><input readonly="readonly" type="text" name="data[DreamOwner][<?php echo $i;?>][full_name]" class="txtfld required <?php echo "common_enable".$owner['DreamOwner']['id']?>"  value="<?php echo $owner['DreamOwner']['full_name']?>"/></td>
				

				 <td align="left" valign="middle"><input readonly="readonly" type="text" name="data[DreamOwner][<?php echo $i;?>][ownership_percentage]" class="txtfld required count_percentage <?php echo "common_enable".$owner['DreamOwner']['id']?>"  value="<?php echo $owner['DreamOwner']['ownership_percentage']?>"/></td>
				
 
				
				<td align="left" valign="middle">  
				 	<input type='hidden'   name='data[DreamOwner][<?php echo $i;?>][role]'  value='<?php echo $owner['DreamOwner']['role']?>' />   
					<span>   <?
							if (isset($categories[$owner['DreamOwner']['role']]))
								echo  $categories[$owner['DreamOwner']['role']] ; 

					?></span> 
				 </td> 


			
				 
				  



	 <td align="left" valign="middle" style='displaY:none; '>  
				 	<input type='hidden'   name='data[DreamOwner][<?php echo $i;?>][dilution_id]'  value='<?php echo $owner['DreamOwner']['dilution_id']?>' />   
					<span>  <?
								$c =   Configure::read('Project.Dilution'); 
								if (isset( $c[$owner['DreamOwner']['dilution_id']]))
								echo  $c[$owner['DreamOwner']['dilution_id']]; 
					?> </span> 
				 </td> 


	 <td align="left" valign="middle">  
				 	<input type='hidden'   name='data[DreamOwner][<?php echo $i;?>][job_direction_id]'  value='<?php echo $owner['DreamOwner']['job_direction_id']?>' />   
				 	 <span>  <?

				 	 if (isset($jobdirection[$owner['DreamOwner']['job_direction_id']])) 
				 	 			echo  $jobdirection[$owner['DreamOwner']['job_direction_id']]; 
				 	 	?> </span> 

				 </td>  

			  
				
				
				
				
				<td align="left" valign="middle">
					<div class="edit_deletBX" style="float:left;">
 													<input type="button" title="Edit" alt="Edit" value="" onclick="edit_mildestone2(this)" class="edit" id="<?php echo "edit_".$owner['DreamOwner']['id'];?>"/>
 						
						<input type="button" value="" class="min_icon DeleteDrem custom_del" title="Delete" alt="Delete" id="<?php echo "delete_".$owner['DreamOwner']['id'];?>"/>		
						<input type="hidden" name="data[DreamOwner][<?php echo $i;?>][id]" value="<?php echo $owner['DreamOwner']['id']; ?>"/>
						<input type="hidden" name="data[DreamOwner][<?php echo $i;?>][check_textbox]" class="<?php echo "opentext_".$owner['DreamOwner']['id'];?>" value="<?php echo $owner['DreamOwner']['id']; ?>" disabled="disabled" />
					</div>
				</td> 
				
				
				
				
				
				
				
			  </tr>
	<?php 	$i++;
			}
		}else{
		
		$i=0;
		?>
				
				<tr>
					<td align="center" valign="middle" colspan="5"> </td>
				
				</tr>
			<?php
		}?>
			<input type="hidden"  value="<?php echo $i;?>" id="non_validate_counter"/>
			<input type="hidden"  value="<?php echo $i;?>" id="non_validate_index_row_counter"/>
	<?php	
		
		
	}else{	
			$i=0;
			if(!empty($dream_owner))
			{ 	
				
				foreach($dream_owner as $owner)
				{	
		?>			
				  <tr id="<?php echo $owner['DreamOwner']['id'];?>" class="EditTrRemove">
				 
					<td align="center" valign="middle"><?php echo $i+1;?></td>
					<td align="left" valign="middle"><input readonly="readonly" type="text" name="data[DreamOwner][<?php echo $i;?>][name]" class="txtfld required <?php echo "common_enable".$owner['DreamOwner']['id']?>"  value="<?php echo $owner['DreamOwner']['name']?>"/></td>
					
					<td align="left" valign="middle"><input readonly="readonly" type="text" name="data[DreamOwner][<?php echo $i;?>][full_name]" class="txtfld required <?php echo "common_enable".$owner['DreamOwner']['id']?>"  value="<?php echo $owner['DreamOwner']['full_name']?>"/></td>
					
				 	<td align="left" valign="middle">
					<input readonly="readonly" type="text" name="data[DreamOwner][<?php echo $i;?>][ownership_percentage]" class="txtfld required count_percentage <?php echo "common_enable".$owner['DreamOwner']['id']?>"  value="<?php echo $owner['DreamOwner']['ownership_percentage']?>"/></td>
					<td align="left" valign="middle"><?php echo ($this->Form->input("DreamOwner.$i.job_direction_id", array('div'=>false, 'label'=>false,'empty'=>'-- Select Description --','options'=>$jobdirection,"class" => "custom_dropdown required","error" => array("wrap" =>EDITWRAP, "class" => "error-message"))));?></td>
					<td align="left" valign="middle" style='display:none;'><?php echo ($this->Form->input("DreamOwner.$i.dilution_id", array('div'=>false, 'label'=>false,'empty'=>'-- Select Dilution --','options'=>Configure::read('Project.Dilution'),"class" => "custom_dropdown required","error" => array("wrap" =>EDITWRAP, "class" => "error-message"))));	?></td>
					<td align="left" valign="middle"><?php echo ($this->Form->input("DreamOwner.$i.role", array('div'=>false, 'label'=>false,'empty'=>'-- Select Role --','options'=>$categories,"class" => "custom_dropdown required","error" => array("wrap" =>EDITWRAP, "class" => "error-message"))));	?></td>
				
					 <td align="left" valign="middle">
						<div class="edit_deletBX" style="float:left;">				
							<input type="button" title="Edit" alt="Edit" value="" onclick="edit_mildestone2(this)" class="edit" id="<?php echo "edit_".$owner['DreamOwner']['id'];?>"/>
							<input type="button" value="" class="min_icon custom_del" title="Delete" alt="Delete" id="<?php echo "delete_".$owner['DreamOwner']['id'];?>"/>		
							<input type="hidden" name="data[DreamOwner][<?php echo $i;?>][id]" value="<?php echo $owner['DreamOwner']['id']; ?>"/>
							<input type="hidden" name="data[DreamOwner][<?php echo $i;?>][check_textbox]" class="<?php echo "opentext_".$owner['DreamOwner']['id'];?>" value="<?php echo $owner['DreamOwner']['id']; ?>" disabled="disabled" />
						</div>
					</td>
				  </tr>
		<?php 	
				$i++;
				}
			}
		$k=$i;
		
		if(!empty($this->request->data['DreamOwner']))
		{	
			
			 
				
			foreach($this->request->data['DreamOwner'] as $key=>$value)
			{
				
				if(empty($value['id']))
				{
				

	?>  
				<tr  class="EditTr" id="<?php echo 'row_'.$key;?>">
					<td align="center" valign="middle"><?php echo $k+1;?></td>
					<td align="left" valign="middle"><?php echo $this->Form->input("DreamOwner.$key.name",array("type"=>"text","class"=>"txtfld required","label"=>false,"div"=>false))?>
				
					</td> 
					
					
					<td align="left" valign="middle"><input readonly="readonly" type="text" name="data[DreamOwner][<?php echo $key;?>][full_name]" class="txtfld required <?php echo "common_enable".$key?>"  value=" "/></td>
					
					
					<td align="left" valign="middle">
					<?php echo $this->Form->input("DreamOwner.$key.ownership_percentage",array("type"=>"text","class"=>"txtfld required count_percentage required","label"=>false,"div"=>false))?>
					</td>
					
					<td align="left" valign="middle">
					<?php echo ($this->Form->input("DreamOwner.$key.job_direction_id", array('div'=>false, 'label'=>false,'empty'=>'-- Select Description --','options'=>$jobdirection,"class" => "custom_dropdown required","error" => array("wrap" =>EDITWRAP, "class" => "error-message"))));?>
					</td>
					
					<td align="left" valign="middle" style='displaY:none;'>
					<?php echo ($this->Form->input("DreamOwner.$key.dilution_id", array('div'=>false, 'label'=>false,'empty'=>'-- Select Dilution --','options'=>Configure::read('Project.Dilution'),"class" => "custom_dropdown required","error" => array("wrap" =>EDITWRAP, "class" => "error-message"))));	?>
					</td>
					
			    	<td align="left" valign="middle">  <?php echo ($this->Form->input("DreamOwner.$key.role", array('div'=>false, 'label'=>false,'empty'=>'-- Select Role --','options'=>$categories,"class" => "custom_dropdown required","error" => array("wrap" =>EDITWRAP, "class" => "error-message"))));	?></td>
				 	<td align="left" valign="middle"><div class="edit_deletBX" style="float:left;">
				
						<input type="button" value="" class="min_icon" title="Delete" alt="Delete" onclick="removeElement('<?php echo $key; ?>');" /></div></td>
				</tr>
	<?php		
				$k++;
				
				}else
				{
					
					if(isset($value['check_textbox']))
					{
					?>
						<script type="text/javascript">
						var textbox_id = '<?php echo $value['check_textbox'];?>';
						 jQuery("#"+textbox_id).removeClass('EditTrRemove');
						jQuery("#"+textbox_id).addClass('EditTr');
						jQuery(".common_enable"+textbox_id).removeAttr('readonly');
						 
						jQuery(".date_enable"+textbox_id).addClass('datepicker');
						 
						calender_data();
						</script>
					<?php
						
					}
				
					
				}				
				
			}
	
		}
		
	?>
			<input type="hidden"  value="<?php echo $k;?>" id="validation_row_counter"/>
			<input type="hidden"  value="<?php echo $k;?>" id="index_row_counter"/>
		
		
	<?php
	}
	?>
		
		
		
</table>
<a class="add_new" href="javascript:void(0);">Add new</a>
<script type="text/javascript">
	jQuery(function(){		
		jQuery("#dream_owner_table .custom_del").live('click',function(){
			var id_array = jQuery(this).attr('id').split('_');
			var id = id_array[1];	
			jConfirm('Are you sure you want to delete this statement?', 'Confirmation Dialog', function(r) {
				if(r == true)	{
					jQuery.ajax({
						type:"GET",
						url:"<?php echo Router::url(array('controller'=>'projects', 'action'=>'delete_dream_owner_statement')); ?>/"+ id,
						success : function(data) {
							jQuery('#dream_owner_table').find('#'+id).remove(); 
							
						},
						error : function() {
							jAlert('Records could not be deleted. Please try again', 'Alert Dialog');
						},
					})
				}
			});
		});	
	});	 

 
function edit_mildestone2(obj)
	{ 
		editor =true;  
		current_row = obj ; 

	jQuery('#netvalue_pop').fadeIn();
  						$('.popup').css('top', '-1000px')
							.animate({'top': '0'}, 500);  
							// Assign Fields :   
							var cur  = jQuery(obj).parent().parent().parent();  

						jQuery(".username").val(  cur.find("input[name*='name']").val() ); 
						jQuery(".fullname").val(  cur.find("input[name*='full_name']").val() );  
 						jQuery(".percent").val(  cur.find("input[name*='ownership']").val() );  
 

 						jQuery(".job_select").val(  cur.find("input[name*='job_direction_id']").val() ) ; 
 						jQuery(".d_select").val(  cur.find("input[name*='dilution_id']").val() ) ; 
 						jQuery(".role_select").val(  cur.find("input[name*='role']").val() ) ; 



	}


	function edit_mildestone(obj)
	{
		//alert(obj.id);
		var id_array = obj.id.split('_');
		var ids = id_array[1];
		if(jQuery("#"+ids).hasClass('EditTrRemove'))
		{	
			jQuery(".opentext_"+ids).attr('disabled',false); 
			jQuery("#"+ids).removeClass('EditTrRemove');
			jQuery("#"+ids).addClass('EditTr');
			jQuery(".common_enable"+ids).removeAttr('readonly');
			//jQuery(".date_enable"+ids).datepicker("show");
			//jQuery(".date_enable"+ids).addClass('datepicker');
			//jQuery("#calender_img_"+ids+" img").css('width','29px');
			//jQuery("#calender_img_"+ids+" img").css('height','28px');
			//calender_data();
			//jQuery(".date_enable"+ids).datepicker("show");
		}
		else
		{
			jQuery(".opentext_"+ids).attr('disabled',true); 
			jQuery("#"+ids).addClass('EditTrRemove');
			jQuery("#"+ids).removeClass('EditTr');
			jQuery(".common_enable"+ids).attr('readonly');
			//jQuery(".date_enable"+ids).removeClass('datepicker');
			//jQuery(".date_enable"+ids).datepicker("destroy");
			
			//jQuery("#calender_img_"+ids+" img").css('width','0px');
			
		}
		
	}	
</script>		