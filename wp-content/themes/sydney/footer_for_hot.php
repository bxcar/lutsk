<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 13.11.2016
 * Time: 22:51
 */

/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Sydney
 */
?>
<div class="top-form-container">
    <div class="form-descr box">
        <h3>Получите <span class="discount-size">скидку</span> <br/>
            1000&nbsp;грн. на тур*</h3>

        <p><span>Акция!</span> Дарим сертификат на 1000&nbsp;грн. на покупку тура*
            всем
            посетителям
            сайта. <br/>
            Просто заполните форму.</p>

        <p><span>Осталось всего 7 сертификатов!</span></p>
    </div>
    <div class="sidebar-column col-md-4">
        <aside id="text-2" class="widget widget_text"><h3 class="widget-title"
                                                          style="text-align: center; width: 93%;">
                Заполните форму сейчас</h3>
            <p class="under-header-in-form">и получите 5 вариантов отдыха с подробным расчётом цен</p>
            <div class="textwidget">
                    <div class="screen-reader-response"></div>
                    <form onsubmit="loaderMainFormTop();" id="contact-form" action="/thanks/" method="post" class="wpcf7-form">
                        <div style="display: none;">
                            <input type="hidden" name="_wpcf7" value="47">
                            <input type="hidden" name="_wpcf7_version" value="4.5.1">
                            <input type="hidden" name="_wpcf7_locale" value="ru_RU">
                            <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f47-o1">
                            <input type="hidden" name="_wpnonce" value="3f027fa8db">
                            <input type="hidden" name="order" value="Форма со страницы Горящие туры">
                        </div>
                                            <span class="wpcf7-form-control-wrap your-name"><input required type="text"
                                                                                                   style="width: 100%;"
                                                                                                   name="your-name"
                                                                                                   placeholder="Ваше имя*"
                                                                                                   value="" size="40"
                                                                                                   class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"
                                                                                                   aria-required="true"
                                                                                                   aria-invalid="false"></span>
                        
                                            <span class="wpcf7-form-control-wrap tel-564"><input required type="tel"
                                                                                                 style="width: 100%;"
                                                                                                 name="tel-564"
                                                                                                 placeholder="Контактный телефон*"
                                                                                                 value=""
                                                                                                 size="40"
                                                                                                 class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-tel"
                                                                                                 aria-invalid="false"></span>
                        
                                            <span class="wpcf7-form-control-wrap your-message"><textarea
                                                    name="your-message"
                                                    placeholder="Пожелания к туру*"
                                                    cols="40" rows="10"
                                                    class="wpcf7-form-control wpcf7-textarea"
                                                    aria-invalid="false"></textarea></span> </label></p>
                        <p><input id="submit-but" type="submit" value="Отправить"></p>
                        <div class="wpcf7-response-output wpcf7-display-none"></div>
                    </form>
                    <p class="form-text2">Мы перезвоним вам через
                        10 минут, засекайте!</p>
            </div>
        </aside>
    </div>
    <div class="seo-hot-tour"
         style="     margin-top: 50px;
                     width: 80%;
                     margin-right: auto;
                     margin-left: auto;">
        <h3>Горящие туры в Борисполе от Coral Travel</h3>
        <p>Каждый турист мечтает о недорогом и качественном отдыхе в райском уголке планеты, но как его получить?!
            Туристическая компания Coral Travel предлагает вам максимально выгодные горящие туры по всем направлениям.
            Но это не значит, что вы будете полыхать под палящим солнцем. Горящий тур – это самый обычный дешевый тур,
            цена на который снизилась из-за того, что заканчивается время бронирования курорта и нераспроданные места
            отдаются дешевле. Если вы хотите отправиться на отдых как можно скорее, то такой вариант именно для вас.
            Менеджеры  Coral Travel помогут подобрать вам отдых там, куда «горит тур». </p>
        <p>Туристическая компания Coral Travel предлагает горящие туры в Египет, Тайланд,
            страны Европы и многие другие направления. Обращайтесь к менеджерам нашей компании
            и получите актуальную информацию прямо сейчас. </p>
        <p>Осуществите свою мечту уже сегодня, отправляйтесь в горящие туры из Киева, Одессы, Львова и других
            украинских городов, а мы с радостью вам в этом поможем.</p>
    </div>
</div>

</div>
</div>
<div class="footer-tour-select">
    <p>Есть вопросы? Звоните нам сейчас:<br>
        098 11 69 555</p>
</div>
</div><!-- #content -->

<?php if (is_active_sidebar('footer-1')) : ?>
    <?php get_sidebar('footer'); ?>
<?php endif; ?>

<a class="go-top"><i class="fa fa-angle-up"></i></a>

<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="grid foot">
        <p class="f-text1 box">ООО «ХОРОШЕЕ АГЕНСТВО» <br/>
            ЕГРПОУ: 39818659 <br/>
            <a class="popmake-515" href="#">Платежная информация</a><br/>
            моб. +38 098 11 69 555
        </p>

        <p class="f-text2 box">г.&nbsp;Борисполь, <br/>
            ул.&nbsp;Киевский шлях, 2/6, <br/>ТРЦ «АЕРОМОЛ»<br>
            <span>e-mail:</span> info@coralborispol.com</p>

        <p class="f-text3 box">
            <a class="popmake-158 modal-link" href="#">Соглашение об обработке персональных данных.</a><br />

            <a class="popmake-bank modal-link" href="#">Банковская гарантия</a><br />

            <!--            <a class="modal-link" href="#confidenc3">Лицензия</a>-->
        </p>
    </div>
</footer><!-- #colophon -->
<?php wp_footer(); ?>
</div><!-- #page -->
</body>
</html>
