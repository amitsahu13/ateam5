<?php
class Teamup extends AppModel {
	public $id2;
	public $name = 'Teamup';
	public $useTable = 'teamup_jobs';
	public $tablesd = array (
			
			"teamup_milestones",
			"teamup_product",
			"teamup_terms" 
	);
	
	
	/*
	 * Create New Entry if not
	 * 2013  
	 */
	
	public function create2($user_id, $user, $job) {
		$c = $this->find ( "count", array (
				"conditions" => array (
						"user_id" => $user_id,
						"to_user" => $user,
						"job_id" => $job 
				) 
		) ); 
		

		 
		if ($c == 0) {
			 $this->query ( "INSERT INTO teamup_jobs SET job_id='{$job}'   ,  user_id='{$user_id}' ,   to_user='{$user}' " );
			 $this->id2 = $this->getLastInsertID ();  
			 App::import("model","SystemInbox");  
			 App::import("model","Job"); 
			 $job_model=  new Job();  
			 $jb   =  $job_model->find("first" ,  array("conditions"=>array("id"=>$job)));  
			 SystemInbox::insert($user,  JOB_APPROVED_TEAM. $jb["Job"]["title"],   $jb["Job"]["id"] );  
		 } 
		
		 
		 
		$s = $this->find ( "first", array (
				"conditions" => array (
						"user_id" => $user_id,
						"to_user" => $user,
						"job_id" => $job
				)
		) );

		
		 
		 $this->id2 = $s ["Teamup"] ["id"];
		 return $this->id2;
	}
	public function loadMilestones($id) {
		$result = [];
		$array = $this->query ( "SELECT * FROM teamup_milestones WHERE  teamup = '{$id}'  ORDER BY date  ASC  " );
		
		foreach ( $array as $m ) {
			$r = new stdClass ();
			$r->id = $m ["teamup_milestones"] ["id"];
			$r->title = $m ["teamup_milestones"] ["title"];
			$r->desc = $m ["teamup_milestones"] ["desc"];
			$r->payment = $m ["teamup_milestones"] ["payment"];
			$r->sharing = $m ["teamup_milestones"] ["sharing"];
            $r->reported =   $m ["teamup_milestones"] ["reported"];
            $date =  strtotime($m ["teamup_milestones"] ["date"]) ;
		    $date =  date("Y-m-d",$date); 
		 
			
			$r->date =  $date; 
			$r->closed =  $m ["teamup_milestones"] ["closed"] ; 
			 $result [] = $r;
		}

		return $result;
	}
	public function saveMilestones($id, $data = array(), $user) {
		$date_milestones = array();
		$save_id = array();
		$tmp_array = $this->query ("SELECT id FROM teamup_milestones AS tm WHERE teamup='{$id}';");
		foreach ($tmp_array as $value) {
			$date_milestones[$value['tm']['id']] = '';
		}

		// $this->query ( "DELETE FROM  teamup_milestones WHERE teamup='{$id}'  " );
		foreach ($data as $v ) {
			if ( (!isset($v['datetime'])) || (!isset($v['sharing'])) || (!isset($v['payment'])) || (!isset($v['desc'])) || (!isset($v['title'])) || (!isset($v['closed'])) ) {
				if (isset($v['id'])) {
					$save[] = $v['id'];
				}
				continue;
			}

			if ( (isset($v['id'])) && (isset($date_milestones[intval($v['id'])])) ) {
				$this->query("UPDATE teamup_milestones SET date = '".$v["datetime"]."', sharing = '{$v["sharing"]}', payment = '{$v["payment"]}', `desc` = '{$v["desc"]}', title = '{$v["title"]}', closed = '{$v["closed"]}' WHERE id = '".intval($v['id'])."';");
				$save[] = $v['id'];
			} else {
				$this->query("INSERT INTO teamup_milestones SET teamup ='{$id}', user_id ='{$user}', date='".$v["datetime"]."', sharing='{$v["sharing"]}', payment='{$v["payment"]}', `desc`='{$v["desc"]}', title='{$v["title"]}', closed='{$v["closed"]}';");
				$result = $this->query("SELECT id FROM teamup_milestones ORDER BY id DESC LIMIT 1;");
				$save[] = $result[0]['teamup_milestones']['id'];
			}
		}

		if (count($save) > 0) {
			$update = '';
			foreach ($save as $value) {
				$update .= " id != '".$value."' AND";
			}
			$this->query("DELETE FROM teamup_milestones WHERE ".$update." teamup='{$id}';");
		}
	}
	
	
	
	 
	public  function insertEvent($type = "", $msg, $time, $userid  , $group="default", $title="" ) {
		 if (!isset($_SESSION["revision"])) 
		 	 $_SESSION["revision"] =  [];  
 			$_SESSION["revision"][]  = [$type,  $msg,  $time  , $userid, $group, $title ];  
		  
	 }
	
	
	
	  // Insert Into Session  :   
	  public function submitRevisions(){
	   
	  	if (isset($_SESSION["revision"])  && count($_SESSION["revision"]) >0 ){
				foreach($_SESSION["revision"] as $rev){
					$this->query ( "INSERT INTO teamup_log SET user_id='{$rev[3]}'  ,  time='{$rev[2]}' ,   type='{$rev[0]}' ,  msg='{$rev[1]}' ,  group_title='{$rev[4]}' , title='{$rev[5]}'   " );
				 } 
				 $_SESSION["revision"]=  [];  
	  	} 
	  	
	  	
	 	
	  }
	
	
	

	
	// Save Terms
	public function saveTerms($data , $id ){
		  $this->query("DELETE FROM  teamup_terms WHERE  team_id ='{$id}'  ") ; 
		   foreach($data["title"] as $index =>$title )  
		  	$this->query("INSERT INTO    teamup_terms  SET   title='{$title}'   ,  value='{$data["value"][$index]}' ,  team_id ='{$id}'  ") ;   
		   
		   $this->query("UPDATE teamup_jobs SET is_send  = '1'     WHERE   id ='{$id}'  "); 
		   
		
		
	}
	    
	public function loadWorkData($id){
		 $data =  $this->query("SELECT  proceed,  what, other, yesend  ,end , buyoption,noend,ck1,ck2        FROM  teamup_work  WHERE team_id='{$id}'   ") ;  
		  if (!empty($data))  
		 	return $data[0]["teamup_work"] ;
		  else{
		  	return  array(
		  			 
		  			"proceed"=>"", 
		  			"what"=>"",  
		  			"other"=>"",  
		  			"yesend"=>"" , 
		  			"end"=>"" , 
		  			"buyoption"=>"" ,
		  			"noend"=>"", 
		  			"ck1"=>"",
		  			"ck2"=>"", 
		  			
		  	 );
		   }
		return $data ;  
 }

 
 
 
 /*
  * Save   3 step data   Work  Values Stack  
  * 
  */
 	public function saveWorkData($id ,  $data, $userid){  
		App::import ( "model", "User" ); 
		 $data2 = $this->loadWorkData($id) ;   
		 $loaded =  $this->find("first" , array("id"=>$id)); 
		 $str= "" ;
		 foreach($data as $key=>$v) {
		 	if (is_array($v))
		 		$v = array_shift($v);
		 	$str.= " {$key}='{$v}' ,";   }
		 	$str = rtrim($str,","); 
		 if (empty($data2) ||  $data2["proceed"]==""){ 
		 	 $this->query("INSERT INTO teamup_work SET  ".  $str . " ,  team_id='{$id}' ") ;   
 		 	 }else{ 
 		 	 	$user = new User() ;  
 		 	 	
 		 	 	$userload = $user->find ( "first", array (
 		 	 			"conditions" => array (
 		 	 					"id" =>  $userid 
 		 	 			)
 		 	 	) ); 
		 		 
		 		 	if ($loaded["Teamup"]["is_send"]==1){
		 		 		  		foreach ($data2 as $key=>$value){
		 		 		  				if (is_array($value))  
		 		 		  				$value =  array_shift($value) ; 
		 		 		  				if (is_array( $data[$key]))
		 		 		  					$data[$key]= array_shift( $data[$key]) ;  
		 		 		  				
		 		 						if (trim($value) != trim($data[$key])) { 
		 		 						 	$this->insertEvent ( "added", " User  {$userload["User"]["username"]}  has update value  ." . $key  .  "  to ".   $data[$key] .  " was {$value} "  , strftime ( "%Y-%m-%d %H:%M:%S", time() ), $userid, $id ,"work"   );
		 		 						 } 
		 		 				} 
		 		 	}
		 		   	$this->query("UPDATE  teamup_work SET  ".  $str . "  WHERE   team_id='{$id}' ") ;
		 } 	 
		  
	}
	
	
 
	public function getLogList($id){
		$result  = array();  
		 $rows =    $this->query("SELECT * FROM teamup_log WHERE  group_title = '{$id}'  ORDER BY time DESC     ") ;  
		   	foreach($rows as $e){ 
					$log =   new stdClass() ; 
					$e =  $e["teamup_log"] ;    
				 	 $log->text =  $e["msg"] ;  
					 $log->time =  $e["time"] ; 
					 $log->type =  $e["type"] ;  
					 $log->title =  $e["title"] ;  
				 	$result []  = $log ; 
				}  
		
		return $result  ;  
 }
	
	
	
	
	
	
	/*
	 * Validate Data From  Stack  
	  
	 */
	
 
public function validate($project_id, $data) {
	$dream = $this->query("SELECT  * FROM dream_owners WHERE project_id='{$project_id}'");  
	if (isset($dream[0]["dream_owners"]["ownership_percentage"])) {
		$per = (int)$dream[0]["dream_owners"]["ownership_percentage"];  
		$total = 0;

		foreach($data as $re) {
			if (isset($re["sharing"])) {
				$total += $re["sharing"]; 
			}
		}

		if ($per - $total <= 0) {
			return false; 
		}
	}
	return true ;  
}
	
	
	
	
	
	// Check Some Revisions 
	
	public function checkRevisions($type, $data, $userid, $id) {
		App::import ( "model", "User" );
		$user = new User ();
		$time = time ();
		$loaded =  $this->find("first" ,  array("conditions"=>array("id"=>$id))); 
		
		$userload = $user->find ( "first", array (
				"conditions" => array (
						"id" => $userid 
				) 
		) ); 
		
	 
 		if ($loaded["Teamup"]["is_send"]!=1) 
 			return ;  
 		 
		
		switch ($type) {
			
			case "stone" : 
				
				$count_in_db = $this->query ( "SELECT COUNT(*) as c FROM teamup_milestones WHERE  teamup='{$id}'  " );
				$count = ($count_in_db [0] [0] ["c"]);
				if ($count == 0) {
				 //	$this->insertEvent ( "info", " User  {$userload["User"]["username"]}  has created Milestones table.", strftime ( "%Y-%m-%d %H:%M:%S", $time ), $userid, $id );
				} else {
					
					$olddata = $this->loadMilestones ( $id );
					$last = 0;
					$newdata = array ();
					foreach ( $olddata as $d ) {
						$d = ( array ) $d;
						unset ( $d ["id"] );
						unset ( $d ["date"] );
						$newdata [] = ( array ) $d;
					}
					$submited =  false  ;  
					// foreach  milestone stack  was here 
					foreach ( $data as $index => $value ) {
						
						$index --;
					 	if (! isset ( $newdata [$index] )) {
					 		$submited =  true ;
							$this->insertEvent ( "added",   "Milestone :  {$value ["title"]}  was added. " , strftime ( "%Y-%m-%d %H:%M:%S", $time ) . ":". $userload["User"]["username"], $userid, $id , "Milestone Table"   );
							continue;
						} else {
						  	$old_record = $newdata [$index];
						 	foreach ( $value as $k => $v ) {
								 if (isset($old_record [$k]))
							 	if (trim ( $old_record [$k] ) != trim ( $v )){
							 		if ($v !="" && $k!="datetime"){
							 		$submited = true ; 
									$this->insertEvent ( "updated",   "Milestone  {$old_record ["title"]}   Field  {$k} Was : " . trim ( $old_record [$k] ) . " New  : ". $v, strftime ( "%Y-%m-%d %H:%M:%S", $time ).":".$userload["User"]["username"] , $userid, $id,  "Milestone Table"   );
									}
							 	}
						 	
						 	}
						 
						 	 
						}
						
						
					} 
					
					// Submited Changes  
				    if ($submited){ 
				    		
				    	return  400;    
				    }
					
				}
				
				break;
		 
			// Check For the terms   Logggind   :   
			case "terms" :
		
				
				
				$olddata = $this->query("SELECT * FROM  teamup_terms WHERE team_id ='{$id}' "); 
	
			 		foreach ($data["title"] as $index => $value){  
			 				$old   =  $olddata[$index]  ; 
			 			  if (!isset($old))  
			 			  	$this->insertEvent ( "added", " User  {$userload["User"]["username"]}  has added new record." . $value  . " With Value " .  $data["value"][$index], strftime ( "%Y-%m-%d %H:%M:%S", $time ), $userid, $id , "terms"  );   
			 				else{
			 					// Else Being compare    
			 					$val  =  $olddata[$index]["teamup_terms"]["title"]; 
			 				    if ($val !=$value)  
			 				  	$this->insertEvent ( "added", " User  {$userload["User"]["username"]}  has update  title " . $value  . " old value  " .  $val, strftime ( "%Y-%m-%d %H:%M:%S", $time ), $userid, $id , "terms"  ); 
			 		  			}
			 			
			 		 }  
			 		 	foreach ($data["value"] as $index => $value)
			 	 	{$old   =  $olddata[$index]  ;  
			 	 	if (isset($old)){
 						$val  =  $olddata[$index]["teamup_terms"]["value"];
			 	 		if ($val !=$value)
			 	 			$this->insertEvent ( "added", " User  {$userload["User"]["username"]}  has update  value  " . $value  . " old value  " .  $val, strftime ( "%Y-%m-%d %H:%M:%S", $time ), $userid, $id , "terms"  );
			 	 		  	}
			 			
			 		}
				
				
				
				 
				
				break;
		}
	}
	 
	
	
	/*
	 * Static  
	 * 2014 
	 */
	
	
	public static function  isUp($job_id ,$user){
		$self =  new self(); 
		$c  =$self->query("SELECT COUNT(*) as c FROM  teamup_jobs WHERE job_id='{$job_id}' AND (user_id='{$user}' OR to_user='{$user}' )  "); 
 	 
 		
 		
 		if ($c[0][0]["c"]>0)
			 return true ; 
 		return false  ; 
	}
	
	
	
	
	
	
	
	
}