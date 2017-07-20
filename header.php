<!DOCTYPE html>

<html lang="<?php language_attributes(); ?>"><!--return to default lang="en-US"-->


<head>
    
    <meta charset="<?php bloginfo('charset'); ?>" /><!--return to default is UTF-8-->
    <link rel="profile" href="http://gmgp.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php wp_head();?>
</head>

<body <?php body_class();?>>
    
    <div class="container"><!--BEGIN CONTAINER-->
        <div class="header">
        <?php
            leovu_header();
            leovu_menu('primary-menu');
        
        ?>
        </div>