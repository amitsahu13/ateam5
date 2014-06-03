<?php 
if(!empty($states))
{
echo ($this->Form->input('state_id', array('name'=>'data[Project][state_id]','div'=>false, 'label'=>false,'empty'=>'-- Select State --','options'=>$states, "class" => " custom_dropdown slct_rwndInPutRi with_sml1")));
	
}
else{
  echo ($this->Form->input('state_id', array('name'=>'data[Project][state_id]','div'=>false, 'label'=>false,'empty'=>'N/A',"class" => " custom_dropdown slct_rwndInPutRi with_sml1")));
		
}
?>

