<?php 
if(!empty($post_comment)){

	foreach($post_comment as $keyComment => $commentValue){
	//	pr($commentValue);
?>
		<div class="blog3_bottom">
			<div class="blog3_left">
				<div class="float_right">
					<?php 
					echo $this->General->show_user_img($commentValue['User']['id'],$commentValue['User']['UserDetail']['image'],'SMALL',$commentValue['User']['first_name']);
					?>
					
				</div>
			</div>
			<div class="blog3_right">
				<div class="whtlist_2"><p>by <a href="#"><?php echo ucfirst($commentValue['User']['username']);?> </a> on <?php echo date('d-M-y',strtotime($commentValue['Comment']['created']));?></p> </div>
				<div class="clear"></div>
				<p class="blog_3_padding"><?php echo $commentValue['Comment']['comment'];?></p>
				
				<div class="whtlist_2 whtlist_margin"><p><a href="javascript:void(0);" id="reply" onclick="replyOpen();" >Reply</a></p> </div>
				<?php
					echo $this->Form->create('Reply',array('url' => array('controller' => 'blogs', 'action' => 'detail'),'type'=>'file'));
					echo $this->Form->hidden('Comment.parent_id',array('value'=>$commentValue['Comment']['id']));
				?>
				<div id="reply_form_<?php echo $commentValue['Comment']['id'];?>" style="display:none;">
				
				<?php  
						echo $this->Form->input('Comment.meta_description_reply', array(
																				'type'=>'textarea', 
																				'div'=>false, 
																				'placeholder'=>'Type your comment here*',
																				"class" => "blog_area_input",
																				'label'=>false
																				));
				?><br/>
				<div style="color:red;font-family:arial;font-size:12px;" id="error_msg_reply"></div>
				
					<span class="Continue4Btn" style="float:right; margin:13px 0px 0px 0;">
						<?php if(!$this->Session->check('Auth.User.id')){ 
							echo $this->Html->link('Reply',array('controller'=>'users','action'=>'login'),array('class'=>'Continue4BtnRi'));
						 }
							else{?>	
								 <input type="submit" name="submit" class="Continue4BtnRi" id="submit_reply" value="Reply" />
						<?php }?>
					</span> 
				</div>
				<?php echo $this->Form->end();?>		
			</div>
		</div>
	<?php } ?>
<?php }else{?>
<div class="cmnt_block">
         <div class="blog3_right">
         <p><span>No Comments</span></p>
         </div>
</div>
<?php } ?>
<script type="text/javascript">  
  function replyOpen() {
	 
	  var id = jQuery(this).attr('reply_hidden_id');
	  alert(id);
		$('#reply_form_'+id).toggle('slow');	
  }
	
  $("#submit_reply").click(function() {
		
		var comment_reply = $("#CommentMetaDescriptionReply").val();
		var parent_id = $("#CommentParentId").val();
		if (comment_reply == "") {
			$('#error_msg_reply').html('Type your comment here.');		
			return false;
	    }
		var blog_id = $('#blog_id').val();
		var dataString = 'comment='+ comment_reply+'&blog_id='+blog_id+'&parent_id='+parent_id;
		
		$.ajax({
			type: "POST",
			url:"<?php echo Configure::read('App.SiteUrl');?>/blogs/comment_reply",
			
			data: dataString,
			success: function(data) {
				$("#CommentMetaDescription").val("");
				$('#post_comment').html(data);
				//$('textarea#CommentMetaDescription').val('');
			}
	     });
	   
	    return false;
		});
</script>