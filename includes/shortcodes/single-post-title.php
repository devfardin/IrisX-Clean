<?php
function rander_iris_single_post_title()
{
    ob_start(); ?>
    <?php if (is_single()): ?>
        <style>
            .iris_single_post_title {
                font-family: "Montserrat", Sans-serif;
                font-size: 30px;
                font-weight: 700;
                line-height: 1.2em;
                color: var(--e-global-color-kadence3);
                text-align: center;
                margin-bottom: -15px;
            }

            @media only screen and (min-width: 768px) {
                .iris_single_post_title {
                    font-size: 35px;
                    margin-bottom: -20px;
                }
            }

            @media only screen and (min-width: 992px) {
                .iris_single_post_title {
                    font-size: 40px;
                    margin-bottom: -20px;
                }
            }
        </style>
        <h2 class="iris_single_post_title">
            <?php echo get_the_title(); ?>
        </h2>
    <?php endif; ?>
    <?php return ob_get_clean();
}
add_shortcode('iris_single_post_title', 'rander_iris_single_post_title');