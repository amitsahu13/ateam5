<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
<?php echo $title_for_layout;?> | <?php echo Configure::read('Site.title');?>
</title>
<?php

	if(isset($description_for_layout)){
		echo $this->Html->meta('description', $description_for_layout);
	} 
	if(isset($keywords_for_layout)){
		echo $this->Html->meta('keywords', $keywords_for_layout);	
	}
	if(isset($profile_image_layout)){
		echo '<meta property="og:image" content="'.$profile_image_layout.'"/>'; 
	}	 	 
	echo $this->Html->meta('icon'); 
	echo $this->Html->css(array('style'));
		
	?>
	  <!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	
	<?php
	 echo $this->Html->script(array(	  
				'jquery/jquery-1.7.2.min',				
				'jquery.powertip',
				'jquery.powertip-1.1.0.min',
			)); 
	  echo $scripts_for_layout;
	?>	
	<script type="text/javascript">
		var SiteUrl = "<?php echo Configure::read('App.SiteUrl');?>";
		var SiteName ="<?php echo Configure::read('App.SiteName');?>";		
	</script>
	<script>
	   $(".cntntBox_dv ul li:last-child").addClass("last");   
	</script>
	<!--[if lte IE 6]><style>
		  img { behavior: url("<?php echo Configure::read('App.SiteUrl');?>/css/iepngfix.htc") }
		</style><![endif]-->
	<script>
	$(function(){ 
		$('.msg_close').click(function(){
			$( ".notification" ).remove();
		});
	});
	</script>
</head>
	<body>
		<?php echo $this->element("Front/ele_header"); ?>
		<div id="wrapper">			
			<div id="container">
					<?php echo $this->element("Front/ele_page_left"); ?>			
			 	<div class="right_sidebar">
					<?php echo $content_for_layout; ?>
				</div>
			</div>
		<div class="Clear"></div>
		<!--Main Wraper End here-->
		</div>
			<?php echo $this->element("Front/ele_footer"); ?>
			<div class="clear"></div>
	<?php echo $this->element('sql_dump');?>
	</body>
</html>