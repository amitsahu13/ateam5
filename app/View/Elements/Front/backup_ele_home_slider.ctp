<?php 
echo $this->Html->css(array('slider_index/tiny_scroll','slider_index/silde'));
echo $this->Html->script(array('slider_index/jquery.min','slider_index/slider','slider_index/slides.min.jquery'));
?>
<script type="text/javascript">
		$(document).ready(function(){	
			/*$('#slider3').tinycarousel({
				pager: true, 
				interval: true,
							
			});*/
			
			 
			jQuery(function(){
				jQuery('#slider3').slides({
					preload: true,
					preloadImage: 'img/loading.gif',
					play: 3000,
					pause: 2500,
					hoverPause: true,
					animationStart: function(current){
						jQuery('.caption').animate({
							bottom:-35
						},100);
						if (window.console && console.log) {
							// example return of current slide number
							console.log('animationStart on slide: ', current);
						};
					},
					animationComplete: function(current){
						jQuery('.caption').animate({
							bottom:0
						},200);
						if (window.console && console.log) {
							// example return of current slide number
							console.log('animationComplete on slide: ', current);
						};
					},
					slidesLoaded: function() {
						jQuery('.caption').animate({
							bottom:0
						},200);
					}
				});
			});	
			
			
			
		});	
		
</script>
<?php
/* <div id="example">
	<div id="slides">
		<div class="slides_container">
		<?php $i=0;			
			foreach($imageArray as $value){
			$i++;
			?>	
			<div class="slide">
				<div class="LeFeaEve">
					<div class="LeFeaEveIn">
						<div class="LeFeaEveL">
							<h2>Featured Event</h2>
						</div>
					</div>	
				</div>
			</div>		
			
			<?php
			}
			?>
		</div>
	</div>	
</div>*/
?> 
 <div class="slider" id="slider3">	
		<div class="viewport">
			<ul class="overview">
			<?php $i=0;			
			foreach($imageArray as $value){
			$i++;
			?>		
				<li>
					<div style="position:absolute;top:10px;margin:25px 0px 0px 20px;z-index:99;">
						<div class="slider_txt">
							<h1>
								<?php echo $value['Slider']['title'];?>
							</h1>
							<h3>
								<?php echo $value['Slider']['description'];?>
							</h3>
							<h1><a href="#">Post a dream</a></h1>
						</div>
					</div>
					<div style="position:relative;">
						<?php echo $this->Html->image(SLIDER_SHOW_PATH.$value['Slider']['image'],array('title'=>'A Team 4 a Dream','alt'=>'image'.' '.$i.''));?>
					</div>
				</li>  
			<?php  
				}
			?>
			</ul>
		</div>    
		
		<!--<div class="slider_pgng">
			<ul class="pager">
				<?php
				//for($i=0;$i<=$count_image-1;$i++){
				?>
					<li>
						<a href="#" rel="<?php //echo $i; ?>" class="pagenum active"><?php //echo $i+1; ?></a>
					</li>				
				<?php //}?>
			</ul>
		</div>-->
</div>	 