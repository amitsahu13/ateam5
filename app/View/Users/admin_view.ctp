<div class="content-box"><!-- Start Content Box -->

	<div class="content-box-header">
		
		<h3 style="cursor: s-resize;">Primary Profile</h3>
		
		<ul class="content-box-tabs">
			<li></li>
		</ul>
		<?PHP //pr($user); ?>
		<div class="clear"></div>
		
	</div> <!-- End .content-box-header -->
	
	<div class="content-box-content">
		
		<div style="display: none;" class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
			<?php //echo $this->General->user_picture($user['User']['id'], $user['User']['image'], 'LARGE');?>
			
			<table id="admins" class="wordwrap">
				
				<thead>
					<tr>
					<?php
						if(!empty($user['User']['image']))
						{
					?>
						<th>User Photo</th>
						<th>
							<?php 
							echo $this->Html->image(PROJECT_TEMP_VIEW_THUMB_DIR_232.$user['User']['image']);
							?>
						</th>
					<?php		
						} //pr($user);
					?>
					</tr>
					<tr>
						<th>First Name</th>
						<th><?php 
						
						echo ($user['User']['first_name'])?></th>
					</tr>
					
				</thead>
			 
				<tfoot>
					<tr>
						<td colspan="2">
							<div class="bulk-actions align-left">
								
								<?php echo $this->Html->link("Back", array('action'=>'index',strtolower(Configure::read('App.Roles.'.$user['User']['role_id']))), array("class"=>"button", "escape"=>false)); ?>
								
							</div>
							
						</td>
					</tr>
				</tfoot>
			 
				<tbody>
					<tr>
						<td>Last Name</td>
						<td><?php echo ($user['User']['last_name']);?></td>
					</tr>
				<!--	<tr>
						<td>Sex</td>
						<td><?php //echo (Configure::read('App.Sex.'.$user['User']['sex']));?></td>
					</tr> -->
					
					<tr>
						<td>Username</td>
						<td><?php echo ($user['User']['username']);?></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><?php echo ($user['User']['email']);?></td>
					</tr>
				<!--	<tr>
						<td>Phone Number</td>
						<td><?php //echo ($user['User']['phone']);?></td>
					</tr> -->
					<tr>
						<td>Country</td>
						<td><?php echo ($user['UserDetail']['Country']['name']);?></td>
					</tr>
					<tr>
						<td>State</td>
						<td><?php echo ($user['UserDetail']['State']['name']);?></td>
					</tr>
					<tr>
						<td>City</td>
						<td><?php echo ($user['UserDetail']['city']?$user['UserDetail']['city']:'BLANK');?></td>
					</tr>
					<tr>
						<td>Zip/Postal Code</td>
						<td><?php echo ($user['UserDetail']['zip']?$user['UserDetail']['zip']:'BLANK');?></td>
					</tr>
					<tr>
						<td>Street Name </td>
						<td><?php echo ($user['UserDetail']['street_name']?$user['UserDetail']['street_name']:'BLANK');?></td>
					</tr>
					<tr>
						<td>House #</td>
						<td><?php echo ($user['UserDetail']['house']?$user['UserDetail']['house']:'BLANK');?></td>
					</tr>
					<tr>
						<td>Flat Number</td>
						<td><?php echo ($user['UserDetail']['flat_number']?$user['UserDetail']['flat_number']:'BLANK');?></td>
					</tr>
					<tr>
						<td>Linked-in Link</td>
						<td><?php echo ($user['UserDetail']['linkdin_url']?$user['UserDetail']['linkdin_url']:'BLANK');?></td>
					</tr>
					<tr>
						<td>Facebook Link</td>
						<td><?php echo ($user['UserDetail']['facebook_url']?$user['UserDetail']['facebook_url']:'BLANK');?></td>
					</tr>
					<?php if($user['User']['role_id'] == 5 || $user['User']['role_id'] == 4){ ?>
								
								<tr>
									<td>Working Status</td>
									<?php   
											if(isset($user['WorkingStatus'])){
												$icount = 0;
												$working = "";
												foreach($user['WorkingStatus'] as $workingStatus){
													$working = $working.$workingStatus['name'].','; 
													$icount++;
												}  
												$workingTrim = substr($working, 0, -1);
												if($icount == 1 || $icount == 0 ){ ?>
									
													<td><?php echo $workingTrim;?></td> <?php
										        }
												else { ?> 
													<td> <?php echo $workingTrim.'.'; ?> </td> <?php 
										        } 
										    } ?> 
								</tr>
								<tr>
									<td>Account type</td>
									<td><?php  if($user['UserDetail']['account_type'] == 1){
													$accountName = "Individual";
												}else{ $accountName = "Business"; }
									
									echo ($accountName?$accountName:'BLANK');?></td>
								</tr>
								<tr> <?php if($accountName == "Individual"){ ?>
												<td>Display Name</td>
									  <?php }else{ ?>
												<td>Company name</td>
										<?php	 }
								?>
									
									<td><?php echo ($user['UserDetail']['display_name']?$user['UserDetail']['display_name']:'BLANK');?></td>
								</tr>
								<tr>
									<td>Expertise Category</td>
									<td><?php echo ($user['UserDetail']['ExpertiseCategory']['name']?$user['UserDetail']['ExpertiseCategory']['name']:'BLANK');?></td>
								</tr>
					<?php 	} ?>
					<?php if($user['User']['role_id'] == 5 || $user['User']['role_id'] == 3){ ?>
								<tr>
									<td>Leadership Category</td>
									<td><?php echo ($user['UserDetail']['LeadershipCategory']['name']?$user['UserDetail']['LeadershipCategory']['name']:'BLANK');?></td>
								</tr>
					<?php 	} ?>	
				<!--	<tr>
						<td>Address</td>
						<td><?php //echo ($user['User']['address']?$user['User']['address']:BLANK);?></td>
					</tr> -->
					<?php if(!empty($user['Category'])){ ?>
						<tr>
							<td>Category</td>
							<td><?php echo $user['Category']['name'];?></td>
						</tr>
					<?php } ?>
					<?php if(!empty($user['SubCategory'])){ ?>
						<tr>
							<td>Sub Category</td>
							<td><?php echo $user['SubCategory']['name'];?></td>
						</tr>
					<?php } ?>
					<?php if(!empty($user['UserSkill'])){ ?>
							<tr>
								<td>Expertise in</td>
								<td><?php 
									$i=1;$countskill=count($user['UserSkill']);
									foreach($user['UserSkill'] as $skill){
										echo $skill['Skill']['name'];
										if($countskill > $i)
										echo ', ';
									$i++;		
									}
								?></td>
							</tr>
					<?php 
						}
					?>
					<tr>
						<td>Status</td>
						<td><?php echo ($this->Layout->status($user['User']['status']));?></td>
					</tr>
					<tr>
						<td>Profile Created</td>
						<td><?php echo ($this->Time->niceShort(strtotime($user['User']['created'])));?></td>
					</tr>
					<tr>
						<td>Updated on</td>
						<td><?php echo ($this->Time->niceShort(strtotime($user['User']['modified'])));?></td>
					</tr>
				</tbody>
				
			</table>
			
		</div> 
		
	</div> <!-- End .content-box-content -->
	
</div> <!-- End .content-box -->

<?php /*
<div class="content-box column-right"><!-- Start Content Box -->
	
	<div class="content-box-header">
		
		<h3 style="cursor: s-resize;">Professional Profile</h3>
		
		<ul class="content-box-tabs">
			<li></li>
		</ul>
		
		<div class="clear"></div>
		
	</div> <!-- End .content-box-header -->
	
	<div class="content-box-content">
		
		<div style="display: none;" class="tab-content default-tab" id="tab2"> <!-- This is the target div. id must match the href of this div's tab -->
			
			<?php
				//$this->Layout->sessionFlash();			  
			?>
			<table id="admins">
				
				<thead>
					<tr>
						<th>Role</th>
						<th><?php echo (Configure::read('App.Roles.'.$user['User']['role_id']));?></th>
					</tr>
					
				</thead>
			 
				<tfoot>
					<tr>
						<td colspan="2">
							<div class="bulk-actions align-left">
								
								<?php //echo $this->Html->link("Back", array('action'=>'index',Configure::read('App.Roles.'.$user['User']['role_id'])), array("class"=>"button", "escape"=>false)); ?>
								
							</div>
							
						</td>
					</tr>
				</tfoot>
			 
				<tbody>
					<tr>
				<!--		<td>Interests</td>
						<td><?php
							//$skills=array();
							//foreach($user['Interest'] as $skill){
								//$skills[] = $skill['name'];
							//}
							//$skills = implode($skills,' | ');
							//echo ($skills?$skills:BLANK);
						?></td>  
					</tr>-->
			<!--		<tr>
						<td>Information</td>
						<td><?php //echo ($user['User']['biography']?$user['User']['biography']:BLANK);?></td>
					</tr>
					<tr>
						<td>Working Since</td>
						<td><?php //echo ($user['User']['working_since']?$user['User']['working_since']:BLANK);?></td>
					</tr>
					<tr>
						<td>Website</td>
						<td><?php //echo ($user['User']['website']?$user['User']['website']:BLANK);?></td>
					</tr> -->
					<?php 
					if($user['User']['role_id']==Configure::read('App.Role.Contractor')){
						if(!empty($user['Category'])){ ?>
							<tr>
								<td>Category</td>
								<td><?php echo $user['Category']['name'];?></td>
							</tr>
						<?php } ?>
						<?php if(!empty($user['SubCategory'])){ ?>
							<tr>
								<td>Sub Category</td>
								<td><?php echo $user['SubCategory']['name'];?></td>
							</tr>
						<?php } ?>
						
						<?php if($user['UserProfile']['is_featured']==1){ ?>
							<tr>
								<td>Featured Date</td>
								<td><?php echo $user['UserProfile']['featured_date'];?></td>
							</tr>
						<?php } ?>
						
						
							<tr>
								<td>Connect</td>
								<td><?php if(empty($user['User']['total_connect'])){
								echo 0;
								}?><?php echo $user['User']['total_connect'];?></td>
							</tr>
						
						<?php if(!empty($user['UserSkill'])){ ?>
							<tr>
								<td>Expertise in</td>
								<td><?php 
									$i=1;$countskill=count($user['UserSkill']);
									foreach($user['UserSkill'] as $skill){
										echo $skill['Skill']['name'];
										if($countskill > $i)
										echo ', '; 
									$i++;		
									}
								?></td>
							</tr>
					<?php 
						}
					}
					?>
					<tr>
						<td>Company Name</td>
						<td><?php echo ($user['User']['company_name']?$user['User']['company_name']:BLANK);?></td>
					</tr>
					
				</tbody>
				
			</table>
			
		</div> 
		
	</div> <!-- End .content-box-content -->
	
</div> <!-- End .content-box --> 
*/ ?>
