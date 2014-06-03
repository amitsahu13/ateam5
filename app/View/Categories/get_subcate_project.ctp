
<?php
if(!empty($categories))
{
?>
	<p>
		<?php  echo ($this->Form->input('sub_category_id', array('name'=>'data['.$model.'][sub_category_id]','div'=>false, 'label'=>'Sub Category*','empty'=>'-- Select Sub Category --','options'=>$categories, "class" => "text-input small-input")));
		
		$this->Js->get('#sub_category_id')->event('change',$this->Js->request(array('controller'=>'categories','action'=>'get_skill_and_Subcate_project'), array('update'=>'#skill_id','async' => true,'method' => 'post','dataExpression'=>true,'data'=> $this->Js->serializeForm(array('isForm' => true,'inline' => true)))));
		?> 
	</p>
<?php
}
else{?>
	<p>
		<?php  echo ($this->Form->input('sub_category_id', array('name'=>'data['.$model.'][sub_category_id]','div'=>false, 'label'=>'Sub Category*','empty'=>'-- Not Found --', "class" => "text-input small-input")));
		?> 
	</p>
<?php }

