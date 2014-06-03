<?php echo $this->element("Front/ele_post_project_navigation");?>	
<?php 
echo $this->Html->script(array('calender/jquery-1.6.2.min','calender/jquery-ui.min','calender/jquery-ui-timepicker-addon'));
echo $this->Html->css(array('calender/jquery-ui'));
?>
 <div class="product_dscrpBOX" style="width:100%;">
            	<h3><span class="round_bgTXT">3</span>Status and timeline</h3>
		<?php
			echo $this->Form->create('Project',array('url'=>array('controller'=>'projects','action'=>'project_status_timeline'),'type'=>'file'));
			echo $this->Form->hidden('id');
			?>
                <div class="compensation_frmDV">
                       <div class="compensation_frmrow  general_row">
							<label class="compensation_frmrow_L">Idea Maturity*<br/>
								<span style="font-size: 11px; line-height: 12px;">(when did you start thinking on the idea)</span>
							</label>
							<div class="compensation_frmrow_R">
									<span class="slct_rwndInPut">
										<?php echo ($this->Form->input('idea_maturity_id', array('div'=>false, 'label'=>false,'empty'=>'-- Select Idea Maturity --','options'=>$ideaMaturity,"class" => "custom_dropdown","error" => array("wrap" =>EDITWRAP, "class" => "error-message"))));	?>
									</span>
							</div>
						</div>
                    
                    <div class="compensation_frmrow  general_row">
                    	<label class="compensation_frmrow_L">Project Status*</label>
                        <div class="compensation_frmrow_R">
								<span class="slct_rwndInPut">
									<?php echo ($this->Form->input('project_status_id', array('div'=>false, 'label'=>false,'empty'=>'-- Select Project Status --','options'=>$projectStatus,"class" => "custom_dropdown","error" => array("wrap" =>EDITWRAP, "class" => "error-message"))));	?>
								</span>
                        </div>
                    </div> 
                    
                    		<div class="compensation_frmrow  general_row">
						<label class="compensation_frmrow_L">Leader's availability in Project<span>*</span></label>
							 <div class="compensation_frmrow_R">
								<span class="slct_rwndInPut">
									<?php echo $this->Form->input('availability_id',array('div'=>false,'escape'=>false,'label'=>false, 'options'=>$project_manager_availabilities,'empty'=>'---Select Availavbility---','class'=>'custom_dropdown'));?>
									
								</span>
						</div>     
						
					</div>	
					
				 
					
                    <div class="clear"></div>
                    
                    <div class='hidden' style='display:none;'> 
                    <h3 style="font-size: 14px;">Project Milestones table</h3>
					
                    <div class="compensation_frmrow margin_top" id="project_milestone_table">
                   	 <div class="error-message" style="text-align:center;padding:0 0 0 0;"></div>
					 	<?php echo $this->element("Front/ele_project_milestone_table");?>   
                    
					</div>
					
					
					</div>
					
					
					<script type='text/javascript'> 
						function goback(url){
							jQuery.post('<?=Router::url("/",true)?>redirect/setback/',{back:url},function(){
								  jQuery(".Continue4BtnRi").click(); 
								});
							return false ; 
						}
					</script>
					
		   <!--Back Bottom  goes  Here for The Projects   Navigation   
			<div class="btm_nextbtnDV"> -->
				<span style="float:left; margin-left:10px;" class="Continue4Btn"> 
				<input type="button" name="" class="Continue4BtnRi" value="Previous" onclick="goback('<?=Router::url(array( 'controller' => 'projects','action' => 'project_general', $project_id), true);?>');">
 				</span>
			<!--</div>
			End Project Back Bottoms:
			     <div class="btm_nextbtnDV"> --> 
						<span class="Continue4Btn" style="float:right;" >
							<input type="submit" name="" class="Continue4BtnRi" value="Next">
						</span>
				 
					<!--</div>                 -->
                </div>
	<?php
	echo $this->Form->end();
	?>
 </div>
<script type="text/javascript">
	jQuery(function(){	
	calender_data();
	
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
	
	jQuery(".add_new").live('click',function(){			
		
			var milestone_html = '<tr  class="EditTr" id="row_'+j+'"><td align="center" valign="middle">'+custom_counter+'</td><td align="left" valign="middle"><input name="data[ProjectMilestone]['+j+'][title]" type="text" class="txtfld required" /></td><td align="left" valign="middle"><textarea name="data[ProjectMilestone]['+j+'][description]" cols="" class="required" rows=""></textarea></td><td align="left" valign="middle"><input name="data[ProjectMilestone]['+j+'][date]" type="text" class="dateFild datepicker required" /></td><td align="left" valign="middle"><div class="edit_deletBX" style="float:left;"><input type="button" value="" class="min_icon" title="Delete" alt="Delete" onclick="removeElement('+j+');" /></div></td></tr>';
			jQuery('#milestoneadd tr:last').after(milestone_html);
			//ref = '#row_'+j;			
			j++;			
			calender_data();
			custom_counter++
		});
	});
	
	function removeElement(id) {
		jQuery('#row_'+id).remove();
	}
	function calender_data(){
			
		jQuery(".datepicker").datetimepicker({
			showSecond: false,
			showHour: false,
			showMinute: false,
			showSecond: false,
			showTime: false,
			showTimepicker:false,
			
			beforeShow: function(input, inst)
			{	
				inst.dpDiv.css({marginTop: -1 + 'px', marginLeft: input.offsetWidth + 'px'});
			},changeYear: true,dateFormat: 'yy-mm-dd',changeMonth: true, minDate: '-100Y',maxDate:new Date(2099,12,00),
			yearRange: '-100',showAnim: 'fold',showOn: 'both',buttonImageOnly: true, buttonImage: ''+SiteUrl+'/img/icons/icon_cle.png'
		});
        jQuery(".datepicker").datepicker("setDate" , new Date());
		}	
		
	/* jQuery("#ProjectProjectStatusTimelineForm").submit(function(){
		var st=1;
		 jQuery('table#milestoneadd .required').each(function() {
		 
			  if($(this).val()=="")
			  {
				
				 st=0;
				 jQuery(".error-message").html('Please fill the milestone table fields.');
				
				
			  }
	   });
		if(st==1)
		return true;
		else
		return false;
		
	});	 */
	
</script>	