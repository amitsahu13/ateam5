<?php echo $this->element("Front/ele_post_job_navigation"); ?>		


<div class="product_dscrpBOX" style="width:100%;">
	<h3><span class="round_bgTXT">1</span>General</h3>	   
<?php
echo $this->Form->create('Job',array('url'=>array('controller'=>'jobs','action'=>'job_general',$project_id),'type'=>'file'));
echo $this->Form->hidden('project_id',array('value'=>$project_id));
echo $this->Form->hidden('id');
 



?>

 
	<div class="compensation_frmDV">	
		<div class="compensation_frmrow  general_row">
			<label class="compensation_frmrow_L">Job Name<span>*</span></label>
			<div class="compensation_frmrow_R">
				<?php 
					$title = "";  
					if (isset($JobData)) 
					$title  =$JobData["Job"]["title"] ;

				
				 if ($title!="")
				 echo $this->Form->input('title',array('div'=>false,'label'=>false,'class'=>'TXT_rwndInPutRi with_Lrg' , 'value'=> $title));
				 else 
	 				echo $this->Form->input('title',array('div'=>false,'label'=>false,'class'=>'TXT_rwndInPutRi with_Lrg' ));
				 
				 ?>
			</div>
		</div>
		
		
		
		<div class="compensation_frmrow  general_row">
			<label class="compensation_frmrow_L">Job Detailed Description<span>*</span></label>
			<div class="compensation_frmrow_R">
				<span class="rwndInPut_TXTaria">
				<?php 
				$val = "";  

				if (isset($JobData)) 
					$val  =$JobData["Job"]["description"] ;
					if ($val!="")			 
					echo $this->Form->input('description',array('div'=>false,'label'=>false,'class'=>'TXTaria_rwndInPutRi','type'=>'textarea', 'value'=>$val));
					else 
					echo $this->Form->input('description',array('div'=>false,'label'=>false,'class'=>'TXTaria_rwndInPutRi','type'=>'textarea')); 
 					
 					?>
				
				</span>
			</div>
		</div> 
		
		<?
		 if (isset($update)) 
 			echo  "<input type='hidden'  name='update' value='{$update}'/>  " ;  

		?>
		
		<div class="compensation_frmrow  general_row">
			<label class="compensation_frmrow_L">Job Category<span>*</span></label>
			<div class="compensation_frmrow_R">
				<span class="slct_rwndInPut">
				
				<?php	

$val = "";  

				if (isset($JobData)) 
					$val  =$JobData["Job"]["category_id"] ; 

if ($val!="")
echo $this->Form->input('Job.category_id', array('div'=>false, 'label'=>false, "class" => "slct_rwndInPutRi with_sml1 custom_dropdown",'empty'=>'-- Select Category --' , 'value'=>$val));
else
echo $this->Form->input('Job.category_id', array('div'=>false, 'label'=>false, "class" => "slct_rwndInPutRi with_sml1 custom_dropdown",'empty'=>'-- Select Category --' ));
 $this->Js->get('#JobCategoryId')->event('change',$this->Js->request(array('controller'=>'categories','action'=>'get_skill_and_subcate_front'), array('update'=>'#sub_cat_skills','async' => true,'method' => 'post','dataExpression'=>true,'data'=> $this->Js->serializeForm(array('isForm' => true,'inline' => true)))));
				?> 
				</span>				
			</div>
		</div>
			
		 
		 <div class="compensation_frmrow  general_row"> 



 <!-- Skills bEgins  Here : --> 


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






		</div> 
		
		
		
		<?php 
		
		 
		
		?>   
		<div class="compensation_frmrow">
			<?php echo $this->element("Front/ele_upload_job_attachement");?>	
		</div>		
		
		<div class="compensation_frmrow  general_row">
			<label class="compensation_frmrow_L">Job Target Loaction<span>*</span></label>
			<div class="compensation_frmrow_R">
				<span class="slct_rwndInPut" style="margin-bottom: 5px;">
				<?php	

if (!isset($JobData["Job"]["region_id"]))
echo $this->Form->input('Job.region_id', array('div'=>false, 'label'=>false, "class" => "slct_rwndInPutRi with_sml1 custom_dropdown",'empty'=>'-- Select Region --'));
else 
 echo $this->Form->input('Job.region_id', array('div'=>false, 'label'=>false, "class" => "slct_rwndInPutRi with_sml1 custom_dropdown",'empty'=>'-- Select Region --' , 'value'=> $JobData["Job"]["region_id"]  ));
   


 $this->Js->get('#JobRegionId')->event('change',$this->Js->request(array('controller'=>'countries','action'=>'get_city_front'), array('update'=>'#location','async' => true,'method' => 'post','dataExpression'=>true,'data'=> $this->Js->serializeForm(array('isForm' => true,'inline' => true)))));
  
				?> 
				</span>
				
			</div>
			
			
			
			
			<div id="location" style='display:none;'>
				<div class="compensation_frmrow_R  general_row countrydiv">
					<span class="slct_rwndInPut" style="margin-bottom: 5px;">
					<?php	


if (!isset($JobData["Job"]["country_id"]))
echo $this->Form->input('Job.country_id', array('div'=>false, 'label'=>false, "class" => "slct_rwndInPutRi with_sml1 custom_dropdown",'empty'=>'-- Select Country --'));
else
echo $this->Form->input('Job.country_id', array('div'=>false, 'label'=>false, "class" => "slct_rwndInPutRi with_sml1 custom_dropdown",'empty'=>'-- Select Country --', 'value'=> $JobData["Job"]["country_id"]  ));
 			


	$this->Js->get('#JobCountryId')->event('change',$this->Js->request(array('controller'=>'states','action'=>'get_job_state_front'), array('update'=>'#state','async' => true,'method' => 'post','dataExpression'=>true,'data'=> $this->Js->serializeForm(array('isForm' => true,'inline' => true)))));
					?>
					</span>
					
				</div>
				<div id="state">
					<div class="compensation_frmrow_R  general_row">
						<span class="slct_rwndInPut" style="margin-bottom: 5px;">
						<?php	
if(!isset($JobData["Job"]["state_id"]))
echo $this->Form->input('Job.state_id', array('div'=>false, 'label'=>false, "class" => "slct_rwndInPutRi with_sml1 custom_dropdown",'empty'=>'-- Select State --')); 
else
 echo $this->Form->input('Job.state_id', array('div'=>false, 'label'=>false, "class" => "slct_rwndInPutRi with_sml1 custom_dropdown",'empty'=>'-- Select State --', 'value'=> $JobData["Job"]["state_id"] ));?>
 
		
						</span>
					</div>
				</div>
				
			</div>
			
			
			
			
			
			
			
			
		</div>
		<div class="compensation_frmrow  general_row">
			<label class="compensation_frmrow_L">By City<span> </span></label>
			<div class="compensation_frmrow_R">
				<span class="TXT_rwndInPut">
				<?php 
$val = "";  

				if (isset($JobData)) 
					$val  =$JobData["Job"]["city"] ; 

if ($val!="")
echo $this->Form->input('city',array('div'=>false,'label'=>false,'class'=>'TXT_rwndInPutRi with_Lrg','value'=>$val));
else
echo $this->Form->input('city',array('div'=>false,'label'=>false,'class'=>'TXT_rwndInPutRi with_Lrg')); 

?>
				</span>
			</div>
		</div> 
		
		 <!--   Job general   Collaboration     -->  
			<? if (isset($collaboration)) :?>   
		 
				<div class='collaboration'> 
					<?  
					
							App::import("model", "Colloberation"); 
							$c_model =  new Colloberation() ; 
 					 		 if ($collaboration==0 )
								$collaboration= 3 ; 
							$single_l = $c_model->loadSingle($collaboration) ;  
 
					 ?>
		<div class="compensation_frmrow  general_row">
			<label class="compensation_frmrow_L">Collaboration type:<span> *   </span></label>
			<div class="compensation_frmrow_R" style="margin-bottom: 5px;">
				<select name='collaboration' id='collaboration' class="custom_dropdown">  
					<?foreach($col_list as $r):?> 
					 <? if ($r->title == "Freelancer" && isset($freelance)==false )  
							continue ;   
							  ?>
						<option value='<?=$r->id?>' <? if ($r->id == $collaboration ) echo "selected"; ?>>  <?=$r->title?></option>
				 	<? endforeach; ?> 
				</select>
				   
				  
				   
				   
			</div> 
			
			
			<label class="compensation_frmrow_L">Explanation:<span>     </span></label>
			 <div class="compensation_frmrow_R"><div id='explain'> <?=$single_l->explain?> </div></div> 
			 
			 <label class="compensation_frmrow_L">Example:<span>      </span></label>
			 <div class="compensation_frmrow_R"><div id='example'>  <?=$single_l->example?>   </div> </div> 
			
			 <label class="compensation_frmrow_L">Default Contract : <span>     </span></label>
			<div class="compensation_frmrow_R">  <div id='contract'> <a href='/jobs/read_pdf/<?=$single_l->id?>'  target="_blank">   Independent contractor managed <?=$single_l->title?> default agreement </a> </div>  
			</div>
			
			
		</div>  
		
			
				</div>
		 
		 
		 	<!--  on Change Load info  about    -->
		 	<script type='text/javascript'>  
		 		$(document).ready(function(){
		 			
		 			
		 			$("#JobRegionId").change(function(){
		 				
		 				
		 				$("#location").show(); 
		 			});
		 			
		 			$("#collaboration").change(function(){ 
		 				var id  = $(this).find("option:selected").val();  
		 				 $.get("/collaboration/loadinfo/"+id, function(data){
		 					  j = JSON.parse(data);  
		 					  $("#explain").html(j.explain); 
		 					  $("#example").html(j.example); 
		 					 $("#contract").html(j.link);  
		 				 });  
		 			}); 
		 			
		 			
		 			
		 		}); 
		 	 </script>
		 
		 
			<?endif;?> 
		
		<!--  End job General Collaboration    -->
		
		
		
		<div class="compensation_frmrow  general_row">
			<label class="compensation_frmrow_L">Job Posting Visablity<span>*</span></label>
			<div class="compensation_frmrow_R">
				<span class="slct_rwndInPut">
				<?php	
$val = "";  

				if (isset($JobData)) 
					$val  =$JobData["Job"]["posting_visibility"] ; 
$options   =   Configure::read('Job.Visibility');

 if (isset($private_project))
unset($options[0]);
if ($val!="")
echo $this->Form->input('Job.posting_visibility', array('div'=>false, 'label'=>false, "class" => "slct_rwndInPutRi with_sml1 custom_dropdown",'value'=>$val,  'empty'=>'-- Select Visibility --','options'=>$options));
else 
echo $this->Form->input('Job.posting_visibility', array('div'=>false, 'label'=>false, "class" => "slct_rwndInPutRi with_sml1 custom_dropdown",  'empty'=>'-- Select Visibility --','options'=> $options));
 


?>
			
				</span>				
			</div>
		</div>
		
		
	 
		
		<div class="btm_nextbtnDV"> 
			<span class="Continue4Btn" style="float:right; margin: 0;" >
			<?php echo $this->Form->submit('Next',array('class'=>'Continue4BtnRi'));?>
			</span>
		 
		</div>
			
		</div>
	<?php echo $this->Form->end();?>
</div>
<script type="text/javascript">


		jQuery(document).ready(function(){
			jQuery("#subcategoryDrop").hide();  //  Hide   Default Subcategory 

			setInterval(function(){
				
				if (jQuery("#JobSubCategoryId option").length >= 2){ 
					 
					jQuery("#sub_cat_skills").show(); 
				}else{
				 
				}
				
				
			 
				
				
				
			},500) ; 
			
			
			
		});





	jQuery(function(){		
		jQuery(".delete").live('click',function(){		
			var id 		= 	jQuery(this).closest('li').attr('id');			
			jConfirm('Are you sure you want to delete this file?', 'Confirmation Dialog', function(r) {
				if(r == true)	{
					jQuery.ajax({
						type:"GET",
						url:"<?php echo Router::url(array('controller'=>'jobs', 'action'=>'delete_job_attachement')); ?>/"+ id,
						success : function(data) {
							jQuery('#fileattache').find('#'+id).remove();		
						},
						error : function() {
							jAlert('File could not be deleted. Please try again', 'Alert Dialog');
						},
					})
				}
			});
		});
		jQuery(".download").live('click',function(){
			var id 		= 	jQuery(this).closest('li').attr('id');			
			window.location = SiteUrl+"/jobs/download_job_attachement/"+ id;
		});
		
		
		jQuery(".delete_edit").live('click',function(){
			var id 		= 	jQuery(this).closest('li').attr('id');
			var job_data = 	jQuery(this).closest('li').attr('job-data-id');				
			jConfirm('Are you sure you want to delete this file?', 'Confirmation Dialog', function(r) {
				if(r == true)	{
					jQuery.ajax({
						type:"GET",
						url:"<?php echo Router::url(array('controller'=>'jobs', 'action'=>'delete_job_general_edit_attachement')); ?>/"+job_data+"/"+id,
						success : function(data) {
							jQuery('#fileattache').find('#'+id).remove();		
						},
						error : function() {
							jAlert('File could not be deleted. Please try again', 'Alert Dialog');
						},
					})
				}
			});
		});
		
		jQuery(".download_edit").live('click',function(){
			var id 		= 	jQuery(this).closest('li').attr('id');
			var job_data = 	jQuery(this).closest('li').attr('job-data-id');					
			window.location = SiteUrl+"/jobs/download_job_general_edit_attachement/"+job_data+"/"+id;
		});
	});	
</script>	
<?php
if (class_exists('JsHelper') && method_exists($this->Js, 'writeBuffer')) 
echo $this->Js->writeBuffer();
?>


	