<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
	<?php  echo ($this->Form->input('id'));?>				
	
	<p>
		<?php  echo ($this->Form->input('title', array('div'=>false, 'label'=>'Title*', "class" => "text-input small-input")));?> 
		
	</p>
	
	<p>
		<?php  echo ($this->Form->input('embeded_video', array('div'=>false, 'label'=>'Embede Video Code*', "class" => "text-input medium-input")));?> 
		
	</p>
		
	<p>
		<label>Status</label>
		<?php  echo ($this->Form->input('status', array('options'=>Configure::read('Status'),'div'=>false, 'label'=>false, "class" => "small-input")));?> 

	</p>
	
	<p>
		<?php  echo ($this->Form->submit('Submit', array('class' => 'button', "div"=>false)));?>
		
		<?php echo $this->Html->link("Cancel", array('admin'=>true, 'controller'=>'videos', 'action'=>'index'), array("class"=>"button", "escape"=>false)); ?>
		
	</p>
	
</fieldset>