<script type="text/javascript">
    jQuery(document).ready(function($){
        $('.product_list ul li:nth-child(4n)').css("margin", "0px");
    });
</script>
<div class="product_list">
    	<ul>
        	<li>
            	<div class="proBX">
                	<div class="proBX_hdng">
                    	<h3>How Does it Works?</h3>
                    </div>
					<?php
					
					if(!empty($video_data)){ ?>
						<div class="proBX_img">					
							<?php 
								echo $video_data[0]['Video']['embeded_video'];
							?>							
						</div>
					
                    <div class="proBX_discrp">
                    	<span><?php echo $this->General->wrap_long_txt($video_data[0]['Video']['title'],0,50);?></span>
                    </div>
					<?php }?>
                </div>
            </li>
            <li>
            	<div class="proBX">
                	<div class="proBX_hdng">
                    	<h3>Looking for a Designer?</h3>
                    </div>
                    <div class="proBX_img">
					<?php echo $this->Html->image('02.jpg',array('title'=>"Video", "alt"=>"Video"));?>
                    
                    </div>
                    <div class="proBX_discrp">
                    	<span>Fearured Portfolio: Name Ofdesginer, </span>
                    </div>
                </div>
            </li>
            <li>
            	<div class="proBX">
                	<div class="proBX_hdng">
                    	<h3>Looking for a Job?</h3>
                    </div>
                    <div class="proBX_img">
					<?php echo $this->Html->image('03.jpg',array('title'=>"Video", "alt"=>"Video"));?>
                    	
                    </div>
                    <div class="proBX_discrp">
                    	<span>Fearured Project: Title of Project ></span>
                    </div>
                </div>
            </li>
            <li>
            	<div class="proBX">
                	<div class="proBX_hdng">
                    	<h3>Now on A Team 4 A Dream</h3>
                    </div>
                    <div class="proBX_img">
					<?php echo $this->Html->image('04.jpg',array('title'=>"Video", "alt"=>"Video"));?>
                    
                    </div>
                    <div class="proBX_discrp">
                    	<span>&nbsp;</span>
                    </div>
                </div>
            </li>
        </ul>
    </div>