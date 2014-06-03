<span class="slct_rwndInPut" style="margin-left:15px;"  id="update_country">
<?php
if(!empty($countries))
{
	echo $this->Form->input('country_id', array('name'=>'data[Project][country_id]','div'=>false, 'label'=>false,'empty'=>'-- Select Country --','options'=>$countries, "class" => " custom_dropdown slct_rwndInPutRi with_sml1"));
	
	$this->Js->get('#country_id')->event('change',$this->Js->request(array('controller'=>'states','action'=>'get_state_for_project'), array('update'=>'#State','async' => true,'method' => 'post','dataExpression'=>true,'data'=> $this->Js->serializeForm(array('isForm' => true,'inline' => true)))));
	
}
else
{
	echo $this->Form->input('country_id', array('name'=>'data[Project][country_id]','div'=>false, 'label'=>false,'empty'=>'N/A', "class" => " custom_dropdown slct_rwndInPutRi with_sml1"));

}
?>
</span>
<span class="slct_rwndInPut"  id="State">
<?php if(!empty($states) && $states!=''){
				
			echo ($this->Form->input('state_id', array('div'=>false, 'label'=>false, 'empty'=>'-- Select --' , 'options'=>$states ,"class" => " custom_dropdown slct_rwndInPutRi with_sml1","error" => array("wrap" =>EDITWRAP, "class" => "error-message",'empty'=>'-- Select State --'))));
		}else{  
		
			echo ($this->Form->input('state_id', array('div'=>false, 'label'=>false,  'empty'=>'N/A',"class" => " custom_dropdown slct_rwndInPutRi with_sml1","error" => array("wrap" =>EDITWRAP, "class" => "error-message",'empty'=>'-- Select State --'))));
		}
?>

</span>
<?php 	
	if (class_exists('JsHelper') && method_exists($this->Js, 'writeBuffer')) 
	echo $this->Js->writeBuffer();
?>
