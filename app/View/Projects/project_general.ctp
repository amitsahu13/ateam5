

<?php echo $this->element("Front/ele_post_project_navigation");?>	
<?php echo $this->Html->script(array('ajaxuploadimage/ajaxupload'));?>
<script type="text/javascript">
    jQuery(function($){
        //code for uploading project image starts here
        var btnUpload=$('#upload');
        var status=$('#status');
		
        new AjaxUpload(btnUpload, {		
					
            action: '<?php echo(SITE_URL);?>/projects/project_picupload',

            //Name of the file input box
            name: 'data[ImageTemp][project_image]',
			id:	'project_image',
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
				
                    $('#userimageid').html('<img src="<?php echo(SITE_URL); ?>/img/project_temp/image/Thumb/thumb_'+myimageresponse[1]+'"/><input type="hidden" name="data[ImageTemp][project_image]" value="'+myimageresponse[1]+'"/>');
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




<div class="product_dscrpBOX" style="width:100%;">
<h3><span class="round_bgTXT">1</span>General</h3>
<div class="compensation_frmDV">
<?php

$url  = array('controller'=>'projects','action'=>'project_general');   

if  (!empty($_GET["new"]))
$url  = array('controller'=>'projects','action'=>'project_general?status=1'); 


echo $this->Form->create('Project',array('url'=>$url,'type'=>'file'));


echo $this->Form->hidden('id');
if(!empty($project_image)){
	echo $this->Form->hidden('project_image',array('value'=>$project_image['ImageTemp']['project_image']));
}
if(!empty($project_file)){
						
	foreach($project_file as $key=>$file)
	{		
		echo $this->Form->hidden('ProjectFile.'.$key.'.project_file',array('value'=>$file['FileTemp']['project_file']));	
	}
}
?>
		<div class="compensation_frmrow general_row">
					<label class="compensation_frmrow_L">Project Name<span>*</span></label>
			<div class="compensation_frmrow_R">
				<?php echo $this->Form->input('title', array('div'=>false, 'label'=>false, "class" => "TXT_rwndInPutRi with_Lrg"));?>
			</div>
		</div>
		
		<div class="compensation_frmrow general_row" style='display:none;'>
					<label class="compensation_frmrow_L">Project Image Text<span>*</span></label>
			<div class="compensation_frmrow_R">
				<?php echo $this->Form->input('project_image_text', array('div'=>false, 'label'=>false, "class" => "TXT_rwndInPutRi with_Lrg"));?>
			</div>
		</div>
		
		<div class="compensation_frmrow general_row">
			<label class="compensation_frmrow_L">Project Detailed Description<span>*</span></label>			
			<div class="compensation_frmrow_R">
				<span class="rwndInPut_TXTaria">
				<?php echo $this->Form->input('description', array('div'=>false, 'label'=>false, "class" => "TXTaria_rwndInPutRi","style"=>"width:338px;"));?>
				</span>
			</div>
		</div>
		
		<div class="compensation_frmrow general_row" style='displaY:none;'>
			<div class="compensation_frmrow_R">
			<?php  
				echo ($this->Form->input('project_description_visibility', array('type'=>'radio', 'options'=>Configure::read('App.ProjectDescription.Visiblity'),'default'=>'1', 'div'=>false,'legend'=>false, 'label'=>false,'class'=>'chckBX','style'=>'margin:0 6px 0 16px;')));
			?>
			</div>
		</div>
		 
		<div class="compensation_frmrow  general_row">
			<label class="compensation_frmrow_L">Project Picture</label>
			<div class="compensation_frmrow_R">							
				<input name="" type="button"  id='upload' class="upload_btn" value="Upload Picture"/>
				<span id="status" style="color:red;"></span><br/>
				<span id="userimageid">
				<?php
					
					if(!empty($project_image)){
						
						echo $this->Html->image('project_temp/image/Thumb/thumb_'.$project_image['ImageTemp']['project_image']);
					}else{
						
						if(isset($this->request->data['Project']['id']) && !empty($this->request->data['Project']['id'])){
						
						echo $this->Html->image('projects/'.$this->request->data['Project']['id'].'/image/Thumb/thumb_'.$project_img['Project']['project_image']);
						}
					}
				 ?>			
				</span>
			</div>
		</div>
		<div class="compensation_frmrow general_row">
			<?php echo $this->element("Front/file_attachement");?>
		</div>
		<div class="compensation_frmrow general_row">
			<label  class="compensation_frmrow_L">Project Category<span>*</span></label>
			<div class="compensation_frmrow_R">
				<span class="slct_rwndInPut">
				<?php
				echo ($this->Form->input('category_id', array('div'=>false, 'label'=>false,'empty'=>'-- Select a category--', "class" => "custom_dropdown","options"=>$project_parent_category))); 
				$this->Js->get('#ProjectCategoryId')->event('change',$this->Js->request(array('controller'=>'categories','action'=>'get_project_subcategory_front'), array('update'=>'#project_subcategory_update','async' => true,'method' => 'post','dataExpression'=>true,'data'=> $this->Js->serializeForm(array('isForm' => true,'inline' => true)))));
				?>
				</span>
				<span class="slct_rwndInPut" style="margin-left:15px;" id="project_subcategory_update">
				<?php
				
				//pr($sub_categories);
				 if(!empty($sub_categories) && $sub_categories!=''){
					echo $this->Form->input('sub_category_id', array('div'=>false, 'label'=>false,"options"=>$sub_categories,'empty'=>'-- Select a sub category --', "class" => "custom_dropdown")); 
				}else{
						$sub_categories = [] ;  
						$sub_categories[0] = "N/A";  
					if (empty($sub_categories))
						echo $this->Form->input('sub_category_id', array('div'=>false, 'label'=>false,'empty'=>'-- Select a sub category  --', "class" => "custom_dropdown","options"=>$sub_categories));    
						else
						echo $this->Form->input('sub_category_id', array('div'=>false, 'label'=>false,'empty'=>'-- Select a sub category --', "class" => "custom_dropdown","options"=>$sub_categories)); 



				}
				?>
				</span>
				
			</div>
		</div>
		<div class="compensation_frmrow  general_row">
			<label class="compensation_frmrow_L">Project Type<span>*</span></label>
			     <div class="compensation_frmrow_R">
					<span class="slct_rwndInPut">
						<?php
						echo ($this->Form->input('project_type_id', array('div'=>false, 'label'=>false,'empty'=>'-- Select Project Type --', "class" => "custom_dropdown","options"=>$project_types))); 
						?>
					</span>
			</div>     
            
		</div>
		
		
		
		
		<!--  Project   Coolaboration  STY -->
		<div class="compensation_frmrow  general_row">
			<div id='colaborations'>  
			
			
			
		</div>	
			</div>
		
		 
		<!--  End Project colaboration  HERE :   -->
		 
		  <script type='text/javascript'>   
		 	
		  	jQuery(document).ready(function(){ 

		  		<? if ($col_edit):?>


		  		 jQuery("#ProjectCategoryId").change(function(){
		  		   var val  =  jQuery(this).find("option:selected").val();  
		  		   $.get("/collaboration/getprojectcolaboration/"+val+'/<?=$project_id?>' ,function(d){
		  			    	   $("#colaborations").html(d); 
		  			   
		  		   }); 
		  		  });  


		  		  <? endif;?> 
		  		 
		  		  
		  		 
		  		 //  Val  : 
		  		 var val  =   jQuery("#ProjectCategoryId").find("option:selected").val();  
		  	 		if (val != "") 
		  		   $.get("/collaboration/getprojectcolaboration/"+val+'/<?=$project_id?>' ,function(d){
		  			    	   $("#colaborations").html(d); 

		  			    	   
		  			   
		  		   });  
		  		 
		  		 
		  		 
		  	}); 
		  
		  
		  </script>
		
		
		
		
		
		
		
		
		
		
					
					
		<div class="compensation_frmrow general_row">
			<label class="compensation_frmrow_L">Project Target Location<span>*</span></label>
			<div class="compensation_frmrow_R">
					<span class="slct_rwndInPut">
						<?php echo ($this->Form->input('region_id', array('div'=>false, 'label'=>false,'empty'=>'-- Select Region --','options'=>$region,"class" => "custom_dropdown","error" => array("wrap" =>EDITWRAP, "class" => "error-message"))));
						$this->Js->get('#ProjectRegionId')->event('change',$this->Js->request(array('controller'=>'countries','action'=>'get_country_region_for_project'), array('update'=>'#location','async' => true,'method' => 'post','dataExpression'=>true,'data'=> $this->Js->serializeForm(array('isForm' => true,'inline' => true)))));
					?> 
					</span>
					<div id="location">
						<span class="slct_rwndInPut" style="margin-left:15px;"  id="update_country">
							<?php if (!empty($countries) && $countries!=''){
									
								echo ($this->Form->input('country_id', array('div'=>false, 'label'=>false, 'options'=>$countries ,"class" => "custom_dropdown","error" => array("wrap" =>EDITWRAP, "class" => "error-message",'empty'=>'-- Select Country --'))));
							}else{  
							
								echo ($this->Form->input('country_id', array('div'=>false, 'label'=>false,  'empty'=>'-- Select Country --',"class" => "custom_dropdown","error" => array("wrap" =>EDITWRAP, "class" => "error-message",'empty'=>'-- Select Country --'))));
							}
							$this->Js->get('#ProjectCountryId')->event('change',$this->Js->request(array('controller'=>'states','action'=>'get_state_for_project'), array('update'=>'#State','async' => true,'method' => 'post', 'dataExpression'=>true, 'data'=> $this->Js->serializeForm(array('isForm' => true,'inline' => true)))));
							?> 
						</span>
						<span class="slct_rwndInPut"  id="State" style="margin-top: 5px;">
						<?php if(!empty($states) && $states!=''){
										
									echo ($this->Form->input('state_id', array('div'=>false, 'label'=>false, 'options'=>$states ,"class" => "custom_dropdown","error" => array("wrap" =>EDITWRAP, "class" => "error-message",'empty'=>'-- Select State --'))));
								}else{  
								
									echo ($this->Form->input('state_id', array('div'=>false, 'label'=>false,  'empty'=>'-- Select State --',"class" => "custom_dropdown","error" => array("wrap" =>EDITWRAP, "class" => "error-message",'empty'=>'-- Select State --'))));
								}
						?>
					
						</span>
					</div>
			</div>
		</div>
			
			
			<!--  Visibility Goesn Here   --> 
					
							<div class="compensation_frmrow  general_row">
						<label class="compensation_frmrow_L">Project Posting Visiblity<span>*</span></label>
							 <div class="compensation_frmrow_R">
								<span class="slct_rwndInPut">
									<?php echo $this->Form->input('visibility',array('div'=>false,'escape'=>false  ,'label'=>false, 'options'=>array("1"=>"Public-Visible to everyone", "0"=>"Private - Only experts I invite can respond"),'empty'=>'---Select Visibility---','class'=>'custom_dropdown'));?>
									
								</span>
						</div>     
						
					</div>	
					
					 
					 
		<div class="btm_nextbtnDV"> 
		<span class="Continue4Btn" style="float:right; margin: 0;" >
			<input type="submit" name="" class="Continue4BtnRi" value="Next">
		</span>
		<!--<span class="Continue4Btn" style="float:right;">
			<input type="button" name="" class="Continue4BtnRi" value="Back">
		</span>-->
		</div>
			
    <?php
	echo $this->Form->end();
	?>
	</div>
</div>
<script type="text/javascript">

  setInterval(function(){
	  
	  $(".custom_dropdown").selectbox();	  
  },100); 
		 




	jQuery(function(){		
		jQuery(".delete").live('click',function(){
			var id 		= 	jQuery(this).closest('li').attr('id');			
			jConfirm('Are you sure you want to delete this file?', 'Confirmation Dialog', function(r) {
				if(r == true)	{
					jQuery.ajax({
						type:"GET",
						url:"<?php echo Router::url(array('controller'=>'projects', 'action'=>'delete_project_file')); ?>/"+ id,
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
			window.location = SiteUrl+"/projects/download_project_file/"+ id;
		});
		
		jQuery(".delete_edit").live('click',function(){
			var id 		= 	jQuery(this).closest('li').attr('id');	
			var proj_id = 	jQuery(this).closest('li').attr('proj-id');			
						
			jConfirm('Are you sure you want to delete this file?', 'Confirmation Dialog', function(r) {
				if(r == true)	{
					jQuery.ajax({
						type:"GET",
						url:"<?php echo Router::url(array('controller'=>'projects', 'action'=>'delete_project_file_edit')); ?>/"+ proj_id+"/"+id,
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
			var proj_id = 	jQuery(this).closest('li').attr('proj-id');
			window.location = SiteUrl+"/projects/download_project_file_edit/"+ proj_id+"/"+id;
		});
		
	});	
</script>		
<?php
	if (class_exists('JsHelper') && method_exists($this->Js, 'writeBuffer')) 
	echo $this->Js->writeBuffer();
?>		

	
