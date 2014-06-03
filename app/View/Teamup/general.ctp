<?
 App::import("model","Job");

?>
<h3 class='title_h3'>Terms and Milestones - <?=Job::get_job_title($job_id)?></h3>
<div class='cont milestones_content sets-1<? if ($canedit ):?> milestones_canedit<? endif;?>'> 
	<div class="cmpnsn_prgrsDV"> 
		<div class="cmpnsn_prgrsnav">
			<ul> 
				<li>
					<a href="<?=Router::url("/teamup/general/".$job_id."/".$user_id."/{$id}",true)?><? if ($toid ):?>/<?=$id?><?endif;?>" class='blue'>
						<span class='blue'>1</span> General
					</a>
				</li>
				<li>
					<a href="<?=Router::url("/teamup/milestones/".$job_id."/".$user_id."/{$id}",true)?><? if ($toid ):?>/<?=$id?><?endif;?>">
						<span >2</span> Milestones
					</a>
				</li>
				<li>
					<a href="<?=Router::url("/teamup/custom_terms/".$id , true)?>">
						<span>3</span> Custom Terms
					</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="product_dscrpBOX milestones_content_block" style="width:100%;">
		<h3 class="general_heading"><span class="round_bgTXT">1</span> General</h3> 
		<form  method='post'>   
			<input type='hidden' name='general' value='1' />  
			<!--  Content Starts   here :    -->
			<?if ($freelacner==0):?>
				<h4>Work Product Ownership</h4>
				<h5>Collaborative Work Product & IP Ownership *</h5>
				<p>
					Define Who will own the  collaboratively developed Work Product and IP  (intellectual property � Patents , Trademarks, Trade secrets)*<br/>
					<b>Note : Earnings sharing is something different and defined later in the Milestones Table</b>
				</p>   
				<select name='owner' class="custom_dropdown" <?=($canedit==false?'disabled':'')?>> 
					<?foreach($owner as $re):?> 
						<option value='<?=$re?>' <?php if (isset($data) && $data["owner"]==$re) echo "selected";?>>
							<?=$re?>
						</option>
					<?endforeach;?> 
				</select>
				<h5>Who can act on contracts related to the Work Product and IP? *</h5>
				<select name='contract' class="custom_dropdown" <?=($canedit==false?'disabled':'')?>>
					<?foreach($contract as $re):?> 
						<option value='<?=$re?>' <?php if (isset($data) &&  $data["contract"]==$re)  echo "selected";?>>
							<?=$re?>
						</option>
					<?endforeach;?>
				</select>
				<h4>Credits:</h4>
	 			<p>Will the collaborator be entitled to public credits on his contribution</p>
	 			<select name='credits' class="custom_dropdown" <?=($canedit==false?'disabled':'')?>>
	 				<option value='YES'  <?php if (isset($data) &&  $data["credits"]=="YES") echo "selected";?>>
						YES
					</option>
	 				<option value='NO' <?php if (isset($data) &&  $data["credits"]=="NO") echo "selected";?>>
						NO
					</option>
				</select>
			<?endif;?>
			<h4>Earnings Definition</h4>
			<p>Wherever the term "Earnings"  is used in the contract, it means</p>  
			<p>
				<input type='radio' name='earning' class='otherch' value='Net profits'<?=($canedit==false?'disabled':'')?>  <?php if (isset($data) && $data["earning"]=="Net profits") echo "checked";?>/>
				<b>Net Profits</b> 
				Total revenues less all direct manufacturing and marketing expenses, including commissions payable to third parties and less all direct Overhead and General administrative expenses excluding taxes
			</p>
			<p>
				<input type='radio' name='earning' class='otherch' value='Total Revanues' <?=($canedit==false?'disabled':'')?> <?php if (isset($data) &&  $data["earning"]=="Total Revanues")  echo "checked";?>/>
				<b>Total Revanues</b>
			</p>
			<p>
				<input type='radio' name='earning' class='otherch' value='Other' <?=($canedit==false?'disabled':'')?> <?php if (isset($data) &&  $data["earning"]=="Other") echo "checked";?>/>
				<b>Other</b>
				<input type='text' name='other_text' placeholder='Write Other Options Here'  class='ogther' value='<?php if (isset($data) &&  $data["other_text"])  echo  $data["other_text"];?>' disabled/>
			</p>   
	 
			<script type='text/javascript'>   
				$(document).ready(function(){
					$(".otherch").change(function(){
						var val   =  $(this).val();   
						if (val== "Other"){    				   
							//  ogher disabled 
							$(".ogther").removeAttr("disabled");
						}else{ 
							//  siabled   
							$(".ogther").attr("disabled",  "disabled");  
						}
					});
				});
			</script>
	 
			<span style="float:right;" class="Continue4Btn">
				<input type="submit" value="Next" class="Continue4BtnRi" name="">
			</span>	 
		</form>  
	</div>
	<!--  End Content Area Here :     -->
</div>