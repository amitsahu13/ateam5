<div class="content-box"><!-- Start Content Box -->

	<div class="content-box-header">
		
		<h3 style="cursor: s-resize;">Dispute Detail</h3>
		
		<ul class="content-box-tabs">
			<li></li>
		</ul>
		<?PHP //pr($data); ?>
		<div class="clear"></div>
		
	</div> <!-- End .content-box-header -->
	
	<div class="content-box-content">
		
		<div style="display: none;" class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
			<?php //echo $this->General->data_picture($data['Blog']['id'], $data['Blog']['image'], 'LARGE');?>
			
			<table id="admins" class="wordwrap">
				
				<tfoot>
					<tr>
						<td colspan="2">
							<div class="bulk-actions align-left">
								
								<?php echo $this->Html->link("Back", array('action'=>'index'), array("class"=>"button", "escape"=>false)); ?>
								
							</div>
							
						</td>
					</tr>
				</tfoot>
			 
				<tbody>
					<tr>
						<td>Buyer</td>
						<td><?php echo ($data['Buyer']['first_name']);?></td>
					</tr>
				<!--	<tr>
						<td>Sex</td>
						<td><?php //echo (Configure::read('App.Sex.'.$data['Blog']['sex']));?></td>
					</tr> -->
					
					<tr>
						<td>Provider</td>
						<td><?php echo $data['Provider']['first_name'];?></td>
					</tr>
					<tr>
						<td>Comment</td>
						<td><?php echo nl2br($data[$model]['comment']);?></td>
					</tr>
					<tr>
						<td>Status</td>
						<td><?php echo ($this->Layout->status($data[$model]['status']));?></td>
					</tr>
					<tr>
						<td>Dispute Date</td>
						<td><?php echo ($this->Time->niceShort(strtotime($data[$model]['created'])));?></td>
					</tr>
				</tbody>
				
			</table>
			
		</div> 
		
	</div> <!-- End .content-box-content -->
	
</div> <!-- End .content-box -->