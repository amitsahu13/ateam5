<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<?php 
/* echo $this->Html->css(array('slider/coda-slider'));
echo $this->Html->script(array('jquery/slider/jquery-1.7.2.min','jquery/slider/jquery-ui-1.8.20.custom.min','jquery/slider/jquery.coda-slider-3.0.min')); */
echo $this->Html->css(array('slider/bjqs','slider/demo'));
echo $this->Html->script(array('jquery/slider/bjqs-1.3.min'));
?>
 
<?php /* <script type="text/javascript">
		$(function(){ 
 

			  $('#slider-id').codaSlider({
				autoSlide:true,
				autoHeight:false, 
				onComplete:function(){alert(23)},
			  });




		});
</script> */?>
<?php /* <div class="slider" id="slider3">	
	<div class="coda-slider"  id="slider-id">
	<?php $i=0;	
	foreach($imageArray as $value)
	{
		$i++;
		switch($value['Slider']['id'])
		{
			case 6:
				$style= 'style="color:#FFF000"';
				$color= "#FFF000 !important";
				break;
				
			case 7:
				$style= 'style="color:#F60D53"';
				$color= "#F60D53 !important";
				break;
				
			case 8:
				$style= 'style="color:#00B6CD"';
				$color= "#00B6CD !important";
				break;
				
			default:
				$style= 'style="color#000000"';
				break;
		}
	?>
      <div>
		<div class="inner">
			<h1 <?php echo $style; ?>><?php echo $value['Slider']['title'];?></h1>
			<h3><?php echo $value['Slider']['description'];?></h3>
			<h1><a href="#">post a dream </a></h1>
		</div>
		<h2 class="title" style="display:none;"><?php echo $i; ?></h2>
		<?php echo $this->Html->image(SLIDER_SHOW_PATH.$value['Slider']['image'],array('title'=>'A Team 4 a Dream','alt'=>'image'.' '.$i.''));?>
      </div>
     <?php
	}
	 ?>
    </div>
</div>	*/?>
<?php /* <div id="container">	
	<div id="banner-fade">
		<ul class="bjqs">
			<?php $i=0;	
			foreach($imageArray as $value)
			{
				$i++;		
			?>
				<li>
				<?php echo $this->Html->image(SLIDER_SHOW_PATH.$value['Slider']['image'],array('title'=>'A Team 4 a Dream','alt'=>'image'.' '.$i.''));?>
			  
			  </li>
			 <?php
			}
			 ?>
		</ul>
    </div>
	<script class="secret-source">
        jQuery(document).ready(function($) {
 
          $('#banner-fade').bjqs({
            // width and height need to be provided to enforce consistency
			// if responsive is set to true, these values act as maximum dimensions
			width : 700,
			height : 300,

			// animation values
			animtype : 'fade', // accepts 'fade' or 'slide'
			animduration : 450, // how fast the animation are
			animspeed : 4000, // the delay between each slide
			automatic : true, // automatic

			// control and marker configuration
			showcontrols : false, // show next and prev controls
			centercontrols : true, // center controls verically
			nexttext : 'Next', // Text for 'next' button (can use HTML)
			prevtext : 'Prev', // Text for 'previous' button (can use HTML)
			showmarkers : true, // Show individual slide markers
			centermarkers : true, // Center markers horizontally

			// interaction values
			keyboardnav : true, // enable keyboard navigation
			hoverpause : true, // pause the slider on hover

			// presentational options
			usecaptions : false, // show captions for images using the image title tag
			randomstart : true, // start slider at random slide
			responsive : true // enable responsive capabilities (beta)
          });

        });
      </script>
</div> */?>
<div id="container">
      <!--  Outer wrapper for presentation only, this can be anything you like -->
      <div id="banner-fade">
        <!-- start Basic Jquery Slider -->
        <ul class="bjqs">
		<?php $i=0;	
			foreach($imageArray as $value)
			{
				$i++;
			switch($value['Slider']['id'])
			{
				case 6:
					$style= 'style="color:#FFF000"';
					$color= "#FFF000 !important";
					break;
					
				case 7:
					$style= 'style="color:#F60D53"';
					$color= "#F60D53 !important";
					break;
					
				case 8:
					$style= 'style="color:#00B6CD"';
					$color= "#00B6CD !important";
					break;
					
				default:
					$style= 'style="color#000000"';
					break;
			}
			?>
			

			<li>
			<div class="inner">
			<h1 <?php echo $style; ?>><?php echo $value['Slider']['title'];?></h1>
			<h3><?php echo $value['Slider']['description'];?></h3>
			<h1><a href="#">post a dream </a></h1>
		</div>
			
			<?php echo $this->Html->image(SLIDER_SHOW_PATH.$value['Slider']['image'],array('title'=>'A Team 4 a Dream','alt'=>'image'.' '.$i.''));?>
			dffgdfgfd
			</li>
         
		   <?php
			}
			 ?>
        </ul>
        <!-- end Basic jQuery Slider -->

      </div>
      <!-- End outer wrapper -->

      <script class="secret-source">
      var p =  "";    
      
        jQuery(document).ready(function($) {
 	 
        	
        	// setInterval  
        	
        	setInterval(function(){
        		var el  = jQuery(".bjqs-markers li.active-marker a").text();  
        	 
        		if (el != p){
        			p = el ;  
        			jQuery(".nav li a").removeAttr("style");
        	 
        			if (p=="1")
        				jQuery("a#header_dream").css("color","#00B6CD");
        			if (p=="2")
        				jQuery("a#join_team").css("color","#F60D53");
        		 	if (p=="3")
        				jQuery("a#how_it_work").css("color","#FFF000");
        			
        			
        			 
        		}
        	},500);
        	
        	
        	
          $('#banner-fade').bjqs({
            // width and height need to be provided to enforce consistency
			// if responsive is set to true, these values act as maximum dimensions
			width :963,
			height :594,

			// animation values
			animtype : 'fade', // accepts 'fade' or 'slide'
			animduration : 450, // how fast the animation are
			animspeed : 4000, // the delay between each slide
			automatic : true, // automatic

			// control and marker configuration
			showcontrols : false, // show next and prev controls
			centercontrols : true, // center controls verically
			nexttext : 'Next', // Text for 'next' button (can use HTML)
			prevtext : 'Prev', // Text for 'previous' button (can use HTML)
			showmarkers : true, // Show individual slide markers
			centermarkers : true, // Center markers horizontally

			// interaction values
			keyboardnav : true, // enable keyboard navigation
			hoverpause : true, // pause the slider on hover

			// presentational options
			usecaptions : false, // show captions for images using the image title tag
			randomstart : true, // start slider at random slide
			responsive : true // enable responsive capabilities (beta)
          });

        });
      </script>
    </div>  