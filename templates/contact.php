<?php 
/*
 Template Name: Contact
 */

?>
<?php get_header();?>
<div class="content">
    <section id="main-content">
        <div class="contact-info">
            <h4>Contact Info</h4>
            <p>195 Hampshire,Sunshine</p>
            <p>Phone: 03040540</p>
        </div>
        <div class="contact-info">
<!--           Dung echo do_shortcode to print content-->
            <?php echo do_shortcode('[contact-form-7 id="1719" title="Contact form 1"]'); ?>
        </div>
    </section>
    <section id="sidebar"><?php get_sidebar(); ?></section>
</div>
<?php get_footer();?>

