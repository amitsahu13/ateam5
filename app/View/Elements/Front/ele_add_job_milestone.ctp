<?php 
echo $this->Html->script(array('calender/jquery-1.6.2.min','calender/jquery-ui.min','calender/jquery-ui-timepicker-addon'));
echo $this->Html->css(array('calender/jquery-ui'));
?>
<?php
if($test_flag == 'success')
{
?>
<script type="text/javascript">
var id = '<?php echo $id;?>';
var url ='<?php echo Router::url(array('controller'=>'jobs', 'action'=>'update_job_milestone')); ?>/'+id;
	$("#job_milestone_table").load(url,function(data){
		closeOffersDialog('jobmilestone');
	});
</script>
<?php
}
?>
<script type="text/javascript">
jQuery(function($){	
		
		calender_data();
		function calender_data(){
			
				jQuery(".datepicker").datetimepicker({
					showSecond: false,
					showHour: false,
					showMinute: false,
					showSecond: false,
					showTime: false,
					showTimepicker:false,
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
	 });
</script>
<div class="popup_wrapper" style="width:476px;">
		<div class="overlay"></div>
		<div class="boxpopup box"  style="width:476px;">
			<a onclick="closeOffersDialog('jobmilestone');" class="boxclose"></a>
			<div style="width:476px;">
			<?php echo $this->Form->create('JobMilestone');?>
			 <?php echo $this->Form->hidden('JobMilestone.id', array('div'=>false, 'label'=>false, "class" => "AddTxtFild"));?>	
			  <?php echo $this->Form->hidden('JobMilestone.job_id', array('div'=>false, 'value'=>$id, 'label'=>false, "class" => "AddTxtFild"));?>				 
						<div class="PoupWrp">
						  <div class="PoupIn">
							<h2>Add job milestones</h2>
								<div class="PoupInFrm">
									 <ul class="PoupAddFrm">
										<li>
										  <label>Title*</label>	
										 <div class="addportfolio">
										  <?php echo $this->Form->input('JobMilestone.title', array('div'=>false, 'label'=>false, "class" => "AddTxtFild"));?>							</div>												  
										</li>
										<li>
										  <label>Description*</label>	
										 <div class="addportfolio">
										 <?php echo $this->Form->input('JobMilestone.description', array('div'=>false,'type'=>'textarea','label'=>false, "class" => "Description"));?> </div>	
																						  
										</li>
										<li>
										  <label>Date*</label>
										
										 <div class="addportfolio">
										   <?php echo $this->Form->input('JobMilestone.date', array('type'=>'text','div'=>false,'readonly'=>true, 'label'=>false, "class" => "dateFild datepicker"));?> 
										  </div>
										
										</li>
										<li>
										  <label>&nbsp;</label>
										  <span class="Continue4Btn" style="float:right; margin:0 26px 0 0;">
										
											<?php echo $this->Js->submit('Submit', array(
																	'update' => '#show_jobmilestone',
																	'div' => false,																		'url'=>array('controller'=>'Jobs','action'=>'add_Job_milestone'),
																	'class'=>'Continue4BtnRi'
																));
											?>					
										  </span>
										</li>
									 </ul>
								</div>
							<div class="clear"></div>
						  </div>
						  <div class="clear"></div>
						</div>				
				<?php
					echo $this->Form->end();
				?>
			</div>
			<div class="Clear"></div>
		</div>
		<div class="Clear"></div>
	</div>
<?php
	if (class_exists('JsHelper') && method_exists($this->Js, 'writeBuffer')) 
	echo $this->Js->writeBuffer();
?>	

