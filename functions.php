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