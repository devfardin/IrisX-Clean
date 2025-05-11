<?php
function rander_iris_single_post_details()
{
    ob_start();
    wp_enqueue_style("iris_single_post_style"); ?>

    <?php if (is_single()): ?>
        <section class="iris_single_post_container">
            <!-- single post feature image -->
            <div class="iris_single_post_feature">
                <?php echo the_post_thumbnail(''); ?>
            </div>
            <!-- single post category and date wrapper-->
            <div class="iris_single_post_category_date_wrapper">
                <!-- single category -->
                <div class="single_post_category">
                    <?php
                    $categories = get_the_terms(get_the_ID(), 'category');
                    if (is_array($categories)) {
                        $first_three_categories = array_slice($categories, 0, 4, false);
                        foreach ($first_three_categories as $category):
                            $link = get_term_link($category, 'category'); ?>
                            <a href="<?php echo esc_url($link) ?>"><?php echo esc_html($category->name) ?></a>
                        <?php endforeach;
                    }
                    ; ?>
                </div>
                <!-- single post date -->
                <div class="single_post_date_time">
                    <?php $post_time = get_post_time(); ?>
                    <span> <?php echo date("h:i a, d M Y", $post_time); ?> </span>
                </div>
            </div>
            <!-- single post container -->
            <div class="iris_single_post_content">
                <?php echo get_the_content(); ?>
            </div>
            <!-- single post comment box -->
            <div class="single_post_comment_box">
             <?php  comments_template('/comments.php', true ); ?>
            </div>

        </section>
    <?php endif; ?>
    <?php return ob_get_clean();
}
add_shortcode('iris_single_post_details', 'rander_iris_single_post_details');