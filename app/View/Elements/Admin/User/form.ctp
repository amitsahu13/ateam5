<?php 
// echo $this->Html->script(array('jquery/jquery-ui.min'),true);
?>
<?php 
echo $this->Html->script(array('multiselect/jquery.multiselect'),true);
echo $this->Html->css(array('multiselect/jquery.multiselect'),true); 
?>
<style>
.ui-multiselect {
	width: 225px !important;
}
</style>
<fieldset class="column-left"> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
	<?php  echo ($this->Form->input('id'));?>				
	<p>
		<?php 
		if($this->request->params['controller'] == 'users' && $this->request->params['action'] == 'admin_add' )
		{
		echo ($this->Form->input('role_id', array('type'=>'radio', 'options'=>Configure::read('App.Roles'), 'default'=>3, 'div'=>false,'legend'=>'Role*')));
		}
		
		?>
	</p>	
	
	
	<p>
		<?php  echo ($this->Form->input('first_name', array('div'=>false, 'label'=>'First Name*', "class" => "text-input medium-input")));?> 
		
	</p>
	
	<p>
		<?php  echo ($this->Form->input('last_name', array('div'=>false, 'label'=>'Last Name*', "class" => "text-input medium-input")));?> 
		
	</p>
	<p>
		<?php  echo ($this->Form->input('username', array('div'=>false, 'label'=>'Username*', "class" => "text-input medium-input")));?> 
		
	</p>
			
	<?php /* if($this->params['action']=='admin_add'){?>
	<p>
		<?php  echo ($this->Form->input('password2', array('autocomplete'=>'off',"type" => "password", 'div'=>false, 'label'=>'Password*', "class" => "text-input medium-input")));?> 
		<br><small>Minimum length: 8 characters</small>
	</p>
	
	<p>
		<?php  echo ($this->Form->input('confirm_password', array('autocomplete'=>'off',"type" => "password", 'div'=>false, 'label'=>'Confirm Password*', "class" => "text-input medium-input")));?> 
		<br><small>Re-Type Password here</small>
	</p>
	<?php } */?>
	<p>
		<?php  echo ($this->Form->input('email', array('div'=>false, 'label'=>'Email*', "class" => "text-input medium-input")));?> 
		
	</p>
	
	<p>
		<?php  echo ($this->Form->input('phone_no', array('div'=>false, 'label'=>'Phone no*', "class" => "text-input medium-input", 'maxlength'=>"10")));?> 
	</p>
	
	<p>
		<p>
		<?php  echo ($this->Form->input('gender', array('type'=>'radio', 'options'=>Configure::read('App.Sex'),'default'=>'m', 'div'=>false,'legend'=>'Gender*')));?>
	</p>
				
	</p>
	<p>
		<?php  echo ($this->Form->input('address', array('div'=>false, 'label'=>'Address*', "class" => "text-input medium-input")));?> 
		
	</p>
	<p>
		<?php  echo ($this->Form->input('city', array('div'=>false, 'label'=>'City', "class" => "text-input medium-input")));?> 
	</p>
	
	<p>
		<?php  echo ($this->Form->input('country_id', array('div'=>false, 'label'=>'Country', 'empty'=>'-- Select Country --', "class" => "text-input medium-input")));
		 $this->Js->get('#UserCountryId')->event('change',$this->Js->request(array('controller'=>'states','action'=>'admin_getStateList'), array('update'=>'#State','async' => true,'method' => 'post', 'dataExpression'=>true, 'data'=> $this->Js->serializeForm(array('isForm' => true,'inline' => true)))));
		?> 
	</p>
	<p id="State">
		<?php //pr($states); die;
			echo ($this->Form->input('state_id', array('div'=>false, 'label'=>'State', 'empty'=>'-- Select State --', "class" => "text-input medium-input")));
		?> 
	</p>
	
	<p  class="contractor-field">
		<?php  echo ($this->Form->input('category_id', array('div'=>false, 'label'=>'Category*', "class" => "text-input medium-input",'empty'=>'-- Select Category --')));
		$this->Js->get('#UserCategoryId')->event('change',$this->Js->request(array('controller'=>'categories','action'=>'get_skill_and_Subcate'), array('update'=>'#Update_skill','async' => true,'method' => 'post','dataExpression'=>true,'data'=> $this->Js->serializeForm(array('isForm' => true,'inline' => true)))));
		?> 
	</p>
	<div  class="contractor-field" id="Update_skill">
	<p  class="contractor-field">
		<?php  echo ($this->Form->input('sub_category_id', array('div'=>false, 'label'=>'Sub Category*','options'=>$sub_categories,'empty'=>'-- Select Category First --', "class" => "text-input medium-input")));?> 
	</p>
	
	<p  class="contractor-field">
		<?php
		if($this->params['action']=='admin_edit'){
			$pro_skill=array();
			if(!empty($this->data['UserSkill'])){
				foreach($this->data['UserSkill'] as $user_skills){
					$pro_skills[]=$user_skills['skill_id'];
				}
			}
			else{
			$pro_skills[]='No Skill Selected';
			}
			
			
			echo $this->Form->input('UserSkill.][skill_id]', array(
				'legend' => '',
				'type' => 'select',
				'id'=>'stateselect',
				'options'=>$skills,
				'separator' => '',
				'label' =>'Skills*',
				'multiple'=>true,
				'class'=>'select_skill medium-input',
				'default'=>$pro_skills
				)
			);
			
		}
		else {
			$pro_skill=array();
			if(!empty($this->data['UserSkill'])){
				foreach($this->data['UserSkill'] as $user_skills){
					$pro_skills[]=$user_skills['skill_id'];
				}
			}
			else{
				$pro_skills[]='No Skill Selected';
			}
			
			
			echo $this->Form->input('UserSkill.][skill_id]', array(
				'legend' => '',
				'type' => 'select',
				'id'=>'stateselect',
				'options'=>$skills,
				'separator' => '',
				'label' =>'Skills*',
				'multiple'=>true,
				'class'=>'select_skill medium-input',
				'default'=>$pro_skills
				)
			);
		}
		echo ($this->Form->hidden('User.skill', array('div'=>false, 'label'=>false, "class" => "text-input medium-input",'error'=>false)));
		echo ($this->Form->error('User.skill', array('div'=>false, 'label'=>false, "class" => "text-input medium-input")));
		?> 
	</p>
	</div>
	
	<?php // pr($user); ?>
	<p>
		<?php  echo ($this->Form->input('zip', array('div'=>false, 'label'=>'Zip/Postal code*', "class" => "text-input medium-input", 'maxlength'=>"9", )));?> 
		<br><small>Length: 3 to 9 alpha numeric characters</small>
	</p>
	<p>		
		<?php  echo ($this->Form->input('status', array('type'=>'select', 'options'=>array('0'=>'Inactive', '1'=>'Active'), 'default'=>2, "class" => "text-input medium-input", 'div'=>false)));?>		
	</p>
	<p>
		<?php  echo ($this->Form->submit('Submit', array('class' => 'button', "div"=>false)));?>
		<?php if (isset($this->request->data['User']['role_id'])){ 
		
		if($role_id == Configure::read('App.Role.Buyer'))
		{
			$roles = 'buyer';
		}
		if($role_id == Configure::read('App.Role.Provider'))
		{
			$roles = 'provider';
		}
		if($role_id == Configure::read('App.Role.Both'))
		{
			$roles = 'both';
		}
		
		
		echo $this->Html->link("Cancel", array('admin'=>true, 'controller'=>'users', 'action'=>'index',$roles), array("class"=>"button", "escape"=>false)); }
		else{
			echo $this->Html->link("Cancel", array('admin'=>true, 'controller'=>'users', 'action'=>'index','both'), array("class"=>"button", "escape"=>false));
		}
		
		?>
		
	</p>

</fieldset>
<?php
	if (class_exists('JsHelper') && method_exists($this->Js, 'writeBuffer')) 
	echo $this->Js->writeBuffer();
?>	