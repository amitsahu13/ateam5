
<div class="right_sidebar" id="my_project">
		<?php
		echo $this->Form->create('Project',array('url' => array('controller' => 'projects', 'action' => 'my_project'),'type'=>'file'));
		?>	
		<h3 class="titleh3">  My Projects   </h3> 
			 
            </h2>
			<?php if(isset($data) && !empty($data))
			{	
				$i=0;
				
				foreach($data as $project_key=>$project_val)
				{
					
					
				?>
					<div class="product_dscrpBOX" style="width:100%; min-height: 0;">
						<h3><?php echo ucfirst($project_val['Project']['title']);?>
						<?php
		
							echo $this->Html->link('',array('controller'=>'projects','action'=>'project_general',$project_val['Project']['id']),array('div'=>false,'escape'=>false,'class'=>'edit'));
						if  ($project_val["Project"]["status"]==0)
						echo  "(Closed - Invisible)"  ;
						
								
		?>
						
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
								<li class="skyblue"><?php echo ucfirst($project_val['User']['first_name']).' '.ucfirst($project_val['User']['last_name']);?></li>
								<?php
								$expert = array();

								if(!empty($project_val['Job']))
								{
									
									foreach($project_val['Job'] as $expert_key => $expert_value)
									{
										if(isset($expert_value['JobBid']['User']) && !empty($expert_value['JobBid']['User']))
										{
											$expert[] = $expert_value['JobBid']['User']['first_name']." ".$expert_value['JobBid']['User']['last_name'];
										}
									}
								}
								
								?>
								
								
								<!--  Echo  Expertw Here   Goes Stack  List   -->
								<li>Experts:</li>
								<?php
								if(!empty($expert))
								{
										$added = array(); 
									foreach($expert as $val)
									{
										if (in_array($val,  $added))  
												continue;  
															$added[] = $val ;  
								?>
										<li class="pink"><?php echo ucfirst($val);?></li>
								<?php
									}
								}else{
									echo "There is no applied experts.";

								}
								?>
							 
							</ul>
						 
						</div> 
						
						 
						<div class="more_infoDV">
						
						<?php  	if  ($project_val["Project"]["status"]!=0):?> 
							<ul>
								<li style="margin-bottom:8px;"> Actions:</li> 
								
								<? App::import("model","Workroom");  
 								?>
								<li>
								 <?php
									echo $this->Html->link('View Project',array('controller'=>'projects','action'=>'public_view',$project_val['Project']['id']),array('div'=>false,'escape'=>false,'class'=>'post_a_job'));
								?>
								 </li> 
								 <li>   <a href='<?=Workroom::getProject($project_val['Project']['id'])?>'> Project Workroom</a>  </li> 
								 <li>
										<a href='/jobs/job_general/<?=$project_val['Project']['id']?>?new=1' class='post_job'> Post a job</a>
								</li>
							 
								 <!--  Close Project to all that sgheet    -->
								<!-- <li> <div class="js-moreLink" style="cursor: pointer;">More <i class="icon-arrow-bottom"></i></div>
								 		<ul class="js-moreHide"> 
								 			<li> <?php
									// echo $this->Html->link('Close Project',array('controller'=>'projects','action'=>'closeproject',$project_val['Project']['id']),array('div'=>false,'escape'=>false,'class'=>'post_a_job'));
									?> </li>
								-->
								 		</ul>
								 			
								  </li> 
								 
								 
							</ul>
							<?endif;?> 
							
							
							
						</div>
					</div>
					
					
					
					
					
					
					
					
					
					
					
					
					 <!--    Job list Begins Here  :   -->   
					 
					 
					 
					 
					 
					<div class="jobprogres_step">
						<?php
						if(!empty($project_val['Job']))
						{
						?>
						<ul>
							<?php
							foreach($project_val['Job'] as $key=>$value)
							{
							?>
							<li>
								<div class="jobprogres_step_Bx">
									<div class="step_Bx"> 
										<h4>   

 
							<?php
										 
 									$status =  JobBid::getStatus($value["id"], $current_user); // 
									 

									 if ($status  >0   &&  $value['status']!=Configure::read('App.Job.Completed')) {
										echo JobBid::$STAUS_LIST[$status] ;  
									 
							}else{ 



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



								}

if ($status == 0  ||   $status  ==  1  ) 
										echo  " <a href='/jobs/job_general/{$value["project_id"]}/{$value["id"]}' class='edit edt'>      </a> ";   
								 

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
									<div class="my-job_photo" style="text-align: center">
									<?
										if ($status == 3) 
											echo  Workroom::getjobExpertPhoto($value["id"]); 
											
									?></div>
									<?php
									
									if($value['status']==Configure::read('App.Job.Active'))
									{ 
									
									?> 
										
										
										<div class="step_Bx_Txt">
											<p>Job Description - <?php echo nl2br(ucfirst($value['description']));?></p>
										</div>  
										<?
												$mio =  new  JobBid() ;

												$v = $mio->find("count", array("conditions"=>array("job_id"=>$value["id"])));

 												$bids  =   $mio->find("all", array("conditions"=>array("job_id"=>$value["id"], "status"=>1)));
												$users =array(); 
												 		foreach($bids as $b){
														$users[] =   $b["JobBid"]["user_id"] ;  
													 	}  
														$work  =  new Workroom(); 
											    	 $roomws =   $work->find("all" , array("conditions"=> array(  "project_id"=> $project_val['Project']['id'], "user_id"=>$users, "type"=>0   ))  );
								
														 

                //Workroom::getJob( $data["Job"]["id"])
											    	 	 
											    	  


										?>  
										
									 
										<? if ($status !=2   &&  $value['status']!=Configure::read('App.Job.Completed') && $v):?>
										<!--  job titles  -->
										<div class="step_MsgDV"> 
										
										<?  
										 

									  if ( $status  != 3 ):  
										?> 
										
										 <h4>
										  <?=	 $this->Html->link( "Applications" ,array('controller'=>'jobs','action'=>'job_detail', $value["id"]),array('div'=>false,'escape'=>false,'class'=>'post_a_job'));
										   ?><span style="margin-left: 5px;"><?= ($v?($v):"0" )?></span>
										       </h4> 
										       <? else:?>  
										        
										        
										 	<div class='workroomsdiv'  >

                    		   					<h4><a href='<?=Workroom::getJob( $value["JobBid"]["job_id"]); ?>'>
                                                    Workroom </a> <span>
 							   								<? echo  Workroom::getMessageCount(Workroom::getJobWorkRoom( $value["id"],true));?>
							   					</span>   </h4> 
											 	   
											 	  
											 </div> 
										        
										       
										       <? endif;?>  
										       
										       
										
												  
												  
												  
											 	</div>
										<? endif ;?>
										
								
										
										
										
										
									   <!--  Job   End  title  -->
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
									echo '<div class="flash_bad"  style="width:425px;margin-top:7px;">No Jobs Found.</div>';
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
			<div class="product_dscrpBOX flash_bad" style="width:630px;margin-top:0;">
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
<script type='text/javascript'>
$("#back_to_top").click(function(){
	$('html, body').animate({ scrollTop: 0 }, 1000);
});


jQuery(document).ready(function(){
	jQuery("select.workrooms").change(function(){
		var val  =  jQuery(this).find("option:selected").val(); 
 		window.location  =  "<?= Router::url('/', true)?>workrooms/workroom/"+val; 
	
});
	
});


$(document).ready(function(){
	$('.js-moreHide').hide();
	$('.js-moreLink').click(function(){
		$(this).find('i').toggleClass('active');
		$(this).parent().find('.js-moreHide').slideToggle();
	});
});
 





</script>
