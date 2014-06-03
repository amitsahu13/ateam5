<?php
if($test_flag == 'success')
{
?>
<script type="text/javascript">
var id = '<?php echo $id;?>';
var url ='<?php echo Router::url(array('controller'=>'projects', 'action'=>'update_dream_owner')); ?>/'+id;
	$("#dream_owner_table").load(url,function(data){
		closeOffersDialog('dreamowner');
	});
</script>
<?php
}
?>
<div class="popup_wrapper" style="width:476px;">
		<div class="overlay"></div>
		<div class="boxpopup box"  style="width:476px;">
			<a onclick="closeOffersDialog('dreamowner');" class="boxclose"></a>
			<div style="width:476px;">
			<?php echo $this->Form->create('DreamOwner');?>
			 <?php echo $this->Form->hidden('DreamOwner.id', array('div'=>false, 'label'=>false, "class" => "AddTxtFild"));?>
			 <?php echo $this->Form->hidden('DreamOwner.project_id', array('div'=>false, 'value'=>$id, 'label'=>false, "class" => "AddTxtFild"));?>				 
						<div class="PoupWrp">
						  <div class="PoupIn">
							<h2>Add item to dream owner statement</h2>
								<div class="PoupInFrm">
									 <ul class="PoupAddFrm">
										<li>
										  <label>Name*</label>	
										 <div class="addportfolio">
										  <?php echo $this->Form->input('DreamOwner.name', array('div'=>false, 'label'=>false, "class" => "AddTxtFild"));?>				</div>												  
										</li>
										<li>
										  <label>Ownership in %*</label>	
										 <div class="addportfolio">
										  <?php echo $this->Form->input('DreamOwner.ownership_percentage', array('div'=>false, 'label'=>false, "class" => "AddTxtFild"));?>					</div>												  
										</li>
										<li>
										  <label>Job Direction*</label>	
										  <span class="slct_rwndInPut">
										 <div class="addportfolio">
										  <?php echo $this->Form->input('DreamOwner.job_direction_id', array('div'=>false, 'label'=>false, "class" => "slct_rwndInPutRi with_sml1",'options'=>$jobdirection,'empty'=>'--Select Job Direction--'));?></div>
										</span>	
										</li>
										<li>
										  <label>&nbsp;</label>
										  <span class="Continue4Btn" style="float:right; margin:0 26px 0 0;">
										
											<?php echo $this->Js->submit('Submit', array(
																	'update' => '#show_dreamowner',
																	'div' => false,																	   'url'=>array('controller'=>'projects','action'=>'add_dream_owner'),
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