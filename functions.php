<?php
/**
@ Define constant variable
**/

define ('THEME_URL',get_stylesheet_directory());
define('CORE', THEME_URL."/core");

/**
@ Load file /core/init.php
**/
require_once(CORE."/init.php");

/*Setup content width*/
if(!isset($content_width)){
    $content_width=620;
}

/* Theme functional declair*/
/*Điều này có nghĩa là, hàm thachpham_theme_setup() sẽ được tạo mới nếu máy chủ kiểm tra chưa có hàm đó tồn tại. Sau đó, hàm này sẽ được móc vào action hook init của WordPress để nó sẽ được thực thi sau khi WordPress đã load xong trang.*/
if(!function_exists('leovu_theme_setup')){
    function leovu_theme_setup(){
        /*
        * Thiết lập theme có thể dịch được
        */
        $language_folder= THEME_URL .'/languages';

        /*Cái textdomain nghĩa là một cái tên nhận diện các chuỗi mà chúng ta sẽ cho phép dịch trong theme*/
        load_theme_textdomain('leovu',$language_folder);

        /*
        * Tự chèn RSS Feed links trong <head>
        tự thêm một liên kết RSS Feed chèn trong cặp thẻ <head> trong mã nguồn website để các trình đọc RSS Feed có thể hiểu trực tiếp địa chỉ RSS Feed trong website của bạn mà không cần khai báo chính xác địa chỉ RSS Feed, tạo sự thuận tiện cho người đọc.
        */
        add_theme_support('automatic-feed-links');


        /*
        * Thêm chức năng post thumbnail
        */
        add_theme_support('post-thumbnails');
        
        /*
        * Thêm chức năng post format
        */
        add_theme_support( 'post-formats',
            array(
               'image',
               'video',
               'gallery',
               'quote',
               'link'
            )
         );
        
        add_theme_support('title-tag');
        
        /*
        * Thêm chức năng custom background
        */
        $default_background = array(
           'default-color' => '#1e73be',
        );
        add_theme_support( 'custom-background', $default_background );

        /*Them side bar*/
        $side_bar= array(
            'name'=>__('Main Sidebar','leovu'),
            'id'=>'main-sidebar',
            'description'=>__('Default Sidebar'),
            'class'=>'main-sidebar',//class to write CSS
            'before_title'=>'<h3 class="widget-title">',
            'after_title'=>'</h3>'
        );
        register_sidebar($side_bar);
        
        /*Theme menu*/
        
       register_nav_menu ( 'primary-menu', __('Primary Menu', 'leovu') );
        
        
    }
    add_action('init','leovu_theme_setup');
}

/*------------------------------------------------------ */
/*------------------ TEMPLATE FUNCTION ------------------*/
/*------------------------------------------------------ */

/*---------------------*/
/*THIET LAP HEADER LOGO*/
/*---------------------*/
if(!function_exists('leovu_header'))
{
    function leovu_header(){?>
        
        <div class="logo"><!--BEGIN LOGO-->
            <div class="site-name"><!--BEGIN SITE-NAME-->
                <?php
                    if(is_home()){
                        printf('<h1><a href="%1$s" title="%2$s">%3$s</a></h1>',
                        get_bloginfo('url'),
                        get_bloginfo('desciption'),
                        get_bloginfo('sitename'));
                    }
                    else{
                        printf('<p><a href="%1$s" title="%2$s">%3$s</a></p>',
                        get_bloginfo('url'),
                        get_bloginfo('desciption'),
                        get_bloginfo('sitename'));
                    }
                ?>
            </div><!--END SITE-NAME-->
            <div class="site-description"><?php bloginfo('description');?></div>
        </div><!--END LOGO-->
        <?php
    }
}

/*--------------*/
/*THIET LAP MENU*/
/*--------------*/
if(!function_exists('leovu_menu'))
{
    function leovu_menu($menu){
        $menu = array(
            'theme_localion'=>$menu,
            'cotainer'=>'nav',
            'container_class'=>$menu
        );
        wp_nav_menu($menu);
        
    }
}

/*--------------*/
/*  PAGINATION  */
/*--------------*/

if(!function_exists('leovu_pagination')){
    function leovu_pagination(){
        if($GLOBALS['wp_query']->max_num_pages < 2){
            return '';
        } ?>
        <nav class="pagination" role="navigation">
        <?php if(get_next_posts_link()):?>
            <div class="prev"><?php next_posts_link(__('Older Posts','leovu')) ;?></div>
        <?php endif; ?>  
        <?php if(get_previous_posts_link()):?>
            <div class="next"><?php previous_posts_link(__('Newer Posts','leovu')) ;?></div>
        <?php endif; ?>   
        </nav>
        <?php
        
    }
}

/*------------------*/
/* POST THUMBNAIL   */
/*------------------*/
if(!function_exists('leovu_thumbnail')){
    function leovu_thumbnail($size){
        if(!is_single() && has_post_thumbnail() && !post_password_required() || has_post_format('image')):?>
        <figure class="post-thumbnail"><?php the_post_thumbnail($size);?></figure>
        <?php endif;
        
    }
}
    