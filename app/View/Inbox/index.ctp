
<!--  Inbox  Store      -->
<h2 style="position: relative; left: 11px;">
	<a>My Inbox</a>
</h2>


<div class="right_sidebar_2">


	<div class="tble_list">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tbody>
				<tr class="odd">
					<td width="23%"><span class="who">From</span></td>
					<td width="51%"><span class="what">Subject</span></td>
					<td width="16%"><span class="when">Date</span></td>
					<td width="20%" style="padding-right: 10px;"><span class="">Attachments</span></td>
				</tr>


				<? foreach($inbox  as $i):
  

					if ($i->raw==0):  
  					if ($i->chat ==1 ):  

						
                	?>

				<tr class="odd">
					<td width="23%"><span class="who"> <a
							href='<?=$i->chatroom?>'> <?=$i->user_name?></a>
					</span></td>
					<td width="61%"><span class="what"> <a
							href='<?=$i->chatroom?>'> <?=$i->text?>
						</a>
					</span></td>
					<td width="16%"><span class="when"> <?=$i->time?></span></td>
					<td width="16%"><span class="">
							<?=$i->attach?>
					</span></td>
				</tr>


				<?else:?>


				<? if ($i->private_room==1 && $i->project !="" && $i->type==1):?>
				<!--  Private Room   -->

				<tr class="odd">
					<td width="23%"><span class="who"> <a
							href='/users/user_public_view/<?=$i->user_id?>'> <?=$i->user_name ;?>
								(<?=$i->total?>)
						</a>
					</span></td>
					<td width="61%"><span class="what"> <a
							href='/Workrooms/projecto/<?=$i->project?>'> <?=$i->text?>
						</a>
					</span></td>
					<td width="16%"><span class="when"> <?=$i->time?></span></td>
					<td width="16%"><span class="">
							<?=$i->attach?>
					</span></td>
				</tr>


				<?else:?>



				<tr class="odd">
					<td width="23%"><span class="who"> <a
							href='/users/user_public_view/<?=$i->user_id?>'> <?=$i->user_name ;?>
								(<?=$i->total?>)
						</a>
					</span></td>
					<td width="61%"><span class="what">


							<? if ($i->type==1):?> <a
							href='/Workrooms/projecto/<?=$i->project?>'> <?=$i->text?>
						</a> <?else:?> <a href='/Workrooms/workroom/<?=$i->room?>'> <?=$i->text?>
						</a> <?endif;?>


					</span></td>
					<td width="16%"><span class="when"> <?=$i->time?></span></td>
					<td width="16%"><span class="">
							<?=$i->attach?>
					</span></td>
				</tr>


				<?endif;?>



				<? endif;?>
				<? else:?>



				<!--  System messages Starts Here :   -->

				<tr class="odd">
					<td width="23%"><span class="who"> <?=$i->user_name?></span></td>

					<? if ($i->job_id!=""): 
                   	 
                   	?>

					<?php if  (  $i->job_id!= ""  ): ?>

					<?php   if (strstr($i->text, "workroom")) :?>

					<td width="61%"><span class="what"> <a
							href='<?=Workroom::getJob($i->job_id)?>'> <?=$i->text?>
						</a>
					</span></td>


					<? else:?>
					<td width="61%"><span class="what">

                        <? if  (!strstr($i->text,"href=")):?>
                        <a href='/jobs/job_detail/<?=$i->job_id?>'> <?=$i->text?> </a>
                        <?else:?>
                        <?=$i->text?>


                        <?endif;?>

					</span></td>
					<?endif;?>






					<?elseif(!empty($i->room)):?>

					<td width="61%"><span class="what"> <a
							href='/workrooms/workroom/<?=$i->room?>'> <?=$i->text?>
						</a>
					</span></td>



					<? endif;?>







					<? else:?>
					<td width="61%"><span class="what"> <?=$i->text?>
					</span></td>
					<?endif;?>



					<td width="16%"><span class="when"> <?=$i->time?></span></td>
					<td width="16%"></td>
				</tr>




				<? endif;?>
				<? endforeach;  ?>


			</tbody>

			<!--  End System Mesasages   -->




		</table>

		<?php  if (count($inbox)==0):  ?>
		<p>Empty Inbox</p>
		<?php endif;?>




	</div>
</div>

<!--  End Inbox   -->