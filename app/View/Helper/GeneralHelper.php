<?php
/**
 * General Helper class file.
 *
 * PHP 5
 *
 */
App::uses('AppHelper', 'View/Helper');

class GeneralHelper extends AppHelper {
	
	public $no_image = 'no_image.png';
	
	var $helpers = array('Html');
	
	public function show_pic($user_id, $image, $type='THUMB',$title=null,$id=null){
	
		$folder = $user_id;
		
		switch($type){
			case 'BIG':
			$dir = PROJECT_IMAGE_SHOW_PATH ;
			$width = PROJECT_IMAGE_WIDTH_BIG;
			$height = PROJECT_IMAGE_HEIGHT_BIG;
			break;
			
			case 'THUMB':
			$dir = PROJECT_IMAGE_SHOW_PATH;
			$width = PROJECT_IMAGE_WIDTH_THUMB;
			$height = PROJECT_IMAGE_HEIGHT_THUMB;
			break;
			
			case 'SMALL':
			$dir = PROJECT_IMAGE_SHOW_PATH;
			$width = PROJECT_IMAGE_WIDTH_SMALL;
			$height = PROJECT_IMAGE_HEIGHT_SMALL;
			break;
			
			case 'ORIGINAL':
			$dir = PROJECT_IMAGE_SHOW_PATH;
			break;
			
		}
		
		if(empty($id)){
			$id=$image;
		}
		
		$dimes=array('alt' => $title,'width'=>"".$width."",'height'=>"".$height."",'id'=>$id);
		
		if($image=='' || !file_exists(WWW_ROOT  . $dir . DS . $folder. DS . "/image/". DS . $image)){
			$image = $this->no_image;
			$dir = 'projects/';
			return $this->Html->image('/'.$dir.'/'.$image,$dimes);
		}
		
		return $this->Html->image('/'.$dir.'/'.$folder.'/'.$image,$dimes);
	}
	
	
	public function show_project_img($pro_id, $image, $type='THUMB',$title=null){
		
		switch($type){
			case 'BIG':
			$dir = PROJECT_IMAGE_SHOW_BIG_PATH;
			$abs_path=PROJECT_IMAGE_BIG_PATH;
			$width = PROJECT_IMAGE_WIDTH_BIG;
			$height = PROJECT_IMAGE_HEIGHT_BIG;
			
			break;
			
			case 'THUMB':
			$dir = PROJECT_IMAGE_SHOW_THUMB_PATH;
			$abs_path=PROJECT_IMAGE_THUMB_PATH;
			$width = PROJECT_IMAGE_WIDTH_THUMB;
			$height = PROJECT_IMAGE_HEIGHT_THUMB;
			break;
			
			case 'SMALL':
			$dir = PROJECT_IMAGE_SHOW_SMALL_PATH;
			$abs_path=PROJECT_IMAGE_SMALL_PATH;
			$width = PROJECT_IMAGE_WIDTH_SMALL;
			$height = PROJECT_IMAGE_HEIGHT_SMALL;
			break;
			
			case 'ORIGINAL':
			$dir = PROJECT_IMAGE_SHOW_ORIGINAL_PATH;
			$abs_path=PROJECT_IMAGE_ORIGINAL_PATH;
			$width = '';
			$height = '';
			break;
		}
		
		$path = str_replace("{project_id}",$pro_id,$dir);
		$path_abs = str_replace("{project_id}",$pro_id,$abs_path);
		//echo $path.strtolower($type).'_'.$image; die;
		if($image=='' || !file_exists($path_abs.strtolower($type).'_'.$image)){
			
			$image = $this->no_image;
			return $this->Html->image(PROJECT_SHOW.$image,array('title'=>$title,'alt'=>$title,'width'=>$width,'height'=>$height));
			
		}
		return $this->Html->image($path.strtolower($type).'_'.$image,array('title'=>$title,'alt'=>$title));
	}
	public function show_user_img($user_id, $image, $type='THUMB',$title=null){
		
		switch($type){
			case 'BIG':
			$dir = USER_PROFILE_IMAGE_SHOW_BIG;
			$abs_path=USER_PROFILE_IMAGE_BIG;
			$width = USER_IMAGE_WIDTH_BIG;
			$height = USER_IMAGE_HEIGHT_BIG;
			break;
			
			case 'THUMB':
			$dir = USER_PROFILE_IMAGE_SHOW_THUMB;
			$abs_path=USER_PROFILE_IMAGE_THUMB;
			$width = USER_IMAGE_WIDTH_THUMB;
			$height = USER_IMAGE_HEIGHT_THUMB;
			break;
			
			case 'SMALL':
			$dir = USER_PROFILE_IMAGE_SHOW_SMALL;
			$abs_path=USER_PROFILE_IMAGE_SMALL;
			$width = USER_IMAGE_WIDTH_SMALL;
			$height = USER_IMAGE_HEIGHT_SMALL;
			break;
			
			case 'ORIGINAL':
			$dir = USER_PROFILE_IMAGE_SHOW_ORIGINAL;
			$abs_path=USER_PROFILE_IMAGE_ORIGINAL;
			$width = '';
			$height = '';
			break;
			
			case 'SMALL_50_50':
			$dir = USER_PROFILE_IMAGE_SHOW_SMALL_50_50;
			$abs_path=USER_PROFILE_IMAGE_SMALL_50_50;
			$width = USER_IMAGE_WIDTH_SMALL_50_50;
			$height = USER_IMAGE_HEIGHT_SMALL_50_50;
			break;
		}
		
		$path = str_replace("{user_id}",$user_id,$dir);
		$path_abs = str_replace("{user_id}",$user_id,$abs_path);
		if($image=='' || !file_exists($path_abs.$image)){
			$image = $this->no_image;
			return $this->Html->image(USER_SHOW.$image,array('title'=>$title,'alt'=>$title,'width'=>$width,'height'=>$height));
		}
		return $this->Html->image($path.$image,array('title'=>$title,'alt'=>$title));
	}
	
	public function show_user_portfolio_img($user_id, $image, $type='THUMB',$title=null){
		
		switch($type){
			
			case 'THUMB':
			$dir = USER_PORTFOLIO_IMAGE_SHOW_THUMB;
			$abs_path=USER_PORTFOLIO_IMAGE_THUMB;
			$width = USER_PORTFOLIO_WIDTH_THUMB;
			$height = USER_PORTFOLIO_HEIGHT_THUMB;
			break;
			
			case 'ORIGINAL':
			$dir = USER_PORTFOLIO_IMAGE_SHOW_ORIGINAL;
			$abs_path=USER_PORTFOLIO_IMAGE_ORIGINAL;
			$width = '';
			$height = '';
			break;
		}
		
		$path = str_replace("{user_id}",$user_id,$dir);
		$path_abs = str_replace("{user_id}",$user_id,$abs_path);
		if($image=='' || !file_exists($path_abs.$image)){
			$image = $this->no_image;
			return $this->Html->image(USER_SHOW.$image,array('title'=>$title,'alt'=>$title,'width'=>$width,'height'=>$height));
		}
		return $this->Html->image($path.$image,array('title'=>$title,'alt'=>$title));
	}
	
	public function show_pic_user($user_id, $image, $type='THUMB',$title=null,$id=null){
	
		$folder = $user_id;
		
		switch($type){
			case 'BIG':
			$dir = USER_FOLDER ;
			$width = USER_IMAGE_WIDTH_BIG;
			$height = USER_IMAGE_HEIGHT_BIG;
			break;
			
			case 'THUMB':
			$dir = USER_FOLDER;
			$width = USER_IMAGE_WIDTH_THUMB;
			$height = USER_IMAGE_HEIGHT_THUMB;
			break;
			
			case 'SMALL':
			$dir = USER_FOLDER;
			$width = USER_IMAGE_WIDTH_SMALL;
			$height = USER_IMAGE_HEIGHT_SMALL;
			break;
			
			case 'ORIGINAL':
			$dir = USER_PROFILE_IMAGE_ORIGINAL;
			break;
			
		}
		
		if(empty($id)){
			$id=$image;
		}
		
		$dimes=array('alt' => $title,'width'=>"".$width."",'height'=>"".$height."",'id'=>$id);
		
		if($image=='' || !file_exists(WWW_ROOT  . $dir . DS . $folder. DS . "/image/". DS . $image)){
			$image = $this->no_image;
			$dir = 'users/';
			return $this->Html->image('/'.$dir.'/'.$image,$dimes);
		}
		
		return $this->Html->image(''.$dir.'/'.$folder.'/'.$image,$dimes);
	}
	
	public function show_port_temp_pic($port_id, $image, $type='MEDIUM',$title=null,$id=null){
	
		$folder = $port_id;
		
		switch($type){
			case 'LARGE':
			$dir = TEMP_PORT_LARGE_DIR ;
			$width = TEMP_PORT_LARGE_WIDTH;
			break;
			
			case 'MEDIUM':
			$dir = TEMP_PORT_MEDIUM_DIR;
			$width = TEMP_PORT_MEDIUM_WIDTH;
			break;
			
			case 'SMALL':
			$dir = TEMP_PORT_SMALL_DIR;
			$width = TEMP_PORT_SMALL_WIDTH;
			break;
			
		}
		
		if(empty($id)){
			$id=$image;
		}
		
		$dimes=array('alt' => $title,'width'=>"".$width."",'id'=>$id);
		
		if($image=='' || !file_exists(WWW_ROOT  . $dir . DS . $folder. DS . $image)){
			$image = $this->no_image;
			return $this->Html->image('/'.$dir.'/'.$image,$dimes);
		}
		
		return $this->Html->image('/'.$dir.'/'.$folder.'/'.$image,$dimes);
	}
	
	public function show_flag($image, $title=null){
		
		$dir = FLAG_DIR;
		$width = FLAG_WIDTH;
		
		$dimes=array('alt' => $title,'title' => $title,'width'=>"".$width."",'data-url'=>'/'.$dir.'/');
		if($image=='' || !file_exists(WWW_ROOT  . $dir . DS . $image.'.png')){
			$image = $this->no_image;
			return $this->Html->image('/'.$dir.'/'.$image.'',$dimes);
		}
		return $this->Html->image('/'.$dir.'/'.$image.'.png',$dimes);
	}
	
	/*wrap long text*/
	function wrap_long_txt($value=null,$start=null,$end=null){
		$len=strlen($value);
		
		if($len > $end){			
			$str_edit=mb_substr($value,$start,$end);
			return $str_edit.' ...';
			
		}else{
			return $value;
		}
	}
	
	/* You tube code */
	function parse_youtube_url($url,$return='embed',$width='',$height='',$rel=0){
		$urls = parse_url($url);
		
		//expect url is http://youtu.be/abcd, where abcd is video iD
		if($urls['host'] == 'youtu.be'){ 
			$id = ltrim($urls['path'],'/');
		}
		//expect  url is http://www.youtube.com/embed/abcd
		else if(strpos($urls['path'],'embed') == 1){ 
			$id = end(explode('/',$urls['path']));
		}
		 //expect url is abcd only
		else if(strpos($url,'/')===false){
			$id = $url;
		}
		//expect url is http://www.youtube.com/watch?v=abcd
		else{
			parse_str($urls['query']);
			$id = $v;
		}
		//return embed iframe
		if($return == 'embed'){
			return '<iframe width="'.($width?$width:560).'" height="'.($height?$height:360).'" src="http://www.youtube.com/embed/'.$id.'?rel='.$rel.'"  frameborder="0" allowfullscreen></iframe>';
		}
		//return normal thumb
		else if($return == 'thumb'){
			return 'http://i1.ytimg.com/vi/'.$id.'/default.jpg';
		}
		//return hqthumb
		else if($return == 'hqthumb'){
			return 'http://i1.ytimg.com/vi/'.$id.'/hqdefault.jpg';
		}
		// 0 size image
		 else if($return == 'zero'){
			return 'http://i1.ytimg.com/vi/'.$id.'/0.jpg';
		}
		// 1 step size image
		 else if($return == 'one'){
			return 'http://i1.ytimg.com/vi/'.$id.'/1.jpg';
		}
		// two step size image
		 else if($return == 'two'){
			return 'http://i1.ytimg.com/vi/'.$id.'/2.jpg';
		}
		// 3 step size image
		 else if($return == 'three'){
			return 'http://i1.ytimg.com/vi/'.$id.'/3.jpg';
		}
		
		// else return id
		else{
			return $id;
		}
	}	
	
	
	
	/* You tube code for home page */
	function parse_youtube_url_home($url,$return='embed',$width='',$height='',$rel=0){
		$urls = parse_url($url);
		
		//expect url is http://youtu.be/abcd, where abcd is video iD
		if($urls['host'] == 'youtu.be'){ 
			$id = ltrim($urls['path'],'/');
		}
		//expect  url is http://www.youtube.com/embed/abcd
		else if(strpos($urls['path'],'embed') == 1){ 
			$id = end(explode('/',$urls['path']));
		}
		 //expect url is abcd only
		else if(strpos($url,'/')===false){
			$id = $url;
		}
		//expect url is http://www.youtube.com/watch?v=abcd
		else{
			parse_str($urls['query']);
			$id = $v;
		}
		//return embed iframe
		if($return == 'embed'){
			return '<iframe width="'.($width?$width:475).'" height="'.($height?$height:340).'" src="http://www.youtube.com/embed/'.$id.'?rel='.$rel.'"  frameborder="0" allowfullscreen></iframe>';
		}
		//return normal thumb
		else if($return == 'thumb'){
			return 'http://i1.ytimg.com/vi/'.$id.'/default.jpg';
		}
		//return hqthumb
		else if($return == 'hqthumb'){
			return 'http://i1.ytimg.com/vi/'.$id.'/hqdefault.jpg';
		}
		// 0 size image
		 else if($return == 'zero'){
			return 'http://i1.ytimg.com/vi/'.$id.'/0.jpg';
		}
		// 1 step size image
		 else if($return == 'one'){
			return 'http://i1.ytimg.com/vi/'.$id.'/1.jpg';
		}
		// two step size image
		 else if($return == 'two'){
			return 'http://i1.ytimg.com/vi/'.$id.'/2.jpg';
		}
		// 3 step size image
		 else if($return == 'three'){
			return 'http://i1.ytimg.com/vi/'.$id.'/3.jpg';
		}
		
		// else return id
		else{
			return $id;
		}
	}
	
	
	public function getPortImage($image, $title=null,$user_id,$set_id,$type='SMALL'){
	
		switch($type){
			case 'LARGE':
			$dir = USER_PORT_LARGE_DIR ;
			$width = USER_PORT_LARGE_WIDTH;
			break;
			
			case 'MEDIUM':
			$dir = USER_PORT_MEDIUM_DIR;
			$width = USER_PORT_MEDIUM_WIDTH;
			break;
			
			case 'SMALL':
			$dir = USER_PORT_SMALL_DIR;
			$width = USER_PORT_SMALL_WIDTH;
			break;
			
		}
		
		
		
		//echo WWW_ROOT  . $dir . DS .$user_id. DS .$set_id. DS . $image;
		$dimes=array('alt' => $title,'title' => $title,'width'=>"".$width."");
		if($image=='' || !file_exists(WWW_ROOT  . $dir . DS .$user_id. DS .$set_id. DS . $image)){
		
			$image = $this->no_image;
			return $this->Html->image('/'.$dir.'/'.$image.'.png',$dimes);
		}
		return $this->Html->image('/'.$dir.'/'.$user_id.'/'.$set_id.'/'.$image,$dimes);
		
	}
	
	public function show_banner($image, $type='MEDIUM',$title=null,$id=null,$display=null){
	
		
		
		switch($type){
			case 'LARGE':
			$dir = BANNER_LARGE_DIR ;
			$width = BANNER_LARGE_WIDTH;
			break;
			
			case 'MEDIUM':
			$dir = BANNER_MEDIUM_DIR;
			$width = BANNER_MEDIUM_WIDTH;
			break;
			
			case 'SMALL':
			$dir = BANNER_SMALL_DIR;
			$width = BANNER_SMALL_WIDTH;
			break;
			
		}
		
		if(empty($id)){
			$id=$image;
		}
		
		$dimes=array('alt' => $title,'width'=>"".$width."",'data-ban-id'=>$id,'class'=>'bannerImage','style'=>'display:'.$title.';');
		
		if($image=='' || !file_exists(WWW_ROOT  . $dir . DS . $image)){
			$image = $this->no_image;
			return $this->Html->image('/'.$dir.'/'.$image,$dimes);
		}
		
		return $this->Html->image('/'.$dir.'/'.$image,$dimes);
	}
	
	/*wrap long text*/
	function wrap_loong_txt($value=null,$start=null,$end=null){
		$len=strlen($value);
		if($len > $end){
			
			$str_edit=mb_substr($value,$start,$end);
			$num=strrpos($str_edit,' ');
			if(substr($str_edit, -1)=='<')
			{
			return mb_substr($value,$start,$num-1).' ...';
			}
			else
			{
			$str_edit=mb_substr($value,$start,$num);
			return $str_edit.' ...';
			}
		}else{
			return $value;
		}
	}
	public function getPortImageForView($image, $title=null,$desc=null,$user_id,$set_id,$type='LARGE'){
	
		switch($type){
			case 'LARGE':
			$dir = USER_PORT_LARGE_DIR ;
			$width = USER_PORT_LARGE_WIDTH;
			break;
			
			case 'MEDIUM':
			$dir = USER_PORT_MEDIUM_DIR;
			$width = USER_PORT_MEDIUM_WIDTH;
			break;
			
			case 'SMALL':
			$dir = USER_PORT_SMALL_DIR;
			$width = USER_PORT_SMALL_WIDTH;
			break;
			
		}
		
		
		
		//echo WWW_ROOT  . $dir . DS .$user_id. DS .$set_id. DS . $image;
		$dimes=array('alt' => $title,'title' => $title,'width'=>"".$width."",'data-frame'=>Configure::read('App.SiteUrl').'/'.USER_PORT_SMALL_DIR.'/'.$user_id.'/'.$set_id.'/'.$image,'data-description'=>$desc);
		return $this->Html->image('/'.USER_PORT_LARGE_DIR.'/'.$user_id.'/'.$set_id.'/'.$image,$dimes);
		
	}
	
	public function post_picture($post_id, $image, $type='SMALL'){
		
		$folder = $post_id;
		
		
		switch($type){
			case 'ORIGINAL':
			$dir = POST_ORIGINAL_DIR ;
			//$width = PORTFOLIO_LARGE_WIDTH;
			break;
			
			case 'LARGE':
			$dir = POST_LARGE_DIR ;
			$width = POST_LARGE_WIDTH;
			break;
			
			case 'EX_LARGE':
			$dir = POST_EX_LARGE_DIR ;
			$width = POST_EX_LARGE_WIDTH;
			break;
				
			case 'SMALL':
			$dir = POST_SMALL_DIR;
			$width = POST_SMALL_WIDTH;
			break;
			
		}
		
		if($image=='' || !file_exists(WWW_ROOT  . $dir . DS . $folder. DS . $image)){
			$image = $this->no_image;
		}
		if($type=='SMALL'){
			return '<img src="'. Router::url('/'.$dir.'/'.$folder.'/'.$image) . '" class="ImgUser" />';
		}else if($type=='LARGE'){
		return '<img src="'. Router::url('/'.$dir.'/'.$folder.'/'.$image) . '"  class="ImgUser"  />';
		}
		else{
				return '<img src="'. Router::url('/'.$dir.'/'.$folder.'/'.$image) . '"  class="ImgUser"  />';
				}
	}
	
	 public function message_count($user_id,$project_id,$client_id){
		App::import('Model','Message');
		$mess=new Message;
		$count=$mess->find('count',array('conditions'=>array('Message.project_id'=>$project_id,'Message.sender_id'=>$user_id,'Message.receiver_id'=>$client_id)));
			return $count;
	} 
	
	public function message_count_user($user_id,$project_id,$client_id){
		App::import('Model','Message');
		$mess=new Message;
		$count=$mess->find('count',array('conditions'=>array('Message.project_id'=>$project_id,'Message.sender_id'=>$client_id,'Message.receiver_id'=>$user_id)));
			return $count;
	} 
	
	 public function project_bid($project_id){
		App::import('Model','ProjectBid');
		$bid=new ProjectBid;
		$user_info=$bid->find('first',array('conditions'=>array('ProjectBid.project_id'=>$project_id,'ProjectBid.status'=>'2')));
			return $user_info['ProjectBid']['user_id'];
	} 
	
	public function feedback($user_id){
		$project_id='';
		$rating='';
		$project=array();
		App::import('Model','Feedback');
		App::import('Model','ProjectBid');
		$projectbid=new ProjectBid;
		$project=$projectbid->find('list',array('conditions'=>array('ProjectBid.user_id'=>$user_id,'ProjectBid.status'=>2),'fields'=>'ProjectBid.project_id'));
		$project = array_unique($project);		
		$project_id=implode(',',$project);
		if($project_id!=''){
		$feedback=new Feedback;
		$rating=$feedback->find('all',array('conditions'=>array('Feedback.receiver_id'=>$user_id,'Feedback.project_id IN('.$project_id.')')));
			}else{
			$rating='';
			}
			return $rating;
	}

public function feedback_clint($user_id){
		$rating='';
		App::import('Model','Feedback');
		App::import('Model','Project');
		$project=new Project;
		$project_id=$project->find('list',array('conditions'=>array('Project.user_id'=>$user_id),'fields'=>'Project.id'));
		$project_id = array_unique($project_id);		
		$project_id_list=implode(',',$project_id);
		if($project_id_list!=''){
		$feedback=new Feedback;
		$rating=$feedback->find('all',array('conditions'=>array('Feedback.receiver_id'=>$user_id,'Feedback.project_id IN('.$project_id_list.')')));
			}else{
			return $rating='';
			}
			return $rating;
	}	
	
	public function feedback_given($user_id){
			App::import('Model','Feedback');
		App::import('Model','Project');
		$project=new Project;
		$project_id=$project->find('list',array('conditions'=>array('Project.user_id'=>$user_id),'fields'=>'Project.id'));
		$project_id_list=implode(',',$project_id);
		if($project_id_list!=''){
		$feedback=new Feedback;
		$rating=$feedback->find('count',array('conditions'=>array('Feedback.sender_id'=>$user_id,'Feedback.project_id IN('.$project_id_list.')')));		
			return $rating;
			}else{
			return $rating='0';
			}
	}
	public function feedback_received($user_id){
			App::import('Model','Feedback');
		App::import('Model','ProjectBid');
		$projectbid=new ProjectBid;
		$project=$projectbid->find('list',array('conditions'=>array('ProjectBid.user_id'=>$user_id),'fields'=>'ProjectBid.project_id'));
		$project = array_unique($project);		
		$project_id=implode(',',$project);
		if($project_id!=''){
		$feedback=new Feedback;
		$rating=$feedback->find('count',array('conditions'=>array('Feedback.receiver_id'=>$user_id,'Feedback.project_id IN('.$project_id.')')));		
			return $rating;
			}else{
			return $rating='0';
			}
	}
	
	public function payment_given($user_id){
			App::import('Model','ProjectMilestone');
		App::import('Model','Project');
		$project=new Project;
		$project_id=$project->find('list',array('conditions'=>array('Project.user_id'=>$user_id),'fields'=>'Project.id'));
		$project_id_list=implode(',',$project_id);
		if($project_id_list!=''){
		$promilestone=new ProjectMilestone;
		$rating=$promilestone->find('all',array('conditions'=>array('ProjectMilestone.status'=>'paid','ProjectMilestone.project_id IN('.$project_id_list.')'),'fields'=>array('sum(ProjectMilestone.paypal_amount) as total')));
			$total=$rating[0][0]['total'];
			return $total;
			}else{
			return $total='0';
			}
	}
	public function total_project_done($user_id){
		$award_pro=0;
		App::import('Model','ProjectBid');
		App::import('Model','Project');
		$project=new Project;
		$projectbid=new ProjectBid;
		$project_count=$projectbid->find('list',array('conditions'=>array('ProjectBid.user_id'=>$user_id),'fields'=>'ProjectBid.project_id'));	
			//pr($project_count);
			$project = array_unique($project_count);	
		if(!empty($project_count)){					
			$project_id=implode(',',$project_count);
			$project=new Project;
			$award_pro=$project->find('count',array('conditions'=>array('Project.status'=>'3','Project.id IN('.$project_id.')')));			
		}else{
			$award_pro=0;
		}			
		return $award_pro;
	}
	
	public function total_ern($user_id){
		$total=0;
		App::import('Model','EscrowProjectMilestone');
		$escpy=new EscrowProjectMilestone;
		$eraning=$escpy->find('all',array('conditions'=>array('EscrowProjectMilestone.receiver_id'=>$user_id),'fields'=>array('sum(EscrowProjectMilestone.release_amount) as total')));
		
		if(!empty($eraning[0][0]['total'])){
		$total=$eraning[0][0]['total'];
		}else{
		$total=0;
		}
		return $total;
	}
	public function getRatingStar($myval){
		$myval = $myval+$myval;
		$imgArray = array();
		for($i=1;$i<=10;$i++){
			if($i <= $myval){
			if($i%2==0){
					$imgArray[] = 'r_gold.png';	
				}else{
					$imgArray[] = 'left_gold.png';	
				}
			}else{
				if($i%2==0){
					$imgArray[] = 'gray_right.png';	
				}else{
					$imgArray[] = 'gray_left.png';	
				}
			}
		}
		$str = '';
		foreach($imgArray as $k=>$v){
			$str.= $this->Html->image($v);
		}
		echo $str;
	}
	
	public function total_project_posted($user_id){
		$post_pro=0;
		App::import('Model','Project');
			$project=new Project;
			$post_pro=$project->find('count',array('conditions'=>array('Project.user_id'=>$user_id)));	
		return $post_pro;
	}
	
	public function getProjectByLeaderId($user_id){
		
		App::import('Model','Project');
		$project=new Project;
		$proj_data=$project->find('list',array('fields'=>array('id','title'),'conditions'=>array('Project.user_id'=>$user_id)));	
		return $proj_data;
	}
	
	public function porfolio_count($id){
		$post_pro=0;
		App::import('Model','Portfolio');
			$portfolio=new Portfolio;
			$post_pro=$portfolio->find('count',array('conditions'=>array('Portfolio.user_set_id'=>$id)));	
		return $post_pro;
	}
	
	public function show_advt_img($image, $type='THUMB',$width=null){
		$dimes=array('alt' => $image,'width'=>"".$width."");
		if($image=='' || !file_exists(WWW_ROOT  . ADVT_LARGE_DIR . DS . $image)){
			$image = $this->no_image;
			return $this->Html->image('/'.$dir.'/'.$image,$dimes);
		}
		
		return $this->Html->image('/'.ADVT_LARGE_DIR.'/'.$image,$dimes);
	}
	
	public function show_category($cat_id){
		$cat_nane='';
		App::import('Model','Category');
			$categories=new Category;
			$post_pro=$categories->find('first',array('conditions'=>array('Category.id'=>$cat_id),'fields'=>array('Category.name')));	
		return $post_pro['Category']['name'];
	}
	
	public function project_plan_title($plan_id){
		
			App::import('Model','ProjectPaymentOption');
				$ProjectPaymentOptions = new ProjectPaymentOption;
				$post_pro=$ProjectPaymentOptions->find('first',array('conditions'=>array('ProjectPaymentOption.id'=>$plan_id),'fields'=>array('ProjectPaymentOption.title')));	
			return $post_pro['ProjectPaymentOption']['title'];
	}
	
	public function project_plan_amount($plan_id){
		
			App::import('Model','ProjectPaymentOption');
				$ProjectPaymentOptions = new ProjectPaymentOption;
				$post_pro=$ProjectPaymentOptions->find('first',array('conditions'=>array('ProjectPaymentOption.id'=>$plan_id),'fields'=>array('ProjectPaymentOption.amount')));	
			return $post_pro['ProjectPaymentOption']['amount'];
	}
	
}
