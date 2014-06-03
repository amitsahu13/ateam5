<?php

/*
 * This Helper Will Output Feedback Summary HTML Code For
 */
class FeedbackHelper extends AppHelper {
	var $userModel;
	var $fedbackmodel;
	public function __construct() {
		App::import ( "model", "FeedbackFactory" );
		App::import ( "model", "User" );
		$this->userModel = new User ();
		$this->feedbackmodel = new FeedbackFactory ();
	}
	
	
	
	/*
	 * Get Feedbacks   List      
	 * 
	 * 
	 */  
	 
	
	public function getSummary($user_id, $type = false ) {
		$html = "";
 
		$rows_expert = $this->feedbackmodel->query ( "SELECT SUM(tech_skill)/COUNT(tech_skill) as tech ,  SUM(com_skill)/COUNT(com_skill) as com  , SUM(creat_skill)/COUNT(creat_skill) as creat   , SUM(time_skill)/COUNT(time_skill) as time FROM `user_feedbacks` WHERE leader =0 AND  receiver_id =  " . $user_id );
		$rows_leader = $this->feedbackmodel->query ( "SELECT SUM(tech_skill)/COUNT(tech_skill) as tech ,  SUM(com_skill)/COUNT(com_skill) as com  , SUM(creat_skill)/COUNT(creat_skill) as creat   , SUM(time_skill)/COUNT(time_skill) as time FROM `user_feedbacks` WHERE leader =1 AND  receiver_id =  " . $user_id );
		
		if ($type==false){
			
			
		if ($rows_expert [0] [0] ["tech"] != ""){



			$html .= "<p> Expert Feedback :  ";

            if ($rows_expert [0] [0] ["tech"]>0)
                $html .=  "Tech(" . round ( $rows_expert [0] [0] ["tech"] ) . ") ," ;

            if ($rows_expert [0] [0] ["com"]>0)
                $html .=  "
			 Com(" . round ( $rows_expert [0] [0] ["com"] ) . ")  ," ;

            if ($rows_expert [0] [0] ["creat"]>0)
                $html .=  "
			 Creat(" . round ( $rows_expert [0] [0] ["creat"] ) . ") ," ;

            if ($rows_expert [0] [0] ["time"]>0)
                $html .=  "
			 Time(" . round ( $rows_expert [0] [0] ["time"] ) . ")" ;


			  $html .="
			  </p> ";
        }
		
		
		if ($rows_leader [0] [0] ["tech"] != "")
        {

            $html .= "<p> Expert Feedback :  ";

            if ($rows_leader [0] [0] ["tech"]>0)
                $html .=  "Tech(" . round ( $rows_leader [0] [0] ["tech"] ) . ") ," ;

            if ($rows_leader [0] [0] ["com"]>0)
                $html .=  "
			 Com(" . round ( $rows_leader[0] [0] ["com"] ) . ")  ," ;

            if ($rows_leader [0] [0] ["creat"]>0)
                $html .=  "
			 Creat(" . round ( $rows_leader [0] [0] ["creat"] ) . ") ," ;

            if ($rows_leader [0] [0] ["time"]>0)
                $html .=  "
			 Time(" . round ( $rows_leader[0] [0] ["time"] ) . ")" ;


            $html .="
			  </p> ";

        }
		
		
		}else{
			
			//  Type   
			if ($type=="leader"){



				if ($rows_leader [0] [0] ["tech"] != "") {
                    $html .= "<p> Expert Feedback :  ";

                    if ($rows_leader [0] [0] ["tech"]>0)
                        $html .=  "Tech(" . round ( $rows_leader [0] [0] ["tech"] ) . ") ," ;

                    if ($rows_leader [0] [0] ["com"]>0)
                        $html .=  "
			 Com(" . round ( $rows_leader[0] [0] ["com"] ) . ")  ," ;

                    if ($rows_leader [0] [0] ["creat"]>0)
                        $html .=  "
			 Creat(" . round ( $rows_leader [0] [0] ["creat"] ) . ") ," ;

                    if ($rows_leader [0] [0] ["time"]>0)
                        $html .=  "
			 Time(" . round ( $rows_leader[0] [0] ["time"] ) . ")" ;


                    $html .="
			  </p> ";
                }





			} 
			
			
			if ($type=="expert"){


				if ($rows_expert [0] [0] ["tech"] != ""){
                    $html .= "<p> Expert Feedback :  ";

                    if ($rows_expert [0] [0] ["tech"]>0)
                        $html .=  "Tech(" . round ( $rows_expert [0] [0] ["tech"] ) . ") ," ;

                    if ($rows_expert [0] [0] ["com"]>0)
                        $html .=  "
			 Com(" . round ( $rows_expert [0] [0] ["com"] ) . ")  ," ;

                    if ($rows_expert [0] [0] ["creat"]>0)
                        $html .=  "
			 Creat(" . round ( $rows_expert [0] [0] ["creat"] ) . ") ," ;

                    if ($rows_expert [0] [0] ["time"]>0)
                        $html .=  "
			 Time(" . round ( $rows_expert [0] [0] ["time"] ) . ")" ;


                    $html .="
			  </p> ";

                }





			      }

			 
			
			
		} 
		
	 
		
		if (empty($html) && $type==false )  
			 return " " ;
		
		if (empty($html) && $type=="expert" )
			return " " ;
		if (empty($html) && $type=="leader" )
			return " " ;
		
		
		return $html;
	}
} 