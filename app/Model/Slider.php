<?php
/**
 * Page
 *
 * PHP version 5
 *
 * @SliderType Model
 *
 */
class Slider extends AppModel{
	/**
	 * Model name
	 *
	 * @public  string
	 * @access public
	 */
	public  $name = 'Slider';

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
				'notEmpty' => array(
					'rule' 		=> 'notEmpty',
					'message' 	=>	'title is required'
					)
					),'description'=>array(
				'notEmpty' => array(
					'rule' 		=> 'notEmpty',
					'message' 	=>	'description is required'
					)
					),
			'image'=> array( 
				    'extension'	=>	array(
						'allowEmpty'=>true,
						'rule' =>  array('extension', array('jpeg', 'png', 'jpg','gif')),
						'message'     =>  'Image format is invalid.It should be jpeg, png, jpg, gif.'
						)/*,
						'check_image_size'	=>	array(
						'rule' =>  array('check_image_size'),
						'message' => MAX_FILE_SIZE_MSG
						)*/
					 ,
					'image_size'	=> array(
					'allowEmpty'=>true,
					'rule' =>  array('image_size','image',SLIDER_IMAGE_WIDTH,SLIDER_IMAGE_HEIGHT),
					'message' => SLIDER_SHOULD_BE
					 )
					 )
					 )
					 );

					 function check_image_size($field=array())
					 {

					 	$size = $field['name']['size'];

					 	if($size >  MAX_FILE_SIZE)
					 	{
					 			
					 		return false;
					 	}
					 	else
					 	{
					 		return true;
					 	}

					 }

					 function image_size($data = array(),$field = NULL,$width=NULL,$height=NULL)
					 {

					 	if(!empty($data[$field]['tmp_name']))
					 	{
					 		$imageSize = @getimagesize($data[$field]['tmp_name']);
					 		$actualWidth  = $imageSize[0];
					 		$actualHeight = $imageSize[1];
					 		/* echo $actualWidth;
					 		 echo  $actualHeight;
					 		 die; */
					 		if(($actualWidth >=$width && $actualHeight >=$height))
					 		{
					 			return true;
					 		}
					 		else
					 		{
					 			return false;
					 		}
					 	}
					 	return false;
					 }

}