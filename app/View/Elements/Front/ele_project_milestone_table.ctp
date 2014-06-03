 <table width="100%" border="0" cellspacing="0" cellpadding="0" class="tbl tablelistSe tbl_c" id="milestoneadd">
	 <tr>
	  <th width="36" align="center" valign="middle">#</th>
	  <th width="157" align="left" valign="middle">Milestone</th>
	  <th width="223" align="left" valign="middle">Description</th>
	  <th width="160" align="left" valign="middle">Date</th>
	  <th width="57" align="left" valign="middle">Remove</th>
	 </tr>
<?php  
	if(!$validation)
	{
		$i=0;
		if(!empty($projectmilestones))
		{ 	
				foreach($projectmilestones as $milestone)
				{	
		?>	
				  <tr id="<?php echo $milestone['ProjectMilestone']['id'];?>" class="EditTrRemove">
					<td align="center" valign="middle"><?php echo $i+1;?></td>
					<td align="left" valign="middle"><input readonly="readonly" type="text" name="data[ProjectMilestone][<?php echo $i;?>][title]" class="txtfld required <?php echo "common_enable".$milestone['ProjectMilestone']['id']?>"  value="<?php echo $milestone['ProjectMilestone']['title']?>"/></td>
					<td align="left" valign="middle"><textarea  class="required <?php echo "common_enable".$milestone['ProjectMilestone']['id']?>" readonly="readonly" name="data[ProjectMilestone][<?php echo $i;?>][description]" ><?php echo $milestone['ProjectMilestone']['description']?></textarea></td>
					<td align="left" id="<?php echo 'calender_img_'.$milestone['ProjectMilestone']['id']?>" valign="middle"><input type="text"  name="data[ProjectMilestone][<?php echo $i;?>][date]" value="<?php echo $milestone['ProjectMilestone']['date']?>" readonly="readonly" class="dateFild  required <?php echo "date_enable".$milestone['ProjectMilestone']['id']?>"/></td>
					<td align="left" valign="middle">
						<div class="edit_deletBX" style="float:left;">
						 <!-- <input type="button" title="Edit" alt="Edit" value="" onclick="edit_mildestone(this)" class="edit" id="<?php echo "edit_".$milestone['ProjectMilestone']['id'];?>"/>		--> 
						 			
						 <input type="button" value="" class="min_icon custom_del" title="Delete" alt="Delete" id="<?php echo "delete_".$milestone['ProjectMilestone']['id'];?>" pro-id="<?php echo $milestone['ProjectMilestone']['project_id'];?>"/>
						</div>
						<input type="hidden" name="data[ProjectMilestone][<?php echo $i;?>][id]" value="<?php echo $milestone['ProjectMilestone']['id']; ?>"/>
						<input type="hidden" name="data[ProjectMilestone][<?php echo $i;?>][check_textbox]" class="<?php echo "opentext_".$milestone['ProjectMilestone']['id'];?>" value="<?php echo $milestone['ProjectMilestone']['id']; ?>" disabled="disabled" />
					</td>
				  </tr>
				 
	<?php 		$i++;	
				}
		
			?>
					
		<?php
		}
		else
		{
			
			$i=0;
		?>
				
				<tr>
					<td align="center" valign="middle" colspan="5">No Milestone Records Founds!</td>
				
				</tr>
			<?php
		}?>
			<input type="hidden"  value="<?php echo $i;?>" id="non_validate_counter"/>
			<input type="hidden"  value="<?php echo $i;?>" id="non_validate_index_row_counter"/>
			
	<?php
	}
	else
	{
		$i=0;
		if(!empty($projectmilestones))
		{ 	
			
			foreach($projectmilestones as $milestone)
			{
				
			?>
				
			
				
				<tr id="<?php echo $milestone['ProjectMilestone']['id'];?>" class="EditTrRemove">
					<td align="center" valign="middle"><?php echo $i+1;?></td>
					<td align="left" valign="middle"><input readonly="readonly" type="text" name="data[ProjectMilestone][<?php echo $i;?>][title]" class="txtfld required <?php echo "common_enable".$milestone['ProjectMilestone']['id']?>"  value="<?php echo $milestone['ProjectMilestone']['title']?>"/></td>
					<td align="left" valign="middle"><textarea  class="required <?php echo "common_enable".$milestone['ProjectMilestone']['id']?>" readonly="readonly" name="data[ProjectMilestone][<?php echo $i;?>][description]" ><?php echo $milestone['ProjectMilestone']['description']?></textarea></td>
					<td align="left" id="<?php echo 'calender_img_'.$milestone['ProjectMilestone']['id']?>" valign="middle"><input type="text"  name="data[ProjectMilestone][<?php echo $i;?>][date]" value="<?php echo $milestone['ProjectMilestone']['date']?>" readonly="readonly" class="dateFild  required <?php echo "date_enable".$milestone['ProjectMilestone']['id']?>"/></td>
					<td align="left" valign="middle">
						<div class="edit_deletBX" style="float:left;">
						  <input type="button" title="Edit" alt="Edit" value="" onclick="edit_mildestone(this)" class="edit" id="<?php echo "edit_".$milestone['ProjectMilestone']['id'];?>"/>					
						 <input type="button" value="" class="min_icon custom_del" title="Delete" alt="Delete" id="<?php echo "delete_".$milestone['ProjectMilestone']['id'];?>" pro-id="<?php echo $milestone['ProjectMilestone']['project_id'];?>"/>
						 
						</div>
						<input type="hidden" name="data[ProjectMilestone][<?php echo $i;?>][id]" value="<?php echo $milestone['ProjectMilestone']['id']; ?>"/>
						<input type="hidden" name="data[ProjectMilestone][<?php echo $i;?>][check_textbox]" class="<?php echo "opentext_".$milestone['ProjectMilestone']['id'];?>" value="<?php echo $milestone['ProjectMilestone']['id']; ?>" disabled="disabled" />
					</td>
				  </tr>
				
	<?php		
				$i++;
			}
		}
		
		$k=$i;
		
		if(!empty($this->request->data['ProjectMilestone']))
		{	
			
			
			foreach($this->request->data['ProjectMilestone'] as $key=>$value)
			{
				//pr($this->request->data['ProjectMilestone']);
			
				if(empty($value['id']))
				{
				
	?>
				<tr  class="EditTr" id="<?php echo 'row_'.$key;?>">
				<td align="center" valign="middle"><?php echo $k+1;?></td>
				<td align="left" valign="middle"><?php echo $this->Form->input("ProjectMilestone.$key.title",array("type"=>"text","class"=>"txtfld required","label"=>false,"div"=>false))?></td>
				<td align="left" valign="middle"><?php echo $this->Form->input("ProjectMilestone.$key.description",array("type"=>"textarea","class"=>"required","label"=>false,"div"=>false))?></td>
				<td align="left" valign="middle"><?php echo $this->Form->input("ProjectMilestone.$key.date",array("type"=>"text","class"=>"dateFild datepicker required","label"=>false,"div"=>false))?></td>
				<td align="left" valign="middle"><div class="edit_deletBX" style="float:left;">
				
				<input type="button" value="" class="min_icon" title="Delete" alt="Delete" onclick="removeElement('<?php echo $key; ?>');" /></div></td></tr>
	<?php		
				$k++;
				
				}
				else
				{
					
					if(isset($value['check_textbox']))
					{
					?>
						<script type="text/javascript">
						var textbox_id = '<?php echo $value['check_textbox'];?>';
						//alert(textbox_id);
						 jQuery("#"+textbox_id).removeClass('EditTrRemove');
						jQuery("#"+textbox_id).addClass('EditTr');
						jQuery(".common_enable"+textbox_id).removeAttr('readonly');
						//jQuery(".date_enable"+ids).datepicker("show");
						jQuery(".date_enable"+textbox_id).addClass('datepicker');
						//jQuery("#calender_img_"+ids+" img").css('width','29px');
						//jQuery("#calender_img_"+ids+" img").css('height','28px');
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
		jQuery(".custom_del").live('click',function(){
			var id_array = jQuery(this).attr('id').split('_');
			var id = id_array[1];
			var pro_id 	= 	jQuery(this).attr('pro-id');			
			jConfirm('Are you sure you want to delete this milestone?', 'Confirmation Dialog', function(r) {
				if(r == true)	{
					jQuery.ajax({
						type:"GET",
						url:"<?php echo Router::url(array('controller'=>'projects', 'action'=>'delete_project_milestone')); ?>/"+ id,
						success : function(data) {
							jQuery('#milestoneadd').find('#'+id).remove();		
						},
						error : function() {
							jAlert('Records could not be deleted. Please try again', 'Alert Dialog');
						},
					})
				}
				
			});
		});
	});
	
	function edit_mildestone(obj)
	{
		
		var id_array = obj.id.split('_');
		var ids = id_array[1];
		
		if(jQuery("#"+ids).hasClass('EditTrRemove'))
		{
			jQuery(".opentext_"+ids).attr('disabled',false); 
			jQuery("#"+ids).removeClass('EditTrRemove');
			jQuery("#"+ids).addClass('EditTr');
			jQuery(".common_enable"+ids).removeAttr('readonly');
			//jQuery(".date_enable"+ids).datepicker("show");
			jQuery(".date_enable"+ids).addClass('datepicker');
			//jQuery("#calender_img_"+ids+" img").css('width','29px');
			//jQuery("#calender_img_"+ids+" img").css('height','28px');
			calender_data();
			//jQuery(".date_enable"+ids).datepicker("show");
		}
		else
		{
			
			jQuery(".opentext_"+ids).attr('disabled',true); 
			jQuery("#"+ids).addClass('EditTrRemove');
			jQuery("#"+ids).removeClass('EditTr');
			jQuery(".common_enable"+ids).attr('readonly');
			//jQuery(".date_enable"+ids).removeClass('datepicker');
			jQuery(".date_enable"+ids).datepicker("destroy");
			
			//jQuery("#calender_img_"+ids+" img").css('width','0px');
			
		}
		
	}
	
</script>	