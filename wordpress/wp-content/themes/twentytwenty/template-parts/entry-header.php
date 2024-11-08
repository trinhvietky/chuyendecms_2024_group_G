<?php

/**
 * Displays the post header
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

$entry_header_classes = '';

if (is_singular()) {
	$entry_header_classes .= ' header-footer-group';
}

?>
<style>
	/* Bố cục container của danh sách bài viết */
	.post-list {
		display: flex;
		flex-direction: column;
		gap: 20px;
		margin: 0 auto;
		width: 80%;
	}

	/* Bố cục của từng bài viết */
	.post-item {
		position: relative;
		display: flex;
		flex-direction: column;
		background-color: #f7f7f7;
		padding: 20px;
		border-radius: 8px;
		box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
		font-family: Arial, sans-serif;
	}

	/* Ngày tháng ở góc phải */
	.post-date {
		position: absolute;
		top: 20px;
		right: 20px;
		background-color: #f4c542;
		color: #fff;
		border-radius: 50%;
		width: 60px;
		height: 60px;
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
		font-size: 16px;
		font-weight: bold;
		text-align: center;
	}

	.post-date .day {
		font-size: 20px;
	}

	.post-date .month {
		font-size: 12px;
		text-transform: uppercase;
	}

	/* Tiêu đề và nội dung */
	.post-info {
		margin-top: 30px;
	}

	.post-title {
		font-size: 24px;
		margin: 0;
		color: #333;
		font-weight: bold;
	}

	.post-title a {
		text-decoration: none;
		color: inherit;
	}

	.post-title a:hover {
		text-decoration: underline;
	}

	.post-excerpt {
		font-size: 16px;
		color: #555;
		margin-top: 10px;
		line-height: 1.6;
		font-style: italic;
	}

	/* Responsive: Bố cục dọc trên thiết bị nhỏ */
	@media (max-width: 768px) {
		.post-item {
			flex-direction: column;
		}

		.post-date {
			top: 10px;
			right: 10px;
			width: 50px;
			height: 50px;
		}

		.post-date .day {
			font-size: 18px;
		}

		.post-date .month {
			font-size: 10px;
		}
	}
</style>

<header class="entry-header has-text-align-center<?php echo esc_attr($entry_header_classes); ?>">

	<div class="entry-header-inner section-inner medium">

		<?php
		/**
		 * Allow child themes and plugins to filter the display of the categories in the entry header.
		 *
		 * @since Twenty Twenty 1.0
		 *
		 * @param bool Whether to show the categories in header. Default true.
		 */
		$show_categories = apply_filters('twentytwenty_show_categories_in_entry_header', true);

		if (true === $show_categories && has_category()) {
		?>

			<div class="entry-categories">
				<span class="screen-reader-text">
					<?php
					/* translators: Hidden accessibility text. */
					_e('Categories', 'twentytwenty');
					?>
				</span>
				<div class="entry-categories-inner">
					<?php the_category(' '); ?>
				</div><!-- .entry-categories-inner -->
			</div><!-- .entry-categories -->

		<?php
		}

		if (is_singular()) {
			the_title('<h1 class="entry-title">', '</h1>');
		} else {
			the_title('<h2 class="entry-title heading-size-1"><a href="' . esc_url(get_permalink()) . '">', '</a></h2>');
		}

		$intro_text_width = '';

		if (is_singular()) {
			$intro_text_width = ' small';
		} else {
			$intro_text_width = ' thin';
		}


		if (has_excerpt() && is_singular()) {
		?>

			<div class="intro-text section-inner max-percentage<?php echo $intro_text_width; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static output 
																?>">
				<?php the_excerpt(); ?>
			</div>

		<?php
		}

		// Default to displaying the post meta.
		twentytwenty_the_post_meta(get_the_ID(), 'single-top');
		?>

	</div><!-- .entry-header-inner -->

</header><!-- .entry-header -->