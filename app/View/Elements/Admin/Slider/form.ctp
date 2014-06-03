<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
	<?php  echo ($this->Form->input('id'));?>				
	<p>
		<?php  echo ($this->Form->input('title', array('div'=>false, 'maxlength'=>'50', 'label'=>'Title*', "class" => "text-input small-input")));?> 
		
	</p>
	<p>
		<?php  echo ($this->Form->input('description', array('div'=>false, 'label'=>'Description*', "class" => "text-input small-input")));?> 
		
	</p>
	
	<?php 
	if($this->params['action']=='admin_edit'){
	?>
		<p>
			<?php  echo ($this->Form->hidden('image_hidden', array('div'=>false,'value'=>$this->request->data['Slider']['image'],"class" => "text-input small-input")));?> 
			<?php echo $this->Html->image(SLIDER_SHOW_PATH.$this->request->data['Slider']['image'],array('div'=>false,'escape'=>false,'width'=>400,'height'=>300));?>
		
		</p>
	<?php
	}
	?>
	<p>
		<?php  echo ($this->Form->input('image', array('div'=>false,'type'=>'file', 'label'=>'Project Image*', "class" => "text-input small-input")));?> 
		
	</p>
	<p>
		<label>Slide Status</label>
		<?php  echo ($this->Form->input('status', array('options'=>Configure::read('Status'),'div'=>false, 'label'=>false, "class" => "small-input")));?>  

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