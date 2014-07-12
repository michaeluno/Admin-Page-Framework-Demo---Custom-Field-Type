<?php
/* Plugin Name: Admin Page Framework Demo - Custom Field TYpe
 */ 

if ( ! class_exists( 'AdminPageFramework' ) ) {
    include_once( dirname( __FILE__ ) . '/library/admin-page-framework.min.php' );
}
    
class APF_Demo_CustomFieldType extends AdminPageFramework {

	public function setUp() {

		$this->setRootMenuPage( 'Settings' );	// where to belong
		$this->addSubMenuItem(
			array(
				'title'		=>	__( 'Custom Field Type', 'admin-page-framework-demo-custom-field-type' ),	// page and menu title
				'page_slug'	=>	'apf_demo_submit_hooks'	// page slug
			)
		);
			
		$this->addSettingSections(	
			array(
				'section_id'	=>	'sbutmit_hooks',	
				'title'			=>	__( 'Custom Field Type Demo', 'admin-page-framework-demo-custom-field-type' ),
				'page_slug'		=>	'apf_demo_submit_hooks',	
				'repeatable'	=>	true,
			)
		);
		
		$this->addSettingFields(
			'sbutmit_hooks',	// the target section ID
			array(	
				'field_id'		=>	'my_text_field',
				// 'title'			=>	__( 'Repeatable Text Inputs', 'admin-page-framework-demo-custom-field-type' ),
				'type'			=>	'my_custom_field_type',	//	<-- Here specify your own field type slug
				'label'			=>	array(
					'url'	=>	__( 'URL', 'admin-page-framework-demo-custom-field-type' ),
					'title'	=>	__( 'Title', 'admin-page-framework-demo-custom-field-type' ),
					// 'extra'	=>	__( 'Extra', 'admin-page-framework-demo-custom-field-type' ),	// <-- add more as you need
				),
				'repeatable'	=>	true,	
			)
		);
		
	}			
		    
	/**
	 * Do something in the page.
	 * 
	 * @remark	This is a pre-defined framework method.
	 */
	public function do_apf_demo_submit_hooks() {	// do_{page slug}
		submit_button();	// Add a submit button
	}
					
			
}

if ( is_admin() ) {	
	include_once( dirname( __FILE__ ) . '/field_type/MyCustomFieldType.php' );
	new MyCustomFieldType( 'APF_Demo_CustomFieldType' );
	new APF_Demo_CustomFieldType();	
}
