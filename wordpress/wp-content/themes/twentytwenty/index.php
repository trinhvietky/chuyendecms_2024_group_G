<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

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


<style>
	/* Bố cục container của danh sách bài viết */
	.post-list {
		display: flex;
		flex-direction: column;
		gap: 20px;
		margin-left: 50px;
		margin-right: 50px;
		margin-bottom: 10px;
		width: 50%;
		margin: 0 auto;

	}

	/* Bố cục của từng bài viết */
	.post-item {
		display: flex;
		/* border-bottom: 1px solid #ddd; */
		padding-bottom: 10px;
		margin: 10px;
		/* background-color: antiquewhite; */
		box-shadow: 5px 6px rgba(0, 0, 0, 0.1);
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
		/* justify-content: center; */
		border-right: 1px solid black;
		/* padding-right: 10px; */

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
		/* padding-left: 15px; */
		margin-left: 30px;

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

	.form-control-borderless {
		border: none;
	}

	.form-control-borderless:hover,
	.form-control-borderless:active,
	.form-control-borderless:focus {
		border: none;
		outline: none;
		box-shadow: none;
	}
</style>

<main id="site-content">

	<?php

	$archive_title    = '';
	$archive_subtitle = '';

	if (is_search()) {
		/**
		 * @global WP_Query $wp_query WordPress Query object.
		 */
		global $wp_query;

		$archive_title = sprintf(
			'%1$s %2$s',
			'<span class="color-accent">' . __('Search:', 'twentytwenty') . '</span>',
			'&ldquo;' . get_search_query() . '&rdquo;'
		);

		if ($wp_query->found_posts) {
			$archive_subtitle = sprintf(
				/* translators: %s: Number of search results. */
				_n(
					'We found %s result for your search.',
					'We found %s results for your search.',
					$wp_query->found_posts,
					'twentytwenty'
				),
				number_format_i18n($wp_query->found_posts)
			);
		} else {
			$archive_subtitle = __('We could not find any results for your search. You can give it another try through the search form below.', 'twentytwenty');
		}
	} elseif (is_archive() && ! have_posts()) {
		$archive_title = __('Nothing Found', 'twentytwenty');
	} elseif (! is_home()) {
		$archive_title    = get_the_archive_title();
		$archive_subtitle = get_the_archive_description();
	}

	if ($archive_title || $archive_subtitle) {
	?>

		<header class="archive-header has-text-align-center header-footer-group">

			<div class="archive-header-inner section-inner medium">

				<?php if ($archive_title) { ?>
					<h1 class="archive-title"><?php echo wp_kses_post($archive_title); ?></h1>
				<?php } ?>

				<?php if ($archive_subtitle) { ?>
					<div class="archive-subtitle section-inner thin max-percentage intro-text"><?php echo wp_kses_post(wpautop($archive_subtitle)); ?></div>
				<?php } ?>

			</div><!-- .archive-header-inner -->

		</header><!-- .archive-header -->

		<?php
	}

	if (have_posts()) {

		$i = 0;

		while (have_posts()) {
			// ++$i;
			// if ($i > 1) {
			// 	echo '<hr class="post-separator styled-separator is-style-wide section-inner" aria-hidden="true" />';
			// }
			the_post();
			// get_template_part('template-parts/content', get_post_type());
		?>

			<div class="post-list">
				<article id="post-<?php the_ID(); ?>" <?php post_class('post-item'); ?>>

					<!-- <div class="post-image"><?php
													if (has_post_thumbnail()) {
														the_post_thumbnail('medium');
													} else {
														echo '<img src="' . get_template_directory_uri() . '/assets/images/default-thumbnail.jpg" alt="Default Thumbnail">';
													}
													?></div> -->

					<div class="post-date">
						<div class="day"><?php echo get_the_date('d'); ?></div>
						<div class="month"><?php echo 'THÁNG ' . get_the_date('m'); ?></div>
					</div>

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
				</article>
			</div>



		<?php

		}
	} elseif (is_search()) {
		?>
		<div class="no-search-results-form section-inner thin">

			<?php
			get_search_form(
				array(
					'aria_label' => __('search again', 'twentytwenty'),
				)
			);
			?>

		</div><!-- .no-search-results -->

	<?php
	}
	?>

	<?php get_template_part('template-parts/pagination'); ?>

</main><!-- #site-content -->

<?php get_template_part('template-parts/footer-menus-widgets'); ?>

<?php
get_footer();
