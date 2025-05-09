<?php 
function rander_iris_single_post_details() {
    ob_start(); ?>
    <?php if(is_single()): ?>
        <section>
            
        </section>
    <?php endif; ?>
   <?php return ob_get_clean();
}
add_shortcode('iris_single_post_details', 'rander_iris_single_post_details');