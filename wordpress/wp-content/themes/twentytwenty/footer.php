<?php

/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 * 
 * 
 */

$categories = get_categories();
// foreach ($categories as $category) {
// 	echo $category->term_id . ' - ' . $category->name . ' - ' . $category->slug . '<br>';
// }

?>
<style>
/* Container chính của Latest News */
.latest-news {
    margin: 20px 0;
}

/* Tiêu đề Latest News */
.latest-news h2 {
    font-size: 18px;
    margin-bottom: 15px;
}

/* Từng mục tin tức */
.news-item {
    margin-bottom: 20px;
    padding-left: 20px;
    position: relative;
    padding-left: 20px;
}

/* Line dọc cho từng mục tin tức */
.news-item::before {
    content: '';
    position: absolute;
    left: 4px; /* Điều chỉnh vị trí line dọc sát với vòng tròn */
    top: 15px; /* Bắt đầu line từ vị trí ngay dưới vòng tròn */
    bottom: -15px; /* Kéo dài line xuống dưới mục tiếp theo */
    width: 2px; /* Độ dày của line */
    background-color: #3498db; /* Màu của line */
    z-index: 0;
}

/* Vòng tròn xanh ở mỗi mục tin tức */
.news-circle {
    width: 10px;
    height: 10px;
    background-color: #3498db;
    border-radius: 50%;
    position: absolute;
    left: -1px; /* Đặt vòng tròn sát với line */
    top: 0;
    z-index: 1; /* Đảm bảo vòng tròn nằm trên line dọc */
}

/* Tiêu đề tin tức */
.news-title {
    font-weight: bold;
    color: #3498db;
    text-decoration: none;
}

/* Mô tả tin tức */
.news-description {
    color: #666;
}

/* Ngày tháng */
.news-date {
    font-size: 12px;
    color: #aaa;
}
</style>
<div class="latest-news">
    <h2>Latest News</h2>
    <?php
    $recent_posts = wp_get_recent_posts(array('numberposts' => 5));
    foreach ($recent_posts as $post) : ?>
        <div class="news-item">
            <div class="news-circle"></div>
            <div class="news-content">
                <a href="<?php echo get_permalink($post['ID']); ?>" class="news-title"><?php echo $post['post_title']; ?></a>
                <p class="news-description"><?php echo wp_trim_words($post['post_content'], 20, '...'); ?></p>
            </div>
            <span class="news-date"><?php echo get_the_date('j F, Y', $post['ID']); ?></span>
        </div>
    <?php endforeach; ?>
</div>

<footer id="site-footer" class="header-footer-group">

	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!------ Include the above in your HEAD tag ---------->

	<!-- Footer -->
	<section id="footer">
		<div class="container">
			<div class="row text-center text-xs-center text-sm-left text-md-left">
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h3>Categories</h3>
					<ul class="list-unstyled quick-links">
					<?php
						foreach ($categories as $category) {
						?>
							<li><a href="http://wordpress.local/category/<?php echo $category->slug ?>"><i class="fa fa-angle-double-right"></i><?php echo $category->name ?></a></li>
						<?php
						}
						?>
					</ul>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h3>Categories</h3>
					<ul class="list-unstyled quick-links">
						<?php
						foreach ($categories as $category) {
						?>
							<li><a href="http://wordpress.local/category/<?php echo $category->slug ?>"><i class="fa fa-angle-double-right"></i><?php echo $category->name ?></a></li>
						<?php
						}
						?>
					</ul>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h3>Categories</h3>
					<ul class="list-unstyled quick-links">
						<?php
						foreach ($categories as $category) {
						?>
							<li><a href="http://wordpress.local/category/<?php echo $category->slug ?>"><i class="fa fa-angle-double-right"></i><?php echo $category->name ?></a></li>
						<?php
						}
						?>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
					<ul class="list-unstyled list-inline social text-center">
						<li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-facebook"></i></a></li>
						<li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-twitter"></i></a></li>
						<li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-instagram"></i></a></li>
						<li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-google-plus"></i></a></li>
						<li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02" target="_blank"><i class="fa fa-envelope"></i></a></li>
					</ul>
				</div>
				<hr>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
					<p><u><a href="https://www.nationaltransaction.com/">National Transaction Corporation</a></u> is a Registered MSP/ISO of Elavon, Inc. Georgia [a wholly owned subsidiary of U.S. Bancorp, Minneapolis, MN]</p>
					<p class="h6">© All right Reversed.<a class="text-green ml-2" href="https://www.sunlimetech.com" target="_blank">Sunlimetech</a></p>
				</div>
				<hr>
			</div>
		</div>
	</section>
	<!-- ./Footer -->

</footer><!-- #site-footer -->

<?php wp_footer(); ?>


</body>

</html>