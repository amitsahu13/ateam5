<?php
echo $this->element('Front/ele_authenticate_navigation'); 
?>
<div class="product_dscrpBOX" style="width:100%;">
	<h3><span class="round_bgTXT">5</span>Passport</h3>
	<?php echo $this->Form->create('User',array('url' => array('controller' => 'users', 'action' => 'passport_authenticate'),'type'=>'file'));
	echo $this->Form->hidden('id');		

	?>
	<div class="compensation_frmDV">
		<label class="padding_left">Please enter the two lines from your passport MRZ (Machine Readable Zone)</label>
		<div class="clear"></div>
		<label class="padding_left">The MRZ is located in the identification page and the code starts with the letter P.</label>
		<div class="clear"></div>
		<p class="padding_left font_size padding_top">Note :<br /> 
		Although we deploy highest level of data encryption and security flow, we take extra care when dealing with your passport information. Therefore, Passport data will be uploaded to the secured Adobe Echosign server which complies with regulations for keeping personal information and will be removed immediately from AT4AD server.
		</p>
		<ul class="RegFrmFild">
			<li><div class="sample_img"><?php echo $this->Html->image('sample_img.png'); ?></div></li>  


			<li>
			<label class="padding_left widTH">First Line of passport MRZ code<span>*</span></label>
			<div class="clear"></div>
			<div class="padding_left"><span class="TXT_rwndInPut">
			<?php echo $this->Form->input('UserDetail.passport_key_one', array('type'=>'text','div'=>false, 'label'=>false, "class" => "TXT_rwndInPutRi pssport_txt_widt"));?>
			
			</span></div>
			</li>

			<li>
			<label class="padding_left widTH">Second Line of passport MRZ code<span>*</span></label>
			<div class="clear"></div>
			<div class="padding_left"><span class="TXT_rwndInPut">
			<?php echo $this->Form->input('UserDetail.passport_key_two', array('type'=>'text','div'=>false, 'label'=>false, "class" => "TXT_rwndInPutRi pssport_txt_widt"));?>
			</span></div>
			</li>
		</ul>
		<div class="clear"></div>
		<div class="btm_nextbtnDV"> 
		<span class="Continue4Btn  margin_right" style="float:right;" ><?php
			if($this->Session->read('Auth.User.role_id') == Configure::read('App.Role.Buyer'))
			{
				$redirect = array('controller'=>'projects','action'=>'my_project');
			}
			if($this->Session->read('Auth.User.role_id') == Configure::read('App.Role.Provider'))
			{
				$redirect = array('controller'=>'jobs','action'=>'my_job');
			}
			if($this->Session->read('Auth.User.role_id') == Configure::read('App.Role.Both'))
			{
				$redirect = array('controller'=>'projects','action'=>'my_project');
			}
			echo $this->Html->link('Next',$redirect,array('class'=>'Continue4BtnRi'));
			?>
		</span>
		<span class="Continue4Btn" style="float:right;"><input type="submit" name="" class="Continue4BtnRi col" value="Approve"></span> 

		</div>

		<span class="padding_left">* Note : Result will be updated within  2 business days (in average)</span>

	</div>
	<?php
	echo $this->Form->end();
	?>
</div>