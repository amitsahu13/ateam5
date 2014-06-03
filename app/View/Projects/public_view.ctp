
<? 
	App::import("model","Workroom");  
	App::import("model", "Colloberation"); 
	?>
<!--  Apply Popup  -->
<div class="popup-wrapper " id='addmember'>
	<div class='popup_invite_deffault popup'>
		<?=$this->element("apply_job")?>

		<span class="continue_team js-ClosePopup"
			style="margin-left: 10px; cursor: pointer;">Cancel </span>
		<div class="clear"></div>
	</div>
</div>

<!--  End Apply Popup Here :  -->



<script type='text/javascript'>
	jQuery(document).ready(function() {

		jQuery(".expert_img ").mouseenter(function() {
			jQuery(this).parent().find(".largeimage").show();
		});
		jQuery(".expert_img ").mouseleave(function() {
			jQuery(this).parent().find(".largeimage").hide();
		});

		// Apply me  
		$(".applyme").click(function() {
			var id = $(this).attr("rel");
			jQuery("#addmember").fadeIn();
			$('#addmember .popup').css('top', '-1000px').animate({
				'top' : '0'
			}, 500);
			$("#JobBidJobDetailForm").attr("action", "/jobs/apply_job/" + id);
			$("input#job_id").val(id);

		});

		$(".js-ClosePopup").click(function() {

			$('.popup-wrapper').click();
		});

		$('.popup-wrapper').bind('click', function(event) {
			var container = $(this).find('.popup');
			if (container.has(event.target).length === 0) {
				container.animate({
					'top' : '-1000px'
				}, 300, function() {
					$('.popup-wrapper').fadeOut();
				});
			}
		});

	});
</script>












<!--  Content Area  Begins   HERE    -->
<div class="public_project">


	<div class=" container">
		<h2>
			<a href="#">PROJECT PAGE</a>
		</h2>
		<div class="clear"></div>





		<?
	 	   foreach ($data as $project_key => $project_value ):  
	 	  ?>




		<div class="expert_detail max_width">
			<div class="detail_top max_width imgofproj">
				<?php echo $this->General->show_project_img($project_value['Project']['id'],$project_value['Project']['project_image'],'BIG',$project_value['Project']['title']);
					 ?>
			</div>
		</div>


		<!--  Detail info      -->

		<div class="expert_detail">
			<h2 class='col_blue'>
				<?php echo ucfirst($project_value['Project']['title']) ?>
			</h2>

			<?php if ($this->Session->read('Auth.User.id') !=$project_value['Project']['user_id'] ):?>
			<p>
				<a href="/Workrooms/projecto/<?=$project_value['Project']['id']?>"
					class="chat"> Chat in workroom </a>
			</p>
			<?endif;?>

			<div class='description detail_bottom'>
				<p>
					<?php echo $project_value['Project']['description'];?>
				</p>
			</div>

			<div class='project_category'>
				<span>Project Category:</span>
				<? print_r($project_value["Category"]["name"]); ?>
			</div>


			<div class="col_type">
				<span>Collaboration Types : </span>
				<?=Colloberation::getColloborationProject($project_value['Project']["id"])?>

				<?php   
							 					$l = Colloberation::getFreelanceProject($project_value['Project']["id"]) ;   
							 			  
							 					if  ($l!="No") 
							 						 echo " & Freelancing " ;  


							 				?>
			</div>



			<div class="idea">
				<span>Idea Maturity:</span>
				<?php echo ucfirst($project_value['IdeaMaturity']['name']);?>
			</div>

            <div class="status">
                <span> Project Status:</span>
                <?php echo ucfirst($project_value['ProjectStatus']['name']); ?>
            </div>

            <div class="leaderavil ">
                <span>Leader's availability in project:</span>
                <?php echo ucfirst($project_value['Availability']['name']);?></div>

			<div class="plan">
				<span>Business Plan:</span>
				<?php  if ( Project::hasFile($project_value['Project']["id"]))  
										echo '<a href="'.( Project::hasFile($project_value['Project']["id"])).'">Yes</a>'  ; 
									else echo  "No";
							
							?>
			</div>

			<div class="project_type">
				<span>Project Type</span>
				<?php echo ucfirst($project_value['ProjectType']['name']);?>
			</div>

			<div class='leader'>
				<div class="">
					<span>Leader's Location:</span>
					<div class="flag_icon">
						<?php if(!empty($project_value['User']['UserDetail']['Country']['country_flag'])){ echo $this->Html->image(FLAG_DIR_TEMP_PATH.$project_value['User']['UserDetail']['Country']['country_flag'],array('title'=>ucfirst($project_value['User']['UserDetail']['Country']['name']),'alt'=>ucfirst($project_value['User']['UserDetail']['Country']['name'])));} ?>
					</div>
					<?php echo ucfirst($project_value['User']['UserDetail']['Country']['name']);?>
				</div>
				<div class="">
					<span>Leader's Username</span> <a
						href='/users/user_public_view/<?=$project_value['User']['id']?>'>
						<?php echo $project_value['User']['username']  ?>
					</a>
				</div>


			</div>

			<div class="required_location">
				<span>Required Location:</span>
				<div class="flag_icon">
					<?php
					if (!empty($project_value['Country']['country_flag'])) {
						echo $this->Html->image(FLAG_DIR_TEMP_PATH.$project_value['Country']['country_flag'], array(
							'title' => ucfirst($project_value['Country']['name']),
							'alt' => ucfirst($project_value['Country']['name'])
						));
					}
					?>
				</div>
				<?php 	
							if ($project_value['Region']['name']!=""  &&  $project_value['Region']['name']!="NA") 
								echo $project_value['Region']['name']; ?>
				<?php
							 if ($project_value['Country']['name']!=""  &&  $project_value['Country']['name']!="NA")
							 echo ",".$project_value['Country']['name'];
							
							?>
				<?php 
								if ($project_value['State']['name']!=""  &&  $project_value['State']['name']!="NA")
								echo ",". $project_value['State']['name'];
							
							?>
			</div>

			<div class="inverst">
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

			<div class="invest">
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


			<div class="skills">
				<span>Required Skills</span>
				<?  echo Project::getProjectSkills($project_value['Project']["id"]) ;     ?>
			</div>


		</div>
		<? endforeach;  ?>
	</div>




	<!--  LEADER  :     -->
 
	<div class="expert_detail">
	 	<h2 style='color:grey;'> LEADER  </h2>
	
		<h2>
			<a href='/users/user_public_view/<?=$userPublicView['User']["id"]?>'>   <?php 	 echo   User::getuserName( $userPublicView['User']["id"]) ;  ?> </a>   
		</h2>

        <div class="clear"></div>

        <!-- Detail conten  -->
        <div class="deatil_content_large">
			<div class="detail_top_large">
			
				<div class="expert_img">
					<?php echo  $user_img=$this->General->show_user_img($userPublicView['User']['id'],$userPublicView['UserDetail']['image'],'SMALL',$userPublicView['User']['first_name'].' '.$userPublicView['User']['last_name']);
						?>
				</div>
 
 
  				<!--  Leader   Detail    -->
  				
				<div class="fac_bar">
					<ul>
						 	<?php if ($this->Session->read('Auth.User.id') !=$project_value['Project']['user_id'] ):?>
							 <li><a href="/workrooms/chatroom/<?=$project_value['Project']['user_id'] ?>"
										class="chat"> Chat in workroom </a></li>
							<?endif;?>  
								
						<li>Exeprtise Category : <?if (isset($userPublicView["UserDetail"]["ExpertiseCategory"]["name"])):?>
							<?=$userPublicView["UserDetail"]["ExpertiseCategory"]["name"]?> <? else:?>
							N/A <? endif;?>
						</li>

2                   <li>
                        Availability:  <?=$userPublicView["avail"]?>,
                    </li>

						<li>
							<div class="flag_icon">
								<?php echo $this->Html->image("country_flags/".$userPublicView["UserDetail"]["Country"]["country_flag"]); ?>

							</div> <?if (isset($userPublicView["UserDetail"]["Country"]["name"])):?>
							<?=$userPublicView["UserDetail"]["Country"]["name"]?> <? else:?>
							N/A <? endif;?>

						</li>


						<li> Project Category : 
							<?if (isset($userPublicView["UserDetail"]["LeaderCategory"]["name"])):?>
							<?=$userPublicView["UserDetail"]["LeaderCategory"]["name"]?> <? else:?>
							N/A <? endif;?>
                        </li>

                        <!-- userPublicView -->

						 <li>
							<?=$userPublicView["avail"] ?>
						</li> 
							
						<li> Projects:  <?=Project::getProjectsNumber($project_value['Project']['user_id'] )?>     
									 
						
						</li>
						
						
						<li> Working status : 
					        <? if ($userPublicView["User"]["role_id"]==1) echo "Signed as Expert";   ?>
							<? if ($userPublicView["User"]["role_id"]==2) echo "Signed as Both";   ?>
							<? if ($userPublicView["User"]["role_id"]==3) echo "Signed as Leader";   ?>
                        </li>
						
						<li>   <?= $this->Feedback->getSummary($project_value['Project']['user_id'],"leader"); ?>   </li>

					</ul>
				</div>
                <div class="clear"></div>
			</div>

			<!--  Detail_bottom  Stack   -->
			<div class="detail_bottom">

				<p>
					<?=$userPublicView['UserDetail']['about_us']?>
				</p>
				<div class="margin_bottom">
					Skills:
					<? foreach($userPublicView["skills"] as $s) 
											echo "<span class='col_blue'> {$s}   </span>";
										?>
				</div>
			</div>




		</div>


	</div>

	<!--  Project filess Goes Here    -->

	<div class="product_jobfiles">
		<h5>Project Files:</h5>
		<div class="add_edit_scrl" id="placement-examples">
			<ul>
        	<?php
		  if (isset($files )){
				foreach($files as  $file){?>
				<li>
					<?php echo  $file;?>
					<div class="edit_deletBX">
						<a href='/img/projects/<?=$project_value['Project']["id"]?>/plan/<?=$file?>'
							> <span class="exprt_smbl2 job_attche_download" alt="Download"
							title="Download"></span>
						</a>

					</div>
				</li>
				<?php 
				} 
				} 
            	?>
            </ul>
		</div>
	</div>



 <!-- Team Area starts Here   -->
     <div class="clear"></div>
    <div class="expert_detail"> 
    <h2 style='color:grey;'> TEAM   </h2>   	
	
	<?php if(!empty($leaderData)){ 	foreach($leaderData as $key=>$leader){?>
		  
		  
	  <div class="expert_detail">

			<h2 class="col_blue">  
			 
				<?php echo  $this->Html->link( $leader["job"]["Job"]["title"] . "-".  User::getuserName( $leader['User']["id"]),array('controller'=>'jobs','action'=>'job_detail',$leader["job"]["Job"]["id"]))?>
			
			</h2> 
			<div class="clear"></div>

		  <a href="/Workrooms/chatroom/<?=$leader['User']['id']?>" class="chat">
								   Chat in Chatroom </a> 

			<div class="deatil_content">
				<div class="detail_top">
					<div class="expert_img">
						<?php 
						 $user_img=$this->General->show_user_img($leader['User']['id'],$leader['UserDetail']['image'],'SMALL',$leader['User']['first_name'].' '.$leader['User']['last_name']);
						echo $this->Html->link($user_img,array('controller'=>'users','action'=>'user_public_view',$leader['User']['id']),array('div'=>false,'escape'=>false));

						?>
					</div>
					<div class="detail">
						<div class="nav_bar">
						 
						</div>
						<div class="clear"></div>
						<div class="fac_bar">
							<ul>
								<?php
								$data_value = $leader  ;
									$leadership_category_name = '';
									if(isset($leader['UserDetail']['LeaderCategory']['name']) &&!empty($leader['UserDetail']['LeaderCategory']['name']))
									{
										$leadership_category_name=$leader['UserDetail']['LeaderCategory']['name'];
									}
								?>
 								<?php if(true){?>
 								<li><span>Leadership Category</span>:<?php echo $leadership_category_name;?></li>
								<?php }?>
								<?php
									$country_name = '';
									
									$location = '';
									if(isset($leader['UserDetail']['Region']['name']) &&!empty($leader['UserDetail']['Region']['name']))
									{
										$location = $leader['UserDetail']['Region']['name'];
									}
									if(isset($leader['UserDetail']['Country']['name']) &&!empty($leader['UserDetail']['Country']['name']))
									{
										$location.= ",".$leader['UserDetail']['Country']['name'];
									}
									
									if(isset($leader['UserDetail']['State']['name']) &&!empty($leader['UserDetail']['State']['name']))
									{
										$location.= ",".$leader['UserDetail']['State']['name'];
									}
									?>
								<li><div class="flag_icon">
										<?php if(!empty($leader['UserDetail']['Country']['country_flag'])){ echo $this->Html->image(FLAG_DIR_TEMP_PATH.$leader['UserDetail']['Country']['country_flag'],array('title'=>ucfirst($country_name),'alt'=>ucfirst($country_name)));} ?>
									</div>
									<span>Location</span> <?php echo $location;?></li>


								<li><span>Reference Minimum Hourly Rate</span>:<?php echo $leader['UserDetail']['min_reference_rate'];?>
									Hrs/Week.</li>
								<li><span>Reference Maximum Hourly Rate</span>:<?php echo $leader['UserDetail']['max_reference_rate'];?>
									Hrs/Week.</li>
								<li>Number of Projects: <?=User::getNumberExpertProject($data_value["User"]["id"])?>
								</li>



								<li class="last">
									<?= $this->Feedback->getSummary($leader["User"]["id"],"expert"); ?>

								</li>
							</ul>
						</div>
						<div class="clear"></div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="detail_bottom">
					<p>
						<?php echo nl2br(ucfirst($leader['UserDetail']['about_us']));?>
					</p>

					<div class="skills">
						Skills:
						<?php
						$output = array();
						foreach( $leader['Skill'] as $leaderskill_name){
						  $output[] = '<span>'.ucfirst($leaderskill_name['name'])."</span>";
						}
						echo $skill_data=implode(',&nbsp;&nbsp;', $output);
					?>
					</div>
				</div>
			</div>

		</div>
		<div class="clear"></div>
		<?php 
		}
	}else{
	echo  "There are no allocated Team Members for this project yet" ; 
	}?>









	</div>
	
	
	
	
	<!--TEAM-->
   <div class="clear"></div>
   <div class="expert_detail">
   <h2 style='color:grey;'> TEAM-UP PROPOSALS </h2>   
	 <div class="clear"></div>

		<?php if(!empty($job_list)){
				
							$this->ExPaginator->options = array('url' => $this->passedArgs);
							$this->Paginator->options(array('url' => $this->passedArgs));
								
				foreach($job_list as $key=>$jobs){
				
				?>
		<div class="expert_detail">
			<h2 class="col_blue">
				<?php echo $this->Html->link($jobs['Job']['title'] ,array('controller'=>'jobs','action'=>'job_detail',$jobs['Job']['id']),array('class'=>'col_blue_title','title'=>$jobs['Job']['title'], 'target'=>'_blank',  'alt'=>$jobs['Job']['title'])); ?>
			</h2>
 		
 			<!--  APPLY   ON THAT    -->
  
  
    <? if (Workroom::isApply($this->Session->read('Auth.User.id'), $jobs["Job"]["id"]) 
									|| $this->Session->read('Auth.User.id') == $jobs['Job']['user_id']): ?> 
 
		<? else : 
				echo  "<button  rel='{$jobs["Job"]["id"]}'  class='search_btn_ri applyme' onclick='return false;'>  Apply & Chat in Workroom  </button> ";
		
		?> 
		
		<? endif;?> 
				 
			<!--  APPLY ON THAT -->

			<div class="clear"></div>
			<div class="deatil_content">
				<div class="detail_top">
					<div class="nav_bar padding_left margin_bottom">
						<ul>


							<?php  if (Workroom::getJob($jobs['Job']["id"])):?>
							<li style="border: none;"><a
								href="<?=Workroom::getJob($jobs['Job']["id"])?>"
									class="chat"> Chat in workroom </a></li>
							<? endif;?>


							<!-- Proposal  button  Goes  Here    -->

							<li>
								<? if (Workroom::isApply($this->Session->read('Auth.User.id'), $jobs["Job"]["id"]) || $this->Session->read('Auth.User.id') == $jobs['Job']['user_id']): ?>

								<? else : 
					echo  "<button  rel='{$jobs["Job"]["id"]}'  class='search_btn_blu_ri applyme' onclick='return false;'>   Apply   </button> ";
		
		?> <? endif;?>
							</li>
						</ul>
					</div>
					<div class="detail_bottom">
						<p>
							Description:
							<?php echo ucfirst(nl2br($jobs['Job']['description'])); ?>
						</p>
  
  
  
  
						<p class="font_fam">
							Collaboration Type :
							<?=Colloberation::getColaborationType($jobs['Job']['id'])?>
						</p>
						<p class="font_fam">
							Estimated job duration:
							<?=($jobs["Job"]["duration"])?>
						</p> 

	<?php if($jobs['Job']['look_contracter']=='1'){?>
						<p class="font_fam">
							Contracter Compansation:
							<?php if($jobs['Job']['delayed_payment']=='1' ){?>
							<span class="norm">Delayed Payment :<?php echo $jobs['Job']['delayed_payment_money']; ?>$
							</span>
							<?php }
												if($jobs['Job']['contracter_percent']=='1'){?>
							<span class="norm">& Percent :<?php echo $jobs['Job']['contracter_percent_value']; ?>%
							</span>
							<?php }?>
						</p>
						<?php }
									if($jobs['Job']['look_cofounder']=='1' && $jobs['Job']['cofounder_percent']=='1'){?>
						<p class="font_fam">
							Cofounder Compansation:<span class="norm">Percent :<?php echo $jobs['Job']['cofounder_percent_value']; ?>%
							</span>
						</p>
						<?php }?> 


						<p class="font_fam">
							Job posted: <span class="norm"> <?php
										echo $this->Time->timeAgoInWords($jobs['Job']['created'], array('format' => 'F jS, Y'));
									?>
							</span>
						</p>
						<p class="font_fam">
							Proposals:<span class="norm">3</span>
						</p>
						<p class="font_fam">
							Job Category:<span class="norm">
								<?php echo $jobs['Category']['name']; ?>
							</span>
						</p>
					
						<p class="font_fam">
							Refernce Budject: <span class="norm">
								<?php
									if (!empty($jobs['Job']['refrence_budget']))
									 echo $jobs['Job']['refrence_budget']."$";
									else 
									echo  "NA"; 

						 ?>
							</span>
						</p>
						<p class="font_fam">
							Type of Agreement:<span class="norm">Contractor</span>
						</p>

					
						
						<p class="font_fam float_left">
							Leader's location:<span class="norm">
								<?php echo ucfirst($jobs['Project']['User']['UserDetail']['Country']['name']); ?>
							</span>
						</p>
						<div class="peru_flag">
							<?php if(!empty($jobs['Project']['User']['UserDetail']['Country']['country_flag'])){ echo $this->Html->image(FLAG_DIR_TEMP_PATH.$jobs['Project']['User']['UserDetail']['Country']['country_flag'],array('title'=>ucfirst($jobs['Project']['User']['UserDetail']['Country']['name']),'alt'=>ucfirst($jobs['Project']['User']['UserDetail']['Country']['name'])));} ?>
						</div>
						 
					
						<div class="clear"></div>
						<p class="font_fam">
							Req. Location: <span class="norm">
								<?php echo ucfirst($jobs['Region']['name']);?> <!--  Country City and other  -->
								<?php if (isset($jobs['Country']['name']) &&  $jobs['Country']['name']!="NA"):?>
								,<?php echo ucfirst($jobs['Country']['name']);?> <? endif;?> <?php if (isset($jobs['State']['name']) && $jobs['State']['name']!="NA"):?>
								,<?php echo ucfirst($jobs['State']['name']);?> <? endif;?> <?php if (isset($jobs['Job']['city']) && $jobs['Job']['city']!="NA" && $jobs['Job']['city']!=""   ):?>
								,<?php echo ucfirst($jobs['Job']['city']);?> <? endif;?>

							</span>



						</p>
	 
	 
						<!--   Req Availibility :    -->
					
  						<p class="font_fam">
							Req/ Availablility:<span class="norm">
								<?php echo $jobs['Job']['compensation_avalibility'];?> Hrs./Week
							</span>
						</p> 
						
						<p class="font_fam">
							Requried skills:<span class="col_blue norm"> <?php 
												$output = array();
												foreach( $jobs['Skill'] as $jobskill_name){
												  $output[] = $jobskill_name['name'];
												}
												echo $skill_data=implode(', ', $output);
												?>
							</span>
						</p>

						<?php App::import("model","jobInvite");?>
						<!--  check for Apply  Invitation   -->
						<?php if (jobInvite::isInvited($this->Session->read('Auth.User.id'), $jobs['Job']["id"])):?>
						<a href='/users/decline/<?=$jobs['Job']["id"]?>'> Decline
							Invitation </a>
						<?endif;?>

					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		<?php 	}
			}
			else{
				echo  "There are no open Team-up proposals";  
			}
			?>
	 
	
	
	
	</div>   
	








	
</div>




