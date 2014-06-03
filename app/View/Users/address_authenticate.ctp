<?php
echo $this->element('Front/ele_authenticate_navigation'); 
?>

<div class="product_dscrpBOX" style="width:100%;">
	<h3><span class="round_bgTXT">4</span>Address</h3>
	<?php echo $this->Form->create('User',array('url' => array('controller' => 'users', 'action' => 'address_authenticate'),'type'=>'file'));
			echo $this->Form->hidden('id');
			
	?>
	<div class="compensation_frmDV">
	<label class="padding_left">Please make sure your address details are updated.</label>
	<div class="clear"></div>
<p class="padding_left font_size">A physical mail will be sent to this address with a code that needs to be retyped back here.
You will receive a mail with a link back to here to complete verification when code is received
(Average 3-7 Days). 
</p>
<ul class="RegFrmFild">
	<li>
	<label>Region<span>*</span></label>
	<span class="slct_rwndInPut">
	<?php echo ($this->Form->input('UserDetail.region_id', array('div'=>false, 'label'=>false,'empty'=>'-- Select Region --','options'=>$region,"class" => "slct_rwndInPutRi with_sml1","error" => array("wrap" =>EDITWRAP, "class" => "error-message"))));
					$this->Js->get('#UserDetailRegionId')->event('change',$this->Js->request(array('controller'=>'countries','action'=>'get_county_region'), array('update'=>'#update_country','async' => true,'method' => 'post','dataExpression'=>true,'data'=> $this->Js->serializeForm(array('isForm' => true,'inline' => true)))));
	?> 
	</span>
	</li>
	<li>
	<label>Country<span>*</span></label>
	<span class="slct_rwndInPut" id="update_country">
	<?php if (!empty($countries) && $countries!=''){
								
							echo ($this->Form->input('UserDetail.country_id', array('div'=>false, 'label'=>false, 'options'=>$countries ,"class" => "slct_rwndInPutRi with_sml1","error" => array("wrap" =>EDITWRAP, "class" => "error-message",'empty'=>'-- Select Country --'))));
						}else{  
						
							echo ($this->Form->input('UserDetail.country_id', array('div'=>false, 'label'=>false,  'empty'=>'-- Select Country --',"class" => "slct_rwndInPutRi with_sml1","error" => array("wrap" =>EDITWRAP, "class" => "error-message",'empty'=>'-- Select Country --'))));
						}
						 $this->Js->get('#UserDetailCountryId')->event('change',$this->Js->request(array('controller'=>'states','action'=>'get_state_front'), array('update'=>'#State','async' => true,'method' => 'post', 'dataExpression'=>true, 'data'=> $this->Js->serializeForm(array('isForm' => true,'inline' => true)))));
		?> 
	</span>
	</li>
  <li class="FloatLeFrm">
	<label>State<span>*</span></label>
	 <span class="slct_rwndInPut" id="State">
	<?php if (!empty($states) && $states!=''){
								
		echo ($this->Form->input('UserDetail.state_id', array('div'=>false, 'label'=>false, 'options'=>$states ,"class" => "slct_rwndInPutRi with_sml1","error" => array("wrap" =>EDITWRAP, "class" => "error-message",'empty'=>'-- Select State --'))));
	}else{  
	
		echo ($this->Form->input('UserDetail.state_id', array('div'=>false, 'label'=>false,  'empty'=>'-- Select State --',"class" => "slct_rwndInPutRi with_sml1","error" => array("wrap" =>EDITWRAP, "class" => "error-message",'empty'=>'-- Select State --'))));
	}?>
				
  </span></li>
  <li class="FloatRiFrm">
	<label>City<span>*</span></label>
	 
	<?php echo $this->Form->input('UserDetail.flat_number', array('div'=>false, 'label'=>false, "class" => "TxtFildReg"));?>
  </li>
  
   <li class="FloatLeFrm">
	<label>Street Name<span>*</span></label>
	<?php echo $this->Form->input('UserDetail.street_name', array('div'=>false, 'label'=>false, "class" => "TxtFildReg"));?>
  </li>
  <li class="FloatRiFrm">
	<label>House #<span>*</span></label>
	<?php echo $this->Form->input('UserDetail.house', array('div'=>false, 'label'=>false, "class" => "TxtFildReg"));?>
  </li>
  
  
  <li>
	<label>Flat Number<span>*</span></label>
	<?php echo $this->Form->input('UserDetail.flat_number', array('div'=>false, 'label'=>false, "class" => "TxtFildReg"));?>
  </li>
  <li>
	<label>Postal Code<span>*</span></label>
	<?php echo $this->Form->input('UserDetail.zip', array('div'=>false, 'label'=>false, "class" => "TxtFildReg"));?>
  </li>
  
  <li>
	<p>Please Enter the code sent to you in the mail</p>
	
  </li>
  
  <li>
	<label>Code</label>
	<?php echo $this->Form->input('UserDetail.check_address_verification_code', array('div'=>false, 'label'=>false, "class" => "TxtFildReg"));?>
  </li>
  
<!--  <li>
	<label>&nbsp;</label>
	
  <span>* By pushing, you will trigger a physical mail sending to the address above </span></li>-->
  </ul>

<div class="clear"></div>

	<ul class="RegFrmFild">
  </ul>
   
  <div class="btm_nextbtnDV margin_top"> 
  <span class="Continue4Btn  margin_right" style="float:right;" ><?php
			echo $this->Html->link('Next',array('controller'=>'users','action'=>'passport_authenticate'),array('class'=>'Continue4BtnRi'));
			?></span>
  <span class="Continue4Btn" style="float:right;"><input type="submit" name="" class="Continue4BtnRi col" value="Approve"></span> 
		  
		</div>
	</div>
	 <?php
	 echo $this->Form->end();
	 ?>
</div>
<?php
	if (class_exists('JsHelper') && method_exists($this->Js, 'writeBuffer')) 
	echo $this->Js->writeBuffer();
?>