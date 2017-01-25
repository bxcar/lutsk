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
if (!$_SESSION['urli']) {
    $_SESSION['urli'] = $_SERVER['REQUEST_URI'];
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head itemscope itemtype="http://schema.org/WebSite">
    <title itemprop='name'>Горящие туры в Луцке: Makintour</title>

    <meta property="og:type" content="website"/>
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <meta property="og:title" content="Горящие туры в Луцке - Makintour"/>
    <meta property="og:description" content="Самые выгодные цены от надежной компании"/>
    <meta property="og:url" content="http://lutsk.makintour.com"/>
    <meta property="og:image"
          content="http://coraltravel.kiev.ua/wp-content/themes/sydney/img/slider2_oprimize.jpg"/>


    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@">
    <meta name="twitter:title" content="Горящие туры в Луцке: Makintour">
    <meta name="twitter:description"
          content="Самые выгодные цены от надежной компании!">
    <meta name="twitter:image" content="http://coraltravel.kiev.ua/wp-content/themes/sydney/img/slider2_oprimize.jpg">


    <meta name="description"
          content="Горящие туры из Луцка.
          Бронирование тура, авиаперелеты, экскурсионные туры. Гарантия надежности!">
    <script src="/wp-content/themes/sydney/js/script_for_form_button.js"></script>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic"
        rel="stylesheet">
    <?php /*if (!function_exists('has_site_icon') || !has_site_icon()) : */?><!--
        <?php /*if (get_theme_mod('site_favicon')) : */?>
            <link rel="shortcut icon" href="<?php /*echo esc_url(get_theme_mod('site_favicon')); */?>"/>
        <?php /*endif; */?>
    --><?php /*endif; */?>

    <?php wp_head(); ?>

    <?php include "tracking_codes_and_jivosite/vk.php" ?>
    <?php include "tracking_codes_and_jivosite/facebook_pixel_code.php" ?>
    <?php include "tracking_codes_and_jivosite/jivosite.php" ?>
    <script src="/wp-content/themes/sydney/tracking_codes_and_jivosite/country_sort.js"></script>

    <script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "Organization",
  "name": "Makintour Луцк",
  "url": "http://www.makintour.com",
  "logo": "http://www.makintour.com/img/logo.png",
  "contactPoint": [{
    "@type": "ContactPoint",
    "telephone": "8 800 200 12 58",
    "contactType": "customer service"
  }],
  "sameAs": [
    "https://vk.com/makintour.lutsk"
  ]
}


    </script>

    <!--    <script src="/wp-content/themes/sydney/js/jquery-3.1.1.min.js"></script>-->
    <!--    <script src="/wp-content/themes/sydney/js/mask/src/jquery.maskedinput.js"></script>-->
    <script>
        window.onload = function () {
            var tel = document.getElementById('phone');
            MaskedInput({
                elm: document.getElementById('phone'), // select only by id
                format: '+380_________',
                separator: '+380'
            });

            MaskedInput({
                elm: document.getElementById('phone-popup'), // select only by id
                format: '+380_________',
                separator: '+380'
            });

            MaskedInput({
                elm: document.getElementById('phone-popup_2'), // select only by id
                format: '+380_________',
                separator: '+380'
            });

            MaskedInput({
                elm: document.getElementById('phone-popup_3'), // select only by id
                format: '+380_________',
                separator: '+380'
            });

            MaskedInput({
                elm: document.getElementById('phone-popup_4'), // select only by id
                format: '+380_________',
                separator: '+380'
            });

            MaskedInput({
                elm: document.getElementById('phone-popup-callback'), // select only by id
                format: '+380_________',
                separator: '+380'
            });

            MaskedInput({
                elm: document.getElementById('phone-popup-special'), // select only by id
                format: '+380_________',
                separator: '+380'
            });
        };


        // masked_input_1.4-min.js
        // angelwatt.com/coding/masked_input.php
        (function (a) {
            a.MaskedInput = function (f) {
                if (!f || !f.elm || !f.format) {
                    return null
                }
                if (!(this instanceof a.MaskedInput)) {
                    return new a.MaskedInput(f)
                }
                var o = this, d = f.elm, s = f.format, i = f.allowed || "0123456789", h = f.allowedfx || function () {
                        return true
                    }, p = f.separator || "/:-", n = f.typeon || "_YMDhms", c = f.onbadkey || function () {
                    }, q = f.onfilled || function () {
                    }, w = f.badkeywait || 0, A = f.hasOwnProperty("preserve") ? !!f.preserve : true, l = true, y = false, t = s, j = (function () {
                    if (window.addEventListener) {
                        return function (E, C, D, B) {
                            E.addEventListener(C, D, (B === undefined) ? false : B)
                        }
                    }
                    if (window.attachEvent) {
                        return function (D, B, C) {
                            D.attachEvent("on" + B, C)
                        }
                    }
                    return function (D, B, C) {
                        D["on" + B] = C
                    }
                }()), u = function () {
                    for (var B = d.value.length - 1; B >= 0; B--) {
                        for (var D = 0, C = n.length; D < C; D++) {
                            if (d.value[B] === n[D]) {
                                return false
                            }
                        }
                    }
                    return true
                }, x = function (C) {
                    try {
                        C.focus();
                        if (C.selectionStart >= 0) {
                            return C.selectionStart
                        }
                        if (document.selection) {
                            var B = document.selection.createRange();
                            return -B.moveStart("character", -C.value.length)
                        }
                        return -1
                    } catch (D) {
                        return -1
                    }
                }, b = function (C, E) {
                    try {
                        if (C.selectionStart) {
                            C.focus();
                            C.setSelectionRange(E, E)
                        } else {
                            if (C.createTextRange) {
                                var B = C.createTextRange();
                                B.move("character", E);
                                B.select()
                            }
                        }
                    } catch (D) {
                        return false
                    }
                    return true
                }, m = function (D) {
                    D = D || window.event;
                    var C = "", E = D.which, B = D.type;
                    if (E === undefined || E === null) {
                        E = D.keyCode
                    }
                    if (E === undefined || E === null) {
                        return ""
                    }
                    switch (E) {
                        case 8:
                            C = "bksp";
                            break;
                        case 46:
                            C = (B === "keydown") ? "del" : ".";
                            break;
                        case 16:
                            C = "shift";
                            break;
                        case 0:
                        case 9:
                        case 13:
                            C = "etc";
                            break;
                        case 37:
                        case 38:
                        case 39:
                        case 40:
                            C = (!D.shiftKey && (D.charCode !== 39 && D.charCode !== undefined)) ? "etc" : String.fromCharCode(E);
                            break;
                        default:
                            C = String.fromCharCode(E);
                            break
                    }
                    return C
                }, v = function (B, C) {
                    if (B.preventDefault) {
                        B.preventDefault()
                    }
                    B.returnValue = C || false
                }, k = function (B) {
                    var D = x(d), F = d.value, E = "", C = true;
                    switch (C) {
                        case (i.indexOf(B) !== -1):
                            D = D + 1;
                            if (D > s.length) {
                                return false
                            }
                            while (p.indexOf(F.charAt(D - 1)) !== -1 && D <= s.length) {
                                D = D + 1
                            }
                            if (!h(B, D)) {
                                c(B);
                                return false
                            }
                            E = F.substr(0, D - 1) + B + F.substr(D);
                            if (i.indexOf(F.charAt(D)) === -1 && n.indexOf(F.charAt(D)) === -1) {
                                D = D + 1
                            }
                            break;
                        case (B === "bksp"):
                            D = D - 1;
                            if (D < 0) {
                                return false
                            }
                            while (i.indexOf(F.charAt(D)) === -1 && n.indexOf(F.charAt(D)) === -1 && D > 1) {
                                D = D - 1
                            }
                            E = F.substr(0, D) + s.substr(D, 1) + F.substr(D + 1);
                            break;
                        case (B === "del"):
                            if (D >= F.length) {
                                return false
                            }
                            while (p.indexOf(F.charAt(D)) !== -1 && F.charAt(D) !== "") {
                                D = D + 1
                            }
                            E = F.substr(0, D) + s.substr(D, 1) + F.substr(D + 1);
                            D = D + 1;
                            break;
                        case (B === "etc"):
                            return true;
                        default:
                            return false
                    }
                    d.value = "";
                    d.value = E;
                    b(d, D);
                    return false
                }, g = function (B) {
                    if (i.indexOf(B) === -1 && B !== "bksp" && B !== "del" && B !== "etc") {
                        var C = x(d);
                        y = true;
                        c(B);
                        setTimeout(function () {
                            y = false;
                            b(d, C)
                        }, w);
                        return false
                    }
                    return true
                }, z = function (C) {
                    if (!l) {
                        return true
                    }
                    C = C || event;
                    if (y) {
                        v(C);
                        return false
                    }
                    var B = m(C);
                    if ((C.metaKey || C.ctrlKey) && (B === "X" || B === "V")) {
                        v(C);
                        return false
                    }
                    if (C.metaKey || C.ctrlKey) {
                        return true
                    }
                    if (d.value === "") {
                        d.value = s;
                        b(d, 0)
                    }
                    if (B === "bksp" || B === "del") {
                        k(B);
                        v(C);
                        return false
                    }
                    return true
                }, e = function (C) {
                    if (!l) {
                        return true
                    }
                    C = C || event;
                    if (y) {
                        v(C);
                        return false
                    }
                    var B = m(C);
                    if (B === "etc" || C.metaKey || C.ctrlKey || C.altKey) {
                        return true
                    }
                    if (B !== "bksp" && B !== "del" && B !== "shift") {
                        if (!g(B)) {
                            v(C);
                            return false
                        }
                        if (k(B)) {
                            if (u()) {
                                q()
                            }
                            v(C, true);
                            return true
                        }
                        if (u()) {
                            q()
                        }
                        v(C);
                        return false
                    }
                    return false
                }, r = function () {
                    if (!d.tagName || (d.tagName.toUpperCase() !== "INPUT" && d.tagName.toUpperCase() !== "TEXTAREA")) {
                        return null
                    }
                    if (!A || d.value === "") {
                        d.value = s
                    }
                    j(d, "keydown", function (B) {
                        z(B)
                    });
                    j(d, "keypress", function (B) {
                        e(B)
                    });
                    j(d, "focus", function () {
                        t = d.value
                    });
                    j(d, "blur", function () {
                        if (d.value !== t && d.onchange) {
                            d.onchange()
                        }
                    });
                    return o
                };
                o.resetField = function () {
                    d.value = s
                };
                o.setAllowed = function (B) {
                    i = B;
                    o.resetField()
                };
                o.setFormat = function (B) {
                    s = B;
                    o.resetField()
                };
                o.setSeparator = function (B) {
                    p = B;
                    o.resetField()
                };
                o.setTypeon = function (B) {
                    n = B;
                    o.resetField()
                };
                o.setEnabled = function (B) {
                    l = B
                };
                return r()
            }
        }(window));
    </script>
</head>

<body <?php body_class(); ?>>
<?php include "tracking_codes_and_jivosite/google-analytics.php" ?>
<?php include "tracking_codes_and_jivosite/yandex-metrica.php" ?>

<div itemscope itemtype="http://schema.org/PostalAddress" style="display: none;">

    <span itemprop="name">Горящие туры в Луцке: Makintour</span>
    <span itemprop="postalCode">43026,</span> <span
        itemprop="addressLocality">Украина, Волынская обл., г.Луцк</span>
    <span itemprop="streetAddress">ул. Кривой вал 34</span>
    Телефон: <span itemprop="telephone">+38(068) 528 2227</span>
    E-mail: <span itemprop="email">lutsk@makintour.com</span>

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

    <div class="header-image">
        <?php sydney_header_overlay(); ?>
        <img class="header-inner" src="<?php header_image(); ?>"
             width="<?php echo esc_attr(get_custom_header()->width); ?>" alt="<?php bloginfo('name'); ?>">
    </div>

    <div id="content" class="page-wrap" style="padding-top: 30px; padding-bottom: 0;">
        <div class="container content-wrapper">
            <div class="row">

                <h2 id="goto-from-top-button" class="tour-header">Найкращі ціни на&nbsp;Тури по&nbsp;напрямкам</h2>
                <div id="filt" class="filters">
                    <select id="country-select" class="select-spec" style="margin-right: 20px;
                                  margin-left: 25px;">
                        <option value="Всі країни" selected>Всі країни</option> <!--country-default-->
                        <!--<option value="Таиланд">Таиланд</option>
                        <option value="ОАЕ">ОАЕ</option>-->
                    </select>
                </div>
                <div class="fon-class" id="fon">
                    <div class="load-class" id="load"></div>
                </div>
