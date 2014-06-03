<?php
/**
 * Page
 *
 * PHP version 5
 *
 * @category Model
 *
 */
class Page extends AppModel{
	/**
	 * Model name
	 *
	 * @public  string
	 * @access public
	 */
	public  $name = 'Page';

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
			'title'=>array(
				'isUnique'	=>	array(
					'rule'	=>	'isUnique',
					'message'	=>	'Title already exists.'
					),
				'checkWhiteSpaces'	=> array(
					'rule'	=> 	array('checkWhiteSpace', 'title'),
					'message' =>'Title should not contain white spaces on left and right side of string.'					
					),
				'notEmpty' => array(
					'rule' 		=> 'notEmpty',
					'message' 	=>	'Title is required'
					)
					),
			'heading'=>array(
				'notEmpty' => array(
					'rule' 		=> 'notEmpty',
					'message' 	=>	'Heading is required'
					),
				'checkWhiteSpaces'	=> array(
					'rule'	=> 	array('checkWhiteSpace', 'heading'),
					'message' =>'Heading should not contain white spaces on left and right side of string.'					
					)
					),
			'content'=>array(
				'notEmpty' => array(
					'rule' 		=> 'notEmpty',
					'message' 	=>	'Content is required'
					)
					),
			'meta_title'=>array(
				'checkWhiteSpaces'	=> array(
					'rule'	=> 	array('checkWhiteSpace', 'meta_title'),
					'message' =>'Meta Title should not contain white spaces on left and right side of string.'					
					),
				'notEmpty' => array(
					'rule' 		=> 'notEmpty',
					'message' 	=>	'Meata Title is required'
					)
					),
			'meta_keywords'=>array(
				'checkWhiteSpaces'	=> array(
					'rule'	=> 	array('checkWhiteSpace', 'meta_keywords'),
					'message' =>'Meta Keywords should not contain white spaces on left and right side of string.'					
					),
				'notEmpty' => array(
					'rule' 		=> 'notEmpty',
					'message' 	=>	'Meta Keywords is required'
					)
					),
			'meta_description'=>array(
				'checkWhiteSpaces'	=> array(
					'rule'	=> 	array('checkWhiteSpace', 'meta_description'),
					'message' =>'Meta Description should not contain white spaces on left and right side of string.'					
					),
				'notEmpty' => array(
					'rule' 		=> 'notEmpty',
					'message' 	=>	'Meta Description is required'
					)
					)
					)
					);



}