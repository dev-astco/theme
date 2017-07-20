
<?php 
/*
 Template Name: full Width
 */

?>

<?php get_header();?>
<div class="content">
    <section id="main-content full-width">
        <?php if(have_posts()):
                while(have_posts()): the_post();
                    get_template_part('content',get_post_format());
                endwhile;
                leovu_pagination();
            else:
                get_template_part('content','none');
            endif;
        ?>
    </section>
  
</div>
<?php get_footer();?>