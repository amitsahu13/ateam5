<?php 
if(!empty($states))
{
?>
	<p>
		<?php  echo ($this->Form->input('state_id', array('name'=>'data[Job][state_id]','div'=>false, 'label'=>'State*','empty'=>'-- Select State --','options'=>$states, "class" => "text-input medium-input")));
		?> 
	</p>
<?php
}
else{?>
	<p>
		<?php  echo ($this->Form->input('state_id', array('name'=>'data[Job][state_id]','div'=>false, 'label'=>'State*','empty'=>'-- Not Found --','options'=>$states, "class" => "text-input medium-input")));
		?> 
	</p>
<?php 
}
?>

