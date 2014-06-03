
<?
App::import("model", "Colloberation");  
?>

<?php if (isset($feedback)): ?> 
   <!--   FeedBack Popup    -->
		<div class="popup-wrapper show"  id='feedback_popup'   > 
			<div class='popup_invite_deffault popup'> 
				<h3>   FeedBack :  </h3> 
					<form method='post' >   
					 <input type='hidden' name='feedback' value='1' /> 
 					 

 					 <!-- Select job here -->   
 					 <p> Select Job: 
					 	<select name='job_id'>  
					 			<?php foreach($feed_list as $job=>$title):?> 
					 				<option value='<?=$job?>'>  <?=$title?> </option>
					 			<? endforeach ;?> 
 						</select>
					 </p>  
 						 <div class="popup_field"> 
 							<p> Technical Skills :    
								<input type='checkbox'  name='skill[]' value='1'  checked ="checked" /> 
								<input type='checkbox'  name='skill[]' value='2' /> 
								<input type='checkbox'  name='skill[]' value='3' /> 
								<input type='checkbox'  name='skill[]' value='4' /> 
								<input type='checkbox'  name='skill[]' value='5' /> 
						   </p> 
							 </div> 
 	 						 <div class="popup_field"> 
						     <p>  Communication :  
 								<input type='checkbox'  name='coom[]' value='1' checked ="checked"   /> 
								<input type='checkbox'  name='comm[]' value='2' /> 
								<input type='checkbox'  name='comm[]' value='3' /> 
								<input type='checkbox'  name='comm[]' value='4' /> 
								<input type='checkbox'  name='comm[]' value='5' />  
 							 </p>  
 							 </div> 

	 					 	<div class="popup_field"> 
 							 <p>  Creativity  :  
 								<input type='checkbox'  name='crea[]' value='1' checked ="checked"   /> 
								<input type='checkbox'  name='crea[]' value='2' /> 
								<input type='checkbox'  name='crea[]' value='3' /> 
								<input type='checkbox'  name='crea[]' value='4' /> 
								<input type='checkbox'  name='crea[]' value='5' />  
 							 </p>   
 							 	</div> 

							<div class="popup_field"> 
 							 <p>  Timeline  :  
 								<input type='checkbox'  name='time[]' value='1' checked ="checked"   /> 
								<input type='checkbox'  name='time[]' value='2' /> 
								<input type='checkbox'  name='time[]' value='3' /> 
								<input type='checkbox'  name='time[]' value='4' /> 
								<input type='checkbox'  name='time[]' value='5' />  
 							 </p>   
 							 	</div> 

 							 	<div class="popup_field">  
 							 		<p> In Words </p>  
 							 		<textarea name='comment'></textarea> 


 							 	</div> 

 								<button type='submit'> Submit</button>  
							   
 					</form> 
 		   </div>  
 		</div>  
 
 <!-- End FeedBack  Popup  -->  
 <script type="text/javascript"> 

 jQuery(document).ready(function(){

 			   jQuery('#feedback_popup').fadeIn();
 					 
						 jQuery('#feedback_popup .popup').css('top', '-1000px')
							.animate({'top': '0'}, 500);  

							closePopup();
							 
		
						function closePopup() {
							$('.popup-wrapper').bind('click', function(event){
								var container = $(this).find('.popup');
								if (container.has(event.target).length === 0){
									container.animate({'top': '-1000px'}, 300, function(){$('.popup-wrapper').fadeOut();});
								}
							});
						}
						 

 });

  </script>
 
<?php endif ;?>  



<h3 class="title_h3"> User Profile  Details   </h3> 
<div class="clear"></div>
<div class="expert_detail max_width">
	<h2 class="col_blue"><?php echo  User::getuserName( $userPublicView['User']["id"]);   ?></h2>
	<div class="clear"></div>
	<div class="deatil_content_large">
		<div class="detail_top_large">
			<div class="expert_img" style="margin-right: 15px;">
					<?php 
								echo  $user_img=$this->General->show_user_img($userPublicView['User']['id'],$userPublicView['UserDetail']['image'],'SMALL',$userPublicView['User']['first_name'].' '.$userPublicView['User']['last_name']);
						?></div> 
						
						<div style="float: left;">
						
						<? if ($userPublicView['User']['id'] != $this->Session->read('Auth.User.id')): ?> 
						
						
						 <a href='/Workrooms/chatroom/<?=$userPublicView['User']['id']?>' style="float: none" class="chat">  Chat in workroom </a> 
						
						
						 <!--  Expert   -->
								 <? if (isset($expert)):?> 
								 	 <a href='javascript:void(0)' class='invite_job' rel='<?=$userPublicView["User"]["id"]?>' > 
								 	  Invite to team-up</a>
						 		 <?php endif?> 	
						<!--  end Expert   -->		
						
						
						 <? endif;?>   
						 
								 
								 
						
						 	<div class="fac_bar" style="float: none; width: 55%;">
								<ul> 
								 
									 <? if (isset($userPublicView["UserDetail"]["ExpertiseCategory"]["name"])):?> 
									<li>Exeprtise Category :  <?=$userPublicView["UserDetail"]["ExpertiseCategory"]["name"]?></li>
									<? endif;?> 
									
										<li><span>Reference Hourly Rate($) Max</span>:		<?php echo $userPublicView['UserDetail']['max_reference_rate']?> Hrs/Week. </li>
											<li><span>Reference Hourly Rate($) Min</span>:  <?php echo $userPublicView['UserDetail']['min_reference_rate']?> Hrs/Week. </li> 
											
											
									
									 <? if (isset($userPublicView["UserDetail"]["Country"]["name"])):?> 
									<li> 
									<div class="flag_icon"> 
									 		<?php echo $this->Html->image("country_flags/".$userPublicView["UserDetail"]["Country"]["country_flag"]); ?> 
									
									</div>  <?=$userPublicView["UserDetail"]["Country"]["name"]?> </li>
								
										
										<? endif;?> 
									 
										 <? if (isset($userPublicView["UserDetail"]["LeaderCategory"]["name"])):?> 
											<li><?=$userPublicView["UserDetail"]["LeaderCategory"]["name"]?> </li>
									<? endif;?> 
									
									
									<li>  <?=$userPublicView["avail"] ?> </li>
								  	<li>   
								  	  
								  			<? if ($userPublicView["User"]["role_id"]==3) echo "Signed as Leader";   ?>
								  			<? if ($userPublicView["User"]["role_id"]==2) echo "Signed as Both";   ?>
								  			<? if ($userPublicView["User"]["role_id"]==4) echo "Signed as Expert";   ?>
								  			
								  	
								  	
								  	 </li>   
									 
								 </ul>
								 </div>
							</div>
						 
						 <?  
					 
						 ?>
						 
						 
		  	<div class="clear"></div>
		</div>
		  
	 	 <!--  Detail_bottom  Stack   -->
		<div class="detail_bottom">
		 	 
		 		
		 
		 
		 
		 <p style="padding: 30px 0"> <?=$userPublicView['UserDetail']['about_us']?>   </p>
		 <p>Skills: <? 
		 $a   = [] ;   
		 foreach($userPublicView["skills"] as $s) {
					if (!in_array($s, $a))
											echo "<span class='col_blue'> {$s}   </span>"; 
					$a[]  =  $s;  }
										?></p> 
		 	
										
		</div> 
		
		
		
		
	</div>
</div>
 <div class="clear"></div> 
 
 
 
  <!--  Some   Others info   For   user profile   stack   -->
 <div class="expert_detail max_width">
	<h2 class="col_blue">Persona: </h2>
	<div class="clear"></div>
		<div class="compensation_frmDV">
		<div class="user_fieldset">
			<label>C.V</label>
			<div class="user_field">
				<textarea disabled style="height:200px;"><?=$userPublicView['UserDetail']["resume_text"]?></textarea>
			</div>
		 </div>
		 <div class="user_fieldset">
		 	<label>Attachment:</label> 
			<div class="user_field">
				<a href='/users/downloadresumeother/<?=$userPublicView["User"]["id"]?>'>  <?=$userPublicView['UserDetail']["resume_doc"]?>  </a>
			</div>
		</div>
		
		
		
		
		<!--  Social Links   Starts Here    -->
		
		<? if ($userPublicView['UserDetail']["linkdin_url"]!=""):?>
		<div class="user_fieldset">
			<label>Linked-in Link:</label>
		 	<div class="user_field">
				<A href='<?=$userPublicView['UserDetail']["linkdin_url"]?>' target='_blank'>   <?=$userPublicView['UserDetail']["linkdin_url"]?>  </A>
			</div>  
		</div>
		<? endif;?>   
		
		
	
		<? if ($userPublicView['UserDetail']["github_url"]!=""):?>
		<div class="user_fieldset">
			<label>Github :</label>
		 	<div class="user_field">
				<A href='<?=$userPublicView['UserDetail']["github_url"]?>' target='_blank'>   <?=$userPublicView['UserDetail']["github_url"]?>  </A>
			</div>  
		</div>
		<? endif;?>    
		
		
		
				<? if ($userPublicView['UserDetail']["behance_url"]!=""):?>
		<div class="user_fieldset">
			<label>Behance :</label>
		 	<div class="user_field">
				<A href='<?=$userPublicView['UserDetail']["behance_url"]?>' target='_blank'>   <?=$userPublicView['UserDetail']["behance_url"]?>  </A>
			</div>  
		</div>
		<? endif;?>     
		
		
		
		
		
			<? if ($userPublicView['UserDetail']["carbonmade_url"]!=""):?>
		<div class="user_fieldset">
			<label>Carbonmade  :</label>
		 	<div class="user_field">
				<A href='<?=$userPublicView['UserDetail']["carbonmade_url"]?>' target='_blank'>   <?=$userPublicView['UserDetail']["carbonmade_url"]?>  </A>
			</div>  
		</div>
		<? endif;?>   
		
		
		
		
		<!--  End Social Links    -->
		
		
		
		
		
		
		
		
		<!--  Portfolio  items Starts  Here    -->
		
		<div class="user_fieldset">
			<label>Portfolio:</label>
			<div class="user_field portfolio">
			
			
		 	 	<?  
		 	 	
		 	 	
		 	 	 foreach ($userPublicView["UserPortfolio"] as $item ){
			
			 
						if (!empty($item["url"])){ 

						echo "
								<div class='port_item'>  
										".$this->General->show_user_portfolio_img($item['user_id'],$item['image'],'THUMB',$item['title'])."							
									<span> ".$item["title"]."     </span> <br/>  
									<span>  ".$item["cat"]."      </span> <br>   

 										<a href='".$item["url"]."'>  Link  </a>   
								</div>  
							";
							} else{

						echo "
								<div class='port_item'>  
										".$this->General->show_user_portfolio_img($item['user_id'],$item['image'],'THUMB',$item['title'])."							
										<span> ".$item["title"]."     </span> <br/>
										<span>  ".$item["cat"]."      </span> <br>   
 								 </div>  
							"; 
		
								}


				


					 } 



 		 		?>
			</div>
		</div>   
		
		
		
		<!--  End Portfolios     -->
		
		
		</div>
</div>
<div class="clear"></div>






 <!--  Projects  Starts   Here    -->  
 
 
 
 
 <div class="expert_detail max_width">
	<h2 class="col_blue">Projects :  </h2>
	<div class="clear"></div>
	 	 <?
	 	   foreach ($data as $project_key => $project_value ):  
	 	  ?>
	  	<div class="expert_detail">
			<h2 <?php if ($userPublicView["User"]["role_id"]==3 || $userPublicView["User"]["id"]  ==  $project_value['Project']["user_id"] ) echo "class='blue' "  ; else  echo "class='pink' " ?>   >
			<a href="/projects/public_view/<?=$project_value['Project']["id"]?>">
			<?php echo ucfirst($project_value['Project']['title']) ?>
			</a>
			
			 </h2>
			 
			
			<div class="deatil_content">
				<div class="detail_top">
					<div class="expert_img">
					<?php echo $this->General->show_project_img($project_value['Project']['id'],$project_value['Project']['project_image'],'SMALL',$project_value['Project']['title']);
					 ?></div>
						<div class="detail">
							<div class="nav_bar">
								<ul>
									<li><a href="/Workrooms/projecto/<?=$project_value['Project']['id']?>" class="chat"> Chat in workroom </a></li>
									<?php
								 
									?>
								 </ul>
							</div>
						<p class="dec"><span>Description:</span> <?php echo nl2br(ucfirst($project_value['Project']['description']));
						?></p>
						</div>
					<div class="clear"></div>
					<div class="fac_bar fac_width">
						<div class="fac_row">
						<div class="row_blocks"><span>Idea Maturity:</span><?php echo ucfirst($project_value['IdeaMaturity']['name']);?></div> 
						<div class="row_blocks"><span>Project Status:</span><?php echo ucfirst($project_value['ProjectStatus']['name']); ?></div>
						</div> 
 						<div class="fac_row">
 						
							<div class="row_blocks">
							
							<span>Business Plan:</span> 
							<?php 
							


									if ( Project::hasFile($project_value['Project']["id"]))  
										echo '<a href="'.( Project::hasFile($project_value['Project']["id"])).'">Yes</a>'  ; 
									else echo  "No";
							
							?>
							
							
							</div> 
							
						

						  <!-- Collaboration Types :   -->   
 							<div class="row_blocks"> 
							<span> Collaboration Types : </span>
												 <?=Colloberation::getColloborationProject($project_value['Project']["id"])?>
							 	  				 <?php   
								 					$l = Colloberation::getFreelanceProject($project_value['Project']["id"]) ;  
								 					if  ($l!="No") 
								 						 echo " & Freelancing " ;  
 												 ?> 
							</div> 

					 		<div class="row_blocks"><span>Availabilty in project</span><?php echo ucfirst($project_value['Availability']['name']);?></div>
							</div>
						    <div class="fac_row">
							<div class="row_blocks"><span>Project Type</span><?php echo ucfirst($project_value['ProjectType']['name']);?></div>
						</div>
						 

						 <div class="fac_row">
						<div class="row_blocks"><span>Leader's Location:</span>

						<div class="flag_icon">

						<?php if(!empty($project_value['User']['UserDetail']['Country']['country_flag']))
						{

						 echo $this->Html->image(FLAG_DIR_TEMP_PATH.$project_value['User']['UserDetail']['Country']['country_flag'],array('title'=>ucfirst($project_value['User']['UserDetail']['Country']['name']),'alt'=>ucfirst($project_value['User']['UserDetail']['Country']['name'])));} ?></div>


						 <?php 
						 // set Project 
						 if (isset($project_value['User']['UserDetail']['Country']['name']))
						 echo ucfirst($project_value['User']['UserDetail']['Country']['name']);

						 ?></div>												
						<div class="row_blocks"><span>Leader's Username</span>
						<?php
							$username = $project_value['User']['first_name']." ".$project_value['User']['last_name'];
							echo $this->General->wrap_long_txt($username,0,7)
							?>
							</div>
						
						</div>
						 
						<div class="fac_row">
							<div class="row_blocks"><span>Required Location:</span><div class="flag_icon"><?php echo $this->Html->image('req_loc.png');?></div><?php echo $project_value['Region']['name'];?> ,<?php echo $project_value['Country']['name'];?> ,<?php echo $project_value['State']['name'];?></div>
 						</div>

						<div class="fac_row">
							 <div class="row_blocks">
							<span>Self Investment</span>
							<?php
							if(!empty($project_value['Project']['self_investment_option']))
							{
								echo "$".$project_value['Project']['self_invest_money'];
							}
							else
							{
								echo "None";
							}
							?>
							</div>
							<div class="row_blocks">
							<span>External Investment</span>
							<?php
							if(!empty($project_value['Project']['external_fund_option']))
							{
								echo "$".$project_value['Project']['external_fund_money'];
							}
							else
							{
								echo "None";
							}
							?>
							</div>
						</div>
						<?php
						/* <div class="fac_row">
							<div class="row_blocks">
							<span>External Investment</span>
							<?php
							if(!empty($project_value['Project']['external_fund_option']))
							{
								echo "$".$project_value['Project']['external_fund_money'];
							}
							else
							{
								echo "None";
							}
							?>
							</div>

						</div> */
						?>

				</div> 
				</div>
	 		</div>	  	</div> 
	 
	 	<? endforeach;  ?>  
	  
	
		 
</div>
 
 	<div class="clear"></div> 
	 
  <div class="expert_detail max_width">
	<h2 class="col_blue"> Verifications :  </h2>
	<div class="clear"></div> 
	<div class="user_fieldset">
		<label>Registered Since:</label>
		<div class="user_field">
			<?=$userPublicView['User']["created"]?>,  Last signed in on  <?=$userPublicView['User']["modified"]?>
		</div>
	</div>
	<div class="user_fieldset">
		<label>Verifications:</label>
		<div class="user_field icons">
			<?=$this->Verify->getVerifyHTML($userPublicView['User']["id"])?>
		</div>
	</div>

	<div class="user_fieldset">
		<label>Feedbacks:</label>
		
		<div class="user_field icons">
										<? if ($userPublicView["User"]["role_id"]==3) 
											echo "<p>   " .$this->Feedback->getSummary($userPublicView['User']["id"]).  "</p>";  
									  ?>
									  
									  		<? if ($userPublicView["User"]["role_id"]==4) 
											echo "<p>  " .$this->Feedback->getSummary($userPublicView['User']["id"],"expert").  "</p>";  
										  ?> 
									  
									    	<? if ($userPublicView["User"]["role_id"]==2) {
											echo "<p>    " .$this->Feedback->getSummary($userPublicView['User']["id"]).  "</p>";   
											echo "<p>   " .$this->Feedback->getSummary($userPublicView['User']["id"],"expert").  "</p>";

					  }
									  ?> 
									   
			 
			
		</div>
	</div> 


</div> 
 









