<script type="text/javascript">
	function change_menmber(value){
		if(value==0){
			$('.member').slideUp();
		}else if(value==1){
			$('.member').slideDown();
		}
	}
	function change_authenticate(value){
		if(value==0){
			$('.authenticate').slideUp();
		}else if(value==1){
			$('.authenticate').slideDown();
		}
	}
	function change_pdfs(data){
		if(data==0){
			$('.pdfs').slideUp();
		}else if(data==1){
			$('.pdfs').slideDown();
		}
	}
	function change_percentage(data){
		if(data==0){
			$('.percentage').slideUp();
		}else if(data==1){
			$('.percentage').slideDown();
		}
	}
	function change_sharing(data){
		if(data==0){
			$('.sharing').slideUp();
		}else if(data==1){
			$('.sharing').slideDown();
		}
	}
	
	function change_dispute(data){
		if(data==0){
			$('.dispute').slideUp();
		}else if(data==1){
			$('.dispute').slideDown();
		}
	}
	function change_nda(data){
		if(data==0){
			$('.nda').slideUp();
		}else if(data==1){
			$('.nda').slideDown();
		}
	}
	
</script>
<?php  
echo ($this->Form->hidden('id'));
echo ($this->Form->input('add_member_project_option', array('div'=>false, 'label'=>'Add a member to project:*','type'=>'radio'/* , "class" => "text-input small-input" */, 'default'=>0,'options'=>Configure::read('App.FeesType'),'onchange'=>'change_menmber(this.value);', 'legend'=>'Add a member to project*')));?> 
<?php if(!empty($this->request->data[$model]['add_member_project_option']))
{
$member='style="display:block;"';
}
else
{
$member='style="display:none;"';
}
?>
<div class="member" <?php echo $member; ?>>
<?php echo $this->Form->input('add_member_project_option_value',array('div'=>false,'label'=>'Set the price ($)*')); ?>
</div>

<?php  echo ($this->Form->input('authenticate_myself_option', array('div'=>false, 'label'=>'Authenticate myself process:*','type'=>'radio'/* , "class" => "text-input small-input" */, 'default'=>0,'options'=>Configure::read('App.FeesType'),'onchange'=>'change_authenticate(this.value);', 'legend'=>'Authenticate myself process*')));?>
<?php if(!empty($this->request->data[$model]['authenticate_myself_option']))
{
$authenticate='style="display:block;"';
}
else
{
$authenticate='style="display:none;"';
}
?>
<div class="authenticate" <?php echo $authenticate; ?>>
<?php echo $this->Form->input('authenticate_myself_option_value',array('div'=>false,'label'=>'Set the price ($)*')); ?>
</div>

<?php  echo ($this->Form->input('contracts_pdfs_option', array('div'=>false, 'label'=>'Generate contracts pdfs printable version:*','type'=>'radio'/* , "class" => "text-input small-input" */, 'default'=>0,'options'=>Configure::read('App.FeesType'),'onchange'=>'change_pdfs(this.value);', 'legend'=>'Generate contracts pdfs printable version*')));?>
<?php if(!empty($this->request->data[$model]['contracts_pdfs_option']))
{
$pdfs='style="display:block;"';
}
else
{
$pdfs='style="display:none;"';
}
?>
<div class="pdfs" <?php echo $pdfs; ?>>
<?php echo $this->Form->input('contracts_pdfs_option_value',array('div'=>false,'label'=>'Set the price ($)*')); ?>
</div>

<?php  echo ($this->Form->input('transferred_delayed_percentage_option', array('div'=>false, 'label'=>'Percentage from transferred delayed payments:*','type'=>'radio'/* , "class" => "text-input small-input" */, 'default'=>0,'options'=>Configure::read('App.FeesType'),'onchange'=>'change_percentage(this.value);', 'legend'=>'Percentage from transferred delayed payments*')));?>
<?php if(!empty($this->request->data[$model]['transferred_delayed_percentage_option']))
{
$percentage='style="display:block;"';
}
else
{
$percentage='style="display:none;"';
}
?>
<div class="percentage" <?php echo $percentage; ?>>
<?php echo $this->Form->input('transferred_delayed_percentage_option_value',array('div'=>false,'label'=>'Set the percentage (%)*')); ?>
</div>

<?php  echo ($this->Form->input('equity_sharing_option', array('div'=>false, 'label'=>'Percentage from equity/profit sharing:*','type'=>'radio'/* , "class" => "text-input small-input" */, 'default'=>0,'options'=>Configure::read('App.FeesType'),'onchange'=>'change_sharing(this.value);', 'legend'=>'Percentage from equity/profit sharing*')));?>
<?php if(!empty($this->request->data[$model]['equity_sharing_option']))
{
$sharing='style="display:block;"';
}
else
{
$sharing='style="display:none;"';
}
?>
<div class="sharing" <?php echo $sharing; ?>>
<?php echo $this->Form->input('equity_sharing_option_value',array('div'=>false,'label'=>'Set the percentage (%)*')); ?>
</div>

<?php  echo ($this->Form->input('dispute_management_option', array('div'=>false, 'label'=>'Dispute Management:*','type'=>'radio'/* , "class" => "text-input small-input" */, 'default'=>0,'options'=>Configure::read('App.FeesType'),'onchange'=>'change_dispute(this.value);', 'legend'=>'Dispute Management*')));?>
<?php if(!empty($this->request->data[$model]['dispute_management_option']))
{
$dispute='style="display:block;"';
}
else
{
$dispute='style="display:none;"';
}
?>
<div class="dispute" <?php echo $dispute; ?>>
<?php echo $this->Form->input('dispute_management_option_value',array('div'=>false,'label'=>'Set the price ($)*')); ?>
</div>

<?php  echo ($this->Form->input('nda_usage_option', array('div'=>false, 'label'=>'NDA Usage:*','type'=>'radio'/* , "class" => "text-input small-input" */, 'default'=>0,'options'=>Configure::read('App.FeesType'),'onchange'=>'change_nda(this.value);', 'legend'=>'NDA Usage*')));?>
<?php if(!empty($this->request->data[$model]['nda_usage_option']))
{
$nda='style="display:block;"';
}
else
{
$nda='style="display:none;"';
}
?>
<div class="nda" <?php echo $nda; ?>>
<?php echo $this->Form->input('nda_usage_option_value',array('div'=>false,'label'=>'Set the price ($)*')); ?>
</div>
<p style="padding-top:15px;">
<?php  echo ($this->Form->submit('Submit', array('class' => 'button', "div"=>false)));?>
</p>