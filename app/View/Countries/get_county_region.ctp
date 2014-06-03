<li>
   <label>Country*</label>
   <span class="slct_rwndInPut" id="update_country">
		<?php
		if(!empty($countries))
		{
			echo ($this->Form->input('UserDetail.country_id', array('div'=>false, 'label'=>false,'empty'=>'-- Select --','options'=>$countries, "class" => "slct_rwndInPutRi with_sml1")));
			
			$this->Js->get('#UserDetailCountryId')->event('change',$this->Js->request(array('controller'=>'states','action'=>'get_state_front'), array('update'=>'#State','async' => true,'method' => 'post','dataExpression'=>true,'data'=> $this->Js->serializeForm(array('isForm' => true,'inline' => true)))));
			
		}
		else
		{
			echo ($this->Form->input('UserDetail.country_id', array('div'=>false, 'label'=>false,'empty'=>'N/A','options'=>$countries, "class" => "slct_rwndInPutRi with_sml1")));
		
		}
		?>	
	</span>					
</li>
<li  class="FloatLeFrm">
	<label>State*</label>
	<span class="slct_rwndInPut"  id="State">
		<?php 		
		if (!empty($states) && $states!=''){
												
			echo ($this->Form->input('UserDetail.state_id', array('div'=>false, 'label'=>false, 'options'=>$states ,"class" => "slct_rwndInPutRi with_sml1","error" => array("wrap" =>EDITWRAP, "class" => "error-message",'empty'=>'-- Select State --'))));
		}else{  
		
			echo ($this->Form->input('UserDetail.state_id', array('div'=>false, 'label'=>false,  'empty'=>'N/A',"class" => "slct_rwndInPutRi with_sml1","error" => array("wrap" =>EDITWRAP, "class" => "error-message",'empty'=>'-- Select State --'))));
		}
		?>		
	 </span>
</li>
<?php 
if (class_exists('JsHelper') && method_exists($this->Js, 'writeBuffer')) 
	echo $this->Js->writeBuffer();
?>
