<?php
session_start();
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
    <title>Coral Travel - Троещина</title>
    <meta name="description" content="Страница благодарности посетителям сайта за проявленное желание сотрудничать">
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

    <header id="masthead" class="site-header header-in-thanks" role="banner">
        <div class="header-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-8 col-xs-12  header-logo">
                        <?php if (get_theme_mod('site_logo')) : ?>
                            <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo('name'); ?>"><img
                                    class="site-logo" src="<?php echo esc_url(get_theme_mod('site_logo')); ?>"
                                    alt="<?php bloginfo('name'); ?>"/></a>
                        <?php else : ?>
                            <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                                                      rel="home"><?php bloginfo('name'); ?></a></h1>
                            <h2 class="site-description"><?php bloginfo('description'); ?></h2>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-8 col-sm-4 col-xs-12 header-menu">
                        <div class="btn-menu"></div>
                        <nav id="mainnav" class="mainnav" role="navigation" style="color: red;">
                            <?php wp_nav_menu(array('theme_location' => 'primary', 'fallback_cb' => 'sydney_menu_fallback')); ?>
                        </nav><!-- #site-navigation -->
                    </div>
                    <div class="col-md-8 col-sm-4 col-xs-12 header-number">
                        <p <!--style="overflow: hidden;-->">096 595 01 01<br><a href="#"><span
                                class="popmake-522 header-number-text">Закажите&nbsp;обратный&nbsp;звонок</span></a>
                    </div>
                </div>
            </div>
        </div>
    </header><!-- #masthead -->
    <?php sydney_slider_template(); ?>

    <div id="content" class="page-wrap" style="padding-top: 30px; padding-bottom: 0;">
        <div class="container content-wrapper">
            <div class="row">



                <?php
                $sendto  = 'malanchukdima@mail.ru'; //Адреса, куда будут приходить письма shakrov@ukr.net, seo@makintour.com
                //$sendto = 'seo@makintour.com, info@coralborispol.com'; //Адреса, куда будут приходить письма

                $phone = $_POST['tel-564'];
                $name = $_POST['your-name'];
                $comment  = $_POST['your-message'];
                $p = trim(strip_tags($_POST['target'], '<br>'))
                    . trim(strip_tags($_POST['target-manager'], '<br>'))
                    . trim(strip_tags($_POST['callback'], '<br>'))
                    . trim(strip_tags($_POST['order'], '<br>'))
                    . trim(strip_tags($_POST['get_all_spec'], '<br>'));

//                global $urli;
                $url =  'http://'.$_SERVER['HTTP_HOST'].$_SESSION['urli'];

                    // Формирование заголовка письма

                $subject = '[Новая заявка - Coral Travel Троещина]';
//                $headers  = "From: ".$name." \r\n";
//                $headers .= "Reply-To: ". strip_tags($name) . "\r\n";
//                $headers .= "MIME-Version: 1.0\r\n";
                $headers = "Content-Type: text/html;charset=utf-8 \r\n";

                // Формирование тела письма
                $msg  = "<html><body style='font-family:Arial,sans-serif;'>";
                $msg .= "<h2 style='font-weight:bold;border-bottom:1px dotted #ccc;'>Новая заявка - Coral Travel Троещина</h2>\r\n";
                $msg .= "<p><strong>Имя:</strong> " . $name . "</p>\r\n";
                $msg .= "<p><strong>Телефон:</strong> " . $phone . "</p>\r\n";
                if($_POST['your-message']) {
                    $msg .= "<p><strong>Пожелания к туру:</strong> " . $comment . "</p>\r\n";
                }
                $msg .= "<p><strong>Идентификатор формы:</strong> " . $p . "</p>\r\n";
                $msg .= "<p><strong>URL адрес:</strong> " .$url. "</p>\r\n";
                $msg .= "</body></html>";

                // отправка сообщения
                if (mail($sendto, $subject, $msg, $headers)) {
                    echo "<div class=\"thanks-text\">
                    <p class=\"thanks-text-header\">Спасибо за заявку!<br>
                        <span class=\"thanks-text-header-pre\">Наш менеджер скоро свяжется с Вами</span></p>
                    <a href=\"javascript:history.back();\" class=\"back-to-main1\">Вернуться&ensp;назад</a>
                    <div class=\"social-thanks\">
                        <p class=\"thanks-text-header-pre\">Мы в социальных сетях</p>
                        <div class=\"social-thanks-images\">
                            <a href=\"https://www.facebook.com/borispol.coraltravel/\">
                                <img src=\"/wp-content/themes/sydney/img/social-thanks/facebook.png\">
                            </a>
                            <a href=\"https://vk.com/borispol.coraltravel\">
                                <img src=\"/wp-content/themes/sydney/img/social-thanks/vk.png\">
                            </a>
                            <!--<a href=\"#\"><img src=\"/wp-content/themes/sydney/img/social-thanks/utube.png\"></a>
                            <a href=\"#\"><img src=\"/wp-content/themes/sydney/img/social-thanks/insta.png\"></a>
                            <a href=\"#\"><img src=\"/wp-content/themes/sydney/img/social-thanks/odno.png\"></a>-->
                        </div>
                    </div>
                </div>";
                } else {
                    echo "<div class=\"thanks-text\">
                    <p style='font-size: 30px;' class=\"thanks-text-header\">
                        К сожалениею при отправке формы произошла ошибка&nbsp;:(<br>
                        <span style='display: inline-block; line-height: 25px; margin-top: 20px;' class=\"thanks-text-header-pre\">Вернитесь обратно и попробуйте еще раз<br>
                        (также вы можете связаться с нами по электронной почте либо по номеру телефона, которые указаны на сайте)</span>
                    </p>
                    <a href=\"javascript:history.back();\" class=\"back-to-main1\">Вернуться&ensp;назад</a>
                    <div class=\"social-thanks\">
                        <p class=\"thanks-text-header-pre\">Мы в социальных сетях</p>
                        <div class=\"social-thanks-images\">
                           <a href=\"https://www.facebook.com/borispol.coraltravel/\">
                                <img src=\"/wp-content/themes/sydney/img/social-thanks/facebook.png\">
                            </a>
                            <a href=\"https://vk.com/borispol.coraltravel\">
                                <img src=\"/wp-content/themes/sydney/img/social-thanks/vk.png\">
                            </a>
                            <!--<a href=\"#\"><img src=\"/wp-content/themes/sydney/img/social-thanks/utube.png\"></a>
                            <a href=\"#\"><img src=\"/wp-content/themes/sydney/img/social-thanks/insta.png\"></a>
                            <a href=\"#\"><img src=\"/wp-content/themes/sydney/img/social-thanks/odno.png\"></a>-->
                        </div>
                    </div>
                </div>";
                }
                ?>

                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $curl = curl_init();
                    curl_setopt_array($curl, array(
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_URL =>
                            'http://api.u-on.ru/du4A1ZlNnyLIr90Af17E/lead/create.json',
                        CURLOPT_POST => true,
                        CURLOPT_POSTFIELDS =>
                            'source='.urlencode('ОНЛАЙН: Лендінг "Coral Троєщина"').
                            '&u_name='.urlencode($_POST['your-name']).
                            '&u_phone='.urlencode($_POST['tel-564']).
                            '&note='.urlencode($url)."\n".urlencode($_POST['your-message']).
                            '&r_u_id=19297'
                    ));
                    $resp = curl_exec($curl);
                    curl_close($curl);
                }
                /*."  ".urlencode($p)*/
                ?>



