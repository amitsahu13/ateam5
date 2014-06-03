<?php
/**
 * Section
 *
 * PHP version 5
 *
 * @category Model
 *
 */
class Admin extends AppModel{
	/**
	 * Model name
	 *
	 * @public  string
	 * @access public
	 */
	public  $name = 'Admin';

	/**
	 * Behaviors used by the Model
	 *
	 * @public  array
	 * @access public
	 */
	public  $actsAs = array(
        'Multivalidatable'
        );


        /**
         * Custom validation rulesets
         *
         * @public  array
         * @access public
         */
        public  $validationSets = array(
		'admin'	=>	array(		
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
                    ),
			'username'=>array(
				'notEmpty' => array(
					'rule' 		=> 'notEmpty',
					'message' 	=>	'Username is required.'
					),
                'checkAlphaNumericDashUnderscore' => array(
                    'rule' => array('checkAlphaNumericDashUnderscore','username'),
                    'message' => 'Username must have alphanumeric or underscore(_)or dashes(-).'
                    ),
				'isUnique' => array(
					'rule' 		=> 'isUnique',
					'message' 	=>	'Username already exists.'
					),
                'checkWhiteSpace' =>array(
                    'rule' => array('checkWhiteSpace', 'username'),
                    'message' => 'Username should not have white space at both ends'
                    )
                    ),
			'email'=>array(
				'notEmpty' => array(
					'rule' 		=> 'notEmpty',
					'message' 	=>	'Email is required.'
					),
				'email'=>array(
					'rule' 		=> 'email',
					'message' 	=>	'Please provide  valid email.'
					),
				'isUnique' => array(
					'rule' 		=> 'isUnique',
					'message' 	=>	'Email already exists.'
					)
					),
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
			'confirmpassword'=>array(
                  'notEmpty'=>array(
                           'rule'=>'notEmpty',
                           'message' => 'Confirm password is required.',
                            'last'=>true
                    ),
                'minlength' => array(
                    'rule'	=> 	array('minLength', 8),
                    'message'	=>	'Password must be atleast 8 characters long.'
                    ),
				'checkWhiteSpace' =>array(
                    'rule' => array('checkWhiteSpace', 'confirmpassword'),
                    'message' => 'Password should not have white space at both ends'
                    ),
                  'identicalFieldValues' => array(
                            'rule' => array('identicalFieldValues', 'password2' ),
                            'message' => 'Password does not match.'
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
                            )
                            );

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



}