<div class="right_sidebar">
	<?php echo $this->Form->create('User',array('url' => array('controller' => 'users', 'action' => 'edit_profile'),'type'=>'file'));
			echo $this->Form->hidden('id');		
			echo $this->Form->hidden('image_hidden',array('value'=>$this->request->data['User']['image']));		
	?>
		<table>
			<tr>
				<td>First Name</td>
				<td></td>
				<td><?php echo $this->Form->input('first_name', array('div'=>false, 'label'=>false, "class" => "text-input medium-input"));?> </td>
			</tr>
			<tr><td colspan="3">&nbsp;</td></tr>
			<tr>	
				<td>Last Name</td>
				<td></td>
				<td><?php echo $this->Form->input('last_name', array('div'=>false, 'label'=>false, "class" => "text-input medium-input"));?></td>
			</tr>
			<tr><td colspan="3">&nbsp;</td></tr>
			<tr>	
				<td>Image</td>
				<td></td>
				<td>				
				<?php 
				echo $this->General->show_user_img($this->request->data['User']['id'],$this->request->data['User']['image'],'SMALL',$this->request->data['User']['first_name']);
				
				?>
				<?php echo $this->Form->input('image', array('div'=>false,'type'=>'file' ,'label'=>false, "class" => "text-input medium-input"));?></td>
			</tr>
			<tr><td colspan="3">&nbsp;</td></tr>
			<tr>	
				<td>UserName</td>
				<td></td>
				<td><?php echo $this->Form->input('username', array('div'=>false, 'label'=>false, "class" => "text-input medium-input"));?></td>
			</tr>
			<tr><td colspan="3">&nbsp;</td></tr>
			<tr>	
				<td>Set Image Visiblity</td>
				<td></td>
				<td><?php  echo ($this->Form->input('image_visibility', array('div'=>false,'type'=>'checkbox','value'=>1, 'label'=>false,'checked')));?> </td>
			</tr>
			<tr><td colspan="3">&nbsp;</td></tr>
			<tr>	
				<td>Phone no.</td>
				<td></td>
				<td><?php  echo ($this->Form->input('phone_no', array('div'=>false, 'type'=>'text', 'label'=>false, "class" => "text-input medium-input", 'maxlength'=>"10")));?>  </td>
			</tr>
			<tr><td colspan="3">&nbsp;</td></tr>			
			<tr>	
				<td>Gender</td>
				<td></td>
				<td><?php  echo ($this->Form->input('gender', array('type'=>'radio', 'options'=>Configure::read('App.Sex'),'default'=>'m', 'div'=>false,'legend'=>false)));?></td>
			</tr>
			<tr><td colspan="3">&nbsp;</td></tr>
			<tr>	
				<td>Address</td>
				<td></td>
				<td><?php  echo ($this->Form->input('address', array('div'=>false, 'label'=>false, "class" => "text-input medium-input")));?> </td>
			</tr>
			<tr><td colspan="3">&nbsp;</td></tr>
			<tr>	
				<td>Region</td>
				<td></td>
				<td><?php 
						echo ($this->Form->input('region_id', array('div'=>false, 'label'=>false,'empty'=>'-- Select Region --', "class" => "text-input medium-input"))); 
						$this->Js->get('#UserRegionId')->event('change',$this->Js->request(array('controller'=>'countries','action'=>'get_county_region'), array('update'=>'#update_country','async' => true,'method' => 'post','dataExpression'=>true,'data'=> $this->Js->serializeForm(array('isForm' => true,'inline' => true)))));?></td>
			</tr>
			<tr><td colspan="3">&nbsp;</td></tr>
			<tr  id="update_country">	
				<td>Country</td>
				<td></td>
				<td>	<?php  echo ($this->Form->input('country_id', array('div'=>false, 'label'=>false, 'empty'=>'-- Select Country --', "class" => "text-input medium-input")));
						 $this->Js->get('#UserCountryId')->event('change',$this->Js->request(array('controller'=>'states','action'=>'get_state_front'), array('update'=>'#State','async' => true,'method' => 'post', 'dataExpression'=>true, 'data'=> $this->Js->serializeForm(array('isForm' => true,'inline' => true)))));
						?> </td>
			</tr>
			<tr><td colspan="3">&nbsp;</td></tr>
			<tr id="State">	
				<td>State</td>
				<td></td>
				<td><?php if (isset($states) && $states!=''){
							echo ($this->Form->input('state_id', array('div'=>false, 'label'=>false, 'options'=>$states, "class" => "text-input medium-input", 'empty'=>'-- Select State --')));
						}else{  
							echo ($this->Form->input('state_id', array('div'=>false, 'label'=>false,  'empty'=>'-- Select State --', "class" => "text-input medium-input", 'empty'=>'-- Select State --')));
						}?>  </td>
			</tr>
			<tr><td colspan="3">&nbsp;</td></tr>
			<tr>	
				<td>City</td>
				<td></td>
				<td><?php  echo ($this->Form->input('city', array('div'=>false, 'type'=>'text', 'label'=>false, "class" => "text-input medium-input", 'maxlength'=>"10")));?>  </td>
			</tr>
			<tr><td colspan="3">&nbsp;</td></tr>
			<tr>	
				<td>Zip/Postal Code</td>
				<td></td>
				<td><?php  echo ($this->Form->input('zip', array('div'=>false, 'type'=>'text', 'label'=>false, "class" => "text-input medium-input", 'maxlength'=>"10")));?>  </td>
			</tr>
			<tr><td colspan="3">&nbsp;</td></tr>
			<?php
			if($role_id != Configure::read('App.Role.Buyer'))
			{?>
				<tr>	
				<td>Category</td>
				<td></td>
				<td>	
					
				<?php	echo $this->Form->input('category_id', array('div'=>false, 'label'=>false, "class" => "text-input medium-input",'empty'=>'-- Select Category --'));
						 $this->Js->get('#UserCategoryId')->event('change',$this->Js->request(array('controller'=>'categories','action'=>'get_skill_and_Subcate'), array('update'=>'#Update_skill','async' => true,'method' => 'post','dataExpression'=>true,'data'=> $this->Js->serializeForm(array('isForm' => true,'inline' => true)))));
					
			?> </td>
			</tr>
			<tr><td colspan="3">&nbsp;</td></tr>
				<div  class="contractor-field sub_cat" id="Update_skill">
					<tr>	
					<td>SubCategory</td>
					<td></td>
					<td>
						<?php  echo ($this->Form->input('sub_category_id', array('div'=>false, 'label'=>false,'options'=>$sub_categories,'empty'=>'-- Select Category First --', "class" => "text-input medium-input")));?> 
					</td>
					</tr>
					<tr><td colspan="3">&nbsp;</td></tr>
					
						<?php
						
						if($this->params['action']=='edit_profile'){
						
									$pro_skill=array();
									if(!empty($this->data['UserSkill'])){
										foreach($this->data['UserSkill'] as $user_skills){
											$pro_skills[]=$user_skills['skill_id'];
										}
									}
									else{
										$pro_skills[]='No Skill Selected';
									}
									?>
									<tr>	
									<td>Skills</td>
									<td></td>
									<td>	
									<?php	
									
										echo $this->Form->input('UserSkill.][skill_id]', array(
												'legend' => '',
												'type' => 'select',
												'id'=>'stateselect',
												'options'=>$skills,
												'separator' => '',
												'label' =>false,
												'multiple'=>true,
												'class'=>'select_skill medium-input',
												'default'=>$pro_skills
												)
											);
									?>
									</td>
									</tr>	
						<?php
						}						
						echo $this->Form->hidden('User.skill', array('div'=>false, 'label'=>false, "class" => "text-input medium-input",'error'=>false));
						echo $this->Form->error('User.skill', array('div'=>false, 'label'=>false, "class" => "text-input medium-input"));
						?> 
													
					</div>
				
			<?php			
			
			}
			?>
			<tr><td colspan="3">&nbsp;</td></tr>
			<tr>	
				<td>About Us</td>
				<td></td>
				<td><?php  echo ($this->Form->input('about_us', array('div'=>false,'type'=>'textarea', 'label'=>false, "class" => "text-input medium-input")));?>  </td>
			</tr>
			<tr><td colspan="3">&nbsp;</td></tr>
			<tr>	
				<td>Passport Key Line One</td>
				<td></td>
				<td><?php  echo ($this->Form->input('passport_key_one', array('div'=>false,'type'=>'textarea', 'label'=>false, "class" => "text-input medium-input")));?>  </td>
			</tr>
			<tr><td colspan="3">&nbsp;</td></tr>
			<tr>	
				<td>Passport Key Line Two</td>
				<td></td>
				<td><?php  echo ($this->Form->input('passport_key_two', array('div'=>false,'type'=>'textarea', 'label'=>false, "class" => "text-input medium-input")));?>  </td>
			</tr>
			<tr><td colspan="3">&nbsp;</td></tr>
			<tr>	
				<td></td>
				<td></td>
				<td><?php  echo ($this->Form->submit('Submit', array('class' => 'button', "div"=>false)));?></td>
			</tr>
			
		</table>
	<?php echo $this->Form->end();?>	
</div>
<?php
	if (class_exists('JsHelper') && method_exists($this->Js, 'writeBuffer')) 
	echo $this->Js->writeBuffer();
?>	