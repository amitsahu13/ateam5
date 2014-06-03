 <!--  Some Project Stuff List For   THe USer   --> 
 <!--  pashkovdenis@gmail.com 2013 --> 
 <?
 	App::import("model" ,  "Workroom"); 
 	
 ?>
<div class="right_sidebar" id="my_project">
		<?php
		echo $this->Form->create('Project',array('url' => array('controller' => 'projects', 'action' => 'my_project'),'type'=>'file'));
		?>	
		
		 <h2><a href="javascript:void(0); ">My projects</a>
			 
            </h2>
			<?php if(isset($data) && !empty($data))
			{	
				$i=0;
				
				foreach($data as $project_key=>$project_val)
				{
					
					
				?>
					<div class="product_dscrpBOX" style="width:100%;">
						<h3><?php echo ucfirst($project_val['Project']['title']);?>
						 
						
						</h3>
						<div class="product_dscrpBOX_left">
							<div class="product_dscrpBOX_left_img">
								 
								<?php 
								echo $this->General->show_project_img($project_val['Project']['id'],$project_val['Project']['project_image'],'THUMB',$project_val['Project']['title']);
								?>    
							</div>
							<div class="product_dscrpBOX_left_discrpsn">
								<ul>
									
									<?php
									$pmilestone_date = '';
									$pmilestone_release = '';
									$today = date("Y-m-d");
									
									if(!empty($project_val['ProjectMilestone']))
									{
										foreach($project_val['ProjectMilestone'] as $key1=>$value1)
										{
											if($value1['date']>$today)
											{
												$pmilestone_date = $value1['date'];
												$pmilestone_release = $key1;
												$pmilestone_release++;
												break;
											}
										}
									}
									if(!empty($pmilestone_date))
									{
									?>
									<li><span class="flg"></span>Next Mileastone: <?php echo $this->Html->link('',array('controller'=>'projects','project_status_timeline',$project_val['Project']['id']),array('class'=>'edit'))?></li>
									<li><?php echo "Release&nbsp;$pmilestone_release&nbsp;Integration"?></li>
									<li><?php echo "Date:&nbsp;".date('d.m.y',strtotime($pmilestone_date));?></li>
									<?php
									}
									?>
								</ul>
							</div>
						</div>
						
						
						<div class="product_dscrpBOX_ryt" style="float:left; margin-left:22px;">
							<ul>
								<li style="margin-bottom:8px;">Leader: </li>
								<li class="skyblue"><?php echo  User::getuserName( $project_val['User']["id"]);?></li>
								<?php
								$expert = array();
								
								if(!empty($project_val['Job']))
								{
									
									foreach($project_val['Job'] as $expert_key => $expert_value)
									{
										if(isset($expert_value['JobBid']['User']) && !empty($expert_value['JobBid']['User']))
										{
										$name =  User::getuserName(  $expert_value['JobBid']['User']["id"]);
										if (!in_array($name,$expert))
											$expert[] = $name ;
										}
									}
								}
								
								?>
								 
						  <?  if ( isset( $apply[$project_val['Project']['id']] ) &&   $apply[$project_val['Project']['id']]==2):  ?>
								<li>Experts:</li>
								<?php
								if(!empty($expert))
								{
									foreach($expert as $val)
									{
								?>
								 <li class="pink"><?php echo ucfirst($val);?></li>
								<?php
									}
								}else{
									echo "There is no applied experts.";

								}
								?> 
								<? endif; ?>
							 </ul>
						 </div> 
						
						
					 <div class="more_infoDV">
							<ul>
								<li style="margin-bottom:8px;"> Actions:</li> 
								<li>
								 <?php
									echo $this->Html->link('Project page',array('controller'=>'projects','action'=>'public_view',$project_val['Project']['id']),array('div'=>false,'escape'=>false,'class'=>'post_a_job'));
								?>
								
								</li>
								<!--
                                <li>   <a href='<?=Workroom::getProject($project_val['Project']['id'])?>'> Project Workroom</a>  </li>
                                  -->

                                <?  if (isset($apply[$project_val['Project']['id']]) && $apply[$project_val['Project']['id']]==2):  ?>
								   	<li>    
								   	  <? echo $this->Html->link('Project Workroom',array('controller'=>'workrooms','action'=>'projecto',$project_val['Project']['id']),array('div'=>false,'escape'=>false,'class'=>'post_a_job')); ?>  
								   	
								   	
								   	 </li> 
								   	 	<li>  More  
								   			<ul>  
								   				<li> Leave Project </li>
								   			</ul> 	
								   	 	</li>  
								   	
								 <? endif;?>
							 
						
							</ul>
						</div>
					</div>
					
					<div class="jobprogres_step">
					
					
					
						<?php
						if(!empty($project_val['Job']))
						{
						?>
						
						
						
						
						
						<ul>
							<?php
							foreach($project_val['Job'] as $key=>$value)
							{ 
						   		
								if (!isset( $job_status[$value["id"]] )  &&  in_array($value["id"], $invited)==false) 
								continue;  

							?>
							<li>
								<div class="jobprogres_step_Bx">
									<div class="step_Bx"> 
									
									
										<h4>
									<?php
										 $status =  JobBid::getStatus($value["id"], $current_user); // 
									 


									 if ($status  >0   &&  $value['status']!=Configure::read('App.Job.Completed')) {

								if (! in_array($value["id"], $invited)){
									 	if  ($status == 1 &&  $value["JobBid"]["user_id"]  ==  $current_user)
									 				echo JobBid::$STAUS_LIST[4]  ;  
									 		else  
										    echo JobBid::$STAUS_LIST[$status]  ;  
 								}else
									echo "Job Invitation";

									 
							}else{ 
if (! in_array($value["id"], $invited)){


										if($value['status']==Configure::read('App.Job.Active'))
										{
											echo ACTIVE_JOB;
										}
										if($value['status']==Configure::read('App.Job.Awarded'))
										{
											echo AWARDED_JOB;
										}
										if($value['status']==Configure::read('App.Job.Completed'))
										{
											echo COMPLETE_JOB;
										}
							}else
									echo "Job Invitation";



								}



										?>
										</h4>
										
										
										
										
									</div>
									<div class="step_Bx_title">
										<h2>  
										<?php
									echo $this->Html->link( ucfirst($value['title']) ,array('controller'=>'jobs','action'=>'job_detail', $value["id"]),array('div'=>false,'escape'=>false,'class'=>'post_a_job'));
								?> 
								
										 
										  </h2>
									</div>





									<?php
									if($value['status']==Configure::read('App.Job.Active'))
									{
									?>	
										<div class="step_Bx_Txt">
											<p>Job Description - <?php echo nl2br(ucfirst($value['description']));?></p>
										</div>  
										<?
										$mio =  new  JobBid() ;
												$v = $mio->find("list", array("conditions"=>array("job_id"=>$value["id"], "status"=>1)));
 
										?>
									
									
									
									 <div class="more_infoDV" style="float: left; margin-left: 12px;">
									 <ul>
									 <li>
								    <?php
									    echo $this->Html->link(  "Job Page" ,array('controller'=>'jobs','action'=>'job_detail', $value["id"]),array('div'=>false,'escape'=>false,'class'=>'post_a_job', 'style'=>'background-position: 0 -559px'));
								      	echo "<br> ";
										if ( isset($job_status[$value["id"]]) && $job_status[$value["id"]] == 3) {
				 						echo $this->Html->link(  "Decline Invitation" ,array('controller'=>'jobs','action'=>'decline', $value["id"]),array('div'=>false,'escape'=>false,'class'=>'post_a_job'));
 									  }							
 									 ?>  
									 </li>
									 </ul> 
									 <div class="my-job_photo" style="text-align: center">
									 <? if ($status ==3 )
									 	echo  Workroom::getjobExpertPhoto($value["id"]);
									 ?>  
									 
									 
									 <?php if (jobInvite::isInvited($this->Session->read('Auth.User.id'), $value["id"])):?> 
									 <a href='/users/decline/<?=$value["id"]?>'> Decline Invitation </a>
									<?endif;?>  
									
									 
									 </div>
                                         <!-- Workroom   Job  Expert View :  -->
                                         <?
                                          if ($status !=2   &&  $value['status']!=Configure::read('App.Job.Completed')  ):?>
                                         <div class="step_MsgDV">
                                             <div class='workroomsdiv'  >

                                                 <h4><a href='<?=Workroom::getJob( $value["id"]); ?>'>
                                                     Workroom </a> <span>

 							   								<? echo  Workroom::getMessageCount( Workroom::getJob( $value["id"],true ));?>
							   					</span>   </h4>

                                             </div>
                                         </div>
                                         <? endif;?>
								     </div>
									 
									 <?
									  			$mio =  new  JobBid() ;
												$v = $mio->find("count", array("conditions"=>array("job_id"=>$value["id"], "status"=>1)));
 												$bids  =   $mio->find("all", array("conditions"=>array("job_id"=>$value["id"])));
												$users =array(); 
												 		foreach($bids as $b){
														$users[] =   $b["JobBid"]["user_id"] ;  
													 	}  
														$work  =  new Workroom(); 
											    	 $roomws =   $work->find("all" , array("conditions"=> array(  "project_id"=> $project_val['Project']['id'], "user_id"=>$users, "type"=>0   ))  );
								
							 
									 
									 ?>





                                    <?php
									}
									if($value['status']==Configure::read('App.Job.Awarded') || $value['status']==Configure::read('App.Job.Completed'))
									{
									?>
										<div class="step_MsgDV">
											<h4><span class="exprtName"></span> Message Board</h4>
											<h4><span>2</span> Message Board</h4>
										</div>
										
											<?php
											$jmilestone_date = '';
											$jmilestone_release = '';
											$today = date("Y-m-d");
											
											if(!empty($value['JobMilestone']))
											{
												foreach($value['JobMilestone'] as $key2=>$value2)
												{
													if($value2['date']>$today)
													{
														$jmilestone_date = $value2['date'];
														$jmilestone_release = $key2;
														$jmilestone_release++;
														break;
													}
												}
											}
											if(!empty($jmilestone_date))
											{
											?>
												<div class="step_discrpsn">
													<ul>
														<li><span class="flg"></span>Next Mileastone:</li>
														<li><?php echo "Release&nbsp;$jmilestone_release&nbsp;Integration"?></li>
														<li><?php echo "Date:&nbsp;".date('d.m.y',strtotime($jmilestone_date));?></li>
														
													</ul>
												</div>
											
											<?php
											}
											?>		
									<?php
									}
									?>
								</div>
							</li>
							<?php
							}
							?>
							
						</ul>
						<?php
						}
						else
						{
						?>
						<ul>
							<li>
								<div class="jobprogres_step_Bx" style="min-height:50px;width:607px;text-align:center;padding-left:110px;">
								<?php
									echo '<div class="flash_bad"  style="width:425px;margin-top:10px;">No Jobs Found.</div>';
								?>
								</div>
							</li>
						<ul>		
						<?php
						}
						?>
					</div>
				
				<div class="Seprator_DV">&nbsp;</div>
			<?php 
				$i++;	
				}
			}else{
			?>
			<div class="product_dscrpBOX flash_bad" style="width:630px;margin-top:10px;">
				<?php echo "No Projects Found.";?> 
						<script type='text/javascript'>  
						jQuery(document).ready(function(){
							jQuery("#back_to_top").hide(); 
							
						});
				
				</script>
			</div>
		<?php		
			
			}?>
			
	<div class="paginatn">
		<p><a href="javascript:void(0);" id="back_to_top">Back to top ^</a></p>
		<?php if($this->request->params['paging']['Project']['count']>=Configure::read('App.PageLimit')){ ?>
			<?php echo $this->element("Front/ele_paging"); ?>
		<?php }?>
	</div>
	<?php
		echo $this->Form->end();
	?>
                
</div>
<script>
$("#back_to_top").click(function(){
	$('html, body').animate({ scrollTop: 0 }, 1000);
});
</script>
 
 
 
 <script type='text/javascript'>
 

jQuery(document).ready(function(){
	jQuery("select.workrooms").change(function(){
		var val  =  jQuery(this).find("option:selected").val(); 
 		window.location  =  "<?= Router::url('/', true)?>workrooms/workroom/"+val; 
	
});
	
});



 





</script>

