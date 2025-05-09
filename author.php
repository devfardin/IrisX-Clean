<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>
<div class="cfx-body">
    <div id="content">
        <?php echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display(474); ?>
    </div>
</div>

<?php
get_footer();