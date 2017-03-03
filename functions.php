<?php


// Function to add subscribe text to posts and pages
function my_theme_enqueue_styles() {

    $parent_style = 'parent-style'; 

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
       wp_enqueue_style( $parent_style, get_template_directory_uri() . '/styles/style-shortcodes.css' );
          wp_enqueue_style( $parent_style, get_template_directory_uri() . '/styles/style-portfolio.css' );
             wp_enqueue_style( $parent_style, get_template_directory_uri() . '/styles/style-responsive.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

function childtheme_create_stylesheet() {
    $templatedir = get_bloginfo('template_directory');
    $stylesheetdir = get_bloginfo('stylesheet_directory');
    ?>
    <link rel="stylesheet" type="text/css" href="<?php echo $templatedir ?>/library/styles/reset.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $templatedir ?>/library/styles/typography.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $templatedir ?>/library/styles/images.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $templatedir ?>/library/layouts/2c-l-fixed.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $templatedir ?>/library/styles/18px.css" />
     
    <?php    
}

function gno_input_sliderhome() {
global $thinkup_homepage_sliderswitch;
global $thinkup_homepage_slidername;
global $thinkup_homepage_sliderpreset;
global $thinkup_homepage_sliderspeed;
global $thinkup_homepage_sliderstyle;

$thinkup_class_fullwidth = NULL;
$thinkup_class_style     = NULL;
$thinkup_data_speed      = NULL;
$slide_image             = NULL;
$slider_toggle           = NULL;

    if ( is_front_page() or thinkup_check_ishome() ) {
        // Check if any slides have been assigned to ThinkUpSlider
        if ( isset( $thinkup_homepage_sliderpreset ) and is_array( $thinkup_homepage_sliderpreset ) ) {
            foreach( $thinkup_homepage_sliderpreset as $slide ) {
                $slide_image_url = $slide['slide_image_url'];
                if( ! empty( $slide_image_url ) ) {
                    $slider_toggle = '1';   
                }
            }
        }

        // Set slider speed data attribute
        if ( empty( $thinkup_homepage_sliderspeed ) ) {
            $thinkup_homepage_sliderspeed = 'off';
        } else {
            $thinkup_homepage_sliderspeed = $thinkup_homepage_sliderspeed * 1000;
        }

        $thinkup_data_speed = ' data-speed="' . $thinkup_homepage_sliderspeed . '"';

        // Set slider style class

        if ( empty( $thinkup_homepage_sliderstyle ) or $thinkup_homepage_sliderstyle == 'option1' ) {
            $thinkup_class_style = ' class="style1"';
        } else if ( $thinkup_homepage_sliderstyle == 'option2' ) {
            $thinkup_class_style = ' class="style2"';
        } else if ( $thinkup_homepage_sliderstyle == 'option3' ) {
            $thinkup_class_style = ' class="style3"';
        }

        if ( empty( $thinkup_homepage_sliderswitch ) or $thinkup_homepage_sliderswitch == 'option1' ) {
            echo '<div id="slider"' . $thinkup_class_style . '><div id="slider-core">',
                 '<div class="rslides-container"' . $thinkup_data_speed . '><div class="rslides-inner"><ul class="slides">';
                if ( empty( $slider_toggle ) ) {                 
                    echo '<li><img src="' . get_template_directory_uri() . '/images/transparent.png" style="background: url(' . get_template_directory_uri() . '/images/slideshow/placeholder_image.png) no-repeat center; background-size: cover;" alt="Demo Image" /></li>';
                    echo '<li><img src="' . get_template_directory_uri() . '/images/transparent.png" style="background: url(' . get_template_directory_uri() . '/images/slideshow/placeholder_image.png) no-repeat center; background-size: cover;" alt="Demo Image" /></li>';
                    echo '<li><img src="' . get_template_directory_uri() . '/images/transparent.png" style="background: url(' . get_template_directory_uri() . '/images/slideshow/placeholder_image.png) no-repeat center; background-size: cover;" alt="Demo Image" /></li>';
                } else if (isset($thinkup_homepage_sliderpreset) && is_array($thinkup_homepage_sliderpreset)) {
                   // Input slider content for specified stlyle
                    if ( empty( $thinkup_homepage_sliderstyle ) or $thinkup_homepage_sliderstyle == 'option1' ) {
                        thinkup_input_sliderhomestandard();
                    } else if ( $thinkup_homepage_sliderstyle == 'option2' or $thinkup_homepage_sliderstyle == 'option3' ) {
                        thinkup_input_sliderhomevideo();
                    }
                }
            echo '</ul></div>eat at joes';
                gno_presentedby();
            echo '</div>',
                 '</div></div>';
        } else if ( $thinkup_homepage_sliderswitch !== 'option2' or empty( $thinkup_homepage_slidername ) ) {
            echo '';
        } else {
            echo    '<div id="slider"><div id="slider-core">',
                do_shortcode( $thinkup_homepage_slidername ),
                '</div></div>';
        }
    }
}

function gno_presentedby(){
echo '<h3>
<div class="gno-banner"><strong>Presented by:</strong><br><i>H.Britton Sanderford Jr., Patrick F. Taylor Foundation, and Tulane University </i></div>
<div class="gno-banner-small">In partnership with: <i>Core Element, University of New Orleans, and Women for a Better Louisiana</i></div>
</h3>';
}

include 'gn_settings.php';
?>