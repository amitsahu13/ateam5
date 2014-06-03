<script type="text/javascript">
  /*   $(document).ready(function(){
    $(".tbl tr:nth-child(odd)").addClass("odd");
    $(".tbl tr:nth-child(even").addClass("even");  
}); */
</script>
<?php 
echo $this->Html->css(array('popup'));
echo $this->Html->script(array('popup')); 
?>
<?php echo $this->element("Front/ele_post_project_navigation"); ?>
<div class="product_dscrpBOX" style="width:100%;">
            	<h3><span class="round_bgTXT">2</span>Leader</h3>
                <div class="compensation_frmDV">
			<?php
			echo $this->Form->create('Project',array('url'=>array('controller'=>'projects','action'=>'project_leader'),'type'=>'file'));
			echo $this->Form->hidden('id');
			//echo $this->Form->hidden('DreamOwner.project_id',array('value'=>$this->request->data['Project']['id']));
			?>
                	<div class="compensation_frmrow">
                    	<div class="compensation_frmrow_L">
                        	<p><label>Leader's profile info</label></p>
                        </div>
                        <div class="compensation_frmrow_R">
                        	<p>
							<?php echo $this->Html->link('<input type="button" value="Edit Profile" class="upload_btn" name="">',array('controller'=>'users','action'=>'user_profile_overview'),array('div'=>false,'escape'=>false));?>
							</p>
                        </div>
                    </div>
                    <div class="compensation_frmrow">
                    	<div class="compensation_frmrow_L">
                        	<p><label>Leader's Name</label></p>
                        </div>
                        <div class="compensation_frmrow_R">
                        	<p><span style="line-height:28px;"><b><?php echo ucwords($this->Session->read('Auth.User.first_name')." ".$this->Session->read('Auth.User.last_name')) ;?></b></span></p>
                        </div>
                    </div>                    
                    <div class="compensation_frmrow">
                    	<div class="compensation_frmrow_L">
                        	<p><label>Leader's Picture</label></p>
                        </div>
                        <div class="compensation_frmrow_R">
                        	<p>
							<?php 
							echo $this->General->show_user_img($this->Session->read('Auth.User.id'),$userdetail['UserDetail']['image'],'THUMB',$this->Session->read('Auth.User.first_name'));				
							?>
							</p>
                        </div>
                    </div>
                    <div class="compensation_frmrow">
                    	<div class="compensation_frmrow_L">
                        	<p><label>Linked-in Link</label></p>
                        </div>
                        <div class="compensation_frmrow_R" style="padding-bottom:10px;">
                        	<p><span style="line-height:28px;">
							<b><?php echo $userdetail['UserDetail']['linkdin_url'];?></b></span></p>
                        </div>
                    </div>
					 <div class="compensation_frmrow">
                    	<div class="compensation_frmrow_L">
                        	<p><label>Facebook Link</label></p>
                        </div>
                        <div class="compensation_frmrow_R" style="padding-bottom:10px;">
                        	<p><span style="line-height:28px;">
							<b><?php echo $userdetail['UserDetail']['facebook_url'];?></b></span></p>
                        </div>
                    </div>
					<div class="compensation_frmrow  general_row">
						<label class="compensation_frmrow_L">Availavbility in project<span>*</span></label>
							 <div class="compensation_frmrow_R">
								<span class="slct_rwndInPut">
									<?php echo $this->Form->input('availability_id',array('div'=>false,'escape'=>false,'label'=>false, 'options'=>$project_manager_availabilities,'empty'=>'---Select Availavbility---','class'=>'custom_dropdown'));?>
									
								</span>
						</div>     
						
					</div>					
                    <div class="compensation_frmrow">
                    	<div class="compensation_frmrow_L">
                        	<p><label>Dream Oners Statement</label></p>
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
                        
                   	<div class="btm_nextbtnDV"> 
                    	<span style="float:right;" class="Continue4Btn" >
							<?php echo $this->Form->submit('Next',array('class'=>'Continue4BtnRi')); ?>
						</span>						
                        <!--<span style="float:right;" class="Continue4Btn">
							<input type="button" name="" class="Continue4BtnRi" value="Back">
						</span>-->
                    </div>
                        
		<?php
		echo $this->Form->end();
		?>
    </div>
</div>

<div  id="show_dreamowner" style="display:none;" >
<?php
echo $this->element('Front/ele_dream_owner_popup_check');
?>
</div>
<script type="text/javascript">
 jQuery(document).ready(function() {

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
	jQuery(".add_new").live('click',function(){			
		
			var milestone_html = '<tr  class="EditTr" id="row_'+j+'"><td align="center" valign="middle">'+custom_counter+'</td><td align="left" valign="middle"><input name="data[DreamOwner]['+j+'][name]" type="text" class="txtfld required" /></td><td align="left" valign="middle"><input name="data[DreamOwner]['+j+'][ownership_percentage]" type="text" class="txtfld required count_percentage" /></td><td align="left" valign="middle"><select name="data[DreamOwner]['+j+'][job_direction_id]" class= "custom_dropdown required">'+drop_down_direction+'</select></td><td align="left" valign="middle"><select name="data[DreamOwner]['+j+'][dilution_id]" class= "custom_dropdown required">'+drop_down_dilution+'</select></td><td align="left" valign="middle"><div class="edit_deletBX" style="float:left;"><input type="button" value="" class="min_icon" title="Delete" alt="Delete" onclick="removeElement('+j+');" /></div></td></tr>';
			jQuery('#fileattache tr:last').after(milestone_html);
			jQuery(".custom_dropdown").selectbox();		
			j++;			
			$(".custom_dropdown").selectbox();	
			custom_counter++
		});
	});
	
	function removeElement(id) {
		jQuery('#row_'+id).remove();
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
		
		/* jQuery(".count_percentage").each(function(){
			alert(jQuery(this).val());
		
		}); */
		//openOffersDialog('dreamowner');
		
	});	
</script>	