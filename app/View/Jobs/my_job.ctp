	<?php echo $this->Html->script(array('jquery/confirm','jquery/jquery.simplemodal'));
	echo $this->Html->css(array('confirm'));
	echo $this->element('Front/ajax_loading_effect');?>
	<div class="right_container max_width">
	<?php echo $this->Form->create('Job',array('controller'=>'jobs','action'=>'my_job')); ?>
		 
		
		 
		<div class="clear"></div> 
		
		<!--  My Jobs   --> 
		
			<div id="my_job_update">
			<?php echo $this->element('Front/ele_my_job');?>
			</div> 
			
		<!--  End My Hobs   Stack here :   -->	
			
	</div> 
<?php echo $this->Form->end();?>	
	<div class="product_dscrpBOX bg_none" style="width:100%;"></div>
	<div class="clear"></div>
<script type="text/javascript">
 jQuery('.paging_input').live('keypress', function(event){
	
    if(event.keyCode == 13 && !event.shiftKey)
	{ 	
		event.preventDefault();
		open_box();
		jQuery.ajax({
			type:'POST',
			data:jQuery("#JobMyJobForm").serialize(),
			//aync:true,
			cache:false,
			url: "<?php echo $this->Html->url(array('controller'=>'jobs', 'action'=>'my_job'));?>/",
			success: function(response){
				jQuery("#my_job_update").html(response);
				jQuery.modal.close();
			}
		});
    }
}); 

jQuery('div.paging_n a').live('click', function() {
	 var url = jQuery(this).attr("href");	 
	 open_box();
	// jQuery('#image_container_indicator_1').show();
	 jQuery('#my_job_update').load(url, function(response, status, xhr) {
	  if (xhr.readyState == 4) {
	  // jQuery('#image_container_indicator_1').hide();
		  jQuery.modal.close();
	  }
	});
   return false;
});



</script>
<?php
	if (class_exists('JsHelper') && method_exists($this->Js, 'writeBuffer')) 
	echo $this->Js->writeBuffer();
?>