<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
	<?php echo ($this->Form->input('id'));?>				
	
	<p>
		<label>Region*</label>
		<?php echo ($this->Form->input('region_id', array('options'=>$regions,'div'=>false, 'label'=>false, "class" => "small-input",'empty'=>'---Select Region---')));?> 
		
	</p>
	
	<p>
		<label>Name*</label>
		<?php  echo ($this->Form->input('name', array('div'=>false, 'label'=>false, "class" => "text-input small-input")));?> 
		
	</p>
	<p>
		<label>Image</label>
		<?php  echo ($this->Form->input('country_flag', array('div'=>false,'type'=>'file','label'=>false, "class" => "text-input small-input")));?> 
		
	</p>
	<?php 
	if (isset($this->request->data['Country']['country_flag'])){
			$imageName = $this->request->data['Country']['country_flag'];
	}		
	
	if($this->params->params['controller'] == 'countries' && $this->params->params['action'] == 'admin_edit'){
		 echo $this->Html->image('country_flags/'.$imageName);
	}
	?>
	
	
	<p>
		<label>Status</label>
		<?php echo ($this->Form->input('status', array('options'=>Configure::read('Status'),'div'=>false, 'label'=>false, "class" => "small-input")));?> 
		
	</p>
	
	<p>
		<?php  echo ($this->Form->submit('Submit', array('class' => 'button', "div"=>false)));?>
		
		<?php echo $this->Html->link("Cancel", array('admin'=>true, 'controller'=>'countries', 'action'=>'index'), array("class"=>"button", "escape"=>false)); ?>
		
	</p>
	
</fieldset>