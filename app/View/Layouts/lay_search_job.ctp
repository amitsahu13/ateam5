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
	echo $this->Html->css(array('style','jquery.powertip'));
		
	  ?>
	  <!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	
	<?php	
	  echo $this->Html->script(array(
				'jquery/jquery-1.7.2.min',
				'jquery.powertip',
                'jquery/jquery.alerts',
				'jquery.powertip-1.1.0.min',
				'common_front',
				'is_number_key'
		  ));
	  echo $scripts_for_layout;
	?>
	
	<script type="text/javascript">
		var SiteUrl = "<?php echo Configure::read('App.SiteUrl');?>";
		var SiteName = "<?php echo Configure::read('App.SiteName');?>";		
	</script>
	<script type="text/javascript">
	$(document).ready(function(){
		$(".slidingDiv").hide();
		$(".show_hide").show();
		
		$('.show_hide').click(function(){
		$(".slidingDiv").slideToggle();
		});

	});
	</script>
	<script type="text/javascript">
		jQuery(document).ready(function($){
			$('.jobprogres_step ul li:nth-child(3n)').css("margin", "0px");
		});
	</script>
	<!--[if lte IE 6]><style>
		  img { behavior: url("<?php echo Configure::read('App.SiteUrl');?>/css/iepngfix.htc") }
		</style><![endif]-->
	
</head>
	<body> 
	
	
		<?php echo $this->element("Front/ele_header"); ?>
		<div id="wrapper">
			<div id="container"> 
			
			
				
			
		<!--  Apply Popup  -->
			 						<div class="popup-wrapper "  id='addmember'   > 
										<div class='popup_invite_deffault popup'  > 
									  		   	 		<?=$this->element("apply_job")?>
										</div>
								   	</div>
		 
		<!--  End Apply Popup Here :  -->
		 
		
		
		<script type='text/javascript'>  
		
		jQuery(document).ready(function(){ 
	 
			jQuery(".expert_img ").mouseenter(function(){
				jQuery(this).parent().find(".largeimage").show();
			});
			jQuery(".expert_img ").mouseleave(function(){
				jQuery(this).parent().find(".largeimage").hide();
			}); 
			
			 

			
	//  SetInterval : 
	var objectPosition;	
	$(document).ready(function(){
		if ($('#addmember').length){
			var windowScrollNow = $(window).scrollTop();
			$(window).scroll(function(){
				var windowScrollUpdated = $(window).scrollTop() - windowScrollNow - objectPosition;
				$('#addmember .popup').css('top', '-'+windowScrollUpdated+'px');
			});
		}
	});	
	setInterval(function(){
		$(".applyme").click(function(){
				
						 var id  =  $(this).attr("rel"); 
						
						 	// Flush Data :   
							 $("textarea").val("");  
							 $("input[type='text']").val("");   

						 $("#fileattache").html("");

					 	 $("#addmember").fadeIn();
						 $('.popup-wrapper').fadeIn(function(){
							objectPosition = $('.popup-wrapper').offset().top;
						 }); 
				 		 $("#JobBidJobDetailForm").attr("action", "/jobs/apply_job/"+id);
						 $("input#job_id").val(id);
			
				});
		 },500); 

			
			 		
			 	
			 
			 $(".js-ClosePopup").click(function(){
				 
				 $('.popup-wrapper').click(); 
			 });

		 
				$('.popup-wrapper').bind('click', function(event){
					var container = $(this).find('.popup');
					if (container.has(event.target).length === 0){
						$('.popup-wrapper').fadeOut()
					}
				});
		 
		 
				
				
			
			
			
		});
	
	</script>
	
	
	
	
			
			
					<?php echo $this->element("Front/ele_myaccount_left"); ?>	
				<div class="right_sidebar">
					
					<?php 
					echo $this->Session->flash();
					echo $content_for_layout;
					?>	
					  
					<div class="product_dscrpBOX bg_none" style="width:100%;"></div>
					<div class="clear"></div>	
				</div>
			</div>
		</div>
		<?php echo $this->element("Front/ele_footer"); ?>
		<div class="clear"></div>
	<?php echo $this->element('sql_dump');?>
	</body>
</html>