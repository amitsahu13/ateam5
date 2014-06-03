<?php 
				// echo $this->Html->script(array('jquery/jquery-ui.min'),true);
				?>
				<?php /* 
				echo $this->Html->script(array('multiselect/jquery.multiselect'),true);
				echo $this->Html->css(array('multiselect/jquery.multiselect'),true); */
				if(isset($this->request->data['User']['id'])){
					$user_id = $this->request->data['User']['id'];
				}
				if(isset($this->request->data['UserDetail']['image'])){
					$user_img = $this->request->data['UserDetail']['image'];
				}
				?>
				
				<fieldset class="column-left"> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
					<?php  echo ($this->Form->input('id'));?>
					<?php  echo ($this->Form->input('UserDetail.id'));?>					
					
					<p>
						<?php 
						
						echo ($this->Form->input('role_id', array('type'=>'radio', 'options'=>Configure::read('App.Roles'), 'default'=>4, 'div'=>false,'legend'=>'Role*','class'=>'role_type')));
						
						?>
					</p>
					<p>
						<?php  echo ($this->Form->input('User.first_name', array('div'=>false, 'label'=>'First Name*', "class" => "text-input medium-input")));?> 
						
					</p>
					
					<p>
						<?php  echo ($this->Form->input('User.last_name', array('div'=>false, 'label'=>'Last Name*', "class" => "text-input medium-input")));?> 
						
					</p>
					<p>
					
					<?php 
						
					echo ($this->Form->input('UserDetail.name_visibility', array('div'=>false,'type'=>'radio', 'options'=>Configure::read('App.Name.Visiblity'),'default'=>'1', 'label'=>'Set name visiblity')));?> 
		
					</p>
					<p>
						<?php  echo ($this->Form->input('User.username', array('div'=>false, 'label'=>'Username*', "class" => "text-input medium-input")));?> 
						
					</p>
					<?php if($this->params->params['action'] != 'admin_edit'){ ?>
					<p>
						<?php  echo ($this->Form->input('User.password2', array('div'=>false,'type'=>'password', 'label'=>'Password*', "class" => "text-input medium-input")));?> 
						
					</p>
					
					<p>
						<?php  echo ($this->Form->input('confirm_password', array('div'=>false,'type'=>'password', 'label'=>'Repeat Password*', "class" => "text-input medium-input")));?> 
						
					</p>
					<?php } ?>
					
					<p>
						<?php  echo ($this->Form->input('User.email', array('div'=>false, 'label'=>'Email*', "class" => "text-input medium-input")));?> 
						
					</p>
					
					<p>
					<?php echo ($this->Form->input('UserDetail.image', array('div'=>false,'type'=>'file', 'label'=>'Profile Image*', "class" => "text-input medium-input")));
					if(isset($user_id) && isset($user_img)){ 
						 echo $this->Html->image(str_replace('{user_id}',$user_id,user_edit_image_thumb_path).$user_img);
					}	 
					?>
					</p>
					
					<p>
					<?php  echo ($this->Form->input('UserDetail.image_visibility', array('type'=>'radio', 'options'=>Configure::read('App.Image.Visiblity'),'default'=>'1','div'=>false,'label'=>'Set image visiblity')));?> 
		
					</p>
					
					<!--<p>
						<?php // echo ($this->Form->input('phone_no', array('div'=>false, 'type'=>'text', 'label'=>'Phone no*', "class" => "text-input medium-input", 'maxlength'=>"10")));?> 
					</p>  
					
					<p>
						<p>
						<?php // echo ($this->Form->input('gender', array('type'=>'radio', 'options'=>Configure::read('App.Sex'),'default'=>'m', 'div'=>false,'legend'=>'Gender*')));?>
					</p>
								
					</p>
					<p>
						<?php // echo ($this->Form->input('address', array('div'=>false, 'label'=>'Address*', "class" => "text-input medium-input")));?> 
						
					</p> -->
					<p>
						<?php 
						echo ($this->Form->input('UserDetail.region_id', array('div'=>false, 'label'=>'Region*','empty'=>'-- Select Region --', "class" => "text-input medium-input"))); 
						$this->Js->get('#UserDetailRegionId')->event('change',$this->Js->request(array('controller'=>'countries','action'=>'admin_get_county_user'), array('update'=>'#update_country','async' => true,'method' => 'post','dataExpression'=>true,'data'=> $this->Js->serializeForm(array('isForm' => true,'inline' => true)))));?>
					</p>
					<div id="update_country">
					<p>
						<?php if (!empty($countries) && $countries!=''){
									//pr($countries);die();
									echo ($this->Form->input('UserDetail.country_id', array('div'=>false, 'label'=>'Country*','options'=>$countries ,'empty'=>'-- Select Country --', "class" => "text-input medium-input")));
								
						      }
							  else{
									echo ($this->Form->input('UserDetail.country_id', array('div'=>false, 'label'=>'Country*', 'empty'=>'-- Select Country --', "class" => "text-input medium-input")));
								}
						 $this->Js->get('#UserDetailCountryId')->event('change',$this->Js->request(array('controller'=>'states','action'=>'admin_getStateList'), array('update'=>'#State','async' => true,'method' => 'post', 'dataExpression'=>true, 'data'=> $this->Js->serializeForm(array('isForm' => true,'inline' => true)))));
						?> 
					</p>
					<p id="State">
						<?php if (isset($states) && $states!=''){
							echo ($this->Form->input('UserDetail.state_id', array('div'=>false, 'label'=>'State*', 'options'=>$states, "class" => "text-input medium-input", 'empty'=>'-- Select State --')));
						}else{  
							echo ($this->Form->input('UserDetail.state_id', array('div'=>false, 'label'=>'State*',  'empty'=>'-- Select State --', "class" => "text-input medium-input", 'empty'=>'-- Select State --')));
						}?> 
					</p>
					</div>

					<p>
						<?php  echo ($this->Form->input('UserDetail.city', array('div'=>false, 'label'=>'City*', "class" => "text-input medium-input")));?> 
					</p>
					<p>
						<?php  echo ($this->Form->input('UserDetail.street_name', array('div'=>false, 'label'=>'Street Name*', "class" => "text-input medium-input")));?> 
					</p><p>
						<?php  echo ($this->Form->input('UserDetail.house', array('div'=>false, 'label'=>'House #*', "class" => "text-input medium-input")));?> 
					</p><p>
						<?php  echo ($this->Form->input('UserDetail.flat_number', array('div'=>false, 'label'=>'Flat Number*', "class" => "text-input medium-input")));?> 
					</p>
					<?php // pr($user); ?>
					
					<p>
						<?php  echo ($this->Form->input('UserDetail.zip', array('div'=>false, 'label'=>'Zip/Postal code*', "class" => "text-input medium-input", 'maxlength'=>"9", )));?> 
						<br><small>Length: 3 to 9 alpha numeric characters</small>
					</p>
					<p class="provider_account_type">
					
						<?php  echo ($this->Form->input('WorkingStatus.WorkingStatus', array('div'=>false, 'label'=>'Working Status','multiple'=>true, 'options'=>$working_status, "class" => "text-input medium-input provider_account_type_status")));
						?>
					</p>
					<p class="provider_account_type">
					
						<?php  echo ($this->Form->input('UserDetail.account_type', array('div'=>false, 'label'=>'Account type', 'options'=>Configure::read('App.Provider.Account.Type'), "class" => "text-input medium-input provider_account_type_status")));
						?>
					</p>
					<p class="provider_account_type account_type">
						<?php  echo ($this->Form->input('UserDetail.display_name', array('div'=>false, 'label'=>'Display Name', "class" => "text-input medium-input provider_account_type_status")));?> 
						
					</p>
					
					<p class="leadership">
						<?php  echo ($this->Form->input('UserDetail.leadership_category_id', array('div'=>false, 'label'=>'Leadership Category*', "class" => "text-input medium-input buyer_account_type_status ",'empty'=>'-- Leadership Category --','options'=>$leader_categories)));
						
						?> 
					</p>
					<p class="expertise">
						<?php  echo ($this->Form->input('UserDetail.expertise_category_id', array('div'=>false, 'label'=>'Expertise Category*','options'=>$expert_categories,'empty'=>'-- Expertise Category --', "class" => "text-input medium-input provider_account_type_status")));?> 
					</p>
					
					
					
					<p>
						<?php  echo ($this->Form->input('UserDetail.about_us', array('div'=>false,'type'=>'textarea', 'label'=>'About us', "class" => "text-input medium-input")));?> 
						
					</p>
					<p>
						<?php  echo ($this->Form->input('UserDetail.resume_text', array('div'=>false,'type'=>'textarea', 'label'=>'C.V.', "class" => "text-input medium-input")));?> 
						
					</p>
					<p>
						
						<?php echo ($this->Form->input('UserDetail.resume_doc', array('div'=>false,'type'=>'file', 'label'=>'Upload C.V*', "class" => "text-input medium-input")));?> 
						
					</p>
					<p>
						<?php  echo ($this->Form->input('UserDetail.linkdin_url', array('div'=>false, 'label'=>'Linked-in Link', "class" => "text-input medium-input")));?> 
						
					</p>
					
					<p>
						<?php  echo ($this->Form->input('UserDetail.facebook_url', array('div'=>false, 'label'=>'Facebook Link', "class" => "text-input medium-input")));?> 
						
					</p>
					
					
				<!--	<p>
						<?php // echo ($this->Form->input('passport_key_one', array('div'=>false,'type'=>'textarea', 'label'=>'Passport Key Line One', "class" => "text-input medium-input")));
						?> 
						
					</p>
					<p>
						<?php // echo ($this->Form->input('passport_key_two', array('div'=>false,'type'=>'textarea', 'label'=>'Passport Key Line Two', "class" => "text-input medium-input")));
						?> 
						
					</p>
					
					
					<p class="provider_account_type">
					<?php // echo ($this->Form->input('UserDetail.service_providing', array('div'=>false,'class'=>'account_type','type'=>'checkbox','value'=>1, 'label'=>'Are you providing the service?')));?> 
		
					</p> -->
					
					<p>		
						<?php  echo ($this->Form->input('User.status', array('type'=>'select', 'options'=>array('0'=>'Inactive', '1'=>'Active'), 'default'=>2, "class" => "text-input medium-input", 'div'=>false)));?>		
					</p>
					<p>
						<?php  echo ($this->Form->submit('Submit', array('class' => 'button', "div"=>false)));
						
							echo $this->Html->link("Cancel", array('admin'=>true, 'controller'=>'users', 'action'=>'index','both'), array("class"=>"button", "escape"=>false,'style'=>'margin-left:4px'));
						
						
						?>
						
					</p>

				</fieldset>
				
				<div class="clear"></div><!-- End .clear -->