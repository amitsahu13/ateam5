
<div class="left_sidebar">
  <?php echo $this->element('Front/ele_register_slogan'); ?>
</div>
<div class="right_sidebar">
  <div class="cmpnsn_prgrsDV">
  <?php echo $this->Layout->sessionFlash(); ?>
	<div class="cmpnsn_prgrsnav" style="padding:0 0 3px 0;">
	
	  <!--<h2><a href="#">I Have A Dream</a></h2>-->
	</div>
  </div>
  <div class="product_dscrpBOX" style="width:100%;">
	<h3>Forgot Password</h3>
	<div class="compensation_frmDV">
	  <?php echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'forgot_password')));?>
		
		<ul class="RegFrmFild">
		  <li class="FloatLeFrm">
			<label>Email *</label>
			<?php echo $this->Form->input("User.email", array("type" => "text", "div" => false, "label" => false, 'class'=>'TxtFildReg',"error" => array("wrap" =>EDITWRAP, "class" => "error-message"))); ?>
		  </li>
		  
		  <li>
			<label>&nbsp;</label>
			<span class="Continue4Btn" style="float:right;">
			<input type="submit" name="" class="Continue4BtnRi" value="Submit">
			</span></li>
		</ul>
	  <?php echo $this->Form->end(); ?>
	</div>
  </div>
</div>

