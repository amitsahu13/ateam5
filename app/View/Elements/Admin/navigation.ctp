<ul id="main-nav">  <!-- Accordion Menu --> 


	
	<li>
		<?php
			$class= ($this->params['controller']=='admins' && $this->params['action']=='admin_dashboard')?'current':null;
		?>
		<?php echo ($this->Html->link('Dashboard', array('controller'=>'admins', 'action'=>'dashboard'), array('class'=>'nav-top-item no-submenu '.$class)));?>
	</li>
	
	
	<li> 
		<?php echo ($this->Html->link('Linkid', array('controller'=>'admins', 'action'=>'linkid'), array('class'=>'nav-top-item no-submenu ')));?>
 
 
 

</li>

	 <li> 
	 	 <?php echo ($this->Html->link('Collaboration', array('controller'=>'admins', 'action'=>'clb'), array('class'=>'nav-top-item no-submenu ')));?> 
	 </li>  






	<li> 
		<?php
			$class= $this->params['controller']=='settings' || ($this->params['controller']=='admins' && ($this->params['action']=='admin_edit' || $this->params['action']=='admin_change_password') && $this->params['pass'][0]==$this->Session->read('Auth.User.id')) || $this->params['controller']=='paymentoptions'?'current':null;
		?>
		<?php echo ($this->Html->link('Settings', array(), array('class'=>'nav-top-item '.$class)));?>
		<ul>
		
		<?php if($this->Session->read('Auth.User.role_id')==1) {?>
		<li><?php 
		$class= $this->params['controller']=='settings' && $this->params['action']=='admin_index'?array('class'=>'current'):null;
		echo ($this->Html->link(__('General', true), array('plugin' => null, 'controller'=>'settings', 'action'=>'index'),$class));?></li>
		<?php }?>
		
		<li><?php 
		$class= $this->params['controller']=='admins' && $this->params['action']=='admin_edit'?array('class'=>'current'):null;
		echo ($this->Html->link(__('Your Profile', true), array('plugin' => null, 'controller'=>'admins', 'action'=>'edit', $this->Session->read('Auth.User.id')),$class));?></li>
	</ul>
	</li>
	<li>
		<?php //admin management
			$class= ($this->params['controller']=='admins' && ($this->params['action']=='admin_index' || $this->params['action']=='admin_add' || $this->params['action']=='admin_view' || ($this->params['action']=='admin_edit' || $this->params['action']=='admin_change_password') && $this->params['pass'][0]!=$this->Session->read('Auth.User.id')))?'current':null;
		?>
		<?php echo ($this->Html->link('Admins', array(), array('class'=>'nav-top-item '.$class)));?>
		<ul>
			<li><?php
			$class= $this->params['controller']=='admins' && ($this->params['action']=='admin_index' || $this->params['action']=='admin_edit' || $this->params['action']=='admin_change_password')?array('class'=>'current'):null;
			echo ($this->Html->link(__('Admins', true), array('plugin' => null, 'controller'=>'admins', 'action'=>'index', 'Admin'),$class));?>
			</li>
			<li><?php 
			/* $class= $this->params['controller']=='admins' && $this->params['action']=='admin_add'?array('class'=>'current'):null;
			echo ($this->Html->link(__('Add', true), array('plugin' => null, 'controller'=>'admins', 'action'=>'add'),$class)); */ ?>
			</li>
			
			
		</ul>
	</li>
	<li> 
		<?php
			$class= ($this->params['controller']=='regions' || $this->params['controller']=='countries' || $this->params['controller']=='states' || $this->params['controller']=='currencies'?'current':null);
		?>
		<?php echo ($this->Html->link('Locations', array(), array('class'=>'nav-top-item '.$class)));?>
		<ul>
			<li>
				<?php 
				$class= $this->params['controller']=='regions' && ($this->params['action']=='admin_index' || $this->params['action']=='admin_edit')?array('class'=>'current'):null;
				echo ($this->Html->link(__('Manage Regions', true), array('plugin' => null, 'controller'=>'regions', 'action'=>'index'),$class));?>
			</li>
			<li>
				<?php 
				$class= $this->params['controller']=='regions' && $this->params['action']=='admin_add'?array('class'=>'current'):null;
				echo ($this->Html->link(__('Add a new region', true), array('plugin' => null, 'controller'=>'regions', 'action'=>'add'),$class));?>
			</li>
			
			<li>
				<?php 
				$class= $this->params['controller']=='countries' && ($this->params['action']=='admin_index' || $this->params['action']=='admin_edit')?array('class'=>'current'):null;
				echo ($this->Html->link(__('Manage Countries', true), array('plugin' => null, 'controller'=>'countries', 'action'=>'index'),$class));?>
			</li>
			<li>
				<?php 
				$class= $this->params['controller']=='countries' && $this->params['action']=='admin_add'?array('class'=>'current'):null;
				echo ($this->Html->link(__('Add a new Country', true), array('plugin' => null, 'controller'=>'countries', 'action'=>'add'),$class));?>
			</li>   
			<li>
				<?php 
				$class= $this->params['controller']=='states' && ($this->params['action']=='admin_index' || $this->params['action']=='admin_edit')?array('class'=>'current'):null;
				echo ($this->Html->link(__('Manage States', true), array('plugin' => null, 'controller'=>'states', 'action'=>'index'),$class));?>
			</li>
			<li>
				<?php 
				$class= $this->params['controller']=='states' && $this->params['action']=='admin_add'?array('class'=>'current'):null;
				echo ($this->Html->link(__('Add a new state', true), array('plugin' => null, 'controller'=>'states', 'action'=>'add'),$class));?>
			</li>
		</ul>
	</li>
	<li>
		<?php
			$class= $this->params['controller']=='users' ?'current':null;
		?>
		<?php echo ($this->Html->link('User', array(), array('class'=>'nav-top-item '.$class)));?>
		<ul>
			<li><?php 
			$class= $this->params['controller']=='users' && $this->params['action']=='admin_index' && (!empty($this->params['pass']) && $this->params['pass'][0]=='buyer')?array('class'=>'current'):null;
			echo ($this->Html->link(__('Buyers', true), array('plugin' => null, 'controller'=>'users', 'action'=>'index', 'buyer'),$class));?>
			</li>
			<li><?php 
			$class= $this->params['controller']=='users' && $this->params['action']=='admin_index' && (!empty($this->params['pass']) && $this->params['pass'][0]=='provider')?array('class'=>'current'):null;
			echo ($this->Html->link(__('Provider', true), array('plugin' => null, 'controller'=>'users', 'action'=>'index', 'provider'),$class)); ?>
			</li>
			
			<li><?php 
			$class= $this->params['controller']=='users' && $this->params['action']=='admin_index' && (!empty($this->params['pass']) && $this->params['pass'][0]=='both')?array('class'=>'current'):null;
			echo ($this->Html->link(__('Both', true), array('plugin' => null, 'controller'=>'users', 'action'=>'index', 'both'),$class)); ?>
			</li>
			
			<li><?php 
			$class= $this->params['controller']=='users' && $this->params['action']=='admin_add'?array('class'=>'current'):null;
			echo ($this->Html->link(__('Add', true), array('plugin' => null, 'controller'=>'users', 'action'=>'add'),$class)); ?>
			</li>
			
		</ul>
	</li>
	<li>
		<?php
			$class= ($this->params['controller']=='user_inquiries')?'current':null;
		?>
		<?php echo ($this->Html->link('User Inquiry', array('controller'=>'user_inquiries', 'action'=>'index'), array('class'=>'nav-top-item no-submenu '.$class)));?>
	</li>
	<li> 
		<?php
			$class= $this->params['controller']=='categories'?'current':null;
		?>
		<?php echo ($this->Html->link('Category', array(), array('class'=>'nav-top-item '.$class)));?>
		<ul>
		<li><?php 
		$class= $this->params['controller']=='categories' && ($this->params['action']=='admin_index' || $this->params['action']=='admin_edit')?array('class'=>'current'):null;
		echo ($this->Html->link(__('Category', true), array('plugin' => null, 'controller'=>'categories', 'action'=>'index'),$class));?></li>
		<li><?php 
		$class= $this->params['controller']=='categories' && $this->params['action']=='admin_add'?array('class'=>'current'):null;
		echo ($this->Html->link(__('Add a new Category', true), array('plugin' => null, 'controller'=>'categories', 'action'=>'add'),$class));?></li>    
		</ul>
	</li>
	<li>
		<?php
			$class= $this->params['controller']=='projects' ?'current':null;
		?>
		<?php echo ($this->Html->link('Projects', array(), array('class'=>'nav-top-item '.$class)));?>
		<ul>
			<li>
				<?php 
				$class= $this->params['controller']=='projects' && ($this->params['action']=='admin_index' || $this->params['action']=='admin_edit' || $this->params['action']=='admin_view')?array('class'=>'current'):null;
				echo ($this->Html->link(__('List Project', true), array('plugin' => null, 'controller'=>'projects', 'action'=>'index'),$class));?>
			</li>
			<li>
				<?php 
				$class= $this->params['controller']=='projects' && $this->params['action']=='admin_add'?array('class'=>'current'):null;
				//echo ($this->Html->link(__('Add', true), array('plugin' => null, 'controller'=>'projects', 'action'=>'add'),$class)); ?>
			</li>	
		</ul>
	</li>
	<li>
		<?php
			$class= $this->params['controller']=='jobs' || $this->params['controller']=='jobs' ?'current':null;
		?>
		<?php echo ($this->Html->link('Jobs', array(), array('class'=>'nav-top-item '.$class)));?>
		<ul>
			<li>
				<?php 
				$class= $this->params['controller']=='jobs' && ($this->params['action']=='admin_index' || $this->params['action']=='admin_edit' || $this->params['action']=='admin_view')?array('class'=>'current'):null;
				echo ($this->Html->link(__('List Job', true), array('plugin' => null, 'controller'=>'jobs', 'action'=>'index'),$class));?>
			</li>
			
			<li>
				<?php 
				$class= $this->params['controller']=='jobs' && $this->params['action']=='admin_add'?array('class'=>'current'):null;
				//echo ($this->Html->link(__('Add Job', true), array('plugin' => null, 'controller'=>'jobs', 'action'=>'add'),$class)); ?>
			</li>			
		</ul>
	</li>
	<li>
		<?php
			$class= ($this->params['controller']=='skills')?'current':null;
		?>
		<?php echo ($this->Html->link('Skills', array(),array('class'=>'nav-top-item '.$class)));?>
		<ul>
		<li>		
		<?php
		$class= $this->params['controller']=="skills" && ($this->params['action']=='admin_index')?array('class'=>'current'):null;
		echo ($this->Html->link(__('Skills',true), array('plugin' => null, 'controller'=>'skills', 'action'=>'index'), $class)); ?>
		</li>
		<li>		
		<?php
		$class= $this->params['controller']=="skills" && ($this->params['action']=='admin_add')?array('class'=>'current'):null;
		echo ($this->Html->link(__('Add Skill',true), array('plugin' => null, 'controller'=>'skills', 'action'=>'add'), $class)); ?>
		</li>
		</ul>
	</li>
	<li>
		<?php
			$class= ($this->params['controller']=='agreements' || $this->params['controller']=='durations' || $this->params['controller']=='jobdirections'  || $this->params['controller']=='budgets' || $this->params['controller']=='business_plan_levels' || $this->params['controller']=='compensations' || $this->params['controller']=='hourly_rates' || $this->params['controller']=='idea_maturities' || $this->params['controller']=='job_fors' || $this->params['controller']=='job_skills' || $this->params['controller']=='law_jurisdictions' || $this->params['controller']=='project_manager_availabilities' || $this->params['controller']=='project_status' || $this->params['controller']=='project_types' || $this->params['controller']=='project_visibilities' || $this->params['controller']=='rating_parameters' || $this->params['controller']=='security_questions' || $this->params['controller']=='working_status')?'current':null;
		?>
		<?php echo ($this->Html->link('Miscellaneous Drop Down', array(),array('class'=>'nav-top-item '.$class)));?>
		<ul>
			<li>		
			<?php
			$class= $this->params['controller']=="agreements" && ($this->params['action']=='admin_index' || $this->params['action']=='admin_edit')?array('class'=>'current'):null;
			echo ($this->Html->link(__('Agreements',true), array('plugin' => null, 'controller'=>'agreements', 'action'=>'index'), $class)); ?>
			</li>
			<li>		
			<?php
			$class= $this->params['controller']=="agreements" && ($this->params['action']=='admin_add')?array('class'=>'current'):null;
			echo ($this->Html->link(__('Add Agreement',true), array('plugin' => null, 'controller'=>'agreements', 'action'=>'add'), $class)); ?>
			</li>
			<li>		
			<?php
			$class= $this->params['controller']=="job_directions" && ($this->params['action']=='admin_index' || $this->params['action']=='admin_edit')?array('class'=>'current'):null;
			echo ($this->Html->link(__('Job Direction',true), array('plugin' => null, 'controller'=>'job_directions', 'action'=>'index'), $class)); ?>
			</li>
			<li>		
			<?php
			$class= $this->params['controller']=="job_directions" && ($this->params['action']=='admin_add')?array('class'=>'current'):null;
			echo ($this->Html->link(__('Add Job Direction',true), array('plugin' => null, 'controller'=>'job_directions', 'action'=>'add'), $class)); ?>
			</li>
			<li>		
			<?php
			$class= $this->params['controller']=="business_plan_levels" && ($this->params['action']=='admin_index' || $this->params['action']=='admin_edit')?array('class'=>'current'):null;
			echo ($this->Html->link(__('Business Plan Levels',true), array('plugin' => null, 'controller'=>'business_plan_levels', 'action'=>'index'), $class)); ?>
			</li>
			<li>		
			<?php
			$class= $this->params['controller']=="business_plan_levels" && ($this->params['action']=='admin_add')?array('class'=>'current'):null;
			echo ($this->Html->link(__('Add Level',true), array('plugin' => null, 'controller'=>'business_plan_levels', 'action'=>'add'), $class)); ?>
			</li>
			<li>		
			<?php
			$class= $this->params['controller']=="compensations" && ($this->params['action']=='admin_index' || $this->params['action']=='admin_edit')?array('class'=>'current'):null;
			echo ($this->Html->link(__('Compensations',true), array('plugin' => null, 'controller'=>'compensations', 'action'=>'index'), $class)); ?>
			</li>
			<li>		
			<?php
			$class= $this->params['controller']=="compensations" && ($this->params['action']=='admin_add')?array('class'=>'current'):null;
			echo ($this->Html->link(__('Add Compensation',true), array('plugin' => null, 'controller'=>'compensations', 'action'=>'add'), $class)); ?>
			</li>
			<li>		
			<?php
			$class= $this->params['controller']=="durations" && ($this->params['action']=='admin_index' || $this->params['action']=='admin_edit')?array('class'=>'current'):null;
			echo ($this->Html->link(__('Durations',true), array('plugin' => null, 'controller'=>'durations', 'action'=>'index'), $class)); ?>
			</li>
			<li>		
			<?php
			$class= $this->params['controller']=="durations" && ($this->params['action']=='admin_add')?array('class'=>'current'):null;
			echo ($this->Html->link(__('Add Duration',true), array('plugin' => null, 'controller'=>'durations', 'action'=>'add'), $class)); ?>
			</li>
			<li>		
			<?php
			$class= $this->params['controller']=="idea_maturities" && ($this->params['action']=='admin_index' || $this->params['action']=='admin_edit')?array('class'=>'current'):null;
			echo ($this->Html->link(__('Idea Maturities',true), array('plugin' => null, 'controller'=>'idea_maturities', 'action'=>'index'), $class)); ?>
			</li>
			<li>		
			<?php
			$class= $this->params['controller']=="idea_maturities" && ($this->params['action']=='admin_add')?array('class'=>'current'):null;
			echo ($this->Html->link(__('Add Maturity',true), array('plugin' => null, 'controller'=>'idea_maturities', 'action'=>'add'), $class)); ?>
			</li>
			<li>		
			<?php
			$class= $this->params['controller']=="job_fors" && ($this->params['action']=='admin_index' || $this->params['action']=='admin_edit')?array('class'=>'current'):null;
			echo ($this->Html->link(__('Job Fors',true), array('plugin' => null, 'controller'=>'job_fors', 'action'=>'index'), $class)); ?>
			</li>
			<li>		
			<?php
			$class= $this->params['controller']=="job_fors" && ($this->params['action']=='admin_add')?array('class'=>'current'):null;
			echo ($this->Html->link(__('Add Job for',true), array('plugin' => null, 'controller'=>'job_fors', 'action'=>'add'), $class)); ?>
			</li>
			<li>		
			<?php
			$class= $this->params['controller']=="law_jurisdictions" && ($this->params['action']=='admin_index' || $this->params['action']=='admin_edit')?array('class'=>'current'):null;
			echo ($this->Html->link(__('Law Jurisdictions',true), array('plugin' => null, 'controller'=>'law_jurisdictions', 'action'=>'index'), $class)); ?>
			</li>
			<li>		
			<?php
			$class= $this->params['controller']=="law_jurisdictions" && ($this->params['action']=='admin_add')?array('class'=>'current'):null;
			echo ($this->Html->link(__('Add Jurisdiction',true), array('plugin' => null, 'controller'=>'law_jurisdictions', 'action'=>'add'), $class)); ?>
			</li>
			<li>		
			<?php
			$class= $this->params['controller']=="availabilities" && ($this->params['action']=='admin_index' || $this->params['action']=='admin_edit')?array('class'=>'current'):null;
			echo ($this->Html->link(__('Manage Availabilities',true), array('plugin' => null, 'controller'=>'availabilities', 'action'=>'index'), $class)); ?>
			</li>
			<li>		
			<?php
			$class= $this->params['controller']=="availabilities" && ($this->params['action']=='admin_add')?array('class'=>'current'):null;
			echo ($this->Html->link(__('Add  Availability',true), array('plugin' => null, 'controller'=>'availabilities', 'action'=>'add'), $class)); ?>
			</li>
			<li>		
			<?php
			$class= $this->params['controller']=="project_status" && ($this->params['action']=='admin_index' || $this->params['action']=='admin_edit')?array('class'=>'current'):null;
			echo ($this->Html->link(__('Project Status',true), array('plugin' => null, 'controller'=>'project_status', 'action'=>'index'), $class)); ?>
			</li>
			<li>		
			<?php
			$class= $this->params['controller']=="project_status" && ($this->params['action']=='admin_add')?array('class'=>'current'):null;
			echo ($this->Html->link(__('Add Project Status',true), array('plugin' => null, 'controller'=>'project_status', 'action'=>'add'), $class)); ?>
			</li>
			<li>		
			<?php
			$class= $this->params['controller']=="project_types" && ($this->params['action']=='admin_index' || $this->params['action']=='admin_edit')?array('class'=>'current'):null;
			echo ($this->Html->link(__('Project Types',true), array('plugin' => null, 'controller'=>'project_types', 'action'=>'index'), $class)); ?>
			</li>
			<li>		
			<?php
			$class= $this->params['controller']=="project_types" && ($this->params['action']=='admin_add')?array('class'=>'current'):null;
			echo ($this->Html->link(__('Add Project Type',true), array('plugin' => null, 'controller'=>'project_types', 'action'=>'add'), $class)); ?>
			</li>
			<li>		
			<?php
			$class= $this->params['controller']=="project_visibilities" && ($this->params['action']=='admin_index' || $this->params['action']=='admin_edit')?array('class'=>'current'):null;
			echo ($this->Html->link(__('Project Visibilities',true), array('plugin' => null, 'controller'=>'project_visibilities', 'action'=>'index'), $class)); ?>
			</li>
			<li>		
			<?php
			$class= $this->params['controller']=="project_visibilities" && ($this->params['action']=='admin_add')?array('class'=>'current'):null;
			echo ($this->Html->link(__('Add Visibility',true), array('plugin' => null, 'controller'=>'project_visibilities', 'action'=>'add'), $class)); ?>
			</li>
			<li>		
			<?php
			$class= $this->params['controller']=="rating_parameters" && ($this->params['action']=='admin_index' || $this->params['action']=='admin_edit')?array('class'=>'current'):null;
			echo ($this->Html->link(__('Rating Parameter',true), array('plugin' => null, 'controller'=>'rating_parameters', 'action'=>'index'), $class)); ?>
			</li>
			<li>		
			<?php
			$class= $this->params['controller']=="rating_parameters" && ($this->params['action']=='admin_add')?array('class'=>'current'):null;
			echo ($this->Html->link(__('Add Paramater',true), array('plugin' => null, 'controller'=>'rating_parameters', 'action'=>'add'), $class)); ?>
			</li>
			<li>		
			<?php
			$class= $this->params['controller']=="budgets" && ($this->params['action']=='admin_index' || $this->params['action']=='admin_edit')?array('class'=>'current'):null;
			echo ($this->Html->link(__('Reference Budgets',true), array('plugin' => null, 'controller'=>'budgets', 'action'=>'index'), $class)); ?>
			</li>
			<li>		
			<?php
			$class= $this->params['controller']=="budgets" && ($this->params['action']=='admin_add')?array('class'=>'current'):null;
			echo ($this->Html->link(__('Add Reference Budget',true), array('plugin' => null, 'controller'=>'budgets', 'action'=>'add'), $class)); ?>
			</li>
			<li>		
			<?php
			$class= $this->params['controller']=="hourly_rates" && ($this->params['action']=='admin_index' || $this->params['action']=='admin_edit')?array('class'=>'current'):null;
			echo ($this->Html->link(__('Reference Houly Rates',true), array('plugin' => null, 'controller'=>'hourly_rates', 'action'=>'index'), $class)); ?>
			</li>
			<li>		
			<?php
			$class= $this->params['controller']=="hourly_rates" && ($this->params['action']=='admin_add')?array('class'=>'current'):null;
			echo ($this->Html->link(__('Add Reference Hourly Rate',true), array('plugin' => null, 'controller'=>'hourly_rates', 'action'=>'add'), $class)); ?>
			</li>
			<li>		
			<?php
			$class= $this->params['controller']=="security_questions" && ($this->params['action']=='admin_index' || $this->params['action']=='admin_edit')?array('class'=>'current'):null;
			echo ($this->Html->link(__('Security questions',true), array('plugin' => null, 'controller'=>'security_questions', 'action'=>'index'), $class)); ?>
			</li>
			<li>		
			<?php
			$class= $this->params['controller']=="security_questions" && ($this->params['action']=='admin_add')?array('class'=>'current'):null;
			echo ($this->Html->link(__('Add Security question',true), array('plugin' => null, 'controller'=>'security_questions', 'action'=>'add'), $class)); ?>
			</li>
			<li>		
			<?php
			$class= $this->params['controller']=="working_status" && ($this->params['action']=='admin_index' || $this->params['action']=='admin_edit')?array('class'=>'current'):null;
			echo ($this->Html->link(__('Working Status',true), array('plugin' => null, 'controller'=>'working_status', 'action'=>'index'), $class)); ?>
			</li>
			<li>		
			<?php
			$class= $this->params['controller']=="working_status" && ($this->params['action']=='admin_add')?array('class'=>'current'):null;
			echo ($this->Html->link(__('Add Working Status',true), array('plugin' => null, 'controller'=>'working_status', 'action'=>'add'), $class)); ?>
			</li>
		</ul>
	</li>
	<li> 
		<?php
			$class= $this->params['controller']=='contract_forms'?'current':null;
		?>
		<?php echo ($this->Html->link('Contract Forms', array(), array('class'=>'nav-top-item '.$class)));?>
		<ul>
		<li><?php 
		$class= $this->params['controller']=='contract_forms' && ($this->params['action']=='admin_index' || $this->params['action']=='admin_edit')?array('class'=>'current'):null;
		echo ($this->Html->link(__('Contract Forms', true), array('plugin' => null, 'controller'=>'contract_forms', 'action'=>'index'),$class));?></li>
		<li><?php 
		$class= $this->params['controller']=='contract_forms' && $this->params['action']=='admin_add'?array('class'=>'current'):null;
		echo ($this->Html->link(__('Add a Contract Form', true), array('plugin' => null, 'controller'=>'contract_forms', 'action'=>'add'),$class));?></li>    
		</ul>
	</li>
	<li>
		<?php //blog management
			$class= ($this->params['controller']=='validation_levels' && ($this->params['action']=='admin_index' || $this->params['action']=='admin_add' || ($this->params['action']=='admin_edit')))?'current':null;
		?>
		<?php echo ($this->Html->link('Validation Levels', array(), array('class'=>'nav-top-item '.$class)));?>
		<ul>
			<li><?php
			$class= $this->params['controller']=='validation_levels' && ($this->params['action']=='admin_index' || $this->params['action']=='admin_edit')?array('class'=>'current'):null;
			echo ($this->Html->link(__('Validation Levels', true), array('plugin' => null, 'controller'=>'validation_levels', 'action'=>'index'),$class));?>
			</li>
		</ul>
	</li>
	<li>
		<?php
			$class= ($this->params['controller']=='templates' || $this->params['controller']=='footers')?'current':null;
		?>
		<?php echo ($this->Html->link('Email', array(),array('class'=>'nav-top-item '.$class)));?>
		<ul>
		<li>		
		<?php
		$class= $this->params['controller']=="templates" && ($this->params['action']=='admin_index' || $this->params['action']=='admin_edit')?array('class'=>'current'):null;
		echo ($this->Html->link(__('Email Templates',true), array('plugin' => null, 'controller'=>'templates', 'action'=>'index'), $class)); ?>
		</li>
		</ul>
	</li>
	<li> 
		<?php
			$class= $this->params['controller']=='faqs' || $this->params['controller']=='sections'?'current':null;
		?>
		<?php echo ($this->Html->link('FAQs', array(), array('class'=>'nav-top-item '.$class)));?>
		<ul>
		<li><?php 
		$class= $this->params['controller']=='faqs' && ($this->params['action']=='admin_index' || $this->params['action']=='admin_edit' || $this->params['action']=='admin_view')?array('class'=>'current'):null;
		echo ($this->Html->link(__('Manage FAQs', true), array('plugin' => null, 'controller'=>'faqs', 'action'=>'index'),$class));?></li>
		<li><?php 
		$class= $this->params['controller']=='faqs' && $this->params['action']=='admin_add'?array('class'=>'current'):null;
		echo ($this->Html->link(__('Add a new FAQ', true), array('plugin' => null, 'controller'=>'faqs', 'action'=>'add'),$class));?></li>               
		</ul>
	</li>
	<li> 
		<?php
			$class= $this->params['controller']=='pages' || $this->params['controller']=='texts'|| $this->params['controller']=='banners'?'current':null;
		?>
		<?php echo ($this->Html->link('Content', array(), array('class'=>'nav-top-item '.$class)));?>
		<ul>
		<li><?php 
		$class= $this->params['controller']=='pages' && ($this->params['action']=='admin_index' || $this->params['action']=='admin_edit')?array('class'=>'current'):null;
		echo ($this->Html->link(__('Pages', true), array('plugin' => null, 'controller'=>'pages', 'action'=>'index'),$class));?></li>
		</ul>
	</li>
	<li>
		<?php //blog management
			$class= ($this->params['controller']=='blogs' && ($this->params['action']=='admin_index' || $this->params['action']=='admin_add' || ($this->params['action']=='admin_edit')))?'current':null;
		?>
		<?php echo ($this->Html->link('Blogs', array(), array('class'=>'nav-top-item '.$class)));?>
		<ul>
			<li><?php
			$class= $this->params['controller']=='blogs' && ($this->params['action']=='admin_index' || $this->params['action']=='admin_edit' || $this->params['action']=='admin_change_password')?array('class'=>'current'):null;
			echo ($this->Html->link(__('Blogs', true), array('plugin' => null, 'controller'=>'blogs', 'action'=>'index'),$class));?>
			</li>
			<li><?php 
			$class= $this->params['controller']=='blogs' && $this->params['action']=='admin_add'?array('class'=>'current'):null;
			echo ($this->Html->link(__('Add a new blog', true), array('plugin' => null, 'controller'=>'blogs', 'action'=>'add'),$class)); ?>
			</li>
			
			
		</ul>
	</li>
	<li>
		<?php
			$class= ($this->params['controller']=='disputes')?'current':null;
		?>
		<?php echo ($this->Html->link('Disputes', array('controller'=>'disputes', 'action'=>'index'), array('class'=>'nav-top-item no-submenu '.$class)));?>
	</li>
	<li>
		<?php
			$class= ($this->params['controller']=='violations')?'current':null;
		?>
		<?php echo ($this->Html->link('Violations', array('controller'=>'violations', 'action'=>'index'), array('class'=>'nav-top-item no-submenu '.$class)));?>
	</li>
	<li>
		<?php
			$class= ($this->params['controller']=='fees_managements' && $this->params['action']=='admin_index')?'current':null;
		?>
		<?php echo ($this->Html->link('Fees Management', array('controller'=>'fees_managements', 'action'=>'index'), array('class'=>'nav-top-item no-submenu '.$class)));?>
	</li>
	<li>
		<?php //Slider management
			$class= ($this->params['controller']=='sliders' && ($this->params['action']=='admin_index' || $this->params['action']=='admin_add' || ($this->params['action']=='admin_edit')))?'current':null;
		?>
		<?php echo ($this->Html->link('Slider Management', array(), array('class'=>'nav-top-item '.$class)));?>
		<ul>
			<li><?php
			$class= $this->params['controller']=='sliders' && ($this->params['action']=='admin_index' || $this->params['action']=='admin_edit' || $this->params['action']=='admin_change_password')?array('class'=>'current'):null;
			echo ($this->Html->link(__('Slider', true), array('plugin' => null, 'controller'=>'sliders', 'action'=>'index'),$class));?>
			</li>
			<li><?php 
			$class= $this->params['controller']=='sliders' && $this->params['action']=='admin_add'?array('class'=>'current'):null;
			echo ($this->Html->link(__('Add a new slide', true), array('plugin' => null, 'controller'=>'sliders', 'action'=>'add'),$class)); ?>
			</li>
			
			
		</ul>
	</li>
	<li>
		<?php //blog management
			$class= ($this->params['controller']=='videos' && ($this->params['action']=='admin_index' || $this->params['action']=='admin_add' || ($this->params['action']=='admin_edit')))?'current':null;
		?>
		<?php echo ($this->Html->link('Videos', array(), array('class'=>'nav-top-item '.$class)));?>
		<ul>
			<li><?php
			$class= $this->params['controller']=='videos' && ($this->params['action']=='admin_index' || $this->params['action']=='admin_edit' || $this->params['action']=='admin_change_password')?array('class'=>'current'):null;
			echo ($this->Html->link(__('Videos', true), array('plugin' => null, 'controller'=>'videos', 'action'=>'index'),$class));?>
			</li>
			<li><?php 
			$class= $this->params['controller']=='videos' && $this->params['action']=='admin_add'?array('class'=>'current'):null;
			echo ($this->Html->link(__('Add a new video', true), array('plugin' => null, 'controller'=>'videos', 'action'=>'add'),$class)); ?>
			</li>
			
			
		</ul>
	</li>
	<li>
		<?php
			$class= ($this->params['controller']=='feedbacks' && $this->params['action']=='admin_index')?'current':null;
		?>
		<?php echo ($this->Html->link('Feedbacks', array('controller'=>'feedbacks', 'action'=>'index'), array('class'=>'nav-top-item no-submenu '.$class)));?>
	</li>
	<li>
		<?php echo ($this->Html->link('Logout', array('plugin' => null, 'controller'=>'admins', 'action'=>'logout'), array('class'=>'nav-top-item no-submenu ')));?>
	</li>
</ul>
