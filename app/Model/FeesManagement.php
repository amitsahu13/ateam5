<?php
/**
 * FeesManagement
 *
 * PHP version 5

 *
 */

class FeesManagement extends AppModel {
	/**
	 * Model name
	 *
	 * @var string
	 * @access public
	 */
	var $name = 'FeesManagement';
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
            'add_member_project_option_value'=>array(
                 'notEmpty' => array(
                        'rule' 		=> 'notEmpty',
                        'message' 	=>	'Project fees required.'
                        ),
                'numeric'=>array(
					'rule' 		=> 'numeric',
					'message' 	=>	'Should be numerics.'
					),
				'comparison' => array(
						'rule' 		=> array('comparison', '>', 0),
						'message' 	=>	'Must be grater than 0.'
						)
						),
            'authenticate_myself_option_value'=>array(
                 'notEmpty' => array(
                        'rule' 		=> 'notEmpty',
                        'message' 	=>	'Authenticate fees required.'
                        ),
                'numeric'=>array(
					'rule' 		=> 'numeric',
					'message' 	=>	'Should be numerics.'
					),
				'comparison' => array(
						'rule' 		=> array('comparison', '>', 0),
						'message' 	=>	'Must be grater than 0.'
						)
						),
			'contracts_pdfs_option_value'=>array(
                 'notEmpty' => array(
                        'rule' 		=> 'notEmpty',
                        'message' 	=>	'Contracts Pdfs fees required.'
                        ),
                'numeric'=>array(
					'rule' 		=> 'numeric',
					'message' 	=>	'Should be numerics.'
					),
				'comparison' => array(
						'rule' 		=> array('comparison', '>', 0),
						'message' 	=>	'Must be grater than 0.'
						)
						),
			'transferred_delayed_percentage_option_value'=>array(
                 'notEmpty' => array(
                        'rule' 		=> 'notEmpty',
                        'message' 	=>	'Transferred Delayed Percentage is required.'
                        ),
                'numeric'=>array(
					'rule' 		=> 'numeric',
					'message' 	=>	'Should be numerics.'
					),
				'comparison' => array(
						'rule' 		=> array('comparison', '>', 0),
						'message' 	=>	'Must be grater than 0.'
						)
						),
			'equity_sharing_option_value'=>array(
                 'notEmpty' => array(
                        'rule' 		=> 'notEmpty',
                        'message' 	=>	'Equity Sharing percentage is required.'
                        ),
                'numeric'=>array(
					'rule' 		=> 'numeric',
					'message' 	=>	'Should be numerics.'
					),
				'comparison' => array(
						'rule' 		=> array('comparison', '>', 0),
						'message' 	=>	'Must be grater than 0.'
						)
						),
			'dispute_management_option_value'=>array(
                 'notEmpty' => array(
                        'rule' 		=> 'notEmpty',
                        'message' 	=>	'Dispute percentage is required.'
                        ),
                'numeric'=>array(
					'rule' 		=> 'numeric',
					'message' 	=>	'Should be numerics.'
					),
				'comparison' => array(
						'rule' 		=> array('comparison', '>', 0),
						'message' 	=>	'Must be grater than 0.'
						)
						),
			'nda_usage_option_value'=>array(
                 'notEmpty' => array(
                        'rule' 		=> 'notEmpty',
                        'message' 	=>	'NDA Usage percentage is required.'
                        ),
                'numeric'=>array(
					'rule' 		=> 'numeric',
					'message' 	=>	'Should be numerics.'
					),
				'comparison' => array(
						'rule' 		=> array('comparison', '>', 0),
						'message' 	=>	'Must be grater than 0.'
						)
						)
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
}