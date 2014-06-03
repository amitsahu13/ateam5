<?php
/**
 * Page
 *
 * PHP version 5
 *
 * @Comment Model
 *
 */
class Comment extends AppModel{
	/**
	 * Model name
	 *
	 * @public  string
	 * @access public
	 */
	public  $name = 'Comment';
	//var $belongsTo	=	array('Blog');
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
						'postcomment'	=>	array(		
							'comment'=>array(
									'notEmpty' => array(
									'rule' 		=> 'notEmpty',
									'message' 	=>	'Comment is required.'
								)
								)
					)
		);

	function get_blog_parent_child($type_for=0)
	{
		$this->unbindModel(array('belongsTo'=>array('Parent')),false);
		$this->bindModel(array(
				'hasMany'=>array(
					'Child'=>array(
						'className'=>'Comment',
						'foreignKey'=>'parent_id',
						'conditions'=>array('parent_id != '=>0),
						'fields'=>array('Child.comment','Child.id')
					)
				)
		
		),false);
		$data = $this->find('all',array('conditions'=>array('Comment.status'=>Configure::read('App.Status.active'),'Comment.parent_id'=>0)));
		return $data;
	}
}