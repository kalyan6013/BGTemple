<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>" />

<link rel="alternate" id="templateurl" href="<?php echo get_template_directory_uri(); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link href="https://fonts.googleapis.com/css?family=Athiti" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lora|PT+Sans+Caption" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">

<?php 
if ( function_exists( 'fw_get_db_customizer_option') ) {
  $enable_responsive = fw_get_db_customizer_option( 'enable_responsive');
}
?>
<?php if(isset($enable_responsive) && ($enable_responsive == 'no')){ } else { ?>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="format-detection" content="telephone=no">
<?php } ?>

<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
