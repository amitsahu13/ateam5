	<div class="paging_n">
			<ul>
				<li class="prev">						
				<?php echo $this->Paginator->prev('Prev', null, null, array('class' => 'disabled'));?>						
				</li>
				<li>Page </li>										
				<li><input type="text" name="data[Paging][page_no]" onkeyup="isNumberKey(this)" class="paging_input" value="<?php echo $this->Paginator->counter(array('format' => '%page%'
));  ?>" /></li><li>of&nbsp;&nbsp; <?php echo $this->Paginator->counter(array('format' => '%pages%'));  ?></li>
				<li class="next">
				<?php echo $this->Paginator->next('Next', null, null, array('class' => 'disabled'));?>
				</li>
			</ul>
		</div>
