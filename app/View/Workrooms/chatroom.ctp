
 

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


<div class="right_sidebar"> 

<h3 class='title_h3'>  Chatroom </h3> 
	<?php   echo $this->element("Front/ele_workrooms_drop" , array("type"=>"chatroom")); ?>
	 
	<h2><a href="">&nbsp;</a></h2> 
	<div class="product_dscrpBOX" style="min-height: 281px; margin: 0 0 10px;">
		<h3>
			<?=$title ;?>
		</h3>
		<div class="product_dscrpBOX_left">
			<div class="product_dscrpBOX_left_img">
				<?php 
					 
 						echo   "<a href='/users/user_public_view/{$to_user['User']['id']}' class='product_link'>  " .   $this->General->show_user_img($to_user['User']['id'],$to_user['UserDetail']['image'],'SMALL',$to_user['User']['first_name'].' '.$to_user['User']['last_name'])  .  "</a>"  ;
					 
					?>
			</div>
			<div class="product_dscrpBOX_left_discrpsn">
				<ul>

				 
				</ul>
			</div>
		</div>
		<div class="product_dscrpBOX_ryt">
			<ul>
				<li>Attendees:</li>
 			<? foreach($leaders as $id=>$username):  ?>
 			 
 			  
				<li class="skyblue"><a
					href='<?=Router::url(array("controller"=>"Users", "action"=>"user_public_view", $id))?>'
					class="skyblue"> <?=$username?>
				</a></li>
				<? endforeach ; ?>
 

  			<? foreach($experts as $id=>$username):  ?>
  			
  					<!--  Check if user  -->
  					
  			
  			<? if ($leader !=  $user   )   
				if (Workroom::isHidden($id, $room)) 
					continue; 

				?>
  			
  			 				 <li class="pink"><a
								href='<?=Router::url(array("controller"=>"Users", "action"=>"user_public_view", $id))?>'
								class="pink"> <?=$username?>
							 </a>  
							 
							 
						 
							<? if ($leader ==  $user    )  : ?> 
							  	 
							   	<? if (Workroom::isHidden($id, $room)) : ?>
							   					    <a href='javascript:void(0)' class='hideexpert' rel='<?=$id?>' style='display:none;'> 
								   					 <span class="exprt_smbl2"></span> </a>  
								   					 
								 				  <a href='javascript:void(0)' class='showexpert' rel='<?=$id?>' > 
								   					 <span class="exprt_smbl0" ></span> </a> 
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
		<div class="add_edit_scrl" id="placement-examples">
			<ul>
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
	</div>
</div>


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
					<td align="left" valign="top"><span class="blue"><?=$c->user?>:</span></td>
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
		
	$('#addAttachInput').css({'position':'absolute', 'left':'-10000px'});
	$('#addAttach').click(function(){
		$(this).siblings('#addAttachInput').click();
	});

	// hide Expert  
	jQuery(".hideexpert").click(function(){
	 	var user =  jQuery(this).attr("rel"); 
	 	jQuery.get("<?=Router::url('/',true)?>workrooms/hideexpert/"+room+"/"+user+'/<?=$projectid?>');
	 	jQuery(this).hide(); 
	 	jQuery(this).parent().find(".showexpert").show();
	 	 
	});


	jQuery(".showexpert").click(function(){
	 	var user =  jQuery(this).attr("rel"); 
	 	jQuery.get("<?=Router::url('/',true)?>workrooms/showexpert/"+room+"/"+user+'/<?=$projectid?>');
	 	jQuery(this).hide(); 
	 	jQuery(this).parent().find(".hideexpert").show();
	 	 
	});
	


	
	
	
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
 

 