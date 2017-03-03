<?php 
add_action( 'customize_preview_init' , 'gn_settings_preview' );
function gn_settings_preview() {
	wp_enqueue_script( 
		'gn_settings',
		get_template_directory_uri() . '/gnosef.js',
		array(  'jquery', 'customize-preview' ),
		'',
		true
	);

}

add_action('wp_head', 'gn_dynamic_css');
function gn_dynamic_css(){
	?>
	<style type="text/css">
		#header {
			background-color:<?php echo get_theme_mod('gn_header_bg_color') ?>;
		}
		.header-style2.header-sticky #header-links {
			background-color:<?php echo get_theme_mod('gn_header_bg_color') ?>;
		}
		.header-style1.header-sticky #header {
			background-color:<?php echo get_theme_mod('gn_header_bg_color') ?>;
		}
	</style>
	<?php 
}

function gn_settings_register ($wp_customize){
$wp_customize->add_section(
	'gn_color_options',
	array(
		'title'	=>__('GNOSEF Theme Settings', 'minamaze_pro-child'),
		'priority' => 3,
		'capability'=> 'edit_theme_options',
		'description'=>__('Change GNOSEF specific settings', 'minamaze_pro-child'),
		)
	);

$wp_customize->add_setting( 'gn_header_bg_color',
	array(
		'default' => '333333',
		'transport' => 'postMessage'
	)
);   

$wp_customize->add_control( new WP_Customize_Color_Control( 
	$wp_customize, 
	'gn_header_bg_color_control',
	array(
		'label'    => __( 'Header Background Color', 'minamaze_pro-child' ), 
		'section'  => 'gn_color_options',
		'settings' => 'gn_header_bg_color',
		'priority' => 10,
	) 
));
	}
	add_action('customize_register','gn_settings_register');



 ?>
