<?php

/**
 * The searchform.php template.
 *
 * Used any time that get_search_form() is called.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

/*
 * Generate a unique ID for each form and a string containing an aria-label
 * if one was passed to get_search_form() in the args array.
 */
$twentytwenty_unique_id = twentytwenty_unique_id('search-form-');

$twentytwenty_aria_label = ! empty($args['aria_label']) ? 'aria-label="' . esc_attr($args['aria_label']) . '"' : '';
// Backward compatibility, in case a child theme template uses a `label` argument.
if (empty($twentytwenty_aria_label) && ! empty($args['label'])) {
	$twentytwenty_aria_label = 'aria-label="' . esc_attr($args['label']) . '"';
}
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

<form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="card card-sm custom-search-form">
	<div class="card-body row no-gutters align-items-center">
		<div class="col-auto">
			<i class="fa fa-search h3 text-body"></i>
		</div>
		<!--end of col-->
		<div class="col">
			<input class="form-control form-control-lg form-control-borderless" type="search" placeholder="Search topics or keywords" value="<?php echo get_search_query(); ?>" name="s" >
		</div>
		<!--end of col-->
		<div class="col-auto">
			<button class="btn btn-lg btn-success" type="submit">Search</button>
		</div>
		<!--end of col-->
	</div>
</form>
<style>
	.custom-search-form .form-control-borderless {
		border: none !important;
		outline: none;
		box-shadow: none;
	}

	.custom-search-form .form-control-borderless:hover,
	.custom-search-form .form-control-borderless:active,
	.custom-search-form .form-control-borderless:focus {
		border: none !important;
		outline: none !important;
		box-shadow: none !important;
	}
	.custom-search-form .card-body .col-auto .fa.fa-search {
		font-size: 18px;
		line-height: 30px;
		display: flex;
		align-items: center;
		justify-content: center;
	}
</style>
