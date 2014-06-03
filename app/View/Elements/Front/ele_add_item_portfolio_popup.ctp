<?php 
echo $this->Html->script(array('calender/jquery-1.6.2.min','calender/jquery-ui.min','calender/jquery-ui-timepicker-addon'));
echo $this->Html->css(array('calender/jquery-ui'));
?>
<?php echo $this->Html->script(array('ajaxuploadimage/ajaxupload'));?>
<script type="text/javascript">
    
	
	jQuery(function($){	
		
		calender_data();
		function calender_data(){
			
				jQuery(".datepicker").datetimepicker({
					showSecond: false,
					showHour: false,
					showMinute: false,
					showSecond: false,
					showTime: false,
					showTimepicker:false,
					/* timeFormat: 'hh:mm:ss',
					stepHour: 1,
					stepMinute: 5,
					stepSecond: 10, */
					beforeShow: function(input, inst)
					{	//input.offsetHeight
						inst.dpDiv.css({marginTop: -1 + 'px', marginLeft: input.offsetWidth + 'px'});
					},changeYear: true,dateFormat: 'yy-mm-dd',changeMonth: true, minDate: '-100Y',maxDate:new Date(2099,12,00),
					yearRange: '-100',showAnim: 'fold',showOn: 'both',buttonImageOnly: true, buttonImage: ''+SiteUrl+'/img/icons/icon_cle.png'
				});
            jQuery(".datepicker").datepicker("setDate" , new Date());
		}	
	 });
	jQuery(function($){
        //code for uploading project image starts here
        var btnUpload=$('#upload');
        var status=$('#status');
		
        new AjaxUpload(btnUpload, {		
		
            action: '<?php echo(SITE_URL);?>/users/user_portfolio_upload',

            //Name of the file input box
            name: 'data[UserPortfolio][image]',
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
				
                    $('#imageshow').html('<img src="<?php echo(SITE_URL); ?>/img/users/'+myimageresponse[3]+'/images/portfolio/thumb/'+myimageresponse[1]+'"/><input type="hidden" name="data[UserPortfolio][image]" value="'+myimageresponse[1]+'"/><input type="hidden" name="data[UserPortfolio][user_id]" value="'+myimageresponse[3]+'"/><input type="hidden" name="data[UserPortfolio][id]" value="'+myimageresponse[2]+'"/>');
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
<div class="popup_wrapper" style="width:476px;">
		<div class="overlay"></div>
		<div class="boxpopup box"  style="width:476px;">
			<a onclick="closeOffersDialog('portfolio');" class="boxclose"></a>
			<div style="width:476px;">
			<?php echo $this->Form->create('UserPortfolio');?>
						<div class="PoupWrp">
						  <div class="PoupIn">
						  
							<h2>Add item to portfolio</h2>
							<div class="PoupInFrm">
							  <ul class="PoupAddFrm">
								<li>
								  <label>Title*</label>	
								 <div class="addportfolio">
								  <?php echo $this->Form->input('UserPortfolio.title', array('div'=>false, 'label'=>false, "class" => "AddTxtFild"));?>					</div>												  
								</li>
								<li>
								  <label>Date</label>
								  <div class="addportfolio">
								  <?php echo $this->Form->input('portfolio_date', array('type'=>'text','div'=>false,'readonly'=>true, 'label'=>false, "class" => "dateFild datepicker"));?> 
								</div>									  
								</li>
								<li>
								  <label>Category*</label>
								  <span class="slct_rwndInPut">
								   <div class="addportfolio">
								   <?php echo $this->Form->input('category_id', array('div'=>false, 'label'=>false, "class" => "slct_rwndInPutRi with_sml1","empty"=>'Select Category'));?>
								   </div>
								  </span>
								</li>
								<li>
								  <label>Image/File*</label>
								  <input type="button" name="" class="upload_btn" value="Upload Picture" id="upload">
								  <span id="status"></span>
								  <div class="PictShow" id="imageshow">
								  
								  </div>								  
								</li>
								<li>
								  <label>Url</label>
								   <div class="addportfolio">
								   <?php echo $this->Form->input('url', array('div'=>false, 'label'=>false, "class" => "AddTxtFild"));?>
								   </div>	
								</li>
								<li>
								  <label>Description</label>
								  <div class="addportfolio">
								 <?php echo $this->Form->input('description', array('div'=>false,'type'=>'textarea','label'=>false, "class" => "Description"));?> </div>	
								</li>
								<li>
								  <label>&nbsp;</label>
								  <span class="Continue4Btn" style="float:right; margin:0 26px 0 0;">
								
								 <?php echo $this->Js->submit('Submit', array(
															'update' => '#show_portfolio',
															'div' => false,																'url'=>array('action'=>'add_portfolio'),
															'class'=>'Continue4BtnRi'
														));
									?>					
								  </span>
								</li>
							  </ul>
							</div>
							<div class="clear"></div>
						  </div>
						  <div class="clear"></div>
						</div>				
				<?php
					echo $this->Form->end();
				?>
			</div>
			<div class="Clear"></div>
		</div>
		<div class="Clear"></div>
	</div>

<?php
	if (class_exists('JsHelper') && method_exists($this->Js, 'writeBuffer')) 
	echo $this->Js->writeBuffer();
?>	