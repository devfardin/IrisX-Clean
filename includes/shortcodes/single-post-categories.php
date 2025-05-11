<?php
function iris_render_single_post_categories(){
    ob_start();
    wp_enqueue_style("iris_single_post_categories");

    $all_categories = get_categories( array(
        'taxonomy' => 'category',
        'orderby' => 'post',
        'order'   => 'ASC'

    ) );

    $current_posts_categories = get_the_terms( get_the_ID(), 'category') ;
    $current_posts_first_category_id=null;
    if( is_array( $current_posts_categories )){
        $current_posts_first_category_id = $current_posts_categories[0]->term_id;
    }; ?>


    <ul class='cf_single_post_categories'>
     
        <?php foreach( $all_categories as $category ):  ?>
        <li>
            <a href="<?php echo get_term_link($category, 'case-study-category')  ?>" class="<?php echo ( $category->term_id == $current_posts_first_category_id ) ? 'single_post_category_active': 'single_post_category' ?>">
                <?php echo $category->name; ?>
            </a>
        </li>
        <?php endforeach; ?>
    </ul>

    <?php
    return ob_get_clean();
}
add_shortcode( 'iris_single_post_categories', 'iris_render_single_post_categories');