<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-thumbnail">
        <?php leovu_thumbnail('thumbnail');?>
    </div>
    <div class="entry-header">
        <?php leovu_entry_header();?>
        <?php leovu_entry_meta();?>
    </div>
    <div class="entry-content">
        <?php leovu_entry_content();?>
        <?php (is_single()) ? leovu_entry_tag() : '';?>
    </div>
</article>