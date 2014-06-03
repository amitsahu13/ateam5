<script type="text/javascript">
var tr =  true  ; 
$(document).ready(function() {	
	jQuery('.confirm_details').live('click', function() {		
		openOffersDialog('portfolio');	
	});
	
	jQuery('.editmyself').live('click', function() {
		openOffersDialog('aboutus');
	});
	
	jQuery('.editcv').live('click', function() {
		openOffersDialog('resume');
	});
});
</script> 

<h3 class='titleh3'> User Profile Definition    </h3>
<div class="cmpnsn_prgrsDV">
	<div class="cmpnsn_prgrsnav">
			<?
 			 if ($user_data["UserDetail"]["availability_id"]!= 0 &&  $user_data["UserDetail"]["availability_id"]!="") :

 		?> 
 		<ul>
			<li><a href="<?=Router::url(array( 'controller' => 'users','action' => 'user_profile_overview'), true);?>"><span >1</span> Overview</a></li>
			<li><a href="<?=Router::url(array( 'controller' => 'users','action' => 'user_personal_detail'), true);?>"  class="blue"><span class="blue">2</span> Persona</a></li>
		</ul> 

	<? else :?>

 		<ul>
			<li><a href="javascript:void(0)" ><span >1</span> Overview</a></li>
			<li><a href="javascript:void(0)" class="blue"><span class="blue">2</span> Persona</a></li>
		</ul> 

 		<!--  End Naviagation  -->
 		<?endif; ?> 
	</div>
	<div class="prgrsnav_fill"> 
	<?php					
	echo $this->Html->image('75.jpg',array('alt'=>'75%','title'=>'75%'));
	?>
	</div>
</div>
<div class="product_dscrpBOX" style="width:100%;">
<h3><span class="round_bgTXT">2</span>Persona</h3>
<div class="compensation_frmDV">
<?php echo $this->Form->create('UserDetail',array('url'=>array('controller'=>'users','action'=>'user_personal_detail'),'type'=>'file'));
	echo $this->Form->hidden('id',array('value'=>$this->request->data['UserDetail']['id']));
?>
	<ul class="OverviewFrm">
	  
	  <li>
		<label>C.V.</label>
		<div class="OverviewFrmRi OverviewFrm8Ri">
		<?php echo $this->Form->input('resume_text', array('div'=>false, 'label'=>false, "type"=>"textarea", "class" => "CVTxtFild","readonly"=>"readonly"));?>
		  <a href="javascript:void(0);" class="EditIcon editcv"></a></div>
	  </li> 


 		<!-- Upload Stuff  -->  

	   <li>
		<label>Upload C.V</label>
		<div class="OverviewFrmRi">
	
 
		 
 	

 
<script type="text/javascript">
    jQuery(function($){
        //code for uploading project image starts here
        var btnUpload=$('#upload_file');
        var status=$('#status');
		var i = 0;
		 // assign     remove   
		 jQuery(".download").click(function(){
				window.location =  "<?php echo(SITE_URL); ?>/users/downloadResume"; 	 
		  });  
		 
		 
		 jQuery(".delete").click(function(){
			  jQuery.get("<?php echo(SITE_URL); ?>/users/deleteResume");
				 jQuery(this).parent().parent().hide(); 
				 
		  }); 
        new AjaxUpload(btnUpload, {		
		
            action: '<?php echo(SITE_URL);?>/users/uploadResume',
 			name: 'data[UserDetail][resume_doc]',
			id:'project_file',
            onSubmit: function(file, ext){
			  if (! (ext && /^(doc|pptx|txt|ppt|docx)$/.test(ext))){
                    $('#status2').text('Only  doc,txt,ppt files are allowed.').addClass('errorTxt');
                    return false;
                }
				  $('#status2').html('<img src="<?php echo(SITE_URL); ?>/img/ajax-loader_2.gif"/>');
              },

            onComplete: function(file, response){
 	 			$('#status2').html('');
                var myimageresponse = response.split('|');
				 if(myimageresponse[0]==="success"){
				  $('#fileattache').html('<li id='+myimageresponse[2]+'>'+myimageresponse[1]+'<div class="edit_deletBX"><input type="button"  value="" title="download" class="download" id="north-west"><input type="button" value="" class="info"  title="'+myimageresponse[3]+'" id="north-east"><input type="button" title="delete" value="" class="delete" id="east"><input type="hidden" name="data[ProjectBusinessplanFile]['+i+'][file_name]"  value="'+myimageresponse[1]+'"/></div></li>');
                }else{
                    $('<li></li>').html('#files').text(file).addClass('errorTxt');
                }
				i++;
				 
				 // assign     remove   
				 jQuery(".download").click(function(){
						window.location =  "<?php echo(SITE_URL); ?>/users/downloadResume"; 	 
				  });  
				 
				 
				 jQuery(".delete").click(function(){
					  jQuery.get("<?php echo(SITE_URL); ?>/users/deleteResume");
						 jQuery(this).parent().parent().hide(); 
						 
				  }); 
				 
				 
				 
            }
        });

       
    });
    String.prototype.trim = function() {
        return this.replace(/^\s+|\s+$/g,"");
    }
     
	
	
</script> 
			<div class="compensation_frmrow_R">
			<p>
			<input name="" type="button"  id='upload_file' class="upload_btn" value="Upload File"/>
			<span id="status2" style="color:red;"></span>
			</p>
			<div class="clear"></div>
				<div id="placement-examples" class="add_edit_upld">
				<ul id="fileattache">
				   <? if ( $user_data["UserDetail"]["resume_doc"] != "" ):  ?>  
				   
				   <li id=""><?=$user_data["UserDetail"]["resume_doc"]?><div class="edit_deletBX">
				   <input type="button" value="" title="download" class="download" id="north-west">
				   <input type="button" value="" class="info" title="<?=$user_data["UserDetail"]["resume_doc"]?> <?=date("Y-m-d H:i",strtotime($user_data["UserDetail"]["modified"]))?>" id="north-east">
				   <input type="button" title="delete" value="" class="delete" id="east">
				   <input type="hidden" name="data[ProjectBusinessplanFile][0][file_name]" value="resume"></div></li> 
				   <? endif;?>  
				</ul>
				</div>
		
			</div>











		  </div>
	  </li> 

	 




   <!--  Social Links   Begin Here   -->

		

	  <li>
		<label>Linked-in Link</label>
		<div class="OverviewFrmRi"><span class="TXT_rwndInPut">
		<?php echo $this->Form->input('linkdin_url', array('div'=>false, 'label'=>false, "class" => "TXT_rwndInPutRi with_Lrg"  ,  "patter" =>"linkedin.com" ));?>	
		  
		  </span></div>
	  </li>
	   
	  <li>
		<label>Github</label>
		<div class="OverviewFrmRi"><span class="TXT_rwndInPut">
		 <?php echo $this->Form->input('github_url', array('div'=>false, 'label'=>false, "class" => "TXT_rwndInPutRi with_Lrg" ,  "patter" =>"github.com"  ));?>	
		  </span></div>
	  </li>
	  
	  <!--  Behance  -->
	   <li>
		<label>Behance</label>
		<div class="OverviewFrmRi"><span class="TXT_rwndInPut">
		 <?php echo $this->Form->input('behance_url', array('div'=>false, 'label'=>false, "class" => "TXT_rwndInPutRi with_Lrg" ,  "patter" =>"behance.net" ));?>	
		  </span></div>
	  </li>
	  
	  <li>
		<label>Carbonmade</label>
		<div class="OverviewFrmRi"><span class="TXT_rwndInPut">
		 <?php echo $this->Form->input('carbonmade_url', array('div'=>false, 'label'=>false, "class" => "TXT_rwndInPutRi with_Lrg" ,  "patter" =>"carbonmade.com" ));?>	
		  </span></div>
	  </li>
	 <!--  End   Social Links   Here    -->
	 
	 
	  		<script type='text/javascript'>  
	  			jQuery(document).ready(function(){
	  			    jQuery(".TXT_rwndInPutRi").change(function(){
	  			    	var val  =  jQuery(this).val(); 
	  			    	var pat   =  jQuery(this).attr("patter");
	  			    	if (val !=  "" ){
	  			    		 if  (val.indexOf(pat)<=-1){
	  			    			jQuery(this).css("border","1px solid red"); 
	  			    			alert("Wrong Link Format");
	  			    			tr= false  ; 
	  			    		 }else{
	  			    			jQuery(this).css("border","0px solid white"); 
	  			    			tr = true ;  
	  			    		 }
	  			    	 }else{ 
	  			    		jQuery(this).css("border","0px solid white");  
	  			    		 tr= true;  
	  			    	 } 
	  			    }); 
	  			    
	  			   jQuery("#UserDetailUserPersonalDetailForm").submit(function(){
	  				   if (!tr) 
	  					   alert("Fix errros");
	  				   else 
	  					   return true ; 
	  				   return  false  ; 
	  			   });
	  			    
	  			    
	  			    
	  			}); 
	  			</script>
	   
	  <li >
	  
	 <?php echo $this->element("Front/ele_user_portfolio");?>
	  </li>
	  <li>
		<label>&nbsp;</label> 


		<!--  Back Button Heer -->
		<script type='text/javascript'> 
						function goback(url){ 
							 jQuery.post('<?=Router::url("/",true)?>redirect/setback/',{back:url},function(){
								  jQuery(".Continue4BtnRi").click(); 
								});
							return false ; 
						}
					</script>
					
		   <!--Back Bottom  goes  Here for The Projects   Navigation   -->
			<!--<div class="btm_nextbtnDV"> -->
				<span style="float:left;" class="Continue4Btn"> 
				<input type="button" name="" class="Continue4BtnRi" value="Previous" onclick="goback('<?=Router::url(array( 'controller' => 'users','action' => 'user_profile_overview'), true);?>');">
 				</span>
			<!--</div> -->
			<!--End Project Back Bottoms:-->  


		<span class="Continue4Btn" style="float:right;">
		<input type="submit" name="" class="Continue4BtnRi" value="Submit">
		</span><span class="Continue4Btn" style="float:right;">
		 <A class="Continue4BtnRi" href='/users/user_public_view/<?=$user_data["User"]["id"]?>'  class='publicview'  target="_blank"> Preview in public view </A>  
			   
		 
		
		</span></li>
	</ul>
 <?php echo $this->Form->end();?>
</div>
</div>
<?php 
echo $this->Html->css(array('popup'));
echo $this->Html->script(array('popup')); 
?>
<div  id="show_portfolio" style="display:none;" >
<?php
echo $this->element('Front/ele_add_item_portfolio_popup_sagi');
?>
</div>





<div  id="show_aboutus" style="display:none;" >
<?php
echo $this->element('Front/ele_about_us');
?>
</div>
<div  id="show_resume" style="display:none;" >
<?php
echo $this->element('Front/ele_cv');
?>
</div>