<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-thumbnail">
        <?php leovu_thumbnail('large');?>
    </div>
    <div class="entry-header">
        <?php leovu_entry_header();?>
        <?php 
            $attachment= get_children(array('post-parent'=>$post->ID));
            $attachment_number=count($attachment);
            printf(__('This image post contains %1$s','leovu'),$attachment_number);
        ?>
    </div>
    <div class="entry-content">
        <?php leovu_entry_content();?>
        <?php (is_single()) ? leovu_entry_tag() : '';?>
    </div>
</article>