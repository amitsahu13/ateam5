<?php
/**
 * Job
 *
 * PHP version 5

 *
 */

class Job extends AppModel {
    /**
     * Model name
     *
     * @var string
     * @access public
     */
    var $name = 'Job';
    /**
     * Behaviors used by the Model
     *
     * @var array
     * @access public
     */
    var $actsAs = array(
        'Multivalidatable'
    );
/*
     * Custom validation rulesets
     *
     * @var array
     * @access public
     */
    var $validationSets = array(
        'admin'	=>	array(
            'title'=>array(
                 'notEmpty' => array(
                        'rule' 		=> 'notEmpty',
                        'message' 	=>	'Title is required.'
                ),
                 
            ),
            'job_identification_no_no'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'Id no. is required.'
                ),
				'numeric'=>array(
					'rule' 		=> 'numeric',
					'message' 	=>	'Id no. must contain numerics.'
				),
				'comparison' => array(
						'rule' 		=> array('comparison', '>', 0),
						'message' 	=>	'Id no. must be grater than 0.'
				)
            ),
            'project_id'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'Project is required.'
                )
            ),
        		/*
            'state_id'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'State is required.'
                )
            ),*/
        		 
            'category_id'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'Category is required.'
                )
            ),
            'sub_category_id'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'Expertise Field is required.'
                )
            )
			,
            'type'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'Job type is required.'
                )
            ),
            'type_option_value'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'type option value is required.'
                ),
				'numeric'=>array(
					'rule' 		=> 'numeric',
					'message' 	=>	'Working Hour must contain numerics.'
				),'comparison' => array(
						'rule' 		=> array('comparison', '>', 0),
						'message' 	=>	'Working Hour must be grater then to 0.'
				)
            ),
            'description'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'Description is required.'
                )
            ),
            'country_id'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'Country is required.'
                )
            ),
            'duration_id'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'Duration is required.'
                )
            ),
            'hourly_rate_id'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'Choose a Hourly rate.'
                )
            ),
			'hourly_min_rate'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'Hourly minimum rate is required.'
                ),
				'numeric'=>array(
					'rule' 		=> 'numeric',
					'message' 	=>	'Must contain numerics.'
				)
            ),
			'hourly_max_rate'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'Hourly maximum rate is required.'
                ),
				'numeric'=>array(
					'rule' 		=> 'numeric',
					'message' 	=>	'Must contain numerics.'
				)
            ),
            'region_id'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'Region is required.'
                )
            ),
            'compensation_id'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'Select a Compensation.'
                )
            ),
            'budget_id'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'Select a Budget.'
                )
            ),
        		
        		'refrence_budget'=>array(
        				'fone' => array(
        						'Numeric' => array(
        								'rule' => 'numeric',
        								'message' => 'Please enter your fonenumber.'
        						),
        				
        			 )),
        		
			'budget_min_rate'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'Budget minimum rate is required.'
                ),
				'numeric'=>array(
					'rule' 		=> 'numeric',
					'message' 	=>	'Must contain numerics.'
				)
            ),
			'budget_max_rate'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'Budget maximum rate is required.'
                ),
				'numeric'=>array(
					'rule' 		=> 'numeric',
					'message' 	=>	'Must contain numerics.'
				)
            ),
            'job_for_id'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'Duration of job is required.'
                )
            ),
            'location_type'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'Choose location type is required.'
                )
            ),
         'skill'=>array(
         		
         		'notEmpty' => array(
         				'rule' 		=> 'notEmpty',
         				'message' 	=>	'Skill Required.'
         		)
         		
    ), 
            
            'date_type'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'Date Type is required.'
                )
            ),
            'posting_visibility'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'Posting Visibility is required.'
                )
            ),
            'start_date'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'Start Date is required.'
                )
            ),
            'end_date'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'End Date is required.'
                )
            ),
            'zipcode'=>array(
				/* 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'Zip is required.'
                ), */
                'alpha' => array(
                    'rule' => '/^[a-zA-Z0-9]{3,9}?$/',
					'allowEmpty' => true,
                    'message' => 'Zipcode should be 3 to  9 character.'
                )
            )
        ),
		'user'	=>	array(
            'title'=>array(
                 'notEmpty' => array(
                        'rule' 		=> 'notEmpty',
                        'message' 	=>	'Title is required.'
                ),
             
            ),
            'job_identification_no_no'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'Id no. is required.'
                ),
				'numeric'=>array(
					'rule' 		=> 'numeric',
					'message' 	=>	'Id no. must contain numerics.'
				),
				'comparison' => array(
						'rule' 		=> array('comparison', '>', 0),
						'message' 	=>	'Id no. must be grater than 0.'
				)
            ),
            'project_id'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'Project is required.'
                )
            ),
				/*
            'state_id'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'State is required.'
                )
            ),*/ 
				
            'category_id'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'Category is required.'
                )
            )
			,
            'type'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'Job type is required.'
                )
            ),
            'type_option_value'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'type option value is required.'
                ),
				'numeric'=>array(
					'rule' 		=> 'numeric',
					'message' 	=>	'Working Hour must contain numerics.'
				),'comparison' => array(
						'rule' 		=> array('comparison', '>', 0),
						'message' 	=>	'Working Hour must be grater then to 0.'
				)
            ),
            'description'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'Description is required.'
                )
            ),
				/*
            'country_id'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'Country is required.'
                )
            ),*/ 
				
            'duration_id'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'Duration is required.'
                )
            ),
            'hourly_rate_id'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'Choose a Hourly rate.'
                )
            ),
            'region_id'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'Region is required.'
                )
            ),
            'compensation_id'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'Select a Compensation.'
                )
            ),
            'budget_id'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'Select a Budget.'
                )
            ),
            'job_for_id'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'Duration of job is required.'
                )
            ),
            'location_type'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'Choose location type is required.'
                )
            ),
            'expert_availability'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'Expert Availability is required.'
                )
            ),
           
            'date_type'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'Date Type is required.'
                )
            ),
            'posting_visibility'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'Posting Visibility is required.'
                )
            ),
            'start_date'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'Start Date is required.'
                )
            ),
            'end_date'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'End Date is required.'
                )
            ),
            'zipcode'=>array(
				/* 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'Zip is required.'
                ), */
                'alpha' => array(
                    'rule' => '/^[a-zA-Z0-9]{3,9}?$/',
					'allowEmpty' => true,
                    'message' => 'Zipcode should be 3 to  9 character.'
                )
            )
        ), 
    		
    		
    		
    		// Addd job   Required Stuff   :   
    		
		'add_job_front'	=>	array(
				'Skill'=>array( 'notEmpty' => array(
                        'rule' 		=> 'notEmpty',
                        'message' 	=>	'Select Skill.'
                )), 
				
            'title'=>array(
                 'notEmpty' => array(
                        'rule' 		=> 'notEmpty',
                        'message' 	=>	'Title is required.'
                ),
              
            ),
            'job_identification_no_no'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'Id no. is required.'
                ),
				'numeric'=>array(
					'rule' 		=> 'numeric',
					'message' 	=>	'Id no. must contain numerics.'
				),
				'comparison' => array(
						'rule' 		=> array('comparison', '>', 0),
						'message' 	=>	'Id no. must be grater than 0.'
				)
            ),
            'project_id'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'Project is required.'
                )
            ),
				/*
            'state_id'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'State is required.'
                )
            ),*/ 
				
            'category_id'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'Category is required.'
                )
            ), 
				/*
            'sub_category_id'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'Expertise Field is required.'
                )
            )
			,
            'type'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'Job type is required.'
                )
            ),*/ 
				
				
            'type_option_value'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'type option value is required.'
                ),
				'numeric'=>array(
					'rule' 		=> 'numeric',
					'message' 	=>	'Working Hour must contain numerics.'
				),'comparison' => array(
						'rule' 		=> array('comparison', '>', 0),
						'message' 	=>	'Working Hour must be grater then to 0.'
				)
            ),
            'description'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'Description is required.'
                )
            ),
		 
				
            'duration_id'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'Duration is required.'
                )
            ),
            'hourly_rate_id'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'Choose a Hourly rate.'
                )
            ),
			'hourly_min_rate'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'Hourly minimum rate is required.'
                ),
				'numeric'=>array(
					'rule' 		=> 'numeric',
					'message' 	=>	'Must contain numerics.'
				)
            ),
			'hourly_max_rate'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'Hourly maximum rate is required.'
                ),
				'numeric'=>array(
					'rule' 		=> 'numeric',
					'message' 	=>	'Must contain numerics.'
				)
            ),
            'region_id'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'Region is required.'
                )
            ),
            'compensation_id'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'Select a Compensation.'
                )
            ),
            'budget_id'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'Select a Budget.'
                )
            ),
			'budget_min_rate'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'Budget minimum rate is required.'
                ),
				'numeric'=>array(
					'rule' 		=> 'numeric',
					'message' 	=>	'Must contain numerics.'
				)
            ),
			'budget_max_rate'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'Budget maximum rate is required.'
                ),
				'numeric'=>array(
					'rule' 		=> 'numeric',
					'message' 	=>	'Must contain numerics.'
				)
            ),
            'job_for_id'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'Duration of job is required.'
                )
            ),
            'location_type'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'Choose location type is required.'
                )
            ),
            'expert_availability'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'Expert Availability is required.'
                ),
				'isNumeric' => array(
                    'rule' 		=> 'numeric',
                    'message' 	=>	'Expert Availability must be numeric.'
                )
            ),
            'Skill'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'City is required.'
                ),  
				 
            ),
            'date_type'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'Date Type is required.'
                )
            ),
            'posting_visibility'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'Posting Visibility is required.'
                )
            ),
				
				/*
            'start_date'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'Start Date is required.'
                )
            ),
            'end_date'=>array(
				'comparison'   =>array(
				  'rule'    => array('comparedate', 'start_date' ), 
				  'message' 	=>	'Completion date Must be after Start date.' 

				),
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'End Date is required.'
                )
            ),
				*/ 
				
				
				
				
            'zipcode'=>array(
				/* 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'Zip is required.'
                ), */
                'alpha' => array(
                    'rule' => '/^[a-zA-Z0-9]{3,9}?$/',
					'allowEmpty' => true,
                    'message' => 'Zipcode should be 3 to  9 character.'
                )
            ),
            'proposal'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'Proposal is required.'
                )
            ),			
			'compensation_avalibility'=>array(
                 'notEmpty' => array(
                    'rule' 		=> 'notEmpty',
                    'message' 	=>	'Avalibility is required.'
                ),
				'numeric' => array(
                    'rule' 		=> 'numeric',
                    'message' 	=>	'Must contain numerics.'
                )
            ),
				
			 
			 
        )

    );

    function check_string($field=array()){
        $Job=$field['nick_name'];
        $value=substr($Job, 0, 1);

        if(preg_match('/[A-Za-z]$/',$value)==true)
        {
            return true;
        }
        else{
            return false;
        }
        return true;
    }
	
	function comparedate( $field=array(), $compare_field=null )  
    { 
        foreach( $field as $key => $value ){ 
            $v1 = $value; 
            $v2 = $this->data[$this->name][ $compare_field ];                  
            if($v1 <= $v2) { 
                return FALSE; 
            } else { 
                continue; 
            } 
        } 
        return TRUE; 
    }
    
    /*
     * Check if Job is Applied  
     * pashkovdenis 
     * 2014 
     */
    
    public static function isApply($id){ 
    	App::import("model","Teamup");  
    	$slef =  new self() ; 
    	$t= new Teamup() ; 
    	$c =  $t->find("count", array("conditions"=>array("job_id"=>$id))) ;
  
    		if ($c>0) 
    			return true ;
    	
    	return false; 
    }
    
    
    
    /*
     * 
     * 
     * get Compenstation  
     */
    
     
    public static function getCompensations($job_id){ 
    	$self = new self() ;   
    	$job =  $self->find("first",  array("conditions"=>array("id"=>$job_id))) ;  
    	 
    	
    	
    	
    }


    /*
     * get Titles  :
     * pashkovdenis@gmail.com 2
     * 2014
     *
     */


    public static function get_job_title($id){
        $self = new self();
        $job  = $self->find("first",["conditions"=>["Job.id"=>$id]]);
        $str =  $job["Job"]["title"] ;
        App::import("model","Project");
        $project_model =  new Project();

        $project =  $project_model->find("first",["conditions"=>["id"=>$job["Job"]["project_id"]]]);
        return $str."@".$project["Project"]["title"];


    }






    
    
    
    
}