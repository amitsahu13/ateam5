<?php
/**
* User
*
* PHP version 5
  2014   
  pashkovdenis@gmail.com 
  
*
*/

class User extends AppModel {
	/**
	* Model name
	*
	* @var string
	* @access public
	*/
	var $name = 'User';
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
			
			'password2'=>array(
				'notEmpty' => array(
					'rule' 		=> 'notEmpty',
					'message' 	=>	'Password is required'
				),
				
				'minLength'=>array(
					'rule'=>array('minLength', 8),
					'message'=>'Passwords must be at least 8 characters long.'
				),
				'identicalFieldValues' => array(
					'rule' => array('identicalFieldValues', 'confirm_password' ),
					'message' => 'Password does not match.'
				)

			),
			'display_name'=>array(
				'notEmpty' => array(
					'rule' 		=> 'notEmpty',
					'message' 	=>	'display_name is required'
				)
			),	
			'email'=>array(
				'notEmpty' => array(
					'rule' 		=> 'notEmpty',
					'message' 	=>	'Email is required'
				),
				'isUnique'	=>	array(
					'rule'	=>	'isUnique',
					'message'	=>	'Email already exists.'
				),
				'email'	=>	array(
					'rule'	=>	'email',
					'message'	=>	'Invalid Email.'
				)
			),
			'username'=>array(
				'notEmpty' => array(
					'rule' 		=> 'notEmpty',
					'message' 	=>	'Username is required'
				),
				'checkAlphaNumericDashUnderscore' => array(
					'rule' => array('checkAlphaNumericDashUnderscore','username'),
					'message' => 'Username must have alphanumeric or underscore(_)or dashes(-).'
				),
				'isUnique'	=>	array(
					'rule'	=>	'isUnique',
					'message'	=>	'Username already exists.'
				),
				'checkWhiteSpace' =>array(
					'rule' => array('checkWhiteSpace', 'username'),
					'message' => 'Username should not have white space at both ends'
				)
			),
			'first_name'=>array(
				'notEmpty' => array(
					'rule' 		=> 'notEmpty',
					'message' 	=>	'First name is required.'
				),
				'checkAlpha' => array(
					'rule' => array('checkAlpha','first_name'),
					'message' => 'First name must have alphabets.'
				)
				,'checkWhiteSpaces'	=> array(
					'rule'	=> 	array('checkWhiteSpace', 'first_name'),
					'message' =>'No white spaces on left and right side of string.'

				)
			),
			'last_name'=>array(
				'notEmpty' => array(
					'rule' 		=> 'notEmpty',
					'message' 	=>	'Last name is required.'
				),
				'checkAlpha' => array(
					'rule' => array('checkAlpha','last_name'),
					'message' => 'Last name must have alphabets.'
				),
				'checkWhiteSpaces'	=> array(
					'rule'	=> 	array('checkWhiteSpace', 'last_name'),
					'message' =>'No white spaces on left and right side of string.'
				)
			)
		),
		
		'adminedit'	=>	array(
			
			'password2'=>array(
				'notEmpty' => array(
					'rule' 		=> 'notEmpty',
					'message' 	=>	'Password is required'
				),
				
				'minLength'=>array(
					'rule'=>array('minLength', 8),
					'message'=>'Passwords must be at least 8 characters long.'
				),
				'identicalFieldValues' => array(
					'rule' => array('identicalFieldValues', 'confirm_password' ),
					'message' => 'Password does not match.'
				)

			),
			'display_name'=>array(
				'notEmpty' => array(
					'rule' 		=> 'notEmpty',
					'message' 	=>	'display_name is required'
				)
			),	
			'email'=>array(
				'notEmpty' => array(
					'rule' 		=> 'notEmpty',
					'message' 	=>	'Email is required'
				),
				
				'email'	=>	array(
					'rule'	=>	'email',
					'message'	=>	'Invalid Email.'
				)
			),
			'username'=>array(
				'notEmpty' => array(
					'rule' 		=> 'notEmpty',
					'message' 	=>	'Username is required'
				),
				'checkAlphaNumericDashUnderscore' => array(
					'rule' => array('checkAlphaNumericDashUnderscore','username'),
					'message' => 'Username must have alphanumeric or underscore(_)or dashes(-).'
				),
				
				'checkWhiteSpace' =>array(
					'rule' => array('checkWhiteSpace', 'username'),
					'message' => 'Username should not have white space at both ends'
				)
			),
			'first_name'=>array(
				'notEmpty' => array(
					'rule' 		=> 'notEmpty',
					'message' 	=>	'First name is required.'
				),
				'checkAlpha' => array(
					'rule' => array('checkAlpha','first_name'),
					'message' => 'First name must have alphabets.'
				)
				,'checkWhiteSpaces'	=> array(
					'rule'	=> 	array('checkWhiteSpace', 'first_name'),
					'message' =>'No white spaces on left and right side of string.'

				)
			),
			'last_name'=>array(
				'notEmpty' => array(
					'rule' 		=> 'notEmpty',
					'message' 	=>	'Last name is required.'
				),
				'checkAlpha' => array(
					'rule' => array('checkAlpha','last_name'),
					'message' => 'Last name must have alphabets.'
				),
				'checkWhiteSpaces'	=> array(
					'rule'	=> 	array('checkWhiteSpace', 'last_name'),
					'message' =>'No white spaces on left and right side of string.'
				)
			)
		),
		
		
		'change_password' => array(
			'new_password'=>array(
			'minLength'=>array(
			'rule'=>array('minLength', 8),
			'message'=>'Passwords must be at least 8 characters long.'
			),
			'notEmpty'=>array(
			'rule'=>'notEmpty',
			'message' => 'New password is required.'
			),

			),
			'confirm_password'=>array(
			'notEmpty'=>array(
			'rule'=>'notEmpty',
			'message' => 'Confirm password is required.',
			'last'=>true
			)	,
			'identicalFieldValues' => array(
			'rule' => array('identicalFieldValues', 'new_password' ),
			'message' => 'Please re-enter your password.'
			)
			),
			'old_password'=>array(
			'minLength'=>array(
			'rule'=>array('minLength', 8),
			'message'=>'Passwords must be at least 8 characters long.'
			),
			'notEmpty'=>array(
			'rule'=>'notEmpty',
			'message' => 'Old password is required.'
			),
			'checkOldPassword' => array(
			'rule' => array('checkOldPassword', 'old_password'),
			'message' => 'Old password is wrong.'
			)
			)
		),
		'new_password' => array(
			'password3'=>array(
			'R3'=>array(
			'rule'=>array('minLength', 8),
			'message'=>'Passwords must be at least 8 characters long.'
			),
			'R1'=>array(
			'rule'=>'notEmpty',
			'message' => 'New password is required.'
			),

			),

			'password4'=>array(
			'identicalFieldValues' => array(
			'rule' => array('identicalFieldValues', 'password3' ),
			'message' => 'Please re-enter your password.'
			),
			'R1'=>array(
			'rule'=>'notEmpty',
			'message' => 'Confirm password is required.'
			)
			),
			'old_password'=>array(
			'R3'=>array(
			'rule'=>array('minLength', 8),
			'message'=>'Passwords must be at least 8 characters long.'
			),
			'R1'=>array(
			'rule'=>'notEmpty',
			'message' => 'Old password is required.'
			),
			'checkOldPassword' => array(
			'rule' => array('checkOldPassword', 'old_password'),
			'message' => 'Old password is wrong.'
			)
			)
		),
		'login' => array(
			'active' => array("rule"=>"isActive", "message"=>"Please Activate your Account first.") , 	
				
			'username'	=>array(
			'notEmpty' => array(
			'rule' => 'notEmpty',
			'message' => 'Username is required.'
			)
			),
			'password' => array(			
			'notEmpty' => array(
			'rule' => 'notEmpty',
			'message' => 'Password is required.'
			)
			)
		),
		'forgot_password'=>array(
			'email'=>array( array(
			'rule' 		=> 'notEmpty',
			'message' 	=>	'Email is required.'
			),
			'email'	=>	array(
			'rule'	=>	'email',
			'message'	=>	'Please provide a valid email address.'
			)
			)
		),
		'reset_password'	=>	array(
			'password'=>array(
			'R1'=>array(
			'rule'=>'notEmpty',
			'message' => 'Password is required.'
			)

			),
			'password2'=>array(
			'identicalFieldValues' => array(
			'rule' => array('identicalFieldValues', 'password' ),
			'message' => 'Passwords does not match.'
			),
			'R2'=>array(
			'rule'=>'notEmpty',
			'message' => 'Confirm password is required.'
			)
			)
		),
		'user-register'	=>	array(
			'password2'	=> array(
				'notEmpty'	=> array(
				'rule'	=> 	'notEmpty',
				'message'	=>	'Password is required'
				),
				'minlength' => array(
				'rule'	=> 	array('minLength', 8),
				'message'	=>	'Password must be atleast 8 characters long.'
				),
				'checkWhiteSpace' =>array(
				'rule' => array('checkWhiteSpace', 'password2'),
				'message' => 'Password should not have white space at both ends'
				)
			),
			'password_confirm'=>array(
				'identicalFieldValues' => array(
				'rule' => array('identicalFieldValues', 'password2' ),
				'message' => 'Password does not match.'
				)
			),
			'email'=>array(
				'notEmpty' => array(
				'rule' 		=> 'notEmpty',
				'message' 	=>	'Email is required.'
				),
				'isUnique'	=>	array(
				'rule'	=>	'isUnique',
				'message'	=>	'Email already exists.'
				),
				'email'	=>	array(
				'rule'	=>	'email',
				'message'	=>	'Invalid Email.'
				)
			),
			'term_condition'=>array(               
			'rule' 		=> array('comparison','==',1),
			'message' 	=>	'You must checked term of use.'
			
			),
			'username'=>array(
				'notEmpty' => array(
				'rule' 		=> 'notEmpty',
				'message' 	=>	'Username is required'
				),
				'checkAlphaNumericDashUnderscore' => array(
				'rule' => array('checkAlphaNumericDashUnderscore','username'),
				'message' => 'Username must have alphanumeric or underscore(_)or dashes(-).'
				),
				'isUnique'	=>	array(
				'rule'	=>	'isUnique',
				'message'	=>	'Username already exists.'
				),
				'checkWhiteSpace' =>array(
				'rule' => array('checkWhiteSpace', 'username'),
				'message' => 'Username should not have white space at both ends'
				)
			),
			'first_name'=>array(
				'notEmpty' => array(
				'rule' 		=> 'notEmpty',
				'message' 	=>	'First name is required.'
				),
				'checkAlpha' => array(
				'rule' => array('checkAlpha','first_name'),
				'message' => 'First name must have alphabets.'
				)
				,'checkWhiteSpaces'	=> array(
				'rule'	=> 	array('checkWhiteSpace', 'first_name'),
				'message' =>'No white spaces on left and right side of string.'
				)
			),
			'last_name'=>array(
				'notEmpty' => array(
				'rule' 		=> 'notEmpty',
				'message' 	=>	'Last name is required.'
				),
				'checkAlpha' => array(
				'rule' => array('checkAlpha','last_name'),
				'message' => 'Last name must have alphabets.'
				),'checkWhiteSpaces'	=> array(
				'rule'	=> 	array('checkWhiteSpace', 'last_name'),
				'message' =>'No white spaces on left and right side of string.'
				)
			),  
			 
		),
		'edit_profile'	=>	array(
			'first_name'=>array(
			'notEmpty' => array(
			'rule' 		=> 'notEmpty',
			'message' 	=>	'First name is required.'
			),
			'checkAlpha' => array(
			'rule' => array('checkAlpha','first_name'),
			'message' => 'First name must have alphabets.'
			),
			'checkWhiteSpaces'	=> array(
			'rule'	=> 	array('checkWhiteSpace', 'first_name'),
			'message' =>'No white spaces on left and right side of string.'

			)
			),
			'last_name'=>array(
			'notEmpty' => array(
			'rule' 		=> 'notEmpty',
			'message' 	=>	'Last name is required.'
			),
			'checkAlpha' => array(
			'rule' => array('checkAlpha','last_name'),
			'message' => 'Last name must have alphabets.'
			),
			'checkWhiteSpaces'	=> array(
			'rule'	=> 	array('checkWhiteSpace', 'last_name'),
			'message' =>'No white spaces on left and right side of string.'
			)
			)
		),
		'user_profile_overview'	=>	array( 
		
				
				
		 'account_type'=>array(
				'notEmpty' => array(
				'rule' 		=> 'notEmpty',
				'message' 	=>	'Account is required.'
				)
			),
			'display_name'=>array(
				'notEmpty' => array(
				'rule' 		=> 'notEmpty',
				'message' 	=>	'Name is required.'
				)
			),
			'leadership_category_id'=>array(
				'notEmpty' => array(
				'rule' 		=> 'notEmpty',
				'message' 	=>	'Leadership category is required.'
				)
			),
			'expertise_category_id'=>array(
				'notEmpty' => array(
				'rule' 		=> 'notEmpty',
				'message' 	=>	'Expertise category is required.'
				)
			)
		),
		'user_info_authenticate'=>	array(
			'first_name'=>array(
				'notEmpty' => array(
					'rule' 		=> 'notEmpty',
					'message' 	=>	'First name is required.'
				)
			),
			'last_name'=>array(
				'notEmpty' => array(
					'rule' 		=> 'notEmpty',
					'message' 	=>	'Last name is required.'
				)
			)
		)
	);


	
	
	function isActive(){
		if(  $this->data['User']['Active'] == "1") 
			return true ; 
		
		return false; 
	}
	
	
	
	/*  public function paginateCount($conditions = null, $recursive = 0, $extra = array()) {
						$parameters = compact('conditions');
						$this->recursive = $recursive;
						$count = $this->find('count', array_merge($parameters, $extra));

						if (isset($extra['group'])) {

							$count = $this->getAffectedRows();

						}
						return $count;
					}

					public function paginate($conditions, $fields, $order, $limit, $page = 1, $recursive = null, $extra = array()) {
						if(empty($order)){
							$order = array($extra['passit']['sort'] => $extra['passit']['direction']);
						}
						if(isset($extra['group'])){
							$group = $extra['group'];
						}
						if(isset($extra['joins'])){
							$joins = $extra['joins'];
						}
						return $this->find('all', compact('conditions', 'fields', 'order', 'limit', 'page', 'recursive', 'group', 'joins'));
					} */

	/* check for identical values in field */
	function identicalFieldValues($field=array(), $compare_field=null)
	{
		foreach( $field as $key => $value ){
			$v1 = $value;
			$v2 = $this->data[$this->name][$compare_field ];

			if($v1 !== $v2) {
				return false;
			} else {
				continue;
			}
		}
		return true;
	}

	/*check confirm password */
	function confirmPassword(){
		if(!empty($this->data['User']['user_password'])){
			if($this->data['User']['user_password']!=$this->data['User']['confirm_password']){
				return false;
			}
			else{
				return true;
			}
		}
	}

	/*check existing email */
	function checkEmail($data = null, $field=null){
		if(!empty($field)){
			if(!empty($this->data[$this->name][$field])){
				if($this->hasAny(array('User.email' => $this->data[$this->name][$field],'User.status'=>Configure::read('App.Status.active')))){
					return true;
				}elseif($this->hasAny(array('User.username' => $this->data[$this->name][$field],'User.status'=>Configure::read('App.Status.active')))){
					return true;
				}
				else{
					return false;
				}
			}
		}
	}
	/*check old password*/
	function checkOldPassword( $field = array(), $password = null )
	{
		App::uses('CakeSession', 'Model/Datasource');
		$userId = CakeSession::read('Auth.User.id');
		// pr($userId); die;
		/*  App::import('Component', 'Session');
						$Session = new SessionComponent();
						$userId = $Session->read('Auth.User.id'); */
		
		//User or Admin
		$count	=	$this->find('count',array('conditions'=>array(
		'User.password'=>Security::hash($field[$password], null, true),
		'User.id'=>$userId
		)));
		if($count == 1){
			return true;
		}else{
			return false;
		}
	}

	function beforeValidate($options = array()) {
		foreach($this->hasAndBelongsToMany as $k=>$v) {
			if(isset($this->data[$k][$k]))
			{
				$this->data[$this->alias][$k] = $this->data[$k][$k];
			}
		}


	}
	function check_string($field=array()){
		$user=$field['nick_name'];
		$value=substr($user, 0, 1);

		if(preg_match('/[A-Za-z]$/',$value)==true)
		{
			return true;
		}
		else{
			return false;
		}
		return true;
	}

	
	  /*
	   * 
	   * pashkovdenis@gmail.com   
	   * 2014    :    
	   * 
	   */
	
	
	public static  function getAdminEmail(){
		$self   =new self()  ; 
		$user =  $self->find("first"  ,  array("conditions"=>array("role_id"=>1)) ) ;  
	    return $user["User"]["email"];
	 }
	
	
	 
	/*
	 * Get Username for   Visibility   
	 * 2014 .   
	 * 
	 */
	 
	 public static function getuserName( $user_id ){ 
		$self =  new self();  
		$name =  ""  ;   
 
		
		
		$user  =   $self->find("first",  array("conditions"=>array("id"=>$user_id))); 
		$v= $self->query("SELECT name_visibility FROM user_details WHERE user_id  = '{$user_id}'  "); 
		 
		 
		
		if ($v[0]["user_details"]["name_visibility"]!=1 )
						$name =  "(". $user["User"]["username"] . ")"  ; 
		 else
						$name =   $user["User"]["first_name"]. " ".    $user["User"]["last_name"] ; 
		
		
		return $name ; 
	 }
	 
	 
	 /*
	  * 
	  * Get Number of Project For Expert  
	  * 
	  */  
	  
	 
	   
	 
	 public static function getNumberExpertProject($user_id){ 
	 	$self =new self() ;   
		$c=  0 ;  	 	
	 	$r =  $self->query("SELECT COUNT(*) as c   FROM   teamup_jobs WHERE to_user='{$user_id}'  ") ;   
		return   $r[0][0]["c"] ;  
		return  $c ;    
	 }
	 
	 
	 
	
	

}