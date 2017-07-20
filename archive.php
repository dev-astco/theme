<?php get_header();?>
<div class="content">
    <section id="main-content">
        <div class="archive-title">
            <?php
                if(is_tag()){
                    /*single_tag_title( $prefix, $display ) Displays or returns the tag title for the current archive page.
                    @$prefix
                        (string) (optional) Text to output before the title.
                        Default: None
                    @$display
                        (boolean) (optional) Display the title (TRUE), or return the title to be used in PHP (FALSE).
                        Default: TRUE
                    */
                    printf(__('Posts tagged','leovu'),single_tag_title('',false));
                }elseif (is_category()){
                    printf(__('Posts categorized %1$s','leovu'),single_tag_title('',false));
                }elseif (is_day()){
                    printf(__('Daily Archives %1$s','leovu'),get_the_time('l,F,j,Y'));
                }elseif (is_month()){
                    printf(__('Monthly Archives %1$s','leovu'),get_the_time('F,Y'));
                }elseif(is_year()){
                    printf(__('Monthly Archives %1$s','leovu'),get_the_time('Y'));
                }
            ?>
            </div>
            <?php if( is_category() || is_tag())?>
            
<!-- term_description( $term_id, $taxonomy )  EXPLAINATION
               this template tag returns the description of a given term. A term ID and taxonomy are as parameters. If no term ID is passed, the description of current queried term (e.g. post category or tag) will be returned.
               
               echo term_description( $term_id, $taxonomy )
               
               @ term_id
                    (integer) (Optional) The ID of the term to return a description.
                    Default: ID of current query term
               @ taxonomy
                    (string) (Optional) The slug of the taxonomy the term belongs to. Valid values:
                    'category'
                    'post_tag'
                    'link_category'
                    A custom taxonomy slug
                    Default: post_tag
-->
                <div class="archive-description"><?php echo term_description();?></div>
            
        
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
    <section id="sidebar"><?php get_sidebar(); ?></section>
</div>
<?php get_footer();?>