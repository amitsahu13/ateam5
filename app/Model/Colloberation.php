<?php
/*
 * Colloberation Model   
 * pashkovdenis@gmail.com  
 * 2014 :    
 * 
 * 
 */



class Colloberation extends AppModel {
	
	
	
	public $name = 'Colloberation';
	public $useTable = 'clb';
	
	
	public $actsAs = array (
			'Multivalidatable' 
	);
	
	public static  $TYPE_PROJECT  =1  ;  
	public static  $TYPE_JOB   = 2   ;   

	public $id ;   
	public $title  ; 
	public $explain ;   
	public $example   ; 
	public $link  ;   
	
	
	
	
	 /*
	  * Custom  Methods Starts  Herer  :   
	  * 
	  */  
	
	 public function loadSingle($id){
	 	$s  =   $this->find("first" , array("conditions"=>array("id"=>$id)))  ;  
	 	 
	 	
	 	$this->id  =  $s["Colloberation"]["id"];
	 	$this->title  = $s["Colloberation"]["title"] ;
	 	$this->explain  = $s["Colloberation"]["expl"] ;
	 	$this->example  =  $s["Colloberation"]["example"]  ;
	 	$this->link  = $s["Colloberation"]["link"] ; 
	 	$this->type =   $s["Colloberation"]["type"] ;  
	 	 
	 	   
	 	return $this  ;  
	 	
	 }
	
	
	
	
     public function getAll($type=false){   
     	$results =  [] ;  
     	 
     	if (!$type)
     	$set =  $this->find("all", array("orderby"=>"type DESC")) ;  
     	else 
     	$set =  $this->find("all", array( "conditions"=>array("type"=>$type) ,   "orderby"=>"type DESC")) ;   
     	
     	foreach($set as $s)  {
     		$m   =  new self() ;   
     		$m->id  =  $s["Colloberation"]["id"]; 
     		$m->title  = $s["Colloberation"]["title"] ;  
     		$m->explain  = $s["Colloberation"]["expl"] ;  
     		$m->example  =  $s["Colloberation"]["example"]  ;  
     		$m->link  = $s["Colloberation"]["link"] ;  
     		$m->type =   $s["Colloberation"]["type"] ; 
     		$results[]= $m   ;   
     		
     		
     	} 
     	
     	
     	return $results ;  
     	
     }
     
     
     
     public function getAllProject($project_id=false){
     	$results =  [] ;
     	$set =  $this->find("all", array("orderby"=>"type DESC"))  ;   
     	
    	// Load Prokect   
    	$p  = $this->query("SELECT clb FROM clb_projects WHERE project='{$project_id}' ");  
 
    	
    	if ($p[0]["clb_projects"]["clb"] == 3 )
    	 $set =  $this->find("all", array("orderby"=>"type DESC" , "conditions"=>array(
    			"not"=>array("id"=>array(4,6))
    			
    	))) ; 
    	 
    	if ($p[0]["clb_projects"]["clb"] ==4 )
    		$set =  $this->find("all", array("orderby"=>"type DESC" , "conditions"=>array(
    				"not"=>array("id"=>3)
    				 
    		))) ; 
     		
     	foreach($set as $s)  {
     		$m   =  new self() ;
     		$m->id  =  $s["Colloberation"]["id"];
     		$m->title  = $s["Colloberation"]["title"] ;
     		$m->explain  = $s["Colloberation"]["expl"] ;
     		$m->example  =  $s["Colloberation"]["example"]  ;
     		$m->link  = $s["Colloberation"]["link"] ;
     		$m->type =   $s["Colloberation"]["type"] ;
     		$results[]= $m   ;
     		 
     		 
     	}
     
     
     	return $results ;
     
     }
     
     
     // Other Custom   
      
	/*
	 * Static methods Begin Here   
	 */
	
     
     public static function getColaborationType($id){ 
     	$self= new self()  ; 
     	$id  =  $self->query("SELECT clb   FROM clb_job WHERE job_id ='{$id}'  ") ;  
      	 if (isset($id[0]["clb_job"])){
     	 	  $clb =  $id[0]["clb_job"]["clb"] ;  
     	 	  $self->loadSingle($clb) ;  
     	 	  return  $self->title ;  
     	   }else
     	 	return "N/A" ; 
       }
     
     
     
     
     /*
      *  Get  Type for the Project 
      *  pashkovdenis@gmail.com   
      *  2014 :    
      */ 
           
     public static function   getColloborationProject($project_id){  
 		
     	$self= new self()  ;
     	$id  =  $self->query("SELECT clb   FROM clb_projects WHERE project ='{$project_id}'  ") ;
      	if (isset($id[0]["clb_projects"])){
     		$clb =  $id[0]["clb_projects"]["clb"] ;
     		$self->loadSingle($clb) ;
 			return  $self->title ;
     	 	}else
     		return "N/A" ; 
     	
     }
     
     //
     public static function   getFreelanceProject($project_id){
     		
     	$self= new self()  ;
     	$id  =  $self->query("SELECT * FROM clb_projects WHERE project ='{$project_id}'  ") ;
     	if (isset($id[0]["clb_projects"])){
     		$clb =  $id[0]["clb_projects"]["clb"] ;
     		$self->loadSingle($clb) ;
     		return   ($id[0]["clb_projects"]["freelance"]==1?"YES":"No")   ;
     	}else
     		return "No" ;
     
     }
       
	
     
     
     /*
      * Public static function  get Dropd  DAta   For   Temaup  :  
      * pashkovdenis@gmail.com  
      * 2014   
      *  
      */
     
     
     public static function  getOwnerDrop($clb){
     	 $drop =  [] ; 

     	 switch($clb){
     	 	
     	 	case 3: //  ART   
     	 		
     	 		$drop[] = " Everyone Own Everything as a whole (undivided)";  
     	 		$drop[] = " Each one owns a different % according to his Future Earnings Share "; 
     	 		
     	 	 break ;  
     	 	
     	 	 case 4: //  Managed 
     	 	 	
     	 	 	$drop[] =   "Each one owns a different % according to his Future Earnings Share ";  
     	 	 	$drop[]  =  "Everyone Own Everything as a whole (undivided)";  
     	 	 	$drop[] =   "Each One owns his own creation";   
     	 	 	   
     	 	 	 
     	 	 break ;
     	 	 	
     	 	 case 7: //  freelancer  
     	 	 		
     	 	 	break ; 
     	 	 	
     	    	case  6: //  Royaltis
     	 	 		 $drop[] = "Expert owns his IP and allows Leader to use it in project while paying Royalties ";  
     	      break ; 
     	 	
     	 	
     	 } 
     	
     	return $drop ;  
     }
     
     
     
     
     
     
     // Custom Drop Down  Stack :   
     //  pashkovdenis@gmail.cpom  
     // 2014    
     
     
     public static function getContractDerop($clb){ 

     	$drop =  [] ;
     	
     	switch($clb){
     	
     		case 3: //  ART
     			 $drop[]  =  "Each one can act separately with the other consent"; 
     			 $drop[]  =  "Majority owner/s with others consent";
     			 $drop[]  =  "Majority owner/s (no  consent from others required) ";
     			break ;
     	
     		case 4: //  Managed
     				$drop[]= "Leader";
     			break ;
     	
     		case 7: //  freelancer
     				
     			break ;
     	
     		case  6: //  Royaltis
     	 		$drop[] =  "Leader can act on Project's work product only " ;   
     	 
     			break ;
     	
     	
     	}
     	
     	return $drop ;
     	
     	
     }
     
     
     
     
     
     
     
     
     
     
     
     
     
	
}
 