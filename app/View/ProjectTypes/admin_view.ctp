<div class="content-box"><!-- Start Content Box -->
	
	<div class="content-box-header">
		
		<h3 style="cursor: s-resize;"><?php echo $model;?>s</h3>
		
		<ul class="content-box-tabs">
			<li></li>
		</ul>
		
		<div class="clear"></div>
		
	</div> <!-- End .content-box-header -->
	
	<div class="content-box-content">
		
		<div style="display: none;" class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
			
			
			<table id="admins">
				
				<thead>
					<tr>
						<th><?php echo $model;?></th>						
					</tr>					
				</thead>
			 
				<tfoot>
					<tr>
						<td colspan="2">
							<div class="bulk-actions align-left">
								
								<?php echo $this->Html->link("Back", array('action'=>'index'), array("class"=>"button", "escape"=>false));
								?>
								
							</div>
							
						</td>
					</tr>
				</tfoot>
			 
				<tbody>
					<tr>
						<td>Name</td>
						<td><?php echo ($agreement[''.$model.'']['name']);?></td>
					</tr>
					<tr>
						<td>Status</td>
						<td><?php echo ($agreement['Faq']['question']);?></td>
					</tr>
				</tbody>
			</table>			
		</div> 		
	</div> <!-- End .content-box-content -->
	
</div> <!-- End .content-box -->
		