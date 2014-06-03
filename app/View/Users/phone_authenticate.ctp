<?php
echo $this->element('Front/ele_authenticate_navigation'); 
if ($confirmed==false):  
?>



<div class="product_dscrpBOX" style="width:100%;">



	<h3><span class="round_bgTXT">3</span>Phone</h3>
	<div class="compensation_frmDV">
	<form action="" method="POST">
	<label class="padding_left">Please review user info definitions :</label>
	<div class="clear"></div>
<label class="padding_left font_size">Please Enter your phone number and wait for our call</label>
		<ul class="RegFrmFild">
		
  <li class="FloatLeFrm widTH">
	<label>Enter Phone #</label>
	<input name="number" type="text" class="TxtFildReg"  value='<?=$this->Session->read("phone")?>'  placeholder="+806322334423" />
	 </li>
	 <span class="Continue4Btn margin_right" style="float:right; margin-bottom:30px; margin-top:20px;">
	 
	 <input type="submit" name="" class="Continue4BtnRi col" value="Send Code">
	 
	 
	 </span> 
  </ul>
  
  <div class="clear"></div>
  <label class="padding_left">Please Enter the code here :</label>  
	<ul class="RegFrmFild">
   <li class="FloatLeFrm widTH">
	<label>Code</label>
	<input name="code" type="text" class="TxtFildReg"  value=''    />
	 </li>
	<span class="Continue4Btn margin_right" style="float:right; margin-bottom:30px;  margin-top:20px;">
	
	<input type="submit" name="" class="Continue4BtnRi col" value="Submit">
	
	
	</span> 
  </ul>
   
   
         <script type='text/javascript'> 
						function goback(url){
					 				window.location= url ;  
					 				
							return false ; 
						}
					</script>
         <!-- Previous Button Back Stack -->
         	<div class="btm_nextbtnDV"> 
				<span style="float:left;" class="Continue4Btn"> 
				<input type="button" name="" class="Continue4BtnRi" value="Previous" onclick="goback('<?=Router::url(array( 'controller' => 'users','action' => 'social_media_authenticate'), true);?>');">
 				</span>
			</div>
			
			
			
			
   
 
			
	 </form>
	</div>
</div>

        <!--Confirmed Phone :  -->
<? else:?>


<div class="product_dscrpBOX" style="width:100%;">
 <h3>   Your Phone is confirmed.  </h3>
 <div class="compensation_frmDV">
 <div class="compensation_frmrow">
  <div class="compensation_frmrow_L"><p><label>Phone:</label></p> </div>
  <div class="compensation_frmrow_R"><p><?=$phone?> </p> </div>
  </div></div>
  
  </div>
  

<?endif;?> 