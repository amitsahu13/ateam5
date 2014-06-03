<?php 
if(!empty($states))
{
echo ($this->Form->input('UserDetail.state_id', array('div'=>false, 'label'=>false,'empty'=>'-- Select State --','options'=>$states, "class" => "slct_rwndInPutRi with_sml1")));
	
}
else{
  echo ($this->Form->input('UserDetail.state_id', array('div'=>false, 'label'=>false,'empty'=>'N/A','options'=>$states, "class" => "slct_rwndInPutRi with_sml1")));
		
}
?>

