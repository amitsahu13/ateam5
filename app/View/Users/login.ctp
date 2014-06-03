<?php 
if(isset($cookieVar['password']) && $cookieVar['password'] != ''){ 
		$val_p	=	$cookieVar['password']; 
}else{ 
		$val_p=''; 
}
	
if(isset($cookieVar['remember_me']) && $cookieVar['remember_me']!=''){ 
	$this->request->data['User']['remember_me']=$cookieVar['remember_me']; 
} else{ 
	$this->request->data['User']['remember_me']=''; 
}
?>
<div class="left_sidebar">
  <?php echo $this->element('Front/ele_register_slogan'); ?>
</div>
<div class="right_sidebar">
  <div class="cmpnsn_prgrsDV" style="height: 18px;">
  <?php //echo $this->Layout->sessionFlash(); ?>
	<div class="cmpnsn_prgrsnav" style="padding:0 0 3px 0;">
	
	  <!--<h2><a href="#">I Have A Dream</a></h2>-->
	</div>
  </div>
  <div class="product_dscrpBOX" style="width:100%;">
	<h3>Login</h3>
	<div class="compensation_frmDV">
	  <?php echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'login')));?>
		
		<ul class="RegFrmFild">
		  <li class="FloatLeFrm">
			<label>Username *</label>
			<?php echo $this->Form->input("User.username", array("type" => "text", "div" => false, "label" => false, 'class'=>'TxtFildReg',"error" => array("wrap" =>EDITWRAP, "class" => "error-message"))); ?>
		  </li>
		  <li>
			<label>Password *</label>
			<?php echo $this->Form->input("User.password", array("type" => "password", "div" => false, "label" => false, 'class'=>'TxtFildReg',"value"=>$val_p,"error" => array("wrap" =>EDITWRAP, "class" => "error-message")));?>
		  </li>
		  <li>
                <label>&nbsp;</label>
				 <?php  echo ($this->Form->input('remember_me', array('div'=>false,'type'=>'checkbox', 'label'=>false, "class" => "checkbox")));?>
                <span class="LogNav">
				<a href="#">Remember me</a>
				<?php echo $this->Html->link('Forgot Password',array('controller'=>'users','action'=>'forgot_password'),array('div'=>false))?>
				</span>	
			</li>
		  
		  <li>
			<label>&nbsp;</label>
			<span class="Continue4Btn" style="float:right;">
			<input type="submit" name="" class="Continue4BtnRi" value="Login">
			</span></li>
		</ul>
	  <?php echo $this->Form->end(); ?>
	</div>
  </div>
</div>

