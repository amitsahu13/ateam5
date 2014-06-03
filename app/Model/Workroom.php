<?php

/**
 * Page
 * PHP version 5
 * 2014 
 * @Workroom Model
 * pashkovdenis@gmail.com  
 * 
 */
App::uses ( 'CakeEmail', 'Network/Email' );


class Workroom extends AppModel {
	
	public $name = 'Workroom';
	public $useTable = 'workroom';
	public $actsAs = array (
			'Multivalidatable' 
	);
	public static $STATUS_PUBLIC = 1;
	public static $STATUS_PRIVATE = 0;
	public static $STATUS_JOB = 2;
    public static $STATUS_JOB_ACCEPT = 4;
	public $title;
	public $id;
	public $date;
	public $project_id;
	public $user_id;
	public $leader;
	public $files = array (); // list of Files For The
	public $project_image;
	public $chat = array ();
	public $leaders = array ();
	public $experts = array ();
	public $type;
	public $attach;
	public $job_id;
	public $current_user;
	public $removed_by = false;
	public $is_project = false;
	public $to_user;
	
	public   $temp_user    ; 
	


    public function getExpertsInRoom($room_id)
    {
        $userModel = new User ();


        $room = $this->find ( "first", array (
            "conditions" => array (
                "id" => $room_id
            )
        ) );

        if (!$room)

        {
            return false;
        }

        $user_id = $room['Workroom']['user_id'];

        $userModel = new User ();

        $experts = $userModel->find ( "first", array (
            "conditions" => array (
                "id" => $user_id
            )
        ) );


          $data = array($experts['User']['id'] => $experts['User']['username']);





        if ($data)
            return $data;

         else return false;
    }
	// Get Members For the Project :
	// 2014
	// pashkovdenis@gmail.com
	
	
	
	public function getMemberListForProject($project_id, $roomid = 0) {




		App::import ( "model", "User" );
		App::import ( "model", "Project" );
		App::import ( "model", "Job" );
		App::import ( "model", "Workroom" );
		
		$project_model = new Project ();
		$job_model = new Job ();
		$members = [ ];
		$userModel = new User ();
		$job_list = $job_model->find ( "all", array (
				"conditions" => array (
						"project_id" => $project_id 
				) 
		) );


		
		foreach ( $job_list as $job ) {

			$room = $this->find ( "first", array (
					"conditions" => array (
							"job_id" => $job ["Job"] ["id"] 
					) 
			) );
			$experts = $userModel->query ( "SELECT * FROM  `workroom_experts` WHERE `room_id`='{$room["Workroom"]["id"]}' AND room_id <> '{$roomid}'  " );
 			if ($room ["Workroom"] ["id"] == $roomid)
				continue;
			
			foreach ( $experts as $user ) {
				
				$user_model = new User ();
				$list = $user_model->find ( "first", array (
						"conditions" => array (
								"id" => $user ["workroom_experts"] ["expert"] 
						) 
				) );
				if (! empty ( $list ["User"] ["username"] ))
					$members [$user ["workroom_experts"] ["expert"]] = $list ["User"] ["username"];
			}









		}


		return $members;
	}






	/*
	 * Create New Workroom When Job was Created : 2014 : Work room Was Created :
	 */



    public function createforJob($user_id, $job_id, $project) {
		$this->saveAll ( array (
				"user_id" => $user_id,
				"project_id" => $project,
				"to_user" => '1',
				"type" => 2,
				"job_id" => $job_id,
				"name" => "ChatRoom",
				"leader" => $user_id,
				"date" => date ( "Y-m-d" ) 
		) );
		
		return $this->getLastInsertID ();
	}
	public function createIfnotFromProject($project_id, $leader, $name = '') {
		$list = $this->find ( "count", array (
				"conditions" => array (
						"project_id" => $project_id 
				) 
		) );
		if ($list <= 0) {
			$data = array (
					"type" => self::$STATUS_PUBLIC,
					"name" => $name,
					"date" => date ( "Y-m-d" ),
					"leader" => $leader,
					"project_id" => $project_id 
			);
			$this->saveAll ( $data );
			return true;
		}
		return false;
	}
	
	/*
	 * Latest Communications 2014 2014 first is to Select Communications From workrooms :
	 */
	public static function isChatRoom($id) {
		$self = new self ();
		$c = $self->query ( "SELECT  COUNT(*) as c FROM workroom WHERE  id='{$id}' AND  to_user<>'' " );
		if ($c [0] [0] ["c"] > 0)
			return true;
		return false;
	}
	
	// Check Is project
	public static function isProjectroom($id) {
		$self = new self ();
		$c = $self->query ( "SELECT  COUNT(*) as c FROM workroom WHERE  id='{$id}' AND  project_id<>'' AND type='1' " );
		
		if ($c [0] [0] ["c"] > 0) {
			$room = $self->query ( "SELECT project_id FROM workroom WHERE  id='{$id}' AND  project_id<>'' AND type='1' " );
			return $room [0] ["workroom"] ["project_id"];
		}
		
		return false;
	}
	public static function isJobRoom($id) {
		$self = new self ();
		$c = $self->query ( "SELECT  COUNT(*) as c FROM workroom WHERE  id='{$id}' AND  job_id<>'' " );
		if ($c [0] [0] ["c"] > 0)
			return true;
		return false;
	}
	
	
	
	
	
	
	
	
	
	
	
	
	/*
	 *  Get Data For Latest 
	 *  Workrooms And Chatrooms Dropdown List
	 *  pashkovdenis@gmail.com 2014
	   
	 */ 
	
	public function getLatestDrop($user_id , $type="chatroom") {

		App::import ( "model", "Project" );
		App::import ( "model", "Job" );
		App::import ( "model", "User" );
		
		$project_model = new Project ();
		$job_model = new Job ();
		$user_model = new User ();
	  	$this->temp_user  =  $user_id ;  
	  	
		$chat_array		 = [ ];
		$wokroom_array   = [ ];
		$result  		 = [ ];

        //Select workrooms and sort it by project and job_id;
        $experts_rooms = $this->query ( "SELECT
        workroom.*
      , projects.title as pr_title, projects.id as pr_id, jobs.id as job_id, jobs.title as job_title
        FROM  workroom
        INNER JOIN workroom_experts ON (workroom_experts.room_id = workroom.id)
        LEFT JOIN jobs ON (jobs.id = workroom.job_id)
        LEFT JOIN projects ON (projects.id = workroom.project_id)
        WHERE  (workroom_experts.expert='{$user_id}' AND workroom.active = 1 )
        OR (
        workroom.type  IN (2,4,3)  AND  (workroom.user_id='{$user_id}' OR workroom.leader='{$user_id}' ) AND workroom.active = 1
         )
        ");



        foreach ($experts_rooms as $expert_room)
        {
            $pr_id = $expert_room['workroom']['project_id'];
            $job_title = $expert_room['jobs']['job_title'];
            $wokroom_array[$pr_id]['proj_title'] = $expert_room['projects']['pr_title'];
                       $expert_room=$expert_room['workroom'];

            $job_id = $expert_room['job_id'];

            if ($job_id)
            {

                $wokroom_array[$pr_id]['jobs'][$job_id]['job_title'] = $job_title;

                if ($expert_room['type']==4)
                {
                    $wokroom_array[$pr_id]['jobs'][$job_id]['link'] ='/workrooms/workroom/'.$expert_room['id'];

                }
                else

                {
                    $wokroom_array[$pr_id]['jobs'][$job_id]['link'] ='#';
                }

                $expert_room['link']='/workrooms/workroom/'.$expert_room['id'];
                $wokroom_array[$pr_id]['jobs'][$job_id]['experts'][] = $expert_room;

            }
            else

            {
                $wokroom_array[$pr_id]['no_jobs'][] = $expert_room;
            }






        }

       $result =$wokroom_array;
        /**

         */
		//$workrooms =  $this->query ( "SELECT * FROM  workroom WHERE  type  = 2  AND  (user_id='{$user_id}' OR leader='{$user_id}' ) AND active = 1   " );

		$experts =    $this->query ( "SELECT * FROM workroom_experts WHERE expert='{$user_id}' " );





        if ($type=="chatroom"){
		  $chat_rooms = $this->query ( "SELECT * FROM  workroom WHERE  AND removed_by<>'".$user_id."' AND  (user_id='{$user_id}' OR leader='{$user_id}' or to_user='{$user_id}'  ) AND active = 1  " );
		 foreach ( $chat_rooms as $r )
			if (! empty ( $r ["workroom"] ["id"] ))
				$chat_array [] = $this->iterateRoom ( $r ["workroom"] ["id"], $user_id );
		}else{
			 
		 	$idin  = [1] ;  
		 	foreach ($experts as $e)  
		 		$idin[]  =    $e ["workroom_experts"] ["room_id"] ;  
		 	    $chat_rooms = $this->query ( "SELECT * FROM  workroom WHERE type<>0  AND active = 1  AND   (user_id='{$user_id}' OR leader='{$user_id}' or to_user='{$user_id}'  OR   id IN (".join(",",$idin).")  ) " );
		  
		 	    
			foreach ( $chat_rooms as $r )
			if (! empty ( $r ["workroom"] ["id"] ) &&  $this->getWorkroomChat( $r ["workroom"] ["id"]))
				$chat_array [] = $this->getWorkroomChat( $r ["workroom"] ["id"]);
		  
		 }
			
	     





		return [
				"chat" => $chat_array,
				"all" => $result 
		]; 
		
		
		
	}
	
	/*
	 * Iterate THrue Chat room pashkovdenis@gmail.com 2014
	 */
	private function iterateRoom($room_id, $user_id) {
		$record = new stdClass ();
		App::import ( "model", "User" );
		$user_model = new User ();
		$new_count = $this->query ( "SELECT COUNT(*) as c FROM workroom_chat WHERE room_id = '{$room_id}' AND new=1 AND user_id<> '{$user_id}'  " );
		$room = $this->find ( "first", array (
				"conditions" => array (
						"id" => $room_id 
				) 
		) );
		
		$record->new = $new_count [0] [0] ["c"]; 
 		
		$record->id = $room_id;
		$record->title = "";
		$user1 = $user_model->find ( "first", array (
				"conditions" => array (
						"User.id" => $room ["Workroom"] ["leader"] 
				) 
		) );
		
		$record->type =  $room ["Workroom"] ["type"] ; 
		
		if ($room ["Workroom"] ["to_user"] != "" && $room ["Workroom"] ["to_user"] != 0  )
			$user2 = $user_model->find ( "first", array (
					"conditions" => array (
							"User.id" => $room ["Workroom"] ["to_user"] 
					) 
			) );
		else
			$user2 = $user_model->find ( "first", array (
					"conditions" => array (
							"User.id" => $room ["Workroom"] ["user_id"] 
					) 
			) );
		
		
		
		$record->title = self::getTitle($room_id) ;
	 
		$record->link = self::getChatroomByid ( $room_id, $user_id );
		
		return $record;
	}
	
	
	/*
	 * Iterate thrue Workroom And Create Object 
	 * 2014 
	 * pashkovdenis@gmail.com 
	 * 
	 */
	
	
	
	private function iterateWorkroom($room_id , $force  =false ) {
		
		App::import ( "model", "Job" );
		App::import ( "model", "Project" );
		$project_model = new Project ();
		$record = new stdClass ();
		$job_model = new Job ();
		
		$room = $this->find ( "first", array (
				"conditions" => array (
						"id" => $room_id  
						
				) 
		) );
		
		$record->id = $room_id;
		$record->project_id =  $room["Workroom"]["project_id"];
		$record->type = $room ["Workroom"] ["type"]; 
		if ($record->type==1) 
			return false;  
		
		$new_count = $this->query ( "SELECT COUNT(*) as c FROM workroom_chat WHERE room_id = '{$room_id}' AND new=1  " );
		
		
		$record->new = $new_count[0][0]["c"];   
		
		$j = $job_model->find ( "first", array (
				"conditions" => array (
						"id" => $room ["Workroom"] ["job_id"] 
				) 
		) );
		
		if (!empty($j ["Job"] ["project_id"]))
		$record->project_id = $j ["Job"] ["project_id"];
		
		
		if (empty ( $record->project_id ) &&  $force == false )
			return false;
		
		$project = $project_model->find ( "first", array (
				"conditions" => array (
						"id" => $record->project_id 
				) 
		) );
	 
		 if ($project["Project"]["status"]== 0 )
   return false; 
		  
		if ($record->type ==2 || $record->type==4){
		
		$record->project_title = $project ["Project"] ["title"];
		$record->title =   self::getTitle($room ["Workroom"] ["id"]);
		$record->link =    self::getJob ( $room ["Workroom"] ["job_id"] );


             if  ($record->title == "@")
                    return false;



		 /*
		  * 
		  * Select Sub Workrooms  For  private chats   Under Jobs :   
		  * 
		  * 
		  */
	     $private =   $this->query("SELECT COUNT(*) as c  FROM  workroom  WHERE  job_private = 1  AND job_id  = '{$j ["Job"] ["id"]}' ");  
	      if ($private[0][0]["c"]>0){
	       		$rooms  =  $this->find("all" ,  ["conditions"=>["job_private"=>1, "job_id"=>$j ["Job"] ["id"]]] ); 
	      		$rom=  [] ;  
	      		foreach($rooms as $r){	   
	      			   	if ($this->temp_user != $r["Workroom"]["leader"]  )
	      					$rom []  =   $this->iterateRoom($r["Workroom"]["id"],  $r["Workroom"]["to_user"] );
	      			 	else
	      			 		$rom []  =   $this->iterateRoom($r["Workroom"]["id"],  $r["Workroom"]["leader"] ); 
	      			 	
	      			      			
	      		}
	      	     //  Add to array Resutl  :   
	      		$record->private_job  =  $rom  ; 
	      		
	      }
		
		
		
		}else{
			
			$record->project_title =  $project ["Project"] ["title"];
			$record->title =    $record->project_title;
			$record->link =  self::getProject($record->project_id) ;
			
		}
		 
		
		
		
		
		
		
		
	 
		return $record;
	}
	
	
	
	/*
	 * Get Chat From Workroom   
	 * pashkovdenis@gmail.com 
	 * 2014  
	 */ 
	
	private function getWorkroomChat($room_id){  
		
		$rec = new stdClass() ;  
		$rec->id  =   $room_id;  
		$rec->new =  0 ;  
		$rec->title = ""; 
		$rec->link  = "";   
		$c =  $this->query("SELECT COUNT(*) as c FROM  workroom_chat WHERE room_id='{$room_id}'  AND new=1"); 
	 	if ($c[0][0]["c"]>0) 
 			 return $this->iterateWorkroom($room_id, true); 
 			 else
 		 return false ; 
 	 
	}
	
	
	
	
	
	
	
	/*
	 * Get Latest ChatRoom   
	 * pashkovdenis@gmail.com 
	 * 2014  
	 * 
	 */ 
	
	
	public function getLatestChatRoom($user_id) {
		$id = null; 
		$ids =  [1];

		$chat_rooms  =   $this->query("SELECT * FROM  workroom  WHERE  type=0 AND removed_by<>'{$user_id}'   AND (user_id='{$user_id}' OR leader='{$user_id}' OR  to_user='{$user_id}' )  "); 
		
		foreach($chat_rooms as $r){  
			$model  = new Workroom()  ;
			$c=  $model->query("SELECT COUNT(*) as c FROM  workroom_hidden WHERE room='{$r["workroom"]["id"]}'  AND user='{$user_id}'  ");
			if ($c[0][0]["c"]<=0)			
			$ids[] =   $r["workroom"]["id"] ;   
			
		}
		
		
		 $chats = $this->query ( "SELECT * FROM workroom_chat WHERE   room_id IN (".join(",",$ids).") ORDER  BY id DESC LIMIT 1  " ); 
		 if (!empty($chats[0]["workroom_chat"]["room_id"])) 
			$id  =  $chats[0]["workroom_chat"]["room_id"];  
	 	
		 if ($id) 
  			  $id =  self::getChatroomByid(  $id ,  $user_id) ;  
		  return $id;
	}
	
	/*
	 * Get Latest Workroom : pashkovdenis@gmail.com 2014
	 */
	public function getLatestWorkRoom($user_id) {
		$id = null;
		 $ids =  [1]; 
		 $experts2 = $this->query ( "SELECT *  FROM workroom_experts  WHERE    expert='{$user_id}' ORDER BY room_id DESC   " );
		  
		  
		  foreach ( $experts2 as $ex ) {
		  	$model  = new Workroom()  ;
		  	$c=  $model->query("SELECT COUNT(*) as c FROM  workroom_hidden WHERE room='{$ex ["workroom_experts"] ["room_id"]}'  AND user='{$user_id}'  ");
		  	if ($c[0][0]["c"]<=0)
		  		  $ids[]  = ( $ex ["workroom_experts"] ["room_id"] );
		  }
		  
		  
		$latest = $this->query ( "SELECT * FROM  workroom WHERE   (type=1 OR type=2) AND ( (user_id='{$user_id}' OR  to_user='{$user_id}' or leader='{$user_id}')  OR  id IN (".join(",",$ids).")  )  ORDER by id DESC LIMIT 1  " );
		if ( isset($latest [0]) &&  $latest [0] ["workroom"] ["type"] != "") {
			if ($latest [0] ["workroom"] ["type"] == 2)
				$id = SITE_URL . "/workrooms/workroom/" . $latest [0] ["workroom"] ["id"];
			else
				$id = SITE_URL . "/workrooms/projecto/" . $latest [0] ["workroom"] ["project_id"];
		}
		
		
		
		
		return $id;
	}
	
	/*
	 * Create Private Workroom 2014 : pashkovdenis@gmail.com
	 */
	public function createPrivate($user, $to_user, $job = "",   $job_private =0 ) {
		App::import ( "model", "Project" );
		App::import ( "model", "User" );
		$userModel = new User ();
		$userloaded = $userModel->find ( "first", array (
				"conditions" => array (
						"id" => $user 
				) 
		) );
		
		$count = $this->find ( "count", array (
				"conditions" => array (
						"private" => 1,
						"user_id" => $user,
						"to_user" => $to_user,
						"job_id" => $job ,
						"job_private"=>$job_private, 
				) 
		) );
		
		$count2 = $this->find ( "count", array (
				"conditions" => array (
						"private" => 1,
						"user_id" => $to_user,
						"to_user" => $user,
						"job_id" => $job , 
						"job_private"=>$job_private, 
				) 
		) );
		
		$id = null;
		//if ($count <= 0 && $count2 <= 0 && ($userloaded ["User"] ["role_id"] == 3 || $userloaded ["User"] ["role_id"] == 5)) {
			
		if ($count <= 0 && $count2 <= 0  ) {
			$this->saveAll ( array (
					"user_id" => $user,
					"project_id" => "0",
					"private" => 1,
					"to_user" => $to_user,
					"job_id" => $job,
					"name" => "ChatRoom",
					"type" => self::$STATUS_PRIVATE,
					"leader" => $user,
					"date" => date ( "Y-m-d" ) , 
					"job_private"=>$job_private
			) );
			$id = $this->getLastInsertID ();
			
			
			
		} else {
			
			if ($count > 0)
				$w = $this->find ( "first", array (
						"conditions" => array (
								"private" => 1,
								"user_id" => $user,
								"job_id" => $job,
								"to_user" => $to_user 
						) 
				) );
			
			if ($count2 > 0)
				$w = $this->find ( "first", array (
						"conditions" => array (
								"private" => 1,
								"job_id" => $job,
								"user_id" => $to_user,
								"to_user" => $user 
						) 
				) );
			
		 
			$id = $w ["Workroom"] ["id"];
		}
		
		return $id;
	}
	
	
	
	
	
	/*  Apply job model Insert 
    	Also  insert into  Project Workroom   
		pashkovdenis@gmail.com   
	 */  
	  
	public function applyJob($project_id, $user_id, $job = 0) { 
		
		
		App::import ( "model", "Project" );
		App::import ( "model", "User" );
		App::import ( "model", "Job" );
		$job_model = new Job ();
		$job_id  =  $job  ; 
		 
		$user = new User ();
		
		$project = new Project ();
		$row = $project->find ( "first", array (
				"conditions" => array (
						"id" => $project_id 
				) 
		) );
		$username = $user->find ( "first", array (
				"conditions" => array (
						"id" => $user_id 
				) 
		) );

        /**
		$count = $this->find ( "count", array (
				"conditions" => array (
						"project_id" => $project_id,
						"user_id" => $user_id,
						"job_id" => $job,
						"type" => self::$STATUS_PRIVATE 
				) 
		) ); 
		**/
		
		//if ($count <= 0)
        //create new workroom for each candidate
        {


            $jobId = $job;

            $job = $job_model->find ( "first", array (
                "conditions" => array (
                    "id" => $jobId
                )
            ) );

             $this->saveAll ( array (
					"user_id" => $user_id,
					"project_id" => $project_id,
					"name" => $username ["User"] ["username"]. ' application for '. $job["Job"]["title"]. "@".  $row["Project"]["title"],
					"type" => self::$STATUS_JOB,
					"leader" => $row ["Project"] ["user_id"],
					"date" => date ( "Y-m-d" ),
					"job_id" => $jobId
			) );

            $workroomid = $this->getLastInsertID();



            $this->query ( "INSERT INTO workroom_experts SET room_id='{$workroomid}' ,  expert='{$user_id}'" );
            $this->query ( "INSERT INTO workroom_hidden SET room='{$workroomid}' ,  user='{$user_id}' " );

        }
	 

				
		
		//  Also    insert into  Project Workroom  :  
		//$project = $this->find("first", array("conditions"=>array("type"=>1,  "project_id"=>$project_id))) ;
		//    this->query:
        //Uncomment this, if candidates need access to project room
		//$this->query ( "INSERT INTO workroom_experts SET room_id='{$project["Workroom"]["id"]}' ,  expert='{$user_id}'" );
		//$this->query ( "INSERT INTO workroom_hidden SET  room='{$project["Workroom"]["id"]}' ,  user='{$user_id}' " );


        //Now we don't need chatroom
        /**
		//  Make Chat room  With Leader  :   
		if ($row ["Project"] ["user_id"]  &&  $user_id   !=  $row ["Project"] ["user_id"]  ){
			 $this->createPrivate($user_id, $row ["Project"] ["user_id"], $job_id ,  1)  ; 
		 } 
		**/
	}
	 
	
	
	
	
	 /*
	  * User access  Goes here ?   
	  */
	public function hasAccess($project, $user = false) {
		App::import ( "model", "JobBid" );
		App::import ( "model", "Project" );

        $ex = $this->query ( "SELECT  COUNT(*) as c FROM  workroom_experts WHERE  room_id='{$this->id}' AND expert='{$user}'  " );

        if (array_key_exists($user,$this->experts))
            return true ;


        if ($ex [0] [0] ["c"] == 1)
			return true;
		
		$pro = new Project ();
		if ($pro->find ( "count", array (
				"conditions" => array (
						"id" => $project,
						"user_id" => $user 
				) 
		) ) > 0)
			return true;
		
		if ($this->find ( "count", array (
				"conditions" => array (
						"project_id" => $project,
						"type" => self::$STATUS_PUBLIC 
				) 
		) ) <= 0)
			return false;
		
		if ($user) {
			$bid = new JobBid ();
			$c = $bid->find ( "count", array (
					"conditions" => array (
							"project_id" => $project,
							"user_id" => $user 
					) 
			) );
			if ($c <= 0)
				return false;
		}
		
		return true;
	}
	
	// Check for
	public function existsWorkroom($id) {
		if ($this->find ( "count", array (
				"conditions" => array (
						"id" => $id 
				) 
		) ) > 0)
			return true;
		
		return false;
	}
	
	// user has no access From Public
	public function hasUserAccess($project_id, $user) {


		if (! $this->getWorkRoom ( $project_id ))
			return false;

		if ($this->leader == $user)
			return true;



		if (! $this->hasAccess ( $project_id, $user )) {

			App::import ( "model", "JobBid" );
			$bid = new JobBid ();
			$c = $bid->find ( "count", array (
					"conditions" => array (
							"project_id" => $project_id,
							"user_id" => $user 
					) 
			) );
			
			if ($c <= 0) {
				
				return false;
				echo "Has Access ";
				if ($this->find ( "count", array (
						"conditions" => array (
								"leader" => $user 
						) 
				) ) > 0)
					return true;
			}
			
			if ($c > 0)
				return true;
			else
				return false;
		}
		
		return true;
	}
	
	// Get Work Room By id :
	public function getWorkRoom($project) {
		$id = $this->find ( "first", array (
				"conditions" => array (
						"project_id" => $project 
				) 
		) );
		
		if (empty ( $id ["Workroom"] ["id"] ))
			$id = $this->find ( "first", array (
					"conditions" => array (
							"id" => $project 
					) 
			) );
		
		return ($id ["Workroom"] ["id"]);
	}
	
	// Get User Image
	public function getUserimage($user_id) {
	}
	
	/*
	 * Load Single Chat Work Room 2014
	 */
	public function loadWorkRoom($id) {
		App::import ( "model", "Project" );
		App::import ( "model", "User" );
		App::import ( "model", "JobBid" );
		App::import("model","Job");

		$project = new Project ();
		$loaded = $this->find ( "first", array (
				"conditions" => array (
						"id" => $id 
				) 
		) );
		
		$this->date = $loaded ["Workroom"] ["date"];
		$load_project = $project->find ( "first", array (
				"conditions" => array (
						"id" => $loaded ["Workroom"] ["project_id"] 
				) 
		) );
		
		$this->title = $loaded ["Workroom"] ["name"];
		
		if (empty ( $this->title ))
			$this->title = "Job@" . $load_project ["Project"] ["title"];
		
		$this->project_id = $loaded ["Workroom"] ["project_id"];
		$this->job_id = $loaded ["Workroom"] ["job_id"];
		
		if ($loaded ["Workroom"] ["removed_by"] != 0)
			$this->removed_by = $loaded ["Workroom"] ["removed_by"];
		
		$this->type = $loaded ["Workroom"] ["type"];
		if (! empty ( $load_project ["Project"] ["user_id"] ))
			$this->leader = $load_project ["Project"] ["user_id"];
		else
			$this->leader = $loaded ["Workroom"] ["leader"];
		
		$this->project_image = $load_project ["Project"] ["project_image"];
		$this->to_user = $loaded ["Workroom"] ["to_user"];
		$this->id = $id;
		
		$files = $this->query ( "SELECT * FROM workroom_files WHERE work_room ='{$this->id}' " );
		
		foreach ( $files as $file ) {
			
			$f = new stdClass ();
			$f->name = $file ["workroom_files"] ["file"];
			$f->date = $file ["workroom_files"] ["date"];
			$f->id = $file ["workroom_files"] ["id"];
			$this->files [] = $f;
		}
		$this->chat = $this->loadChat ( null );
		
		//
		$user = new User ();
		$bid = new JobBid ();
		
		$leader = $user->find ( "first", array (
				"conditions" => array (
						"id" => $this->leader 
				) 
		) );
		$this->leaders [$this->leader] = ($leader ["User"] ["username"]);
		
		$bids = $bid->find ( "all", array (
				"conditions" => array (
						"project_id" => $this->project_id 
				) 
		) );



		if ($this->type == 1 && $this->is_project == false) {
		} else {

	       // Project Workroom Should contina onnly
           $job_model =  new Job() ;
           $jobs =   $job_model->find("all", ["conditions"=>["project_id"=>$this->project_id]]);
           $ids =  [1]  ;

            foreach($jobs as $j){
                $ids  [] =   $j["Job"]["id"] ;
            }

			$lsit = $this->query ( "SELECT to_user FROM teamup_jobs WHERE job_id IN (".join(',',$ids).")" );
			
			foreach ( $lsit as $b ) {
				
				$username = $user->find ( "first", array (
						"conditions" => array (
								"id" => $b ["teamup_jobs"] ["to_user"]
						) 
				) );
				$this->experts [$b ["teamup_jobs"] ["to_user"]] = $username ["User"] ["username"];
			}
		}
        return $this;
	}
	
	// Auto Break ;
	private function substr($strin, $limit) {
		$str = "";
		$c = 0;
		for($x = 0; $x <= strlen ( $strin ); $x ++) {
			@$str .= $strin [$x];
			$c ++;
			if ($c >= $limit) {
				$str .= "<br>";
				$c = 0;
			}
		}
		return $str;
	}
	
	
	 /*
	  * Load Chat For Work room   
	  * 
	  */
	public function loadChat($lastid = null) {
		App::import ( "model", "User" );
		$user_model = new User ();
	 	$sql = "SELECT * FROM workroom_chat WHERE  room_id='{$this->id}' ";
		if ($lastid != null && $lastid != "")
			$sql .= " AND id <" . $lastid;
		$result = $this->query ( $sql . " ORDER BY id DESC LIMIT 20 " );
		$chat = array ();
		foreach ( $result as $c ) {
			$chat_en = new stdClass ();
			$chat_en->text = $this->substr ( $c ["workroom_chat"] ["text"], 50 );
			$chat_en->ago = $this->time_elapsed_string ( $c ["workroom_chat"] ["timestamp"] );
			$chat_en->file = $c ["workroom_chat"] ["attachment"];
            // Load Attachment to that record   :


            $files = $this->query("SELECT * FROM workroom_files WHERE record_id = '".$c ["workroom_chat"]["id"]."' ");
             if (count($files)){
                $chat_en->file  .= "
                <p class='attachmentcount'>  Attachment: ".count($files)."</p>
                <ul class='attachmnent'> " ;
                    foreach($files as $f)
                         $chat_en->file  .= "<li> <a href='javascript:void(0)' class='download'  rel='{$f["workroom_files"]["id"]}' > ".$f["workroom_files"]["file"]."  </a>   </li>"  ;
                     $chat_en->file  .= "</ul>    " ;
             }

            $chat_en->attach_id = $c ["workroom_chat"] ["attach_id"];
			$user_id = $c ["workroom_chat"] ["user_id"];
			$username = $user_model->find ( "first", array (
					"conditions" => array (
							"id" => $user_id 
					) 
			) );
			$chat_en->user = "<a href='/users//user_public_view/{$user_id}' > {$username["User"]["username"]}  </a> ";
			$chat_en->id = $c ["workroom_chat"] ["id"];
			$chat [] = $chat_en;
            	$uid = CakeSession::read("Auth.User.id");
		    //$this->query ( "UPDATE workroom_chat  SET new='0' WHERE id = '{$c ["workroom_chat"]["id"]}'  ANd user_id<> '{$uid}'   " );
		}
 		// update
		 return $chat;
	}
	
	
	/*
	 * Emthod For   Time Elapsed  
	 * 2014 
	 * pashkovdenis@gmail.com 
	 * 
	 */
	private function time_elapsed_string($ptime) {
		$etime = time () - $ptime;
		
		if ($etime < 1) {
			return '0 seconds';
		}
		
		$a = array (
				12 * 30 * 24 * 60 * 60 => 'year',
				30 * 24 * 60 * 60 => 'month',
				24 * 60 * 60 => 'day',
				60 * 60 => 'hour',
				60 => 'minute',
				1 => 'second' 
		);
		
		foreach ( $a as $secs => $str ) {
			$d = $etime / $secs;
			if ($d >= 1) {
				$r = round ( $d );
				return $r . ' ' . $str . ($r > 1 ? 's' : '') . ' ago';
			}
		}
	}
	
	
	
	
	
	/*
	 * Return  Workroom  type 
	 *  
	 */
	
	private function  getType($id){
		$room  =  $this->find("first",  array("conditions"=>array("id"=>$id))) ;
		return $room["Workroom"]["type"];
	}
	
	 
	
	
	/*
	 * Post a Chat 2014   
	 * pashkovdenis@gmail.com   
	 * This method will insert new Chat message    
	 * 
	 */
	

    public function postchat($user, $text, $ata = '', $usercurrent = '') {

        $text =   nl2br($text) ;

		$attachment = "";
		$attach_id = "";
        $this->attach = $ata;

		// attach
		if ($this->attach != "") {
			$result = $this->query ( "SELECT file FROM  workroom_files WHERE  id ='{$this->attach}'    " );
			$fie = $result [0] ["workroom_files"] ["file"];
			$attachment = $fie;
			$attach_id = $this->attach;
		}
		
		if ($text && $this->id && $user)
			$this->query ( "INSERT INTO workroom_chat  SET text='{$text}' ,  user_id='{$user}', room_id='{$this->id}', timestamp='" . time () . "' ,  attachment='{$attachment}',  attach_id='{$attach_id}'  ,new='1' " );
		$experts2 = $this->query ( "SELECT  *  FROM workroom_experts  WHERE room_id ='{$this->id}' AND  expert<>'{$usercurrent}'   " );

		foreach ( $experts2 as $ex ) {
			
			if ($usercurrent != $ex ["workroom_experts"] ["expert"]) 
			$this->increaselog ( $ex ["workroom_experts"] ["expert"], $this->getType($this->id) );  
			
		}
		
	 	$to_user = $this->find ( "first", array (
				"conditions" => array (
						"id" => $this->id 
				) 
		) );

        // Insert files if exists :
        $files = $this->query("SELECT * FROM workroom_chat_files WHERE room_id='{$this->id}' AND record='0'  ");
        $record_id  =  $this->query("SELECT id FROM  workroom_chat ORDER BY id DESC LIMIT 1") ;
        $record_id  =  $record_id[0]["workroom_chat"]["id"];



        foreach($files as $f){

            $this->uploadFile($f["workroom_chat_files"]["attach"], $user , $this->id , $record_id) ;
            $this->query("DELETE FROM workroom_chat_files WHERE id  = '".$f["workroom_chat_files"]["id"]."' ");

         }


		if ($usercurrent != $to_user ["Workroom"] ["leader"])
			$this->increaselog ( $to_user ["Workroom"] ["leader"] , $this->getType($this->id) );
		if ($to_user ["Workroom"] ["to_user"] != $usercurrent)
			$this->increaselog ( $to_user ["Workroom"] ["to_user"] ,$this->getType($this->id) );
		$this->query ( "UPDATE workroom SET timestamp ='" . time () . "' WHERE id = '{$this->id}'  " );
	}
	
	
	
	
	/*
	 *  Increase Chat Log
	 *  counter For Server stack : 2013
	 *  pashkovdenis@gmail.com   
	 *  
	 */ 
	
	
	
	private function increaselog($user ,$room=5) { 
		  $c = $this->query ( "SELECT COUNT(*) as c  FROM chat_logs WHERE user_id='{$user}' " );
		   if ($c [0] [0] ["c"] == 0)
	    	$this->query ( "INSERT INTO chat_logs SET user_id='{$user}'  ,  count='1' , room_type='{$room}'  " );
		   else
			$this->query ( "UPDATE chat_logs SET count=count+1 WHERE  user_id='{$user}'  AND room_type='{$room}' " );
		return $this;   
	
	}
	
	
	public function downloadFile($id) {
		$result = $this->query ( "SELECT file FROM  workroom_files WHERE  id ='{$id}'    " );
		
		return $result [0] ["workroom_files"] ["file"];
	}



    // uploadFile :
	public function uploadFile($file, $user, $room,  $record_id =  null ) {
		$this->query ( "INSERT INTO workroom_files SET work_room='{$room}' , file='{$file}' ,  user_id='{$user}' , date='" . date ( "Y-m-d H:i" ) . "' , record_id='{$record_id}'  " );
		$at = $this->query ( "SELECT id FROM workroom_files ORDER BY ID DESC LIMIT 1 " );
		$this->attach = $at [0] ["workroom_files"] ["id"];
	}
	
	// hide
	public static function isHidden($user, $room) {
		$model = new self ();
		$c = $model->query ( "SELECT COUNT(*) as c FROM workroom_hidden WHERE room='{$room}' AND user='{$user}'  " );
		
		if ($c [0] [0] ["c"] > 0)
			return true;
		return false;
	}
	
	// Get Number of Messages
	public static function getMCount($room) {
		$model = new self ();
		$count = $model->query ( "SELECT COUNT(*) as c FROM workroom_chat WHERE room_id='{$room}' " );
		return $count [0] [0] ["c"];
	}
	
	
	
	// Assign new Expert to   workroom 
	public function addNewExpert($user_id, $workroom, $project_id = '') {
		App::import ( "model", "User" );
		App::import ( "model", "SystemInbox" );
		App::import("model", "JobBid");   
		$bid  =   new JobBid()  ;  
		$user_model = new User ();
		$c = $this->query ( "SELECT COUNT(*) as c FROM workroom_experts WHERE expert='{$user_id}' AND room_id='{$workroom}'  " );


		$room    = $this->find("first",  array("conditions"=>array("id"=>$workroom))) ;  
		  
		
		$this->query ( "INSERT INTO workroom_experts SET room_id='{$workroom}' ,  expert='{$user_id}'" );
		$to_user = $user_model->find ( "first", array (
				"conditions" => array (
						"id" => $user_id 
				) 
		) );




		$bid->saveAll([
					"user_id"=>$user_id,
				 	"project_id"=>$project_id,
					"job_id" => $room["Workroom"]["job_id"],
					"status"=>1,
		]) ;




		
		// Insert Into System Messe
		$text = LEADER_ADDED_YOU_WORKROOM;
		$text = str_replace ( "{username}", $to_user ["User"] ["username"], $text );
		$text = str_replace ( "{workroom}",  self::getTitle($room["Workroom"]["id"]), $text );
		$raw = $this->find ( "first", array (
				"conditions" => array (
						"id" => $workroom 
				) 
		) );
		
		 
		// Set Job Id :
		SystemInbox::insert ( $user_id, $text, $raw ["Workroom"] ["job_id"], $project_id );
		$email = new CakeEmail ( 'gmail' );
		$email->template ( 'default', "default" );
		$email->emailFormat ( 'html' );
		$email->from ( SITE_EMAIL );
		$email->to ( $to_user ["User"] ["email"] );
		$email->subject ( "Workroom member" );
		$email->send ( $text );
	}
	
	
	
	
	 /*
	  * Mark as Removed   Workroom  so other user 
	  * will see popup to leave   workroom  
	  * 2014   
	  */
	public function markChatroomRemoved($user_id, $room_id) {
		App::import ( "model", "User" );
		App::import ( "model", "Job" );
		App::import ( "model", "Project" );
		App::import ( "model", "SystemInbox" );
		
		$job_model = new Job ();
		$project_model = new Project ();
		$row = $this->find ( "first", array (
				"conditions" => array (
						"id" => $room_id 
				) 
		) );
		$c = $this->query ( "SELECT COUNT(*) as c FROM workroom WHERE id='{$room_id}' AND (leader='{$user_id}' OR user_id='{$user_id}' OR to_user='{$user_id}')  " );
		
		if ($c [0] [0] ["c"] > 0) {
			
			// Workroom :
			
			if ($row ["Workroom"] ["removed_by"] == 0 || $row ["Workroom"] ["removed_by"] == $user_id) {
				
				$text = REMOVE_CHAT_ROOM_REQUEST;
				$this->query ( "UPDATE workroom SET removed_by='{$user_id}'  WHERE id='{$room_id}'  " );
				$room = $this->find ( "first", array (
						"conditions" => array (
								"id" => $room_id 
						) 
				) );
				$other_user = null;
				
				 //  Select User   :   
				 
				
				
				if ($room ["Workroom"] ["leader"] != $user_id)
					$other_user = $room ["Workroom"] ["leader"];
					 else 
				if ($room ["Workroom"] ["to_user"] != $user_id && $room ["Workroom"] ["to_user"] != 0 && $room ["Workroom"] ["to_user"] != 1)
					$other_user = $room ["Workroom"] ["to_user"];
				     else 
				    $other_user = $room ["Workroom"] ["user_id"]; 
				
				
				
				$user = (new User ())->find ( "first", array (
						"conditions" => array (
								"User.id" => $other_user 
						) 
				) );
				$leader = (new User ())->find ( "first", array (
						"conditions" => array (
								"User.id" => $user_id 
						) 
				) );
			 
				$text = str_replace ( "{user}",     $user ["User"] ["username"], $text );
				$text = str_replace ( "{username}", $user["User"] ["username"], $text ); 
				$text = str_replace ( "{leader}",   $leader ["User"] ["username"], $text );
				$text = str_replace ( "{room}",    self::getTitle($room ["Workroom"]["id"]), $text );
				 
				$raw =  $room;
				
				
				
				if ($raw ["Workroom"] ["private"] == 0 && $raw ["Workroom"] ["job_id"] != "" || $raw ["Workroom"] ["project_id"] == "") {
					$job = $job_model->find ( "first", array (
							"conditions" => array (
									"id" => $raw ["Workroom"] ["job_id"] 
							) 
					) );
					$project = $project_model->find ( "first", array (
							"conditions" => array (
									"id" => $raw ["Workroom"] ["project_id"] 
							) 
					) );
					$title = $job ["Job"] ["title"] . "@" . $project ["Project"] ["title"];
				} else {
					$project = $project_model->find ( "first", array (
							"conditions" => array (
									"id" => $raw ["Workroom"] ["project_id"] 
							) 
					) );
					$title = $project ["Project"] ["title"];
				}
				
 				
				// Send Messages to Users :
				SystemInbox::insert ( $other_user, "<a href='".SITE_URL."workrooms/chatroom/{$user_id}/{$raw ["Workroom"]["id"]}' >  "  . $text  . "</a> " );
				
				$email = new CakeEmail ( 'gmail' );
				$email->template ( 'default', "default" );
				$email->emailFormat ( 'html' );
				$email->from ( SITE_EMAIL );
				$email->to ( $user ["User"] ["email"] );
				$email->subject ( "Workroom Removed" );
				$email->send ( $text );
			} else {
				 // Else Totaty REmoved  Room  
				$text = REMOVE_CHAT_ROOM_REQUEST2;
				$room = $this->find ( "first", array (
						"conditions" => array (
								"id" => $room_id
						)
				) ); 
				
				
				$other_user = null;
					
				if ($room ["Workroom"] ["leader"] != $user_id)
					$other_user = $room ["Workroom"] ["leader"];
				else
				if ($room ["Workroom"] ["to_user"] != $user_id && $room ["Workroom"] ["to_user"] != 0 && $room ["Workroom"] ["to_user"] != 1)
					$other_user = $room ["Workroom"] ["to_user"];
				else
					$other_user = $room ["Workroom"] ["user_id"];
				
				
				
				$user = (new User ())->find ( "first", array (
						"conditions" => array (
								"User.id" => $other_user
						)
				) );
				
				$leader = (new User ())->find ( "first", array (
						"conditions" => array (
								"User.id" => $user_id
						)
				) );
				
			 
				 /*
				  * 2014   
				  * pashkovdenis@gmail.com   
				  */
				
				$text = str_replace ( "{user}",     $user ["User"] ["username"], $text );
				$text = str_replace ( "{username}", $user["User"] ["username"], $text );
				$text = str_replace ( "{leader}",   $leader ["User"] ["username"], $text );
				$raw =  $room;
				
				
				
 					$job = $job_model->find ( "first", array (
							"conditions" => array (
									"id" => $raw ["Workroom"] ["job_id"]
							)
					) );
					$project = $project_model->find ( "first", array (
							"conditions" => array (
									"id" => $raw ["Workroom"] ["project_id"]
							)
					) ); 
					

					 
					$text = str_replace ( "{room}", self::getTitle($raw ["Workroom"]["id"]), $text );
					SystemInbox::insert ( $other_user,  $text  );
					// Was Removed By Another user :
					$this->query ( "DELETE FROM workroom WHERE id='{$room_id}' " );
					$this->query ( "DELETE FROM workroom_chat WHERE room_id='{$room_id}' " );
					$this->query ( "DELETE FROM workroom_files WHERE work_room='{$room_id}' " );
					// Also  Send Notification  So Everything is Fine .
				    $email = new CakeEmail ( 'gmail' );
					$email->template ( 'default', "default" );
					$email->emailFormat ( 'html' );
					$email->from ( SITE_EMAIL );
				    $email->to ( $user ["User"] ["email"] );
					$email->subject ( "Workroom Removed" );
					$email->send ( $text );
				

			}
			return true;
		}
		return false;
	}
	
	/*
	 * Static Methods Begin Here : pashkovdenis@gmail.com 2014
	 */
	public static function isJobClosed($job_id, $user_id) {
		App::import ( "model", "Job" );
		App::import ( "model", "Teamup" );
		$teamup_model = new Teamup ();
		$job_model = new Job ();
		$self = new self ();
		
		$t_id = $teamup_model->query ( "SELECT * FROM teamup_jobs WHERE job_id='{$job_id}' AND (user_id='{$user_id}' OR to_user='{$user_id}' ) " );
		
		if (empty ( $t_id [0] ["teamup_jobs"] ["id"] ))
			return false;
		
		$count_of_all = $teamup_model->query ( "SELECT COUNT(*) as c  FROM teamup_milestones WHERE teamup='{$t_id[0]["teamup_jobs"]["id"]}'  " );
		$count_of_closed = $teamup_model->query ( "SELECT COUNT(*) as c FROM teamup_milestones WHERE teamup='{$t_id[0]["teamup_jobs"]["id"]}' AND closed='1'  " );
		
		if (($count_of_all [0] [0] ["c"] > 0) && $count_of_all [0] [0] ["c"] == $count_of_closed [0] [0] ["c"])
			return 5;
		
		return false;
	}


    public function getChatroomWhith($user_id,$visitor_id)
    {
        $user_id = (int) $user_id;
        $visitor_id = (int) $visitor_id;
        $workroom = false;
        $query = "SELECT id  FROM workroom WHERE (leader IN (".$user_id.", ".$visitor_id.")) AND (user_id  IN (".$user_id.", ".$visitor_id.")) AND (to_user IN (".$user_id.", ".$visitor_id.")) AND (project_id = 0)";

      $workroom = $this->query ( $query );
        if($workroom)
        {
            $workroom = $workroom[0]['workroom']['id'];
        }
       return ($workroom);

    }
	
	
	
	/*
	 * Retriave Links to Projeects : pashkovdenis@gmail.com 2014
	 * If in some case there is no  Workroom  for   that   Jo
	 * just   return String  or false     on  error  ;
	 * 
	 */
	public static function getJob($job_id, $id = false, $candidate_id = null ) {
		App::import ( "model", "Workroom" );
		$workroom = new Workroom ();
		$self = new self ();
        $conditions = array (

            "job_id" => $job_id
        );
        if ($candidate_id)
        {
            //var_dump($candidate_id);
            $conditions['user_id']=$candidate_id;
        }


		$room = $workroom->find ( "first", array (
				"conditions" => $conditions,
                'order' => 'type DESC '
		) ); 

		if ($id &&  isset($room ["Workroom"] ["id"] ) )
			return $room ["Workroom"] ["id"]  ;
		
		if (isset ( $room ["Workroom"] ["id"] ) && $room ["Workroom"] ["id"] != "")
			return SITE_URL . "workrooms/workroom/" . $room ["Workroom"] ["id"];
		else
		return false  ;
	}

    public static function getJobWorkRoom($job_id, $id = false ) {

        $jobModel = new Job;
        $job = $jobModel->find ( "first", array (
            "conditions" => array (

                "id" => $job_id
            ),


        ) );

        if ($id &&  isset($job ["Job"] ["work_room"] ) )
            return $job ["Job"] ["work_room"]  ;

        if (isset ( $job  ["Job"] ["work_room"] ) && $job ["Job"] ["work_room"] != "")
            return SITE_URL . "workrooms/workroom/" . $job ["Job"] ["work_room"];
        else
            return false  ;

    }


    public static function getJobWhenAccept( $job_id,$user_id)
    {
        $workroom = new Workroom ();
        $room = $workroom->find ( "first", array (
            "conditions" => array (
                "type" => 4,
                "job_id" => $job_id,
                "user_id" =>$user_id
            ),
            "orderby" => "id DESC"
        ) );
        if ($room)
        {
            return $room['Workroom']['id'];
        }

        return false;
    }
	
	// GEt  Count  
	
	public static function getMessageCount($id){
		$self =new self() ;  
		$c = $self->query("SELECT COUNT(*) as c FROM workroom_chat WHERE room_id = '{$id}' ");  
 
		
		return $c[0][0]["c"] ;  
		
	}
	
	
	public static function getProject($project_id) {
		App::import ( "model", "Workroom" );
		$workroom = new Workroom ();
		$self = new self ();
		$room = $workroom->find ( "first", array (
				"conditions" => array (
						"type" => 1,
						"project_id" => $project_id 
				),
				"orderby" => "id DESC" 
		) );
		if (isset ( $room ["Workroom"] ["id"] ) && $room ["Workroom"] ["id"] != "")
			return SITE_URL . "workrooms/projecto/" . $project_id;
	}  
	
	
	// Get Chatroom 
	public static function getChatroom($user_id) {
		App::import ( "model", "Workroom" );
		$workroom = new Workroom ();
		$self = new self ();
		$w = $workroom->query ( "SELECT * FROM workroom WHERE type=0   AND  (user_id ='{$user_id}' OR leader='{$user_id}') ORDER BY id DESC   " );
		if ($w [0] ["workroom"] ["id"])
			if ($w [0] ["workroom"] ["leader"] != $user_id)
				return SITE_URL . "workrooms/chatroom/" . $w [0] ["workroom"] ["user_id"] . "/" . $w [0] ["workroom"] ["id"];
			else
				return SITE_URL . "workrooms/chatroom/" . $w [0] ["workroom"] ["leader"] . "/" . $w [0] ["workroom"] ["id"];
	}
	
	
	/*
	 * get chat room  Stack   From  :  
	 * 2014 :  
	 * pashkovdenis@gmail.com 
	 *  
	 
	 */
	
	
	
	public static function getChatroomByid($room, $user_id) {
		App::import ( "model", "Workroom" );
		$workroom = new Workroom ();
		$self = new self ();
		$w = $workroom->query ( "SELECT * FROM workroom WHERE id='{$room}'   " );
		
		if ($w [0] ["workroom"] ["id"])
			 if ($w [0] ["workroom"] ["leader"] == $user_id && $w [0] ["workroom"] ["to_user"] != ""  &&  $w [0] ["workroom"] ["to_user"]!= 0  )
				return SITE_URL . "workrooms/chatroom/" . $w [0] ["workroom"] ["to_user"] . "/" . $w [0] ["workroom"] ["id"];
			elseif ($w [0] ["workroom"] ["user_id"] != $user_id)
				return SITE_URL . "workrooms/chatroom/" . $w [0] ["workroom"] ["user_id"] . "/" . $w [0] ["workroom"] ["id"];
			else
				return SITE_URL . "workrooms/chatroom/" . $w [0] ["workroom"] ["leader"] . "/" . $w [0] ["workroom"] ["id"];
	}
	

	
	
	/*
	 * Get Job  Ch
	 * 
	 */
	public static function getJobChatroom($user_id, $job_id) {
		App::import ( "model", "Workroom" );
		$workroom = new Workroom ();
		$self = new self ();
		$w = $workroom->query ( "SELECT * FROM workroom WHERE type=0 AND job_id='{$job_id}' AND  (user_id ='{$user_id}' OR leader='{$user_id}') ORDER BY id DESC   " );
		
		
	
		if (!empty($w [0] ["workroom"] ["id"])){
			if ($w [0] ["workroom"] ["leader"] != $user_id)
				return SITE_URL . "workrooms/chatroom/" . $w [0] ["workroom"] ["user_id"] . "/" . $w [0] ["workroom"] ["id"];
			else
				return SITE_URL . "workrooms/chatroom/" . $w [0] ["workroom"] ["leader"] . "/" . $w [0] ["workroom"] ["id"];
	
		}
	
	
	}
	
	/*
	 * Check if is Apply To Job
	 */
	public static function isApply($user_id, $job) {
		App::import ( "model", "JobBid" );
		$jb = new JobBid ();
		return $jb->find ( "count", array (
				"conditions" => array (
						"user_id" => $user_id,
						"job_id" => $job 
				) 
		) );
	} 
	
	
	
	/*
	 * Get job Expert    
	 * pashkovdenis@gmail.com  
	 * 2014  
	 * 
	 */
	 
	public  static function  getjobExpertPhoto($job_id){ 
		$str= " "; 
		App::import("model","User") ;  
		$user_model   = new User()   ;  
 		$self = new self() ;  
		$team  =  $self->query("SELECT * FROM teamup_jobs WHERE job_id='{$job_id}' ") ; 
		
		if (!empty($team[0]["teamup_jobs"]["user_id"])){
			$dir = USER_PROFILE_IMAGE_SHOW_THUMB;
			$abs_path=USER_PROFILE_IMAGE_THUMB;
			$width = USER_IMAGE_WIDTH_THUMB -25 ;
			$height = USER_IMAGE_HEIGHT_THUMB - 25 ; 
			$user  = $user_model->query("SELECT * FROM  user_details WHERE user_id ='{$team[0]["teamup_jobs"]["to_user"]}' "); 
 			$image =  	$user[0]["user_details"]["image"] ;	
			$user_id  = $team[0]["teamup_jobs"]["to_user"];   
			$usernmae ="" ; 
			$l  = $user_model->find("first", array("conditions"=>array("id"=>$user_id)));  
			$usernmae = $l["User"]["username"];
			$path =SITE_URL . "img/". str_replace("{user_id}",$user_id,$dir);
			$path_abs = str_replace("{user_id}",$user_id,$abs_path);
		 
			if($image=='' || !file_exists($path_abs.$image)){
				$image = "/img/users/no_image.png" ; 
				$str =  "
		 	 <a href='".SITE_URL."users/user_public_view/".$user_id."'>
						 	 <img src='/img/users/no_image.png' width='".$width."' height='".$height."'  />
						 	 <p class='userame'> {$usernmae} </p>
						 	 </a>    "; 
				
			 }else{

		 
		 	$str =  "  
		 	 <a href='".SITE_URL."users/user_public_view/".$user_id."'> 
		 	  <img src='{$path}/{$image}' width='".$width."' height='".$height."'  /> 
		 	  <p class='userame'> {$usernmae} </p>  
		 	</a>    "; 
		 	
			 }
		 	
		 	

		 	
			
		} 
		return $str ; 
	}
	
	 
	  
	
	
	/*
	 * Static Method Get Room  Specified title   :  
	 * 2014@gmail.com   
	 * pashkovdenis@gmail.com   
	 * 
	 */
	
	public static function getTitle($room_id){  
		
		App::import("model", "User") ;  
		App::import("model","Project");  
		App::import("model",  "Job")  ;  
		$jobModel 		 =  new Job()  ;  
		$projecTModel 	 =  new Project() ;  
		$userModel  	 =  new User()  ;   
		$self			 =  new self();  
		$str =  "";  
		$room  =           $self->find("first",  array("conditions"=>array("id"=>$room_id))) ;  
		$project  =        $projecTModel->find("first" , array("conditions"=>array("id"=>$room["Workroom"]["project_id"])))  ;  
		$job   =  		   $jobModel->find("first",  array("conditions"=>array("id"=>$room["Workroom"]["job_id"])));   		 
		$first_user  = 	   $userModel->find("first",  array("conditions"=>array("id"=>$room["Workroom"]["leader"]))); 
		$second_user   =   $userModel->find("first",  array("conditions"=>array("id"=>$room["Workroom"]["to_user"])));  

		
		// Switch Case :   
		switch ($room["Workroom"]["type"]){
			
			case 1 : 
				$str =  $project["Project"]["title"];
			break  ;   
			
			case 2 :  
			  $str =  $job["Job"]["title"]. "@" . $project["Project"]["title"];	
			break ; 
			
			case 0 :  
			  $str  =  $first_user["User"]["username"].  "@" .  $second_user["User"]["username"]; 
		 	break ; 

            case 4 :

               $str =  $room["Workroom"]["name"]  ;

               break  ;

	 	} 
		
		return $str;   
	}
	
	 /*
	  * Get Attachment Count  
	  */
	   
	public static function getAttachCount($room_id){
		$self =new self();   
		$c =  $self->query("SELECT COUNT(*) as c  FROM workroom_files  WHERE work_room='{$room_id}' ") ;  
		return $c[0][0]["c"];
		
		
	}
	
	
	
}