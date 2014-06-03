<div class="content-box"><!-- Start Content Box -->
	
	<div class="content-box-header">
		
		<h3 style="cursor: s-resize;">Edit State</h3>
		
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
	  echo $this->Form->create('State', array('url' => array('controller' => 'states', 'action' => 'edit')));
	  echo $this->Form->input('id');
	  echo $this->Form->hidden('token_key', array('value' => $this->params['_Token']['key']));
	 ?>     
	 <div class="tablewapper2 AdminForm">	
			
		<?php echo $this->element('admin/state/form');?>
      </div>
     
		<?php
		   echo($this->Form->end());
		?>	
		</div> <!-- End #tab2 -->        
		
	</div> <!-- End .content-box-content -->
	
</div> <!-- End .content-box -->