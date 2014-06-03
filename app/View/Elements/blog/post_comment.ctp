<?php 
if(!empty($post_comment)){

	foreach($post_comment as $keyComment => $commentValue){
	
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
				<div class="whtlist_2" style="margin-bottom: 15px;"><p>by <a href="#"><?php echo ucfirst($commentValue['User']['username']);?> </a> on <?php echo date('d-M-y',strtotime($commentValue['Comment']['created']));?></p> </div>
				<div class="clear"></div>
				<p class="blog_3_padding" style="border-bottom: 1px dashed #000000; padding-bottom:15px !important;"><?php echo $commentValue['Comment']['comment'];?></p>
				
				
				<div id="<?php echo 'update_reply_'.$commentValue['Comment']['id']; ?>">
				<?php echo $this->element('blog/ele_reply',array('Reply_Comment'=>$commentValue['children']));?>
				</div>
				
				<div class="whtlist_2 whtlist_margin" style="margin-top:10px;"><p><a href="javascript:void(0);" id="reply" onclick="replyOpen('<?php echo $commentValue['Comment']['id'];?>');">Reply</a></p> </div>
				
				<?php
					echo $this->Form->create('Reply',array('url' => array('controller' => 'blogs', 'action' => 'comment_reply'),'type'=>'file','id'=>'reply_form_'.$commentValue['Comment']['id']));
					 
					echo $this->Form->hidden('Comment.parent_id',array('value'=>$commentValue['Comment']['id']));
					
					echo $this->Form->hidden('Comment.blog_id',array('value'=>$commentValue['Comment']['blog_id'],'id'=>'blog_id'));
				?>
				<div id="reply_form_div_<?php echo $commentValue['Comment']['id'];?>" style="display:none;">
					
				<?php  
						echo $this->Form->input('Comment.meta_description_reply', array(
																				'type'=>'textarea', 
																				'div'=>false, 
																				'value'=>'Type your reply here*',
																				"class" => "blog_area_input",
																				'label'=>false,
																				'onfocus'=>'blank_reply_focus(this)',
																				'onblur'=>'blank_reply_blur(this)',
																				'id'=>'CommentMetaDescriptionReply'.$commentValue["Comment"]["id"]
																				));
				?><br/><br/>
				<span style="color:red;font-family:arial;font-size:12px;margin-top: 3px;float:left;" id="<?php echo 'error_msg_reply_'.$commentValue['Comment']['id'];?>"></span>
				
					<span class="Continue4Btn" style="float:right; margin:13px 0px 0px 0;">
						<?php if(!$this->Session->check('Auth.User.id')){ 
							echo $this->Html->link('Reply',array('controller'=>'users','action'=>'login'),array('class'=>'Continue4BtnRi'));
						 }
							else{?>	
								 <!-- <input type="submit" name="submit" class="Continue4BtnRi" onclick="return submitReply('<?php //echo $commentValue['Comment']['id'];?>');" value="Reply" /> -->
								 
								<?php  echo $this->Js->submit('Reply', array(
															'update' => '#update_reply_'.$commentValue['Comment']['id'],
															'div' => false,
															'async' => false,
															'url'=>array('action'=>'comment_reply'),
															'class'=>'Continue4BtnRi',
															'value'=>'Reply',
															'before'=>'return post_reply('.$commentValue["Comment"]["id"].')',
															'complete'=>'reply_textarea_blank('.$commentValue["Comment"]["id"].')'										
								));?>
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

<?php 
 if (class_exists('JsHelper') && method_exists($this->Js, 'writeBuffer')) 
echo $this->Js->writeBuffer(); 
?>  
