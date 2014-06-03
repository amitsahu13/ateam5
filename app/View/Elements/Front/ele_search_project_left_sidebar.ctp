		<script text="type/javascript">
		$(document).ready(function(){
			$("#all").live('click',function(){
				if($(this).is(':checked'))
				{
					$(".cat_chk").attr('checked',false);
				}
			});
			
			$(".cat_chk").live('click',function(){
				
				if($(this).is(':checked'))
				{
					$("#all").attr('checked',false);
				}
			});
			
			
			
			
		});
		
		function jobsortBy()
		{
			open_box();
			$.ajax({
				
				type:'POST',	
				url: SiteUrl+"/projects/search_project/",
				data:$("#ProjectSearchProjectForm").serialize(),							
				success: function(data){
					if(data){
						$("#update_search_project").html(data);
						jQuery.modal.close();
					}
				
				}
			});
		}
		
		</script>	
	
	<div class="left_sidebar">
	  <h2><a href="javascript:void(0);">SEARCH PROJECTS</a></h2>
		<div class="aside_left_2">
				<h2 class="col_blue">Select By</h2>
				<a class="acrd_icon" href="javascript:void(0)" id="select_by_link" onclick="javascript:left_sidebar_search('select_by_link','select_by_container');"></a>
				<div class="clear"></div>
				<div class="fields_container" id="select_by_container">
					<label>Keyword</label>
					<span class="TXT_rwndInPut field_margin">
						<?php echo $this->Form->input('keyword', array('div'=>false, 'label'=>false, "class" => "field_input"));?>
					</span>
					<div class="clear"></div>
					<label>Name</label>
					<span class="TXT_rwndInPut field_margin">
						<?php echo $this->Form->input('name', array('div'=>false, 'label'=>false, "class" => "field_input"));?>
					</span> 
				</div>
				<div class="clear"></div>
				<?php
				if(!empty($project_categories))
				{
				?>
				<h2 class="col_blue">Project Category</h2>
				<a class="acrd_icon" id="all_category_link" href="javascript:void(0)" onclick="javascript:left_sidebar_search('all_category_link','categories_container');" ></a>
				<div class="clear"></div>
				<div class="fields_container" id="categories_container">
					<div class="row">
						<input name="data[Project][all]" id="all" type="checkbox" value="all" class="chckBX check_box"  checked/>
						<label for="all"><font class="label_input"> All</font></label>
					</div>
					<?php
						foreach($project_categories as $key=>$value)
						{
					?>	
						<div class="row">
							<input name="data[Project][category_id][]" type="checkbox" id="<?php echo 'parent_'.$value['Category']['id'] ?>" value="<?php echo $value['Category']['id']; ?>" class="chckBX check_box cat_chk"  />
							<label for="<?php echo 'parent_'.$value['Category']['id'] ?>"><font class="label_input"><?php echo ucfirst($value['Category']['name']); ?></font></label>
						</div>
							<?php
							if(!empty($value['Child']))
							{
								foreach($value['Child'] as $k=>$v)
								{							
							?>	
								<div class="row_sub">
									<input name="data[Project][sub_category_id][]" type="checkbox" id="<?php echo 'child_'.$v['id'] ?>" class="chckBX check_box cat_chk" value="<?php echo $v['id']; ?>" />
									<label for="<?php echo 'child_'.$v['id'] ?>"><font class="label_input"><?php echo ucfirst($v['name']); ?></font></label>
								</div>
								
					<?php
								}
							}
					}
					?>					
				</div>
				
				<div class="clear"></div>
				<?php
				}
				?> 
				
				
			 
				
				
		
				
				
				
				
				
				
				
				
				
				<div class="fields_container_2">
				<span class="search_btn">
				<?php echo $this->Js->submit('Search', array(
					'update' => '#update_search_project',
					'div' => false,
					'url'=>array('controller'=>'projects','action'=>'search_project'),
					'class'=>'search_btn_blu_ri',
					'before'=>'open_box();',
					'complete'=>'jQuery.modal.close();'
							)
					);
				?>	
				</span><div class="clear"></div>
				</div>
		</div>
	</div> 
	
	
	<div class="clear"></div>
	<br> 
	<br> 
	
	 <div class="aside_left">
			<h2  class="col_blue border_bottom">Required persona</h2>	
							<a class="acrd_icon" href="javascript:void(0)" id="job_skill_link" onclick="javascript:left_sidebar_search('job_skill_link','job_skill_container');"></a>
							<div class="clear"></div> 

							<div class="fields_container" id="job_skill_container">
							 	<?php foreach($job_categories as $key=>$job_value){?>
								<div class="row">
									<input name="data[Job][Job][]" type="checkbox" value="<?php echo $key;?>" class="chckBX check_box chk_skill"  /> 
									<font class="label_input"><?php echo $job_value;?></font>
								</div>  
								<?php }?>
							
							</div>
		
		
						<div class="fields_container_2">
						<span class="search_btn">
							 	<?php echo $this->Js->submit('Search', array(
					'update' => '#update_search_project',
					'div' => false,
					'url'=>array('controller'=>'projects','action'=>'search_project'),
					'class'=>'search_btn_blu_ri',
					'before'=>'open_box();',
					'complete'=>'jQuery.modal.close();'
							)
					);
				?>	
						</span><div class="clear"></div>   
						</div>
	 </div> 
			
	
	
	<!--  REquired Skills  goes Here :     -->
	
	
   
		
	 
		
	
	
	
	<div class="clear"></div>
	<div class="left_sidebar margin_top">
		<h2 class="col_blue"><a href="javascript:void(0);">FILTER RESULTS BY</a></h2>
		<div class="aside_left">
		<h2 class="col_blue">Location</h2>
		<a class="acrd_icon" href="javascript:void(0);" id="location_link" onclick="javascript:left_sidebar_search('location_link','loctaion_container');"></a>
		<div class="clear"></div>
		<div class="fields_container" id="loctaion_container">
			<span class="slct_rwndInPut">
			<?php 
			echo ($this->Form->input('region_id', array('div'=>false, 'label'=>false,'empty'=>'-- Select Region --',"class" => "custom_dropdown slct_rwndInPutRi with_sml1_2")));
			$this->Js->get('#ProjectRegionId')->event('change',$this->Js->request(array('controller'=>'countries','action'=>'get_search_country_front','Project'), array('update'=>'#location','async' => true,'method' => 'post','dataExpression'=>true,'data'=> $this->Js->serializeForm(array('isForm' => true,'inline' => true)))));
			?>
			</span>
			<div class="clear"></div>
			<div id="location">
				<span class="slct_rwndInPut" id="update_country">
				<?php 
				echo ($this->Form->input('country_id', array('div'=>false, 'label'=>false, "class" => "custom_dropdown slct_rwndInPutRi with_sml1_2",'empty'=>'-- Select Country --')));
				?>				
				</span>
				<span class="slct_rwndInPut" id="update_state">
				<?php 
					echo ($this->Form->input('state_id', array('div'=>false, 'label'=>false,"class" => "custom_dropdown slct_rwndInPutRi with_sml1_2",'empty'=>'-- Select State --')));
				?>
				</span>
			</div>	
		</div>
		<div class="clear"></div>
	 
		 
	<?php
		/* <?php
		if(!empty($project_agreement_types))
		{
		?>
		<h2 class="col_blue">Agreement Type</h2>
		<a class="acrd_icon" href="javascript:void(0);" id="agreement_type_link" onclick="javascript:left_sidebar_search('agreement_type_link','agreement_type_container');"></a>
		<div class="clear"></div>
		<div class="fields_container" id="agreement_type_container">
			<?php
			foreach($project_agreement_types as $key1=>$value1)
			{
			?>
			<div class="row RowCheckTxt">
			<input name="" type="checkbox" value="" class="chckBX check_box" id="<?php echo "agreement_".$key1 ?>"  value="<?php echo $value1['Agreement']['id'];?>" />
			<label for="<?php echo "agreement_".$key1 ?>"><font class="label_input"><?php echo ucfirst($value1['Agreement']['name']);?></font></label>
			</div>
			<?php
			}
			?>
			
		</div>
		<div class="clear"></div>
		<?php
		} */
		/* 
		if(!empty($compensations))
		{
		?>
			<h2 class="col_blue">Compensation Type</h2>
			<a class="acrd_icon" href="javascript:void(0);" id="compensation_type_link" onclick="javascript:left_sidebar_search('compensation_type_link','compensation_type_container');"></a>
			<div class="clear"></div>
			<div class="fields_container" id="compensation_type_container">
			<?php
			foreach($compensations as $key2=>$value2)
			{
			?>	
				<div class="row RowCheckTxt">
				<input name="" type="checkbox" value="" class="chckBX check_box" id="<?php echo "compensation".$key2 ?>" value="<?php echo $value2['Compensation']['id'];?>" />
				<label for="<?php echo "compensation".$key2 ?>"><font class="label_input"><?php echo ucfirst($value2['Compensation']['name']);?></font></label>
				</div>
			<?php
			}
			?>
			</div>
			<div class="clear"></div>
		<?php
		}
		if(!empty($business_plans))
		{
		?>	
			<h2 class="col_blue">Business Plan</h2>
			<a class="acrd_icon" href="javascript:void(0);" id="business_plan_link" onclick="javascript:left_sidebar_search('business_plan_link','business_plan_container');"></a>
			<div class="clear"></div>
			<div class="fields_container" id="business_plan_container">
			<?php
			foreach($business_plans as $key3=>$value3)
			{
			?>	
				<div class="row RowCheckTxt">
				<input name="data[Project][business_plan_level_id][]" type="checkbox" class="chckBX check_box" id="<?php echo "plan".$key3 ?>" value="<?php echo $value3['BusinessPlanLevel']['id'];?>" />
				<label for="<?php echo "plan".$key3 ?>"><font class="label_input"><?php echo ucfirst($value3['BusinessPlanLevel']['name']);?></font></label>
				</div>
			<?php
			}
			?>	
			</div>
			<div class="clear"></div>
		<?php
		} */
		?>	
		<?php		
				/* <h2 class="col_blue">Funding</h2>
				<a class="acrd_icon" href="javascript:void(0);" id="funding_link" onclick="javascript:left_sidebar_search('funding_link','funding_link_container');"></a>
				<div class="clear"></div>
				<div class="fields_container" id="funding_link_container">
					<div class="row RowCheckTxt">
					<input name="data[Project][self_investment_option]" type="checkbox" value="1" class="chckBX check_box" />
					<label><font class="label_input"> Available self Funding</font></label> 
					</div>
					<div class="row RowCheckTxt">
					<input name="data[Project][external_fund_option]" type="checkbox" value="1" class="chckBX check_box" />
					<label><font class="label_input"> Available External Funding</font></label> 
					</div>
				</div>
				<div class="clear"></div>
				<h2 class="col_blue">Required Verifications</h2>
				<a class="acrd_icon" href="javascript:void(0);" id="req_verification_link" onclick="javascript:left_sidebar_search('req_verification_link','req_verification_container');"></a>
				<div class="clear"></div>
				<div class="fields_container border_btm" id="req_verification_container">
					<ul>
					<li><a href="#" class="map"></a></li>
					<li><a href="#" class="msg"></a></li>
					<li><a href="#" class="phone"></a></li>
					<li><a href="#" class="home"></a></li>
					<li><a href="#" class="P"></a></li>
					<li><a href="#" class="user"></a></li>
					</ul>
				</div> */
		?>	
		<span class="search_btn">
			<?php 
			echo $this->Js->submit('Filters', array(
				'update' => '#update_search_project',
				'div' => false,
				'url'=>array('controller'=>'projects','action'=>'search_project'),
				'class'=>'search_btn_blu_ri',
				'before'=>'open_box();',
				'complete'=>' jQuery.modal.close();'
						)
				);
			?>	
			</span> 
		</div>
	</div>
	<!--
	<div class="left_sidebar">
		<h2 class="col_blue"><a href="javascript:void(0);">LEADER PARAMETERS</a></h2>
		<div class="aside_left">
		-->
			<?php
			/* $total_exp_outside = Configure::read('App.OutsideExperience');
			if(!empty($total_exp_outside))
			{
			?>
			<h2 class="col_blue">Leader's Experience Outside the platform(Self filling)</h2>
			<a class="acrd_icon" href="javascript:void(0);" id="leader_exp_outside_link" onclick="javascript:left_sidebar_search('leader_exp_outside_link','leader_exp_outside_container');"></a>
			<div class="clear"></div>
			<div class="fields_container" id="leader_exp_outside_container">
				<?php
				foreach($total_exp_outside as $key4=>$value4)
				{
				?>
					<div class="row RowCheckTxt">
						<input name="" value="" type="checkbox" id="<?php echo "exp_outside_".$key4  ?>" value="<?php echo $key4;?>" class="chckBX check_box"   />
						<label for="<?php echo "exp_outside_".$key4  ?>"><font class="label_input"><?php echo ucfirst($value4);?></font></label>
					</div>
				<?php
				}
				?>
			</div>
			<div class="clear"></div> */
		?>	
			<?php
			//}
			
			/* $total_exp_inside = Configure::read('App.InsideExperience');
			if(!empty($total_exp_inside))
			{ */
			?>
			<?php
			/* <h2 class="col_blue">Leader's Experience Inside the platform</h2>
				<a class="acrd_icon" href="javascript:void(0);" id="leader_exp_inside_link" onclick="javascript:left_sidebar_search('leader_exp_inside_link','leader_exp_inside_container');"></a>
				<div class="clear"></div>
				<div class="fields_container" id="leader_exp_inside_container">
					<?php
					foreach($total_exp_inside as $key5=>$value5)
					{
					?>
						<div class="row RowCheckTxt">
							<input name="" value="" type="checkbox" id="<?php echo "exp_inside_".$key5  ?>" value="<?php echo $key5;?>" class="chckBX check_box"   />
							<label for="<?php echo "exp_inside_".$key5  ?>"><font class="label_input"><?php echo ucfirst($value5);?></font></label>
						</div>
					<?php
					}
					?>	
				</div>
				<div class="clear"></div> */
			?>	
			<?php
			//}
			?>
			<?php	
			/* <div class="clear"></div>
			<h2 class="col_blue">Feedback</h2>
			<a class="acrd_icon" href="javascript:void(0);" id="feedback_link" onclick="javascript:left_sidebar_search('feedback_link','feedback_container');"></a>
			<div class="clear"></div>
			<div class="fields_container" id="feedback_container">
					<div class="ExerienceRMId"><a href="#"><?php echo $this->Html->image('pink_star.png');?></a><a href="#"><?php echo $this->Html->image('pink_star.png');?></a><a href="#"><?php echo $this->Html->image('pink_star.png');?></a><a href="#"><?php echo $this->Html->image('grey_star.png');?></a><a href="#"><?php echo $this->Html->image('grey_star.png');?></a></div>
			</div>
			<div class="clear"></div>
			<h2 class="col_blue">Leader Verifications</h2>
			<a class="acrd_icon" href="javascript:void(0);" id="leader_verification_link" onclick="javascript:left_sidebar_search('leader_verification_link','leader_verification_container');"></a>
			<div class="clear"></div>
			<div class="fields_container" id="leader_verification_container">
				<ul>
				<li><a href="#" class="map"></a></li>
				<li><a href="#" class="msg"></a></li>
				<li><a href="#" class="phone"></a></li>
				<li><a href="#" class="home"></a></li>
				<li><a href="#" class="P"></a></li>
				<li><a href="#" class="user"></a></li>
				</ul>
			</div>
			<div class="clear"></div> 
			<span class="search_btn">
			<?php 
			echo $this->Js->submit('Filters', array(
				'update' => '#update_search_project',
				'div' => false,
				'url'=>array('controller'=>'projects','action'=>'search_project'),
				'class'=>'search_btn_blu_ri',
				'before'=>'open_box();',
				'complete'=>' jQuery.modal.close();'
						)
				);
			?>	
			</span> 
		</div>
	</div>
	*/
			?>
			
				 <br>  
				 
	  <div class="aside_left" style='margin-top:20px;'>
			<h2  class="col_blue border_bottom">Required Skills</h2>	
							<a class="acrd_icon" href="javascript:void(0)" id="job_skill_link2" onclick="javascript:left_sidebar_search('job_skill_link2','job_skill_container2');"></a>
							<div class="clear"></div> 

							<div class="fields_container" id="job_skill_container2">
							 
						 		<?php foreach($job_categories as $key=>$job_value){?>
								<div class="row">
									 
									 
									 <div class='job_skill'  >  
									  <a href='javascript:void(0)' class='openskill'> 

									  		  		<span class='icon open' >    </span> 

									  		  		 <?=$job_value?>  </a>
									   <div class='skillscont skillscont-sets-1' style='display:none;' >  
									   <?
									    $cat = new Category();   
										$skills =    $cat->get_job_skills($key) ; 
 
									   ?>
									     	<?php foreach($skills as $key=>$job_value){?>
											<div class="row">
												<input name="data[Skill][Skill][]" type="checkbox" value="<?php echo $key;?>" class="chckBX check_box chk_skill"  /> 
												<font class="label_input"><?php echo $job_value;?></font>
											</div>  
											<?php }?>  
											<div class="clear"></div>
									    <?
									     if (count($skills)==0) 
											echo  "No skills  Found "; 
									    
									    ?>
									   </div>  
									 </div>    
									 
									 
								</div>  
								<?php }?> 
								
								
								
								
				<!--  Slide Up Skills    -->				
								                    
				<script type='text/javascript'>  
					$(document).ready(function(){
						 $(".openskill").click(function(){  
						 	if ($(this).find("span").hasClass("open")){
						 	 		$(this).find("span").removeClass("open");	
									$(this).find("span").addClass("closed");	
						 	 }else{
						 	 		//  hide    
						 	 			$(this).find("span").removeClass("closed");	
									$(this).find("span").addClass("open");	 
						 	 }



						    	$(this).parent().find(".skillscont").toggle('fast');   
						 });
						
					});
				
				
				</script>			
								
								
								
								
								
							</div>
		
		
		<div class="fields_container_2">
						<span class="search_btn">
							<?php echo $this->Js->submit('Search', array(
					'update' => '#update_search_project',
					'div' => false,
					'url'=>array('controller'=>'projects','action'=>'search_project'),
					'class'=>'search_btn_blu_ri',
					'before'=>'open_box();',
					'complete'=>'jQuery.modal.close();'
							)
					);
				?>	
						
						</span><div class="clear"></div>   
						</div>
		</div> 