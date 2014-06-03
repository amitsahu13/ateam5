 
		<h2 class="float_left"><a href="#" class="txt_trans"> <?php echo $this->Paginator->counter(array('format' => '( %start% - %end%  of %count% results )'));?></a></h2> 
		
	
		
			<span class="slct_rwndInPut sort_dropawn dropdwn_H">
			
			<?php
				  $option=array('job_name'=>'Job Name','posting_date'=>'Posting Date');
			echo ($this->Form->input('Job.sortby', array('div'=>false, 'label'=>false,'empty'=>'-- SortBy --','options'=>$option,"class" => "custom_dropdown slct_rwndInPutRi with_sml1",'onchange'=>'javascript:jobsortBy();')));
				
			?> 
			</span>
			<div class="clear"></div>
			<?php if(!empty($job_list)){
				
							$this->ExPaginator->options = array('url' => $this->passedArgs);
							$this->Paginator->options(array('url' => $this->passedArgs));
								
				foreach($job_list as $key=>$jobs){
				
				?>
					<div class="expert_detail">
						<h2>
						<?php echo $this->Html->link($jobs['Job']['title']." @ ".$jobs["Project"]["title"] ,array('controller'=>'jobs','action'=>'job_detail',$jobs['Job']['id']),array('class'=>'col_blue_title','title'=>$jobs['Job']['title'], 'target'=>'_blank',  'alt'=>$jobs['Job']['title'])); ?></h2>
						 
						<div class="clear"></div>
						<div class="deatil_content">
							<div class="detail_top">
								<div class="nav_bar padding_left" style="margin-bottom: 15px;">
									<ul> 
									<?
									App::import("model", "Workroom"); 
									App::import("model", "Colloberation");  
									?> 
									<li> 
									<? if (Workroom::isApply($this->Session->read('Auth.User.id'), $jobs["Job"]["id"]) 
									|| $this->Session->read('Auth.User.id') == $jobs['Job']['user_id']): ?> 
 
		<? else : 
				echo  "<button  rel='{$jobs["Job"]["id"]}'  class='search_btn_ri applyme' onclick='return false;'>  Apply & Chat in Workroom  </button> ";
		
		?> 
		
		<? endif;?> 
						</li> 
						
						
									
								 
									
								 
									</ul>
								</div>
									<div class="expert_img sets-1" style="margin-left: 20px;">
									<!--   Pictures  Goes Here   -->
  									<?php  echo $this->General->show_project_img($jobs['Project']['id'],$jobs['Project']['project_image'],'SMALL',$jobs['Project']['title']); ?>
  									
  												<!--   Large Image Goes  Here    -->  
						 <div class='largeimage sets-1' style='display:none;position:absolute; top: 0; left: -408px; width: 400px; max-height: 500px; overflow: hidden; z-index: 3; border: 1px solid white;'>
							<?php  echo $this->General->show_project_img($jobs['Project']['id'],$jobs['Project']['project_image'],'BIG',$jobs['Project']['title']); ?>
						 </div> 
						 
						<!--   End LArge   Iamge    -->   
  									</div> 
  									<div class="detail" style="width: 305px;">
										<p class="dec"><span>Description:</span> <?php echo ucfirst(nl2br($jobs['Job']['description'])); ?></p>
									</div>
  									
  								
  									<!--   End  -->								
								<div class="detail_bottom" style="padding-left: 11px;"> 
								
								<div class="fac_bar fac_width">
									<div class="fac_row">
										<div class="row_blocks">
											<span>Project Category:</span>
											<? print_r($jobs['Project']["Category"]["name"]); ?> 
										</div> 
										<div class="row_blocks">
											<span>Job Category:</span>
											<? print_r($jobs['Job']["cat_name"]); ?>
										</div> 
									</div>
									<div class="fac_row">
										<div class="row_blocks">
											<span>Collaboration Type:</span>
											<?=Colloberation::getColaborationType($jobs['Job']['id'])?>
										</div> 
									</div> 
									<div class="fac_row">
										<div class="row_blocks">
											<span>Estimated job duration:</span>
											<?=($jobs["Job"]["duration"])?>
										</div> 
										<div class="row_blocks">
											<span>Job posted:</span>
											<?php echo $this->Time->timeAgoInWords($jobs['Job']['created'], array('format' => 'F jS, Y'));?>
										</div> 
									</div> 
									<div class="fac_row">
										<?/*div class="row_blocks">
											<span>Category:</span>
											<?php echo $jobs['Category']['name']; ?>
										</div*/?> 
										<div class="row_blocks">
											<span>Cash compensation:</span>
											<?=($jobs['Job']["cash_value"]!=""?$jobs['Job']["cash_value"]."$":"N/A")  ?>
										</div> 
										<div class="row_blocks">
											<span>Earnings Sharing:</span>
											<?=($jobs['Job']["future_value"]!=""?$jobs['Job']["future_value"]."%":"N/A")  ?>
										</div> 
									</div> 
									<?php if($jobs['Job']['look_contracter']=='1'){?>
										<div class="fac_row">
											<div class="row_blocks">
												<span>Contracter Compansation:</span>
												<?php if($jobs['Job']['delayed_payment']=='1' ){?>
													Delayed Payment :<?php echo $jobs['Job']['delayed_payment_money']; ?>$
												<?php }
												if($jobs['Job']['contracter_percent']=='1'){?>	
													& Percent :<?php echo $jobs['Job']['contracter_percent_value']; ?>%
												<?php }?>
											</div> 
										</div> 
									<?php }
									if($jobs['Job']['look_cofounder']=='1' && $jobs['Job']['cofounder_percent']=='1'){?>
										<div class="fac_row">
											<div class="row_blocks">
												<span>Cofounder Compansation:</span>
												Percent :<?php echo $jobs['Job']['cofounder_percent_value']; ?>%
											</div> 
										</div> 
									<?php }?>
									<div class="fac_row">
										<div class="row_blocks">
											<span>Leader's location:</span>
											<?php if ( isset( $jobs['Project']['User']['UserDetail']['Country']['name'] )) 
												echo ucfirst($jobs['Project']['User']['UserDetail']['Country']['name']);
											?>
											<div class="flag_icon">
												<?php if(!empty($jobs['Project']['User']['UserDetail']['Country']['country_flag'])){
													echo $this->Html->image(FLAG_DIR_TEMP_PATH.$jobs['Project']['User']['UserDetail']['Country']['country_flag'],array('title'=>ucfirst($jobs['Project']['User']['UserDetail']['Country']['name']),'alt'=>ucfirst($jobs['Project']['User']['UserDetail']['Country']['name'])));} ?>
											</div>
										</div> 
										<div class="row_blocks">
											<span>Leader's username:</span>
											<a href='/users/user_public_view/<?=$jobs['Project']['User']['id'];?>'>
											<?php echo $jobs['Project']['User']['username']; ?>
											</a>

										</div> 
									</div> 
									<div class="fac_row">
										<div class="row_blocks">
											<span>Req. Location:</span>
											<?php echo ucfirst($jobs['Region']['name']);?> 
											<!--  Country City and other  -->
											<?php if (isset($jobs['Country']['name']) &&  $jobs['Country']['name']!="NA"):?>
												,<?php echo ucfirst($jobs['Country']['name']);?> 
											<? endif;?> 
									
											<?php if (isset($jobs['State']['name']) && $jobs['State']['name']!="NA"):?>
												,<?php echo ucfirst($jobs['State']['name']);?>
											<? endif;?>  
									
											<?php if (isset($jobs['Job']['city']) && $jobs['Job']['city']!="NA" && $jobs['Job']['city']!=""   ):?>
												,<?php echo ucfirst($jobs['Job']['city']);?>
											<? endif;?> 
										</div> 
									</div> 
									<div class="fac_row">
										<div class="row_blocks">
											<span>Req. Availablility:</span>
											<?php echo $jobs['Job']['avail'];?>
										</div> 
									</div>
									<div class="fac_row">
										<div class="row_blocks">
											<span>Requried skills:</span>
											<span class="norm pink">
												<?php 
													$output = array();
													foreach( $jobs['Skill'] as $jobskill_name){
													    if (!in_array( $jobskill_name['name'], $output ))
														$output[] = $jobskill_name['name'];
													}
													echo $skill_data=implode(', ', $output);
												?>
											</span>
										</div> 
									</div>
								</div>
								</div>
								<div class="clear"></div>
							</div>
						</div>	 
					</div>
					<div class="clear"></div>
		<?php 	}
			}
			else{
				echo $this->element('Front/ele_no_record_found');
			}
			?>
			
			 
			<div class="paginatn">
				<p><a href="javascript:void(0);" id="back_to_top">Back to top ^</a></p>
			 
					<?php echo $this->element("Front/ele_paging"); ?>
			 
			</div>
<script>
$("#back_to_top").click(function(){
	$('html, body').animate({ scrollTop: 0 }, 1000);
});
</script>
		