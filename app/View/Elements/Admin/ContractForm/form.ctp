<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
	<?php  echo ($this->Form->input('id'));?>				
	<p>
		<?php  echo ($this->Form->input('name', array('div'=>false, 'label'=>'Name*', "class" => "text-input small-input")));?> 
		
	</p>
	<p>
		<label>Agreement*</label>
		<?php  echo ($this->Form->input('agreement_id', array('options'=>$agreements,'div'=>false, 'label'=>false, "class" => "small-input",'empty'=>'--- Select Agreement ---')));?> 

	</p>
	<p>
		<label>Law Jurisdiction*</label>
		<?php  echo ($this->Form->input('law_jurisdiction_id', array('options'=>$law,'div'=>false, 'label'=>false, "class" => "small-input",'empty'=>'--- Select Law Jurisdiction ---')));?> 

	</p>
	<p>
		<label>Contract Document</label>
		<?php  echo ($this->Form->input('form_doc', array('div'=>false, 'label'=>false, "class" => "small-input",'type'=>'file')));?> 

	</p>
	<p>
		<?php  echo ($this->Form->input('content', array('div'=>false, 'label'=>'Content*', "class" => "text-input text-area ckeditor", 'rows'=>'30')));?> 
		
	</p>
	<p>
		<label>Status</label>
		<?php  echo ($this->Form->input('status', array('options'=>Configure::read('Status'),'div'=>false, 'label'=>false, "class" => "small-input")));?> 

	</p>
	<p>
		<?php  echo ($this->Form->submit('Submit', array('class' => 'button', "div"=>false)));?>
		
		<?php echo $this->Html->link("Cancel", array('admin'=>true, 'controller'=>''.$controller.'', 'action'=>'index'), array("class"=>"button", "escape"=>false)); ?>
		
	</p>
	
</fieldset>