<div class="right_sidebar">
<?php echo $this->Layout->sessionFlash(); ?>
<div style="height:20px;">
	<!--
	<div class="cmpnsn_prgrsnav">
		<ul>
			<li><a href="#" class="blue"><span class="blue">1</span> General</a></li>
			<li><a href="#"><span>2</span> Timeline</a></li>
			<li><a href="#"><span>3</span> Compensation</a></li>
		</ul>
	</div>
	<div class="prgrsnav_fill">
		<img src="images/75.jpg" title="75%" alt="" />
	</div>
	-->
</div>
<div class="product_dscrpBOX" style="width:100%;">
	<!--<h3><span class="round_bgTXT">1</span>General</h3>-->
	<h3>Edit Profile<?php echo $this->request->data['User']['first_name'];?></h3>
	<?php echo $this->Form->create('User',array('url' => array('controller' => 'users', 'action' => 'edit_profile'),'type'=>'file'));
			echo $this->Form->hidden('id');		
			echo $this->Form->hidden('image_hidden',array('value'=>$this->request->data['User']['image']));		
	?>
		<div class="compensation_frmDV">
			<div class="compensation_frmrow">
				<div class="compensation_frmrow_L">
					<p><label>First Name<span>*</span></label></p>
				</div>
				<div class="compensation_frmrow_R">
					<p>
					<span class="TXT_rwndInPut">
						<?php echo $this->Form->input('first_name', array('div'=>false, 'label'=>false, "class" => "TXT_rwndInPutRi with_Lrg"));?>
					</span>
					</p>
				</div>
			</div>
			<div class="compensation_frmrow">
				<div class="compensation_frmrow_L">
					<p><label>Last Name<span>*</span></label></p>
				</div>
				<div class="compensation_frmrow_R">
					<p>
					<span class="TXT_rwndInPut">
						<?php echo $this->Form->input('last_name', array('div'=>false, 'label'=>false, "class" => "TXT_rwndInPutRi with_Lrg"));?>
					</span>
					</p>
				</div>
			</div>
			<div class="compensation_frmrow">
				<div class="compensation_frmrow_L">
					<p><label>UserName<span></span></label></p>
				</div>
				<div class="compensation_frmrow_R">
					<p>
					<span class="TXT_rwndInPut">
						<?php echo $this->Form->input('username', array('div'=>false, 'label'=>false, "class" => "TXT_rwndInPutRi with_Lrg","readonly"=>true));?>
					</span>
					</p>
				</div>
			</div>
			<div class="compensation_frmrow">
				<div class="compensation_frmrow_R" style="margin-bottom:15px;">
					<?php  echo ($this->Form->input('name_visibility', array('div'=>false,'type'=>'checkbox','value'=>1, 'label'=>false,'checked','class'=>'chckBX','style'=>'float:left')));?><span class="chkbx">Set Name Visiblity</span>
				</div>
            </div>
			<div class="compensation_frmrow">
				<div class="compensation_frmrow_L">
					<p><label>Gender<span></span></label></p>
				</div>
				<div class="compensation_frmrow_R">
					<p>
					<span>
						<?php  echo ($this->Form->input('gender', array('type'=>'radio', 'options'=>Configure::read('App.Sex'),'default'=>'m', 'div'=>false,'legend'=>false,'label'=>false,'style'=>'width:40px;float:none;margin-top:8px;')));?>
					</span>
					</p>
				</div>
			</div>
			<div class="compensation_frmrow">
				<div class="compensation_frmrow_L">
					<p><label>Profile Picture</label></p>
				</div>
				<div class="compensation_frmrow_R">
				<p><!--<input name="" type="button" class="upload_btn" value="Upload Picture" /><br />-->
				<?php 
				echo $this->General->show_user_img($this->request->data['User']['id'],$this->request->data['User']['image'],'SMALL',$this->request->data['User']['first_name']);				
				?>
				</p>
				</div>
			</div>
			<div class="compensation_frmrow">
				<div class="compensation_frmrow_R" style="margin-bottom:15px;">
					<?php  echo ($this->Form->input('image_visibility', array('div'=>false,'type'=>'checkbox','value'=>1, 'label'=>false,'checked','class'=>'chckBX','style'=>'float:left')));?><span class="chkbx">Set Image Visiblity</span>
				</div>
            </div>
			<div class="compensation_frmrow">
				<div class="compensation_frmrow_L">
					<p><label>Upload Picture</label></p>
				</div>
				<div class="compensation_frmrow_R">
				<p><?php echo $this->Form->input('image', array('div'=>false,'type'=>'file' ,'label'=>false));?></p>
				<div class="clear"></div>
				</div>
            </div>
			<div class="compensation_frmrow">
				<div class="compensation_frmrow_L">
					<p><label>Phone no<span></span></label></p>
				</div>
				<div class="compensation_frmrow_R">
					<p>
					<span class="TXT_rwndInPut">
						<?php  echo ($this->Form->input('phone_no', array('div'=>false, 'type'=>'text', 'label'=>false, "class" => "TXT_rwndInPutRi with_Lrg", 'maxlength'=>"10")));?>
					</span>
					</p>
				</div>
			</div>
			
			<div class="compensation_frmrow">
				<div class="compensation_frmrow_L">
					<p><label>Address</label></p>
				</div>
				<div class="compensation_frmrow_R" style="padding-bottom:10px;">
					<p><span class="rwndInPut_TXTaria">
					<!--<textarea class="TXTaria_rwndInPutRi" name="" cols="" rows="" style="width:338px;"></textarea>-->
					<?php  echo ($this->Form->input('address', array('div'=>false, 'label'=>false, "class" => "TXTaria_rwndInPutRi","style"=>"width:338px;")));?>
					
					</span></p>
				</div>
			</div>
			<div class="compensation_frmrow">
				<div class="compensation_frmrow_L">
					<p><label>Region<span></span></label></p>
				</div>
				<div class="compensation_frmrow_R">
					<p><span class="slct_rwndInPut">
					<!--<select class="slct_rwndInPutRi with_sml1" >
					  <option>Public View</option>
					</select>-->
					<?php 
						echo ($this->Form->input('region_id', array('div'=>false, 'label'=>false,'empty'=>'-- Select Region --', "class" => "slct_rwndInPutRi with_sml1"))); 
						$this->Js->get('#UserRegionId')->event('change',$this->Js->request(array('controller'=>'countries','action'=>'get_county_region'), array('update'=>'#update_country','async' => true,'method' => 'post','dataExpression'=>true,'data'=> $this->Js->serializeForm(array('isForm' => true,'inline' => true)))));?>
					</span>
					</p>
				</div>
			</div>
			<div class="compensation_frmrow">
				<div class="compensation_frmrow_L">
					<p><label>Country<span></span></label></p>
				</div>
				<div class="compensation_frmrow_R">
					<p><span class="slct_rwndInPut" id="update_country">
					<!--<select class="slct_rwndInPutRi with_sml1" >
					  <option>Public View</option>
					</select>-->
						<?php  echo ($this->Form->input('country_id', array('div'=>false, 'label'=>false, 'empty'=>'-- Select Country --', "class" => "slct_rwndInPutRi with_sml1")));
						 $this->Js->get('#UserCountryId')->event('change',$this->Js->request(array('controller'=>'states','action'=>'get_state_front'), array('update'=>'#State','async' => true,'method' => 'post', 'dataExpression'=>true, 'data'=> $this->Js->serializeForm(array('isForm' => true,'inline' => true)))));
						?>
					</span>
					</p>
				</div>
			</div>
			<div class="compensation_frmrow">
				<div class="compensation_frmrow_L">
					<p><label>State<span></span></label></p>
				</div>
				<div class="compensation_frmrow_R">
					<p><span class="slct_rwndInPut" id="State">
					<!--<select class="slct_rwndInPutRi with_sml1" >
					  <option>Public View</option>
					</select>-->
						<?php if (!empty($states) && $states!=''){
							echo ($this->Form->input('state_id', array('div'=>false, 'label'=>false, 'options'=>$states, "class" => "slct_rwndInPutRi with_sml1", 'empty'=>'-- Select State --')));
						}else{  
							echo ($this->Form->input('state_id', array('div'=>false, 'label'=>false,  'empty'=>'-- Select State --', "class" => "text-input medium-input", 'empty'=>'-- Select State --')));
						}?>
					</span>
					</p>
				</div>
			</div>
			<div class="compensation_frmrow">
				<div class="compensation_frmrow_L">
					<p><label>City<span></span></label></p>
				</div>
				<div class="compensation_frmrow_R">
					<p>
					<span class="TXT_rwndInPut">
						<?php  echo ($this->Form->input('city', array('div'=>false, 'type'=>'text', 'label'=>false, "class" => "TXT_rwndInPutRi with_Lrg", 'maxlength'=>"10")));?>
					</span>
					</p>
				</div>
			</div>
			<div class="compensation_frmrow">
				<div class="compensation_frmrow_L">
					<p><label>Zip/Postal Code<span></span></label></p>
				</div>
				<div class="compensation_frmrow_R">
					<p>
					<span class="TXT_rwndInPut">
						<?php  echo ($this->Form->input('zip', array('div'=>false, 'type'=>'text', 'label'=>false, "class" => "TXT_rwndInPutRi with_Lrg", 'maxlength'=>"10")));?>
					</span>
					</p>
				</div>
			</div>
			
			<?php
			if($role_id != Configure::read('App.Role.Buyer'))
			{
			?>
			<div class="compensation_frmrow">
				<div class="compensation_frmrow_L">
					<p><label>Category<span></span></label></p>
				</div>
				<div class="compensation_frmrow_R">
					<p><span class="slct_rwndInPut">
					<!--<select class="slct_rwndInPutRi with_sml1" >
					  <option>Public View</option>
					</select>-->
					<?php	echo $this->Form->input('User.category_id', array('div'=>false, 'label'=>false, "class" => "slct_rwndInPutRi with_sml1",'empty'=>'-- Select Category --'));
						 $this->Js->get('#UserCategoryId')->event('change',$this->Js->request(array('controller'=>'categories','action'=>'get_skill_and_subcate_front'), array('update'=>'#sub_cat_skills','async' => true,'method' => 'post','dataExpression'=>true,'data'=> $this->Js->serializeForm(array('isForm' => true,'inline' => true)))));
					?> 
					</span>
					</p>
				</div>
			</div>
			
			<div class="all_skills">
			
			<div id="sub_cat_skills">
				<div class="compensation_frmrow">
					<div class="compensation_frmrow_L">
						<p><label>SubCategory<span></span></label></p>
					</div>
					<div class="compensation_frmrow_R">
						<p><span class="slct_rwndInPut">
						<!--<select class="slct_rwndInPutRi with_sml1" >
						  <option>Public View</option>
						</select>-->
						<?php  echo ($this->Form->input('User.sub_category_id', array('div'=>false, 'label'=>false,'options'=>$sub_categories,'empty'=>'-- Select SubCategory First --', "class" => "slct_rwndInPutRi with_sml1")));?> 
						</span>
						</p>
					</div>
				</div>
				<div class="compensation_frmrow">
					<div class="compensation_frmrow_L">
						<p><label>Required Skills</label></p>
					</div>
					<div class="compensation_frmrow_R">
					<div>
						<span class="rwndInPut_TXTaria">
						<?php  echo ($this->Form->input('Skill.Skill', array('div'=>false, 'label'=>false,'options'=>$skills,'empty'=>'-- Select Skills First --', "class" => "TXTaria_rwndInPutRi",'multiple'=>true)));?> 
						</span>
					</div>
					<div class="clear"></div>
						
				
					</div>
				</div>
			</div>
			
			<?php echo $this->element("Front/ele_edit_profile_skill"); ?>
			</div>
			
			<?php
				
			}
			?>
			<div class="btm_nextbtnDV"> 
				<!--
				<span class="Continue4Btn" style="float:right;" >
				<input type="button" name="" class="Continue4BtnRi" value="Next">
				
				</span>
				-->
				<span style="float:right;" class="Continue4Btn">
				<input type="submit" value="Submit" class="Continue4BtnRi" name="">
				
				</span>
			</div>
				
		</div>
	<?php echo $this->Form->end();?>
	 
	</div>
</div>
<?php
	if (class_exists('JsHelper') && method_exists($this->Js, 'writeBuffer')) 
	echo $this->Js->writeBuffer();
?>	