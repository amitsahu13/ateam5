<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
	<?php  echo ($this->Form->input('id'));?>				
	
	<p>
		<label>Category*</label>
		<?php  echo ($this->Form->input('category_id', array('div'=>false, 'label'=>false,'options'=>$categories, "class" => "text-input small-input",'empty'=>'-- Select Category --')));?>
	</p>
	
	<p>
		<label>Name*</label>
		<?php  echo ($this->Form->input('name', array('div'=>false, 'label'=>false, "class" => "text-input small-input")));?>
	</p>
	
	<p>
		<label>Status</label>
		<?php  echo ($this->Form->input('status', array('options'=>Configure::read('Status'),'div'=>false, 'label'=>false, "class" => "small-input")));?>
		
	</p>
	
	<p>
		<?php  echo ($this->Form->submit('Submit', array('class' => 'button', "div"=>false)));?>
		
		<?php echo $this->Html->link("Cancel", array('admin'=>true, 'controller'=>'skills', 'action'=>'index'), array("class"=>"button", "escape"=>false)); ?>
		
	</p>
	
</fieldset>