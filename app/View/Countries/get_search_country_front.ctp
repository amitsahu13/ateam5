<span class="slct_rwndInPut">
	<?php 
	if(!empty($countries))
	{
	 echo ($this->Form->input('country_id', array('name'=>'data['.$model.'][country_id]','div'=>false, 'label'=>false,'empty'=>'-- Select Country --','options'=>$countries, "class" => "slct_rwndInPutRi with_sml1_2")));
		
		$this->Js->get('#country_id')->event('change',$this->Js->request(array('controller'=>'states','action'=>'get_search_state_front',$model), array('update'=>'#update_state','async' => true,'method' => 'post','dataExpression'=>true,'data'=> $this->Js->serializeForm(array('isForm' => true,'inline' => true)))));
		
	}
	else
	{
			echo ($this->Form->input('country_id', array('name'=>'data['.$model.'][country_id]','div'=>false, 'label'=>false,'empty'=>'-- Not Found --','options'=>$countries, "class" => "slct_rwndInPutRi with_sml1_2")));

	}
	?>	
</span>
<span class="slct_rwndInPut" id="update_state">
	<?php 
		echo ($this->Form->input('UserDetail.state_id', array('div'=>false, 'label'=>false,"class" => "slct_rwndInPutRi with_sml1_2",'empty'=>'-- Select State --')));
	?>
</span>
<?php
if (class_exists('JsHelper') && method_exists($this->Js, 'writeBuffer')) 
	echo $this->Js->writeBuffer();
?>