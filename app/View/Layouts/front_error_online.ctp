<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<?php echo $this->Html->charset(); ?>
	<title><?php echo $title_for_layout;?> | <?php echo Configure::read('Site.title');?></title>
	<?php	
		if(isset($description_for_layout)){
			echo $this->Html->meta('description', $description_for_layout);
		} 
		if(isset($keywords_for_layout)){
			echo $this->Html->meta('keywords', $keywords_for_layout);	
		}	 	 	
		echo $this->Html->meta('icon'); 
		echo $this->Html->css(array(
				'style'
		));
	?>
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	<style>
		.AbtTxtLi img {
			border: none;
			text-align:center;
			
		}
	</style>	
</head>
<?php 
if($this->Session->check('Auth.User.id') && $this->Session->read('Auth.User.role_id')!=1){ 
	$class_body='InUserBG';
} else {
	$class_body='InBG';
} 
?>
<body class="<?php echo $class_body;?>">
	<div id="fb-root"></div>
	<div id='message_pro' class='mas_pro'></div>
	<div class='hiddenDiv'></div>
	<div id="Wraper">
		<?php echo $this->element("front/header_default"); ?>
		 <div id="Middle">
			<div class="AboutMid">
				<h2>404</h2>
				<div class="AbtTxt">
					<div class="AbtTxtLi">
						<?php echo $this->Html->image('404handler.png');?>
						<h3 >The requested URL was not found on this server.</h3>
					</div>
				</div>
			</div>
			<div class="Clear"></div>
		</div>
		<div class="Clear"></div>
		<!--Main Wraper End here-->
	</div>
	<?php echo $this->element("front/footer_default"); ?>
</body>
</html>