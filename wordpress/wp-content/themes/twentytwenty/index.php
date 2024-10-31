<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>

<main id="site-content">

    <?php if (have_posts()) : ?>
        <div class="post-list">
            <?php while (have_posts()) : the_post(); ?>
			
                <div class="post-item">
					<!-- Cột trái: Hình ảnh -->
					<div class="post-thumbnail">
						<?php
						if (has_post_thumbnail()) {
							the_post_thumbnail('medium');
						} else {
							echo '<img src="' . get_template_directory_uri() . '/assets/images/default-thumbnail.jpg" alt="Default Thumbnail">';
						}
						?>
					</div>
                    <!-- Cột trái: Thời gian -->
                    <div class="post-date">
                        <span class="day"><?php echo get_the_date('d'); ?></span>
                        <span class="month"><?php echo get_the_date('F'); ?></span>
                    </div>

                    <!-- Cột phải: Tiêu đề và Nội dung -->
                    <div class="post-info">
                        <h2 class="post-title">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h2>
                        <p class="post-excerpt">
                            <?php 
                            $excerpt = wp_strip_all_tags(get_the_excerpt());
                            echo mb_strimwidth($excerpt, 0, 100, ' [...]');
                            ?>
                        </p>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>

</main>

<style>
	/* Bố cục container của danh sách bài viết */
.post-list {
    display: flex;
    flex-direction: column;
    gap: 20px;
	background-color: white;
	margin: 0 auto;
	width: 80%;

}

/* Bố cục của từng bài viết */
.post-item {
    display: flex;
    border-bottom: 1px solid #ddd;
    /* padding-bottom: 10px; */
	margin: 10px;
	background-color: antiquewhite;
}

/* Cột trái: Thời gian */
.post-date {
    width: 20%;
    text-align: center;
    font-weight: bold;
    font-size: 18px;
    color: #555;
    display: flex;
    flex-direction: column;
    justify-content: center;
	border-right:2px solid black ;
	
}

.post-date .day {
    font-size: 32px;
    color: #0073aa;
}

.post-date .month {
    font-size: 16px;
    text-transform: uppercase;
}

/* Cột phải: Tiêu đề và nội dung */
.post-info {
    width: 80%;
    padding-left: 15px;
	margin-left: 50px;

}

.post-title {
    font-size: 22px;
    margin: 0 0 5px;
}

.post-title a {
    text-decoration: none;
    color: #0073aa;
}

.post-title a:hover {
    text-decoration: underline;
}

.post-excerpt {
    font-size: 16px;
    color: #555;
    margin: 0;
}

/* Responsive: Bố cục dọc trên thiết bị nhỏ */
@media (max-width: 768px) {
    .post-item {
        flex-direction: column;
    }

    .post-date {
        width: 100%;
        margin-bottom: 10px;
    }

    .post-info {
        width: 100%;
        padding-left: 0;
    }
}

</style>

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php
get_footer();
