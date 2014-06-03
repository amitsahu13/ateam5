<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
	<?php  echo ($this->Form->input('id'));?>				
	
	<p>
		<label>First Name*</label>
		<?php  echo ($this->Form->input('User.first_name', array('div'=>false, 'label'=>false, "class" => "text-input small-input")));?> 
		
	</p>
	
	<p>
		<label>Last Name*</label>
		<?php  echo ($this->Form->input('User.last_name', array('div'=>false, 'label'=>false, "class" => "text-input small-input")));?> 
		
	</p>
	
	<p>
		<label>Username*</label>
		<?php  echo ($this->Form->input('User.username', array('div'=>false, 'label'=>false, "class" => "text-input small-input")));?> 
		<!--<br><small>Minimum length: 8 characters</small>-->
	</p>
	
	<p>
		<label>Password*</label>
		<?php  echo ($this->Form->input('User.password2', array("type" => "password", 'div'=>false, 'label'=>false, "class" => "text-input small-input")));?> 
		<!--<br><small>Minimum length: 8 characters</small>-->
	</p>
	
	<p>
		<label>Confirm Password*</label>
		<?php  echo ($this->Form->input('User.confirmpassword', array("type" => "password", 'div'=>false, 'label'=>false, "class" => "text-input small-input")));?> 
		
	</p>
	
	<p>
		<label>Email*</label>
		<?php  echo ($this->Form->input('User', array('div'=>false, 'label'=>false, "class" => "text-input small-input")));?> 
		
	</p>
	
	<p>
		<label>Status</label>
		<?php  echo ($this->Form->input('status', array('options'=>Configure::read('Status'),'div'=>false, 'label'=>false, "class" => "small-input")));?> 
	</p>
	
	<p>
		<?php  echo ($this->Form->submit('Submit', array('class' => 'button', "div"=>false)));?>
		<?php echo $this->Html->link("Cancel", array('admin'=>true, 'controller'=>'admins', 'action'=>'index','Admin'), array("class"=>"button", "escape"=>false)); ?>
	</p>
	
</fieldset>