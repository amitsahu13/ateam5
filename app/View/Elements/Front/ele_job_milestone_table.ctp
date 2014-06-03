<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tbl JodTableLi tbl_c" id="milestoneadd">
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
		if(!empty($Jobmilestones))
		{ 	
				foreach($Jobmilestones as $milestone)
				{	
		?>	
				  <tr id="<?php echo $milestone['JobMilestone']['id'];?>" class="EditTrRemove">
					<td align="center" valign="middle"><?php echo $i+1;?></td>
					<td align="left" valign="middle">
					<input readonly="readonly" type="text" name="data[JobMilestone][<?php echo $i;?>][title]" class="txtfld required <?php echo "common_enable".$milestone['JobMilestone']['id']?>"  value="<?php echo $milestone['JobMilestone']['title']?>"/>		
					</td>
					<td align="left" valign="middle">
					<textarea  class="required <?php echo "common_enable".$milestone['JobMilestone']['id']?>" readonly="readonly" name="data[JobMilestone][<?php echo $i;?>][description]" ><?php echo $milestone['JobMilestone']['description']?></textarea>
					</td>
					<td align="left" id="<?php echo 'calender_img_'.$milestone['JobMilestone']['id']?>" valign="middle">					
					<input type="text"  name="data[JobMilestone][<?php echo $i;?>][date]" value="<?php echo $milestone['JobMilestone']['date']?>" readonly="readonly" class="dateFild  required <?php echo "date_enable".$milestone['JobMilestone']['id']?>"/>
					</td>
					<td align="left" valign="middle">
						<div class="edit_deletBX" style="float:left;">
						   <!--<input type="button" title="Edit" alt="Edit" value="" onclick="edit_mildestone(this)" class="edit" id="<?php //echo "edit_".$milestone['JobMilestone']['id'];?>"/>-->					
						 <input type="button" value="" class="min_icon custom_del" title="Delete" alt="Delete" id="<?php echo "delete_".$milestone['JobMilestone']['id'];?>" pro-id="<?php echo $milestone['JobMilestone']['job_id'];?>"/>
						</div>
						<input type="hidden" name="data[JobMilestone][<?php echo $i;?>][id]" value="<?php echo $milestone['JobMilestone']['id']; ?>"/>
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
		if(!empty($Jobmilestones))
		{ 	
			
			foreach($Jobmilestones as $milestone)
			{
				
	?>		
				<tr id="<?php echo $milestone['JobMilestone']['id'];?>" class="EditTrRemove">
					<td align="center" valign="middle"><?php echo $i+1;?></td>
					<td align="left" valign="middle"><input readonly="readonly" type="text" name="data[JobMilestone][<?php echo $i;?>][title]" class="txtfld required <?php echo "common_enable".$milestone['JobMilestone']['id']?>"  value="<?php echo $milestone['JobMilestone']['title']?>"/></td>
					<td align="left" valign="middle"><textarea  class="required <?php echo "common_enable".$milestone['JobMilestone']['id']?>" readonly="readonly" name="data[JobMilestone][<?php echo $i;?>][description]" ><?php echo $milestone['JobMilestone']['description']?></textarea></td>
					<td align="left" id="<?php echo 'calender_img_'.$milestone['JobMilestone']['id']?>" valign="middle"><input type="text"  name="data[JobMilestone][<?php echo $i;?>][date]" value="<?php echo $milestone['JobMilestone']['date']?>" readonly="readonly" class="dateFild  required <?php echo "date_enable".$milestone['JobMilestone']['id']?>"/></td>
					<td align="left" valign="middle">
						<div class="edit_deletBX" style="float:left;">
						  <!--<input type="button" title="Edit" alt="Edit" value="" onclick="edit_mildestone(this)" class="edit" id="<?php //echo "edit_".$milestone['JobMilestone']['id'];?>"/>-->					
						 <input type="button" value="" class="min_icon custom_del" title="Delete" alt="Delete" id="<?php echo "delete_".$milestone['JobMilestone']['id'];?>" pro-id="<?php echo $milestone['JobMilestone']['job_id'];?>"/>
						</div>
						<input type="hidden" name="data[JobMilestone][<?php echo $i;?>][id]" value="<?php echo $milestone['JobMilestone']['id']; ?>"/>
					</td>
				  </tr>
				
	<?php		
				$i++;
			}
		}
		
		$k=$i;
		
		if(!empty($this->request->data['JobMilestone']))
		{	
			
			
			foreach($this->request->data['JobMilestone'] as $key=>$value)
			{
				
				if(empty($value['id']))
				{
				
	?>
				<tr  class="EditTr" id="<?php echo 'row_'.$key;?>">
				<td align="center" valign="middle"><?php echo $k+1;?></td>
				<td align="left" valign="middle"><?php echo $this->Form->input("JobMilestone.$key.title",array("type"=>"text","class"=>"txtfld required","label"=>false,"div"=>false))?></td>
				<td align="left" valign="middle"><?php echo $this->Form->input("JobMilestone.$key.description",array("type"=>"textarea","class"=>"required","label"=>false,"div"=>false))?></td>
				<td align="left" valign="middle"><?php echo $this->Form->input("JobMilestone.$key.date",array("type"=>"text","class"=>"dateFild datepicker required","label"=>false,"div"=>false))?></td>
				<td align="left" valign="middle"><div class="edit_deletBX" style="float:left;">
				
				<input type="button" value="" class="min_icon" title="Delete" alt="Delete" onclick="removeElement('<?php echo $key; ?>');" /></div></td></tr>
	<?php		
				$k++;
				
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
		jQuery("#milestoneadd .custom_del").live('click',function(){
			var id_array = jQuery(this).attr('id').split('_');
			var id = id_array[1];
			var pro_id 	= 	jQuery(this).attr('pro-id');			
			jConfirm('Are you sure you want to delete this milestone?', 'Confirmation Dialog', function(r) {
				if(r == true)	{
					jQuery.ajax({
						type:"GET",
						url:"<?php echo Router::url(array('controller'=>'jobs', 'action'=>'delete_job_milestone')); ?>/"+ id,
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
	
	/* function edit_mildestone(obj)
	{
		//alert(obj.id);
		var id_array = obj.id.split('_');
		var ids = id_array[1];
		if(jQuery("#"+ids).hasClass('EditTrRemove'))
		{
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
			jQuery("#"+ids).addClass('EditTrRemove');
			jQuery("#"+ids).removeClass('EditTr');
			jQuery(".common_enable"+ids).attr('readonly');
			//jQuery(".date_enable"+ids).removeClass('datepicker');
			jQuery(".date_enable"+ids).datepicker("destroy");
			
			//jQuery("#calender_img_"+ids+" img").css('width','0px');
			
		}
		
	} */
	
</script>	