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
	#site-content {
		padding-top: 30px;
	}

	/* Bố cục ngày tháng */
	.post-list {

		width: 50%;
		margin: 0 auto;
	}

	.post-item {
		display: flex;
		align-items: center;
		padding: 16px;
		margin-bottom: 24px;
		background-color: #fff;
		font-family: Arial, sans-serif;
		/* border: .5px solid; */
		box-shadow: 0 1px 5px rgba(0, 0, 0, 0.5);
		/* border-radius:; */

	}
	.post-image{
		max-width: 100px;
		height: auto;
	}

	.post-date {
		width: 80px;
		text-align: center;
		align-self: start;
		margin-right: 16px;
		color: #333;
		/* border-right: 1px solid #ccc; */
		padding-right: 16px;
		padding-left: 16px;
	}

	.post-date .day {
		font-size: 36px;
		font-weight: bold;
	}

	.post-date .month {
		font-size: 12px;
		text-transform: uppercase;
		color: #777;
		margin-top: -8px;
	}

	.post-content {
		flex: 1;
		border-left: 1px solid #ccc;
		padding-left: 15px;
	}

	.entry-title {
		font-size: 20px;
		font-weight: bold;
		color: #0056b3;
		margin-bottom: 8px;
	}

	.entry-title a {
		text-decoration: none;
		color: #0056b3;
	}

	.entry-title a:hover {
		text-decoration: underline;
	}

	.entry-excerpt {
		font-size: 14px;
		color: #666;
		margin: 0;
		line-height: 1.6;
	}

	@media (max-width: 768px) {
		.post-item {
			flex-direction: column;
			align-items: flex-start;
		}

		.post-date {
			margin-bottom: 16px;
		}

		.post-content {
			border-left: none;
			padding-left: 0;
		}

		.entry-title {
			font-size: 18px;
		}

		.entry-excerpt {
			font-size: 16px;
		}
	}

	.search-modal.active .search-modal-inner .search-active {
		margin-bottom: 0;
		width: 100%;
	}

	.search-show {
		margin-bottom: 8rem;
		padding: 10px;

	}

	.search-form .search-input {
		height: 50px;
		border: #fff;
	}
	.search-form .search-input:focus {
		outline: none;
		border: #fff;
	}

	.search-form .btn-search{
		height: 50px;
		background-color: green;
		border-radius: 5px;
		
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

		<header class="archive-header has-text-align-center header-footer-group m-0">

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

					<div class="post-image"><?php
											if (has_post_thumbnail()) {
												the_post_thumbnail('medium');
											} else {
												echo '<img src="' . get_template_directory_uri() . '/assets/images/default-thumbnail.jpg" alt="Default Thumbnail">';
											}
											?></div>

					<div class="post-date">
						<div class="day"><?php echo get_the_date('d'); ?></div>
						<div class="month"><?php echo mb_strtoupper('THÁNG ' . get_the_date('m')); ?></div>
					</div>

					<div class="post-content">
						<header class="entry-header">
							<h5 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
						</header><!-- .entry-header -->

						<div class="entry-excerpt">
							<?php
							$excerpt = wp_strip_all_tags(get_the_excerpt());
							echo mb_strimwidth($excerpt, 0, 100, ' [...]');
							?>
						</div><!-- .entry-excerpt -->
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