<?php 
if(!empty($states))
{
echo ($this->Form->input('state_id', array('name'=>'data['.$model.'][state_id]','div'=>false, 'label'=>false,'empty'=>'-- Select State --','options'=>$states, "class" => "slct_rwndInPutRi with_sml1_2")));
	
}
else{
  echo ($this->Form->input('state_id', array('name'=>'data['.$model.'][state_id]','div'=>false, 'label'=>false,'empty'=>'-- Select State --','options'=>$states, "class" => "slct_rwndInPutRi with_sml1_2")));
		
}
?>

