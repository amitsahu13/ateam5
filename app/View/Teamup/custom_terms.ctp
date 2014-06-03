<h3 class='title_h3' >  Terms and Milestones  </h3>
	<script type='text/javascript'>  
		var   remove = false ;  
		var current_row  = null ;  
	
	</script>


<style> 
	#predefined{
	z-index:99999 ;
		
	}
	</style>
	<!--  Create Popup  -->  
	
		<div class="popup-wrapper show"  id='milestoneeditor' > 
									<div class='popup_invite_deffault popup'> 
										<h3> Add  Item </h3><div class="popup_invite_content">
											   <p>  Title   <textarea id='title_value'></textarea></p> 
											   <p> Value  <textarea id='value_value'></textarea>
										      <span class="continue_team  addmilestonepop" style="margin-left: 10px; cursor: pointer;"  > Submit   </span> 
							   				 <span class="continue_team js-ClosePopup" style="margin-left: 10px; cursor: pointer;"  >Cancel  </span> 
							   				 <div class="clear"></div>
										</div>
								   	</div>
								</div>
	 
	 
	 
	
	<!--  End Create Popup  Stakc  -->




<div class='cont milestones_content<? if ($canedit ):?> milestones_canedit<? endif;?>'>  
	<div class="cmpnsn_prgrsDV">
		<div class="cmpnsn_prgrsnav">
			<ul>
			
			<li>
					<a href="<?=Router::url("/teamup/general/".$job_id."/".$user_id."",true)?><? if ($toid ):?>/<?=$id?><?endif;?>"><span >1</span> General </a>
				</li>
				
				
				
				<li>
					<a href="<?=Router::url("/teamup/milestones/".$job_id."/".$user_id."",true)?><? if ($toid ):?>/<?=$id?><?endif;?>"><span >2</span> Milestones Table</a>
				</li>
				 
				<li>
					<a href="<?=Router::url("/teamup/custom_terms/".$id , true)?>"class="blue"> <span class="blue">3</span> Custom Terms</a>
				</li>
			</ul>
		</div>
	</div> 
	<div class="product_dscrpBOX" style="width:100%;">	
	<form method='post'>  
		<input type='hidden'  name='proceed' value='proceed'/> 
		<h4>Custom Terms:</h4> 
		<div class="work_product_content custom_terms">
			<p>Add your custom terms here (choose from predefined options or add full customized options)</p>
			<table border="0" cellspacing="0" cellpadding="0" width="100%" class="tbl tablelistSe tbl_c" id="milestoneadd">
			 
				<tbody id='values'>
					<?foreach($data as $d):?>
						<tr>
							<td>
								<textarea class="input-text title" name='title[]'  ><?=$d["teamup_terms"]["title"]?></textarea>
							</td>
							<td>
								<textarea class="input-text value" name='value[]'  ><?=$d["teamup_terms"]["value"]?></textarea>
							</td> 
							<? if($canedit && $can_remove):?> 
								<td>
									<a href='javascript:void(0)' class='delete removed'></a>
								</td> 
							<?endif;?>    
						</tr>
					<?endforeach;?> 
				</tbody> 
			</table>
			<? if($canedit):?> 
				<div class="AddSkill" style="width: auto; margin-bottom: 10px;"><a href="javascript:void(0);" id="addskill" class="AddSkillBtn addnewvalue">Add Value</a></div>
			<? endif;?>  
			<div class="clear"></div>
		</div>
		
		<h4>Custom Agreements:</h4> 
		<div class="work_product_content">
			<p>You can upload your own agreements if you wish as long as they don't violate our Mandatory Terms. Latest uploaded doc that was confirmed by both parties is governing. Also, any revision change other than milestone update can be uploaded only as a file. </p>  

			<? if (isset($ileader)):?>   
			 
			<!--  Files Goes Here :  -->
			<?php echo $this->Html->script(array('ajaxuploadimage/ajaxupload'));?>
				<script type="text/javascript">
					jQuery(function($){
						//code for uploading job image starts here
						var btnUpload=$('#upload_file');
						var status=$('#status');
						var i = 0;
			
						new AjaxUpload(btnUpload, {		
			
						action: '<?php echo(SITE_URL);?>/teamup/uploadfile/<?=$id?>',

						//Name of the file input box
						name: 'data[JobFileTemp][job_file]',
						id:'job_file',
						onSubmit: function(file, ext){
				
						if (! (ext && /^(doc|pdf|docx|xls|txt)$/.test(ext))){
							// check for valid file extension
							$('#status2').text('Only Doc, Pdf ,Docx ,xls or txt files are allowed.').addClass('errorTxt');
							return false;
						}
					
						$('#status2').html('<img src="<?php echo(SITE_URL); ?>/img/ajax-loader_2.gif"/>');
						//status.text('Uploading...');
					},

					onComplete: function(file, response){

						 
						$('#status2').html('');
					 
						var myimageresponse = response.split('|');
				 
						if(myimageresponse[0]==="success"){
							$('#fileattache').append('<li id='+myimageresponse[2]+'><span class="word-wrap width-65">'+myimageresponse[1]+'</span><div class="edit_deletBX"><input type="button" title="" value="" class="download" id="north-west"><input type="button" value="" class="info" id="north-east"><input type="button" value="" class="delete" id="east"><input type="hidden" name="data[JobBidFile]['+i+'][job_bid_file]" value="'+myimageresponse[1]+'"/></div></li>');
						}else{
							$('<li></li>').appendTo('#files').text(file).addClass('errorTxt');
						}
						i++;
						
						
						<?if ($is_send) : ?>  
						location.reload(true);
						<? endif;?>  
						
						
						
						} 
				
					});

				// code for uploading user image end here
				});
				String.prototype.trim = function() {
					return this.replace(/^\s+|\s+$/g,"");
				}
				// code for uploading user image end here
				</script>
				
					<? endif;  ?>  
				
				<div class="compensation_frmrow_R">
				
						<? if ($leader):?>   
					<p>
						<input name="" type="button"  id='upload_file' class="upload_btn" value="Upload File"/><span id="status2" style="color:red;"></span>
						<?php //echo $this->Form->input('business_plan_doc', array('div'=>false, 'label'=>false, "class" => "TXT_rwndInPutRi with_Lrg",'type'=>'file'));?>
					</p>
					
						<? endif;  ?>  
						
						
						
					<div class="clear"></div>
					<div id="placement-examples" class="add_edit_upld">
						<ul id="fileattache"> 
							<?php foreach($files as $f):?>
								<li id="<?=$f->id?>">
									<span class="word-wrap width-65"><?=$f->file?></span>
									<div class="edit_deletBX"> 
										<input type="button" title="" value="<?=$f->id?>" class="download" id="north-west" >
										<input type="button" value="<?=$f->id?>" class="info" id="north-east" title='<?=$f->title?>'>
										<? if ($canedit &&  $can_remove):?> 
											<input type="button" value="<?=$f->id?>" class="delete" id="east">
										<?php endif;?> 
									</div>
									<div class="clear"></div>
								</li>  
							<?php endforeach;?> 
						</ul>
					</div>
				</div>
				<div class="clear"></div>
			 

			
			</div>
	 

			<?if ($is_send) : ?>   
				<h3 style="margin: 30px 20px 0; border-bottom: none; padding: 0;">Revision History:</h3>
				<div class="work_product_content" style="padding: 20px 20px 0">
					<ol class="work_product_list">
						<? foreach($log as $l):  
							echo  "<li>   
								{$l->time } 
								{$l->text} 
							</li>";
						endforeach  ; ?>
					</ol> 
				</div>
			<? endif;?>  

			<!--  End REvision Here  :   -->
 
 				<script type='text/javascript'>  
 					
 				jQuery(document).ready(function(){ 
 					
 					  jQuery('#report2').parent().fadeIn();
 					 
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
						 
						
					 
 					 jQuery(".download").click(function(){
						var id =  jQuery(this).val(); 
					   window.location =   "<?=Router::url("/",true)?>/teamup/downloadfile/"+id;  							 				
					}); 
 				});
 				
 				</script>
 
 
			<? if ($canedit):?>  
				<script type='text/javascript'>   
					$('table.tbl').eq('0').css({'border':'none'});
					
					$('.js-ClosePopup').bind('click', function(){
	  					$('.popup').animate({'top': '-1000px'}, 300, function(){$('.popup-wrapper').fadeOut();});
	  				});
	  				 
					
					
					
					// new Value   Cliked   here   For   Stack  :   
					jQuery(".addnewvalue").click(function(){ 
						 	jQuery(".popup-wrapper.show").fadeIn();
		  					$('.popup-wrapper.show .popup').css('top', '-1000px')
		  									.animate({'top': '0'}, 500);
		  					 reInit() ;  
					 });
					
					 	
					jQuery(".removed").click(function(){
						jQuery(this).parent().parent().remove();  
					}); 	 	
					
					
					
					
					jQuery(document).ready(function(){
						 reInit() ; 
						 
						setInterval(function(){ 
							
							 
							jQuery(".download").click(function(){
								var id =  jQuery(this).val(); 
							   window.location =   "<?=Router::url("/",true)?>/teamup/downloadfile/"+id;  							 				
							}); 
						 
							jQuery(".delete").click(function(){
								var id =  jQuery(this).val();  
								jQuery.get("<?=Router::url("/",true)?>/teamup/removefile/"+id); 
								jQuery(this).parent().parent().hide(); 
							}); 
						},2600);
					});
				</script> 
			<? endif;?>  
	 
			<? if(!$canedit):?>   
				<script type='text/javascript'>  
	 				jQuery(document).ready(function(){
						jQuery("textarea").attr("disabled",  "disabled");
					});
				</script>
			<? endif;?>    
			
			
			<?if ($needconfirm): ?> 
				<input type='hidden'  name='agree'  value='1' />   
				<button type='submit'>  I Confirm This Terms   </button>   
				
				<? else:?> 
				
					 
						 <? if (isset($changed)):?>  
							<input type='hidden'  name='changed' value='1' />  
							<button type='submit'>  I agree with this changes   </button>   
						 <? endif; ?>  
	 
			
			<? endif ;  ?>  
			 
			 
		
			
			<span style="float:left; margin-left: 20px;" class="Continue4Btn">
				<button onclick="history.go(-1);return false;"  class="Continue4BtnRi">Back</button>
			</span>
			 
			<? if (isset($canupdate)):?>  
		 
		  		<?if ($is_send) : ?>   
					<span style="float:right; margin-right: 22px;" class="Continue4Btn">
						<input type='hidden' name='resendreview'  value='1' /> 
						
						<input type="submit" value="Resend for Review " class="Continue4BtnRi" name="">
					</span>
   				 <? endif;?>  
 					
			<? endif;?> 
			
			<? if (isset($first_send)):?> 
			
			<span style="float:right;" class="Continue4Btn">
						<input type="submit" value="Send For <?=$expert_name?> Review" class="Continue4BtnRi" name="">
					</span>
			<?endif;?> 
			  
	</form>
	</div> 
</div>
  
  
  <script type='text/javascript'>    
  		
  			jQuery(document).ready(function(){

				//  predefined Values :  
				jQuery("a.predefineds").click(function(){
				  	 		var text =jQuery(this).text() ;  
				  		  
				  		 		jQuery("#title_value").val(text);
				  		 		 jQuery("#value_value").attr("placeholder",jQuery(this).attr("rel"));
				  		 		 setTimeout(function(){
				  		 		  jQuery("#predefined").hide(); 
				  		 		  
				  		 		 },200);
				  		 	
				}); 
  			
  			
  			   
  				jQuery(".addmilestonepop").click(function(){
  					
  					var title  = jQuery("#title_value").val(); 
  					var value =   jQuery("#value_value").val(); 
  					
  					$('table.tbl').eq('0').css({'border':'1px solid #ebebeb'});
					jQuery("#values").append("<tr><td width='250px'><textarea class='input-text title' name='title[]'  >"+title+"</textarea></td><td><textarea class='input-text value' name='value[]'  >"+value+"</textarea></td><td><a href='javascript:void(0)' class='delete removed' style='margin: 0;'></a></td>     </tr>  "); 
					jQuery(".removed").click(function(){
						jQuery(this).parent().parent().remove();  
					});  
					
					  reInit(); 
					  jQuery("#title_value").val("");
					  jQuery("#value_value").val(""); 
						$('.popup').animate({'top': '-1000px'}, 300, function(){$('.popup-wrapper').fadeOut();});  
  					
  				});
  			
  			
  			
  			});
  
  	
  		  	function reInit(){
  				  	jQuery("#title_value").focus(function(){
  						 jQuery(this).removeAttr("readonly");  
  						 jQuery("#predefined").slideDown("fast"); 
  						 current_row =  this ; 
  				  			var position = jQuery(this).offset();  
  							position.top = position.top - 110; 
  							position.left = position.left - 110; 
  				        	jQuery("#predefined").css( position);
  				        }); 
  		  	
  				  	  
  					jQuery("#value_value").focusout(function(){
 						   setTimeout(function(){
 							  jQuery("#predefined").hide();
 						   },500);
 					 }); 
  			  		
  			} 
  </script>
  
 
 		<div id='predefined' style='display:none; '>  
 			<ul> 
 			<?php
 				$value  = unserialize(CONTRACTS); 
 				foreach($value as $k=>$b){
					echo "<li>  <a href='javascript:void(0);' class='predefineds' rel='{$b}'> {$k}</a>        </li>";
				 } 			
 			?>
 			</ul>
  		</div>
  
 
	