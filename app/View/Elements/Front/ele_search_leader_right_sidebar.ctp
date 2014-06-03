<h2 class="float_left"><a href="#" class="txt_trans"><?php echo $this->Paginator->counter(array('format' => '( %start% - %end%  of %count% results )'));?></a></h2>
	<span class="slct_rwndInPut sort_dropawn dropdwn_H">
			<?php
				  $option=array('first_name'=>'First Name','last_name'=>'Last Name','registration_date'=>'Registration Date');
			echo ($this->Form->input('User.sortby', array('div'=>false, 'label'=>false,'empty'=>'-- SortBy --','options'=>$option,"class" => "custom_dropdown slct_rwndInPutRi with_sml1",'onchange'=>'javascript:usersortBy();')));
				
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
	
	
	<?php if(!empty($leaderData)){
	//pr($leaderData);
				/* $this->ExPaginator->options = array('url' => $this->passedArgs);
				$this->Paginator->options(array('url' => $this->passedArgs)); */
	foreach($leaderData as $key=>$leader){?>
		<div class="expert_detail">
			<h2 class="col_blue"><?php echo  $this->Html->link( User::getuserName($leader['User']['id']) ,array('controller'=>'users','action'=>'user_public_view',$leader['User']['id']))?></h2>
			<div class="clear"></div>
			<!--
			<div class="whtlist">
				<a class="flr_icon blue_i" href="#"></a>
				<p><a href="#">Add to watchlist</a> </p>
			</div>
			-->
			<div class="deatil_content">
				<div class="detail_top">
					<div class="expert_img sets-1">
						<?php 
						 $user_img=$this->General->show_user_img($leader['User']['id'],$leader['UserDetail']['image'],'SMALL',$leader['User']['first_name'].' '.$leader['User']['last_name']);
						echo $this->Html->link($user_img,array('controller'=>'users','action'=>'user_public_view',$leader['User']['id']),array('div'=>false,'escape'=>false));

						?></div> 
						 
						<!--   Large Image Goes  Here    -->  
						 <div class='largeimage sets-1' style='display:none;position:absolute; top: 0; left: -408px; width: 400px; max-height: 500px; overflow: hidden; z-index: 3; border: 1px solid white;'  >
						   <?php 
						 $user_img=$this->General->show_user_img($leader['User']['id'],$leader['UserDetail']['image'],'BIG',$leader['User']['first_name'].' '.$leader['User']['last_name']);
						echo $this->Html->link($user_img,array('controller'=>'users','action'=>'user_public_view',$leader['User']['id']),array('div'=>false,'escape'=>false));

						?> 
						 
						 </div> 
						 
						<!--   End LArge   Iamge    -->
						
					<div class="detail">
						<div class="nav_bar">
							<ul> 
							
										<? if ($leader['User']['id'] != $this->Session->read('Auth.User.id')): ?> 
								<li style="border:none;"> <a href="/Workrooms/chatroom/<?=$leader['User']['id']?>" class="chat">  Chat in Chatroom </a></li>
								 <? endif;?> 
								  
							</ul>
						</div>
						<div class="clear"></div>
						<div class="fac_bar">
						 
							 <!-- First Line  :   -->   
 								 <p class='first_line'> 	

		 								 <?php 
		 									 $data_value = $leader ;   
 


										?> 
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
 											Availability:  <?=$data_value["avail"]?>  
											<?/*php if($data_value['User']['role_id']==Configure::read('App.Role.Provider') 
											|| $data_value['User']['role_id']==Configure::read('App.Role.Both') ){?>
											  Day job $/hr. :  </span> 
 											<?php  
 											if ($data_value['UserDetail']['min_reference_rate']!="")  
								       		echo  $data_value['UserDetail']['min_reference_rate']; 
								       		else 
								       		echo "N/A" ;  
										       	 if ($data_value['UserDetail']['max_reference_rate']!="")  
								       		echo  "-". $data_value['UserDetail']['max_reference_rate'];  
								       	    ?> 
	 										 <?php
											}
											*/?>
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
									 <?if ($country_name){?>
									 <div class="flag_icon"> 
										 <?php if(!empty($data_value['UserDetail']['Country']['country_flag'])) 
									 	{ echo $this->Html->image(FLAG_DIR_TEMP_PATH.$data_value['UserDetail']['Country']['country_flag'],
									 		array('title'=>ucfirst($country_name),'alt'=>ucfirst($country_name)));}?>
									 </div>, <?}?>
								 
									  Projects:  <?=$data_value["projects_num"]?>     
									  <?= $this->Feedback->getSummary($data_value["User"]["id"],"leader"); ?>
  
 									 </div> 

									 
 
								
							  





							  <!-- End users Details -->   




						</div>
						<div class="clear"></div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="detail_bottom">
					<p><?php echo nl2br(ucfirst($leader['UserDetail']['about_us']));?> </p>
                    <p class="readmore">
                        <? if (strlen($leader['UserDetail']['about_us'])>200)
                        echo "...."; ?>


                    </p>
					<div class="skills">Skills:<?php
						$output = array();
						foreach( $leader['Skill'] as $leaderskill_name){
						  $output[] = '<span class="col_blue">'.ucfirst($leaderskill_name['name'])."</span>";
						}
						echo $skill_data=implode(',&nbsp;&nbsp;', $output); 
						if (count($leader['Skill'] )==0) 
							echo  "Not Specified"; 

					?></div>
				</div>
			</div>	
			 
		</div>
		<div class="clear"></div>
	<?php 
		}
	}else{
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