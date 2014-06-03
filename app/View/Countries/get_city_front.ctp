<div class="compensation_frmrow_R">
	<p><span class="slct_rwndInPut">
	<?php
	if(!empty($countries))
	{
	 echo ($this->Form->input('Job.country_id', array('name'=>'data[Job][country_id]','div'=>false, 'label'=>false,'empty'=>'-- Select --','options'=>$countries, "class" => "slct_rwndInPutRi with_sml1 custom_dropdown")));
	$this->Js->get('#JobCountryId')->event('change',$this->Js->request(array('controller'=>'states','action'=>'get_job_state_front'), array('update'=>'#state','async' => true,'method' => 'post','dataExpression'=>true,'data'=> $this->Js->serializeForm(array('isForm' => true,'inline' => true)))));
		
	}
	else
	{
			echo ($this->Form->input('Job.country_id', array('name'=>'data[Job][country_id]','div'=>false, 'label'=>false,'empty'=>'N/A','options'=>$countries, "class" => "slct_rwndInPutRi with_sml1 custom_dropdown")));

	}
	?>
	</span>
	</p>
</div>
<div id="state">
	<div class="compensation_frmrow_R">
		<p><span class="slct_rwndInPut"><select class="slct_rwndInPutRi with_sml1 custom_dropdown" >
		<?  if(!empty($countries)):?>  
		
				  <option>-- Select State --</option>
		 
		 <?else:?>  
		 
		    <option>N/A</option> 
		
		<?endif;?>  
		   
		</select></span>
		</p>
	</div>
</div>
<?php
	if (class_exists('JsHelper') && method_exists($this->Js, 'writeBuffer')) 
	echo $this->Js->writeBuffer();
?>
<script type="text/javascript">
$(document).ready(function(){
$(".custom_dropdown").selectbox();

	});
</script>