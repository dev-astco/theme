<?php get_header();?>
<div class="content">
    <section id="main-content">
        <?php if(have_posts()):
                while(have_posts()): the_post();
                    get_template_part('content',get_post_format());
                    ?> <h4><?php the_title();?></h4><?php
                endwhile;
                leovu_pagination();
            else:
                get_template_part('content','none');
            endif;
        ?>
    </section>
    <section id="sidebar"><?php get_sidebar(); ?></section>
</div>
<?php get_footer();?>