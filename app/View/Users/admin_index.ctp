<div class="content-box <?php echo (($search_flag==0)?'closed-box':'');?>"><!-- Start Content Box -->
	
	<div class="content-box-header">
		
		<h3 style="cursor: s-resize;">Search</h3>
		
		<ul class="content-box-tabs">
			<li></li>	
		</ul>
		
		<div class="clear"></div>
		
	</div> <!-- End .content-box-header -->
	
	<div class="content-box-content">
		
		<div style="display: block;" class="" id="tab">
						
			<?php echo ($this->Form->create('User', array('id'=>'SearchForm','url'=>array('admin'=>true, 'controller' => 'users', 'action' => 'index', $role),'onsubmit'=>'javascript: return true;')));?>
				
				<fieldset> 
								
				<p>
					<label>First Name</label>
					<?php  echo ($this->Form->input('first_name', array('div'=>false, 'label'=>false, "class" => "text-input small-input")));?>
				</p>
									
				<p>
					<label>Last Name</label>
					<?php  echo ($this->Form->input('last_name', array('div'=>false, 'label'=>false, "class" => "text-input small-input")));?>
				</p>
								
				
				<p>
					<?php  echo ($this->Form->input('country_id', array('div'=>false, 'label'=>'Country', 'empty'=>'-- Select Country --', "class" => "text-input small-input")));

					 $this->Js->get('#UserCountryId')->event('change', $this->Js->request(array('controller' => 'states', 'action' => 'admin_getStateList'), array('complete'=>'$("#UserState").addClass("text-input small-input");	$("#UserState").removeClass("medium-input");
					 ','update' => '#State','async' => true, 'method' => 'post', 'dataExpression' => true, 'data' => $this->Js->serializeForm(array('isForm' => true, 'inline' => true)))));
					?> 
				</p>
	
				<p id="State">
					<?php if (isset($states) && $states!=''){
						echo ($this->Form->input('state', array('div'=>false, 'label'=>'State', 'options'=>$states, "class" => "text-input small-input",'empty'=>'---Select State---')));
					}else{  
						echo ($this->Form->input('state', array('div'=>false, 'label'=>'State', 'type'=>'select','empty'=>'---Select State---', 'options'=>'', "class" => "text-input small-input")));
					}?> 
				</p>
				
				<p>
					<label>Email</label>
					<?php  echo ($this->Form->input('email', array('div'=>false, 'label'=>false, "class" => "text-input small-input")));?> 
					
				</p>
				
				<p>
					<label>City</label>
					<?php  echo ($this->Form->input('city', array('div'=>false, 'label'=>false, "class" => "text-input small-input")));?> 
					
				</p>
				
				<p>
					<label>Zip</label>
					<?php  echo ($this->Form->input('zip', array('div'=>false, 'label'=>false, "class" => "text-input small-input")));?> 
					
				</p>
				
				
				<p>
					<label>Status</label>
					<?php  echo ($this->Form->input('status', array('options'=>Configure::read('Status'),'empty'=>'All','div'=>false, 'label'=>false, "class" => "small-input")));?> 
					
				</p>
				
				<p>
					<?php  echo ($this->Form->submit('Search', array('class' => 'button', "div"=>false)));?>
					
					<?php  //echo ($this->Form->submit('Show All', array('class' => 'button', "div"=>false)));?>
					<?php echo $this->Html->link("Show All", array('action'=>'index', $role), array("class"=>"button", "escape"=>false)); ?>
					
				</p>
				
			</fieldset>
				
				<div class="clear"></div><!-- End .clear -->
				
			<?php
				echo ($this->Form->end());
			?>	
			
		</div> <!-- End #tab2 -->        
		
	</div> <!-- End .content-box-content -->
	
</div>


<div class="content-box"><!-- Start Content Box -->
	
	<div class="content-box-header">
		
		<h3 style="cursor: s-resize;">Manages</h3>
		<ul class="content-box-tabs">
			<?php	foreach($tabs as $tab=>$count){?>
			<li><a href="#<?php echo ($tab);?>" <?php echo ($defaultTab==$tab?'class="default-tab"':'');?>><?php echo ($tab);?> (<?php echo ($count); ?>)</a></li>
			<?php }?>
		</ul>
		
		<div class="clear"></div>
		
	</div> <!-- End .content-box-header -->
	
	<div class="content-box-content">
		<div id="page-loader">
			<?php
				echo ($this->Html->image('admin/loading.gif'));
			?>
		</div>
		
		<?php
		echo ($this->Form->create('User', array('name'=>'User', 'url' => array('controller' => 'users', 'action' => 'process'))));
		echo ($this->Form->hidden('pageAction', array('id' => 'pageAction')));
		
		foreach($tabs as $tab=>$count){?>
		
		<div class="tab-content<?php echo ($defaultTab==$tab?' default-tab':'');?>" id="<?php echo ($tab);?>"> <!-- This is the target div. id must match the href of this div's tab -->
			
			<div id="target<?php echo ($tab);?>"><?php
					echo ($defaultTab==$tab?$this->element('Admin/User/table'):'');
			?></div>
			
		</div> 
		
		<?php 
		}
		echo ($this->Form->end());
		?>
		
	</div> <!-- End .content-box-content -->
	
</div> <!-- End .content-box -->
<script type="text/javascript">
//var CurrentUrl = SiteUrl+'/admin/users/index/client';
jQuery(document).ready(function(){
	init('#target<?php echo($defaultTab);?>');
});
</script>
<?php
if (class_exists('JsHelper') && method_exists($this->Js, 'writeBuffer')) 
echo $this->Js->writeBuffer();
?>	