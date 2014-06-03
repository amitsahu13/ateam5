<div class="popup_wrapper" style="width:476px;">
		<div class="overlay"></div>
		<div class="boxpopup box"  style="width:476px;">
			<a onclick="closeOffersDialog('dreamowner');" class="boxclose"></a>
			<div style="width:476px;">
			<?php echo $this->Form->create('DreamOwner');?>
			 <?php echo $this->Form->hidden('DreamOwner.id', array('div'=>false, 'label'=>false, "class" => "AddTxtFild"));?>
			 <?php 
			echo $this->Form->hidden('DreamOwner.project_id', array('div'=>false, 'value'=>$id, 'label'=>false, "class" => "AddTxtFild"));?>				 
						<div class="PoupWrp">
						  <div class="PoupIn">
							<h2>Add item to dream owner statement</h2>
								<div class="PoupInFrm">
									 <ul class="PoupAddFrm">
										<li>
										  <label>Name*</label>	
										 <div class="addportfolio">
										  <?php echo $this->Form->input('DreamOwner.name', array('div'=>false, 'label'=>false, "class" => "AddTxtFild"));?>							</div>												  
										</li>
										<li>
										  <label>Ownership in %*</label>	
										 <div class="addportfolio">
										  <?php echo $this->Form->input('DreamOwner.ownership_percentage', array('div'=>false, 'label'=>false, "class" => "AddTxtFild"));?>					</div>												  
										</li>
										<li>
										  <label>Job Direction*</label>	
										  <span class="slct_rwndInPut">
										 <div class="addportfolio">
										  <?php echo $this->Form->input('DreamOwner.job_direction_id', array('div'=>false, 'label'=>false, "class" => "slct_rwndInPutRi with_sml1",'options'=>$jobdirection,'empty'=>'--Select Job Direction--'));?></div>
										</span>	
										</li>
										<li>
										  <label>&nbsp;</label>
										  <span class="Continue4Btn" style="float:right; margin:0 26px 0 0;">
										  <?php 
											echo $this->Form->submit('Submit', array('class'=>'Continue4BtnRi', 'id'=>'submit-556223728'));
										  ?>
										  <script type="text/javascript">
												//<![CDATA[
												$("#submit-556223728").bind("click", function (event) {
																			$.ajax({
																					data:$("#submit-556223728").closest("form").serialize(), 
																					dataType:"html", 
																					success:function (data, textStatus) {
																					//$("#show_dreamowner").html(data);
																					//var str = /khemit/gi;
																					//console.log(data);
																					var str="<div class='popup_wrapper' style='width:476px;'><div class='overlay'></div>Hello world, welcome to the universe.";
var n=str.indexOf("helo");
																					console.log(n);
																					console.log(data.indexOf("kdsjfdsfdskfkdsfkdsfk"));
																					/* if(str.test(data)){
																						console.log('matched');
																					}
																					else{
																					
																					} */
																						/* if(data.match('/success/g')){
																							$("#dream_owner_table").html(data);
																							closeOffersDialog('dreamowner');
																						}
																						else{
																							$("#show_dreamowner").html(data);
																						}	 */
																					}, 
																					type:"post", 
																					url:"\/team4dream\/projects\/add_dream_owner"
																				});
													return false;});
												//]]>
											</script>
											<?php 		

													
											/* echo $this->Js->submit('Submit', array(
																	'update' => '#show_dreamowner',
																	'div' => false,																		'url'=>array('controller'=>'projects','action'=>'add_dream_owner'),
																	'class'=>'Continue4BtnRi'
																)); */
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