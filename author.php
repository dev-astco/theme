<?php get_header();?>
<div class="content">
    <section id="main-content">
        <div class="author-box">
            <?php get_template_part('author-bio');?>   
        </div>
        <?php if(have_posts()):
                while(have_posts()): the_post();
                    get_template_part('content',get_post_format());
                endwhile;
            
            else:
                get_template_part('content','none');
            endif;
        ?>
    </section>
    <section id="sidebar"><?php get_sidebar(); ?></section>
</div>
<?php get_footer();?>