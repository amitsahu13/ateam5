<div class="right_container max_width">
	<h2><a href="javascript:void(0);">Recent Posts</a></h2>  
    <div class="clear"></div>
    <div class="expert_detail max_width">
         <h2 class="col_brown"><?php echo ucfirst($blog_post['Blog']['title']);?></h2>
         <div class="clear"></div>
			<div class="whtlist font_family">
				<p>by <a href="#" class="col_blue">Admin</a> on  <?php echo date('d-M-Y',strtotime($blog_post['Blog']['created']));?> </p>
			</div>
			<div class="float_left">
				<?php 
				
					$file_path= BLOG_IMAGE_BIG_PATH.'big_'.$blog_post['Blog']['post_img'];
					if(file_exists($file_path)){
						echo $this->Html->image(BLOG_IMAGE_BIG.'big_'.$blog_post['Blog']['post_img']);
					}
				?>
			</div>
			<div class="clear"></div>
			<div class="blog3_bottom">
				<div class="blog3_left">
					<p><span>Lables:</span> <?php echo $blog_post['Category']['name'];?></p>
					<div class="share">
						<p>Share:</p>
						<div class="blog_share_links">
						<span class='st_facebook_custom' title="Share to Facebook" alt="Share to Facebook"  st_url="<?php echo 'http://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]; ?>" st_title="<?php echo $blog_post['Blog']['title'];?>" st_image="<?php echo  Configure::read('App.SiteUrl').'/img/'.BLOG_IMAGE_SMALL.'small_'.$blog_post['Blog']['post_img'];?>" st_summary="<?php echo $blog_post['Blog']['article'];?>">
						<?php echo  $this->Html->image('blog_fb.png')?>
						</span>
						<span class='st_twitter_custom' title="Share to Twitter" alt="Share to Twitter"  st_url="<?php echo 'http://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]; ?>" st_title="<?php echo $blog_post['Blog']['title'];?>" st_image="<?php echo  Configure::read('App.SiteUrl').'/img/'.BLOG_IMAGE_SMALL.'small_'.$blog_post['Blog']['post_img'];?>" st_summary="<?php echo $blog_post['Blog']['article'];?>">
						<?php echo  $this->Html->image('blog_twt.png')?>
						</span>
						
						<?php echo  $this->Html->link($this->Html->image('blog_view.png'),array('controller'=>'blogs','action'=>'blog_feed',$blog_post['Blog']['id']),array('escape'=>false,'div'=>false,'target'=>'_blank'));?>
							<!--<ul>
								<li><a href="#"><?php //echo  $this->Html->image('blog_fb.png')?></a></li>
								<li><a href="#"><?php //echo  $this->Html->image('blog_twt.png')?></a></li>
								<li><a href="#"><?php //echo  $this->Html->image('blog_view.png')?></a></li>
							</ul>-->
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="blog3_right">
					<p><?php echo $blog_post['Blog']['article'];?></p>
				</div>                
			</div>	
			<div  id="post_comment">
				<?php echo $this->element("blog/post_comment"); ?>
			</div>
			<div class="blog3_bottom" id="ele_comment">
				<?php #echo $this->element("blog/ele_comment"); ?>
				<?php
					echo $this->Form->create('Comment',array('url' => array('controller' => 'blogs', 'action' => 'comment'),'type'=>'file'));
					echo $this->Form->hidden('Comment.blog_id',array('value'=>$id,'id'=>'blog_id'));
					
					?>
					<div class="blog3_right">
						<?php  
						echo $this->Form->input('Comment.meta_description', array(
																	'type'=>'textarea', 
																	'div'=>false, 
																	'value'=>'Type your comment here*',
																	"class" => "blog_area_input",
																	'label'=>false
																	));
						?><div style="color:red;font-family:arial;font-size:12px;" id="error_msg"></div> 
							<span class="Continue4Btn" style="float:right; margin:13px 0px 0px 0;">
						<?php 
						 if(!$this->Session->check('Auth.User.id')){ 
							echo $this->Html->link('Publish',array('controller'=>'users','action'=>'login'),array('class'=>'Continue4BtnRi'));
						 }
						else{
							echo $this->Js->submit('Publish', array(
															'update' => '#post_comment',
															'div' => false,
															'async' => false,
															'url'=>array('action'=>'comment'),
															'class'=>'Continue4BtnRi',
															'value'=>'Publish',
															'onsubmit'=>"event.preventDefault();",
								 							'before'=>'return post_comment()',
															'complete'=>'comment_textarea_blank()'									
								));
						 }?>
							</span>
					</div>
					<?php echo $this->Form->end();?>
			</div>
	</div>
    <div class="clear"></div>
</div> 
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">
	stLight.options({
		publisher: "46ee9c5d-be43-48a1-a3db-f35116371fb5",
	});
 </script>
<script type="text/javascript">

function post_comment()
{
	
	var comment = $("#CommentMetaDescription").val();
	if (comment == "Type your comment here*") {
		$('#error_msg').html('Type your comment here.');		
		return false;
    }
    return true;
}

$(document).ready(function(){

	$("#CommentMetaDescription").focus(function(){
		if($(this).val() == "Type your comment here*")
		{
			$(this).attr('value','');
		}
	
	});
	$("#CommentMetaDescription").blur(function(){
	
		if($(this).val()=='')
		{
			$(this).attr('value','Type your comment here*');
		}	
	
	});
});

function comment_textarea_blank()
{
	$("#CommentMetaDescription").attr('value','Type your comment here*');
	$("#error_msg").html('');
	
}
function post_reply(id)
{
	var comment = $("#CommentMetaDescriptionReply"+id).val();
	if (comment == "Type your reply here*") {
		$('#error_msg_reply_'+id).html('Type your reply here.');		
		return false;
    }
    return true;
}

function replyOpen(id) 
{
	$('#reply_form_div_'+id).toggle('slow');	
}

function blank_reply_focus(obj)
{
	if(obj.value == "Type your reply here*")
	{
		obj.value = '';
	}
}

function blank_reply_blur(obj)
{
	if(obj.value == "")
	{
		obj.value = 'Type your reply here*';
	}
	
	
}
function reply_textarea_blank(id)
{
	$("#CommentMetaDescriptionReply"+id).attr('value','Type your reply here*');
	$("#error_msg_reply_"+id).html('');
	
}
</script>
<?php 
 if (class_exists('JsHelper') && method_exists($this->Js, 'writeBuffer')) 
echo $this->Js->writeBuffer(); 
?>  
     

