<?php	echo ($this->Html->script(array('ckeditor/ckeditor')));?>

<div class="content-box"><!-- Start Content Box -->
	
	<div class="content-box-header">
		
		<h3 style="cursor: s-resize;">Edit Faq</h3>
		
		<ul class="content-box-tabs">
			<li>* required fields</li> <!-- href must be unique and match the id of target div -->
			
		</ul>
		
		<div class="clear"></div>
		
	</div> <!-- End .content-box-header -->
	
	<div class="content-box-content">
		
		<div style="display: block;" class="" id="tab2">
			
			<?php
				$this->Layout->sessionFlash();			  
			?>
				
			<?php 
			echo $this->Form->create('Faq', 
				array('url' => array('controller' => 'faqs', 'action' => 'edit'),
			'inputDefaults' => array(
				'error' => array(
					'attributes' => array(
						'wrap' => 'span',
						'class' => 'input-notification error png_bg'
					)
				)
			)
			));?>
				
				<?php echo ($this->element('Admin/Faq/form'));?>
				
				<div class="clear"></div><!-- End .clear -->
				
			<?php
				echo ($this->Form->end());
			?>	
			
		</div> <!-- End #tab2 -->        
		
	</div> <!-- End .content-box-content -->
	
</div> <!-- End .content-box -->