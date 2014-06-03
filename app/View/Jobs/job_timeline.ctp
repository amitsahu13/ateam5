<?php echo $this->element("Front/ele_post_job_navigation"); ?>	
<?php 
/* echo $this->Html->script(array('calender/jquery-1.9.1','calender/jquery-ui','calender/jquery-ui-timepicker-addon'));
echo $this->Html->css(array('calender/jquery-ui'));  */
?>
<?php 
echo $this->Html->script(array('calender/jquery-1.6.2.min','calender/jquery-ui.min','calender/jquery-ui-timepicker-addon'));
echo $this->Html->css(array('calender/jquery-ui'));
?>
<style>
	img.ui-datepicker-trigger  
	{
		float:right;
	}
</style>
<script>	

  $(function() {
	/* $( ".from" ).datepicker({
		defaultDate: "+1w",
		changeMonth: true,
		numberOfMonths: 1,
		changeYear: true,
		minDate: 0,
		dateFormat: "yy-mm-dd",
		onClose: function( selectedDate ) {
			$( ".to" ).datepicker( "option", "minDate", selectedDate );
		}
	});
	$( ".to" ).datepicker({
		defaultDate: "+1w",
		changeMonth: true,
		numberOfMonths: 1,
		changeYear: true,
		minDate: 0,
		dateFormat: "yy-mm-dd",
		onClose: function( selectedDate ) {
			$( ".from" ).datepicker( "option", "maxDate", selectedDate );
		}
	}); */
	jQuery(".from").datetimepicker({
		showSecond: false,
		showHour: false,
		showMinute: false,
		showSecond: false,
		showTime: false,
		showTimepicker:false,
		
		beforeShow: function(input, inst)
		{	
			inst.dpDiv.css({marginTop: -1 + 'px', marginLeft: input.offsetWidth + 'px'});
		},changeYear: true,dateFormat: 'yy-mm-dd',changeMonth: true, minDate: '-100Y',maxDate:new Date(2013,12,00),   
		yearRange: '-100',showAnim: 'fold',showOn: 'both',buttonImageOnly: true, buttonImage: ''+SiteUrl+'/img/icons/icon_cle.png'
	});
	jQuery(".to").datetimepicker({
		showSecond: false,
		showHour: false,
		showMinute: false,
		showSecond: false,
		showTime: false,
		showTimepicker:false,
		
		beforeShow: function(input, inst)
		{	
			inst.dpDiv.css({marginTop: -1 + 'px', marginLeft: input.offsetWidth + 'px'});
		},changeYear: true,dateFormat: 'yy-mm-dd',changeMonth: true, minDate: '-100Y',maxDate:new Date(2013,12,00),   
		yearRange: '-100',showAnim: 'fold',showOn: 'both',buttonImageOnly: true, buttonImage: ''+SiteUrl+'/img/icons/icon_cle.png'
	});
});  
</script>
	
<div class="product_dscrpBOX" style="width:100%;">
	<h3><span class="round_bgTXT">2</span>TImeline</h3>
	<div class="compensation_frmDV">
<?php
echo $this->Form->create('Job',array('url'=>array('controller'=>'jobs','action'=>'job_timeline'),'type'=>'file'));
echo $this->Form->hidden('id');
?>
		<div class="compensation_frmrow Duration" style="padding:0px;">
			<div class="compensation_frmrow_L">
				<p><label>Estimated Job Duration<span>*</span></label></p>
			</div>
			<div class="compensation_frmrow_R">
				<p><span class="slct_rwndInPut">
				<?php	echo $this->Form->input('Job.duration_id', array('div'=>false, 'label'=>false, "required"=>"required",    "class" => "custom_dropdown slct_rwndInPutRi with_sml1",'empty'=>'-- Select Duration --','options'=>$duration));?>
				</span></p>
			</div>
		</div>
		<div class="compensation_frmrow Date5Row" style='display:none;'>
			<div class="start_dt">
				<span>Start Date</span> 
				<?php echo $this->Form->input('Job.start_date', array('type'=>'text','div'=>false,'readonly'=>true, 'label'=>false, "class" => "clndr_btn from","style"=>"width:107px","error" => array("wrap" =>EDITWRAP, "class" => "error-message")));?>
			</div>
			<div class="completion_dt">
				<span>Completion Date</span> 
				<?php echo $this->Form->input('Job.end_date', array('type'=>'text','div'=>false,'readonly'=>true, 'label'=>false, "class" => "clndr_btn to","style"=>"width:107px","error" => array("wrap" =>EDITWRAP, "class" => "error-message")));?>
			</div>
		</div>
		<div class="compensation_frmrow Expert" style="margin-top:3px; padding:0px;">
			<div class="compensation_frmrow_L">
				<p><label>Expert's required availability*</label></p>
			</div>
			 
			<div class="compensation_frmrow_R">
				<p><span class="slct_rwndInPut">
				<?php	echo $this->Form->input('Job.expert_availability_id', array('div'=>false,  "required"=>"required" , 'label'=>false, "class" => "custom_dropdown slct_rwndInPutRi with_sml1",'empty'=>'-- Select Availability --','options'=>$availablity ));?>
				</span></p>
			</div>
		</div>
		
		<!--   
		<div class="compensation_frmrow Week5Avali">
			<div class="start_dt" style="width:300px; padding:0 0 0 118px;">
				<span>Availability*</span>
				<?php echo $this->Form->input('Job.expert_availability', array('div'=>false, 'label'=>false, "class" => "exprt_input2"));?>
				<span class="Hrs2Week">Hrs./Week</span>
			</div>
		</div> 
		--> 	
		
		
					
		<div class="clear"></div>
		
		<!--  
         <h3>Job Milestones table</h3>
         <div class="compensation_frmrow margin_top" id="job_milestone_table"> 
			<div class="error-message" style="text-align:center;padding:0 0 0 0;"></div>		 
	 		<?php echo $this->element("Front/ele_job_milestone_table");?>   
         </div>  
         --> 
         
         
         
         <script type='text/javascript'> 
						function goback(url){
							jQuery.post('<?=Router::url("/",true)?>redirect/setback/',{back:url},function(){
								  jQuery(".Continue4BtnRi").click(); 
								});
							return false ; 
						}
					</script>
         <!-- Previous Button Back Stack -->
         	<div class="btm_nextbtnDV"> 
				<span style="float:left;" class="Continue4Btn"> 
				<input type="button" name="" class="Continue4BtnRi" value="Previous" onclick="goback('<?=Router::url(array( 'controller' => 'jobs','action' => 'job_general', $project_id), true);?>');">
 				</span>
			</div>
                
		<div class="btm_nextbtnDV"> 
			<span class="Continue4Btn" style="float:right;" ><input type="submit" name="" class="Continue4BtnRi" value="Next"></span>
 		</div> 
 		
 		
 		
 		
 		
		</div>
	<?php echo $this->Form->end();?>
</div>


<?php
	if (class_exists('JsHelper') && method_exists($this->Js, 'writeBuffer')) 
	echo $this->Js->writeBuffer();
?>
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
		
			var milestone_html = '<tr  class="EditTr" id="row_'+j+'"><td align="center" valign="middle">'+custom_counter+'</td><td align="left" valign="middle"><input name="data[JobMilestone]['+j+'][title]" type="text" class="txtfld required" /></td><td align="left" valign="middle"><textarea name="data[JobMilestone]['+j+'][description]" cols="" class="required" rows=""></textarea></td><td align="left" valign="middle"><input name="data[JobMilestone]['+j+'][date]" type="text" class="dateFild datepicker required" /></td><td align="left" valign="middle"><div class="edit_deletBX" style="float:left;"><input type="button" value="" class="min_icon" title="Delete" alt="Delete" onclick="removeElement('+j+');" /></div></td></tr>';
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
