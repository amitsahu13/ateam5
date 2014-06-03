<?php
/**
 * Page
 *
 * PHP version 5
 *
 * @ContractForm Model
 *
 */
class ContractForm extends AppModel{
	/**
	 * Model name
	 *
	 * @public  string
	 * @access public
	 */
	public  $name = 'ContractForm';

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
			'name'=>array(
				'notEmpty' => array(
					'rule' 		=> 'notEmpty',
					'message' 	=>	'Name is required'
					),
				'isUnique' => array(
					'rule' 		=> 'isUnique',
					'message' 	=>	'Name is already exist.'
					)
					),
			'agreement_id'=>array(
				'notEmpty' => array(
					'rule' 		=> 'notEmpty',
					'message' 	=>	'Agreement is required'
					)
					),
			'law_jurisdiction_id'=>array(
				'notEmpty' => array(
					'rule' 		=> 'notEmpty',
					'message' 	=>	'Law Jurisdiction is required'
					)
					),
			'form_doc'=>array(
				'extension' => array(
					'rule' 		=> array('extension', array('pdf', 'doc', 'docx', 'docm','dotx','dotm')),
					'message' 	=>	'Please enter valid extension (PDF, DOC, DOCX).'
					)
					),
			'content'=>array(
				'notEmpty' => array(
					'rule' 		=> 'notEmpty',
					'message' 	=>	'Content is required'
					)
					)
					)
					);
}