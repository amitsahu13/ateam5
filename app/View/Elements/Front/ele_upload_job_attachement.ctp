<?php echo $this->Html->script(array('ajaxuploadimage/ajaxupload'));?>
<script type="text/javascript">
    jQuery(function($){
        //code for uploading project image starts here
        var btnUpload=$('#upload_file');
        var status=$('#status');
		var i = 0;
		
        new AjaxUpload(btnUpload, {		
		
            action: '<?php echo(SITE_URL);?>/jobs/job_attachementupload',

            //Name of the file input box
            name: 'data[FileTemp][project_file]',
			id:'project_file',
            onSubmit: function(file, ext){
			
                if (! (ext && /^(doc|pdf|docx|xls|xlsx|txt|ppt|pptx)$/.test(ext))){
                    // check for valid file extension
                   $('#status2').text('Only Doc, Pdf ,Docx ,xls,xlsx,ppt,pptx or txt files are allowed.').addClass('errorTxt');
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
				
                if(myimageresponse[0]==="success"){
				
                    $('#fileattache').append('<li id='+myimageresponse[2]+'>'+myimageresponse[1]+'<div class="edit_deletBX"><input type="button" title="download" value="" class="download" id="north-west"><input title="'+myimageresponse[3]+'" type="button" value="" class="info" id="north-east"><input type="button" value="" title="delete" class="delete" id="east"><input type="hidden" name="data[JobAttachment]['+i+'][file_name]" value="'+myimageresponse[1]+'"/></div></li>');
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
				<p><label>Job Attachments</label></p>
			</div>
			<div class="compensation_frmrow_R">
			<p>
				<input name="" type="button"  id='upload_file' class="upload_btn" value="Upload Attachments"/>
				<span id="status2" style="color:red;"></span>
				<?php //echo $this->Form->input('business_plan_doc', array('div'=>false, 'label'=>false, "class" => "TXT_rwndInPutRi with_Lrg",'type'=>'file'));?>
			</p>
			<div class="clear"></div>
				
				<div id="placement-examples" class="add_edit_upld">
				<ul id="fileattache">
					<?php 
					//pr($job_file);
					if(!empty($job_file)){
						
						foreach($job_file as $file)
						{
						
					?>
							<li id="<?php echo $file['FileTemp']['id'];?>"><?php echo $file['FileTemp']['file_name'];?> 
								<div class="edit_deletBX">
									<input type="button" title="download" value="" class="download" id="north-west">
									<? if (isset($file['FileTemp']['created'])): ?>
									<input type="button" value="" class="info" id="north-east" title="<?php echo date('F j, Y, g:i a',strtotime($file['FileTemp']['created']));?>"> 
									<? endif ; ?>
									<input type="button" value="" title="delete" class="delete" id="east">
								</div>
							</li>
					
					<?php
						}
					}else{
						
						if(isset($jobfile) && !empty($jobfile)){
							foreach($jobfile as $file)
							{	
									
						?>
							<li id="<?php echo $file['JobAttachment']['job_id'];?>" job-data-id="<?php echo $file['JobAttachment']['id'];?>">
							<?php echo $file['JobAttachment']['file_name'];?> 
								<div class="edit_deletBX">
									<input type="button" title="download" value="" class="download download_edit" id="north-west">
									<input type="button" value="" class="info info_edit" title="<?php echo date('F j, Y, g:i a',strtotime($file['JobAttachment']['created']));?>" id="north-east">
									<input type="button" alt="delete" title="delete" class="delete delete_edit" id="east">
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
<?php
if (class_exists('JsHelper') && method_exists($this->Js, 'writeBuffer')) 
echo $this->Js->writeBuffer();
?>			