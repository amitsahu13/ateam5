<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
	<?php  echo ($this->Form->input('id'));?>				
	<?php  echo ($this->Form->hidden('first_name'));?>				
		
	<p>
		<h4>
		<?php  echo ($this->data['User']['first_name']);?> 
		</h4>
	</p>
		
	<p>
		<?php  echo ($this->Form->input('new_password', array('type'=>'password', 'div'=>false, 'label'=>'New Password*', "class" => "text-input small-input")));?> 
		
	</p>
	
	<p>
		<?php  echo ($this->Form->input('confirm_password', array('type'=>'password', 'div'=>false, 'label'=>'Confirm Password*', "class" => "text-input small-input")));?> 
		
	</p>
	
	<p>
		<?php  echo ($this->Form->submit('Submit', array('class' => 'button', "div"=>false)));?>
		
		<?php if(isset($this->data['User']['role_id'])){
				echo $this->Html->link("Cancel", array('admin'=>true, 'controller'=>'users', 'action'=>'index',  Configure::read('App.Roles.'.$this->data['User']['role_id'])), array("class"=>"button", "escape"=>false)); }
			else{
				echo $this->Html->link("Cancel", array('admin'=>true, 'controller'=>'users', 'action'=>'index', 'seller'), array("class"=>"button", "escape"=>false));
			}
				?>
		
	</p>
	
</fieldset>
