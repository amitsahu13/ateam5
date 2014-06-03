<?php
/**
 * Video
 *
 * PHP version 5
 *
 * @category Model
 *
 */
class Video extends AppModel{
	/**
	 * Model name
	 *
	 * @public  string
	 * @access public
	 */
	public  $name = 'Video';

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
			'embeded_video'=>array(
				'notEmpty' => array(
					'rule' 		=> 'notEmpty',
					'message' 	=>	'Embeded Video is required.'
					)
					)
					)
					);



}