<?php
function iris_cleaning_customer_latest_reviews()
{
    ob_start();
    wp_enqueue_style("iris_cleaning_services_reviews");
    $args = array(
        'post_type' => 'wpm-testimonial',
        'post_status' => 'publish',
        'posts_per_page' => 3,
    );
    $query = new \WP_Query($args);

    ?>
    <section class="iris_cleaning_reviews_container">
        <div class="iris_cleaning_revews_wrapper">
            <?php if ($query->have_posts()): ?>
                <div class="iris_cleaning_revews__row">
                    <?php while ($query->have_posts()):
                        $query->the_post(); ?>
                        <div class="iris_cleaning_innter_container">
                            <!-- client rating START -->
                            <div class="client_rating">
                                <?php
                                $value = (int) get_post_meta(get_the_ID(), 'star_rating', true);
                                echo str_repeat('<span class="fill">★</span>', $value) . str_repeat('<span class="out">☆</span>', 5 - $value);
                                ?>
                            </div>
                            <!-- Client rating END -->
                            <!-- client comments START -->
                            <div class="client_comment">
                                <p><?php echo get_the_content() ?></p>
                            </div>
                            <!-- client comments END -->
                            <!-- Clint info START -->
                            <div class="reviews_author">
                                <div class="author_feature">
                                    <?php the_post_thumbnail('widget-thumbnail'); ?>
                                </div>
                                <div class="author_name">
                                    <?php echo get_post_meta(get_the_ID(), 'client_name', true); ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php else: ?>
                <h1 class='iris_no_post_message'> No Reviews are available at the moment </h1>
                <?php
            endif;
            ?>
        </div>
    </section>

    <?php
    wp_reset_postdata();
    return ob_get_clean();
}
add_shortcode('rander_iris_cleaning_service_latest_reviews', 'iris_cleaning_customer_latest_reviews');
