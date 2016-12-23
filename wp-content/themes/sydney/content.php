<?php
/**
 * @package Sydney
 */
error_reporting(E_ERROR);
?>
<?php
if (!$_GET['sort_id'])
    if ($_GET['select_id']) {
        require "../../../wp-config.php";
        $db = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if (!$db) {
            exit('Error' . mysqli_error($db));
        }
        mysqli_query($db, "SET NAMES utf8mb4");

        //UPDATE guid field in wp_posts(ip-address)/////////////////////////////
        require "UPDATE_DATABASE.php";
        ////////////////////////////////////////////////////////////////////////

        function get_select_option($db, $id = false)
        {
            $sql_select = "SELECT p.post_title FROM wp_posts p WHERE p.post_status = 'publish' AND p.post_type = 'post'";
            $select = array();
            $select_total = array();
            $result = mysqli_query($db, $sql_select) or die(mysqli_error($db));
            $select_total[0] = "Все страны";
            for ($i = 0; $i < mysqli_num_rows($result); $i++) {
                $select[$i] = mysqli_fetch_assoc($result);
//            $select[$i]['post_title'] = $sql_select[$i]['post_title'];
                /*$goods[$i]['discount'] = $goods_discount[$i]['meta_value'];
                $goods[$i]['post_id'] = $goods_discount[$i]['post_id'];*/
                $select_total[$i + 1] = $select[$i]['post_title'];
            }
            return array_unique($select_total);
        }

        $select_total = get_select_option($db, $id);
        foreach ($select_total as $item) {
            ?>
            <script>
                var select = document.getElementById("country-select");
                var node = document.createElement("option");
                node.setAttribute("value", "<?= $item ?>");
                var textnode = document.createTextNode("<?= $item ?>");
                node.appendChild(textnode);
                select.appendChild(node);
            </script>
            <?php
        }
    }

if (!$_GET['select_id'])
    if ($_GET['sort_id']) {
        require "../../../wp-config.php";
        $db = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if (!$db) {
            exit('Error' . mysqli_error($db));
        }
        mysqli_query($db, "SET NAMES utf8mb4");

        //UPDATE guid field in wp_posts(ip-address)/////////////////////////////
        require "UPDATE_DATABASE.php";
        ////////////////////////////////////////////////////////////////////////

        function get_goods($db, $id = false)
        {
            $sql = "SELECT p.id, p.post_title, p.post_content, t.name FROM wp_posts p, wp_terms t, wp_term_taxonomy tx, wp_term_relationships r
WHERE t.term_id=tx.term_id 
AND tx.taxonomy='post_tag' 
AND tx.term_taxonomy_id=r.term_taxonomy_id 
AND r.object_id=p.id
AND p.post_status != 'trash'";

            $sql1 = "SELECT p.guid FROM wp_posts p, wp_terms t, wp_term_taxonomy tx, wp_term_relationships r, wp_postmeta pmet
WHERE p.post_status != 'trash'
AND p.post_type = 'attachment'
AND t.term_id=tx.term_id
AND tx.taxonomy='post_tag'
AND tx.term_taxonomy_id=r.term_taxonomy_id
AND r.object_id=p.post_parent
AND pmet.meta_value = p.id";

            $sql2 = "SELECT pmet.meta_value, pmet.post_id FROM wp_posts p, wp_postmeta pmet, wp_terms t
WHERE p.post_status != 'trash'
AND pmet.meta_key = 'DC'
AND pmet.post_id = p.id";

            $sql_for_counry_title_and_other = "SELECT p.id, p.post_title, p.post_content, t.name FROM wp_posts p, wp_terms t, wp_term_taxonomy tx, wp_term_relationships r
WHERE t.term_id=tx.term_id 
AND tx.taxonomy='post_tag' 
AND tx.term_taxonomy_id=r.term_taxonomy_id 
AND r.object_id=p.id
AND p.post_status != 'trash'";
            $sql_for_country_image = "SELECT p.guid FROM wp_posts p, wp_terms t, wp_term_taxonomy tx, wp_term_relationships r, wp_postmeta pmet
WHERE p.post_status != 'trash'
AND p.post_type = 'attachment'
AND t.term_id=tx.term_id
AND tx.taxonomy='post_tag'
AND tx.term_taxonomy_id=r.term_taxonomy_id
AND r.object_id=p.post_parent
AND pmet.meta_value = p.id";

            if ($id) {
                if ($id == 'price_sorta') {
                    $sql .= " ORDER BY length(t.name), t.name ASC";
                    $sql2 .= " ORDER BY length(t.name), t.name ASC";
                } else if ($id == 'price_sortb') {
                    $sql .= " ORDER BY cast(t.name as unsigned) DESC";
                    $sql2 .= " ORDER BY cast(t.name as unsigned) DESC";
                } else if ($id == 'Все страны' or $id == 'price-default') {
//                $sql .= " ORDER BY cast(p.post_date as unsigned) DESC";
                    $sql = "SELECT p.id, p.post_title, p.post_content, t.name FROM wp_posts p, wp_terms t, wp_term_taxonomy tx, wp_term_relationships r
                        WHERE t.term_id=tx.term_id 
                        AND tx.taxonomy='post_tag' 
                        AND tx.term_taxonomy_id=r.term_taxonomy_id 
                        AND r.object_id=p.id
                        AND p.post_status != 'trash'
                        ORDER BY cast(p.id AS UNSIGNED) DESC";
//                AND (SELECT p.id FROM wp_posts po WHERE po.id = p.post_parent)
                } else {
                    $sql = $sql_for_counry_title_and_other . " AND p.post_title = '$id'";
                }
            }
            if ($id) {
                if ($id == 'price_sorta') {
                    $sql1 .= " ORDER BY length(t.name), t.name ASC";
                } else if ($id == 'price_sortb') {
                    $sql1 .= " ORDER BY cast(t.name as unsigned) DESC";
                } else if ($id == 'Все страны' or $id == 'price-default') {
                    $sql1 = "SELECT p.guid FROM wp_posts p, wp_terms t, wp_term_taxonomy tx, wp_term_relationships r, wp_postmeta pmet
                            WHERE p.post_status != 'trash'
                            AND p.post_type = 'attachment'
                            AND t.term_id=tx.term_id
                            AND tx.taxonomy='post_tag'
                            AND tx.term_taxonomy_id=r.term_taxonomy_id
                            AND r.object_id=p.post_parent
                            AND pmet.meta_value = p.id
                            AND (SELECT p.id FROM wp_posts po WHERE po.id = p.post_parent)
                            ORDER BY cast(p.post_parent AS UNSIGNED) DESC";

                } else {
                    $sql1 = $sql_for_country_image . " AND (SELECT p.id FROM wp_posts po WHERE po.post_title = '$id' AND po.id = p.post_parent)";
                }
            }
            $goods = array();
            $goods_min_price_total = array();
            $goods_img = array();
            $goods_discount = array();
            $result = mysqli_query($db, $sql) or die(mysqli_error($db));
            $result1 = mysqli_query($db, $sql1) or die(mysqli_error($db));
            $result2 = mysqli_query($db, $sql2) or die(mysqli_error($db));

            for ($i = 0; $i < mysqli_num_rows($result); $i++) {
                $goods[$i] = mysqli_fetch_assoc($result);
                $goods_img[$i] = mysqli_fetch_assoc($result1);
                $goods_discount[$i] = mysqli_fetch_assoc($result2);
                $goods[$i]['guid'] = $goods_img[$i]['guid'];
                $goods[$i]['discount'] = $goods_discount[$i]['meta_value'];
                $goods[$i]['post_id'] = $goods_discount[$i]['post_id'];

                if ($id == 'Все страны' or $id == 'price-default') {

                    /*if ($value['name'] > $goods[$i]['name']) {
                        if (isset($goods[$i])) {
                            unset($goods[$i]);
                        }
                    }*/

                    /*if ($count > 1) {
                        if (isset($goods[$i])) {
                            unset($goods[$i]);
                        }
                    }*/
                    $dfd = 0;
                    foreach ($goods as $value) {
                        $goods_min_price = array();
                        $count_goods_min = 0;
                        foreach ($goods as $item) {
                            if (($item['post_title'] == $value['post_title'])) {
                                $goods_min_price[$count_goods_min] = $item;
                                $count_goods_min++;
                            }
                        }

                        $min_country_price = array();
                        foreach ($goods_min_price as $value_1) {
                            foreach ($goods_min_price as $item) {
                                if (($item['name'] < $value_1['name'])) {
                                    $min_country_price[0] = $item;
                                }
                            }
                        }

                        $goods_min_price_total[$dfd] = $min_country_price[0];
                        if ($dfd == 8) {
                        }

                        $dfd++;
                    }

                    /*printf("\nRepeated elements:\n");
                    for($iq=0,$tmp=0; $iq<count($unic)-1; $iq++){
                        if ($unic[$iq]['post_title']==$unic[$iq+1]['post_title']) {
                            print_r($unic[$iq]);
                            for($jq=($iq+1); $jq<count($unic) && $unic[$jq]['post_title']==$unic[$iq]['post_title']; $jq++){
                                $tmp++;
                                print_r($unic[$jq]);
                            }
                            $iq=$jq-1;
                        }
                    }*/

                    $count_for_price_total_total = count($goods_min_price_total);
                    for ($iy = 0; $iy < $count_for_price_total_total; $iy++) {
                        $count_for_price_total = 0;
                        foreach ($goods_min_price_total as $item) {
                            /* print_r ($item);
                             echo "<br><br><br>";*/
                            if ($item['post_title'] == $goods_min_price_total[$iy]['post_title']) {
                                $count_for_price_total++;
                                if ($count_for_price_total > 1) {
                                    if (isset($goods_min_price_total[$iy])) {
                                        unset($goods_min_price_total[$iy]);
                                    }
                                }
                            }
                        }
                    }
                }
            }


            if ($id == 'Все страны' or $id == 'price-default') {
                $count_for_price_total_result = count($goods_min_price_total);
//                $goods_min_price_total = array_slice($goods_min_price_total,0,8);
                for ($i = 0; $i <= $count_for_price_total_result * 10; $i++) {
                     //default list of countries on main page
                    if (($goods_min_price_total[$i]['post_title'] == 'ОАЭ')
                        || ($goods_min_price_total[$i]['post_title'] == 'Шри-Ланка')
                        || ($goods_min_price_total[$i]['post_title'] == 'Таиланд')
                        || ($goods_min_price_total[$i]['post_title'] == 'Египет')
                        || ($goods_min_price_total[$i]['post_title'] == 'Мальдивы')
                        || ($goods_min_price_total[$i]['post_title'] == 'Доминикана')
                        || ($goods_min_price_total[$i]['post_title'] == 'Индия')
                        || ($goods_min_price_total[$i]['post_title'] == 'Танзания')
                    ) {
                    } else {
                        if (isset($goods_min_price_total[$i])) {
                            unset($goods_min_price_total[$i]);
                        }
                    }
                }
                return $goods_min_price_total;
            }

//                print_r ($goods_min_price_total);

            return $goods;
        }

        if ($_GET['sort_id']) {
            $id = strip_tags($_GET['sort_id']);
            $goods = get_goods($db, $id);
            //$goods is empty?
            if(count($goods) == 0) {
                $goods = get_goods($db, 'Все страны');
            }
            foreach ($goods as $item) {
                ?>
                <article itemscope itemtype="http://schema.org/BlogPosting" class="post type-post status-publish format-standard has-post-thumbnail hentry">
                    <meta itemscope itemprop="mainEntityOfPage" itemType="https://schema.org/WebPage" itemid="http://coraltravel.kiev.ua"/> <!--Адрес главной страницы-->
                    <meta itemprop="dateModified" content="<?php the_modified_time('Y-m-d')?>"/> <!--Дата последнего изменения-->

                    <!--Разметка публикатора(адрес, логотип, название сайта)-->
                    <div itemprop="publisher" itemscope itemtype="https://schema.org/Organization" style="display:none;">
                        <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                            <span itemprop="streetAddress">просп. Маяковского 44-А</span>
                            <span itemprop="postalCode">01001</span>
                            <span itemprop="addressLocality">Украина, Киевская обл., г.Киев</span>
                            <span itemprop="telephone">+38 096 711 01 01</span>
                        </div>
                        <div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
                            <img itemprop="url" src="http://coraltravel.kiev.ua/wp-content/themes/sydney/img/logo_coral.png"/>
                            <img itemprop="image" src="http://coraltravel.kiev.ua/wp-content/themes/sydney/img/logo_coral.png"/>
                            <meta itemprop="width" content="100">
                            <meta itemprop="height" content="43">
                        </div>
                        <meta itemprop="name" content="Coral Travel - г.Киев">
                    </div>
                    <div itemprop="image" itemscope itemtype="https://schema.org/ImageObject" class="entry-thumb" style="display:none;">
                        <meta itemprop="width" content="272">
                        <meta itemprop="height" content="233">
                        <img itemprop="url" src="<?php $item['guid'] ?>">
                        <img itemprop="image" src="<?php $item['guid'] ?>">
                    </div>
                    <div itemscope itemtype="https://schema.org/ImageObject" style="display:none;">
                        <img itemprop="image" src="<?php $item['guid'] ?>" >
                    </div>

                    <div class="meta-post" style="display: none">
                        <?php sydney_posted_on(); ?>
                    </div><!-- .entry-meta -->
                    <div class="entry-thumb">
                        
                        <?php /*foreach ($goods as $item_in)
            {
            if ($item['id'] == $item_in['post_id']) { */ ?><!--
                <?/*= $item['id'] */ ?>
                <?/*= $item['post_id'] */ ?>
                --><?php
                        /*                break;
                                    }
                                }
                                                */ ?>

                        <?php
                        $item_id = $item['id'];
                        $sql_disc = "SELECT pmet.meta_value FROM wp_posts p, wp_postmeta pmet, wp_terms t
                            WHERE p.post_status != 'trash'
                            AND pmet.meta_key = 'DC'
                            AND pmet.post_id =  $item_id";
                        $result_sql_disc = mysqli_query($db, $sql_disc) or die(mysqli_error($db));
                        $result_sql_disc_final = mysqli_fetch_assoc($result_sql_disc);
                        /*foreach ($goods as $item_in_disc)
                        {
                            if ($item['id'] == $item_in_disc['post_id']) { */ ?><!--
                        <?/*= $item['discount'] */ ?>
                        --><?php
                        /*                        break;
                                            }
                                        }*/
                        ?>
                        <?php if ($result_sql_disc_final['meta_value']) { ?>
                            <img class="discount-image" src="/wp-content/themes/sydney/img/discount.png">
                            <span style="right: 4%; top: 5.9%;"
                                  class="discount-amount"><?= $result_sql_disc_final['meta_value'] ?></span>
                            <?php
                        }
                        ?>

                        <span class="custom-size"><img src="<?= $item['guid'] ?>" </span>
                    </div>

                    <header class="entry-header">
                        <h2 itemprop="headline" class="title-post"><span id="country-title" class="country-title-class"
                                                     style="color: #0088e7;"
                                                     rel="bookmark"><?= $item['post_title'] ?> </span></h2>
                    </header><!-- .entry-header -->

                    <div itemprop="articleBody" class="entry-post">
                        <p><?= $item['post_content'] ?></p>
                    </div><!-- .entry-post -->

                    <footer class="entry-footer">
                        <?php //sydney_entry_footer(); ?>
                        <div class="tprice">
                            <div>от <strong><b><?= $item['name'] ?>
                                        <style>b a {
                                                color: #0088e7;
                                            }</style>
                                    </b></strong> $
                            </div>
                            <img style="display: none;" id="im"
                                 src="/wp-content/themes/sydney/img/icons/privilege2.png">
                            <a id="order-special-button" onclick="addhotel(this);" rel="fancybox" href="#"
                               class="popmake-form_for_special btnprice modal-link product-link"
                               data-order="AMC Royal Hotel 5*" country="Египет">Заказать</a>
                        </div>
                    </footer><!-- .entry-footer -->
                </article><!-- #post-## -->
                <?php
            }
            exit;
        } else {
            $goods = get_goods($db);
        }
    } ?>


