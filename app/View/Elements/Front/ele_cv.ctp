<div class="popup_wrapper" style="width:476px;">
		<div class="overlay"></div>
		<div class="boxpopup box"  style="width:476px;">
			<a onclick="closeOffersDialog('resume');" class="boxclose"></a>
			<div style="width:476px;">
			<?php echo $this->Form->create('UserDetail');?>
			<div class="PoupWrp">
			  <div class="PoupIn">
				<h2>Edit C.V</h2>
				<div class="PoupInFrm">
					<ul class="PoupAddFrm">
						<li>
						  <label>&nbsp;</label>
						 
						 <?php echo $this->Form->input('resume_text', array('div'=>false,'type'=>'textarea','label'=>false, "class" => "CVTxtFild"));?>
						</li>
						<li>
							  <label>&nbsp;</label>
							  <span class="Continue4Btn" style="float:right; margin:0 26px 0 0;">
							 <?php echo $this->Js->submit('Submit', array(
														 'update' => '#show_resume',
														 'div' => false,														 'url'=>array('action'=>'add_resume_text'),
														 'class'=>'Continue4BtnRi'
													));
								?>					
							  </span>
						</li>
					</ul>
				</div>	
				<div class="clear"></div>
			  </div>
			  <div class="clear"></div>
			</div>				
				<?php
					echo $this->Form->end();
				?>
			</div>
			<div class="Clear"></div>
		</div>
		<div class="Clear"></div>
	</div>
<?php
	if (class_exists('JsHelper') && method_exists($this->Js, 'writeBuffer')) 
	echo $this->Js->writeBuffer();
?>	