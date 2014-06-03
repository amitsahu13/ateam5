<div class="left_sidebar">
        	<h2><a href="#">Help</a></h2>
        	<div class="aside_left">
            	
                <ul class ="test">
                	 <?php //pr($footer_link);die;
							foreach($footer_link as $key=>$value){
								$slug = $value['Page']['slug'];
								if($value['Page']['parent_id'] == HELP){
									
								
									if($value['Page']['slug'] == $this->params->params['static'])
									{ 
									$class ="slct"; 
									 }
									else{
									$class ="";  
									} ?>
            						<li>
            						<?php 
            							echo $this->Html->link(ucfirst($value['Page']['title']),array('controller'=>'pages','action'=>'view','static'=>$value['Page']['slug']),array('div'=>false,'class'=>$class,'lable'=>false,'escape'=>false)); ?>
								    </li><?php
								}
							}?>
                
                	<!-- <li><a href="#" class="slct">Q&A</a></li>
                    <li><a href="#" >Trust, Safety, Privacy</a></li>
                     <li><a href="#" >Code of Conduct</a></li>
                      <li><a href="#" >Terms of service</a></li>
                       <li><a href="#" >Contact Support</a></li>  -->
             
                </ul>
            </div>
 </div>           