<?php get_header();?>
<div class="content">
    <section id="main-content">
        <?php 
            _e('<h2>404 NOT FOUND</h2>', 'leovu');
            _e('<p>The article you were looking for was not found, but maybe try looking again!</p>', 'leovu');
            //show search form
            get_search_form();
            //show list categories **** ham nay kha hay,nen xem ki
            _e('<h3>Content categories</h3>', 'leovu');
            echo '<div class="404-catlist">';
            wp_list_categories( array( 'title_li' => '','show_count'=>true, ) );
            echo '</div>';
            //show list tag
            _e('<h3>Tag Cloud</h3>', 'leovu');
            wp_tag_cloud();
        ?>
    </section>
    <section id="sidebar"><?php get_sidebar(); ?></section>
</div>
<?php get_footer();?>