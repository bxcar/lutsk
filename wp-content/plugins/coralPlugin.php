<?php
/**
 * @package CoralPlugin
 * @version 1.0
 */
/*
 * Plugin Name: Interkassa
 * Plugin URI: http://www.google.com
 * Description: Interkassa
 * Armstrong: My Plugin
 * Author: Dmitry Malanchuk
 * Version: 1.0
 * Author: URI: http://youtube.com
 */

function coralPlugin_add_admin_pages() {
    //Add a new submenu under Options
    add_options_page('Coral и Интеркасса', 'Платежная система', 8, 'interkassa', 'coralPlugin_options_page');
}

function coralPlugin_options_page () {
    echo "<h2>Настройка платежной системы Интеркасса</h2>";
    echo "<p>Автор плагина: <a href='http://www.google.com'>Дмитрий Маланчук</a></p>";

    //Значения по умолчанию для настроек магазина
    add_option('coralPlugin_shop_id', 'Не задано');
    add_option('coralPlugin_secret_key', 'Не задано');
    add_option('coralPlugin_status_url', 'Не задано');
    add_option('coralPlugin_code_expiration', '10');

    //Изменение данных магазина
    echo "<h3>Общие настройки магазина</h3>";
    coralPlugin_change_shop();

    //Добавление товара
    echo "<h3>Добавить товара</h3>";
    coralPlugin_add_product();

    //Изменение информации о товаре
    echo "<h3>Список товаров</h3>";
    coralPlugin_change_product();
}

//Изменение данных магазина
function coralPlugin_change_shop() {
    //Если форма была отправлена, то применить изменения магазина
    if(isset($_POST['coralPlugin_base_setup_btn'])) {
        if( function_exists('current_user_can') && !current_user_can('manage_options')) {
            die( _e('Hacker?', 'coralPlugin'));
        }

        if(function_exists ('check_admin_referer')) {
            check_admin_referer('coralPlugin_base_setup_form');
        }

        $coralPlugin_shop_id = $_POST['coralPlugin_shop_id'];
        $coralPlugin_secret_key = $_POST['coralPlugin_secret_key'];
        $coralPlugin_status_url = $_POST['coralPlugin_status_url'];
        $coralPlugin_code_expiration = $_POST['coralPlugin_code_expiration'];
        
        update_option('coralPlugin_shop_id', $coralPlugin_shop_id);
        update_option('coralPlugin_secret_key', $coralPlugin_secret_key);
        update_option('coralPlugin_status_url', $coralPlugin_status_url);
        update_option('coralPlugin_code_expiration', $coralPlugin_code_expiration);
    }

    //Форма информации о магазине
    echo
    "
       <form name='coralPlugin_base_setup' method='post' action='".$_SERVER['PHP_SELF']."?page=interkassa&amp;updated=true'>
    ";

    if(function_exists('wp_nonce_field')) {
        wp_nonce_field('coralPlugin_base_setup_form');
    }

    echo
    "
        <table>
            <tr>
                <td style='text-align: right;'>Идентификатор магазина:</td>
                <td><input type='text' name='coralPlugin_shop_id' value='".get_option('coralPlugin_shop_id')."'></td>
                <td style='color: #666666'><i>Идентификатор магазина можно узнать в личном кабинете интрекассы.</i></td>
            </tr>
            
            <tr>
                <td style='text-align: right;'>Секретный код:</td>
                <td><input type='text' name='coralPlugin_secret_key' value='".get_option('coralPlugin_secret_key')."'></td>
                <td style='color: #666666'><i>Секретный код можно узнать в личном кабинете интрекассы.</i></td>
            </tr>
            
            <tr>
                <td style='text-align: right;'>Status URL:</td>
                <td><input type='text' name='coralPlugin_status_url' value='".get_option('coralPlugin_status_url')."'></td>
                <td style='color: #666666'><i>Ссылка на страницу обработки платежа.</i></td>
            </tr>
            
            <tr>
                <td>&nbsp;</td>
                <td style='font-size: 10px; color: #666666'>http://www.habrahabr.ru/status</td>
                <td>&nbsp;</td>
            </tr>
            
            <tr>
                <td style='text-align: right;'>Срок хранения:</td>
                <td><input type='text' name='coralPlugin_code_expiration' value='".get_option('coralPlugin_code_expiration')."'></td>
                <td style='color: #666666'><i>Срок хранения ссылок.</i></td>
            </tr>
            
            <tr>
                <td>&nbsp;</td>
                
                <td style='text-align: center'>
                <input type='submit' name='coralPlugin_base_setup_btn' value='Сохранить' style='width: 140px; height: 25px;'>
                </td>
                
                <td>&nbsp;</td>
            </tr>
        </table>
    </form>
    ";
}

//Добавление товара
function coralPlugin_add_product() {
    global $wpdb;
    $table_products = $wpdb->prefix.coralplugin_products;

    //Сохранение добавленного товара в базу
    if( isset($_POST['coralPlugin_add_product_btn'])) {
        if(function_exists('current_user_can') && !current_user_can('manage options')) {
            die( _e('Hacker?', 'coralPlugin'));
        }

        if(function_exists ('check_admin_referer')) {
            check_admin_referer('coralPlugin_add_product_form');
        }

        $coralPlugin_product_name = $_POST['coralPlugin_product_name'];
        $coralPlugin_product_cost = $_POST['coralPlugin_product_name'];
        $coralPlugin_product_name = $_POST['coralPlugin_product_name'];
    }
}

function coralPlugin_run() {
    $status_url = get_option('coralPlugin_status_url');
    preg_match('/^http(s)?\:\/\/[^\/]+\/(.*)$/i', $status_url, $matches);

    $real_url = $_SERVER['REQUEST_URI'];
    preg_match('/^\/(.+)(\?.+)$/i', $real_url, $uri_matches);

    if($uri_matches[1] == $matches[2]) {
        if(isset($_GET['dcode'])) {
            start_download();
        } else {
            interkassa_process();
        }
    }
}

add_action('admin_menu', 'coralPlugin_add_admin_pages');
//add_action('init', 'coralPlugin_run');