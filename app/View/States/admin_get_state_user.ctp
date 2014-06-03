<?php 
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
		<?php  echo ($this->Form->input('UserDetail.state_id', array('div'=>false, 'label'=>'State*','empty'=>'-- Not Found --','options'=>$states, "class" => "text-input medium-input")));
		?> 
	</p>
<?php 
}
?>

