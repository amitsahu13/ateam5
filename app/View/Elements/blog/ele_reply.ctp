<?php 
//pr($Reply_Comment);
if(!empty($Reply_Comment)){

	foreach($Reply_Comment as $key=>$value){
	
		
	//	pr($commentValue);
?>
<div class="rply_cmnt" >
	<div class="cmt_user">
	<?php 
	echo $this->General->show_user_img($value['User']['id'],$value['User']['UserDetail']['image'],'SMALL_50_50',$value['User']['first_name']);
	?>
	</div>
	<div class="cmt_right">
	<h3><?php echo $value['User']['username'];?> </h3>
	<div class="cmnt_time"><?php echo date('d-M-y',strtotime($value['Comment']['created']));?></div>
	<p><?php echo $value['Comment']['comment'];?></p>
	</div>				
</div>
<?php 
	}
}?>
