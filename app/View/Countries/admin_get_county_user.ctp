
<?php
if(!empty($countries))
{
?>
<p>
	<?php  echo ($this->Form->input('UserDetail.country_id', array('name'=>'data[UserDetail][country_id]','div'=>false, 'label'=>'Country*','empty'=>'-- Select Country --','options'=>$countries, "class" => "text-input medium-input")));
	
	$this->Js->get('#UserDetailCountryId')->event('change',$this->Js->request(array('controller'=>'states','action'=>'admin_get_state_user'), array('update'=>'#State','async' => true,'method' => 'post','dataExpression'=>true,'data'=> $this->Js->serializeForm(array('isForm' => true,'inline' => true)))));
	?> 
</p>
<?php
}
else{?>
	<p>
		<?php  echo ($this->Form->input('UserDetail.country_id', array('div'=>false, 'label'=>'Country*','empty'=>'-- Not Found --','options'=>$countries, "class" => "text-input medium-input")));
		?> 
	</p>
<?php 
}
if(!empty($states))
{
?>

<p id="State">
	<?php  echo ($this->Form->input('UserDetail.state_id', array('div'=>false, 'label'=>'State*','empty'=>'-- Select State --','options'=>$states, "class" => "text-input medium-input")));
	?> 
</p>

<?php
}
else{?>
<p id="State">
		<?php  echo ($this->Form->input('UserDetail.state_id', array('div'=>false, 'label'=>'State*','empty'=>'-- Select State --','options'=>$states, "class" => "text-input medium-input")));
		?> 
</p>
<?php 
}
?>
<?php
	if (class_exists('JsHelper') && method_exists($this->Js, 'writeBuffer')) 
	echo $this->Js->writeBuffer();
?>
