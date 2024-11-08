<style>
	.pagination-single-inner {
		display: flex;
		justify-content: space-between;
		margin-bottom: 2rem;
		flex-direction: column;
	}

	.pagination-single a+a {
		margin: 0;
	}

	.pagination-single a {
		display: flex;
		align-items: center;
		text-decoration: none;
		padding: 1rem;
		text-align: left;

	}

	.pagination-single a:hover {
		text-decoration: none;
	}



	.pagination-single .post-date {
		display: flex;
		flex-direction: row;
		align-items: center;
		font-family: Arial, sans-serif;
		color: #333;
		margin-right: 5rem;


	}


	.pagination-single .post-date .day-month {
		display: flex;
		flex-direction: column;
		align-items: center;
		margin-right: 10px;
	}

	.pagination-single .post-date .day {
		font-size: 18px;
		font-weight: normal;
	}



	.pagination-single .post-date .month {
		font-size: 18px;
		font-weight: normal;
		border-top: 1px solid black;

	}

	.pagination-single .post-date .year {
		font-size: 18px;
		font-weight: normal;

	}

	.pagination-single .title {
		font-size: 16px;
		color: #333;
		flex: 1;
	}

	.pagination-single .title-inner {
		font-weight: normal;
		display: block;
		font-size: 18px;
	}

	.pagination-single .arrow {
		display: none;
	}
</style>

<?php
/**
 * Displays the next and previous post navigation in single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

$next_post = get_next_post();
$prev_post = get_previous_post();

if ($next_post || $prev_post) {
	$pagination_classes = '';

	if (!$next_post) {
		$pagination_classes = ' only-one only-prev';
	} elseif (!$prev_post) {
		$pagination_classes = ' only-one only-next';
	}
?>

	<nav class="pagination-single section-inner<?php echo esc_attr($pagination_classes); ?>" aria-label="<?php esc_attr_e('Post', 'twentytwenty'); ?>">
		<div class="pagination-single-inner">
			<?php if ($prev_post) : ?>
				<a class="previous-post" href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>">
					<div class="post-date">
						<div class="day-month">
							<div class="day"><?php echo get_the_date('d', $prev_post->ID); ?></div>
							<span class="month"><?php echo get_the_date('m', $prev_post->ID); ?></span>
						</div>
						<span class="year"><?php echo get_the_date('y', $prev_post->ID); ?></span>
					</div>
					<div class="title">
						<span class="title-inner"><?php echo wp_kses_post(get_the_title($prev_post->ID)); ?></span>

					</div>
				</a>
			<?php endif; ?>

			<?php if ($next_post) : ?>
				<a class="previous-post" href="<?php echo esc_url(get_permalink($next_post->ID)); ?>">
					<div class="post-date">
						<div class="day-month">
							<div class="day"><?php echo get_the_date('d', $next_post->ID); ?></div>
							<span class="month"><?php echo get_the_date('m', $next_post->ID); ?></span>
						</div>
						<span class="year"><?php echo get_the_date('y', $next_post->ID); ?></span>
					</div>
					<div class="title">
					<span class="title-inner"><?php echo wp_kses_post(get_the_title($next_post->ID)); ?></span>
					</div>
				</a>
			<?php endif; ?>

		</div><!-- .pagination-single-inner -->

		<hr class="styled-separator is-style-wide" aria-hidden="true" />

	</nav><!-- .pagination-single -->

<?php
}
?>