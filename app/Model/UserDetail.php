<?php
/**
* UserDetail
*
* PHP version 5
*
* @UserDetail Model
*
*/
class UserDetail extends AppModel{
	/**
	* Model name
	*
	* @public  string
	* @access public
	*/
	public  $name = 'UserDetail';
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
		'add_about_us'	=>	array(
			'about_us' =>array(
			'rule' => 'notEmpty',
			'message' => 'About us is required.'
			),
			 
		),
		'user_personal_detail'	=>	array(
			'about_us' =>array(
			'rule' => 'notEmpty',
			'message' => 'About us is required.'
			),
		 
			'resume_doc'=>array(
			'type' => array(
			'rule' 		=>  array('extension', array('txt', 'pdf', 'ppt', 'xlsx', 'xls', 'doc', 'docx')),
			'message' 	=>	'Please enter valid extension file.'
			)
			),
		 
		 
			
			
			
		),
		'user_detail_overview'=>array(
		'availability_id'=>array(
				'notEmpty' => array(
						'rule' 		=> 'notEmpty',
						'message' 	=>	' is required.'
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
		'admin'	=>	array(
			'street_name'=>array(
				'notEmpty' => array(
					'rule' 		=> 'notEmpty',
					'message' 	=>	'street_name is required.'
				)
			),
			
			'house'=>array(
				'notEmpty' => array(
					'rule' 		=> 'notEmpty',
					'message' 	=>	'house is required.'
				)
			),
			'flat_number'=>array(
				'notEmpty' => array(
					'rule' 		=> 'notEmpty',
					'message' 	=>	'flat_number is required.'
				)
			),
			'region_id'=>array(
				'notEmpty' => array(
					'rule' 		=> 'notEmpty',
					'message' 	=>	'Region is required.'
				)
			),
			'country_id'=>array(
				'notEmpty' => array(
				'rule' 		=> 'notEmpty',
				'message' 	=>	'Country is required.'
				)
			),
			'state_id'=>array(
				'notEmpty' => array(
				'rule' 		=> 'notEmpty',
				'message' 	=>	'State is required.'
				)
			),
			'category_id'=>array(
				'notEmpty' => array(
				'rule' 		=> 'notEmpty',
				'message' 	=>	'Category is required.'
				)
			),
			'sub_category_id'=>array(
				'notEmpty' => array(
				'rule' 		=> 'notEmpty',
				'message' 	=>	'Sub Category is required.'
				)
			),
			'address'=>array(
				'notEmpty' => array(
				'rule' 		=> 'notEmpty',
				'message' 	=>	'Address is required.'
				)
			),
			'phone_no'=>array(
				'notEmpty' => array(
				'rule' 		=> 'notEmpty',
				'message' 	=>	'Phone no is required.',
				),
				'phone_no' => array(
				'rule' => '/^((\+)?[1-9]{1,2})?([-\s\.])?((\(\d{1,4}\))|\d{1,4})(([-\s\.])?[0-9]{1,12}){1,2}(\s*(ext|x)\s*\.?:?\s*([0-9]+))?$/',
				'message' => 'Invalid Phone Number.',
				)
			),
			'city'=>array(
				'notEmpty'=>array(
				'rule' => 'notEmpty',
				'message' => 'City is required.',
				),
				'checkAlpha' => array(
				'rule' => array('checkAlpha','city'),
				'message' => 'City must have alphabets.'
				)
				,'checkWhiteSpaces'	=> array(
				'rule'	=> 	array('checkWhiteSpace', 'city'),
				'message' =>'No white spaces on left and right side of string.'

				)
			),
			'zip'=>array(
				'notEmpty' => array(
				'rule' 		=> 'notEmpty',
				'message' 	=>	'Zip is required.'
				),
				'alpha' => array(
				'rule' => '/^[a-zA-Z0-9]{3,9}?$/',
				'message' => 'Invalid zip code.'
				)
			),
			 'image'=>array(
				
				'type' => array(
				'rule' 		=> array('extension', array('gif', 'jpeg', 'png', 'jpg')),
				'message' 	=>	'Please enter valid extension(gif,jpeg,png,jpg).'
				)
			),
			'resume_doc'=>array(
				'type' => array(
				'rule' 		=>  array('extension', array('txt', 'pdf', 'ppt', 'xlsx', 'xls', 'doc', 'docx')),
				'message' 	=>	'Please enter valid extension file(txt,pdf,ppt,xlsx,xls,doc,docx).'
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
		'userdetail-register'	=>	array(
			'region_id'=>array(
				'notEmpty' => array(
				'rule' 		=> 'notEmpty',
				'message' 	=>	'Region is required.'
				)
			),
			 
			'city'=>array(
				'notEmpty'=>array(
				'rule' => 'notEmpty',
				'message' => 'City is required.',
				),
				'checkAlpha' => array(
				'rule' => array('checkAlpha','city'),
				'message' => 'City must have alphabets.'
				)
				,'checkWhiteSpaces'	=> array(
				'rule'	=> 	array('checkWhiteSpace', 'city'),
				'message' =>'No white spaces on left and right side of string.'
				)
			)
		),
		'address_authenticate'	=>	array(
			'region_id'=>array(
			'notEmpty' => array(
			'rule' 		=> 'notEmpty',
			'message' 	=>	'Region is required.'
			)
			),
			'country_id'=>array(
			'notEmpty' => array(
			'rule' 		=> 'notEmpty',
			'message' 	=>	'Country is required.'
			)
			),
			'state_id'=>array(
			'notEmpty' => array(
			'rule' 		=> 'notEmpty',
			'message' 	=>	'State is required.'
			)
			),
			'street_name'=>array(
			'notEmpty' => array(
			'rule' 		=> 'notEmpty',
			'message' 	=>	'Street name is required.'
			)
			),
			'house'=>array(
			'notEmpty' => array(
			'rule' 		=> 'notEmpty',
			'message' 	=>	'house is required.'
			)
			),
			'flat_number'=>array(
			'notEmpty' => array(
			'rule' 		=> 'notEmpty',
			'message' 	=>	'Flat no is required.'
			)
			),
			'zip'=>array(
			'notEmpty' => array(
			'rule' 		=> 'notEmpty',
			'message' 	=>	'Zip is required.'
			),
			'alpha' => array(
			'rule' => '/^[a-zA-Z0-9]{3,9}?$/',
			'message' => 'Invalid zip code.'
			)
			)
		),
		'passport_authenticate'	=>	array(
			'passport_key_one'=>array(
			'notEmpty' => array(
			'rule' 		=> 'notEmpty',
			'message' 	=>	'MRZ code line1 is required.'
			)
			),
			'passport_key_two'=>array(
			'notEmpty' => array(
			'rule' 		=> 'notEmpty',
			'message' 	=>	'MRZ code line2 is required.'
			)
			)
		)
	);


}