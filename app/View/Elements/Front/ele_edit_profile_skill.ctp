<?php

	if(!empty($user_skills))
	{
	?>
		<div class="slct_skills slct_skills_2">
			<ul>
				<p>Selected Skills:</p>
				<?php
				foreach($user_skills as $key=>$value)
				{
				?>
				<li id="<?php echo "row_".$value['id'];?>"><label><?php echo ucwords($value['name']);?></label><span>
				<?php
				echo $this->Js->link('Delete', array('controller'=>'users', 'action'=>'delete_user_skill',$value['SkillsUser']['id']), array('update'=>"#row_".$value['id'],'confirm'=>'Are you sure want to delete','escape'=>false));
				?>
				
				</span></li>
				<?php
				}
				?>
				
			</ul>
		</div>
	<?php
	}
	?>