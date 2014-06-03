<h3 class='title_h3' >  Terms and Milestones  </h3>
<div class='cont milestones_content<? if ($canedit ):?> milestones_canedit<? endif;?>'> 
	<div class="cmpnsn_prgrsDV"> 
		<div class="cmpnsn_prgrsnav">
			<ul>
					<li><a href="<?=Router::url("/teamup/general/".$job_id."/".$user_id."",true)?><? if ($toid ):?>/<?=$id?><?endif;?>"
				> <span >1</span> General
				</a></li>


				<li><a href="<?=Router::url("/teamup/milestones/".$job_id."/".$user_id."",true)?><? if ($toid ):?>/<?=$id?><?endif;?>"
				> <span >1</span>  Milestones
				</a></li>
				
			
				<li><a href="<?=Router::url("/teamup/custom_terms/".$id , true)?>"
				  class=""> <span
						class="">3</span>  Custom Terms
				</a></li>
				
			</ul>
		 </div>
	 </div>
 
	 <div class="product_dscrpBOX" style="width:100%;">
		<h3><span class="round_bgTXT">2</span>Work Product- Collateral IP Escrow</h3>
		<div class="work_product_content">
			<p> In addition to the work product mandatory terms as defined on the Terms of usage you can set the following customizable Options  </p>  
			<form method='post'>    
				<input type='hidden'  name='proceed'  value='1'/> 
				
				<div class="work_product_fieldset">
				
				
				
					<input type='checkbox'  class="js-checkbox" id="id-1" name='ck1'  <? if($data["ck1"]=="on") echo "checked" ;  ?>    ><label for="id-1">Define what happens in case of incorporation</label><br/>
					
					
					<div class="js-checkSHOWhide sda1">
					
						<div class="work_product_field">					
							<input type='radio'  name='what[]'  value='continue' <? if($data["what"]=="continue") echo "checked" ;  ?> > Continue the same way (Default)
						</div>
						
						<div class="work_product_field">	
							<input type='radio'  name='what[]'  value='percent'  <? if($data["what"]=="percent") echo "checked" ;  ?> > % turn to Equity in the company with exact same portions
						</div>
						
						<div class="work_product_field">	
							<input type='radio'  name='what[]' value='other'   <? if($data["what"]=="other") echo "checked" ;  ?>>  
							<textarea class="input-text" name='other'><?=$data["other"]?></textarea>
						</div>
					</div>
					 <script type='text/javascript'>  
					 	jQuery(document).ready(function(){
					 		<? if (isset($data["what"]) && $data["what"]!=""):?> 
					 		setTimeout(function(){jQuery(".sda1").slideToggle();},500);
					 		<?endif;?> 
					 		
					 	});
					 </script>
					
					
					
				</div>
				
				
				
				
				<div class="work_product_fieldset">
				
					<input type='checkbox' name='noend' id="id-2" class="js-checkbox"    <? if($data["noend"]=="on") echo "checked" ;  ?> ><label for="id-2">No End date specified (Default)</label><br/>
					
					<div class="work_product_field js-checkSHOWhide sda2">
						<input type='radio'  name='yesend'  <? if($data["yesend"]=="on") echo "checked" ;  ?> > End Date clause : On the      , Revenue sharing will stop and all   <input type='text' class="input-text"  style="width: 10%;" name='end'  value='<?=$data["end"]?>'> work  product supplied by the expert will be owned by the leader. 
					</div>
					
					<script type='text/javascript'>  
					 	jQuery(document).ready(function(){
					 		<? if (isset($data["yesend"]) &&  $data["yesend"]=="on"):?> 
					 		setTimeout(function(){jQuery(".sda2").slideToggle();},500);
					 		<?endif;?> 
					 		
					 	});
					 </script> 
					
				</div>
				
				
				
				<div class="work_product_fieldset">
				
				
					<input type='checkbox'  class="js-checkbox" id="id-3"  name='ck2'  <? if($data["ck2"]=="on") echo "checked" ;  ?>   ><label for="id-3">Define a buy-out option and compensation (Enables the leader to stop paying revenues before the "End-Date" on his own decision but with compensation)</label><br/>
				<script type='text/javascript'>  
					 	jQuery(document).ready(function(){
					 		<? if (isset($data["ck4"]) &&  $data["ck4"]=="on"):?> 
					 		setTimeout(function(){jQuery(".sda3").slideToggle();},500);
					 		<?endif;?> 
					 		
					 	});
					 </script> 
					 
					
					<div class="work_product_field js-checkSHOWhide sda3">
						<textarea class="input-text" style="margin-left: 15px;" name='buyoption'><?=$data["buyoption"]?></textarea>  
					</div>
					
					<script type='text/javascript'>  
					 	jQuery(document).ready(function(){
					 		<? if (isset($data["ck2"]) &&  $data["ck2"]=="on"):?> 
					 		setTimeout(function(){jQuery(".sda3").slideToggle();},500);
					 		<?endif;?> 
					 		
					 	});
					 </script>  
					
					
				</div>
				
				
				<script type='text/javascript'>
					$(document).ready(function(){
						$('.js-checkSHOWhide').hide();
						$('.js-checkbox').change(function(){
							$(this).parent().find('.js-checkSHOWhide').slideToggle();
						});
						
						 
						
						
					});
				</script>
				
				
				<? if (!$canedit):?>   
					<script type='text/javascript'>  					
						jQuery(document).ready(function(){
							jQuery("input[type='text']").attr("disabled",  "disabled");
							jQuery("input[type='checkbox']").attr("disabled",  "disabled"); 
							jQuery("input[type='radio']").attr("disabled",  "disabled"); 
							jQuery("textarea").attr("disabled",  "disabled");
							
						});
					</script>
					
				<? endif;?>   
				
				<!--  GoBack  Redirect Cliked Here    -->
					<script type='text/javascript'> 
						function goback(url){ 
							 jQuery.post('<?=Router::url("/",true)?>redirect/setback/',{back:url},function(){
								  jQuery(".Continue4BtnRi").click(); 
								});
							return false ; 
						}
					</script> 
					
				<!--  GoBack   End Redirect  --> 
				
				
				
					
				<span style="float:left;" class="Continue4Btn">
					<button onclick="goback('<?=Router::url("/teamup/milestones/".$job_id."/".$user_id."",true)?><? if ($toid ):?>/<?=$id?><?endif;?>');return false;"  class="Continue4BtnRi">Back</button>
				</span>
				<span style="float:right;" class="Continue4Btn">
					<input type="submit" value="Next" class="Continue4BtnRi" name="">
				</span>
				<div class="clear"></div>
			</form>
		</div>
	</div> 
	
</div> 