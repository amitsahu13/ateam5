<?php
/**
 * Template
 *
 * PHP version 5
 *
 * @category Model
 *
 */
class Template extends AppModel{
	/**
	 * Model name
	 *
	 * @public  string
	 * @access public
	 */
	public  $name = 'Template';




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
				'isUnique'	=>	array(
					'rule'	=>	'isUnique',
					'message'	=>	'Template Name already exists.'
					),
				'checkWhiteSpaces'	=> array(
					'rule'	=> 	array('checkWhiteSpace', 'name'),
					'message' =>'Template Name should not contain white spaces on left and right side of string.'					
					),
				'notEmpty' => array(
					'rule' 		=> 'notEmpty',
					'message' 	=>	'Template Name is required'
					)
					),
			'subject'=>array(
				'isUnique'	=>	array(
					'rule'	=>	'isUnique',
					'message'	=>	'Email Subject already exists.'
					),
				'checkWhiteSpaces'	=> array(
					'rule'	=> 	array('checkWhiteSpace', 'subject'),
					'message' =>'Email Subject Name should not contain white spaces on left and right side of string.'					
					),
				'notEmpty' => array(
					'rule' 		=> 'notEmpty',
					'message' 	=>	'Email Subject Name is required'
					)
					),
			'content'=>array(
				'notEmpty' => array(
					'rule' 		=> 'notEmpty',
					'message' 	=>	'Template Name is required'
					)
					)
					)
					);

					function getFooterList(){
						App::import('Model','Footer');
						$footer=new Footer();
						$data =$footer->find('list', array(
					'conditions' => array('Footer.status'=>Configure::read('App.Status.active'))
						));
						return $data;
					}
					/* function getTemplatedata($slug){
					 App::import('Model','FooterTemplate');
					 $FooterTemplate = new FooterTemplate();
					 $template = $this->find('first',array('conditions'=>array('slug'=>$slug)));
					 $data =$footer->find('list', array(
					 'conditions' => array('FooterTemplate.template_id'=>$template['Template']['id'])
					 ));
					 pr($data); die;
					 } */

}