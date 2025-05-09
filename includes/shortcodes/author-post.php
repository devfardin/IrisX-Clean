<?php
function rander_iris_author_posts()
{
    ob_start();
    wp_enqueue_style("iris_blog_posts");

    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
    $query = new WP_Query([
        'post_type' => 'post',
        'post_status' => 'publish',
        'paged' => $paged,
    ]);

    ?>
    <section class="iris_post_container">
        <div class="iris_post_wrapper">
            <?php if (have_posts()): ?>
                <div class="irish_post__row">
                    <?php while (have_posts()):
                        the_post(); ?>

                        <article class="irish_post__inner_container">
                            <!-- Post Feature image -->
                            <div class="iris_post__feature">
                                <a href="<?php echo get_the_permalink(); ?>" rel="bookmark"
                                    aria-label="More about <?php echo get_the_title(); ?>">
                                    <?php the_post_thumbnail(''); ?>
                                </a>
                                <?php
                                $categories = get_the_terms(get_the_ID(), 'category');
                                if ($categories) {
                                    $first_three_categories = array_slice($categories, 0, 1, false);
                                    foreach ($first_three_categories as $category):
                                        $link = get_term_link($category, 'category'); ?>
                                        <a class='blog_post_category'
                                            href="<?php echo esc_url($link) ?>"><?php echo esc_html($category->name) ?> </a>
                                    <?php endforeach;
                                }
                                ; ?>
                            </div>
                            <!-- Post Info -->
                            <div class="blog_post_info_container">
                                <!-- post title -->
                                <a href="<?php echo get_the_permalink(); ?>" class="blog_post_title">
                                    <?php echo substr(get_the_title(), 0, 60) . '...'; ?>
                                </a>
                                <!-- post content -->
                                <p class="blog_post_content"> <?php
                                echo substr(get_the_content(), 0, 130) . '...'; ?>
                                </p>
                                <div class="blog_post_read_more_btn">
                                    <a href="<?php echo get_the_permalink(); ?>">Read More</a>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="8" height="11" viewBox="0 0 8 11" fill="none">
                                        <path
                                            d="M1.58331 0.25L0.232056 1.48375L4.62122 5.5L0.232056 9.51625L1.58331 10.75L7.33331 5.5L1.58331 0.25Z"
                                            fill="#622743" />
                                    </svg>
                                </div>
                                <!-- post author and Date -->
                                <div class="post_author_date_wrapper">
                                    <!-- post author -->
                                    <?php $author_id = get_the_author_meta('ID'); ?>
                                    <a href="<?php echo get_author_posts_url($author_id); ?>" class="blog_post_author_wrapper">
                                        <img class='blog_post__author_avatar' src="<?php echo get_avatar_url($author_id) ?>"
                                            alt="<?php echo get_the_author_meta('display_name', $author_id) ?>">

                                        <h3 class='auther_display_name'>
                                            <?php echo get_the_author_meta('display_name', $author_id); ?>
                                        </h3>
                                    </a>
                                    <div class="blog_post_date">
                                        <?php $post_time = get_post_time(); ?>
                                        <span> <?php echo date("d M Y", $post_time); ?> </span>
                                    </div>
                                </div>
                            </div>
                        </article>
                    <?php endwhile; ?>         <?php wp_reset_postdata(); ?>
                </div>

                <div class="blog_post_navigation" role="navigation">
                    <?php
                    global $wp_query;

                    echo paginate_links(array(
                        'total' => $wp_query->max_num_pages,
                        'current' => max(1, get_query_var('paged')),
                        'prev_text' => __('« Prev'),
                        'next_text' => __('Next »'),
                    ));
                    ?>
                </div>

            <?php else: ?>
                <h1 class='iris_no_post_message'> No posts are available at the moment </h1>
                <?php
            endif;
            ?>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
add_shortcode('iris_rander_author_posts', 'rander_iris_author_posts');