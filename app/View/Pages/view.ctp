<div class="right_container max_width">

 <?php foreach($data as $value){   ?>
         <h2><a href="#"><?php echo $parent_view; ?></a></h2>
         
         <span class="slct_rwndInPut sort_dropawn dropdwn_H">
          <!--  <select class="slct_rwndInPutRi with_sml1" >
           <option>Categories</option>
            </select> -->
            </span>
            <div class="clear"></div>
        
         <div class="expert_detail max_width exper_margin">
	         <h2 class="col_brown"><?php echo $data['Page']['title']; ?></h2>
	         <div class="clear"></div>
	         
	       
	         <div class="blog3_bottom">
	         <div class="que_n_ans">
		        
		         <div class="qn_txt"><?php echo $data['Page']['content']; ?></div>
		        
		        
		        
	        
	        </div>
	                        
	         </div>	
	         
          
         </div>
         
          <?php } ?>
 </div>