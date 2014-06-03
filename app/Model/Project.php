<?php
/** 
* 2014@PHP version 5
* @ProjectType Model
* pashkovdenis@gmail.com  
* 
*/



class Project extends AppModel{
	 
	public  $name = 'Project';
 	public  $actsAs = array(
	'Multivalidatable'
	);
 	
	public  $validationSets = array(
	'admin'	=>	array(		
			'category_id'=>array(
				'notEmpty' => array(
				'rule' 		=> 'notEmpty',
				'message' 	=>	'Category is required'
				)
			),
			'sub_category_id'=>array(
				'notEmpty' => array(
				'rule' 		=> 'notEmpty',
				'message' 	=>	'Sub Category is required'
				)
			),
			'user_id'=>array(
				'notEmpty' => array(
				'rule' 		=> 'notEmpty',
				'message' 	=>	'User is required'
				)
			),
			'title'=>array(
				'notEmpty' => array(
				'rule' 		=> 'notEmpty',
				'message' 	=>	'Title is required'
				)
			),
			'description'=>array(
				'notEmpty' => array(
				'rule' 		=> 'notEmpty',
				'message' 	=>	'Description is required'
				)
			),
			'project_type_id'=>array(
				'notEmpty' => array(
				'rule' 		=> 'notEmpty',
				'message' 	=>	'Project Type is required'
				)
			),
			'project_manager_availability_id'=>array(
				'notEmpty' => array(
				'rule' 		=> 'notEmpty',
				'message' 	=>	'Project Manager Availability is required'
				)
			),
			'idea_maturity_id'=>array(
				'notEmpty' => array(
				'rule' 		=> 'notEmpty',
				'message' 	=>	'Idea Maturity is required'
				)
			),
			'business_plan_doc'=>array(
				'notEmpty' => array(
				'rule' => array('extension',array('doc','docx','pdf','txt')),
				'message' 	=>	'Business Document format not valide.'
				)
			),
			'project_image'=>array(
				'notEmpty' => array(
				'rule' => array('extension',array('png','gif','jpg','jpeg')),
				'message' 	=>	'Project image format not valide.'
				)
			),
			'project_visibility_id'=>array(
				'notEmpty' => array(
				'rule' 		=> 'notEmpty',
				'message' 	=>	'Project Visibility is required'
				)
			),
			'project_value_description'=>array(
				'notEmpty' => array(
				'rule' 		=> 'notEmpty',
				'message' 	=>	'Project Value Description is required'
				)
			),
			'business_plan_level_id'=>array(
				'notEmpty' => array(
				'rule' 		=> 'notEmpty',
				'message' 	=>	'Business Plan Level is required'
				)
			)
			),
			'user'	=>	array(		
				'category_id'=>array(
				'notEmpty' => array(
				'rule' 		=> 'notEmpty',
				'message' 	=>	'Category is required'
				)
			),
			'title'=>array(
				'notEmpty' => array(
				'rule' 		=> 'notEmpty',
				'message' 	=>	'Title is required'
				)
			),
			'description'=>array(
				'notEmpty' => array(
				'rule' 		=> 'notEmpty',
				'message' 	=>	'Description is required'
				)
			),
			'project_type_id'=>array(
				'notEmpty' => array(
				'rule' 		=> 'notEmpty',
				'message' 	=>	'Project Type is required'
				)
			),
			'project_manager_availability_id'=>array(
				'notEmpty' => array(
				'rule' 		=> 'notEmpty',
				'message' 	=>	'Project Manager Availability is required'
				)
			),
			'idea_maturity_id'=>array(
				'notEmpty' => array(
				'rule' 		=> 'notEmpty',
				'message' 	=>	'Idea Maturity is required'
				)
			),
			'business_plan_doc'=>array(
				'notEmpty' => array(
				'rule' => array('extension',array('doc','docx','pdf','txt')),
				'message' 	=>	'Business Plan Document is required'
				)
			),
			'project_visibility_id'=>array(
				'notEmpty' => array(
				'rule' 		=> 'notEmpty',
				'message' 	=>	'Project Visibility is required'
				)
			),
			'project_value_description'=>array(
				'notEmpty' => array(
				'rule' 		=> 'notEmpty',
				'message' 	=>	'Project Value Description is required'
				)
			),
			'business_plan_level_id'=>array(
				'notEmpty' => array(
				'rule' 		=> 'notEmpty',
				'message' 	=>	'Business Plan Level is required'
				)
			)
	),
	'project_general'	=>	array(		 
	
			'availability_id'=>array(
					'notEmpty' => array(
							'rule' 		=> 'notEmpty',
							'message' 	=>	'Availabity in project is required.'
					)
			),  
			
			'visibility'=>array(
					'notEmpty' => array(
							'rule' 		=> 'notEmpty',
							'message' 	=>	'Select Visibility .'
					)
			),
	
		'title'=>array(
			'notEmpty' => array(
			'rule' 		=> 'notEmpty',
			'message' 	=>	'Title is required'
			)
		),
		'description'=>array(
			'notEmpty' => array(
			'rule' 		=> 'notEmpty',
			'message' 	=>	'Description is required'
			)
		),
		'project_visibility_id'=>array(
			'notEmpty' => array(
			'rule' 		=> 'notEmpty',
			'message' 	=>	'Project Visibility is required'
			)
		),
		
		
		/*
		'project_image_text'=>array(
			'notEmpty' => array(
			'rule' 		=> 'notEmpty',
			'message' 	=>	'Project Image Text is required'
			)
		),
		*/
		
		
		'project_visibility_id'=>array(
			'notEmpty' => array(
			'rule' 		=> 'notEmpty',
			'message' 	=>	'Project Visibility is required'
			)
		),
		'category_id'=>array(
			'notEmpty' => array(
			'rule' 		=> 'notEmpty',
			'message' 	=>	'Category is required'
			)
		),
		
		/*
		'sub_category_id'=>array(
			'notEmpty' => array(
			'rule' 		=> 'notEmpty',
			'message' 	=>	'Subcategory is required'
			)
		),
		*/ 
		
		
		'project_type_id'=>array(
			'notEmpty' => array(
			'rule' 		=> 'notEmpty',
			'message' 	=>	'Project type is required'
			)
		),
		'region_id'=>array(
			'notEmpty' => array(
			'rule' 		=> 'notEmpty',
			'message' 	=>	'Region is required'
			)
		),
	 
		'project_manager_availability_id'=>array(
			'notEmpty' => array(
			'rule' 		=> 'notEmpty',
			'message' 	=>	'Project Manager Availability is required'
			)
		),
		'idea_maturity_id'=>array(
			'notEmpty' => array(
			'rule' 		=> 'notEmpty',
			'message' 	=>	'Idea Maturity is required'
			)
		),
		'project_status_id'=>array(
			'notEmpty' => array(
			'rule' 		=> 'notEmpty',
			'message' 	=>	'Project status is required'
			)
		),
		'business_plan_level_id'=>array(
			'notEmpty' => array(
			'rule' 		=> 'notEmpty',
			'message' 	=>	'Business plan level is required'
			)
		)
	),
	'project_leader'=>array(
		'availability_id'=>array(
			'notEmpty' => array(
			'rule' 		=> 'notEmpty',
			'message' 	=>	'Availabity in project is required.'
			)
		)	
	)
);

function get_project_list(){

	$projects = $this->find('list');
	return $projects;
}



/*
 * Static Method Start Here 
 * 2014
 * pashkovdenis@gmail.com
 */
 
	public  static function hasFile($project_id){ 
		$file  = ""; 
		$self = new self();  
		$file =  $self->query("SELECT file_name FROM project_businessplan_files WHERE project_id='{$project_id}' ") ;
		if (!empty($file[0]["project_businessplan_files"]["file_name"])) {
			return SITE_URL."/img/projects/{$project_id}/business_plan/".$file[0]["project_businessplan_files"]["file_name"]; 
			
		} 
		 return false ; 
	}

	
	
	/*
	 * Get Project Skills    
	 * pashkovmdenis@gmail.com  
	 * 2014  
	 * 
	 */
	public static function getProjectSkills($project_id){ 
		
		App::import("model" ,  "Job") ;    
		App::import("model" ,  "Skill") ;  
		
		$job_model  = new Job()  ;
		$skill_model  =  new Skill() ;  
		 $a =  [] ;   
		$self  = new self() ; 
		$jobs  =   $job_model->find("all" , array("conditions"=>array("project_id"=>$project_id))) ;
		$skills2  = [] ;  
		  
   	    foreach($jobs  as $job){ 
			  $skills  = $job_model->query("SELECT skill_id  FROM  jobs_skills WHERE job_id='{$job["Job"]["id"]}'  ");  

			  
			  foreach($skills as $s){ 
			  	 	 $skil  =  $skill_model->find("first",  array("conditions"=>array("id"=>  $s["jobs_skills"]["skill_id"]   ))) ; 
			  	 	 if (!in_array( $skil["Skill"]["name"], $a)){
					$skills2[]  =  $skil["Skill"]["name"] ; 
			  	 	 $a[] =   $skil["Skill"]["name"] ; 
			  	 	 }
			}
   	    }
		 if (count($skills2)==0) 
		 	return  "N/A" ; 
		  
   	    //  Required   Skills :    
		return join(",",$skills2); 
	}
	
	
	
	
	
	/*
	 * This method   Will  collect all  Skills from   child jobs   for  this project  
	 * pashkovdenis@gmail.com  
	 * 2014  
	 * 
	 * 
	 */ 
	
	
	public static function getSkills($stack =  [] ){ 
		$result  = [1] ; 
		App::import("model" ,  "Job") ;  
		$job_model  = new Job()  ;  
		$self  = new self() ;  
		$found  =  0 ;   
		$projects =  $self->find("all") ;  
		$added = [] ; 
		foreach($projects as $p){
			$jobs  =   $job_model->find("all" , array("conditions"=>array("project_id"=>$p["Project"]["id"]))) ;
			  
		foreach($jobs  as $job){
			$skills  = $job_model->query("SELECT skill_id  FROM  jobs_skills WHERE job_id='{$job["Job"]["id"]}'  "); 
			foreach($skills as $s){
	   
		 
				if (  $s["jobs_skills"]["skill_id"] != ""  &&  in_array( $s["jobs_skills"]["skill_id"], $stack)){
					$result []  =  $p["Project"]["id"]  ; 
					 
					if (!in_array(  $s["jobs_skills"]["skill_id"] , $added)) 
						$added[] =   $s["jobs_skills"]["skill_id"]; 
					
					
				 } 
				  
			 }
		 } 

		 
		 
			
		} 
		 
		 if (count($added)  == count($stack))
		 return $result ; 
		 else return [] ; 
		  
	}
	
	
	
	/*
	 * Get   Project ids For  Select job    :    
	 * pashkovdenis@gmail.com      
	 * 
	 * 
	 * 
	 */  
	 
	public static function  getJobProject($job_categories =  [ ] ){  
		$result =   []; 
		  App::import("model" , "Job") ;  
		  $job_model  = new Job() ;   
		  $project_ids =  $job_model->find("all" , array("conditions"=>array("category_id"=>$job_categories))); 
		   foreach ($project_ids as $j)  
		  	$result[] = $j["Job"]["project_id"]; 
		 
		$result = array_unique($result) ;  
		return $result ;  
	}
	
	
	
	
	
	
	/*
	 * Get Number of projects   : 
	 * 
	 */
	
	public static function  getProjectsNumber($u){
		return (new self())->find("count",["conditions"=>["Project.user_id"=>$u]]);
		
		
	}
	
	
	
	
	
	
	
	
	
	
	



}	