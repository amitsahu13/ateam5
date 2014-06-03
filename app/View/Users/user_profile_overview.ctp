
 <!--   Confirm  PAge :    -->   
 
 <script type="text/javascript"> 
  		jQuery(document).ready(function(){
  	  

			$('.js-ClosePopup').bind('click', function(){
	  					$('.popup').animate({'top': '-1000px'}, 300, function(){$('.popup-wrapper').fadeOut();});
	  					});
						$('.popup').css('top', '-1000px')
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
  
  		<div class="popup-wrapper show"  id='addmember' > 
									<div class='popup_invite_deffault popup'> 
										<h3> Leave ?  </h3>
										<div class="popup_invite_content">
											  <div class="VerFiBtn">
			  <?php echo $this->Html->link($this->Html->image('authenticate.png',array('alt'=>'authenticate')),Router::url("/users/userinfo_authenticate",true),array('escape'=>false,'div'=>false  ));
			  ?>
			  </div> 
 												 <span class="continue_team js-ClosePopup" style="margin-left: 10px; cursor: pointer;"  >Cancel  </span> 
							   				 
 											 <div class="clear"></div>
										</div>
								   	</div>
								</div> 
  
 <!--   End  Confirm  PAge;   -->



<?php echo $this->Html->script(array('ajaxuploadimage/ajaxupload'));?>
<script type="text/javascript">
    jQuery(function($){
        //code for uploading project image starts here
        var btnUpload=$('#upload');
        var status=$('#status');
		
        new AjaxUpload(btnUpload, {		
		
            action: '<?php echo(SITE_URL);?>/users/user_pics_upload',

            //Name of the file input box
            name: 'data[UserDetail][image]',
			id:	'image',
            onSubmit: function(file, ext){
			
                if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){
                    // check for valid file extension
                    status.text('Only JPG, PNG or GIF files are allowed.').addClass('errorTxt');
                    return false;
                }
				
               $('#status').html('<img src="<?php echo(SITE_URL); ?>/img/ajax-loader_2.gif"/>');
                //status.text('Uploading...');
            },

            onComplete: function(file, response){

                //On completion clear the status
               // status.text('');
				$('#status').html('');
                //Add uploaded file to list
                var myimageresponse = response.split('|');
				
                if(myimageresponse[0]==="success"){
				
                    $('#userimageid').html('<img src="<?php echo(SITE_URL); ?>/img/users/'+myimageresponse[2]+'/images/profile/thumb/'+myimageresponse[1]+'"/><input type="hidden" name="data[UserDetail][image]" value="'+myimageresponse[1]+'"/>');
                }else{
                    $('<li></li>').appendTo('#files').text(file).addClass('errorTxt');
                }
            }
        });

        // code for uploading user image end here
    });
    String.prototype.trim = function() {
        return this.replace(/^\s+|\s+$/g,"");
    }
    // code for uploading user image end here
</script>
<h3 class='titleh3'> User Profile Definition    </h3>

<div class="cmpnsn_prgrsDV">

	<div class="cmpnsn_prgrsnav"> 
  
    	<!--  avigation Bar Stack   :  --> 
		<?
 			 if ($user_data["UserDetail"]["availability_id"]!= 0 &&  $user_data["UserDetail"]["availability_id"]!="") :

 		?> 
 		<ul>
			<li><a href="<?=Router::url(array( 'controller' => 'users','action' => 'user_profile_overview'), true);?>" class="blue"><span class="blue">1</span> Overview</a></li>
			<li><a href="<?=Router::url(array( 'controller' => 'users','action' => 'user_personal_detail'), true);?>"><span>2</span> Persona</a></li>
		</ul> 

	<? else :?>


		<ul>
			<li><a href="javascript:void(0)" class="blue"><span class="blue">1</span> Overview</a></li>
			<li><a href="javascript:void(0)" ><span>2</span> Persona</a></li>
		</ul> 

 		<!--  End Naviagation  -->
 		<?endif; ?> 
	</div>
	<div class="prgrsnav_fill">
	<?php					
	echo $this->Html->image('75.jpg',array('alt'=>'75%','title'=>'75%'));
	?>
	</div>
</div> 


<div class="product_dscrpBOX" style="width:100%;">
	<h3><span class="round_bgTXT">1</span>Overview</h3>
	<div class="compensation_frmDV">
	  <?php echo $this->Form->create('User',array('url' => array('controller' => 'users', 'action' => 'user_profile_overview'),'type'=>'file','onsubmit'=>'return checkdegree();'));?>
		<ul class="OverviewFrm">
		  <li>
			<label>Name</label>
			<div class="OverviewFrmRi" style="padding: 5px 0;">
			<?php
			echo $this->Html->link(ucwords($user_data['User']['first_name']." ".$user_data['User']['last_name']),"#",array('escape'=>false,'title'=>$user_data['User']['first_name']." ".$user_data['User']['last_name'],'alt'=>$user_data['User']['first_name']." ".$user_data['User']['last_name']));
			?>
			</div>
		  </li>
		  <li>
			<label>&nbsp;</label>
			<div class="OverviewFrmRi custom_checkbox">
				<div class="compensation_frmrow">
					<div class="compensation_frmrow_R">
						 
						<?php

						echo ($this->Form->input('UserDetail.name_visiblity',
                        array('type'=>'radio',
                        'options'=>Configure::read('App.Name.Visiblity'),'default'=>'1', 'div'=>false,'legend'=>false,
                        'label'=>false,'class'=>'chckBX','style'=>'margin:0 6px 0 16px;',  "value"=> $user_data['UserDetail']['name_visibility']      )));
					?>
					</div>
				</div>
		  </li>
		  <li>
			<label>User Name</label>
			<div class="OverviewFrmRi"><?php echo ucfirst($user_data['User']['username']);?></div>
		  </li>
		  <li>
			<label>Picture</label>
			<div class="OverviewFrmRi custom_checkbox">
			  <div class="compensation_frmrow">
				<div class="compensation_frmrow_R">
					<p>
					<input name="" type="button"  id='upload' class="upload_btn" value="Upload Picture"/><span id="status" style="color:red;"></span><br/>
					<span id="userimageid">
					<?php
					echo $this->General->show_user_img($this->Session->read('Auth.User.id'),$user_image['UserDetail']['image'],'THUMB','User Image');
					?>
					</span>
					</p>
					<div class="compensation_frmrow_R">
					 
					<?php  
					 
				?>
					</div>
				</div>
			  </div>
			</div>
		  </li>
		  
		  
		  <?php
		  if($this->Session->read('Auth.User.role_id') != Configure::read('App.Role.Provider') &&  $this->Session->read('Auth.User.role_id') != Configure::read('App.Role.Both'))
		  {
		  ?>

		  <?php
		  }
		  ?>

		  <li>
		<label>About Myself</label>
		<div class="OverviewFrmRi OverviewFrm8Ri">
		<?php echo $this->Form->input('UserDetail.about_us', array('div'=>false, 'label'=>false,"type"=>"textarea","class" => "AboutFild"));?>		 
		  </div>
	  </li>


		  
		  <li>
			<label>Registered Since</label>
			<div class="OverviewFrmRi"><?php echo date('d/m/Y',strtotime($user_data['User']['created'])); ?> , Last signed in on <?php echo date('d/m/Y H:i',strtotime($user_data['UserDetail']['last_login'])); 
			?> </div>
		  </li>
		  <li>
			<label>Location</label>
			<div class="OverviewFrmRi">
			<?php 
			
			if (isset($user_data['UserDetail']['Region']['name']))
			echo $user_data['UserDetail']['Region']['name']  . ","; 
	    	
			if (isset($user_data['UserDetail']['Country']['name'])) 
			echo $user_data['UserDetail']['Country']['name']. ",";

			if (isset($user_data['UserDetail']['State']['name']))
			echo $user_data['UserDetail']['State']['name']. ",";  
			
			if (isset($user_data['UserDetail']['city'])) 
			echo $user_data['UserDetail']['city'] ;
 


			?>
			</div>
		  </li>
		  <?php
		  
		  ?>
		  <li>
			<label> Development Category <span>*</span></label>
			<div class="OverviewFrmRi"><span class="slct_rwndInPut">
			  <?php
				echo $this->Form->input('UserDetail.leadership_category_id', array('div'=>false, 'label'=>false,'empty'=>'-- Development Category --', "class" => "custom_dropdown slct_rwndInPutRi with_sml1",'options'=>$leader_categories,"error" => array("wrap" =>EDITWRAP, "class" => "error-message"))); 
				?>
			  </span></div>
		  </li>
		  <?php
		  
		 
		  ?>
			<li>
			<label>Persona<span>*</span></label>
			<div class="OverviewFrmRi"><span class="slct_rwndInPut">
			  <?php
				echo $this->Form->input('UserDetail.expertise_category_id', array('div'=>false, 'label'=>false,'empty'=>'-- Persona --', "class" => "custom_dropdown slct_rwndInPutRi with_sml1",'options'=>$expert_categories,"error" => array("wrap" =>EDITWRAP, "class" => "error-message"))); 
				?>
			  </span></div>
			</li>
		  <?php
		  
		 
		  ?>

		  <!-- Soem Working Status   -->   


		  <li>
			<label>Working Status<span>*</span></label>
			<div class="OverviewFrmRi"><span class="rwndInPut_TXTaria custom_working_status" style="height: auto;">
			<?php
				echo ($this->Form->input('WorkingStatus.WorkingStatus', array('div'=>false, 'label'=>false,'empty'=>'-- Select Working Status --','options'=>$working_status,"class" => "custom_dropdown TXTaria_rwndInPutRi", 'style' => 'height: auto;', 'type'=>'select' ,"error" => array("wrap" =>EDITWRAP, "class" => "error-message"))));
		 
			?>
			 
			
			  </span>
			  
			  
			  </div>
			  
		  </li>
		  <?php
		   
		  ?>
		 
		 	<li> 
		 	<label class="compensation_frmrow_L">Availability  <span>*</span></label>
			<div class="OverviewFrmRi"><span class="slct_rwndInPut">
			 <?php echo $this->Form->input('UserDetail.availability_id',array('div'=>false,'label'=>false, 'options'=>$project_manager_availabilities, "class" => "custom_dropdown slct_rwndInPutRi with_sml1", 'empty'=>'---Select Availavbility---' ));?>
			  </span></div>






		 	</li> 







		  <li>
		  		<!-- Selecl : $user_data['Skill']  kilt S -->  

 
		<label class="compensation_frmrow_L"> Skills <span>*  <a href="javascript:void(0);" id="addskill" class="AddSkillBtn">Add Skill</a>
		  
		  </span></label>
		 
		 
		 
		<div class="all_skills"  >
		 	 <!--  Skills Starts   hERE    -->
		 	 <?php 
		
		 	  if (isset($applyskills)): 
		 	 		foreach($applyskills as $ski):  
		 			$counter ++ ;   

 ?> 
			 <div id='skill_div_{$counter}' class='skill_div' > 
				 <p> 
				 	 <select class='jbc custom_dropdown' > 
					 <option>  <?=$ski->catname ?> </option>  
					 </select> 
					 
					 </p> 
					 		 	 
		 	 <p class='skills'>   
					 		 
				 	 <select name='data[Skill][Skill][]' class='skillslistsrop  custom_dropdown'> 
					 		  <option value='<?=$ski->id?>'>   <?=$ski->skill?> </option>  
							 
					  </select>  		
			 		
				 </p>  
		 	 
		 	  <a href='javascript:void(0)' class='remove_skill  delete2'>     </a>   
		 	  </div> 
		 	 
		 	 
		 	 
		 	 <? endforeach; endif;?>
		 	 
		 	 
		</div>	 
	 
 <script type="text/javascript">
<!--

var counter  = <?=$counter?> ;  // Counter of applied Job  Skills    

 
 
//-->
</script>
		  
		 <script type='text/javascript'>   
		 
		 	$(document).ready(function(){
		 		 $("#addskill").click(function(){ 
		 			counter ++ ;  
		 		 	$.get("/jobs/getSkillDrop/"+counter,function(data){
		 		 				$(".all_skills").append(data); 
		 		 				$(".custom_dropdown").selectbox();
		 		 				reinit();  
		 		  	}) ;
		 			 	return false  ;
		 		}); 
		 		 
		 		 reinit() ;
		 	 }); 
		 	
		  
		  
		 function reinit(){  
						  
		 	  $(".remove_skill").click(function(){
				  $(this).parent().remove(); 
			  });  
			     
			   
		 	  $(".jbc").change(function(){
		
		 		 var cat =    $(this).find("option:selected").val(); 
				 var parent  =   $(this).parent().parent() ;  
				  
		 		   $.get("/jobs/getsskilloptions/"+cat,  function(d){
					  $(parent).find(".skills .sbHolder").remove(); 
					  $(parent).find(".skills .skillslistsrop").remove();  
					  $(parent).find(".skills ").append(d) ; 
					  $(".custom_dropdown").selectbox(); 
					 }); 
				  
				  
			  }); 
		  }
		 	
		 	 
		 
		 </script> 
		 


		 <!--  End Skills Here  -->






 				<!--  End Select -->
		  </li>  


















		  <?php
		  if($this->Session->read('Auth.User.role_id') == Configure::read('App.Role.Provider') || $this->Session->read('Auth.User.role_id') == Configure::read('App.Role.Both'))
		  {
		  ?>
		  <li>
			<label>Day job Hourly Rate ($/hr.)<span></span></label>
			<div class="OverviewFrmRi">
			  <div class="RateMIn"> <span class="RaMin">Min.</span>
				<?php
				echo $this->Form->input('UserDetail.min_reference_rate', array('div'=>false,'type'=>'text','label'=>false, "class" => "RateMinFild","error" => array("wrap" =>EDITWRAP, "class" => "error-message"))); 
				?>
				
				<span class="RaMin">Max.</span>
				<?php
				echo $this->Form->input('UserDetail.max_reference_rate', array('div'=>false,'type'=>'text','label'=>false, "class" => "RateMinFild","error" => array("wrap" =>EDITWRAP, "class" => "error-message"))); 
				?>
			  </div>
			</div>
		  </li>
		  <?php
		  }
		  ?>
		  <li>
			<label>Verifications</label>
			<div class="OverviewFrmRi">
			  <div class="fields_container bg_none icon_padding">  
			   		<?=$this->Verify-> getVerifyHTML($this->Session->read('Auth.User.id'))?>
		 			</div>
		 			
		 			<script type='text/javascript'>  
		 		 
		 			
		 				jQuery(document).ready(function(){
		 					 jQuery(".aut").click(function(){  
		 						 
		 						 // Ask  user to leave that Page :   
		 							 	jQuery("#addmember").fadeIn();
		  					$('#addmember .popup').css('top', '-1000px')
		  									.animate({'top': '0'}, 500); 
		  					
		 							 
		 						 
		 					return false;  	 
		 						 
		 						 
		 						 
		 						 var href=  jQuery(this).attr("href");  
		 						 jQuery.post('<?=Router::url("/",true)?>redirect/setback/',{'back':href},function(){
									  
									    jQuery(".Continue4BtnRi").click(); 
		 							  
		 							 
		 							 return false;  
								 }); 
		 						 
		 						 
		 						 
		 						 return false;  
		 					 });
		 				});
		 			
		 			</script>
		 			
			  <div class="VerFiBtn">
			  <?php echo $this->Html->link($this->Html->image('authenticate.png',array('alt'=>'authenticate')),Router::url("/users/userinfo_authenticate",true),array('escape'=>false,'div'=>false , 'class'=>'aut' , 'onclick'=>'return false;'));
			  ?>
			  </div>
			  
			  
			  
			</div>
		  </li>
		  <?php
		  if($this->Session->read('Auth.User.role_id') == Configure::read('App.Role.Buyer') || $this->Session->read('Auth.User.role_id') == Configure::read('App.Role.Both'))
		  {
		  ?>
		  <li style='display:none;'>
			<label>Leader Exerience</label>
			<div class="OverviewFrmRi">
			  <div class="ExerienceR">
				<div class="ExerienceRLe">2 projects</div>
				<div class="ExerienceRMId"><span>Rating </span>
				<?php echo $this->Html->link($this->Html->image('star.png',array('alt'=>'star')),'#',array('escape'=>false,'div'=>false));
				echo $this->Html->link($this->Html->image('star.png',array('alt'=>'star')),'#',array('escape'=>false,'div'=>false));
				echo $this->Html->link($this->Html->image('star.png',array('alt'=>'star')),'#',array('escape'=>false,'div'=>false));
				echo $this->Html->link($this->Html->image('star.png',array('alt'=>'star')),'#',array('escape'=>false,'div'=>false));
				echo $this->Html->link($this->Html->image('star.png',array('alt'=>'star')),'#',array('escape'=>false,'div'=>false));
				?>
				</div>
				<div class="ExerienceRRi">[3 Feedbacks] </div>
			  </div>
			</div>
		  </li>
		  <?php
		  }
		  if($this->Session->read('Auth.User.role_id') == Configure::read('App.Role.Provider') || $this->Session->read('Auth.User.role_id') == Configure::read('App.Role.Both'))
		  {
		  ?>
		  <li style='display:none;'>
			<label>Expert Experienc</label>
			<div class="OverviewFrmRi">
			  <div class="ExerienceR">
				<div class="ExerienceRLe">7 jobs </div>
				<div class="ExerienceRMId"><span>Rating </span>
				<?php echo $this->Html->link($this->Html->image('pink_star.png',array('alt'=>'star')),'#',array('escape'=>false,'div'=>false));
				echo $this->Html->link($this->Html->image('pink_star.png',array('alt'=>'star')),'#',array('escape'=>false,'div'=>false));
				echo $this->Html->link($this->Html->image('pink_star.png',array('alt'=>'star')),'#',array('escape'=>false,'div'=>false));
				echo $this->Html->link($this->Html->image('pink_star.png',array('alt'=>'star')),'#',array('escape'=>false,'div'=>false));
				echo $this->Html->link($this->Html->image('pink_star.png',array('alt'=>'star')),'#',array('escape'=>false,'div'=>false));
				?>
				</div>
				<div class="ExerienceRRi">[3 Feedbacks] </div>
			  </div>
			</div>
		  </li>
		  <?php
		  }
		  ?>
		  <li>
			<?/*<span style="float:right;" class="Continue4Btn">
			 
			</span>*/?></li>
		</ul>
		<span style="float:right;" class="Continue4Btn">
			<input type="submit" value="Next" class="Continue4BtnRi" name="">
			</span>
	 <?php echo $this->Form->end();?>
	</div>
</div>
<script>



 
 
 $(document).ready(function(){
	var individual = '<?php echo PROVIDER_ACCOUNT_TYPE_INDIVIDUAL ?>';
	var business = '<?php echo PROVIDER_ACCOUNT_TYPE_BUSINESS ?>';
	var account_type = '<?php echo $account_type; ?>';
	
	$("#UserDetailAccountType").change(function(){
		
		if($(this).val()==individual)
		{
			$(".display_name label").text('Display Name *');
		}
		if($(this).val()==business)
		{
			$(".display_name label").text('Company Name *');
		}
		
		
	
	
	});
	
	
	
	<?php
	if(!$validation_flag)
	{
	?>
		
		if(account_type == individual)
		{
			$(".display_name label").text('Display name *');
		}
		if(account_type == business)
		{
			$(".display_name label").text('Company name *');
		}
	<?php
	}
	?>
	
	
	
	
 
	<?php
	if($counter>0)
	{
	?>
		j= '<?php echo $counter;?>';
	<?php
	}
	else
	{
	?>
	j=1;
	<?php
	}
	?>
	$("#addskill").live('click',function(){
	
		var skillFieldName = "data[Skill][Skill]["+j+"][skill_id]";
		var RateFieldName = "data[Skill][Skill]["+j+"][self_rate]";
		<!--var UserIdFieldName = "data[Skill][Skill]["+j+"][user_id]";-->
		<!--var UserFieldId = "SkillUser"+j+"user_id";-->
		var skillFieldId = "SkillUser"+j+"skill_id";
		var RateFieldId = "SkillUser"+j+"rate";
		
		
		$("div#clone_child_skill_container .skill_dropdown").attr('name',skillFieldName).attr('id',skillFieldId);
		
		
		$("div#clone_child_skill_container .skill_dropdown").addClass('skill_'+j);
		$("div#clone_child_skill_container .rate_dropdown").attr('name',RateFieldName).attr('id',RateFieldId);
		$("div#clone_child_skill_container .rate_dropdown").addClass('self_rate_'+j);
		$("div#clone_child_skill_container div.skill_container_child").attr('id','row_'+j)
		
		<!--$("div#clone_child_skill_container .hidden_user_id").attr('name',UserIdFieldName).attr('id',UserFieldId);-->
		$("div#clone_child_skill_container .delete_clone").attr('rel',j);
		$("div#clone_child_skill_container .delete_option").attr("id","row_"+j);
		
		
		
		
		skill_clone = $("#clone_child_skill_container").html();
		$("#skill_container_parent").append(skill_clone);
		skill_clone = '';
		
		j++;
		//$(".custom_dropdown-2").selectbox(); 
	});
	
	$(".delete_clone").live('click',function(){
		$("#row_"+$(this).attr('rel')).remove();
	});
	
	$(".delete_validate").live('click',function(){
		$("#row_"+$(this).attr('rel')).remove();
	});
	
	
	$("#WorkingStatusWorkingStatus").change(function(){
	
		 $("#WorkingStatusWorkingStatus").find('option:first').prop('selected', false);
	
	
	})
	
 });
</script>

<div id="clone_child_skill_container" style="display:none;">
	<div class="skill_container_child skill_2 delete_option">
		<div class="ChooseSkill">
			 
			<div class="ChooseSkillIn">
			  <span class="slct_rwndInPut">
			  <select class="custom_dropdown-2 slct_rwndInPutRi  skill_dropdown skill_check validate_skill" style="width: 210px;">
			  <option value="">-- Select Skill --</option>
			  <?php if(!empty($job_skills)){
					foreach($job_skills as $key=>$value)
					{
			  ?>
						<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
				<?php
					}
				}
				?>
			  </select>
			  </span>
			  
			  </div>
		</div>
		<div class="ChooseSkill" style="margin: 0 10px 0 20px;">
 
		<div class="ChooseSkillIn"><span class="slct_rwndInPut">
		  <select class="custom_dropdown-2 slct_rwndInPutRi rate_dropdown self_rate_check validate_self_rate" style="width: 210px;">
			<option value="">-- Select Rate --</option>
			<?php
			foreach(Configure::read('Self.Rate') as $key1=>$value1)
			{
			?>
				<option value="<?php echo $key1; ?>"><?php echo $value1; ?></option>
			<?php
			}
			?>
		  </select>
		  </span>
		 
		  </div>
		</div>
		<?php /* <input type="hidden" class="hidden_user_id" value="<?php echo $this->Session->read('Auth.User.id');?>"/> */?>
		<a href="javascript:void(0)" class="delete_clone delete dlt_mrgn"></a>
	</div>
</div>
<?php
	if (class_exists('JsHelper') && method_exists($this->Js, 'writeBuffer')) 
	echo $this->Js->writeBuffer();
?>
<script type="text/javascript"> 


 // Document ready Stack   :   
	jQuery(document).ready(function(){
		 
		
	});





	function hide_loading_image(id)
	{
		$("#"+id).hide();
	}
	
	function show_loading_image(id)
	{
		$("#"+id).show();
	}
	
	function checkdegree()
	{
		
	   $('.customerror').remove();
	   var st=1;
	   $('div#skill_container_parent .validate_skill').each(function() {	
		  //console.log($(this).attr("id"));
		  if($(this).val()=="")
		  {
			
			 st=0;
			 $(this).after('<span class="customerror" style="color:red; font-family:arial; font-size:12px;">Skill is required.</span><br/>');
			
		  }
	   });
	   $('div#skill_container_parent .validate_self_rate').each(function() {	
		  //console.log($(this).attr("id"));
		  if($(this).val()=="")
		  {
			
			 st=0;
			 $(this).after('<span class="customerror" style="color:red; font-family:arial; font-size:12px;"">Self rate is required.</span><br/>');
		  }
	   });
	  if($("#WorkingStatusWorkingStatus").length != 0)
	  {
		  if($("#WorkingStatusWorkingStatus").val() == null )
		  {
				
				st=0;
				 $(".custom_working_status").after('<span class="customerror" style="color:red; font-family:arial; font-size:12px;float:left; clear: both;">Please select atleast one option.</span><br/>');
		  }
	  }
		
		if(st==1)
		return true;
		else
		return false;

	}
</script>
	



