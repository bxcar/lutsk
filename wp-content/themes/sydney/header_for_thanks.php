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
                $sendto = 'malanchukdima851@ukr.net'; //Адреса, куда будут приходить письма shakrov@ukr.net, seo@makintour.com
                //$sendto = 'seo@makintour.com, info@coralborispol.com'; //Адреса, куда будут приходить письма

                $phone = $_POST['tel-564'];
                $name = $_POST['your-name'];
                $comment = $_POST['your-message'];
                $p = trim(strip_tags($_POST['target'], '<br>'))
                    . trim(strip_tags($_POST['target-manager'], '<br>'))
                    . trim(strip_tags($_POST['callback'], '<br>'))
                    . trim(strip_tags($_POST['order'], '<br>'))
                    . trim(strip_tags($_POST['get_all_spec'], '<br>'));

                //                global $urli;
                $url = 'http://' . $_SERVER['HTTP_HOST'] . $_SESSION['urli'];

                // Формирование заголовка письма

                $subject = '[Новая заявка - Coral Travel Троещина]';
                //                $headers  = "From: ".$name." \r\n";
                //                $headers .= "Reply-To: ". strip_tags($name) . "\r\n";
                //                $headers .= "MIME-Version: 1.0\r\n";
                $headers = "Content-Type: text/html;charset=utf-8 \r\n";

                // Формирование тела письма
                $msg = "<html><body style='font-family:Arial,sans-serif;'>";
                $msg .= "<h2 style='font-weight:bold;border-bottom:1px dotted #ccc;'>Новая заявка - Coral Travel Троещина</h2>\r\n";
                $msg .= "<p><strong>Имя:</strong> " . $name . "</p>\r\n";
                $msg .= "<p><strong>Телефон:</strong> " . $phone . "</p>\r\n";
                if ($_POST['your-message']) {
                    $msg .= "<p><strong>Пожелания к туру:</strong> " . $comment . "</p>\r\n";
                }
                $msg .= "<p><strong>Идентификатор формы:</strong> " . $p . "</p>\r\n";
                $msg .= "<p><strong>URL адрес:</strong> " . $url . "</p>\r\n";
                $msg .= "</body></html>";
                $msg = "<!-- Emails use the XHTML Strict doctype -->
<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\" style=\"background: #fff; min-height: 100%;\">
<head>
    <!-- The character set should be utf-8 -->
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
    <!-- Enables media queries -->
    <meta name=\"viewport\" content=\"width=device-width\">
    <!-- Link to the email's CSS, which will be inlined into the email -->
    <style>
@media only screen and (max-width:596px) {
  .small-float-center {
    margin: 0 auto !important;
    float: none !important;
  }
  .small-float-center,.small-text-center {
    text-align: center !important;
  }
  .small-text-left {
    text-align: left !important;
  }
  .small-text-right {
    text-align: right !important;
  }
}


@media only screen and (max-width:596px) {
  table.body table.container .hide-for-large {
    display: block !important;
    width: auto !important;
    overflow: visible !important;
  }
}


@media only screen and (max-width:596px) {
  table.body table.container .row.hide-for-large {
    display: table !important;
    width: 100% !important;
  }
  table.body table.container .show-for-large {
    display: none !important;
    width: 0;
    mso-hide: all;
    overflow: hidden;
  }
}


@media only screen and (max-width:596px) {
  table.body img {
    height: auto !important;
  }
  table.body center {
    min-width: 0 !important;
  }
  table.body .container {
    width: 95% !important;
  }
  table.body .column,table.body .columns {
    height: auto !important;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    padding-left: 16px !important;
    padding-right: 16px !important;
  }
  table.body .collapse .column,table.body .collapse .columns,table.body .column .column,table.body .column .columns,table.body .columns .column,table.body .columns .columns {
    padding-left: 0 !important;
    padding-right: 0 !important;
  }
  .body .column td.small-1,.body .column th.small-1,.body .columns td.small-1,.body .columns th.small-1,td.small-1,td.small-1 center,th.small-1,th.small-1 center {
    display: inline-block !important;
    width: 8.33333% !important;
  }
  .body .column td.small-2,.body .column th.small-2,.body .columns td.small-2,.body .columns th.small-2,td.small-2,td.small-2 center,th.small-2,th.small-2 center {
    display: inline-block !important;
    width: 16.66667% !important;
  }
  .body .column td.small-3,.body .column th.small-3,.body .columns td.small-3,.body .columns th.small-3,td.small-3,td.small-3 center,th.small-3,th.small-3 center {
    display: inline-block !important;
    width: 25% !important;
  }
  .body .column td.small-4,.body .column th.small-4,.body .columns td.small-4,.body .columns th.small-4,td.small-4,td.small-4 center,th.small-4,th.small-4 center {
    display: inline-block !important;
    width: 33.33333% !important;
  }
  .body .column td.small-5,.body .column th.small-5,.body .columns td.small-5,.body .columns th.small-5,td.small-5,td.small-5 center,th.small-5,th.small-5 center {
    display: inline-block !important;
    width: 41.66667% !important;
  }
  .body .column td.small-6,.body .column th.small-6,.body .columns td.small-6,.body .columns th.small-6,td.small-6,td.small-6 center,th.small-6,th.small-6 center {
    display: inline-block !important;
    width: 50% !important;
  }
  .body .column td.small-7,.body .column th.small-7,.body .columns td.small-7,.body .columns th.small-7,td.small-7,td.small-7 center,th.small-7,th.small-7 center {
    display: inline-block !important;
    width: 58.33333% !important;
  }
  .body .column td.small-8,.body .column th.small-8,.body .columns td.small-8,.body .columns th.small-8,td.small-8,td.small-8 center,th.small-8,th.small-8 center {
    display: inline-block !important;
    width: 66.66667% !important;
  }
  .body .column td.small-9,.body .column th.small-9,.body .columns td.small-9,.body .columns th.small-9,td.small-9,td.small-9 center,th.small-9,th.small-9 center {
    display: inline-block !important;
    width: 75% !important;
  }
  .body .column td.small-10,.body .column th.small-10,.body .columns td.small-10,.body .columns th.small-10,td.small-10,td.small-10 center,th.small-10,th.small-10 center {
    display: inline-block !important;
    width: 83.33333% !important;
  }
  .body .column td.small-11,.body .column th.small-11,.body .columns td.small-11,.body .columns th.small-11,td.small-11,td.small-11 center,th.small-11,th.small-11 center {
    display: inline-block !important;
    width: 91.66667% !important;
  }
  table.menu td,table.menu th,td.small-12,th.small-12 {
    display: inline-block !important;
    width: 100% !important;
  }
  .column td.small-12,.column th.small-12,.columns td.small-12,.columns th.small-12 {
    display: block !important;
    width: 100% !important;
  }
  table.body td.small-offset-1,table.body th.small-offset-1 {
    margin-left: 8.33333% !important;
    Margin-left: 8.33333% !important;
  }
  table.body td.small-offset-2,table.body th.small-offset-2 {
    margin-left: 16.66667% !important;
    Margin-left: 16.66667% !important;
  }
  table.body td.small-offset-3,table.body th.small-offset-3 {
    margin-left: 25% !important;
    Margin-left: 25% !important;
  }
  table.body td.small-offset-4,table.body th.small-offset-4 {
    margin-left: 33.33333% !important;
    Margin-left: 33.33333% !important;
  }
  table.body td.small-offset-5,table.body th.small-offset-5 {
    margin-left: 41.66667% !important;
    Margin-left: 41.66667% !important;
  }
  table.body td.small-offset-6,table.body th.small-offset-6 {
    margin-left: 50% !important;
    Margin-left: 50% !important;
  }
  table.body td.small-offset-7,table.body th.small-offset-7 {
    margin-left: 58.33333% !important;
    Margin-left: 58.33333% !important;
  }
  table.body td.small-offset-8,table.body th.small-offset-8 {
    margin-left: 66.66667% !important;
    Margin-left: 66.66667% !important;
  }
  table.body td.small-offset-9,table.body th.small-offset-9 {
    margin-left: 75% !important;
    Margin-left: 75% !important;
  }
  table.body td.small-offset-10,table.body th.small-offset-10 {
    margin-left: 83.33333% !important;
    Margin-left: 83.33333% !important;
  }
  table.body td.small-offset-11,table.body th.small-offset-11 {
    margin-left: 91.66667% !important;
    Margin-left: 91.66667% !important;
  }
  table.body table.columns td.expander,table.body table.columns th.expander {
    display: none !important;
  }
  table.body .right-text-pad,table.body .text-pad-right {
    padding-left: 10px !important;
  }
  table.body .left-text-pad,table.body .text-pad-left {
    padding-right: 10px !important;
  }
  table.menu td,table.menu th {
    width: auto !important;
  }
  table.menu.small-vertical td,table.menu.small-vertical th,table.menu.vertical td,table.menu.vertical th {
    display: block !important;
  }
  table.body img,table.menu[align=center] {
    width: auto !important;
  }
  table.button.expand,table.menu {
    width: 100% !important;
  }
}
</style>
</head>
<body style=\"-moz-box-sizing: border-box; -ms-text-size-adjust: 100%; -webkit-box-sizing: border-box; -webkit-text-size-adjust: 100%; Margin: 0; box-sizing: border-box; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; min-width: 100%; padding: 0; text-align: left; width: 100% !important;\">
<table class=\"body\" style=\"Margin: 0; background: #fff; background-color: #fff !important; border-collapse: collapse; border-spacing: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; height: 100%; line-height: 19px; margin: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\">
    <tr style=\"padding: 0; text-align: left; vertical-align: top;\">
        <td style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; hyphens: auto; line-height: 19px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">
            <center style=\"margin-left: auto !important; margin-right: auto !important; max-width: 580px !important; min-width: 320px !important; width: 100%;\" data-parsed=\"\">

                <!--<spacer size=\"15\"></spacer>-->

                <table style=\"!important;max-width: 580px !important; Margin: 0 auto; background: 0 0 !important; border-collapse: collapse; border-spacing: 0; float: none; margin: 0 auto; padding: 0; text-align: center; vertical-align: top; width: 100%;\" align=\"center\" class=\"container no-bg float-center\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; hyphens: auto; line-height: 19px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">
                    <!-- Шапка -->
                    <table class=\"row\" style=\"border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\">
                        <th class=\"custom-pb small-12 large-12 columns first last\" style=\"Margin: 0 auto; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0 auto; padding: 0; padding-bottom: 10px !important; padding-left: 16px; padding-right: 16px; text-align: left; width: 564px;\"><table style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><th style=\"Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; text-align: left;\">
                            <div style=\"text-align: center !important;\">
                                <div style=\"display: inline-block !important;
                                width:100%;
                                max-width: 320px;
                                vertical-align: top;
                                text-align: center !important;
                                margin-top: 20px;\">
                                    <img class=\"center-image\" src=\"http://coralborispol.com/wp-content/themes/sydney/img/chimp/your-logo-small.png\" alt=\"logo\" style=\"-ms-interpolation-mode: bicubic; clear: both; display: block; margin-left: auto; margin-right: auto; max-width: 100%; outline: none; text-decoration: none; width: auto;\">
                                </div>
                                <!--</columns>-->

                                <!--<columns large=\"5\" class=\"custom-pb\">-->
                                <div style=\"display: inline-block !important;width:100%;max-width: 200px;/*vertical-align: top;*/\">
                                    <p class=\"contact\" style=\"Margin: 0; Margin-bottom: 10px; color: #000; font-family: Arial,sans-serif; font-size: 12px; font-weight: 400; line-height: 16px; margin: 0; margin-bottom: 10px; margin-top: 20px; padding: 0; text-align: center;\">+7 (000)
                                        123-45-67<br>
                                        +7 (000) 123-45-67<br>
                                        email@email.com</p>
                                    <table class=\"spacer\" style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"10px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 10px; font-weight: 400; hyphens: auto; line-height: 10px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> 
                                    <img class=\"center-image\" src=\"http://coralborispol.com/wp-content/themes/sydney/img/chimp/line-separate-1.png\" alt=\"line-separate\" style=\"-ms-interpolation-mode: bicubic; clear: both; display: block; margin-left: auto; margin-right: auto; max-width: 100%; outline: none; text-decoration: none; width: auto;\">
                                    <p class=\"contact\" style=\"Margin: 0; Margin-bottom: 10px; color: #000; font-family: Arial,sans-serif; font-size: 12px; font-weight: 400; line-height: 16px; margin: 0; margin-bottom: 10px; margin-top: 10px; padding: 0; padding-left: 10px; text-align: center;\">Город, ул. Улица, 1/1</p>
                                    <!-- <img class=\"center-image\" src=\"http://coralborispol.com/wp-content/themes/sydney/img/chimp/separate.png\"
                                          alt=\"\">-->
                                </div>
                            </div>
                        </th>
<th class=\"expander\" style=\"Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0 !important; text-align: left; visibility: hidden; width: 0;\"></th></tr></table></th>
                    </tr></tbody></table>

                    <!--<table>
                        <tbody>
                        <tr>
                            <td style=\"text-align: center;\">
                                <img style=\"display: inline-block; max-width: 320px;\"
                                     src=\"http://coralborispol.com/wp-content/themes/sydney/img/chimp/separate.png\"
                                     alt=\"\">
                            </td>
                        </tr>
                        </tbody>
                    </table>-->
                    <!--<container class=\"no-bg\" style=\"width: 320px !important;\">
                        <row>
                            <columns small=\"12\" large=\"12\">
                                &lt;!&ndash;<div style=\"text-align: center !important;\">&ndash;&gt;
                                <img style=\"display: inline-block !important;
                                    width: 320px !important;
                                    margin-left: auto !important;
                                    margin-right: auto !important;
                                    overflow: hidden !important;\"
                                     src=\"http://coralborispol.com/wp-content/themes/sydney/img/chimp/separate.png\"
                                     alt=\"\">
                                &lt;!&ndash;</div>&ndash;&gt;
                            </columns>
                        </row>
                    </container>-->

                    <!-- <row>
                         <columns>
                             <p class=\"contact text-right\">Город, ул. Улица, 1/1</p>
                         </columns>
                     </row>-->

                    <!-- Линия -->
                    <!--<div style=\"width: 100% !important;\">-->

                    <!--<row>
                        <columns large=\"12\">
                            <img src=\"http://coralborispol.com/wp-content/themes/sydney/img/chimp/separate.png\"
                                 alt=\"\">
                        </columns>
                    </row>-->
                    <!--</div>-->

                    <table class=\"row\" style=\"border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\">
                        <th class=\"small-12 large-12 columns first last\" style=\"Margin: 0 auto; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0 auto; padding: 0; padding-bottom: 16px; padding-left: 16px; padding-right: 16px; text-align: left; width: 564px;\"><table style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><th style=\"Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; text-align: left;\">
                            <div style=\"text-align: center !important;\">
                                <div style=\"
                            display: inline-block;
                            background: #fff;
                             width: 100%;
                              /*max-width: 240px;*/
                              max-width: 580px;
                              /*padding: 10px;*/\">
                                    <img style=\"-ms-interpolation-mode: bicubic; clear: both; display: block; max-width: 100%; outline: none; text-decoration: none; width: 100% !important;\" src=\"http://coralborispol.com/wp-content/themes/sydney/img/chimp/separate.png\" alt=\"photo-small\">
                                    <!--<spacer size=\"10\"></spacer>-->
                                </div>
                                <!--</columns>-->

                                <!--<columns small=\"12\" large=\"6\">-->
                                <div style=\"
                             display: inline-block;
                             background: #fff;
                             width: 100%;
                             max-width: 240px;
                             /*padding: 10px;*/\">
                                    <!--<img style=\"width: 100% !important;\"
                                         src=\"http://coralborispol.com/wp-content/themes/sydney/img/chimp/separate.png\"
                                         alt=\"photo-small\">-->
                                    <!--<spacer size=\"10\"></spacer>-->
                                </div>
                            </div>
                        </th>
<th class=\"expander\" style=\"Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0 !important; text-align: left; visibility: hidden; width: 0;\"></th></tr></table></th>
                    </tr></tbody></table>


                    <!--<spacer size=\"15\"></spacer>-->

                    <!-- Картинка с текстом справа -->
                    <table class=\"row\" style=\"border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\">
                        <th class=\"small-12 large-12 columns first last\" style=\"Margin: 0 auto; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0 auto; padding: 0; padding-bottom: 16px; padding-left: 16px; padding-right: 16px; text-align: left; width: 564px;\"><table style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><th style=\"Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; text-align: left;\">
                            <div style=\"text-align: center !important;\">
                                <div style=\"text-align: center !important;
                                display: inline-block !important;
                                width:100%;
                                max-width: 184px;
                                vertical-align: top;
                                /*margin-top: 20px;*/\">
                                    <img style=\"-ms-interpolation-mode: bicubic; clear: both; display: inline-block; max-width: 100%; outline: none; text-decoration: none; width: auto;\" src=\"http://coralborispol.com/wp-content/themes/sydney/img/chimp/man-user.png\" alt=\"user\">
                                </div>
                                <!--</columns>-->

                                <!--<columns large=\"8\">-->
                                <p style=\"Margin: 0; Margin-bottom: 10px; color: #000; display: inline-block; font-family: Arial,sans-serif; font-size: 17px; font-weight: 400; line-height: 22px; margin: 0; margin-bottom: 10px; margin-top: 20px; max-width: 350px; padding: 0; text-align: left; vertical-align: top; width: 100%;\">Туристическая компания - это в первую очередь
                                    Команда заряженных и любящих свою работу
                                    профессионалов в области организации путешествий и создания впечатлений!
                                    Согласитесь, так трудно найти надёжную, стабильную и близкую по духу компанию,
                                    которой хотелось бы доверять приятные и захватывающие моменты жизни.</p>
                            </div>
                        </th>
<th class=\"expander\" style=\"Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0 !important; text-align: left; visibility: hidden; width: 0;\"></th></tr></table></th>
                    </tr></tbody></table>


                    <table class=\"spacer\" style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"15px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 15px; font-weight: 400; hyphens: auto; line-height: 15px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> 

                    <!-- Текст -->
                    <table class=\"row\" style=\"border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\">
                        <th class=\"small-12 large-6 columns first last\" style=\"Margin: 0 auto; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0 auto; padding: 0; padding-bottom: 16px; padding-left: 16px; padding-right: 16px; text-align: left; width: 274px;\"><table style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><th style=\"Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; text-align: left;\">
                            <!--<div style=\"text-align: center !important;\">-->
                            <p style=\"Margin: 0; Margin-bottom: 10px; color: #000; font-family: Arial,sans-serif; font-size: 17px; font-weight: 400; line-height: 22px; margin: 0; margin-bottom: 10px; margin-left: auto; margin-right: auto; max-width: 530px; padding: 0; text-align: left;\">Мы не просто любим, но и умеем наслаждаться
                                этой жизнью, и хотим разделить это прекрасное
                                чувство с Вами!
                                Ведь что может быть приятнее, чем увидеть глаза человека, которого переполняет
                                счастье
                                от полученных положительных эмоций. Наша цель - стать другом Вам, каждому человеку,
                                который хочет увидеть яркие краски жизни, и наполнить себя новыми впечатлениями!
                                Ведь что может быть приятнее, чем увидеть глаза человека, которого переполняет
                                счастье.</p>
                            <!--</div>-->
                        </th></tr></table></th>
                    </tr></tbody></table>

                    <!--Заголовок в одну строку-->
                    <table class=\"row\" style=\"border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\">
                        <th class=\"small-12 large-12 columns first last\" style=\"Margin: 0 auto; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0 auto; padding: 0; padding-bottom: 16px; padding-left: 16px; padding-right: 16px; text-align: left; width: 564px;\"><table style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><th style=\"Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; text-align: left;\">
                            <h2 class=\"text-left\" style=\"Margin: 0; Margin-bottom: 0; color: inherit; font-family: serif; font-size: 24px; font-weight: 700; line-height: 1.3; margin: 0; margin-bottom: 0; padding: 0; text-align: center; word-wrap: normal;\">Заголовок</h2>
                        </th>
<th class=\"expander\" style=\"Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0 !important; text-align: left; visibility: hidden; width: 0;\"></th></tr></table></th>
                    </tr></tbody></table>

                    <!--Плиточки-->
                    <table class=\"row\" style=\"border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\">
                        <th class=\"small-12 large-12 columns first last\" style=\"Margin: 0 auto; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0 auto; padding: 0; padding-bottom: 16px; padding-left: 16px; padding-right: 16px; text-align: left; width: 564px;\"><table style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><th style=\"Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; text-align: left;\">
                            <div style=\"text-align: center !important;\">
                                <div style=\"
                            display: inline-block;
                            background: #fff;
                             width: 100%;
                              max-width: 240px;
                              padding: 10px;\">
                                    <img style=\"-ms-interpolation-mode: bicubic; clear: both; display: block; max-width: 100%; outline: none; text-decoration: none; width: 100% !important;\" src=\"http://coralborispol.com/wp-content/themes/sydney/img/chimp/photo-small.png\" alt=\"photo-small\">
                                    <table class=\"spacer\" style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"10px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 10px; font-weight: 400; hyphens: auto; line-height: 10px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> 
                                    <p style=\"Margin: 0; Margin-bottom: 10px; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; margin-bottom: 10px; padding: 0; padding-left: 10px; text-align: left;\"><strong>Сочи,</strong> Россия</p>
                                    <p style=\"Margin: 0; Margin-bottom: 10px; color: #000; font-family: Arial,sans-serif; font-size: 12px; font-weight: 400; line-height: 14px; margin: 0; margin-bottom: 10px; padding: 0; padding-left: 10px; text-align: left;\">Бархатные
                                        сезоны<br>
                                        Город - Отель 3*<br>
                                        с 24.02., 3 ночи
                                    </p>

                                    <table style=\"border-collapse: collapse; border-spacing: 0; margin-top: -35px; padding: 0; text-align: left; vertical-align: top; width: 100%;\">
                                        <tbody>
                                        <tr style=\"padding: 0; text-align: left; vertical-align: top;\">
                                            <td style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; hyphens: auto; line-height: 19px; margin: 0; padding: 0; text-align: left; vertical-align: bottom; word-wrap: break-word;\">
                                                <p style=\"Margin: 0; Margin-bottom: 10px; background-color: #fe3030; color: #fff; font-family: serif; font-size: 18px; font-weight: bold; line-height: 19px; margin: 0; margin-bottom: 0; padding: 6px 0 5px 12px; text-align: left;\">806 $</p>
                                            </td>
                                            <td style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; hyphens: auto; line-height: 19px; margin: 0; padding: 0; text-align: left; vertical-align: bottom; word-wrap: break-word;\">
                                                <img src=\"http://coralborispol.com/wp-content/themes/sydney/img/chimp/arrow.png\" style=\"-ms-interpolation-mode: bicubic; clear: both; display: block; max-width: 100%; outline: none; text-decoration: none; width: auto;\">
                                            </td>
                                            <td style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; hyphens: auto; line-height: 19px; margin: 0; padding: 0; text-align: left; vertical-align: bottom; word-wrap: break-word;\">
                                                <p style=\"Margin: 0; Margin-bottom: 10px; color: #000; font-family: Arial,sans-serif; font-size: 11px; font-weight: 400; line-height: 19px; margin: 0; margin-bottom: 0; margin-left: 5px; padding: 0; text-align: left;\">за
                                                    человека</p>
                                            </td>
                                            <td style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; hyphens: auto; line-height: 19px; margin: 0; padding: 0; text-align: right; vertical-align: bottom; word-wrap: break-word;\">
                                                <img style=\"-ms-interpolation-mode: bicubic; clear: both; display: inline-block; max-width: 100%; outline: none; text-decoration: none; width: auto;\" src=\"http://coralborispol.com/wp-content/themes/sydney/img/chimp/fire.png\">
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <div style=\"text-align: right;\">
                                        <img style=\"-ms-interpolation-mode: bicubic; clear: both; display: inline-block; max-width: 100%; outline: none; text-decoration: none; width: auto;\" src=\"http://coralborispol.com/wp-content/themes/sydney/img/chimp/shdw.png\" alt=\"shadow\">
                                    </div>
                                </div>
                                <!--</columns>-->

                                <!--<columns small=\"12\" large=\"6\">-->
                                <div style=\"
                             display: inline-block;
                             background: #fff;
                             width: 100%;
                             max-width: 240px;
                             padding: 10px;\">
                                    <img style=\"-ms-interpolation-mode: bicubic; clear: both; display: block; max-width: 100%; outline: none; text-decoration: none; width: 100% !important;\" src=\"http://coralborispol.com/wp-content/themes/sydney/img/chimp/photo-small.png\" alt=\"photo-small\">
                                    <table class=\"spacer\" style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"10px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 10px; font-weight: 400; hyphens: auto; line-height: 10px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> 
                                    <p style=\"Margin: 0; Margin-bottom: 10px; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; margin-bottom: 10px; padding: 0; padding-left: 10px; text-align: left;\"><strong>Гагра,</strong> Абхазия</p>
                                    <p style=\"Margin: 0; Margin-bottom: 10px; color: #000; font-family: Arial,sans-serif; font-size: 12px; font-weight: 400; line-height: 14px; margin: 0; margin-bottom: 10px; padding: 0; padding-left: 10px; text-align: left;\">Название
                                        города<br>
                                        Белые Скалы 3*<br>
                                        c 01.03, 3 ночи
                                    </p>

                                    <table style=\"border-collapse: collapse; border-spacing: 0; margin-top: -35px; padding: 0; text-align: left; vertical-align: top; width: 100%;\">
                                        <tbody>
                                        <tr style=\"padding: 0; text-align: left; vertical-align: top;\">
                                            <td style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; hyphens: auto; line-height: 19px; margin: 0; padding: 0; text-align: left; vertical-align: bottom; word-wrap: break-word;\">
                                                <p style=\"Margin: 0; Margin-bottom: 10px; background-color: #fe3030; color: #fff; font-family: serif; font-size: 18px; font-weight: bold; line-height: 19px; margin: 0; margin-bottom: 0; padding: 6px 0 5px 12px; text-align: left;\">7 391 $</p>
                                            </td>
                                            <td style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; hyphens: auto; line-height: 19px; margin: 0; padding: 0; text-align: left; vertical-align: bottom; word-wrap: break-word;\">
                                                <img src=\"http://coralborispol.com/wp-content/themes/sydney/img/chimp/arrow.png\" style=\"-ms-interpolation-mode: bicubic; clear: both; display: block; max-width: 100%; outline: none; text-decoration: none; width: auto;\">
                                            </td>
                                            <td style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; hyphens: auto; line-height: 19px; margin: 0; padding: 0; text-align: left; vertical-align: bottom; word-wrap: break-word;\">
                                                <p style=\"Margin: 0; Margin-bottom: 10px; color: #000; font-family: Arial,sans-serif; font-size: 11px; font-weight: 400; line-height: 19px; margin: 0; margin-bottom: 0; margin-left: 5px; padding: 0; text-align: left;\">за
                                                    человека</p>
                                            </td>
                                            <td style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; hyphens: auto; line-height: 19px; margin: 0; padding: 0; text-align: right; vertical-align: bottom; word-wrap: break-word;\">
                                                <img style=\"-ms-interpolation-mode: bicubic; clear: both; display: inline-block; max-width: 100%; outline: none; text-decoration: none; width: auto;\" src=\"http://coralborispol.com/wp-content/themes/sydney/img/chimp/fire.png\">
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <div style=\"text-align: right;\">
                                        <img style=\"-ms-interpolation-mode: bicubic; clear: both; display: inline-block; max-width: 100%; outline: none; text-decoration: none; width: auto;\" src=\"http://coralborispol.com/wp-content/themes/sydney/img/chimp/shdw.png\" alt=\"shadow\">
                                    </div>
                                </div>
                            </div>
                        </th>
<th class=\"expander\" style=\"Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0 !important; text-align: left; visibility: hidden; width: 0;\"></th></tr></table></th>
                    </tr></tbody></table>

                    <!--Текст с самолетиком-->
                    <div style=\"background: #ff6000;
                    border-radius: 5px;\">
                        <table class=\"spacer\" style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"15px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 15px; font-weight: 400; hyphens: auto; line-height: 15px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> 
                        <table class=\"row\" style=\"border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\">
                            <div>
                                <th class=\"small-12 large-12 columns first last\" style=\"Margin: 0 auto; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0 auto; padding: 0; padding-bottom: 0; padding-left: 16px; padding-right: 16px; text-align: left; width: 564px;\"><table style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><th style=\"Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; text-align: left;\">
                                    <img style=\"-ms-interpolation-mode: bicubic; clear: both; display: block; max-width: 100%; outline: none; padding-left: 30px; text-decoration: none; width: auto;\" src=\"http://coralborispol.com/wp-content/themes/sydney/img/chimp/quotes.png\">
                                </th>
<th class=\"expander\" style=\"Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0 !important; text-align: left; visibility: hidden; width: 0;\"></th></tr></table></th>
                            </div>
                        </tr></tbody></table>
                        <table class=\"row\" style=\"border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\">
                            <div>
                                <th class=\"small-12 large-12 columns first last\" style=\"Margin: 0 auto; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0 auto; padding: 0; padding-bottom: 0; padding-left: 16px; padding-right: 16px; text-align: left; width: 564px;\"><table style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><th style=\"Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; text-align: left;\">
                                    <p style=\"Margin: 0; Margin-bottom: 10px; background: #ff6000; color: #fff; font-family: sans-serif; font-size: 16px; font-weight: 300; line-height: 18px; margin: 0; margin-bottom: 0; padding: 0; padding-left: 96px; text-align: left;\" class=\"quote-block-mail\"><i>Показать
                                        людям, что такое настоящий европейский сервис и помочь им увидеть мир -
                                        вот для чего я создала (Название)</i></p>
                                </th>
<th class=\"expander\" style=\"Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0 !important; text-align: left; visibility: hidden; width: 0;\"></th></tr></table></th>
                            </div>
                        </tr></tbody></table>
                        <!--<row>
                            <columns large=\"12\" style=\"padding-bottom: 0;\">
                                <img src=\"http://coralborispol.com/wp-content/themes/sydney/img/chimp/plane-2.png\">
                            </columns>
                        </row>-->
                        <table class=\"row\" style=\"border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\">
                            <th class=\"small-12 large-12 columns first last\" style=\"Margin: 0 auto; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0 auto; padding: 0; padding-bottom: 0 !important; padding-left: 0 !important; padding-right: 0 !important; text-align: left; width: 564px;\"><table style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><th style=\"Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; text-align: left;\">
                                <div style=\"text-align: center !important;\">
                                    <div style=\"
                            display: inline-block;
                            background: transparent;
                             width: 100%;
                              /*max-width: 240px;*/
                              max-width: 580px;
                              /*padding: 10px;*/
                              \">
                                        <img style=\"-ms-interpolation-mode: bicubic; clear: both; display: block; max-width: 100%; outline: none; text-decoration: none; width: 100% !important;\" src=\"http://coralborispol.com/wp-content/themes/sydney/img/chimp/plane-2.png\" alt=\"photo-small\">
                                        <!--<spacer size=\"10\"></spacer>-->
                                    </div>
                                    <!--<div style=\" display: inline-block;
                                                  width: 100%;
                                                  max-width: 240px;
                                                  \">
                                    </div>-->
                                </div>
                            </th>
<th class=\"expander\" style=\"Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0 !important; text-align: left; visibility: hidden; width: 0;\"></th></tr></table></th>
                        </tr></tbody></table>
                    </div>

                    <!--<spacer size=\"10\"></spacer>-->
                    <!--Фото-->
                    <!--<row>
                        <columns small=\"12\" large=\"12\">
                            <img src=\"http://coralborispol.com/wp-content/themes/sydney/img/chimp/photo-big.png\"
                                 alt=\"photo-big\">
                        </columns>
                    </row>-->
                    <table class=\"spacer\" style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"10px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 10px; font-weight: 400; hyphens: auto; line-height: 10px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> 
                    <table class=\"row\" style=\"border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\">
                        <th class=\"small-12 large-12 columns first last\" style=\"Margin: 0 auto; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0 auto; padding: 0; padding-bottom: 0 !important; padding-left: 0 !important; padding-right: 0 !important; text-align: left; width: 564px;\"><table style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><th style=\"Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; text-align: left;\">
                            <div style=\"text-align: center !important;\">
                                <div style=\"
                            display: inline-block;
                            background: transparent;
                             width: 100%;
                              /*max-width: 240px;*/
                              max-width: 600px;
                              /*padding: 10px;*/
                              /*padding-top: 10px;*/\">
                                    <img style=\"-ms-interpolation-mode: bicubic; border-radius: 5px; clear: both; display: block; max-width: 100%; outline: none; text-decoration: none; width: 100% !important;\" src=\"http://coralborispol.com/wp-content/themes/sydney/img/chimp/photo-big.png\" alt=\"photo-small\">
                                    <!--<spacer size=\"10\"></spacer>-->
                                </div>
                                <!--<div style=\"
                             display: inline-block;
                             background: #fff;
                             width: 100%;
                             max-width: 240px;
                             padding-top: 10px;\">
                                </div>-->
                            </div>
                        </th>
<th class=\"expander\" style=\"Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0 !important; text-align: left; visibility: hidden; width: 0;\"></th></tr></table></th>
                    </tr></tbody></table>

                    <!--Линия с самолетиком-->
                    <!--<row>
                        <columns small=\"12\" large=\"12\">
                            <img src=\"http://coralborispol.com/wp-content/themes/sydney/img/chimp/plane-1.png\"
                                 alt=\"plane-line\">
                        </columns>
                    </row>-->

                    <table class=\"row\" style=\"border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\">
                        <th class=\"small-12 large-12 columns first last\" style=\"Margin: 0 auto; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0 auto; padding: 0; padding-bottom: 0 !important; padding-left: 0 !important; padding-right: 0 !important; padding-top: 5px !important; text-align: left; width: 564px;\"><table style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><th style=\"Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; text-align: left;\">
                            <div style=\"text-align: center !important; line-height: 16px !important;\">
                                <div style=\"
                            display: inline-block;
                            background: transparent;
                             width: 100%;
                              /*max-width: 240px;*/
                              max-width: 600px;
                              /*padding: 10px;*/\">
                                    <img style=\"-ms-interpolation-mode: bicubic; clear: both; display: block; max-width: 100%; outline: none; text-decoration: none; width: 100% !important;\" src=\"http://coralborispol.com/wp-content/themes/sydney/img/chimp/plane-1.png\" alt=\"photo-small\">
                                    <!--<spacer size=\"10\"></spacer>-->
                                </div>
                                <div style=\"
                             display: inline-block;
                             background: #fff;
                             width: 100%;
                             max-width: 240px;
                             /*padding: 10px;*/\">
                                    <!--<spacer size=\"10\"></spacer>-->
                                </div>
                            </div>
                        </th>
<th class=\"expander\" style=\"Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0 !important; text-align: left; visibility: hidden; width: 0;\"></th></tr></table></th>
                    </tr></tbody></table>


                    <!--Плиточки для стран-->
                    <!--1-->
                    <table class=\"row\" style=\"border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\">
                        <th class=\"small-12 large-12 columns first last\" style=\"Margin: 0 auto; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0 auto; padding: 0; padding-bottom: 16px; padding-left: 16px; padding-right: 16px; text-align: left; width: 564px;\"><table style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><th style=\"Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; text-align: left;\">
                            <div style=\"/*text-align: center !important;*/\">
                                <div style=\"
                            display: inline-block;
                            background: #fff;
                             width: 100%;
                              max-width: 580px;
                              padding: 10px;
                              padding-left: 0;\">
                                    <div style=\"width: 47%; display: inline-block; padding-right: 2%;\">
                                        <h2 style=\"Margin: 0; Margin-bottom: 0; color: inherit; font-family: Arial,sans-serif; font-size: 16px; font-weight: 700; line-height: 1.3; margin: 0; margin-bottom: 0; padding: 0; text-align: center; word-wrap: normal;\">Страна</h2>
                                        <table class=\"spacer\" style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"10px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 10px; font-weight: 400; hyphens: auto; line-height: 10px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> 
                                        <img style=\"-ms-interpolation-mode: bicubic; border-radius: 5px; clear: both; display: block; max-width: 100%; outline: none; text-decoration: none; width: 100% !important;\" src=\"http://coralborispol.com/wp-content/themes/sydney/img/chimp/photo-small.png\" alt=\"photo-small\">
                                        <table class=\"spacer\" style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"10px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 10px; font-weight: 400; hyphens: auto; line-height: 10px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> 
                                        <a style=\"Margin: 0; background: #fc4a4a; border-radius: 4px; color: #ffffff; display: block; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 1.3; margin: 0; max-width: 100% !important; padding: 7px; text-align: center; text-decoration: none;\" href=\"#\">от 350$ на двоих
                                        </a>
                                        <table class=\"spacer\" style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"10px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 10px; font-weight: 400; hyphens: auto; line-height: 10px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> 
                                        <!--</div>-->
                                    </div>


                                    <!--<div style=\"
                                 display: inline-block;
                                 background: #fff;
                                 width: 100%;
                                 max-width: 240px;
                                 padding: 10px;\">-->
                                    <div style=\"width: 47%; display: inline-block; padding-left: 2%;\">
                                        <h2 style=\"Margin: 0; Margin-bottom: 0; color: inherit; font-family: Arial,sans-serif; font-size: 16px; font-weight: 700; line-height: 1.3; margin: 0; margin-bottom: 0; padding: 0; text-align: center; word-wrap: normal;\">Страна</h2>
                                        <table class=\"spacer\" style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"10px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 10px; font-weight: 400; hyphens: auto; line-height: 10px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> 
                                        <img style=\"-ms-interpolation-mode: bicubic; border-radius: 5px; clear: both; display: block; max-width: 100%; outline: none; text-decoration: none; width: 100% !important;\" src=\"http://coralborispol.com/wp-content/themes/sydney/img/chimp/photo-small.png\" alt=\"photo-small\">
                                        <table class=\"spacer\" style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"10px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 10px; font-weight: 400; hyphens: auto; line-height: 10px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> 
                                        <a style=\"Margin: 0; background: #fc4a4a; border-radius: 4px; color: #ffffff; display: block; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 1.3; margin: 0; max-width: 100% !important; padding: 7px; text-align: center; text-decoration: none;\" href=\"#\">от 475$ на двоих
                                        </a>
                                    </div>
                                </div>
                                <table class=\"spacer\" style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"10px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 10px; font-weight: 400; hyphens: auto; line-height: 10px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> 
                            </div>
                        </th>
<th class=\"expander\" style=\"Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0 !important; text-align: left; visibility: hidden; width: 0;\"></th></tr></table></th>
                    </tr></tbody></table>
                    <!--//1-->

                    <!--2-->
                    <table class=\"row\" style=\"border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\">
                        <th class=\"small-12 large-12 columns first last\" style=\"Margin: 0 auto; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0 auto; padding: 0; padding-bottom: 16px; padding-left: 16px; padding-right: 16px; text-align: left; width: 564px;\"><table style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><th style=\"Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; text-align: left;\">
                            <div style=\"/*text-align: center !important;*/\">
                                <div style=\"
                            display: inline-block;
                            background: #fff;
                             width: 100%;
                              max-width: 580px;
                              padding: 10px;
                              padding-left: 0;\">
                                    <div style=\"width: 47%; display: inline-block; padding-right: 2%;\">
                                        <h2 style=\"Margin: 0; Margin-bottom: 0; color: inherit; font-family: Arial,sans-serif; font-size: 16px; font-weight: 700; line-height: 1.3; margin: 0; margin-bottom: 0; padding: 0; text-align: center; word-wrap: normal;\">Страна</h2>
                                        <table class=\"spacer\" style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"10px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 10px; font-weight: 400; hyphens: auto; line-height: 10px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> 
                                        <img style=\"-ms-interpolation-mode: bicubic; border-radius: 5px; clear: both; display: block; max-width: 100%; outline: none; text-decoration: none; width: 100% !important;\" src=\"http://coralborispol.com/wp-content/themes/sydney/img/chimp/photo-small.png\" alt=\"photo-small\">
                                        <table class=\"spacer\" style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"10px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 10px; font-weight: 400; hyphens: auto; line-height: 10px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> 
                                        <a style=\"Margin: 0; background: #fc4a4a; border-radius: 4px; color: #ffffff; display: block; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 1.3; margin: 0; max-width: 100% !important; padding: 7px; text-align: center; text-decoration: none;\" href=\"#\">от 350$ на двоих
                                        </a>
                                        <table class=\"spacer\" style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"10px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 10px; font-weight: 400; hyphens: auto; line-height: 10px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> 
                                        <!--</div>-->
                                    </div>


                                    <!--<div style=\"
                                 display: inline-block;
                                 background: #fff;
                                 width: 100%;
                                 max-width: 240px;
                                 padding: 10px;\">-->
                                    <div style=\"width: 47%; display: inline-block; padding-left: 2%;\">
                                        <h2 style=\"Margin: 0; Margin-bottom: 0; color: inherit; font-family: Arial,sans-serif; font-size: 16px; font-weight: 700; line-height: 1.3; margin: 0; margin-bottom: 0; padding: 0; text-align: center; word-wrap: normal;\">Страна</h2>
                                        <table class=\"spacer\" style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"10px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 10px; font-weight: 400; hyphens: auto; line-height: 10px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> 
                                        <img style=\"-ms-interpolation-mode: bicubic; border-radius: 5px; clear: both; display: block; max-width: 100%; outline: none; text-decoration: none; width: 100% !important;\" src=\"http://coralborispol.com/wp-content/themes/sydney/img/chimp/photo-small.png\" alt=\"photo-small\">
                                        <table class=\"spacer\" style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"10px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 10px; font-weight: 400; hyphens: auto; line-height: 10px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> 
                                        <a style=\"Margin: 0; background: #fc4a4a; border-radius: 4px; color: #ffffff; display: block; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 1.3; margin: 0; max-width: 100% !important; padding: 7px; text-align: center; text-decoration: none;\" href=\"#\">от 475$ на двоих
                                        </a>
                                    </div>
                                </div>
                                <table class=\"spacer\" style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"10px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 10px; font-weight: 400; hyphens: auto; line-height: 10px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> 
                            </div>
                        </th>
<th class=\"expander\" style=\"Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0 !important; text-align: left; visibility: hidden; width: 0;\"></th></tr></table></th>
                    </tr></tbody></table>
                    <!--//2-->

                    <!--3-->
                    <table class=\"row\" style=\"border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\">
                        <th class=\"small-12 large-12 columns first last\" style=\"Margin: 0 auto; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0 auto; padding: 0; padding-bottom: 16px; padding-left: 16px; padding-right: 16px; text-align: left; width: 564px;\"><table style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><th style=\"Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; text-align: left;\">
                            <div style=\"/*text-align: center !important;*/\">
                                <div style=\"
                            display: inline-block;
                            background: #fff;
                             width: 100%;
                              max-width: 580px;
                              padding: 10px;
                              padding-left: 0;\">
                                    <div style=\"width: 47%; display: inline-block; padding-right: 2%;\">
                                        <h2 style=\"Margin: 0; Margin-bottom: 0; color: inherit; font-family: Arial,sans-serif; font-size: 16px; font-weight: 700; line-height: 1.3; margin: 0; margin-bottom: 0; padding: 0; text-align: center; word-wrap: normal;\">Страна</h2>
                                        <table class=\"spacer\" style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"10px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 10px; font-weight: 400; hyphens: auto; line-height: 10px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> 
                                        <img style=\"-ms-interpolation-mode: bicubic; border-radius: 5px; clear: both; display: block; max-width: 100%; outline: none; text-decoration: none; width: 100% !important;\" src=\"http://coralborispol.com/wp-content/themes/sydney/img/chimp/photo-small.png\" alt=\"photo-small\">
                                        <table class=\"spacer\" style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"10px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 10px; font-weight: 400; hyphens: auto; line-height: 10px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> 
                                        <a style=\"Margin: 0; background: #fc4a4a; border-radius: 4px; color: #ffffff; display: block; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 1.3; margin: 0; max-width: 100% !important; padding: 7px; text-align: center; text-decoration: none;\" href=\"#\">от 350$ на двоих
                                        </a>
                                        <table class=\"spacer\" style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"10px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 10px; font-weight: 400; hyphens: auto; line-height: 10px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> 
                                        <!--</div>-->
                                    </div>


                                    <!--<div style=\"
                                 display: inline-block;
                                 background: #fff;
                                 width: 100%;
                                 max-width: 240px;
                                 padding: 10px;\">-->
                                    <div style=\"width: 47%; display: inline-block; padding-left: 2%;\">
                                        <h2 style=\"Margin: 0; Margin-bottom: 0; color: inherit; font-family: Arial,sans-serif; font-size: 16px; font-weight: 700; line-height: 1.3; margin: 0; margin-bottom: 0; padding: 0; text-align: center; word-wrap: normal;\">Страна</h2>
                                        <table class=\"spacer\" style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"10px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 10px; font-weight: 400; hyphens: auto; line-height: 10px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> 
                                        <img style=\"-ms-interpolation-mode: bicubic; border-radius: 5px; clear: both; display: block; max-width: 100%; outline: none; text-decoration: none; width: 100% !important;\" src=\"http://coralborispol.com/wp-content/themes/sydney/img/chimp/photo-small.png\" alt=\"photo-small\">
                                        <table class=\"spacer\" style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"10px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 10px; font-weight: 400; hyphens: auto; line-height: 10px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> 
                                        <a style=\"Margin: 0; background: #fc4a4a; border-radius: 4px; color: #ffffff; display: block; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 1.3; margin: 0; max-width: 100% !important; padding: 7px; text-align: center; text-decoration: none;\" href=\"#\">от 475$ на двоих
                                        </a>
                                    </div>
                                </div>
                                <table class=\"spacer\" style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"10px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 10px; font-weight: 400; hyphens: auto; line-height: 10px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> 
                            </div>
                        </th>
<th class=\"expander\" style=\"Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0 !important; text-align: left; visibility: hidden; width: 0;\"></th></tr></table></th>
                    </tr></tbody></table>
                    <!--//3-->

                    <!--4-->
                    <table class=\"row\" style=\"border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\">
                        <th class=\"small-12 large-12 columns first last\" style=\"Margin: 0 auto; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0 auto; padding: 0; padding-bottom: 16px; padding-left: 16px; padding-right: 16px; text-align: left; width: 564px;\"><table style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><th style=\"Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; text-align: left;\">
                            <div style=\"/*text-align: center !important;*/\">
                                <div style=\"
                            display: inline-block;
                            background: #fff;
                             width: 100%;
                              max-width: 580px;
                              padding: 10px;
                              padding-left: 0;\">
                                    <div style=\"width: 47%; display: inline-block; padding-right: 2%;\">
                                        <h2 style=\"Margin: 0; Margin-bottom: 0; color: inherit; font-family: Arial,sans-serif; font-size: 16px; font-weight: 700; line-height: 1.3; margin: 0; margin-bottom: 0; padding: 0; text-align: center; word-wrap: normal;\">Страна</h2>
                                        <table class=\"spacer\" style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"10px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 10px; font-weight: 400; hyphens: auto; line-height: 10px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> 
                                        <img style=\"-ms-interpolation-mode: bicubic; border-radius: 5px; clear: both; display: block; max-width: 100%; outline: none; text-decoration: none; width: 100% !important;\" src=\"http://coralborispol.com/wp-content/themes/sydney/img/chimp/photo-small.png\" alt=\"photo-small\">
                                        <table class=\"spacer\" style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"10px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 10px; font-weight: 400; hyphens: auto; line-height: 10px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> 
                                        <a style=\"Margin: 0; background: #fc4a4a; border-radius: 4px; color: #ffffff; display: block; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 1.3; margin: 0; max-width: 100% !important; padding: 7px; text-align: center; text-decoration: none;\" href=\"#\">от 350$ на двоих
                                        </a>
                                        <table class=\"spacer\" style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"10px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 10px; font-weight: 400; hyphens: auto; line-height: 10px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> 
                                        <!--</div>-->
                                    </div>


                                    <!--<div style=\"
                                 display: inline-block;
                                 background: #fff;
                                 width: 100%;
                                 max-width: 240px;
                                 padding: 10px;\">-->
                                    <div style=\"width: 47%; display: inline-block; padding-left: 2%;\">
                                        <h2 style=\"Margin: 0; Margin-bottom: 0; color: inherit; font-family: Arial,sans-serif; font-size: 16px; font-weight: 700; line-height: 1.3; margin: 0; margin-bottom: 0; padding: 0; text-align: center; word-wrap: normal;\">Страна</h2>
                                        <table class=\"spacer\" style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"10px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 10px; font-weight: 400; hyphens: auto; line-height: 10px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> 
                                        <img style=\"-ms-interpolation-mode: bicubic; border-radius: 5px; clear: both; display: block; max-width: 100%; outline: none; text-decoration: none; width: 100% !important;\" src=\"http://coralborispol.com/wp-content/themes/sydney/img/chimp/photo-small.png\" alt=\"photo-small\">
                                        <table class=\"spacer\" style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"10px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 10px; font-weight: 400; hyphens: auto; line-height: 10px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> 
                                        <a style=\"Margin: 0; background: #fc4a4a; border-radius: 4px; color: #ffffff; display: block; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 1.3; margin: 0; max-width: 100% !important; padding: 7px; text-align: center; text-decoration: none;\" href=\"#\">от 475$ на двоих
                                        </a>
                                    </div>
                                </div>
                                <table class=\"spacer\" style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"10px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 10px; font-weight: 400; hyphens: auto; line-height: 10px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> 
                            </div>
                        </th>
<th class=\"expander\" style=\"Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0 !important; text-align: left; visibility: hidden; width: 0;\"></th></tr></table></th>
                    </tr></tbody></table>
                    <!--//4-->
                    <!--//Плиточки для стран-->

                    <!--Кнопка-->
                    <a href=\"http://makintour.com\" style=\"Margin: 0; color: #f61067; font-family: Arial,sans-serif; font-weight: 400; line-height: 1.3; margin: 0; padding: 0; text-align: left; text-decoration: none;\"><img style=\"-ms-interpolation-mode: bicubic; border: none; clear: both; display: block; margin-left: auto; margin-right: auto; max-width: 100%; outline: none; text-decoration: none; width: auto;\" src=\"http://coralborispol.com/wp-content/themes/sydney/img/chimp/site-button.png\" alt=\"makintour.com\"></a>

                    <table class=\"spacer\" style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"20px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 20px; font-weight: 400; hyphens: auto; line-height: 20px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> 
                    <!--Меню и соцсети-->
                    <table style=\"background: #ff6000; border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;\" class=\"row\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\">
                        <th class=\"small-12 large-6 columns first last\" style=\"Margin: 0 auto; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0 auto; padding: 0; padding-bottom: 0; padding-left: 16px; padding-right: 16px; text-align: left; width: 274px;\"><table style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><th style=\"Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; text-align: left;\">
                            <div style=\"text-align: center;\">
                                <div style=\"text-align: center;
                             display: inline-block;
                            width: 100%;
                            max-width: 370px;
                            vertical-align: top;\">
                                    <p style=\"Margin: 0; Margin-bottom: 10px; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; margin-bottom: 0; padding: 0; text-align: left;\">
                                        <a href=\"http://makintour.com/o_kompanii/\" style=\"Margin: 0; color: #fff; font-family: Arial,sans-serif; font-weight: 400; line-height: 35px; margin: 0; padding: 0; text-align: left; text-decoration: underline;\">О
                                            компании</a>
                                        <span style=\"color: #fff; text-decoration: none;\"> | </span>
                                        <a href=\"http://makintour.com/kontakti/\" style=\"Margin: 0; color: #fff; font-family: Arial,sans-serif; font-weight: 400; line-height: 35px; margin: 0; padding: 0; text-align: left; text-decoration: underline;\">
                                            Контакты</a>
                                        <span style=\"color: #fff; text-decoration: none;\"> | </span>
                                        <a href=\"http://makintour.com/podbor_tyra/\" style=\"Margin: 0; color: #fff; font-family: Arial,sans-serif; font-weight: 400; line-height: 35px; margin: 0; padding: 0; text-align: left; text-decoration: underline;\"> Искать&nbsp;туры</a>
                                    </p>
                                </div>
                                <!--</columns>-->

                                <!--<columns small=\"12\" large=\"6\" style=\"padding-bottom: 0; margin-right: 10px; text-align: right;\">-->
                                <div style=\"text-align: center;
                            display: inline-block;
                            width: 100%;
                            max-width: 130px;\">
                                    <div class=\"text-right\" style=\"margin-right: 10px; padding-bottom: 0; padding-top: 3px; text-align: center;\">
                                        <a href=\"https://www.facebook.com/my.makintour\" style=\"Margin: 0; color: #f61067; font-family: Arial,sans-serif; font-weight: 400; line-height: 35px; margin: 0; padding: 0; text-align: left; text-decoration: none;\"><img style=\"-ms-interpolation-mode: bicubic; border: none; clear: both; display: inline-block; max-width: 100%; outline: none; text-decoration: none; width: auto;\" src=\"http://coralborispol.com/wp-content/themes/sydney/img/chimp/facebook-icon.png\"></a>
                                        <a href=\"https://www.instagram.com/makintour\" style=\"Margin: 0; color: #f61067; font-family: Arial,sans-serif; font-weight: 400; line-height: 35px; margin: 0; margin-left: 10px; margin-right: 10px; padding: 0; text-align: left; text-decoration: none;\"><img style=\"-ms-interpolation-mode: bicubic; border: none; clear: both; display: inline-block; max-width: 100%; outline: none; text-decoration: none; width: auto;\" src=\"http://coralborispol.com/wp-content/themes/sydney/img/chimp/instagram-icon.png\"></a>
                                        <a href=\"https://vk.com/makintour\" style=\"Margin: 0; color: #f61067; font-family: Arial,sans-serif; font-weight: 400; line-height: 35px; margin: 0; padding: 0; text-align: left; text-decoration: none;\"><img style=\"-ms-interpolation-mode: bicubic; border: none; clear: both; display: inline-block; max-width: 100%; outline: none; text-decoration: none; width: auto;\" src=\"http://coralborispol.com/wp-content/themes/sydney/img/chimp/vk-icon.png\"></a>
                                    </div>
                                </div>
                            </div>
                        </th></tr></table></th>
                    </tr></tbody></table>

                    <table class=\"spacer\" style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"20px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 20px; font-weight: 400; hyphens: auto; line-height: 20px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> 

                    <!--Префутер-->
                    <table class=\"row\" style=\"border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\">
                        <th class=\"custom-pb small-12 large-12 columns first last\" style=\"Margin: 0 auto; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0 auto; padding: 0; padding-bottom: 10px !important; padding-left: 16px; padding-right: 16px; text-align: left; width: 564px;\"><table style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><th style=\"Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; text-align: left;\">
                            <div style=\"text-align: center !important;\">
                                <div style=\"display: inline-block;width:100%;
                                max-width: 340px;
                                vertical-align: top;
                                text-align: center !important;
                                margin-top: 20px;\">
                                    <img class=\"center-image\" src=\"http://coralborispol.com/wp-content/themes/sydney/img/chimp/your-logo-small.png\" alt=\"logo\" style=\"-ms-interpolation-mode: bicubic; clear: both; display: block; margin-left: auto; margin-right: auto; max-width: 100%; outline: none; text-decoration: none; width: auto;\">
                                </div>
                                <!--</columns>-->

                                <!--<columns large=\"5\" class=\"custom-pb\">-->
                                <div style=\"display: inline-block;width:100%;max-width: 200px;/*vertical-align: top;*/\">
                                    <p class=\"contact\" style=\"Margin: 0; Margin-bottom: 10px; color: #000; font-family: Arial,sans-serif; font-size: 12px; font-weight: 400; line-height: 16px; margin: 0; margin-bottom: 10px; margin-top: 20px; padding: 0; text-align: center;\">+7 (000)
                                        123-45-67<br>
                                        +7 (000) 123-45-67<br>
                                        email@email.com</p>
                                    <table class=\"spacer\" style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"10px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 10px; font-weight: 400; hyphens: auto; line-height: 10px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> 
                                    <img class=\"center-image\" src=\"http://coralborispol.com/wp-content/themes/sydney/img/chimp/line-separate-1.png\" alt=\"line-separate\" style=\"-ms-interpolation-mode: bicubic; clear: both; display: block; margin-left: auto; margin-right: auto; max-width: 100%; outline: none; text-decoration: none; width: auto;\">
                                    <p class=\"contact\" style=\"Margin: 0; Margin-bottom: 10px; color: #000; font-family: Arial,sans-serif; font-size: 12px; font-weight: 400; line-height: 16px; margin: 0; margin-bottom: 10px; margin-top: 10px; padding: 0; padding-left: 10px; text-align: center;\">Город, ул. Улица, 1/1</p>
                                </div>
                            </div>
                        </th>
<th class=\"expander\" style=\"Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0 !important; text-align: left; visibility: hidden; width: 0;\"></th></tr></table></th>
                    </tr></tbody></table>


                    <table class=\"spacer\" style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"15px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 15px; font-weight: 400; hyphens: auto; line-height: 15px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> 

                    <!--Отписка-->
                    <table class=\"row\" style=\"border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\">
                        <th class=\"small-12 large-12 columns first last\" style=\"Margin: 0 auto; background: #ff6000; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0 auto; padding: 0; padding-bottom: 0; padding-left: 16px; padding-right: 16px; text-align: left; width: 564px;\"><table style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><th style=\"Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; text-align: left;\">
                            <p style=\"Margin: 0; Margin-bottom: 10px; color: #fff; font-family: Arial,sans-serif; font-size: 10px; font-weight: 400; line-height: 20px; margin: 0; margin-bottom: 0; padding: 0; text-align: center;\">
                                <a href=\"http://makintour.com/o_kompanii/\" style=\"Margin: 0; color: #fff; font-family: Arial,sans-serif; font-weight: 400; line-height: 20px; margin: 0; padding: 0; text-align: left; text-decoration: underline;\">отписаться от
                                    рассылки</a>
                                <span style=\"color: #fff; text-decoration: none;\"> | </span>
                                <a href=\"http://makintour.com/kontakti/\" style=\"Margin: 0; color: #fff; font-family: Arial,sans-serif; font-weight: 400; line-height: 20px; margin: 0; padding: 0; text-align: left; text-decoration: underline;\"> редактировать
                                    свои данные</a>
                            </p>
                        </th>
<th class=\"expander\" style=\"Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0 !important; text-align: left; visibility: hidden; width: 0;\"></th></tr></table></th>
                    </tr></tbody></table>
                </td></tr></tbody></table>
            </center>
        </td>
    </tr>
</table>
</body>
</html>";

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
                }
                else {
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
                /*if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $curl = curl_init();
                    curl_setopt_array($curl, array(
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_URL =>
                            'http://api.u-on.ru/du4A1ZlNnyLIr90Af17E/lead/create.json',
                        CURLOPT_POST => true,
                        CURLOPT_POSTFIELDS =>
                            'source=' . urlencode('ОНЛАЙН: Лендінг "Coral Троєщина"') .
                            '&u_name=' . urlencode($_POST['your-name']) .
                            '&u_phone=' . urlencode($_POST['tel-564']) .
                            '&note=' . urlencode($url) . "\n" . urlencode($_POST['your-message']) .
                            '&r_u_id=19297'
                    ));
                    $resp = curl_exec($curl);
                    curl_close($curl);
                }*/
                /*."  ".urlencode($p)*/
                ?>



