<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
	<?php  echo ($this->Form->input('id'));?>				
	<p>
		<?php  echo ($this->Form->input('question', array('div'=>false, 'label'=>'question*', "class" => "text-input medium-input")));?> 
		
	</p>
	
	<p>
		<?php  echo ($this->Form->input('answer', array('div'=>false, 'label'=>'answer*', "class" => "text-input medium-input text-area ckeditor", 'rows'=>'15')));?> 
		
	</p>
	
	<p>
		<?php  echo ($this->Form->input('order', array('div'=>false, 'label'=>'order*', "class" => "text-input small-input")));?> 
		
	</p>
	<p>
		<label>Status</label>
		<?php  echo ($this->Form->input('status', array('options'=>Configure::read('Status'),'div'=>false, 'label'=>false, "class" => "small-input")));?> 

	</p>
	<p>
		<?php  echo ($this->Form->submit('Submit', array('class' => 'button', "div"=>false)));?>
		
		<?php echo $this->Html->link("Cancel", array('admin'=>true, 'controller'=>'faqs', 'action'=>'index'), array("class"=>"button", "escape"=>false)); ?>
		
	</p>
	
</fieldset>