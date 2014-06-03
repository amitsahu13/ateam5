<?php 
echo $this->Html->script(array('jquery/confirm','jquery/jquery.simplemodal'));
echo $this->Html->css(array('confirm'));
echo $this->element('Front/ajax_loading_effect');
echo $this->element("Front/ele_myproject_right");
 ?>
<script type="text/javascript">
jQuery('.paging_input').live('keypress', function(event){
	
    if(event.keyCode == 13 && !event.shiftKey)
	{ 	
			event.preventDefault();
			open_box();
			jQuery.ajax({
	            type:'POST',
	            data:jQuery("#ProjectMyProjectForm").serialize(),
	            aync:true,
	            cache:false,
	            url: "<?php echo $this->Html->url(array('controller'=>'projects', 'action'=>'my_project'));?>/",
	            success: function(response){
	                jQuery("#my_project").html(response);
					jQuery.modal.close();
	            }
			});
        }
	});


jQuery('div.paging_n a').live('click', function() {
	 var url = jQuery(this).attr("href");
	 
	 open_box();
		 //jQuery('#image_container_indicator_1').show();
	 jQuery('#my_project').load(url, function(response, status, xhr) {
	  if (xhr.readyState == 4) {
		  //jQuery('#image_container_indicator_1').hide();
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