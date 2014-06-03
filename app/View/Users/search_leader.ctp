	<?php 
	echo $this->Html->script(array('jquery/confirm','jquery/jquery.simplemodal'));
	echo $this->Html->css(array('confirm'));
	echo $this->element('Front/ajax_loading_effect');
	
	echo $this->Form->create('User',array('controller'=>'users','action'=>'search_leader')); ?>
	<div class="mid_bar">
		<?php echo $this->element("Front/ele_search_leader_left_sidebar"); ?>
	</div> 
	<div class="right_container" id="update_search_leader">
		<?php echo $this->element("Front/ele_search_leader_right_sidebar"); ?>
	</div>   
	<?php echo $this->Form->end();?>
	<div  id="show_query" style="display:none;" >
		<?php
		echo $this->element('Front/ele_add_query');
	?>
	</div>
<script type="text/javascript">
jQuery('.paging_input').live('keypress', function(event){
	
    if(event.keyCode == 13 && !event.shiftKey)
	{ 	
		event.preventDefault();
		open_box();
		jQuery.ajax({
				type:'POST',
				data:jQuery("#UserSearchLeaderForm").serialize(),
				async:true,
				cache:false,
				url: "<?php echo $this->Html->url(array('controller'=>'users', 'action'=>'search_leader'));?>/",
				success: function(response){
					jQuery("#update_search_leader").html(response);
					jQuery.modal.close();
				}
		});
    }
});



jQuery('div.paging_n a').live('click', function() {
	 var url = jQuery(this).attr("href");
	 open_box();
	// jQuery('#image_container_indicator_1').show();
	 jQuery('#update_search_leader').load(url, function(response, status, xhr) {
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