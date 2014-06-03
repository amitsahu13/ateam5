<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
	<?php  echo ($this->Form->input('id'));?>				
	<p style="float:right;">
		<?php 
			if($this->params['pass'][0] == $this->Session->read('Auth.User.id')){
				echo $this->Html->link("Change Password", array('admin'=>true, 'controller'=>'admins', 'action'=>'change_password', $this->params['pass'][0]), array("class"=>"button", "escape"=>false));
			}
		?>
	</p>
	<p>
		<label>First Name*</label>
		<?php  echo ($this->Form->input('first_name', array('div'=>false, 'label'=>false, "class" => "text-input small-input")));?> 
		
	</p>
	
	<p>
		<label>Last Name*</label>
		<?php  echo ($this->Form->input('last_name', array('div'=>false, 'label'=>false, "class" => "text-input small-input")));?> 
		
	</p>
	
	<p>
		<label>Username*</label>
		<?php  echo ($this->Form->input('username', array('div'=>false, 'label'=>false, "class" => "text-input small-input")));?> 
		<!--<br><small>Minimum length: 8 characters</small>-->
	</p>
		
	<p>
		<label>Email*</label>
		<?php  echo ($this->Form->input('email', array('div'=>false, 'label'=>false, "class" => "text-input small-input")));?> 
		
	</p>
	<?php
	if($role_id == Configure::read('App.Role.SubAdmin'))
	{
	?>
	<p>
		<label>Status</label>
		<?php  echo ($this->Form->input('status', array('options'=>Configure::read('Status'),'div'=>false, 'label'=>false, "class" => "small-input")));?> 
	</p>
	<?php
	}
	?>
	<p>
		<?php  echo ($this->Form->submit('Submit', array('class' => 'button', "div"=>false)));?>
		<?php
			
			if($this->params['pass'][0] == $this->Session->read('Auth.User.id')){
				echo $this->Html->link("Cancel", array('admin'=>true, 'controller'=>'admins','action'=>'index','Admin'), array("class"=>"button", "escape"=>false));
			}else{
				echo $this->Html->link("Cancel", array('admin'=>true, 'controller'=>'admins', 'action'=>'index','Admin'), array("class"=>"button", "escape"=>false));
			}
		?>
		
	</p>
	
</fieldset>