<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
	<?php  echo ($this->Form->input('id'));?>				
	<?php  echo ($this->Form->hidden('first_name'));?>				
		
	<p>
		<h4>
		<?php  echo ($this->data['User']['first_name']);?> 
		</h4>
	</p>
		
	<p>
		<?php  echo ($this->Form->input('User.new_password', array('type'=>'password', 'div'=>false, 'label'=>'New Password*', "class" => "text-input small-input")));?> 
		
	</p>
	
	<p>
		<?php  echo ($this->Form->input('User.confirm_password', array('type'=>'password', 'div'=>false, 'label'=>'Confirm Password*', "class" => "text-input small-input")));?> 
		
	</p>
	
	<p>
		<?php  echo ($this->Form->submit('Submit', array('class' => 'button', "div"=>false)));?>
		<?php
			
			if($this->params['pass'][0] == $this->Session->read('Auth.User.id')){
				echo $this->Html->link("Cancel", array('admin'=>true, 'controller'=>'admins', 'action'=>'edit', $this->params['pass'][0]), array("class"=>"button", "escape"=>false));
				
			}else{
				echo $this->Html->link("Cancel", array('admin'=>true, 'controller'=>'admins', 'action'=>'index', 'Admin'), array("class"=>"button", "escape"=>false));
			}
		?>		
	</p>
	
</fieldset>
