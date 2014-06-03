<h2 class="float_left"><a href="javascript:void(0);" class="txt_trans"><?php echo $this->Paginator->counter(array('format' => '( %start% - %end%  of %count% results )'));?></a></h2>
	<span class="slct_rwndInPut sort_dropawn dropdwn_H">
	<?php
	App::import("model","Skill");
	$option=array('first_name'=>'First Name','last_name'=>'Last Name','created'=>'Registration Date');
	echo ($this->Form->input('User.sortby', array('div'=>false, 'label'=>false,'empty'=>'-- SortBy --','options'=>$option,"class" => "slct_rwndInPutRi custom_dropdown with_sml1",'onchange'=>'javascript:expertsortBy();')));
	?>
	</span>
	<div class="clear"></div>
		<script type='text/javascript'>  
		
		jQuery(document).ready(function(){
			jQuery(".expert_img a").mouseenter(function(){
				jQuery(this).parent().parent().find(".largeimage").show();
			});
			jQuery(".expert_img a").mouseleave(function(){
				jQuery(this).parent().parent().find(".largeimage").hide();
			});
			
			
			
		});
	
	</script>
	
	<?php
	if(!empty($data))
	{

		foreach($data as $data_key=>$data_value)
		{
			
	?>
			<div class="expert_detail">
				<h2><?php echo  $this->Html->link( User::getuserName($data_value['User']['id'])  ,array('controller'=>'users','action'=>'user_public_view',$data_value['User']['id']))?></h2>
				<div class="clear"></div>
				 
				<div class="deatil_content">
					<div class="detail_top">
						<div class="expert_img sets-1">
						<?php 
						 $user_img=$this->General->show_user_img($data_value['User']['id'],$data_value['UserDetail']['image'],'SMALL',$data_value['User']['first_name'].' '.$data_value['User']['last_name']);
						 echo $this->Html->link($user_img,array('controller'=>'users','action'=>'user_public_view',$data_value['User']['id']),array('div'=>false,'escape'=>false));

						?>
						</div> 
						
							<!--   Large Image Goes  Here    -->  
						 <div class='largeimage sets-1' style='display:none;position:absolute; top: 0; left: -408px; width: 400px; max-height: 500px; overflow: hidden; z-index: 3; border: 1px solid white;'>
						   <?php 
						  $user_img=$this->General->show_user_img($data_value['User']['id'],$data_value['UserDetail']['image'],'BIG',$data_value['User']['first_name'].' '.$data_value['User']['last_name']);
						echo $this->Html->link($user_img,array('controller'=>'users','action'=>'user_public_view',$data_value['User']['id']),array('div'=>false,'escape'=>false));
						 
						?> 
						 
						 </div> 
						 
						<!--   End LArge   Iamge    --> 
						
						
						<div class="detail">
							<div class="nav_bar">
								<ul>
								  <li style="border:none;">
								  <a href="/Workrooms/chatroom/<?=$data_value['User']['id']?>" class="chat">
								   Chat in Chatroom </a></li>
								 
								 <? if (isset($expert)):?> 
								 	<li style="padding-top: 1px;">  
								 		<a href='javascript:void(0)' class='invite_team invite_job' rel='<?=$data_value["User"]["id"]?>' >  Invite to team-up</a>
								 	</li>  
								 <?php endif?> 	
								 	
								 	 
								</ul>
							</div>
							<div class="clear"></div>
							<div class="fac_bar">
								 
							 


							 <!-- First Line  :   -->   
 								 <p class='first_line'> 
 										<?php
									  	  		if(isset($data_value['UserDetail']['ExpertiseCategory']['name']) &&!empty($data_value['UserDetail']['ExpertiseCategory']['name']))
												{
												  echo  $data_value['UserDetail']['ExpertiseCategory']['name']."";
												}
										 		if(isset($data_value['UserDetail']['LeaderCategory']['name']) )
												{
												  echo  ", ".$data_value['UserDetail']['LeaderCategory']['name'];
												}  
	 											if ($data_value["status"]!="") 
											 	echo  ", ". $data_value["status"]; 
										?>
									
									 </p>  



										<!-- Second  Line  Start Here   --> 
									   <p class='second_line'>  
 											Availability:  <?=$data_value["avail"]?>,
											<?php if($data_value['User']['role_id']==Configure::read('App.Role.Provider') 
											|| $data_value['User']['role_id']==Configure::read('App.Role.Both') ){?>&nbsp;Day job $/hr. :  </span> 
 											<?php  
 											if ($data_value['UserDetail']['min_reference_rate']!="")  
								       		echo  ((int) $data_value['UserDetail']['min_reference_rate']);
								       		else 
								       		echo "N/A" ;  
										       	 if ($data_value['UserDetail']['max_reference_rate']!="")  
								       		echo  "-". ((int) $data_value['UserDetail']['max_reference_rate']);
								       	    ?> 
	 										 <?php
											}
											?>
 										</p> 


 										<!-- Therd  Line Goes Herer  -->   
 										<div class='therd_line'>  
                                    <?php
									  $country_name = '';
									  if(isset($data_value['UserDetail']['Country']['name']) 
									  &&!empty($data_value['UserDetail']['Country']['name']))
									  $country_name=$data_value['UserDetail']['Country']['name'];
									  ?> 

									 

									 <?php echo ucfirst($country_name);?>
									 <div class="flag_icon" style="margin-right: 0;"> 
										 <?php if(!empty($data_value['UserDetail']['Country']['country_flag'])) 
									 	{ echo $this->Html->image(FLAG_DIR_TEMP_PATH.$data_value['UserDetail']['Country']['country_flag'],
									 		array('title'=>ucfirst($country_name),'alt'=>ucfirst($country_name)));}?>
									 </div> ,&nbsp; 
								 
									  Projects:  <?=$data_value["projects_num"]?>,&nbsp;   
									  <?= $this->Feedback->getSummary($data_value["User"]["id"],"expert"); ?> 
  
 									 </div> 
                            </div>
							<div class="clear"></div>
						</div>
						<div class="clear"></div>
					</div>

					<div class="detail_bottom">
					<p><?php echo nl2br(ucfirst($data_value['UserDetail']['about_us']));?></p>
                    <p class="readmore">
                        <?
                                if (strlen($data_value['UserDetail']['about_us'])>200)
                                    echo "....";
                                ?>

                    </p>
					<div class="skills"><!--Skills: <span>PHP5 1</span>, <span>MySql</span>, <span>Programming Aptitute</span>-->
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
				</div>
			
			</div>
			<div class="clear"></div>
	<?php
		}
	}
	else{
		echo $this->element('Front/ele_no_record_found');
	}?>
	<div class="paginatn">
		<p><a href="javascript:void(0);" id="back_to_top">Back to top ^</a></p>
		<?php if($this->request->params['paging']['User']['count']>=Configure::read('App.PageLimit')){ ?>
			<?php echo $this->element("Front/ele_paging"); ?>
		<?php }?>
	</div>
<script>
$("#back_to_top").click(function(){
	$('html, body').animate({ scrollTop: 0 }, 1000);
});
</script>	
