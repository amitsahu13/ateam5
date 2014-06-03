<?php 
echo $this->Html->script(array('jquery/confirm','jquery/jquery.simplemodal'));
echo $this->Html->css(array('confirm'));
echo $this->element('Front/ajax_loading_effect');

echo $this->Form->create('Blog',array('url' => array('controller' => 'blogs', 'action' => 'listing'),'type'=>'file'));?>
<h2><a href="javascript:void(0);">recent Posts</a> </h2>

<span class="slct_rwndInPut sort_dropawn dropdwn_H top_hd_drpdwn">
<?php  	
		echo $this->Form->input('category_id',array(
			'div'=>false,
			'label'=>'',
			"class" => "custom_dropdown",
			'empty'=>'Choose Lable',
			'onchange'=>'label_sorting()'
		));
?>
</span>

<!--<span class="slct_rwndInPut sort_dropawn dropdwn_H">
	<?php  	
	/* 	echo $this->Form->input('category_id',array(
			'div'=>false,
			'label'=>'',
			"class" => "slct_rwndInPutRi with_sml1 custom_dropdown",
			'empty'=>'Choose Lable',
			'onchange'=>'label_sorting()'
		));
 */
	?> 
</span>-->
<div class="clear"></div>
<div class="jobprogres_step div_mrgin margin_bottom"  id="bloglist">
	<?php echo $this->element("blog/ele_listing"); ?>
</div>
<div class="clear"></div>
<?php
echo $this->Form->end();
?>
<script type="text/javascript">

	function label_sorting()
	{
		open_box();
		jQuery.ajax({
			type:'POST',
			data:jQuery("#BlogListingForm").serialize(),
			aync:true,
			cache:false,
			url: "<?php echo $this->Html->url(array('controller'=>'blogs', 'action'=>'listing'));?>/",
			success: function(response){
				jQuery.modal.close();
				jQuery("#bloglist").html(response);
			}
		});
	}
	jQuery('div.paging_n a').live('click', function() {
	 var url = jQuery(this).attr("href");
	 open_box();
	// jQuery('#image_container_indicator_1').show();
	 jQuery('#bloglist').load(url, function(response, status, xhr) {
	  if (xhr.readyState == 4) {
	  // jQuery('#image_container_indicator_1').hide();
		  jQuery.modal.close();
	  }
	});
   return false;
});

jQuery('.paging_input').live('keypress', function(event){
	
    if(event.keyCode == 13 && !event.shiftKey)
	{ 	
		event.preventDefault();
		open_box();
		jQuery.ajax({
        type:'POST',
        data:jQuery("#BlogListingForm").serialize(),
        aync:true,
        cache:false,
        url: "<?php echo $this->Html->url(array('controller'=>'blogs', 'action'=>'listing'));?>/",
        success: function(response){
			jQuery.modal.close();
            jQuery("#bloglist").html(response);
			
        }
		});
    }
});
</script>


