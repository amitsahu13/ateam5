<?php
echo $this->Html->script(array('jquery/confirm','jquery/jquery.simplemodal'));
echo $this->Html->css(array('calender/jquery-ui','confirm'));
echo $this->element('Front/ele_authenticate_navigation'); 
echo $this->element('ele_facebook_validation');
echo $this->element('ele_linkdin_validation');
echo $this->element('Front/ajax_loading_effect'); 

 // Check Authorize for Code :    >  
	if (isset($linked)==false || $linked==false)
$this->Linkid->checkAuthrorize(Router::url("/users/social_media_authenticate",true), $user);  
 

	if (isset($linked)==false || $linked==false)
	$this->Linkid->resignID($user); 
   

?>

<div class="product_dscrpBOX" style="width:100%;">
	<h3><span class="round_bgTXT">2</span>Social Media</h3>
	<div class="compensation_frmDV">
	<form action="" method="get">


	<label class="padding_left">


<?php  
	 		switch($status){

				case "0" : 
  				echo " <span  > Please connect your Linkedin account </span> ";
				break ; 

				case "1" : 
  					echo  "<span  > Thanks, Waiting for administrator approval, please continue </span> ";  
				break ; 


				case "2" : 	
  					echo  " <span  >  Connected  <span> "; 
				break ; 

			}
	 	
	 	?>   
	



	</label>


	  <div class="socialnetIcon">
	<p>
	
	
	<a href="<?php echo $this->Linkid->getLink(Router::url("/users/social_media_authenticate",true)) ?>" id="linkdin_validation"><?php echo $this->Html->image('in.jpg',array('title'=>'in','alt'=>'in'));?></a></p> 
	 
	 
	 
	 
	<p> Notes:</p> 
	<p> 
 
1.This data will be used only for confirmation not for public profile.<br> 
2. We recommend our users to show their Linkedin profile link as well as other portfolios site 
    on their <A href='<?=SITE_URL?>users/user_personal_detail'>  Profile page </A>  <br> 
3. Please note that Result will be updated within 2 business days
	
	</p>
  </div>
  
  
  
           <script type='text/javascript'> 
						function goback(url){
		 						window.location =  url ;  
		 						 	return false ; 
						}
					</script>
         <!-- Previous Button Back Stack -->
		 <div class="clear"></div>
         	<div class="btm_nextbtnDV margin_top"> 
				<span style="float:left; margin: 0;" class="Continue4Btn"> 
				<input type="button" name="" class="Continue4BtnRi" value="Previous" onclick="goback('<?=Router::url(array( 'controller' => 'users','action' => 'userinfo_authenticate'), true);?>');">
 				</span>
			<span class="Continue4Btn" style="float:right;margin: 0;" ><?php
			echo $this->Html->link('Next',array('controller'=>'users','action'=>'phone_authenticate'  ),array('class'=>'Continue4BtnRi'));
			?></span>
		  
		</div>
			
	 </form>
	</div>
</div>