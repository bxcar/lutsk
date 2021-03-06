<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Sydney
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <title>Makintour Луцьк - 404</title>
    <meta name="description" content="Страница ошибки 404">
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic"
        rel="stylesheet">
    <?php if (!function_exists('has_site_icon') || !has_site_icon()) : ?>
        <?php if (get_theme_mod('site_favicon')) : ?>
            <link rel="shortcut icon" href="<?php echo esc_url(get_theme_mod('site_favicon')); ?>"/>
        <?php endif; ?>
    <?php endif; ?>

    <?php wp_head(); ?>
    
    <?php include "tracking_codes_and_jivosite/vk.php" ?>
    <?php include "tracking_codes_and_jivosite/facebook_pixel_code.php" ?>
    <?php include "tracking_codes_and_jivosite/jivosite.php" ?>
    
</head>

<body <?php body_class(); ?>>
<?php include "tracking_codes_and_jivosite/google-analytics.php" ?>
<?php include "tracking_codes_and_jivosite/yandex-metrica.php" ?>

<div class="preloader">
    <div class="spinner">
        <div class="pre-bounce1"></div>
        <div class="pre-bounce2"></div>
    </div>
</div>
<div id="page" class="hfeed site">
    <a class="skip-link screen-reader-text" href="#content"><?php _e('Skip to content', 'sydney'); ?></a>

    <header itemscope itemtype="http://schema.org/WPHeader" id="masthead" class="site-header" role="banner">
        <div class="header-wrap">
            <div class="container">
                <div class="row top-menu-margin">
                    <div class="col-md-4 col-sm-8 col-xs-12  header-logo">
                        <?php if (get_theme_mod('site_logo')) : ?>
                            <a<!-- href="--><?php /*//echo esc_url(home_url('/')); */ ?>" title="<?php bloginfo('name'); ?>">
                            <img
                                class="site-logo" src="<?php echo esc_url(get_theme_mod('site_logo')); ?>"
                                alt="<?php bloginfo('name'); ?>"/></a>
                        <?php else : ?>
                            <h1 itemprop="headline" class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                                                                          rel="home"><?php bloginfo('name'); ?></a></h1>
                            <h2 itemprop="description" class="site-description"><?php bloginfo('description'); ?></h2>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-8 col-sm-4 col-xs-12 header-menu">
                        <div class="btn-menu"></div>
                        <nav itemscope itemtype="https://schema.org/SiteNavigationElement" id="mainnav" class="mainnav"
                             role="navigation" style="color: red;">
                            <?php wp_nav_menu(array('theme_location' => 'primary', 'fallback_cb' => 'sydney_menu_fallback')); ?>
                        </nav><!-- #site-navigation -->
                    </div>

                    <div class="col-md-8 col-sm-4 col-xs-12 header-number">
                        <p <!--style="overflow: hidden;-->">8 800 200 12 58<br><a href="#"><span
                                class="popmake-522 header-number-text">ДЗВІНКИ&nbsp;БЕЗКОШТОВНІ</span></a></p>
                        <p class="address-top-menu" style="line-height: 50px;
                         margin-left: 45%;
                         font-size: 16px;
                          min-height: 50px;
                          margin-top: -5px;">М.ЛУЦЬК, ВУЛ. КРИВИЙ ВАЛ, 34, ОФ.201<br><a href="#"></a></p>
                    </div>
                </div>
            </div>
        </div>
    </header><!-- #masthead -->
    <?php sydney_slider_template(); ?>

    <div id="content" class="page-wrap" style="padding-top: 30px; padding-bottom: 0;">
        <div class="container content-wrapper">
            <div class="row">

                   <div class="thanks-text">
                    <p class="thanks-text-header">Строрінка не знайдена<br>
                        <span class="thanks-text-header-pre">Шкодуємо про це :(</span></p>
                    <a href="javascript:history.back();" class="back-to-main1">Вернуться&ensp;назад</a>
                    <div class="social-thanks">
                        <p class="thanks-text-header-pre">Ми в соціальних мережах</p>
                        <div class="social-thanks-images">
                            <!--<a href="https://www.facebook.com/borispol.coraltravel/">
                                <img src="/wp-content/themes/sydney/img/social-thanks/facebook.png">
                            </a>-->
                            <a href="https://vk.com/makintour.lutsk">
                                <img src="/wp-content/themes/sydney/img/social-thanks/vk.png">
                            </a>
                        </div>
                    </div>
                </div>



