<?php 
echo $this->Html->script(array('jquery/confirm','jquery/jquery.simplemodal'));
echo $this->Html->css(array('confirm'));
echo $this->element('Front/ajax_loading_effect');

echo $this->Form->create('User',array('url' => array('controller' => 'users', 'action' => 'search_expert'),'type'=>'file'));?>
	<div class="mid_bar">
		<?php echo $this->element("Front/ele_search_expert_left_sidebar"); ?>
	</div> 
	<div class="right_container" id="update_search_expert">
		<?php echo $this->element("Front/ele_search_expert_right_sidebar"); ?>
	</div>   
	<div class="product_dscrpBOX bg_none" style="width:100%;"></div>
	<div class="clear"></div>
<?php
echo $this->Form->end();
?>

<script type="text/javascript">
jQuery('.paging_input').live('keypress', function(event){
	
    if(event.keyCode == 13 && !event.shiftKey)
	{ 	
			event.preventDefault();
			open_box();
			jQuery.ajax({
	            type:'POST',
	            data:jQuery("#UserSearchExpertForm").serialize(),
	            aync:true,
	            cache:false,
	            url: "<?php echo $this->Html->url(array('controller'=>'users', 'action'=>'search_expert'));?>/",
	            success: function(response){
	                jQuery("#update_search_expert").html(response);
					jQuery.modal.close();
	            }
			});
        }
	});


jQuery('div.paging_n a').live('click', function() {
	 var url = jQuery(this).attr("href");
	 open_box();
		 //jQuery('#image_container_indicator_1').show();
	 jQuery('#update_search_expert').load(url, function(response, status, xhr) {
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
<div  id="show_query" style="display:none;margin:-200px" >
	<?php
	echo $this->element('Front/ele_add_query');
	?>
</div>	
		 