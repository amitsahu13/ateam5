	<li>
		<label>Portfolio</label>
		<div class="OverviewFrmRi">
		  <input type="button" name="" class="upload_btn confirm_details" value="Add Item">
		</div>
	</li>
	<li>
		<label>&nbsp;</label>
		<div class="OverviewFrm3Ri">
		<div class="CategoryA">
		
	
		 
			<ul class="CategoryALi">
			<?php
			
		
			
			 if(!empty($user_data['UserPortfolio'])){
					$i=0;
					foreach($user_data['UserPortfolio'] as $key=>$portfolio){
					if($i%4==0){
						$class='last';
					}else{
						$class='';
					}
						$portfolio = $portfolio["UserPortfolio"] ;
 


	
		 
						
				?>
						  <li class="<?php echo $class;?>">
							  <?php 
						   if (empty( $portfolio['title']))  
 									$portfolio['title'] ="Noname" ;
						    echo $this->General->show_user_portfolio_img($portfolio['user_id'],$portfolio['image'],'THUMB',$portfolio['title']);
						 ?>
								<div class="CateInfo">
								  <p><?php echo $portfolio['title'];?>
									& <a href="<?php echo $portfolio['url'];?>" target="_blank">link to more</a></p>  
									<p>
										<button class='remove' rel='<?php echo $portfolio['id'];?>'  >  Remove </button>
									
									  
									  
									  
									     </p>
									
								</div>
						  </li>
				 <?php 
					 
					$i++;		
					}
			}?>
			 
			</ul>
		  </div>
		  
		  <!--  
		 <div class="CategoryA">
		 
			<h4>Project Categories:</h4>
			
			<ul class="CategoryALi">
			<?php if(!empty($user_data['UserPortfolio'])){
					$i=0;
					foreach($user_data['UserPortfolio'] as $key=>$portfolio){
if (empty($portfolio['Category']["name"])) 
continue; 

					if($i%4==0){
						$class='last';
					}else{
						$class='';
					}	
				 
				?>
			  <li class="<?php echo $class;?>">
			  
				  <p><?php echo $portfolio['Category']["name"];?> </p>
			 
			  </li>
			   <?php 
						 
				 		
					}
			}?>
			 
			</ul>
		  </div>
		   --> 
		  
		  
		</div>
	</li>
	
	
	<script type='text/javascript'>  
		jQuery(document).ready(function(){
			jQuery(".remove").click(function(){
				 var rel = jQuery(this).attr("rel")  ; 
				 var url = '<?=Router::url("/",true)?>users/deleteport/'+rel;
				 jQuery.get(url);
			 
				jQuery(this).parent().parent().parent().hide();  
				return false; 
			});
		
			
		});
	
	
	</script>