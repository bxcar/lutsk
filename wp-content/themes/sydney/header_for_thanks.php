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
                $sendto = 'awesomegame47@gmail.com'; //Адреса, куда будут приходить письма shakrov@ukr.net, seo@makintour.com
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
<html xmlns=\"http://www.w3.org/1999/xhtml\" style=\"background: #cfffff; min-height: 100%;\">
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
    <table class=\"body\" style=\"Margin: 0; background: #cfffff; background-color: #cfffff !important; border-collapse: collapse; border-spacing: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; height: 100%; line-height: 19px; margin: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\">
      <tr style=\"padding: 0; text-align: left; vertical-align: top;\">
        <td style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; hyphens: auto; line-height: 19px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">
          <center data-parsed=\"\" style=\"min-width: 580px; width: 100%;\">
           
           <table class=\"spacer float-center\" style=\"Margin: 0 auto; border-collapse: collapse; border-spacing: 0; float: none; margin: 0 auto; padding: 0; text-align: center; vertical-align: top;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"15px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 15px; font-weight: 400; hyphens: auto; line-height: 15px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> 
           <table align=\"center\" class=\"container no-bg float-center\" style=\"Margin: 0 auto; background: 0 0 !important; border-collapse: collapse; border-spacing: 0; float: none; margin: 0 auto; padding: 0; text-align: center; vertical-align: top; width: 580px;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; hyphens: auto; line-height: 19px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">
             <table class=\"row\" style=\"border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\">
               <th class=\"custom-pb small-12 large-6 columns first\" style=\"Margin: 0 auto; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0 auto; padding: 0; padding-bottom: 10px !important; padding-left: 16px; padding-right: 8px; text-align: left; width: 274px;\"><table style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><th style=\"Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; text-align: left;\">
                 <p class=\"tiny-text small-text-center\" style=\"Margin: 0; Margin-bottom: 10px; color: #000; font-family: Arial,sans-serif; font-size: 12px; font-weight: 400; line-height: 19px; margin: 0; margin-bottom: 10px; padding: 0; text-align: left;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente placeat, est mollitia laudantium amet aut.</p>
               </th></tr></table></th>
               <th class=\"custom-pb small-12 large-6 columns last\" style=\"Margin: 0 auto; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0 auto; padding: 0; padding-bottom: 10px !important; padding-left: 8px; padding-right: 16px; text-align: left; width: 274px;\"><table style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><th style=\"Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; text-align: left;\">
                 <p class=\"text-right small-text-center\" style=\"Margin: 0; Margin-bottom: 10px; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; margin-bottom: 10px; padding: 0; text-align: right;\"><a href=\"#!\" class=\"tiny-text basic-link\" style=\"Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 12px; font-weight: 400; line-height: 1.3; margin: 0; padding: 0; text-align: left; text-decoration: underline;\">View this email in your browser</a></p>
               </th></tr></table></th>
             </tr></tbody></table>
           </td></tr></tbody></table>
         
         <table align=\"center\" class=\"float-center\" style=\"Margin: 0 auto; border-collapse: collapse; border-spacing: 0; float: none; margin: 0 auto; padding: 0; text-align: center; vertical-align: top;\">
           <tbody>
             <tr style=\"padding: 0; text-align: left; vertical-align: top;\">
               <td style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; hyphens: auto; line-height: 19px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">
                 <img src=\"https://gallery.mailchimp.com/b6b8c26ff97a7240ec68e5e4b/images/68bac409-eb07-449d-aa4e-02f4d20ea883.jpg\" alt=\"Summer 2016\" style=\"-ms-interpolation-mode: bicubic; clear: both; display: block; max-width: 100%; outline: none; text-decoration: none; width: auto;\">
               </td>
             </tr>
           </tbody>
         </table>
               
          <table class=\"spacer float-center\" style=\"Margin: 0 auto; border-collapse: collapse; border-spacing: 0; float: none; margin: 0 auto; padding: 0; text-align: center; vertical-align: top;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"15px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 15px; font-weight: 400; hyphens: auto; line-height: 15px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> 
               
          <table align=\"center\" class=\"container float-center\" style=\"Margin: 0 auto; background: #fff; border-collapse: collapse; border-spacing: 0; float: none; margin: 0 auto; padding: 0; text-align: center; vertical-align: top; width: 580px;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; hyphens: auto; line-height: 19px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">
            <table class=\"row\" style=\"border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\">
              <th class=\"small-12 large-12 columns first last\" style=\"Margin: 0 auto; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0 auto; padding: 0; padding-bottom: 16px; padding-left: 16px; padding-right: 16px; text-align: left; width: 564px;\"><table style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><th style=\"Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; text-align: left;\">
                <table class=\"spacer\" style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"40px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 40px; font-weight: 400; hyphens: auto; line-height: 40px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> 
                <p class=\"main-sub-heading text-center\" style=\"Margin: 0; Margin-bottom: 10px; color: #666; font-family: Arial,sans-serif; font-size: 20px; font-weight: 400; line-height: 19px; margin: 0; margin-bottom: 10px; padding: 0; text-align: center; text-transform: uppercase;\">Meet the</p>
                <h1 class=\"main-heading text-center\" style=\"Margin: 0; Margin-bottom: 0; color: inherit; font-family: Arial,sans-serif; font-size: 22px; font-weight: 700; line-height: 1.3; margin: 0; margin-bottom: 0; padding: 0; text-align: center; text-transform: uppercase; word-wrap: normal;\">Lorem collection</h1>
                <table class=\"spacer\" style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"30px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 30px; font-weight: 400; hyphens: auto; line-height: 30px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> 
                <p class=\"main-body-p text-center\" style=\"Margin: 0; Margin-bottom: 10px; color: #666; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 1.57143; margin: 0; margin-bottom: 10px; padding: 0; text-align: center;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat nemo quasi obcaecati sapiente tempore tenetur non consequuntur aspernatur id similique fuga esse, quaerat, eos dolore quisquam molestias molestiae velit dolor? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium quam nam aut, at ipsa! Iur</p>
                <table class=\"spacer\" style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"30px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 30px; font-weight: 400; hyphens: auto; line-height: 30px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> 
                <center data-parsed=\"\" style=\"min-width: 532px; width: 100%;\">
                  <table class=\"button float-center\" style=\"Margin: 0 0 16px 0; border-collapse: collapse; border-spacing: 0; float: none; margin: 0 0 16px; margin-bottom: 0; padding: 0; text-align: center; vertical-align: top; width: auto !important;\"><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; hyphens: auto; line-height: 19px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\"><table style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; background: 0 0; border: 2px solid #f61067; border-collapse: collapse !important; color: #f61067; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; hyphens: auto; line-height: 19px; margin: 0; padding: 12px 35px; text-align: left; vertical-align: top; word-wrap: break-word;\"><a href=\"#\" style=\"Margin: 0; border: 0 solid transparent; border-radius: 0; color: #f61067; display: inline-block; font-family: Arial,sans-serif; font-size: 16px; font-weight: 400; line-height: 1.3; margin: 0; padding: 0; text-align: left; text-decoration: none; text-transform: uppercase;\">Shop now</a></td></tr></table></td></tr></table>
                </center>
                  <table class=\"spacer\" style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"30px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 30px; font-weight: 400; hyphens: auto; line-height: 30px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> 
              </th>
<th class=\"expander\" style=\"Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0 !important; text-align: left; visibility: hidden; width: 0;\"></th></tr></table></th>
            </tr></tbody></table>
          </td></tr></tbody></table>
                
          <table class=\"spacer float-center\" style=\"Margin: 0 auto; border-collapse: collapse; border-spacing: 0; float: none; margin: 0 auto; padding: 0; text-align: center; vertical-align: top;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"15px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 15px; font-weight: 400; hyphens: auto; line-height: 15px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> 
          
          <table align=\"center\" class=\"container float-center\" style=\"Margin: 0 auto; background: #fff; border-collapse: collapse; border-spacing: 0; float: none; margin: 0 auto; padding: 0; text-align: center; vertical-align: top; width: 580px;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; hyphens: auto; line-height: 19px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">
            <table class=\"row\" style=\"border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\">
              <th class=\"custom-pb small-12 large-12 columns first last\" style=\"Margin: 0 auto; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0 auto; padding: 0; padding-bottom: 10px !important; padding-left: 16px; padding-right: 16px; text-align: left; width: 564px;\"><table style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><th style=\"Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; text-align: left;\">
               <table class=\"spacer\" style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"40px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 40px; font-weight: 400; hyphens: auto; line-height: 40px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> 
                <h2 class=\"text-center text-uppercase\" style=\"Margin: 0; Margin-bottom: 0; color: inherit; font-family: Arial,sans-serif; font-size: 16px; font-weight: 700; line-height: 1.3; margin: 0; margin-bottom: 0; padding: 0; text-align: center; text-transform: uppercase; word-wrap: normal;\">Deals of the week</h2>
              </th>
<th class=\"expander\" style=\"Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0 !important; text-align: left; visibility: hidden; width: 0;\"></th></tr></table></th>
            </tr></tbody></table>
            
            <table class=\"row\" style=\"border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\">
              <th class=\"small-4 large-5 columns first\" style=\"Margin: 0 auto; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0 auto; padding: 0; padding-bottom: 16px; padding-left: 16px; padding-right: 8px; text-align: left; width: 225.66667px;\"><table style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><th style=\"Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; text-align: left;\"></th></tr></table></th>
              <th class=\"small-4 large-2 columns\" style=\"Margin: 0 auto; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0 auto; padding: 0; padding-bottom: 16px; padding-left: 8px; padding-right: 8px; text-align: left; width: 80.66667px;\"><table style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><th style=\"Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; text-align: left;\">
                <div class=\"decorative-line\" style=\"background: #666; height: 2px;\"></div>
              </th></tr></table></th>
              <th class=\"small-4 large-5 columns last\" style=\"Margin: 0 auto; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0 auto; padding: 0; padding-bottom: 16px; padding-left: 8px; padding-right: 16px; text-align: left; width: 225.66667px;\"><table style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><th style=\"Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; text-align: left;\"></th></tr></table></th>
            </tr></tbody></table>
            
            <table class=\"row\" style=\"border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\">
              <th class=\"small-12 large-4 columns first\" style=\"Margin: 0 auto; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0 auto; padding: 0; padding-bottom: 16px; padding-left: 16px; padding-right: 8px; text-align: left; width: 177.33333px;\"><table style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><th style=\"Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; text-align: left;\">
                <center data-parsed=\"\" style=\"min-width: 145.33333px; width: 100%;\"><img src=\"https://gallery.mailchimp.com/b6b8c26ff97a7240ec68e5e4b/images/6a9e9bff-ccfe-486c-86c4-923cf2a2f32b.jpg\" alt=\"item\" align=\"center\" class=\"float-center\" style=\"-ms-interpolation-mode: bicubic; Margin: 0 auto; clear: both; display: block; float: none; margin: 0 auto; max-width: 100%; outline: none; text-align: center; text-decoration: none; width: auto;\"></center>
                <h3 class=\"item-name small-text-center\" style=\"Margin: 0; Margin-bottom: 0; color: #f61067; font-family: Arial,sans-serif; font-size: 14px; font-weight: 700; line-height: 1.3; margin: 0; margin-bottom: 0; padding: 0; text-align: left; text-transform: uppercase; word-wrap: normal;\">90-s t-shirt</h3>
                <p class=\"item-price small-text-center\" style=\"Margin: 0; Margin-bottom: 10px; color: #666; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; margin-bottom: 10px; padding: 0; text-align: left;\">$16.99</p>
              </th></tr></table></th>
              <th class=\"small-12 large-4 columns\" style=\"Margin: 0 auto; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0 auto; padding: 0; padding-bottom: 16px; padding-left: 8px; padding-right: 8px; text-align: left; width: 177.33333px;\"><table style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><th style=\"Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; text-align: left;\">
                <center data-parsed=\"\" style=\"min-width: 145.33333px; width: 100%;\"><img src=\"https://gallery.mailchimp.com/b6b8c26ff97a7240ec68e5e4b/images/d045ef8e-c5c3-4c91-a736-931fdec2c184.jpg\" alt=\"item\" align=\"center\" class=\"float-center\" style=\"-ms-interpolation-mode: bicubic; Margin: 0 auto; clear: both; display: block; float: none; margin: 0 auto; max-width: 100%; outline: none; text-align: center; text-decoration: none; width: auto;\"></center>
                <h3 class=\"item-name small-text-center\" style=\"Margin: 0; Margin-bottom: 0; color: #f61067; font-family: Arial,sans-serif; font-size: 14px; font-weight: 700; line-height: 1.3; margin: 0; margin-bottom: 0; padding: 0; text-align: left; text-transform: uppercase; word-wrap: normal;\">Converse Taylor</h3>
                <p class=\"item-price small-text-center\" style=\"Margin: 0; Margin-bottom: 10px; color: #666; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; margin-bottom: 10px; padding: 0; text-align: left;\">$24.99</p>
              </th></tr></table></th>
              <th class=\"small-12 large-4 columns last\" style=\"Margin: 0 auto; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0 auto; padding: 0; padding-bottom: 16px; padding-left: 8px; padding-right: 16px; text-align: left; width: 177.33333px;\"><table style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><th style=\"Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; text-align: left;\">
                <center data-parsed=\"\" style=\"min-width: 145.33333px; width: 100%;\"><img src=\"https://gallery.mailchimp.com/b6b8c26ff97a7240ec68e5e4b/images/bbcf016c-f597-4d1a-976b-1577e79767b4.jpg\" alt=\"item\" align=\"center\" class=\"float-center\" style=\"-ms-interpolation-mode: bicubic; Margin: 0 auto; clear: both; display: block; float: none; margin: 0 auto; max-width: 100%; outline: none; text-align: center; text-decoration: none; width: auto;\"></center>
                <h3 class=\"item-name small-text-center\" style=\"Margin: 0; Margin-bottom: 0; color: #f61067; font-family: Arial,sans-serif; font-size: 14px; font-weight: 700; line-height: 1.3; margin: 0; margin-bottom: 0; padding: 0; text-align: left; text-transform: uppercase; word-wrap: normal;\">swift breeches</h3>
                <p class=\"item-price small-text-center\" style=\"Margin: 0; Margin-bottom: 10px; color: #666; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; margin-bottom: 10px; padding: 0; text-align: left;\">$48.99</p>
              </th></tr></table></th>
            </tr></tbody></table>
          </td></tr></tbody></table>
          
          <table class=\"spacer float-center\" style=\"Margin: 0 auto; border-collapse: collapse; border-spacing: 0; float: none; margin: 0 auto; padding: 0; text-align: center; vertical-align: top;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"15px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 15px; font-weight: 400; hyphens: auto; line-height: 15px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> 
          
          <table align=\"center\" class=\"container no-bg float-center\" style=\"Margin: 0 auto; background: 0 0 !important; border-collapse: collapse; border-spacing: 0; float: none; margin: 0 auto; padding: 0; text-align: center; vertical-align: top; width: 580px;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; hyphens: auto; line-height: 19px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">
            <table class=\"row\" style=\"border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\">
              <th class=\"small-12 large-12 columns first last\" style=\"Margin: 0 auto; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0 auto; padding: 0; padding-bottom: 16px; padding-left: 16px; padding-right: 16px; text-align: left; width: 564px;\"><table style=\"border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;\"><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><th style=\"Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; text-align: left;\">
                <p class=\"text-right small-text-center\" style=\"Margin: 0; Margin-bottom: 10px; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; margin-bottom: 10px; padding: 0; text-align: right;\">
                  <a href=\"#\" class=\"basic-link tiny-text\" style=\"Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 12px; font-weight: 400; line-height: 1.3; margin: 0; padding: 0; text-align: left; text-decoration: underline;\">unsubscribe from this list</a> | 
                  <a href=\"#\" class=\"basic-link tiny-text \" style=\"Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 12px; font-weight: 400; line-height: 1.3; margin: 0; padding: 0; text-align: left; text-decoration: underline;\">update subscription preferences</a>
                </p>
              </th>
<th class=\"expander\" style=\"Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0 !important; text-align: left; visibility: hidden; width: 0;\"></th></tr></table></th>
            </tr></tbody></table>
          </td></tr></tbody></table>
          
          <table class=\"spacer float-center\" style=\"Margin: 0 auto; border-collapse: collapse; border-spacing: 0; float: none; margin: 0 auto; padding: 0; text-align: center; vertical-align: top;\"><tbody><tr style=\"padding: 0; text-align: left; vertical-align: top;\"><td height=\"50px\" style=\"-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 50px; font-weight: 400; hyphens: auto; line-height: 50px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;\">&#xA0;</td></tr></tbody></table> 
           
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



