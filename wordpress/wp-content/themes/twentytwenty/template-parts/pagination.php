<?php
/**
 * A template partial to output pagination for the Twenty Twenty default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

// Import Font Awesome (nếu chưa sử dụng Font Awesome trong theme)
function add_font_awesome() {
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css' );
}
add_action( 'wp_enqueue_scripts', 'add_font_awesome' );

$prev_text = sprintf(
    '%s <span class="nav-prev-text">%s</span>',
    '<i class="fas fa-arrow-left"></i>', // Sử dụng Font Awesome cho mũi tên trái
    __( 'Newer <span class="nav-short">Posts</span>', 'twentytwenty' )
);

$next_text = sprintf(
    '<span class="nav-next-text">%s</span> %s',
    __( 'Older <span class="nav-short">Posts</span>', 'twentytwenty' ),
    '<i class="fas fa-arrow-right"></i>' // Sử dụng Font Awesome cho mũi tên phải
);

$posts_pagination = get_the_posts_pagination(
    array(
        'mid_size'  => 1,
        'prev_text' => $prev_text,
        'next_text' => $next_text,
    )
);

// Nếu không có link trang trước, thêm một placeholder với visibility: hidden để giữ vị trí.
if ( false === strpos( $posts_pagination, 'prev page-numbers' ) ) {
    $posts_pagination = str_replace( '<div class="nav-links">', '<div class="nav-links"><span class="prev page-numbers placeholder" aria-hidden="true">' . $prev_text . '</span>', $posts_pagination );
}

// Nếu không có link trang tiếp theo, thêm một placeholder với visibility: hidden để giữ vị trí.
if ( false === strpos( $posts_pagination, 'next page-numbers' ) ) {
    $posts_pagination = str_replace( '</div>', '<span class="next page-numbers placeholder" aria-hidden="true">' . $next_text . '</span></div>', $posts_pagination );
}

if ( $posts_pagination ) { ?>

    <div class="pagination-wrapper section-inner">

        <!-- Bạn có thể xóa dòng separator này nếu không cần thiết -->
        <hr class="styled-separator pagination-separator is-style-wide" aria-hidden="true" />

        <?php echo $posts_pagination; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- đã được escape trong quá trình tạo. ?>

    </div><!-- .pagination-wrapper -->

<?php } ?>
