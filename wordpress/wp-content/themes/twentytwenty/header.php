<?php

/**
 * Header file for the Twenty Twenty WordPress default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?>
<!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

<head>

	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>

	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!------ Include the above in your HEAD tag ---------->

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">


</head>

<body <?php body_class(); ?>>

	<?php
	wp_body_open();
	?>

<header id="site-header" class="header-footer-group">
    <div class="header-inner section-inner">

        <div class="header-titles-wrapper">
            <?php
            // Kiểm tra xem tìm kiếm có bật trong customizer không.
            $enable_header_search = get_theme_mod('enable_header_search', true);
            if (true === $enable_header_search) {
            ?>
                <!-- Nút Tìm kiếm cho Mobile -->
                <button class="toggle search-toggle mobile-search-toggle" data-toggle-target=".search-modal" data-toggle-body-class="showing-search-modal" data-set-focus=".search-modal .search-field" aria-expanded="false">
                    <span class="toggle-inner">
                        <span class="toggle-icon">
                            <?php twentytwenty_the_theme_svg('search'); ?>
                        </span>
                        <span class="toggle-text"><?php _ex('Search', 'toggle text', 'twentytwenty'); ?></span>
                    </span>
                </button><!-- .search-toggle -->
            <?php } ?>

            <div class="header-titles">
                <?php
                // Logo hoặc tiêu đề site
                twentytwenty_site_logo();

                // Mô tả site
                twentytwenty_site_description();
                ?>
            </div><!-- .header-titles -->

            <button class="toggle nav-toggle mobile-nav-toggle" data-toggle-target=".menu-modal" data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle">
                <span class="toggle-inner">
                    <span class="toggle-icon">
                        <?php twentytwenty_the_theme_svg('ellipsis'); ?>
                    </span>
                    <span class="toggle-text"><?php _e('Menu', 'twentytwenty'); ?></span>
                </span>
            </button><!-- .nav-toggle -->
        </div><!-- .header-titles-wrapper -->





			<!-- Form Tìm kiếm -->
			<div class="toggle-wrapper search-toggle-wrapper">
									<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
										<label for="search-form-input" class="screen-reader-text"><?php echo _x('Search for:', 'label', 'twentytwenty'); ?></label>
										<input type="search" id="search-form-input" class="search-field" placeholder="<?php echo esc_attr_x('Search...', 'placeholder', 'twentytwenty'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
										<button type="submit" class="search-submit">
											<span class="screen-reader-text"><?php echo _x('Search', 'submit button', 'twentytwenty'); ?></span>
											<i class="fa fa-search"></i>
										</button>
									</form>
								</div><!-- .search-toggle-wrapper -->
				



        <div class="header-navigation-wrapper">
            <?php if (has_nav_menu('primary') || ! has_nav_menu('expanded')) { ?>
                <nav class="primary-menu-wrapper" aria-label="<?php echo esc_attr_x('Horizontal', 'menu', 'twentytwenty'); ?>">
                    <ul class="primary-menu reset-list-style">
                        <?php
                        if (has_nav_menu('primary')) {
                            wp_nav_menu(array(
                                'container' => '',
                                'items_wrap' => '%3$s',
                                'theme_location' => 'primary',
                            ));
                        } elseif (!has_nav_menu('expanded')) {
                            wp_list_pages(array(
                                'match_menu_classes' => true,
                                'show_sub_menu_icons' => true,
                                'title_li' => false,
                                'walker' => new TwentyTwenty_Walker_Page(),
                            ));
                        }
                        ?>
                    </ul>
                </nav><!-- .primary-menu-wrapper -->
            <?php } ?>

            <?php if (true === $enable_header_search || has_nav_menu('expanded')) { ?>
				
                <div class="header-toggles hide-no-js">
                    <?php if (has_nav_menu('expanded')) { ?>
                        <div class="toggle-wrapper nav-toggle-wrapper has-expanded-menu">
                            <button class="toggle nav-toggle desktop-nav-toggle" data-toggle-target=".menu-modal" data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle">
                                <span class="toggle-inner">
                                    <span class="toggle-text"><?php _e('Menu', 'twentytwenty'); ?></span>
                                    <span class="toggle-icon">
                                        <?php twentytwenty_the_theme_svg('ellipsis'); ?>
                                    </span>
                                </span>
                            </button><!-- .nav-toggle -->
                        </div><!-- .nav-toggle-wrapper -->
                    <?php } ?>

                    <?php if (true === $enable_header_search) { ?>
                        <div class="toggle-wrapper search-toggle-wrapper">
                            <button class="toggle search-toggle desktop-search-toggle" data-toggle-target=".search-modal" data-toggle-body-class="showing-search-modal" data-set-focus=".search-modal .search-field" aria-expanded="false">
                                <span class="toggle-inner">
                                    <?php twentytwenty_the_theme_svg('search'); ?>
                                    <span class="toggle-text"><?php _ex('Search', 'toggle text', 'twentytwenty'); ?></span>
                                </span>
                            </button><!-- .search-toggle -->
                        </div>
                    <?php } ?>



                    <!-- Thêm Nút Account -->
                    <div class="toggle-wrapper account-toggle-wrapper">
    <button class="toggle account-toggle" aria-expanded="false">
        <span class="toggle-inner">
            <?php if ( is_user_logged_in() ) : ?>
                <span class="toggle-text"><?php echo esc_html( wp_get_current_user()->display_name ); ?></span> <!-- Hiển thị tên người dùng -->
            <?php else : ?>
                <span class="toggle-text"><?php _e('Account', 'twentytwenty'); ?></span> <!-- Nếu chưa đăng nhập, hiển thị 'Account' -->
            <?php endif; ?>
            <span class="toggle-icon">
                <i class="fa fa-user"></i>
            </span>
        </span>
    </button><!-- .account-toggle -->

    <!-- Dropdown menu -->
    <div class="dropdown-menu">
        <?php if ( is_user_logged_in() ) : ?>
            <ul>
                <li><a href="<?php echo esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ); ?>"><?php _e( 'My Account', 'twentytwenty' ); ?></a></li>
                <li><a href="<?php echo esc_url( wp_logout_url() ); ?>"><?php _e( 'Log Out', 'twentytwenty' ); ?></a></li>
            </ul>
        <?php else : ?>
            <ul>
                <li><a href="<?php echo esc_url( wp_login_url() ); ?>"><?php _e( 'Log In', 'twentytwenty' ); ?></a></li>
                <li><a href="<?php echo esc_url( wp_registration_url() ); ?>"><?php _e( 'Register', 'twentytwenty' ); ?></a></li>
            </ul>
        <?php endif; ?>
    </div><!-- .dropdown-menu -->
</div><!-- .account-toggle-wrapper -->


					
                </div><!-- .header-toggles -->
            <?php } ?>
        </div><!-- .header-navigation-wrapper -->

    </div><!-- .header-inner -->

    <?php
    // Output the search modal (nếu đã bật tính năng tìm kiếm trong customizer).
    if (true === $enable_header_search) {
        get_template_part('template-parts/modal-search');
    }
    ?>

</header><!-- #site-header -->

	

	<?php
	// Output the menu modal.
	get_template_part('template-parts/modal-menu');
