
<?php
if(!empty($countries))
{
?>
	<p>
		<?php  echo ($this->Form->input('country_id', array('name'=>'data[Job][country_id]','div'=>false, 'label'=>'Country*','empty'=>'-- Select Country --','options'=>$countries, "class" => "text-input medium-input")));
		
		$this->Js->get('#country_id')->event('change',$this->Js->request(array('controller'=>'states','action'=>'admin_get_state'), array('update'=>'#update_state','async' => true,'method' => 'post','dataExpression'=>true,'data'=> $this->Js->serializeForm(array('isForm' => true,'inline' => true)))));
		?> 
	</p>
<?php
}
else{?>
	<p>
		<?php  echo ($this->Form->input('country_id', array('name'=>'data[Job][country_id]','div'=>false, 'label'=>'Country*','empty'=>'-- Not Found --','options'=>$countries, "class" => "text-input medium-input")));
		?> 
	</p>
<?php 
}
if(!empty($states))
{
?>
<div id="update_state">
	<p>
		<?php  echo ($this->Form->input('state_id', array('name'=>'data[Job][state_id]','div'=>false, 'label'=>'State*','empty'=>'-- Select State --','options'=>$states, "class" => "text-input medium-input")));
		?> 
	</p>
</div>
<?php
}
else{?>
<div id="update_state">
	<p>
		<?php  echo ($this->Form->input('state_id', array('name'=>'data[Job][state_id]','div'=>false, 'label'=>'State*','empty'=>'-- Select State --','options'=>$states, "class" => "text-input medium-input")));
		?> 
	</p>
</div>
<?php 
}
?>
<?php
	if (class_exists('JsHelper') && method_exists($this->Js, 'writeBuffer')) 
	echo $this->Js->writeBuffer();
?>
