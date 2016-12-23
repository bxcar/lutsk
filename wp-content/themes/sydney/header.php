<?php
session_start();
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Sydney
 */
/*$_SERVER['HTTP_REFERER']*/
if(!$_SESSION['urli']) {
    $_SESSION['urli'] = $_SERVER['REQUEST_URI'];
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head itemscope itemtype="http://schema.org/WebSite">
    <title itemprop='name'>Горящие туры на Троещине: Coral Travel</title>

    <meta property="og:type" content="website"/>
    <meta property="og:title" content="Горящие туры на Троещине - Coral Travel"/>
    <meta property="og:description" content="Самые выгодные цены от надежной компании"/>
    <meta property="og:url" content="http://coraltravel.kiev.ua"/>
    <meta property="og:image"
          content="http://coraltravel.kiev.ua/wp-content/themes/sydney/img/slider2_oprimize.jpg"/>


    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@">
    <meta name="twitter:title" content="Работа для менеджера по туризму">
    <meta name="twitter:description"
          content="Любите туризм и хотите работать в этой сфере Присоединяйтесь к команде профессионалов!">
    <meta name="twitter:image" content="imagestild6131-6236-4936-b266-356133316465__en_logo_sqare2_wide_canvas.png">


    <meta name="description" content="Горящие туры из Киева. Бронирование тура, авиаперелеты, экскурсионные туры из Троещины. Гарантия надежности!">
    <script src="/wp-content/themes/sydney/js/script_for_form_button.js"></script>
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
    <script src="/wp-content/themes/sydney/tracking_codes_and_jivosite/country_sort.js"></script>

    <script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "Organization",
  "name": "Coral Travel Троещина",
  "url": "http://www.coraltravel.kiev.ua",
  "logo": "http://coraltravel.kiev.ua/wp-content/themes/sydney/img/logo_coral.png",
  "contactPoint": [{
    "@type": "ContactPoint",
    "telephone": "+38-096-711-01-01",
    "contactType": "customer service"
  }],
  "sameAs": [
    "http://www.facebook.com/Турагентство-Coral-Travel-Троещина-Киев-1833767943568462",
    "http://vk.com/coraltroeshhina"
  ]
}

    </script>

</head>

<body <?php body_class(); ?>>
<?php include "tracking_codes_and_jivosite/google-analytics.php" ?>
<?php include "tracking_codes_and_jivosite/yandex-metrica.php" ?>

<div itemscope itemtype="http://schema.org/PostalAddress" style="display: none;">

    <span itemprop="name">Горящие туры на Троещине: Coral Travel</span>
    <span itemprop="postalCode">01001,</span> <span
        itemprop="addressLocality">Украина, Киевская обл., г.Киев</span>
    <span itemprop="streetAddress">просп. Маяковского 44-А</span>
    Телефон: <span itemprop="telephone">+38 096 711 01 01</span>
    E-mail: <span itemprop="email">kiev2@makintour.com</span>

</div>

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
                <div class="row">
                    <div class="col-md-4 col-sm-8 col-xs-12  header-logo">
                        <?php if (get_theme_mod('site_logo')) : ?>
                            <a<!-- href="--><?php /*//echo esc_url(home_url('/')); */?>" title="<?php bloginfo('name'); ?>"><img
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
                        <nav itemscope itemtype="https://schema.org/SiteNavigationElement" id="mainnav" class="mainnav" role="navigation" style="color: red;">
                            <?php wp_nav_menu(array('theme_location' => 'primary', 'fallback_cb' => 'sydney_menu_fallback')); ?>
                        </nav><!-- #site-navigation -->
                    </div>
                    <div class="col-md-8 col-sm-4 col-xs-12 header-number">
                        <p <!--style="overflow: hidden;-->">096 711 01 01<br><a href="#"><span class="popmake-522 header-number-text">Закажите&nbsp;обратный&nbsp;звонок</span></a></p>
                    </div>
                </div>
            </div>
        </div>
    </header><!-- #masthead -->
    <?php sydney_slider_template(); ?>

    <div class="header-image">
        <?php sydney_header_overlay(); ?>
        <img class="header-inner" src="<?php header_image(); ?>"
             width="<?php echo esc_attr(get_custom_header()->width); ?>" alt="<?php bloginfo('name'); ?>">
    </div>

    <div id="content" class="page-wrap" style="padding-top: 30px; padding-bottom: 0;">
        <div class="container content-wrapper">
            <div class="row">
                
                <h2 id="goto-from-top-button" class="tour-header">Лучшие Цены на&nbsp;Туры по&nbsp;направлениям</h2>
                <div id="filt" class="filters">
                    <select id="country-select" class="select-spec" style="margin-right: 20px;
                                  margin-left: 25px;">
                        <option value="Все страны" selected>Все страны</option> <!--country-default-->
                        <!--<option value="Таиланд">Таиланд</option>
                        <option value="ОАЕ">ОАЕ</option>-->
                    </select>
                </div>
<!--                <div style="width: 500px; height: 500px;">-->
                <div class="fon-class" id="fon">
                    <div class="load-class" id="load"></div>
                </div>

<!--                </div>-->
