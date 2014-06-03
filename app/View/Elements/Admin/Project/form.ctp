<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
	<?php  echo ($this->Form->input('id'));?>				
	<p>
		<?php  echo ($this->Form->input('user_id', array('div'=>false, 'label'=>'User*', "class" => "text-input small-input",'empty'=>'-- Select User --')));?> 
		
	</p>
	<p>
		<?php  
		
		echo ($this->Form->input('category_id', array('div'=>false, 'label'=>'Category*', "class" => "text-input small-input",'empty'=>'-- Select Category --')));
		
		$this->Js->get('#ProjectCategoryId')->event('change',$this->Js->request(array('controller'=>'categories','action'=>'admin_sub_category_for_project'), array('update'=>'#sub_cat','async' => true,'method' => 'post','dataExpression'=>true,'data'=> $this->Js->serializeForm(array('isForm' => true,'inline' => true)))));
		
		?> 
		
	</p>
	<div id="sub_cat">
	<p>
		<?php  echo ($this->Form->input('sub_category_id', array('div'=>false, 'label'=>'Sub Category*', "class" => "text-input small-input",'empty'=>'-- Select Sub Category --','options'=>$sub_categories)));?> 
	</p>
	</div>
	<p>
		<?php  echo ($this->Form->input('title', array('div'=>false, 'label'=>'Title*', "class" => "text-input small-input")));?> 
		
	</p>
	<p>
		<?php  echo ($this->Form->input('description', array('div'=>false, 'label'=>'Description*', "class" => "text-input small-input")));?> 
		
	</p>
	<p>
		<?php // spr($project_types); die; 
		echo ($this->Form->input('project_type_id', array('div'=>false, 'label'=>'Project Type*', 'options'=>$project_types, "class" => "text-input small-input",'empty'=>'-- Select Type --')));?> 
		
	</p>
	<p>
		<?php  echo ($this->Form->input('project_manager_availability_id', array('div'=>false, 'label'=>'Project Manager Availability*', 'options'=>$project_manager_availabilities, "class" => "text-input small-input",'empty'=>'-- Select Manager Availability --')));?> 
		
	</p>
	<p>
		<?php  echo ($this->Form->input('idea_maturity_id', array('div'=>false, 'label'=>'Idea Maturity*', 'options'=>$idea_maturities, "class" => "text-input small-input",'empty'=>'-- Select Idea Maturity --')));?> 
		
	</p>
	<?php 
	
	if($this->params['action']=='admin_edit'){?>
			<?php  echo ($this->Form->hidden('plan_hidden', array('div'=>false,'value'=>$this->request->data['Project']['business_plan_doc'],"class" => "text-input small-input")));?> 
		<p>
			<?php  echo $this->Html->link($this->request->data['Project']['business_plan_doc'],array('controller'=>'projects','action'=>'download_file',$this->request->data['Project']['id']),array('escape'=>false));?> 
		
		</p>
	<?php
	}
	?>
	
	
	<p>
		<?php  echo ($this->Form->input('business_plan_doc', array('div'=>false,'type'=>'file', 'label'=>'Business Plan Doc*', "class" => "text-input small-input")));?> 
		
	</p>
	<?php 
	if($this->params['action']=='admin_edit'){
	?>
		<p>
			<?php  echo ($this->Form->hidden('image_hidden', array('div'=>false,'value'=>$this->request->data['Project']['project_image'],"class" => "text-input small-input")));?> 
			<?php 
			echo $this->General->show_project_img($this->request->data['Project']['id'],$this->request->data['Project']['project_image'],'SMALL',$this->request->data['Project']['title']);
			
			?>
		
		</p>
	<?php
	}
	?>
	<p>
		<?php  echo ($this->Form->input('project_image', array('div'=>false,'type'=>'file', 'label'=>'Project Image*', "class" => "text-input small-input")));?> 
		
	</p>
	<p>
		<?php  echo ($this->Form->input('project_image_text', array('div'=>false, 'label'=>'Project Image Small Text*', "class" => "text-input small-input",'maxlength'=>'40')));?> 
		
	</p>
	<p>
		<?php  echo ($this->Form->input('business_plan_level_id', array('div'=>false, 'label'=>'Business Plan Level*', 'options'=>$business_plan_levels, "class" => "text-input small-input",'empty'=>'-- Select Plans --')));?> 
		
	</p>
	<p>
		<?php  echo ($this->Form->input('project_value_description', array('div'=>false, 'label'=>'Project Value Description*', "class" => "text-input small-input")));?> 
		
	</p>
	
	<p>
		<?php  echo ($this->Form->input('project_visibility_id', array('div'=>false, 'label'=>'Project Visibility*', 'options'=>$project_visibilities, "class" => "text-input small-input",'empty'=>'-- Select Project Visibility --')));?> 
		
	</p>
	<p>
		<label>Prject Level Status</label>
		<?php  echo ($this->Form->input('project_status_id', array('div'=>false, 'label'=>false, "class" => "small-input", 'options'=>$project_statuses,'empty'=>'-- Select Status --')));?> 

	</p>
	<p>
		<label>Prject Status</label>
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