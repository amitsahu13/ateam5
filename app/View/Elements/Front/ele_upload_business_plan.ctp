<?php echo $this->Html->script(array('ajaxuploadimage/ajaxupload'));?>
<script type="text/javascript">
    jQuery(function($){
        //code for uploading project image starts here
        var btnUpload=$('#upload_file');
        var status=$('#status');
		var i = 0;
		
        new AjaxUpload(btnUpload, {		
		
            action: '<?php echo(SITE_URL);?>/projects/project_fileupload',

            //Name of the file input box
            name: 'data[FileTemp][project_file]',
			id:'project_file',
            onSubmit: function(file, ext){
			  if (! (ext && /^(ppt|pptx)$/.test(ext))){
                    $('#status2').text('Only  ppt,pptx files are allowed.').addClass('errorTxt');
                    return false;
                }
				
               $('#status2').html('<img src="<?php echo(SITE_URL); ?>/img/ajax-loader_2.gif"/>');
                //status.text('Uploading...');
            },

            onComplete: function(file, response){

                //On completion clear the status
               // status.text('');
				$('#status2').html('');
                //Add uploaded file to list
                var myimageresponse = response.split('|');
				//alert(myimageresponse);
                if(myimageresponse[0]==="success"){
				
                    $('#fileattache').append('<li id='+myimageresponse[2]+'>'+myimageresponse[1]+'<div class="edit_deletBX"><input type="button"  value="" title="download" class="download" id="north-west"><input type="button" value="" class="info"  title="'+myimageresponse[3]+'" id="north-east"><input type="button" title="delete" value="" class="delete" id="east"><input type="hidden" name="data[ProjectBusinessplanFile]['+i+'][file_name]"  value="'+myimageresponse[1]+'"/></div></li>');
                }else{
                    $('<li></li>').appendTo('#files').text(file).addClass('errorTxt');
                }
				i++;
            }
        });

        // code for uploading user image end here
    });
    String.prototype.trim = function() {
        return this.replace(/^\s+|\s+$/g,"");
    }
    // code for uploading user image end here
	
	
</script>
			<div class="compensation_frmrow_L">
				<p><label>Business Plan Files</label></p>
			</div>
			<div class="compensation_frmrow_R">
			<p> 
			
			<input name="" type="button"  id='upload_file' class="upload_btn" value="Upload File"/><span id="status2" style="color:red;"></span>
			<?php //echo $this->Form->input('business_plan_doc', array('div'=>false, 'label'=>false, "class" => "TXT_rwndInPutRi with_Lrg",'type'=>'file'));?>
			  <a href='/img/projects/model.pptx' style='float:left;padding-left:10px;margin-top:-15px; ' title= "Use our sample Business Model Canvas" > 
			   <img src='/img/projects/bsicon.jpg' width="40px" >  </a>	
				  
			</p>
			<div class="clear"></div>
				
				<div id="placement-examples" class="add_edit_upld">
				<ul id="fileattache">
					<?php 
					//pr($project_file);
					if(!empty($project_file)){
						
						foreach($project_file as $file)
						{
						
					?>
							<li id="<?php echo $file['FileTemp']['id'];?>"><?php echo $file['FileTemp']['project_file'];?> 
								<div class="edit_deletBX">
									<input type="button" title="download" value="" class="download" id="north-west">
									<input type="button" value="" title="<?php echo date('F j, Y, g:i a',strtotime($file['FileTemp']['created']));?>" class="info" id="north-east">
									<input type="button" value="" class="delete" id="east" title="delete">
								</div>
							</li>
					
					<?php
						}
					}else{
						if(isset($this->request->data['ProjectBusinessplanFile']) && !empty($this->request->data['ProjectBusinessplanFile'])){
							foreach($this->request->data['ProjectBusinessplanFile'] as $file)
							{				
						?>
							<li id="<?php echo $file['project_id'];?>" proj-id="<?php echo $file['id'];?>"><?php echo $file['file_name'];?> 
								<div class="edit_deletBX">
									<input type="button" title="download"  value="" class="download download_edit" id="north-west">
									<input type="button" value="" class="info info_edit" title="<?php echo date('F j, Y, g:i a',strtotime($file['created']));?>" id="north-east">
									<input type="button" title="delete" value="" class="delete delete_edit" id="east">
								</div>
							</li>
						
						<?php
							}
						}
					}	
					?>
				</ul> 
				
				</div>
		
			</div>