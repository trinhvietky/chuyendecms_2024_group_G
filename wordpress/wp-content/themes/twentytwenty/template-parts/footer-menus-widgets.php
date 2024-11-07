<?php
/**
 * Displays the menus and widgets at the end of the main element.
 * Visually, this output is presented as part of the footer element.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

$has_footer_menu = has_nav_menu( 'footer' );
$has_social_menu = has_nav_menu( 'social' );

$has_sidebar_1 = is_active_sidebar( 'sidebar-1' );
$has_sidebar_2 = is_active_sidebar( 'sidebar-2' );
$has_sidebar_3 = is_active_sidebar( 'sidebar-3' );
$has_sidebar_4 = is_active_sidebar( 'sidebar-4' );

// Only output the container if there are elements to display.
if ( $has_footer_menu || $has_social_menu || $has_sidebar_1 || $has_sidebar_2 || $has_sidebar_3 || $has_sidebar_4) {
	?>

	<div class="footer-nav-widgets-wrapper header-footer-group">

		<div class="footer-inner section-inner">

			<?php

			$footer_top_classes = '';

			$footer_top_classes .= $has_footer_menu ? ' has-footer-menu' : '';
			$footer_top_classes .= $has_social_menu ? ' has-social-menu' : '';

			if ( $has_footer_menu || $has_social_menu ) {
				?>
				<div class="footer-top<?php echo $footer_top_classes; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static output ?>">
					<?php if ( $has_footer_menu ) { ?>

						<nav aria-label="<?php esc_attr_e( 'Footer', 'twentytwenty' ); ?>" class="footer-menu-wrapper">

							<ul class="footer-menu reset-list-style">
								<?php
								wp_nav_menu(
									array(
										'container'      => '',
										'depth'          => 1,
										'items_wrap'     => '%3$s',
										'theme_location' => 'footer',
									)
								);
								?>
							</ul>

						</nav><!-- .site-nav -->

					<?php } ?>
					<?php if ( $has_social_menu ) { ?>

						<nav aria-label="<?php esc_attr_e( 'Social links', 'twentytwenty' ); ?>" class="footer-social-wrapper">

							<ul class="social-menu footer-social reset-list-style social-icons fill-children-current-color">

								<?php
								wp_nav_menu(
									array(
										'theme_location'  => 'social',
										'container'       => '',
										'container_class' => '',
										'items_wrap'      => '%3$s',
										'menu_id'         => '',
										'menu_class'      => '',
										'depth'           => 1,
										'link_before'     => '<span class="screen-reader-text">',
										'link_after'      => '</span>',
										'fallback_cb'     => '',
									)
								);
								?>

							</ul><!-- .footer-social -->

						</nav><!-- .footer-social-wrapper -->

					<?php } ?>
				</div><!-- .footer-top -->

			<?php } ?>

			<?php if ( $has_sidebar_1 || $has_sidebar_2|| $has_sidebar_3||$has_sidebar_4 ) { ?>

				<aside class="footer-widgets-outer-wrapper">

					<div class="footer-widgets-wrapper">

						<?php if ( $has_sidebar_1 ) { ?>

							<div class="footer-widgets column-one grid-item">
								<?php dynamic_sidebar( 'sidebar-1' ); ?>
							</div>

						<?php } ?>

						<?php if ( $has_sidebar_2 ) { ?>

							<div class="footer-widgets column-two grid-item">
								<?php dynamic_sidebar( 'sidebar-2' ); ?>
							</div>

						<?php } ?>

						<?php if ( $has_sidebar_3 ) { ?>

							<div class="footer-widgets column-two grid-item">
								<?php dynamic_sidebar( 'sidebar-3' ); ?>
							</div>

						<?php } ?>

						<?php if ( $has_sidebar_4 ) { ?>

							<div class="footer-widgets column-two grid-item">
								<?php dynamic_sidebar( 'sidebar-4' ); ?>
							</div>

						<?php } ?>

					</div><!-- .footer-widgets-wrapper -->

				</aside><!-- .footer-widgets-outer-wrapper -->

			<?php } ?>

		</div><!-- .footer-inner -->

	</div><!-- .footer-nav-widgets-wrapper -->
	<?php
/* Template Name: Article Grid */
get_header(); ?>

<style>
/* CSS để tùy chỉnh layout dạng lưới */
.responsive-article-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
    margin: 20px auto;
    max-width: 1200px;
}

.responsive-article {
    width: 30%;
    border: 1px solid #e0e0e0;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    background-color: #fff;
}

.responsive-article:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
}

.responsive-article img {
    width: 100%;
    height: auto;
    object-fit: cover;
}

.responsive-article h3 {
    font-size: 1.3em;
    font-weight: bold;
    color: #333;
    margin: 20px 0;
    padding: 0 10px;
}

.responsive-article p {
    font-size: 1em;
    color: #555;
    padding: 0 15px 20px;
    margin: 0;
}

.responsive-article p strong {
    color: #000;
}

/* Responsive - hiển thị 1 bài trên mỗi dòng khi màn hình nhỏ hơn 768px */
@media (max-width: 768px) {
    .responsive-article {
        width: 100%;
        margin-bottom: 20px;
    }
}

@media (max-width: 480px) {
    .responsive-article h3 {
        font-size: 1.1em;
    }

    .responsive-article p {
        font-size: 0.9em;
    }
}

</style>

<div class="responsive-article-container">
    <?php
    // Truy vấn để lấy các bài viết mới nhất
    $args = array(
        'post_type' => 'post', // Thay 'post' nếu bạn không dùng custom post type
        'posts_per_page' => 3 // Số lượng bài viết hiển thị
    );
    $query = new WP_Query($args);

    // Vòng lặp WordPress (The Loop)
    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post(); ?>
            <div class="responsive-article">
                <?php if (has_post_thumbnail()) : ?>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('medium'); ?>
                    </a>
                <?php endif; ?>
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                <div class="post-content">
                    <?php the_content(); // Hiển thị nội dung bài viết ?>
                </div>
            </div>
        <?php endwhile;
    else :
        echo '<p>Không tìm thấy bài viết nào.</p>';
    endif;

    // Reset Post Data
    wp_reset_postdata();
    ?>
</div>



<?php get_footer(); ?>

	<?php
}
