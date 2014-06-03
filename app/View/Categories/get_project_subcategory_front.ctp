<?php
if(!empty($child_categories))
{		echo ($this->Form->input('Project.sub_category_id', array('div'=>false, 'label'=>false,'empty'=>'-- Select a sub category --', "class" => "slct_rwndInPutRi  custom_dropdown with_sml1","options"=>$child_categories)));
}
else
{
	echo ($this->Form->input('Project.sub_category_id', array('div'=>false, 'label'=>false,'empty'=>'-- N/A --', "class" => "slct_rwndInPutRi   custom_dropdown with_sml1","options"=>NULL)));
}
die;  

?>  
 
 