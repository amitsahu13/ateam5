<?php 

	echo $this->Session->check('Auth.User.id')
	$name;
	$email;
	$readonly = "readonly=false";
	if($this->Session->check('Auth.User.id'))
	{
		$name = $this->Session->read('Auth.User.first_name')." ".$this->Session->read('Auth.User.first_name');
		$email = $this->Session->read('Auth.User.email');
		$readonly = "readonly=true";
	}
?>

<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
	<?php  echo ($this->Form->input('id'));?>				
	<p>
		<?php  echo ($this->Form->input('name', array('div'=>false, 'label'=>'Name*', "class" => "text-input small-input",'value'=>$name,$readonly)));?> 
		
	</p>
	<p>
		<?php  echo ($this->Form->input('email', array('div'=>false, 'label'=>'Email*', "class" => "text-input small-input",'value'=>$email,$readonly)));?> 
		
	</p>
	<p>
		<?php  echo ($this->Form->input('description', array('div'=>false, 'label'=>'Feedback*', "class" => "text-input small-input")));?> 
		
	</p>
	<p>
		<?php  echo ($this->Form->submit('Submit', array('class' => 'button', "div"=>false)));?>
		
		<?php echo $this->Html->link("Cancel", array('admin'=>true, 'controller'=>''.$controller.'', 'action'=>'index'), array("class"=>"button", "escape"=>false)); ?>
		
	</p>
	
</fieldset>
<?php
	if (class_exists('JsHelper') && method_exists($this->Js, 'writeBuffer')) 
	echo $this->Js->writeBuffer();
?>	