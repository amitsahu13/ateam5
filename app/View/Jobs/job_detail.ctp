<script type='text/javascript' >  
	var user_selected =  null ;  
	

</script>


<script type='text/javascript'>
  		jQuery(document).ready(function(){


			jQuery(".popup-wrapper.show").fadeIn();
			$('.popup-wrapper.show .popup').css('top', '-1000px')
							.animate({'top': '0'}, 500);
				closePopup();
			function closePopup() {
				$('.popup-wrapper').bind('click', function(event){
					var container = $(this).find('.popup');
					if (container.has(event.target).length === 0){
						container.animate({'top': '-1000px'}, 700, function(){$('.popup-wrapper').fadeOut();});
					}
				});
				$('.js-ClosePopup').bind('click', function(){
					$('.popup').animate({'top': '-1000px'}, 300, function(){$('.popup-wrapper').fadeOut();});
				});
			}


  			jQuery(".invite_team").click(function(){
                var rel =   jQuery(this).attr("rel");
					jQuery('#expert'+rel+' .popup-wrapper.ajax').fadeIn();
						$('.popup-wrapper.ajax .popup').css('top', '-1000px')
							.animate({'top': '0'}, 500);

 		 				var rel =   jQuery(this).attr("rel");
 		 				var th  = jQuery(this)  ;
 		 				var job    =   '<?=$data['Job']['id'] ?>';

 		 				var user_id =  '<?=$this->Session->read('Auth.User.id')?>';
 		 				user_selected =  rel ;
 		 				var url  =  '<?=Router::url("/Invitepopup/getpopup/")?>'+user_id + "/" +  rel + '/' + job  ;

 		 				if (user_id){
 		 				  	// Proceed Popup Stack :

 		 				  		jQuery.get(url, function(data){


 		 				  			jQuery("#expert"+rel+" .ajax ").html(data);

 		 				  			jQuery(".continue_team").click(function(){
 		 				  			  window.location="/teamup/gotoroom/<?=$data['Job']['id']?>/"+user_selected;
 		 				  			});


 		 				  		});



 		 			  }
 		 				return false;

 		 	});
 		});
  </script>
 
 <script type="text/javascript"> 
  		jQuery(document).ready(function(){
  	 
  		 


  					 	$("#applyme").click(function(){
  					 			 $("textarea").val("");  
								 $("input[type='text']").val("");   
					 
  					 		jQuery("#addmember").fadeIn();
		  					$('#addmember .popup').css('top', '-1000px')
		  									.animate({'top': '0'}, 500);
 
   
  					 		
  					 		
  					 	});

  					 	$('.popup').animate({'top': '-1000px'}, 10, function(){$('.popup-wrapper').fadeOut();});
			$('.js-ClosePopup').bind('click', function(){
	  					$('.popup').animate({'top': '-1000px'}, 300, function(){$('.popup-wrapper').fadeOut();});
	  					});
			
			 
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


							<div class="popup-wrapper "  id='addmember'   > 
									 
									 <div class='popup_invite_deffault popup'  > 
									     <?=$this->element("apply_job")?>
									  	 <div class="clear"></div>
									 </div>
								   	
								   	</div>
							 



<!--   End Job Apply  Page  -->



<h2 style="float:left; width:100%;">JOB PAGE</h2>
 
 
 	<div class="right_container float_left">
		<div class="clear"></div>
				<div class="expert_detail" style="text-align: center">
				
					   <?php 
						 echo $this->General->show_project_img($data['Project']['id'],$data['Project']['project_image'],'BIG',$data['Project']['title']);
					
						?> 
				
						<!--  Description :   -->   
						
						<? 
						 
						 print_r($data['Job']["description"]);
						 
						?>
						  
						   
						   
						<!--  SERVER   End   Description :   -->
						
				</div>
		</div>
 
 
 
 
	<div class="right_container float_left" style="overflow: hidden;">
		<div class="clear"></div>
			<div class="expert_detail">
				<h2 class="col_blue"><?php echo ucfirst($data['Job']['title']); ?>@ <?php echo ucfirst($data['Project']['title']); ?></h2>
				<div class="clear"></div>				
				<div class="whtlist">
					<a class="flr_icon blue_i" href="#"></a>
					<p><a href="#">Add to watchlist</a> </p>
				</div>
				<div class="deatil_content">
				<div class="detail_top">
					<div class="nav_bar padding_left margin_bottom" style="width:100%;">
							<ul> 
							  
							<li class="last"> 
							<? if(isset($teamup)):?>
					 
							  
							 <? endif;?> 
							 </li> 
							
							<li class="ApplyBtnRi">
							<?php 
				 
App::import("model","Workroom") ;  

 
?></li> 



 
 		<? if (Workroom::isApply($this->Session->read('Auth.User.id'), $data["Job"]["id"]) 
									|| $this->Session->read('Auth.User.id') == $data['Job']['user_id']): ?> 
 
		<? else : 
				echo  "<button  rel='{$data["Job"]["id"]}' id  ='applyme'  class='search_btn_ri applyme'  >  Apply & Chat in Workroom  </button> ";
		
		?> 
		
		<? endif;?> 
		
		
		
		 



						</ul>
					</div>
					
					<?
					$jobs = $data ; 
					
					?>
					
					<div class="detail_bottom"> 
										
										
									<p class="font_fam"> Category:  <? print_r($jobs['Project']["Category"]["name"]); ?> </p>  
								  	<p class="font_fam"> Project:
									 <span class="norm">
									 
									 <?php echo ucfirst($jobs['Project']['title']); ?> 
									 for <a href="#">
									 <?php if (isset($jobs['Project']['Category']['name'])) echo ucfirst($jobs['Project']['Category']['name']); ?>
									 </a> & <a href="#">
									 <?php if (isset($jobs['Project']['ProjectChildCategory']['name'])) echo ucfirst($jobs['Project']['ProjectChildCategory']['name']); ?></a></span></p>
									 <p class="font_fam">Job posted: <span class="norm">
									 <?php
										echo $this->Time->timeAgoInWords($jobs['Job']['created'], array('format' => 'F jS, Y'));
									 ?>
									</span></p> 
									
									
									
									<p class="font_fam">Proposals:<span class="norm">3</span></p>
									<p class="font_fam">Category:<span class="norm"><?php echo $jobs['Category']['name']; ?></span></p>
									<p class="font_fam">Requried skills:<span class="norm">
												<?php 
												$output = array();
												foreach( $jobs['Skill'] as $jobskill_name){
												  $output[] = $jobskill_name['name'];
												}
												echo $skill_data=implode(', ', $output);
												?>
												</span>
									</p>
									<p class="font_fam">Refernce Budject: <span class="norm"><?php echo $jobs['Job']['refrence_budget']; ?>$</span></p>
									<p class="font_fam">Type of Agreement:<span class="norm">Contractor</span></p>
									
									<?php if($jobs['Job']['look_contracter']=='1'){?>
											<p class="font_fam">Contracter Compansation:
											<?php if($jobs['Job']['delayed_payment']=='1' ){?>
													<span class="norm">Delayed Payment :<?php echo $jobs['Job']['delayed_payment_money']; ?>$</span>
											<?php }
												if($jobs['Job']['contracter_percent']=='1'){?>	
												<span class="norm">& Percent :<?php echo $jobs['Job']['contracter_percent_value']; ?>%</span>
											<?php }?>
											</p>
									<?php }
									if($jobs['Job']['look_cofounder']=='1' && $jobs['Job']['cofounder_percent']=='1'){?>
											<p class="font_fam">Cofounder Compansation:<span class="norm">Percent :<?php echo $jobs['Job']['cofounder_percent_value']; ?>%</span></p>
									<?php }?>
									<p class="font_fam float_left">Leader's location:<span class="norm"><?php echo ucfirst($jobs['Project']['User']['UserDetail']['Country']['name']); ?></span></p> <div class="peru_flag"><?php if(!empty($jobs['Project']['User']['UserDetail']['Country']['country_flag'])){ echo $this->Html->image(FLAG_DIR_TEMP_PATH.$jobs['Project']['User']['UserDetail']['Country']['country_flag'],array('title'=>ucfirst($jobs['Project']['User']['UserDetail']['Country']['name']),'alt'=>ucfirst($jobs['Project']['User']['UserDetail']['Country']['name'])));} ?></div>
									<p class="font_fam">Leader's username:
									<span class="col_blue norm">
									
									<a href="/users/user_public_view/<?=$jobs['Project']['User']['id']?>">
									<?php echo ucfirst($jobs['Project']['User']['first_name']).' '.ucfirst($jobs['Project']['User']['last_name']); ?></a></span></p>
									 
									<div class="clear"></div>
									<p class="font_fam">Req. Location:<span class="norm"><?php echo ucfirst($jobs['Region']['name']);?> ,<?php echo ucfirst($jobs['Country']['name']);?> ,<?php echo ucfirst($jobs['State']['name']);?>, <?php echo ucfirst($jobs['Job']['city']);?></span></p>
									<p class="font_fam">Req/ Availablility:<span class="norm"><?php echo $jobs['Job']['compensation_avalibility'];?> Hrs./Week</span></p>
									 
									<p>Description: <?php echo ucfirst(nl2br($jobs['Job']['description'])); ?></p>
								</div>
								
					 
					<div class="clear"></div>
				</div>

				</div>	

			</div>
			<div class="clear"></div>






<!--  Show Popup  If Team Up   --> 
 					 <?php if(isset($teamup_flag)  ):  ?> 
	 
	<div class="popup-wrapper show"> 
		<div class='popup_invite_deffault popup'> 
			<h3>  Contract  </h3><div class="popup_invite_content">
				<p><?=TEAMUP_TEXT?> </p>  
				<span class="continue_team js-ClosePopup" style="margin-left: 10px; cursor: pointer;">Cancel  </span> 
   				 				
				<a href="/Teamup/milestones/<?=$job_id?>/<?=$to_user?>" class="continue_team" >   Define terms </a>  
   				 				   
				<div class="clear"></div>
			</div>
	   	</div>
	</div>
			 		 <?endif;?> 
 

 
    			<h2><a href="#">Team Up Proposals</a></h2>
    		
    				<? if ($jobs_count):?>
    			<p> Currently there are
    		    <?= ($jobs_count)?> 
    			   official open applications for this Job </p>
					<?endif;?> 
			
			
			<hr>  
		 
		 
		 
		
		
		
		 
	    <?php  
			App::import("model","Teamup");
			
		if (isset($data_bid))
		foreach($data_bid as $data_key=>$data_value)
		{



			
 		?>
			<div class="expert_detail" id='expert<?=$data_value['User']['id']?>'> 
				<div class='ajax popup-wrapper'> </div>
			
				<h2><?php echo  $this->Html->link(ucfirst($data_value['User']['first_name']." ".$data_value['User']['last_name']),array('controller'=>'users','action'=>'user_public_view',$data_value['User']['id']))?></h2>
				<div class="clear"></div>
				 
				<div class="deatil_content">
					<div class="detail_top">
						<div class="expert_img">
						<?php 
						 $user_img=$this->General->show_user_img($data_value['User']['id'],$data_value['UserDetail']['image'],'SMALL',$data_value['User']['first_name'].' '.$data_value['User']['last_name']);
						echo $this->Html->link($user_img,array('controller'=>'users','action'=>'user_public_view',$data_value['User']['id']),array('div'=>false,'escape'=>false));

						?>
						</div> 
						
							<!--   Large Image Goes  Here    -->  
						 <div class='largeimage' style='display:none;position:absolute; margin-left: -403px;border: 15px solid white;border-radius: 3px;' >
						   <?php 
						  $user_img=$this->General->show_user_img($data_value['User']['id'],$data_value['UserDetail']['image'],'BIG',$data_value['User']['first_name'].' '.$data_value['User']['last_name']);
						echo $this->Html->link($user_img,array('controller'=>'users','action'=>'user_public_view',$data_value['User']['id']),array('div'=>false,'escape'=>false));
						 
						?> 
						 
						 </div> 
						 
						<!--   End LArge   Iamge    --> 
						
						
						
						
						<!--  Applied Stuff for   That User   -->
						
						
						
						
						<div class="detail">
							<div class="nav_bar">
							<div class="nav_bar">
									<ul>
									 
                                        <!-- There is  Method   for that   !   -->
                                        <?php   if (Teamup::isUp($data["Job"]["id"],$data_value["User"]["id"] ) ||   Workroom::isApply($data_value["User"]["id"], $data["Job"]["id"])):?>
                                        <li> <a href="<?=Workroom::getJob( $data["Job"]["id"])?>" class="chat">
                                            Chat in Workroom </a></li>
                                        <? else: ?>
                                        <li><a href="<?=Workroom::getJobChatroom($data_value["User"]["id"], $data["Job"]["id"])?>" class="chat">
                                            Chat in chatroom </a></li>

                                        <? endif;?>

                                        <?php if ( $data_value["up"]==1):  ?>
									    <li><a href="javascript:void(0)" class="invite_team  golink" rel='<?=$data_value["User"]["id"]?>'  > Invite to team-up</a></li>
									 	<? endif;?> 
									 	
								  	</ul>
							</div>
							</div>
							<div class="clear"></div> 
							   
							   
					   
							   
							  <!--  Applied DAta  For  that      -->
							  
							<div class="fac_bar">
								<ul>
									<?php
									$expertise_category_name = '';
									if(isset($data_value['UserDetail']['ExpertiseCategory']['name']) &&!empty($data_value['UserDetail']['ExpertiseCategory']['name']))
									{
										$expertise_category_name=$data_value['UserDetail']['ExpertiseCategory']['name'];
									}else{
										echo "N/A";
										}
									?>
									<?php if($data_value['User']['role_id']==Configure::read('App.Role.Provider') || $data_value['User']['role_id']==Configure::read('App.Role.Both') ){?>
									<li><span>Expertise Category</span>:<?php echo $expertise_category_name;?></li>		
									<?php }?>
									<?php
									$country_name = '';
									if(isset($data_value['UserDetail']['Country']['name']) &&!empty($data_value['UserDetail']['Country']['name']))
									{
										$country_name=$data_value['UserDetail']['Country']['name'];
									}else
										echo "N/A";  
 
									
									?>
									<li><div class="flag_icon"><?php if(!empty($data_value['UserDetail']['Country']['country_flag'])){ echo $this->Html->image(FLAG_DIR_TEMP_PATH.$data_value['UserDetail']['Country']['country_flag'],array('title'=>ucfirst($country_name),'alt'=>ucfirst($country_name)));}?> </div><?php echo ucfirst($country_name);?></li>
								 
									<?php if($data_value['User']['role_id']==Configure::read('App.Role.Provider') || $data_value['User']['role_id']==Configure::read('App.Role.Both') ){?>
									<li><span>Reference Hourly Rate($) Max</span>:<?php echo $data_value['UserDetail']['max_reference_rate']?> Hrs/Week. </li>
									<li><span>Reference Hourly Rate($) Min</span>:<?php echo $data_value['UserDetail']['min_reference_rate']?> Hrs/Week. </li>
									<?php
									}
									?>
								 

									<!--  Reiting   Stars -->
 		


									<!-- End REitings stars   -->   

	 						<li class="last"> 
								 	 <?= $this->Feedback->getSummary($data_value["User"]["id"],"expert"); ?> 
								  </li>  

  
  								   <!--  Show  Detail information   -->
  								   
  								   
						 
  								

								</ul>
								
  							
  							
  							
							</div>  
								 <? if ($this->Session->read('Auth.User.id') ==  $data_value['User']["id"]     ||  $this->Session->read('Auth.User.id')  == $data['Job']["user_id"]    ): ?>     
							  		<? 
							  		 $bidid   =  JobBid::getJobBidId($data_value['User']["id"],  $data['Job']["id"]); 
							  		 $data_bid_job =  JobBid::getAdditional(  $bidid ); 
							  		?>
							  	
							    <p>   <span>  Estimated Duration:  </span>   <?=$data_bid_job["dur"]?> Weeks </p>
								<p> <span>  Availability : <?=$data_bid_job["av"]?>  Hrs/Week  </span></p>
								<p>  <span>  Relevant Experience:    <?=$data_bid_job["ex"]?>   </span>  </p>
								<p>  <span>  Proposed Cash Compensation:  <?=$data_bid_job["cash"]?>  $ </span>  </p>
							    <p> <span>  Proposed Future Earning Sharing:  <?=$data_bid_job["future"]?>   %   </span> </p>
  				
  						 
  
  							<? endif;?> 
							
							
							
							<!--  End applied data for that user    -->
							
							
							<div class="clear"></div>
						</div>
						<div class="clear"></div>
					</div>

					<div class="detail_bottom">
					<p><?php echo nl2br(ucfirst($data_value['UserDetail']['about_us']));?></p>

					<div class="skills"> 
					Skills:
					<?php
					$output = array();
						foreach( $data_value['Skill'] as $expertskill_name){
						  $output[] = '<span>'.ucfirst($expertskill_name['name'])."</span>";
						}
						echo $skill_data=implode(',&nbsp;&nbsp;', $output); 
					if (count($data_value['Skill'])==0) 
 							echo "Not Specified"; 

					?>	
					</div>
					</div> 
					 
					 
					<!--  Files Goes Here   :  -->
					<? if (count($data_value["Files"])):?> 
					
						<div class="product_jobfiles">
		<h5>Application Files:</h5>
		<div class="add_edit_scrl" id="placement-examples">
			<ul>
			<?php 
		 
				foreach($data_value["Files"] as  $file){?>
				<li><?php echo  $file;?>								
					<div class="edit_deletBX">
					<a href='/jobs/getfileApply/<?=$data_value['bid_id']?>/<?=$file?>' >
						<span class="exprt_smbl2 job_attche_download"    alt="Download" title="Download"></span> </a> 
						
					</div>
				</li>
			<?php 
				}
		 	?>
			 			
				
			</ul>
		</div>
	</div>   
					
					
					
							 
					<? endif;?>  
					 <!--  End Files Here :    -->
					
					
				</div>
			
			</div>
			<div class="clear"></div>
	<?php
		}else{
		echo  "There are no open Team-up proposals" ; 
	}

	?>
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			<div class="clear"></div>
			
		
  

















	</div>
	<div class="product_jobfiles">
		<h5>Job Files:</h5>
		<div class="add_edit_scrl" id="placement-examples">
			<ul>
			<?php 
			if(!empty($job_attachement)){		
				foreach($job_attachement as $key =>$jobattac){?>
				<li><?php echo $jobattac['JobAttachment']['file_name'];?>								
					<div class="edit_deletBX">
						<span class="exprt_smbl2 job_attche_download" jobattche-id="<?php echo $jobattac['JobAttachment']['id'];?>" id="<?php echo $jobattac['JobAttachment']['job_id'];?>" alt="Download" title="Download"></span>
					</div>
				</li>
			<?php 
				}
			}?>
			<?php 
			if(!empty($job_file)){
				foreach($job_file as $key =>$jobFile){?>
				<li><?php echo $jobFile['JobFile']['file_name'];?> 								
					<div class="edit_deletBX">
						<span class="exprt_smbl2 job_file_download" jobfile-id="<?php echo $jobFile['JobFile']['id'];?>" id="<?php echo $jobFile['JobFile']['job_id'];?>" alt="Download" title="Download"></span>
					</div>
				</li>
			<?php 
				}
			}?>				
				
			</ul>
		</div>
	</div>   
	<div class="product_dscrpBOX bg_none" style="width:100%;">
	</div>  
   <div class="clear"></div>	
<script type="text/javascript">
	jQuery(".job_attche_download").live('click',function(){
 
			var jobAttchemnet_id = 	jQuery(this).closest('span').attr('jobattche-id');
			var job_id 			 = 	jQuery(this).closest('span').attr('id');			
			window.location = SiteUrl+"/jobs/download_job_attachement_from_job_detail/"+jobAttchemnet_id+"/"+job_id;
	});
	
	jQuery(".job_file_download").live('click',function(){ 
			var jobFile_id = 	jQuery(this).closest('span').attr('jobfile-id');
			var job_id 			 = 	jQuery(this).closest('span').attr('id');			
			window.location = SiteUrl+"/jobs/download_job_file_from_job_detail/"+jobFile_id+"/"+job_id;
	});	
</script>	
<?php
if (class_exists('JsHelper') && method_exists($this->Js, 'writeBuffer')) 
echo $this->Js->writeBuffer();
?> 


<!--  Create  Popup    on Click Team up -->


  <!--   End   Popup  --> 