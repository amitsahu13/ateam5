<p>
	<label>Parent Category</label>
	<?php  echo ($this->Form->input('Category.parent_id', array('div'=>false, 'label'=>false, "class" => "text-input small-input", 'options'=>$parents, 'empty'=>'Nothing')));?> 
	
</p>