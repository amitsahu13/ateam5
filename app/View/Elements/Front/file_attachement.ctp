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
			
                if (! (ext && /^(doc|pdf|docx|xls|xlsx|txt|ppt|pptx)$/.test(ext))){
                    // check for valid file extension
                   $('#status2').text('Only Doc, Pdf ,Docx ,xls or txt files are allowed.').addClass('errorTxt');
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
				//alert(myimageresponse[3]);
                    $('#fileattache').append('<li id='+myimageresponse[2]+'>'+myimageresponse[1]+'<div class="edit_deletBX"><input type="button" title="download" value="" class="download north-east" id="north-west"><input type="button"  value="" title="'+myimageresponse[3]+'" class="info " ><input type="button" value="" class="delete" title="delete" id="east"><input type="hidden" name="data[ProjectFile]['+i+'][project_file]" value="'+myimageresponse[1]+'"/></div></li>');
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
				<p><label>Files</label></p>
			</div>
			<div class="compensation_frmrow_R">
			<p>
			<input name="" type="button"  id='upload_file' class="upload_btn" value="Upload File"/>
			<span id="status2" style="color:red;"></span>
			<?php //echo $this->Form->input('business_plan_doc', array('div'=>false, 'label'=>false, "class" => "TXT_rwndInPutRi with_Lrg",'type'=>'file'));?>
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
							<li id="<?php echo $file['FileTemp']['id'];?>"><?php echo $file['FileTemp']['file_name'];?> 
								<div class="edit_deletBX">
									<input type="button" title="download" value="" class="download" id="north-west">
									<input type="button" value="" class="info north-east"  title="<?php echo date('F j, Y, g:i a',strtotime($file['FileTemp']['created']));?>">
									<input type="button" value="" title="delete" class="delete" id="east">
								</div>
							</li>
					
					<?php
						}
					}else{
					
						if(isset($projectfile) && !empty($projectfile)){						
							foreach($projectfile as $file)
								{
								
							?>
									<li id="<?php echo $file['ProjectFile']['project_id'];?>" proj-id="<?php echo $file['ProjectFile']['id'];?>"><?php echo $file['ProjectFile']['project_file'];?> 
										<div class="edit_deletBX">
											<input type="button" title="download" value="" class="download download_edit" id="north-west" >
											<input type="button" value="" class="info info_edit north-east"  title="<?php echo date('F j, Y, g:i a',strtotime($file['ProjectFile']['created']));?>">
											<input type="button" value="" title="delete" class="delete delete_edit" id="east">
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