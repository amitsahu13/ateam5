<?php
if(!empty($sub_categories))
{
?>
<p>
	<?php  echo ($this->Form->input('Project.sub_category_id', array('div'=>false, 'label'=>'Sub Category*', "class" => "text-input small-input",'empty'=>'-- Select Sub Category --','options'=>$sub_categories)));?> 
	
</p>
<?php
}
else
{
?>
<p>
	<?php  echo ($this->Form->input('Project.sub_category_id', array('div'=>false, 'label'=>'Sub Category*', "class" => "text-input small-input",'empty'=>'-- Not Found --','options'=>$sub_categories)));?> 
	
</p>
<?php
}
?>
<?php
if (class_exists('JsHelper') && method_exists($this->Js, 'writeBuffer')) 
echo $this->Js->writeBuffer();
?>