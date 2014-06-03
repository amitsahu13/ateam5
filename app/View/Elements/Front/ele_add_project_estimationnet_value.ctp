<?php
if($test_flag == 'success')
{
?>
<script type="text/javascript">
var id = '<?php echo $id;?>';
var url ='<?php echo Router::url(array('controller'=>'projects', 'action'=>'update_estimation_project_value')); ?>/'+id;
	$("#project_estimation_value_table").load(url,function(data){
		closeOffersDialog('estimation');
	});
</script>
<?php
}
?>
<div class="popup_wrapper" style="width:476px;">
		<div class="overlay"></div>
		<div class="boxpopup box"  style="width:476px;">
			<a onclick="closeOffersDialog('estimation');" class="boxclose"></a>
			<div style="width:476px;">
			<?php echo $this->Form->create('ProjectEstimation');?>
			 <?php echo $this->Form->hidden('ProjectEstimation.id', array('div'=>false, 'label'=>false, "class" => "AddTxtFild"));?>
			<?php echo $this->Form->hidden('ProjectEstimation.project_id', array('div'=>false, 'value'=>$id, 'label'=>false, "class" => "AddTxtFild"));?>				 
						<div class="PoupWrp">
						  <div class="PoupIn">
							<h2>Add project estimation net value</h2>
								<div class="PoupInFrm">
									 <ul class="PoupAddFrm">
										<li>
										  <label>Timeline*</label>	
										    <span class="slct_rwndInPut">
										 <div class="addportfolio">
										 
										  <?php echo $this->Form->input('ProjectEstimation.timeline', array('div'=>false, 'label'=>false,"class" => "slct_rwndInPutRi with_sml1",'options'=>Configure::read('Project.Timeline'),'empty'=>'--Select Timeline--'));?></div>											</span>		  
										</li>
										<li>
										  <label>Estimated Net Value($)*</label>	
										 <div class="addportfolio">
										  <?php echo $this->Form->input('ProjectEstimation.estimate_net_value', array('div'=>false, 'label'=>false, "class" => "AddTxtFild"));?>					</div>												  
										</li>
										<li>
										  <label>Description*</label>	
										 <div class="addportfolio">
										  <?php echo $this->Form->input('ProjectEstimation.description', array('type'=>'textarea','div'=>false, 'label'=>false,'class'=>'Description'));?></div>
										</li>
										<li>
										  <label>&nbsp;</label>
										  <span class="Continue4Btn" style="float:right; margin:0 26px 0 0;">
											<?php  echo $this->Js->submit('Submit', array(
																	'update' => '#show_estimation',
																	'div' => false,																		'url'=>array('controller'=>'projects','action'=>'add_project_estimation'),
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