<link rel="stylesheet" type="text/css" href="/css/jquery.jscrollpane">
<script type="text/javascript" src="/js/jquery.mousewheel.js"></script>	
<script type="text/javascript" src="/js/jquery.jscrollpane.min.js"></script>	
	







 

<?php if (isset($removed)):?> 
	<!--  Removed   ChatRoom  -->
	  <!-- Script -->  
 <script type="text/javascript"> 
  		jQuery(document).ready(function(){
				
  		 


  					 	jQuery("#addmember").fadeIn();
		  					$('#addmember .popup').css('top', '-1000px')
		  									.animate({'top': '0'}, 500);
 
  


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


    <!-- Popup Starts Here  -->  

							<div class="popup-wrapper show"  id='addmember' > 
									<div class='popup_invite_deffault popup'> 
										<h3> Leave Chatroom: <span id='rtitle'> <?=$title?> </span> </h3><div class="popup_invite_content">
											<form method="post"  > 
											<input type='hidden' name='mark_removed' id='removeto' value='<?=$room?>' /> 
												<p> <?=REMOVE_CHAT_ROOM_2.$removed?></p>		
												  <button type='submit'>    Leave Chatroom </button> 
												</form>  
 												 <span class="continue_team js-ClosePopup" style="margin-left: 10px; cursor: pointer;"  >Cancel  </span> 
							   				 
 											 <div class="clear"></div>
										</div>
								   	</div>
								</div>
	   



   <!--  End Popup here  -->



	<!--  End Removed chatRoom  --> 
<?endif;?> 



		<!-- Add   Memebers  Popups  -->  
		<script type='text/javascript'>  
 					
 				jQuery(document).ready(function(){ 
 					

 					$(".addmember").click(function(){
						jQuery("#addmember").fadeIn();
		  					$('#addmember .popup').css('top', '-1000px')
		  									.animate({'top': '0'}, 500);
 						});

 

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

        <!--  Add MEmebers   Popup   Start -->
	<div class="popup-wrapper show"  id='addmember' > 
									<div class='popup_invite_deffault popup'> 
										<h3> Select members: </h3><div class="popup_invite_content">
											<form method="post">  
											<div class="popup_fieldset">
											<? foreach($pmembers as $id=>$m):?>
												<div class="popup_field">
													<input type='checkbox' name='members[]' value='<?=$id?>' /> <?=$m?>
												</div>
											<?endforeach;?> 
											</div>
											<div class="popup_fieldset">
											<?php if (count($pmembers)==0) 
												echo  "<p> No Members Found </p>  ";
											?> 
											</div>
											<div class="popup_fieldset">
												<span class="continue_team js-ClosePopup" style="margin-left: 10px; cursor: pointer;"  >Cancel  </span> 
												<button type='submit' class="continue_team">Submit</button>
											</div>
											 
												</form>  

										     
							   				 
							   				 

							   				 <div class="clear"></div>
										</div>
								   	</div>
								</div>
	  



		<!-- And Add members List   --->

<div class="right_sidebar"> 


<? if(isset($project)):?> 
<h3 class='title_h3'>   Project  Workroom </h3>
<? else:?>  
<h3 class='title_h3'>   Job  Workroom </h3>  
<? endif;?> 


 		<?php   echo $this->element("Front/ele_workrooms_drop" , array("type"=>"wokroom")); ?>
 		
 	 
	<h2><a href="">&nbsp;</a></h2> 
	
	
	<div class="product_dscrpBOX" style="min-height: 260px; height: 260px; overflow: hidden; margin-bottom: 10px;"> 

	
		<!-- Title Goes Here   -->    

		<h3>
			<?=$title ;?>
		</h3> 

		<!-- End Title Goes -->   



		<div class="product_dscrpBOX_left">
			<div class="product_dscrpBOX_left_img">
				<?php 
					 
					echo $this->General->show_project_img($projectid, $projectimage,'THUMB', $title );
					
					?>
			</div>

			<?php  if ($leader ==  $user):?>
				<div class="AddSkill" style="margin-left: 15px;"><a href="javascript:void(0);" class='addmember'>  Add Member </a></div>
			<?endif;?>


		</div>
		<div class="product_dscrpBOX_ryt">


			<ul>
				<li> Attendees:</li>
 			<? foreach($leaders as $id=>$username):  ?>
 			 
 			  
				<li class="skyblue"><a
					href='<?=Router::url(array("controller"=>"Users", "action"=>"user_public_view", $id))?>'
					class="col_blue" style="padding: 0;"> <?=$username?>
				</a></li>
				<? endforeach ; ?>
 
 				
 				
 
 
 
 

  			<? foreach($experts as $id=>$username):  ?>
  			
  					<!--  Check if user  -->
  					
  			
  			<? if ($leader !=  $user   )   
				//if (Workroom::isHidden($id, $room))
					//continue;

				?>
  			
  			 				 <li class="pink"><a
								href='<?=Router::url(array("controller"=>"Users", "action"=>"user_public_view", $id))?>'
								class="pink js-greyCol "  <? if (Workroom::isHidden($id, $room)) echo "style='color:Grey;'";  ?> > <?=$username?>
							 </a>  
							 
							 
						 
							<? if ($leader ==  $user  &&  (isset($project))==true )  : ?>
							  	 
							   	<? if (Workroom::isHidden($id, $room)) : ?>
							   					    <a href='javascript:void(0)' class='hideexpert' rel='<?=$id?>' style='display:none;'> 
								   					 <span class="exprt_smbl2"></span> </a>  
								   					 
								 				  <a href='javascript:void(0)' class='showexpert' rel='<?=$id?>' > 
								   					 <span class="exprt_smbl" ></span> </a> 
							   		<?else:?>  
							   		
							   		    <a href='javascript:void(0)' class='hideexpert' rel='<?=$id?>'> 
								   					 <span class="exprt_smbl2"></span> </a>  
								   					 
								 				  <a href='javascript:void(0)' class='showexpert' rel='<?=$id?>' style='display:none;'> 
								   					 <span class="exprt_smbl" ></span> </a> 
							   		
							   	
							   	<?endif;?>
							  	 
							  
								 
								 
								 
								 <?endif;?> 
								 
								 
								 
							 </li> 
							 
							 
							 
							 
		     <? endforeach ; ?> 
		    
		     
		     
		     
		     
 			</ul>
 		</div>
	</div>


	<div class="product_jobfiles">
		<h5>Files:</h5>
		<div class="add_edit_scrl scroll-pane" id="placement-examples" style="height: 190px; margin-bottom: 10px;">
			<ul style="min-height: 210px;">
				<? 
			  foreach($files as $f):  
			if ($f->name !="") : 
			  ?>

				<li>
					<span class="word-wrap width-65"><?=$f->name?></span>
					<div class="edit_deletBX">
						<input type="button" id="north-west" class="download" value=""
							title="" rel='<?=$f->id?>'> <input type="button"
							id="north-east" class="info" value="" title="File Uploaded:<?=$f->date?> " rel='<?=$f->date?>'>
						<?
						    if ($user == $this->leader) :?>
						<input type="button" id="east" class="delete" value="">
						<? endif;?>
					</div>
				</li>
 				<? 
 				endif ;  
 				 endforeach;?>
 </ul> 

 

		</div>
		<? if (isset($teamup)){?> 
		     	  <a href='/Teamup/general/<?=$job_id?>/<?=$to_user2?>/<?=$teamup?>' class="milestones-link"><i class="milestones_icon"></i>Terms and Milestones</a> 
		      <?}else{?> 
				<div class="clear"></div>
				<div  style="height: 29px; width: 100%;"></div>
			  <?}?>
	</div>
</div>


<!--  Show Popup  If Team Up   --> 
 						 <?php if(isset($teamup)  ):  ?> 
			   					<div class="popup-wrapper show"> 
									<div class='popup_invite_deffault popup'> 
										<h3>  Contract  </h3><div class="popup_invite_content">
											<p><?=TEAMUP_TEXT?> </p>  
											<span class="continue_team js-ClosePopup" style="margin-left: 10px; cursor: pointer;">Cancel  </span> 
							   				 	<a href="/Teamup/milestones/<?=$job_id?>/<?=$to_user2?>" class="continue_team">   Define terms </a>  
							   				 <div class="clear"></div>
										</div>
								   	</div>
								</div>
			 		 <?endif;?> 
  <!--  Chat Panel   Goes HERE   -->

<div class="right_sidebar_2">
	<div class="post_cmntDV">
 		<form method='POST' enctype='multipart/form-data'>

			<textarea name="chat" cols="" rows="" class="txtaria" required></textarea>
	</div>
	<div class="post_cmnt_row">
			

            <? echo $this->Element("Front/ele_chatroom_attach")?>


        <button class="post_msg_btn"></button>
	</div>
	</form>

 <div class="tble_list">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tbody id='chat'>

				<tr class="odd">
					<td width="23%"><span class="who">Who</span></td>
					<td width="61%"><span class="what">What</span></td>
					<td width="16%"><span class="when">When</span></td>
				</tr>

  	<?
  	$num =0  ; 
  	 foreach($chat as $c): 
$num++ ; ?> 
 				<!--  Foreach Chat   -->
				<tr class="even"  id='<?=$c->id?>'>
					<td align="left" valign="top"><span class="blue milestones-link"><?=$c->user?>:</span></td>
					<td align="left" valign="top"><p> <?=$c->text?></a>
						

						<? echo $c->file;?>



						
						</td>
					<td align="left" valign="top"><code> <?=$c->ago?></code></td>
				</tr>
				<!--  EndForeach Chat  --> 
		 
		 <? endforeach;?>
		 
		 
		 
		 
		 
		 
		 </tbody>
		</table>
		<span class="Continue4Btn" style="margin: 10px;">
			<a href='javascript:void(0)' class='loadmore Continue4BtnRi'> Load More</a>
		</span>
		
		
	</div>
</div>
 
<script type='text/javascript'>
		var room = '<?=$room?>';  // room 
jQuery(document).ready(function() { 
	
	<? if (isset($show_team)):?>
	jQuery(".popup-wrapper.show").fadeIn();
	$('.popup-wrapper.show .popup').css('top', '-1000px')
					.animate({'top': '0'}, 500);
	<? endif;?>  
	
	
	
		closePopup();
		

	$('#addAttachInput').css({'position':'absolute', 'left':'-10000px'});
	$('#addAttach').click(function(){
		$(this).siblings('#addAttachInput').click();
	});
		
		
	function closePopup() {
		$('.popup-wrapper').bind('click', function(event){
			var container = $(this).find('.popup');
			if (container.has(event.target).length === 0){
				container.animate({'top': '-1000px'}, 700, function(){$('.popup-wrapper').fadeOut();});
			}
		});
		$('.js-ClosePopup').bind('click', function(){
			$('.popup').animate({'top': '-1000px'}, 300, function(){$('.popup-wrapper').fadeOut();});
		});
	}
	
	

	// hide Expert  
	jQuery(".hideexpert").click(function(){
	 	var user =  jQuery(this).attr("rel"); 
	 	jQuery.get("<?=Router::url('/',true)?>workrooms/hideexpert/"+room+"/"+user+'/<?=$projectid?>');
	 	jQuery(this).hide(); 
	 	jQuery(this).parent().find(".showexpert").show();
        jQuery(this).parent().find('.js-greyCol').css({'color':'grey'})
							 .removeClass('pink');
	 	 
	});


	jQuery(".showexpert").click(function(){
	 	var user =  jQuery(this).attr("rel"); 
	 	jQuery.get("<?=Router::url('/',true)?>workrooms/showexpert/"+room+"/"+user+'/<?=$projectid?>');
	 	jQuery(this).hide(); 
	 	jQuery(this).parent().find(".hideexpert").show();
        jQuery(this).parent()('.js-greyCol').removeAttr('style')
							 .addClass('pink');
	});
	


	$('.scroll-pane').jScrollPane();	
	
	
		jQuery(".download").click(function() {
			var host = '<?=Router::url('/workrooms/downloadfile/', true);?>';
			var file_id = jQuery(this).attr("rel");
			var url = host + file_id + "/<?=$projectid?>";
			window.location = url;
		});
		jQuery(".info").click(function() {
			alert("File uploaded: " + jQuery(this).attr("rel"));
		}); 
 	  
	  jQuery(".loadmore").click(function(){
		  var last   = jQuery("#chat tr:last").attr("id"); 
		  jQuery.get("<?=Router::url('/workrooms/loadmore/', true);?>"+last+"/"+room, function(data){
			   // Append Stack  :  
			   jQuery("#chat").append(data);  
		  if (data=="") 
			  jQuery(".loadmore").hide(); 
		  
		 	 });
	  });  
	  
	  
	  
	   jQuery(".removeuser").click(function(){
		   	 var  href =  jQuery(this).attr("href");
		   	 jQuery(this).parent().hide(); 
		   	  jQuery.get(href,function(d){
		   		 window.location.reload(); 
		   	  }); 	 
		    return false;  
	   });
	  
	  
	  
	  
	  
	  
	  
	});
</script>
 

 