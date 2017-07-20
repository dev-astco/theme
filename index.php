<?php get_header();?>

    <section class="content">
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
    <section class="sidebar"><?php get_sidebar(); ?></section>

<?php get_footer();?>