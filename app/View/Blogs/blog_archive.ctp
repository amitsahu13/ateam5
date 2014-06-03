<?php echo $this->Html->script(array('jquery/confirm','jquery/jquery.simplemodal'));
echo $this->Html->css(array('confirm'));
echo $this->element('Front/ajax_loading_effect');
echo $this->Form->create('Blog',array('url' => array('controller' => 'blogs', 'action' => 'blog_archive'),'type'=>'file'));
?>
<div class="right_container max_width">
	<h2><a href="javascript:void(0);">Archive</a></h2>
	<span class="slct_rwndInPut sort_dropawn dropdwn_H">
		<?php  	
		echo $this->Form->input('category_id',array(
			'div'=>false,
			'label'=>'',
			"class" => "custom_dropdown slct_rwndInPutRi with_sml1",
			'empty'=>'Choose Lable',
			'onchange'=>'label_sorting()'
		));

	?> 
		
	</span>
	<div class="clear"></div>

	<div class="expert_detail_blog" id="update_blog_archive">
		<?php
		echo $this->element('blog/ele_blog_archive');
		?>
	</div>
	<div class="clear"></div>
</div>
<?php
echo $this->Form->end();
?>  
<script type="text/javascript">

	function label_sorting()
	{
		open_box();
		jQuery.ajax({
			type:'POST',
			data:jQuery("#BlogBlogArchiveForm").serialize(),
			aync:true,
			cache:false,
			url: "<?php echo $this->Html->url(array('controller'=>'blogs', 'action'=>'blog_archive'));?>/",
			success: function(response){
				jQuery.modal.close();
				jQuery("#update_blog_archive").html(response);
			}
		});
	}
	jQuery('div.paging_n a').live('click', function() {
	 var url = jQuery(this).attr("href");
	 open_box();
	// jQuery('#image_container_indicator_1').show();
	 jQuery('#update_blog_archive').load(url, function(response, status, xhr) {
	  if (xhr.readyState == 4) {
	  // jQuery('#image_container_indicator_1').hide();
		  jQuery.modal.close();
	  }
	});
   return false;
});

jQuery('.paging_input').bind('keypress', function(event){
    if(event.keyCode == 13)
	{
		
		open_box();
		jQuery.ajax({
        type:'POST',
        data:jQuery("#BlogBlogArchiveForm").serialize(),
        aync:true,
        cache:false,
        url: "<?php echo $this->Html->url(array('controller'=>'blogs', 'action'=>'blog_archive'));?>/",
        success: function(response){
			jQuery.modal.close();
            jQuery("#update_blog_archive").html(response);
			
        }
		});
    }
});
</script> 