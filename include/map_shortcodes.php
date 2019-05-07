<?php

if( ! function_exists( 'konado_get_slider_setting' ) ) {
	function konado_get_slider_setting() {
		$status_opt = array(
			'',
			__( 'Yes', 'konado' ) => true,
			__( 'No', 'konado' ) => false,
		);
		
		$effect_opt = array(
			'',
			__( 'Fade', 'konado' ) => 'fade',
			__( 'Slide', 'konado' ) => 'slide',
		);
	 
		return array( 
			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'Enable slider', 'konado' ),
				'param_name' => 'enable_slider',
				'value' => true,
				'save_always' => true, 
				'group' => esc_html__( 'Slider Options', 'konado' ),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Items Default', 'konado' ),
				'param_name' => 'items',
				'group' => esc_html__( 'Slider Options', 'konado' ),
				'value' => 5,
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Item Desktop', 'konado' ),
				'param_name' => 'item_desktop',
				'group' => esc_html__( 'Slider Options', 'konado' ),
				'value' => 4,
			), 
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Item Small', 'konado' ),
				'param_name' => 'item_small',
				'group' => esc_html__( 'Slider Options', 'konado' ),
				'value' => 3,
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Item Tablet', 'konado' ),
				'param_name' => 'item_tablet',
				'group' => esc_html__( 'Slider Options', 'konado' ),
				'value' => 2,
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Item Mobile', 'konado' ),
				'param_name' => 'item_mobile',
				'group' => esc_html__( 'Slider Options', 'konado' ),
				'value' => 1,
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Navigation', 'konado' ),
				'param_name' => 'navigation',
				'value' => $status_opt,
				'save_always' => true,
				'group' => esc_html__( 'Slider Options', 'konado' ),
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Pagination', 'konado' ),
				'param_name' => 'pagination',
				'value' => $status_opt,
				'save_always' => true,
				'group' => esc_html__( 'Slider Options', 'konado' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Speed sider', 'konado' ),
				'param_name' => 'speed',
				'value' => '500',
				'save_always' => true,
				'group' => esc_html__( 'Slider Options', 'konado' )
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'Slider Auto', 'konado' ),
				'param_name' => 'auto',
				'value' => false, 
				'group' => esc_html__( 'Slider Options', 'konado' )
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'Slider loop', 'konado' ),
				'param_name' => 'loop',
				'value' => false, 
				'group' => esc_html__( 'Slider Options', 'konado' )
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Effects', 'konado' ),
				'param_name' => 'effect',
				'value' => $effect_opt,
				'save_always' => true,
				'group' => esc_html__( 'Slider Options', 'konado' )
			), 
		);
	}
}
//Shortcodes for Visual Composer

add_action( 'vc_before_init', 'konado_vc_shortcodes' );
function konado_vc_shortcodes() { 

	//Main Menu
	vc_map( array(
		'name' => esc_html__( 'Main Menu', 'konado'),
		'base' => 'roadmainmenu',
		'class' => '',
		'category' => esc_html__( 'Theme', 'konado'), 
		'params' => array()
	) );

	//Categories Menu
	vc_map( array(
		'name' => esc_html__( 'Categories Menu', 'konado'),
		'base' => 'roadcategoriesmenu',
		'class' => '',
		'category' => esc_html__( 'Theme', 'konado'),
		'params' => array(
		)
	) );
  

	//Mini Cart
	vc_map( array(
		'name' => esc_html__( 'Mini Cart', 'konado'),
		'base' => 'roadminicart',
		'class' => '',
		'category' => esc_html__( 'Theme', 'konado'),
		'params' => array(
		)
	) );

	//Products Search
	vc_map( array(
		'name' => esc_html__( 'Product Search', 'konado'),
		'base' => 'roadproductssearch',
		'class' => '',
		'category' => esc_html__( 'Theme', 'konado'),
		'params' => array(
		)
	) );
 
	//Brand logos
	vc_map( array(
		'name' => esc_html__( 'Brand Logos', 'konado' ),
		'base' => 'ourbrands',
		'class' => '',
		'category' => esc_html__( 'Theme', 'konado'),
		'params' => array_merge( 
			array(
				array(
					'type' => 'textfield',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__( 'Number of columns', 'konado' ),
					'param_name' => 'colsnumber',
					'value' => esc_html__( '6', 'konado' ),
				),
				array(
					'type' => 'dropdown',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__( 'Number of rows', 'konado' ),
					'param_name' => 'rowsnumber',
					'value' => array(
							'1'	=> '1',
							'2'	=> '2',
							'3'	=> '3',
							'4'	=> '4',
						),
				),
			),konado_get_slider_setting()
		)

	) );
 

	//Categories carousel
	vc_map( array(
		'name' => esc_html__( 'Categories Carousel', 'konado' ),
		'base' => 'categoriescarousel',
		'class' => '',
		'category' => esc_html__( 'Theme', 'konado'),
		'params' => array_merge(
			array(
				array(
					'type' => 'textfield',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__( 'Number of columns', 'konado' ),
					'param_name' => 'colsnumber',
					'value' => esc_html__( '6', 'konado' ),
				),
				array(
					'type' => 'dropdown',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__( 'Number of rows', 'konado' ),
					'param_name' => 'rowsnumber',
					'value' => array(
							'1'	=> '1',
							'2'	=> '2',
							'3'	=> '3',
							'4'	=> '4',
						),
				),
			), konado_get_slider_setting() 
		)
	) );
 
	
	//MailPoet Newsletter Form
	vc_map( array(
		'name' => esc_html__( 'Newsletter Form (MailPoet)', 'konado' ),
		'base' => 'wysija_form',
		'class' => '',
		'category' => esc_html__( 'Theme', 'konado'),
		'params' => array(
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Form ID', 'konado' ),
				'param_name' => 'id',
				'value' => '',
				'description' => esc_html__( 'Enter form ID here', 'konado' ),
			),
		)
	) );

	//Timesale
	vc_map( array(
		'name' => esc_html__( 'Time Sale', 'konado' ),
		'base' => 'timesale',
		'class' => '',
		'category' => esc_html__( 'Theme', 'konado'),
		'params' => array( 
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Date Sale', 'konado' ),
				'description' => esc_html__( 'Date Sale M-D-Y. example: 06-16-2030', 'konado' ),
				'param_name' => 'date', 
			),
			array(
			  "type" => "attach_image",
			  "class" => "",
			  "heading" => esc_html__( "The image", "konado" ),
			  "param_name" => "image",
			  "value" => '',
			  "description" => esc_html__( "Enter description.", "konado" )
			),
			array(
				'type' => 'textarea_html',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Short description', 'konado' ),
				'param_name' => 'description', 
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'URL', 'konado' ),
				'description' => esc_html__( 'Link go to sale page', 'konado' ),
				'param_name' => 'url', 
			), 
		)
	) );
	
	//Latest posts
	vc_map( array(
		'name' => esc_html__( 'Latest posts', 'konado' ),
		'base' => 'latestposts',
		'class' => '',
		'category' => esc_html__( 'Theme', 'konado'),
		'params' =>  array_merge(array(
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Number of posts', 'konado' ),
				'param_name' => 'posts_per_page',
				'value' => esc_html__( '5', 'konado' ),
			),
			  
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Excerpt length', 'konado' ),
				'param_name' => 'length',
				'value' => esc_html__( '20', 'konado' ),
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Number of columns', 'konado' ),
				'param_name' => 'colsnumber',
				'value' => esc_html__( '4', 'konado' ),
			), 
			array(
				'type' => 'dropdown',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Number of rows', 'konado' ),
				'param_name' => 'rowsnumber',
				'value' => array(
						'1'	=> '1',
						'2'	=> '2',
						'3'	=> '3',
						'4'	=> '4',
					),
			), 
		),konado_get_slider_setting() )
	) );
	
	//Testimonials
	vc_map( array(
		'name' => esc_html__( 'Testimonials', 'konado' ),
		'base' => 'woothemes_testimonials',
		'class' => '',
		'category' => esc_html__( 'Theme', 'konado'),
		'params' => array(
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Number of testimonial', 'konado' ),
				'param_name' => 'limit',
				'value' => esc_html__( '10', 'konado' ),
			),
			array(
				'type' => 'dropdown',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Display Author', 'konado' ),
				'param_name' => 'display_author',
				'value' => array(
					'Yes'	=> 'true',
					'No'	=> 'false',
				),
			),
			array(
				'type' => 'dropdown',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Display Avatar', 'konado' ),
				'param_name' => 'display_avatar',
				'value' => array(
					'Yes'	=> 'true',
					'No'	=> 'false',
				),
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Avatar image size', 'konado' ),
				'param_name' => 'size',
				'value' => '',
				'description' => esc_html__( 'Avatar image size in pixels. Default is 50', 'konado' ),
			),
			array(
				'type' => 'dropdown',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Display URL', 'konado' ),
				'param_name' => 'display_url',
				'value' => array(
					'Yes'	=> 'true',
					'No'	=> 'false',
				),
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Category', 'konado' ),
				'param_name' => 'category',
				'value' => esc_html__( '0', 'konado' ),
				'description' => esc_html__( 'ID/slug of the category. Default is 0', 'konado' ),
			),
		)
	) );
	
	
	//Rotating tweets
	vc_map( array(
		'name' => esc_html__( 'Rotating tweets', 'konado' ),
		'base' => 'rotatingtweets',
		'class' => '',
		'category' => esc_html__( 'Theme', 'konado'),
		'params' => array(
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Twitter user name', 'konado' ),
				'param_name' => 'screen_name',
				'value' => '',
			),
		)
	) );

	//Twitter feed
	vc_map( array(
		'name' => esc_html__( 'Twitter feed', 'konado' ),
		'base' => 'AIGetTwitterFeeds',
		'class' => '',
		'category' => esc_html__( 'Theme', 'konado'),
		'params' => array(
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Your Twitter Name(Without the "@" symbol)', 'konado' ),
				'param_name' => 'ai_username',
				'value' => '',
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Number Of Tweets', 'konado' ),
				'param_name' => 'ai_numberoftweets',
				'value' => '',
			),
			// array(
			// 	'type' => 'textfield',
			// 	'holder' => 'div',
			// 	'class' => '',
			// 	'heading' => esc_html__( 'Your Title', 'konado' ),
			// 	'param_name' => 'ai_tweet_title',
			// 	'value' => '',
			// ),
		)
	) );
	
	//Google map
	vc_map( array(
		'name' => esc_html__( 'Google map', 'konado' ),
		'base' => 'konado_map',
		'class' => '',
		'category' => esc_html__( 'Theme', 'konado'),
		'params' => array(
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Map Height', 'konado' ),
				'param_name' => 'map_height',
				'value' => esc_html__( '400', 'konado' ),
				'description' => esc_html__( 'Map height in pixels. Default is 400', 'konado' ),
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Map Zoom', 'konado' ),
				'param_name' => 'map_zoom',
				'value' => esc_html__( '17', 'konado' ),
				'description' => esc_html__( 'Map zoom level, min 0, max 21. Default is 17', 'konado' ),
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Latitude', 'konado' ),
				'param_name' => 'lat1',
				'value' => '',
				'group' => 'Marker 1'
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Longtitude', 'konado' ),
				'param_name' => 'long1',
				'value' => '',
				'group' => 'Marker 1'
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Address', 'konado' ),
				'param_name' => 'address1',
				'value' => '',
				'description' => esc_html__( 'If you donot enter coordinate, enter address here', 'konado' ),
				'group' => 'Marker 1'
			),
			array(
				'type' => 'attach_image',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Marker image', 'konado' ),
				'param_name' => 'marker1',
				'value' => '',
				'description' => esc_html__( 'Upload marker image, image size: 40x46 px', 'konado' ),
				'group' => 'Marker 1'
			),
			array(
				'type' => 'textarea',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Description', 'konado' ),
				'param_name' => 'description1',
				'value' => '',
				'description' => esc_html__( 'Allowed HTML tags: a, i, em, br, strong, h1, h2, h3', 'konado' ),
				'group' => 'Marker 1'
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Latitude', 'konado' ),
				'param_name' => 'lat2',
				'value' => '',
				'group' => 'Marker 2'
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Longtitude', 'konado' ),
				'param_name' => 'long2',
				'value' => '',
				'group' => 'Marker 2'
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Address', 'konado' ),
				'param_name' => 'address2',
				'value' => '',
				'description' => esc_html__( 'If you donot enter coordinate, enter address here', 'konado' ),
				'group' => 'Marker 2'
			),
			array(
				'type' => 'attach_image',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Marker image', 'konado' ),
				'param_name' => 'marker2',
				'value' => '',
				'description' => esc_html__( 'Upload marker image', 'konado' ),
				'group' => 'Marker 2'
			),
			array(
				'type' => 'textarea',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Description', 'konado' ),
				'param_name' => 'description2',
				'value' => '',
				'description' => esc_html__( 'Allowed HTML tags: a, i, em, br, strong, p, h2, h2, h3', 'konado' ),
				'group' => 'Marker 2'
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Latitude', 'konado' ),
				'param_name' => 'lat3',
				'value' => '',
				'group' => 'Marker 3'
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Longtitude', 'konado' ),
				'param_name' => 'long3',
				'value' => '',
				'group' => 'Marker 3'
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Address', 'konado' ),
				'param_name' => 'address3',
				'value' => '',
				'description' => esc_html__( 'If you donot enter coordinate, enter address here', 'konado' ),
				'group' => 'Marker 3'
			),
			array(
				'type' => 'attach_image',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Marker image', 'konado' ),
				'param_name' => 'marker3',
				'value' => '',
				'description' => esc_html__( 'Upload marker image', 'konado' ),
				'group' => 'Marker 3'
			),
			array(
				'type' => 'textarea',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Description', 'konado' ),
				'param_name' => 'description3',
				'value' => '',
				'description' => esc_html__( 'Allowed HTML tags: a, i, em, br, strong, p, h3, h3, h3', 'konado' ),
				'group' => 'Marker 3'
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Latitude', 'konado' ),
				'param_name' => 'lat4',
				'value' => '',
				'group' => 'Marker 4'
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Longtitude', 'konado' ),
				'param_name' => 'long4',
				'value' => '',
				'group' => 'Marker 4'
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Address', 'konado' ),
				'param_name' => 'address4',
				'value' => '',
				'description' => esc_html__( 'If you donot enter coordinate, enter address here', 'konado' ),
				'group' => 'Marker 4'
			),
			array(
				'type' => 'attach_image',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Marker image', 'konado' ),
				'param_name' => 'marker4',
				'value' => '',
				'description' => esc_html__( 'Upload marker image', 'konado' ),
				'group' => 'Marker 4'
			),
			array(
				'type' => 'textarea',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Description', 'konado' ),
				'param_name' => 'description4',
				'value' => '',
				'description' => esc_html__( 'Allowed HTML tags: a, i, em, br, strong, p, h4, h4, h4', 'konado' ),
				'group' => 'Marker 4'
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Latitude', 'konado' ),
				'param_name' => 'lat5',
				'value' => '',
				'group' => 'Marker 5'
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Longtitude', 'konado' ),
				'param_name' => 'long5',
				'value' => '',
				'group' => 'Marker 5'
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Address', 'konado' ),
				'param_name' => 'address5',
				'value' => '',
				'description' => esc_html__( 'If you donot enter coordinate, enter address here', 'konado' ),
				'group' => 'Marker 5'
			),
			array(
				'type' => 'attach_image',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Marker image', 'konado' ),
				'param_name' => 'marker5',
				'value' => '',
				'description' => esc_html__( 'Upload marker image', 'konado' ),
				'group' => 'Marker 5'
			),
			array(
				'type' => 'textarea',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Description', 'konado' ),
				'param_name' => 'description5',
				'value' => '',
				'description' => esc_html__( 'Allowed HTML tags: a, i, em, br, strong, p, h5, h5, h5', 'konado' ),
				'group' => 'Marker 5'
			),
		)
	) );
	
	//Counter
	vc_map( array(
		'name' => esc_html__( 'Counter', 'konado' ),
		'base' => 'konado_counter',
		'class' => '',
		'category' => esc_html__( 'Theme', 'konado'),
		'params' => array(
			array(
				'type' => 'attach_image',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Image icon', 'konado' ),
				'param_name' => 'image',
				'value' => '',
				'description' => esc_html__( 'Upload icon image', 'konado' ),
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Number', 'konado' ),
				'param_name' => 'number',
				'value' => '',
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Text', 'konado' ),
				'param_name' => 'text',
				'value' => '',
			),
		)
	) );
}
?>